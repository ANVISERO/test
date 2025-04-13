<?php
if (!$this->CheckPermission('Modify Site Preferences')) {
	echo $this->lang("nopermission");
	return;
}


if (isset($params["imagesperpage"])) $this->SetPreference("imagesperpage",$params["imagesperpage"]);

//if (isset($params["imagesperpage"])) $this->SetPreference("imagesperpage",$params["imagesperpage"]);

$this->Redirect($id, 'defaultadmin', '', array("module_message"=>$this->Lang("settingssaved"),"tab"=>"settings"));
?>

