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

$fn = dirname(__FILE__).'/contenttype.decisiontreebase.php';
include_once($fn);

class CGDecisionTree extends CGDecisionTreeBase
{
  function FriendlyName()
  {
    $mod =& $this->get_mod();
    return $mod->Lang('friendlyname_decisiontree');
  }


  function SetProperties()
  {
    parent::SetProperties();
    $this->AddContentProperty('form_template',10);
  }


  function FillParams($params)
  {
    if( !isset($params) ) return;

    $parameters = array('form_template');
    foreach($parameters as $oneparam)
      {
	if( isset($params[$oneparam]) )
	  {
	    $this->SetPropertyValue($oneparam, $params[$oneparam]);
	  }
      }

    parent::FillParams($params);
  }


  function display_single_element($one,$adding)
  {
    global $gCms;
    $mod =& $this->get_mod();

    switch($one)
      {
      case 'form_template':
	{
	  $val = $this->GetPropertyValue('form_template');
	  if( empty($val) && $adding )
	    {
	      $val = $mod->GetPreference('form_template');
	    }
	  return array($mod->Lang('form_template').':',
		       create_textarea(false,$val,'form_template','pagesmalltextarea','','','80','6'));
	}
	break;

      default:
	return parent::display_single_element($one,$adding);
      }
  }


  function Show($param)
  {
    $txt = parent::Show($param);
    if( $param != 'content_en' && $param != 'content' ) 
      {
	// must be displaying some other block.
	return $txt;
      }


    global $gCms;
    $hm =& $gCms->GetHierarchyManager();

    $list = array();
    $node =& $hm->sureGetNodeById($this->Id());
    $children =& $node->getChildren();
    for( $i = 0; $i < count($children); $i++ )
      {
	$obj =& $children[$i]->getContent();
        if( $obj ) {
	  if( startswith($obj->Type(),'cgdecision') || $obj->ShowInMenu())
	    {
	      $list[$obj->ID()] = $obj->Name();
	    }
	}
      }

    if( count($list) )
      {
	$question = $this->GetPropertyValue('question',$this->Name());
	$mod =& $this->get_mod();
	$template = $this->GetPropertyValue('form_template');
	if( empty($template) )
	  {
	    $template = $mod->GetPreference('form_template');
	  }
	$txt .= $mod->display_decision_form('tree',$node->getTag(),$list,$template,$question);
      }

    return $txt;
  }
} // end of class

#
# EOF
#
?>
