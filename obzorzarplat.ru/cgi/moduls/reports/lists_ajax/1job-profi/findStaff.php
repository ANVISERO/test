<?php
mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

header("Content-Type: text/html; charset=windows-1251");

//print_r($_POST);

$job_id=intval($_POST['job_id']);
$city_id=intval($_POST['city_id']);
$sphere_id=intval($_POST['sphere_id']);

$q_companies=mysqli_query($link,'SELECT company_id
FROM base_company_jobs
WHERE city_id = "'.$city_id.'"
AND job_id = "'.$job_id.'"');

while($row=mysqli_fetch_array($q_companies)){
    $companies[]=$row["company_id"];
}
$companies_string=implode(',',  array_unique($companies));

if($sphere_id==0){
  $sphere_q="";
} else {
  $sphere_q="AND id in(select company_id from base_company_sphere where sphere_id='$sphere_id')";
}

$q_staff="SELECT * from base_personal
where id in(select personal_id from base_companies
where id in(".$companies_string.") ".$sphere_q.") order by id";

$staff=mysqli_query($link,$q_staff);
?>

<select name='staff' class="text_1" id="staff">
  <option value="0">не имеет значения</option>
  <?php 
  while($row=mysqli_fetch_array($staff)){
    echo('<option value="'.$row["id"].'">'.$row["title"].'</option>');
  } 
  ?>
</select>