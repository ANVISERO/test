<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: CGUserDirectory (c) 2009 by Robert Campbell 
#         (calguy1000@cmsmadesimple.org)
#  An addon module for CMS Made Simple to provide the ability to browse
#  and view summary reports and detail reports about groups of frontend
#  users.
#
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2005 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
#
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# However, as a special exception to the GPL, this software is distributed
# as an addon module to CMS Made Simple.  You may not use this software
# in any Non GPL version of CMS Made simple, or in any version of CMS
# Made simple that does not indicate clearly and obviously in its admin 
# section that the site was built with CMS Made simple.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#
#-------------------------------------------------------------------------
#END_LICENSE
if( !isset($gCms) ) exit;

#
# Initialization
#
$thetemplate = 'summary_'.$this->GetPreference(CGUSERDIR_PREF_DFLTSUMMARY_NAME);
$messages = array();
$status = '';
$gid = '';
$sortby = 'username';
$sortorder = 'ASC';
$showexpired = 0;
$pagelimit = 100;
$pagenum = 1;
$numpages = 1;
$itemcount = 0;
$offset = 0;
$property = '';
$uselike = 0;
$propval = '';
$orig_returnid = $returnid;
$detailpage = $returnid;


#
# Setup
#
$feu =& $this->GetModuleInstance('FrontEndUsers');
if( !$feu ) 
  {
    $status = 'error';
    $messages[] =  $this->Lang('error_nofeu');
  }


#
# Process Parameters
#
if( isset($params['summarytemplate']) )
  {
    $thetemplate = 'summary_'.trim($params['summarytemplate']);
  }
if (isset($params['detailpage']))
  {
    $manager =& $gCms->GetHierarchyManager();
    $node =& $manager->sureGetNodeByAlias($params['detailpage']);
    if (isset($node))
      {
	$content =& $node->GetContent();	
	if (isset($content))
	  {
	    $detailpage = $content->Id();
	  }
      }
    else
      {
	$node =& $manager->sureGetNodeById($params['detailpage']);
	if (isset($node))
	  {
	    $detailpage = $params['detailpage'];
	  }
      }

    if( $detailpage != '' )
      {
	$params['origpage'] = $returnid;
      }
  }

if( isset($params['group']) )
  {
    $gid = $feu->GetGroupID(trim($params['group']));
    if( $gid === false )
      {
	$status = 'error';
	$messages[] = $this->Lang('error_invalidgroup');
      }
  }
if( isset($params['gid']) )
  {
    $gid = (int)$params['gid'];
    if( !$feu->GroupExistsByID($gid) )
      {
	$status = 'error';
	$messages[] = $this->Lang('error_invalidgroup');
      }
  }
if( isset($params['showexpired']) )
  {
    $showexpired = (int)$params['showexpired'];
  }
if( isset($params['prop']) )
  {
    $property = trim($params['prop']);
    if( isset($params['uselike']) )
      {
	$uselike = (int)$params['uselike'];
      }
    if( isset($params['propval']) )
      {
	$propval = trim($params['propval']);
      }

    if( !empty($property) && empty($propval) )
      {
	$status = 'error';
	$messages[] = $this->Lang('error_missingparam');
      }
  }
if( isset($params['sortby']) )
  {
    $tmp = trim($params['sortby']);
    switch($tmp)
      {
      case 'id':
      case 'username':
      case 'createdate':
      case 'expires':
	$sortby = 'U.'.$tmp;
	break;
      case 'activity':
	$sortby = 'H.refdate';
	break;
      default:
	if( startswith($tmp,'f:') )
	  {
	    $sortby = $tmp;
	  }
	else
	  {
	    $status = 'error';
	    $messages[] =  $this->Lang('error_invalidsortfield',$tmp);
	  }
	break;
      }
  }
if( isset($params['sortorder']) )
  {
    $tmp = strtoupper(trim($params['sortorder']));
    switch( $tmp )
      {
      case 'ASC':
      case 'DESC':
	$sortorder = $tmp;
	break;
      default:
	$status = 'error';
	$messages[] =  $this->Lang('error_invalidsortfield',$tmp);
	break;
      }
  }
if( isset($params['pagelimit']) )
  {
    $pagelimit = (int)$params['pagelimit'];
    $pagelimit = max($pagelimit,1);
    $pagelimit = min(1000,$pagelimit);
  }
if( isset($params['pagenum']) )
  {
    $pagenum = (int)$params['pagenum'];
    $pagenum = max($pagenum,1);
    $pagenum = min(10000,$pagenum);
  }


#
# Get the data
#
if( empty($status) )
  {
    $now = $db->DbTimestamp(time());
    $joins = array();
    $joinscount = array();
    $where = array();
    $wherecount = array();
    $qparms = array();
    $qparmscount = array();

    // 
    // build the queries
    //SELECT U.*,H.refdate FROM cms_module_feusers_users U LEFT JOIN cms_module_feusers_history H ON U.id = H.userid WHERE H.action = 'login' GROUP BY U.id ORDER by H.refdate DESC; 
    $tmp = $db->IfNull('H.refdate',$db->DbTimestamp(1)).' AS refdate';
    $query = 'SELECT U.*,'.$tmp.'  FROM '.cms_db_prefix().'module_feusers_users U';
    $querycount = 'SELECT count(U.id) FROM '.cms_db_prefix().'module_feusers_users U';
    $joins[] = cms_db_prefix().'module_feusers_history H ON U.id = H.userid';

    //
    // todo fill in stuff here
    //
    if( !empty($gid) )
      {
	$joins[] = cms_db_prefix().'module_feusers_belongs bel ON U.id = bel.userid';
	$joinscount[] = cms_db_prefix().'module_feusers_belongs bel ON U.id = bel.userid';
	$where[] = 'bel.groupid = ?';
	$wherecount[] = 'bel.groupid = ?';
	$qparms[] = $gid;
	$qparmscount[] = $gid;
      }

    if( !$showexpired )
      {
	$where[] = "expires > $now";
	$wherecount[] = "expires > $now";
      }
    if( !empty($property) && !empty($propval) )
      {
	$joins[] = cms_db_prefix().'module_feusers_properties P ON U.id = P.userid';
	$joinscount[] = cms_db_prefix().'module_feusers_properties P ON U.id = P.userid';
	if( $property != '__username__' )
	  {
	    $where[] = 'P.title = ?';
	    $wherecount[] = 'P.title = ?';
	    $qparms[] = $property;
	    $qparmscount[] = $property;
	  }

	if( $uselike )
	  {
	    if( $property == '__username__' )
	      {
		$where[] = 'U.username LIKE ?';
		$wherecount[] = 'U.username LIKE ?';
	      }
	    else
	      {
		$where[] = 'P.data LIKE ?';
		$wherecount[] = 'P.data LIKE ?';
	      }
	    $qparms[] = $propval;
	  }
	else
	  {
	    if( $property == '__username__' )
	      {
		$where[] = 'U.username = ?';
		$wherecount[] = 'U.username = ?';
	      }
	    else
	      {
		$where[] = 'P.data = ?';
		$wherecount[] = 'P.data = ?';
	      }
	    $qparms[] = $propval;
	  }
      }
    if( startswith($sortby,'f:') )
      {
	$field = substr($sortby,strlen('f:'));
	$sortby = 'P2.data';
	$joins[] = cms_db_prefix()."module_feusers_properties P2 ON U.id = P2.userid AND P2.title = '{$field}'";
      }

    // final assembly
    $suffix = '';
    $suffixcount = '';
    if( count($joins) )
      {
	$suffix .= ' LEFT JOIN '.implode(' LEFT JOIN ',$joins);
      }
    if( count($joinscount) )
      {
	$suffixcount .= ' LEFT JOIN '.implode(' LEFT JOIN ',$joinscount);
      }
    if( count($where) )
      {
	$suffix .= ' WHERE '.implode(' AND ',$where);
      }
    if( count($wherecount) )
      {
	$suffixcount .= ' WHERE '.implode(' AND ',$wherecount);
      }
    $suffix .= ' GROUP BY U.id';
    //$suffixcount .= ' GROUP BY U.id';

    $suffix .= " ORDER BY $sortby $sortorder";
    $query .= $suffix;
    $querycount .= $suffixcount;

    // Get the count of items.
    $itemcount = $db->GetOne($querycount,$qparms);
    if( !$itemcount ) 
      {
	echo 'DEBUG: error in count query<br/>';
	echo '&nbsp;&nbsp;QUERY = '.$db->sql.'<br/>';
	echo '&nbsp;&nbsp;Error = '.$db->ErrorMsg();
	$status = 'error';
	$messages[] = $this->Lang('error_sql');
      }

    // calculate page values.
    if( empty($status) )
      {
	$numpages = (int)($itemcount / $pagelimit);
	$tmp = $itemcount % $pagelimit;
	if( $tmp > 0 ) $numpages++;

	$offset = $pagelimit * ($pagenum - 1);
      }

    $data = '';
    if( empty($status) )
      {
	$dbr = $db->SelectLimit($query,$pagelimit,$offset,$qparms);
	if( !$dbr )
	  {
	    echo 'DEBUG: error in query<br/>';
	    echo '&nbsp;&nbsp;QUERY = '.$db->sql.'<br/>';
	    echo '&nbsp;&nbsp;Error = '.$db->ErrorMsg();
	    $status = 'error';
	    $messages[] = $this->Lang('error_sql');
	  }
	else
	  {
	    $data = array();
	    while( $dbr && ($row = $dbr->FetchRow()) )
	      {
		$data[] = $row;
	      }
	    $dbr->Close();
	  }
      }

    if( empty($status) )
      {
	//
	// Expand all the user options
	//

	$bad_date = trim($db->DbTimeStamp(1),"'");

	// query to get all user member groups
	$gquery = 'SELECT groupid FROM '.cms_db_prefix().'module_feusers_belongs 
                        WHERE userid = ?';
	
	// query to get user properties.
	$pquery = ' SELECT title,data FROM '.cms_db_prefix().'module_feusers_properties 
                     WHERE userid = ?';
	
	for( $i = 0; $i < count($data); $i++ )
	  {
	    // hide the password field
	    unset($data[$i]['password']);

	    // unset the refdate if the user has had no activity
	    if( $data[$i]['refdate'] == $bad_date )
	      {
		unset($data[$i]['refdate']);
	      }
	    
	    // Detail URL
	    $params['uid'] = $data[$i]['id'];
	    $prettyurl = 'users/'.$params['uid'].'/'.$detailpage;
	    if( isset($params['detailtemplate']) )
	      {
		$prettyurl .= '/'.munge_string_to_url(trim($params['detailtemplate']));
	      }
	    $prettyurl .= '/'.munge_string_to_url($data[$i]['username']);
	    $data[$i]['detail_url'] = $this->CreateURL($id,'detail',$detailpage,
						       $params,false,$prettyurl);
						       
	    // add member group ids
	    $tmp = $db->GetArray($gquery,array($data[$i]['id']));
	    $groups = $this->array_extract_field($tmp,'groupid');
	    $data[$i]['groups'] = $groups;
	    
	    // Get propreties
	    $gstr = '('.implode(',',$groups).')';
	    $tmp = $db->GetArray(sprintf($pquery,$gstr),array($data[$i]['id']));
	    if( $tmp )
	      {
		$tmp2 = array();
		for( $j = 0; $j < count($tmp); $j++ )
		  {
		    if( !empty($tmp[$j]['data']) && $tmp[$j]['data'] != '<notset>' )
		      {
			$tmp2[$tmp[$j]['title']] = $tmp[$j]['data'];
		      }
		  }
		$data[$i]['properties'] = $tmp2;
	      }
	  }
      }

    if( empty($status) )
      {
	// Get all the user properties
	$query = 'SELECT * FROM '.cms_db_prefix().'module_feusers_propdefn';
	$tmp = $db->GetArray($query);
	$props = $this->array_to_hash($tmp,'name');
      }

    if( empty($status) )
      {
	// get all the groups
	$query = 'SELECT * FROM '.cms_db_prefix().'module_feusers_groups';
	$tmp = $db->GetArray($query);
	$groups = $this->array_to_hash($tmp,'id');
      }
  }


#
# Give everything to smarty
#
if( empty($status) )
  {
    $config =& $gCms->GetConfig();
    $smarty->assign('groups',$groups);
    $smarty->assign('properties',$props);
    $smarty->assign('totalcount',$itemcount);
    $smarty->assign('curpage',$pagenum);
    $smarty->assign('numpages',$numpages);
    $smarty->assign('file_location',$config['uploads_url'].'/feusers');
    $smarty->assign('users',$data);

    if( $numpages > 1 )
      {
	if( $pagenum > 1 )
	  {
	    $parms = $params;
	    $parms['pagenum'] = 1;
	    $smarty->assign('firstpage_url',
			    $this->CreateURL($id,'default',$returnid,$parms));
	    $parms['pagenum'] = $pagenum - 1;
	    $smarty->assign('prevpage_url',
			    $this->CreateURL($id,'default',$returnid,$parms));
	  }
	if( $pagenum < $numpages )
	  {
	    $parms = $params;
	    $parms['pagenum'] = $pagenum + 1;
	    $smarty->assign('nextpage_url',
			    $this->CreateURL($id,'default',$returnid,$parms));
	    $parms['pagenum'] = $numpages;
	    $smarty->assign('lastpage_url',
			    $this->CreateURL($id,'default',$returnid,$parms));
	  }
      }
    //echo '<pre>'; print_r( $data ); echo '</pre>';
  }
else
  {
    $smarty->assign('status',$status);
    $smarty->assign('messages',$messages);
  }


#
# Display the template
#
echo $this->ProcessTemplateFromDatabase($thetemplate);

#
# EOF
#
?>