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
    // this shouldn't happen once the user has seen the form.
    $this->_DisplayErrorPage( $id, $params, $returnid,
			      $this->Lang('error_nofeusersmodule'));
    return;
  }

$cmsmailer =& $this->GetModuleInstance('CMSMailer');
if( !$cmsmailer )
  {
    // this is ugly for the user to see
    // but at least the admin will be able to figure it out
    $this->_DisplayErrorPage( $id, $params, $returnid,
			      $this->Lang('error_nofeusersmodule'));
    return;
  }


// check for required parameters
if( !isset( $params['group_id'] ) )
  {
    $this->_DisplayErrorPage( $id, $params, $returnid,
			      $this->Lang('error_insufficientparams'));
    return;
  }

$tmp = $this->GetPreference('noregister_groups');
if( !empty($tmp) )
  {
    $tmp = explode(',',$tmp);
    if( in_array($params['group_id'],$tmp) )
      {
	$this->_DisplayErrorPage( $id, $params, $returnid,
				  $this->Lang('error_noregister'));
	return;
      }
  }

// Get property definitions
$propdefnsbyname = $feusers->GetPropertyDefns();

// Get group property relations
$properties = array();
{
  $tmp = $feusers->GetGroupPropertyRelations( $params['group_id'] );
  for( $i = 0; $i < count($tmp); $i++ )
    {
      $properties[$tmp[$i]['name']] = $tmp[$i];
    }
}

//
// Check to ensure all required fields have some content
// and validate email fields
//
foreach( $properties as $propname => $prop )
{
  $proptype = $propdefnsbyname[$propname]['type'];
  $required = ($properties[$propname]['required'] == 2);

  switch( $proptype )
    {
    case 2: /* email */
      if( $required )
	{
	  if( !isset($params['input_'.$propname]) || $params['input_'.$propname] == ''  )
	    {
	      $defn = $feusers->GetPropertyDefn( $propname );
	      $params['error'] = 1;
	      $params['message'] = $this->Lang('error_requiredfield',$defn['prompt']);
	      return $this->myRedirect( $id, 'default', $returnid, $params );
	    }
	  
	  $result = $feusers->IsValidEmailAddress( $params['input_'.$propname]);
	  if( $result[0] == false )
	    {
	      $params['error'] = 1;
	      $params['message'] = $result[1];
	      return $this->myRedirect( $id, 'default', $returnid, $params );
	    }
	}
      break;
      
    case 5: /* multiselect */
      if( $required )
	{
	  if( !isset($params['input_'.$propname]) || $params['input_'.$propname] == ''  )
	    {
	      $defn = $feusers->GetPropertyDefn( $propname );
	      $params['error'] = 1;
	      $params['message'] = $this->Lang('error_requiredfield',$defn['prompt']);
	      return $this->myRedirect( $id, 'default', $returnid, $params );
	    }
	}
      if( isset($params['input_'.$propname]) )
	{
	  $params['input_'.$propname] = implode(',',$params['input_'.$propname]);
	}
      break;
      
    case 8: /* date */
      if( $required )
	{
	  if( !isset($params['input_'.$propname.'Month']) )
	    {
	      $defn = $feusers->GetPropertyDefn( $propname );
	      $params['error'] = 1;
	      $params['message'] = $this->Lang('error_requiredfield',$defn['prompt']);
	      return $this->myRedirect( $id, 'default', $returnid, $params );
	    }
	}
      if( isset($params['input_'.$propname.'Month']) )
	{
	  $params['input_'.$propname] =
	    mktime(0,0,0,
		   $params['input_'.$propname.'Month'],
		   $params['input_'.$propname.'Day'],
		   $params['input_'.$propname.'Year']);
	  unset($params['input_'.$propname.'Month']);
	  unset($params['input_'.$propname.'Day']);
	  unset($params['input_'.$propname.'Year']);
	}
      break;
      
    default:
      if( $required )
        {
          if( !isset($params['input_'.$propname]) || $params['input_'.$propname] == ''  )
            {
              $defn = $feusers->GetPropertyDefn( $propname );
              $params['error'] = 1;
              $params['message'] = $this->Lang('error_requiredfield',$defn['prompt']);
              return $this->myRedirect( $id, 'default', $returnid, $params );
            }
        }
      break;
    }
}

// get the username and password
$username = '';
if( isset( $params['input_username'] ) )
  {
    $username = trim($params['input_username']);
  }
$password = '';
if( isset( $params['input_password'] ) )
  {
    $password = trim($params['input_password']);
  }
$repeatpassword = '';
if( isset( $params['input_repeatpassword'] ) )
  {
    $repeatpassword = trim($params['input_repeatpassword']);
  }

// check if the username is valid or taken
if( $username == '' )
  {
    $params['error'] = 1;
    if ($feusers->GetPreference('username_is_email'))
      {
	$params['message'] = $this->Lang('error_emptyemail');
      }
    else
      {
	$params['message'] = $this->Lang('error_emptyusername');
      }
    
    return $this->myRedirect( $id, 'default', $returnid, $params );
  }

if( !$feusers->IsValidUsername( $username ) )
  {
    $params['error'] = 1;
    if ($feusers->GetPreference('username_is_email'))
      {
	$params['message'] = $this->Lang('error_invalidemail');
      }
    else
      {
         $params['message'] = $this->Lang('error_invalidusername');
      }
    return $this->myRedirect( $id, 'default', $returnid, $params );
  }

$uid = $this->GetTempUserID($username);
if( $uid != false )
  {
    $params['error'] = 1;
    $params['message'] = $this->Lang('error_usernametaken');
    return $this->myRedirect( $id, 'default', $returnid, $params );
  }
if( $feusers->GetUserID($username) )
  {
    $params['error'] = 1;
    $params['message'] = $this->Lang('error_usernametaken');
    return $this->myRedirect( $id, 'default', $returnid, $params );
  }

// check if the passwords match or if they're valid
if( $password != $repeatpassword )
  {
    $params['error'] = 1;
    $params['message'] = $this->Lang('error_passwordsdontmatch');
    return $this->myRedirect( $id, 'default', $returnid, $params );
  }
$minpwlen = $feusers->GetPreference('min_passwordlength');
$maxpwlen = $feusers->GetPreference('max_passwordlength');
if( strlen($password) < $minpwlen || strlen($password) > $maxpwlen )
  {
    $params['error'] = 1;
    $params['message'] = $this->Lang('error_invalidpassword',
				     array($minpwlen,$maxpwlen));
    return $this->myRedirect( $id, 'default', $returnid, $params );
  }

$email_field = '';
if ($feusers->GetPreference('username_is_email'))
  {
    // email field is easy!
    $email_field = 'input_username';
  }
else
  {
   // find an email field... something that's name has email in it
   // or is of type 2
   foreach( $params as $key => $val )
     {
       if( preg_match( '/^input_/', $key ) )
	 {
	   $proptype = '';
	   $propname = substr($key,strlen('input_'));
	   if( isset($propdefnsbyname[$propname]) && $propdefnsbyname[$propname]['type'] == 2 )
	     {
	       $email_field = 'input_'.$propname;
	     }
	 }
     }
   }

if( $email_field == '' )
  {
    $params['error'] = 1;
    $params['message'] = $this->Lang('error_noemailaddress');
    return $this->myRedirect( $id, 'default', $returnid, $params );
  }

$email = $params[$email_field];


if( $this->GetPreference('selfreg_force_email_twice') )
  {
    if( !isset($params[$email_field.'_again'] ) )
      {
	$params['error'] = 1;
	$params['message'] = $this->Lang('error_nosecondemailaddress');
	return $this->myRedirect( $id, 'default', $returnid, $params );
      }

    if( $params[$email_field] != $params[$email_field.'_again'] )
      {
	$params['error'] = 1;
	$params['message'] = $this->Lang('error_emaildoesnotmatch');
	return $this->myRedirect( $id, 'default', $returnid, $params );
      }
  }

   
$captcha =& $this->GetModuleInstance('Captcha');
if( is_object($captcha) && !isset($params['nocaptcha']) )
  {
    if (! $captcha->CheckCaptcha($params['input_captcha']))
      {
	$params['error'] = 1;
	$params['message'] = $this->Lang('error_captchamismatch');
	return $this->myRedirect( $id, 'default', $returnid, $params );
      }
  }

// generate a unique code that the user can enter to double confirm
// his login.
$code = $feusers->GenerateRandomPrintableString();

// have to add the record to the database so that we know who this guy is
// when he comes back
$return = $this->CreateTempUser( $params['group_id'], $username, $password, $code );
if( $return[0] == false )
  {
    $params['error'] = 1;
    $params['message'] = $return[1];
    return $this->myRedirect( $id, 'default', $returnid, $params );
  }

// and add his properties too
$tmpuid = $return[1];
foreach( $properties as $propname => $prop )
{
  $proptype = $propdefnsbyname[$propname]['type'];
  $required = ($properties[$propname]['required'] == 2);

  // check if the value exists (it may be an optional field)
  if( !isset($params['input_'.$propname]) ) continue;

  $value = $params['input_'.$propname];
  if( is_array($value) )
    {
    }
  $return = $this->AddTempUserProperty( $tmpuid, $propname, 
					$params['input_'.$propname] );
  
  if( $return[0] == false )
    {
      // now we have an issue to figure out
      $params['error'] = 1;
      $params['message'] = $return[1];
      return $this->myRedirect( $id, 'default', $returnid, $params );
    }
}

$action = 'post_registeruser';
$parms = array();
$parms['username'] = $username;
$parms['email'] = $email;

if( $this->GetPreference('require_email_confirmation',1) )
  {
    // okay, we're now ready to send the email, yahoo, yahoo, yahoo
    // now we have to decide what goes in it.
    $this->_SendUserConfirmationEmail($id,$returnid,$email,
				      $username, $params['group_id'], $code );
	
    // send an event
    $this->SendEvent('onNewUser',
		     array('username'=>$username,
			   'email'=>$email));

    // we're not redirecting anywhere we need to display some nice message
    // about we just spammed your inbox, etc, etc.
//     $this->smarty->assign('sitename', $gCms->config['root_url']);
//     $this->smarty->assign('username',$username);
//     $this->smarty->assign('email', $address );
//     echo $this->ProcessTemplateFromDatabase('selfreg_postreg1_template');
  }
else
  {
    $action = 'post_createuser';
    
    // it appears we're allowing instant registration
    $result = $this->_CreateFrontendUser( $tmpuid, $params['group_id'],
					  $username, $password );
    
    if( $result != 0 )
      {
	$params['error'] = 1;
	$params['message'] = $result;
	return $this->myRedirect( $id, 'default', $returnid, $params );
      }
    
    // woohooo, the user be created (hopefully).
    // delete the records from the SelfReg tables
    $this->DeleteTempUserProperties( $tmpuid );
    $this->DeleteTempUser( $tmpuid );
    
    // do we automatically log this user in?
    if( $this->GetPreference('login_afterverify') )
      {
	$feu =& $this->GetModuleInstance('FrontEndUsers');
	$res = $feu->Login( $username, $password );
	if( is_array($res) && $res[0] == FALSE )
	  {
	    die('auto login error = {$res[1]}');
	  }
      }

    // send an event
    $this->SendEvent('onNewUser',
		     array('username'=>$username,
			   'email'=>$email));
  }

// Check if we have to redirect to a page or not

$destpagestr = $this->ProcessTemplateFromData($this->GetPreference('redirect_afterregister'));
if( !empty($destpagestr) )
  {
    $contentops =& $gCms->GetContentOperations();
    $destpageid = $contentops->GetPageIDFromAlias($destpagestr);
    if( $destpageid == FALSE )
      {
	$tmpalias = $contentops->GetPageAliasFromID($destpagestr);
	if( $tmpalias )
	  {
	    $destpageid = $tmpalias;
	  }
      }
    $returnid = $destpageid;
  }

if( $this->GetPreference('selfreg_skip_final_msg') )
  {
    $this->RedirectContent($returnid);
  }

$this->Redirect($id,$action,$returnid,$parms);

?>
