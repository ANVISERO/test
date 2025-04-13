<?php
if (!isset($gCms)) exit;
if (! $this->CheckPermission('Administer Quizzes'))
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}

if (! isset($params['quiz_id']))
	{
	echo $this->Lang('specify_quiz');
	return;
	}

//debug_display($params);

$db =& $gCms->GetDb();


$resetChoices = "UPDATE ".cms_db_prefix().
   				"module_qz_answers SET is_correct=0 WHERE question_id=? and quiz_id=?";
$setChoice = "UPDATE ".cms_db_prefix().
   				"module_qz_answers SET is_correct=1 WHERE answer_id=?";

$updateFillin = "UPDATE ".cms_db_prefix().
   				"module_qz_answers SET answer=? WHERE answer_id=?";

foreach ($params as $key=>$val)
   {
   if (substr($key,0,2) == 'q_')
   		{
   		$qid = substr($key,2);
   		if (strpos($qid,'_') !== false)
   			{
   			$qid = substr($qid,0,strpos($qid,'_'));
   			}
   		$typeParam = $params['t_'.$qid];
   		if ($typeParam == 'f')
   			{
   			$id_parts = explode('_',$key);
   			$dbresult = $db->Execute($updateFillin,array($val,$id_parts[2]));
   			}
   		elseif ($typeParam == 'c')
   			{
   			$dbresult = $db->Execute($resetChoices,
   				array($qid, $params['quiz_id']));
   			foreach ($val as $thisOne)
   				{
   				$dbresult = $db->Execute($setChoice,array($thisOne));
   				}
   			}
   		elseif ($typeParam == 'm')
   			{
   			$dbresult = $db->Execute($resetChoices,
   				array($qid, $params['quiz_id']));
			$dbresult = $db->Execute($setChoice,
				array($val));
   			}
   		}
   }
$params['message'] = $this->Lang('validated');	
$this->DoAction('managequiz', $id, $params, $returnid);
?>