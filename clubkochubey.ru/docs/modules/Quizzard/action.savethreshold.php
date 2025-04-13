<?php
if (!isset($gCms)) exit;

if (! $this->CheckPermission('Administer Quizzes'))
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}

$this->SetPreference('threshold_message', isset($params['threshold_message'])?$params['threshold_message']:'');
$this->SetPreference('threshold', isset($params['threshold'])?$params['threshold']:'');
$this->SetPreference('threshold_single_page', isset($params['threshold_single_page'])?$params['threshold_single_page']:'');
$this->SetPreference('question_wrong', isset($params['question_wrong'])?$params['question_wrong']:'');

$params = array('tab_message'=> 'prefsupdated', 'active_tab' => 'threshold');
$this->DoAction('defaultadmin', $id, $params, $returnid);
?>