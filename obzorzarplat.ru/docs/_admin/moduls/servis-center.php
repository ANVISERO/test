<?
$filter="select * from for_serviscenter order by sity";
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$query="$filter";
$result=mysqli_query($link,$query);
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="40" height="30">&nbsp;&nbsp;<strong>№</strong></td>
<td width="150"><strong>&nbsp;&nbsp;Город</strong></td>
<td><strong>&nbsp;&nbsp;Компания</strong></td>
<td width="150"><strong>&nbsp;&nbsp;Адрес</strong></td>
<td width="150"><strong>&nbsp;&nbsp;Телефоны</strong></td>
</tr>
<?
$marker=-1;
$num=1;
while($row=mysqli_fetch_array($result))
{
if($marker>0){$color='171717';}
if($marker<0){$color='000000';}
echo('
<tr style="background-color:#'.$color.'">
<td height="25" style="border-bottom:1px dotted #171717; border-right:1px dotted #171717">&nbsp;&nbsp;<font style="font-size:10px">'.sprintf("%'02d",$num).'</td>
<td style="border-bottom:1px dotted #171717; border-right:1px dotted #171717">&nbsp;&nbsp;'.$row["sity"].'</a></td>
<td style="border-bottom:1px dotted #171717; border-right:1px dotted #171717">&nbsp;&nbsp;'.$row["comp"].'</td>
<td style="border-bottom:1px dotted #171717; border-right:1px dotted #171717">&nbsp;&nbsp;'.$row["adress"].'</td>
<td style="border-bottom:1px dotted #171717">&nbsp;&nbsp;'.$row["phone"].'</td>
</tr>
');
$marker=-$marker;
$num++;
}

?>
</table>

