<?php
if (!isset($gCms)) exit;

if (! $this->CheckPermission('Administer Quizzes'))
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}

$db =& $gCms->GetDb();
		
if (! isset($params['quiz_id']) || $params['quiz_id'] == -1)
	{
   	$quiz_id = $db->GenID(cms_db_prefix().'module_qz_quizzes_seq');
	$query = 'INSERT INTO '. cms_db_prefix().
				'module_qz_quizzes (quiz_id, name, description) VALUES (?,?,?)';

	$dbresult = $db->Execute($query,array($quiz_id,
               	$params['quiz_name'],$params['quiz_desc']));
    if ($dbresult === false)
       {
       return $this->DisplayErrorPage($id, $params, $returnid, $db->ErrorMsg());
       }
    $params['quiz_id'] = $quiz_id;
	}
else
	{
	$query = 'UPDATE '. cms_db_prefix().
				'module_qz_quizzes set name=?, description=? where quiz_id=?';

	$dbresult = $db->Execute($query,array(
               	$params['quiz_name'],$params['quiz_desc'],
               	$params['quiz_id']));
    if ($dbresult === false)
       {
       return $this->DisplayErrorPage($id, $params, $returnid, $db->ErrorMsg());
       }
	}

$params['module_message'] = $this->Lang('quiz_saved');

if (isset($params['save']))
	{
	$this->DoAction('editquiz', $id, $params, $returnid);
	//$this->Redirect($id, 'editquiz', $returnid, $params);
	}
else
	{
	$this->DoAction('defaultadmin', $id, $params, $returnid);
	//$this->Redirect($id, 'defaultadmin', $returnid, $params);
	}
?>