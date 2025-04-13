<?php
if (!isset($gCms)) exit;

$current_version = $oldversion;
$db =& $this->GetDb();

switch($current_version)
{
	case "1.0":
		$dict = NewDataDictionary($db);
		$sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_linkmgr_links", "link_cat I");
		$dict->ExecuteSQLArray($sqlarray);

		$flds = '
			cat_id		I KEY,
			link_category 	C(255)';

		$dict = NewDataDictionary($db);
		$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_linkmgr_categories', $flds, $taboptarray);
		$dict->ExecuteSQLArray($sqlarray);
		$db->CreateSequence(cms_db_prefix()."module_linkmgr_categories_seq");

		$new_id = $db->GenID(cms_db_prefix()."module_linkmgr_categories_seq");
		$flds = '
			INSERT INTO '.cms_db_prefix().'module_linkmgr_categories (
				cat_id,
				link_category)
			VALUES(?,?)';
		$result = $db->Execute($flds, array($new_id, 'General'));
		if(!$result)
			die('Installation Error:' . $db->ErrorMsg() . ' with(' . $db->sql .')');

		$current_version = "1.1";

	case "1.1":

	case "1.2":

	case "1.3":
		$new_id = $db->GenID(cms_db_prefix()."module_linkmgr_templates_seq");
		$flds = '
			INSERT INTO '.cms_db_prefix().'module_linkmgr_templates (
				entry_id,
				name,
				content)
			VALUES(?,?,?)';
		$result = $db->Execute($flds, array($new_id, 'newdefault','<div class="linkmgr">
	<ul>
		{foreach from=$items item="item"}
		    <li><a href="{$item.link_url}" target="_blank">{$item.link_name}</a> - {$item.link_desc}</li>
		{/foreach}
	</ul>
</div>'));
		if(!$result)
			die('Installation Error:' . $db->ErrorMsg() . ' with(' . $db->sql .')');

		$current_version = "1.4";

	case "1.4":
		$dict = NewDataDictionary($db);
		$sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_linkmgr_links", "link_img C(255)");
		$dict->ExecuteSQLArray($sqlarray);

		if (!is_dir($config['image_uploads_path'] . DIRECTORY_SEPARATOR . 'linkmgr')) {
			@mkdir($config['image_uploads_path'] . DIRECTORY_SEPARATOR . 'linkmgr');
		}

		$current_version = "1.5";

	case "1.5":

		$current_version = "1.5.1";

}

$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('upgraded',$this->GetVersion()));
?>