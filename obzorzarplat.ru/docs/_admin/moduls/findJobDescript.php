<?php
$host=implode("", file('../settings/mysql_host'));
$db=implode("", file('../settings/mysql_db'));
$user=implode("", file('../settings/mysql_user'));
$pass=implode("", file('../settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!){echo "fuck!";}

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

header("Content-Type: text/html; charset=windows-1251");

$job_id=intval($_GET['job']);
$style=intval($_GET['style']);
?>
<a href="/servis/job_description/view/?id=<?php echo($job_id);?>&lang=0" class="lk1" target="jobDescript" onClick="window.open(this.href, this.target, config='height=400,width=800,toolbar=0, scrollbars=1')">Описание должности</a>
