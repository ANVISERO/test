<?
$id=$_GET["id"];
$filter="select * from for_articles where id='$id'";
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$query="$filter";
$result=mysqli_query($link,$query);
$date=mysqli_result($result,0,1);
$zag=mysqli_result($result,0,2);
$filefolder=$folder.'_admin/elements/articles/';
$opis=implode("", file($filefolder.$id.'_op.txt'));
?>

<input type="button" value="Articles" class="but" onClick="self.location.href='/eng/stats/';">
<hr>
<font style="color:#2b2b2b"><b><?=$date;?></b>&nbsp;&nbsp;<font style="font-size:11px; font-weight:bold; font-style:normal; text-decoration:none; color:#cc0000"><?=$zag;?></font>
<br><br>
<? echo($opis);?>
<hr>
<input type="button" value="Articles" class="but" onClick="self.location.href='/eng/stats/';">