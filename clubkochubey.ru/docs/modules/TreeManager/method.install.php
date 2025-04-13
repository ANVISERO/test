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
#$Id: method.install.php 4 2009-05-19 20:10:00Z alby $

if(!isset($gCms)) exit;

$db =& $gCms->GetDb();
$dict = NewDataDictionary($db);
#mysql-specific, but ignored by other database
$table_options = array('mysql'=>'TYPE=MyISAM', 'mysqli'=>'TYPE=MyISAM');
$idx_options = array('UNIQUE');


#Table schema descriptions
$table_definitions = array(
	'transaction' => "
		id		I NOTNULL,
		module	C(165) NOTNULL,
		tree	C(165) NOTNULL,
		intransaction I1 NOTNULL,
		tstamp	I NOTNULL
	",
);

foreach($table_definitions as $name=>$definition)
{
	#Create the table
	$c = $dict->CreateTableSQL(cms_db_prefix()."module_tree_".$name, $definition, $table_options);
	$return = $dict->ExecuteSQLArray($c);
	if($return <> 2) die('Error create: '.cms_db_prefix()."module_tree_".$name);

	$c = $dict->CreateIndexSQL('idx_transaction_by_module_tree', cms_db_prefix()."module_tree_".$name, 'module, tree', $idx_options);
	$return = $dict->ExecuteSQLArray($c);
	if($return <> 2) die('Error index: '.cms_db_prefix()."module_tree_".$name);

	#Create a sequence
	$db->CreateSequence(cms_db_prefix()."module_tree_".$name."_seq");
}

#Events
$this->CreateEvent( 'OnAddChildren' );
$this->CreateEvent( 'OnMoveNode' );
$this->CreateEvent( 'OnMoveOrderNode' );
$this->CreateEvent( 'OnDeleteNode' );
$this->CreateEvent( 'OnUpdateCustom' );
$this->CreateEvent( 'OnUpdateContentAlias' );
$this->CreateEvent( 'OnDeleteContentAlias' );

#Put mention into the admin log
$this->Audit(0, $this->Lang('friendlyname'), $this->Lang('installed',$this->GetVersion()));
?>