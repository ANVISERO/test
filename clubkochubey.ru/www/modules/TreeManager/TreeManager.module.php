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
#$Id: TreeManager.module.php 9 2009-06-04 16:39:46Z alby $

class TreeManager extends CMSModule
{
	var $module;
	var $lang;
	var $numNodeInvolved;
	var $arrNodeInvolved;

	var $_customField;
	var $_allNodeField;
	var $_inTransaction;
	var $_periodTransaction;

	function TreeManager()
	{
		parent::CMSModule();
		$this->setPeriodTransaction();

		$this->module='';
		$this->_customField=array();
		$this->_allNodeField=array('id','parent','lft','rgt','level','norder','tree','skip','children','node_id','content_alias','lang');
		$this->_inTransaction=null;
	}

	function AllowAutoInstall() {return false;}

	function GetName() {return 'TreeManager';}

	function GetFriendlyName() {return $this->Lang('friendlyname');}

	function GetVersion() {return '0.6.0';}

	function GetHelp() {return $this->Lang('help');}

	function GetAuthor() {return 'alby';}

	function GetAuthorEmail() {return 'cms@xme.it';}

	function GetChangeLog() {return $this->ProcessTemplate('changelog.tpl');}

	function IsPluginModule() {return false;}

	function HasAdmin() {return false;}

	function IsAdminOnly() {return false;}

	#function GetAdminSection() {return 'extensions';}
	#function GetAdminDescription() {return $this->Lang('moddescription');}
	#function VisibleToAdminUser() {return $this->CheckPermission('Modify Site Preferences');}

	function GetDependencies() {return array();}

	function HasCapability($capability, $params=array())
	{
		if('tree' == strtolower($capability)) return true;
		return false;
	}

	function GetEventDescription($eventname) {return $this->Lang('event_info_'. $eventname);}

	function GetEventHelp($eventname) {return $this->Lang('event_help_'. $eventname);}

	function MinimumCMSVersion() {return '1.5.1';}

	function InstallPostMessage() {return $this->Lang('postinstall');}

	function UninstallPostMessage() {return $this->Lang('postuninstall');}

	function UninstallPreMessage() {return $this->Lang('really_uninstall');}

	function _DisplayErrorPage($id, &$params, $returnid, $message='', $admin=false)
	{
		if($admin) $this->smarty->assign('title_error', $this->Lang('error'));
		$this->smarty->assign('message', $message);
		echo $this->ProcessTemplate('error.tpl');
	}


	function initTree( $module, $customField=array(), $lang='' )
	{
		if(is_object($module))
			$this->module = strtolower($module->GetName());
		elseif(is_string($module))
			$this->module = strtolower($module);

		if(empty($this->module))
			return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('error_module'));

		if(!is_array($customField))
			return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('error_field'));

		$this->lang = $lang;
		$this->_customField = $customField;
		$this->_allNodeField = array_merge($this->_allNodeField, $customField);

		$tables = $this->_get_all_tables();
		if(in_array(cms_db_prefix().'module_tree_transaction',$tables) && !defined('CMS_TABLE_TREE_NODE'))
		{
			define('CMS_TABLE_TREE_TRANSACTION', cms_db_prefix().'module_tree_transaction');
			define('CMS_TABLE_TREE_NODE', cms_db_prefix().'module_tree_'.$this->module.'_node');
			define('CMS_TABLE_TREE_CONTENT', cms_db_prefix().'module_tree_'.$this->module.'_content');
		}
	}
	function setOutput( $out, $involded=null, $return_one=true )
	{
		$this->numNodeInvolved=false;
		if(is_array($out))
		{
			$this->numNodeInvolved = count($out);
			if(!is_null($involded)) $this->arrNodeInvolved = $involded;
			if($return_one && count($out)==1) return $out[0];
			return $out;
		}
		return false;
	}


// Begin private functions //
	function _beginTransaction( $tree='' )
	{
		if(!defined('CMS_TABLE_TREE_TRANSACTION') || !defined('CMS_TABLE_TREE_NODE') || !defined('CMS_TABLE_TREE_CONTENT'))
			return false;

		$tstamp = time();
		$db =& $this->GetDb();
		$q = "SELECT intransaction, tstamp
			FROM ". CMS_TABLE_TREE_TRANSACTION ."
			WHERE module = ? AND tree = ?";
		$dbresult =& $db->Execute($q, array($this->module, $tree));
		if(!$dbresult) die('Error: query: '.$q);
		if($dbresult->RecordCount() == 0)
		{
			$tid = $db->GenID(CMS_TABLE_TREE_TRANSACTION.'_seq');
			$qi = "INSERT INTO ". CMS_TABLE_TREE_TRANSACTION ."
				(id, module, tree, intransaction, tstamp)
				VALUES (?,?,?,1,{$tstamp})";
			$dbresult =& $db->Execute($qi, array($tid, $this->module, $tree));
		}
		else
		{
			$row = $dbresult->FetchRow();
			if($row['intransaction']==1 && $row['tstamp']>($tstamp-$this->_periodTransaction))
			{
				$this->_inTransaction = true;
				return false;
			}
			$qu = "UPDATE ". CMS_TABLE_TREE_TRANSACTION ."
				SET intransaction = 1, tstamp = ?
				WHERE module = ? AND tree = ?";
			$dbresult =& $db->Execute($qu, array($tstamp, $this->module, $tree));
		}
		if( $dbresult )
		{
			$this->_inTransaction = true;
			return true;
		}
		return false;
	}
	function _clean_custom_schema( $schema )
	{
		$custom = array_keys($schema);
		#Get rid of any duplicates
		$custom = array_unique($custom);
		#Only keep non-protected fields
		$custom = array_diff($custom, $this->_allNodeField);
		return $custom;
	}
	function _add_custom_field( $schema )
	{
		if(!defined('CMS_TABLE_TREE_TRANSACTION')) die('Error: no initTree() calling?');

		if(!is_array($schema))
			return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('error_schema'));

		$cleanFields = $this->_clean_custom_schema($schema);
		if(count($cleanFields) == 0)
			return $this->_DisplayErrorPage($id, $params, $returnid, $this->Lang('error_cleanfield'));

		$this->_add_content_table($schema, $cleanFields);

		$this->_customField = array_merge($this->_customField, $cleanFields);
		$this->_allNodeField = array_merge($this->_allNodeField, $cleanFields);
	}
	function _get_all_tables()
	{
		global $gCms;
		switch($gCms->config['dbms'])
		{
			case 'mysql':
			case 'mysqli':
				$qc = "SHOW TABLES";
				break;
			case 'postgres7':
				$qc = "select table_name from information_schema.tables where table_schema='public'";
				break;
			default: die('No SQL driver in config.php (mysql,mysqli,postgres7)?');
		}

		$db =& $this->GetDb();
		$db->SetFetchMode(ADODB_FETCH_NUM);
		$dbresult = $db->Execute($qc);
		$db->SetFetchMode(ADODB_FETCH_ASSOC);
		if(!$dbresult) die('Error in sql show: '.$qc);

		$tables=array();
		while($dbresult && $row=$dbresult->FetchRow())
			$tables[] = $row[0];

		return $tables;
	}
	function _add_content_table( $schema, $cleanFields )
	{
		$columns='';
		foreach($cleanFields as $field)
			$columns .= ",\n". $field .' '. $schema[$field];

		$db =& $this->GetDb();
		$dict = NewDataDictionary($db);
		$tbl_options = array('mysql'=>'TYPE=MyISAM', 'mysqli'=>'TYPE=MyISAM');
		$idx_options = array('UNIQUE');

		$tables = $this->_get_all_tables();
		if(in_array(CMS_TABLE_TREE_CONTENT, $tables))
		{
			$c = $dict->AddColumnSQL(CMS_TABLE_TREE_CONTENT, $columns);
			$return = $dict->ExecuteSQLArray($c);
			if($return <> 2) die('Error add column in '.CMS_TABLE_TREE_CONTENT);
		}
		else
		{
			$qc1 = "id	I NOTNULL,
				parent	I NOTNULL,
				lft	I NOTNULL,
				rgt	I NOTNULL,
				level	I NOTNULL,
				norder	I NOTNULL,
				tree	C(165) NOTNULL,
				skip	I1 NOTNULL";

			$qc2 = "node_id		INT NOTNULL,
				content_alias	I,
				lang		C(8) NOTNULL".
				$columns;

			$c = $dict->CreateTableSQL(CMS_TABLE_TREE_NODE, $qc1, $tbl_options);
			$return = $dict->ExecuteSQLArray($c);
			if($return <> 2) die('Error create: '.CMS_TABLE_TREE_NODE);

			$c = $dict->CreateIndexSQL('idx_node_by_id_tree', CMS_TABLE_TREE_NODE, 'id, tree', $idx_options);
			$return = $dict->ExecuteSQLArray($c);
			if($return <> 2) die('Error index: '.CMS_TABLE_TREE_NODE);

			$db->CreateSequence(CMS_TABLE_TREE_NODE.'_seq');

			$c = $dict->CreateTableSQL(CMS_TABLE_TREE_CONTENT, $qc2, $tbl_options);
			$return = $dict->ExecuteSQLArray($c);
			if($return <> 2) die('Error create: '.CMS_TABLE_TREE_CONTENT);

			$c = $dict->CreateIndexSQL('idx_content_by_nodeid_lang', CMS_TABLE_TREE_CONTENT, 'node_id, lang', $idx_options);
			$return = $dict->ExecuteSQLArray($c);
			if($return <> 2) die('Error index: '.CMS_TABLE_TREE_CONTENT);
		}
	}
	function _checkField( $field, $arr_node=array('id') )
	{
		$arr = array_merge($arr_node, $this->_customField);
		if(in_array($field, $arr)) return true;
		return false;
	}
// End private functions //


// Begin editing functions //
	function _update_custom( $id, $input=array(), $tree='' )
	{
		if(is_null($this->_inTransaction) || $this->_inTransaction)
			if(!$this->_beginTransaction($tree)) return false;

		$test=false;
		$db =& $this->GetDb();
		$q = "SELECT content_alias
			FROM ". CMS_TABLE_TREE_CONTENT ."
			WHERE node_id = ? AND lang = ?";
		$dbresult =& $db->Execute($q, array($id, $this->lang));
		if($dbresult && $dbresult->RecordCount()==0)
		{
			$test = $this->_add_content($id, $input);
		}
		elseif($dbresult && $row=$dbresult->FetchRow() && empty($row['content_alias']))
		{
			$cols=''; $values=array();
			foreach($this->_customField as $item)
			{
				if(isset($input[$item]))
				{
					$cols .= $item .' = ?, ';
					$values[] = $input[$item];
				}
			}
			if(count($values) > 0)
			{
				$cols = substr($cols, 0, -2);
				$values = array_merge($values, array($id, $this->lang));

				$qu = "UPDATE ". CMS_TABLE_TREE_CONTENT ."
					SET {$cols}
					WHERE node_id = ? AND lang = ?";
				$dbresult =& $db->Execute($qu, $values);
				if( $dbresult ) $test = true;
			}
		}
		$this->endTransaction($tree);
		if( $test )
		{
			$parms=array();
			$parms['id'] = $id;
			$parms['tree'] = $tree;
			$this->SendEvent('OnUpdateCustom',$parms);
		}
		return $test;
	}
	function _add_content( $id, $input=array() )
	{
		$cols='node_id, lang';
		$values = array($id, $this->lang);
		foreach($this->_customField as $item)
		{
			if(isset($input[$item]))
			{
				$cols .= ', '. $item;
				$values[] = $input[$item];
			}
		}

		$db =& $this->GetDb();
		$qi = "INSERT INTO ". CMS_TABLE_TREE_CONTENT ."
			({$cols})
			VALUES (". substr(str_repeat('?,', count($values)), 0, -1) .")";
		$dbresult =& $db->Execute($qi, $values);
		if( $dbresult ) return true;
		return false;
	}
	function _delete_content( $id )
	{
		$db =& $this->GetDb();
		$qd = "DELETE FROM ". CMS_TABLE_TREE_CONTENT ."
			WHERE node_id = ?";
		$dbresult =& $db->Execute($qd, array($id));
		if( $dbresult ) return true;
		return false;
	}
	function _update_content_alias( $id, $alias_id, $tree='' )
	{
		if(is_null($this->_inTransaction) || $this->_inTransaction)
			if(!$this->_beginTransaction($tree)) return false;

		$test=false;
		$db =& $this->GetDb();
		$qu = "UPDATE ". CMS_TABLE_TREE_CONTENT ."
			SET content_alias = ?
			WHERE node_id = ? AND lang = ?";
		$dbresult =& $db->Execute($qu, array($alias_id, $id, $this->lang));
		if( $dbresult ) $test = true;

		$this->endTransaction($tree);
		if( $test )
		{
			$parms=array();
			$parms['id'] = $id;
			$parms['alias'] = $alias_id;
			$parms['tree'] = $tree;
			$this->SendEvent('OnUpdateContentAlias',$parms);
		}
		return $test;
	}
	function _delete_content_alias( $id, $tree='' )
	{
		if(is_null($this->_inTransaction) || $this->_inTransaction)
			if(!$this->_beginTransaction($tree)) return false;

		$test=false;
		$db =& $this->GetDb();
		$qu = "UPDATE ". CMS_TABLE_TREE_CONTENT ."
			SET content_alias = NULL
			WHERE node_id = ? AND lang = ?";
		$dbresult =& $db->Execute($qu, array($id, $this->lang));
		if( $dbresult ) $test = true;

		$this->endTransaction($tree);
		if( $test )
		{
			$parms=array();
			$parms['id'] = $id;
			$parms['tree'] = $tree;
			$this->SendEvent('OnDeleteContentAlias',$parms);
		}
		return $test;
	}

	function _add_root_node( $input=array(), $forceid=false, $tree='' )
	{
		if(is_null($this->_inTransaction) || $this->_inTransaction)
			if(!$this->_beginTransaction($tree)) return false;

		$db =& $this->GetDb();
		if( $forceid )
		{
			$nodeid = (int)$forceid;
			if(empty($nodeid))
			{
				$this->endTransaction($tree);
				return false;
			}
			$q = "SELECT MAX(id) as id FROM ". CMS_TABLE_TREE_NODE;
			$dbresult =& $db->Execute($q);
			if($dbresult && $row=$dbresult->FetchRow()) $catid = $row['id'];
		}
		else
		{
			$nodeid = $db->GenID(CMS_TABLE_TREE_NODE.'_seq');
		}
		$qi = "INSERT INTO ". CMS_TABLE_TREE_NODE ."
			(id, parent, lft, rgt, level, norder, tree, skip)
			VALUES (?,0,1,2,0,1,?,0)";
		$dbresult =& $db->Execute($qi, array($nodeid, $tree));
		if( $dbresult )
		{
			$this->_add_content($nodeid, $input);
			if($forceid && $nodeid>$catid)
			{
				while($nodeid > $catid)
					$catid = $db->GenID(CMS_TABLE_TREE_NODE.'_seq');
			}
			$this->endTransaction($tree);
			return $nodeid;
		}
		$this->endTransaction($tree);
		return false;
	}
	function _add_node( $parent=-1, $input=array(), $norder=-1, $forceid=false, $tree='' )
	{
		if(is_null($this->_inTransaction) || $this->_inTransaction)
			if(!$this->_beginTransaction($tree)) return false;

		if(empty($parent) || $parent == -1)
			return $this->_add_root_node($input, $tree);

		$tmp = $this->_full_custom_query('', 'id = ?', array($parent), false, $tree);
		if( $tmp )
		{
			if(count($tmp) == 0)
				return $this->_add_root_node($input, $tree);

			$row1 = $tmp[0];

			$left = $row1['lft'] +1;
			$db =& $this->GetDb();

			#Update Order (set norder = norder +1 where norder>$norder)
			if($norder == -1)
			{
				$q2 = "SELECT norder
					FROM ". CMS_TABLE_TREE_NODE ."
					WHERE parent = ? AND tree = ?
					ORDER BY norder DESC";
				$dbresult =& $db->SelectLimit($q2, 1, 0, array($parent, $tree));
				if($dbresult && $row2=$dbresult->FetchRow())
					$norder = $row2['norder'] +1;
				else
					$norder = 1;
			}

			$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
				SET norder = norder + 1
				WHERE parent = ? AND norder >= ? AND tree = ?";
			$dbresult =& $db->Execute($qu, array($parent, $norder, $tree));

			$q3 = "SELECT rgt
				FROM ". CMS_TABLE_TREE_NODE ."
				WHERE parent = ? AND norder <= ? AND tree = ?
				ORDER BY norder DESC";
			$dbresult =& $db->SelectLimit($q3, 1, 0, array($parent, $norder, $tree));
			if($dbresult && $row3=$dbresult->FetchRow())
				$left = $row3['rgt'] +1;

			$right = $left +1;

			#Update Left
			$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
				SET lft = lft + 2
				WHERE lft >= ? AND tree = ?";
			$dbresult =& $db->Execute($qu, array($left, $tree));

			#Update Right
			$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
				SET rgt = rgt + 2
				WHERE rgt >= ? AND tree = ?";
			$dbresult =& $db->Execute($qu, array($left, $tree));

			#Insert
			$db =& $this->GetDb();
			if( $forceid )
			{
				$nodeid = (int)$forceid;
				if(empty($nodeid))
				{
					$this->endTransaction($tree);
					return false;
				}
				$q = "SELECT MAX(id) as id FROM ". CMS_TABLE_TREE_NODE;
				$dbresult =& $db->Execute($q);
				if($dbresult && $row=$dbresult->FetchRow()) $catid = $row['id'];
			}
			else
			{
				$nodeid = $db->GenID(CMS_TABLE_TREE_NODE.'_seq');
			}
			$qi = "INSERT INTO ". CMS_TABLE_TREE_NODE ."
				(id, parent, lft, rgt, level, norder, tree, skip)
				VALUES (?,?,?,?,?,?,?,0)";
			$dbresult =& $db->Execute($qi, array($nodeid, $parent, $left, $right, ($row1['level']+1), $norder, $tree));
			if( $dbresult )
			{
				$this->_add_content($nodeid, $input);
				if($forceid && $nodeid>$catid)
				{
					while($nodeid > $catid)
						$catid = $db->GenID(CMS_TABLE_TREE_NODE.'_seq');
				}
			}
			$this->endTransaction($tree);

			$parms=array();
			$parms['id'] = $nodeid;
			$parms['level'] = ($row1['level']+1);
			$parms['norder'] = $norder;
			$parms['tree'] = $tree;
			$this->SendEvent('OnAddChildren',$parms);
			return $nodeid;
		}
		$this->endTransaction($tree);
		return false;
	}
	function _move_node( $id=-1, $parent=-1, $norder=-1, $tree='' )
	{
		if(is_null($this->_inTransaction) || $this->_inTransaction)
			if(!$this->_beginTransaction($tree)) return false;

		$tmp = $this->_full_custom_query('', 'id = ?', array($id), false, $tree);
		if( $tmp )
		{
			$row1 = $tmp[0];

			$tmp = $this->_full_custom_query('', 'id = ?', array($parent), false, $tree);
			if(!$tmp) return false;
			$row2 = $tmp[0];

			if($row1['parent'] == $row2['parent'])
			{
				$this->endTransaction($tree);
				return $this->_move_order_node($id, $parent);
			}

			$left = $row2['lft'] +1;
			$db =& $this->GetDb();

			#Set node tree as skip
			$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
				SET skip = 1
				WHERE lft >= ? AND rgt <= ? AND tree = ?";
			$dbresult =& $db->Execute($qu, array($row1['lft'], $row1['rgt'], $tree));

			#Update Order (set norder = norder +1 where norder>$norder)
			if($norder == -1)
			{
				$q3 = "SELECT norder
					FROM ". CMS_TABLE_TREE_NODE ."
					WHERE parent = ? AND tree = ?
					ORDER BY norder DESC";
				$dbresult =& $db->SelectLimit($q3, 1, 0, array($parent, $tree));
				if($dbresult && $row3=$dbresult->FetchRow())
					$norder = $row3['norder'] +1;
				else
					$norder = 1;
			}

			$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
				SET norder = norder + 1
				WHERE parent = ? AND norder >= ? AND tree = ?";
			$dbresult =& $db->Execute($qu, array($parent, $norder, $tree));

			$q4 = "SELECT rgt
				FROM ". CMS_TABLE_TREE_NODE ."
				WHERE parent = ? AND norder <= ? AND tree = ?
				ORDER BY norder DESC";
			$dbresult =& $db->SelectLimit($q4, 1, 0, array($parent, $norder, $tree));
			if($dbresult && $row4=$dbresult->FetchRow())
				$left = $row4['rgt'] +1;

			$child_offset = ($row1['rgt'] - $row1['lft']) +1;

			#Update Left
			if($left < $row1['lft']) #Move to left
			{
				$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
					SET lft = lft + ({$child_offset})
					WHERE lft >= ? AND lft <= ? AND skip = 0 AND tree = ?";
			}
			else #Move to right
			{
				$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
					SET lft = lft - ({$child_offset})
					WHERE lft < ? AND lft >= ? AND skip = 0 AND tree = ?";
			}
			$dbresult =& $db->Execute($qu, array($left, $row1['lft'], $tree));

			#Update Right
			if($left < $row1['lft']) #Move to left
			{
				$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
					SET rgt = rgt + ({$child_offset})
					WHERE rgt >= ? AND rgt <= ? AND skip = 0 AND tree = ?";
			}
			else #Move to right
			{
				$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
					SET rgt = rgt - ({$child_offset})
					WHERE rgt < ? AND rgt >= ? AND skip = 0 AND tree = ?";
			}
			$dbresult =& $db->Execute($qu, array($left, $row1['rgt'], $tree));

			$level_difference = ($row2['level'] - $row1['level']) +1;
			$new_offset = $row1['lft'] - $left;
			if($left > $row1['lft']) #i.e. move to right
				$new_offset += $child_offset;

			#Update new tree left
			$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
				SET lft = lft - ({$new_offset}), rgt = rgt - ({$new_offset}), level = level + ({$level_difference})
				WHERE lft >= ? AND rgt <= ? AND skip = 1 AND tree = ?";
			$dbresult =& $db->Execute($qu, array($row1['lft'], $row1['rgt'], $tree));

			#Remove skip statis from node tree
			$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
				SET skip = 0
				WHERE lft >= ? AND rgt <= ? AND skip = 1 AND tree = ?";
			$dbresult =& $db->Execute($qu, array(($row1['lft']-$new_offset), ($row1['rgt']-$new_offset), $tree));

			#Update order
			$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
				SET norder = norder - 1
				WHERE parent = ? AND norder >= ? AND tree = ?";
			$dbresult =& $db->Execute($qu, array($row1['parent'], $row1['norder'], $tree));

			#Update insert root field
			$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
				SET parent = ?, norder = ?
				WHERE id = ? AND tree = ?";
			$dbresult =& $db->Execute($qu, array($parent, $norder, $id, $tree));

			$parms=array();
			$parms['id'] = $id;
			$parms['parent'] = $parent;
			$parms['norder'] = $norder;
			$parms['tree'] = $tree;
			$this->SendEvent('OnMoveNode',$parms);
			return $this->endTransaction($tree);
		}
		$this->endTransaction($tree);
		return false;
	}
	function _move_order_node( $id=-1, $newid=-1, $neworder=-1, $tree='' )
	{
		if(is_null($this->_inTransaction) || $this->_inTransaction)
			if(!$this->_beginTransaction($tree)) return false;

		$tmp = $this->_full_custom_query('', 'id = ?', array($id), false, $tree);
		if( $tmp )
		{
			$node = $tmp[0];

			$tmp=false;
			if((int)$newid > 0)
				$tmp = $this->_full_custom_query('', 'id = ?', array($newid), false, $tree);
			elseif((int)$neworder > 0)
				$tmp = $this->_full_custom_query('', 'parent = ? AND norder = ?', array($node['parent'],(int)$neworder), false, $tree);
			if(!$tmp) return false;
			$newnode = $tmp[0];

			if($newnode['parent'] != $node['parent'] || $newnode['norder'] == $node['norder'])
				return false;

			$db =& $this->GetDb();
			$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
				SET skip = 1
				WHERE lft >= ? AND rgt <= ? AND tree = ?";
			$dbresult =& $db->Execute($qu, array($node['lft'], $node['rgt'], $tree));

			$child_offset = $node['rgt'] - $node['lft'] +1;
			if($newnode['norder'] > $node['norder'])
			{
				$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
					SET norder = norder - 1
					WHERE parent = ? AND norder >= ? AND norder <= ? AND skip = 0 AND tree = ?";
				$dbresult =& $db->Execute($qu, array($node['parent'], $node['norder'], $newnode['norder'], $tree));

				$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
					SET lft = lft - ({$child_offset}), rgt = rgt - ({$child_offset})
					WHERE lft >= ? AND rgt <= ? AND skip = 0 AND tree = ?";
				$dbresult =& $db->Execute($qu, array($node['lft'], $newnode['rgt'], $tree));

				$new_offset = $node['rgt'] - $newnode['rgt'];
			}
			else
			{
				$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
					SET norder = norder + 1
					WHERE parent = ? AND norder <= ? AND norder >= ? AND skip = 0 AND tree = ?";
				$dbresult =& $db->Execute($qu, array($node['parent'], $node['norder'], $newnode['norder'], $tree));

				$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
					SET lft = lft + ({$child_offset}), rgt = rgt + ({$child_offset})
					WHERE lft >= ? AND rgt <= ? AND skip = 0 AND tree = ?";
				$dbresult =& $db->Execute($qu, array($newnode['lft'], $node['rgt'], $tree));

				$new_offset = $node['lft'] - $newnode['lft'];
			}

			$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
				SET norder = {$newnode['norder']}
				WHERE id = ? AND skip = 1 AND tree = ?";
			$dbresult =& $db->Execute($qu, array($node['id'], $tree));

			$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
				SET lft = lft - ({$new_offset}), rgt = rgt - ({$new_offset}), skip = 0
				WHERE lft >= ? AND rgt <= ? AND skip = 1 AND tree = ?";
			$dbresult =& $db->Execute($qu, array($node['lft'], $node['rgt'], $tree));

			$parms=array();
			$parms['id'] = $id;
			$parms['norder'] = $newnode['norder'];
			$parms['tree'] = $tree;
			$this->SendEvent('OnMoveOrderNode',$parms);
			return $this->endTransaction($tree);
		}
		$this->endTransaction($tree);
		return false;
	}
	function _delete_node( $id=-1, $tree='' )
	{
		if(is_null($this->_inTransaction) || $this->_inTransaction)
			if(!$this->_beginTransaction($tree)) return false;

		$tmp = $this->_full_custom_query('', 'id = ?', array($id), false, $tree);
		if( $tmp )
		{
			$row1 = $tmp[0];

			$delete_offset = $row1['rgt'] - $row1['lft'];
			$db =& $this->GetDb();

			#Test if there is content aliases and delete Content sub nodes
			$test_id=array();
			$q2 = "SELECT id
				FROM ". CMS_TABLE_TREE_NODE ."
				WHERE lft >= ? AND lft <= ? AND tree = ?";
			$dbresult =& $db->Execute($q2, array($row1['lft'], $row1['rgt'], $tree));
			while($dbresult && $row2=$dbresult->FetchRow())
				$test_id[] = $row2['id'];

			if(count($test_id) == 0)
			{
				$this->endTransaction($tree);
				return 0;
			}

			$sql_in = implode(',', $test_id);
			$q3 = "SELECT node_id
				FROM ". CMS_TABLE_TREE_CONTENT ."
				WHERE node_id NOT IN ({$sql_in}) AND content_alias IN ({$sql_in})";
			$dbresult =& $db->Execute($q3);
			if($dbresult && $dbresult->RecordCount()>0)
			{
				$this->endTransaction($tree);
				return 0;
			}

			foreach($test_id as $node_id)
				$this->_delete_content($node_id);

			#Delete sub nodes
			$qd = "DELETE FROM ". CMS_TABLE_TREE_NODE ."
				WHERE lft >= ? AND lft <= ? AND tree = ?";
			$dbresult =& $db->Execute($qd, array($row1['lft'], $row1['rgt'], $tree));

			#Update order
			$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
				SET norder = norder - 1
				WHERE parent = ? AND lft >= ? AND tree = ?";
			$dbresult =& $db->Execute($qu, array($row1['parent'], $row1['lft'], $tree));

			#Update Left
			$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
				SET lft = lft - ({$delete_offset} +1)
				WHERE lft > ? AND tree = ?";
			$dbresult =& $db->Execute($qu, array($row1['rgt'], $tree));

			#Update Right
			$qu = "UPDATE ". CMS_TABLE_TREE_NODE ."
				SET rgt = rgt - ({$delete_offset} +1)
				WHERE rgt > ? AND tree = ?";
			$dbresult =& $db->Execute($qu, array($row1['rgt'], $tree));

			$parms=array();
			$parms['id'] = $id;
			$parms['tree'] = $tree;
			$this->SendEvent('OnDeleteNode',$parms);
			return $this->endTransaction($tree);
		}
		$this->endTransaction($tree);
		return false;
	}
// End editing functions //


// Begin nested functions //
	function _select_path( $node, $idx='', $noroot=false, $nocurrent=false, $orderby='lft', $tree='' )
	{
		if(!is_array($node) || !isset($node['lft']) || !isset($node['rgt'])) return false;

		if( $nocurrent ) $where = 'lft < ? AND rgt > ?';
		else $where = 'lft <= ? AND rgt >= ?';

		if( $noroot ) $where .= ' AND parent > 0';

		return $this->_full_custom_query('', $where, array($node['lft'],$node['rgt']), true, $tree, $orderby, $idx);
	}
	function _select_sub_nodes( $node, $depth=-1, $orderby='level,norder', $nocurrent=false, $idx='', $tree='', $fieldallow='', $valueallow=false, $fielddeny='', $valuedeny=false )
	{
		if(!is_array($node) || !isset($node['lft']) || !isset($node['rgt']) || !isset($node['level'])) return false;

		if( $nocurrent ) $where = 'lft > ? AND rgt < ?';
		else $where = 'lft >= ? AND rgt <= ?';
		$inputarr = array($node['lft'],$node['rgt']);

		if($depth > -1)
		{
			$where .= ' AND level <= ?';
			$inputarr[] = ($depth + $node['level']);
		}
		if(!empty($fieldallow) && $valueallow!==false)
		{
			$where .= " AND {$fieldallow} LIKE (?)";
			$inputarr[] = $valueallow;
		}
		if(!empty($fielddeny) && $valuedeny!==false)
		{
			$where .= " AND {$fielddeny} NOT LIKE (?)";
			$inputarr[] = $valuedeny;
		}

		return $this->_full_custom_query('', $where, $inputarr, true, $tree, $orderby, $idx);
	}
	function _full_custom_query( $select='', $where='', $inputarr=array(), $getcontent=true, $tree='', $orderby='', $idx='', $skipid=0, $limit=-1, $offset=-1 )
	{
		if(!defined('CMS_TABLE_TREE_NODE') || !defined('CMS_TABLE_TREE_CONTENT')) return false;

		$fields = (!empty($select)) ? $select : 'id, parent, lft, rgt, level, norder, ((rgt - lft -1)/2) as children';
		$qwhere = (!empty($where)) ? $where .' AND' : '';
		$inputarr[] = $tree;

		$join_table='';
		if( $getcontent )
		{
			$fields .= ', content_alias, lang, '. implode(', ', $this->_customField);
			$join_table = "LEFT JOIN ". CMS_TABLE_TREE_CONTENT ." AS c ON (n.id=c.node_id AND c.lang='".$this->lang."')";
			$alias_fields = implode(', ', $this->_customField);
		}

		$db =& $this->GetDb();
		$q = "SELECT {$fields}
			FROM ". CMS_TABLE_TREE_NODE ." AS n {$join_table}
			WHERE {$qwhere} tree = ?";
		if(!empty($orderby)) $q .= ' ORDER BY '.$orderby;
		$dbresult =& $db->SelectLimit($q, $limit, $offset, $inputarr);
		if(!$dbresult) return false;

		$out=array(); $i=0;
		while($row = $dbresult->FetchRow())
		{
			if(!empty($skipid) && !empty($row['id']) && $skipid==$row['id']) continue;
			if(isset($row['children'])) $row['children'] = (int)$row['children'];

			if($getcontent && !empty($row['content_alias']))
			{
				$q = "SELECT {$alias_fields}
					FROM ". CMS_TABLE_TREE_CONTENT ."
					WHERE node_id = ? AND lang = ?";
				$dbalias =& $db->Execute($q, array($row['content_alias'], $row['lang']));
				if($dbalias && $row_alias=$dbalias->FetchRow())
					$row = array_merge($row, $row_alias);
			}

			if(!empty($idx) && !empty($row["$idx"])) $key = $row["$idx"];
			else $key = $i++;
			$out[$key] = $row;
		}
		return $out;
	}
// End nested functions //



// METHODS //
	function setCmsDropdown( $arr, $field='id', $format=true )
	{
		if(is_array($arr))
		{
			$out=array();
			foreach($arr as $key=>$item)
			{
				if($format) $idx = str_repeat('-', $item['level']).' '.$item[$field];
				else $idx = $field;
				$out[$idx] = $item['id'];
			}
			return $out;
		}
		return false;
	}

	function dropModuleTable()
	{
		$db =& $this->GetDb();
		$dict = NewDataDictionary($db);

		$d = $dict->DropTableSQL(CMS_TABLE_TREE_NODE);
		$return = $dict->ExecuteSQLArray($d);
		if($return <> 2) return false;

		$db->DropSequence(CMS_TABLE_TREE_NODE.'_seq');

		$d = $dict->DropTableSQL(CMS_TABLE_TREE_CONTENT);
		$return = $dict->ExecuteSQLArray($d);
		if($return <> 2) return false;

		return true;
	}

	function inTransaction()
	{
		return $this->_inTransaction;
	}

	function setPeriodTransaction( $periodTransaction=120 )
	{
		if($periodTransaction > 0) $this->_periodTransaction = (int)$periodTransaction;
	}

	function endTransaction( $tree='' )
	{
		$db =& $this->GetDb();
		$qu = "UPDATE ". CMS_TABLE_TREE_TRANSACTION ."
			SET intransaction = 0
			WHERE module = ? AND tree = ?";
		$dbresult =& $db->Execute($qu, array($this->module, $tree));
		if( $dbresult )
		{
			$this->_inTransaction = false;
			return true;
		}
		return false;
	}


// API EDITING //
	function addRoot( $input=array(), $forceid=false, $tree='' )
	{
		return $this->_add_root_node($input, $forceid, $tree);
	}

	function addChildren( $id, $input=array(), $norder=-1, $forceid=false, $tree='' )
	{
		return $this->_add_node($id, $input, $norder, $forceid, $tree);
	}

	function moveNode( $id, $newparent=-1, $norder=-1, $tree='' )
	{
		return $this->_move_node($id, $newparent, $norder, $tree);
	}

	function moveOrderNode( $id, $newnode=-1, $neworder=-1, $tree='' )
	{
		return $this->_move_order_node($id, $newnode, $neworder, $tree);
	}

	function deleteNode( $id, $tree='' )
	{
		return $this->_delete_node($id, $tree);
	}

	function addCustomField( $schema=array() )
	{
		return $this->_add_custom_field($schema);
	}

	function updateCustom( $id, $input=array(), $tree='' )
	{
		return $this->_update_custom($id, $input, $tree);
	}

	function updateContentAlias( $id, $newnode, $tree='' )
	{
		return $this->_update_content_alias($id, $newnode, $tree);
	}

	function deleteContentAlias( $id, $tree='' )
	{
		return $this->_delete_content_alias($id, $tree);
	}


// API FETCHING //
	function getCustomFields()
	{
		return $this->_customField;
	}

	function getAllNodeFields()
	{
		return $this->_allNodeField;
	}

 	function getRoot( $tree='' )
	{
		$tmp = $this->_full_custom_query('', 'parent = 0', array(), true, $tree);
		return $this->setOutput($tmp);
	}

	function getNode( $id, $tree='' )
	{
		$tmp = $this->_full_custom_query('', 'id = ?', array($id), true, $tree);
		return $this->setOutput($tmp);
	}

	function getByNodeField( $field='id', $value, $orderby='lft', $tree='' )
	{
		if(!$this->_checkField($field, $this->_allNodeField)) return false;
		$tmp = $this->_full_custom_query('', $field.' = ?', array($value), true, $tree, $orderby);
		return $this->setOutput($tmp);
	}

	function getByCustomField( $field='id', $value, $orderby='lft', $tree='' )
	{
		if(!$this->_checkField($field)) return false;
		$tmp = $this->_full_custom_query('', $field.' = ?', array($value), true, $tree, $orderby);
		return $this->setOutput($tmp);
	}

	function getParent( $field='id', $value, $tree='' )
	{
		if(!$this->_checkField($field)) return false;
		$tmp = $this->_full_custom_query('', $field.' = ?', array($value), true, $tree);
		if( $tmp )
		{
			$out=array(); $involded=array();
			foreach($tmp as $item)
			{
				$involded[] = $item;
				$test = $this->_full_custom_query('', 'id = ?', array($item['parent']), true, $tree);
				if($test && count($test)==1) $out[] = $test[0];
			}
			$tmp = $out;
		}
		return $this->setOutput($tmp, $involded);
	}

	function getSibling( $field='id', $value, $orderby='norder', $nocurrent=false, $idx='id', $tree='' )
	{
		if(!$this->_checkField($field)) return false;
		$tmp = $this->_full_custom_query('', $field.' = ?', array($value), true, $tree);
		if( $tmp )
		{
			$out=array(); $involded=array();
			foreach($tmp as $item)
			{
				$involded[] = $item;
				$test = $this->_full_custom_query('', 'parent = ?', array($item['parent']), true, $tree, $orderby, $idx, ($nocurrent?$item['id']:0));
				if( $test ) $out[] = $test;
			}
			$tmp = $out;
		}
		return $this->setOutput($tmp, $involded);
	}

	function getSiblingCount( $id, $tree='' )
	{
		$tmp = $this->_full_custom_query('parent', 'id = ?', array($id), false, $tree);
		if( $tmp )
			$test = $this->_full_custom_query('COUNT(id) as count', 'parent=?', array($tmp[0]['parent']), false, $tree);

		return (($test && count($test)==1) ? (int)$test[0]['count'] : false);
	}

	function has_children( $id, $tree='' )
	{
		$tmp = $this->_full_custom_query('', 'id = ?', array($id), false, $tree);
		return (($tmp && count($tmp)==1) ? ($tmp[0]['children']>0) : false);
	}

	function getChildren( $field='id', $value, $depth=1, $orderby='level,norder', $nocurrent=false, $idx='', $fieldallow='', $valueallow=false, $fielddeny='', $valuedeny=false, $tree='' )
	{
		if(!$this->_checkField($field)) return false;
		$tmp = $this->_full_custom_query('', $field.' = ?', array($value), true, $tree);
		if( $tmp )
		{
			$out=array(); $involded=array();
			foreach($tmp as $item)
			{
				$involded[] = $item;
				$test = $this->_select_sub_nodes($item, $depth, $orderby, $nocurrent, $idx, $tree, $fieldallow, $valueallow, $fielddeny, $valuedeny);
				if($test) $out[] = $test;
			}
			$tmp = $out;
		}
		return $this->setOutput($tmp, $involded);
	}

	function getChildrenCount( $field='id', $value, $tree='' )
	{
		if(!$this->_checkField($field)) return false;
		$tmp = $this->_full_custom_query('', $field.' = ?', array($value), true, $tree);
		return (($tmp && count($tmp)==1) ? $tmp[0]['children'] : false);
	}

	function getCountNodes( $tree='' )
	{
		$tmp = $this->_full_custom_query('', 'parent = 0', array(), false, $tree);
		return (($tmp && count($tmp)==1) ? $tmp[0]['children'] : false);
	}

	function getByLevel( $level=0, $orderby='lft', $tree='' )
	{
		$tmp = $this->_full_custom_query('', 'level = ?', array($level), true, $tree, $orderby);
		return $this->setOutput($tmp);
	}

	function getLeaf( $orderby='lft', $tree='' )
	{
		$tmp = $this->_full_custom_query('', 'rgt = lft +1', array(), true, $tree, $orderby);
		return $this->setOutput($tmp);
	}

	function getMaxDepth( $tree='' )
	{
		$tmp = $this->_full_custom_query('MAX(level) as max', '', array(), false, $tree);
		return (($tmp && count($tmp)==1) ? (int)$tmp[0]['max'] : false);
	}

	function customQuery( $select='', $where='', $inputarr=array(), $getcontent=true, $orderby='', $idx='', $skipid=0, $limit=-1, $offset=-1, $tree='' )
	{
		return $this->_full_custom_query($select, $where, $inputarr, $getcontent, $tree, $orderby, $idx, $skipid, $limit, $offset);
	}

	function getSubNodes( $node, $depth=1, $orderby='level,norder', $nocurrent=false, $idx='', $fieldallow='', $valueallow=false, $fielddeny='', $valuedeny=false, $tree='' )
	{
		return $this->_select_sub_nodes($node, $depth, $orderby, $nocurrent, $idx, $tree, $fieldallow, $valueallow, $fielddeny, $valuedeny);
	}

	function getBreadcrumbs( $field='id', $value, $idx='id', $noroot=false, $nocurrent=false, $check='', $reverse=false, $orderby='lft', $tree='' )
	{
		if(!$this->_checkField($field)) return false;
		$tmp = $this->_full_custom_query('', $field.' = ?', array($value), true, $tree);
		if( $tmp )
		{
			$out=array(); $involded=array();
			foreach($tmp as $item)
			{
				$involded[] = $item;
				$path = $this->_select_path($item, $idx, $noroot, $nocurrent, $orderby, $tree);
				if($path && !empty($check) && !array_key_exists($check, $path)) continue;
				if( $path ) $out[] = (($reverse) ?array_reverse($path):$path);
			}
			$tmp = $out;
		}
		return $this->setOutput($tmp, $involded);
	}

	function matchHierarchy( $path, $field, $delimiter='/', $tree='' )
	{
		$parts = explode($delimiter, $path);
		$check = array_keys($path);

		$node = end($parts);
		$tmp_node = $this->_full_custom_query('', $field.' = ?', array($node), true, $tree);
		$root = reset($parts);
		$tmp_root = $this->_full_custom_query('', 'parent = 0', array(), true, $tree);

		if($root == $tmp_root[0]["$field"]) $noroot = false;
		else $noroot = true;

		if( $tmp_node )
		{
			foreach($tmp_node as $item)
			{
				$path = $this->_select_path($item, $field, $noroot, false, 'lft', $tree);
				$test = array_diff(array_merge($path, $check), array_intersect($path, $check));
				if(count($test) == 0) return true;
			}
		}
		return false;
	}

	function getTree( $depth=-1, $orderby='lft', $idx='', $fieldallow='', $valueallow=false, $fielddeny='', $valuedeny=false, $tree='' )
	{
		$tmp = $this->_full_custom_query('', 'parent = 0', array(), false, $tree);
		if( $tmp ) return $this->_select_sub_nodes($tmp[0], $depth, $orderby, false, $idx, $tree, $fieldallow, $valueallow, $fielddeny, $valuedeny);
		return false;
	}

	function dumpTree( $depth=-1, $orderby='lft', $fieldallow='', $valueallow=false, $fielddeny='', $valuedeny=false, $tree='' )
	{
		$tmp = $this->_full_custom_query('', 'parent = 0', array(), false, $tree);
		if( $tmp )
		{
			$dumps = $this->_select_sub_nodes($tmp[0], $depth, $orderby, false, '', $tree, $fieldallow, $valueallow, $fielddeny, $valuedeny);
			if( $dumps )
			{
				$this->smarty->assign('tree', $this->Lang('tree'));
				$this->smarty->assign('tree_name', $tree);
				$this->smarty->assign('dumps', $dumps);
				echo $this->ProcessTemplate('dump.tpl');
			}
		}
	}
}
?>
