<?php
$folder="../../";

$host=implode("", file($folder.'settings/mysql_host'));
$db=implode("", file($folder.'settings/mysql_db'));
$user=implode("", file($folder.'settings/mysql_user'));
$pass=implode("", file($folder.'settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

//if(!){echo 1;}

$report_id=intval($_POST['reportId']);

$user_id=mysqli_result(mysqli_query($link,"select user_id from for_users_corporat_reports where id=".$report_id),0,0);
$result=mysqli_query($link,"delete from for_users_corporat_reports where id=".$report_id);

if($result==false){echo 0;}
elseif($result==true)
{
    $root=$_SERVER['DOCUMENT_ROOT'];

    //Удаление файлов
    $url_file=$root.'/business/_report/user'.$user_id.'/report_'.$report_id.'.txt';
    unlink($url_file);


    $url_file_xls=$root.'/business/_report/user'.$user_id.'/report_'.$report_id.'.xls';
    if(file_exists($url_file_xls)){
    unlink($url_file_xls);
    }
    echo 1;
}
?>
