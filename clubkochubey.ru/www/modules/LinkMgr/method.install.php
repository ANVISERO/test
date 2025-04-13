<?php
$db =& $this->GetDb();
$dict = NewDataDictionary($db);
$taboptarray = array('mysql' => 'TYPE=MyISAM');
$flds = '
	entry_id	I KEY,
	link_name 	C(255),
	link_url 	C(255),
	link_img 	C(255),
	link_cat 	I,
	link_desc	C(255)';

$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_linkmgr_links', $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);
$db->CreateSequence(cms_db_prefix()."module_linkmgr_links_seq");

$flds = '
	cat_id		I KEY,
	link_category 	C(255)';

$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_linkmgr_categories', $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);
$db->CreateSequence(cms_db_prefix()."module_linkmgr_categories_seq");

$flds = '
	entry_id	I KEY,
	name	 	C(255),
	content 	X';
$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_linkmgr_templates', $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);
$db->CreateSequence(cms_db_prefix()."module_linkmgr_templates_seq");

$new_id = $db->GenID(cms_db_prefix()."module_linkmgr_templates_seq");
$flds = '
	INSERT INTO '.cms_db_prefix().'module_linkmgr_templates (
		entry_id,
		name,
		content)
	VALUES(?,?,?)';
$result = $db->Execute($flds, array($new_id, 'default',
'<div class="linkmgr">
<ul>
{foreach from=$items item="item"}
    <li><a href="{$item.link_url}" target="_blank">{$item.link_name}</a> - {$item.link_desc}</li>
{/foreach}
</ul>
</div>'));
if(!$result)
	die('Installation Error:' . $db->ErrorMsg() . ' with(' . $db->sql .')');

$new_id = $db->GenID(cms_db_prefix()."module_linkmgr_categories_seq");
$flds = '
	INSERT INTO '.cms_db_prefix().'module_linkmgr_categories (
		cat_id,
		link_category)
	VALUES(?,?)';
$result = $db->Execute($flds, array($new_id, 'General'));
if(!$result)
	die('Installation Error:' . $db->ErrorMsg() . ' with(' . $db->sql .')');

$this->CreatePermission('LinkMgr: modify links', $this->Lang('modlinkslisting'));
$this->CreatePermission('LinkMgr: modify templates', $this->Lang('modtemplates'));

// create directory for linkmgr images
if (!is_dir($config['image_uploads_path'] . DIRECTORY_SEPARATOR . 'linkmgr')) {
	@mkdir($config['image_uploads_path'] . DIRECTORY_SEPARATOR . 'linkmgr');
}

// put mention into the admin log
$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('installed',$this->GetVersion()));

?>