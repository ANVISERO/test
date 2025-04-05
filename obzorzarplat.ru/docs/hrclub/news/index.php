<?php 
$tit = implode("", file('_vars/title.txt'));
$key = implode("", file('_vars/key.txt'));
$des = implode("", file('_vars/des.txt'));
$title_raz=implode("", file('_vars/zag.txt'));
$temp=implode("", file('_vars/temp.txt'));
$folder=$_SERVER['DOCUMENT_ROOT'].'/';
$content='_vars/content.php';

include($folder.'../cgi/sql/mysql.php');
if(isset($_GET["id"])){$news_id=intval($_GET["id"]);}else{$news_id=0;}
if($news_id!=0){
    $title_raz_q=mysqli_query($link,"SELECT zag,date from for_news WHERE id='".$news_id."'");
    while ($title_raz_result = mysqli_fetch_object($title_raz_q)) {
        $title_raz=date('d.m.Y',strtotime($title_raz_result->date)).' '.$title_raz_result->zag;
    }
    $tit=$title_raz." - ОБЗОР ЗАРПЛАТ";
}else{
    $title_raz='Новости Петербургского профессионального кадрового клуба "Кочубей"';
    $tit=$title_raz;
}

include($folder.'_admin/_adminfiles/statlogs/stat.php');
include($folder.'../cgi/templet/regular.php');
?>