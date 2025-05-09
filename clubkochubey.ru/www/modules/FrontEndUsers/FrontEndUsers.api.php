<?php // -*- mode:php; c-file-style:linux; tab-width:2; indent-tabs-mode:t; c-basic-offset: 2; -*-
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

require_once(dirname(__FILE__)."/UserManipulator.class.php" );

class FrontEndUsersManipulator extends UserManipulator
{
  var $_cached_propdefns;
  var $_cached_uid_map;

  function CountTempCodeRecords()
  {
    $db =& $this->GetDB();
    $q = "SELECT COUNT(*) AS count FROM ".cms_db_prefix()."module_feusers_tempcode";
    $dbresult = $db->Execute( $q );
    if( !$dbresult )
      {
				return 0;
      }
    $row = $dbresult->FetchRow();
    return $row['count'];
  }

  function ExpireTempCodes($expirycode)
  {
    $db =& $this->GetDb();
    $expires = strtotime( $expirycode );
    $q = "DELETE FROM ".cms_db_prefix()."module_feusers_tempcode
          WHERE created > ?";
    $dbresult = $db->Execute( $q, array( $expires ) );
    if( !$dbresult ) return false;
    return true;    
  }

  function RemoveUserTempCode( $uid )
  {
		if( !$uid ) return false;
    $db =& $this->GetDb();
    $q = "DELETE FROM ".cms_db_prefix()."module_feusers_tempcode
          WHERE userid = ?";
    $dbresult = $db->Execute( $q, array( $uid ) );
    if( !$dbresult ) return false;
    return true;
  }


  function GetUserTempCode( $uid )
  {
		if( !$uid ) return false;
    $db =& $this->GetDb();
    $q = "SELECT * FROM ".cms_db_prefix()."module_feusers_tempcode
          WHERE userid = ?";
    $dbresult = $db->Execute( $q, array( $uid ));
    if( $dbresult == FALSE || $dbresult->RecordCount() == 0 )
      {
	return array(FALSE,$db->ErrorMsg());
      }
    $row = $dbresult->FetchRow();
    return array(TRUE,$row);
  }


  function SetUserTempCode( $uid, $code, $replace=false )
  {
		if( !$uid ) return false;
   $db =& $this->GetDb();
   $q = "INSERT INTO ".cms_db_prefix()."module_feusers_tempcode
          VALUES(?,?,?)";
   $dbresult = $db->Execute( $q, array( $uid, $code,
					 trim($db->DBTimeStamp(time()),"'") ) );

	 if( $dbresult == false )
    	{
		if ($replace)
			{
    		$q = "update ".cms_db_prefix()."module_feusers_tempcode
          set code=?, created=? WHERE userid=?";
    		$dbresult = $db->Execute( $q, array($code,
					 trim($db->DBTimeStamp(time()),"'"),$uid ) );
			if ($dbresult == false)
				{
				return false;
				}
			}
	 	else
	   	{
			return false;
      	}
     }
    return true;
  }


  function SetPropertyDefn( $name, $newname, $prompt, $length, $type, $maxlength = 0, $attribs = '' )
  {
    $db = $this->getDb();
    
    if( $maxlength == 0 )
      {
	$maxlength = $length;
      }
    $q = "UPDATE ".cms_db_prefix()."module_feusers_propdefn
          SET name = ?, prompt = ?, type = ?, length = ?, maxlength = ?, attribs = ?
          WHERE name = ?";
    $dbresult = $db->Execute( $q, array( $newname, $prompt, $type, $length, $maxlength, $attribs, $name ));
    if( !$dbresult )
      {
				return false;
      }
    return true;
  }


  function DeletePropertyDefn( $name )
  {
    $db =& $this->GetDb();

    $q = "DELETE FROM ".cms_db_prefix()."module_feusers_propdefn
          WHERE name=?";
    $dbresult = $db->Execute( $q, array( $name ) );
    if( !$dbresult )
      {
	return false;
      }
    return true;
  }


  function GetPropertyGroupRelations( $title )
  {
    $db =& $this->GetDb();

    $q = "SELECT * FROM ".cms_db_prefix()."module_feusers_grouppropmap
          WHERE name = ? ORDER BY sort_key DESC";
    $dbresult = $db->Execute( $q, array( $title ) );
    if( !$dbresult )
      {
	return array(FALSE,$db->ErrorMsg());
      }
    $result = array();
    while( $row = $dbresult->FetchRow() )
      {
	array_push( $result, $row );
      }
    return $result;
  }


  function IsAccountExpired( $uid )
  {
		if( !$uid ) return true; // dunno about this
    $db =& $this->GetDb();
    
		$now = trim($db->DbTimeStamp(time()),'"');
    $q = "SELECT * FROM ".cms_db_prefix()."module_feusers_users
          WHERE id = ? AND expires > $now";
    $parms = array( $uid );
    $dbresult = $db->Execute( $q, array( $uid ) );
    if( $dbresult && $dbresult->RecordCount() == 1 )
      {
				return false;
      }

    return true;
  }


  function GetGroupPropertyRelations( $grpid )
  {
    $db =& $this->GetDb();

    $q = "SELECT * FROM ".cms_db_prefix()."module_feusers_grouppropmap
          WHERE group_id = ? ORDER BY sort_key DESC";
    $dbresult = $db->Execute( $q, array( $grpid ));
    if( !$dbresult )
      {
	return array(FALSE,$db->ErrorMsg());
      }
    $result = array();
    while( $row = $dbresult->FetchRow() )
      {
	$result[] = $row;
      }
    return $result;
  }


  function AddGroupPropertyRelation( $grpid, $propname, $sortkey, $lostun, $val )
  {
    $db =& $this->GetDb();

    $q = "INSERT INTO ".cms_db_prefix()."module_feusers_grouppropmap
          VALUES(?,?,?,?,?)"; 
    $dbresult = $db->Execute( $q, array( $propname, $grpid, $sortkey, $val, $lostun ));
    if( !$dbresult )
      {
				die( $db->ErrorMsg()." ".$db->sql );
				return array(FALSE,$db->ErrorMsg());
      }
    return array(TRUE);
  }


  function DeleteAllGroupPropertyRelations( $grpid )
  {
    $db =& $this->GetDb();
    
    $q = "DELETE FROM ".cms_db_prefix()."module_feusers_grouppropmap
          WHERE group_id = ?";
    $dbresult = $db->Execute( $q, array( $grpid ));
    if( !$dbresult )
      {
	return array(FALSE,$db->ErrorMsg());
      }
    return array(TRUE);
  }


  function DeleteGroupPropertyRelation( $grpid, $propname )
  {
    $db =& $this->GetDb();

    $q = "DELETE FROM ".cms_db_prefix()."module_feusers_grouppropmap
          WHERE name = ? AND group_id = ?";
    $dbresult = $db->Execute( $q, array( $propname, $grpid ));
    if( !$dbresult )
      {
	return array(FALSE,$db->ErrorMsg());
      }
    return array(TRUE);
  }


  function AddPropertyDefn( $name, $prompt, $type, $length, $maxlength = 0, $attribs = '' )
  {
    $db =& $this->GetDb();

    if( $maxlength == 0 )
      {
				$maxlength == $length;
      }

    $p = array( $name, $prompt, $type, $length, $maxlength, $attribs );
    $q = "INSERT INTO ".cms_db_prefix()."module_feusers_propdefn
            (name,prompt,type,length,maxlength,attribs)
          VALUES (?,?,?,?,?,?)";
    $dbresult = $db->Execute( $q, $p );
    if( $dbresult == false )
      {
				return array(FALSE, $db->sql.'<br/>'.$db->ErrorMsg());
      }
    return array(TRUE);
  }


  function AddSelectOptions( $name, $options )
  {
    $db =& $this->GetDb();
    $insert_vals = '';
    $order_id = 0;
    foreach ($options as $opttext){
      // if no actual text in the line, make sure it equals '',
      // in order not to add it to the db
      $opttext = trim($opttext);
      if(trim($opttext) == '' || trim($opttext) == '__' ){
				continue;
      }

			$optname = $opttext;
      if( strchr( $opttext, '=' ) !== FALSE )
				{
					$tmp = explode('=',$opttext);
					$optname = $tmp[1];
					$opttext = $tmp[0];
				}
			
      $order_id++;
      $insert_vals .= "('"
				. $order_id . "', '"
				. $optname . "', '"
				. $opttext . "', '"
				. $name. "'), ";
    }
    
    $insert_vals = substr($insert_vals, 0, -2);

    $db = $this->getDb();
    $query = "INSERT INTO ".cms_db_prefix()."module_feusers_dropdowns
			(order_id, option_name, option_text, control_name) 
			VALUES " . $insert_vals;
    $dbresult = $db->Execute($query);
    if( $dbresult == false ) {
      return array(FALSE, $db->ErrorMsg());
    }
    return array(TRUE);
  }
		

  
  
  function DeletePropertyDefns()
  {
    $db =& $this->GetDb();
    $q = "DELETE FROM ".cms_db_prefix()."module_feusers_propdefn";
    $dbresult = $db->Execute( $q );
    if( $dbresult == false )
      {
	return array(FALSE,$db->ErrorMsg());
      }
    return array(TRUE);
  }


  function DeleteSelectOptions( $name )
  {
    $db =& $this->GetDb();
    $q = "DELETE FROM ".cms_db_prefix()."module_feusers_dropdowns
          WHERE control_name = ?";
    $dbresult = $db->Execute( $q, array( $name ) );
    if( $dbresult == false )
      {
	return array(FALSE,$db->ErrorMsg());
      }
    return array(TRUE);
  }


	function GenerateRandomUsername( $prefix = 'user' )
	{
		srand(time());
    $db =& $this->GetDb();
   $mod =& $this->GetModule();

		$num = rand(100,99999);
		$count = 0;
		$suffix = '';
		if ($mod->GetPreference("username_is_email"))
         {
         $suffix = '@sample.com';
         }
		while( $count < 100 ) { // todo, 100 should be configurable?
			$q = "SELECT id FROM ".cms_db_prefix()."module_feusers_users
             WHERE username = ?";
			$row = $db->GetRow( $q, array( $prefix.$num.$suffix ) );
			if( !$row ) 
				{
					return $prefix.$num.$suffix;
				}
			$num = rand(100,99999);
			++$count;
		}
		return false;
	}


	function _cache_propertydefns()
	{
		if( !is_array($this->_cached_propdefns) )
			{
				$db =& $this->GetDb();

				$query = 'SELECT * FROM '.cms_db_prefix().'module_feusers_propdefn';
				$data = $db->GetArray($query);
				if( !$data ) return;

				$this->_cached_propdefns = array();
				for( $i = 0; $i < count($data); $i++ )
					{
						$this->_cached_propdefns[$data[$i]['name']] = $data[$i];
					}
			}
	}

  function GetPropertyDefn( $name )
  {
		$this->_cache_propertydefns();
		if( !is_array($this->_cached_propdefns) ) return FALSE;
		if( !isset($this->_cached_propdefns[$name])) return FALSE;
		return $this->_cached_propdefns[$name];
  }

  function GetPropertyDefns()
  {
		$this->_cache_propertydefns();
		if( !is_array($this->_cached_propdefns) ) return FALSE;
		return $this->_cached_propdefns;
  }

  /**
   * Returns select options as a simple or a 2 dimensional array
   *
   * @param String $controlname - name of the dropdown as in the propdefn table
   * @param int $dim - dimension of the array
   * 	if $dim == 1, returns a 1 dimensional array text=>name
   *    if $dim == 2, returns a 2 dimensional array, each item being an
   * 		array with properties 'option_name', 'option_text', 'control_name'.
   */
  function GetSelectOptions( $controlname, $dim=1 )
  {
	$db =& $this->GetDb();
	
	$q = "SELECT * FROM ".cms_db_prefix()."module_feusers_dropdowns
		WHERE control_name = ? ORDER BY order_id";
	$dbresult = $db->Execute( $q, array($controlname) );
	if( $dbresult == false ) {
		return false;
	}
	$ret = array();
	while( $row = $dbresult->FetchRow() ) {
		if ($dim==2){
		  $ret[] = $row;
		} else {
		  $ret[$row['option_text']] = $row['option_name'];
		}
	}
	return $ret;
  }

  
  function Login( $username, $password, $groups = '', $md5pw = false, 
									$force_logout = false)
  {
    $error = '';
    $uid = -1;
		global $gCms;
    $db =& $this->GetDb();
    $mod =& $this->GetModule();
		$config =& $gCms->GetConfig();

    if( !$this->CheckPassword( $username, $password, $groups, $md5pw ) )
      {
				$uid = $this->GetUserID( $username );
				if( !$uid ) $uid = -1;
				$error = $mod->Lang('error_loginfailed');
      }
    else
      {
				$uid = $this->GetUserID( $username );
				if( $force_logout )
					{
						$this->Logout($uid);
					}
	
				if( $this->IsAccountExpired( $uid ) )
					{
						$error = $mod->Lang('error_accountexpired');
					}
				else if( $mod->GetPreference('allow_repeated_logins') == 0 )
					{
						// make sure this user isn't already logged in
						$q = "SELECT * FROM ".cms_db_prefix()."module_feusers_loggedin WHERE 
              USERID = ?";
						$dbresult = $db->Execute( $q, array( $uid ) );
						if( $dbresult && $dbresult->RecordCount() )
							{
								$error = $mod->Lang('error_norepeatedlogins');
							}
					}

      }

    $ip = getenv("REMOTE_ADDR");
    if( !$error )
      {
				$q = "INSERT INTO ".cms_db_prefix()."module_feusers_loggedin (sessionid,lastused,userid)
               VALUES (?,?,?)";
				
				/* we may need to start a session now */
				if( session_id() == "" )
					{
						@session_start();
					}
				
				// log the user in
				$dbresult = $db->Execute( $q, array( session_id(), time(), $uid ));
				if( !$dbresult ) 
					{
						return array(FALSE, $db->ErrorMsg());
					}
				
				// set the cookie
				$module =& $this->GetModule();
				if( $module->GetPreference('cookie_keepalive',0) ) {
					$expirytime = $module->GetPreference('user_session_expires');
					@setcookie('feu_sessionid',session_id(),time()+$expirytime,"/");
					@setcookie('feu_uid',$uid,time()+$expirytime,"/");
				}

				// and add history info
				$q = "INSERT INTO ".cms_db_prefix()."module_feusers_history VALUES (?,?,?,?,?)";
				$db->Execute( $q, array( $uid, session_id(), 'login',
																 trim($db->DBTimeStamp(time()),"'"),
																 $ip ));
				
				return array($uid);
      }
    
    // log an invalid login
    $q = "INSERT INTO ".cms_db_prefix()."module_feusers_history VALUES (?,?,?,?,?)";
    $dbresult = $db->Execute( $q, array( $uid, session_id(), 'fail',
			     trim($db->DBTimeStamp(time()),"'"),
			     $ip ));
    if( !$dbresult ) $error = $db->ErrorMsg();

    return array(FALSE,$error);
  }


  function FeusersManipulator( $the_module )
  {
    parent::UserManipulator( $the_module );
  }

  // userid api function
  // returns true/fause
  function CheckGroupPermission( $gid, $perm )
  {
    // we always have to return false using this mechanism 
    // because we are using different tables than wishy is using for 
    // users and groups
    return false;
//     $db =& $this->GetDb();
    
//     $q = "SELECT * FROM ".cms_db_prefix()."permissions WHERE permission_name = ?";
//     $dbresult = $db->Execute( $q, array( $perm ) );
//     if( !$dbresult || $dbresult->RecordCount() == 0 ) return false;

//     $prow = $dbresult->FetchRow();
//     $q = "SELECT * FROM ".cms_db_prefix()."group_perms WHERE permission_id = ?
//           AND group_id = ?";
//     $dbresult = $db->Execute( $q, array( $prow['permission_id'], $gid ) );
//     if( !$dbresult || $dbresult->RecordCount() == 0 ) return false;

//     return true;
  }


  // userid api function
  // returns true/false
  function CheckUserPermission( $perm )
  {
    $uid = $this->LoggedInId();
    if( $uid == false ) return false;

    return CheckUserPermissionByUid( $uid, $perm );
  }


  function CheckUserPermissionByUid( $uid, $perm )
  {
    // we always have to return false using this mechanism 
    // because we are using different tables than wishy is using for 
    // users and groups
    return false;
  }


  // userid api function
  // returns true/false
  function AssignUserToGroup( $uid, $gid )
  {
		if( !$uid ) return false;
    // validate the user id
    if( !$this->UserExistsByID( $uid ) )
      {
	return false;
      }
    
    // validate the group id
    if( !$this->GroupExistsByID( $gid ) )
      {
	return false;
      }
    
    // add the record to the table to make this 
    // user a member of this group
    $db =& $this->GetDb();
    $q = "INSERT INTO ".cms_db_prefix()."module_feusers_belongs 
                VALUES (?,?)";
    $dbresult = $db->Execute( $q, array( $uid, $gid ) );
    return( $dbresult != false );
  }

  
  // userid api function
  // returns true/false
  function IsValidPassword( $password )
  {
    // a password is valid, if it's length is
    // within certain ranges
    $module =& $this->GetModule();
    $minlen = $module->GetPreference('min_passwordlength', 6 );
    $maxlen = $module->GetPreference('max_passwordlength', 20 );
    $len = strlen($password);
    if( $len < $minlen )
      {
	return false;
      }
    else if( $len > $maxlen )
      {
	return false;
      }
    
    /*
    // there must be atleast 3 unique characters
    if( strlen(count_chars( $username, 3 )) < min(3,minlen))
      {
	return false;
      }
    */
    return true;
  }


  // userid api function
  // returns an array
  function DeleteUserFull( $id )
  {
    // log the user out
    $this->LogoutUser( $id );

    // delete user properties
    $this->DeleteAllUserPropertiesFull( $id );

    // delete user from groups
    $ret = $this->RemoveUserFromGroup( $id, '' );
    if( $ret[0] == false )
      {
				return $ret;
      }

    // delete user record
    $db =& $this->GetDb();
    $q = "DELETE FROM ".cms_db_prefix()."module_feusers_users
          WHERE id = ?";
    $dbresult = $db->Execute( $q, array( $id ) );
    if( !$dbresult )
      {
				return array( FALSE< $db->ErrorMsg() );
      }

    // and delete anything from the tempcodes table too
    $q = "DELETE FROM ".cms_db_prefix()."module_feusers_tempcode
          WHERE userid = ?";
    $dbresult = $db->Execute( $q, array( $id ) );
    if( !$dbresult )
      {
				return array( FALSE< $db->ErrorMsg() );
      }
    
    return array( TRUE, "" );
  }


  // userid api function
  // returns an array
  function GetGroupInfo( $gid )
  {
    $db =& $this->GetDb();
    $q = "SELECT * FROM ".cms_db_prefix()."module_feusers_groups WHERE id = ?";
    $dbresult = $db->Execute( $q, array( $gid ) );
    if( !$dbresult )
      {
				return array(FALSE,$db->ErrorMsg());
      }
    $row = $dbresult->FetchRow();
		$dbresult->Close();
    return $row;
  }
  
  
  private function _getUser($uid)
	{
		if( !$uid ) return FALSE;
		if( is_array($this->_cached_uid_map) && 
				isset($this->_cached_uid_map[$uid]) )
			{
				return $this->_cached_uid_map[$uid];
			}

    $db =& $this->GetDb();
    $q = "SELECT * FROM ".cms_db_prefix()."module_feusers_users
                WHERE id = ?";
		$row = $db->GetRow($q,array($uid));
		if( !$row ) return FALSE;

		$this->_cached_uid_map[$uid] = $row;
		return $row;
	}

  // userid api function
  // returns an array
  // second element of array may be an array
  function GetUserInfo( $uid )
  {
		if( !$uid ) return array(FALSE); // todo, add a message
		$row = $this->_getUser($uid);
		if( !$row ) return array(FALSE);
    return array( TRUE, $row );
  }
  

	// userid api function
	// returns an array
	// second element of array may be an array
	function GetUserInfoByName( $username )
	{
		if( !$username ) return array(FALSE);
		
		$db = $this->GetDb();
		$query = 'SELECT id FROM '.cms_db_prefix().'module_feusers_users 
               WHERE name = ?';
		$uid = $db->GetOne($query,array($username));
		if( !$uid ) return array(FALSE);
		
		return $this->GetUserInfo($uid);
	}


	function GetUserHistory($uid,$action='',$count=-1)
	{
		$db =& $this->GetDb();
		$parms = array($uid);
		$query = 'SELECT * FROM '.cms_db_prefix().'module_feusers_history
               WHERE userid = ?';
		if( !empty($action) )
			{
				$query .= ' AND action = ?';
				$parms[] = $action;
			}

		$results = '';
		if( $count <= 0 )
			{
				$results = $db->GetArray($query,$parms);
			}
		else
			{
				$dbr = $db->SelectLimit($query,(int)$count);
				while( $dbr && ($row = $dbr->FetchRow()) )
					{
						$results[] = $row;
					}

				if( count($results) == 1 )
					{
						$tmp = $results[0];
						$results = $tmp;
					}
			}
		return $results;
	}


  // userid api function
  // returns an array or false
  function CountUsersInGroup( $groupid )
  {
    $db =& $this->GetDb();
    
    $q = '';
    $parms = array();
    if( $groupid == '' || $groupid < 0 )
      {
	$q = "SELECT count(id) as num FROM ".cms_db_prefix()."module_feusers_users"; 
      }
    else
      {
	$q = "SELECT count(id) as num FROM ".cms_db_prefix()."module_feusers_users,".
	  cms_db_prefix()."module_feusers_belongs WHERE id=userid AND groupid = ?";
	$parms[] = $groupid;
      }

    $dbresult = $db->Execute( $q, $parms );
    if( !$dbresult )
      {
	return false;
      }

    $row = $dbresult->FetchRow();
    return $row['num'];
  }

	// Get an array of users matching the specified group
	// including all of their properties
	function GetFullUsersInGroup($groupid)
	{
    $db =& $this->GetDb();
		$q1 = "SELECT A.* FROM ".cms_db_prefix()."module_feusers_users A 
             LEFT JOIN ".cms_db_prefix().'module_feusers_belongs C
               ON A.id = C.userid
            WHERE C.groupid = ?';
		$tusers = $db->GetArray($q1,array($groupid));
		if( $tusers )
			{
				$tmp = array();
				$users = array();
				foreach( $tusers as $oneuser )
					{
						$tmp[] = $oneuser['id'];
						$users[$oneuser['id']] = $oneuser;
					}

				if( count($tmp) )
					{
						$tmp2 = implode(',',$tmp);
						$q2 = 'SELECT * FROM '.cms_db_prefix()."module_feusers_properties 
                    WHERE userid IN ($tmp2) ORDER BY userid,title ASC";
						$dbr = $db->Execute($q2);
						
						$uid = '';
						$props = array();
						while( $dbr && $row = $dbr->FetchRow() )
							{
								$tmp = array();
								if( $uid == '' ) $uid = $row['userid'];
								if( $row['userid'] != $uid )
									{
										// first row or uid changed
										$users[$uid]['props'] = $props;
										$uid = $row['userid'];
										$props = array();
									}
								$props[] = $row;
							}
						$users[$uid]['props'] = $props;
					}

				return $users;
			}
		return false;
	}


  function GetUsersInGroup( $groupid = '', $userregex = '', 
														$limit = '', $sort = '',
														$property = '', $propregex = '',
														$loggedinonly = 0, $start_record = 0)
  {
    $db =& $this->GetDb();
		$thelimit = 100000;

    $parms = array();
    $where = array();
		$group = array();
    $ordersort = "";
    $q = "SELECT A.*,count(D.userid) as loggedin FROM ".cms_db_prefix()."module_feusers_users A"; 
		$qc = 'SELECT COUNT(a.id)';
		$group[] = " A.id";
		if( $loggedinonly )
			{
				$q .= ",".cms_db_prefix()."module_feusers_loggedin D";
				$qc .= ",".cms_db_prefix()."module_feusers_loggedin D";
				$where[] = " A.id = D.userid";
			}
		else
			{
				$q .= " LEFT OUTER JOIN ".cms_db_prefix()."module_feusers_loggedin D
                  ON A.id = D.userid";
				$qc .= " LEFT OUTER JOIN ".cms_db_prefix()."module_feusers_loggedin D
                  ON A.id = D.userid";
			}

    if( $property != '' && $propregex != '' )
      {
				$q .= " LEFT JOIN ".cms_db_prefix()."module_feusers_properties B ON A.id = B.userid";
				$qc .= " LEFT JOIN ".cms_db_prefix()."module_feusers_properties B ON A.id = B.userid";
      }

    if( $groupid != '' && $groupid >= 0 )
      {
				$q .= " LEFT JOIN ".cms_db_prefix()."module_feusers_belongs C ON A.id = C.userid";
				$qc .= " LEFT JOIN ".cms_db_prefix()."module_feusers_belongs C ON A.id = C.userid";
				$where[] = " A.id = C.userid";
				$where[] = " groupid = ?";
				$parms[] = $groupid;
      }

	if (is_array($property) && is_array($propregex) && count($property) == count($propregex))
	{
		$ary = array();
		for ($z = 0; $z < count($property); $z++)
		{
			if( $property[$z] != '' && $propregex[$z] != '' )
			{
				$ary[] = "(B.title = ? and B.data REGEXP ?)";
				$parms[] = $property[$z];
				$parms[] = $propregex[$z];
			}
		}
		$where[] = "(" . implode(" OR ", $ary) . ")";
	}
	else
	{
		if( $property != '' && $propregex != '' )
		{
			$where[] = " B.title = ? and B.data REGEXP ?";
			$parms[] = $property;
			$parms[] = $propregex;
		}
	}
    if( $userregex != '' )
      {
				$where[] = " username REGEXP ?";
				$parms[] = $userregex;
      }
    if( $sort != '' )
      {
				$ordersort .= " ORDER BY $sort";
      }
    if( $limit != '' && $limit != '0' )
      {
				$thelimit = (int)$limit;
      }

    // put the query together
    if( count($where ) )
      {
				$q .= " WHERE " . implode(" AND ",$where);
				$qc .= " WHERE " . implode(" AND ",$where);
      }
		if( count($group) )
			{
				$q .= " GROUP BY ". implode(" , ",$group);
				$qc .= " GROUP BY ". implode(" , ",$group);
			}
    $q .= $ordersort;
    $dbresult = $db->SelectLimit( $q, $thelimit, $start_record, $parms );
    if( !$dbresult )
      {
				return false;
      }

		$result = $dbresult->GetArray();
    return $result;
  }


  // userid api function
  // returns true/false
  function GroupExistsByID( $gid )
  {
    $data = $this->GetGroupInfo( $gid );
    return( $data != false );
  }


  // userid api function
  // returns true/false
  function GroupExistsByName( $name )
  {
    $gid = $this->GetGroupID( $name );
    return( $gid != false );
  }


  function LoggedInEmail()
  {
      $userid=$this->LoggedInId();
      return $this->GetEmail($userid);
  }
  

  function GetEmail($uid)
   {
		 $module =& $this->GetModule();
		 $db =& $this->GetDb();
		 $result = false;
		 
		 if ($module->GetPreference('username_is_email'))
			 {
				 $q = 'SELECT username FROM '.cms_db_prefix().
					 'module_feusers_users WHERE id = ?';
				 $result = $db->GetOne( $q, array( $uid ) );
			 }
		 else
			 {
				 $q = 'SELECT data FROM '.cms_db_prefix().'module_feusers_propdefn,'.
					 cms_db_prefix().'module_feusers_properties WHERE name=title AND
          type=2 AND userid = ?';
				 $result = $db->GetOne( $q, array( $uid ) );
			 }
		 return $result;
   }
  
  
  // userid api function
  // returns array
  function IsValidEmailAddress( $email, $uid = -1 )
  {
    $module =& $this->GetModule();
    $result = array();
    if( !eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email ) )
      {
       	$result[0] = false;
      	$result[1] = $module->Lang('error_improperemailformat');
      	return $result;
      }

    $module =& $this->GetModule();
	 $db =& $this->GetDb();

    if ($module->GetPreference('username_is_email'))
      {
				$q = 'SELECT username FROM '.cms_db_prefix().
				    	'module_feusers_users WHERE username = ?';
				$parm = array($email);
				if ($uid > -1)
					{
						$q .= ' AND id != ?';
						$parm[] = $uid;
					}
				$dbresult = $db->Execute( $q, $parm );
				if( $dbresult && $dbresult->RecordCount() )
					{
						$result[0] = false;
						$result[1] = $module->Lang('error_emailalreadyused');
						return $result;
					}
      }
    else if( !$module->GetPreference('allow_duplicate_emails') )
      {
				$q = "SELECT data FROM ".cms_db_prefix()."module_feusers_propdefn,".
					cms_db_prefix()."module_feusers_properties WHERE name=title AND
          type=2 AND data LIKE ?";
				$parms = array( $email );
				if( $uid > -1 )
					{
						$q .= ' AND userid != ?';
						$parms[] = $uid;
					}
				$dbresult = $db->Execute( $q, array( $email ) );
				if( $dbresult && $dbresult->RecordCount() )
					{
						$result[0] = false;
						$result[1] = $module->Lang('error_emailalreadyused');
						return $result;
					}
      }

    $result[0] = true;
    return $result;
  }


  // userid api function
  // returns true/false
  function IsValidUsername( $username )
  {
    // a username is valid, if it's length is
    // within certain ranges, and it contains
    // only alphanumerics
    $module =& $this->GetModule();
    $minlen = $module->GetPreference('min_usernamelength', 4 );
    $maxlen = $module->GetPreference('max_usernamelength', 20 );
    if( strlen( $username ) < $minlen || strlen( $username ) > $maxlen )
      {
       	return false;
      }
    if ($module->GetPreference('username_is_email'))
      {
        $test = $this->IsValidEmailAddress($username);
        if ($test[0] === false)
          {
            return false;
          }
      }
    else if( !preg_match( '/^[a-zA-Z0-9_-]*$/', $username ) )
      {
  	    return false;
      }

    /*
    // there must be atleast 3 unique characters
    if( strlen(count_chars( $username, 3 )) < min(3,minlen))
      {
	return false;
      }
    */
    return true;
  }

  
  // userid api function
  // returns an array
  function RemoveUserFromGroup( $uid, $gid )
  {
		if( !$uid ) return array( FALSE ); // todo, return error message
    $db =& $this->GetDb();
    $parms = array( $uid );
    $q = "DELETE FROM ".cms_db_prefix()."module_feusers_belongs
          WHERE userid = ?";
    if( $gid != '' )
      {
	$q .= " AND groupid = ?";
	array_push( $parms, $gid );
      }
    $dbresult = $db->Execute( $q, $parms );
    if( $dbresult == false )
      {
	return array( FALSE, $db->ErrorMsg() );
      }
    else
      {
	return array( TRUE );
      }
  }


  // userid api function
  // returns array
  function SetGroup( $id, $name, $desc )
  {
    if( !isset( $name ) || $name == '' )
      {
	$this->_DisplayErrorPage ($id, $params, $return_id,
				  $this->Lang ('error_insufficientparams'));
	return;
      }
    
    $db =& $this->GetDb();

    $eid = $this->GetGroupID( $name );
    if( $eid != false && $eid != $id )
      {
	$mod =& $this->GetModule();
	return array(FALSE,$mod->Lang('error_groupname_exists'));
      }
    
    $q = "UPDATE ".cms_db_prefix()."module_feusers_groups SET
                groupname = ?, groupdesc = ? WHERE id = ?";
    $dbresult = $db->Execute( $q, array( $name, $desc, $id ) );
    if( !$dbresult )
      {
	return array(FALSE,$db->ErrorMsg());
      }
    return array( TRUE, '');
  }


  function SetUserPassword( $uid, $password )
  {
		if( !$uid ) return array(FALSE,"");
    $db =& $this->GetDb();
    $q = "UPDATE ".cms_db_prefix()."module_feusers_users
          SET password = ? WHERE id = ?";
    $dbresult = $db->Execute( $q, array( md5($password), $uid ));
    if( !$dbresult )
      {
	return array(FALSE,$db->ErrorMsg());
      }
    return array(TRUE,"");
  }


  // userid api function
  // returns array
  function SetUser( $uid, $username, $password, $expires = false )
  {
		if( !$uid ) return array(FALSE,"");
    $db =& $this->GetDb();
    
    // make sure that this user exists
    $ret = $this->GetUserInfo( $uid );
    if( $ret[0] == FALSE )
    {
    	$module =& $this->GetModule();
        return array(FALSE, $module->Lang('error_usernotfound'));	
    }

    // make sure that this username is not taken by some other id
    $nuid = $this->GetUserID($username);
    if( $nuid != false && $nuid != $uid )
      {
	$module =& $this->GetModule();
	return array(FALSE, $module->Lang('error_usernametaken',$uid));
      }

    $dbresult = '';
    $parms = array();
    $q = "UPDATE ".cms_db_prefix()."module_feusers_users SET
         username = ?";
	
    $parms[] = $username;
    if( trim( $password ) != '' )
      {
	$q .= ", password = ?";
	$parms[] = md5($password);
      }
    if( $expires != false )
      {
	$q .= ", expires = ?";
	$parms[] = trim($db->DBTimeStamp($expires),"'");
      }
    $q .= " WHERE id = ?";
    $parms[] = $uid;
    $dbresult = $db->Execute( $q, $parms );

    if( $dbresult == false )
      {
				return array( FALSE, $db->ErrorMsg() );
      }

		if( isset($this->_cached_uid_map[$uid]) )
			{
				unset($this->_cached_uid_map[$uid]);
			}

    // Changed to pass $uid back so it matches AddUser()
    return array( TRUE, $uid );
  }

  
  // userid api function
  // returns true/false
  function SetUserGroups( $uid, $grpids )
  {
		if( !$uid ) return array(FALSE,"");
    $db =& $this->GetDb();

    // first make sure this user exists
    $ret = $this->GetUserInfo( $uid );
    if( $ret[0] == FALSE )
      {
	return array(FALSE, "User does not exist");
      }

    // then remove all his current assignments
    $q = "DELETE FROM ".cms_db_prefix()."module_feusers_belongs 
          WHERE userid = ?";
    $dbresult = $db->Execute( $q, array( $uid ));
    if( !$dbresult )
      {
	return array( FALSE, $db->ErrorMsg()  );
      }

    // and add all of them in
    $q = "INSERT INTO ".cms_db_prefix()."module_feusers_belongs
          VALUES (?,?)";
    foreach( $grpids as $grpid )
    {
      $dbresult = $db->Execute( $q, array( $uid, $grpid ) );
      if( !$dbresult )
	{
	  return array( FALSE, $db->ErrorMsg()  );
	}
    }
    return array( TRUE, "" );
  }


  // userid api function
  // returns true/false
  function SetUserProperties( $uid, $props )
  {
		if( !$uid ) return false;
    // Delete all the user properties
    // and set new ones
    $this->DeleteUserPropertyFull( "", $uid, true );

    foreach( $props as $prop )
    {
      list( $key, $val ) = split("=",$prop);
      if ( $this->SetUserPropertyFull( $key, $val, $uid ) == false)
      {
        return false;
      }
    }
		
    return true;
  }


  // userid api function
  // returns true/false
  function UserExistsByID( $uid )
  {
    if( !$uid ) return false;
    $data = $this->GetUserInfo( $uid );
    return( $data[0] !== FALSE );
  }


  // userid api function
  // returns an array or false
  function GetUserProperties($uid)
  {
		if( !$uid ) return false;
    $db =& $this->GetDb();
    $q="SELECT * FROM ".cms_db_prefix()."module_feusers_properties WHERE userid=?";
    $p=array($uid);
    $arr = array();
    $dbresult=$db->Execute($q,$p);
    if( $dbresult == false )
      {
	return false;
      }
    while( $row = $dbresult->FetchRow() )
      {
	$arr[] = $row;
      }
    return $arr;
  }

  // userid api function
  // returns an array of records or false
  function GetMemberGroupsArray($userid) {
    $db =& $this->GetDb();
    $q="SELECT * FROM ".cms_db_prefix()."module_feusers_belongs WHERE userid=?";
    $dbresult=$db->Execute($q,array($userid));
    if ($dbresult && $dbresult->RecordCount()) {
      $result=array();;
      while ($row=$dbresult->FetchRow()) {
	array_push( $result, $row );
      }
      return $result;
    } else {
      return false;
    }
  }

  //
  // end of rc functions
  //

  // userid api function
  function GetUserProperty($title,$defaultvalue=false) 
  {
    $userid=$this->LoggedInId();
    if ($userid===false) return false;
    return $this->GetUserPropertyFull($title,$userid,$defaultvalue);
  }
  
  // userid api function
  function GetUserPropertyFull($title,$userid, $defaultvalue=false) 
  {
    $db=$this->GetDB();
    $q="SELECT * FROM ".cms_db_prefix()."module_feusers_properties WHERE title=? AND userid=?";
		$p=array(str_replace(' ','_',$title),$userid);
    $result=$db->Execute($q,$p);
    if ($result && $result->RecordCount()) {
      $row=$result->FetchRow();
      return $row["data"];
    } else {
      return $defaultvalue;
    }
  }

  // userid api function
  function SetUserProperty($title,$data) 
  {
    $userid=$this->LoggedInId();
    if ($userid===false) return false;
    return $this->SetUserPropertyFull($title,$data,$userid);
  }


  // userid api function
  function SetUserPropertyFull($title,$data,$userid) 
  {
    $db=$this->GetDB();
    $q="SELECT * FROM ".cms_db_prefix()."module_feusers_properties WHERE title=? AND userid=?";
    $p=array($title,$userid);
    $r=$db->Execute($q,$p);
    if (!$r || ($r->NumRows()==0)) {
      $newid=$db->GenID(cms_db_prefix()."module_feusers_properties_seq");
      $q="INSERT INTO ".cms_db_prefix()."module_feusers_properties (id,userid,title,data) VALUES (?,?,?,?)";
      $p=array($newid,$userid,$title,$data);
      $r=$db->Execute($q,$p);
    } else {
      $row=$r->FetchRow();
      $q="UPDATE ".cms_db_prefix()."module_feusers_properties SET data=? WHERE id=?";
      $p=array($data,$row["id"]);
      $r=$db->Execute($q,$p);
    }
    return ($r!=false);
  }


  // delete all occurances of the userproperty by name
  function DeleteUserPropertyByName( $title )
  {
    $db = $this->GetDB();
    $q = "DELETE FROM ".cms_db_prefix()."module_feusers_properties WHERE title=?";
    $p = array( $title );
    $result = $db->Execute( $q, $p );
    return ($result!=false);
  }


  // userid api function
  function DeleteUserProperty($title,$all=false) 
  {
    $userid=$this->LoggedInId();
    if ($userid===false) return false;
    $db=$this->GetDB();
    $q="DELETE FROM ".cms_db_prefix()."module_feusers_properties WHERE userid=?";
    if (!$all) $q.=" AND title=?";
    $p=array();
    if ($all) $p=array($userid); else $p=array($userid,$title);
    $result=$db->Execute($q,$p);
    return ($result!=false);
  }
  

  // userid api function
  function DeleteUserPropertyFull($title,$userid,$all=false) 
  {
    $db=$this->GetDB();
    $q="DELETE FROM ".cms_db_prefix()."module_feusers_properties WHERE userid=?";
    if (!$all) $q.=" AND title=?";
    $p=array();
    if ($all) $p=array($userid); else $p=array($userid,$title);
    $result=$db->Execute($q,$p);
    return ($result!=false);
  }


  // userid api function
  function DeleteAllUserProperties() 
  {
    return $this->DeleteUserProperty("",true);
  }


  // userid api function
  function DeleteAllUserPropertiesFull($userid) 
  {
    return $this->DeleteUserPropertyFull("",$userid,true);
  }


  // userid api function
  function CheckPassword($username,$password,$groups = '',$md5pw = false) 
  {
    $db =& $this->GetDb();
    $q="SELECT u.* FROM ".cms_db_prefix()."module_feusers_users u";
		if ($groups != '')
			{
				$q .= ' INNER JOIN '.cms_db_prefix().'module_feusers_belongs b ON u.id = b.userid INNER JOIN '.cms_db_prefix().'module_feusers_groups g ON g.id = b.groupid ';
			}
		$q .= ' WHERE u.username=? AND u.password=?';
		$p = '';
		if( $md5pw )
			{
				$p=array($username,$password);
			}
		else
			{
				$p=array($username,md5($password));
			}
		if ($groups != '')
			{			
				//split the string on the commas
				$groups = split(',\ ?', $groups);
				
				//make a bit for the query
				$q .= ' AND (' . implode(' OR ', array_fill(0, count($groups), 'g.groupname = ?')) . ')';
				foreach ($groups as $group)
					{
						$p[] = $group;
					}
			}
    $result=$db->Execute($q,$p);
    if ($result && $result->RecordCount()) return true;
    return false;
  }

  
  // userid api function
  function LoggedInName() 
  {
    $userid=$this->LoggedInId();
    if ($userid) return $this->GetUserName($userid); else return "";
  }


  // userid api function
  function Logout($uid = '') 
  {
		global $gCms;
		$config =& $gCms->GetConfig();
		if( !$uid ) return;
    $db =& $this->GetDb();
		$q = '';
		$p = '';
		if( $uid == '' )
			{
				$uid = $this->LoggedInId();
				if( !$uid ) return false;
				$q="DELETE FROM ".cms_db_prefix()."module_feusers_loggedin WHERE sessionid=?";
				$p=array(session_id());
			}
		else
			{
				$q="DELETE FROM ".cms_db_prefix()."module_feusers_loggedin WHERE userid=?";
				$p=array($uid);
			}
		
    $result=$db->Execute($q,$p);

		// delete the cookie
		@setcookie('feu_sessionid','',time()-60000,"/");
		@setcookie('feu_uid','',time()-60000,"/");

    // and add history info
    $ip = getenv("REMOTE_ADDR");
    $q = "INSERT INTO ".cms_db_prefix()."module_feusers_history VALUES (?,?,?,?,?)";
    $db->Execute( $q, array( $uid, session_id(), 'logout',
			     trim($db->DBTimeStamp(time()),"'"),$ip ));
  }


  // userid api function
  function LogoutUser($uid,$eventmsg = 'logout') 
  {
		if( !$uid ) return;
    $db =& $this->GetDb();
    $q="DELETE FROM ".cms_db_prefix()."module_feusers_loggedin WHERE userid=?";
    $p=array($uid);
    $result=$db->Execute($q,$p);

    $ip = getenv("REMOTE_ADDR");
    $q = "INSERT INTO ".cms_db_prefix()."module_feusers_history VALUES (?,?,?,?,?)";
    $db->Execute( $q, array( $uid, session_id(), $eventmsg ,
														 trim($db->DBTimeStamp(time()),"'"),$ip) );
  }


  // userid api function
  function ExpireUsers() 
  {
    $module =& $this->GetModule();
    $expirytime = $module->GetPreference('user_session_expires');
    $db =& $this->GetDb();
    $q="SELECT * FROM ".cms_db_prefix()."module_feusers_loggedin WHERE lastused<?";
    $p=array(time()-$expirytime);
    $dbresult = $db->Execute( $q, $p );
    while( $dbresult && ($row = $dbresult->FetchRow()) )
      {
				$q2 = "INSERT INTO ".cms_db_prefix()."module_feusers_history
                 (userid,sessionid,action,refdate)
                 VALUES (?,?,?,?)";
				$db->Execute( $q2, array( $row['userid'], $row['sessionid'],'expire',
																	trim($db->DbTimeStamp(time()),"'")));
				$module->NotifyExpiredUser( $row['userid'] );
      }

    $q="DELETE FROM ".cms_db_prefix()."module_feusers_loggedin WHERE lastused<?";
    $result=$db->Execute($q,$p);
  }


  // userid api function
  function LoggedInId() 
  {
		global $gCms;
		$config =& $gCms->GetConfig();
		if( isset($gCms->variables['feu_logginid']) )
			{
				// this will save a few queries in each request
				return $gCms->variables['feu_logginid'];
			}

    $db =& $this->GetDb();
		$sessionid = session_id();
    $this->ExpireUsers();

    if( $sessionid == "" )
      {
				return false;
			}

		$module =& $this->GetModule();
		$expirytime = $module->GetPreference('user_session_expires');
    $q="SELECT userid FROM ".cms_db_prefix()."module_feusers_loggedin WHERE sessionid=?";
    $p=array($sessionid);
    $result = $db->GetOne($q,$p);
    if ($result)
			{
				// we know this user is logged in.
				$retval = $result;
				
				// now touch the lastused
				// this will ensure that every time we check that a user is
				// logged in, it touches his logged in entry
				$q = "UPDATE ".cms_db_prefix()."module_feusers_loggedin SET lastused = ? where sessionid = ?";
				$db->Execute( $q, array( time(), $sessionid ) );

				// testme
				@setcookie('feu_sessionid',$sessionid,time()+$expirytime,"/");
				@setcookie('feu_uid',$uid,time()+$expirytime,"/");
				$gCms->variables['feu_logginid'] = $retval;
				return $retval;
			} 
		else 
			{
				if( $module->GetPreference('cookie_keepalive',0) &&
						isset($_COOKIE['feu_sessionid']) )
					{
						// no session id, but we have a cookie, so what we'll do
						// is first check to see if the session is still logged in
						// if it is, force a logout for that session id
						// and start a new record, otherwise, ignore the cookie
						$uid = $_COOKIE['feu_uid'];
						$sessionid = $_COOKIE['feu_sessionid'];
						
						/*
						 $q = "SELECT userid FROM ".cms_db_prefix()."module_feusers_loggedin
						 WHERE sessionid = ?";
						 $row = $db->GetRow($q, array($sessionid) );
						 if( !$row )
						 {
						 // user has a cookie, but the record has probably expired
						 // so the cookie is not good any more.
						 
						 // delete the cookie
						 @setcookie('feu_sessionid','',time()-60000,$config['root_path']);
						 @setcookie('feu_uid','',time()-60000,$config['root_path']);
						 return false;
						 }
						*/
						
						// delete the existing record
						$q = "DELETE FROM ".cms_db_prefix()."module_feusers_loggedin 
                        WHERE sessionid = ?";
						$db->Execute( $q, array( $sessionid ) );
						
						// log the user in
						// todo, log this too,
						// rationalize this code with Login() and Logout() methods
						@session_start();
						$sessionid = session_id();
						
						$q = "INSERT INTO ".cms_db_prefix()."module_feusers_loggedin
                    (sessionid,lastused,userid)
                  VALUES (?,?,?)";
						$db->Execute( $q, array($sessionid, time(), $uid) );
						
						// set the cookie again
						@setcookie('feu_sessionid',$sessionid,time()+$expirytime,"/");
						@setcookie('feu_uid',$uid,time()+$expirytime,"/");
						
						$gCms->variables['feu_logginid'] = $uid;
						return $uid;
					}
				else
					{
						return false;
					}
			}
		return false;
  }


  // userid api function
  function LoggedIn() 
  {
    if( !$this->LoggedInId() ) 
			{
				return false; 
			}
    else
			{
				return true;
			}
  }


  // userid api function
  function MemberOfGroup($userid,$groupid) 
  {
    $db =& $this->GetDb();
    $q="SELECT * FROM ".cms_db_prefix()."module_feusers_belongs WHERE userid=? AND groupid=?";
    
    $params=array($userid,$groupid);
    $result=$db->Execute($q,$params);
    if ($result && $result->RecordCount()) 
			{
				return true;
			} 
		else 
			{
				return false;
			}
  }

  
  // userid api function
  function GetUserName($userid) 
  {
		$row = $this->_getUser($userid);
		if( !$row ) return FALSE;
		return $row['username'];
  }

  
  // userid api function
  function GetUserID($username) 
  {		
    $db =& $this->GetDb();
    $q="SELECT * FROM ".cms_db_prefix()."module_feusers_users WHERE username=?";
    $dbresult=$db->Execute($q,array($username));
    if ($dbresult && $dbresult->RecordCount()) {
      $row=$dbresult->FetchRow();
      return $row["id"];
    } else {
      return false;
    }
  }

  
  // userid api function
  // returns array
  function AddGroup( $name, $description )
  {
    $db =& $this->GetDb();
    
    // see if it exists already or not (by name)
    $q = "SELECT * FROM ".cms_db_prefix().
      "module_feusers_groups WHERE groupname = ?";
    $dbresult = $db->Execute( $q, array( $name ) );
    if( !$dbresult )
      {
	return array(FALSE,$db->ErrorMsg());
      }
    $row = $dbresult->FetchRow();
    if( $row )
      {
	return array(FALSE,$this->Lang('error_groupname_exists'));
      }
    
    $grpid = 
      $db->GenID( cms_db_prefix()."module_feusers_groups_seq" );
    $q = "INSERT INTO ".cms_db_prefix().
      "module_feusers_groups VALUES (?,?,?)";
    $dbresult = $db->Execute( $q, array( $grpid, $name, $description ) );
    if( !$dbresult )
      {
	return array(FALSE,$db->ErrorMsg());
      }
    return array(TRUE,$grpid);
  }


  // userid api function
  // returns array
  function AddUser( $name, $password, $expires, $do_md5 = true )
  {
    $db =& $this->GetDb();
    
    // see if it exists already or not (by name)
    $q = "SELECT * FROM ".cms_db_prefix().
      "module_feusers_users WHERE username = ?";
    $dbresult = $db->Execute( $q, array( $name ) );
    if( !$dbresult )
      {
	return array(FALSE,$db->ErrorMsg());
      }
    $row = $dbresult->FetchRow();
    if( $row )
      {
	$module =& $this->GetModule();
	return array(FALSE,$module->Lang('error_username_exists'));
      }
    
    // generate the sequence
    $uid = 
      $db->GenID( cms_db_prefix()."module_feusers_users_seq" );

		$pwtxt = $password;
		if( $do_md5 == true )
			{
				$pwtxt = md5($password);
			}

    // insert the record
    $q = "INSERT INTO ".cms_db_prefix().
      "module_feusers_users VALUES (?,?,?,?,?)";
    $dbresult = $db->Execute( $q, array( $uid, $name, $pwtxt, 
					 trim($db->DbTimeStamp(time()),"'"),
					 trim($db->DbTimeStamp($expires),"'") ) );
    if( !$dbresult )
      {
	return array(FALSE,$db->ErrorMsg());
      }
    return array(TRUE,$uid);
  }
  
  
  // userid api function
  function GetGroupName($groupid) 
  {
    $db =& $this->GetDb();
    $q="SELECT * FROM ".cms_db_prefix()."module_feusers_groups WHERE id=?";
    $dbresult=$db->Execute($q,array($groupid));
    if ($dbresult && $dbresult->RecordCount()) {
      $row=$dbresult->FetchRow();
      return $row["groupname"];
    } else {
      return false;
    }
  }
  
  
  // userid api function
  function GetGroupDesc($groupid) {
    $db =& $this->GetDb();
    $q="SELECT * FROM ".cms_db_prefix()."module_feusers_groups WHERE id=?";
    $dbresult=$db->Execute($q,array($groupid));
    if ($dbresult && $dbresult->RecordCount()) {
      $row=$dbresult->FetchRow();
      return $row["groupdesc"];
    } 	else {
      return false;
    }
  }
  

  // userid api function
  // returns an array
  function DeleteGroupFull( $id )
  {
    $db = $this->GetDB();
    $result = array();

    // delete all property relations from this group
    $q = "DELETE FROM ".cms_db_prefix()."module_feusers_grouppropmap WHERE group_id = ?";
    $dbresult = $db->Execute( $q, array( $id ) );
    if( !$dbresult )
      {
	return array( FALSE, $db->ErrorMsg() );
      }

    // delete all indication that anybody is a member
    // of this group
    $q = "DELETE FROM ".cms_db_prefix()."module_feusers_belongs WHERE groupid = ?";
    $dbresult = $db->Execute( $q, array( $id ) );
    if( !$dbresult )
      {
	return array( FALSE, $db->ErrorMsg() );
      }
    
    // and then delete the group
    $q = "DELETE FROM ".cms_db_prefix()."module_feusers_groups WHERE id = ?";
    $dbresult = $db->Execute( $q, array( $id ) );
    if( !$dbresult )
      {
	return array( FALSE, $db->ErrorMsg() );
      }
    
    return array( TRUE, '' );
  }
  
  
  // userid api function
  function GetGroupList()
  {
    $db =& $this->GetDb();
    
    $result = array();
    $q = "SELECT * FROM ".cms_db_prefix()."module_feusers_groups";
    $dbresult = $db->Execute( $q );
    if( $dbresult ) {
    while( $row = $dbresult->FetchRow() )
      {
		  $result[$row['groupname']] = $row['id'];
      }
    }
    return $result;
  }
  

  // userid api function
  function GetGroupListFull()
  {
    $db =& $this->GetDb();
	  
    $result = array();
    $query = "SELECT * FROM ".cms_db_prefix()."module_feusers_groups";
    $dbresult = $db->Execute( $query );
    if( $dbresult ) {
      while( $row = $dbresult->FetchRow() )
        {
			array_push($result,$row);
        }
    }
    return $result;
  }


  // old userid api function
  function GetGroupID($groupname) 
  {
    $db =& $this->GetDb();

    $q="SELECT * FROM ".cms_db_prefix()."module_feusers_groups WHERE groupname=?";
    $dbresult=$db->Execute($q,array($groupname));
    if ($dbresult && $dbresult->RecordCount()) 
      {
				$row=$dbresult->FetchRow();
				return $row["id"];
      } 
    else 
      {
				return false;
      }
  }


  // old userid api function
  function GetMemberGroups($userid) {
    $db =& $this->GetDb();
    $q="SELECT * FROM ".cms_db_prefix()."module_feusers_belongs WHERE userid=?";
    $dbresult=$db->Execute($q,array($userid));
    if ($dbresult && $dbresult->RecordCount()) {
      $result="";
      while ($row=$dbresult->FetchRow()) {
				if ($result!="") {
					$result.=",".$this->GetGroupName($row["groupid"]);
				} else {
					$result=$this->GetGroupName($row["groupid"]);
				}
      }
      return $result;
    } else {
      return "none";
    }
  }


  // old userid api function
  function DeleteUser($id) 
  {
    $db =& $this->GetDb();
    if (isset($_GET[$id."userid"])) 
      $userid=str_replace("'",'_',$_GET[$id."userid"]); 
    else 
      return;
    $q="DELETE FROM ".cms_db_prefix()."module_feusers_users WHERE id='$userid'";
    $dbresult=$db->Execute($q);
    $q="DELETE FROM ".cms_db_prefix()."module_feusers_belongs WHERE userid='$userid'";
    $dbresult=$db->Execute($q);

		if( isset($this->_cached_uid_map[$userid]) )
			{
				unset($this->_cached_uid_map[$userid]);
			}
  }

} // class

$manipulator = 'FrontEndUsersManipulator';
?>
