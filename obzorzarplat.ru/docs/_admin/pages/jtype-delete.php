<?php
$folder=$_SERVER['DOCUMENT_ROOT'].'/';
include($folder.'../cgi/sql/mysql.php');

$jtypeId=intval($_POST["id"]);
mysqli_query($link,'delete from base_jtype where id='.$jtypeId);
?>