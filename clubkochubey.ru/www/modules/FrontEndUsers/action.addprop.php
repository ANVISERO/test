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

// check permissions again
if( !$this->_HasSufficientPermissions( 'addprop' ) )
  {
    $this->_DisplayErrorPage($id, $params, $returnid,
			     $this->Lang('accessdenied'));
    return;
  }

#
# Initialization
#
$fieldtypes = $this->langifyKeys($this->types);
$title = $this->Lang('addprop');
$defn = array();
$defn['name'] = '';
$defn['prompt'] = '';
$defn['type'] = 0;
$defn['length'] = 80;
$defn['maxlength'] = 255;
$defn['attribs'] = '';
$attribs = array();
$seloptions = '';
$status = '';
$message = '';
$propname = '';


#
# Read Parameters
#
if( isset($params['cancel']) )
  {
    $this->myRedirectToTab($id, 'properties' );
    return;
  }
if( isset($params['propname']) )
  {
    $propname = trim($params['propname']);
    $title = $this->Lang('editprop',$propname);
    $defn = $this->GetPropertyDefn($propname);
    if( $defn == FALSE )
      {
	$parms = array();
	$parms['error'] = 1;
	$parms['mesage'] = $this->Lang('error_propnotfound');
	$this->myRedirectToTab($id,'properties',$parms);
	return;
      }
    $tmp = $this->GetSelectOptions($propname);
    if( $tmp )
      {
	foreach( $tmp as $key => $val )
	  {
	    if( $key == $val )
	      {
		$seloptions .= "$val\n";
	      }
	    else
	      {
		$seloptions .= "$key=$val\n";
	      }
	  }
      }
    if( isset($defn['attribs']) && !empty($defn['attribs']) )
      {
	$attribs = unserialize($defn['attribs']);
      }
  }

if( isset($params['input_type']) )
  {
    $defn['type'] = (int)$params['input_type'];
  }
if( isset($params['input_length']) )
  {
    $defn['length'] = (int)$params['input_length'];
  }
if( isset($params['input_maxlength']) )
  {
    $defn['maxlength'] = (int)$params['input_maxlength'];
  }
if( isset($params['input_name']) )
  {
    $defn['name'] = strtolower(trim($params['input_name']));
    $defn['name'] = munge_string_to_url($defn['name']);
    $defn['name'] = str_replace('-','_',$defn['name']);
  }
if( isset($params['input_prompt']) )
  {
    $defn['prompt'] = trim($params['input_prompt']);
  }
if( isset($params['input_seloptions']) )
  {
    $seloptions = $params['input_seloptions'];
  }
if (isset($params['input_radiooptions']))
  {
   $seloptions = $params['input_radiooptions'];
  }
foreach( $params as $key => $value )
{
  if( startswith($key,'input_attrib_') )
    {
      $attrib = substr($key,13);
      $attribs[$attrib] = $value;
    }
}
if( isset($params['submit']) )
  {
    if( empty($defn['name']) || empty($defn['prompt']) )
      {
	$status = 'error';
	$message = $this->Lang('error_invalidparams');
      }

    if( empty($status) && $seloptions )
      {
	$options = array();
	$tmp = explode("\n", $seloptions);
	foreach( $tmp as $one )
	  {
	    $one = trim($one);
	    if( !empty($one) )
	      {
		$options[] = $one;
	      }
	  }
      }

    if( empty($status) )
      {
	switch($defn['type'])
	  {
	  case '0': /* text */
	  case '2': /* email */
	  case '6': /* image */
	    break; 
	  case 1:   /* checkbox */
	    $defn['length'] = 1;
	    break;
	  case 3:   /* textarea */
	    $defn['length'] = 255;
	    break;
	  case 4:
	  case 5: 
	    $defn['length'] = count($options);
	    break;
	  case 7: /* radiobuttons */
	    $defn['length'] = count($options);
	    break;
	  case 8: /* date */
	  default:
	    $defn['length'] = 1;
	    break;
	  }

	if( (($defn['type'] == 0 || $defn['type'] == 2) && ( $defn['length'] < 1 || $defn['length'] > 255 || $defn['maxlength'] < 1 || $defn['maxlength'] > 1024 || $defn['maxlength'] < $defn['length'] )) ||
	    (($defn['type'] == 4 || $defn['type'] == 5 || $defn['type'] == 7) && $seloptions == '' ) ||
	    (($defn['type'] == 6) && ($defn['length'] < 10 || $defn['length'] > 1024))
	    ){
	  $status = 'error';
	  $message = $this->Lang('error_invalidparams');
	}
      }

    if( empty($status) && $options )
      {
	if( !empty($propname) )
	  {
	    $this->DeleteSelectOptions($propname);
	  }

	$tmp = $this->AddSelectOptions($defn['name'],$options);
	if( !$tmp[0] )
	  {
	    $status = 'error';
	    $message = $tmp[1];
	  }
      }

    if( empty($status) )
      {
	$defn['attribs'] = serialize($attribs);
      }

    if( empty($status) )
      {
	if( !empty($propname) )
	  {
	    $tmp = $this->SetPropertyDefn( $propname, $defn['name'], $defn['prompt'], $defn['type'], $defn['length'], $defn['maxlength'], $defn['attribs'] );
	  }
	else
	  {
	    // New property
	    $tmp = $this->AddPropertyDefn( $defn['name'], $defn['prompt'], $defn['type'], $defn['length'], $defn['maxlength'], $defn['attribs'] );
	    if( !$tmp[0] )
	      {
		$status = 'error';
		$message = $tmp[1];
	      }
	  }
      }

    if( empty($status) )
      {
	$this->myRedirectToTab( $id, 'properties' );
      }

    //
    // if we get here, it's an error of some sort
    //
  }

#
# Give eveyrthing to smarty
#
if( !empty($status) )
  {
    $smarty->assign('error',1);
  }
if( !empty($message) )
  {
    $smarty->assign('message',$message);
  }
$smarty->assign('startform',$this->CreateFormStart($id,'addprop',$returnid,'post','',false,'',$params));
$smarty->assign('endform',$this->CreateFormEnd());
$smarty->assign('title',$title);
$smarty->assign('prompt_name',$this->Lang('name'));
$smarty->assign('info_name',$this->Lang('info_name'));
$smarty->assign('input_name',
		$this->CreateInputText($id,'input_name',$defn['name'], 30, 30 ));
$smarty->assign('prompt_prompt',$this->Lang('prompt'));
$smarty->assign('input_prompt',
		$this->CreateInputText($id,'input_prompt',$defn['prompt'], 80, 255 ));
$smarty->assign('prompt_type',$this->Lang('type'));
$smarty->assign('input_type',  
		$this->CreateInputDropdown( $id, 'input_type', $fieldtypes, -1, $defn['type'],
					    'onchange="this.form.submit();"'));
$smarty->assign('orig_type',  
		$this->CreateInputHidden($id, 'orig_type', $defn['type']));
$smarty->assign ('submit',
		 $this->CreateInputSubmit ($id, 'submit', $this->Lang('submit') ));
$smarty->assign ('cancel',
		 $this->CreateInputSubmit ($id, 'cancel',$this->Lang('cancel')));
$flds = array();
switch( $defn['type'] )
  {
  case 0:
  case 2:
    $flds[] = array($this->Lang('length').$this->Lang('lengthcomment'),
		    $this->CreateInputText($id,'input_length',$defn['length'],3,3));
    $flds[] = array($this->Lang('maxlength'),
		    $this->CreateInputText($id,'input_maxlength',$defn['maxlength'],3,3));
    break;
  case 3:
    $val = (isset($attribs['wysiwyg']))?$attribs['wysiwyg']:0;
    $flds[] = array($this->Lang('prop_textarea_wysiwyg'),
		    $this->CreateInputHidden($id,'input_attrib_wysiwyg','0').
		    $this->CreateInputCheckbox($id,'input_attrib_wysiwyg','1',$val));;
    break;
  case 4:
  case 5:
    $flds[] = array($this->Lang('seloptions'),
		    $this->CreateTextArea(false,$id,$seloptions,'input_seloptions'));
    break;
  case 6:
    $flds[] = array($this->Lang('length').$this->Lang('lengthcomment'),
		    $this->CreateInputText($id,'input_length',$defn['length'],3,3));
    //$flds[] = array($this->Lang('size').'&nbsp;'.$this->Lang('sizecomment'),
    //$this->CreateInputText($id,'input_length',$defn['length'],3,3));
    break;
  case 7: 
    $flds[] = array($this->Lang('radiooptions'),
		    $this->CreateTextArea(false,$id,$seloptions,'input_radiooptions'));
    break;
  case 8: /* date */
    $flds[] = array($this->Lang('start_year').':',
		   $this->CreateInputText($id,'input_attrib_startyear',
					  (isset($attribs['startyear']))?$attribs['startyear']:'-5',
					  4,4));
    $flds[] = array($this->Lang('end_year').':',
		    $this->CreateInputText($id,'input_attrib_endyear',
					   (isset($attribs['endyear']))?$attribs['endyear']:'+10',
					   4,4));
    break;
  }
$smarty->assign('fields',$flds);

echo $this->ProcessTemplate('addprop.tpl');
return;


?>