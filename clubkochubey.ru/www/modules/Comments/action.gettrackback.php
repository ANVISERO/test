<?php

return;  // disabled by calguy till the code is better.

// common settings
if (!isset($gCms)) exit;
$config = $this->config;
$modulename = isset($params["modulename"]) ? $params["modulename"] : "";
$redirecturl = isset($params['redirecturl']) ? $params['redirecturl'] : '';
$pageid = isset($params["pageid"]) ? $params["pageid"] : $returnid;

// check whether call is a trackback or human
if (!isset($_POST["url"])) {
	echo $this->Lang('check_trackback_url');
	return;
}

// check whether trackbacks are enabled
if (!$this->GetPreference('enable_trackbacks')) { $this->trackbackError("Trackback function is disabled."); }

// ip-based spam protection
$query = "SELECT COUNT(comment_id) FROM ".cms_db_prefix()."module_comments WHERE ip = '".$_SERVER["REMOTE_ADDR"]."' AND create_date > ".$db->DBTimeStamp(time()-600);
if ($db->GetOne($query) >= 10) { $this->trackbackError("To many trackbacks from your IP in a short time period."); }

// convert parameters
$tb_title = isset($_POST['title']) ? urlDeCode($_POST['title']) : '';
$tb_url = isset($_POST['url']) ? urlDeCode($_POST['url']) : '';
$tb_excerpt = isset($_POST['excerpt']) ? urlDeCode($_POST['excerpt']) : '';
$tb_blog_name = isset($_POST['blog_name']) ? preg_replace("/[^0-9a-zöäüÖÄÜß\\ -]/i","",urlDeCode($_POST['blog_name'])) : ''; 

// check parameters
$tb_error = "";
// check whether URL was given
if (!$tb_url) { $tb_error.= " URL missing! "; }
// check whether URL is valid
else if (!$this->isValidURL($tb_url)) { $tb_error.= " URL $tb_url not valid! "; }
// check whether text was given
if (!$tb_excerpt) { $tb_error.= " Text missing! "; }
else {
	preg_match("/^(?:[a-zA-Z]+:\/\/)?([^\/]+)(.*)/i",$tb_url, $host); // get host name from url
	if(!($fp = @fsockopen($host[1],80,$errno,$errstr,20))) { $tb_error.= " Host $host[1] not online: $errstr ($errno) "; } // open socket to host and check whether host is online
	else {
		fwrite($fp, $host[2] ? "GET ".$host[2]." HTTP/1.1\r\n" : "GET / HTTP/1.1\r\n");
        fwrite($fp, "Host: ".$host[1]."\r\n");
        fwrite($fp, "Connection: Close\r\n\r\n");
		stream_set_timeout($fp, 10);
		if (!preg_match("/200/",fgets($fp,128))) { $tb_error.= " URL $tb_url not accessible! "; }
		// check whether backlink exists if enabled
		else if ($this->GetPreference('enable_trackback_backlink_check')) {
			$tblc = "";
			while (!feof($fp)) { $tblc.= fgets($fp, 4096); }
			if (!preg_match("@".$tb_url."@",$tblc)) { $tb_error.= " URL $tb_url has no link to this website! "; }
		}
		fclose($fp);
	}
}
// in case of any error, print error message and exit
if ($tb_error) { $this->trackbackError($tb_error); }

// get the moderate status
$moderate = $this->GetPreference('moderate', '0');

// check akisment whether trackback is spam
if($this->GetPreference('akismet_check')){
	$ask_mod = $this->GetModuleInstance('CMSakismet');
	if( $ask_mod ){
		if($ask_mod->check($content,$author,$email)){ $moderate = 1; }
	}
}

// save trackback as comment
$db = $this->cms->db;
$new_id = $db->GenID(cms_db_prefix()."module_comments_seq");
$query = "INSERT INTO ".cms_db_prefix()."module_comments (comment_id, comment_title, comment_data, comment_date, comment_author, author_website, page_id, module_name, active, create_date, modified_date, trackback, editor, author_notify, notified, ip)
VALUES ($new_id, ".$db->qstr($tb_title).", ".$db->qstr($tb_excerpt).",".$db->DBTimeStamp(time()).", ".$db->qstr($tb_blog_name).", ".$db->qstr($tb_url).", $pageid, ".$db->qstr($modulename).", ".($moderate ? 0 : 1).", ".$db->DBTimeStamp(time()).", ".$db->DBTimeStamp(time()).", 1, 0, 0, 0, '".$_SERVER["REMOTE_ADDR"]."')";
$dbresult = $db->Execute($query);

// send notifies
$cmsmailer = $this->GetModuleInstance('CMSMailer');
if ($cmsmailer) {
		
	// send email to cms admin
	if($this->GetPreference('notify', '')) {
		$notifysubj = $this->Lang('notifysubj', array($redirecturl));
		$notifymsg  = $this->Lang('notifymsg', array($redirecturl));
		$notifymsg .= "\n\n".$this->Lang('comment').': '.$tb_excerpt;
		if ($moderate == '1') { $notifymsg .= "\n\n".$this->Lang('comment_moderation_enabled'); }
		$notifymsg .= "\n\n".$this->Lang('edit_comment').': '.$config['root_url'].'/'.$config['admin_dir'].'/moduleinterface.php?mact=Comments,m1_,editcomment,0&m1_commentid='.$new_id;
		$cmsmailer->AddAddress($this->GetPreference('notify', ''));
		$cmsmailer->SetFromName($tb_blog_name);
		$cmsmailer->SetSender($this->GetPreference('notify', ''));
		$cmsmailer->SetSubject($notifysubj);
		$cmsmailer->SetBody($notifymsg);  
		$cmsmailer->IsHTML(false); // we're not sending an html mail
		$cmsmailer->Send();
		$cmsmailer->ClearAddresses();
	}

	//send notify emails to comment authors
	if (!$moderate) {
		$query = "SELECT comment_id, comment_author, author_email FROM ".cms_db_prefix()."module_comments WHERE page_id = ".$pageid." AND module_name = '".$modulename."' AND active = 1 AND author_notify = 1 AND comment_id != ".$new_id." ORDER BY comment_date";
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
		$db->Execute($query, array(1,$new_id));
	}
		
}

// send positive response
header ("Content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
echo "<response>\n";
echo "<error>0< /error>\n";
echo "</response>\n";
exit;

?>