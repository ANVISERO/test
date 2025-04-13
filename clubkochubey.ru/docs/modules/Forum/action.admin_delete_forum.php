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
#$Id: action.admin_delete_forum.php 99 2010-04-24 20:43:16Z alby $

if(!isset($gCms)) exit;

if($this->LoadDataModule() !== true)
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->LoadDataModule(), true);

if(!$this->VisibleToAdminUser())
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('denied_message'), true);


$forum_id = (int)@$params['fid'];


$this->TreeManager->initTree($this, $this->customField, $this->lang);
$childrens = $this->TreeManager->getChildren('id', $forum_id, -1, 'level,norder DESC');
if( $childrens )
{
	$q = "SELECT id as topic_id FROM ". CMS_TABLE_FORUM_TOPICS ."
		WHERE forum_id = ?";
	$dbresult = &$db->Execute($q, array($forum_id));
	while($dbresult && $row = $dbresult->FetchRow())
	{
		$q2 = "SELECT id as post_id, poster_id
			FROM ". CMS_TABLE_FORUM_POSTS ."
			WHERE topic_id = ?
			ORDER BY id DESC";
		$dbresult2 =& $db->Execute($q2, array($row['topic_id']));
		while($dbresult2 && $row2=$dbresult2->FetchRow())
		{
			if(!$this->DeletePost($row2['post_id'], $row['topic_id'], $forum_id, $row2['poster_id']))
				return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('error_sql', 'DeletePost'), true);
		}
	}

	$qd = "DELETE FROM ". CMS_TABLE_FORUM_FORUM_PROPERTY ."
		WHERE forum_id = ?";
	$dbresult = $db->Execute($qd, array($forum_id));
	if(!$dbresult)
		return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('error_sql', $qd), true);
}

$this->TreeManager->deleteNode($forum_id);


$params = array('message'=>$this->Lang('forum_deleted_message'), 'tab'=>'defaultadmin');
$this->Redirect($id, 'defaultadmin', $returnid, $params);
?>
