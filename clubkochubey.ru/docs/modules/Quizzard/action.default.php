<?php
if (!isset($gCms)) exit;

if (! isset($params['quiz_id']))
	{
	echo $this->Lang('specify_quiz');
	return;
	}
	
if ($this->getTakerId($params['quiz_id']) != -1)
	{
	$params['question']=0;
	if ($this->GetPreference("save_button",'0') == '1')
		{
		$this->DoAction('restorequiz', $id, $params, $returnid);
		return;
		}
	else
		{
		//$this->Redirect($id, 'takequiz',$returnid, $params);
		$this->DoAction('takequiz', $id, $params, $returnid);		
		return;
		}
	}
	
if ($this->GetPreference('require_user', '1') == '1')
	{
	$this->smarty->assign('req_user',true);
	}
else
	{
	$this->smarty->assign('req_user',false);
	}
	
$extras = $this->getPopulatedExtraFields($id, $params, -1, true);

$this->smarty->assign('extras',$extras);
	
$this->smarty->assign('quiz_id',$this->CreateInputHidden($id,'quiz_id',$params['quiz_id']));

$this->smarty->assign('startform', $this->CreateFormStart($id, 'savequiztaker', $returnid,'post',
	'', ($this->GetPreference('quiz_inline','1')=='1')));
$this->smarty->assign('endform', $this->CreateFormEnd());
$this->smarty->assign('takequiz', $this->CreateInputSubmit($id, 'qzz_takequiz',
	$this->Lang('takequiz')));

$this->smarty->assign('message',isset($params['module_message'])?$params['module_message']:'');
	
	
$this->smarty->assign('title_name',$this->Lang('title_name'));
$this->smarty->assign('title_email',$this->Lang('title_email'));
$this->smarty->assign('title_send_a_copy',$this->Lang('title_send_a_copy'));
$this->smarty->assign('title_send_a_copy_help',$this->Lang('title_send_a_copy_help'));

$this->smarty->assign('input_name',$this->CreateInputText($id, 'qzz_name', isset($params['qzz_name'])?$params['qzz_name']:'', 40, 255));
$this->smarty->assign('input_email',$this->CreateInputText($id, 'qzz_email', isset($params['qzz_email'])?$params['qzz_email']:'', 40, 255));
$this->smarty->assign('input_send_a_copy',$this->CreateInputCheckbox($id, 'qzz_send_a_copy', 1, isset($params['qzz_send_a_copy'])?$params['qzz_send_a_copy']:'').'&nbsp;'.
		  $this->Lang('title_send_a_copy_help'));


        
echo $this->ProcessTemplateFromDatabase('signup_template','Quizzard');
?>