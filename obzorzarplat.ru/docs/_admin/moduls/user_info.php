<?
$user_id=$_GET["id"];
$host=implode("", file('../settings/mysql_host'));
$db=implode("", file('../settings/mysql_db'));
$user=implode("", file('../settings/mysql_user'));
$pass=implode("", file('../settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$query="select * from for_forumusers where id='$user_id'";
$result=mysqli_query($link,$query);

$img_url='../elements/forumusers/'.$user_id.'/forumuser.jpg';
if(file_exists($img_url))
{$user_img=$img_url;}
if(!file_exists($img_url))
{$user_img='../sql/forumuser.gif';}

$user_log=mysqli_result($result,0,1);
$user_im=mysqli_result($result,0,3);
$user_fam=mysqli_result($result,0,4);
$user_otch=mysqli_result($result,0,5);
$user_birth=mysqli_result($result,0,7);
$user_sex=mysqli_result($result,0,8);

$user_mail=mysqli_result($result,0,6);
$user_country=mysqli_result($result,0,9);
$user_sity=mysqli_result($result,0,10);
$user_phone=mysqli_result($result,0,11);
$user_icq=mysqli_result($result,0,13);
$user_skype=mysqli_result($result,0,15);
$user_web=mysqli_result($result,0,14);
$user_bis=mysqli_result($result,0,12);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Карточка пользователя</title>
</head>

<body style="background-color:#000000">
<style>
.user_info_1{border:2px solid #171717}
img.user_info_2{border:1px solid #171717}
.user_info_3{font-family:Verdana; font-size:12px; font-weight:bold; color:#ffffff}
td.user_info_4{color:#cccccc; font-family:verdana; font-size:10px}
td.user_info_5, .user_info_6{color:#cccccc; font-family:verdana; font-size:10px; font-weight:bold}
</style>

<table width="500" height="450" border="0" cellpadding="0" cellspacing="0" class="user_info_1">
  <tr>
    <td align="center" valign="middle"><table width="480" height="430" border="0" cellpadding="6" cellspacing="0">
      <tr>
        <td width="80" height="80" align="center" valign="top"><img class="user_info_2" src="<?=$user_img;?>" width="80" height="80"></td>
        <td width="400" height="80" align="left" valign="top">
		<font class="user_info_3"><?=$user_log;?></font><br>
		<font class="user_info_6"><?=$user_im.' '.$user_otch.' '.$user_fam;?><br>
		<?=$user_birth;?>, <?=$user_sex;?></font>
		</td>
      </tr>
      <tr>
        <td width="80" align="right" class="user_info_4">Адрес E-mail:</td>
        <td width="400" align="left" class="user_info_5"><?=$user_mail;?></td>
      </tr>
      <tr>
        <td width="80" align="right" class="user_info_4">Страна:</td>
        <td width="400" align="left" class="user_info_5"><?=$user_country;?></td>
      </tr>
      <tr>
        <td width="80" align="right" class="user_info_4">Город:</td>
        <td width="400" align="left" class="user_info_5"><?=$user_sity;?></td>
      </tr>
      <tr>
        <td width="80" align="right" class="user_info_4">Телефон:</td>
        <td width="400" align="left" class="user_info_5"><?=$user_phone;?></td>
      </tr>
      <tr>
        <td width="80" align="right" class="user_info_4">Номер ICQ:</td>
        <td width="400" align="left" class="user_info_5"><?=$user_icq;?></td>
      </tr>
      <tr>
        <td width="80" align="right" class="user_info_4">Имя Skype:</td>
        <td width="400" align="left" class="user_info_5"><?=$user_skype;?></td>
      </tr>
      <tr>
        <td width="80" align="right" class="user_info_4">Сайт:</td>
        <td width="400" align="left" class="user_info_5"><?=$user_web;?></td>
      </tr>
      <tr>
        <td width="80" align="right" class="user_info_4">Деятельность:</td>
        <td width="400" align="left" class="user_info_5"><?=$user_bis;?></td>
      </tr>
    </table></td>
  </tr>
</table>
<center><input type="button" style="border:0; font-family:Verdana; font-size:11px; background-color:#171717; color:#bbb; cursor:hand" value="Закрыть окно" onclick="window.close();"></center>
</body>
</html>
