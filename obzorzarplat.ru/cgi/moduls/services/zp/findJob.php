<?php
header("Content-Type: text/html; charset=windows-1251");

$jtype_id=intval($_GET['jtype']);

$q_jobs=mysqli_query($link,"SELECT id,name from base_jobs WHERE id in(select job_id from base_job_types
where jtype_id='$jtype_id') order by name")

/*
$q_jobs=mysqli_query($link,"SELECT id,name from base_jobs WHERE id in(select job_id from base_job_types
where jtype_id='$jtype_id') AND id in(select job_id from base_company_jobs) order by name");
*/
?>
<select name='job' id="job" class="text_1">

  <option value="">--- Выберите должность ---</option>
  <?php
while($row=mysqli_fetch_array($q_jobs)){
  echo('
  <option value="'.$row["id"].'">'.$row["name"].'</option>
  ');
  } 
  ?>
</select>