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
#$Id: action.topic.php 102 2010-04-27 21:01:44Z alby $

if(!isset($gCms)) exit;

$arr_url=array();
if(isset($params['lang'])) $arr_url['lang'] = $params['lang'];
$arr_url['prev_link'] = 'topic';

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


$forum_det = $this->GetForumDetails($forum_id);


$q = "SELECT forum_id, poster_id, poster_time, subject, closed, sticky, views, status, posts_count
	FROM ". CMS_TABLE_FORUM_TOPICS ."
	WHERE id = ?";
$dbresult =& $db->SelectLimit($q, 1, 0, array($topic_id));
if($dbresult && $topic_det=$dbresult->FetchRow())
{
	if($topic_det['poster_id']<>0 && $this->IsLogged())
		$startedby = $this->forumPrettyURL($id, 'profile', $returnid, $this->GetPropertyFEU($topic_det['poster_id'], $forum_det['property-feu']), array_merge($arr_url, array('uid'=>$topic_det['poster_id'])), '', false, $forum_id, $topic_det['poster_id']);
	else
		$startedby = $this->GetPropertyFEU($topic_det['poster_id'], $forum_det['property-feu']);
	$smarty->assign('startedby', $startedby);
	$smarty->assign('startedby_time', $this->FormatDate($topic_det['poster_time']));

	$topic_content = $topic_det['subject'];
	$smarty->assign('topic_content', $topic_content);
	$topic_closed = $topic_det['closed'];
}
else
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('forum_access'));


#User statistics & ranking
$users_credit = $this->GetStatisticsUser();


$q = "SELECT id as post_id, poster_id, poster_time, poster_ip, editor_id, editor_time, editor_ip, status, body
	FROM ". CMS_TABLE_FORUM_POSTS ."
	WHERE topic_id = ?
	ORDER BY poster_time ASC";

$startelement=0;
$pagecount=-1; //number of pages from query
$pagelimit = (empty($forum_det['post_pagelimit'])) ? 999 : $forum_det['post_pagelimit'];
$pagenumber = (!isset($params['post_pagenumber'])) ? 1 : $params['post_pagenumber'];

#get the total number of items that match the query and determine a number of pages
$count = $topic_det['posts_count'];

if($count > $pagelimit)
{
	$pagecount = (int)($count / $pagelimit);
	if(($count % $pagelimit) != 0) $pagecount++;

	#if given a page number, determine a start element
	if(isset($params['post_pagenumber']) && $params['post_pagenumber'] != '')
	{
		$pagenumber = (int)$params['post_pagenumber'];
		$startelement = ($pagenumber-1) * $pagelimit;
	}

	#assign some pagination variables to smarty
	if($pagenumber == 1)
	{
		$smarty->assign('firstpage', $this->Lang('firstpage'));
		$smarty->assign('prevpage', $this->Lang('prevpage'));
	}
	else
	{
		$smarty->assign('firstpage', $this->forumPrettyURL($id, 'topic', $returnid, $this->Lang('firstpage'), $arr_url, '', false, $forum_id, $topic_id, 1));
		$smarty->assign('prevpage', $this->forumPrettyURL($id, 'topic', $returnid, $this->Lang('prevpage'), $arr_url, '', false, $forum_id, $topic_id, $pagenumber-1));
	}

	if($pagenumber >= $pagecount)
	{
		$smarty->assign('nextpage',$this->Lang('nextpage'));
		$smarty->assign('lastpage',$this->Lang('lastpage'));
	}
	else
	{
		$smarty->assign('nextpage', $this->forumPrettyURL($id, 'topic', $returnid, $this->Lang('nextpage'), $arr_url, '', false, $forum_id, $topic_id, $pagenumber+1));
		$smarty->assign('lastpage', $this->forumPrettyURL($id, 'topic', $returnid, $this->Lang('lastpage'), $arr_url, '', false, $forum_id, $topic_id, $pagecount));
	}
}

$smarty->assign('pagenumber',$pagenumber);
$smarty->assign('pagecount',$pagecount);

$dbresult =& $db->SelectLimit($q, $pagelimit, $startelement, array($topic_id));


$items=array();
while($dbresult && $row = $dbresult->FetchRow())
{
	$onerow = new stdClass;
	if(!empty($row['status']) && 'published'!=$row['status'])
	{
		if($this->CheckForumPermission('approval_post', $forum_id))
		{
			$icon = ($row['status'] == 'spam') ? 'spam.png' : 'approve.png';
			$onerow->approve_post_content = '<img src="'.$this->ModuleData['ImageUrl'].$icon.'" alt="'.$this->Lang('approve_post_label').'" title="'.$this->Lang('approve_post_label').'" />'.$this->Lang('approve_post_label');
			$onerow->approve_post_url = $this->forumPrettyURL($id, 'modify_post', $returnid, '', $arr_url, $this->Lang('approve_post_warning'), true, $row['post_id'], 'approve');
			$onerow->approve_post_link = $this->forumPrettyURL($id, 'modify_post', $returnid, $onerow->approve_post_content, $arr_url, $this->Lang('approve_post_warning'), false, $row['post_id'], 'approve');
		}
		else
		{
			$smarty->assign('startedby', false);
			$topic_closed = true;
			continue;
		}
	}

	$onerow->post_id = $row['post_id'];
	$onerow->body = $row['body'];
	if($row['poster_id']<>0 && $this->IsLogged())
		$onerow->poster = $this->forumPrettyURL($id, 'profile', $returnid, $this->GetPropertyFEU($row['poster_id'], $forum_det['property-feu']), array_merge($arr_url, array('uid'=>$row['poster_id'])), '', false, $forum_id, $row['poster_id']);
	else
		$onerow->poster = $this->GetPropertyFEU($row['poster_id'], $forum_det['property-feu']);
	$onerow->poster_time = $this->FormatDate($row['poster_time']);
	$onerow->moderator = ($this->userIsModerator($forum_id, $row['poster_id'])) ? true : false;

	$onerow->rank = $users_credit["{$row['poster_id']}"]['rank'];
	$onerow->postings = $users_credit["{$row['poster_id']}"]['num_posts'];
	if( $this->IsModerator($forum_id) ) $onerow->poster_ip = $row['poster_ip'];

	$onerow->avatar=false;
	if($row['poster_id']<>0 && $this->PropertiesForum[$forum_id]['use_avatar'])
	{
		$avatarname = $this->GetPreference('avatar_property_name', false);
		if( $avatarname )
		{
			$dir = $this->FrontEndUsers->GetPreference('image_destination_path', 'feusers');
			$file = $this->FrontEndUsers->GetUserPropertyFull($avatarname, $row['poster_id']);
			if(file_exists(cms_join_path($gCms->config['uploads_path'], $dir, $file)))
			{
				$onerow->avatar = $gCms->config['uploads_url'] .'/'. $dir .'/'. $file;
			}
		}
	}
	$onerow->feuproperties = $this->GetPropertiesFEU($row['poster_id']);

	if($row['editor_time'] <> 0)
	{
		$onerow->editor_time = $this->FormatDate($row['editor_time']);
		$onerow->editor = empty($row['editor_id']) ? '' : $this->GetPropertyFEU($row['editor_id'], $forum_det['property-feu']);
		if( $this->IsModerator($forum_id) ) $onerow->editor_ip = $row['editor_ip'];
	}

	if($this->CheckForumPermission('delete_post', $forum_id, $row['poster_id']))
	{
		$onerow->delete_post_content = '<img src="'.$this->ModuleData['ImageUrl'].'post_delete.png" alt="'.$this->Lang('post_delete_label').'" title="'.$this->Lang('post_delete_label').'" />'.$this->Lang('post_delete_label');
		$onerow->delete_post_url = $this->forumPrettyURL($id, 'modify_post', $returnid, '', $arr_url, $this->Lang('post_delete_warning'), true, $row['post_id'], 'delete');
		$onerow->delete_post_link = $this->forumPrettyURL($id, 'modify_post', $returnid, $onerow->delete_post_content, $arr_url, $this->Lang('post_delete_warning'), false, $row['post_id'], 'delete');
	}

	if($this->CheckForumPermission('edit_post', $forum_id, $row['poster_id']))
	{
		$onerow->edit_post_content = '<img src="'.$this->ModuleData['ImageUrl'].'post_edit.png" alt="'.$this->Lang('post_edit_label').'" title="'.$this->Lang('post_edit_label').'" />'.$this->Lang('post_edit_label');
		$onerow->edit_post_url = $this->forumPrettyURL($id, 'edit_post', $returnid, '', $arr_url, '', true, $row['post_id']);
		$onerow->edit_post_link = $this->forumPrettyURL($id, 'edit_post', $returnid, $onerow->edit_post_content, $arr_url, '', false, $row['post_id']);
	}

	if($this->GetPreference('enable_report_moderators')==1 && $this->CheckForumPermission('report_moderator', $forum_id, $row['poster_id']))
	{
		$onerow->report_moderator_content = $this->Lang('report_moderator');
		$onerow->report_moderator_url = $this->forumPrettyURL($id, 'report_moderator', $returnid, '', $arr_url, '', true, $row['post_id']);
		$onerow->report_moderator_link = $this->forumPrettyURL($id, 'report_moderator', $returnid, $onerow->report_moderator_content, $arr_url, '', false, $row['post_id']);
	}

	if($this->CheckForumPermission('reply_topic', $forum_id) && !$topic_closed)
	{
		$onerow->quote_topic_content = '<img src="'.$this->ModuleData['ImageUrl'].'topic_quote.png" alt="'.$this->Lang('topic_quote_label').'" title="'.$this->Lang('topic_quote_label').'" />'.$this->Lang('topic_quote_label');
		$onerow->quote_topic_url = $this->forumPrettyURL($id, 'reply_topic', $returnid, '', $arr_url, '', true, $topic_id, $row['post_id']);
		$onerow->quote_topic_link = $this->forumPrettyURL($id, 'reply_topic', $returnid, $onerow->quote_topic_content, $arr_url, '', false, $topic_id, $row['post_id']);
	}

	$items[] = $onerow;
}


#Update views on first page
if($pagenumber==1 && !(isset($params['prev_link']) && $params['prev_link']=='edit_post'))
{
	$qu = "UPDATE ". CMS_TABLE_FORUM_TOPICS ."
		SET views = views +1
		WHERE id = ?";
	$dbresult =& $db->Execute($qu, array($topic_id));
}


if(isset($params['message'])) $smarty->assign('message', $this->cleanString($params['message']));
$smarty->assign('itemcount', count($items));
$smarty->assign('items', $items);
$smarty->assign('starimage', '<img src="'.$this->ModuleData['ImageUrl'].'star.gif" alt="star" title="star" />');


#show 'topic closed' message instead link if topic is closed
if($topic_closed)
	$smarty->assign('topic_reply_link', '<img src="'.$this->ModuleData['ImageUrl'].'topic_edit_closed.png" alt="'.$this->Lang('topic_closed').'" title="'.$this->Lang('topic_closed').'" /> '.$this->Lang('topic_closed'));
#display only is allowed
elseif($this->CheckForumPermission('reply_topic', $forum_id))
{
	$reply_topic_content = '<img src="'.$this->ModuleData['ImageUrl'].'topic_reply.png" alt="'.$this->Lang('topic_reply_label').'" title="'.$this->Lang('topic_reply_label').'" />'.$this->Lang('topic_reply_label');
	$smarty->assign('reply_topic_content', $reply_topic_content);
	$smarty->assign('reply_topic_url', $this->forumPrettyURL($id, 'reply_topic', $returnid, '', $arr_url, '', true, $topic_id));
	$smarty->assign('reply_topic_link', $this->forumPrettyURL($id, 'reply_topic', $returnid, $reply_topic_content, $arr_url, '', false, $topic_id));
}
#Approve topic?
if($topic_det['status']!='published' && $this->CheckForumPermission('approval_post', $forum_id))
{
	$approve_topic_content = $this->Lang('approve_topic_label');
	$approve_topic_url = $this->forumPrettyURL($id, 'edit_topic', $returnid, '', $arr_url, $this->Lang('approve_topic_warning'), true, $topic_id, 'approve');
	$approve_topic_link = $this->forumPrettyURL($id, 'edit_topic', $returnid, $approve_topic_content, $arr_url, $this->Lang('approve_topic_warning'), false, $topic_id, 'approve');
	$smarty->assign('approve_topic_url', $approve_topic_url);
	$smarty->assign('approve_topic_link', $approve_topic_link);
}


$this->TreeManager->initTree($this, $this->customField, $this->lang);
$breadcrumbs = $this->TreeManager->getBreadcrumbs('id', $forum_id, '');
if( $breadcrumbs )
{
	$breadcrumbs[] = array('name'=>$topic_content);
	$breadcrumbs = $this->forumBreadcrumbs($breadcrumbs, $arr_url, $forum_id, $id, $returnid);
}
$smarty->assign('breadcrumbs', $breadcrumbs);

if(!isset($approve_topic_link) && $this->IsModerator($forum_id))
{
	$dumps = $this->TreeManager->getTree(-1, 'lft', '', 'type', 'forum', 'id', $forum_id);
	if( $dumps )
	{
		$out = $this->TreeManager->setCmsDropdown($dumps, 'name');
		$smarty->assign('select_move', $this->CreateInputDropdown($id, 'newfid', $out, -1, '', 'class="select_move"'));

		$smarty->assign('form_start', $this->CreateFormStart($id, 'edit_topic', $returnid, 'post', '', true, '', array_merge($arr_url,array('edit'=>'move'))));
		$smarty->assign('form_end', $this->CreateFormEnd());
		$smarty->assign('form_submit', $this->CreateInputSubmit($id, 'submit', $this->Lang('topic_move_label'), 'class="topic_move_label"'));
	}
}


echo $this->ProcessTemplateFromDatabase('topic');
?>