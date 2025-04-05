<a href='?page=services'>Все услуги</a>
<?php
$id = mysqli_result(mysqli_query($link,"select max(id) from base_entrepreneur_services"),0,0);
$id = $id + 1;
?>
<h2>Добавление услуги для ИП</h2>
<form name="add" action="?page=services-add" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<h2>Описание услуги по данным портала obzorzarplat.ru</h2>
<table>
<tr>
	<th>Наименование услуги:</th>
	<td><input class="names" type="text" name="name" value="" style="width: 350px;"></td>
</tr>

  <tr>
    <th>Прикрепленные должности:&nbsp;&nbsp;</th>
    <td>
<ul>
<?php
$chk='';
$result = mysqli_query($link,"select id, name from base_jobs ORDER BY name ASC");
while($row=mysqli_fetch_array($result))
{
    $job_id=$row["id"];
//    if(in_array($job_id, $sel_jobs)) {$chk="checked";}
    echo('<li><input type="checkbox" name="jid['.$row["id"].']" value="'.$row["id"].'">'.$row["name"].'</li>');
  //  $chk='';
}
?>
</ul>
	</td>
  </tr>

</table>
<input type="submit" class="but" value="Сохранить">
</form>