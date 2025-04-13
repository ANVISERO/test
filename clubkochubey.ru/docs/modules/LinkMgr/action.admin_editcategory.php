<?php

if (!isset($gCms)) exit;

if (isset($params['cancel'])) 
	$this->Redirect($id, 'defaultadmin', $returnid, array('active_tab' => 'categories'));

$db =& $this->GetDb();

$errors 	= array();

$cat_id 	= (isset($params['cat_id']) ? $params['cat_id'] : '');
$link_category 	= (isset($params['link_category']) ? $params['link_category'] : '');

if(isset($params['submit']) || isset($params['apply'])) {

	if(!$this->CheckPermission('LinkMgr: modlinkslisting')) {

		$errors[] = $this->Lang('needpermission', array($this->Lang('needpermission')));

	} else {

		if($params['link_category'] != '') {


			$query = 'UPDATE ' . cms_db_prefix() . 'module_linkmgr_categories 

				SET
					link_category=? 
				WHERE 
					cat_id=' . $cat_id;

			$result = $db->Execute($query, array($link_category));


			if(!$result) {

				$errors[] = 'SQL ERROR: ' . $db->ErrorMsg() . '(with ' . $db->sql . ')';

			} else {

				if(!isset($params['apply'])) {

					$this->Redirect($id, 'defaultadmin', $returnid, array('active_tab' => 'categories', 'message' => 'changessaved'));

				} else {

					echo $this->ShowMessage($this->Lang('changessaved'));

				}

			}

		} else {

			if($params['link_category'] == '')
				$errors[] = $this->Lang('no_category');

		}

	}


} else {

	$query = 'SELECT * FROM ' . cms_db_prefix() . 'module_linkmgr_categories WHERE cat_id = ' . $cat_id;

	$dbresult =& $db->Execute($query);

	if(!$dbresult) {

		$errors[] = $this->Lang('nosuchid', array($cat_id));
		$cat_id = '';

	} else {

		$row 		= $dbresult->FetchRow();
		$link_category	= $row['link_category'];

	}

}

if(count($errors))
	echo $this->ShowErrors($errors);

if(isset($params['cat_id']))
	$smarty->assign('idfield', $this->CreateInputHidden($id, 'cat_id', $params['cat_id']));

$smarty->assign('startform', $this->CreateFormStart($id, 'admin_editcategory', $returnid));
$smarty->assign('endform', $this->CreateFormEnd());

$smarty->assign('prompt_link_category', $this->Lang('prompt_link_category'));

$smarty->assign('input_link_category', $this->CreateInputText($id, 'link_category', $link_category));

$smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', lang('submit')));
$smarty->assign('apply', $this->CreateInputSubmit($id, 'apply', lang('apply')));
$smarty->assign('cancel', $this->CreateInputSubmit($id, 'cancel', lang('cancel')));

echo $this->ProcessTemplate('editcategories.tpl');

?>