<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: FrontEndUsers (c) 2008 by Robert Campbell 
#         (calguy1000@cmsmadesimple.org)
#  An addon module for CMS Made Simple to allow management of frontend
#  users, and their login process within a CMS Made Simple powered 
#  website.
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

if( !$this->_HasSufficientPermissions( 'editusers' ) )
  {
    $this->_DisplayErrorPage($id, $params, $returnid,
			     $this->Lang('accessdenied'));
    return;
  }

// do we want to go back
if( isset( $params['back'] ) )
  {
    // yup we do
    $params = RRUtils::explode_with_key( $params['step1_params'] );;
    $this->myRedirect( $id, 'edituser', $returnid,$params );
  }
if( isset($params['cancel']) )
  {
    $this->myRedirectToTab($id, 'users' );
  }
if( !isset( $params['user_id'] ) )
  {
    $this->_DisplayErrorPage($id, $params, $returnid,
			     $this->Lang('error_insufficientparams'));
  }

// get the field info
$fldinfo = array();
foreach( $params as $k => $v )
{
  if( preg_match('/^hidden_/', $k ) )
    {
      $fldname = substr( $k, strlen('hidden_'));
      $propinfo = split(';',$v);
      $fldinfo[$fldname] = $propinfo;
    }
}

// now get each of the fields
$fields = array();
foreach( $fldinfo as $fldname => $finfo )
{
  switch( $finfo[1] )
    {
    case '8':
      $v = '';
      if( isset($params['input_'.$fldname.'Month']) )
	{
	  $v = mktime(0,0,0,
		      (int)$params['input_'.$fldname.'Month'],
		      (int)$params['input_'.$fldname.'Day'],
		      (int)$params['input_'.$fldname.'Year']);
	}
      $fields[$fldname] = $v;
      break;

    default:
      if( isset($params['input_'.$fldname]) )
	{
	  $fields[$fldname] = $params['input_'.$fldname];
	}
      break;
    }
}

// now validate
foreach( $fldinfo as $name => $val )
{
  // we don't care about empty optional ones
  if( $val[3] == 2 )
    {
      // process empty required fields
      if( $val[1] == 6 )
	{
	  if( (!isset($_FILES[$id.'input_'.$name]) || $_FILES[$id.'input_'.$name]['size'] == 0) &&
	      $val[5] == '')
	    {
	      // a required image field is empty
	      $params = array_merge( $params, RRUtils::explode_with_key( $params['step1_params'] ));
	      $params['error'] = 1;
	      $params['message'] = $this->Lang('error_missing_required_param',$name);
	      $this->myRedirect( $id, 'do_adduser2', $returnid,$params );
	      return;
	    }
	}
      else if( !isset($fields[$name]) || $fields[$name] == '' )
	{
	  // a required other type field is empty
	  $params = array_merge( $params, RRUtils::explode_with_key( $params['step1_params'] ));
	  $params['error'] = 1;
	  $params['message'] = $this->Lang('error_missing_required_param',$name);
	  $this->myRedirect( $id, 'do_adduser2', $returnid,$params );
	  return;
	}
    }

  // validate filled in fields
  // optional,or required.
  // and do post processing
  if( isset( $fields[$name] ) || $val[1] == 6 )
    {
      switch( $val[1] )
	{
	case 0: // text
	  // not much we can do to validate a text field.
	  break;
	case 1: // checkbox
	  // or a checkbox
	  break;
	case 2: // email
	  // email addresses can be validated though
	  break;
	case 3: // textarea
	  // maybe size?
	  break;
	case 4: // dropdown
	  // How can we validate a dropdown?
	  break;
	case 5: // multiselect
	  // How can we validate a multi-select
	  if( is_array( $fields[$name] ) )
	    {
	      // convert it to a comma separated list for storage
	      $fields[$name] = implode(',',$fields[$name]);
	    }
	  break;
	case 6: // image
	  if( isset($params['input_'.$name.'_clear']) && $params['input_'.$name.'_clear'] == 'clear' )
	    {
	      // we're told to clear an image property, we must also
	      // delete the image
	      $destDir1 = $gCms->config['uploads_path'].DIRECTORY_SEPARATOR;
	      $destDir1 .= $this->GetPreference('image_destination_path','feusers').DIRECTORY_SEPARATOR;
	      $file1 = $destDir1.$val[5];
	      @unlink( $file1 );
	      
	      // unset the hidden param to prevent any further processing
	      unset( $params['hidden_'.$name] );
	    }
	  else
	    {
	      // image types don't have a param (even if we have uploaded a file)
	      // so we set one.
	      $fields[$name] = $val[5];
	    }
	  break;
	case 8: // date
	  // todo, validate... against attribs.
	  break;
	}
    }
}

// get the parms from the first step
$parms1 = RRUtils::explode_with_key( $params['step1_params'] );
    
// and merge em into $params so we can actually add the user account
$params = array_merge( $params, $parms1 );

// now find out which groups he's a member of
$grpids = array();
foreach( $params as $k => $v )
{
  if( preg_match('/^memberof_/', $k ) )
    {
      $grpids[] = $params[$k];
    }
}

$user_id = '';
if( isset( $params['user_id'] ) )
  {
    $user_id = $params['user_id'];
  }
 else 
   {
     $this->smarty->assign ('error', "1");
     $this->smarty->assign ('message', $ret[1] );
     $this->_DisplayAdminAddUserStep2Page( $id, $params, $returnid );
     return;	
   }

$username = '';
if( isset( $params['input_username'] ) )
  {
    $username = $params['input_username'];
  }
$password = '';
if( isset( $params['input_password'] ) && $params['input_password'] != '' )
  {
    $password = $params['input_password'];
  }
$expiresdate = strtotime('+10 years', time());
if( isset( $params['input_expiresdate'] ) )
  {
    $expiresdate = $params['input_expiresdate'];
  }
    
// and Set the user
$ret = $this->SetUser( $user_id, $username, $password, $expiresdate );
if( $ret[0] == false )
  {
    $this->smarty->assign ('error', "1");
    $this->smarty->assign ('message', $ret[1] );
    $this->_DisplayAdminAddUserStep2Page( $id, $params, $returnid );
    return;	
  }

// and then add him to his groups
$ret = $this->SetUserGroups( $user_id, $grpids );
if( $ret[0] == false )
  {
    $this->smarty->assign ('error', "1");
    $this->smarty->assign ('message', $this->Lang('error_cantassignuser') );
    $this->_DisplayAdminAddUserStep2Page( $id, $params, $returnid );
    return;	
  } 

// and then add his properties
// delete them all first though
$this->DeleteUserPropertyFull( "", $user_id, true );
foreach( $fields as $k => $v )
{
  $vals =& $fldinfo[$k];

  if( preg_match('/_clear$/', $k ) )
    {
      continue;
    }
  
  if( $vals[1] == 6 )
    {
      // image type
      if( isset($_FILES[$id.'input_'.$k]) && $_FILES[$id.'input_'.$k]['size'] > 0 )
	{
	  // it's an uploaded file type
	  $result = $this->ManageImageUpload($id,'input_', $k, $user_id );
	  if( $result[0] == false )
	    {
	      $params['error'] = 1;
	      $params['message'] = $this->Lang('error').'&nbsp;'.$result;
	      $this->_DisplayAdminAddUserStep2Page( $id, $params, $returnid );
	      return;
	    }
	  $v = $result[1];
	}
    }
  $ret = $this->SetUserPropertyFull( $k, $v, $user_id );
  if( $ret == false )
    {
      $params['error'] = 1;
      $params['message'] = $this->Lang('error');
      $this->_DisplayAdminAddUserStep2Page( $id, $params, $returnid );
      return;
    }
}

// and we're done
// send the event
$event_params = array();
$event_params['name'] = $username;
$event_params['id'] = $user_id;
$this->SendEvent('OnUpdateUser',$event_params);
$this->_SendNotificationEmail('OnUpdateUser',$event_params);

$this->myRedirectToTab($id, 'users' );

// EOF
?>