<?php 
$tit = implode("", file('_vars/title.txt'));
$key = implode("", file('_vars/key.txt'));
$des = implode("", file('_vars/des.txt'));
$title_raz = implode("", file('_vars/zag.txt'));
$folder = implode("", file('_vars/folder.txt'));
$temp = implode("", file('_vars/temp.txt'));
$css = $folder.'_css/templet/'.$temp.'/css.css';
$content = '_vars/content.txt';
include($folder.'_admin/sql/mysql.php');


$link = mysqli_connect($host,$user,$pass) or die(mysql_error());
mysqli_select_db($link,$db);

if(isset($_GET["id"]) && $_GET["id"]!='') $news_id = intval($_GET["id"]);
	else $news_id = 0;


if($news_id != 0) {
    $title_raz_q=mysqli_query($link,"SELECT zag,date from for_news WHERE id='".$news_id."'");
    while ($title_raz_result = mysqli_fetch_object($title_raz_q)) {
        $title_raz=date('d.m.Y',strtotime($title_raz_result->date)).' '.$title_raz_result->zag;
    }
    $tit=$title_raz." - нагнп гюпокюр";
}

include($folder.'_admin/_adminfiles/statlogs/stat.php');
include($folder.'_admin/templet/'.$temp.'/cont.txt');
?>