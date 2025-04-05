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
$user_id=mysqli_real_escape_string($link,$_GET['user_id']);

//блокировка по доступным городам для клиентов (если есть)

$blocked=mysqli_num_rows(mysqli_query($link,"select * from for_users_corporat_cities where user_id='".$user_id."'"));

if($blocked!==0){
    $q_block="AND id IN(SELECT city_id FROM for_users_corporat_cities where user_id='$user_id')";
}
else{
    $q_block="";
}

$q_city=mysqli_query($link,"SELECT * FROM base_regions where id in(select distinct city_id from base_company_jobs where job_id='$job_id') ".$q_block." order by name");

if(mysqli_num_rows($q_city)>0){
?>

<select name='city' class="text_1">
  <option value="0">Все города</option>
  <?php
while($row=mysqli_fetch_array($q_city)){
  echo('<option value="'.$row["id"].'">'.$row["name"].'</option>');
} 
  ?>
</select>
<?php
}
?>