<?php
if (!isset($gCms)) exit;

if (! $this->CheckPermission('Administer Quizzes'))
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}

if (isset($params['quiz_template']) && ! empty($params['quiz_template']))
	{
	$this->SetTemplate('quiz_template',$params['quiz_template'],'Quizzard');
	}
if (isset($params['score_template']) && ! empty($params['score_template']))
	{	
	$this->SetTemplate('score_template',$params['score_template'],'Quizzard');
	}
if (isset($params['signup_template']) && ! empty($params['signup_template']))
	{
	$this->SetTemplate('signup_template',$params['signup_template'],'Quizzard');
	}
if (isset($params['email_template']) && ! empty($params['email_template']))
	{
	$this->SetTemplate('email_template',$params['email_template'],'Quizzard');
	}

$this->SetPreference('html_email', isset($params['html_email'])?$params['html_email']:'');

//$params['module_message'] = $this->Lang('templatesupdated');
$params = array('tab_message'=> 'templatesupdated', 'active_tab' => 'template');
$this->DoAction('defaultadmin', $id, $params, $returnid);
//$this->Redirect($id, 'defaultadmin', $returnid, $params);

?>