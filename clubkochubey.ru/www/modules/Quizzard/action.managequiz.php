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

if ($this->GetPreference('show_palette','0') == '1')
	{
	include "accented.php";
	include "palette_include.php";
	}
	
	//debug_display($params);

$params['get_all'] = true;
if (isset($params['show']))
   {
   $this->smarty->assign('show_line_numbers','1');
   }
else
   {
   $this->smarty->assign('show_line_numbers','0');
   }
$params['qzz_get_all']=true;
$this->getQuestionPage($id,$params,$returnid,true);

$this->smarty->assign('startform', $this->CreateFormStart($id,
	'validatequiz', $returnid));
$this->smarty->assign('endform', $this->CreateFormEnd());
$this->smarty->assign('submit', $this->CreateInputHidden($id,'quiz_id',$params['quiz_id']).$this->CreateInputSubmit($id, 'submit',
		$this->Lang('validate')));
$this->smarty->assign('title_unscored',$this->Lang('title_unscored'));
$this->smarty->assign('back_to_main',$this->CreateLink($id, 'defaultadmin', $returnid,$this->Lang('back_to_main'), array()));

$this->smarty->assign('message',
	isset($params['message'])?$params['message']:'');

echo $this->ProcessTemplate('managequiz.tpl');
?>