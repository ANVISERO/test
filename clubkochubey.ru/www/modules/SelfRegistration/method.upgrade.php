<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: SelfRegistration (c) 2008 by Robert Campbell 
#         (calguy1000@cmsmadesimple.org)
#  An addon module for CMS Made Simple to allow users to register themselves
#  with a website.
# 
# Version: 1.1.5
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

{
    // this preference is no longer needed
  switch( $oldversion )
    {
    case '1.0.3':
      {
	$this->SetPreference('selfreg_emailconfirm_subject',
			     $this->Lang('registration_confirmation'));
	$this->SetTemplate('selfreg_emailconfirm_texttemplate', $this->dflt_emailconfirm_texttemplate);
	
	$this->SetPreference('selfreg_useredited_subject',
			     $this->Lang('registration_confirmation'));
	$this->SetPreference('selfreg_force_email_twice',0);
	$this->SetTemplate('selfreg_useredited_template', $this->dflt_emailuseredited_template);
	$this->SetTemplate('selfreg_useredited_texttemplate', $this->dflt_emailuseredited_texttemplate);
	$this->SetTemplate('selfreg_sendanotheremail_template', $this->dflt_sendanotheremail_template );
	$this->SetTemplate('selfreg_post_sendanotheremail_template', $this->dflt_post_sendanotheremail_template );
	
	// Permissions
	$this->RemovePermission('Modify SelfRegistration');
	$this->CreatePermission('Manage Registering Users',
				'Manage Registering Users');
	// notice, no brerak
      }
      
    case '1.0.4':
      {
	$this->CreateEvent('onNewUser');
	$this->CreateEvent('onUserRegistered');
      }
    }

}
?>