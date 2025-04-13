<?php
if (!isset($gCms)) exit;

if (! $this->CheckPermission('Administer Quizzes'))
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}

$db =& $gCms->GetDb();

$name='';
$desc='';
		
if (isset($params['quiz_id']))
	{
	$query = "SELECT * FROM ".cms_db_prefix().
		"module_qz_quizzes WHERE quiz_id=?";
	$dbresult = $db->Execute($query,array($params['quiz_id']));
	if ($dbresult !== false && $row = $dbresult->FetchRow())
		{
		$name = $row['name'];
		$desc = $row['description'];
		}
	$this->smarty->assign('hidden',$this->CreateInputHidden($id,
		'quiz_id',$params['quiz_id']));
	$this->smarty->assign('qidset','1');
	}
else
	{
	$this->smarty->assign('hidden',$this->CreateInputHidden($id,
		'quiz_id',-1));
	$this->smarty->assign('qidset','0');
	}

$this->smarty->assign('startform', $this->CreateFormStart($id, 'savequiz', $returnid));
$this->smarty->assign('endform', $this->CreateFormEnd());
$this->smarty->assign('save', $this->CreateInputSubmit($id, 'save',
	$this->Lang('save')));
$this->smarty->assign('done', $this->CreateInputSubmit($id, 'done',
	$this->Lang('done')));

if (isset($params['quiz_id']))
	{
	$this->smarty->assign('order_field_link',
	$this->CreateLink($id, 'reorderquiz',
   	$returnid,$this->cms->variables['admintheme']->DisplayImage('icons/system/reorder.gif'
   ,$this->Lang('reorder_quiz'),'','','systemicon'),array('quiz_id'=>$params['quiz_id']), '', false) .
   $this->CreateLink($id, 'reorderquiz', $returnid,$this->Lang('reorder_quiz'),
   array('quiz_id'=>$params['quiz_id']), '', false));
	}
else
	{
	$this->smarty->assign('order_field_link','');
	}

$this->smarty->assign('title_quiz_name',$this->Lang('title_quiz_name'));
$this->smarty->assign('title_quiz_desc',$this->Lang('title_quiz_desc'));
$this->smarty->assign('input_quiz_name',$this->CreateInputText($id, 'quiz_name', $name, 40, 255));
$this->smarty->assign('input_quiz_desc',$this->CreateInputText($id, 'quiz_desc', $desc, 40, 255));
$this->smarty->assign('title_save_help',$this->Lang('title_save_help'));

$this->smarty->assign('message',isset($params['module_message'])?$params['module_message']:'');

$this->smarty->assign('back_to_main',$this->CreateLink($id, 'defaultadmin', $returnid,$this->Lang('back_to_main'), array()));


$this->listQuestions($id, $params, $returnid);

echo $this->ProcessTemplate('editquiz.tpl');
?>