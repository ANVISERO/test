<?php

if (!isset($gCms)) exit;

$errors = array();

if(!$this->CheckPermission('LinkMgr: modify links')) {

	$errors[] = $this->Lang('needpermission', array($this->Lang('modlinkslisting')));

} else {

	$db =& $this->GetDb();

	$query = 'SELECT 0 FROM ' . cms_db_prefix() . 'module_linkmgr_categories WHERE cat_id=?';

	$result = $db->Execute($query, array($params['cat_id']));

	if(!$result->FetchRow()) {

		$errors[] = $this->Lang('nosuchid', array($params['cat_id']));

	} else {

		$query = "UPDATE ".cms_db_prefix()."module_linkmgr_links SET link_cat = '' WHERE link_cat = ?";
		$db->Execute($query, array($cat_id));

		$query = 'DELETE FROM ' . cms_db_prefix() . 'module_linkmgr_categories WHERE cat_id=?';
		
		$result = $db->Execute($query, array($params['cat_id']));

		if(!$result) {

			$errors[] = 'SQL ERROR: ' . $db->ErrorMsg() . '(with ' . $db->sql . ')';

		} else {

			$this->Redirect($id, 'defaultadmin', $returnid, array('active_tab' => 'categories', 'message' => 'postdeletecat'));

		}

	}

}

$this->Redirect($id, 'defaultadmin', $returnid, array('active_tab' => 'categories', 'errors' => $errors))

?>
