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
if( !isset($gCms) ) exit;

#
# Initialization
#
$feu =& $this->GetModuleInstance('FrontEndUsers');
if( !$feu ) return;
$inline = 0;
$resultpage = $returnid;
$thetemplate = $this->GetPreference(CGUSERDIR_PREF_DFLTSEARCHFORM_NAME);
$property='';
$property2='';


#
# Get parameters
#
if( isset($params['inline']) && $params['inline'] != 0 )
  {
    $inline = 1;
    unset($params['inline']);
  }
if( isset($params['resultpage']) )
  {
    $tmp = $this->resolve_alias_or_id($params['resultpage']);
    if( $tmp )
      {
	$resultpage = $tmp;
	$inline = 0;
      }
    unset($params['resultpage']);
  }
if( isset($params['searchformtemplate']) )
  {
    $thetemplate = trim($params['searchformtemplate']);
    unset($params['searchformtemplate']);
  }
if( isset($params['searchproperty']) )
  {
    $property = trim($params['searchproperty']);
  }


// get the property definition
if( !empty($property) )
  {
    $searchprops = array();
    $properties = explode(',',$property);
    foreach( $properties as $oneproperty )
      {
	$defn = $feu->GetPropertyDefn($oneproperty);
	
	// figure out what type of field it'll be
	$fieldtype = '';
	if( $defn )
	  {
	    $options = '';
	    switch( $defn['type'] )
	      {
	      case '0': // text
	      case '2': // email
		$fieldtype = 'text';
		break;
		
	      case '4': // dropdown
	      case '5': // multiselect
	      case '7': // radiobuttons
		$fieldtype = 'select';
		$tmp = $feu->GetSelectOptions($defn['name'],1);
		$options = array();
		$options[-1] = $this->Lang('any');
		foreach( $tmp as $key => $value )
		  {
		    $options[$value] = $key;
		  }
		break;
		
	      case '1': // checkbox
	      case '3': // textarea
	      case '6': // image
	      case '8': // date
		// get the options
		break;
	      }
	  }
	
	if( !empty($fieldtype) )
	  {
	    $tmp = array();
	    $tmp['fielddefn'] = $defn;
	    $tmp['fieldtype'] = $fieldtype;
	    if( !empty($options) )
	      {
		$tmp['options'] = $options;
	      }
	    $searchprops[$oneproperty] = $tmp;
	  }
      }

    if( !empty($searchprops) )
      {
	$smarty->assign('searchprops',$searchprops);
      }
  }

$smarty->assign('ud_origpage',$returnid);
$smarty->assign('formstart',$this->CGCreateFormStart($id,'do_search',$resultpage,$params,$inline));
$smarty->assign('formend',$this->CreateFormEnd());

#
# Process the template
#
echo $this->ProcessTemplateFromDatabase('searchform_'.$thetemplate);


#
# EOF
#
?>