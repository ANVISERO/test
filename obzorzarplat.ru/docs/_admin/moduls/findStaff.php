<?php
$host=implode("", file('../settings/mysql_host'));
$db=implode("", file('../settings/mysql_db'));
$user=implode("", file('../settings/mysql_user'));
$pass=implode("", file('../settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!){echo "fuck!";}

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

header("Content-Type: text/html; charset=windows-1251");

$job_id=intval($_GET['job']);
$city_id=intval($_GET['city']);
$sphere_id=intval($_GET['sphere']);

if($city_id==0){
  $city_q="";
} else {
  $city_q="AND city_id='$city_id'";
}

if($sphere_id==0){
  $sphere_q="";
} else {
  $sphere_q="AND id in(select company_id from base_company_sphere where sphere_id='$sphere_id')";
}


$q_staff=mysqli_query($link,"SELECT * from base_personal 
where id in(select personal_id from base_companies 
where id in(select company_id from base_company_jobs where job_id='$job_id' ".$city_q.") ".$sphere_q.") order by id");
?>

<select name='staff' class="text_1" onChange='getTurnover(<?=$job_id;?>,<?=$city_id;?>,<?=$sphere_id;?>,this.value)'>
  <option value="">--- Выбрать ---</option>
  <option value="0">не имеет значения</option>
  <? while($row=mysqli_fetch_array($q_staff)){
  echo('
  <option value="'.$row["id"].'">'.$row["title"].'</option>
  ');
  } 
  ?>
</select>