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

if($city_id==0)
{
    $q_sphere=mysqli_query($link,"SELECT * from base_sphere where id in(
select sphere_id from base_company_sphere
where company_id in(select company_id from base_company_jobs
where job_id='$job_id')) order by name");
}
else{
$q_sphere=mysqli_query($link,"SELECT * from base_sphere 
where id in(select sphere_id from base_company_sphere
where company_id in(select company_id from base_company_jobs
where city_id='$city_id' AND job_id='$job_id')) order by name");
}
?>

<select name='sphere' class="text_1" onChange='getStaff(<?=$job_id;?>,<?=$city_id?>,this.value)'>
  <option value="">--- Выбрать ---</option>
  <option value="0">не имеет значения</option>
  <? while($row=mysqli_fetch_array($q_sphere)){
  echo('
  <option value="'.$row["id"].'">'.$row["name"].'</option>
  ');
  echo $row["name"];
  } 
  ?>
</select>