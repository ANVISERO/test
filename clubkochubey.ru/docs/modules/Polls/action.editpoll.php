<?php
if (!isset($gCms) || !$this->VisibleToAdminUser()) exit;

if (!isset($params["pollid"])) $this->Redirect($id,"defaultadmin");

echo "<h3>".$this->Lang("editpoll")."</h3>";
include(dirname(__FILE__)."/optionslist.php");



?>