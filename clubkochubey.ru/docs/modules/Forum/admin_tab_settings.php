<?php
#-------------------------------------------------------------------------
# Forum Made Simple - a threaded multi-forum message board
# http://dev.cmsmadesimple.org/projects/forummadesimple
# 2006-2007 (c) tamlyn (Tamlyn Rhodes)
# 2007-2010 (c) alby (Alberto Benati)
#------------------------------------------------------------------------
# CMS Made Simple is (c) 2005-2010 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://cmsmadesimple.org
#------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
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
#------------------------------------------------------------------------
#$Id: admin_tab_settings.php 102 2010-04-27 21:01:44Z alby $

if(!isset($gCms)) exit;

echo $this->StartTab('settings');

$smarty->assign('form_start', $this->CreateFormStart($id, 'admin_save_settings', $returnid));
$smarty->assign('form_end', $this->CreateFormEnd());
$smarty->assign('form_submit', $this->CreateInputSubmit($id, 'form_submit', $this->Lang('save_submit')));

$defs=array();
$defs['None']='';

$defns =& $this->FrontEndUsers->GetPropertyDefns();
if(false !== $defns)
	foreach($defns as $defn) $defs[$defn['prompt']] = $defn['name'];

$smarty->assign('enable_report_moderators_input',
	$this->CreateInputCheckbox($id, 'enable_report_moderators', 1, $this->GetPreference('enable_report_moderators')));
$smarty->assign('avatar_property_name_input',
	$this->CreateInputDropdown($id, 'avatar_property_name', $defs, -1, $this->GetPreference('avatar_property_name')));

$smarty->assign('topic_pagelimit_input',
	$this->CreateInputText($id, 'topic_pagelimit', $this->GetPreference('topic_pagelimit', 999), '4', '4'));
$smarty->assign('post_pagelimit_input',
	$this->CreateInputText($id, 'post_pagelimit', $this->GetPreference('post_pagelimit', 999), '4', '4'));
$smarty->assign('ranking_input',
	$this->CreateInputText($id, 'ranking', $this->GetPreference('ranking', '25,50,100,200'), '30', '30'));
$smarty->assign('bbcode_input',
	$this->CreateInputCheckbox($id, 'use_bbcode', 1, $this->GetPreference('use_bbcode', '1')));

$captchamodule =& $this->GetModuleInstance('Captcha');
if($captchamodule)
{
	$smarty->assign('captcha_input',
		$this->CreateInputCheckbox($id, 'use_captcha', 1, $this->GetPreference('use_captcha', '0')));
	$help = $this->Lang('captcha_found');
}
else
{
	$smarty->assign('captcha_input', '');
	$help = $this->Lang('captcha_not_found');
}
$smarty->assign('captcha_comment', $help);

$akismetmodule =& $this->GetModuleInstance('AkismetCheck');
if($akismetmodule)
{
	$smarty->assign('akismet_input',
		$this->CreateInputCheckbox($id, 'use_akismet', 1, $this->GetPreference('use_akismet', '0')));
	$help = $this->Lang('akismet_found');
}
else
{
	$smarty->assign('akismet_input', '');
	$help = $this->Lang('akismet_not_found');
}
$smarty->assign('akismet_comment', $help);

$smarty->assign('forumpage_input',
	$this->CreateInputText($id, 'forumpage', $this->GetPreference('forumpage', ''), '30', '30'));


echo $this->ProcessTemplate('admin_settings.tpl');

echo $this->EndTab()."\n\n";
?>