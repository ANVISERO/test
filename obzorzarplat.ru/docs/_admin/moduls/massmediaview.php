<?
$stat_date=mysqli_result(mysqli_query($link,"select date from for_articles where id='$id'"),0,0);

list($year,$month,$day)=implode('[/,-,.]',$stat_date);

$filefolder=$folder.'_admin/elements/articles/';
$stat_opis=implode("", file($filefolder.$id.'_op.txt'));
$stat_autor=implode("", file($filefolder.$id.'_autor.txt'));
$stat_source=mysqli_result(mysqli_query($link,"select source from for_articles where id='$id'"),0,0);
?>
<style type="text/css">
<!--
.stylearticles {font-size:16px; font-weight:bold; text-align:center; color:#fff; text-decoration:none;}


.articles{background:#Fff; padding:3px; margin:1px;}

a.jobs, a.jobs:visited{font-size:14px; text-decoration:underline; color:#000; font-weight:normal;}
a.jobs:hover {text-decoration:none;}

#wordsleft {float:right; top:200px; right:10px; height:auto; width:250px; background:#Fff; border:1px solid silver; margin:5px;}
.style2 {font-size: 14}
.style4 {color: #FF0000}
-->
</style>


<div>

<font style="color:#2b2b2b"><b><?=$day;?>.<?=$month;?>.<?=$year;?></b>&nbsp;&nbsp;<font style="font-size:14px; font-weight:bold; font-style:normal; text-decoration:none; color:#c00"><em><?=$stat_name;?></em></font>
<br><br>


<?
if($stat_autor<>''){echo('<p><b>Авторы:</b> <em>'.$stat_autor.'</em></p>');}
if($stat_source<>''){echo('<p><b>Опубликовано:</b> <em>'.$stat_source.'</em></p>');}

?>

<div id="wordsleft">
<div class="articles">
<p><em>Другие публикации о нас::</em></p>
<?
$limit=2;
$query="select * from for_articles where status='1' and lang='0' and section_id='2' and id!='$id' order by date desc limit $limit";
$result = mysqli_query($link, $query);

while($row=mysqli_fetch_array($result))
{
$id_all=$row["id"];

echo('<p><img src="/_img/arr_01.gif" width="8" height="7">
&nbsp;<a class="article" href="/stats/view/?id='.$id_all.'">'.$row["zag"].'</a></p>
');
}
?>
<p align="right"><a href="/stats/" class="link_4">Все публикации &raquo;</a></p>
</div>
</div>

<span>
<? echo($stat_opis); ?>
</span>
</div>

<p align="right"><a href="/stats/" class="link_4">Все публикации &raquo;</a></p>

<hr>

<table width="100%" border="0">
  <tr bgcolor="#999999">
    <td colspan="2"><div align="center">
        <p><strong><a href="http://obzorzarplat.ru/servis/" class="stylearticles">СЕРВИСЫ</a></strong> </p>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">
        <p><a href="http://obzorzarplat.ru/servis/zp/"><img src="/_img/zp_pic.jpg" border="0" width="136" height="100"></a> <br>
        <a href="http://obzorzarplat.ru/servis/zp/" class="link_4">Сравните Вашу зарплату с рыночными значениями.</a></p>
        </div></td>
    <td width="475"><div align="center">
        <p><a href="http://obzorzarplat.ru/servis/pensiya/"><img src="/_img/pension_pic.jpg" border="0" width="150" height="100"></a> <br>
        <a href="http://obzorzarplat.ru/servis/pensiya/" class="link_4">Узнайте размер Вашей будущей пенсии.</a></p>
        </div></td>
  </tr>
  <tr>
    <td><p>&nbsp;</p>
        <p align="center"><a href="http://obzorzarplat.ru/servis/lgot/"><img src="/_img/lgot_pic.jpg" border="0" width="67" height="100"></a> <br>
          <a href="http://obzorzarplat.ru/servis/lgot/" class="link_4">Узнайте размер государственных пособий, которые Вы можете получить</a></p></td>
    <td><div align="center">
        <p>&nbsp;</p>
        <p><a href="/servis/gosgarant/"><img src="/_img/gosg_mini.jpg" border="0" width="151" height="100"></a> <br>
            <a href="/servis/gosgarant/" class="link_4">Государственные гарантии и компенсации.</a></p>
    </div></td>
  </tr>
</table>
<p>&nbsp; </p>