<?php

$report_id=intval($_GET['reportId']);


$user_id=mysqli_result(mysqli_query($link,"select user_id from for_users_corporat_reports where id='".$report_id."'"),0,0);
$result=mysqli_query($link,"delete from for_users_corporat_reports where id='".$report_id."'");

if($result==false){echo 0;}
elseif($result==true)
{
    $root=$_SERVER['DOCUMENT_ROOT'];

    //Удаление файлов
    $url_file=$root.'/_report/user'.$user_id.'/report_'.$report_id.'.txt';
    unlink($url_file);


    $url_file_xls=$root.'/_report/user'.$user_id.'/report_'.$report_id.'.xls';
    if(file_exists($url_file_xls)){
    unlink($url_file_xls);
    }
    echo 1;
}
?>
