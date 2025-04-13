<?php

if (!isset($gCms)) exit;
if( !$this->CheckPermission( 'Manage Comments' ) && !$this->CheckPermission( 'Modify Templates' ) ) exit;

echo $this->StartTabHeaders();
if (FALSE == empty($params['active_tab'])) {
	$tab = $params['active_tab'];
} else {
	$tab = '';
}	
if( $this->CheckPermission( 'Manage Comments' ) )
{
	echo $this->SetTabHeader('comments', $this->Lang('comments'), ('comments' == $tab)?true:false);
}

if( $this->CheckPermission( 'Modify Templates' ) )
{
	echo $this->SetTabHeader('list_template', $this->Lang('list_template'), ('list_template' == $tab)?true:false);
}
if($this->CheckPermission('Modify Site Preferences'))
{
	echo $this->SetTabHeader('options',$this->Lang('options'), ('options' == $tab)?true:false);
}

echo $this->EndTabHeaders();

#The content of the tabs
echo $this->StartTabContent();

if( $this->CheckPermission( 'Manage Comments' ) )
{
	echo $this->StartTab('comments', $params);
	include(dirname(__FILE__).'/function.admin_commentstab.php');
	echo $this->EndTab();
}
if( $this->CheckPermission( 'Modify Templates' ) )
{
	echo $this->StartTab('list_template', $params);
	
	echo $this->CreateFormStart($id, 'updatelisttemplate');

	echo '<p>'.$this->CreateTextArea(false, $id, $this->GetTemplate('default_display'), 'templatecontent', 'pagebigtextarea').'</p>';
	
	echo $this->CreateInputSubmit($id, 'submitbutton', $this->Lang('submit'));
	echo $this->CreateInputSubmit($id, 'defaultsbutton', $this->Lang('sysdefaults'), '', '', $this->Lang('restoretodefaultsmsg'));
	
	echo $this->CreateFormEnd();
	
	echo $this->EndTab();
	
	echo $this->StartTab('options', $params);


	$this->smarty->assign('startform', $this->CreateFormStart($id, 'updateoptions'));
	$this->smarty->assign('endform', $this->CreateFormEnd());

	$this->smarty->assign('spamprotect_text', $this->Lang('helpspamprotect'));
	$this->smarty->assign('spamprotect_input', $this->CreateInputCheckbox($id, 'spamprotect', 1, $this->GetPreference('spamprotect', 1)));


	$this->smarty->assign('moderate_text', $this->Lang('helpmoderate'));
	$this->smarty->assign('moderate_input', $this->CreateInputCheckbox($id, 'moderate', 1, $this->GetPreference('moderate', 0)));

	$this->smarty->assign('notify_text',  $this->Lang('helpnotify'));
	$this->smarty->assign('notify_input', $this->CreateInputText($id, 'notify', $this->GetPreference('notify', ''), '50', '255'));

	$this->smarty->assign('disable_html_text', $this->Lang('help_disable_html'));
	$this->smarty->assign('disable_html_input', $this->CreateInputCheckbox($id, 'disable_html', 1, $this->GetPreference('disable_html')));
	
	$this->smarty->assign('akismet_check_text', $this->Lang('help_akismet_check'));
	$this->smarty->assign('akismet_check_input', $this->CreateInputCheckbox($id, 'akismet_check', 1, $this->GetPreference('akismet_check')));

	$this->smarty->assign('enable_trackbacks_text', $this->Lang('help_enable_trackbacks'));
	$this->smarty->assign('enable_trackbacks_input', $this->CreateInputCheckbox($id, 'enable_trackbacks', 1, $this->GetPreference('enable_trackbacks')));
	
	$this->smarty->assign('enable_trackback_backlink_check_text', $this->Lang('help_enable_trackback_backlink_check'));
	$this->smarty->assign('enable_trackback_backlink_check_input', $this->CreateInputCheckbox($id, 'enable_trackback_backlink_check', 1, $this->GetPreference('enable_trackback_backlink_check')));
	
	$this->smarty->assign('enable_cookie_support_text', $this->Lang('help_enable_cookie_support'));
	$this->smarty->assign('enable_cookie_support_input', $this->CreateInputCheckbox($id, 'enable_cookie_support', 1, $this->GetPreference('enable_cookie_support')));
	
	$this->smarty->assign('submit', $this->CreateInputSubmit($id, 'optionssubmitbutton', $this->Lang('submit')));

	echo $this->ProcessTemplate('settingspanel.tpl');

	echo $this->EndTab();
}

echo $this->EndTabContent();		

# vim:ts=4 sw=4 noet
?>