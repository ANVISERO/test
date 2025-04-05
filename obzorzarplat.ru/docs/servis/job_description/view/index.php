<?php
$key = implode("", file('_vars/key.txt'));
$des = implode("", file('_vars/des.txt'));
$folder=implode("", file('_vars/folder.txt'));
$temp=implode("", file('_vars/temp.txt'));
$css=$folder.'_css/templet/'.$temp.'/css.css';
$content='_vars/content.txt';
$leftblock='/_admin/moduls/salary-block.php';
include($folder.'_admin/sql/mysql.php');


$jobs_id=$_GET["id"];
$lang=$_GET["lang"];

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);


$job_name=mysqli_result(mysqli_query($link,"select name_partitive from base_jobs where id='$jobs_id'"),0,0);
$tit="Должностная инструкция ".$job_name;
$title_raz=$tit;


include($folder.'_admin/_adminfiles/statlogs/stat.php');
include($folder.'_admin/templet/'.$temp.'/cont.txt');
?>