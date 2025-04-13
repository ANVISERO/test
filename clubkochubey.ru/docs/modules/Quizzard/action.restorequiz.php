<?php
if (!isset($gCms)) exit;

if (! isset($params['quiz_id']))
	{
	echo $this->Lang('specify_quiz');
	return;
	}

$taker_id = $this->getTakerId($params['quiz_id']);

$db =& $gCms->GetDb();

$query = 'SELECT * FROM '. cms_db_prefix().
				'module_qz_takers where taker_id=?';
$prev = $db->GetRow($query,array($taker_id));


if (isset($params['qzz_new_quiz']))
    {
   $taker_id = $db->GenID(cms_db_prefix().'module_qz_takers_seq');
	$query = 'INSERT INTO '. cms_db_prefix().
				'module_qz_takers (taker_id, name, email, send_result, completed) VALUES (?,?,?,?,?)';

	$dbresult = $db->Execute($query,array($taker_id,
               	$prev['name'],
               	$prev['email'],
               	$prev['send_result'],0));
    if ($dbresult === false)
       {
       return $this->DisplayErrorPage($id, $params, $returnid, $db->ErrorMsg());
       }

    $this->setTakerId($taker_id, $params['quiz_id']);
    $params['question']=0;
    //return $this->DoAction('takequiz',$id, $params, $returnid);
	return $this->Redirect($id, 'takequiz', $returnid, $params,  ($this->GetPreference('quiz_inline','1')=='1'));

    }
else if (isset($params['qzz_old_quiz']))
    {
    return $this->DoAction('takequiz', $id, $params, $returnid);
    }

	
$this->smarty->assign('quiz_id',$this->CreateInputHidden($id,'quiz_id',$params['quiz_id']));

$this->smarty->assign('startform', $this->CreateFormStart($id, 'restorequiz', $returnid,
	'post','',  ($this->GetPreference('quiz_inline','1')=='1')));
$this->smarty->assign('endform', $this->CreateFormEnd());

$this->smarty->assign('title_restore_debug',$this->Lang('title_restore_debug',array($params['quiz_id'], $taker_id, $prev['start_date'])));

$this->smarty->assign('title_restore_help',$this->Lang('title_restore_help'));
$this->smarty->assign('new_quiz', $this->CreateInputSubmit($id, 'qzz_new_quiz',
		$this->Lang('title_start_over')));
$this->smarty->assign('old_quiz', $this->CreateInputSubmit($id, 'qzz_old_quiz',
		$this->Lang('title_resume_old')));
        
echo $this->ProcessTemplate('restore.tpl');
?>