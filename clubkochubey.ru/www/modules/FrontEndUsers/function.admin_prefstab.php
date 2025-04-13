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

// fill out the template
$smarty->assign('startform',
		$this->CreateFormStart( $id, 'do_setprefs'));

$months = array();
for( $i = 520; $i > 0; $i-- )
  {
    $months[$i] = $i;
  }


$smarty->assign('input_randomusername', 
		RRUtils::myCreateInputCheckbox($id, 'input_randomusername', 1,
					       $this->GetPreference('use_randomusername',0)));

$smarty->assign('input_expireage',
		$this->CreateInputDropdown($id,'input_expireage',$months,-1,
                                          $this->GetPreference('expireage_months',260)));
   
$smarty->assign('prompt_pwfldlen', $this->Lang('prompt_pwfldlen'));
$smarty->assign('input_pwfldlen', 
		$this->CreateInputText($id, 'input_pwfldlen',
				       $this->GetPreference('passwordfldlength',20), 
				       2, 2 ));

$smarty->assign('prompt_minpwlen', $this->Lang('prompt_minpwlen'));
$smarty->assign('input_minpwlen', 
		$this->CreateInputText($id, 'input_minpwlen',
				       $this->GetPreference('min_passwordlength'), 2, 2 ));
$smarty->assign('info_minpwlen',
		$this->Lang('warning_effectsfieldlength'));
$smarty->assign('prompt_maxpwlen', $this->Lang('prompt_maxpwlen'));
$smarty->assign('input_maxpwlen', 
		$this->CreateInputText($id, 'input_maxpwlen',
				       $this->GetPreference('max_passwordlength'), 2, 2 ));
$smarty->assign('info_maxpwlen',
		$this->Lang('warning_effectsfieldlength'));

$smarty->assign('prompt_unfldlen', $this->Lang('prompt_unfldlen'));
$smarty->assign('input_unfldlen', 
		$this->CreateInputText($id, 'input_unfldlen',
				       $this->GetPreference('usernamefldlength',20), 
				       2, 2 ));

$smarty->assign('prompt_minunlen', $this->Lang('prompt_minunlen'));
$smarty->assign('input_minunlen', 
		$this->CreateInputText($id, 'input_minunlen',
				       $this->GetPreference('min_usernamelength'), 2, 2 ));
$smarty->assign('info_minunlen',
		$this->Lang('warning_effectsfieldlength'));
$smarty->assign('prompt_maxunlen', $this->Lang('prompt_maxunlen'));
$smarty->assign('input_maxunlen', 
		$this->CreateInputText($id, 'input_maxunlen',
				       $this->GetPreference('max_usernamelength'), 2, 2 ));
$smarty->assign('info_maxunlen',
		$this->Lang('warning_effectsfieldlength'));

$smarty->assign('prompt_signin_button', $this->Lang('prompt_signin_button'));
$smarty->assign('input_signin_button',
		$this->CreateInputText($id, 'input_signin_button',
				       $this->GetPreference('signin_button',$this->Lang('login')), 15, 15 ));

$smarty->assign('prompt_sessiontimeout', $this->Lang('prompt_sessiontimeout'));
$smarty->assign('input_sessiontimeout', 
		$this->CreateInputText($id, 'input_sessiontimeout',
				       $this->GetPreference('user_session_expires'), 4, 4 ));

$smarty->assign('prompt_cookiekeepalive',$this->Lang('prompt_cookiekeepalive'));
$smarty->assign('input_cookiekeepalive',
		RRUtils::myCreateInputCheckbox($id, 'input_cookiekeepalive', 1,
					       $this->GetPreference('cookie_keepalive',0)));
$smarty->assign('info_cookie_keepalive',
		$this->Lang('info_cookie_keepalive'));

$smarty->assign('prompt_thumbnail_size',$this->Lang('prompt_thumbnail_size'));
$smarty->assign('input_thumbnail_size',
		$this->CreateInputText($id,'input_thumbnail_size',
				       $this->GetPreference('thumbnail_size',75), 3, 3));

$smarty->assign('prompt_usecookiestoremember',
		$this->Lang('prompt_usecookiestoremember'));
$smarty->assign('input_usecookiestoremember',
		RRUtils::myCreateInputCheckbox($id,'input_usecookiestoremember',
					       1,
					       $this->GetPreference('usecookiestoremember')));
if( !function_exists('mcrypt_module_open') )
  {
    $smarty->assign('info_cookiestoremember',
		$this->Lang('info_cookiestoremember'));
  }

$smarty->assign('prompt_cookiename',$this->Lang('prompt_cookiename'));
$smarty->assign('input_cookiename',
		$this->CreateInputText($id,'input_cookiename',
				       $this->GetPreference('cookiename',''),20));

$smarty->assign('prompt_requireonegroup', $this->Lang('prompt_requireonegroup'));
$smarty->assign('input_requireonegroup', 
		RRUtils::myCreateInputCheckbox($id, 'input_requireonegroup', 1,
					       $this->GetPreference('require_onegroup')));

$smarty->assign('prompt_username_is_email',
		$this->Lang('prompt_username_is_email'));
$smarty->assign('input_username_is_email',
		RRUtils::myCreateInputCheckbox($id, 'input_username_is_email', 1,
					       $this->GetPreference('username_is_email')));
$smarty->assign('info_username_is_email', $this->Lang('info_username_is_email'));


$smarty->assign('prompt_allow_duplicate_emails',
		$this->Lang('prompt_allow_duplicate_emails'));
$smarty->assign('input_allow_duplicate_emails', 
		RRUtils::myCreateInputCheckbox($id, 'input_allow_duplicate_emails', 1,
					       $this->GetPreference('allow_duplicate_emails')));
$smarty->assign('info_allow_duplicate_emails', $this->Lang('info_allow_duplicate_emails'));

$smarty->assign('prompt_allow_duplicate_reminders',
		$this->Lang('prompt_allow_duplicate_reminders'));
$smarty->assign('input_allow_duplicate_reminders',
		RRUtils::myCreateInputCheckbox($id, 'input_allow_duplicate_reminders', 1,
					       $this->GetPreference('allow_duplicate_reminders')));
$smarty->assign('info_allow_duplicate_reminders', $this->Lang('info_allow_duplicate_reminders'));

$smarty->assign('prompt_feusers_specific_permissions',
		$this->Lang('prompt_feusers_specific_permissions'));
$smarty->assign('input_feusers_specific_permissions',
		RRUtils::myCreateInputCheckbox($id, 'input_feusers_specific_permissions', 1,
					       $this->GetPreference('feusers_specific_permissions')));
$smarty->assign('info_feusers_specific_permissions', $this->Lang('info_feusers_specific_permissions'));



$smarty->assign('prompt_dfltgroup', $this->Lang('prompt_dfltgroup'));
$groups1 = $this->GetGroupList();
$groups = array_merge( array("None" => -1), $groups1 );
$smarty->assign('input_dfltgroup',
		$this->CreateInputDropDown( $id, 'input_dfltgroup', $groups, -1,
					    $this->GetPreference('default_group')));

$smarty->assign('submit',
		$this->CreateInputSubmit ($id, 'submit',
					  $this->Lang('submit'),'','',
					  $this->Lang('confirm_submitprefs')));
$smarty->assign ('cancel',
		 $this->CreateInputSubmit ($id, 'cancel',
					   $this->Lang('cancel')));

$smarty->assign('prompt_requiredmarker',
		$this->Lang('requiredfieldmarker'));
$smarty->assign('input_requiredmarker',
		$this->CreateInputText($id,'input_requiredfieldmarker',
				       $this->GetPreference('required_field_marker','*'),2,2));

$smarty->assign('prompt_requiredcolor',
		$this->Lang('requiredfieldcolor'));
$smarty->assign('input_requiredcolor',
		$this->CreateInputText($id,'input_requiredfieldcolor',
				       $this->GetPreference('required_field_color','blue'),10,10));

$smarty->assign('prompt_hiddenmarker',
		$this->Lang('hiddenfieldmarker'));
$smarty->assign('input_hiddenmarker',
		$this->CreateInputText($id,'input_hiddenfieldmarker',
				       $this->GetPreference('hidden_field_marker','!!'),2,2));

$smarty->assign('prompt_hiddencolor',
		$this->Lang('hiddenfieldcolor'));
$smarty->assign('input_hiddencolor',
		$this->CreateInputText($id,'input_hiddenfieldcolor',
				       $this->GetPreference('hidden_field_color','green'),10,10));

$smarty->assign('prompt_forgotpw_page',
		$this->Lang('prompt_forgotpw_page'));
$smarty->assign('input_forgotpw_page',
		$this->CreateInputText($id,'input_forgotpw_page',
				       $this->GetPreference('pageidforgotpasswd'), 80, 255));
$smarty->assign('prompt_changesettings_page',
		$this->Lang('prompt_changesettings_page'));
$smarty->assign('input_changesettings_page',
		$this->CreateInputText($id,'input_changesettings_page',
				       $this->GetPreference('pageid_changesettings'), 80, 255));
$smarty->assign('prompt_login_page',
		$this->Lang('prompt_login_page'));
$smarty->assign('input_login_page',
		$this->CreateInputText($id,'input_login_page',
				       $this->GetPreference('pageid_login'), 80, 255));
$smarty->assign('prompt_logout_page',
		$this->Lang('prompt_logout_page'));
$smarty->assign('input_logout_page',
		$this->CreateInputText($id,'input_logout_page',
				       $this->GetPreference('pageid_logout'), 80, 255));

$smarty->assign('prompt_after_verify_code',
		$this->Lang('prompt_after_verify_code'));
$smarty->assign('input_after_verify_code',
		$this->CreateInputText($id,'input_after_verify_code',
				       $this->GetPreference('pageid_afterverify'), 80, 255));

$smarty->assign('prompt_after_change_settings',
		$this->Lang('prompt_after_change_settings'));
$smarty->assign('input_after_change_settings',
		$this->CreateInputText($id,'input_after_change_settings',
				       $this->GetPreference('pageid_afterchangesettings'), 80, 255));

$smarty->assign('prompt_allow_repeated_logins',
		$this->Lang('prompt_allow_repeated_logins'));
$smarty->assign('input_allow_repeated_logins',
		RRUtils::myCreateInputCheckbox( $id, 'input_allow_repeated_logins', 1,
						$this->GetPreference('allow_repeated_logins')));

/* {
  $usermanipulators = array();
  $dir = opendir(dirname(__FILE__));
  while( false !== ($file = readdir($dir)) )
    {
      if( preg_match('/\.api\.php$/',$file) == 1 )
	{
	  $bn = basename($file);
	  $usermanipulators[$bn] = $bn;
	}
    }
  closedir($dir);
  $smarty->assign('prompt_usermanipulator',
		  $this->Lang('prompt_usermanipulator'));
  $smarty->assign('input_usermanipulator',
		  $this->CreateInputDropdown( $id, 'input_usermanipulator',
					      $usermanipulators, -1,
					      $this->GetPreference('usermanipulator','FrontEndUsers.api.php')));
} */

$smarty->assign('prompt_image_destination_path',
				$this->Lang('prompt_image_destination_path'));
$smarty->assign('input_image_destination_path',
				$this->CreateInputText($id,'input_image_destination_path',
									   $this->GetPreference('image_destination_path'),40));
$smarty->assign('prompt_allowed_image_extensions',
				$this->Lang('prompt_allowed_image_extensions'));
$smarty->assign('input_allowed_image_extensions',
				$this->CreateInputText($id,'input_allowed_image_extensions',
						       $this->GetPreference('allowed_image_extensions'),40,40));

$notification_list = array();
$notification_list[$this->Lang('OnLogin')] = 'OnLogin';
$notification_list[$this->Lang('OnLogout')] = 'OnLogout';
$notification_list[$this->Lang('OnExpireUser')] = 'OnExpireUser';
$notification_list[$this->Lang('OnCreateUser')] = 'OnCreateUser';
$notification_list[$this->Lang('OnDeleteUser')] = 'OnDeleteUser';
$notification_list[$this->Lang('OnUpdateUser')] = 'OnUpdateUser';
$notification_list[$this->Lang('OnCreateGroup')] = 'OnCreateGroup';
$notification_list[$this->Lang('OnUpdateGroup')] = 'OnUpdateGroup';
$notification_list[$this->Lang('OnDeleteGroup')] = 'OnDeleteGroup';
$smarty->assign('prompt_notifications',$this->Lang('prompt_notifications'));
$notifications = explode(',',$this->GetPreference('notifications',''));
$smarty->assign('input_notifications',
		$this->CreateInputSelectList($id,'notifications[]',$notification_list, $notifications));

$smarty->assign('prompt_notification_address',$this->Lang('prompt_notification_address'));
$smarty->assign('input_notification_address',
		$this->CreateInputText($id,'notification_address',
				       $this->GetPreference('notification_address'),50,255));

$smarty->assign('prompt_notification_subject',$this->Lang('prompt_notification_subject'));
$smarty->assign('input_notification_subject',
		$this->CreateInputText($id,'notification_subject',
				       $this->GetPreference('notification_subject'),50,255));

$smarty->assign('prompt_notification_template',$this->Lang('prompt_notification_template'));
$smarty->assign('input_notification_template',
		$this->CreateTextArea(false,$id,
				      $this->GetTemplate('notification_template'),
				      'notification_template'));

$smarty->assign('info_star',$this->Lang('info_star'));
$num = $this->CountTempCodeRecords();
if( $num )
    {
      $smarty->assign('prompt_numresetrecords',
		      $this->Lang('prompt_numresetrecord'));
      $smarty->assign('data_numresetrecords', $num); //todo
      $smarty->assign('input_removeall',
		      $this->CreateInputSubmit($id,'input_removeall',
					       $this->Lang('removeall'),
					       'onclick="return confirm(\''.$this->Lang('areyousure').'\')"'));
      $smarty->assign('input_remove1week',
		      $this->CreateInputSubmit($id,'input_remove1week',
					       $this->Lang('remove1week'),
					       'onclick="return confirm(\''.$this->Lang('areyousure').'\')"'));
      
      $smarty->assign('input_remove1month',
		      $this->CreateInputSubmit($id,'input_remove1month',
					       $this->Lang('remove1month'),
					       'onclick="return confirm(\''.$this->Lang('areyousure').'\')"'));
    }
$smarty->assign('endform',$this->CreateFormEnd());
echo $this->ProcessTemplate('adminprefs.tpl');

// EOF
?>