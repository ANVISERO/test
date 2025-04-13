<?php
if (!isset($gCms)) exit;

if (! isset($params['quiz_id']))
	{
	echo $this->Lang('specify_quiz');
	return;
	}
	
//debug_display($params);

$this->saveQuestionAnswers($id,$params,$returnid);

$this->smarty->assign('message','');
$wrongonly = false;

if (isset($params['qzz_back']))
	{
	// going back
	$params['qzz_page'] =  $params['qzz_prev_page'];
	}
else if (isset($params['qzz_submit']))
	{
	// quiz could be done!
	// check if it meets the threshold
	list($score, $questions) = $this->computeScore($id, $params, $returnid);
	if ($score < $this->GetPreference('threshold',0))
		{
		// send 'em back for more	
		$wrongonly = true;
		}
	else
		{
		// they're good.
		$this->nerfQuestionsForDisplay($questions->questions);
		$this->setFormSmarty($id, $returnid, $params, $questions->this_page, $questions->page_count, $questions->questions);
		$this->storeScore($params['quiz_id'],$score);
		$this->DoAction('scorequiz', $id, $params, $returnid);
		return;
		}
	}
else if (isset($params['qzz_save']))
	{
//	debug_display($params);
	$this->setTakerId($this->getTakerId($params['quiz_id']),
		$params['quiz_id'], false);
	$this->smarty->assign('message',$this->Lang('quiz_saved'));
	}
else
	{
	// going forward
	$params['qzz_page'] =  (isset($params['qzz_next_page'])?$params['qzz_next_page']:1);
	}

if ($wrongonly)
	{
	$params['qzz_remedial'] = $this->getTakerId($params['quiz_id']).$params['quiz_id'];
	if ($this->GetPreference('threshold_single_page','0')=='1')
		{
		$has_text = $this->makeQuestionsForms($id, $params, $returnid, false, $questions->questions);		
		$this->filterForWrongAnswers($questions->questions);
		$this->setFormSmarty($id, $returnid, $params, $questions->this_page, $questions->page_count, $questions->questions);
		}
	else
		{
		$params['qzz_page'] = 1;
		$has_text = $this->getQuestionPage($id,$params,$returnid,false);
		}
	}
else
	{
	$has_text = $this->getQuestionPage($id,$params,$returnid,false);
	}

if ($has_text && $this->GetPreference('show_palette','0') == '1')
	{
	include "accented.php";
	include "palette_include.php";			
	}


if (isset($params['qzz_remedial']))
	{
	$this->smarty->assign('message',$this->GetPreference('threshold_message'));
	}


if ($this->GetPreference('save_button','0') == '1')
	{
	$this->smarty->assign('save', $this->CreateInputSubmit($id, 'qzz_save',
		$this->Lang('save_later')));
	}
else
	{
	$this->smarty->assign('save', '');
	}

$this->smarty->assign('startform', $this->CreateFormStart($id,
	'takequiz', $returnid,'post','',  ($this->GetPreference('quiz_inline','1')=='1')));
$this->smarty->assign('endform', $this->CreateFormEnd());
if ($params['qzz_page'] > 1 && !$wrongonly)
	{
	$this->smarty->assign('back', $this->CreateInputSubmit($id, 'qzz_back',
		$this->Lang('back')));
	}
else
	{
	$this->smarty->assign('back', '');	
	}
$this->smarty->assign('continue', $this->CreateInputSubmit($id, 'qzz_continue',
	$this->Lang('continue')));
if (isset($params['qzz_lastpage']) && $params['qzz_lastpage'] == 1)
	{
	$this->smarty->assign('submit', $this->CreateInputSubmit($id, 'qzz_submit',
		$this->Lang('submit')));	
	}


$this->smarty->assign('question_wrong',$this->GetPreference('question_wrong'));


echo $this->ProcessTemplateFromDatabase('quiz_template','Quizzard');
?>