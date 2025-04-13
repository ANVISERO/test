<?php
// First step: This is a JS File.
header("Content-type:text/javascript; charset=utf-8");

// We must to load the session via CMSMS

$path = dirname(dirname(dirname($_SERVER['SCRIPT_FILENAME'])));
require $path . DIRECTORY_SEPARATOR . 'include.php';

//check for autostarting sessions
if (session_id()=="") session_start();

//echo $generatedcode;
if (isset($_SESSION['ajaxmsgeneratedcode']))
{
	echo $_SESSION["ajaxmsgeneratedcode"];
}
else 
{
	echo '/*
	
	No given content for this js file. Please check your methods.
	
	*/';
}

/*
DEV NOTE: It will be interesting to know why this is commented :)

$modules =& $gCms->modules;
$generatedcode=&$modules["AjaxMadeSimple"]['object']->GetPreference("generatedcode");
$modules["AjaxMadeSimple"]['object']->RemovePreference("generatedcode");
*/
?>