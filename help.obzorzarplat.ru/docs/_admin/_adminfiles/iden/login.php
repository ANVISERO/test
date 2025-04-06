<?
$user_ip=getenv('HTTP_X_FORWARDED_FOR');
$date=date("Y:m:d");

$login_user=$_POST['login'];
$pass_user=$_POST['pass'];

$host=implode("", file('../../settings/mysql_host'));
$db=implode("", file('../../settings/mysql_db'));
$user=implode("", file('../../settings/mysql_user'));
$pass=implode("", file('../../settings/mysql_pass'));

$link = mysql_connect($host,$user,$pass);
mysql_select_db($db,$link);

//Проверка паролей
$result=mysql_query("select * from for_login where log='$login_user'",$link);
if(mysql_num_rows($result)>0)
{
$test_pass=mysql_result($result,0,1);
	if($test_pass==$pass_user)
		{
		//Успешная проверка
		$result_3=mysql_query("insert into for_admin_iden value ('$date','$user_ip','$login_user')",$link);
		}
}

?>


<script>
self.location.href='../../';
</script>