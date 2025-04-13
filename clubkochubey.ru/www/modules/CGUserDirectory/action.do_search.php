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
$sortorder      = $this->GetPreference('asc');
$sortby         = $this->GetPreference('username');
$detailpage     = $returnid;
$pagelimit      = 100000;
$inline         = 0;
$page           = 1;
$thetemplate    = 'summary_'.$this->GetPreference(CGUSERDIR_PREF_DFLTSUMMARY_NAME);
$username_expr  = '';
$searchproperty = '';
$sortby         = 'username';
$sortorder      = 'ASC';
$propval        = '';
$propval2       = '';
$offset         = 0;
$props          = '';
$feu            =& $this->GetModuleInstance('FrontEndUsers');
$allany         = 'all';
$searchdata     = array();

#
# Setup
#
if( isset( $params['inline'] ) && $params['inline'] != 0 )
  {
    $inline = 1;
  }
if( isset($params['summarytemplate']) )
  {
    $thetemplate = 'summary_'.trim($params['summarytemplate']);
  }
if( isset( $params['detailpage'] ) )
  {
    $tmp = $this->resolve_alias_or_id($params['detailpage']);
    if( $tmp )
      {
	$detailpage = $tmp;
	$inline = 0;
      }
  }
if( isset( $params['sortorder'] ) )
  {
    $tmp = strtolower($params['sortorder']);
    switch( $tmp )
      {
      case 'asc':
      case 'desc':
	$sortorder = $tmp;
	break;
      default:
	$sortorder = 'asc';
	break;
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
if( isset($params['ud_allany']) )
  {
    $allany = strtolower(trim($params['ud_allany']));
  }

#
# Handle form submission
#
if( isset($params['ud_cancel']) )
  {
    $destpage = $returnid;
    if( isset($params['ud_origpage']) )
      {
	$destpage = (int)$params['ud_origpage'];
      }
    $this->RedirectContent($destpage);
  }
else if( isset($params['ud_submit']) || isset($params['ud_dosearch']) )
  {
    if( isset($params['ud_username']) )
      {
	$username_expr = trim($params['ud_username']);
      }

    if( isset($params['searchproperty']) && isset($params['ud_propvalue']))
      {
	$tmp = explode(',',trim($params['searchproperty']));
	foreach( $tmp as $one )
	  {
	    if( isset($params['ud_propvalue'][$one]) )
	      {
		if( $params['ud_propvalue'][$one] != '-1' &&
		    !empty($params['ud_propvalue'][$one]) )
		  $searchdata[$one] = trim($params['ud_propvalue'][$one]);
	      }
	  }
      }

    $where = array();
    $qparms = array();
    $joins = array();
    if( !empty($username_expr) )
      {
	$where[] = 'U.username REGEXP ?';
	$qparms[] = $username_expr;
      }
    if( count($searchdata) )
      {
	$joins[] = 'LEFT JOIN '.cms_db_prefix().'module_feusers_properties P ON U.id = P.userid';
	foreach( $searchdata as $propname => $propval )
	  {
	    $where[] = '(P.title = ? AND P.data REGEXP ?)';
	    $qparms[] = $propname;
	    $qparms[] = $propval;
	  }
      }

    $tmp = $db->IfNull('H.refdate',$db->DbTimestamp(1)).' AS refdate';
    $qu  = 'SELECT U.* FROM '.cms_db_prefix().'module_feusers_users U';
    $qc  = 'SELECT COUNT(U.id) FROM '.cms_db_prefix().'module_feusers_users U';
    $qu .= ' LEFT JOIN '.cms_db_prefix().'module_feusers_history H ON U.id = H.userid';
    if( count($joins) )
      {
	foreach( $joins as $one )
	  {
	    $qu .= ' '.$one;
	    $qc .= ' '.$one;
	  }
      }
    if( count($where) )
      {
	$expr = ' AND ';
	if( $allany == 'any' )
	  {
	    $expr = ' OR ';
	  }
	$qu .= ' WHERE '.implode($expr,$where);
	$qc .= ' WHERE '.implode($expr,$where);
      }
    $qu .= ' GROUP BY U.id';
    $qu .= " ORDER BY $sortby $sortorder";

    $itemcount = $db->GetOne($qc,$qparms);
    if( !$itemcount ) return;

    $dbr = $db->SelectLimit($qu,$pagelimit,$offset,$qparms);
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
# Give Everything to Smarty
#
if( empty($status) )
  {
    $config =& $gCms->GetConfig();
    $smarty->assign('groups',$groups);
    $smarty->assign('properties',$props);
    $smarty->assign('totalcount',$itemcount);
    $smarty->assign('users',$data);
    $smarty->assign('file_location',$config['uploads_url'].'/feusers');
    $smarty->assign('users',$data);
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