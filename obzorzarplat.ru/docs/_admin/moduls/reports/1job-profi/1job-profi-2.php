<?php
$jtype_id=intval($_POST['jtype']);
$job_id=intval($_POST['job']);
$city_id=intval($_POST['city']);

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

$city_name=mysqli_result(mysqli_query($link,"select name from base_regions where id='$city_id'"),0,0);

$job_name=mysqli_result(mysqli_query($link,"select name from base_jobs where id='$job_id'"),0,0);
$jtype_id=mysqli_result(mysqli_query($link,"select jtype_id from base_jobs where id='$job_id'"),0,0);
$jtype_name=mysqli_result(mysqli_query($link,"select name from base_jtype where id='$jtype_id'"),0,0);
$job_other_name=mysqli_result(mysqli_query($link,"select other_name from base_jobs where id='$job_id'"),0,0);
$job_conform=mysqli_result(mysqli_query($link,"select conform from base_jobs where id='$job_id'"),0,0);
$job_subordinate=mysqli_result(mysqli_query($link,"select subordinate from base_jobs where id='$job_id'"),0,0);
$job_purpose=mysqli_result(mysqli_query($link,"select purpose from base_jobs where id='$job_id'"),0,0);
$job_mission=mysqli_result(mysqli_query($link,"select mission from base_jobs where id='$job_id'"),0,0);
$job_func=mysqli_result(mysqli_query($link,"select func from base_jobs where id='$job_id'"),0,0);
$job_experience=mysqli_result(mysqli_query($link,"select experience from base_jobs where id='$job_id'"),0,0);
$job_name_partitive=mysqli_result(mysqli_query($link,"select name_partitive from base_jobs where id='$job_id'"),0,0);
?>

 <center><h2>Должностная инструкция <?php echo($job_name_partitive);?></h2></center><br>

<table width="100%" border="0" cellspacing="0" cellpadding="6">

<?php
if($job_other_name<>""){echo('
<tr><td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Другие названия должности:</strong></em></td>
<td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_other_name.'</td></tr>
 ');}

if($job_conform<>""){echo('
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Подчиняется:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_conform.'</td>
  </tr>
');}

if($job_subordinate<>""){echo('
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Подчинённые:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_subordinate.'</td>
  </tr>
');}

if($job_purpose<>""){echo('
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Цель:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_purpose.'</td>
  </tr>
');}

if($job_mission<>""){echo('
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Задачи:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_mission.'</td>
  </tr>
');}

if($job_func<>""){echo('
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Функции:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_func.'</td>
  </tr>
');}

if($job_experience<>""){echo('
  <tr>
    <td width="200" align="right" valign="top"><em><strong>Требования к опыту и квалификации:</strong></em></td>
    <td valign="top">'.$job_experience.'</td>
  </tr>
');}
?>

</table>

<p align="left">
<form name="back" action="?step=1" method="post">
<input type="hidden" name="job" value="<?php echo($job_id);?>">
<input type="hidden" name="jtype" value="<?php echo($jtype_id);?>">
<input type="hidden" name="city" value="<?php echo($city_id);?>">
<input type="submit" value="&laquo; назад" class="but1">
</form>
</p>