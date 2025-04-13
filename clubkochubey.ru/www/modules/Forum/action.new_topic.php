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
#$Id: action.new_topic.php 103 2010-05-01 19:58:22Z alby $

if(!isset($gCms)) exit;

$arr_url=array();
if(isset($params['lang'])) $arr_url['lang'] = $params['lang'];
$arr_url['prev_link'] = 'new_topic';

if($this->LoadDataModule() !== true)
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->LoadDataModule());

if(false !== $this->IsBanned())
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('banned').$this->IsBanned());


$forum_id = (int)@$params['fid'];
$arr_url['fid'] = $forum_id;
if(!$this->CheckForumPermission('default', $forum_id))
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('forum_access'));

if(!empty($params['forum']))
{
	if(!$forum = $this->CheckForumParam($params, $forum_id))
		return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('forum_access'));

	$arr_url['forum'] = $params['forum'];
}

#check if user is allowed to create new topics here
if(!$this->CheckForumPermission('new_topic', $forum_id))
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('no_permission_frontend'));


$forum_det = $this->GetForumDetails($forum_id);

if(isset($params['submit']))
{
	if(!$this->CheckForumPermission('new_post', $forum_id))
		return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('no_permission_frontend'));

	if(!empty($params['topic_subject']))
		$params['topic_subject'] = $this->cleanString($params['topic_subject']);
	if(empty($params['topic_subject']))
	{
		$params['message'] = $this->Lang('topic_subject_empty');
		$error = true;
	}

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
		$status = $this->CheckForumPermission('approval_post', $forum_id, 'published') ? 'published':'on_approve';

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

		$topic_id = $db->GenID(CMS_TABLE_FORUM_TOPICS.'_seq');
		$arr_url['tid'] = $topic_id;
		$user_time=time();

		$qi = "INSERT INTO ". CMS_TABLE_FORUM_TOPICS ."
			(id, forum_id, poster_id, poster_time, subject, sticky, views, status, posts_count)
			VALUES (?,?,?,?,?,0,0,?,0)";
		$dbresult = $db->Execute($qi, array($topic_id, $forum_id, $this->MyUserData['id'], $user_time, $params['topic_subject'], $status));
		if(!$dbresult) return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('error_sql', 'InsertTopics'));

		$post_id = $db->GenID(CMS_TABLE_FORUM_POSTS.'_seq');
		$qi = "INSERT INTO ". CMS_TABLE_FORUM_POSTS ."
			(id, forum_id, topic_id, poster_id, poster_time, poster_ip, body, body_raw, status)
			VALUES (?,?,?,?,?,?,?,?,?)";
		$dbresult = $db->Execute($qi, array($post_id, $forum_id, $topic_id, $this->MyUserData['id'], $user_time, $this->MyUserData['ip'], $body, $body_raw, $status));
		if(!$dbresult) return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('error_sql', 'InsertPosts'));

		if($this->ApprovePost($status, $forum_id, $topic_id, $post_id, $this->MyUserData['id'], 0, $params['topic_subject'], $body))
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
		$parms['poster_id'] = $this->MyUserData['id'];
		$parms['poster_email'] = $this->MyUserData['email'];
		$parms['poster_time'] = $user_time;
		$parms['poster_ip'] = $this->MyUserData['ip'];
		$parms['subject'] = $params['topic_subject'];
		$parms['body_raw'] = $body_raw;
		$parms['body'] = $body;
		$parms['status'] = $status;
		$parms['result'] = $result;
		$this->SendEvent('OnNewTopic',$parms);

		if($forum_det['redirect'] == 'board') $arr_url['post_pagenumber'] = $this->findMultiPagePost($topic_id);
		$this->Redirect($id, $forum_det['redirect'], $returnid, $arr_url, true);
	}
}


if(isset($params['message'])) $smarty->assign('message', $this->cleanString($params['message']));
$arr_localurl = array('action'=>'new_topic', 'returnid'=>$returnid);
$smarty->assign('form_start', $this->CreateFormStart($id, 'new_topic', $returnid, 'post', '', true, '', array_merge($arr_url,$arr_localurl)));
$smarty->assign('form_end', $this->CreateFormEnd());
$smarty->assign('form_submit', $this->CreateInputSubmit($id, 'submit', $this->Lang('post_submit')));

$smarty->assign('topic_subject_label', $this->CreateLabelForInput($id, 'topic_subject', $this->Lang('topic_subject_label')));
$smarty->assign('topic_subject_input', $this->CreateInputText($id, 'topic_subject', '', '40', '255'));
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


$this->TreeManager->initTree($this, $this->customField, $this->lang);
$breadcrumbs = $this->TreeManager->getBreadcrumbs('id', $forum_id, '');
if( $breadcrumbs )
{
	$breadcrumbs[] = array('name'=>$this->Lang('new_topic_label'));
	$breadcrumbs = $this->forumBreadcrumbs($breadcrumbs, $arr_url, $forum_id, $id, $returnid);
}
$smarty->assign('breadcrumbs', $breadcrumbs);


echo $this->ProcessTemplateFromDatabase('new_topic');
?>