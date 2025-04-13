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
#$Id: action.last_posts.php 99 2010-04-24 20:43:16Z alby $

if(!isset($gCms)) exit;

$arr_url=array();
if(isset($params['lang'])) $arr_url['lang'] = $params['lang'];
$arr_url['prev_link'] = 'default';

if($this->LoadDataModule() !== true)
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->LoadDataModule());

if(false !== $this->IsBanned())
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('banned').$this->IsBanned());



$num=5;
if(isset($params['num'])) $num = (int)$params['num'];

$forumpageID=0;
$forumpath='';
$forumpage = $this->GetPreference('forumpage', '');
if(!empty($forumpage))
{
	$contentops =& $gCms->GetContentOperations();
	$contentobj = $contentops->LoadContentFromAlias($forumpage);
	if($contentobj)
	{
		$forumpageID = $contentobj->Id();
		$forumpath = $contentobj->HierarchyPath();
	}
}


$where_in='';
if(!empty($params['forum']))
{
	if(!$forum = $this->CheckForumParam($params))
		return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('forum_access'));

	$arr_url['forum'] = $forum;
	$where_in .= (!empty($forum)) ? "t.forum_id IN ({$forum})" : '';
}


$last_posts = $this->GetLastPosts(0, $num, $where_in);

$items=array();
if(count($last_posts)> 0)
{
	foreach($last_posts as $posts)
	{
		if(!$this->CheckForumPermission('default', $posts['forum_id'])) continue;
		if(empty($this->PropertiesForum[$posts['forum_id']])) $this->GetForumIDProperties($posts['forum_id']);
		$forum_prop = $this->PropertiesForum[$posts['forum_id']];

		$onerow = new stdClass;
		foreach($posts as $key=>$item) $onerow->$key = $item;

		$onerow->startedby = $this->GetPropertyFEU($posts['startedby_id'], $forum_prop['property-feu']);
		$onerow->startedby_time = $this->FormatDate($posts['startedby_time']);
		$onerow->lastposter = $this->GetPropertyFEU($posts['last_poster_id'], $forum_prop['property-feu']);
		$onerow->lastposter_time = $this->FormatDate($posts['last_poster_time']);

		$pagenumber = $this->findMultiPagePost($posts['topic_id']);
		$onerow->topic_link = $this->forumPrettyURL($id, 'topic', (!empty($forumpageID)?$forumpageID:$returnid), $onerow->subject, $arr_url, '', false, $posts['forum_id'], $posts['topic_id'], $pagenumber, $forumpath, false);
		$onerow->url = $this->forumPrettyURL($id, 'topic', (!empty($forumpageID)?$forumpageID:$returnid), '', $arr_url, '', true, $posts['forum_id'], $posts['topic_id'], $pagenumber, $forumpath, false);

		$items[] = $onerow;
	}
}

$smarty->assign('itemcount', count($items));
$smarty->assign('items', $items);


if(! isset($params['assign'])) echo $this->ProcessTemplateFromDatabase('last_posts');
?>