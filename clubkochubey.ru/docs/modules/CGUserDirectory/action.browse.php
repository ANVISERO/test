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
$feu =& $this->GetModuleInstance('FrontEndUsers');
if( !$feu ) return;
$inline = 0;
$resultpage = $returnid;
$thetemplate = $this->GetPreference(CGUSERDIR_PREF_DFLTBROWSEPROP_NAME);
$property='';
$fieldtype = '';
$options = '';
$uselike = 0;
$sortorder = 'asc';

#
# Get parameters
#
if( isset($params['inline']) && $params['inline'] != 0 )
  {
    $inline = 1;
    unset($params['inline']);
  }
if( isset($params['resultpage']) )
  {
    $tmp = $this->resolve_alias_or_id($params['resultpage']);
    if( $tmp )
      {
	$resultpage = $tmp;
	$inline = 0;
      }
    unset($params['resultpage']);
  }
if( isset($params['browseproptemplate']) )
  {
    $thetemplate = trim($params['browseproptemplate']);
    unset($params['browseproptemplate']);
  }
if( isset($params['prop']) )
  {
    $property = trim($params['prop']);
  }
if( isset($params['bsortorder']) )
  {
    $tmp = strtolower($params['bsortorder']);
    switch($tmp)
      {
      case 'asc':
      case 'desc':
	$sortorder = $tmp;
      }
  }

// property must be specified.
if( empty($property) ) return;

$defn = $feu->GetPropertyDefn($property);
// property could not be found.
if( !$defn ) return;

// figure out what type of field it'll be
if( $defn )
  {
    switch( $defn['type'] )
      {
      case '0': // text
      case '2': // email
	$fieldtype = 'text';
	break;

      case '4': // dropdown
      case '5': // multiselect
      case '7': // radiobuttons
	$fieldtype = 'select';
	$tmp = $feu->GetSelectOptions($defn['name'],1);
	$options = array();
	$options[-1] = $this->Lang('any');
	foreach( $tmp as $key => $value )
	  {
	    $options[$value] = $key;
	  }
	if( $defn['type'] == 5 )
	  {
	    $uselike = 1;
	  }
	break;

      case '1': // checkbox
      case '3': // textarea
      case '6': // image
      case '8': // date
	// not supported.
	return;
	break;
      }
  }

// get the data.
$data = array();
switch($fieldtype)
  {
  case 'text':
    $query = 'SELECT DISTINCT data 
                FROM '.cms_db_prefix().'module_feusers_properties A 
                LEFT JOIN '.cms_db_prefix().'module_feusers_users B
                  ON A.userid = B.id 
               WHERE A.title = ?
                 AND B.expires > NOW()';
    $tmp = $db->GetArray($query,array($property));
    if( !is_array($tmp) ) break;
    foreach( $tmp as $one )
      {
	$rec = array();
	$rec['name'] = $one['data'];
	$rec['url'] = $this->CreatePropertySummaryURL($id,$resultpage,$property,$one['data'],$params,$inline);
	$data[] = $rec;
      }
    break;

  case 'select':
    {
      $query = 'SELECT data 
                  FROM '.cms_db_prefix().'module_feusers_properties A 
                LEFT JOIN '.cms_db_prefix().'module_feusers_users B
                  ON A.userid = B.id 
                 WHERE A.title = ?
                 AND B.expires > NOW()';
      $tmp = $db->GetArray($query,array($property));
      if( $tmp )
	{
	  // build a histogram of all the selected options.
	  $histogram = array();
	  foreach( $tmp as $row )
	    {
	      $tmp3 = explode(',',$row['data']);
	      foreach( $tmp3 as $oneval )
		{
		  if( !isset($histogram[$oneval]) )
		    {
		      $histogram[$oneval]=0;
		    }
		  $histogram[$oneval]++;
		}
	    }
	  
	  // now we have all the options, build our data array.
	  foreach( $histogram as $key => $count )
	    {
	      $val = $key;
	      if( $uselike )
		{
		  $params['uselike'] = 1;
		  $val = '%'.$val.'%';
		}
	      if( !isset($options[$key]) ) continue;
	      $rec = array();
	      $rec['name'] = $options[$key];
	      $rec['url'] = $this->CreatePropertySummaryurl($id,$resultpage,$property,$val,$params,$inline);
	      $rec['count'] = $count;
	      
	      $data[] = $rec;
	    }

	  // now we can optionally sort this stuff.
	  if( isset($params['bsortby']) )
	    {
	      switch($params['bsortby'])
		{
		case 'name':
		  if( $sortorder == 'asc' )
		    {
		      cge_array::hashsort($data,'name',true);
		    }
		  else
		    {
		      cge_array::hashrsort($data,'name',true);
		    }
		  break;
		case 'count':
		  if( $sortorder == 'asc' )
		    {
		      cge_array::hashsort($data,'count');
		    }
		  else
		    {
		      cge_array::hashrsort($data,'count');
		    }
		  break;
		}
	    }
	} // if
    }
    break;
  }

//
// Give everything to smarty
//
if( !empty($fieldtype) )
  {
    $smarty->assign('ud_fielddefn',$defn);
    $smarty->assign('ud_fieldtype',$fieldtype);
    if( !empty($options) )
      {
	$smarty->assign('ud_options',$options);
      }
  }
if( count($data) )
  {
    $smarty->assign('browseoptions',$data);
  }

#
# Process the template
#
echo $this->ProcessTemplateFromDatabase('browseprop_'.$thetemplate);

#
# EOF
#
?>
