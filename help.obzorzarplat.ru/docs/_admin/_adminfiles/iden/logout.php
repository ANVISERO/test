<?
$user_ip=getenv('HTTP_X_FORWARDED_FOR');
$date=date("Y:m:d");

$host=implode("", file('../../settings/mysql_host'));
$db=implode("", file('../../settings/mysql_db'));
$user=implode("", file('../../settings/mysql_user'));
$pass=implode("", file('../../settings/mysql_pass'));
$link = mysql_connect($host,$user,$pass);
mysql_select_db($db,$link);
$result=mysql_query("delete from for_admin_iden where date='$date' and ip='$user_ip'");
?>

<script>
self.location.href='../../';
</script>