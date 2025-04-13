<?php
$debug=false;

function Error($string) {
	die($string);
}

@include(dirname(dirname(dirname(__FILE__)))."/include.php");
$module =&$gCms->modules["Thumbnails"]['object'];
if (!$module) {
	//var_dump($gCms->modules);
	Error("module not found");
}

if (!isset($_GET["image"])) {
	Error("no image passed");
}

$size="";
if (isset($_GET["size"])) {
	if (is_numeric($_GET["size"])) $size=$_GET["size"];
}

$image=base64_decode($_GET["image"]);

if (!file_exists($image)) {
	Error("cannot readimage");
}

// Disable caching of the current document:
/*header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Pragma: no-cache');
 */
$thumbnail=$module->ThumbnailObject($image,$size);
if (!$thumbnail) {
	Error("error creating thumb");
}
switch ($module->GetPreference("thumbnailformat","jpg")) {
 	case "jpg" : {
 		header('Content-Type: image/jpeg'); 
 		imagejpeg($thumbnail,NULL,$module->GetPreference("jpgquality","90"));
 		break;
 	}
 	case "png" : {
 		header('Content-Type: image/png'); 
 		imagepng($thumbnail);
 		break;
 	}
 	default : Error("no default format set");
}
?>