<?php
if (!isset($gCms)) exit;

if (! $this->CheckPermission('Administer Quizzes'))
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}

$db =& $gCms->GetDb();
	
	
$question_id = $params['question_id'];

if ($params['question_type'] == 'b' || $params['question_type'] == 's' ||
	$params['question_type'] == 't')
	{
	unset($params['question_scored']);
	}

if (! isset($params['question_id']) || $params['question_id'] == -1)
	{
   	$qorder_by = $db->GetOne("select max(order_by) from ".cms_db_prefix().
   		"module_qz_questions where quiz_id=?",array($params['quiz_id']));
   	$qorder_by++;
   	$question_id = $db->GenID(cms_db_prefix().'module_qz_questions_seq');
	$query = 'INSERT INTO '. cms_db_prefix().
				'module_qz_questions (question_id, quiz_id, question_type, question, title, is_scored, order_by) VALUES (?,?,?,?,?,?,?)';

	$dbresult = $db->Execute($query,array($question_id,
               	$params['quiz_id'],
               	$params['question_type'],
				(isset($params['question_text'])?$params['question_text']:''),
               	(isset($params['question_title'])?$params['question_title']:''),
               	(isset($params['question_scored'])?'1':'0'),
               	$qorder_by));
    if ($dbresult === false)
       {
       return $this->DisplayErrorPage($id, $params, $returnid, $db->ErrorMsg());
       }
	}
else
	{
	$query = 'UPDATE '. cms_db_prefix().
				'module_qz_questions set question_type=?, question=?, title=?,is_scored=? where question_id=?';

	$dbresult = $db->Execute($query,array(
               	$params['question_type'],
				(isset($params['question_text'])?$params['question_text']:''),
				(isset($params['question_title'])?$params['question_title']:''),
               	(isset($params['question_scored'])?'1':'0'),
               	$params['question_id']));
    if ($dbresult === false)
       {
       return $this->DisplayErrorPage($id, $params, $returnid, $db->ErrorMsg());
       }
	$query = 'DELETE FROM '.cms_db_prefix().
		'module_qz_answers where question_id=?';
	$dbresult = $db->Execute($query,array($params['question_id']));
	if ($dbresult === false)
   		{
   		return $this->DisplayErrorPage($id, $params,
   			$returnid, $db->ErrorMsg());
   		}
	}

for($i=0;$i<$this->GetPreference('max_answers',6);$i++)
	{
	if (isset($params["answer$i"]) && ! empty($params["answer$i"]))
		{
   		$answer_id = $db->GenID(cms_db_prefix().'module_qz_answers_seq');
		
		$query = 'INSERT INTO '.cms_db_prefix().'module_qz_answers (answer_id, question_id, quiz_id, is_correct, answer) VALUES (?,?,?,?,?)';
		// break this into multiple if statements for easier reading :)
		$cor = 0;
		if ($params['question_type']=='f')
			{
			$cor = 1;
			}
		else if ($params['question_type']=='m' && isset($params['rad'.$params['question_id']]) && $params['rad'.$params['question_id']]==$i)
			{
			$cor = 1;
			}
		else if ($params['question_type']=='c' && isset($params['check'.$i]))
			{
			$cor = 1;
			}

		$dbresult = $db->Execute($query,array($answer_id,
			$question_id,
			$params['quiz_id'],
			$cor,
			$params["answer$i"]));
		if ($dbresult === false)
   			{
   			return $this->DisplayErrorPage($id, $params, $returnid, $db->ErrorMsg());
   			}
		}
	}



$params['module_message'] = $this->Lang('question_saved');

//$this->Redirect($id, 'editquiz', $returnid, $params);
$this->DoAction('editquiz', $id, $params, $returnid);
?>