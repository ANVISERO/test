<?php

if (!isset($gCms)) exit;

if (isset($params['cancel'])) 
	$this->Redirect($id, 'defaultadmin', $returnid, array('active_tab' => 'categories'));

if(!$this->CheckPermission('LinkMgr: modify links') ) exit;

$errors 	= array();

$link_category 	= (isset($params['link_category']) ? $params['link_category'] : '');

if(isset($params['submit'])) {

	$db =& $this->GetDb();

	if($link_category != '') {

		$cat_id = $db->GenID(cms_db_prefix()."module_linkmgr_categories_seq");

		$query = 'INSERT INTO ' . cms_db_prefix() . 'module_linkmgr_categories (cat_id, link_category) 
					VALUES (?, ?)';

		$result = $db->Execute($query, array($cat_id, $link_category));

		if(!$result) {

			$errors[] = 'SQL ERROR: ' . $db->ErrorMsg() . '(with ' . $db->sql . ')';

		} else {

			$this->Redirect($id, 'defaultadmin', $returnid, array('active_tab' => 'categories', 'message' => 'changessaved'));

		}

	} else {


		if($params['link_category'] == '')
			$errors[] = $this->Lang('no_category');

	}

}

if(count($errors))
	echo $this->ShowErrors($errors);

if(isset($params['cat_id']))
	$smarty->assign('idfield', $this->CreateInputHidden($id, 'cat_id', $params['cat_id']));

$smarty->assign('startform', $this->CreateFormStart($id, 'admin_addcategory', $returnid));
$smarty->assign('endform', $this->CreateFormEnd());

$smarty->assign('prompt_link_category', $this->Lang('prompt_link_category'));

$smarty->assign('input_link_category', $this->CreateInputText($id, 'link_category', $link_category));

$smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', lang('submit')));
$smarty->assign('cancel', $this->CreateInputSubmit($id, 'cancel', lang('cancel')));

echo $this->ProcessTemplate('editcategories.tpl');

?>