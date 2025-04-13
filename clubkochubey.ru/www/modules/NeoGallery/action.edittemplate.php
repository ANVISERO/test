<?php
if (!isset($gCms)) exit;

if (!isset($params["todo"])) exit;

$tab="";
if (isset($params["tab"])) $tab=$params["tab"];

$params["tab"]="templates";

if (isset($params["cancel"])) {
	$this->Redirect($id, 'defaultadmin', $returnid,$params);
}

$inerror=false;
//print_r($params);

$tid="";
if ($params["todo"]!="add" && !isset($params["tid"])) {
	echo "Internal error"; exit;
} else {
	if (isset($params["tid"])) $tid=$params["tid"];
}

if (isset($params["apply"])) $params["todo"]="apply";

switch ($params["todo"]) {
	case "delete" : {
		//	echo $catid;
		$this->DeleteTemplate($tid);
		$params["module_message"]=$this->Lang("templatedeleted");
		$this->Redirect($id, 'defaultadmin', $returnid,$params);
		break;
	}
	case "setdefault" : {
		$this->SetPreference("defaulttemplate",$tid);
		$params["module_message"]=$this->Lang("defaulttemplateset");
		$this->Redirect($id, 'defaultadmin', $returnid,$params);
		break;
	}
  case "setsingledefault" : {
		$this->SetPreference("defaultsingletemplate",$tid);
		$params["module_message"]=$this->Lang("defaultsingletemplateset");
		$this->Redirect($id, 'defaultadmin', $returnid,$params);
		break;
	}
	case "apply" : {
		if (!isset($params["textid"])) {
			echo $this->ShowErrors($this->Lang("textidmissing"));
			break;
		}
		$this->UpdateTemplate($tid,$params["textid"],$params["content"]);
		$params["module_message"]=$this->Lang("templateupdated");
		$params["todo"]="edit";
		unset($params["apply"]);
		$this->Redirect($id, 'edittemplate', $returnid,$params);
		break;
	}

	case "update" :
	case "save" : {
		if (!isset($params["textid"]) || $params["textid"]=="") {
			echo $this->ShowErrors($this->Lang("textidmissing"));
			$inerror=true;
			break;
		}
		 
		if ($params["todo"]=="save") {
			if (isset($params["textid"]) && $this->GetNeoTemplate($params["textid"])!=false) {
				echo $this->ShowErrors($this->Lang("duplicatetextid"));
				$inerror=true;
				break;
			}
			$tid=$this->AddTemplate($params["textid"],$params["content"]);
		} else {
			$this->UpdateTemplate($tid,$params["textid"],$params["content"]);
		}
		if ($params["todo"]=="save") {
			$params["module_message"]=$this->Lang("templateadded");
		} else {
			$params["module_message"]=$this->Lang("templateupdated");
		}
		$this->Redirect($id, 'defaultadmin', $returnid,$params);
		break;
	}

}

$textid="";
$content="";

if ($params["todo"]=="edit" || $params["todo"]=="copy") {
	$template=$this->GetNeoTemplate($tid);
	//print_r($category);
	$textid=$template["textid"];
	$content=$template["content"];

	if ($params["todo"]=="copy") $textid="";
}

if (isset($params["textid"])) $textid=$params["textid"];
if (isset($params["content"])) $content=$params["content"];

$newtodo="";
if ($inerror) {
	$newtodo=$params["todo"];
} else {
	if ($params["todo"]=="edit") $newtodo="update";
	if ($params["todo"]=="add") $newtodo="save";
	if ($params["todo"]=="copy") $newtodo="save";
}

$this->smarty->assign('formstart',$this->CreateFormStart($id,"edittemplate",$returnid,"post","",false,"",array("todo"=>$newtodo,"tid"=>$tid,"tab"=>"templates")));
$this->smarty->assign('formend',$this->CreateFormEnd());

$this->smarty->assign('textidtext',$this->Lang("templatetextid"));
$this->smarty->assign('textidinput',$this->CreateInputText($id,"textid",$textid,40,40));

$this->smarty->assign('contenttext',$this->Lang("templatecontent"));
$this->smarty->assign('contentinput',$this->CreateTextArea(false,$id,$content,"content"));

if ($params["todo"]=="edit") {
	$this->smarty->assign('submit', $this->CreateInputSubmit($id,"submit",$this->Lang("submit")));
	$this->smarty->assign('apply', $this->CreateInputSubmit($id,"apply",$this->Lang("apply")));
} else {
	$this->smarty->assign('submit', $this->CreateInputSubmit($id,"submit",$this->Lang("add")));
}

$this->smarty->assign('cancel', $this->CreateInputSubmit($id,"cancel",$this->Lang("cancel")));

$this->smarty->assign('backlink', $this->CreateLink($id,"defaultadmin",$returnid,"<< ".$this->Lang("back"),array("tab"=>"templates")));

echo $this->ProcessTemplate('edittemplate.tpl');

?>
