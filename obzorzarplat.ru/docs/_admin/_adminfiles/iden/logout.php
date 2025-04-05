<?
$user_ip=getenv('HTTP_X_FORWARDED_FOR');
$date=date("Y:m:d");

$host=implode("", file('../../settings/mysql_host'));
$db=implode("", file('../../settings/mysql_db'));
$user=implode("", file('../../settings/mysql_user'));
$pass=implode("", file('../../settings/mysql_pass'));
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$result=mysqli_query($link,"delete from for_admin_iden where date='$date' and ip='$user_ip'");
?>

<script>
self.location.href='../../';
</script>