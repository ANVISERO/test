<?php
//var_dump($params);

//Setup some stuff used by everything
$config=$this->GetConfig();
$this->smarty->assign('moduleurl',$config["root_url"]."/modules/NeoGallery");

if (isset($params["template"])) {
	$newtemplate=$this->GetNeoTemplate($params["template"]);
	if ($newtemplate!=false) $template=$newtemplate;
}

//Check for single image
if (isset($params["image"])) {
	$image=$params["image"];
	$template="";
	$subsystem="greybox";
	if (isset($params["subsystem"])) {
		$subsystem=$params["subsystem"];
		$template=$this->GetNeoTemplate("default_single_".$subsystem);
	} else {
		$template=$this->GetNeoTemplate($this->GetPreference("defaultsingletemplate"));
	}
	
	if (isset($params["template"])) {
		$newtemplate=$this->GetNeoTemplate($params["template"]);
		if ($newtemplate!=false) $template=$newtemplate;
	}
	$size="";
  if (isset($params["size"])) {
		$size=$params["size"];
		$size=str_replace("px","",$size);
	}
	//echo $size;
	$style="style='";
  if (isset($params["float"])) {
		if ($params["float"]=="right") $style.="float:right;";
		if ($params["float"]=="left") $style="float:left;";		
	}
	if (isset($params["addstyle"])) {
		$style.=$params["addstyle"];
	}
	$style.="'";	
	
	$parts=$this->ParseTemplate($template);
	if (!$parts) {
		echo $this->Lang("malformedtemplate");
		exit;
	}
	
	$this->AddToHeader($this->ProcessTemplateFromData($parts["head"]));
  $filename=basename($image);
  $relpath=dirname($image);
  
  $thumbnailurl=$this->GetThumbnailUrl($filename,$relpath,$size);
   
  $this->smarty->assign('image', $image);
  $this->smarty->assign('thumbnailurl', $thumbnailurl);
  $this->smarty->assign('style', $style);
  
  
  $description=$filename;
  if (isset($params["description"])) $description=$params["description"];
  $this->smarty->assign('description', $description);
  
  $addtext="";
  if (isset($params["addtext"])) $addtext=$params["addtext"];
  $this->smarty->assign('addtext', $addtext);
  
  echo $this->ProcessTemplateFromData($parts["body"]);
  return;
}

//Setup gallery
$gid=$this->GetPreference("defaultgallery");
if (isset($params["gallery"])) {
	$newgid=$this->IdentifyGallery($params["gallery"]);
	if ($newgid!=false) $gid=$newgid;
	//die($gid);
}

$gallery=$this->GetGallery($gid);

//Setup template

//var_dump($gallery);
$template=$this->GetNeoTemplate($gallery["template"]);
if (isset($params["template"])) {
	$newtemplate=$this->GetNeoTemplate($params["template"]);
	if ($newtemplate!=false) $template=$newtemplate;
}
//echo $template["content"];
$parts=$this->ParseTemplate($template);
if (!$parts) {
	echo $this->Lang("malformedtemplate");
	exit;
}




$this->AddToHeader($this->ProcessTemplateFromData($parts["head"]));
//echo $this->headeradditions;

//Setup this pagenumber
$page=1;
if (isset($params["page"])) $page=$params["page"];
$this->smarty->assign_by_ref('currentpage', $page);

$imagesperpage=$gallery["imagesperpage"];
if (isset($params["imagesperpage"])) $imagesperpage=$params["imagesperpage"];

$imagecount=$this->CountImages($gid,false);
$lastpage=round($imagecount/$imagesperpage);
$this->smarty->assign('lastpage', $lastpage);

$this->smarty->assign('firstimage', (($page-1)*$imagesperpage)+1);
$this->smarty->assign('lastimage', (($page-1)*$imagesperpage)+$imagesperpage);

//setup navigation links
$params["gallery"]=$gid;

$params["page"]=1;
$this->smarty->assign('firstpageurl',$this->CreateLink($id,"default",$returnid,"<<",$params,"",true));

$params["page"]=$page-1; if ($params["page"]==0) $params["page"]=1;
$this->smarty->assign('previouspageurl',$this->CreateLink($id,"default",$returnid,"<",$params,"",true));
//echo $lastpage;
$params["page"]=$page+1; if ($params["page"]>$lastpage) $params["page"]=$lastpage;
//echo $params["page"];
$this->smarty->assign('nextpageurl',$this->CreateLink($id,"default",$returnid,">",$params,"",true));

$params["page"]=$lastpage;
$this->smarty->assign('lastpageurl',$this->CreateLink($id,"default",$returnid,">>",$params,"",true));



$images=$this->GetImageList($gid,$page,$gallery["imagesperpage"]);
if (!$images) {
  echo "no images found";	
  return;
}

$showimages=array();
$count=1;
foreach($images as $image) {
	$onerow = new stdClass();
	$onerow->count=$count;
	$onerow->thumbnailimg=$image["thumbnailimg"];
	$onerow->thumbnailurl=$image["thumbnailurl"];
	$onerow->description=$image["description"];
	$onerow->name=$image["name"];
	$onerow->show=$image["show"];
	$onerow->url=$image["url"];

	$count++;
	array_push($showimages, $onerow);
}

$this->smarty->assign_by_ref('images', $showimages);
$this->smarty->assign_by_ref('images', $showimages);
$this->smarty->assign('imagecount', count($showimages));
$this->smarty->assign('uniquename', "gallery_".$gid);

echo $this->ProcessTemplateFromData($parts["body"]);

?>