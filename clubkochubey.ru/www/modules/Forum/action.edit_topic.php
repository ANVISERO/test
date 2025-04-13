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
#$Id: action.edit_topic.php 102 2010-04-27 21:01:44Z alby $

if(!isset($gCms)) exit;

$arr_url=array();
if(isset($params['lang'])) $arr_url['lang'] = $params['lang'];
$arr_url['prev_link'] = 'edit_topic';

if($this->LoadDataModule() !== true)
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->LoadDataModule());

if(false !== $this->IsBanned())
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('banned').$this->IsBanned());


$topic_id = (int)@$params['tid'];
$arr_url['tid'] = $topic_id;
if(!$forum_id = $this->GetForumIDFromTopicID($topic_id))
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('forum_access'));

$forum_id = (int)$forum_id;
$arr_url['fid'] = $forum_id;
if(!$this->CheckForumPermission('default', $forum_id))
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('forum_access'));

if(!empty($params['forum']))
{
	if(!$forum = $this->CheckForumParam($params, $forum_id))
		return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('forum_access'));

	$arr_url['forum'] = $params['forum'];
}

#check if user is allowed to edit topics
if(!$this->CheckForumPermission('edit_topic', $forum_id))
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('no_permission_frontend'));


$forum_det = $this->GetForumDetails($forum_id);

$noerror=false;
switch($params['edit'])
{
	case 'delete':
		$q = "SELECT id as post_id, poster_id
			FROM ". CMS_TABLE_FORUM_POSTS ."
			WHERE topic_id = ?
			ORDER BY id DESC";
		$dbresult =& $db->Execute($q, array($topic_id));
		while($dbresult && $row=$dbresult->FetchRow())
		{
			if(!$noerror = $this->DeletePost($row['post_id'], $topic_id, $forum_id, $row['poster_id']))
				break;
		}
		break;

	case 'move':
		$newforum_id = (int)@$params['newfid'];
		$q = "SELECT posts_count
			FROM ". CMS_TABLE_FORUM_TOPICS ."
			WHERE id = ?";
		$dbresult = $db->SelectLimit($q, 1, 0, array($topic_id));
		if(!empty($newforum_id) && $dbresult && $row=$dbresult->FetchRow())
		{
			$qu = "UPDATE ". CMS_TABLE_FORUM_POSTS ."
				SET forum_id = ?
				WHERE topic_id = ?";
			$dbresult = $db->Execute($qu, array($newforum_id, $topic_id));
			if(!$dbresult) break;

			$qu = "UPDATE ". CMS_TABLE_FORUM_TOPICS ."
				SET forum_id = ?
				WHERE id = ?";
			$dbresult = $db->Execute($qu, array($newforum_id, $topic_id));
			if( $dbresult )
			{
				$this->TreeManager->initTree($this, $this->customField, $this->lang);
				$old_input = array('topics_count'=>$forum_det['topics_count']-1, 'posts_count'=>$forum_det['posts_count']-$row['posts_count']);
				if( $this->TreeManager->updateCustom($forum_id, $old_input) )
				{
					$newforum_det = $this->GetForumDetails($newforum_id);
					$new_input = array('topics_count'=>$newforum_det['topics_count']+1, 'posts_count'=>$newforum_det['posts_count']+$row['posts_count']);
					if( $this->TreeManager->updateCustom($newforum_id, $new_input) )
						$noerror = true;
				}
			}
		}
		break;

	case 'sticky':
		$qu = "UPDATE ". CMS_TABLE_FORUM_TOPICS ."
			SET sticky = 1
			WHERE id = ?";
		$dbresult = $db->Execute($qu, array($topic_id));
		if( $dbresult ) $noerror = true;
		break;

	case 'closed':
		$qu = "UPDATE ". CMS_TABLE_FORUM_TOPICS ."
			SET closed = 1
			WHERE id = ?";
		$dbresult = $db->Execute($qu, array($topic_id));
		if( $dbresult ) $noerror = true;
		break;

	case 'reset':
		$qu = "UPDATE ". CMS_TABLE_FORUM_TOPICS ."
			SET sticky = 0, closed = 0
			WHERE id = ?";
		$dbresult = $db->Execute($qu, array($topic_id));
		if( $dbresult ) $noerror = true;
		break;

	case 'approve':
		if($this->CheckForumPermission('approval_post', $forum_id, 'published'))
		{
			$q = "SELECT p.id as post_id, p.poster_id, p.body,
				t.subject, t.posts_count
				FROM ". CMS_TABLE_FORUM_TOPICS ." AS t
				LEFT JOIN ". CMS_TABLE_FORUM_POSTS ." AS p ON (t.id=p.topic_id)
				WHERE p.status != 'published' AND t.id = ? ORDER BY p.id";
			$dbresult = $db->Execute($q, array($topic_id));
			while($dbresult && $row=$dbresult->FetchRow())
			{
				if(!$noerror = $this->ApprovePost('published', $forum_id, $topic_id, $row['post_id'], $row['poster_id'], $row['posts_count'], $row['subject'], $row['body']))
					break;
			}
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