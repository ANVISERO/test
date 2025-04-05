<a href="?page=salary"><img src="_adminfiles/button_tolist.gif" alt="Список должностей" width="129" height="20" border="0"></a>

<?php
//сбор данных
$id=$_GET["id"];
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

$date=mysqli_result(mysqli_query($link,"select date from for_salary where id='$id'"),0,0);
$job_name=mysqli_result(mysqli_query($link,"select job_name from for_salary where id='$id'"),0,0);
$salary_all=mysqli_result(mysqli_query($link,"select salary from for_salary where id='$id'"),0,0);
$status=mysqli_result(mysqli_query($link,"select status from for_salary where id='$id'"),0,0);
$lang=mysqli_result(mysqli_query($link,"select lang from for_salary where id='$id'"),0,0);


if($status==1){$str_4='checked';}if($status==0){$str_4='';}
if($lang==0){$str_5='checked'; $str_6='';}if($lang==1){$str_5=''; $str_6='checked';}


$filefolder='elements/salary/'.$id;
$anons=implode("", file($filefolder.'_anons.txt'));
$info=implode("", file($filefolder.'_info.txt'));
$job_description=implode("", file($filefolder.'_job_description.txt'));
$analitics=implode("", file($filefolder.'_analitics.txt'));
$salary_avg=implode("", file($filefolder.'_salary.txt'));

?>
<form name="upd" action="?page=salary-upd" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<? echo($id);?>">
<table width="668" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="168" height="20" align="right" valign="top" class="diz_26">Дата:&nbsp;&nbsp;</td>
    <td class="diz_27" width="500" height="20">&nbsp;&nbsp;<input class="names" type="text" name="date" value='<? echo($date);?>'></td>
  </tr>
  <tr>
    <td width="168" height="20" align="right" valign="top" class="diz_26">Должность:&nbsp;&nbsp;</td>
    <td class="diz_27" width="500" height="20">&nbsp;&nbsp;<input class="names" type="text" name="job_name" value='<? echo($job_name);?>'></td>
  </tr>
    <tr>
    <td width="168" height="20" align="right" valign="top" class="diz_26">Язык:&nbsp;&nbsp;</td>
    <td class="diz_27" width="500" height="20">&nbsp;&nbsp;<label><input type="radio" name="lang" value="0" <?=$str_5;?>>Русский</label>
<label><input type="radio" name="lang" value="1" <?=$str_6;?>>English</label>
</td>
  </tr>

    <tr>
    <td width="168" height="20" align="right" valign="top" class="diz_26">Анонс:&nbsp;&nbsp;</td>
    <td class="diz_27" width="500" height="20">&nbsp;&nbsp;<textarea class="anons" name="anons"><? echo($anons);?></textarea></td>
  </tr>

      <tr>
    <td width="168" height="20" align="right" valign="top" class="diz_26">Средняя заработная плата по Росиии:&nbsp;&nbsp;</td>
    <td class="diz_27" width="500" height="20">&nbsp;&nbsp;<textarea class="anons" name="salary_all"><? echo($salary_all);?></textarea></td>
  </tr>

  <tr>
    <td width="168" height="20" align="right" valign="top" class="diz_26">Средняя заработная плата:&nbsp;&nbsp;</td>
    <td class="diz_27" width="500" height="20">&nbsp;&nbsp;<textarea class="anons" name="salary_avg"><? echo($salary_avg);?></textarea></td>
  </tr>

  <tr>
    <td width="168" height="20" align="right" valign="top" class="diz_26">Дополнительная информация по должности:&nbsp;&nbsp;</td>
    <td class="diz_27" width="500" height="20">&nbsp;&nbsp;<textarea class="anons" name="info"><? echo($info);?></textarea></td>
  </tr>

  <tr>
    <td width="168" height="20" align="right" valign="top" class="diz_26">Описание должности&nbsp;&nbsp;</td>
    <td class="diz_27" width="500" height="20">&nbsp;&nbsp;<textarea class="opis" name="job_description" style="height:100px"><? echo($job_description);?></textarea></td>
  </tr>

  <tr>
    <td width="168" height="20" align="right" valign="top" class="diz_26">Анализ данных:&nbsp;&nbsp;</td>
    <td class="diz_27" width="500" height="20">&nbsp;&nbsp;<textarea class="opis" name="analitics" style="height:100px"><? echo($analitics);?></textarea></td>
  </tr>

  <tr>
    <td width="168" height="20" align="right" valign="top" class="diz_26">Опубликовано:&nbsp;&nbsp;</td>
    <td class="diz_27" width="500" height="20">&nbsp;&nbsp;<input type="checkbox" name="status" <? echo($str_4);?>></td>
  </tr>

  <tr>
    <td width="168" height="20" align="right" valign="top" class="diz_26"><img src="<? echo($filefolder);?>.jpg" width="80" height="80" vspace="5">&nbsp;&nbsp;</td>
    <td class="diz_27" width="500" height="20">&nbsp;&nbsp;Изображение для списка (300 х 300 px):<br>&nbsp;&nbsp;<input class="file" type="file" name="small-photo"></td>
  </tr>
  <tr>
    <td width="168" class="diz_28">&nbsp;</td>
    <td width="500" class="diz_28">&nbsp;</td>
  </tr>

</table>
<input type="image" src="_adminfiles/button_save.gif">
</form>
