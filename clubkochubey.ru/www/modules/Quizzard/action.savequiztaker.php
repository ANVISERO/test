<?php
if (!isset($gCms)) exit;

if (! isset($params['quiz_id']))
	{
	echo $this->Lang('specify_quiz');
	return;
	}

$error = '';

$extras = $this->getPopulatedExtraFields($id, $params, -1, true);

// validate if called for
if ($this->GetPreference('require_user', '1') == '1')
	{
	if (! isset($params['qzz_email']) || empty($params['qzz_email']) ||
		! preg_match("/^([\w\d\.\-\_])+\@([\w\d\.\-\_]+)\.(\w+)$/i",
	$params['qzz_email']))
		{
		$error .= '<li>'.$this->Lang('invalid_email').'</li>';
		}
	if (! isset($params['qzz_name']) || empty($params['qzz_name']))
		{
		$error .= '<li>'.$this->Lang('invalid_name').'</li>';
		}
	}
else
	{
	$rchars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
	$anonid = '';
	for ($i=0;$i<6;$i++)
		{
		$anonid .= $rchars[rand(0,63)];
		} 
	if (! isset($params['qzz_name']) || empty($params['qzz_name']))
		{
		$params['qzz_name'] = 'anonymous-'.$anonid;	
		}
	if (! isset($params['qzz_email']) || empty($params['qzz_email']))
		{
		$params['qzz_email'] = 'anonymous-'.$anonid.'@sample.com';
		unset($params['qzz_send_a_copy']);
		}
	}

// validate extra fields
for($i=0;$i<count($extras);$i++)
	{
	if ($extras[$i]['required'])
		{
		list ($res,$message) = $this->validateExtra($extras[$i],$params);
		if (!$res)
			{
			$error .= '<li>'.$message.'</li>';
			}
		}
	}
if (strlen($error) > 0)
	{
	$params['module_message'] = '<ul>'.$error.'</ul>';
	return $this->DoAction('default', $id, $params, $returnid);
	}

if ($this->GetPreference('save_button','0') == '1')
	{
	$query = 'SELECT taker_id from '. cms_db_prefix().
				'module_qz_takers t where t.email=? and '.
				'quiz_id=? and completed=0';
	$dbresult = $db->Execute($query,array(
               	$params['qzz_email'],$params['quiz_id']));
	if ($dbresult !== false && $row = $dbresult->FetchRow())
		{
		if ($row['taker_id'] != -1)
			{
			$this->setTakerId($row['taker_id'], $params['quiz_id']);
			$this->Redirect($id, 'restorequiz', $returnid, $params,  ($this->GetPreference('quiz_inline','1')=='1'));	
		//	$this->DoAction('restorequiz', $id, $params, $returnid);			
			return;
			}
		}
	}

if (! isset($params['qzz_taker_id']) || $params['qzz_taker_id'] == -1)
	{
   	$taker_id = $db->GenID(cms_db_prefix().'module_qz_takers_seq');
	$query = 'INSERT INTO '. cms_db_prefix().
				'module_qz_takers (taker_id, quiz_id, name, email, send_result, completed, start_date) VALUES (?,?,?,?,?,0,?)';

	$dbresult = $db->Execute($query,array($taker_id,
                  $params['quiz_id'],
               	$params['qzz_name'],
               	$params['qzz_email'],
               	(isset($params['qzz_send_a_copy'])?1:0),
                  trim($db->DBTimeStamp(time()),"'")));
    if ($dbresult === false)
       {
       return $this->DisplayErrorPage($id, $params, $returnid, $db->ErrorMsg());
       }
     $params['qzz_taker_id'] = $taker_id;
    }
else
	{
	$query = 'UPDATE '. cms_db_prefix().
				'module_qz_takers set name=?, email=?, send_result=? WHERE taker_id=?';

	$dbresult = $db->Execute($query,array(
               	$params['qzz_name'],
               	$params['qzz_email'],
               	(isset($params['qzz_send_a_copy'])?1:0),
               	$params['qzz_taker_id']));
    if ($dbresult === false)
       {
       return $this->DisplayErrorPage($id, $params, $returnid, $db->ErrorMsg());
       }
	}
	
if (count($extras) > 0)
	{
	$dquery = 'delete from '.cms_db_prefix().'module_qz_extra_vals WHERE taker_id=?';
	$iquery = 'insert into '.cms_db_prefix().'module_qz_extra_vals (taker_id, field_id, value) VALUES (?,?,?)';
	$dbresult = $db->Execute($dquery,array($params['qzz_taker_id']));
    if ($dbresult === false)
       {
       return $this->DisplayErrorPage($id, $params, $returnid, $db->ErrorMsg());
       }
	for($i=0;$i<count($extras);$i++)
		{
		$dbresult = $db->Execute($iquery,
				array($params['qzz_taker_id'],$extras[$i]['field_id'],$params['qzz_extra_'.$extras[$i]['field_id']]));
		if ($dbresult === false)
		   {
		   return $this->DisplayErrorPage($id, $params, $returnid, $db->ErrorMsg());
		   }
		}
	}
	
$this->smarty->assign('quizzard_taker_name',$params['qzz_name']);
$this->smarty->assign('quizzard_taker_email',$params['qzz_email']);
$this->setTakerId($taker_id, $params['quiz_id']);
$params['question']=0;

$this->Redirect($id, 'takequiz', $returnid, $params,  ($this->GetPreference('quiz_inline','1')=='1'));
//$this->DoAction('takequiz', $id, $params, $returnid);

?>