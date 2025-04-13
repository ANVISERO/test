<?php
if (!isset($gCms)) exit;
if (!$this->VisibleToAdminUser()) {
	echo $this->lang("nopermission");
	return;
}

if (isset($params["thumbnailsize"])) $this->SetPreference("thumbnailsize",$params["thumbnailsize"]);
if (isset($params["thumbnailformat"])) $this->SetPreference("thumbnailformat",$params["thumbnailformat"]);
if (isset($params["jpgquality"])) $this->SetPreference("jpgquality",$params["jpgquality"]);
if (isset($params["defaulticon"])) $this->SetPreference("defaulticon",$params["defaulticon"]);
/*if (isset($params["simplepassword"])) $this->SetPreference("simplepassword",$params["simplepassword"]);
if (isset($params["feusersgroup"])) $this->SetPreference("feusersgroup",$params["feusersgroup"]);
if (isset($params["textareastyle"])) $this->SetPreference("textareastyle",$params["textareastyle"]);
*/
$this->Redirect($id, 'defaultadmin', '', array("module_message"=>$this->Lang("settingssaved"),"tab"=>"settings"));
?>