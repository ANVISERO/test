<?php
if (!isset($gCms)) exit;

$showwhatpoll=$this->GetPreference("showwhatpoll","activepoll");
$activepoll=$this->GetPreference("activepoll");
$showpeekbutton=$this->GetPreference("showpeekbutton");
$polltemplate=$this->GetPreference("polltemplate", $this->GetTemplateFromFile("defaultpoll"));
$resulttemplate=$this->GetPreference("resulttemplate", $this->GetTemplateFromFile("defaultresult"));
$polllisttemplate=$this->GetPreference("polllisttemplate", $this->GetTemplateFromFile("defaultpolllist"));

$tab="";
if (isset($params["tab"])) $tab=$params["tab"];

echo $this->StartTabHeaders();

if ($this->CheckPermission('administratepolls')) {
  echo $this->SetTabHeader("polls",$this->Lang("polls"),($tab=="polls"));
}

if ($this->CheckPermission('Modify Site Preferences')) {
  echo $this->SetTabHeader("settings",$this->Lang("settings"),($tab=="settings"));
}
if ($this->CheckPermission('Modify Templates')) {
  echo $this->SetTabHeader("polltpl",$this->Lang("polltemplate"),($tab=="polltemplate"));
  echo $this->SetTabHeader("resultpl",$this->Lang("resulttemplate"),($tab=="resulttemplate"));
}
//echo $this->SetTabHeader("listtpl",$this->Lang("listtemplate"));
echo $this->EndTabHeaders();
echo $this->StartTabContent();

if ($this->CheckPermission('administratepolls')) {
  echo $this->StartTab("polls");
  include(dirname(__FILE__)."/polllist.php");
  echo $this->EndTab();
}

if ($this->CheckPermission('Modify Site Preferences')) {
  echo $this->StartTab("settings");
  $this->smarty->assign('formstart',$this->CreateFormStart($id,"savesettings",$returnid));
  $this->smarty->assign('formend',$this->CreateFormEnd());
  $this->smarty->assign('submit',$this->CreateInputSubmit($id,"submit",$this->Lang("savesettings")));
  $this->smarty->assign('cancel',$this->CreateInputSubmit($id,"cancel",$this->Lang("cancel")));

  $this->smarty->assign('showpeekbuttontext',$this->Lang("showpeekbutton"));
  $this->smarty->assign('showpeekbutton',$this->CreateInputCheckBox($id,"showpeekbutton",1,$showpeekbutton));

  $this->smarty->assign('showwhatpolltext',$this->Lang("showwhatpoll"));
  $showwhatpollarray=array($this->Lang("activepoll")=>"activepoll"/*,$this->Lang("randompoll")=>"randompoll"*/);
  $this->smarty->assign('showwhatpolldropdown',$this->CreateInputDropdown($id,"showwhatpoll",$showwhatpollarray,'',$showwhatpoll));
  echo $this->ProcessTemplate("settings.tpl");
  echo $this->EndTab();
}

if ($this->CheckPermission('Modify Templates')) {
  echo $this->StartTab("polltpl");
  $this->smarty->assign('formstart',$this->CreateFormStart($id,"updatetemplate",$returnid));  
  $this->smarty->assign('formend',$this->CreateFormEnd());
  $this->smarty->assign('templateid',$this->CreateInputHidden($id,"template","polltemplate"));
  $this->smarty->assign('contenttext',$this->Lang("template"));
  $this->smarty->assign('contenthelp',$this->Lang("pollcontenthelp"));
  $this->smarty->assign('contentinput',$this->CreateTextArea(false, $id, $polltemplate,"newcontent"));
  $this->smarty->assign('submit',$this->CreateInputSubmit($id,"submit",$this->Lang("ok")));
  $this->smarty->assign('reset',$this->CreateInputSubmit($id,"reset",$this->Lang("resettodefault"),"","",$this->Lang("confirmtemplate")));
  echo $this->ProcessTemplate("template.tpl");
  echo $this->EndTab();
  
  echo $this->StartTab("resultpl");
  /*echo $this->CreateFormStart($id,"updatetemplate",$returnid);
  echo $this->CreateInputHidden($id,"template","resulttemplate");
  echo $this->CreateTextArea(false, $id, $resulttemplate,"newcontent");
  echo "<br/>";
  echo $this->CreateInputSubmit($id,"submit",$this->Lang("ok"));
  echo $this->CreateInputSubmit($id,"reset",$this->Lang("resettodefault"),"","",$this->Lang("confirmtemplate"));
  echo $this->CreateFormEnd();*/
  $this->smarty->assign('formstart',$this->CreateFormStart($id,"updatetemplate",$returnid));  
  $this->smarty->assign('formend',$this->CreateFormEnd());
  $this->smarty->assign('templateid',$this->CreateInputHidden($id,"template","resulttemplate"));
  $this->smarty->assign('contenttext',$this->Lang("template"));
  $this->smarty->assign('contenthelp',$this->Lang("resultcontenthelp"));
  $this->smarty->assign('contentinput',$this->CreateTextArea(false, $id, $resulttemplate,"newcontent"));
  $this->smarty->assign('submit',$this->CreateInputSubmit($id,"submit",$this->Lang("ok")));
  $this->smarty->assign('reset',$this->CreateInputSubmit($id,"reset",$this->Lang("resettodefault"),"","",$this->Lang("confirmtemplate")));
  echo $this->ProcessTemplate("template.tpl");
  echo $this->EndTab();
}

/*echo $this->StartTab("listtpl");
echo $this->CreateFormStart($id,"updatetemplate",$returnid);
echo $this->CreateInputHidden($id,"template","polllisttemplate");
echo $this->CreateTextArea(false, $id, $polltemplate,"newcontent");
echo "<br/>";
echo $this->CreateInputSubmit($id,"submit",$this->Lang("ok"));
echo $this->CreateInputSubmit($id,"reset",$this->Lang("resettodefault"),"","",$this->Lang("confirmtemplate"));
echo $this->CreateFormEnd();
echo $this->EndTab();
*/
echo $this->EndTabContent();
?>