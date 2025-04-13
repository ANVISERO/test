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
#$Id: action.admin_new_forum.php 103 2010-05-01 19:58:22Z alby $

if(!isset($gCms)) exit;

if($this->LoadDataModule() !== true)
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->LoadDataModule(), true);

if(!$this->VisibleToAdminUser())
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('denied_message'), true);


if(isset($params['cancel']))
	$this->Redirect($id, 'defaultadmin', $returnid);


if(isset($params['submit']))
{
	$params['forum_name'] = $this->cleanString($params['forum_name']);
	if(empty($params['forum_name']))
		$this->Redirect($id, 'defaultadmin', $returnid, array('error'=>$this->Lang('error_empty')));

	$this->TreeManager->initTree($this, $this->customField, $this->lang);
	$input = array(
		'type'	=> $params['forum_type'],
		'name'	=> $params['forum_name'],
		'description'	=> $params['forum_description'],
		'forum_icon'	=> $params['forum_icon'],
		'topics_count'	=> (($params['forum_type']=='forum') ? 0 : null),
		'posts_count'	=> (($params['forum_type']=='forum') ? 0 : null)
	);

	$norder = (isset($params['forum_parent_order'])) ? -1 : 1;
	$forum_id = $this->TreeManager->addChildren($params['forum_parent'], $input, $norder);
	if(!$forum_id)
	{
		$params = array('error'=>$this->Lang('error_created_message'), 'tab'=>'defaultadmin');
		$this->Redirect($id, 'defaultadmin', $returnid, $params);
	}

	if('forum' == $params['forum_type'])
	{
		$properties = $this->GetForumProperties();
		foreach($properties as $arr)
		{
			if(isset($params["{$arr['id']}"]))
				$this->InsertForumProperties($forum_id, $arr['id'], $params["{$arr['id']}"]);
		}
		$params = array('message'=>$this->Lang('forum_created_message'), 'tab'=>'defaultadmin');
	}
	else
	{
		$params = array('message'=>$this->Lang('section_created_message'), 'tab'=>'defaultadmin');
	}
	$this->Redirect($id, 'defaultadmin', $returnid, $params);
}


$smarty->assign('form_start', $this->CreateFormStart($id, 'admin_new_forum'));
$smarty->assign('form_end', $this->CreateFormEnd());
$smarty->assign('form_submit', $this->CreateInputSubmit($id, 'submit', $this->Lang('create_forum_submit')));
$smarty->assign('form_cancel', $this->CreateInputSubmit($id, 'cancel', $this->Lang('cancel')));
$smarty->assign('form_hidden', '');


$thisURL = $_SERVER['SCRIPT_NAME'].'?';
foreach($_GET as $key=>$val)
	if('forum_type' != $key) $thisURL .= $key.'='.$val.'&amp;';

$type_items = array($this->Lang('section')=>'section', $this->Lang('forum')=>'forum');
$forum_type = (empty($_GET['forum_type']) ? 'forum' : $_GET['forum_type']);
$addtext = 'onchange="window.location.href=\''.$thisURL.'forum_type=\'+this.options[this.selectedIndex].value;"';
$smarty->assign('forum_type_input', $this->CreateInputDropdown($id, 'forum_type', $type_items, -1, $forum_type, $addtext));

$this->TreeManager->initTree($this, $this->customField, $this->lang);
$dumps = $this->TreeManager->getTree();
if( $dumps )
{
	$out = $this->TreeManager->setCmsDropdown($dumps, 'name');
	$smarty->assign('forum_parent_input', $this->CreateInputDropdown($id, 'forum_parent', $out));
	$smarty->assign('forum_parent_order_input', $this->CreateInputCheckbox($id, 'forum_parent_order', 1, 1));
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

$smarty->assign('forum_name_input', $this->CreateInputText($id, 'forum_name', '', '20', '40'));
$smarty->assign('forum_description_input', $this->CreateInputText($id, 'forum_description', '', '50', '255'));
$smarty->assign('forum_icon_input', $this->CreateInputText($id, 'forum_icon', '', '50', '255'));

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

	$redirect = array($this->Lang('topic')=>'topic', $this->Lang('forum')=>'forum');
	$properties=array();
	$props = $this->GetForumProperties();
	foreach($props as $property)
	{
		$tmp = $this->GetPreference($property['name'], false);
		if($tmp!==false && empty($tmp))
		{
			continue;
		}
		elseif($tmp!==false && !empty($tmp))
		{
			$property['def_value'] = $tmp;
			if(!empty($property['options'])) ${$property['options']} = $tmp;
		}

		$out=array();
		$out['label'] = $this->ForumCreateLabel($id, $property['type'], $property['id'], $this->Lang($property['name'].'_label'));
		if(isset($this->langhash[$this->curlang][$property['name'].'_comment']))
			$out['comment'] = $this->Lang($property['name'].'_comment');

		if(empty($property['options']) || !isset(${$property['options']}))
			$out['edit'] = $this->ForumCreateEdit($id, $property['type'], $property['id'], $property['def_value'], '');
		else
			$out['edit'] = $this->ForumCreateEdit($id, $property['type'], $property['id'], $property['def_value'], ${$property['options']});

		$properties[] = $out;
	}
	$smarty->assign('properties', $properties);
}


echo $this->ProcessTemplate('admin_edit_forum.tpl');
?>