<?php
$tit = implode("", file('_vars/title.txt'));
$key = implode("", file('_vars/key.txt'));
$des = implode("", file('_vars/des.txt'));
$title_raz=implode("", file('_vars/zag.txt'));
$temp=implode("", file('_vars/temp.txt'));
$folder=$_SERVER['DOCUMENT_ROOT'].'/';
$content='_vars/content.php';
include($folder.'_admin/sql/mysql.php');

$jobs_id=$_GET["id"];
$lang=$_GET["lang"];

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);


$job_name=mysqli_result(mysqli_query($link,"select name_partitive from base_jobs where id='$jobs_id'"),0,0);
$title_raz="Должностная инструкция ".$job_name;
$tit="ОБЗОР ЗАРПЛАТ - ".$title_raz;

include($folder.'_admin/_adminfiles/statlogs/stat.php');
include($folder.'../cgi/templet/regular.php');
?>