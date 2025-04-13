<?php 
$tit = implode("", file('_vars/title.txt'));
$key = implode("", file('_vars/key.txt'));
$des = implode("", file('_vars/des.txt'));
$title_raz=implode("", file('_vars/zag.txt'));
$folder=implode("", file('_vars/folder.txt'));
$css=$folder.'_css/business.css';
$content='_vars/content.txt';
include($folder.'application/sql/mysql.php');

include($folder.'application/moduls/login_corporative/functions.php');

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!$link){echo("oops!");}

include($folder.'application/layouts/business.php');
?>