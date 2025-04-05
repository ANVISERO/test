<?php
$folder="../../../";

$host=implode("", file($folder.'settings/mysql_host'));
$db=implode("", file($folder.'settings/mysql_db'));
$user=implode("", file($folder.'settings/mysql_user'));
$pass=implode("", file($folder.'settings/mysql_pass'));

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
<select name='city' class="text_1" onChange="getSphereStaff(<?php echo($job_id);?>,this.value)">
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
<br><br>
        <?php
        if($job_id!='0'){
    $job_cost_indiv=mysqli_result(mysqli_query($link,"select indiv_cost from job_cost where job_id='$job_id'"),0,0);
?>
<div class="ui-state-error" style="width:380px; padding:10px;">
    <p align="center">Стоимость отчета по выбранной Вами должности можно посмотреть здесь:
        <br><a href="http://www.a1agregator.ru/main/abonent/4846/<?php echo($job_cost_indiv);?>" target="_blank" class="lk2">стоимость отчета &raquo;</a></p></div><br>
<?php } ?>