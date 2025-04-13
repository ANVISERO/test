<?php
if (!isset($gCms)) exit;

if (! $this->CheckPermission('Administer Quizzes'))
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}

if ($this->GetPreference('show_palette','0') == '1')
	{
	include "accented.php";
	include "palette_include.php";
	}


$db =& $gCms->GetDb();

$qtype=isset($params['qtype'])?$params['qtype']:'';
$qtitle='';
$is_scored = 1;
$question='';
	
	
$types = array($this->Lang('select_one')=>'',$this->Lang('type_m')=>'m',
$this->Lang('type_c')=>'c',$this->Lang('type_f')=>'f',$this->Lang('type_p')=>'p',
$this->Lang('type_s')=>'s',$this->Lang('type_t')=>'t',$this->Lang('type_b')=>'b');

	
if (isset($params['question_id']))
	{
	$query = "SELECT * FROM ".cms_db_prefix().
		"module_qz_questions WHERE question_id=?";
	$dbresult = $db->Execute($query,array($params['question_id']));
	if ($dbresult !== false && $row = $dbresult->FetchRow())
		{
		if ($qtype == '')
			{
				$qtype = $row['question_type'];
			}
		$qtitle = $row['title'];
		$question = $row['question'];
		$is_scored = $row['is_scored'];
		}
	$this->smarty->assign('hidden',$this->CreateInputHidden($id,
		'question_id',$params['question_id']).$this->CreateInputHidden($id,
		'quiz_id',$params['quiz_id']));
	}
else
	{
	$this->smarty->assign('hidden',$this->CreateInputHidden($id,
		'question_id',-1).$this->CreateInputHidden($id,
		'quiz_id',$params['quiz_id']));
	}

$this->smarty->assign('startform', $this->CreateFormStart($id, 'savequestion', $returnid));
$this->smarty->assign('endform', $this->CreateFormEnd());
$this->smarty->assign('save', $this->CreateInputSubmit($id, 'save',
	$this->Lang('save')));

$this->smarty->assign('title_question_scored',$this->Lang('title_question_scored'));
$this->smarty->assign('input_question_scored', $this->CreateInputCheckbox($id, 'question_scored', $is_scored, 1).$this->Lang('title_question_scored_help'));


$this->smarty->assign('title_question_text',$this->Lang('title_question_text'));
if ($qtype == 'f' || $qtype == 'c' || $qtype == 'm')
	{
	$this->smarty->assign('input_question_text',$this->CreateTextArea(($this->GetPreference('wysiwyg_questions','') == '1'), $id, $question, 'question_text', 'quizzard_area_short', 'question_text', '', '', '60', '10'));		
	}
else if ($qtype == 'p')
	{
	$this->smarty->assign('input_question_text',$this->CreateTextArea((get_preference(get_userid(), 'wysiwyg')!=""), $id, $question, 'question_text', '', 'question_text', '', '', '60', '10'));	
	}
else if ($qtype != '')
	{
	$this->smarty->assign('input_question_text',$this->CreateInputText($id, 'question_text', $question, 40, 255));
	}
$this->smarty->assign('title_question_type',$this->Lang('title_question_type'));
$this->smarty->assign('title_question_title',$this->Lang('title_question_title'));
$this->smarty->assign('input_question_title',$this->CreateInputText($id, 'question_title', $qtitle, 40, 80));

$this->smarty->assign('title_answer_text',$this->Lang('title_answer_text'));
$this->smarty->assign('title_answer_text_help',$this->Lang('title_answer_text_help'));

if ($this->GetPreference('multiple_fillin', '1') == '1')
	{
	$this->smarty->assign('title_multiple_fill_help',$this->Lang('title_multiple_fill_help'));
	}
else
	{
	$this->smarty->assign('title_multiple_fill_help','');
	}
	
$this->smarty->assign('input_question_type', $this->CreateInputDropdown($id, 'question_type', $types, -1, $qtype,'onChange="fast_add(this)"'));
$this->smarty->assign('qtype',$qtype);
$this->smarty->assign('quiz_id',$params['quiz_id']);
$this->smarty->assign('question_id',isset($params['question_id'])?$params['question_id']:'-1');
$this->smarty->assign('reloadlink',html_entity_decode($this->CreateLink($id,'editquestion',$returnid,'',array(),'',true)));
$this->smarty->assign('id',$id);

$this->smarty->assign('max_answers',$this->GetPreference('max_answers',6));
$this->smarty->assign('message',isset($params['module_message'])?$params['module_message']:'');
$this->smarty->assign('back_to_main',$this->CreateLink($id, 'defaultadmin', $returnid, $this->Lang('back_to_main'), array()));
$this->smarty->assign('back_to_quiz','&gt;'.$this->CreateLink($id, 'editquiz', $returnid, $this->Lang('back_to_quiz'),
	array('quiz_id'=>$params['quiz_id'])));


$this->listAnswers($id, $params, $returnid);
	
echo $this->ProcessTemplate('editquestion.tpl');
?>