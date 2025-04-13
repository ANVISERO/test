<?php
if (!isset($gCms)) exit;

$db =& $this->GetDb();
$dict = NewDataDictionary($db);


$sqlarray = $dict->DropTableSQL(cms_db_prefix()."module_neogallery");
$dict->ExecuteSQLArray($sqlarray);
$db->DropSequence(cms_db_prefix()."module_neogallery_seq");

$sqlarray = $dict->DropTableSQL(cms_db_prefix()."module_neogallery_props");
$dict->ExecuteSQLArray($sqlarray);

$sqlarray = $dict->DropTableSQL(cms_db_prefix()."module_neogallery_imgprops");
$dict->ExecuteSQLArray($sqlarray);

$sqlarray = $dict->DropTableSQL(cms_db_prefix()."module_neogallery_templates");
$dict->ExecuteSQLArray($sqlarray);
$db->DropSequence(cms_db_prefix()."module_neogallery_templates_seq");


$this->RemovePermission('Administrate NeoGallery');
$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('uninstalled'));
?>