<?php
if (!isset($gCms)) exit;

if (!isset($params["todo"])) exit;

$tab="settings";
if (isset($params["tab"])) $tab=$params["tab"];

if (isset($params["cancel"])) {
	$this->Redirect($id, 'defaultadmin', $returnid,$params);
}

$inerror=false;
//print_r($params);

$gid="";
if ($params["todo"]!="add" && !isset($params["gid"])) {
	echo "Internal error"; exit;
} else {
	if (isset($params["gid"])) $gid=$params["gid"];
}

if (isset($params["apply"])) $params["todo"]="apply";

switch ($params["todo"]) {
	case "delete" : {
		//	echo $catid;
		$this->DeleteGallery($gid);
		$params["module_message"]=$this->Lang("gallerydeleted");
		$this->Redirect($id, 'defaultadmin', $returnid,$params);
		break;
	}
	case "setdefault" : {
		$this->SetPreference("defaultgallery",$gid);
		$params["module_message"]=$this->Lang("defaultgalleryset");
		$this->Redirect($id, 'defaultadmin', $returnid,$params);
		break;
	}
	
	case "update" :
	case "save" : {
		if (!isset($params["name"]) || $params["name"]=="") {
			echo $this->ShowErrors($this->Lang("pathmissing"));
			$inerror=true;
			break;
		}
		 
		if (!isset($params["path"]) || $params["path"]=="" || $params["path"]=="-") {
			echo $this->ShowErrors($this->Lang("pathmissing"));
			$inerror=true;
			break;
		}

		if ($params["todo"]=="save") {
			if (isset($params["name"]) && ($this->IdentifyGallery($params["name"])!=false)) {
				echo $this->ShowErrors($this->Lang("duplicatename"));
				$inerror=true;
				break;
			}
			if (isset($params["textid"]) && ($this->IdentifyGallery($params["textid"])!=false)) {
				echo $this->ShowErrors($this->Lang("duplicatename"));
				$inerror=true;
				break;
			}
			$gid=$this->InsertGallery($params["name"]);
			//Make sure first one is set as default
			if ($this->CountGalleries()==1) {
				$this->SetPreference("defaultgallery",$gid);
			}
		} else {
			$this->ChangeGalleryName($gid,$params["name"]);
		}
		$this->SetGalleryProp($gid,"textid",$params["textid"]);
		$this->SetGalleryProp($gid,"path",$params["path"]);
		//$this->SetGalleryProp($gid,"subsystem",$params["subsystem"]);
		$this->SetGalleryProp($gid,"imagesperpage",$params["imagesperpage"]);
		$this->SetGalleryProp($gid,"template",$params["template"]);
		//die();
		if ($params["todo"]=="save") {
			$params["module_message"]=$this->Lang("galleryadded");
		} else {
			$params["module_message"]=$this->Lang("galleryupdated");
		}
		$this->Redirect($id, 'defaultadmin', $returnid,$params);
		break;

	}
}

$name="";
$textid="";
$path="";
$subsystem="";
$imagesperpage="20";
$template=$this->GetPreference("defaulttemplate");


if ($params["todo"]=="edit" || $params["todo"]=="copy") {
	$gallery=$this->GetGallery($gid);
	//print_r($category);
	$name=$gallery["name"];
	$textid=@$gallery["textid"];
	$path=$gallery["path"];
	//$subsystem=$gallery["subsystem"];
	$imagesperpage=$gallery["imagesperpage"];
	$template=$gallery["template"];

	if ($params["todo"]=="copy") $name="";
}

if (isset($params["name"])) $name=$params["name"];
if (isset($params["textid"])) $textid=$params["textid"];
if (isset($params["path"])) $path=$params["path"];
//if (isset($params["subsystem"])) $subsystem=$params["subsystem"];
if (isset($params["imagesperpage"])) $imagesperpage=$params["imagesperpage"];
if (isset($params["template"])) $template=$params["template"];

$newtodo="";
if ($inerror) {
	$newtodo=$params["todo"];
} else {
	if ($params["todo"]=="edit") $newtodo="update";
	if ($params["todo"]=="add") $newtodo="save";
	if ($params["todo"]=="copy") $newtodo="save";
}



echo $this->StartTabHeaders();
echo $this->SetTabHeader("settings",$this->Lang("settings"),($tab=="settings"));
if ($gid!="") {
	echo $this->SetTabHeader("images",$this->Lang("images"),($tab=="images"));
}
echo $this->EndTabHeaders();

echo $this->StartTabContent();
echo $this->StartTabContent();

echo $this->StartTab("settings");

$fullpath=$this->Slash($config["root_path"],$path);
if (!is_writable($fullpath)) {
	echo "<strong>".$this->Lang("pathnotwritable")."</strong>\n";
}


$this->smarty->assign('formstart',$this->CreateFormStart($id,"editgallery",$returnid,"post","",false,"",array("todo"=>$newtodo,"gid"=>$gid,"tab"=>"gallery")));
$this->smarty->assign('formend',$this->CreateFormEnd());

$this->smarty->assign('nametext',$this->Lang("name"));
$this->smarty->assign('nameinput',$this->CreateInputText($id,"name",$name,40,100));

$this->smarty->assign('textidtext',$this->Lang("textid"));
$this->smarty->assign('textidinput',$this->CreateInputText($id,"textid",$textid,40,40));


$dirlist=array();
$filerec= get_recursive_file_list ( $config['image_uploads_path'] , array() ,-1 ,'DIRS');
$dirlist[$this->Lang('selecttargetdir')]='-';
foreach($filerec as $key=>$value) {
	$value1=$this->Slashes(str_replace($config['root_path'],'',$value));
	//prevent current dir from showing up
	if ($value1==($path."/")) continue;
	//Check for hidden files
	$dirs=explode("/",$value1);
	$hidden=false;
	foreach($dirs as $dir) {
		if (substr($dir,0,1)==".") {$hidden=true; break;}
	}
	if ($hidden) continue;

	//not hidden, add to list
	$dirlist[$value1]=$value1;
}


$this->smarty->assign('pathtext',$this->Lang("path"));
//$this->smarty->assign('pathinput',$this->CreateInputText($id,"path",$path,40,100));
$this->smarty->assign('pathinput',$this->CreateInputDropdown($id,"path",$dirlist,0,$path));

$subsyslist=$this->GetSubsystemList();
$this->smarty->assign('subsystemtext',$this->Lang("subsystem"));
$this->smarty->assign('subsysteminput',$this->CreateInputDropdown($id,"subsystem",$subsyslist,0,$subsystem));

$templates=$this->GetTemplateArray();
//var_dump($templates);
$this->smarty->assign('templatetext',$this->Lang("template"));
$this->smarty->assign('templateinput',$this->CreateInputDropdown($id,"template",$templates,"",$template));


$this->smarty->assign('imagesperpagetext',$this->Lang("imagesperpage"));
$this->smarty->assign('imagesperpageinput',$this->CreateInputText($id,"imagesperpage",$imagesperpage,3,3));

$this->smarty->assign('pathcomment',$this->Lang("pathcomment"));

if ($params["todo"]=="edit") {
	$this->smarty->assign('submit', $this->CreateInputSubmit($id,"submit",$this->Lang("submit")));
	$this->smarty->assign('apply', $this->CreateInputSubmit($id,"apply",$this->Lang("apply")));
} else {
	$this->smarty->assign('submit', $this->CreateInputSubmit($id,"submit",$this->Lang("add")));
}

$this->smarty->assign('cancel', $this->CreateInputSubmit($id,"cancel",$this->Lang("cancel")));

$this->smarty->assign('backlink', $this->CreateLink($id,"defaultadmin",$returnid,"<< ".$this->Lang("back"),array("tab"=>"galleries")));

echo $this->ProcessTemplate('editgallery.tpl');
echo $this->EndTab();

if ($gid!="") {
	echo $this->StartTab("images");

	$page="1";
	if (isset($params["page"])) $page=$params["page"];
	$this->smarty->assign('formstart',$this->CreateFormStart($id,"saveimageprops",$returnid,"post","",false,"",array("gid"=>$gid,"tab"=>"images")));
	$this->smarty->assign('formend',$this->CreateFormEnd());
	$this->smarty->assign('submittop', $this->CreateInputSubmit($id,"submittop",$this->Lang("update")));
	$this->smarty->assign('submitbottom', $this->CreateInputSubmit($id,"submitbottom",$this->Lang("update")));

	$countimages=$this->CountImages($gid,true);

	if ($countimages>$this->GetPreference("imagesperpage",10)) {
		$lastpage=$countimages/$this->GetPreference("imagesperpage",10);
		$this->smarty->assign('navigation',"yes");
		$params["tab"]="images";
		$params["page"]="1";
		$this->smarty->assign('firstlink',$this->CreateLink($id,"editgallery",$returnid,"<<",$params));
		$params["page"]=$page-1; if ($params["page"]==0) $params["page"]=1;
		$this->smarty->assign('previouslink',$this->CreateLink($id,"editgallery",$returnid,"<",$params));
		$params["page"]=$page+1; if ($params["page"]>$lastpage) $params["page"]=$lastpage;
		$this->smarty->assign('nextlink',$this->CreateLink($id,"editgallery",$returnid,">",$params));
		$params["page"]=$lastpage;
		$this->smarty->assign('lastlink',$this->CreateLink($id,"editgallery",$returnid,">>",$params));
		$pagelinks="";
		$this->smarty->assign('pagelinks',$pagelinks);
		//	  {$firstlink}{$previouslink}{$nextlink}{$lastlink}
	}

	$images=$this->GetImageList($gid,$page,$this->GetPreference("imagesperpage",10),true);

	$showimages = array();
	if (!$images) {
		$this->smarty->assign('noimagestext', $this->lang("noimagestext"));
	} else {
		foreach ($images as $image) {

			$onerow = new stdClass();
			$onerow->thumbnailimg = $image["thumbnailimg"];
			$onerow->name = $image["name"];
			$onerow->info = $image["info"];
			$onerow->descriptioninput = $this->CreateInputText($id,"description_".$image["base64"],$image["description"],60,255,"style='width:99%;'");
			$onerow->hiddeninput = $this->CreateInputCheckbox($id,"hidden_".$image["base64"],"1",$image["hidden"]);

			array_push($showimages, $onerow);
		}

	}

	$this->smarty->assign('nametext', $this->lang("imagename"));
	$this->smarty->assign('descriptiontext', $this->lang("imagedescription"));
	$this->smarty->assign('infotext', $this->lang("imageinfo"));
	$this->smarty->assign('hiddentext', $this->lang("imagehidden"));

	$this->smarty->assign_by_ref('items', $showimages);
	$this->smarty->assign('itemcount', count($showimages));

	//echo count($images);
	//print_r($images);
	echo $this->ProcessTemplate('imagelist.tpl');

	echo $this->EndTab();
}
echo $this->EndTabContent();

?>
