<?php
$folder="../../../../";

$host=implode("", file($folder.'settings/mysql_host'));
$db=implode("", file($folder.'settings/mysql_db'));
$user=implode("", file($folder.'settings/mysql_user'));
$pass=implode("", file($folder.'settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!){echo "������ �����������...";}

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

header("Content-Type: text/html; charset=windows-1251");

$city_id=intval($_GET['city']);

if($city_id==0){
  $city_q="";
} else {
  $city_q="where id in(select sphere_id from base_company_sphere 
              where company_id in(select company_id from base_company_jobs 
              where city_id='$city_id'))";
}

$q_sphere=mysqli_query($link,"SELECT * from base_sphere ".$city_q." order by name");
?>

<select name='sphere' class="text_1" onChange='getJtype(<?php echo($city_id);?>,"sp",this.value)'>
  <option value="">--- ������� ---</option>
  <?php 
  while($row=mysqli_fetch_array($q_sphere)){
  echo('
  <option value="'.$row["id"].'">'.$row["name"].'</option>
  ');
  } 
  ?>
</select>