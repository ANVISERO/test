<?php
if (!isset($gCms)) exit;

if (! $this->CheckPermission('Administer Quizzes'))
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}

$db =& $gCms->GetDb();

$name='';
$desc='';
		
if (isset($params['quiz_id']))
	{
	$query = "DELETE FROM ".cms_db_prefix().
		"module_qz_answers WHERE quiz_id=?";
	$dbresult = $db->Execute($query,array($params['quiz_id']));
	$query = "DELETE FROM ".cms_db_prefix().
		"module_qz_questions WHERE quiz_id=?";
	$dbresult = $db->Execute($query,array($params['quiz_id']));
	$query = "DELETE FROM ".cms_db_prefix().
		"module_qz_quizzes WHERE quiz_id=?";
	$dbresult = $db->Execute($query,array($params['quiz_id']));

	$params['module_message'] = $this->Lang('quizdeleted');

	}
else
	{
	$params['module_message'] = $this->Lang('error');
	}
//$this->Redirect($id, 'defaultadmin', $returnid, $params);
$this->DoAction('defaultadmin', $id, $params);
?>