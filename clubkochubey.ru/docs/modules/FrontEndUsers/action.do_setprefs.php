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

if( !$this->_HasSufficientPermissions( 'editprefs' ) )
  {
    return;
  }

global $gCms;
$db =& $gCms->GetDB();
if( isset( $params['input_removeall'] ) )
  {
    $this->ExpireTempCodes('-5 years');
    $this->myRedirectToTab($id, 'prefs');
  }
else if( isset( $params['input_remove1week'] ) )
  {
    $this->ExpireTempCodes('-1 week');
    $this->myRedirectToTab($id, 'prefs');
  }
else if( isset( $params['input_remove1month'] ) )
  {
    $this->ExpireTempCodes('-1 month');
    $this->myRedirectToTab($id, 'prefs');
  }
else if( isset( $params['cancel'] ) )
  {
    $this->myRedirectToTab($id, 'prefs' );
  }

if( isset( $params['input_minpwlen'] ) && 
    isset( $params['input_maxpwlen'] ) )
  {
    if( $params['input_minpwlen'] >= $params['input_maxpwlen'] ||
	$params['input_minpwlen'] <= 0 )
      {
	$this->_DisplayErrorPage( $id, $params, $returnid,
				  $this->Lang('error_invalidpasswordlengths') );
	return;
      }
    $this->SetPreference('min_passwordlength',$params['input_minpwlen']);
    $this->SetPreference('max_passwordlength',$params['input_maxpwlen']);
  }

$randomusername = 0;
if( isset( $params['input_randomusername']) )
  {
    $randomusername = (int)$params['input_randomusername'];
  }
$this->SetPreference('use_randomusername',$randomusername);

if( isset( $params['input_expireage']) )
  {
    $this->SetPreference('expireage_months',(int)$params['input_expireage']);
  }

if( isset( $params['input_minunlen'] ) && 
    isset( $params['input_maxunlen'] ) )
  {
    if( $params['input_minunlen'] >= $params['input_maxunlen'] ||
	$params['input_minunlen'] <= 0 )
      {
	$this->_DisplayErrorPage( $id, $params, $returnid,
				  $this->Lang('error_invalidusernamelengths') );
	return;
      }
    $this->SetPreference('min_usernamelength',$params['input_minunlen']);
    $this->SetPreference('max_usernamelength',$params['input_maxunlen']);
  }

$this->SetPreference('user_session_expires', $params['input_sessiontimeout']);

$cookie_keepalive = 0;
if( isset( $params['input_cookiekeepalive'] ) )
  {
    $cookie_keepalive = $params['input_cookiekeepalive'];
  }
$this->SetPreference('cookie_keepalive',$cookie_keepalive);

$this->SetPreference('thumbnail_size',isset($params['input_thumbnail_size']) ? trim((int)$params['input_thumbnail_size']) : 75);

$usecookiestoremember = 0;
if( isset( $params['input_usecookiestoremember'] ) )
  {
    $usecookiestoremember = $params['input_usecookiestoremember'];
  }
$this->SetPreference('usecookiestoremember',$usecookiestoremember);

$this->SetPreference('cookiename',$params['input_cookiename']);
$this->SetPreference('default_group', $params['input_dfltgroup']);
$this->SetPreference('signin_button', $params['input_signin_button']);
$this->SetPreference('required_field_marker', $params['input_requiredfieldmarker']);
$this->SetPreference('required_field_color', $params['input_requiredfieldcolor']);
$this->SetPreference('require_onegroup', $params['input_requireonegroup']);
$this->SetPreference('hidden_field_marker', $params['input_hiddenfieldmarker']);
$this->SetPreference('hidden_field_color', $params['input_hiddenfieldcolor']);
$this->SetPreference('pageidforgotpasswd', $params['input_forgotpw_page']);
$this->SetPreference('pageid_changesettings', $params['input_changesettings_page']);
$this->SetPreference('pageid_login', $params['input_login_page']);
$this->SetPreference('pageid_logout', $params['input_logout_page']);
$this->SetPreference('pageid_afterverify',
		     $params['input_after_verify_code']);
$this->SetPreference('pageid_afterchangesettings',
		     $params['input_after_change_settings']);
$this->SetPreference('username_is_email', (isset($params['input_username_is_email'])?$params['input_username_is_email']:0));
$this->SetPreference('allow_duplicate_emails', (isset($params['input_allow_duplicate_emails'])?$params['input_allow_duplicate_emails']:0));
$this->SetPreference('allow_duplicate_reminders', (isset($params['input_allow_duplicate_reminders'])?$params['input_allow_duplicate_reminders']:0));
$this->SetPreference('allow_repeated_logins',(isset($params['input_allow_repeated_logins'])?$params['input_allow_repeated_logins']:0));
$this->SetPreference('passwordfldlength', $params['input_pwfldlen']);
$this->SetPreference('usernamefldlength', $params['input_unfldlen']);
$this->SetPreference('image_destination_path',$params['input_image_destination_path']);
$this->SetPreference('allowed_image_extensions',$params['input_allowed_image_extensions']);
if (isset($params['notifications']))
   {
   $this->SetPreference('notifications',implode(',',$params['notifications']));
   }
$this->SetPreference('notification_address',$params['notification_address']);
$this->SetPreference('notification_subject',$params['notification_subject']);
$this->SetTemplate('notification_template',$params['notification_template']);
    
$query = "SELECT permission_id FROM ".cms_db_prefix()."permissions WHERE permission_name LIKE 'FEU %'";
$count = $db->GetOne($query);

$feusers_specific_permissions = 0;
if( isset( $params['input_feusers_specific_permissions'] ) )
  $feusers_specific_permissions = $params['input_feusers_specific_permissions'];
$this->SetPreference('feusers_specific_permissions',$feusers_specific_permissions);

if (isset($params['input_feusers_specific_permissions']) && $params['input_feusers_specific_permissions']==1)
  {
    // using FEUser-specific permissions, so create them if necessary
    if (intval($count) == 0)
      {
	// create 'em
	$this->CreatePermission('FEU Add Users','Add Front-End Users');
	$this->CreatePermission('FEU Modify Users','Modify Front-End Users');
	$this->CreatePermission('FEU Remove Users','Remove Front-End Users');
	$this->CreatePermission('FEU Add Groups','Add Front-End User Groups');
	$this->CreatePermission('FEU Modify Groups','Modify Front-End User Groups');
	$this->CreatePermission('FEU Modify Group Assignments','Modify Front-End User Group Assignments');
	$this->CreatePermission('FEU Remove Groups','Remove Front-End User Groups');
	$this->CreatePermission('FEU Modify Site Preferences','Modify Front-End Users Site Prefs');
	$this->CreatePermission('FEU Modify FrontEndUserProps','Modify Front-End User Properties');
	$this->CreatePermission('FEU Modify Templates','Modify Front-End User Templates');
      }
  }
/*
 * WE DON'T DELETE THE FEU SPECIFIC PERMISSIONS, EVEN IF SOMEBODY TOGGLES THIS OFF.
 else
   {
     // sharing access permissions with Admin, so delete FEUser-specific permissions if necessary
     if (intval($count) != 0)
       {
	 // delete 'em
	 $this->RemovePermission('FEU Add Users');
	 $this->RemovePermission('FEU Modify Users');
	 $this->RemovePermission('FEU Remove Users');
	 $this->RemovePermission('FEU Add Groups');
	 $this->RemovePermission('FEU Modify Groups');
	 $this->RemovePermission('FEU Modify Group Assignments');
	 $this->RemovePermission('FEU Remove Groups');
	 $this->RemovePermission('FEU Modify Site Preferences');
	 $this->RemovePermission('FEU Modify FrontEndUserProps');
	 $this->RemovePermission('FEU Modify Templates');
       }
       
   }
*/
    
$this->myRedirectToTab($id, 'prefs');

// EOF
?>