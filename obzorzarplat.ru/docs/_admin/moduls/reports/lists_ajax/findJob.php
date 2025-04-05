<?php
$host=implode("", file('../../../settings/mysql_host'));
$db=implode("", file('../../../settings/mysql_db'));
$user=implode("", file('../../../settings/mysql_user'));
$pass=implode("", file('../../../settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!){echo "упс! ошибка подключения к базе :(";}

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

header("Content-Type: text/html; charset=windows-1251");

$jtype_id=intval($_GET['jtype']);
$style=intval($_GET['style']);
$user_id=intval($_GET['user_id']);

//проверяем, есть ли ограничение по должностям
$blocked=mysqli_num_rows(mysqli_query($link,"select * from for_users_corporat_jobs where user_id='".$user_id."'"));

if($blocked!==0){
    $q_job_block="AND id IN(SELECT job_id FROM for_users_corporat_jobs where user_id='$user_id')";
}
else{
    $q_job_block="";
}

$q_jobs=mysqli_query($link,"SELECT * from base_jobs WHERE id in(select job_id from base_job_types
where jtype_id='$jtype_id') ".$q_job_block." order by name");

?>

<select name='job' class="text_<?php echo($style);?>" onChange='return getBlocksCityJobDescript(this.value,<?php echo($style);?>,<?php echo($user_id); ?>);'>

  <option value="">--- Выбрать ---</option>
  <?php
while($row=mysqli_fetch_array($q_jobs)){
  echo('
  <option value="'.$row["id"].'" '.$ch.'>'.$row["name"].'</option>
  ');
  } 
  ?>
  
</select>