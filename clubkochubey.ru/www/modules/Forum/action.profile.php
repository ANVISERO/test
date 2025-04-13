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
#$Id: action.profile.php 103 2010-05-01 19:58:22Z alby $

if(!isset($gCms)) exit;

$arr_url=array();
if(isset($params['lang'])) $arr_url['lang'] = $params['lang'];
$arr_url['prev_link'] = 'profile';

if($this->LoadDataModule() !== true)
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->LoadDataModule());

if(false !== $this->IsBanned())
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('banned').$this->IsBanned());

if(!$this->IsLogged())
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('no_logged'));


$userid = (int)(trim($params['uid']));
if($userid == 0)
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('no_guest_profile'));

$forum_id = (int)(trim($params['fid']));
if($forum_id == 0)
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('action_no_success'));


$arr_url['fid'] = $forum_id;
$arr_url['uid'] = $userid;
if(isset($params['forum'])) $arr_url = trim($params['forum']);



$users_credit = $this->GetStatisticsUser($userid);
if(isset($users_credit[$userid]))
{
	$users_credit[$userid]['rank'] = str_repeat('<img src="'.$this->ModuleData['ImageUrl'].'star.gif" alt="star" title="star" />', $users_credit[$userid]['rank']);
	$smarty->assign('credit', $users_credit[$userid]);
}


$avatar=false;
if(empty($this->PropertiesForum[$forum_id])) $this->GetForumIDProperties($forum_id);
if($userid<>0 && $this->PropertiesForum[$forum_id]['use_avatar'])
{
	$avatarname = $this->GetPreference('avatar_property_name', false);
	if( $avatarname )
	{
		$dir = $this->FrontEndUsers->GetPreference('image_destination_path', 'feusers');
		$file = $this->FrontEndUsers->GetUserPropertyFull($avatarname, $userid);
		if(file_exists(cms_join_path($gCms->config['uploads_path'], $dir, $file)))
		{
			$avatar = $gCms->config['uploads_url'] .'/'. $dir .'/'. $file;
		}
	}
}
$smarty->assign('avatar', $avatar);


$feuproperties = $this->GetPropertiesFEU($userid);
if(!$this->IsModerator($forum_id))
{
	unset($feuproperties['id']);
	unset($feuproperties['email']);
}
$smarty->assign('feuproperties', $feuproperties);

$forum_det = $this->GetForumDetails($forum_id);
$smarty->assign('profile_name', $this->GetPropertyFEU($userid, $forum_det['property-feu']));


$index_content = '&laquo; '.$this->Lang('forum_index');
$smarty->assign('prev_content', $index_content);
$smarty->assign('prev_content_url', $this->forumPrettyURL($id, 'default', $returnid, '', $arr_url, '', true));
$smarty->assign('prev_content_link', $this->forumPrettyURL($id, 'default', $returnid, $index_content, $arr_url, '', false));


echo $this->ProcessTemplateFromDatabase('profile');
?>