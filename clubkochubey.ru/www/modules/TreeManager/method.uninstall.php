<?php
#-------------------------------------------------------------------------
# Tree Manager - a helpful nested trees
# http://dev.cmsmadesimple.org/projects/treemanager
# 2009 (c) alby (Alberto Benati)
#------------------------------------------------------------------------
# CMS Made Simple is (c) 2005-2009 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
#------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
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
#------------------------------------------------------------------------
#$Id: method.uninstall.php 5 2009-05-26 09:32:25Z alby $

if(!isset($gCms)) exit;

$db =& $gCms->GetDb();
$dict = NewDataDictionary($db);

$tables = $this->_get_all_tables();
foreach($tables as $name)
{
	if(!preg_match('/'.cms_db_prefix().'module_tree_(.*?)/ism', $name)) continue;
	#Remove the database table and sequence
	$d = $dict->DropTableSQL($name);
	$return = $dict->ExecuteSQLArray($d);
	if($return <> 2) die('Error drop: '.$name);
}

#Events
$this->RemoveEvent( 'OnAddChildren' );
$this->RemoveEvent( 'OnMoveNode' );
$this->RemoveEvent( 'OnMoveOrderNode' );
$this->RemoveEvent( 'OnDeleteNode' );
$this->RemoveEvent( 'OnUpdateCustom' );
$this->RemoveEvent( 'OnUpdateContentAlias' );
$this->RemoveEvent( 'OnDeleteContentAlias' );

#Put mention into the admin log
$this->Audit(0, $this->Lang('friendlyname'), $this->Lang('uninstalled'));
?>