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
#$Id: action.edit_post.php 99 2010-04-24 20:43:16Z alby $

if(!isset($gCms)) exit;

$arr_url=array();
if(isset($params['lang'])) $arr_url['lang'] = $params['lang'];
$arr_url['prev_link'] = 'edit_post';

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


$q = "SELECT t.subject, t.posts_count, p.poster_id, p.body_raw
	FROM ". CMS_TABLE_FORUM_TOPICS ." AS t, ". CMS_TABLE_FORUM_POSTS ." AS p
	WHERE t.id = p.topic_id AND p.id = ?";
$dbresult =& $db->Execute($q, array($post_id));
if($dbresult && $row=$dbresult->FetchRow())
{
	$topic_content = $row['subject'];
	$posts_count = $row['posts_count'];
	$poster_id = $row['poster_id'];
	$body_raw = $row['body_raw'];

	$arr_url['uid'] = $poster_id;
}

#check if user is allowed to edit this post here
if(!$this->CheckForumPermission('edit_post', $forum_id, $poster_id))
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('no_permission_frontend'));



if(isset($params['submit']))
{
	if($this->testProperty($forum_id, 'use_captcha', 1, 0))
	{
		$captcha =& $this->getModuleInstance('Captcha');
		if($captcha)
		{
			if(!$captcha->checkCaptcha($params['fmscode']))
			{
				$smarty->assign('captcha_error', $this->Lang('captcha_error'));
				$error = true;
			}

		}
	}

	if(!isset($error))
	{
		$body_raw = $this->cleanString($params['post_body'], 'rtrim');
		$body = $this->ProcessPostBody($body_raw);
		$status = $this->CheckForumPermission('approval_post', $forum_id, 'published') ?'published':'on_approve';

		if($this->testProperty($forum_id, 'use_akismet', 1, 0) && !$this->IsModerator($forum_id))
		{
			$akismetmodule =& $this->GetModuleInstance('AkismetCheck');
			if( $akismetmodule )
			{
				$email = $this->MyUserData['email'];
				if( empty($email) )
				{
					$from = $this->CMSMailer->GetPreference('from');
					$email = (!empty($from)) ? 'guest'. substr($email, strpos($email, '@')) : 'guest@foo.com';
				}
				$_content = array(
					'author'	=> $this->MyUserData['username'],
					'email'		=> $email,
					'body'		=> $body
				);
				if( $akismetmodule->IsSpam($_content) ) $status = 'spam';
			}
		}

		$field='';
		$user_time=time();
		$arr_field = array($status, $topic_id);
		if(!empty($params['topic_subject']))
		{
			$field = 'subject = ?,';
			$arr_field = array_merge(array(trim($params['topic_subject'])), $arr_field);
		}
		$qu = "UPDATE ". CMS_TABLE_FORUM_TOPICS ."
			SET {$field} status = ?, posts_count = posts_count-1
			WHERE id = ?";
		$dbresult = $db->Execute($qu, $arr_field);
		if(!$dbresult) return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('error_sql', 'UpdateTopics'));

		$qu = "UPDATE ". CMS_TABLE_FORUM_POSTS ."
			SET editor_id = ?, editor_time = ?, editor_ip = ?, body = ?, body_raw = ?, status = ?
			WHERE id = ?";
		$dbresult = $db->Execute($qu, array($this->MyUserData['id'], $user_time, $this->MyUserData['ip'], $body, $body_raw, $status, $post_id));
		if(!$dbresult) return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('error_sql', 'UpdatePosts'));

		#Update search index
		$search =& $this->GetModuleInstance('Search');
		if(false !== $search) $search->DeleteWords($this->GetName(), $post_id, 'post');

		if($status != 'published')
		{
			$q = "SELECT id as post_id, poster_id, poster_time
				FROM ". CMS_TABLE_FORUM_POSTS ."
				WHERE topic_id = ? AND status = 'published'
				ORDER BY poster_time DESC";
			$dbresult =& $db->SelectLimit($q, 1, 0, array($topic_id));
			if($dbresult && $row=$dbresult->FetchRow())
			{
				$qu = "UPDATE ". CMS_TABLE_FORUM_TOPICS ."
					SET last_post_id = ?, last_poster_id = ?, last_poster_time = ?
					WHERE id = ?";
				$dbresult = $db->Execute($qu, array($row['post_id'], $row['poster_id'], $row['poster_time'], $topic_id));
				if(!$dbresult) return false;
			}
		}

		$q = "SELECT p.poster_id, p.poster_time,
			t.subject, t.posts_count
			FROM ". CMS_TABLE_FORUM_TOPICS ." AS t
			LEFT JOIN ". CMS_TABLE_FORUM_POSTS ." AS p ON (t.id=p.topic_id)
			WHERE p.id = ?";
		$dbresult =& $db->Execute($q, array($post_id));
		if( $dbresult ) $row=$dbresult->FetchRow();

		$forum_det = $this->GetForumDetails($forum_id);
		if('forum' == $forum_det['type'])
		{
			$input=array();
			if($row['posts_count'] == 0)
			{
				$input['topics_count'] = $forum_det['topics_count']-1;

				#Update search index
				$search =& $this->GetModuleInstance('Search');
				if(false !== $search) $search->DeleteWords($this->GetName(), $topic_id, 'topic');
			}
			$input['posts_count'] = $forum_det['posts_count']-1;

			$this->TreeManager->initTree($this, $this->customField, $this->lang);
			$this->TreeManager->updateCustom($forum_id, $input);

			$set_users = ($row['posts_count']==0) ? ', num_topics = num_topics-1' : '';
			$qu = "UPDATE ". CMS_TABLE_FORUM_USERS ."
				SET num_posts = num_posts-1 {$set_users}
				WHERE user_id = ?";
				$dbresult = $db->Execute($qu, array($row['poster_id']));
				if(!$dbresult) return false;
		}

		if($this->ApprovePost($status, $forum_id, $topic_id, $post_id, $row['poster_id'], $row['posts_count'], $row['subject'], $body))
		{
			$result = true;
			$arr_url['message'] = $this->Lang('action_success');
		}
		elseif($status != 'published')
		{
			$result = false;
			$arr_url['message'] = $this->Lang('post_blocked', $status);
		}
		else
		{
			$result = false;
			$arr_url['message'] = $this->Lang('action_no_success');
		}

		$parms=array();
		$parms['tid'] = $topic_id;
		$parms['fid'] = $forum_id;
		$parms['forum_name'] = $this->GetForumName($forum_id);
		$parms['editor_id'] = $this->MyUserData['id'];
		$parms['editor_email'] = $this->MyUserData['email'];
		$parms['editor_time'] = $user_time;
		$parms['editor_ip'] = $this->MyUserData['ip'];
		$parms['poster_id'] = $row['poster_id'];
		$parms['poster_email'] = (empty($row['poster_id'])) ? '' : $this->FrontEndUsers->GetEmail($row['poster_id']);
		$parms['poster_time'] = $row['poster_time'];
		$parms['subject'] = $row['subject'];
		$parms['body_raw'] = $body_raw;
		$parms['body'] = $body;
		$parms['status'] = $status;
		$parms['result'] = $result;
		$this->SendEvent('OnEditPost',$parms);

		if($forum_det['redirect'] == 'board') $arr_url['post_pagenumber'] = $this->findMultiPagePost($topic_id);
		$this->Redirect($id, $forum_det['redirect'], $returnid, $arr_url, true);
	}
}



if(isset($params['message'])) $smarty->assign('message', $this->cleanString($params['message']));
$arr_localurl = array('action'=>'edit_post', 'returnid'=>$returnid);
$smarty->assign('form_start', $this->CreateFormStart($id, 'edit_post', '', 'post', '', true, '', array_merge($arr_url,$arr_localurl)));
$smarty->assign('form_end', $this->CreateFormEnd());
$smarty->assign('form_submit', $this->CreateInputSubmit($id, 'submit', $this->Lang('post_submit')));

$q = "SELECT id
	FROM ". CMS_TABLE_FORUM_POSTS ."
	WHERE topic_id = ? ORDER BY id ASC";
$dbresult =& $db->SelectLimit($q, 1, 0, array($topic_id));
if($dbresult && $row = $dbresult->FetchRow())
	$first_id = $row['id'];

if($post_id == $first_id)
{
	$smarty->assign('topic_subject_label', $this->CreateLabelForInput($id, 'topic_subject', $this->Lang('topic_subject_label')));
	$smarty->assign('topic_subject_input', $this->CreateInputText($id, 'topic_subject', $topic_content, '40', '255'));
}
else
{
	$smarty->assign('topic_subject_label', $this->Lang('topic_subject_label'));
	$smarty->assign('topic_subject_input', $topic_content);
}
if($this->testProperty($forum_id, 'use_bbcode', 1, 1))
	$smarty->assign('post_body_input', $this->createTextareaBBCode($id, $body_raw, 'post_body', '54', '7'));
else
	$smarty->assign('post_body_input', $this->CreateTextarea(false, $id, $body_raw, 'post_body', '', '', '', '', '54', '7'));

if($this->testProperty($forum_id, 'use_captcha', 1, 0))
{
	$captcha =& $this->getModuleInstance('Captcha');
	if($captcha)
	{
		$smarty->assign('captcha_image', $captcha->getCaptcha());
		$smarty->assign('captcha_input', $this->CreateInputText($id, 'fmscode', ''));
	}
}


$this->TreeManager->initTree($this, $this->customField, $this->lang);
$breadcrumbs = $this->TreeManager->getBreadcrumbs('id', $forum_id, '');
if( $breadcrumbs )
{
	$breadcrumbs[] = array('name' => $topic_content);
	$breadcrumbs = $this->forumBreadcrumbs($breadcrumbs, $arr_url, $forum_id, $id, $returnid, $topic_id, $topic_content);
	$breadcrumbs[] = $this->Lang('post_edit_label');
}
$smarty->assign('breadcrumbs', $breadcrumbs);


echo $this->ProcessTemplateFromDatabase('edit_post');
?>