<?php

$pollid=$this->PollToShow();

if(isset($params['poll_id'])) {
	$db=$this->GetDb();
	$q="SELECT id FROM ".cms_db_prefix()."module_polls WHERE poll_id = ? ORDER BY createtime DESC";
	$p=array($params["poll_id"]);
	$result=$db->Execute($q,$p);
	if ($result && $result->RecordCount()>0) {
		$row=$result->FetchRow();
		$pollid = $row['id'];
	}
}

$ajax=$this->GetModuleInstance("AjaxMadeSimple");
$ajax->RegisterAjaxRequester($this->GetName(),"poll_".$pollid,"pollcontent_".$pollid,"ExecuteVote","",array("pollid"=>$pollid),array("pollvotingchoice_".$pollid=>"radio","vote"=>""));
//echo "hiii";
if ($this->GetPreference("showpeekbutton","")!="") {
  $ajax->RegisterAjaxRequester($this->GetName(),"peek_".$pollid,"pollcontent_".$pollid,"PeekPoll","",array("pollid"=>$pollid),array("peek"=>""));
  $ajax->RegisterAjaxRequester($this->GetName(),"return_".$pollid,"pollcontent_".$pollid,"ReturnToPoll","",array("pollid"=>$pollid),array("returntovote"=>""));
}

if ($this->UserAlreadyVoted($pollid)) {
  echo $this->GetResultOutput($pollid);
} else {
  echo $this->GetPollOutput($pollid);
}

?>