<?php
if (!isset($gCms)) exit;
if (!$this->VisibleToAdminUser()) {
	echo $this->ShowErrors(lang("nopermission"));
	return;
}




$tab="";
if (isset($params["tab"])) $tab=$params["tab"];


echo $this->StartTabHeaders();
  
  if ($this->CheckPermission('Modify Site Preferences')) {
    echo $this->SetTabHeader("settings",$this->Lang("settings"),($tab=="settings"));
  }
  if ($this->CheckPermission('Modify Files')) {
    echo $this->SetTabHeader("tools",$this->Lang("tools"),($tab=="tools"));
  }
echo $this->EndTabHeaders();
echo $this->StartTabContent();
if ($this->CheckPermission('Modify Site Preferences')) {
echo $this->StartTab("settings");
$this->smarty->assign('formstart',$this->CreateFormStart($id,"savesettings",$returnid));
$this->smarty->assign('formend',$this->CreateFormEnd());

$this->smarty->assign('submit',$this->CreateInputSubmit($id,"savesettings",$this->Lang("savesettings")));

$formats=array("JPEG"=>"jpg","PNG"=>"png");
$this->smarty->assign('thumbnailformattext',$this->Lang("thumbnailformat"));
$this->smarty->assign('thumbnailformatinput',$this->CreateInputDropdown($id,"thumbnailformat",$formats,"",$this->GetPreference("thumbnailformat","jpg")));

$this->smarty->assign('jpgqualitytext',$this->Lang("jpgquality"));
$this->smarty->assign('jpgqualityinput',$this->CreateInputText($id,"jpgquality",$this->GetPreference("jpgquality","90"),10,10));

$sizes=array("128x128"=>"128","100x100"=>"100","80x80"=>"80","64x64"=>"64");
$this->smarty->assign('thumbnailsizetext',$this->Lang("thumbnailsize"));
$this->smarty->assign('thumbnailsizeinput',$this->CreateInputDropdown($id,"thumbnailsize",$sizes,"",$this->GetPreference("thumbnailsize","100")));

$icons=$this->GetDefaultIconList();

$this->smarty->assign('defaulticontext',$this->Lang("defaulticon"));
$this->smarty->assign('defaulticoninput',$this->CreateInputDropdown($id,"defaulticon",$icons,"",$this->GetPreference("defaulticon")));
$this->smarty->assign('defaulticonexamples',$this->IconListTable());
echo $this->ProcessTemplate("settings.tpl");
echo $this->EndTab();
}
if ($this->CheckPermission('Modify Files')) {
	echo $this->StartTab("tools");
	echo $this->EndTab();
}

echo $this->EndTabContent();

?>
