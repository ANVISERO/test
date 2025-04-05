<?php
$host=implode("", file('../settings/mysql_host'));
$db=implode("", file('../settings/mysql_db'));
$user=implode("", file('../settings/mysql_user'));
$pass=implode("", file('../settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!){echo "fuck!";}

//mysqli_query($link,"SET character_set_client='cp1251'");
//mysqli_query($link,"SET character_set_connection='cp1251'");
//mysqli_query($link,"SET character_set_results='cp1251'");
//mysqli_query($link,"SET NAMES 'cp1251'");

header("Content-Type: text/html; charset=windows-1251");

$jtype_id=intval($_GET['jtype']);
$style=intval($_GET['style']);

$q_jobs=mysqli_query($link,"SELECT * from base_jobs WHERE id in(select job_id from base_job_types
where jtype_id='$jtype_id') order by name");

?>

<select name='job' class="text_<? echo($style);?>" onChange='getCity(this.value,<? echo($style);?>)'>

  <option value="">--- Выбрать ---</option>
  <?php
while($row=mysqli_fetch_array($q_jobs)){
  echo('
  <option value="'.$row["id"].'" '.$ch.'>'.$row["name"].'</option>
  ');
  } 
  ?>
  
</select>