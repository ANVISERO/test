<?
$id=$_GET['id'];
//—бор данных
$host=implode("", file('../settings/mysql_host'));
$db=implode("", file('../settings/mysql_db'));
$user=implode("", file('../settings/mysql_user'));
$pass=implode("", file('../settings/mysql_pass'));
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);



$result=mysqli_query($link,"select * from for_files where id='$id'");
$fil_down=mysqli_result($result,0,5);
$down_new=$fil_down+1;
$fil_fil=mysqli_result($result,0,3);
$fil_url='/_admin/elements/downloads/'.$fil_fil;
$resilt2=mysqli_query($link,"update for_files SET `down` = '$down_new' where `id`='$id'");
?>
<script>
self.location.href='<?=$fil_url;?>';
</script>