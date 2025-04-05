<?php
header("Content-Type: text/html; charset=windows-1251");

//input
$job_id=intval($_GET['job']);

$jtype_check=mysqli_num_rows(mysqli_query($link,"select * from base_job_types where job_id='$job_id' AND jtype_id='1208'"));
if($jtype_check!=0){
    ?>
<div class="ui-state-error" id="error" ><p align="center">Внимание! По выбранной Вами должности доступны только <br><a href="/servis/otchet/">персональные отчеты &raquo;</a></p></div>

    <?php
}else{
    //query to DB for all cities
//$q_city=mysqli_query($link,"select * from base_regions where id in(select city_id from base_company_jobs where job_id='$job_id')");
$q_city=mysqli_query($link,"select * from base_regions order by name");
?>

<select name='city' id="city" class="text_1">
  <option value="">--- Выберите город ---</option>
  <?php
while($row=mysqli_fetch_array($q_city)){
  echo('
  <option value="'.$row["id"].'">'.$row["name"].'</option>
  ');
  }
  ?>
</select>

<p align="center"><input type="submit" value="Зарплата &raquo;" class="submit"></p>
<?php
}
?>