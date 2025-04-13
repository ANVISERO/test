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
$thetemplate = 'directory_'.$this->GetPreference(CGUSERDIR_PREF_DFLTDIRECTORY_NAME);
$field = 'username';
$prop = '';
$sparse = 0;
$showexpired = 0;

#
# Handle Params
#
if( isset($params['directorytemplate']) )
  {
    $thetemplate = 'directory_'.trim($params['directorytemplate']);
  }
if( isset($params['prop']) )
  {
    $field = '__property__';
    $prop = trim($params['prop']);
  }
if( isset($params['sparse']) )
  {
    $sparse = (int)$params['sparse'];
  }
if( isset($params['showexpired'] ) )
  {
    $showexpired = (int)$params['showexpired'];
  }

#
# Get the data
#
$thedate = $db->DbTimeStamp(time());
if( $showexpired )
  {
    $thedate = $db->DbTimeStamp(1);
  }
$chararray = array();
if( $field == '__property__' )
  {
    // get list of letters
    $query = "SELECT distinct left(p.data, 1) AS first_char 
                FROM ".cms_db_prefix()."module_feusers_properties p
               INNER JOIN ".cms_db_prefix()."module_feusers_users u
               WHERE u.id = p.userid 
                 AND p.title = ?
                 AND u.expires > $thedate
               ORDER BY left(p.data,1)";
    $tmp = $db->GetArray($query,array($prop));
    foreach( $tmp as $one )
      {
	$t2 = strtoupper(trim($one['first_char']));
	if( empty($t2) ) continue;

	$parms = $params;
	$parms['uselike']=1;
	$parms['prop']=$prop;
	$parms['propval']="{$t2}%";
	$t3 = array($t2,$this->CreateURL($id,'default',$returnid,$parms));
	$chararray[] = $t3;
      }
  }
else
  {
    $query = 'SELECT DISTINCT left(username,1) AS first_char
                FROM '.cms_db_prefix()."module_feusers_users
               WHERE expires > $thedate
               ORDER BY left(username,1)";
    $tmp = $db->GetArray($query);
    foreach( $tmp as $one )
      {
	$t2 = strtoupper(trim($one['first_char']));
	if( empty($t2) ) continue;

	$parms = $params;
	$parms['uselike']=1;
	$parms['prop']='__username__';
	$parms['propval']="{$t2}%";
	$t3 = array($t2,$this->CreateURL($id,'default',$returnid,$parms));
	$chararray[] = $t3;
      }
  }

if( !$sparse )
  {
    $letters = array();
    $letters[] = ord('#');
    for( $i = ord('A'); $i <= ord('Z'); $i++ ) $letters[] = $i;
    $tmp = array();
    foreach( $letters as $i )
      {
	$t2 = array();
	$t2[] = chr($i);
	if( $i == ord('#') )
	  {
	    foreach( $chararray as $one )
	      {
		if( $one[0] >= '0' && $one[0] <= '9' )
		  {
		    $t2[] = $one[1];
		  }
	      }
	    $tmp[] = $t2;
	    continue;
	  }

	foreach( $chararray as $one )
	  {
	    if( $one[0] == chr($i) )
	      {
		$t2[] = $one[1];
		break;
	      }
	  }
	$tmp[] = $t2;
      }
    $chararray = $tmp;
  }

$smarty->assign('chararray',$chararray);
echo $this->ProcessTemplateFromDatabase($thetemplate);


#
# EOF
#
?>
