<?php
if (!isset($gCms) || !$this->VisibleToAdminUser()) exit;

if (!isset($params["pollid"])) exit;

$this->SetPreference("activepoll",$params["pollid"]);

$this->Redirect($id,"defaultadmin");

?>