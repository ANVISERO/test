<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: CGExtensions (c) 2008 by Robert Campbell 
#         (calguy1000@cmsmadesimple.org)
#  An addon module for CMS Made Simple to provide useful functions
#  and commonly used gui capabilities to other modules.
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

if (!isset($gCms)) exit();
$error_template = $this->GetErrorTemplate();
$smarty->assign('submit',$this->CreateInputSubmit($id,'submit',$this->Lang('submit')));
$smarty->assign('submit_template',$this->CreateInputSubmit($id,'submit_template',$this->Lang('submit')));
$smarty->assign('reset',$this->CreateInputSubmit($id,'resettofactory',
						 $this->Lang('resettofactory')));
$smarty->assign('prompt_template',$this->Lang('error_template'));
$smarty->assign('input_template',
		$this->CreateTextArea(false,$id,
				      $error_template,'error_template'));

$smarty->assign('prompt_prioritycountries',
		$this->Lang('priority_countries'));
$smarty->assign('input_prioritycountries',
		$this->CreateInputText($id,'prioritycountries',
				       $this->GetPreference('prioritycountries',''),25,255));
$smarty->assign('input_alloweduploadfiles',
		$this->CreateInputText($id,'alloweduploadfiles',
				       $this->GetPreference('alloweduploadfiles',''),50,255));


echo $this->ProcessTemplate('adminpanel.tpl');

#
# EOF
#
?>