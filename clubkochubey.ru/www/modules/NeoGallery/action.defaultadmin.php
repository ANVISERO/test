<?php

if (!isset($gCms)) exit;
if (!$this->VisibleToAdminUser()) exit;

$tab="";
if (isset($params["tab"])) $tab=$params["tab"];

//$view='files';
echo $this->StartTabHeaders();
//echo $this->SetTabHeader("imgupload",$this->Lang("imgupload"),($tab=="imgupload"));
if ($this->CheckPermission("Administrate NeoGallery")) {
	echo $this->SetTabHeader("galleries",$this->Lang("galleries"),($tab=="galleries"));
}
if ($this->CheckPermission('Modify Templates')) {
	echo $this->SetTabHeader("templates",$this->Lang("templates"),($tab=="templates"));
}
if ($this->CheckPermission('Modify Site Preferences')) {
	echo $this->SetTabHeader("settings",$this->Lang("settings"),($tab=="settings"));
}

echo $this->EndTabHeaders();

echo $this->StartTabContent();
if ($this->CheckPermission("Administrate NeoGallery")) {
	echo $this->StartTab("galleries");
	$themeObject = &$gCms->variables['admintheme'];
	$galleries=$this->GetGalleries();
	//print_r($categories); die();
	$showgalleries = array();
	if (TRUE == empty($galleries)) {
		$this->smarty->assign('nogalleriestext', $this->lang("nogalleriestext"));
	} else {
		foreach ($galleries as $gallery) {

			$onerow = new stdClass();
			$name=$gallery["name"];
			if ($gallery["textid"]!="") {
				$name.=" (".$gallery["textid"].")";
			}
			$onerow->name = $this->CreateLink($id, 'editgallery', $returnid, $name, array('gid'=>$gallery["id"],"todo"=>"edit"));
			$onerow->id = $gallery["id"];
			$onerow->path = $this->Slashes($this->GetGalleryProp($gallery["id"],"path"));
			$onerow->subsystem = $this->Slashes($this->GetGalleryProp($gallery["id"],"subsystem"));

			$onerow->template = $this->TemplateName($gallery["template"]);

			//$onerow->size = $this->GetCategoryProp($category["id"],"width")."x".$this->GetCategoryProp($category["id"],"height");


			if ($this->GetPreference("defaultgallery")==$gallery["id"]) {
				$onerow->defaultlink = $themeObject->DisplayImage('icons/system/true.gif', $this->Lang("setasdefault"),'','','systemicon');
			} else {

				$defaultimage=$themeObject->DisplayImage('icons/system/false.gif', $this->Lang("setasdefault"),'','','systemicon');
				$onerow->defaultlink = $this->CreateLink($id, 'editgallery', $returnid, $defaultimage,
				array('gid' => $gallery["id"],"todo"=>"setdefault"));
			}



			$onerow->deletelink = $this->CreateLink($id, 'editgallery', $returnid,
			$themeObject->DisplayImage('icons/system/delete.gif', $this->Lang("deletegallery"),'','','systemicon'),
			array('gid' => $gallery["id"],"todo"=>"delete"), $this->Lang("confirmdeletegallery"));
			
			$onerow->editlink = $this->CreateLink($id, 'editgallery', $returnid,
			$themeObject->DisplayImage('icons/system/edit.gif', $this->Lang("editgallery"),'','','systemicon'),
			array('gid' => $gallery["id"],"todo"=>"edit"));

			/*$onerow->copylink = $this->CreateLink($id, 'editgallery', $returnid,
			 $themeObject->DisplayImage('icons/system/copy.gif', $this->Lang("copycategory"),'','','systemicon'),
			 array('catid' => $category["id"],"todo"=>"copy"));
			 */
			/*$onerow->copylink = $this->CreateLink($id, 'editcategory', $returnid,
			 $themeObject->DisplayImage('icons/system/copy.gif', $this->Lang("copycategory"),'','','systemicon'),
			 array('catid' => $category["id"],"todo"=>"copy"));*/

			array_push($showgalleries, $onerow);
		}

	}

	$this->smarty->assign_by_ref('items', $showgalleries);
	$this->smarty->assign('itemcount', count($showgalleries));
	$this->smarty->assign('nametext', $this->Lang("name"));
	$this->smarty->assign('pathtext', $this->Lang("path"));
	$this->smarty->assign('subsystemtext', $this->Lang("subsystem"));
	$this->smarty->assign('templatetext', $this->Lang("template"));
	$this->smarty->assign('actions', $this->Lang("actions"));
	$this->smarty->assign('default', $this->Lang("default"));

	$link=$this->CreateLink($id, 'editgallery', 0, $themeObject->DisplayImage('icons/system/newobject.gif', $this->Lang("addgallery"),'','','systemicon'), array(), '', false, false, '') .' '. $this->CreateLink($id, 'editgallery', $returnid, $this->Lang("addgallery"), array("todo"=>"add"), '', false, false, 'class="pageoptions"');

	$this->smarty->assign('addlink', $link);

	echo $this->ProcessTemplate('gallerylist.tpl');
	echo $this->EndTab();
}

if ($this->CheckPermission('Modify Templates')) {
	echo $this->StartTab("templates");


	$themeObject = &$gCms->variables['admintheme'];

	$templates=$this->GetTemplates();

	$showtemplates = array();
	if (TRUE == empty($templates)) {
		$this->smarty->assign('notemplatestext', $this->Lang("notemplates"));
	} else {
		foreach ($templates as $template) {
			//print_r($template);

			$onerow = new stdClass();

			if ($template["id"]>-1) {
		  $onerow->textid = $this->CreateLink($id, 'edittemplate', $returnid, $template["textid"], array('tid'=>$template["id"],"todo"=>"edit"));
			} else {
				$onerow->textid=$this->TemplateName($template["textid"]);
			}
			$onerow->id = $template["id"];
			//echo $onerow->id;
			if ($this->GetPreference("defaulttemplate")==$template["textid"]) {
				$onerow->defaultlink = $themeObject->DisplayImage('icons/system/true.gif', $this->Lang("default"),'','','systemicon');
			} else {

				$defaultimage=$themeObject->DisplayImage('icons/system/false.gif', $this->Lang("setasdefault"),'','','systemicon');

				$onerow->defaultlink = $this->CreateLink($id, 'edittemplate', $returnid, $defaultimage,
				array('tid' => $template["textid"],"todo"=>"setdefault"));				
			}
			
			if ($this->GetPreference("defaultsingletemplate")==$template["textid"]) {
				$onerow->singledefaultlink = $themeObject->DisplayImage('icons/system/true.gif', $this->Lang("singledefault"),'','','systemicon');
			} else {
				$defaultimage=$themeObject->DisplayImage('icons/system/false.gif', $this->Lang("setassingledefault"),'','','systemicon');				
				$onerow->singledefaultlink = $this->CreateLink($id, 'edittemplate', $returnid, $defaultimage,
				array('tid' => $template["textid"],"todo"=>"setsingledefault"));
			}
				

			if ($template["id"]>-1) {
				$onerow->deletelink = $this->CreateLink($id, 'edittemplate', $returnid,
				$themeObject->DisplayImage('icons/system/delete.gif', $this->Lang("deletetemplate"),'','','systemicon'),
				array('tid' => $template["id"],"todo"=>"delete"), $this->Lang("confirmdeletetemplate"));
				
				$onerow->editlink = $this->CreateLink($id, 'edittemplate', $returnid,
				$themeObject->DisplayImage('icons/system/edit.gif', $this->Lang("edittemplate"),'','','systemicon'),
				array('tid' => $template["id"],"todo"=>"edit"));
			}
			$tid=$template["id"];
			if ($tid<0) $tid=$template["textid"];
			$onerow->copylink = $this->CreateLink($id, 'edittemplate', $returnid,
			$themeObject->DisplayImage('icons/system/copy.gif', $this->Lang("copytemplate"),'','','systemicon'),
			array('tid' => $tid,"todo"=>"copy"));

			array_push($showtemplates, $onerow);
		}

	}

	$this->smarty->assign_by_ref('items', $showtemplates);
	$this->smarty->assign('itemcount', count($showtemplates));

	$this->smarty->assign('template', $this->Lang("template"));
	$this->smarty->assign('actions', $this->Lang("actions"));
	$this->smarty->assign('default', $this->Lang("default"));
	$this->smarty->assign('singledefault', $this->Lang("singledefault"));

	$link=$this->CreateLink($id, 'edittemplate', 0, $themeObject->DisplayImage('icons/system/newobject.gif',$this->Lang("addtemplate"),'','','systemicon'), array(), '', false, false, '') .' '. $this->CreateLink($id, 'edittemplate', $returnid, $this->Lang("addtemplate"), array("todo"=>"add"), '', false, false, 'class="pageoptions"');

	$this->smarty->assign('addlink', $link);


	echo $this->ProcessTemplate('templates.tpl');
	echo $this->EndTab();
}

if ($this->CheckPermission('Modify Site Preferences')) {
	echo $this->StartTab("settings");
	$this->smarty->assign('formstart',$this->CreateFormStart($id,"savesettings",$returnid,"post","",false,""));
	$this->smarty->assign('formend',$this->CreateFormEnd());

	$this->smarty->assign('imagesperpagetext',$this->Lang("imagesperpage"));
	$this->smarty->assign('imagesperpageinput',$this->CreateInputText($id,"imagesperpage",$this->GetPreference("imagesperpage",10),8,8));

	$this->smarty->assign('submit', $this->CreateInputSubmit($id,"submit",$this->Lang("savesettings")));

	echo $this->ProcessTemplate('settings.tpl');
	echo $this->EndTab();
}

echo $this->EndTabContent();

?>