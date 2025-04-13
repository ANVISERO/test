<?php
if (!isset($gCms)) exit;
if (! $this->CheckPermission('Administer Quizzes'))
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}

$db =& $gCms->GetDb();

$this->smarty->assign('startform', $this->CreateFormStart($id, 'showquizresults', $returnid,'post','',  ($this->GetPreference('quiz_inline','1')=='1')));
$this->smarty->assign('endform', $this->CreateFormEnd());
$this->smarty->assign('id',$id);

if (!isset($params['quiz_id']))
	{
	$this->smarty->assign('submit', $this->CreateInputSubmit($id, 'qzz_submit',
			$this->Lang('continue')));	
	$this->smarty->assign('items',$this->getQuizList($id, $params, $returnid));
	$this->smarty->assign('title_quiz_name',$this->Lang('title_quiz_name'));
	$this->smarty->assign('hidden','');
	$this->smarty->assign('step','first');
	echo $this->ProcessTemplate('reload_quiz.tpl');
	return;
	}
elseif (! isset($params['qzz_taker']))
	{
	$this->smarty->assign('submit', $this->CreateInputSubmit($id, 'qzz_submit',
			$this->Lang('get_results')));
	
	$sort_by = 't.completed_date DESC, t.name ASC';
	if (isset($params['sort_by']))
		{
		if ($params['sort_by']=='name')
			{
			$sort_by = 't.name ASC, t.completed_date DESC';
			}
		else if ($params['sort_by']=='email')
			{
			$sort_by = 't.email ASC, t.completed_date DESC';
			}
		}
//	$query = 'SELECT t.taker_id, t.email, t.name, t.completed_date from '.cms_db_prefix().
//		'module_qz_takers t, '.cms_db_prefix().'module_qz_ where t.completed=1 order by '.$sort_by;
	$query = 'select t.taker_id, t.email, t.name, t.completed_date, t.completed_score from '.cms_db_prefix().
		'module_qz_takers t where t.completed=1  and (select count(*) from '.cms_db_prefix().
		'module_qz_result r where r.taker_id=t.taker_id and r.quiz_id=?) > 0 order by '.$sort_by;
	
	$dbresult = $db->Execute($query,array($params['quiz_id']));
	$takers = array();
	while ($dbresult !== false && $row = $dbresult->FetchRow())
		{
		$onerow = new stdClass();
		$onerow->id = $row['taker_id'];
		$onerow->email = $row['email'];
		$onerow->takername = $row['name'];
		$onerow->score = $row['completed_score'];
		$onerow->linkname = $this->CreateLink($id,
					'showquizresults', $returnid,
					$row['name'], array('quiz_id'=>$params['quiz_id'],
					'qzz_taker'=>$row['taker_id']));
		$onerow->viewlink = $this->CreateLink($id,
					'showquizresults', $returnid,
					$gCms->variables['admintheme']->DisplayImage('icons/system/view.gif',
		       			$this->Lang('browse_results'),'','','systemicon'), array('quiz_id'=>$params['quiz_id'],
					'qzz_taker'=>$row['taker_id']));
		$onerow->completed_date = date("j M Y, ga",$db->UnixTimeStamp($row['completed_date']));
		array_push($takers,$onerow);
		}
		
	$this->smarty->assign('hidden',$this->CreateInputHidden($id,'quiz_id',$params['quiz_id']));
	$this->smarty->assign('sort_column_name',$this->CreateLink($id,
				'showquizresults', $returnid,
				$this->Lang('column_name'), array('quiz_id'=>$params['quiz_id'],
				'sort_by'=>'name')));	
	$this->smarty->assign('sort_column_completed',$this->CreateLink($id,
				'showquizresults', $returnid,
				$this->Lang('column_completed'), array('quiz_id'=>$params['quiz_id'],
				'sort_by'=>'date')));	
	$this->smarty->assign('sort_column_email',$this->CreateLink($id,
				'showquizresults', $returnid,
				$this->Lang('column_email'), array('quiz_id'=>$params['quiz_id'],
				'sort_by'=>'email')));	
	$this->smarty->assign('column_score',$this->Lang('column_score'));
	$this->smarty->assign('input_quiz_taker_email',$takers);
	$this->smarty->assign('taker_list','1');
	$this->smarty->assign('step','second');

	echo $this->ProcessTemplate('reload_quiz.tpl');
	return;
	}
else
	{
	if (is_numeric($params['qzz_taker']))
		{
		$taker_id = $params['qzz_taker'];
		}
	else
		{
		$query = 'SELECT taker_id from '.cms_db_prefix().'module_qz_takers where email=?';
		$user = $db->GetRow($query,array($params['qzz_taker']));
		if ($user === false)
			{
			$taker_id = $row['taker_id'];
			}
		else
			{
			$params['module_message'] = $this->Lang('cant_find_user');
			unset($params['qzz_taker']);
			$this->DoAction('showquizresults',$id,$params,$returnid);
			}
		}
	$params['qzz_taker_id'] = $taker_id;

	list($score, $questions) = $this->computeScore($id, $params, $returnid);
	$this->nerfQuestionsForDisplay($questions->questions);
	$this->setFormSmarty($id, $returnid, $params, $questions->this_page, $questions->page_count, $questions->questions);

	$query = 'SELECT name from '.cms_db_prefix().'module_qz_quizzes where quiz_id=?';
	$quiz = $db->GetOne($query,array($params['quiz_id']));
	
	$query = 'SELECT * from '.cms_db_prefix().'module_qz_takers where taker_id=?';
	$user = $db->GetRow($query,array($taker_id));

	$this->smarty->assign('taker_name',$user['name']);
	$this->smarty->assign('taker_email',$user['email']);

	$extras = $this->getPopulatedExtraFields($id, $params, $taker_id, false);
	$this->smarty->assign('extras',$extras);

	$this->smarty->assign('quiz_name',$quiz['name']);
    $this->smarty->assign('reviewing','1');
	$this->smarty->assign('title_quiz_complete',$this->Lang('title_quiz_complete'));
	$this->smarty->assign('title_quiz_summary',$this->Lang('title_quiz_summary'));
	$this->smarty->assign('title_your_answer',$this->Lang('title_your_answer'));
	$this->smarty->assign('title_skipped',$this->Lang('title_skipped'));
	$this->smarty->assign('title_correct',$this->Lang('title_correct'));
	$this->smarty->assign('title_correct_answer',$this->Lang('title_correct_answer'));

	echo $this->ProcessTemplateFromDatabase('score_template','Quizzard');
}

?>