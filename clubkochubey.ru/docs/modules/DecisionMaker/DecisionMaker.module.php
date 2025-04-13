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

$cgextensions = cms_join_path($gCms->config['root_path'],'modules',
			      'CGExtensions','CGExtensions.module.php');
if( !is_readable( $cgextensions ) )
{
  echo '<h1><font color="red">ERROR: The CGExtensions module could not be found.</font></h1>';
  return;
}
require_once($cgextensions);

class DecisionMaker extends CGExtensions
{
  /*---------------------------------------------------------
   Constructor
   ---------------------------------------------------------*/
  function __construct()
  {
    parent::__construct();
    $this->RegisterContentType('CGDecisionTree',
			       dirname(__FILE__).'/contenttype.decisiontree.php',
			       $this->Lang('decision_tree_page'));
    $this->RegisterContentType('CGDecisionNode',
			       dirname(__FILE__).'/contenttype.decisionnode.php',
			       $this->Lang('decision_node_page'));
    $this->RegisterContentType('CGDecisionList',
			       dirname(__FILE__).'/contenttype.decisionlist.php',
			       $this->Lang('decision_list_page'));

    global $gCms;
    $smarty =& $gCms->GetSmarty();
    $smarty->register_function('decisionmaker_set',
			       array($this,'_smarty_decisionmaker_set'));
    $smarty->register_function('decisionmaker_add',
			       array($this,'_smarty_decisionmaker_add'));
    $smarty->register_function('decisionmaker_get',
			       array($this,'_smarty_decisionmaker_get'));
    $smarty->register_function('decisionmaker_list',
			       array($this,'_smarty_decisionmaker_list'));
    $smarty->register_function('decisionmaker_reset',
			       array($this,'_smarty_decisionmaker_reset'));


  }


  /*---------------------------------------------------------
   GetName()
   ---------------------------------------------------------*/
  function GetName()
  {
    return 'DecisionMaker';
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
    return '1.0.1';
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
   GetDependencies()
   ---------------------------------------------------------*/
  function GetDependencies()
  {
    return array();
  }


  /*---------------------------------------------------------
   MinimumCMSVersion()
   ---------------------------------------------------------*/
  function MinimumCMSVersion()
  {
    return "1.8.1";
  }
	
	
  /*---------------------------------------------------------
   SetParameters()
   ---------------------------------------------------------*/
  function SetParameters()
  {
    $this->RestrictUnknownParams();
    $this->SetParameterType('questiontype',CLEAN_STRING);
    $this->SetParameterType('choice',CLEAN_STRING);
    $this->SetParameterType('next',CLEAN_STRING);
    $this->SetParameterType('prev',CLEAN_STRING);
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
    return $this->Lang('really_uninstall');
  }	


  /*---------------------------------------------------------
   HasContentType()
   ---------------------------------------------------------*/
  function HasContentType()
  {
    return TRUE;
  }	

  /*---------------------------------------------------------
   display_decision_form()
   ---------------------------------------------------------*/
  function display_decision_form($type,$returnid,$choices,$template,$question)
  {
    // give everything to smarty
    global $gCms;
    $smarty =& $gCms->GetSmarty();

    $id = 'cntnt01'; // force non inline.
    if( $question )
      {
	$smarty->assign('question',$question);
      }

    if( isset($_SESSION['decisiontree_error']) )
      {
	$smarty->assign('error',$_SESSION['decisiontree_error']);
	unset($_SESSION['decisiontree_error']);
      }
    $parms['questiontype'] = $type;
    $smarty->assign('actionid',$id);
    $smarty->assign('mod',$this);
    $smarty->assign('choices',$choices);
    $smarty->assign('formstart',$this->CGCreateFormStart($id,'default',$returnid,$parms));
    $smarty->assign('formend',$this->CreateFormEnd());

    return $this->ProcessTemplateFromData($template);
  }	


  /*---------------------------------------------------------
   do_question_scoring()
   ---------------------------------------------------------*/
  function do_question_scoring(&$content_obj,$choice)
  {
    global $gCms;
    $smarty =& $gCms->GetSmarty();

    $smarty->assign('answer',$choice);
    $smarty->assign('question',$content_obj->Alias());

    $tmpl = $content_obj->GetPropertyValue('formhandler');
    $txt = '';
    if( $tmpl )
      {
	$txt = $this->ProcessTemplateFromData($tmpl);
      }

    return $txt;
  }
  
  /*---------------------------------------------------------
   _smarty_decisionmaker_set()
   ---------------------------------------------------------*/
  function _smarty_decisionmaker_set($params,&$smarty)
  {
    if( !isset($params['var']) || !isset($params['val']) )
      return;

    if( !isset($_SESSION['decisionmaker']) )
      {
	$_SESSION['decisionmaker'] = array();
      }

    $key = trim($params['var']);
    $val = $params['val'];
    $_SESSION['decisionmaker'][$key] = $val;
  }


  /*---------------------------------------------------------
   _smarty_decisionmaker_get()
   ---------------------------------------------------------*/
  function _smarty_decisionmaker_get($params,&$smarty)
  {
    if( !isset($params['var']) )
      return;

    $key = trim($params['var']);
    if( !isset($_SESSION['decisionmaker']) ||
	!isset($_SESSION['decisionmaker'][$key]) )
      {
	return;
      }

    $val = $_SESSION['decisionmaker'][$key];
    if( isset($params['assign']) )
      {
	$smarty->assign($params['assign'],$val);
	return;
      }
    return $val;
  }


  /*---------------------------------------------------------
   _smarty_decisionmaker_add()
   ---------------------------------------------------------*/
  function _smarty_decisionmaker_add($params,&$smarty)
  {
    if( !isset($params['var']) || !isset($params['val']) )
      return;

    $key = trim($params['var']);
    if( !isset($_SESSION['decisionmaker']) )
      {
	$_SESSION['decisionmaker'] = array();
      }

    $val = 0;
    if( isset($_SESSION['decisionmaker'][$key]) )
      {
	$val = $_SESSION['decisionmaker'][$key];
      }

    $val += $params['val'];
    $_SESSION['decisionmaker'][$key] = $val;
    return $val;
  }

  
  /*---------------------------------------------------------
   _smarty_decisionmaker_list()
   ---------------------------------------------------------*/
  function _smarty_decisionmaker_list($params,&$smarty)
  {
    if( !isset($_SESSION['decisionmaker']) )
      {
	return;
      }

    $data = $_SESSION['decisionmaker'];
    if( isset($params['assign']) )
      {
	$smarty->assign($params['assign'],$data);
	return;
      }
    return $data;
  }


  /*---------------------------------------------------------
   _smarty_decisionmaker_reset()
   ---------------------------------------------------------*/
  function _smarty_decisionmaker_reset($params,&$smarty)
  {
    if( !isset($_SESSION['decisionmaker']) )
      {
	return;
      }

    unset($_SESSION['decisionmaker']);
  }

} // class

?>
