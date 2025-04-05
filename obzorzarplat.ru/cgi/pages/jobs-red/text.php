<a href='?page=jobs'>Все должности</a>
<?php
$id=intval($_GET['id']);

$query=mysqli_query($link,"select * from base_jobs where id='$id'");
while($row=mysqli_fetch_array($query)){
    $name=$row["name"];
    $name_partitive=$row["name_partitive"];
    $other_name=$row["other_name"];
    $conform=$row["conform"];
    $subordinate=$row["subordinate"];
    $purpose=$row["purpose"];
    $mission=$row["mission"];
    $func=$row["func"];
    $experience=$row["experience"];
    $express_number_for_sms=$row["express_number_for_sms"];
    $indiv_number_for_sms=$row["indiv_number_for_sms"];
    $not_use_coef=$row["not_use_coef"];
}

$filefolder=$_SERVER['DOCUMENT_ROOT'].'/_admin/elements/job_description/';
$job_description_ekts=implode("", file($filefolder.$id.'_ekts.txt'));
?>
<h2><?php echo $name; ?></h2>
<form name="add" action="?page=jobs-upd" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<h2>Описание по данным портала obzorzarplat.ru</h2>
<table>
  <tr>
    <th>Должностная группа:&nbsp;&nbsp;</th>
    <td>
<ul>
<?php
$chk='';
$result=mysqli_query($link,"select * from base_jtype order by name");
while($row=mysqli_fetch_array($result))
{
    $jtype_id=$row["id"];
    if(mysqli_num_rows(mysqli_query($link,"select * from base_job_types where job_id='$id' AND jtype_id='$jtype_id'"))!==0){$chk="checked";}
    echo('<li><input type="checkbox" name="jtype['.$row["id"].']" value="'.$row["id"].'" '.$chk.'>'.$row["name"].'</li>');
    $chk='';
}
?>
</ul>
	</td>
  </tr>

  <tr>
    <th>Группа должности:&nbsp;&nbsp;</th>
    <td>
<select name="jobs_groups">
<?php
$slk='';
$result=mysqli_query($link,"select * from base_jobs_groups order by name");
while($row=mysqli_fetch_array($result))
{
    $jobs_group_id=$row["id"];
    if(mysqli_num_rows(mysqli_query($link,"select * from base_jobs where id='$id' AND jobs_group_id='$jobs_group_id'"))==1){$slk="selected";}
    echo('<option value="'.$row["id"].'" '.$slk.'>'.$row["name"].'</option>');
    $slk='';
}
?>
</select>
	</td>
  </tr>

<tr>
<th>Наименование:</th>
<td><input class="names" type="text" name="name" value="<?php echo $name;?>"></td>
</tr>
<tr>
<th>Наименование в род. падеже (<em>заработная плата менеджера</em>):</th>
<td><input class="names" type="text" name="name_partitive" value="<?php echo $name_partitive; ?>"></td>
</tr>
<tr>
<th>Другое название:</th>
<td><input class="names" type="text" name="other_name" value="<?php echo $other_name; ?>"></td>
</tr>
<tr>
<th>Подчиняется:</th>
<td><input class="names" type="text" name="conform" value="<?php echo $conform; ?>"></td>
</tr>
<tr>
<th>Подчиненные:</th>
<td><input class="names" type="text" name="subordinate" value="<?php echo $subordinate; ?>"></td>
</tr>
<tr>
<th>Цель:</th>
<td><textarea  class="anons" style="width:100%; height:150px" name="purpose"><?php echo $purpose;?></textarea></td>
</tr>
<tr>
<th>Задачи:</th>
<td class="diz_27" width="500" height="20"><textarea  class="anons" style="width:100%; height:150px" name="mission"><?=$mission;?></textarea></td>
</tr>
<tr>
<td width="168" height="20" align="right" valign="top" class="diz_26">Функции:&nbsp;&nbsp;</td>
<td class="diz_27" width="500" height="20"><textarea  class="anons" style="width:100%; height:150px" name="func"><?=$func;?></textarea></td>
</tr>
<tr>
<td width="168" height="20" align="right" valign="top" class="diz_26">Требования к опыту и квалификации:&nbsp;&nbsp;</td>
<td class="diz_27" width="500" height="20"><textarea  class="anons" style="width:100%; height:150px" name="experience"><?=$experience;?></textarea></td>
</tr>
<tr>
<td width="168" height="20" align="right" valign="middle" class="diz_26">Стоимость экспресс отчета (смс номер)</td>
<td class="diz_27" width="500" height="20"><input class="names" type="text" name="express_cost" value="<?php echo $express_number_for_sms;?>"><br><a href="http://www.a1agregator.ru/main/abonent/4846/7781">http://www.a1agregator.ru/main/abonent/4846/7781</a> => номер: 7781</td>
</tr>
<tr>
<td width="168" height="20" align="right" valign="middle" class="diz_26">Стоимость индивидуального отчета (смс номер)</td>
<td class="diz_27" width="500" height="20"><input class="names" type="text" name="indiv_cost" value="<?php echo $indiv_number_for_sms;?>"><br><a href="http://www.a1agregator.ru/main/abonent/4846/7781">http://www.a1agregator.ru/main/abonent/4846/7781</a> => номер: 7781</td>
</tr>
<tr>
<th>Коэффициент:</th>
<td><input type="checkbox" class="anons"  name="not_use_coef" <? echo ($not_use_coef) ? "checked" : "";?>>Не использовать коэффициент регионов</td>
</tr>

</table>
    <br>
    <h2>Описание по ЕКТС</h2>
    <textarea class="anons" style="width:100%; height:200px" name="ekts"><?php  if(isset($job_description_ekts)){echo($job_description_ekts);}?></textarea>
<input type="submit" class="but" value="Сохранить">
</form>