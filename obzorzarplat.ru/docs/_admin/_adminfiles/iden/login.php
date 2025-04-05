<?
$user_ip=getenv('HTTP_X_FORWARDED_FOR');
$date=date("Y:m:d");

$login_user=$_POST['login'];
$pass_user=$_POST['pass'];

$host=implode("", file('../../settings/mysql_host'));
$db=implode("", file('../../settings/mysql_db'));
$user=implode("", file('../../settings/mysql_user'));
$pass=implode("", file('../../settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

//Проверка паролей
$result=mysqli_query($link,"select * from for_login where log='$login_user'");
if(mysqli_num_rows($result)>0)
{
$test_pass=mysqli_result($result,0,1);
	if($test_pass==$pass_user)
		{
		//Успешная проверка
		$result_3=mysqli_query($link,"insert into for_admin_iden value ('$date','$user_ip','$login_user')");
		}
}

?>


<script>
self.location.href='../../';
</script>