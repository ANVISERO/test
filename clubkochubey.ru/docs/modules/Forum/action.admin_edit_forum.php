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
#$Id: action.admin_edit_forum.php 106 2010-05-03 16:10:13Z alby $

if(!isset($gCms)) exit;

if($this->LoadDataModule() !== true)
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->LoadDataModule(), true);

if(!$this->VisibleToAdminUser())
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('denied_message'), true);


if(isset($params['cancel']))
	$this->Redirect($id, 'defaultadmin', $returnid);


$forum_id = (int)@$params['fid'];
$forum_det = $this->GetForumDetails($forum_id);

if(isset($params['submit']))
{
	$params['forum_name'] = $this->cleanString($params['forum_name']);
	if(empty($params['forum_name']))
		$this->Redirect($id, 'defaultadmin', $returnid, array('error'=>$this->Lang('error_empty')));

	$this->TreeManager->initTree($this, $this->customField, $this->lang);
	$node = $this->TreeManager->getNode($forum_id);
	if( $node )
	{
		if('forum'==$forum_det['type'] && isset($params['forum_type']) && 'section'==$params['forum_type'])
		{
			$q = "SELECT poster_id FROM ". CMS_TABLE_FORUM_POSTS ." WHERE forum_id = ?";
			$dbresult =& $db->Execute($q, array($forum_id));
			while($dbresult && $row=$dbresult->FetchRow())
			{
				$q2 = "SELECT COUNT(id) as num_posts
					FROM ". CMS_TABLE_FORUM_POSTS ."
					WHERE poster_id = ? AND status = 'published'";
				$dbresult2 =& $db->Execute($q2, array($row['poster_id']));
				if( $dbresult2 ) $row2=$dbresult2->FetchRow();

				$q3 = "SELECT COUNT(id) as num_topics
					FROM ". CMS_TABLE_FORUM_TOPICS ."
					WHERE poster_id = ? AND posts_count > 0";
				$dbresult3 =& $db->Execute($q3, array($row['poster_id']));
				if( $dbresult3 ) $row3=$dbresult3->FetchRow();

				$qu = "UPDATE ". CMS_TABLE_FORUM_USERS ."
					SET num_topics = ?, num_posts = ?
					WHERE user_id = ?";
				$dbresultu = $db->Execute($qu, array($row3['num_topics'], $row2['num_posts'], $row['poster_id']));
				if(!$dbresultu)
					$this->Redirect($id, 'defaultadmin', $returnid, array('error'=>$this->Lang('error_sql', 'user_id:'.$row['poster_id'])));
			}

			$qd = "DELETE FROM ". CMS_TABLE_FORUM_POSTS ." WHERE forum_id = ?";
			$dbresult =& $db->Execute($qd, array($forum_id));
			if(!$dbresult) $this->Redirect($id, 'defaultadmin', $returnid, array('error'=>$this->Lang('error_sql', $qd)));

			$qd = "DELETE FROM ". CMS_TABLE_FORUM_TOPICS ." WHERE forum_id = ?";
			$dbresult =& $db->Execute($qd, array($forum_id));
			if(!$dbresult) $this->Redirect($id, 'defaultadmin', $returnid, array('error'=>$this->Lang('error_sql', $qd)));

			$input = array('topics_count'=>null, 'posts_count'=>null);
			if(!$this->TreeManager->updateCustom($forum_id, $input))
				$this->Redirect($id, 'defaultadmin', $returnid, array('error'=>$this->Lang('error_update')));
		}

		$input = array(
			'type'=>(!empty($node['parent']) ? $params['forum_type'] : 'section'),
			'name'=>$params['forum_name'],
			'description'=>$params['forum_description'],
			'forum_icon'=>$params['forum_icon']
		);

		if(!$this->TreeManager->updateCustom($forum_id, $input))
			$this->Redirect($id, 'defaultadmin', $returnid, array('error'=>$this->Lang('error_update')));

		if(!empty($node['parent']) && $node['parent']!=$params['forum_parent'])
		{
			if(!$this->TreeManager->moveNode($forum_id, $params['forum_parent']))
				$this->Redirect($id, 'defaultadmin', $returnid, array('error'=>$this->Lang('error_move')));
		}

		if(empty($this->PropertiesForum[$forum_id])) $this->GetForumIDProperties($forum_id);
		$properties = $this->GetForumProperties();
		foreach($properties as $arr)
		{
			if(isset($params["{$arr['id']}"]))
			{
				if(isset($this->PropertiesForum[$forum_id]["{$arr['name']}"]))
				{
					$qu = "UPDATE ". CMS_TABLE_FORUM_FORUM_PROPERTY ."
						SET value = ?
						WHERE forum_id = ? AND property_id = ?";
					$dbresult = $db->Execute($qu, array($params["{$arr['id']}"], $forum_id, $arr['id']));
					if(!$dbresult)
						return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('error_sql', $qu), true);
				}
				else
				{
					$this->InsertForumProperties($forum_id, $arr['id'], $params["{$arr['id']}"]);
				}
			}
		}
		$params = array('message'=>$this->Lang('forum_saved_message'), 'tab'=>'defaultadmin');
		$this->Redirect($id, 'defaultadmin', $returnid, $params);
	}
	$params = array('error'=>$this->Lang('error_node'), 'tab'=>'defaultadmin');
	$this->Redirect($id, 'defaultadmin', $returnid, $params);
}


$smarty->assign('form_start', $this->CreateFormStart($id, 'admin_edit_forum'));
$smarty->assign('form_end', $this->CreateFormEnd());
$smarty->assign('form_submit', $this->CreateInputSubmit($id, 'submit', $this->Lang('save_submit')));
$smarty->assign('form_cancel', $this->CreateInputSubmit($id, 'cancel', $this->Lang('cancel')));
$smarty->assign('form_hidden', $this->CreateInputHidden($id, 'fid', $forum_id));

if($forum_det['parent'] == 0)
{
	$smarty->assign('forum_type_input', $this->Lang('section_root'));
	$smarty->assign('forum_parent_input', $this->Lang('parent_root'));
	$forum_type = 'section';
}
else
{
	$thisURL = $_SERVER['SCRIPT_NAME'].'?';
	foreach($_GET as $key=>$val)
		if('forum_type' != $key) $thisURL .= $key.'='.$val.'&amp;';

	$type_items = array($this->Lang('section')=>'section', $this->Lang('forum')=>'forum');
	$forum_type = (empty($_GET['forum_type']) ? $forum_det['type'] : $_GET['forum_type']);
	if('forum' == $forum_type)
		$addtext = 'onchange="alert(\''.$this->Lang('switch_forum_delete_warning').'\');window.location.href=\''.$thisURL.'forum_type=\'+this.options[this.selectedIndex].value;"';
	else
		$addtext = 'onchange="window.location.href=\''.$thisURL.'forum_type=\'+this.options[this.selectedIndex].value;"';
	$smarty->assign('forum_type_input', $this->CreateInputDropdown($id, 'forum_type', $type_items, -1, $forum_type, $addtext));

	$this->TreeManager->initTree($this, $this->customField, $this->lang);
	$dumps = $this->TreeManager->getTree();
	if( $dumps )
	{
		$out = $this->TreeManager->setCmsDropdown($dumps, 'name');
		$smarty->assign('forum_parent_input', $this->CreateInputDropdown($id, 'forum_parent', $out, '', $forum_det['parent']));
	}
}

//Start MLE
global $hls, $hl;
if(isset($hls)) {
 $thisURL = $_SERVER['SCRIPT_NAME'].'?';
 foreach($_GET as $key=>$val)
  if('hl' != $key) $thisURL .= $key.'='.$val.'&amp;';

 $_items=array();
 foreach($hls as $key=>$mle)
  $_items[(isset($mle['text'])?$mle['text']:$key)] = $key;

 $smarty->assign('mle_dd', $this->CreateInputDropdown($id, 'hl', $_items, -1, $hl, 'onchange="window.location.href=\''.$thisURL.'hl=\'+this.options[this.selectedIndex].value;"'));
}
//End MLE

$smarty->assign('forum_name_input', $this->CreateInputText($id, 'forum_name', $forum_det['name'], '20', '40'));
$smarty->assign('forum_description_input', $this->CreateInputText($id, 'forum_description', $forum_det['description'], '50', '255'));
$smarty->assign('forum_icon_input', $this->CreateInputText($id, 'forum_icon', $forum_det['forum_icon'], '50', '255'));


if('forum' == $forum_type)
{
	$common=array();
	$common['None']='';

	$groups =& $this->FrontEndUsers->GetGroupList();
	$groups = array_merge($common, $groups);

	$defs = $common;
	$defns =& $this->FrontEndUsers->GetPropertyDefns();
	if(false !== $defns)
		foreach($defns as $defn) $defs[$defn['prompt']] = $defn['name'];

	$redirect = array($this->Lang('topic')=>'topic', $this->Lang('forum')=>'board');

	$properties=array();
	$arr_sql = $this->GetForumIDProperties($forum_id);
	$props = $this->GetForumProperties();
	foreach($props as $property)
	{
		$tmp = $this->GetPreference($property['name'], false);
		if($tmp!==false && empty($tmp))
			continue;
		elseif($tmp!==false && !empty($tmp))
			if(!empty($property['options'])) ${$property['options']} = $tmp;

		$out=array();
		$out['label'] = $this->ForumCreateLabel($id, $property['type'], $property['id'], $this->Lang($property['name'].'_label'));
		if(isset($this->langhash[$this->curlang][$property['name'].'_comment']))
			$out['comment'] = $this->Lang($property['name'].'_comment');

		if(isset($arr_sql[$property['name']]))
			$value = $arr_sql[$property['name']];
		else
			$value = $property['def_value'];
		if(empty($property['options']) || !isset(${$property['options']}))
			$out['edit'] = $this->ForumCreateEdit($id, $property['type'], $property['id'], $value, '');
		else
			$out['edit'] = $this->ForumCreateEdit($id, $property['type'], $property['id'], $value, ${$property['options']});

		$properties[] = $out;
	}
	$smarty->assign('properties', $properties);
}


echo $this->ProcessTemplate('admin_edit_forum.tpl');
?>
