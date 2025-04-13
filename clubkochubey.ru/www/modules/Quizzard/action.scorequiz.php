<?php
if (!isset($gCms)) exit;

if (! isset($params['quiz_id']))
	{
	echo $this->Lang('specify_quiz');
	return;
	}

$db =& $gCms->GetDb();
$taker_id = $this->getTakerId($params['quiz_id']);

//$this->computeScore($id,$params,$returnid);

$query = 'SELECT * from '.cms_db_prefix().'module_qz_quizzes where quiz_id=?';
$quiz = $db->GetRow($query,array($params['quiz_id']));

$this->smarty->assign('quiz_name',$quiz['name']);

$this->smarty->assign('title_quiz_complete',$this->Lang('title_quiz_complete'));
$this->smarty->assign('title_quiz_summary',$this->Lang('title_quiz_summary'));
$this->smarty->assign('title_your_answer',$this->Lang('title_your_answer'));
$this->smarty->assign('title_skipped',$this->Lang('title_skipped'));
$this->smarty->assign('title_correct',$this->Lang('title_correct'));
$this->smarty->assign('title_correct_answer',$this->Lang('title_correct_answer'));

echo $this->ProcessTemplateFromDatabase('score_template','Quizzard');

$query = 'SELECT * from '.cms_db_prefix().'module_qz_takers where taker_id=?';
$user = $db->GetRow($query,array($taker_id));

$this->smarty->assign('taker_name',$user['name']);
$this->smarty->assign('taker_email',$user['email']);

$this->smarty->assign('quiz_date',date('r'));
$this->smarty->assign('quiz_host',$_SERVER['SERVER_NAME']);
$this->smarty->assign('quiz_source_ip',$_SERVER['REMOTE_ADDR']);

$extras = $this->getPopulatedExtraFields($id, $params, $taker_id, false);
$this->smarty->assign('extras',$extras);


// splitting out email to user and to admin, so we can present different info
if ($this->GetPreference('send_email','0') == '1' || $user['send_result'] == '1')
	{
	$mail = $this->GetModuleInstance('CMSMailer');
	if ($mail == FALSE)
		{
		echo'<hr />'.$this->Lang('missing_cms_mailer'). '<hr />';
		audit(-1, $this->GetFriendlyName(),$this->Lang('missing_cms_mailer'));
		return;
		}
	$mail->reset();
	$mail->SetFrom($this->GetPreference('email_from',$this->Lang('email_from')));
	$mail->SetFromName($this->GetPreference('email_fromname',$this->Lang('email_fromname')));
	$mail->SetSubject($this->GetPreference('email_subject',$this->Lang('email_subject')));
	$mail->SetCharSet($this->GetPreference('email_encoding','utf-8'));
	

	if ($user['send_result'] == '1')
		{
		$mail->AddAddress($user['email']);
		$this->smarty->assign('user_email',1);
		$this->smarty->assign('admin_email',0);

		if ($this->GetPreference('html_email','') == '1')
			{
			$mail->IsHTML(true);
			$mail->SetAltBody(
			strip_tags($this->ProcessTemplateFromDatabase('email_template','Quizzard')));
			$mail->SetBody(
			$this->ProcessTemplateFromDatabase('email_template','Quizzard'));
			}
		else
			{
			$mail->IsHTML(false);
			$mail->SetBody(
			$this->ProcessTemplateFromDatabase('email_template','Quizzard'));
			}

		$res = $mail->Send();
		if ($res === false)
			{
			echo'<hr />'.
				$this->Lang('cms_mailer_failed').': '.
				$mail->GetErrorInfo().'<hr />';
			audit(-1,
				$this->GetFriendlyName(),$this->Lang('cms_mailer_failed'));
			return;
			}
		}

	if ($this->GetPreference('send_email','0') == '1')
		{
		$mail->ClearAllRecipients();
		$mail->AddAddress($this->GetPreference('send_to'));
		$this->smarty->assign('user_email',0);
		$this->smarty->assign('admin_email',1);

		if ($this->GetPreference('html_email','') == '1')
			{
			$mail->IsHTML(true);
			$mail->SetAltBody(
			strip_tags($this->ProcessTemplateFromDatabase('email_template','Quizzard')));
			$mail->SetBody(
			$this->ProcessTemplateFromDatabase('email_template','Quizzard'));
			}
		else
			{
			$mail->IsHTML(false);
			$mail->SetBody(
			$this->ProcessTemplateFromDatabase('email_template','Quizzard'));
			}
		$res = $mail->Send();
		if ($res === false)
			{
			echo'<hr />'.
				$this->Lang('cms_mailer_failed').': '.
				$mail->GetErrorInfo().'<hr />';
			audit(-1,
				$this->GetFriendlyName(),$this->Lang('cms_mailer_failed'));
			return;
			}

		}
	}
	// prevent 'em from backing through and resetting their answers to
	// the correct answer!
	$query = 'UPDATE '. cms_db_prefix().
				'module_qz_takers set completed=1, completed_date=? WHERE taker_id=?';

	$dbresult = $db->Execute($query,array(trim($db->DBTimeStamp(time()),"'"),$taker_id));

	$this->resetTakerId($params['quiz_id']);

?>