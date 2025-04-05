<?php
$host=implode("", file('../../../settings/mysql_host'));
$db=implode("", file('../../../settings/mysql_db'));
$user=implode("", file('../../../settings/mysql_user'));
$pass=implode("", file('../../../settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!){echo "Ошибка подключения!";}
else{

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

header("Content-Type: text/html; charset=windows-1251");

$jtype_id=intval($_GET['jtype']);

$q_jobs=mysqli_query($link,"SELECT * from base_jobs WHERE id in(select job_id from base_job_types
where jtype_id='$jtype_id') order by name");  
 //AND id in(select job_id from base_company_jobs) order by name");
?>
<select name='job' class="text_1" onChange='return getBlocksCityJobDescript(this.value,<?php echo($jtype_id);?>);'>

  <option value="">--- Выберите должность ---</option>
  <?php
while($row=mysqli_fetch_array($q_jobs)){
  echo('
  <option value="'.$row["id"].'">'.$row["name"].'</option>
  ');
  } 
  ?>
</select>
<?php
}//end else
?>