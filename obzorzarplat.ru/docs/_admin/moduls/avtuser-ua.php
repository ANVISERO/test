<?
$user_ip=$_SERVER['REMOTE_ADDR'];
$date=date("Y-m-d");
//Проверка
if(!file_exists($folder.'_admin/elements/users/enter/'.$date.'/'.$user_ip.'.txt'))
{include($folder.'_admin/moduls/avtuser-no-ua.php');}

if(file_exists($folder.'_admin/elements/users/enter/'.$date.'/'.$user_ip.'.txt'))
{include($folder.'_admin/moduls/avtuser-yes-ua.php');}

?>