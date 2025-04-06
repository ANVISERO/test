<?php
if(isset($_GET["page"]))
{$page=$_GET["page"];}
if(!isset($_GET["page"])){$page='content';}
$title=implode("", file('pages/'.$page.'/title.txt'));
include('sql/mysql.php');
$main_url=$_SERVER['HTTP_HOST'];
$link = mysql_connect($host,$user,$pass);
mysql_select_db($db,$link);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>CMS :: Управление сайтом</title>
<link href="_adminfiles/temps/css.css" rel="stylesheet" type="text/css" />
</head>

<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
    <td width="732">
	
<table width="732" height="20" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="16">&nbsp;</td>
<td width="700">&nbsp;</td>
<td width="16">&nbsp;</td>
</tr>
</table>


<table width="732" height="20" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="16" height="20" class=diz_01>&nbsp;</td>
<td width="700" height="20" class=diz_05><table width="700" height="20" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="19">&nbsp;</td>
    <td width="139" class="diz_13">&nbsp;</td>
    <td width="523" align="right"><font class=diz_14>домен: </font><font class=diz_15><?=$main_url;?></font></td>
    <td width="19" align="right"><a href="_adminfiles/iden/logout.php"><img src="_adminfiles/diz_22.gif" alt="Выход" width="14" height="14" border="0"></a></td>
  </tr>
</table></td>
<td width="16" height="20" class=diz_02>&nbsp;</td>
</tr>
</table>	
<table width="732" height="22" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="16" height="22" class=diz_03>&nbsp;</td>
<td width="700" height="22" class=diz_11><?php include('_adminfiles/temps/menu.php');?></td>
<td width="16" height="22" class=diz_04>&nbsp;</td>
</tr>
</table>	
<br><br>
<table width="732" height="22" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="16" height="22" class=diz_03>&nbsp;</td>
<td width="700" height="22" class=diz_11>

&nbsp;&nbsp;
<img src="_adminfiles/diz_14.gif" width="13" height="7">&nbsp;
<font class=diz_19><?php echo($title);?></font>
</td>
<td width="16" height="22" class=diz_04>&nbsp;</td>
</tr>
</table>	

<table width="732" height="250" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="16" height="250" class=diz_03>&nbsp;</td>
<td width="700" height="250" valign="top" style="background-color:#ffffff">


<table width="700" height="250" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15" height="15"></td>
    <td width="668" height="15"></td>
    <td width="15" height="15"></td>
  </tr>
  <tr>
    <td width="15" height="220">&nbsp;</td>
    <td width="668" height="220" valign="top">
<?php include('pages/'.$page.'/text.txt');?>
	</td>
    <td width="15" height="220">&nbsp;</td>
  </tr>
  <tr>
    <td width="15" height="15"></td>
    <td width="668" height="15"></td>
    <td width="15" height="15"></td>
  </tr>
</table>


</td>
<td width="16" height="250" class=diz_04>&nbsp;</td>
</tr>
</table>

<table width="732" height="20" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="16" height="20" class=diz_06>&nbsp;</td>
<td width="700" height="20" class=diz_05>

<table width="700" height="20" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="19">&nbsp;</td>
    <td width="523">&nbsp;</td>
    <td width="139" align="right"><font class=diz_14>помощь: </font></td>
    <td width="19" align="right"><a href="?page=instr"><img src="_adminfiles/diz_25.gif" alt="Инструкции" width="14" height="20" border="0"></a></td>
  </tr>
</table>

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