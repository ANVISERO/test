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
#$Id: action.reply_topic.php 103 2010-05-01 19:58:22Z alby $

if(!isset($gCms)) exit;

$arr_url=array();
if(isset($params['lang'])) $arr_url['lang'] = $params['lang'];
$arr_url['prev_link'] = 'reply_topic';

if($this->LoadDataModule() !== true)
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->LoadDataModule());

if(false !== $this->IsBanned())
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('banned').$this->IsBanned());


$post_id = (int)@$params['pid'];

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

$q = "SELECT poster_id, poster_time, subject, posts_count
	FROM ". CMS_TABLE_FORUM_TOPICS ."
	WHERE id = ?";
$dbresult =& $db->Execute($q, array($topic_id));
if($dbresult && $row=$dbresult->FetchRow())
{
	$topic_content = $row['subject'];
	$smarty->assign('topic_content', $topic_content);
}


#check if user is allowed to edit topics
if(!$this->CheckForumPermission('reply_topic', $forum_id))
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('no_permission_frontend'));


$forum_det = $this->GetForumDetails($forum_id);


if(isset($params['submit']))
{
	if(!$this->CheckForumPermission('new_post', $forum_id))
		return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('no_permission_frontend'));

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

		if($status != 'published')
		{
			$qu = "UPDATE ". CMS_TABLE_FORUM_TOPICS ."
				SET status = ?
				WHERE id = ?";
			$dbresult = $db->Execute($qu, array($status, $topic_id));
			if(!$dbresult) return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('error_sql', 'UpdateTopics'));
		}

		$user_time=time();
		$post_id = $db->GenID(CMS_TABLE_FORUM_POSTS.'_seq');
		$qi = "INSERT INTO ". CMS_TABLE_FORUM_POSTS ."
			(id, forum_id, topic_id, poster_id, poster_time, poster_ip, body, body_raw, status)
			VALUES (?,?,?,?,?,?,?,?,?)";
		$dbresult = $db->Execute($qi, array($post_id, $forum_id, $topic_id, $this->MyUserData['id'], $user_time, $this->MyUserData['ip'], $body, $body_raw, $status));
		if(!$dbresult) return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('error_sql', 'InsertPosts'));

		if($this->ApprovePost($status, $forum_id, $topic_id, $post_id, $this->MyUserData['id'], $row['posts_count'], $row['subject'], $body))
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
		$parms['first_poster_id'] = $row['poster_id'];
		$parms['first_poster_email'] = (empty($row['poster_id'])) ? '' : $this->FrontEndUsers->GetEmail($row['poster_id']);
		$parms['first_poster_time'] = $row['poster_time'];
		$parms['poster_id'] = $this->MyUserData['id'];
		$parms['poster_email'] = $this->MyUserData['email'];
		$parms['poster_time'] = $user_time;
		$parms['poster_ip'] = $this->MyUserData['ip'];
		$parms['subject'] = $row['subject'];
		$parms['body_raw'] = $body_raw;
		$parms['body'] = $body;
		$parms['status'] = $status;
		$parms['result'] = $result;
		$this->SendEvent('OnReplyPost',$parms);

		if($forum_det['redirect'] == 'board') $arr_url['post_pagenumber'] = $this->findMultiPagePost($topic_id);
		$this->Redirect($id, $forum_det['redirect'], $returnid, $arr_url, true);
	}
}



if(isset($params['message'])) $smarty->assign('message', $this->cleanString($params['message']));
$arr_localurl = array('action'=>'reply_topic', 'returnid' => $returnid);
$smarty->assign('form_start', $this->CreateFormStart($id, 'reply_topic', '', 'post', '', true, '', array_merge($arr_url,$arr_localurl)));
$smarty->assign('form_end', $this->CreateFormEnd());
$smarty->assign('form_submit', $this->CreateInputSubmit($id, 'submit', $this->Lang('post_submit')));

$smarty->assign('post_body_label', $this->CreateLabelForInput($id, 'post_body', $this->Lang('post_body_label')));
if($this->testProperty($forum_id, 'use_bbcode', 1, 1))
	$smarty->assign('post_body_input', $this->createTextareaBBCode($id, '', 'post_body', '54', '7'));
else
	$smarty->assign('post_body_input', $this->CreateTextarea(false, $id, '', 'post_body', '', '', '', '', '54', '7'));

if($this->testProperty($forum_id, 'use_captcha', 1, 0))
{
	$captcha =& $this->getModuleInstance('Captcha');
	if($captcha)
	{
		$smarty->assign('captcha_image', $captcha->getCaptcha());
		$smarty->assign('captcha_input', $this->CreateInputText($id, 'fmscode', ''));
	}
}


$q = "SELECT id, poster_id, poster_time, body_raw, body
	FROM ". CMS_TABLE_FORUM_POSTS ."
	WHERE topic_id = ? ORDER BY poster_time DESC";
$dbresult =& $db->Execute($q, array($topic_id));

$items = array();
while($dbresult && $row=$dbresult->FetchRow())
{
	$onerow = new stdClass;
	$onerow->id = $row['id'];
	$poster_name = $this->GetPropertyFEU($row['poster_id'], $forum_det['property-feu']);
	if($row['poster_id']<>0 && $this->IsLogged())
		$onerow->poster = $this->forumPrettyURL($id, 'profile', $returnid, $poster_name, array_merge($arr_url, array('uid'=>$row['poster_id'])), '', false, $forum_id, $row['poster_id']);
	else
		$onerow->poster = $poster_name;
	$onerow->poster_time = $this->FormatDate($row['poster_time']);
	$onerow->body = nl2br($row['body']);

	if(!empty($post_id) && $post_id==$row['id'])
	{
		$content_body = "[quote=". $poster_name ."]". $row['body_raw'] ."[/quote]\n";
		if($this->testProperty($forum_id, 'use_bbcode', 1, 1))
			$smarty->assign('post_body_input', $this->createTextareaBBCode($id, $content_body, 'post_body', '54', '7'));
		else
			$smarty->assign('post_body_input', $this->CreateTextarea(false, $id, $content_body, 'post_body', '', '', '', '', '54', '7'));
	}

	$items[] = $onerow;
}

$smarty->assign('itemcount', count($items));
$smarty->assign_by_ref('items', $items);


$this->TreeManager->initTree($this, $this->customField, $this->lang);
$breadcrumbs = $this->TreeManager->getBreadcrumbs('id', $forum_id, '');
if( $breadcrumbs )
{
	$breadcrumbs[] = array('name' => $topic_content);
	$breadcrumbs = $this->forumBreadcrumbs($breadcrumbs, $arr_url, $forum_id, $id, $returnid, $topic_id, $topic_content);
	$breadcrumbs[] = $this->Lang('topic_reply_label');
}
$smarty->assign('breadcrumbs', $breadcrumbs);


echo $this->ProcessTemplateFromDatabase('reply');
?>