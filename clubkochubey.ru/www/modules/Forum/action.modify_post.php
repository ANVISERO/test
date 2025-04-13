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
#$Id: action.modify_post.php 99 2010-04-24 20:43:16Z alby $

if(!isset($gCms)) exit;

$arr_url=array();
if(isset($params['lang'])) $arr_url['lang'] = $params['lang'];
$arr_url['prev_link'] = 'modify_post';

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

$noerror=false;
switch($params['edit'])
{
	case 'delete':
		$q = "SELECT poster_id
			FROM ". CMS_TABLE_FORUM_POSTS ."
			WHERE id = ?";
		$dbresult =& $db->Execute($q, array($post_id));
		if($dbresult && $row = $dbresult->FetchRow())
		{
			$poster_id = $row['poster_id'];
			$arr_url['uid'] = $poster_id;
		}

		#check if user is allowed to delete post
		if(!$this->CheckForumPermission('delete_post', $forum_id, $poster_id))
			return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('no_permission_frontend'));

		$noerror = $this->DeletePost($post_id, $topic_id, $forum_id, $poster_id);
		break;

	case 'approve':
		if($this->CheckForumPermission('approval_post', $forum_id, 'published'))
		{
			$q = "SELECT p.poster_id, p.body,
				t.subject, t.posts_count
				FROM ". CMS_TABLE_FORUM_TOPICS ." AS t
				LEFT JOIN ". CMS_TABLE_FORUM_POSTS ." AS p ON (t.id=p.topic_id)
				WHERE p.status != 'published' AND p.id = ?";
			$dbresult = $db->Execute($q, array($post_id));
			if($dbresult && $row=$dbresult->FetchRow())
				$noerror = $this->ApprovePost('published', $forum_id, $topic_id, $post_id, $row['poster_id'], $row['posts_count'], $row['subject'], $row['body']);

		}
		break;
}

if( $noerror )
	$arr_url['message'] = $this->Lang('action_success');
else
	$arr_url['error'] = $this->Lang('action_no_success');

if($forum_det['redirect'] == 'board') $arr_url['post_pagenumber'] = $this->findMultiPagePost($topic_id);
$this->Redirect($id, $forum_det['redirect'], $returnid, $arr_url, true);
?>