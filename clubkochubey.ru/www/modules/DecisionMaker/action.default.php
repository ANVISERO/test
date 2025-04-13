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

$hm =& $gCms->GetHierarchyManager();
$this_node =& $hm->sureGetNodeByID($returnid);
$parent_node = $this_node->getParent();
$this_obj =& $this_node->getContent();

if( isset($params['next']) )
  {
    if( !isset($params['choice']) )
      {
	$_SESSION['decisiontree_error'] = $this->Lang('error_noselection');
	$this->RedirectContent($returnid);
      }

    $this->do_question_scoring($this_obj,$params['choice']);

    switch($params['questiontype'])
      {
      case 'list':
	// get the next decisionnode sibling where the order is greater than this.
	// and redirect there.
	$children =& $parent_node->getChildren();
	foreach( $children as $child_node )
	  {
	    $child =& $child_node->getContent();
	    if( $child->Type() == 'cgdecisionnode' && $child->ItemOrder() > $this_obj->ItemOrder() )
	      {
		$this->RedirectContent($child->Id());
	      }
	  }

	// at the end of the list of questions... what do we do.
	// redirect to the first content node in the list of children.
	foreach( $children as $child_node )
	  {
	    $child =& $child_node->getContent();
	    if( $child->Type() == 'content' )
	      {
		$this->RedirectContent($child->Id());
	      }
	  }

	// no content nodes in the list of children...
	// try try the parent
	$parent_node =& $parent_node->getParent();
	$parent_obj =& $parent_node->getContent();
	if( startswith($parent_obj->Type(),'cgdecision') )
	  {
	    $children =& $parent_node->getChildren();
	    foreach( $children as $child_node )
	      {
		$child =& $child_node->getContent();
		if( $child->Type() == 'content' )
		  {
		    $this->RedirectContent($child->Id());
		  }
	      }
	  }

	// still no parent content page.. redirect to default page.
	$dflt_id = ContentOperations::GetDefaultContent();
	$this->RedirectContent($dflt_id);
	break;

      case 'tree':
      default:
	if( isset($params['choice']) )
	  {
	    $this->RedirectContent($params['choice']);
	  }
	break;
      }
  }
else if( isset($params['prev']) )
  {
    switch( $params['questiontype'] )
      {
      case 'list':
	// get the next decisionnode sibling where the order is less than this.
	// and redirect there.
	$children =& $parent_node->getChildren();
	foreach( $children as $child_node )
	  {
	    $child =& $child_node->getContent();
	    if( $child->Type() == 'cgdecisionnode' && $child->ItemOrder() < $this_obj->ItemOrder() )
	      {
		$this->RedirectContent($child->Id());
	      }
	  }

	$parent_obj =& $parent_node->GetContent();
	if( startswith($parent_obj->Type(),'cgdecision') )
	  {
	    if( $parent_obj->Type() == 'cgdecisionlist' )
	      {
		// go up one more.
		$parent_node =& $parent_node->getParent();
		if( $parent_node )
		  {
		    $parent_obj =& $parent_node->GetContent();
		  }
	      }
	  }
	if($parent_obj)
	  {
	    $this->RedirectContent($parent_obj->Id());
	  }

	die('NO FURTHER BACK PARENT TYPE = '.$parent_obj->Type());
	// can't go further back.
	$_SESSION['decisiontree_error'] = $this->Lang('error_startdecision');
	$this->RedirectContent($returnid);
	break;

      case 'tree':
      default:
	// redirect to parent, ro default page.
	if( $parent_node )
	  {
	    $this->RedirectContent($parent_node->getTag());
	  }
	else
	  {
	    $parent_id = ContentOperations::GetDefaultContent();
	    $this->RedirectContent($parent_id);
	  }
	break;
      }
  }


#
# EOF
#
?>