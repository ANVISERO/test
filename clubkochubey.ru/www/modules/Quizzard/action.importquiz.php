<?php
if (!isset($gCms)) exit;

if (! $this->CheckPermission('Administer Quizzes'))
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}
				
if ($_FILES[$id.'textfile']['type'] == 'text/xml' ||
	$_FILES[$id.'textfile']['type'] == 'application/xml')
	{
	$this->importQuizXML($id,$params);
	}
else
	{
	// legacy file
	$in_file = array_map('rtrim',file($_FILES[$id.'textfile']['tmp_name']));
	$this->importQuiz($in_file);
	}
	
$params['module_message'] = $this->Lang('quiz_imported');

//$this->Redirect($id, 'defaultadmin', $returnid, $params);
$this->DoAction('defaultadmin', $id, $params, $returnid);
?>