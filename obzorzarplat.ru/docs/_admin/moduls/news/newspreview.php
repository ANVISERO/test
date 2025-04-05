<?
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);
$limit=1; //количество новостей на странице
$query_long="select * from for_news where status='0' and lang='0' order by date desc, id desc limit $limit";
$result_long = mysqli_query($link, $query_long);
$schet=0;
while($row=mysqli_fetch_array($result_long))
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
'.substr($row["date"],8).'.'.substr($row["date"],5,2).'.'.substr($row["date"],0,4).' <img src="/_img/arr_01.gif" width="8" height="7">
&nbsp;<a style="font-size:12px; font-style:normal; font-weight:bold; text-decoration:none; color: #000" href="/news/view/?id='.$row["id"].'">'.$row["zag"].'</a>	
<br>
'.$anons.'
<p align="right"><a href="/news/view/?id='.$row["id"].'" class="link_5">Смотрите подробнее &#187;</a></p>
</td></tr>
</table>
');
$schet++;
}

$query_quick="select * from for_news where status='1' and lang='0' order by date desc, id desc limit $limit";
$result_quick = mysqli_query($link, $query_quick);
$schet=0;
while($row=mysqli_fetch_array($result_quick))
{
$id=$row["id"];
$filefolder=$folder.'_admin/elements/news/';
$anons=implode("", file($filefolder.$id.'_an.txt'));
echo('
<table width="100%" border="0" align="center" cellpadding="6" cellspacing="0">
  <tr>
    <td width="100%" valign="top" style="');
if($schet<>$limit)	echo('
background-image:url(/_img/g_dot_2.gif); background-position:bottom; background-repeat:repeat-x;');
echo('font-size:11px; font-style:italic; color:#000">
'.substr($row["date"],8).'.'.substr($row["date"],5,2).'.'.substr($row["date"],0,4).' <img src="/_img/arr_01.gif" width="8" height="7">
&nbsp;<a style="font-size:12px; font-style:normal; font-weight:bold; text-decoration:none; color: #000" href="/news/view/?id='.$row["id"].'">'.$row["zag"].'</a>	
<br>
'.$anons.'
<p align="right"><a href="/news/view/?id='.$row["id"].'" class="link_5">Смотрите подробнее &#187;</a></p>
</td></tr>
</table>
');
$schet++;
}
?>
<p align="right"><a href="/news" class="link_5">Все новости &#187;</a></p>