<?php
if (!isset($gCms) || !$this->VisibleToAdminUser()) exit;

$value="";

if (isset($params["submit"]) || isset($params["submitadd"])) {
	if (($params["pollname"]!="") && ($params["poll_id"]!="")) {
	  $db=$this->GetDb();
	  $newid=$db->GenID(cms_db_prefix()."module_polls_seq");
	  $q="INSERT INTO ".cms_db_prefix()."module_polls (id,name,closed,createtime,poll_id) VALUES (?,?,?,?,?)";
	  $p=array($newid,$params["pollname"],0,time(),$params["poll_id"]);
	  $result=$db->Execute($q,$p);

	  if (isset($params["submit"])) {
	  	$this->Redirect($id,"defaultadmin",$returnid,array("module_messages"=>$this->Lang("polladded")));
	  } else {
	  	$this->Redirect($id,"editpoll",$returnid,array("module_messages"=>$this->Lang("polladded"),"pollid"=>$newid));
	  }

	} else {
		echo $this->ShowErrors($this->Lang("pollnamerequired"));
		//Fallthrough to form
	}
} elseif (isset($params["cancel"])) {
  $this->Redirect($id,"defaultadmin",$returnid);
}

echo "<h3>".$this->Lang("addnewpoll")."</h3>";
echo $this->CreateFormStart($id,"addpoll",$returnid);
echo $this->CreateInputTextWithLabel($id,"pollname",$value,40,128,"",$this->Lang("pollname"));
echo $this->CreateInputTextWithLabel($id,"poll_id",$value,40,128,"","Poll ID");
echo "<br/>";
echo "<br/>";
echo $this->CreateInputSubmit($id,"submit",$this->Lang("add"));
echo $this->CreateInputSubmit($id,"submitadd",$this->Lang("addandaddoptions"));
echo $this->CreateInputSubmit($id,"cancel",$this->Lang("cancel"));
echo $this->CreateFormEnd();

?>