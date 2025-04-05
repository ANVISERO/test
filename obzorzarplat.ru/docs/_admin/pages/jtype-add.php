<?php
header('Content-type:text/html, charset=windows-1251;');
$folder=$_SERVER['DOCUMENT_ROOT'].'/';
include($folder.'../cgi/sql/mysql.php');

$jtypeName=iconv('utf-8', 'windows-1251', $_POST["jtype_name"]);

mysqli_query($link,'insert into base_jtype(name) values(name="'.$jtypeName.'")');
$id=mysql_insert_id();

echo $id;
?>