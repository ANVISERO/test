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

class CGDecisionNode extends CGDecisionTreeBase
{
  function FriendlyName()
  {
    $mod =& $this->get_mod();
    return $mod->Lang('friendlyname_decisionnode');
  }


  function SetProperties()
  {
    parent::SetProperties();
    $this->AddContentProperty('options',10,1);
    $this->AddContentProperty('form_template',10);
  }


  function FillParams($params)
  {
    global $gCms;
    $config =& $gCms->GetConfig();

    if( !isset($params) ) return;

    $parameters = array('options','form_template');
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

    // make sure parent is a DecisionList
    $mod =& $this->get_mod();
    global $gCms;
    $hm =& $gCms->GetHierarchyManager();
    $parent_node =& $hm->sureGetNodeByID($this->ParentID());
    if( $parent_node )
      {
	$parent_content =& $parent_node->getContent();
	$tmp = $parent_content->Type();
	if( $tmp != 'cgdecisionlist' )
	  {
	    $errors[] = $mod->Lang('error_invalid_parent');
	  }
      }
    else
      {
	$errors[] = $mod->Lang('error_invalid_parent');
      }

    // make sure options are valid
    $tmp = $this->GetPropertyValue('options');
    if( empty($tmp) )
      {
	$errors[] = $mod->Lang('error_nooptions');
      }
    else
      {
	$optlines = explode("\n",$tmp);
	foreach( $optlines as $oneline )
	  {
	    $oneline = trim($oneline);
	    if( empty($oneline) ) continue;
	    $opt = explode('|',$oneline,3);
	    if( count($opt) > 2 )
	      {
		$errors[] = $mod->Lang('error_badoptions');
		break;
	      }
	  }
      }

    return (count($errors) > 0?$errors:FALSE);
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

      case 'options':
	{
	  $txt = $this->GetPropertyValue('options','');
	  $field = create_textarea(false,$txt,'options','pagesmalltextarea','options','','',80,6);
	  $field .= '<br/>'.$mod->Lang('info_options');
	  return array($mod->Lang('prompt_options').':',$field);
	}
	break;

      default:
	return parent::display_single_element($one,$adding);
      }
  }


  function Show($param)
  {
    if( $param != 'content_en' && $param != 'content' ) 
      {
	// must be displaying some other block.
	return parent::Show($param);
      }


    // build the form data.
    $mod =& $this->get_mod();
    $template = $this->GetPropertyValue('form_template');
    if( empty($template) )
      {
	$template = $mod->GetPreference('form_template');
      }
    $question = $this->GetPropertyValue('question',$this->Name());
    $tmp = $this->GetPropertyValue('options');
    $tmp2 = explode("\n",$tmp);
    $list = array();
    foreach( $tmp2 as $one )
      {
	$one = trim($one); 
	if( empty($one) ) continue;
	$opt = explode('|',$one,2);
	if( count($opt) == 1 )
	  {
	    $list[$opt[0]] = $opt[0];
	  }
	else
	  {
	    $list[$opt[1]] = $opt[0];
	  }
      }

    $txt = $mod->display_decision_form('list',$this->Id(),$list,$template,$question);
    return $txt;
  }

  function getQuestion()
  {
    $question = array();
    $question['prompt'] = $this->GetPropertyValue('question');

    $question['choices'] = array();
    $tmp = $this->GetPropertyValue('options');
    $tmp2 = explode("\n",$tmp);
    foreach( $tmp2 as $one )
      {
	$opt = explode('|',trim($one));
	$question['choices'][$opt[1]] = $opt[0];
      }

    return $question;
  }
} // class

#
# EOF
#
?>