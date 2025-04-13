<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: CGUserDirectory (c) 2009 by Robert Campbell 
#         (calguy1000@cmsmadesimple.org)
#  An addon module for CMS Made Simple to provide the ability to browse
#  and view summary reports and detail reports about groups of frontend
#  users.
#
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2005 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
#
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# However, as a special exception to the GPL, this software is distributed
# as an addon module to CMS Made Simple.  You may not use this software
# in any Non GPL version of CMS Made simple, or in any version of CMS
# Made simple that does not indicate clearly and obviously in its admin 
# section that the site was built with CMS Made simple.
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
#-------------------------------------------------------------------------
#END_LICENSE
if( !isset($gCms) ) exit;

# System default directory view template
echo $this->GetDefaultTemplateForm($this,$id,$returnid,
				   CGUSERDIR_PREF_NEWDIRECTORY_TEMPLATE,
				   'defaultadmin','defaulttemplates',
				   $this->Lang('info_sysdflt_directory_template'),
				   'orig_directory_template.tpl',
				   $this->Lang('info_sysdflt_template'));

echo '<div style="margin-bottom: 0.5em; height: 0.5em; border-top: 1px solid #000; width: 80%;"></div>'."\n";

# System default summary view template
echo $this->GetDefaultTemplateForm($this,$id,$returnid,
				   CGUSERDIR_PREF_NEWSUMMARY_TEMPLATE,
				   'defaultadmin','defaulttemplates',
				   $this->Lang('info_sysdflt_summary_template'),
				   'orig_summary_template.tpl',
				   $this->Lang('info_sysdflt_template'));

echo '<div style="margin-bottom: 0.5em; height: 0.5em; border-top: 1px solid #000; width: 80%;"></div>'."\n";

# System default detail view template
echo $this->GetDefaultTemplateForm($this,$id,$returnid,
				   CGUSERDIR_PREF_NEWDETAIL_TEMPLATE,
				   'defaultadmin','defaulttemplates',
				   $this->Lang('info_sysdflt_detail_template'),
				   'orig_detail_template.tpl',
				   $this->Lang('info_sysdflt_template'));

echo '<div style="margin-bottom: 0.5em; height: 0.5em; border-top: 1px solid #000; width: 80%;"></div>'."\n";

# System default searchform view template
echo $this->GetDefaultTemplateForm($this,$id,$returnid,
				   CGUSERDIR_PREF_NEWSEARCHFORM_TEMPLATE,
				   'defaultadmin','defaulttemplates',
				   $this->Lang('info_sysdflt_searchform_template'),
				   'orig_searchform_template.tpl',
				   $this->Lang('info_sysdflt_template'));


echo '<div style="margin-bottom: 0.5em; height: 0.5em; border-top: 1px solid #000; width: 80%;"></div>'."\n";

# System default browse property view template
echo $this->GetDefaultTemplateForm($this,$id,$returnid,
				   CGUSERDIR_PREF_NEWBROWSEPROP_TEMPLATE,
				   'defaultadmin','defaulttemplates',
				   $this->Lang('info_sysdflt_browseprop_template'),
				   'orig_browseprop_template.tpl',
				   $this->Lang('info_sysdflt_template'));


#
# EOF
#
?>