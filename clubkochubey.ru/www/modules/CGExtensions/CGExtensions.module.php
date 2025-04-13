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

if( !class_exists('CGExtensions') )
  {

define('CGEXTENSIONS_TABLE_COUNTRIES',cms_db_prefix().'module_cge_countries');
define('CGEXTENSIONS_TABLE_STATES',cms_db_prefix().'module_cge_states');
define('CGEXTENSIONS_TABLE_ASSOCDATA',cms_db_prefix().'module_cge_assocdata');

class CGExtensions extends CMSModule
{
  private $_obj;
  public $_colors;

  // todo, improve this stuff.
  // should be protected.
  public $_actionid;
  public $_image_directories;
  public $_current_tab;
  public $_errormsg;
  public $_messages;
  public $_returnid;

  /*
   * A smarty function for creating a list of state options
   */
  public function smarty_function_cge_state_options($params,&$smarty)
  {
    global $gCms;
    $db =& $gCms->GetDb();
    $obj =& $gCms->modules['CGExtensions']['object'];

    $query = 'SELECT * FROM '.CGEXTENSIONS_TABLE_STATES.' ORDER BY sorting DESC,name ASC';
    $tmp = $db->GetAll($query);
    $output = '';
    if( isset($params['selectone']) )
      {
	$output .= '<option value="">'.trim($params['selectone'])."</option>\n";
      }
    foreach( $tmp as $row )
      {
	$output .= "<option value=\"{$row['code']}\"";
	if( isset($params['selected']) && $params['selected'] == $row['code'] )
	  {
	    $output .= ' selected="selected"';
	  }
        $output .= ">{$row['name']}</option>\n";
      }
    return $output;
  }


  /*
   * A smarty function for creating a list of country options
   */
  public function smarty_function_cge_country_options($params,&$smarty)
  {
    global $gCms;
    $db =& $gCms->GetDb();
    $obj =& $gCms->modules['CGExtensions']['object'];

    $query = 'SELECT * FROM '.CGEXTENSIONS_TABLE_COUNTRIES.' ORDER BY sorting DESC,name ASC';
    $tmp = $db->GetAll($query);
    $output = '';
    if( isset($params['selectone']) )
      {
	$output .= '<option value="">'.trim($params['selectone'])."</option>\n";
      }
    foreach($tmp as $row)
      {
	$output .= "<option value=\"{$row['code']}\"";
	if( isset($params['selected']) && $params['selected'] == $row['code'] )
	  {
	    $output .= ' selected="selected"';
	  }
        $output .= ">{$row['name']}</option>\n";
      }
    return $output;
  }


  /*
   * A smarty plugin for displaying the current page url
   */
  public function smarty_function_get_current_url($params, &$smarty)
  {
    $url = cge_url::current_url();
    if( isset($params['assign']) )
      {
	$smarty->assign($params['assign'],$url);
	return;
      }
    return $url;
  }


  /*
   * A smarty function to output a yes/no dropdown.
   */
  public function smarty_function_cge_yesno_options($params,&$smarty)
  {
    $mod = cge_utils::get_module('CGExtensions');
    $name = '';
    $prefix = '';
    $selected = '';
    if( isset($params['prefix']) )
      {
	$prefix = trim($params['prefix']);
      }
    if( isset($params['name']) )
      {
	$name = trim($params['name']);
      }
    if( isset($params['selected']) )
      {
	$selected = trim($params['selected']);
      }

    $out = '';
    if( !empty($name) )
      {
	$out .= "<select name=\"{$prefix}{$name}\">";
      }

    $seltxt = '';
    if( $selected == 1 )
      {
	$seltxt = ' selected="selected"';
      }
    $out .= '<option value="1"'.$seltxt.'>'.$mod->Lang('yes').'</option>';
    $seltxt = '';
    if( $selected == 0 )
      {
	$seltxt = ' selected="selected"';
      }
    $out .= '<option value="0"'.$seltxt.'>'.$mod->Lang('no').'</option>';
    if( !empty($name) )
      {
	$out .= "</select>";
      }

    if( isset($params['assign']) )
      {
	$smarty->assign($params['assign'],$out);
	return;
      }
    return $out;
  }


  /*
   * A smarty plugin for testing if a module is available.
   */
  public function smarty_function_have_module($params, &$smarty)
  {
    $name = '';
    $trythis = array('module','mod','m');
    foreach( $trythis as $one )
      {
	if( isset($params[$one]) )
	  {
	    $name = trim($params[$one]);
	    break;
	  }
      }
    if( empty($name) ) return;

    $tmp = cge_utils::get_module($name);
    $res = (is_object($tmp))?1:0;

    if( isset($params['assign']) )
      {
	$smarty->assign($params['assign'],$res);
	return;
      }
    return $res;
  }


  /*
   * A smarty function for displaying an image
   */
  public function smarty_function_cgimage($params, &$smarty)
  {
    global $gCms;
    $obj =& $gCms->modules['CGExtensions']['object'];
    
    if( !isset($params['image']) ) return;
    
    $alt = '';
    if( isset($params['alt']) )
      {
	$alt = trim($params['alt']);
      }
    $class = '';
    if( isset($params['class']) )
      {
	$class = trim($params['class']);
      }
    $height = '';
    if( isset($params['width']) )
      {
	$width = trim($params['width']);
      }
    $width = '';
    if( isset($params['height']) )
      {
	$height = trim($params['height']);
      }

    $obj->_load_main();
    $txt = $obj->DisplayImage(trim($params['image']),$alt,$class,$width,$height);

    if( isset($params['assign']) )
      {
	$smarty->assign(trim($params['assign']),$txt);
      }
    else
      {
	return $txt;
      }
  }


  public function smarty_modifier_rfc_date($string)
  {
    if( !function_exists('__make_timestamp') ) {
    function __make_timestamp($string)
    {
      if(empty($string)) {
        $time = time();

      } elseif (preg_match('/^\d{14}$/', $string)) {
        $time = mktime(substr($string, 8, 2),substr($string, 10, 2),substr($string, 12, 2),
                       substr($string, 4, 2),substr($string, 6, 2),substr($string, 0, 4));
        
      } elseif (is_numeric($string)) {
        $time = (int)$string;
        
      } else {
        $time = strtotime($string);
        if ($time == -1 || $time === false) {
	  // strtotime() was not able to parse $string, use "now":
	  $time = time();
        }
      }
      return $time;
    }
    }

    $timestamp = '';
    if( $string != '' )
      {
	$timestamp = __make_timestamp($string);
      }
    else
      {
	return;
      }

    $txt = date('r',$timestamp);
    return $txt;
  }


  public function smarty_modifier_cge_entity_decode($string)
  {
    return html_entity_decode($string,ENT_QUOTES);
  }


  /*
   * A smarty block plugin for displaying an error using
   * a template.  i.e {error}blah blah blah{/error}
   *
   */
  public function blockDisplayError($params,$content,&$smarty,$repeat)
  {
    global $gCms;
    $txt = '';
    if( trim($content) != '' )
      {
	$errorclass = 'error';
	if( isset( $params['errorclass'] ) )
	  {
	    $errorclass = trim($params['errorclass']);
	  }
	$obj =& $gCms->modules['CGExtensions']['object'];
	$obj->_load_main();
	$txt = $obj->DisplayErrorMessage($content,$errorclass);
      }
    
    if( isset( $params['assign'] ) )
      {
	$smarty->assign($params['assign'],$txt);
	return '';
      }
    return $txt;
  }


  /*---------------------------------------------------------
   Constructor:
   ---------------------------------------------------------*/
  public function __construct()
  {
    parent::__construct();

    spl_autoload_register(array($this,'autoload'));

    $this->_obj = false;
    $this->_actionid = '';
    
    global $gCms;
    $smarty = $gCms->GetSmarty();
    $gCms->variables['myname'] = $this->GetName();

    $smarty->register_function('cge_yesno_options',
			       array('CGExtensions','smarty_function_cge_yesno_options'));
    $smarty->register_function('cge_have_module',
			       array('CGExtensions','smarty_function_have_module'));
  }


  public function CGExtensions()
  {
    parent::__construct();
  }


  public function autoload($classname)
  {
    if( !is_object($this) ) return;

    // check for classes.
    $fn = $this->GetModulePath()."/lib/class.{$classname}.php";
    if( file_exists($fn) )
      {
	require_once($fn);
	return;
      }

    // check for interfaces
    $fn = $this->GetModulePath()."/lib/interface.{$classname}.php";
    if( file_exists($fn) )
      {
	require_once($fn);
	return;
      }
    
    // check for a master file
    $fn = $this->GetModulePath()."/lib/extraclasses.php";
    if( file_exists($fn) )
      {
	global $gCms;
	if( !isset($gCms->variables['extraclasses']) )
	  {
	    $gCms->variables['extraclasses'] = array();
	  }
	if( !in_array($fn,$gCms->variables['extraclasses']) )
	  {
	    require_once($fn);
	    $gCms->variables['extraclasses'][] = $fn;
	    return;
	  }
      }
  }


  /*---------------------------------------------------------
   SetParameters()
   ---------------------------------------------------------*/
  public function SetParameters()
  {
    parent::SetParameters();
    
    $this->RestrictUnknownParams();
    $this->SetParameterType('cge_msg',CLEAN_STRING);
    $this->SetParameterType('cge_error',CLEAN_INT);

    global $gCms;
    $smarty = $gCms->GetSmarty();
    $smarty->register_block('cgerror',
			    array('CGExtensions','blockDisplayError'));
    $smarty->register_function('cgimage',
			       array('CGExtensions','smarty_function_cgimage'));
    $smarty->register_function('cge_state_options',
			       array('CGExtensions','smarty_function_cge_state_options'));
    $smarty->register_function('cge_country_options',
			       array('CGExtensions','smarty_function_cge_country_options'));
    $smarty->register_function('get_current_url',
			       array('CGExtensions','smarty_function_get_current_url'));
    $smarty->register_modifier('rfc_date',
			       array('CGExtensions','smarty_modifier_rfc_date'));
    $smarty->register_modifier('cge_entity_decode',
			       array('CGExtensions','smarty_modifier_cge_entity_decode'));
  }


  /*---------------------------------------------------------
   load_main()
   ---------------------------------------------------------*/
  private function _load_main()
  {
    if( is_object($this->_obj) ) return;
    require_once(dirname(__FILE__).'/class.cgextensions.tools.php');
    $this->_obj = new cgextensions_tools($this);
  }


  /*---------------------------------------------------------
   _load_form()
   ---------------------------------------------------------*/
  private function _load_form()
  {
    require_once(dirname(__FILE__).'/form_tools.php');
  }


  /*---------------------------------------------------------
   GetDataStore()
   ---------------------------------------------------------*/
  public function &GetDatastore()
  {
    $this->_load_datastore();
    return $this->_datastore_obj;
  }


  /*---------------------------------------------------------
   GetName()
   ---------------------------------------------------------*/
  public function GetName()
  {
    return 'CGExtensions';
  }


  /*---------------------------------------------------------
   GetFriendlyName()
   ---------------------------------------------------------*/
  public function GetFriendlyName()
  {
    return $this->Lang('friendlyname');
  }

	
  /*---------------------------------------------------------
   GetVersion()
   ---------------------------------------------------------*/
  public function GetVersion()
  {
    return '1.18.4';
  }


  /*---------------------------------------------------------
   GetHelp()
   ---------------------------------------------------------*/
  public function GetHelp()
  {
    return $this->Lang('help');
  }


  /*---------------------------------------------------------
   GetAuthor()
   ---------------------------------------------------------*/
  public function GetAuthor()
  {
    return 'calguy1000';
  }


  /*---------------------------------------------------------
   GetAuthorEmail()
   ---------------------------------------------------------*/
  public function GetAuthorEmail()
  {
    return 'calguy1000@cmsmadesimple.org';
  }


  /*---------------------------------------------------------
   GetChangeLog()
   ---------------------------------------------------------*/
  public function GetChangeLog()
  {
    return file_get_contents(dirname(__FILE__).'/changelog.html');
  }


  /*---------------------------------------------------------
   IsPluginModule()
   ---------------------------------------------------------*/
  public function IsPluginModule()
  {
    return true;
  }


  /*---------------------------------------------------------
   HasAdmin()
   ---------------------------------------------------------*/
  public function HasAdmin()
  {
    return true;
  }


  /*---------------------------------------------------------
   GetAdminSection()
   ---------------------------------------------------------*/
  public function GetAdminSection()
  {
    return 'extensions'; // Needed for wiki help link to work
  }


  /*---------------------------------------------------------
   GetAdminDescription()
   ---------------------------------------------------------*/
  public function GetAdminDescription()
  {
    return $this->Lang('moddescription');
  }


  /*---------------------------------------------------------
   VisibleToAdminUser()
   ---------------------------------------------------------*/
  public function VisibleToAdminUser()
  {
    return $this->CheckPermission('Modify Site Preferences') ||
      $this->CheckPermission('Modify Templates');
  }


  /*---------------------------------------------------------
   GetDependencies()
   ---------------------------------------------------------*/
  public function GetDependencies()
  {
    return array();
  }


  /*---------------------------------------------------------
   InstallPostMessage()
   ---------------------------------------------------------*/
  public function InstallPostMessage()
  {
    return $this->Lang('postinstall');
  }


  /*---------------------------------------------------------
   MinimumCMSVersion()
   ---------------------------------------------------------*/
  public function MinimumCMSVersion()
  {
    return "1.6.6";
  }


  /*---------------------------------------------------------
   UninstallPostMessage()
   ---------------------------------------------------------*/
  public function UninstallPostMessage()
  {
    return $this->Lang('postuninstall');
  }


  /*
   * A replacement for the built in DoAction method
   */
  public function DoAction($name,$id,$params,$returnid='')
  {
    if( !method_exists($this,'set_action_id') && $this->GetName() != 'CGExtensions' )
      {
	die('FATAL ERROR: A module derived from CGExtensions is not handling the set_action_id method');
      }
    $this->set_action_id($id);

    global $gCms;
    $smarty =& $gCms->GetSmarty();
    $smarty->assign('actionid',$id);
    $smarty->assign('actionparams',$params);
    $smarty->assign('returnid',$returnid);
    $smarty->assign_by_ref('mod',$this);
    $smarty->assign_by_ref($this->GetName(),$this);
    $gCms->variables['module'] = $this->GetName();

    $this->module->_returnid = $returnid;
    if( $returnid == '' )
      {
	if( isset($params['cg_activetab']) )
	  {
	    $this->_current_tab = trim($params['cg_activetab']);
	    unset($params['cg_activetab']);
	  }
	if( isset($params['cg_error']) )
	  {
	    $this->_errormsg = explode(':err:',$params['cg_error']);
	    unset($params['cg_error']);
	  }
	if( isset($params['cg_message']) )
	  {
	    $this->_messages = explode(':msg:',$params['cg_message']);
	    unset($params['cg_message']);
	  }
      }

    $this->DisplayErrors();
    $this->DisplayMessages();

    parent::DoAction($name,$id,$params,$returnid);
  }

  // todo, remove this function
  // see availability
  function array_to_hash($input,$key)
  {
    return cge_array::to_hash($input,$key);
  }

  // todo, remove this function
  function array_extract_field($input,$key)
  {
    return cge_array::extract_field($input,$key);
  }

  // todo, remove this function
  function compare_elements_by_sortorder_key( $e1, $e2, $key = 'sort_key' )
  {
    return cge_array::ompare_elements_by_sortorder_key( $e1, $e2, $key );
  }

  // todo, remove this function
  // see uploads.
  function explode_with_key($str, $inglue='=', $outglue='&')
  {
    return cge_array::explode_with_key($str,$inglue,$outglue);
  }

  // todo, remove this function
  function &ArrayToObject($array)
  {
    return cge_array::to_object($array);
  }


  function encrypt($key,$data)
  {
    return cge_encrypt::encrypt($key,$data);
  }


  function decrypt($key,$data)
  {
    return cge_encrypt::decrypt($key,$data);
  }


  /*
   * A convenience function to create a url
   */
  function CreateURL($id,$action,$returnid,$params=array(),$inline=false,$prettyurl='')
  {
    $this->_load_main();
    return $this->_obj->__CreatePrettyLink($id,$action,$returnid,'',$params,'',true,$inline,'',false,$prettyurl);
  }


  /* ======================================== */
  /* FORM FUNCTIONS                           */
  /* ======================================== */

  function CreateSortableListArea($id,$name,$items,
				  $selected = '',
				  $allowduplicates = true,
				  $max_selected = -1,
				  $template = '',
				  $label_left = '',
				  $label_right = '')
  {
    global $gCms;
    $cge = $this->GetModuleInstance('CGExtensions');
    if( empty($label_left) )
      {
	$label_left = $cge->Lang('selected');
      }
    if( empty($label_right) )
      {
	$label_right = $cge->Lang('available');
      }
    $smarty =& $gCms->GetSmarty();
    if( !empty($selected) )
      {
	$sel = explode(',',$selected);
	$tmp = array();
	foreach($sel as $theid)
	  {
	    if( array_key_exists($theid,$items) )
	      {
		$tmp[$theid] = $items[$theid];
	      }
	  }
	$smarty->assign('selectarea_selected_str',$selected);
	$smarty->assign('selectarea_selected',$tmp);
      }
    $smarty->assign_by_ref('cge',$cge);
    $smarty->assign('max_selected',$max_selected);
    $smarty->assign('label_left',$label_left);
    $smarty->assign('label_right',$label_right);
    $smarty->assign('selectarea_masterlist',$items);
    $smarty->assign('selectarea_prefix',$id.$name);
    if( $allowduplicates ) $allowduplicates = 1; else $allowduplicates = 0;
    $smarty->assign('allowduplicates',$allowduplicates);
    $smarty->assign('upstr',$cge->Lang('up'));
    $smarty->assign('downstr',$cge->Lang('down'));
    if( empty($template) )
      {
	$template = $cge->GetPreference('dflt_sortablelist_template');
      }
    return $cge->ProcessTemplateFromDatabase('sortablelists_'.$template);
  }


  function CreateInputYesNoDropdown($id,$name,$selectedvalue='',$addtext='')
  {
    $this->_load_form();
    return cge_CreateInputYesNoDropdown($this,$id,$name,$selectedvalue,$addtext);
  }


  function CGCreateInputSubmit($id,$name,$value='',$addtext='',$image='',
			     $confirmtext='',$class='')
  {
    $this->_load_form();
    return cge_CreateInputSubmit($this,$id,$name,$value,$addtext,$image,$confirmtext,$class);
  }


  function CreateInputCheckbox($id,$name,$value='',$selectedvalue='',
			       $addtext='')
  {
    $this->_load_form();
    return cge_CreateInputCheckbox($this,$id,$name,$value,$selectedvalue,$addtext);
  }


  /*
   * A Convenience function for creating forms
   */
  function CGCreateFormStart($id,$action='default',$returnid='',$params=array(),$inline=false,$method='post',$enctype='',$idsuffix='',$extra='')
  {
    if( !empty($this->_current_tab) )
      {
	$params['cg_activetab'] = $this->_current_tab;
      }
    return $this->CreateFormStart($id,$action,$returnid,$method,$enctype,$inline,$idsuffix,$params,$extra);
  }


  /*
   * A convenience function for creating a frontend form
   */
  function CGCreateFrontendFormStart($id,$action='default',$returnid='',$params=array(),$inline=true,$method='post',$enctype='',$idsuffix='',$extra='')
  {
    $this->_load_form();
    return $this->CreateFrontendFormStart($id,$returnid,$action,$method,$enctype,$inline,$idsuffix,$params,$extra);
  }


  function CreateInputHidden($id,$name,$value='',$addtext='',$delim=',')
  {
    $this->_load_form();
    return cge_CreateInputHidden($this,$id,$name,$value,$addtext,$delim);
  }


  function RedirectToTab( $id, $tab = '', $params = '', $action = '' )
  {
    $this->_load_main();
    return $this->_obj->RedirectToTab($id,$tab,$params,$action);
  }


  function Redirect($id,$action,$returnid='',$params = array(),$inline=false)
  {
    $parms = array();
    if( is_array( $params ) )
      {
	$parms = $params;
      }
    if( is_array($this->_errormsg) && count($this->_errormsg) )
      {
	$parms['cg_error'] = implode(':err:',$this->_errormsg);
      }
    if( is_array($this->_messages) && count($this->_messages) )
      {
	$parms['cg_message'] = implode(':err:',$this->_messages);
      }

    parent::Redirect( $id, $action, $returnid, $parms, $inline );
  }


  // todo: remove me.
  function CGRedirect($id,$action,$returnid='',$params=array(),$inline = false)
  {
    $this->Redirect($id,$action,$returnid,$params,$inline);
  }

  
  /*
   * Test if the current code is handling an admin action or
   * a frontend action
   */
  function IsAdminAction()
  {
    return ($this->_returnid == '');
  }


  /*
   * Set an error
   */
  function SetError($str)
  {
    if( !is_array( $this->_errormsg ) )
      $this->_errormsg = array();
    $this->_errormsg[] = $str;
  }


  /*
   * Set an error
   */
  function SetMessage($str)
  {
    if( !is_array( $this->_messages ) )
      $this->_messages = array();
    $this->_messages[] = $str;
  }


  /*
   * Display errors using the current default template
   */
  function DisplayErrors()
  {
    if( is_array($this->_errormsg) && count($this->_errormsg) )
      {
	echo $this->ShowErrors($this->_errormsg);
	$this->_errormsg = array();
      }
  }


  /*
   * Display errors using the current default template
   */
  function DisplayMessages()
  {
    if( is_array($this->_messages) && count($this->_messages) )
      {
	$message = implode('<br/>',$this->_messages);
	echo $this->ShowMessage($message);
	$this->_messages = array();
      }
  }


  /*
   * Set the current action
   * Used for the various template forms.
   */
  function SetCurrentTab($tab)
  {
    $this->_current_tab = $tab;
  }


  /*
   * A replacement for the built in SetTabHeader
   */
  function SetTabHeader($name,$str,$state = 'unknown')
  {
    if( $state == 'unknown' )
      {
	$state = ($name == $this->_current_tab);
      }
    return parent::SetTabHeader($name,$str,$state);
  }


  /*
   * A function for using a template to display an error message
   */
  function DisplayErrorMessage($txt,$class = 'error')
  {
    global $gCms;
    $smarty =& $gCms->GetSmarty();
    $smarty->assign('cg_errorclass',$class);
    $smarty->assign('cg_errormsg',$txt);
    $res = $this->ProcessTemplateFromDatabase('cg_errormsg','',true,'CGExtensions');
    return $res;
  }


  /*
   * A convenience function for retrieving the current error template
   */
  function GetErrorTemplate()
  {
    return $this->GetTemplate('cg_errormsg','CGExtensions');
  }


  /*
   * Reset the error template to factory defaults
   */
  function ResetErrorTemplate()
  {
    $fn = cms_join_path(dirname(__FILE__),'templates','orig_error_template.tpl');
    if( file_exists( $fn ) )
      {
	$template = @file_get_contents($fn);
	$this->SetTemplate( 'cg_errormsg', $template,'CGExtensions' );
      }
  }


  /*
   * Set the error template
   */
  function SetErrorTemplate($tmpl)
  {
    return $this->SetTemplate('cg_errormsg',$tmpl,'CGExtensions');
  }


  /*
   * A function to return an array of of country codes and country names.
   * i.e:  array( array('code'=>'AB','name'=>'Alberta'), array('code'=>'MB','code'=>'Manitoba'));
   */
  protected function get_state_list()
  {
    $db =& $this->GetDb();
    $query = 'SELECT * FROM '.CGEXTENSIONS_TABLE_STATES.' ORDER BY sorting DESC,name ASC';
    $tmp = $db->GetAll($query);
    return $tmp;
  }

  /*
   * A convenience function to create a state dropdown list
   */
  function CreateInputStateDropdown($id,$name,$value='AL',$selectone=false,$addtext='')
  {
    $tmp = $this->get_state_list();

    $states = array();
    if( $selectone !== false )
      {
	if( is_string($selectone) )
	  {
	    $states[$selectone] = '';
	  }
	else
	  {
	    $states[$this->Lang('select_one')] = '';
	  }
      }
    foreach($tmp as $row)
      {
	$states[$row['name']] = $row['code'];
      }
    return $this->CreateInputDropdown($id,$name,$states,-1,
				      strtoupper($value),$addtext);
  }


  /*
   * A function to return an array of of country codes and country names.
   * i.e:  array( array('code'=>'US','name'=>'United States'), array('code'=>'CA','code'=>'Canada'));
   */
  protected function get_country_list()
  {
    $db =& $this->GetDb();
    $query = 'SELECT * FROM '.CGEXTENSIONS_TABLE_COUNTRIES.' ORDER BY sorting DESC,name ASC';
    $tmp = $db->GetAll($query);

    return $tmp;
  }

  /*
   * A convenience function to create a country dropdown list
   */
  function CreateInputCountryDropdown($id,$name,$value='US',$selectone=false,$addtext='')
  {
    $tmp = $this->get_country_list();

    $countries = array();
    if( $selectone !== false )
      {
	$countries[$this->Lang('select_one')] = '';
      }
    foreach($tmp as $row)
      {
	$countries[$row['name']] = $row['code'];
      }
    return $this->CreateInputDropdown($id,$name,$countries,-1,
				      strtoupper($value),$addtext);
  }

  /*
   * A convenience function to get the country name given the acronym
   */
  function GetCountry($the_acronym)
  {
    $db =& $this->GetDb();
    $query = 'SELECT name FROM '.CGEXTENSIONS_TABLE_COUNTRIES.'
               WHERE code = ?';
    $name = $db->GetOne($query,array($the_acronym));
    return $name;
  }


  /*
   * A convenience function to get the state name given the acronym
   */
  function GetState($the_acronym)
  {
    $db =& $this->GetDb();
    $query = 'SELECT name FROM '.CGEXTENSIONS_TABLE_STATES.'
               WHERE code = ?';
    $name = $db->GetOne($query,array($the_acronym));
    return $name;
  }


  /*
   * A convenience function to create an image dropdown
   */
  function CreateImageDropdown($id,$name,$selectedfile,$dir = '')
  {
    global $gCms;
    $config =& $gCms->GetConfig();

    if( $dir == '' )
      {
	$dir = $config['image_uploads_path'];
      }
    $extensions = $this->GetPreference('imageextensions');

    $filelist = cge_dir::get_file_list($dir,$extensions);
    return $this->CreateInputDropdown($id,$name,$filelist,-1,$selectedfile);
  }

  /*
   * A convenience function to create a file dropdown
   */
  function CreateFileDropdown($id,$name,$selectedfile='',$dir = '',$extensions = '',$allownone = '',$allowmultiple = false,$size = 3)
  {
    global $gCms;
    $config =& $gCms->GetConfig();
    
    if( $dir == '' ) $dir = $config['uploads_path'];
    if( $extensions == '' ) $extensions = $this->GetPreference('fileextensions','');

    $tmp = cge_dir::get_file_list($dir,$extensions);
    $tmp2 = array();
    if( !empty($allownone) )
    {
       $tmp2[$this->Lang('none')] = '';
    }
    $filelist = array_merge($tmp2,$tmp);

    if( $allowmultiple )
      {
	if( !endswith($name,'[]') )
	  {
	    $name .= '[]';
	  }
	return $this->CreateInputSelectList($id,$name,$filelist,array(),$size);
      }
    return $this->CreateInputDropdown($id,$name,$filelist,-1,$selectedfile);
  }

  /*
   * A convenience function to create a file dropdown
  */
  function CreateColorDropdown($id,$name,$selectedvalue='')
  {
    $this->_load_form();
    $cgextensions =& $this->GetModuleInstance('CGExtensions');
    return cge_CreateColorDropdown($cgextensions,$id,$name,$selectedvalue);
  }

  /* ======================================== */
  /* IMAGE FUNCTIONS                         */
  /* ======================================== */


  // todo: remove me.
  function TransformImage($srcSpec,$destSpec,$size='')
  {
    return cge_image::transform_image($srcSpec,$destSpec,$size);
  }


  function CreateImageTag($id,$alt='',$width='',$height='',$class='',
			  $addtext='')
  {
    $this->_load_main();
    return $this->_obj->CreateImageTag($id,$alt,$width,$height,$class,$addtext);
  }


  function DisplayImage($image,$alt='',$class='',$width='',$height='')
  {
    $this->_load_main();
    return $this->_obj->DisplayImage($image,$alt,$class,$width,$height);
  }


  function CreateImageLink($id,$action,$returnid,$contents,$image,
			   $params=array(),$classname='',
			   $warn_message='',$imageonly=true,
			   $inline=false,
			   $addtext='',$targetcontentonly=false,$prettyurl='')
  {
    $this->_load_main();
    return $this->_obj->CreateImageLink($id,$action,$returnid,$contents,$image,
				 $params,$classname,$warn_message,
				 $imageonly,$inline,$addtext,
				 $targetcontentonly,$prettyurl);
  }



  /*
   * Add a directory to the list of searchable directories
   */
  function AddImageDir($dir)
  {
    if( strpos('/',$dir) !== 0 )
      {
	$dir = "modules/".$this->GetName().'/'.$dir;
      }
    $this->_image_directories[] = $dir;
  }

  // todo: delete me.
  function ListTemplatesWithPrefix($prefix='',$trim = false )
  {
    return cge_template_utils::get_templates_by_prefix($prefix,$trim);
  }

  // todo: delete me.
  function CreateTemplateDropdown($id,$name,$prefix='',$selectedvalue=-1,$addtext='')
  {
    return cge_template_utils::create_template_dropdown($id,$name,$prefix,$selectedvalue,$addtext);
  }

  /*
   * Part of the multiple database template functionality
   * this function provides an interface for adding, editing,
   * deleting and marking active all templates that match
   * a prefix.
   *
   * @param id = module id (pass in the value from doaction)
   * @param returnid = destination page id
   * @param prefix = the template prefix
   * @param defaulttemplatepref = The name of the preference containing the system default template
   * @param active_tab = The tab to return to
   * @param defaultprefname = The name of the preference that contains the name of the current default template
   * @param title = Title text to display in the add/edit template form
   * @param inf = Information text to display in the add/edit template form
   * @param destaction = The action to return to.
   */
  function ShowTemplateList($id,$returnid,$prefix,
			    $defaulttemplatepref,$active_tab,
			    $defaultprefname,
			    $title,$info = '',$destaction = 'defaultadmin')
  {
    $cgextensions = $this->GetModuleInstance('CGExtensions');
    return $cgextensions->_DisplayTemplateList($this,$id,$returnid,$prefix,
				      $defaulttemplatepref,$active_tab,
			              $defaultprefname,$title,$info,$destaction);
  }


  function _DisplayTemplateList(&$module,$id,$returnid,$prefix,
				$defaulttemplatepref,$active_tab,
				$defaultprefname,
				$title, $info = '',$destaction = 'defaultadmin')
  {
    $this->_load_main();
    return $this->_obj->_DisplayTemplateList($module,$id,$returnid,$prefix,
					     $defaulttemplatepref,$active_tab,
					     $defaultprefname,$title,$info,$destaction);
  }



  /*---------------------------------------------------------
   GetDefaultTemplateForm
   NOT PART OF THE MODULE API

   A function that provides a form for editing a default template
   and/or returning it to system defaults.
   ---------------------------------------------------------*/
  function GetDefaultTemplateForm(&$module,$id,$returnid,$prefname,
				  $action,$active_tab,$title,$filename,
				  $info)
  {
    $cgextensions =& $this->GetModuleInstance('CGExtensions');
    $smarty =& $this->smarty;
    $smarty->assign('defaulttemplateform_title',$title);
    $smarty->assign('info_title',$info);
    $smarty->assign('startform',	
	    $cgextensions->CreateFormStart($id,'setdefaulttemplate',$returnid,'post','',false,'',
					   array('prefname'=>$prefname,
						 'destmodule'=>$module->GetName(),
                                                 'destaction'=>$action,
						 'cg_activetab'=>$active_tab,
						 'filename'=>$filename)));
    $smarty->assign('prompt_template',$cgextensions->Lang('template'));
    $smarty->assign('input_template',$cgextensions->CreateTextArea(false,$id,
							   $module->GetPreference($prefname),
							   'input_template'));
    $smarty->assign('submit',$cgextensions->CreateInputSubmit($id,'submit',$cgextensions->Lang('submit')));
    $smarty->assign('reset',$cgextensions->CreateInputSubmit($id,'resettodefault',
						     $cgextensions->Lang('resettofactory')));
    $smarty->assign('endform',
		    $cgextensions->CreateFormEnd());
    return $cgextensions->ProcessTemplate('editdefaulttemplate.tpl');
  }


  /*---------------------------------------------------------
   EditDefaultTemplateForm
   NOT PART OF THE MODULE API

   A function that provides a form for editing a default template
   and/or returning it to system defaults.
   ---------------------------------------------------------*/
  function EditDefaultTemplateForm(&$module,$id,$returnid,$prefname,$active_tab,$title,
				   $filename,$info)
  {
    $cgextensions =& $this->GetModuleInstance('CGExtensions');
    echo $cgextensions->GetDefaultTemplateForm($module,$id,$returnid,
					       $prefname,'defaultadmin',$active_tab,
					       $title,$filename,$info);
  }


  /*
   * A convenience function to create a url to a certain CMS page
   */
  function CreateContentURL($pageid)
  {
	global $gCms;
	$config =& $gCms->GetConfig();

	$contentops =& $gCms->GetContentOperations();
	$alias = $contentops->GetPageAliasFromID( $pageid );

	$text = '';
        if ($config["assume_mod_rewrite"])
	{
		# mod_rewrite
		if( $alias == false )
		{
			return '<!-- ERROR: could not get an alias for pageid='.$pageid.'-->';
		}
		else
		{
			$text .= $config["root_url"]."/".$alias.
			(isset($config['page_extension'])?$config['page_extension']:'.shtml');
		}
	}
	else
	{
		# mod rewrite
		$text .= $config["root_url"]."/index.php?".$config["query_var"]."=".$pageid;
		return $text;
	}
  }


  function GetAdminUsername($uid)
  {
    $user = UserOperations::LoadUserByID($uid);
    return $user->username;
  }


  function CreateUserMultiselect($id, $selected = '', $name='ownerid', 
				 $groups = true, $size=5)
  {
    global $gCms;
    $result = '';
    
    $result .= '<select multiple size="'.$size.'" name="'.$id.$name.'[]">';
    if( $groups )
      {
	$groupops =& $gCms->GetGroupOperations();
	$allgroups = $groupops->LoadGroups();
	foreach( $allgroups as $onegroup )
	  {
	    $result .= '<option value="-'.$onegroup->id.'"';
	    if( is_array($selected) && in_array($onegroup->id * -1, $selected) )
	      {
		$result .= ' selected="selected"';
	      }
	    else if( ($onegroup->id * -1) == $selected )
	      {
		$result .= ' selected="selected"';
	      }
	    $result .= '>'.lang('group').': '.$onegroup->name.'</option>';
	  }
      }

    $allusers = UserOperations::LoadUsers();
    if (count($allusers) > 0)
      {
	foreach ($allusers as $oneuser)
	  {
	    $result .= '<option value="'.$oneuser->id.'"';
	    if( is_array($selected) && in_array($oneuser->id, $selected) )
	      {
		$result .= ' selected="selected"';
	      }
	    else if( $oneuser->id == $selected )
	      {
		$result .= ' selected="selected"';
	      }
	    $result .= '>'.$oneuser->username.'</option>';
	  }
      }
    $result .= '</select>';
    
    return $result;
  }

  
  function ExpandSelectedUsers($useridlist)
  {
    global $gCms;
    $userops =& $gCms->GetUserOperations();

    $users = array();
    foreach( $useridlist as $oneuid )
      {
	if( $oneuid < 0 )
	  {
	    // assume its a group id
	    // and get all the uids for that group
	    $groupusers = $userops->LoadUsersInGroup($oneuid * -1);
	    foreach( $groupusers as $oneuser )
	      {
		$users[] = $oneuser->id;
	      }
	  }
	else
	  {
	    $users[] = $oneuid;
	  }
      }

    $users = array_unique($users);
    return $users;
  }

  function GetUploadErrorMessage($code)
  {
    $cgextensions =& $this->GetModuleInstance('CGExtensions');
    return $cgextensions->Lang($code);
  }

  function is_alias($str)
  {
    if( !preg_match('/^[\-\_\w]+$/', $str) )
      return false;
    return true;
  }


  function set_action_id($id)
  {
    $this->_actionid = $id;
  }

  function get_action_id()
  {
    return $this->_actionid;
  }

  function GetActionId()
  {
    if( !method_exists($this,'get_action_id') && $this->GetName() != 'CGExtensions' )
      {
	die('FATAL ERROR: A module derived from CGExtensions is not handling the get_action_id method');
      }
    return $this->get_action_id();
  }


  /*---------------------------------------------------------
   GetSingleTemplateForm
   NOT PART OF THE MODULE API

   A function that provides a form for editing a single template
   and/or returning it to system defaults.
   ---------------------------------------------------------*/
  function GetSingleTemplateForm(&$module,$id,$returnid,$tmplname,
				  $active_tab,$title,$filename,
				  $info = '')
  {
    $cgextensions =& $this->GetModuleInstance('CGExtensions');
    $smarty =& $this->smarty;
    $smarty->assign('defaulttemplateform_title',$title);
    $smarty->assign('info_title',$info);
    $smarty->assign('startform',	
	    $cgextensions->CreateFormStart($id,'setdefaulttemplate',$returnid,'post','',false,'',
					   array('prefname'=>$tmplname,
						 'usetemplate'=>'1',
						 'destmodule'=>$module->GetName(),
						 'cg_activetab'=>$active_tab,
						 'filename'=>$filename)));
    $smarty->assign('prompt_template',$cgextensions->Lang('template'));
    $smarty->assign('input_template',$cgextensions->CreateTextArea(false,$id,
							   $module->GetTemplate($tmplname),
							   'input_template'));
    $smarty->assign('submit',$cgextensions->CreateInputSubmit($id,'submit',$cgextensions->Lang('submit')));
    $smarty->assign('reset',$cgextensions->CreateInputSubmit($id,'resettodefault',
						     $cgextensions->Lang('resettofactory')));
    $smarty->assign('endform',
		    $cgextensions->CreateFormEnd());
    return $cgextensions->ProcessTemplate('editdefaulttemplate.tpl');
  }


  function GetWatermarkError($error)
  {
     if( empty($error) || $error === 0 )
       {
         return '';
       }
     $mod =& $this->GetModuleInstance('CGExtensions');
     return $mod->Lang('watermarkerror_'.$error);
  }


  function InitializeCharting()
  {
    require_once(dirname(__FILE__).'/lib/pData.class');
    require_once(dirname(__FILE__).'/lib/pChart.class');
  }

  function InitializeAssocData()
  {
    require_once(dirname(__FILE__).'/lib/class.AssocData.php');
  }

  // todo: remove me.
  function session_clear($key = '')
  {
    if( empty($key) )
      {
	unset($_SESSION[$this->GetName()]);
      }
    else
      {
	unset($_SESSION[$this->GetName()][$key]);
      }
  }

  // todo: remove me.
  function session_put($key,$value)
  {
    if( !isset($_SESSION[$this->GetName()]) )
      {
	$_SESSION[$this->GetName()] = array();
      }
    $_SESSION[$this->GetName()][$key] = $value;
  }

  // todo: remove me.
  function session_get($key,$dfltvalue='')
  {
    if( !isset($_SESSION[$this->GetName()]) )
      {
	return $dfltvalue;
      }
    if( !isset($_SESSION[$this->GetName()][$key]) )
      {
	return $dfltvalue;
      }
    return $_SESSION[$this->GetName()][$key];
  }


  function param_session_get(&$params,$key,$defaultvalue='')
  {
    if( isset($params[$key]) )
      {
	return $params[$key];
      }
    return $this->session_get($key,$defaultvalue);
  }


  function resolve_alias_or_id($txt)
  {
    $result = '';
    global $gCms;
    $manager = $gCms->GetHierarchyManager();
    $node = $manager->sureGetNodeByAlias($txt);
    if (isset($node))
      {
	$result = $node->getID();
      }
    else
      {
	$node = $manager->sureGetNodeById($txt);
	if (isset($node))
	  {
	    $result = intval($txt);
	  }
      }
    return $result;
  }


  function http_post($URL,$data = '',$referrer='')
  {
    $this->_load_main();
    return $this->_obj->http_post($URL,$data,$referrer);
  }


  function http_get($URL,$referrer='')
  {
    $this->_load_main();
    return $this->_obj->http_get($URL,$referrer);
  }
} // class

  } // if

// EOF
?>
