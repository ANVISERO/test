<?php
header('Content-type:application/json, charset=windows-1251;');
$folder=$_SERVER['DOCUMENT_ROOT'].'/';
include($folder.'../cgi/sql/mysql.php');

$sphereName=$_POST['sphereName'];

/* database in cp1251 */
$sphereNamecp1251=iconv('utf-8', 'Windows-1251',$sphereName);

/* check if region exists */
$sphere_exist=mysqli_num_rows(mysqli_query($link,"select id from base_sphere where name='$sphereNamecp1251'"));

/* insert new region, if it doesn't exist */
if($sphere_exist==0 && $sphereName!=""){
    $newSphere=mysqli_query($link,"insert into base_sphere (name) values('$sphereNamecp1251')");
    $newSphereId=mysql_insert_id();

    $output=array('sphereId'=>$newSphereId, 'sphereName'=>$sphereName);
    echo json_encode($output);
 }
 ?>