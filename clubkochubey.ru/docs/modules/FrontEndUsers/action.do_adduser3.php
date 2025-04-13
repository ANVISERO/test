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

if( !$this->_HasSufficientPermissions( 'adduser' ) )
  {
    return;
  }

// do we want to go back
if( isset( $params['back'] ) )
  {
    // yup we do
    $params = RRUtils::explode_with_key( $params['step1_params'] );
    $this->myRedirect( $id, 'adduser', $returnid, $params, true );
  }
if( isset( $params['cancel'] ) )
  {
    // yup we do
    $params = RRUtils::explode_with_key( $params['step1_params'] );
    $this->myRedirectToTab( $id, 'users', $params );
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
foreach( $fldinfo as $fldname => $info )
{
  $v = '';
  switch($info[1]) 
    {
    case '8': // date
      if( isset($params['input_'.$fldname.'Month']) )
	{
	  $v = mktime(0,0,0,
		      (int)$params['input_'.$fldname.'Month'],
		      (int)$params['input_'.$fldname.'Day'],
		      (int)$params['input_'.$fldname.'Year']);
	}
      break;

    default:
      if( isset($params['input_'.$fldname]) )
	{
	  $v = $params['input_'.$fldname];
	}
      break;
    }
  if( !empty($v) )
    {
      $fields[$fldname] = $v;
    }
}

foreach( $fldinfo as $name => $val )
{
  // process empty required fields
  // we don't care about empty optional ones
  if( $val[3] == 2 )
    {
      if( $val[1] == 6 ) // Image field
	{
	  if( (!isset($_FILES[$id.'input_'.$name]) || $_FILES[$id.'input_'.$name]['size'] == 0) &&
	      $val[5] == '')
	    {
	      // a required field is empty
	      $params = RRUtils::array_merge( $params, explode_with_key( $params['step1_params'] ));
	      $params['error'] = 1;
	      $params['message'] = $this->Lang('error_missing_required_param',$name);
	      $this->myRedirect( $id, 'do_adduser2', $returnid, $params, true );
	      return;
	    }
	}
      else if( !isset($fields[$name]) || $fields[$name] == '')
	{
	  // a required field is empty
	  $params = array_merge( $params, RRUtils::explode_with_key( $params['step1_params'] ));
	  $params['error'] = 1;
	  $params['message'] = $this->Lang('error_missing_required_param',$name);
	  $this->myRedirect( $id, 'do_adduser2', $returnid,$params, true );
	  return;
	}
    }

  // validate filled in fields
  // and do post processing
  if( isset($fields[$name]) || $val[1] == 6 )
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
		// a textarea can be validated for length.
	  break;
	case 4: // dropdown
	case 5: // multiselect
		// how can we validate a dropdown?
	  break;
	case 6: // image
		// image types don't have a param (even if we have uploaded a file)
		// so we set one
	  $fields[$name] = '<notset>';
	  break;
	}
    }
}

// get the parms from the first step
$parms1 = RRUtils::explode_with_key( $params['step1_params'] );
    
// and merge em into $params so we can actually add the user account
$params = array_merge( $params, $parms1 );

// now find out which groups he's a member of
$memberof = array();
foreach( $params as $k => $v )
{
  if( preg_match('/^memberof_/', $k ) )
    {
      $memberof[] = $params[$k];
    }
}

// now we can actually add the user
$ret = $this->AddUser( $params['input_username'], 
		       $params['input_password'],
		       $params['input_expiresdate'] );
if( $ret[0] == FALSE )
  {
    $params['error'] = 1;
    $params['message'] = $ret[1];
    $this->myRedirect( $id, 'do_adduser2', $returnid,$params, true );
    return;
  }
$uid = $ret[1];

// and add him to his groups
foreach( $memberof as $mem )
{
  if( !$this->AssignUserToGroup( $ret[1], $mem ) )
    {
      $params['error'] = 1;
      $params['message'] = $this->Lang('error_invalidgroupid',$mem);
      $this->myRedirect( $id, 'do_adduser2', $returnid,$params, true );
      return;
    }
}

// and add his properties
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
	  $result = $this->ManageImageUpload($id,'input_', $k, $uid );
	  if( $result[0] == false )
	    {
	      $params['error'] = 1;
	      $params['message'] = $this->Lang('error').'&nbsp;'.$result;
	      $this->myRedirect( $id, 'do_adduser2', $returnid,$params, true );
	      return;
	    }
	  $v = $result[1];
	}
    }

  if( is_array( $v ) )
    {
      $v = implode(',',$v);
    }
  $ret = $this->SetUserPropertyFull( $k, $v, $uid );
  if( $ret == false )
    {
      $params['error'] = 1;
      $params['message'] = $this->Lang('error');
      $this->myRedirect( $id, 'do_adduser2', $returnid, $params, true );
      return;
    }
}

// send an event
$parms = array();
$parms['id'] = $uid;
$parms['name'] = $params['input_username'];
$this->SendEvent('OnCreateUser',$parms);
$this->_SendNotificationEmail('OnCreateUser',$parms);

// keep a log of it
$this->Audit( 0, $this->Lang('friendlyname'),
	      $this->Lang('user_added',array($uid,$params['input_username'])));

// and that should be it
$params = RRUtils::explode_with_key( $params['step1_params'] );
$this->myRedirectToTab( $id, 'users', $params );

// EOF
?>