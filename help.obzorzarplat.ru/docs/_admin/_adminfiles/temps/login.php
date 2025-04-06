<?
$main_url=$_SERVER['HTTP_HOST'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Neogara CMS :: Авторизация</title>
<link href="_adminfiles/temps/css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
    <td width="732">
	
<table width="732" height="100" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="16" height="100">&nbsp;</td>
<td width="700" height="100">&nbsp;</td>
<td width="16" height="100">&nbsp;</td>
</tr>
</table>


<table width="732" height="20" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="16" height="20" class=diz_01>&nbsp;</td>
<td width="700" height="20" class=diz_05><table width="700" height="20" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="19">&nbsp;</td>
    <td width="139" class="diz_13">&nbsp;</td>
    <td width="523" align="right"><font class=diz_14>домен: </font><font class=diz_15>www.<?=$main_url;?></font></td>
    <td width="19" align="right"></td>
  </tr>
</table></td>
<td width="16" height="20" class=diz_02>&nbsp;</td>
</tr>
</table>	
	
	
<table width="732" height="100" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="16" height="100" class=diz_03>&nbsp;</td>
<td width="700" height="100" align="center" valign="middle" style="background-color:#FFFFFF">

<form name="iden" id="iden" action="_adminfiles/iden/login.php" method="post">
<table width="700" border="0" cellpadding="3" cellspacing="0">
  <tr>
    <td align="right" valign="middle">&nbsp;</td>
    <td align="left" valign="middle"><strong>Вход в систему</strong></td>
  </tr>
  <tr>
    <td width="300" align="right" valign="middle">Логин:</td>
    <td align="left" valign="middle"><input class="diz_22" type="text" name="login" value="" ></td>
  </tr>
  <tr>
    <td width="300" align="right" valign="middle">Пароль:</td>
    <td align="left" valign="middle"><input class="diz_22" type="password" name="pass" value="" ></td>
  </tr>
  <tr>
    <td width="300" align="right" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">
<input type="image" src="_adminfiles/diz_23.gif" style="height:20px; width:150px; cursor:hand" onclick="iden.submit();"></td>
  </tr>
</table>
</form>

</td>
<td width="16" height="100" class=diz_04>&nbsp;</td>
</tr>
</table>	
	
	
	
<table width="732" height="20" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="16" height="20" class=diz_06>&nbsp;</td>
<td width="700" height="20" align="center" valign="middle" class=diz_05>
<font class="diz_14">Для доступа к панели управления сайтом, укажите логин и пароль.</font>
</td>
<td width="16" height="20" class=diz_07>&nbsp;</td>
</tr>
</table>

<table width="732" height="20" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="16" height="20" class=diz_09>&nbsp;</td>
<td width="700" height="20" class=diz_08>&nbsp;</td>
<td width="16" height="20" class=diz_10>&nbsp;</td>
</tr>
</table>	
	
	</td>
    <td>&nbsp;</td>
  </tr>
</table>




</body>
</html>
