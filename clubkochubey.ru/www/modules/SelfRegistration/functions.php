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

class SelfregUtils
{
  function array_key_exists_substr( $arr, $expr )
  {
    $keys = array_keys( $arr );
    foreach( $keys as $k )
      {
	if( strstr( $k, $expr ) ) return true;
      }
    return false;
  }

  function array_find_key_regexp( $arr, $expr )
  {
    $keys = array_keys( $arr );
    foreach( $keys as $k )
      {
	if( preg_match( $expr, $k ) ) return $k;
      }
    return false;
  }


  function array_merge_by_name_required( $arr1, $arr2 )
  {
    $xxresult = array();
    // add items common to arr1 and arr2 
    // but favor required items
    if( !is_array( $arr1 ) || !is_array( $arr2 ) )
      {
	return;
      }
    foreach( $arr1 as $a1 )
      {
	foreach( $arr2 as $a2 )
	  {
	    if( $a1['name'] == $a2['name'] ) 
	      {
		if( $a1['required'] == 2 ) 
		  {
		    array_push( $xxresult, $a1 );
		    break;
		  }
		else 
		  {
		    array_push( $xxresult, $a2 );
		    break;
		  }
	      }    
	  }
      }
  
    // add items in arr1 not in result
    foreach( $arr1 as $a1 )
      {
	$found = false;
	foreach( $xxresult as $res )
	  {
	    if( $a1['name'] == $res['name'] )
	      {
		$found = true;
		break;
	      }
	  }
	if( !$found )
	  {
	    array_push( $xxresult, $a1 );
	  }
      }
  
    // add items in arr2 not in result
    foreach( $arr2 as $a2 )
      {
	$found = false;
	foreach( $xxresult as $res )
	  {
	    if( $a2['name'] == $res['name'] )
	      {
		$found = true;
		break;
	      }
	  }
	if( !$found )
	  {
	    array_push( $xxresult, $a2 );
	  }
      }
    return $xxresult;
  }


  function compare_elements_by_sortorder_key( $e1, $e2 )
  {
    if( $e1['sort_key'] < $e2['sort_key'] )
      {
	return -1;
      }
    else if( $e1['sort_key'] > $e2['sort_key'] )
      {
	return 1;
      }
    return 0;
  }


  function explode_with_key($str, $inglue='=', $outglue='&')
  {
    $ret = array();
    $a1 = split($outglue,$str);
    foreach( $a1 as $a2 )
      {
	list( $k, $v ) = split( $inglue, $a2 );
	$ret[ $k ] = $v;
      }
    return $ret;
  }


  function find_index_of_value( $data, $value, $dflt )
  {
    $i = 0;
    foreach( $data as $k=>$v )
      {
	if( $v == $value )
	  {
	    return $i;
	  }
	$i++;
      }
    return $dflt;
  }


  function implode_with_key($assoc, $inglue = '=', $outglue = '&')
  {
    $return = null;
    foreach ($assoc as $tk => $tv) $return .= $outglue.$tk.$inglue.$tv;
    return substr($return,strlen($outglue));
  }



  function myCreateInputCheckbox($id, $name, $value='', $selectedvalue='', 
				 $addttext='')
  {
    $text = '<input type="checkbox" name="'.$id.$name.'" value="'.$value.'"';
    $arr = split(",",$selectedvalue);
    foreach( $arr as $a )
      {
	if ($a == $value)
	  {
	    $text .= ' ' . 'checked="checked"';
	  }
      }
    if ($addttext != '')
      {
	$text .= ' '.$addttext;
      }
    $text .= " />\n";
    return $text;
  }

  function myCreateInputSubmit($id, $name, $value='', $image='', $addttext='')
  {
    global $gCms;
    $text = '<input name="'.$id.$name.'" value="'.$value.'" type=';
    if ($image != '')
      {
	$text .= '"image"';
	$img = $gCms->config['root_url'].DIRECTORY_SEPARATOR.$image;
	$text .= ' src="'.$img.'"';
      }
    else 
      {
	$text .= '"submit"';
      }
    if ($addttext != '')
      {
	$text .= ' '.$addttext;
      }
    $text .= ' />';
    return $text . "\n";
  }


  function myCreateInputHidden( $id, $name, $value='', $addtext='', $delim=',')
  {
    if( is_array( $value ) )
      {
	$val = SelfregUtils::implode_with_key( $value );
      }
    else
      {
	$val = $value;
      }
    $val = str_replace('"', '&quot;', $val);
    $text = '<input type="hidden" name="'.$id.$name.'" value="'.$val.'"';
    if ($addtext != '')
      {
	$text .= ' '.$addtext;
      }
    $text .= " />\n";
    return $text;
  }

  function is_associative(&$array){
    if (!is_array($array)) return false;
    foreach(array_keys($array) as $key=>$value) {
      if( !is_numeric($key) ) return true;
    }
    return false;
}

} // End of class

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

  /*---------------------------------------------------------
   UserDisplayRegistrationForm1($id, $params, $return_id, $message)
   NOT PART OF THE MODULE API
   ---------------------------------------------------------*/
function _UserDisplayRegistrationForm1( &$module, $id, &$params, $returnid )
  {
    if( !isset( $params['group'] ) )
      {
	// this is ugly for the user to see
	// but at least the admin will be able to figure it out
	$module->_DisplayErrorPage( $id, $params, $returnid,
				  $module->Lang('error_insufficientparams'));
	return;
      }

    $feusers =& $module->GetModuleInstance('FrontEndUsers');
    if( !$feusers )
      {
	// this is ugly for the user to see
	// but at least the admin will be able to figure it out
	$module->_DisplayErrorPage( $id, $params, $returnid,
				  $module->Lang('error_nofeusersmodule'));
	return;
      }

    $cmsmailer =& $module->GetModuleInstance('CMSMailer');
    if( !$cmsmailer )
      {
	// this is ugly for the user to see
	// but at least the admin will be able to figure it out
	$module->_DisplayErrorPage( $id, $params, $returnid,
				  $module->Lang('error_nofeusersmodule'));
	return;
      }

    // yep, all the modules are here, now we
    // have to convert the groupname into an id
    $grpid = $feusers->GetGroupID($params['group']);
    if( $grpid == false )
      {
	// this is ugly for the user to see
	// but at least the admin will be able to figure it out
	$module->_DisplayErrorPage( $id, $params, $returnid,
				  $module->Lang('error_nosuchgroup'));
	return;
      }

    // now we have an id... have to get a list of the groups properties
    $relations = $feusers->GetGroupPropertyRelations( $grpid );
    if( $relations[0] == false )
      {
	// this is ugly for the user to see
	// but at least the admin will be able to figure it out
	$module->_DisplayErrorPage( $id, $params, $returnid, $relations[1] );
	return;
      }
    uasort( $relations,
	    array('SelfregUtils','compare_elements_by_sortorder_key') );

    // now we have the properties, gotta show something to the user
    // dammit.
    if( isset( $params['error'] ) )
      {
	$module->smarty->assign('error', $params['error']);
      }
    if( isset( $params['message'] ) )
      {
	$module->smarty->assign('message', $params['message']);
      }

    // now we're ready to populate the template
    // first we put in stuff that is required (username, password, etc, etc)
    $rowarray = array();

    // make sure username is in there
    $onerow = new StdClass();
    $onerow->color = $feusers->GetPreference('required_field_color','blue');
    $onerow->marker = $feusers->GetPreference('required_field_marker','*');
    $onerow->required = 1;
    $val = (isset($params['input_username'])) ? $params['input_username'] : '';
    if ($feusers->GetPreference('username_is_email'))
         {
	   $onerow->prompt = $module->Lang('email');
         }
    else
         {
	   $onerow->prompt = $module->Lang('username');
         }
    $onerow->name = 'username';
    $onerow->control =$module->CreateInputText($id, 'input_username', $val,
					     $feusers->GetPreference('usernamefldlength'),
					     $feusers->GetPreference('max_usernamelength'));
    $rowarray[$onerow->name] = $onerow;

    if( $module->GetPreference('selfreg_force_email_twice' ) )
      {
	// add it again
	$onerow = new StdClass();
	$onerow->color = $feusers->GetPreference('required_field_color','blue');
	$onerow->marker = $feusers->GetPreference('required_field_marker','*');
	$onerow->required = 1;
	$val = (isset($params['input_username_again'])) ? $params['input_username_again'] : '';

	if ($feusers->GetPreference('username_is_email'))
	  {
	    $onerow->prompt = $module->Lang('email');
	  }
	else
	  {
	    $onerow->prompt = $module->Lang('username');
	  }
	$onerow->prompt .= ' ('.$module->Lang('again').')';
	$onerow->name = 'username_again';
	$onerow->control =$module->CreateInputText($id, 'input_username_again', $val,
						   $feusers->GetPreference('usernamefldlength'),
						   $feusers->GetPreference('max_usernamelength'));
	$rowarray[$onerow->name] = $onerow;
      }


    // and password
    $onerow = new StdClass();
    $onerow->color = $feusers->GetPreference('required_field_color','blue');
    $onerow->marker = $feusers->GetPreference('required_field_marker','*');
    $onerow->required = 1;
    $val = (isset($params['input_password'])) ? $params['input_password'] : '';
    $onerow->prompt = $module->Lang('password');
    $onerow->name = 'password';
    $onerow->control =$module->CreateInputPassword($id, 'input_password', $val,
						 $feusers->GetPreference('passwordfldlength'),
						 $feusers->GetPreference('max_passwordlength'));
    $rowarray[$onerow->name] = $onerow;

    // and make him repeat the password
    $onerow = new StdClass();
    $onerow->color = $feusers->GetPreference('required_field_color','blue');
    $onerow->marker = $feusers->GetPreference('required_field_marker','*');
    $onerow->required = 1;
    $val = (isset($params['input_repeatpassword'])) ? $params['input_repeatpassword'] : '';
    $onerow->prompt = $module->Lang('repeatpassword');
    $onerow->name = 'repeatpassword';
    $onerow->control =$module->CreateInputPassword($id, 'input_repeatpassword', $val,
						 $feusers->GetPreference('passwordfldlength'),
						 $feusers->GetPreference('max_passwordlength'));
    $rowarray[$onerow->name] = $onerow;

    $relations2 = array();
    foreach( $relations as $reln )
      {
	$defn = $feusers->GetPropertyDefn( $reln['name'] );
	if( $defn['type'] == 6 )
	  {
	    // images are ignored
	    continue;
	  }

	$reln['mapto'] = $defn['name'];
	$reln['prompt'] = $defn['prompt'];
	if( $module->GetPreference('selfreg_force_email_twice' ) )
	  {
	    $relations2[] = $reln;
	    if( $defn['type'] == 2 && !$feusers->GetPreference('username_is_email') )
	      {
		
		// todo, change something here
		$reln['name'] = $reln['name'].'_again';
		$reln['mapto'] = $defn['name'];
		$reln['prompt'] = $defn['prompt'].' ('.$module->Lang('again').')';
		$relations2[] = $reln;
	      }
	  }
	else
	  {
	    $relations2[] = $reln;
	  }
      }

    foreach( $relations2 as $reln )
    {
      // don't process hidden fields here
      if( $reln['required'] == 3 ) continue;

      // get the property definition
      $defn = $feusers->GetPropertyDefn( $reln['mapto'] );

      $onerow = new StdClass();

      $color = '';
      if( $reln['required'] == 2 ) $color = $feusers->GetPreference('required_field_color','blue');
      $marker = '';
      if( $reln['required'] == 2 ) $marker = $feusers->GetPreference('required_field_marker','*');
      $onerow->required = ($reln['required'] == 2);
      $onerow->color    = $color;
      $onerow->marker   = $marker;

      $val = isset($params['input_'.$reln['name']]) ? $params['input_'.$reln['name']] : '';
      $onerow->prompt = $reln['prompt'];
      $onerow->name = $reln['name'];
      $onerow->labelfor = $id.$reln['name'];
      switch( $defn['type'] )
	{
	case 0: // text
	  $onerow->control = $module->CreateInputText( $id, 'input_'.$reln['name'],
						     $val, $defn['length'], $defn['maxlength'] );
	  break;

	case 1: // checkbox
	  $onerow->control = SelfregUtils::myCreateInputCheckbox( $id, 'input_'.$reln['name'], 1, $val );
	  break;

	case 2: // email
	  $onerow->control = $module->CreateInputText( $id, 'input_'.$reln['name'],
						     $val, $defn['length'], ($defn['maxlength']) );
	  break;

	case 3: // textarea
	  $onerow->control = $module->CreateTextArea(false, $id, $val, 'input_'.$reln['name']);
	  break;

	case 4: // dropdown
	  $onerow->control = $module->CreateInputDropdown(
							$id,
							'input_'.$reln['name'],
							$feusers->GetSelectOptions($defn['name'], 1),
							-1,
							$val);
	  break;

	case 5: // multiselect
	  $tmp = $feusers->GetSelectOptions($defn['name'],1);
	  $onerow->control = $module->CreateInputSelectList($id,
							    'input_'.$defn['name'].'[]',
							    $tmp,
							    $val,
							    min(count($tmp,5)));
	  break;

	case 7: // radio buttons
	 $onerow->control = $module->CreateInputRadioGroup($id, 'input_'.$defn['name'],
		   $feusers->GetSelectOptions($defn['name'], 1), $val, '', '<br/>');
	  break;

	case 8: // date field
	  {
	    $attribs = unserialize($defn['attribs']);
	    $parms = array();
	    $parms['prefix'] = $id.'input_'.$defn['name'];
	    if( $val ) $parms['time'] = $val;
	    $parms['start_year'] = (isset($attribs['startyear']))?$attribs['startyear']:"-5";
	    $parms['end_year'] = (isset($attribs['endyear']))?$attribs['endyear']:"+10";
	    $str = '{html_select_date ';
	    foreach( $parms as $key=>$value )
	      {
		$str.=$key.'="'.$value.'" ';
	      }
	    $str .= '}';
	    $onerow->control = $module->ProcessTemplateFromData($str);
	  }
	  break;
	}

      $rowarray[$onerow->name] = $onerow;
    }

    $inline = $module->GetPreference('inline_forms',true);
    if( isset($params['noinline']) )
      {
	$inline = false;
      }
    // and the rest of the stuff
    $module->smarty->assign ('startform',
			   $module->CreateFormStart ($id, 'reguser',
						     $returnid, 'post', '', $inline));
    $module->smarty->assign ('endform', $module->CreateFormEnd ());
    $module->smarty->assign('title',$module->Lang('user_registration'));
    $module->smarty->assign('hidden',
			  $module->CreateInputHidden($id, 'group_id', $grpid ).
			  $module->CreateInputHidden($id, 'group', $params['group'] ));
    $module->smarty->assign('controls', $rowarray);
    $module->smarty->assign('controlcount', count($rowarray));
    $module->smarty->assign('submit',$module->CreateInputSubmit($id,'submit',
							    $module->Lang('submit')));
    $module->smarty->assign('msg_sendanotheremail',
			  $module->Lang('msg_sendanotheremail'));
    $module->smarty->assign('link_sendanotheremail',
			  $module->CreateLink($id,'default',$returnid,$module->Lang('clickhere'),
					    array('mode'=>'sendanotheremail'),'',false,true));

    $captcha =& $module->GetModuleInstance('Captcha');
    if( is_object($captcha) && !isset($params['nocaptcha']) )
      {
	$module->smarty->assign('captcha_title', $module->Lang('captcha_title'));
	$module->smarty->assign('captcha', $captcha->getCaptcha());
	$module->smarty->assign('input_captcha',
				$module->CreateInputText($id,'input_captcha','',10));
      }

    // todo, put this into the database and let the admin play with it.
    echo $module->ProcessTemplateFromDatabase('selfreg_reg1template');
  }


  /*---------------------------------------------------------
   UserDisplayVerificationForm($id, $params, $return_id, $message)
   NOT PART OF THE MODULE API
   ---------------------------------------------------------*/
function _UserDisplayVerificationForm( &$module, $id, &$params, $returnid )
  {
    $feusers =& $module->GetModuleInstance('FrontEndUsers');
    if( !$feusers )
      {
	$module->_DisplayErrorPage($id, $params, $returnid,
				 $module->Lang('error_nofeusersmodule'));
	return;
      }

    if( isset( $params['error'] ) )
      {
	$module->smarty->assign('error', $params['error']);
      }
    if( isset( $params['message'] ) )
      {
	$module->smarty->assign('message', $params['message']);
      }

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
    $code = '';
    if( isset( $params['input_code'] ) )
      {
	$code = trim($params['input_code']);
      }
    $group_id = '';
    if( isset( $params['input_group_id'] ) )
      {
	$group_id = trim($params['input_group_id']);
      }

    // process the template
    $module->smarty->assign('title',
			  $module->Lang('title_verifyregistration'));
    if ($feusers->GetPreference('username_is_email'))
      {
      $module->smarty->assign('prompt_username',$module->Lang('email'));
      }
    else
      {
    $module->smarty->assign('prompt_username',
			  $module->Lang('username'));
      }
    $module->smarty->assign('input_username',
			  $module->CreateInputText($id,'input_username',
						 $username,
						 $feusers->GetPreference('usernamefldlength'),
						 $feusers->GetPreference('max_usernamelength')));
    $module->smarty->assign('prompt_password',
			  $module->Lang('password'));
    $module->smarty->assign('input_password',
			  $module->CreateInputPassword($id,'input_password',
						     $password,
						     $feusers->GetPreference('passwordfldlength'),
						     $feusers->GetPreference('max_passwordlength')));
    $module->smarty->assign('prompt_code',
			  $module->Lang('code'));
    $module->smarty->assign('input_code',
			  $module->CreateInputText($id,'input_code',
						 $code, 30, 30 ));
    $module->smarty->assign('submit',
			  $module->CreateInputSubmit($id,'submit',$module->Lang('submit')));

    $inline = $module->GetPreference('inline_forms',true);
    if( isset($params['noinline']) )
      {
	$inline = false;
      }
    $module->smarty->assign('startform',
			    $module->CreateFrontendFormStart($id, $returnid, 'verifyuser','post','',$inline));
    $module->smarty->assign('hidden',
			  $module->CreateInputHidden($id, 'input_group_id', $group_id ));
    $module->smarty->assign('endform',
			  $module->CreateFormEnd());
    echo $module->ProcessTemplateFromDatabase('selfreg_reg2template');
  }


  /*---------------------------------------------------------
   UserDisplayLostRegEmailForm($id, $params, $return_id, $message)
   NOT PART OF THE MODULE API
   ---------------------------------------------------------*/
function _UserDisplayLostRegEmailForm( &$module, $id, &$params, $returnid )
  {
    $feusers =& $module->GetModuleInstance('FrontEndUsers');
    if( !$feusers )
      {
	$module->_DisplayErrorPage($id, $params, $returnid,
				 $module->Lang('error_nofeusersmodule'));
	return;
      }

    if( isset( $params['error'] ) )
      {
	$module->smarty->assign('error', $params['error']);
      }
    if( isset( $params['message'] ) )
      {
	$module->smarty->assign('message', $params['message']);
      }

    $inline = $module->GetPreference('inline_forms',true);
    if( isset($params['noinline']) )
      {
	$inline = false;
      }
    $module->smarty->assign('startform',
			    $module->CreateFormStart( $id, 'sendanotheremail', $returnid, 'post', '', $inline));
    $module->smarty->assign ('endform', $module->CreateFormEnd ());
    $module->smarty->assign ('input_username',
			   $onerow->control =$module->CreateInputText($id, 'input_username',
								    $val, 20,
								    $feusers->GetPreference('max_usernamelength')));
    $module->smarty->assign('submit',$module->CreateInputSubmit($id,'submit',
							    $module->Lang('submit')));
    echo $module->ProcessTemplateFromDatabase('selfreg_sendanotheremail_template');
  }



?>