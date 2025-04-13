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
$gCms = cmsms();
$fn = cms_join_path($gCms->config['root_path'],'lib','classes',
		    'contenttypes','Content.inc.php');
include_once($fn);

class CGDecisionTreeBase extends Content
{
  var $_mod;

  function CGDecisionTreeBase()
  {
    parent::Content();
  }

  function &get_mod()
  {
    if( is_null($this->_mod) )
      {
	global $gCms;
	$this->_mod =& $gCms->modules['DecisionMaker']['object'];
      }
    return $this->_mod;
  }

  function ModuleName()
  {
    return 'DecisionMaker';
  }

  function IsDefaultPossible()
  {
    return FALSE;
  }

  function SetProperties()
  {
    parent::SetProperties();
    $this->RemoveProperty('cachable',0);
    $this->RemoveProperty('showinmenu',1);
    $this->RemoveProperty('searchable',0);
    $this->AddContentProperty('question',8,1);
    $this->AddContentProperty('formhandler',9);

    // turn on preview
    $this->mPreview = true;

    // turn off caching
    $this->mCachable = false;
  }


  function FillParams($params)
  {
    global $gCms;
    $config =& $gCms->GetConfig();

    if( !isset($params) ) return;

    $parameters = array('question','formhandler');
    foreach($parameters as $oneparam)
      {
	if( isset($params[$oneparam]) )
	  {
	    $this->SetPropertyValue($oneparam, $params[$oneparam]);
	  }
      }
    parent::FillParams($params);
  }


  function ValidateData()
  {
    $errors = parent::ValidateData();
    if( $errors === FALSE )
      {
	$errors = array();
      }

    // make sure that we set the showinmenu flag to off
    // for nodes that have a decisionmaker parent.
    // and that searchable is always off.
//    $this->SetShowInMenu(true);
//    $this->SetPropertyValue('searchable',0);
    $parent_id = $this->ParentId();
    if( $parent_id != -1 )
      {
	global $gCms;
	$hm =& $gCms->GetHierarchyManager();
	$node = $hm->sureGetNodeById($parent_id);
	if( $node )
	  {
	    $content =& $node->getContent();
	    if( $content && startswith($content->Type(),'cgdecision') )
	      {
		$this->SetShowInMenu(false);
		$this->SetPropertyValue('searchable',0);
	      }
	  }
      }

    // always make sure that this node is not cachable.
    $this->SetCachable(false);

    return (count($errors) > 0?$errors:FALSE);
  }

  
  function display_single_element($one,$adding)
  {
    global $gCms;
    $mod =& $this->get_mod();

    switch($one)
      {
      case 'formhandler':
	{
	  $txt = $this->GetPropertyValue('formhandler','');
	  if( empty($txt) && $adding )
	    {
	      $txt = $mod->GetPreference('formhandler_template');
	    }
	  $field = create_textarea(false,$txt,'formhandler','pagesmalltextarea','formhandler','','',80,6);
	  $field .= '<br/>'.$mod->Lang('info_formhandler');
	  return array($mod->Lang('prompt_formhandler').':',$field);
	}
	break;

      case 'question':
	{
	  $txt = $this->GetPropertyValue('question','');
	  $field = create_textarea(true,$txt,'question','pagesmalltextarea','question','','',80,6);
	  $field .= '<br/>'.$mod->Lang('info_question');
	  return array($mod->Lang('prompt_question').':',$field);
	}
	break;

      default:
	return parent::display_single_element($one,$adding);
      }
  }
}

#
# EOF
#
?>