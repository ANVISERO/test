<?php
if (!isset($gCms)) exit;

$db =& $this->GetDb();

$db_prefix = cms_db_prefix();
$dict = NewDataDictionary($db);

$flds= "
		id I,
		name C(255)
	";
$taboptarray = array('mysql' => 'TYPE=MyISAM');
$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_neogallery', $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);
$db->CreateSequence( cms_db_prefix()."module_neogallery_seq" );

$flds= "
		gallery I,
		propname C(80),
		propvalue C(255)		
	";
$taboptarray = array('mysql' => 'TYPE=MyISAM');
$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_neogallery_props', $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);

$flds= "
    propname C(255),
    propvalue X,
    gallery I,
		filename C(255)
	";
$taboptarray = array('mysql' => 'TYPE=MyISAM');
$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_neogallery_imgprops', $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);

$flds= "
		id I,
		textid C(255),
		content X
	";
$taboptarray = array('mysql' => 'TYPE=MyISAM');
$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_neogallery_templates', $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);
$db->CreateSequence( cms_db_prefix()."module_neogallery_templates_seq" );

$this->CreatePermission('Administrate NeoGallery',$this->Lang("permission"));
$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('installed',$this->GetVersion()));
?>