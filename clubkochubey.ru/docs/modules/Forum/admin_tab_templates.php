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
#$Id: admin_tab_templates.php 99 2010-04-24 20:43:16Z alby $

if(!isset($gCms)) exit;

echo $this->StartTab('display_templates', $params);

echo $this->CreateFieldsetStart($id, 'index', 'Template: index');
echo $this->CreateFormStart($id, 'admin_updatetemplate');
echo '<p>'.$this->CreateTextArea(false, $id, $this->GetTemplate('index'), 'index_template', 'pagebigtextarea').'</p>';
echo $this->CreateInputHidden($id, 'template_name', 'index');
echo $this->CreateInputHidden($id, 'template_tab', 'display_templates');
echo $this->CreateInputSubmit($id, 'submitbutton', $this->Lang('save_submit'));
echo $this->CreateInputSubmit($id, 'defaultsbutton', $this->Lang('sysdefaults'), '', '', $this->Lang('restoretodefaultsmsg'));
echo $this->CreateFormEnd();
echo $this->CreateFieldsetEnd();

echo '<br />';

echo $this->CreateFieldsetStart($id, 'forum', 'Template: forum');
echo $this->CreateFormStart($id, 'admin_updatetemplate');
echo '<p>'.$this->CreateTextArea(false, $id, $this->GetTemplate('forum'), 'forum_template', 'pagebigtextarea').'</p>';
echo $this->CreateInputHidden($id, 'template_name', 'forum');
echo $this->CreateInputHidden($id, 'template_tab', 'display_templates');
echo $this->CreateInputSubmit($id, 'submitbutton', $this->Lang('save_submit'));
echo $this->CreateInputSubmit($id, 'defaultsbutton', $this->Lang('sysdefaults'), '', '', $this->Lang('restoretodefaultsmsg'));
echo $this->CreateFormEnd();
echo $this->CreateFieldsetEnd();

echo '<br />';

echo $this->CreateFieldsetStart($id, 'topic', 'Template: topic');
echo $this->CreateFormStart($id, 'admin_updatetemplate');
echo '<p>'.$this->CreateTextArea(false, $id, $this->GetTemplate('topic'), 'topic_template', 'pagebigtextarea').'</p>';
echo $this->CreateInputHidden($id, 'template_name', 'topic');
echo $this->CreateInputHidden($id, 'template_tab', 'display_templates');
echo $this->CreateInputSubmit($id, 'submitbutton', $this->Lang('save_submit'));
echo $this->CreateInputSubmit($id, 'defaultsbutton', $this->Lang('sysdefaults'), '', '', $this->Lang('restoretodefaultsmsg'));
echo $this->CreateFormEnd();
echo $this->CreateFieldsetEnd();

echo $this->EndTab();

echo $this->StartTab('edit_templates', $params);

echo $this->CreateFieldsetStart($id, 'new_topic', 'Template: new_topic');
echo $this->CreateFormStart($id, 'admin_updatetemplate');
echo '<p>'.$this->CreateTextArea(false, $id, $this->GetTemplate('new_topic'), 'new_topic_template', 'pagebigtextarea').'</p>';
echo $this->CreateInputHidden($id, 'template_name', 'new_topic');
echo $this->CreateInputHidden($id, 'template_tab', 'edit_templates');
echo $this->CreateInputSubmit($id, 'submitbutton', $this->Lang('save_submit'));
echo $this->CreateInputSubmit($id, 'defaultsbutton', $this->Lang('sysdefaults'), '', '', $this->Lang('restoretodefaultsmsg'));
echo $this->CreateFormEnd();
echo $this->CreateFieldsetEnd();

echo '<br />';

echo $this->CreateFieldsetStart($id, 'reply', 'Template: reply');
echo $this->CreateFormStart($id, 'admin_updatetemplate');
echo '<p>'.$this->CreateTextArea(false, $id, $this->GetTemplate('reply'), 'reply_template', 'pagebigtextarea').'</p>';
echo $this->CreateInputHidden($id, 'template_name', 'reply');
echo $this->CreateInputHidden($id, 'template_tab', 'edit_templates');
echo $this->CreateInputSubmit($id, 'submitbutton', $this->Lang('save_submit'));
echo $this->CreateInputSubmit($id, 'defaultsbutton', $this->Lang('sysdefaults'), '', '', $this->Lang('restoretodefaultsmsg'));
echo $this->CreateFormEnd();
echo $this->CreateFieldsetEnd();

echo '<br />';

echo $this->CreateFieldsetStart($id, 'edit_post', 'Template: edit_post');
echo $this->CreateFormStart($id, 'admin_updatetemplate');
echo '<p>'.$this->CreateTextArea(false, $id, $this->GetTemplate('edit_post'), 'edit_post_template', 'pagebigtextarea').'</p>';
echo $this->CreateInputHidden($id, 'template_name', 'edit_post');
echo $this->CreateInputHidden($id, 'template_tab', 'edit_templates');
echo $this->CreateInputSubmit($id, 'submitbutton', $this->Lang('save_submit'));
echo $this->CreateInputSubmit($id, 'defaultsbutton', $this->Lang('sysdefaults'), '', '', $this->Lang('restoretodefaultsmsg'));
echo $this->CreateFormEnd();
echo $this->CreateFieldsetEnd();

echo $this->EndTab();

echo $this->StartTab('misc_templates', $params);

echo $this->CreateFieldsetStart($id, 'profile', 'Template: profile');
echo $this->CreateFormStart($id, 'admin_updatetemplate');
echo '<p>'.$this->CreateTextArea(false, $id, $this->GetTemplate('profile'), 'profile_template', 'pagebigtextarea').'</p>';
echo $this->CreateInputHidden($id, 'template_name', 'profile');
echo $this->CreateInputHidden($id, 'template_tab', 'misc_templates');
echo $this->CreateInputSubmit($id, 'submitbutton', $this->Lang('save_submit'));
echo $this->CreateInputSubmit($id, 'defaultsbutton', $this->Lang('sysdefaults'), '', '', $this->Lang('restoretodefaultsmsg'));
echo $this->CreateFormEnd();
echo $this->CreateFieldsetEnd();

echo '<br />';

echo $this->CreateFieldsetStart($id, 'report_moderator', 'Template: report_moderator');
echo $this->CreateFormStart($id, 'admin_updatetemplate');
echo '<p>'.$this->CreateTextArea(false, $id, $this->GetTemplate('report_moderator'), 'report_moderator_template', 'pagebigtextarea').'</p>';
echo $this->CreateInputHidden($id, 'template_name', 'report_moderator');
echo $this->CreateInputHidden($id, 'template_tab', 'misc_templates');
echo $this->CreateInputSubmit($id, 'submitbutton', $this->Lang('save_submit'));
echo $this->CreateInputSubmit($id, 'defaultsbutton', $this->Lang('sysdefaults'), '', '', $this->Lang('restoretodefaultsmsg'));
echo $this->CreateFormEnd();
echo $this->CreateFieldsetEnd();

echo '<br />';

echo $this->CreateFieldsetStart($id, 'report_moderator_email', 'Template: report_moderator_email');
echo $this->CreateFormStart($id, 'admin_updatetemplate');
echo '<p>'.$this->CreateTextArea(false, $id, $this->GetTemplate('report_moderator_email'), 'report_moderator_email_template', 'pagebigtextarea').'</p>';
echo $this->CreateInputHidden($id, 'template_name', 'report_moderator_email');
echo $this->CreateInputHidden($id, 'template_tab', 'misc_templates');
echo $this->CreateInputSubmit($id, 'submitbutton', $this->Lang('save_submit'));
echo $this->CreateInputSubmit($id, 'defaultsbutton', $this->Lang('sysdefaults'), '', '', $this->Lang('restoretodefaultsmsg'));
echo $this->CreateFormEnd();
echo $this->CreateFieldsetEnd();

echo '<br />';

echo $this->CreateFieldsetStart($id, 'last_posts', 'Template: last_posts');
echo $this->CreateFormStart($id, 'admin_updatetemplate');
echo '<p>'.$this->CreateTextArea(false, $id, $this->GetTemplate('last_posts'), 'last_posts_template', 'pagebigtextarea').'</p>';
echo $this->CreateInputHidden($id, 'template_name', 'last_posts');
echo $this->CreateInputHidden($id, 'template_tab', 'misc_templates');
echo $this->CreateInputSubmit($id, 'submitbutton', $this->Lang('save_submit'));
echo $this->CreateInputSubmit($id, 'defaultsbutton', $this->Lang('sysdefaults'), '', '', $this->Lang('restoretodefaultsmsg'));
echo $this->CreateFormEnd();
echo $this->CreateFieldsetEnd();

echo $this->EndTab();
?>