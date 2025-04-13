<?php

// common settings
if (!isset($gCms)) exit;
$errormsg = "";
$config = $this->config;
$authornotify = 0;
$modulename = isset($params["modulename"]) ? $params["modulename"] : "";
$redirecturl = isset($params["redirecturl"]) ? $params["redirecturl"] : "";
$pageid = isset($params["pageid"]) ? $params["pageid"] : $returnid;
$inline = isset($params['inline']) ? true : false;
$usesession = isset($params['usesession']) ? true : false;

// get comments from the database
$query = "SELECT comment_id, comment_author, comment_title, comment_data, comment_date, author_email, author_website, trackback, editor FROM ".cms_db_prefix()."module_comments WHERE page_id = ".$pageid." AND module_name = '".$modulename."' AND active = 1 ORDER BY comment_date";
$dbresult = isset($params["number"]) ? $db->SelectLimit($query, $params['number']) : $db->Execute($query);

// set params
$dateformat = isset($params['dateformat']) ? $params['dateformat'] : "F j, Y, g:i a";
$localedateformat = isset($params['localedateformat']) ? $params['localedateformat'] : '';
$lang_param = isset($params['lang']) ? $params['lang'] : '';
$imgLoc = isset($params["imgLoc"]) ? $params["imgLoc"] : "";
if (TRUE == empty($modulename)) {
	$hm =& $gCms->GetHierarchyManager();
	$curnode =& $hm->getNodeById($pageid);
	$curcontent =& $curnode->GetContent();
	if (TRUE == empty($redirecturl)) { $redirecturl = $curcontent->GetURL(); }
}
else {
	if (TRUE == empty($redirecturl)) {
		$redirecturl = $this->selfURL();
		//$redirecturl = str_replace('&', '&amp;', $this->selfURL());
	}
}
if (isset($params['cancelcomment'])) { redirect($redirecturl); }
$spamprotect = $this->GetPreference('spamprotect', 'yes');
$disable_html = $this->GetPreference('disable_html', 1);
$notify = $this->GetPreference('notify', '');
$moderate = $this->GetPreference('moderate', '0');
$cookies = $this->GetPreference('enable_cookie_support', '0');

// Create trackback url
//$trackbackurl = "http://".$_SERVER["SERVER_NAME"]."/?mact=Comments,".$id.",gettrackback,0&".$id."modulename=".$modulename."&".$id."returnid=".$returnid."&".$id."pageid=".$pageid;
# Anyone having an idea how to create the url in a better way?
# something like this: $trackbackurl = $this->CreateLink($id, 'gettrackback', $returnid, "test", array("pageid"=>$pageid, "modulename"=>$modulename));
# disabled by calguy

// set variable from cookie if possible
if ($cookies) {
	if (isset($_COOKIE["comments"])) {
		$ck_arr = $_COOKIE["comments"];
		if (!$author && isset($ck_arr["author"])) { $author = $ck_arr["author"]; }
		if (!$email && isset($ck_arr["email"])) { $email = $ck_arr["email"]; }
		if (!$authornotify && isset($ck_arr["authornotify"])) { $authornotify = $ck_arr["authornotify"]; }
		if (!$website && isset($ck_arr["website"])) { $website = $ck_arr["website"]; }
	}
}


// Then set comment vars from session if possible
if( $usesession &&
    isset($_SESSION[$this->GetName()]) && 
    isset($_SESSION[$this->GetName()]['vars']) &&
    is_array($_SESSION[$this->GetName()]['vars']) )
  {
    $arr =& $_SESSION[$this->GetName()]['vars'];
    $email = $arr['email'];
    $website = $arr['website'];
    $authornotify = $arr['authornotify'];
    $author = $arr['author'];
    $title = $arr['title'];
    $content = $arr['content'];
  }

// Lastly Override comment vars from params
if( isset($params["email"]) )
  {
    $email = trim($params['email']);
  }
if( isset($params["website"]) )
  {
    $website = trim($params['website']);
  }
if( isset($params['authornotify']) )
  {
    $authornotify = (int)$params['authornotify'];
  }
if( isset($params["author"]) )
  {
    $author = trim($params['author']);
  }
if( isset($params["title"]) )
  {
    $title = trim($params['title']);
  }
if( isset($params["content"]) )
  {
    $content = trim($params['content']);
  }

if (isset($params['submitcomment'])) {

	//Initialize the captcha object with our configuration options
	if (FALSE != $spamprotect) {
		if (isset($this->cms->modules['Captcha'])) {
			$captcha = &$this->getModuleInstance('Captcha');
			if (TRUE == empty($params['captcha_phrase']) || ! $captcha->CheckCaptcha($params['captcha_phrase'])) {
				$errormsg .= "<li>".$this->Lang('wrongcode')."</li>";
			}
		}
	}
	if (!$author) { $errormsg .= "<li>".$this->Lang('errorenterauthor')."</li>"; }
	if (!$content) { $errormsg .= "<li>".$this->Lang('errorentercomment')."</li>"; }
	if ($email && !$this->isValidEmail($email)) { $errormsg .= "<li>".$this->Lang('errorenteremail')."</li>"; }
	if ($website && !$this->isValidURL($website)) { $errormsg .= "<li>".$this->Lang('errorenterwebsite')."</li>"; }

	if (!$errormsg) {

		$akismet = $this->GetPreference('akismet_check');
		if($akismet == 1){
			$ask_mod = $this->GetModuleInstance('CMSakismet');
			if( $ask_mod ){
				if($ask_mod->check($content,$author,$email)){
					$moderate = 1;
				}
			}
		}
		$db = $this->cms->db;
		$new_id = $db->GenID(cms_db_prefix()."module_comments_seq");
		$query = "INSERT INTO ".cms_db_prefix()."module_comments (comment_id, page_id, comment_title, comment_author, author_email, author_website, comment_data, comment_date, module_name, create_date, modified_date, active, author_notify, ip) VALUES ($new_id, $pageid, ".$db->qstr($title).", ".$db->qstr($author).", ".$db->qstr($email).", ".$db->qstr($website).", ".$db->qstr($content).",".$db->DBTimeStamp(time()).", ".$db->qstr($modulename).", ".$db->DBTimeStamp(time()).", ".$db->DBTimeStamp(time()).", ".($moderate=='1'?0:1).", ".$authornotify.", \"".$_SERVER["REMOTE_ADDR"]."\")";
		$dbresult = $db->Execute($query);
		if( !$dbresult ) 
		  {
		    echo "DEBUG: query failed<br/>";
		    echo "SQL: ".$db->sql."<br/>";
		    echo "ERROR: ".$db->ErrorMsg()."<br/>";
		    die();
		  }

		// set cookies
		if ($cookies) {
			if (isset($params["author"])) { setcookie ("comments[author]", $author, 0, "/"); }
			if (isset($params["email"])) { setcookie ("comments[email]", $email, 0, "/"); }
			if (isset($params["authornotify"])) { setcookie ("comments[authornotify]", $authornotify, 0, "/"); } else { setcookie ("comments[authornotify]", 0, 0, "/"); }
			if (isset($params["website"])) { setcookie ("comments[website]", $website, 0, "/"); }
		}

		// send notifies
		$cmsmailer = $this->GetModuleInstance('CMSMailer');
		if ($cmsmailer) {
				
			// send email to cms admin
			if($this->GetPreference('notify', '')) {
				$notifysubj = $this->Lang('notifysubj', array($redirecturl));
				$notifymsg  = $this->Lang('notifymsg', array($redirecturl));
				$notifymsg .= "\n\n".$this->Lang('comment').': '.$content;
				if ($moderate == '1') { $notifymsg .= "\n\n".$this->Lang('comment_moderation_enabled'); }
				$notifymsg .= "\n\n".$this->Lang('edit_comment').': '.$config['root_url'].'/'.$config['admin_dir'].'/moduleinterface.php?mact=Comments,m1_,editcomment,0&m1_commentid='.$new_id;
				$cmsmailer->AddAddress($this->GetPreference('notify', ''));
				$cmsmailer->SetFromName($author);
				$cmsmailer->SetSender($email);
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

		// all done
		if ($moderate) {
		  // crude hack - put the message inside the session.
		  if( !isset($_SESSION[$this->GetName()]) )
		    {
		      $_SESSION[$this->GetName()] = array();
		    }
		  $_SESSION[$this->GetName()]['message'] = $this->Lang('comment_awaiting_approval');
		}
		redirect($redirecturl);

	}

}

$tpl_var_error = FALSE;
if( !empty($errormsg) )
  {
    $tpl_var_error =  '<p class="error">'.$this->Lang('error').':</p><ul class="error">'.$errormsg.'</ul>'; 
  }

if( $usesession && !empty($errormsg) )
  {
    $arr = array();
    $arr['email'] = $email;
    $arr['website'] = $website;
    $arr['authornotify'] = $authornotify;
    $arr['author'] = $author;
    $arr['title'] = $title;
    $arr['content'] = $content;

    // store all the data in the session
    if( !isset($_SESSION[$this->GetName()]) )
      {
	$_SESSION[$this->GetName()] = array();
      }
    $_SESSION[$this->GetName()]['vars'] = $arr;
    $_SESSION[$this->GetName()]['error'] = '<ul>'.$errormsg.'</ul>';

    // and redirect back to the referring page.
    redirect($redirecturl);
  }

$smarty->assign_by_ref('errormessage', $tpl_var_error);

// Captcha spam protection
if (FALSE != $spamprotect) {
	if (isset($this->cms->modules['Captcha'])) {
		$captcha = &$this->getModuleInstance('Captcha');
		// $this->smarty->assign('captcha_title', $this->Lang('captcha_title'));
		$this->smarty->assign('spamprotectimage', $captcha->getCaptcha());
	}
}

#function CreateFormStart($id, $action='default', $returnid='', $method='post', $enctype='', $inline=false, $idsuffix='', $params = array())
//$start_form= $this->CreateFormStart($id, 'default', $returnid, 'post', '', false, '', array('redirecturl' => $redirecturl,'pageid' => $pageid, 'modulename' => $modulename, 'emailfield' => $emailfield, 'websitefield' => $websitefield));
$start_form= $this->CreateFormStart($id, 'default', $returnid, 'post', '', $inline, '', 
				    array('redirecturl' => $redirecturl,
					  'pageid' => $pageid, 
					  'modulename' => $modulename, 
					  'emailfield' => $emailfield, 
					  'websitefield' => $websitefield,
					  'usesession' => $usesession));
$this->smarty->assign_by_ref('startform',			$start_form);
$this->smarty->assign_by_ref('endform', 			$this->CreateFormEnd());
$this->smarty->assign_by_ref('spamprotect',     	$spamprotect);
$this->smarty->assign_by_ref('image', 				$this->CreateInputHidden($id, 'image', $imgLoc));
$this->smarty->assign_by_ref('addacomment',			$this->Lang('addacomment'));
$this->smarty->assign_by_ref('entercodetxt',		$this->Lang('entercode'));
$this->smarty->assign_by_ref('inputentercode',		$this->CreateInputText($id, 'captcha_phrase', ''));
$this->smarty->assign_by_ref('titletxt', 			$this->Lang('comment_title'));
$this->smarty->assign_by_ref('inputtitle', 			$this->CreateInputText($id, 'title', $title, 50, 255));
$this->smarty->assign_by_ref('yournametxt', 		$this->Lang('yourname'));
$this->smarty->assign_by_ref('inputyourname', 		$this->CreateInputText($id, 'author', $author, 50, 255));
$this->smarty->assign_by_ref('emailtxt', 			$this->Lang('email'));
$this->smarty->assign_by_ref('inputemail', 			$this->CreateInputText($id, 'email', $email, 50, 255));
$this->smarty->assign_by_ref('notifytxt', 			$this->Lang('authornotify'));
$this->smarty->assign_by_ref('inputnotify', 		$this->CreateInputCheckbox($id, 'authornotify', 1, $authornotify));
$this->smarty->assign_by_ref('websitetxt', 			$this->Lang('website'));
$this->smarty->assign_by_ref('inputwebsite', 		$this->CreateInputText($id, 'website', $website, 50, 255));
$this->smarty->assign_by_ref('commenttxt', 			$this->Lang('comment'));
$this->smarty->assign_by_ref('inputcomment', 		$this->CreateTextArea(false, $id, $content, 'content', $id, '', '', '', 65));
$this->smarty->assign_by_ref('submit', 				$this->CreateInputSubmit($id, 'submitcomment', $this->Lang('submit')));
$this->smarty->assign_by_ref('cancel', 				$this->CreateInputSubmit($id, 'cancelcomment', $this->Lang('cancel')));
//$this->smarty->assign_by_ref('trackback', 			$this->GetPreference('enable_trackbacks'));
//$this->smarty->assign_by_ref('trackbackurl', 		$trackbackurl);
// trackback disabled by calguy
$this->smarty->assign_by_ref('redirecturl', 		$redirecturl);
	
$entryarray = array();

if ($dbresult && $dbresult->RecordCount()) {
	while ($row = $dbresult->FetchRow()) {
		$onerow = new stdClass();

		// Enable localized date format
		if ($localedateformat != '') {
			// Set the gloabal LC_TIME constant to given language
			$result = setlocale(LC_TIME, $lang_param);
			if (false == $result) { echo $this->lang('localedateformat_error'); }
			$onerow->date = strftime($localedateformat, $db->UnixTimeStamp($row['comment_date']));
		}
		else { $onerow->date = date($dateformat, $db->UnixTimeStamp($row['comment_date'])); }

		$onerow->comment_author	= $row['comment_author'];
		$onerow->comment_title	= $row['comment_title'];
		$onerow->author_email   = $row['author_email'];
		$onerow->author_website = $row['author_website'];
		$onerow->comment_data	= nl2br($row['comment_data']);
		$onerow->cssclass = 'comment';  /// this is bad.
// 		if ($row['trackback']) { $onerow->cssclass = "trackback"; }
// 		else { $onerow->cssclass = $row['editor'] ? "editor" : "comment"; }
// disabled by calguy

		array_push($entryarray, $onerow);
	}
}

$this->smarty->assign_by_ref('items', $entryarray);

#Display template
echo "<!-- Displaying Comments Module -->\n";
echo isset($params['list_template']) ? $this->ProcessTemplate($params['list_template'])
                                     : $this->ProcessTemplateFromDatabase('default_display');
if( $usesession )
  {
    unset($_SESSION[$this->GetName()]);
  }

# vim:ts=4 sw=4 noet
?>