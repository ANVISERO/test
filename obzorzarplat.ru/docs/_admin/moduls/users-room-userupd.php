<?
//—бор переменных
$kov="'";
$im=$_POST['im'];
$fam=$_POST['fam'];
$otch=$_POST['otch'];
$mail=$_POST['mail'];
$day_b=$_POST['day_b'];
$mon_b=$_POST['mon_b'];
$year_b=$_POST['year_b'];
$birth=$day_b.' '.$mon_b.' '.$year_b;
$sex=$_POST['sex'];
$country=$_POST['country'];
$sity=$_POST['sity'];
$phone=$_POST['phone'];
$bisines=$_POST['bisines'];
$icq=$_POST['icq'];
$skype=$_POST['skype'];
$web=$_POST['web'];

$query="update for_users SET `im` = '$im', `fam` = '$fam', `otch` = '$otch', `mail` = '$mail', `birth` = '$birth', `sex` = '$sex', `country` = '$country', `sity` = '$sity', `phone` = '$phone', `bisines` = '$bisines', `icq` = '$icq', `skype` = '$skype', `web` = '$web' where `id`='$user_id'";
$result=mysqli_query($link,$query);
?>
<script>
self.location.href='?page=user';
</script>