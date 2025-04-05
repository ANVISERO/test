<table width="455" height="36" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="151" height="3" bgcolor="#585858"></td>
    <td width="304" height="3" bgcolor="#585858"></td>
  </tr>
  <tr>
    <td height="33" colspan="2" align="right" valign="top" bgcolor="#171717">
	
<?
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db); 
$query="select * from for_liderprod order by date desc";
$result = mysqli_query($link, $query);

//Поиск в товарной базе
$id=mysqli_result($result,0,1);
$date=mysqli_result($result,0,0);
$query2="select * from for_goods where id='$id'";
$result2=mysqli_query($link,$query2);
$goods_name=mysqli_result($result2,0,2);

echo('
<table width="455" height="33" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="92" height="33" align="center" valign="middle">
<table width="58" border="0" cellspacing="0" cellpadding="0">
<tr><td height="24" align="center" valign="middle" class=date>'.$date.'</td>
</tr></table>
</td>
<td width="363" height="33" align="left" class=statname>Лидер продаж:&nbsp;&nbsp;<img src="/_img/arr_02.gif" width="8" height="5" >&nbsp;&nbsp;<a href="/shop/view/?id='.$id.'" style="color:#FF9900; font-weight:bold">'.$goods_name.'</a></td>
</tr>
</table>
');

?></td></tr></table>
