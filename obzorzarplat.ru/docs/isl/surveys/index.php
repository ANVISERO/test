<?php
$key = implode("", file('_vars/key.txt'));
$des = implode("", file('_vars/des.txt'));
$folder=implode("", file('_vars/folder.txt'));
$temp=implode("", file('_vars/temp.txt'));
$css=$folder.'_css/templet/'.$temp.'/css.css';
$content='_vars/content.php';
include($folder.'_admin/sql/mysql.php');

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(isset($_GET["id"])){$survey_id=intval($_GET["id"]);}else{$survey_id=0;}
if(isset($_GET["survey_type_id"])){$survey_type_id=intval($_GET["survey_type_id"]);}else{$survey_type_id=0;}

if($survey_type_id!=0){
    $title_raz=mysqli_result(mysqli_query($link,"SELECT name from for_survey_types WHERE id='".$survey_type_id."'"), 0,0);
    $tit=$title_raz." - ОБЗОР ЗАРПЛАТ";
}else{
    $title_raz='Обзоры заработных плат';
    $tit=$title_raz;
}

include($folder.'_admin/_adminfiles/statlogs/stat.php');
include($folder.'_admin/templet/'.$temp.'/cont.txt');
?>