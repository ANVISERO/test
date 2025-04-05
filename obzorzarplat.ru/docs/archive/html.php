<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Персональный отчет</title>
<link href="/_css/print_report.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
$root=$_SERVER['DOCUMENT_ROOT'];
$folder="../../";
$host=implode("", file($folder.'application/settings/mysql_host'));
$db=implode("", file($folder.'application/settings/mysql_db'));
$user=implode("", file($folder.'application/settings/mysql_user'));
$pass=implode("", file($folder.'application/settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!){echo "not link";};

$order_url=$_GET['d'];

$test_url=mysqli_num_rows(mysqli_query($link,"select id from for_users_corporat_reports where url='$order_url'"));

if($test_url<>0){
    $order_id=mysqli_result(mysqli_query($link,"select id from for_users_corporat_reports where url='$order_url'"),0,0);
    $user_id=mysqli_result(mysqli_query($link,"select user_id from for_users_corporat_reports where url='$order_url'"),0,0);
    $order_html=$root.'/_report/user'.$user_id.'/report_'.$order_id.'.txt';

if(file_exists($root.'/_report/user'.$user_id.'/report_'.$order_id.'.xls')){
    $href_xls='<a href="/_report/user'.$user_id.'/report_'.$order_id.'.xls"><img src="/_img/business/page_white_excel.png" title="Отчет в формате Excel" border="0" alt="Отчет в формате Excel"></a>';
}else{
    $href_xls='';
}
echo('
<div class="buttons">
<a href="http://obzorzarplat.ru"><img alt="Обзор зарплат" src="/_img/logo_ru.jpg" width="290" height="55" border="0" /></a>
<div class="right_menu">
<a href="/archive/"><img src="/_img/menu_icons/archive2.png" title="Архив" border="0" alt="Архив" /></a>
<a href="javascript:window.print();"><img src="/_img/menu_icons/fileprint_mini.png" title="Печать" border="0" alt="Печать" /></a>
'.$href_xls.'
<a href="javascript:window.close();"><img src="/_img/menu_icons/close_red_mini.png" title="Закрыть" border="0" alt="Закрыть"></a>
</div>
<hr>
</div>
');

include($order_html);
}
else
{echo('Такой отчет не существует!');}
?>

</body>
</html>