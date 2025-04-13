<?php
$folder="../../../";
include($folder.'application/sql/mysql.php');

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!$link){echo "oops";}

include('../../../application/moduls/business/delete_archive.php');
?>