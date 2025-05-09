<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: FrontEndUsers (c) 2008 by Robert Campbell 
#         (calguy1000@cmsmadesimple.org)
#  An addon module for CMS Made Simple to allow management of frontend
#  users, and their login process within a CMS Made Simple powered 
#  website.
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
if( !isset($params['uid']) ) return;
$uid = (int)$params['uid'];

$smarty->assign_by_ref('feu',$this);
// Here we get a union (yep, a union) of all of the user
// properties and display them along with the values
$userinfo = $this->GetUserInfo($uid);
if( $result[0] === FALSE )
  {
    die('error 1 '.$uid);
    $this->_DisplayErrorPage( $id, $params, $returnid, 
			      $result[1]);
    return;
  }
$smarty->assign('userinfo',$userinfo[1]);

$groups = $this->GetMemberGroupsArray( $uid );
if( !$groups )
  {
    // This user isn't a member of any groups
    return;
  }

// now we have the groups, we build a union of all of the groups properties
$prop2 = array();
foreach( $groups as $grprecord )
{
  $gid = $grprecord['groupid'];
  $proprelations = $this->GetGroupPropertyRelations( $gid );
  $prop2 = RRUtils::array_merge_by_name_required( $prop2, $proprelations );
  uasort( $prop2, 
	  array('RRUtils','compare_elements_by_sortorder_key') );
}

// now we merge in all of the property definitions
$defns = $this->GetPropertyDefns();
$prop3 = array();
foreach( $prop2 as $oneprop )
{
  foreach( $defns as $onedefn )
    {
      if( $onedefn['name'] == $oneprop['name'] )
	{
	  $oneprop['prompt'] = $onedefn['prompt'];
	  $oneprop['type'] = $onedefn['type'];
	  break;
	}
    }
  $prop3[] = $oneprop;
}

// And now merge in the values
$userprops = $this->GetUserProperties($uid);
$propsbyname = array();
$properties = array();
foreach( $prop3 as $oneprop )
{
  foreach( $userprops as $oneval )
    {
      if( $oneprop['name'] == $oneval['title'] && 
	  isset($oneval['data']) && 
	  !empty($oneval['data']) )
	{
	  $oneprop['data'] = $oneval['data'];
	  break;
	}
    }
  $propsbyname[$oneprop['name']] = $oneprop['data'];
  $properties[] = $oneprop;
  
}

$smarty->assign('user_properties',$properties);
$smarty->assign('user_propertiesbyname',$propsbyname);

echo $this->ProcessTemplateFromDatabase('feusers_viewuser');
#
# EOF
#
?>