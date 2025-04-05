<?php
$folder="../../../../";

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

$city_id=intval($_GET['city_id']);
$factor=$_GET['factor'];
$factor_id=$_GET['factor_id'];
$user_id=intval($_GET['user_id']);
$jtype_id=intval($_GET['jtype_id']);

$jtype_name=mysqli_result(mysqli_query($link,"select name from base_jtype where id=$jtype_id"),0,0);

//проверяем, есть ли ограничение по должностям
$blocked=mysqli_num_rows(mysqli_query($link,"select * from for_users_corporat_jobs where user_id='".$user_id."'"));

//блокировка для пользователей Лайта
if($blocked!==0){
    $q_factor_block="AND job_id IN(SELECT job_id FROM for_users_corporat_jobs where user_id='$user_id')";
    $q_factor_job_block="AND id IN(SELECT job_id FROM for_users_corporat_jobs where user_id='$user_id')";
}
else{
    $q_factor_block="";
    $q_factor_job_block="";
}

switch($factor){
case "sp":

  if($city_id==0){
    $q_factor="WHERE id IN (SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM base_company_jobs bcj
                      inner JOIN `base_company_sphere` bcs ON bcj.company_id = bcs.company_id
                      WHERE  bcs.sphere_id ='$factor_id') $q_factor_block)";

    $jobs_id_q=mysqli_query($link,"SELECT job_id FROM base_company_jobs bcj
                      where company_id in(select company_id from`base_company_sphere` where sphere_id ='$factor_id')");
     while($row=mysqli_fetch_array($jobs_id_q)){$jobs_id_array[]=$row["job_id"];}
     $jobs_id_string=implode(',',$jobs_id_array);
    $q_factor_job="AND id IN (".$jobs_id_string.") $q_factor_job_block";
  }else{
    $q_factor="WHERE id IN (SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM base_company_jobs bcj
                      inner JOIN `base_company_sphere` bcs ON bcj.company_id = bcs.company_id
                      WHERE  bcs.sphere_id ='$factor_id'
                      AND bcj.city_id='$city_id') $q_factor_block)";

            $jobs_id_q=mysqli_query($link,"SELECT job_id FROM base_company_jobs bcj
                      where company_id in(select company_id from`base_company_sphere` where sphere_id ='$factor_id') AND city_id='$city_id'");
     while($row=mysqli_fetch_array($jobs_id_q)){$jobs_id_array[]=$row["job_id"];}
     $jobs_id_string=implode(',',$jobs_id_array);
    $q_factor_job="AND id IN (".$jobs_id_string.") $q_factor_job_block";
  }
  break;

case "s":
  if($city_id==0){
    $q_factor="WHERE id IN (SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.personal_id ='$factor_id') $q_factor_block)";
    $q_factor_job="AND id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.personal_id ='$factor_id') $q_factor_job_block";
  }else{
    $q_factor="WHERE id IN (SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.personal_id ='$factor_id'
                      AND bc.region_id='$city_id') $q_factor_block)";
    $q_factor_job="AND id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.personal_id ='$factor_id'
                      AND bc.region_id='$city_id') $q_factor_job_block";
  }
  break;

case "t":
  if($city_id==0){
    $q_factor="WHERE id IN (SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.turnover_id ='$factor_id') $q_factor_block)";
    $q_factor_job="AND id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.turnover_id ='$factor_id') $q_factor_job_block";
  }else{
    $q_factor="WHERE id IN (SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.turnover_id ='$factor_id'
                      AND bc.region_id='$city_id') $q_factor_block)";
    $q_factor_job="AND id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.turnover_id ='$factor_id'
                      AND bc.region_id='$city_id') $q_factor_job_block";
  }
  break;

case "n":
  if($city_id==0){
    $q_factor="WHERE id IN(SELECT jtype_id FROM base_job_types
                      WHERE 1 $q_factor_block)";
    $q_factor_job=$q_factor_job_block;
  }else{
    $q_factor="WHERE id IN (SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE bc.region_id='$city_id') $q_factor_block)";
    $q_factor_job="AND id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE bc.region_id='$city_id') $q_factor_job_block";
  }
  break;
}

$q_jobs=mysqli_query($link,"select * from base_jobs
where id in(select job_id from base_job_types where jtype_id='$jtype_id') ".$q_factor_job." order by name");
/*
echo("select * from base_jobs
where id in(select job_id from base_job_types where jtype_id='$jtype_id') ".$q_factor_job." order by name");
 * 
 */
?>
<!--
<input type="checkbox" name="jtype_11446" id="jtype_11446" onclick="jqCheckAll2(this.id,'job_11446')" /><b>Выделить все job_11446</b><br>
        <div id="div_jtype_11446">
        <input type="checkbox" name="job_11446" id="jobs_1540" value="1540" /><label for="jobs_1540">Аккумуляторщик</label><br>
        <input type="checkbox" name="job_11446" id="jobs_1346" value="1346" /><label for="jobs_1346">Слесарь по ремонту автомобилей </label><br>
        </div>
        <div id="div_jtype_11">
        <input type="checkbox" name="jtype_11" id="jtype_11" onclick="jqCheckAll2(this.id,'job_11')" /><b>Выделить все job_11</b><br>
        <input type="checkbox" name="job_11" id="jobs_1" value="1" /><label for="jobs_1">Слесарь по ремонту </label><br>
        </div>
-->
<p><input type="checkbox" name="jtype[<?php echo $jtype_id; ?>]" id="jtype_<?php echo $jtype_id ?>" value="<?php echo $jtype_id; ?>" onclick="jqCheckAll2(this.id,'div_jtype_<?php echo $jtype_id; ?>')"><b><?php echo $jtype_name; ?></b></p>
<div id="div_jtype_<?php echo $jtype_id; ?>">
  <?php
while($out_jobs=mysqli_fetch_array($q_jobs)){
$job_id=$out_jobs["id"];
echo('<input type="checkbox" name="job[]" id="jobs_'.$job_id.'" value="'.$job_id.'"><label for="jobs_'.$job_id.'">'.$out_jobs["name"].'</label><br>');
  }
  ?>
</div>