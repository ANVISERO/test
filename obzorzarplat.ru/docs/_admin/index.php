<?php
//error_reporting(0);
$user_ip=getenv('HTTP_X_FORWARDED_FOR');
$date=date("Y:m:d");

$folder="../";
include($folder.'../cgi/sql/mysql.php');

include($folder.'_admin/moduls/login_corporative/functions_admin.php');

checkLogin('1');

//include('_adminfiles/temps/regular.php');

if (isset($_GET["page"])) $page=$_GET["page"];
	else $page='content';
//if(!isset($_GET["page"])){}
$title=implode("", file($folder.'../cgi/pages/'.$page.'/title.txt'));

include($folder.'_admin/_adminfiles/statlogs/stat.php');
include($folder.'../cgi/templet/admin.php');

?>
