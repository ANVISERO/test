<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: CGUserDirectory (c) 2009 by Robert Campbell 
#         (calguy1000@cmsmadesimple.org)
#  An addon module for CMS Made Simple to provide the ability to browse
#  and view summary reports and detail reports about groups of frontend
#  users.
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

///////////////////////////////////////////////////////////////////////////
// This module is derived from CGExtensions 
$cgextensions = cms_join_path($gCms->config['root_path'],'modules',
			      'CGExtensions','CGExtensions.module.php');
if( !is_readable( $cgextensions ) )
{
  echo '<h1><font color="red">ERROR: The CGExtensions module could not be found.</font></h1>';
  return;
}
require_once($cgextensions);
///////////////////////////////////////////////////////////////////////////

require_once(dirname(__FILE__).'/defines.php');

class CGUserDirectory extends CGExtensions
{

  /*---------------------------------------------------------
   Constructor
   ---------------------------------------------------------*/
  function CGUserDirectory()
  {
    parent::CGExtensions();

    global $gCms;
    $smarty =& $gCms->GetSmarty();
    $smarty->register_function('cgud_getpropertysummary_url',
			       array($this,'_smarty_getpropertysummary_url'));
  }
  

  /*---------------------------------------------------------
   GetName()
   ---------------------------------------------------------*/
  function GetName()
  {
    return 'CGUserDirectory';
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
    return '1.2.2';
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
    return 'calguy1000@cmsmadesimple.org';
  }


  /*---------------------------------------------------------
   GetChangeLog()
   ---------------------------------------------------------*/
  function GetChangeLog()
  {
    return $this->Lang('changelog');
  }
  
  /*---------------------------------------------------------
   IsPluginModule()
   ---------------------------------------------------------*/
  function IsPluginModule()
  {
    return true;
  }


  /*---------------------------------------------------------
   HasAdmin()
   ---------------------------------------------------------*/
  function HasAdmin()
  {
    return true;
  }


  /*---------------------------------------------------------
   GetAdminSection()
   ---------------------------------------------------------*/
  function GetAdminSection()
  {
    return 'extensions';
  }


  /*---------------------------------------------------------
   GetAdminDescription()
   ---------------------------------------------------------*/
  function GetAdminDescription()
  {
    return $this->Lang('moddescription');
  }


  /*---------------------------------------------------------
   VisibleToAdminUser()
   ---------------------------------------------------------*/
  function VisibleToAdminUser()
  {
    return $this->CheckPermission('Modify Site Preferences') ||
      $this->CheckPermission('Modify Templates');
  }


  /*---------------------------------------------------------
   AllowAutoInstall()
   ---------------------------------------------------------*/
  function AllowAutoInstall() {
    return FALSE;
  }


  /*---------------------------------------------------------
   AllowAutoUpgrade()
   ---------------------------------------------------------*/
  function AllowAutoUpgrade() {
    return FALSE;
  }


  /*---------------------------------------------------------
   GetDependencies()
   ---------------------------------------------------------*/
  function GetDependencies()
  {
    return array('CGExtensions'=>'1.17.9',
		 'FrontEndUsers'=>'1.6.9');
  }


  /*---------------------------------------------------------
   MinimumCMSVersion()
   ---------------------------------------------------------*/
  function MinimumCMSVersion()
  {
    return "1.6.7";
  }
	
	
  /*---------------------------------------------------------
   SetParameters()
   ---------------------------------------------------------*/
  function SetParameters()
  {
    $this->RegisterModulePlugin();
    $this->RestrictUnknownParams();
    
    $this->RegisterRoute('/[Uu]sers\/(?P<uid>[0-9]+)\/(?P<returnid>[0-9]+)\/(?P<detailtemplate>[A-Za-z0-9\-\_]+?)\/(?P<junk>.*?)$/',
			 array('action'=>'detail'));
    $this->RegisterRoute('/[Uu]sers\/(?P<uid>[0-9]+)\/(?P<returnid>[0-9]+)\/(?P<junk>.*?)$/',
			 array('action'=>'detail'));
    $this->RegisterRoute('/[Uu]sergroup\/(?P<gid>[0-9]+)\/(?P<returnid>[0-9]+)\/(?P<junk>.*?)$/',
			 array('action'=>'default'));
    $this->RegisterRoute('/[Uu]sers\/(?P<uid>[0-9]+)\/(?P<junk>.*?)$/',
			 array('action'=>'detail'));
    $this->RegisterRoute('/[Uu]sergroup\/(?P<gid>[0-9]+)\/(?P<junk>.*?)$/',
			 array('action'=>'default'));

    $this->CreateParameter('action','default',$this->Lang('help_param_action'));

    $this->CreateParameter('inline','',$this->Lang('help_param_inline'));
    $this->SetParameterType('inline',CLEAN_INT);

    $this->CreateParameter('group','',$this->Lang('help_param_group'));
    $this->SetParameterType('group',CLEAN_STRING);

    $this->CreateParameter('gid','',$this->Lang('help_param_gid'));
    $this->SetParameterType('gid',CLEAN_INT);

    $this->CreateParameter('showexpired',0,$this->Lang('help_param_showexpired'));
    $this->SetParameterType('showexpired',CLEAN_INT);

    $this->CreateParameter('sortby','username',$this->Lang('help_param_sortby'));
    $this->SetParameterType('sortby',CLEAN_STRING);
    $this->CreateParameter('bsortby','',$this->Lang('help_param_bsortby'));
    $this->SetParameterType('bsortby',CLEAN_STRING);

    $this->CreateParameter('sortorder','ASC',$this->Lang('help_param_sortorder'));
    $this->SetParameterType('sortorder',CLEAN_STRING);
    $this->CreateParameter('bsortorder','ASC',$this->Lang('help_param_bsortorder'));
    $this->SetParameterType('bsortorder',CLEAN_STRING);

    $this->CreateParameter('pagelimit',100,$this->Lang('help_param_pagelimit'));
    $this->SetParameterType('pagelimit',CLEAN_INT);

    $this->CreateParameter('prop','',$this->Lang('help_param_prop'));
    $this->SetParameterType('prop',CLEAN_STRING);

    $this->CreateParameter('propval','',$this->Lang('help_param_propval'));
    $this->SetParameterType('propval',CLEAN_STRING);

    $this->CreateParameter('uselike',0,$this->Lang('help_param_uselike'));
    $this->SetParameterType('uselike',CLEAN_INT);

    $this->CreateParameter('detailpage','',$this->Lang('help_param_detailpage'));
    $this->SetParameterType('detailpage',CLEAN_STRING);

    $this->CreateParameter('resultpage','',$this->Lang('help_param_resultpage'));
    $this->SetParameterType('resultpage',CLEAN_STRING);

    $this->CreateParameter('summarytemplate','',$this->Lang('help_param_summarytemplate'));
    $this->SetParameterType('summarytemplate',CLEAN_STRING);

    $this->CreateParameter('directorytemplate','',$this->Lang('help_param_directorytemplate'));
    $this->SetParameterType('directorytemplate',CLEAN_STRING);

    $this->CreateParameter('detailtemplate','',$this->Lang('help_param_detailtemplate'));
    $this->SetParameterType('detailtemplate',CLEAN_STRING);

    $this->CreateParameter('searchformtemplate','',$this->Lang('help_param_searchformtemplate'));
    $this->SetParameterType('searchformtemplate',CLEAN_STRING);

    $this->CreateParameter('browseproptemplate','',$this->Lang('help_param_browseproptemplate'));
    $this->SetParameterType('browseproptemplate',CLEAN_STRING);

    $this->CreateParameter('searchproperty','',$this->Lang('help_param_searchproperty'));
    $this->SetParameterType('searchproperty',CLEAN_STRING);

    $this->CreateParameter('uid','',$this->Lang('help_param_uid'));
    $this->SetParameterType('uid',CLEAN_INT);

    $this->CreateParameter('sparse','0',$this->Lang('help_param_sparse'));
    $this->SetParameterType('sparse',CLEAN_INT);

    $this->SetParameterType('pagenum',CLEAN_INT);
    $this->SetParameterType('origpage',CLEAN_INT);
    $this->SetParameterType('junk',CLEAN_STRING);

    $this->SetParameterType(CLEAN_REGEXP.'/ud_.*/',CLEAN_STRING);
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
   UninstallPreMessage()
   ---------------------------------------------------------*/
  function UninstallPreMessage()
  {
    return $this->Lang('ask_really_uninstall');
  }	


  /*---------------------------------------------------------
   CreatePropertySummaryURL()
   ---------------------------------------------------------*/
  function CreatePropertySummaryURL($id,$returnid,$propname,$propvalue,$params = array(),$inline = false)
  {
	$params['prop'] = $propname;
	$params['propval'] = $propvalue;
	unset($params['action']);

	return $this->CreateURL($id,'default',$returnid,$params,$inline);
  }

  /*---------------------------------------------------------
   _smarty_getpropertysummary_url
   ---------------------------------------------------------*/
  function _smarty_getpropertysummary_url($params,&$smarty)
  {
    global $gCms;
    
    $inline = 0;
    $prop = '';
    $propvalue = '';
    $assign = '';
    $returnid = $gCms->variables['page_id'];
    $parms = array();
    
    if( !isset($params['prop']) ) return;
    if( !isset($params['propval']) ) return;
    foreach( $params as $key => $value )
      {
	switch( $key )
	  {
	  case 'prop':
	    $prop = $value;
	    break;

	  case 'propval':
	    $propval = $value;
	    break;

	  case 'assign':
	    $assign = $value;
	    break;

	  case 'resultpage':
	    $tmp = $this->resolve_alias_or_id($value);
	    if( $tmp  )
	      {
		$returnid = $tmp;
	      }
	    break;
	    
	  case 'inline':
	    if( $value )
	      {
		$inline = 1;
	      }
	    break;

	  default:
	    $parms[$key] = $value;
	    break;
	  }
      }

    $tmp = explode(',',$propval);
    $data = '';
    if( count($tmp) > 1 )
      {
	$parms['uselike'] = 1;
	$data = array();
	foreach( $tmp as $one )
	  {
	    $one = '%'.$one.'%';
	    $data[] = $this->CreatePropertySummaryURL('m1',$returnid,$prop,$one,$parms,$inline);
	  }
      }
    else
      {
	$data = $this->CreatePropertySummaryURL('m1',$returnid,$prop,$propval,$parms,$inline);
      }
    if( $assign != '' )
      {
	$smarty->assign($assign,$data);
	return;
      }
    return $data;
  }
} // class

?>
