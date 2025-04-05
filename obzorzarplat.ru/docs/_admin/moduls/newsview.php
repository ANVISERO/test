<?php
$id=$_GET["id"];
$filter="select * from for_news where id='$id'";
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$query="$filter";
$result=mysqli_query($link,$query);
$date=mysqli_result($result,0,1);
$zag=mysqli_result($result,0,2);
$filefolder=$folder.'_admin/elements/news/';
$opis=implode("", file($filefolder.$id.'_op.txt'));
list($year,$month,$day)=implode('[-,/,.]',$date);
?>



<p><font style="color:#2b2b2b"><b>
  <?php echo($day.'.'.$month.'.'.$year); ?>
  </b>&nbsp;&nbsp;<font style="font-size:11px; font-weight:bold; font-style:normal; text-decoration:none; color:#cc0000">
  <?=$zag;?>
  </font></font></p>

<p align="left"><font style="color:#2b2b2b">  <?php include($filefolder.$id.'_op.txt');?> </font></p>
<hr>
<p align="right">
  <input name="button" type="button" class="but_pension" onClick="self.location.href='/news/';" value="Все новости >>">
</p>
