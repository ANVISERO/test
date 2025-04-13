<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: CustomContent (c) 2008 by Robert Campbell 
#         (calguy1000@cmsmadesimple.org)
#  An addon module for CMS Made Simple to conditionally displaying content
#  based on the currently logged in user (FrontEndUsers module) or other
#  factors.
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

class ccUser
{
  var $_groups;
  var $_uid;
  var $_module;
  var $_name;

  function ccUser(&$module)
  {
    $this->_groups = array();
    $this->_uid = -1;
    $this->_module =& $module;
    $this->_name = '';
  }


  function setup()
  {
    if( !$this->_module->_initialized )
      {
	$this->_module->_SetVariables();
      }
  }


  function ipmatches($ranges)
  {
    function _testip($range,$ip) 
    {
      $result = 1;

# IP Pattern Matcher
# J.Adams <jna@retina.net>
      #
# Matches:
      #
# xxx.xxx.xxx.xxx        (exact)
# xxx.xxx.xxx.[yyy-zzz]  (range)
# xxx.xxx.xxx.xxx/nn    (nn = # bits, cisco style -- i.e. /24 = class C)
      #
# Does not match:
# xxx.xxx.xxx.xx[yyy-zzz]  (range, partial octets not supported)

      if (ereg("([0-9]+)\.([0-9]+)\.([0-9]+)\.([0-9]+)/([0-9]+)",$range,$regs)) {

# perform a mask match
	$ipl = ip2long($ip);
	$rangel = ip2long($regs[1] . "." . $regs[2] . "." . $regs[3] . "." . $regs[4]);
      
	$maskl = 0;
      
	for ($i = 0; $i< 31; $i++) {
	  if ($i < $regs[5]-1) {
	    $maskl = $maskl + pow(2,(30-$i));
	  }
	}
      
	if (($maskl & $rangel) == ($maskl & $ipl)) {
	  return 1;
	} else {
	  return 0;
	}
      } else {
      
# range based
	$maskocts = split("\.",$range);
	$ipocts = split("\.",$ip);
      
# perform a range match
	for ($i=0; $i<4; $i++) {
	  if (ereg("\[([0-9]+)\-([0-9]+)\]",$maskocts[$i],$regs)) {
	    if ( ($ipocts[$i] > $regs[2]) || ($ipocts[$i] < $regs[1])) {
	      $result = 0;
	    }
	  }
	  else
	    {
	      if ($maskocts[$i] <> $ipocts[$i]) {
		$result = 0;
	      }
	    }
	}
      }
      return $result;
    }

    $ip = getenv('REMOTE_ADDR');
    $arr_ranges = explode(',',$ranges);
    $myresult = 0;
    foreach( $arr_ranges as $onerange )
      {
	$myresult = _testip($onerange,$ip);
	if( $myresult == 1 ) return $myresult;
      }
    return $myresult;
  }


  function loggedin()
  {
    if( $this->_uid == -1 )
      {
	$module =& $this->_module->GetModuleInstance('FrontEndUsers');
	if( !$module ) return 0;
	$this->_uid = $module->LoggedInId();
      }
    return $this->_uid;
  }


  function username()
  {
    if( empty($this->_name) )
      {
	$module =& $this->_module->GetModuleInstance('FrontEndUsers');
	if( $this->_uid == -1 )
	  {
	    $this->_uid = $module->LoggedInId();
	  }
	$this->_name = $module->LoggedInName();
      }
    return $this->_name;
  }


  function property($propname)
  {
    $module =& $this->_module->GetModuleInstance('FrontEndUsers');
    if( $this->_uid == -1 )
      {
	$this->_uid = $module->LoggedInId();
      }
    if( !$module ) return false;
    $txt = $module->GetUserPropertyFull($propname,$this->_uid);
    return $txt;
  }


  function groups()
  {
    if( count($this->_groups) == 0 )
      {
	$module =& $this->_module->GetModuleInstance('FrontEndUsers');
	if( !$module ) return '';

	if( !isset($this->_uid) || $this->_uid < 0 )
          { 
             $this->_uid = $module->LoggedInId();
          }

	$groups = $module->GetMemberGroupsArray( $this->_uid );
	$gns = array();
	if( $groups !== false )
	  {
	    foreach( $groups as $gid )
	      {
		$gns[] = $module->GetGroupName($gid['groupid']);
	      }
	  }
	$this->_groups = $gns;
      }
    return $this->_groups;
  }


  function memberof($groups)
  {
    if( count($this->_groups) == 0 )
      {
	$this->groups();
      }
    $arr = explode(',',$groups);
    foreach( $arr as $one )
      {
	if( array_search($one,$this->_groups) !== FALSE )
	  return 1;
      }
    return 0;
  }

};

#-------------------------------------------------------------------------
/* Your initial Class declaration. This file's name must
   be "[class's name].module.php", or, in this case,
   Skeleton.module.php
*/ 
class CustomContent extends CMSModule
{
  var $_initialized = false;
  var $substitute_content = false;

  function CustomContent()
  {
    //todo call the parent constructor

    // hopefully stop this page from caching all together.
    global $gCms; 
    $pageinfo =& $gCms->variables['pageinfo'];  
    $pageinfo->cachable = false;

    $obj = new ccUser($this);
    $smarty =& $gCms->GetSmarty();
    $smarty->assign('ccuser',$obj);
  }


  /*---------------------------------------------------------
   DisplayErrorPage($id, $params, $return_id, $message)
   NOT PART OF THE MODULE API
   ---------------------------------------------------------*/
  function DisplayErrorPage($id, &$params, $returnid, $message='')
  {
    $this->smarty->assign_by_ref('title_error', $this->Lang('error'));
    if ($message != '')
      {
	$this->smarty->assign_by_ref('message', $message);
      }
      
    // Display the populated template
    echo $this->ProcessTemplate('error.tpl');
  }


  /*---------------------------------------------------------
   GetName()
   ---------------------------------------------------------*/
  function GetName()
  {
    return 'CustomContent';
  }

  
  /*---------------------------------------------------------
   GetFriendlyName()
   ---------------------------------------------------------*/
  function GetFriendlyName()
  {
    return $this->Lang('friendlyname');
  }
  
  
  /*---------------------------------------------------------
   GetVersion()
   ---------------------------------------------------------*/
  function GetVersion()
  {
    return '1.5.3';
  }

  
  /*---------------------------------------------------------
   MinimumCMSVersion()
   Return the minimum version of CMS that this module requires.
   ---------------------------------------------------------*/
  function MinimumCMSVersion()
  {
    return '1.4';
  }

  /*---------------------------------------------------------
   GetHelp()
   ---------------------------------------------------------*/
  function GetHelp()
  {
    return $this->Lang('help');
  }
  

  /*---------------------------------------------------------
   GetAuthor()
   ---------------------------------------------------------*/
  function GetAuthor()
  {
    return 'calguy1000';
  }
  

  /*---------------------------------------------------------
   GetAuthorEmail()
   ---------------------------------------------------------*/
  function GetAuthorEmail()
  {
    return 'rob@techcom.dyndns.org';
  }
  

  /*---------------------------------------------------------
   GetChangeLog()
   ---------------------------------------------------------*/
  function GetChangeLog()
  {
    return @file_get_contents(dirname(__FILE__).'/changelog.html.inc');
  }


  /*---------------------------------------------------------
   IsPluginModule()
   ---------------------------------------------------------*/
  function IsPluginModule()
  {
    return false;
  }


  /*---------------------------------------------------------
   GetAdminDescription()
   ---------------------------------------------------------*/
  function GetAdminDescription()
  {
    return $this->Lang('moddescription');
  }
  

  /*---------------------------------------------------------
   GetDependencies()
   ---------------------------------------------------------*/
  function GetDependencies()
  {
    return array('FrontEndUsers'=>'1.3');
  }
  

  /*---------------------------------------------------------
   HasAdmin()
   ---------------------------------------------------------*/
  function HasAdmin()
  {
    return false;
  }
  

  /*---------------------------------------------------------
   HandlesEvents()
   ---------------------------------------------------------*/
  function HandlesEvents ()
  {
    return true;
  }


  /*---------------------------------------------------------
   Install()
   ---------------------------------------------------------*/
  function Install()
  {
    //$this->AddEventHandler( 'Search', 'SearchItemAdded', false );
  }

  
  /*---------------------------------------------------------
   InstallPostMessage()
   ---------------------------------------------------------*/
  function InstallPostMessage()
  {
    return $this->Lang('postinstall');
  }

  
  /*---------------------------------------------------------
   UninstallPostMessage()
   ---------------------------------------------------------*/
  function UninstallPostMessage()
  {
    return $this->Lang('postuninstall');
  }
  

  /*---------------------------------------------------------
   Upgrade()
   ---------------------------------------------------------*/
  function Upgrade($oldversion, $newversion)
  {
    $current_version = $oldversion;
    switch( $oldversion )
      {
      default: // this'll have to be changed for the next version
	{
	  $this->RemoveEventHandler( 'Search', 'SearchItemAdded' );
	}
      }
  }
  
	
  /*---------------------------------------------------------
   Uninstall()
   ---------------------------------------------------------*/
  function Uninstall()
  {
    $this->RemoveEventHandler( 'Search', 'SearchItemAdded' );
  }


  /*---------------------------------------------------------
   ContentPreCompile()
   ---------------------------------------------------------*/
  function ContentPreCompile()
  {
    if( !$this->_initialized )
      {
	$this->_SetVariables();
      }
  }

       
  /*---------------------------------------------------------
   TemplatePreCompile()
   ---------------------------------------------------------*/
  function TemplatePreCompile()
  {
    if( !$this->_initialized )
      {
	$this->_SetVariables();
      }
  }

       
  /*---------------------------------------------------------
   _testip($range,$ip)
   NOT PART OF THE MODULE API

   This is a function to match an IP address against an 
   address range specification.
   ---------------------------------------------------------*/
  function _testip($range,$ip) 
  {
    $result = 1;

    # IP Pattern Matcher
    # J.Adams <jna@retina.net>
    #
    # Matches:
    #
    # xxx.xxx.xxx.xxx        (exact)
    # xxx.xxx.xxx.[yyy-zzz]  (range)
    # xxx.xxx.xxx.xxx/nn    (nn = # bits, cisco style -- i.e. /24 = class C)
    #
    # Does not match:
    # xxx.xxx.xxx.xx[yyy-zzz]  (range, partial octets not supported)

    if (ereg("([0-9]+)\.([0-9]+)\.([0-9]+)\.([0-9]+)/([0-9]+)",$range,$regs)) {

      # perform a mask match
      $ipl = ip2long($ip);
      $rangel = ip2long($regs[1] . "." . $regs[2] . "." . $regs[3] . "." . $regs[4]);
      
      $maskl = 0;
      
      for ($i = 0; $i< 31; $i++) {
	if ($i < $regs[5]-1) {
	  $maskl = $maskl + pow(2,(30-$i));
	}
      }
      
      if (($maskl & $rangel) == ($maskl & $ipl)) {
	return 1;
      } else {
	return 0;
      }
    } else {
      
      # range based
      $maskocts = split("\.",$range);
      $ipocts = split("\.",$ip);
      
      # perform a range match
      for ($i=0; $i<4; $i++) {
	if (ereg("\[([0-9]+)\-([0-9]+)\]",$maskocts[$i],$regs)) {
	  if ( ($ipocts[$i] > $regs[2]) || ($ipocts[$i] < $regs[1])) {
	    $result = 0;
	  }
	}
	else
	  {
	    if ($maskocts[$i] <> $ipocts[$i]) {
	      $result = 0;
	    }
	  }
      }
    }
    return $result;
  }


  /*---------------------------------------------------------
   A function to add an association to an array
   NOT PART OF THE MODULE API
   ---------------------------------------------------------*/
  function _addArray(&$array, $key, $val)
  {
    $tmp = array($key => $val);
    $array = array_merge($array,$tmp);
  }


  /*---------------------------------------------------------
   Set Our Funky Variables
   ---------------------------------------------------------*/
  function _SetVariables()
  {
    $module =& $this->GetModuleInstance('FrontEndUsers');
    if( !$module )
      {
	echo $this->Lang('error_nofeusers');
	return;
      }

    global $gCms;
    $smarty =& $gCms->getSmarty();
    $loggedin = 0;
    $loginname = 'nobody';

    $smarty->assign('customcontent',1);
    $smarty->assign('customcontent_loggedin',$module->LoggedInId());
    $smarty->assign('customcontent_ip', getenv('REMOTE_ADDR') );
    if( $module->LoggedInId() > 0 )
      {
	$loginname = $module->LoggedInName();
      }
    $smarty->assign('customcontent_loginname',$loginname);
    $groups = $module->GetMemberGroupsArray( $module->LoggedInId() );
    $txt = '';
    if( is_array( $groups ) )
      {
      foreach( $groups as $grp )
        {
 	  $gn = $module->GetGroupName($grp['groupid']);
  	  $txt .= $gn.",";
 	  $smarty->assign('customcontent_memberof_'.$gn,1);
        }
      }
    if( $module->LoggedInId() > 0 )
      {
	$smarty->assign('customcontent_loginname',$module->LoggedInName());
	$groups = $module->GetMemberGroupsArray( $module->LoggedInId() );
	if( is_array( $groups ) )
	  {
	    $names = array();
	    foreach( $groups as $grp )
	      {
		$gn = $module->GetGroupName($grp['groupid']);
		$names[] = $gn;
		$smarty->assign('customcontent_memberof_'.$gn,1);
	      }
	    $smarty->assign('customcontent_groups',implode(',',$names));
	  }
	$smarty->assign('customcontent_groupcount',count($groups));
      }

    // and date and time stuff too, for good measure
    $vars = array(
		  'customcontent_dayzeros' => 'd',
		  'customcontent_day3text' => 'D',
		  'customcontent_day' => 'j',
		  'customcontent_weekday' => 'l',
		  'customcontent_dayordsuffix' => 'S',
		  'customcontent_dayofweek' => 'w',
		  'customcontent_dayofyear' => 'z',
		  'customcontent_weeknum' => 'W',
		  'customcontent_monthfulltext' => 'F',
		  'customcontent_monthnumzeros' => 'm',
		  'customcontent_monthshorttext' => 'M',
		  'customcontent_monthnum' => 'n',
		  'customcontent_monthnumdays' => 't',
		  'customcontent_leapyear' => 'L',
		  'customcontent_4digityear' => 'Y',
		  'customcontent_2digityear' => 'y',
		  'customcontent_lowerampm' => 'a',
		  'customcontent_upperampm' => 'A',
		  'custoncontent_inettime' => 'B',
		  'customcontent_12hour' => 'g',
		  'customcontent_24hour' => 'G',
		  'customcontent_12hourzeros' => 'h',
		  'customcontent_24hourzeros' => 'H',
		  'customcontent_minutes' => 'i',
		  'customcontent_seconds' => 's',
		  'customcontent_timezone' => 'T',
		  'customcontent_date' => 'r',
		  'customcontent_epochseconds' => 'U'
		  );
    $time = time();
    foreach( $vars as $key => $value )
      {
	$smarty->assign($key,date($value,$time));
      }

    $this->_initialized = true;
  }

}

?>
