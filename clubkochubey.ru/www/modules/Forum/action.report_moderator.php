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
#$Id: action.report_moderator.php 99 2010-04-24 20:43:16Z alby $

if(!isset($gCms)) exit;

$arr_url=array();
if(isset($params['lang'])) $arr_url['lang'] = $params['lang'];
$arr_url['prev_link'] = 'report_moderator';

if($this->LoadDataModule() !== true)
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->LoadDataModule());

if(false !== $this->IsBanned())
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('banned').$this->IsBanned());


$post_id = (int)@$params['pid'];
$arr_url['pid'] = $post_id;
if(!$_arr = $this->GetForumIDTopicIDFromPostID($post_id))
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('forum_access'));

$forum_id = (int)$_arr[0];
$topic_id = (int)$_arr[1];
$arr_url['fid'] = $forum_id;
$arr_url['tid'] = $topic_id;

if(!$this->CheckForumPermission('default', $forum_id))
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('forum_access'));

if(!empty($params['forum']))
{
	if(!$forum = $this->CheckForumParam($params, $forum_id))
		return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('forum_access'));

	$arr_url['forum'] = $params['forum'];
}


$forum_det = $this->GetForumDetails($forum_id);

$q = "SELECT t.subject, p.poster_id
	FROM ". CMS_TABLE_FORUM_TOPICS ." AS t, ". CMS_TABLE_FORUM_POSTS ." AS p
	WHERE t.id = p.topic_id AND p.id = ?";
$dbresult =& $db->Execute($q, array($post_id));
if($dbresult && $row = $dbresult->FetchRow())
{
	$topic_content = $row['subject'];
	$poster_id = $row['poster_id'];

	$arr_url['uid'] = $poster_id;
}

#check if user is allowed to edit this post here
if(!$this->CheckForumPermission('report_moderator', $forum_id))
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('no_permission_frontend'));



if(isset($params['submit']))
{
	$data=array();
	$data['topic_content'] = $topic_content;
	$data['poster_name'] = $this->GetPropertyFEU($poster_id, $forum_det['property-feu']);
	$data['user_name'] = $this->MyUserData['username'];
	$data['forum_name'] = $forum_det['name'];
	$data['post_comment'] = $this->cleanString($params['report_comment']);
	$data['post_url'] = str_replace('&amp;', '&', $this->forumPrettyURL($id, 'topic', $returnid, '', $arr_url, '', true, $arr_url['fid'], $arr_url['tid'], 1));

	$result = $this->ReportModerator($forum_id, $data);
	if(true !== $result)
		return $this->_DisplayErrorPage($id, $params, $returnid, $result);

	$arr_url['message'] = $this->Lang('report_moderator_final');
	$arr_url['post_pagenumber'] = $this->findMultiPagePost($arr_url['tid']);
	$this->Redirect($id, 'topic', $returnid, $arr_url, true);
}


$arr_localurl = array('action'=>'report_moderator', 'returnid'=>$returnid);
$smarty->assign('form_start', $this->CreateFormStart($id, 'report_moderator', '', 'post', '', true, '', array_merge($arr_url,$arr_localurl)));
$smarty->assign('form_end', $this->CreateFormEnd());
$smarty->assign('form_submit', $this->CreateInputSubmit($id, 'submit', $this->Lang('report_moderator_submit')));

$smarty->assign('report_moderator_header', $this->Lang('report_moderator_header'));
$smarty->assign('report_moderator_input', $this->CreateInputText($id, 'report_comment', '', '35', '50'));

$this->TreeManager->initTree($this, $this->customField, $this->lang);
$breadcrumbs = $this->TreeManager->getBreadcrumbs('id', $forum_id, '');
if( $breadcrumbs )
{
	$breadcrumbs[] = array('name' => $topic_content);
	$breadcrumbs = $this->forumBreadcrumbs($breadcrumbs, $arr_url, $forum_id, $id, $returnid, $topic_id, $topic_content);
	$breadcrumbs[] = $this->Lang('report_moderator');
}
$smarty->assign('breadcrumbs', $breadcrumbs);


echo $this->ProcessTemplateFromDatabase('report_moderator');
?>