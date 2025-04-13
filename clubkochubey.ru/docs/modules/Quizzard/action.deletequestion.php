<?php
if (!isset($gCms)) exit;

if (! $this->CheckPermission('Administer Quizzes'))
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}

$db =& $gCms->GetDb();

	
if (isset($params['question_id']))
	{
	$query = "DELETE FROM ".cms_db_prefix().
		"module_qz_questions WHERE question_id=?";
	$dbresult = $db->Execute($query,array($params['question_id']));

	$query = "DELETE FROM ".cms_db_prefix().
		"module_qz_answers WHERE question_id=?";
	$dbresult = $db->Execute($query,array($params['question_id']));

	$query = "DELETE FROM ".cms_db_prefix().
		"module_qz_result WHERE question_id=?";
	$dbresult = $db->Execute($query,array($params['question_id']));

	$params['module_message'] = $this->Lang('questiondeleted');

	}
else
	{
	$params['module_message'] = $this->Lang('error');
	}
//$this->Redirect($id, 'editquiz', $returnid, $params);
$this->DoAction('editquiz', $id, $params, $returnid);
?>