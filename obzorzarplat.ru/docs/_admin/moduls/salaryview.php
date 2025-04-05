<?
$salary_date=mysqli_result(mysqli_query($link,"select date from for_salary where id='$id'"),0,0);

$filefolder=$folder.'_admin/elements/salary/';
$anons=implode("", file($filefolder.$id.'_anons.txt'));
$job_description=implode("", file($filefolder.$id.'_job_description.txt'));
$info=implode("", file($filefolder.$id.'_info.txt'));
$analitics=implode("", file($filefolder.$id.'_analitics.txt'));
$salary_avg=implode("", file($filefolder.$id.'_salary.txt'));

$salary_image='';
if(file_exists($filefolder.$id.'.jpg'))
{$salary_image='<a href="/servis/medium_wage/view/?id='.$id.'">
<img style="border:1px solid #2b2b2b; cursor:pointer" width="250" height="250" src="'.$filefolder.$id.'.jpg" alt="Подробнее"></a>';}


?>
<style type="text/css">
<!--
.wordsright{float:right; top:200px; right:150px;  height:auto; width:250px;  margin:5px; }

.description{padding-left:3px; margin:2px;}

.first{margin:1px; width:100%; height:250px;}

.salary_table table{width:100%}

p.anons{font-weight:bold; font-size:14px;}

#wordsleft {float:left; top:200px; right:10px; height:auto; width:300px; margin:5px; psdding:0;}
.style2 {font-size: 14}
.style4 {color: #FF0000}

table.for_salary{border:1px solid silver; border-collapse:collapse; font-family:Verdana;}
table.for_salary td, th{padding:4px; text-align:center;}
-->
</style>




<font style="color:#2b2b2b"><b><?=substr($salary_date,8);?>.<?=substr($salary_date,5,2);?>.<?=substr($salary_date,0,4);?></b>&nbsp;&nbsp;<font style="font-size:14px; font-weight:bold; font-style:normal; text-decoration:none; color:#c00"><em><?=$job_name;?></em></font>
<br><br>

<div class="first">
<div id="wordsleft">
<? if(isset($salary_image)){echo($salary_image);} ?>
</div>

<?
echo('<p class="anons">'.$anons.'</p>');
?>

<div class="description">
<?
echo('<p>'.$analitics.'</p>'); 
?>
</div>
</div>

<div class="salary_table">
<? echo('<p>'.$salary_avg.'</p>'); ?>
</div>



</div>

<div class="description">
<p><b>Описание должности:</b></p>
<?
if($info<>''){echo('<p>'.$info.'</p>');}
echo('<p>'.$job_description.'</p>');
?>
</div>
</div>

<p align="right"><a href="/servis/medium_wage/" class="link_4">Все должности</a></p>

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
