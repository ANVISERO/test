<?php

if (!isset($gCms)) exit;

$gid="";
if (isset($params["gid"])) $gid=$params["gid"];
if ($gid=="") die("no gid passed");

foreach($params as $param=>$value) {
	if (substr($param,0,12)=="description_") {
		$base64name=substr($param,12);
		$filename=base64_decode($base64name);
		if ($filename!=false) {		
		  $description=$value;
		  $hidden="0";
		  if (isset($params["hidden_".$base64name])) $hidden="1";
		  $this->SetImageProp($filename,$gid,"description",$description);
		  $this->SetImageProp($filename,$gid,"hidden",$hidden);
		}
	}
}
/*var_dump($params);
die();
*/
$this->Redirect($id, 'editgallery', '', array("module_message"=>$this->Lang("imagepropssaved"),"tab"=>"images","gid"=>$gid,"todo"=>"edit"));

?>