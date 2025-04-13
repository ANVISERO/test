<?php

if (!isset($gCms)) exit;

if (isset($params['cancel'])) { $this->Redirect($id, 'defaultadmin', $returnid); }

$commentid = isset($params['commentid']) ? $params['commentid'] : '';

$author = '';
if (isset($params['author'])) {

	$author = $params['author'];
	$title = isset($params['title']) ? $params['title'] : '';
	$data = isset($params['data']) ? $params['data'] : '';
	$active = isset($params['active']) ? 1 : 0;
	$trackback = isset($params['trackback']) ? 1 : 0;
	$editor = isset($params['editor']) ? 1 : 0;
	$email = isset($params['email']) ? $params['email'] : '';
	$notify = isset($params['notify']) ? $params['notify'] : '';
	$website = isset($params['website']) ? $params['website'] : '';
	$trackback_title = isset($params['trackback_title']) ? $params['trackback_title'] : '';
	
	$emptyfields = 0;
	if (!$author) {
		$emptyfields++;
		echo '<p class="error">'.$this->Lang('errorenterauthor').'</p>';
	}
	if (!$data) {
		$emptyfields++;
		echo '<p class="error">'.$this->Lang('errorentercomment').'</p>';
	}

	if (!$emptyfields) {
		
		// Update comment in database
		$modifydate = $db->DBTimeStamp(time());
		if ($this->GetPreference('enable_trackbacks')) {
			$query = 'UPDATE '.cms_db_prefix().'module_comments SET comment_data=?, comment_title=?, comment_author=?, modified_date='.$modifydate.', active=?, author_email=?, author_website=?, trackback=?, editor=?, author_notify=? WHERE comment_id = ?';
			$db->Execute($query, array($data, $title, $author, $active, $email, $website, $trackback, $editor, $notify, $commentid));
		}
		else {
			$query = 'UPDATE '.cms_db_prefix().'module_comments SET comment_data=?, comment_title=?, comment_author=?, modified_date='.$modifydate.', active=?, author_email=?, author_website=?, editor=?, author_notify=? WHERE comment_id = ?';
			$db->Execute($query, array($data, $title, $author, $active, $email, $website, $editor, $notify, $commentid));
		}
		
		// send notifies to comment suscribers
		$cmsmailer = $this->GetModuleInstance('CMSMailer');
		if ($cmsmailer) {
			$query = "SELECT active, notified, page_id FROM ".cms_db_prefix()."module_comments WHERE comment_id = ".$commentid;
			$mailactive = $db->GetRow($query);
			if ($mailactive["active"] && !$mailactive["notified"]) {
				$query = "SELECT comment_id, comment_author, author_email FROM ".cms_db_prefix()."module_comments WHERE page_id = ".$mailactive["page_id"]." AND active = 1 AND author_notify = 1 AND comment_id != ".$commentid." ORDER BY comment_date";
				$mailresult = $db->Execute($query);
				if ($mailresult && $mailresult->RecordCount()) {
					$notify_emails = array(); // Array for recording sendt emails, to avoid double sending
					while ($row = $mailresult->FetchRow()) {
						if ($row['author_email'] && !in_array($row['author_email'],$notify_emails)) {
							$cmsmailer->AddAddress($row['author_email']);
							$cmsmailer->SetFromName($cmsmailer->GetPreference('fromuser', '') ? $cmsmailer->GetPreference('fromuser', '') : "Administrator CMSms");
							$cmsmailer->SetSender($this->GetPreference('notify', ''));
							$cmsmailer->SetSubject($this->Lang('authornotifysubj', array($redirecturl)));
							$cmsmailer->SetBody($this->Lang('authornotifymsg', array($redirecturl)));  
							$cmsmailer->IsHTML(false);
							$cmsmailer->Send();
							$cmsmailer->ClearAddresses();
							$notify_emails[] = $row['author_email'];
						}
					}
				}
				$query = "UPDATE ".cms_db_prefix()."module_comments SET notified=? WHERE comment_id = ?";
				$db->Execute($query, array(1,$commentid));
			}
		}

		$params = array('tab_message'=> 'comment_updated', 'active_tab' => 'comments');
		$this->Redirect($id, 'defaultadmin', '', $params);
	}

}
else {

	$query = 'SELECT * FROM '.cms_db_prefix().'module_comments WHERE comment_id = ?';
	$dbresult = $db->Execute($query, array($commentid));

	while (($row = $dbresult->FetchRow())) {
		$title = $row['comment_title'];
		$author = $row['comment_author'];
		$data = $row['comment_data'];
		$active = $row['active'];
		$email = $row['author_email'];
		$notify = $row['author_notify'];
		$website = $row['author_website'];
		$postdate = $row['comment_date'];
		$pageid = $row['page_id'];
		$modulename = $row['module_name'];
		$createdate = $row['create_date'];
		$modifydate = $row['modified_date'];
		$trackback = $row['trackback'];
		$editor = $row['editor'];
		$ip = $row['ip'];
	}
}

#Display template
$this->smarty->assign('startform', $this->CreateFormStart($id, 'editcomment', $returnid));
$this->smarty->assign('endform', $this->CreateFormEnd());

$this->smarty->assign('titletext', $this->Lang('comment_title'));
$this->smarty->assign('inputtitle', $this->CreateInputText($id, 'title', $title, 30, 255));

$this->smarty->assign('authortext', $this->Lang('author'));
$this->smarty->assign('inputauthor', $this->CreateInputText($id, 'author', $author, 30, 255));

$this->smarty->assign('datatext', $this->Lang('data'));
$this->smarty->assign('inputdata', $this->CreateTextArea(false, $id, $data, 'data'));

$this->smarty->assign('emailtext', $this->Lang('email'));
$this->smarty->assign('inputemail', $this->CreateInputText($id, 'email', $email, 50, 255));

$this->smarty->assign('notifytext', $this->Lang('editcomment_authornotify'));
$this->smarty->assign('inputnotify', $this->CreateInputCheckbox($id, 'notify', 1, $notify));

$this->smarty->assign('websitetext', $this->Lang('website'));
$this->smarty->assign('inputwebsite', $this->CreateInputText($id, 'website', $website, 50, 255));

$this->smarty->assign('enable_trackbacks', $this->GetPreference('enable_trackbacks'));

$this->smarty->assign('trackbacktext', $this->Lang('trackback'));
$this->smarty->assign('inputtrackback', $this->CreateInputCheckbox($id, 'trackback', 1, $trackback));

$this->smarty->assign('editortext', $this->Lang('editor'));
$this->smarty->assign('inputeditor', $this->CreateInputCheckbox($id, 'editor', 1, $editor));

$this->smarty->assign('modulenametext', $this->Lang('modulename'));
$this->smarty->assign('modulename', $modulename);

$this->smarty->assign('pageidtext', $this->Lang('pageid'));
$contentops =& $gCms->GetContentOperations();
$this->smarty->assign('inputpageid', $contentops->GetPageAliasFromID($pageid));

$this->smarty->assign('postdatetext', $this->Lang('postdate'));
$this->smarty->assign('inputpostdate', $postdate);

$this->smarty->assign('createdatetext', $this->Lang('createdate'));
$this->smarty->assign('inputcreatedate', $createdate);

$this->smarty->assign('modifydatetext', $this->Lang('modifydate'));
$this->smarty->assign('inputmodifydate', $modifydate);

$this->smarty->assign('iptext', $this->Lang('ip'));
$this->smarty->assign('inputip', $ip);

#function CreateInputCheckbox($id, $name, $value='', $selectedvalue='', $addttext='')
$this->smarty->assign('activetext', $this->Lang('active'));
$this->smarty->assign('inputactive', $this->CreateInputCheckbox($id, 'active', 1, $active));

$this->smarty->assign('hidden', $this->CreateInputHidden($id, 'commentid', $commentid));
$this->smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', lang('submit')));
$this->smarty->assign('cancel', $this->CreateInputSubmit($id, 'cancel', lang('cancel')));

echo $this->ProcessTemplate('editcomment.tpl');

?>