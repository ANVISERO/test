<?
$user_ip=$_SERVER['REMOTE_ADDR'];
$date=date("Y-m-d");
$user_id=implode("", file($folder.'_admin/elements/users/enter/'.$date.'/'.$user_ip.'.txt'));
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$user_login=mysqli_result(mysqli_query($link,"select * from for_users where id='$user_id'"),0,1);
$user_im=mysqli_result(mysqli_query($link,"select * from for_users where id='$user_id'"),0,3);
$user_fam=mysqli_result(mysqli_query($link,"select * from for_users where id='$user_id'"),0,4);
$user_otch=mysqli_result(mysqli_query($link,"select * from for_users where id='$user_id'"),0,5);
?>

<table width="265" height="33" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="19" height="33"><img src="/_img/blok_tit_l.gif" width="19" height="33"></td>
    <td width="240" height="33" bgcolor="#E0E0E0" style="padding-left:10px">
	
<b><?=$user_im.' '.$user_fam;?></b>

	
	</td>
    <td width="6" height="33"><img src="/_img/blok_tit_r.gif" width="6" height="33"></td>
  </tr>
</table>
<table width="265" height="80" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #E0E0E0">
  <tr>
    <td height="80" align="center" valign="middle">
	
<table width="250" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td align="left"></td>
  </tr>
  <tr>
    <td align="center">
	<font style="font-size:10px">¬ход в персональный кабинет</font><br><br>
	<input type="button" value="вход в кабинет" class="but" onClick="self.location.href='/users/'">	
       <input type="button" value="выход" class="but" onClick="self.location.href='/users/?page=logout'"></td>
  </tr>
</table>
</td>
  </tr>
</table>
