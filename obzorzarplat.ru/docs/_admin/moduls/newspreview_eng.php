<?
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);
$limit=1;
$query="select * from for_news where status='1' and lang='1' order by id desc limit $limit";
$result = mysqli_query($link, $query);
$schet=1;
while($row=mysqli_fetch_array($result))
{
$id=$row["id"];
$filefolder=$folder.'_admin/elements/news/';
$anons=implode("", file($filefolder.$id.'_an.txt'));
echo('
<table width="100%" border="0" align="center" cellpadding="6" cellspacing="0">
  <tr>
    <td width="100%" valign="top" style="');
if($schet<>$limit)	echo('
background-image:url(/_img/g_dot_2.gif); background-position:bottom; background-repeat:repeat-x; ');
echo('font-size:11px; font-style:italic; color:#000">
'.$row["date"].' <img src="/_img/arr_01.gif" width="8" height="7">
&nbsp;<a style="font-size:12px; font-weight:bold; font-style:normal; text-decoration:none; color:#000" href="/eng/news/view/?id='.$row["id"].'">'.$row["zag"].'</a>	
<br>
'.$anons.'</td></tr></table>
');
$schet++;
}
?>	
