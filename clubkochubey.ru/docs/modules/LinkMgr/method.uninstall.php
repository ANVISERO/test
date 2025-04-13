<?php
global $gCms;
$db =& $gCms->GetDb();
$dict = NewDataDictionary($db);

$sqlarray = $dict->DropTableSQL(cms_db_prefix() . 'module_linkmgr_links');
$dict->ExecuteSQLArray($sqlarray);

$sqlarray = $dict->DropTableSQL(cms_db_prefix() . 'module_linkmgr_links_seq');
$dict->ExecuteSQLArray($sqlarray);

$sqlarray = $dict->DropTableSQL(cms_db_prefix() . 'module_linkmgr_categories');
$dict->ExecuteSQLArray($sqlarray);

$sqlarray = $dict->DropTableSQL(cms_db_prefix() . 'module_linkmgr_categories_seq');
$dict->ExecuteSQLArray($sqlarray);

$sqlarray = $dict->DropTableSQL(cms_db_prefix() . 'module_linkmgr_templates');
$dict->ExecuteSQLArray($sqlarray);

$sqlarray = $dict->DropTableSQL(cms_db_prefix() . 'module_linkmgr_templates_seq');
$dict->ExecuteSQLArray($sqlarray);

$this->RemovePermission('LinkMgr: modify links');
$this->RemovePermission('LinkMgr: modify templates');

$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('uninstalled'));
?>
