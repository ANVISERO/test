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
$style=intval($_GET['style']);

$q_city=mysqli_query($link,"select * from base_regions where id in(select city_id from base_company_jobs where job_id='$job_id')");
?>

<select name='city' class="text_<?=$style;?>" onChange="getSphere(<?php echo($job_id);?>,this.value)">
  <option value="">--- Выбрать ---</option>
  <option value="0">Все города</option>
  <?php
  while($row=mysqli_fetch_array($q_city)){
    echo('
        <option value="'.$row["id"].'">'.$row["name"].'</option>
    ');
  } 
  ?>
</select>