<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Персональный отчет</title>
</head>
<style>
body{font-family: verdana; font-size:11px}
table{border-collapse:collapse; border:1px solid #666666}
.rigblok{ border:1px solid #000; padding:5px}
</style>
<body>

<?
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
<input type="button" value="Закрыть" onClick="window.close();">
<input type="button" value="Печать" onClick="">
<hr>
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
