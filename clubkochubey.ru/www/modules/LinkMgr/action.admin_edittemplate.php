<?php

if (!isset($gCms)) exit;

if (isset($params['cancel'])) 
	$this->Redirect($id, 'defaultadmin', $returnid, array('active_tab' => 'templates'));

$db =& $this->GetDb();

$errors 	= array();

$entry_id 	= (isset($params['entry_id']) ? $params['entry_id'] : '');
$template_name 	= (isset($params['template_name']) ? $params['template_name'] : '');
$template_text 	= (isset($params['template_text']) ? $params['template_text'] : '');

if(isset($params['submit']) || isset($params['apply'])) {

	if(!$this->CheckPermission('LinkMgr: modify templates')) {

		$errors[] = $this->Lang('needpermission', array($this->Lang('modtemplates')));

	} else {

		if($params['template_name'] != '' && $params['template_text'] != '') {


			$query = 'UPDATE ' . cms_db_prefix() . 'module_linkmgr_templates 

				SET
					name=?,
					content=? 
				WHERE 
					entry_id=' . $entry_id;

			$result = $db->Execute($query, array($template_name, $template_text));


			if(!$result) {

				$errors[] = 'SQL ERROR: ' . $db->ErrorMsg() . '(with ' . $db->sql . ')';

			} else {

				if(!isset($params['apply'])) {

					$this->Redirect($id, 'defaultadmin', $returnid, array('active_tab' => 'templates', 'message' => 'changessaved'));

				} else {

					echo $this->ShowMessage($this->Lang('changessaved'));

				}

			}

		} else {

			if($params['template_name'] == '')
				$errors[] = $this->Lang('no_template_name');

			if($params['template_text'] == '')
				$errors[] = $this->Lang('no_template_code');

		}

	}


} else {

	$query = 'SELECT * FROM ' . cms_db_prefix() . 'module_linkmgr_templates WHERE entry_id = ' . $entry_id;

	$dbresult =& $db->Execute($query);

	if(!$dbresult) {

		$errors[] = $this->Lang('nosuchid', array($entry_id));
		$entry_id = '';

	} else {

		$row 		= $dbresult->FetchRow();
		$template_name	= $row['name'];
		$template_text	= $row['content'];

	}

}

if(count($errors))
	echo $this->ShowErrors($errors);

if(isset($params['entry_id']))
	$smarty->assign('idfield', $this->CreateInputHidden($id, 'entry_id', $params['entry_id']));

$smarty->assign('startform', $this->CreateFormStart($id, 'admin_edittemplate', $returnid));
$smarty->assign('endform', $this->CreateFormEnd());

$smarty->assign('prompt_template_name', $this->Lang('prompt_template_name'));
$smarty->assign('prompt_template_code', $this->Lang('prompt_template_code'));

$smarty->assign('input_name', $this->CreateInputText($id, 'template_name', $template_name));
$smarty->assign('input_template', $this->CreateTextArea(false, $id, $template_text, 'template_text'));

$smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', lang('submit')));
$smarty->assign('apply', $this->CreateInputSubmit($id, 'apply', lang('apply')));
$smarty->assign('cancel', $this->CreateInputSubmit($id, 'cancel', lang('cancel')));

echo $this->ProcessTemplate('edittemplate.tpl');

?>