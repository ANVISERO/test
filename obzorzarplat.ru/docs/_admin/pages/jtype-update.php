<?php
header('Content-type:text/html, charset=windows-1251;');
$folder=$_SERVER['DOCUMENT_ROOT'].'/';
include($folder.'../cgi/sql/mysql.php');

$jtypeNameNew=iconv('utf-8', 'windows-1251', $_POST["value"]);
$jtypeId=intval($_POST["id"]);

mysqli_query($link,'update base_jtype set name="'.$jtypeNameNew.'" where id='.$jtypeId);

echo $_POST["value"];

?>