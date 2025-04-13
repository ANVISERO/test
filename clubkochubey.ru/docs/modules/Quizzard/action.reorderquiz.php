<?php
if (!isset($gCms)) exit;
if (! $this->CheckPermission('Administer Quizzes'))
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}


$this->listQuestions($id, $params, $returnid);

$this->smarty->assign('start_form',$this->CreateFormStart($id,
			'reorderstore', $returnid, 'post'));
$this->smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', $this->Lang('reorder'),'onclick="return send_order_var()"'));
$this->smarty->assign('end_form',$this->CreateFormEnd());
$this->smarty->assign('id',$id);
$this->smarty->assign('hidden',$this->CreateInputHidden($id,'quiz_id',$params['quiz_id']));
$this->smarty->assign_by_ref('fields',$fields);

echo $this->ProcessTemplate('reorderquiz.tpl');
?>