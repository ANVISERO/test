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
#$Id: admin_tab_banned.php 102 2010-04-27 21:01:44Z alby $

if(!isset($gCms)) exit;

echo $this->StartTab('banned');


$user_array=array();
$user_banned=0;
$rowclass = 'row1';
$ranks = explode(',', $this->GetPreference('ranking', ''));

$q = "SELECT id, user_id, num_topics, num_posts, banreason
	FROM ". CMS_TABLE_FORUM_USERS ."
	WHERE user_id <> 0 ORDER BY user_id";
$dbresult =& $db->Execute($q);
while($dbresult && $row = $dbresult->FetchRow())
{
	$onerow = new StdClass();
	foreach($row as $key=>$item) $onerow->$key = $item;

	$onerow->rowclass = $rowclass;
	$onerow->username = $this->FrontEndUsers->GetUserName($row['user_id']);
	$onerow->banreason = $this->CreateInputText($id, 'user_'.$row['id'], $row['banreason'], '40', '255');
	if(!empty($row['banreason']))
	{
		$onerow->banned = true;
		$user_banned++;
	}
	else
		$onerow->banned = false;

	$r=0;
	while($r<count($ranks) && $row['num_posts']>=$ranks[$r]) $r++;
	$onerow->rank = $r;

	$user_array[] = $onerow;
	($rowclass=='row1' ? $rowclass='row2' : $rowclass='row1');
}

$smarty->assign('user_items', $user_array);
$smarty->assign('user_itemcount', count($user_array));
$smarty->assign('user_banned', $user_banned);

$smarty->assign('fieldset_user_start', $this->CreateFieldsetStart($id, 'user_start', $this->Lang('banid_label')));
$smarty->assign('form_start', $this->CreateFormStart($id, 'admin_manage_banned', $returnid));
$smarty->assign('form_end', $this->CreateFormEnd());
$smarty->assign('form_submit', $this->CreateInputSubmit($id, 'form_submit', $this->Lang('save_submit')));

$smarty->assign('starimage', '<img src="'.$this->ModuleData['ImageUrl'].'star.gif" alt="star" title="star" />');
$smarty->assign('banid_action', $this->CreateInputHidden($id, 'banned_action', 'user_ban'));
$smarty->assign('fieldset_user_end', $this->CreateFieldsetEnd());


$ip_array=array();
$rowclass = 'row1';

$q = "SELECT id, banip, banreason
	FROM ". CMS_TABLE_FORUM_BANNED ."
	ORDER BY banip";
$dbresult =& $db->Execute($q);
while($dbresult && $row = $dbresult->FetchRow())
{
	$onerow = new StdClass();
	foreach($row as $key=>$item) $onerow->$key = $item;

	$onerow->rowclass = $rowclass;
	$onerow->deletelink = $this->CreateLink($id, 'admin_manage_banned', $returnid, $gCms->variables['admintheme']->DisplayImage('icons/system/delete.gif', $this->Lang('delete'),'','','systemicon'), array('banid'=>$row['id'], 'banned_action'=>'ip_delete'), $this->Lang('banned_delete_warning'));

	$ip_array[] = $onerow;
	($rowclass=='row1' ? $rowclass='row2' : $rowclass='row1');
}

$smarty->assign('ip_items', $ip_array);
$smarty->assign('ip_itemcount', count($ip_array));

$smarty->assign('fieldset_ip_start', $this->CreateFieldsetStart($id, 'ip_start', $this->Lang('banip_label')));
$smarty->assign('form_start', $this->CreateFormStart($id, 'admin_manage_banned', $returnid));
$smarty->assign('form_end', $this->CreateFormEnd());
$smarty->assign('form_submit', $this->CreateInputSubmit($id, 'form_submit', $this->Lang('save_submit')));

$smarty->assign('banip_action', $this->CreateInputHidden($id, 'banned_action', 'ip_new'));
$smarty->assign('banip_input', $this->CreateInputText($id, 'banip', '127.0.0.1', '15', '15'));
$smarty->assign('banreason_input', $this->CreateInputText($id, 'banreason', '', '40', '255'));
$smarty->assign('fieldset_ip_end', $this->CreateFieldsetEnd());


echo $this->ProcessTemplate('admin_banned.tpl');

echo $this->EndTab()."\n\n";
?>