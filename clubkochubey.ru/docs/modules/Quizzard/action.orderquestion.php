<?php
if (!isset($gCms)) exit;

if (! $this->CheckPermission('Administer Quizzes'))
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}

$db =& $gCms->GetDb();
		
if (isset($params['quiz_id']))
	{
	$order = array();
	$query = "SELECT question_id, order_by FROM ".cms_db_prefix().
		"module_qz_questions WHERE question_id in (?,?)";
	$dbresult = $db->Execute($query,array($params['src'],$params['dst']));

    while ($dbresult !== false && $row = $dbresult->FetchRow())
        {
		$order[$row['question_id']] = $row['order_by'];
		}

	$query = "UPDATE ".cms_db_prefix()."module_qz_questions set order_by=? where question_id=?";
	$dbresult = $db->Execute($query,array($order[$params['src']],
		$params['dst']));
	$dbresult = $db->Execute($query,array($order[$params['dst']],
		$params['src']));
	
	}
else
	{
	$params['module_message'] = $this->Lang('error');
	}
//$this->Redirect($id, 'editquiz', $returnid, $params);
$this->DoAction('editquiz', $id, $params, $returnid);
?>