<?php 
$key = implode("", file('_vars/key.txt'));
$des = implode("", file('_vars/des.txt'));
$folder=implode("", file('_vars/folder.txt'));
$temp=implode("", file('_vars/temp.txt'));
$content='_vars/content.php';
include($folder.'_admin/sql/mysql.php');

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(isset($_GET["id"])){$news_id=intval($_GET["id"]);}else{$news_id=0;}
if($news_id!=0){
    $title_raz_q=mysqli_query($link,"SELECT id, zag, date from for_news WHERE id='".$news_id."'");
    while ($title_raz_result = mysqli_fetch_object($title_raz_q)) {
	 if ($news_id == "1642") $title_raz = $title_raz_result->zag;
        else $title_raz = date('d.m.Y',strtotime($title_raz_result->date)).' '.$title_raz_result->zag;
    }
    
}else{
    $title_raz='Обзоры заработных плат по должностям';
}

$tit=$title_raz." - ОБЗОР ЗАРПЛАТ";

include($folder.'_admin/_adminfiles/statlogs/stat.php');
include($folder.'_admin/templet/regular.php');
?>