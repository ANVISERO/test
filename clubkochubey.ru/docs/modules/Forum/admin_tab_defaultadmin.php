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
#$Id: admin_tab_defaultadmin.php 99 2010-04-24 20:43:16Z alby $

if(!isset($gCms)) exit;

echo $this->StartTab('defaultadmin');


//Start MLE
global $hls, $hl;
if(isset($hls)) {
 $thisURL = $_SERVER['SCRIPT_NAME'].'?';
 foreach($_GET as $key=>$val)
  if('hl' != $key) $thisURL .= $key.'='.$val.'&amp;';

 $mle_switch='';
 foreach($hls as $key=>$mle)
  $mle_switch .= ($hl==$key ? $mle['flag'].' ' : '<a href="'.$thisURL.'hl='.$key.'" alt="'.$mle['text'].'">'.$mle['flag'].'</a> ');

 $smarty->assign('mle_switch', $mle_switch);
}
//End MLE


$this->TreeManager->initTree($this, $this->customField, $this->lang);

if(!empty($params['fid']) && !empty($params['norder']))
	$moveOrderNode = $this->TreeManager->moveOrderNode((int)$params['fid'], -1, (int)$params['norder']);


$dumps = $this->TreeManager->getTree();

$rowclass = 'row1';
$entryarray=array();
if( $dumps )
{
	foreach($dumps as $row)
	{
		$onerow = new stdClass;
		foreach($row as $key=>$item) $onerow->$key = $item;

		$onerow->rowclass = $rowclass;
		$onerow->type = $this->Lang($row['type']);
		$onerow->namelink = $this->CreateLink($id, 'admin_edit_forum', $returnid, $row['name'], array('fid'=>$row['id']));
		$onerow->editlink = $this->CreateLink($id, 'admin_edit_forum', $returnid, $gCms->variables['admintheme']->DisplayImage('icons/system/edit.gif', $this->Lang('edit'),'','','systemicon'), array('fid'=>$row['id']));
		if($row['parent'] > 0)
			$onerow->deletelink = $this->CreateLink($id, 'admin_delete_forum', $returnid, $gCms->variables['admintheme']->DisplayImage('icons/system/delete.gif', $this->Lang('delete'),'','','systemicon'), array('fid'=>$row['id']), $this->Lang('forum_delete_warning'));

		$q = "SELECT COUNT(id) as posts_on_approve
			FROM ". CMS_TABLE_FORUM_POSTS ."
			WHERE forum_id = ? AND status != 'published'";
		$dbresult =& $db->Execute($q, array($row['id']));
		if($dbresult && $res=$dbresult->FetchRow())
		{
			if($res['posts_on_approve'] > 0)
			{
				$onerow->posts_on_approve = $res['posts_on_approve'];
				$smarty->assign('posts_on_approve', true);
			}
		}

		$sibling = $this->TreeManager->getSiblingCount($row['id']);
		if($sibling && $sibling>1)
		{
			if($row['norder']>1)
				$onerow->uplink = $this->CreateLink($id, 'defaultadmin', $returnid, $gCms->variables['admintheme']->DisplayImage('icons/system/arrow-u.gif', lang('up'),'','','systemicon'), array('fid'=>$row['id'], 'norder'=>$row['norder']-1));

			if($row['norder']<$sibling)
				$onerow->downlink = $this->CreateLink($id, 'defaultadmin', $returnid, $gCms->variables['admintheme']->DisplayImage('icons/system/arrow-d.gif', lang('down'),'','','systemicon'), array('fid'=>$row['id'], 'norder'=>$row['norder']+1));
		}

		$entryarray[] = $onerow;
		($rowclass=='row1' ? $rowclass='row2' : $rowclass='row1');
	}
}


$smarty->assign('itemcount', count($entryarray));
$smarty->assign('items', $entryarray);

$smarty->assign('new_forum_link',
	$this->CreateLink($id, 'admin_new_forum', $returnid, $gCms->variables['admintheme']->DisplayImage('icons/system/newobject.gif',
	$this->Lang('new_forum_label'),'','','systemicon'))
	.' '.$this->CreateLink($id, 'admin_new_forum', $returnid, $this->Lang('new_forum_label')));

echo $this->ProcessTemplate('admin_manage_forums.tpl');

echo $this->EndTab()."\n\n";
?>
