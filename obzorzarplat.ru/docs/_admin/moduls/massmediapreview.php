<?
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);
$limit=1;
$query="select * from for_articles where status='1' and lang='0' and section_id='2' order by date desc limit $limit";
$result = mysqli_query($link, $query);
$schet=1;
while($row=mysqli_fetch_array($result))
{
list($year,$month,$day)=implode('[-,/,.]',$row[date]);
$id=$row["id"];
$filefolder=$folder.'_admin/elements/articles/';
$anons=implode("", file($filefolder.$id.'_an.txt'));
echo('
<table width="250" border="0" align="center" cellpadding="6" cellspacing="0">
  <tr>
    <td width="250" valign="top" style="');
if($schet<>$limit)	echo('
background-image:url(/_img/g_dot_2.gif); background-position:bottom; background-repeat:repeat-x; ');
echo('font-size:11px; font-style:italic; color:#000">
'.$day.'.'.$month.'.'.$year.' <img src="/_img/arr_01.gif" width="8" height="7">
&nbsp;<a style="font-size:12px; font-style:normal; font-weight:bold; text-decoration:none; color: #000" href="/stats/view/?id='.$row["id"].'">'.$row["zag"].'</a>	
<br>
'.$anons.'
  <p align="right"><a href="/stats/view/?id='.$row["id"].'" class="link_5">Читать далее...</a></p>
  </td>
</tr>
</table>
');
$schet++;
}
?>