<?php
$folder="../../../";

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

$city_id_string=$_GET['city_id'];

$factor=$_GET['factor'];
$factor_id=$_GET['factor_id'];
$user_id=intval($_GET['user_id']);
$jtype_id=intval($_GET['jtype_id']);

$jtype_name=mysqli_result(mysqli_query($link,"select name from base_jtype where id=$jtype_id"),0,0);

//проверяем, есть ли ограничение по должностям
$blocked=mysqli_num_rows(mysqli_query($link,"select * from for_users_corporat_jobs where user_id='".$user_id."'"));

//блокировка для пользователей Лайта
if($blocked!==0){
    $q_factor_job_block=mysqli_query($link,"SELECT job_id FROM for_users_corporat_jobs where user_id='$user_id'");
    while($row=mysqli_fetch_array($q_factor_job_block)){
        $job_id_blocked[]=$row["job_id"];
    }

    $job_id_blocked_string=implode(',',$job_id_blocked);

    $factor_job_block="AND id in($job_id_blocked_string)";
}
else{
    $factor_job_block="";
}

//считаем по всем городам или только по тем, что есть в списке
if($city_id_string==''){
    $factor_job="";

}else{
    $q_factor_job=mysqli_query($link,"SELECT job_id FROM base_company_jobs
                      WHERE city_id in($city_id_string)");
    while($row=mysqli_fetch_array($q_factor_job)){
        $job_id_factor[]=$row["job_id"];
    }

    $job_id_factor_string=implode(',',array_unique($job_id_factor));
    $factor_job=" AND id in($job_id_factor_string)";
}
    


$q_jobs=mysqli_query($link,"select id,name from base_jobs
where id in(select job_id from base_job_types where jtype_id='$jtype_id') ".$factor_job." ".$factor_job_block." order by name");

?>

<p><input type="checkbox" name="jtype[<?php echo $jtype_id; ?>]" id="jtype_<?php echo $jtype_id; ?>"
          value="<?php echo $jtype_id; ?>"
          onclick="jqCheckAll2(this.id,'div_jtype_<?php echo $jtype_id; ?>')">
    <label for="jtype_<?php echo $jtype_id; ?>"><b><?php echo $jtype_name; ?></b></label></p>

<div id="div_jtype_<?php echo $jtype_id; ?>" class="shift">
  <?php
    while($out_jobs=mysqli_fetch_array($q_jobs)){
        $job_id=$out_jobs["id"];
        echo('<input type="checkbox" name="job[]" id="jobs_'.$job_id.'" value="'.$job_id.'">
                <label for="jobs_'.$job_id.'">'.$out_jobs["name"].'</label><br>');
  }
  ?>
</div>