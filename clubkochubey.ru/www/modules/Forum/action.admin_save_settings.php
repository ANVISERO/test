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
#$Id: action.admin_save_settings.php 99 2010-04-24 20:43:16Z alby $

if(!isset($gCms)) exit;

if($this->LoadDataModule() !== true)
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->LoadDataModule(), true);

if(!$this->VisibleToAdminUser())
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('denied_message'), true);


$this->SetPreference('enable_report_moderators', (isset($params['enable_report_moderators']) ? 1 : 0));
$this->SetPreference('avatar_property_name', $params['avatar_property_name']);

$this->SetPreference('topic_pagelimit', $params['topic_pagelimit']);
$this->SetPreference('post_pagelimit', $params['post_pagelimit']);
$this->SetPreference('ranking', $params['ranking']);
$this->SetPreference('use_bbcode', (isset($params['use_bbcode']) ? 1 : 0));
$this->SetPreference('use_captcha', (isset($params['use_captcha']) ? 1 : 0));
$this->SetPreference('use_akismet', (isset($params['use_akismet']) ? 1 : 0));
$this->SetPreference('forumpage', (isset($params['forumpage']) ? $params['forumpage'] : ''));


$params = array('message'=>$this->Lang('settings_saved_message'), 'tab'=>'settings');
$this->Redirect($id, 'defaultadmin', $returnid, $params);
?>
