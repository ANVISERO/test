<?php
if(!isset($gCms)) exit;

$arr_url = array();
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

if($forum_det = $this->GetForumDetails($forum_id))
	$forum_name = cms_html_entity_decode(trim($forum_det['name']));
$this->smarty->assign('forum_name', $forum_name);

if(isset($params['forum']))
{
	$arr_url['forum'] = $params['forum'];
	if(! $forum = $this->CheckForumParam($params, $forum_name, $forum_id))
		return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('forum_access'));
}



//display only is allowed
if($this->CheckForumPermission('new_topic', $forum_id))
{
	$this->smarty->assign('new_topic_content', '<img src="'.$this->ModuleData['ImageUrl'].'topic_new.png" alt="'.$this->Lang('new_topic_label').'" title="'.$this->Lang('new_topic_label').'" />');
	$this->smarty->assign('new_topic_url', $this->forumPrettyURL($id, 'new_topic', $returnid, '', $arr_url, '', true,  $forum_id));
	$this->smarty->assign('new_topic_link', $this->forumPrettyURL($id, 'new_topic', $returnid, $this->Lang('new_topic_label'), $arr_url, '', false,  $forum_id));
}



$breadcrumbs = array();
$breadcrumbs[] = $this->forumPrettyURL($id, 'default', $returnid, $this->Lang('forum_index'), $arr_url, '', false);
$breadcrumbs[] = $forum_name;
$this->smarty->assign('breadcrumbs', $breadcrumbs);


$query = "SELECT id, poster_id, poster_time, last_poster_id, last_poster_time, subject, closed, sticky, views, status, posts_count
	FROM ".cms_db_prefix()."module_forum_topics
	WHERE forum_id = ?
	ORDER BY sticky DESC, last_poster_time DESC";

$pagelimit = $this->GetPreference('topic_pagelimit', 999);
$pagenumber = $this->GetPreference('topic_pagenumber', 1);
$startelement = 0;
$pagecount = -1; // number of pages from query

// get the total number of items that match the query and determine a number of pages
$count = $forum_det['topics_count'];

$pagecount = (int)($count / $pagelimit);
if(($count % $pagelimit) != 0) $pagecount++;

// if given a page number, determine a start element
if(isset($params['topic_pagenumber']) && $params['topic_pagenumber'] != '')
{
	$pagenumber = (int)$params['topic_pagenumber'];
	$startelement = ($pagenumber-1) * $pagelimit;
}

// Assign some pagination variables to smarty
if($pagenumber == 1)
{
	$smarty->assign('prevpage', $this->Lang('prevpage'));
	$smarty->assign('firstpage', $this->Lang('firstpage'));
}
else
{
	$this->smarty->assign('firstpage', $this->forumPrettyURL($id, 'forum', $returnid, $this->Lang('firstpage'), $arr_url, '', false,  $forum_id, 1));
	$this->smarty->assign('prevpage', $this->forumPrettyURL($id, 'forum', $returnid, $this->Lang('prevpage'), $arr_url, '', false,  $forum_id, $pagenumber-1));
}

if($pagenumber >= $pagecount)
{
	$smarty->assign('nextpage',$this->Lang('nextpage'));
	$smarty->assign('lastpage',$this->Lang('lastpage'));
}
else
{
	$this->smarty->assign('nextpage', $this->forumPrettyURL($id, 'forum', $returnid, $this->Lang('nextpage'), $arr_url, '', false,  $forum_id, $pagenumber+1));
	$this->smarty->assign('lastpage', $this->forumPrettyURL($id, 'forum', $returnid, $this->Lang('lastpage'), $arr_url, '', false,  $forum_id, $pagecount));
}
$smarty->assign('pagenumber',$pagenumber);
$smarty->assign('pagecount',$pagecount);
$smarty->assign('oftext',$this->Lang('prompt_of'));
$smarty->assign('pagetext',$this->Lang('prompt_page'));

if($pagelimit < 999)
{
	$dbresult = $db->SelectLimit($query, $pagelimit, $startelement, array($forum_id));
}
else
{
	$dbresult =& $db->Execute($query, array($forum_id));
}


$items=array();
while($dbresult && $row = $dbresult->FetchRow())
{
	$onerow = new stdClass;
	$onerow->id = $row['id'];
	$onerow->poster = $this->GetPropertyFEU($row['poster_id'], $forum_det['property-feu']);
	$onerow->poster_time = $this->FormatDate($row['poster_time']);
	$onerow->subject = (empty($row['subject'])) ? '?' : cms_html_entity_decode(trim($row['subject']));
	$onerow->post_views = $row['views'];
	$onerow->post_count = $row['posts_count'];
	$onerow->last_poster = $this->GetPropertyFEU($row['last_poster_id'], $forum_det['property-feu']);
	$onerow->last_poster_time = $this->FormatDate($row['last_poster_time']);
	$onerow->icon = '<img src="'.$this->ModuleData['ImageUrl'].'topic.png" alt="'.$this->Lang('topic').'" title="'.$this->Lang('topic').'" />';


	if( (!empty($row['status'])) && ($row['status'] == 'draft') )
	{
		if($this->CheckForumPermission('approval_moderator', $forum_id))
		{
			$onerow->approve_topic_content = '<img src="'.$this->ModuleData['ImageUrl'].'approve.png" alt="'.$this->Lang('approve_topic_label').'" title="'.$this->Lang('approve_topic_label').'" />';
			$onerow->approve_topic_url = $this->forumPrettyURL($id, 'edit_topic', $returnid, '', $arr_url, $this->Lang('approve_topic_warning'), true,  $row['id'], 'approve');
			$onerow->approve_topic_link = $this->forumPrettyURL($id, 'edit_topic', $returnid, $onerow->approve_topic_content, $arr_url, $this->Lang('approve_topic_warning'), false,  $row['id'], 'approve');
		}
		else
		{
			continue;
		}
	}

	if( (!empty($row['sticky'])) || (!empty($row['closed'])) )
	{
		if(!empty($row['sticky']))
		{
			$onerow->icon = '<img src="'.$this->ModuleData['ImageUrl'].'topic_sticky.png" alt="'.$this->Lang('topic_sticky').'" title="'.$this->Lang('topic_sticky').'" />';
		}
		elseif(!empty($row['closed']))
		{
			$onerow->icon = '<img src="'.$this->ModuleData['ImageUrl'].'topic_closed.png" alt="'.$this->Lang('topic_closed').'" title="'.$this->Lang('topic_closed').'" />';
		}
		if ($this->IsModerator($forum_id))
		{
			$onerow->reset_topic_content = '<img src="'.$this->ModuleData['ImageUrl'].'reset_topic.png" alt="'.$this->Lang('topic_reset').'" title="'.$this->Lang('topic_reset').'" />';
			$onerow->reset_topic_url = $this->forumPrettyURL($id, 'edit_topic', $returnid, '', $arr_url, '', true,  $row['id'], 'reset');
			$onerow->reset_topic_link = $this->forumPrettyURL($id, 'edit_topic', $returnid, $onerow->reset_topic_content, $arr_url, '', false,  $row['id'], 'reset');
		}
	}
	else
	{
		if($this->IsModerator($forum_id))
		{
			$onerow->sticky_topic_content = '<img src="'.$this->ModuleData['ImageUrl'].'topic_edit_sticky.png" alt="'.$this->Lang('topic_sticky').'" title="'.$this->Lang('topic_sticky').'" />';
			$onerow->sticky_topic_url = $this->forumPrettyURL($id, 'edit_topic', $returnid, '', $arr_url, '', true,  $row['id'], 'sticky');
			$onerow->sticky_topic_link = $this->forumPrettyURL($id, 'edit_topic', $returnid, $onerow->sticky_topic_content, $arr_url, '', false,  $row['id'], 'sticky');

			$onerow->closed_topic_content = '<img src="'.$this->ModuleData['ImageUrl'].'topic_edit_closed.png" alt="'.$this->Lang('topic_closed').'" title="'.$this->Lang('topic_closed').'" />';
			$onerow->closed_topic_url = $this->forumPrettyURL($id, 'edit_topic', $returnid, '', $arr_url, '', true,  $row['id'], 'closed');
			$onerow->closed_topic_link = $this->forumPrettyURL($id, 'edit_topic', $returnid, $onerow->closed_topic_content, $arr_url, '', false,  $row['id'], 'closed');
		}
	}

	if($this->IsModerator($forum_id))
	{
		$onerow->delete_topic_content = '<img src="'.$this->ModuleData['ImageUrl'].'topic_delete.png" alt="'.$this->Lang('topic_delete_label').'" title="'.$this->Lang('topic_delete_label').'" />';
		$onerow->delete_topic_url = $this->forumPrettyURL($id, 'edit_topic', $returnid, '', $arr_url, $this->Lang('topic_delete_warning'), true,  $row['id'], 'delete');
		$onerow->delete_topic_link = $this->forumPrettyURL($id, 'edit_topic', $returnid, $onerow->delete_topic_content, $arr_url, $this->Lang('topic_delete_warning'), false,  $row['id'], 'delete');
	}


	$onerow->topic_content = $onerow->subject;
	$onerow->topic_url = $this->forumPrettyURL($id, 'topic', $returnid, '', $arr_url, '', true,  $forum_id, $row['id'], 1);
	$onerow->topic_link = $this->forumPrettyURL($id, 'topic', $returnid, $onerow->topic_content, $arr_url, '', false,  $forum_id, $row['id'], 1);

	$items[] = $onerow;
}

$this->smarty->assign('itemcount', count($items));
$this->smarty->assign_by_ref('items', $items);

$this->smarty->assign('topic_subject_label', $this->Lang('topic_subject_label'));
$this->smarty->assign('topic_post_count_label', $this->Lang('topic_post_count_label'));
$this->smarty->assign('topic_post_views_label', $this->Lang('topic_post_views_label'));
$this->smarty->assign('topic_last_post_label', $this->Lang('topic_last_post_label'));
$this->smarty->assign('started_by', $this->Lang('started_by'));
$this->smarty->assign('forum_empty', $this->Lang('forum_empty'));
if(isset($params['message'])) $this->smarty->assign('message', $params['message']);


echo $this->ProcessTemplateFromDatabase('forum');
?>
