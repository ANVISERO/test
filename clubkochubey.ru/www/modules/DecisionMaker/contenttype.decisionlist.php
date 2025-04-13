<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: DecisionMaker (c) 2009 by Robert Campbell 
#         (calguy1000@cmsmadesimple.org)
#  An addon module for CMS Made Simple to allow creation of interactive
#  decision trees.
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
require_once($fn);

class CGDecisionList extends CGDecisionTreeBase
{
  function CGDecisionList()
  {
    parent::CGDecisionTreeBase();
  }

  function IsViewable()
  {
    return TRUE;
  }

  function FriendlyName()
  {
    $mod =& $this->get_mod();
    return $mod->Lang('friendlyname_decisionlist');
  }


  function SetProperties()
  {
    parent::SetProperties();
    $this->RemoveProperty('question',0);
  }


  function Show($param)
  {
    // find out where we're at
    global $gCms;
    $mod =& $this->get_mod();
    $hm =& $gCms->GetHierarchyManager();
    $child_content = '';

    // get the first child that is a decision node
    $this_node = $hm->sureGetNodeById($this->Id());
    $children =& $this_node->getChildren();
    foreach( $children as $onechild )
      {
	$child_content =& $onechild->getContent();
	if( $child_content->Type() == 'cgdecisionnode' )
	  {
	    $mod->redirectContent($child_content->Id());
	    break;
	  }
      }
  }
} // class

#
# EOF
#
?>