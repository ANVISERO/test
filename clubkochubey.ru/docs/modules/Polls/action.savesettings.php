<?php
if (!isset($gCms) || !$this->VisibleToAdminUser()) exit;

if (isset($params["cancel"])) $this->Redirect($id,"defaultadmin");

if (isset($params["showwhatpoll"])) $this->SetPreference("showwhatpoll",$params["showwhatpoll"]);
if (isset($params["showpeekbutton"])) $this->SetPreference("showpeekbutton",$params["showpeekbutton"]); else $this->SetPreference("showpeekbutton","");

$this->Redirect($id,"defaultadmin",$returnid,array("module_message"=>$this->Lang("settingssaved")));

?>