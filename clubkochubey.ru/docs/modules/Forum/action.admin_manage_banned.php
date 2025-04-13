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
#$Id: action.admin_manage_banned.php 99 2010-04-24 20:43:16Z alby $

if(!isset($gCms)) exit;

if($this->LoadDataModule() !== true)
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->LoadDataModule(), true);

if(!$this->VisibleToAdminUser())
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('denied_message'), true);


$params['message'] = $this->Lang('banned_empty');


if($params['banned_action'])
{
	switch($params['banned_action'])
	{
		case 'user_ban':
			$qu = "UPDATE ". CMS_TABLE_FORUM_USERS ."
				SET banreason = ?
				WHERE id = ?";
			$q = "SELECT id
				FROM ". CMS_TABLE_FORUM_USERS ."
				WHERE user_id <> 0
				ORDER BY user_id";
			$dbresult =& $db->Execute($q);
			while($dbresult && $row=$dbresult->FetchRow())
				$db->Execute($qu, array(trim($params["user_{$row['id']}"]), $row['id']));

			$params['message'] = $this->Lang('user_banned_saved');
			break;

		case 'ip_delete':
			if(!empty($params['banid']))
			{
				$qd = "DELETE FROM ". CMS_TABLE_FORUM_BANNED ."
					WHERE id = ?";
				$db->Execute($qd, array($params['banid']));
				$params['message'] = $this->Lang('ip_banned_delete');
			}
			break;

		case 'ip_new':
			if(!empty($params['banip']))
			{
				$bid = $db->GenID(CMS_TABLE_FORUM_BANNED.'_seq');
				$qi = "INSERT INTO ". CMS_TABLE_FORUM_BANNED ."
					(id, banip, banreason)
					VALUES (?,?,?)";
				$db->Execute($qi, array($bid, $params['banip'], trim($params['banreason'])));
				$params['message'] = $this->Lang('ip_banned_saved');
			}
			break;
	}
}


$params['tab'] = 'banned';
$this->Redirect($id, 'defaultadmin', $returnid, $params);
?>