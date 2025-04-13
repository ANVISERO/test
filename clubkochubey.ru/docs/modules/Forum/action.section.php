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
#$Id: action.section.php 99 2010-04-24 20:43:16Z alby $

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

if(!empty($params['forum']))
{
	if(!$forum = $this->CheckForumParam($params, $forum_id))
		return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('forum_access'));

	$arr_url['forum'] = $params['forum'];
}



$forum_det = $this->GetForumDetails($forum_id);

$this->TreeManager->initTree($this, $this->customField, $this->lang);
$subnodes = $this->TreeManager->getSubNodes($forum_det, -1, 'lft', false, 'id');

$items=array();
if( $subnodes )
{
	foreach($subnodes as $row)
	{
		$onerow = new stdClass;
		$onerow->forum_content = $row['name'];

		if('forum' == $row['type'])
		{
			if(!$this->CheckForumPermission('default', $row['id'])) continue;

			$forum_prop = $this->PropertiesForum[$row['id']];

			$onerow->forum_url = $this->forumPrettyURL($id, 'board', $returnid, '', $arr_url, '', true, $row['id'], 1);
			$onerow->forum_link = $this->forumPrettyURL($id, 'board', $returnid, $onerow->forum_content, $arr_url, '', false, $row['id'], 1);

			if(!empty($row['topics_count']))
			{
				$last_posts = $this->GetLastPosts($row['id']);
				$last_det = $last_posts[0];

				if($last_det['startedby_id']<>0 && $this->IsLogged())
					$onerow->startedby = $this->forumPrettyURL($id, 'profile', $returnid, $this->GetPropertyFEU($last_det['startedby_id'], $forum_prop['property-feu']), array_merge($arr_url, array('uid'=>$last_det['startedby_id'])), '', false, $row['id'], $last_det['startedby_id']);
				else
					$onerow->startedby = $this->GetPropertyFEU($last_det['startedby_id'], $forum_prop['property-feu']);
				$onerow->startedby_time = $this->FormatDate($last_det['startedby_time']);

				if($last_det['last_poster_id']<>0 && $this->IsLogged())
					$onerow->lastposter = $this->forumPrettyURL($id, 'profile', $returnid, $this->GetPropertyFEU($last_det['last_poster_id'], $forum_prop['property-feu']), array_merge($arr_url, array('uid'=>$last_det['last_poster_id'])), '', false, $row['id'], $last_det['last_poster_id']);
				else
					$onerow->lastposter = $this->GetPropertyFEU($last_det['last_poster_id'], $forum_prop['property-feu']);
				$onerow->lastposter_time = $this->FormatDate($last_det['last_poster_time']);

				$onerow->topic_content = $last_det['subject'];
				$onerow->topic_url = $this->forumPrettyURL($id, 'topic', $returnid, '', $arr_url, '', true, $row['id'], $last_det['topic_id'], 1);
				$onerow->topic_link = $this->forumPrettyURL($id, 'topic', $returnid, $onerow->topic_content, $arr_url, '', false, $row['id'], $last_det['topic_id'], 1);

				$onerow->post_id = $last_det['post_id'];
				$onerow->post_url = $this->forumPrettyURL($id, 'topic', $returnid, '', $arr_url, '', true, $row['id'], $last_det['topic_id'], 1);
			}
		}
		else
		{
			$onerow->forum_url = $this->forumPrettyURL($id, 'section', $returnid, '', $arr_url, '', true, $row['id'], (empty($params['forum']) ? 0 : $arr_url['forum']), 1);
			$onerow->forum_link = $this->forumPrettyURL($id, 'section', $returnid, $onerow->forum_content, $arr_url, '', false, $row['id'], (empty($params['forum']) ? 0 : $arr_url['forum']), 1);
		}

		foreach($row as $key=>$item) $onerow->$key = $item;
		if(empty($row['forum_icon']))
			$onerow->forum_icon = $this->ModuleData['ImageUrl'].'forum.png';
		else
			$onerow->forum_icon = $row['forum_icon'];

		$items[] = $onerow;
	}
}


if(isset($params['message'])) $smarty->assign('message', $this->cleanString($params['message']));
$smarty->assign('itemcount', count($items));
$smarty->assign('items', $items);

$this->TreeManager->initTree($this, $this->customField, $this->lang);
$breadcrumbs = $this->TreeManager->getBreadcrumbs('id', $forum_id, '');
if( $breadcrumbs )
{
	$breadcrumbs = $this->forumBreadcrumbs($breadcrumbs, $arr_url, $forum_id, $id, $returnid);
}
$smarty->assign('breadcrumbs', $breadcrumbs);


echo $this->ProcessTemplateFromDatabase('index');
?>