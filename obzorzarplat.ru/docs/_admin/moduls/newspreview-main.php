<style type="text/css">
<!--
a.link1, a.link1:visited{font-size:13px; font-style:normal; font-weight:bold; text-decoration:none; color: #c00}
a.title, a.title:visited{font-size:14px; color:#c00; font-weight:bold; text-align:center; text-decoration:none;}
a.link2, a.link2:visited{color:#000; font-weight:normal; text-decoration:none;font-size:13px;}
a.link3, a.link3:visited{color:#c00; font-style:italic; font-size:13px;}
-->
</style>

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
echo('color:#000">
'.substr($row["date"],8).'.'.substr($row["date"],5,2).'.'.substr($row["date"],0,4).' <img src="/_img/arr_01.gif" width="8" height="7">
&nbsp;<a class="link1" href="/news/view/?id='.$row["id"].'">'.$row["zag"].'</a>	
<br>
<a href="/news/view/?id='.$row["id"].'" class="link2">'.$anons.'</a>
<p align="right"><a href="/news/view/?id='.$row["id"].'" class="link3">Смотрите подробнее &#187;</a></p>
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
&nbsp;<a class="link1" href="/news/view/?id='.$row["id"].'">'.$row["zag"].'</a>	
<br>
<a href="/news/view/?id='.$row["id"].'" class="link2">'.$anons.'</a>
<p align="right"><a href="/news/view/?id='.$row["id"].'" class="link3">Смотрите подробнее &#187;</a></p>
</td></tr>
</table>
');
$schet++;
}
?>