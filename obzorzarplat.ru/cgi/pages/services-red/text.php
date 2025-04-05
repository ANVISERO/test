<a href='?page=services'>Все услуги</a>
<?php
$id=intval($_GET['id']);

$name = mysqli_result(mysqli_query($link,"select name from base_entrepreneur_services where id='$id'"),0,0);
$query = "select bj.id from base_jobs bj LEFT JOIN base_entrepreneur_service_jobs besj on (bj.id = besj.job_id) where besj.service_id = '$id' ORDER BY bj.name ASC";
$s_jobs = mysqli_query($link,$query) or die(mysql_error());
$sel_jobs = array();
	while ($row = mysqli_fetch_array($s_jobs)) {
		$sel_jobs[] = $row['id'];
	}

?>
<h2><?php echo $name; ?></h2>
<form name="add" action="?page=services-upd" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<h2>Описание услуги по данным портала obzorzarplat.ru</h2>
<table>
<tr>
	<th>Наименование услуги:</th>
	<td><input class="names" type="text" name="name" value="<?php echo $name;?>" style="width: 350px;"></td>
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
    if(in_array($job_id, $sel_jobs)) {$chk="checked";}
    echo('<li><input type="checkbox" name="jid['.$row["id"].']" value="'.$row["id"].'" '.$chk.'>'.$row["name"].'</li>');
    $chk='';
}
?>
</ul>
	</td>
  </tr>

</table>
<input type="submit" class="but" value="Сохранить">
</form>