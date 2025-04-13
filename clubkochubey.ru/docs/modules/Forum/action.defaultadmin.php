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
#$Id: action.defaultadmin.php 99 2010-04-24 20:43:16Z alby $

if(!isset($gCms)) exit;

if($this->LoadDataModule() !== true)
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->LoadDataModule(), true);

if(!$this->VisibleToAdminUser())
	return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('denied_message'), true);


if(!empty($params['error']))
{
	echo '<div class="pageerrorcontainer"><div class="pageoverflow">';
	echo $gCms->variables['admintheme']->DisplayImage('icons/system/stop.gif',lang('error'),'','','systemicon').$params['error'];
	echo '</div></div>';
}
elseif(!empty($params['message']))
{
	echo '<div class="pagemcontainer"><p class="pagemessage">';
	echo $gCms->variables['admintheme']->DisplayImage('icons/system/accept.gif',lang('success'),'','','systemicon').$params['message'];
	echo '</p></div>';
}


$current_tab = isset($params['tab']) ? $params['tab'] : 'defaultadmin';


echo $this->StartTabHeaders();
echo $this->SetTabHeader('defaultadmin', $this->Lang('tab_defaultadmin'), $current_tab=='defaultadmin');
echo $this->SetTabHeader('settings', $this->Lang('tab_settings'), $current_tab=='settings');
echo $this->SetTabHeader('banned', $this->Lang('tab_banned'), $current_tab=='banned');

if($this->CheckPermission( 'Modify Templates' ))
{
	echo $this->SetTabHeader('display_templates',$this->Lang('display_templates'), ('display_templates'==$current_tab)?true:false);
	echo $this->SetTabHeader('edit_templates',$this->Lang('edit_templates'), ('edit_templates'==$current_tab)?true:false);
	echo $this->SetTabHeader('misc_templates',$this->Lang('misc_templates'), ('misc_templates'==$current_tab)?true:false);
}
echo $this->EndTabHeaders()."\n\n";



echo $this->StartTabContent();

include_once 'admin_tab_defaultadmin.php';

include_once 'admin_tab_settings.php';

include_once 'admin_tab_banned.php';

if($this->CheckPermission( 'Modify Templates' )) include_once 'admin_tab_templates.php';

echo $this->EndTabContent();
?>