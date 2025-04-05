<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link rel="stylesheet" type="text/css" href="/_css/indiv_report/indiv_report_print.css" />
<title>Персональный отчет</title>
</head>
<body>

<?php
$root=$_SERVER['DOCUMENT_ROOT'];
$host=implode("", file($root.'/_admin/settings/mysql_host'));
$db=implode("", file($root.'/_admin/settings/mysql_db'));
$user=implode("", file($root.'/_admin/settings/mysql_user'));
$pass=implode("", file($root.'/_admin/settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$order_url=$_GET['d'];
$test_url=mysqli_num_rows(mysqli_query($link,"select id from base_userorders where url='$order_url'"));

echo('
<div class="buttons">
<a href="http://obzorzarplat.ru"><img alt="Обзор зарплат" src="/_img/logo_ru.jpg" width="290" height="55" border="0" /></a>
<div class="right_menu">
<a href="javascript:window.print();"><img src="/_img/menu_icons/fileprint_mini.png" title="Печать" border="0" alt="Печать" /></a>
<a href="http://www.htm2pdf.co.uk"><img src="/_img/menu_icons/pdf_red.png" title="Сохранить в формате PDF" border="0" alt="Сохранить в формате PDF"></a>
<a href="javascript:window.close();"><img src="/_img/menu_icons/close_red_mini.png" title="Закрыть" border="0" alt="Закрыть"></a>
</div>
<hr>
</div>
');

if($test_url<>0)
{
$order_id=mysqli_result(mysqli_query($link,"select id from base_userorders where url='$order_url'"),0,0);
$order_html=$root.'/_orders/report_express_'.$order_id.'.txt';
include($order_html);
}
else
{echo('Такой отчет не существует!');}

?>

</body>
</html>