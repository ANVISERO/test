<?php

if (!isset($gCms)) exit;

$errors = array();

if(!$this->CheckPermission('LinkMgr: modify links')) {

	$errors[] = $this->Lang('needpermission', array($this->Lang('modlinkslisting')));

} else {

	$db =& $this->GetDb();

	$query = 'SELECT 0 FROM ' . cms_db_prefix() . 'module_linkmgr_links WHERE entry_id=?';

	$result = $db->Execute($query, array($params['entry_id']));

	if(!$result->FetchRow()) {


		$errors[] = $this->Lang('nosuchid', array($params['entry_id']));

	} else {

		$query = 'DELETE FROM ' . cms_db_prefix() . 'module_linkmgr_links WHERE entry_id=?';
		
		$result = $db->Execute($query, array($params['entry_id']));

		if(!$result) {

			$errors[] = 'SQL ERROR: ' . $db->ErrorMsg() . '(with ' . $db->sql . ')';

		} else {

			$this->Redirect($id, 'defaultadmin', $returnid, array('active_tab' => 'links', 'message' => 'postdelete'));

		}

	}

}

$this->Redirect($id, 'defaultadmin', $returnid, array('active_tab' => 'links', 'errors' => $errors))

?>
