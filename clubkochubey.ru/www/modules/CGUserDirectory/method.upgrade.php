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

$current_version = $oldversion;
switch($current_version)
  {
  case '1.0':
  case '1.0.1':
    // Searchform template
    $fn = dirname(__FILE__).'/templates/orig_searchform_template.tpl';
    if( file_exists( $fn ) )
      {
	$template = file_get_contents($fn);
	$this->SetPreference(CGUSERDIR_PREF_NEWSEARCHFORM_TEMPLATE,$template);
	$this->SetTemplate('searchform_Sample',$template);
	$this->SetPreference(CGUSERDIR_PREF_DFLTSEARCHFORM_NAME,'Sample');
      }

    $fn = dirname(__FILE__).'/templates/orig_browseprop_template.tpl';
    if( file_exists( $fn ) )
      {
	$template = file_get_contents($fn);
	$this->SetPreference(CGUSERDIR_PREF_NEWBROWSEPROP_TEMPLATE,$template);
	$this->SetTemplate('browseprop_Sample',$template);
	$this->SetPreference(CGUSERDIR_PREF_DFLTBROWSEPROP_NAME,'Sample');
      }
    break;
  }

#
# EOF
#
?>