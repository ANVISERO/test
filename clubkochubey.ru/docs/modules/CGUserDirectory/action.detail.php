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
$config =& $gCms->GetConfig();
$thetemplate = 'detail_'.$this->GetPreference(CGUSERDIR_PREF_DFLTDETAIL_NAME);
$status = '';
$uid = '';
$data = '';
$props = '';
$groups = '';

#
# Setup
#
$feu =& $this->GetModuleInstance('FrontEndUsers');
if( !$feu ) 
  {
    $status = $this->Lang('error_nofeu');
  }

#
# Process Parameters
#
if( isset($params['detailtemplate']) )
  {
    $thetemplate = 'detail_'.trim($params['detailtemplate']);
  }
if( !isset($params['uid']) )
  {
    $status = $this->Lang('error_missingparam');
  }
$uid = (int)$params['uid'];

#
# Get the data
#
$tgroups = '';
if( empty($status) )
  {
    // user account details
    $query = 'SELECT * FROM '.cms_db_prefix().'module_feusers_users WHERE id = ?';
    $data = $db->GetRow($query,array($uid));
    if( !$data )
      {
	$status = $this->Lang('error_usernotfound');
      }
  }
if( empty($status) )
  {
    // last activity date
    $query = 'SELECT refdate FROM '.cms_db_prefix().'module_feusers_history 
               WHERE userid = ?
               ORDER BY refdate DESC
               LIMIT 1';
    $tmp = $db->GetOne($query,array($uid));
    if( $tmp )
      {
	$data['refdate'] = $tmp;
      }
  }
if( empty($status) )
  {
    // member groups
    $gquery = 'SELECT groupid FROM '.cms_db_prefix().'module_feusers_belongs 
                WHERE userid = ?';
    $tmp = $db->GetArray($gquery,array($uid));
    $tgroups = $this->array_extract_field($tmp,'groupid');
    $data['groups'] = $tgroups;
  }
if( empty($status) )
  {
    // user properties
    $pquery = ' SELECT title,data FROM '.cms_db_prefix().'module_feusers_properties 
                 WHERE userid = ?';
    $gstr = '('.implode(',',$tgroups).')';
    $tmp = $db->GetArray(sprintf($pquery,$gstr),array($uid));
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
	$data['properties'] = $tmp2;
      }
  }
if( empty($status) )
  {
    // Get all the property definitions
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

#
# Give everything to smarty
#
$smarty->assign('oneuser',$data);
$smarty->assign('groups',$groups);
$smarty->assign('properties',$props);
$smarty->assign('file_location',$config['uploads_url'].'/feusers');

#
# Display the template
#
echo $this->ProcessTemplateFromDatabase($thetemplate);

#
# EOF
#
?>