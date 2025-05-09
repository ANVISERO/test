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
    $db = $this->GetDb();
    $dict = NewDataDictionary($db);
    $taboptarray = array('mysql' => 'TYPE=MyISAM');

    // validations in process
    $flds = "
             id I KEY,
             group_id I NOT NULL,
             username C(80) NOT NULL,
             passsword C(32) NOT NULL,
             code C(20) NOT NULL,
             createdate ".CMS_ADODB_DT;
    $sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_selfreg_users", 
				      $flds, $taboptarray );
    $dict->ExecuteSQLArray( $sqlarray );
    $db->CreateSequence( cms_db_prefix()."module_selfreg_users_seq" );

    $flds = "id I KEY,
             user I NOT NULL, 
             title C(100) NOT NULL,
             data C(255) 
            "; 
    $sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_selfreg_properties",
				      $flds, $taboptarray );
    $dict->ExecuteSQLArray( $sqlarray );
    $db->CreateSequence( cms_db_prefix()."module_selfreg_properties_seq" );

 
    // preferences
    $this->SetPreference('require_email_confirmation',1);
    $this->SetPreference('send_emails_to','root@localhost.com');
    $this->SetPreference('notify_on_registration',1);
    $this->SetPreference('selfreg_emailconfirm_subject',
			 $this->Lang('registration_confirmation'));
    $this->SetPreference('selfreg_emailuseredited_subject',
			 $this->Lang('registration_info_edited'));
    $this->SetPreference('selfreg_force_email_twice',0);

    // templates
    $this->SetTemplate('selfreg_reg1template', $this->dflt_registration1_template);
    $this->SetTemplate('selfreg_postreg1_template', $this->dflt_postreg1_template);
    $this->SetTemplate('selfreg_reg2template', $this->dflt_registration2_template);
    $this->SetTemplate('selfreg_emailconfirm_template', $this->dflt_emailconfirm_template);
    $this->SetTemplate('selfreg_emailconfirm_texttemplate', $this->dflt_emailconfirm_texttemplate);
    $this->SetTemplate('selfreg_emailuseredited_template', $this->dflt_emailuseredited_template);
    $this->SetTemplate('selfreg_emailuseredited_texttemplate', $this->dflt_emailuseredited_texttemplate);
    $this->SetTemplate('selfreg_finalmessage_template', $this->dflt_finalmessage_template);
    $this->SetTemplate('selfreg_sendanotheremail_template', $this->dflt_sendanotheremail_template );
    $this->SetTemplate('selfreg_post_sendanotheremail_template', $this->dflt_post_sendanotheremail_template );

    // Permissions
    $this->CreatePermission('Manage Registering Users',
			    'Manage Registering Users');

    // events
    $this->CreateEvent('onNewUser');
    $this->CreateEvent('onUserRegistered');
}
?>