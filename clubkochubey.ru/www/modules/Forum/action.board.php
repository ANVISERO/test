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
#$Id: action.board.php 105 2010-05-03 15:43:18Z alby $

if(!isset($gCms)) exit;

$arr_url=array();
if(isset($params['lang'])) $arr_url['lang'] = $params['lang'];
$arr_url['prev_link'] = 'default';

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



$forum_det = $this->GetForumDetails($forum_id);

$q = "SELECT id as topic_id, poster_id as startedby_id, poster_time as startedby_time, last_post_id as post_id, last_poster_id, last_poster_time, subject, closed, sticky, views, status, posts_count
	FROM ". CMS_TABLE_FORUM_TOPICS ."
	WHERE forum_id = ?
	ORDER BY sticky DESC, last_poster_time DESC";

$startelement=0;
$pagecount=-1; //number of pages from query
$pagelimit = (empty($forum_det['topic_pagelimit'])) ? 999 : $forum_det['topic_pagelimit'];
$pagenumber = (!isset($params['topic_pagenumber'])) ? 1 : $params['topic_pagenumber'];

#get the total number of items that match the query and determine a number of pages
$count = $forum_det['topics_count'];

if($count > $pagelimit)
{
	$pagecount = (int)($count / $pagelimit);
	if(($count % $pagelimit) != 0) $pagecount++;

	#if given a page number, determine a start element
	if(isset($params['topic_pagenumber']) && $params['topic_pagenumber'] != '')
	{
		$pagenumber = (int)$params['topic_pagenumber'];
		$startelement = ($pagenumber-1) * $pagelimit;
	}

	#Assign some pagination variables to smarty
	if($pagenumber == 1)
	{
		$smarty->assign('firstpage', $this->Lang('firstpage'));
		$smarty->assign('prevpage', $this->Lang('prevpage'));
	}
	else
	{
		$smarty->assign('firstpage', $this->forumPrettyURL($id, 'board', $returnid, $this->Lang('firstpage'), $arr_url, '', false, $forum_id, 1));
		$smarty->assign('prevpage', $this->forumPrettyURL($id, 'board', $returnid, $this->Lang('prevpage'), $arr_url, '', false, $forum_id, $pagenumber-1));
	}

	if($pagenumber >= $pagecount)
	{
		$smarty->assign('nextpage',$this->Lang('nextpage'));
		$smarty->assign('lastpage',$this->Lang('lastpage'));
	}
	else
	{
		$smarty->assign('nextpage', $this->forumPrettyURL($id, 'board', $returnid, $this->Lang('nextpage'), $arr_url, '', false, $forum_id, $pagenumber+1));
		$smarty->assign('lastpage', $this->forumPrettyURL($id, 'board', $returnid, $this->Lang('lastpage'), $arr_url, '', false, $forum_id, $pagecount));
	}
}

$smarty->assign('pagenumber',$pagenumber);
$smarty->assign('pagecount',$pagecount);

$dbresult =& $db->SelectLimit($q, $pagelimit, $startelement, array($forum_id));

$items=array();
while($dbresult && $row=$dbresult->FetchRow())
{
	$onerow = new stdClass;
	if(!empty($row['status']) && $row['status']!='published')
	{
		if($this->CheckForumPermission('approval_post', $forum_id))
		{
			$icon = ($row['status'] == 'spam') ? 'spam.png' : 'approve.png';
			$onerow->approve_topic_content = '<img src="'.$this->ModuleData['ImageUrl'].$icon.'" alt="'.$this->Lang('approve_topic_label').'" title="'.$this->Lang('approve_topic_label').'" />';
			$onerow->approve_topic_url = $this->forumPrettyURL($id, 'edit_topic', $returnid, '', $arr_url, $this->Lang('approve_topic_warning'), true, $row['topic_id'], 'approve');
			$onerow->approve_topic_link = $this->forumPrettyURL($id, 'edit_topic', $returnid, $onerow->approve_topic_content, $arr_url, $this->Lang('approve_topic_warning'), false, $row['topic_id'], 'approve');
		}
		else
		{
			continue;
		}
	}

	if($row['startedby_id']<>0 && $this->IsLogged())
		$onerow->startedby = $this->forumPrettyURL($id, 'profile', $returnid, $this->GetPropertyFEU($row['startedby_id'], $forum_det['property-feu']), array_merge($arr_url, array('uid'=>$row['startedby_id'])), '', false, $forum_id, $row['startedby_id']);
	else
		$onerow->startedby = $this->GetPropertyFEU($row['startedby_id'], $forum_det['property-feu']);
	$onerow->startedby_time = $this->FormatDate($row['startedby_time']);

	if($row['last_poster_id']<>0 && $this->IsLogged())
		$onerow->lastposter = $this->forumPrettyURL($id, 'profile', $returnid, $this->GetPropertyFEU($row['last_poster_id'], $forum_det['property-feu']), array_merge($arr_url, array('uid'=>$row['last_poster_id'])), '', false, $forum_id, $row['last_poster_id']);
	else
		$onerow->lastposter = $this->GetPropertyFEU($row['last_poster_id'], $forum_det['property-feu']);
	$onerow->lastposter_time = $this->FormatDate($row['last_poster_time']);

	$onerow->topic_content = $row['subject'];
	$onerow->topic_url = $this->forumPrettyURL($id, 'topic', $returnid, '', $arr_url, '', true, $forum_id, $row['topic_id'], 1);
	$onerow->topic_link = $this->forumPrettyURL($id, 'topic', $returnid, $onerow->topic_content, $arr_url, '', false, $forum_id, $row['topic_id'], 1);

	$onerow->post_id = $row['post_id'];
	$onerow->post_url = $this->forumPrettyURL($id, 'topic', $returnid, '', $arr_url, '', true, $forum_id, $row['topic_id'], 1);

	$onerow->views = $row['views'];
	$onerow->posts_count = $row['posts_count'];

	$onerow->icon = '<img src="'.$this->ModuleData['ImageUrl'].'topic.png" alt="'.$this->Lang('topic').'" title="'.$this->Lang('topic').'" />';
	if(!empty($row['sticky']) || !empty($row['closed']))
	{
		if(!empty($row['sticky']))
		{
			$onerow->icon = '<img src="'.$this->ModuleData['ImageUrl'].'topic_sticky.png" alt="'.$this->Lang('topic_sticky').'" title="'.$this->Lang('topic_sticky').'" />';
		}
		elseif(!empty($row['closed']))
		{
			$onerow->icon = '<img src="'.$this->ModuleData['ImageUrl'].'topic_closed.png" alt="'.$this->Lang('topic_closed').'" title="'.$this->Lang('topic_closed').'" />';
		}

		if( $this->IsModerator($forum_id) )
		{
			$onerow->reset_topic_content = '<img src="'.$this->ModuleData['ImageUrl'].'reset_topic.png" alt="'.$this->Lang('topic_reset').'" title="'.$this->Lang('topic_reset').'" />';
			$onerow->reset_topic_url = $this->forumPrettyURL($id, 'edit_topic', $returnid, '', $arr_url, '', true, $row['topic_id'], 'reset');
			$onerow->reset_topic_link = $this->forumPrettyURL($id, 'edit_topic', $returnid, $onerow->reset_topic_content, $arr_url, '', false, $row['topic_id'], 'reset');
		}
	}
	else
	{
		if( $this->IsModerator($forum_id) )
		{
			$onerow->sticky_topic_content = '<img src="'.$this->ModuleData['ImageUrl'].'topic_edit_sticky.png" alt="'.$this->Lang('topic_sticky').'" title="'.$this->Lang('topic_sticky').'" />';
			$onerow->sticky_topic_url = $this->forumPrettyURL($id, 'edit_topic', $returnid, '', $arr_url, '', true, $row['topic_id'], 'sticky');
			$onerow->sticky_topic_link = $this->forumPrettyURL($id, 'edit_topic', $returnid, $onerow->sticky_topic_content, $arr_url, '', false, $row['topic_id'], 'sticky');

			$onerow->closed_topic_content = '<img src="'.$this->ModuleData['ImageUrl'].'topic_edit_closed.png" alt="'.$this->Lang('topic_closed').'" title="'.$this->Lang('topic_closed').'" />';
			$onerow->closed_topic_url = $this->forumPrettyURL($id, 'edit_topic', $returnid, '', $arr_url, '', true, $row['topic_id'], 'closed');
			$onerow->closed_topic_link = $this->forumPrettyURL($id, 'edit_topic', $returnid, $onerow->closed_topic_content, $arr_url, '', false, $row['topic_id'], 'closed');
		}
	}

	if( $this->IsModerator($forum_id) )
	{
		$onerow->delete_topic_content = '<img src="'.$this->ModuleData['ImageUrl'].'topic_delete.png" alt="'.$this->Lang('topic_delete_label').'" title="'.$this->Lang('topic_delete_label').'" />';
		$onerow->delete_topic_url = $this->forumPrettyURL($id, 'edit_topic', $returnid, '', $arr_url, $this->Lang('topic_delete_warning'), true, $row['topic_id'], 'delete');
		$onerow->delete_topic_link = $this->forumPrettyURL($id, 'edit_topic', $returnid, $onerow->delete_topic_content, $arr_url, $this->Lang('topic_delete_warning'), false, $row['topic_id'], 'delete');
	}

	$items[] = $onerow;
}


if(isset($params['message'])) $smarty->assign('message', $this->cleanString($params['message']));
$smarty->assign('itemcount', count($items));
$smarty->assign('items', $items);
$smarty->assign('board_content', $forum_det['name']);


#display only is allowed
if($this->CheckForumPermission('new_topic', $forum_id))
{
	$new_topic_content = '<img src="'.$this->ModuleData['ImageUrl'].'topic_new.png" alt="'.$this->Lang('new_topic_label').'" title="'.$this->Lang('new_topic_label').'" />' . $this->Lang('new_topic_label');
	$smarty->assign('new_topic_content', $new_topic_content);
	$smarty->assign('new_topic_url', $this->forumPrettyURL($id, 'new_topic', $returnid, '', $arr_url, '', true, $forum_id));
	$smarty->assign('new_topic_link', $this->forumPrettyURL($id, 'new_topic', $returnid, $new_topic_content, $arr_url, '', false, $forum_id));
}


$this->TreeManager->initTree($this, $this->customField, $this->lang);
$breadcrumbs = $this->TreeManager->getBreadcrumbs('id', $forum_id, '');
if( $breadcrumbs )
{
	$breadcrumbs = $this->forumBreadcrumbs($breadcrumbs, $arr_url, $forum_id, $id, $returnid);
}
$smarty->assign('breadcrumbs', $breadcrumbs);


echo $this->ProcessTemplateFromDatabase('forum');
?>
