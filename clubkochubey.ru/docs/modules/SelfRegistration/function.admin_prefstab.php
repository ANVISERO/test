<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: SelfRegistration (c) 2008 by Robert Campbell 
#         (calguy1000@cmsmadesimple.org)
#  An addon module for CMS Made Simple to allow users to register themselves
#  with a website.
# 
# Version: 1.1.5
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

$smarty->assign('startform',
		$this->CreateFormStart( $id, 'setprefs', $returnid ));
$smarty->assign('endform',
		$this->CreateFormEnd());

$feu = $this->GetModuleInstance('FrontEndUsers');
$grouplist = $feu->GetGroupList();
$tmp = $this->GetPreference('noregister_groups');
$noregister_groups = array();
if( !empty($tmp) ) $noregister_groups = explode(',',$tmp);
$smarty->assign('input_noregister',
		$this->CreateInputSelectList($id,'input_noregister[]',$grouplist,
					     $noregister_groups,3));
		
$smarty->assign('prompt_inline',
		$this->Lang('use_inline_forms'));
$smarty->assign('input_inline',
		$this->CreateInputCheckbox($id,'input_inline',1,
					   $this->GetPreference('inline_forms',1)))
  ;
$smarty->assign('prompt_notify',
		$this->Lang('notify_on_registration'));
$smarty->assign('input_notify',
		$this->CreateInputCheckbox( $id, 
					    'input_notify', 1,
					    $this->GetPreference('notify_on_registration')));

$smarty->assign('prompt_email_confirmation',
		$this->Lang('require_email_confirmation'));
$smarty->assign('input_email_confirmation',
		$this->CreateInputCheckbox( $id, 
					    'input_email_confirmation', 1,
					    $this->GetPreference('require_email_confirmation')));

$smarty->assign('prompt_confirmmail_to',
		$this->Lang('send_emails_to'));
$smarty->assign('input_confirmmail_to',
		$this->CreateInputText( $id, 
					'input_confirmmail_to', 
					$this->GetPreference('send_emails_to'),
					30, 60));

$smarty->assign('submit',$this->CreateInputSubmit($id,'submit',
						  $this->Lang('submit'), '', '',
						  $this->Lang('confirm_submitprefs')));

$smarty->assign('prompt_force_email_twice',
		$this->Lang('force_email_twice'));
$smarty->assign('input_force_email_twice',
		$this->CreateInputCheckbox( $id, 
					    'input_force_email_twice', 1,
					    $this->GetPreference('selfreg_force_email_twice')));

$smarty->assign('prompt_skip_final_msg',
		$this->Lang('skip_final_msg'));
$smarty->assign('input_skip_final_msg',
		$this->CreateInputCheckbox( $id,
					    'input_skip_final_msg', 1,
					    $this->GetPreference('selfreg_skip_final_msg')));

$smarty->assign('prompt_redirect_afterregister',
		$this->Lang('redirect_afterregister'));
$smarty->assign('input_redirect_afterregister',
		$this->CreateInputText($id,
				       'input_redirect_afterregister',
				       $this->GetPreference('redirect_afterregister'),
				       20));

$smarty->assign('prompt_login_afterverify',
		$this->Lang('login_afterverify'));
$smarty->assign('input_login_afterverify',
		$this->CreateInputCheckbox($id,
					   'input_login_afterverify',1,
					   $this->GetPreference('login_afterverify')));

$smarty->assign('prompt_redirect_afterverify',
		$this->Lang('redirect_afterverify'));
$smarty->assign('input_redirect_afterverify',
		$this->CreateInputText($id,
				       'input_redirect_afterverify',
				       $this->GetPreference('redirect_afterverify'),
				       20));
    
$num = $this->CountTempUsers();
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
    $smarty->assign('input_remove1day',
		    $this->CreateInputSubmit($id,'input_remove1day',
					     $this->Lang('remove1day'),
					     'onclick="return confirm(\''.$this->Lang('areyousure').'\')"'));
    $smarty->assign('input_list1day',
		    $this->CreateInputSubmit($id,'input_list1day',
						   $this->Lang('list1day')));
  }

echo $this->ProcessTemplate('prefs.tpl');

// EOF
?>