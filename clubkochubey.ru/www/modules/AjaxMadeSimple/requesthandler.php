<?php
header("Content-type:text/html; charset=utf-8");
$path = dirname(dirname(dirname($_SERVER['SCRIPT_FILENAME'])));
require $path . DIRECTORY_SEPARATOR . 'include.php';

$db=&$GLOBALS["gCms"]->db;

//print_r($_GET); die();
$output="";
$modules =& $gCms->modules;
$module=&$modules["AjaxMadeSimple"]['object']->GetModuleInstance($_GET["module"]);
if ($module!=false) {
  if (method_exists($module,$_GET["method"])) {
  	$vars=array();
  	foreach ($_GET as $var=>$value) {
  		if ($var=="module") continue;
  		if ($var=="method") continue;

  		$vars[$var]=$value; //base64_decode
  	}
  	$output=$module->$_GET["method"]($vars);
  } else {
  	$output=$modules["AjaxMadeSimple"]['object']->Lang("methodnotfound",array($_GET["method"],$_GET["module"]));

  }
} else {
  $output=$modules["AjaxMadeSimple"]['object']->Lang("modulenotfound",array($_GET["module"]));
}

echo $output;

?>