<?php
$folder='../../../';
$host=implode("", file($folder.'settings/mysql_host'));
$db=implode("", file($folder.'settings/mysql_db'));
$user=implode("", file($folder.'settings/mysql_user'));
$pass=implode("", file($folder.'settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!){echo "упс! ошибка подключения к базе :(";}

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

header("Content-Type: text/html; charset=windows-1251");

$job_id=intval($_GET['job']);
$city_id=intval($_GET['city']);
$sphere_id=intval($_GET['sphere']);
$staff_id=intval($_GET['staff']);

if($city_id==0)
{
$q_companies=mysqli_query($link,'SELECT company_id
FROM base_company_jobs
WHERE job_id = "'.$job_id.'"');
}else{
$q_companies=mysqli_query($link,'SELECT company_id
FROM base_company_jobs
WHERE city_id = "'.$city_id.'"
AND job_id = "'.$job_id.'"');
}

while($row=mysqli_fetch_array($q_companies)){
    $companies[]=$row["company_id"];
}
$companies_string=implode(',',$companies);

if($staff_id==0){
  $staff_q="";
}else{
  $staff_q=" AND personal_id='$staff_id'";
}

if($sphere_id==0){
  $sphere_q="";
}else{
  $sphere_q=" AND id in(select company_id from base_company_sphere where sphere_id='$sphere_id')";
}

$q_turnover=mysqli_query($link,"SELECT * from base_turnover where id in(select turnover_id from base_companies where id in
                        (".$companies_string.")".$sphere_q.$staff_q.")");

?>

<select name='turnover' class="text_1">
  <option value="">--- Выбрать ---</option>
  <option value="0">не имеет значения</option>
  <?php
while($row=mysqli_fetch_array($q_turnover)){
  echo('
  <option value="'.$row["id"].'">'.$row["title"].'</option>
  ');
  }
  ?>
</select>