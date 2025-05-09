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

    $feusers =& $this->GetModuleInstance('FrontEndUsers');
    if( !$feusers )
      {
	// this is ugly for the user to see
	// but at least the admin will be able to figure it out
	$module->_DisplayErrorPage( $id, $params, $returnid,
				  $module->Lang('error_nofeusersmodule'));
	return;
      }


// now all we have to do is get the username, code, and password
// and make sure it all matches
if( !isset( $params['input_username'] ) )
  {
    $params['mode'] = 'verify';
    if ($feusers->GetPreference('username_is_email'))
         {
         $params['message'] = $this->Lang('error_missingemail');
         }
    else
         {
         $params['message'] = $this->Lang('error_missingusername');
         }
    $params['error'] = 1;
    return $this->myRedirect( $id, 'default', $returnid, $params );
  }
$username = trim($params['input_username']);
if( !isset( $params['input_password'] ) )
  {
    $params['mode'] = 'verify';
    $params['message'] = $this->Lang('error_missingpassword');
    $params['error'] = 1;
    return $this->myRedirect( $id, 'default', $returnid, $params );
  }
$password = trim($params['input_password']);
if( !isset( $params['input_code'] ) )
  {
    $params['mode'] = 'verify';
    $params['message'] = $this->Lang('error_missingcode');
    $params['error'] = 1;
    return $this->myRedirect( $id, 'default', $returnid, $params );
  }
$code = trim($params['input_code']);

// now get the details out of the database for ths user
$db = $this->GetDb();
$q = "SELECT * FROM ".cms_db_prefix()."module_selfreg_users
          WHERE username = ?";
$dbresult = $db->Execute( $q, array( $username ) );
if( !$dbresult )
  {
    $params['mode'] = 'verify';
    $params['message'] = $this->Lang('error_dberror');
    $params['error'] = 1;
    return $this->myRedirect( $id, 'default', $returnid, $params );
  }
if( $dbresult->RecordCount() != 1 )
  {
    $params['mode'] = 'verify';
    $params['message'] = $this->Lang('error_usernotfound');
    $params['error'] = 1;
    $this->Audit( 0, $this->Lang('friendlyname'), 
		  $this->Lang('error_usernotfound').": ".$username);
    return $this->myRedirect( $id, 'default', $returnid, $params );
  }
    
$tmpuser = $dbresult->FetchRow();
if( md5($password) != $tmpuser['passsword'] )
  {
    $params['mode'] = 'verify';
    $params['message'] = $this->Lang('error_passwordsdontmatch');
    $params['error'] = 1;
    $this->Audit( 0, $this->Lang('friendlyname'), 
		  $this->Lang('error_passwordsdontmatch').": ".$username);
    return $this->myRedirect( $id, 'default', $returnid, $params );
  }
if( $code != $tmpuser['code'] )
  {
    $params['mode'] = 'verify';
    $params['message'] = $this->Lang('error_codesdontmatch');
    $params['error'] = 1;
    $this->Audit( 0, $this->Lang('friendlyname'), 
		  $this->Lang('error_codesdontmatch').": ".$username);
    return $this->myRedirect( $id, 'default', $returnid, $params );
  }
if( isset( $params['input_group_id'] ) && $params['input_group_id'] != '' )
  {
    $group_id = trim($params['input_group_id']);
  }
 else
   {
     $group_id = $tmpuser['group_id'];
   }

$result = $this->_CreateFrontendUser( $tmpuser['id'], $group_id,
				      $username, $password );
if( $result != 0 )
  {
    $params['mode'] = 'verify';
    $params['message'] = $result;
    $params['error'] = 1;
    return $this->myRedirect( $id, 'default', $returnid, $params );
  }

// woohooo, the user be created (hopefully).
// delete the records from the SelfReg tables
$this->DeleteTempUserProperties( $tmpuser['id'] );
$this->DeleteTempUser( $tmpuser['id'] );

unset($params['mode']);
unset($params['action']);

// do we automatically log this user in?
if( $this->GetPreference('login_afterverify') )
  {
    $feu =& $this->GetModuleInstance('FrontEndUsers');
    $feu->Login( $username, $password );
  }

// Check if we have to redirect to a page or not
$destpagestr = $this->ProcessTemplateFromData($this->GetPreference('redirect_afterverify'));
if( !empty($destpagestr) )
  {
    $contentops =& $gCms->GetContentOperations();
    $destpageid = $contentops->GetPageIDFromAlias($destpagestr);
    if( $destpageid == FALSE )
      {
	$tmpalias = $contentops->GetPageAliasFromID($destpagestr);
	if( !$tmpalias )
	  {
	    $destpageid = $tmpalias;
	  }
      }
    $returnid = $destpageid;
  }
$parms = array();
$parms['username'] = $params['username'];
$this->Redirect($id,'post_createuser',$returnid,$parms);

?>
