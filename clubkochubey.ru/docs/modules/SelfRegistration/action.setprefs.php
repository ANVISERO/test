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
if( !isset($gCms) ) exit;

if( !$this->CheckPermission( 'Modify Site Preferences' ) )
  {
    $this->_DisplayErrorPage($id, $params, $returnid, 
			     $this->Lang('accessdenied'));
    return;
  }

if( isset( $params['input_noregister']) )
  {
    $tmp = implode(',',$params['input_noregister']);
    $this->SetPreference('noregister_groups',$tmp);
  }

if( isset( $params['input_removeall'] ) )
  {
    $this->ExpireOldTempUsers('-5 years');
    return;
  }

if( isset( $params['input_remove1week'] ) )
  {
    $this->ExpireOldTempUsers('-1 week');
    $this->myRedirectToTab($id, 'prefs');
  }

if( isset( $params['input_remove1month'] ) )
  {
    $this->ExpireOldTempUsers('-1 month');
    $this->myRedirectToTab($id, 'prefs');
  }

if( isset( $params['input_remove1month'] ) )
  {
    $this->ExpireOldTempUsers('-24 hours');
    $this->myRedirectToTab($id, 'prefs');
  }

if( isset( $params['input_list1day'] ) )
  {
# create a csv file for temp users that have
# been in there more than one day
    $result = $this->CSVOldTempUsers('-24 hours');
    if( $result == '' )
      {
	echo "<h3>No results returned</h3>";
	return;
      }
    header('Content-Description: File Transfer');
    header('Content-Type: application/force-download');
    header('Content-Disposition: attachment; filename=trappedinselfreg.csv');
    while(@ob_end_clean());
    echo $result;
    exit();
  }

if( isset( $params['input_inline'] ) )
  {
    $this->SetPreference('inline_forms',
			 $params['input_inline']);
  }
else
  {
    $this->SetPreference('inline_forms', 0);
  }

if( isset( $params['input_notify'] ) )
  {
    $this->SetPreference('notify_on_registration',
			 $params['input_notify']);
  }
else
  {
    $this->SetPreference('notify_on_registration', 0);
  }

if( isset( $params['input_email_confirmation'] ) )
  {
    $this->SetPreference('require_email_confirmation',
			 $params['input_email_confirmation']);
  }
else
  {
    $this->SetPreference('require_email_confirmation', 0);
  }

if( isset( $params['input_confirmmail_to'] ) )
  {
    $this->SetPreference('send_emails_to',
			 $params['input_confirmmail_to']);
  }

if( isset( $params['input_force_email_twice'] ) )
  {
    $this->SetPreference('selfreg_force_email_twice', 1);
  }
else
  {
    $this->SetPreference('selfreg_force_email_twice', 0);
  }

if( isset( $params['input_skip_final_msg'] ) )
  {
    $this->SetPreference('selfreg_skip_final_msg', 1);
  }
else
  {
    $this->SetPreference('selfreg_skip_final_msg', 0);
  }

$login_afterverify = 0;
if( isset($params['input_login_afterverify']) )
  {
    $login_afterverify = 1;
  }
$this->SetPreference('login_afterverify',$login_afterverify);

$input_redirect_afterregister = '';
if( isset($params['input_redirect_afterregister']) )
  {
    $input_redirect_afterregister = trim($params['input_redirect_afterregister']);
  }
$this->SetPreference('redirect_afterregister',$input_redirect_afterregister);

$input_redirect_afterverify = '';
if( isset($params['input_redirect_afterverify']) )
  {
    $input_redirect_afterverify = trim($params['input_redirect_afterverify']);
  }
$this->SetPreference('redirect_afterverify',$input_redirect_afterverify);

$this->myRedirectToTab( $id, 'preferences' );

// EOF
?>
