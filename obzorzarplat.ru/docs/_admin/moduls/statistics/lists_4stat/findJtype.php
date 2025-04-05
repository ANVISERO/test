<?php
$host=implode("", file('../../../settings/mysql_host'));
$db=implode("", file('../../../settings/mysql_db'));
$user=implode("", file('../../../settings/mysql_user'));
$pass=implode("", file('../../../settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!){echo "fuck!";}

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

header("Content-Type: text/html; charset=windows-1251");

$city_id=$_POST['city'];
$user_id=intval($_POST['user']);

$city_id_string=implode(',',$city_id);

//проверяем, есть ли ограничение по должностям
$blocked=mysqli_num_rows(mysqli_query($link,"select * from for_users_corporat_jobs where user_id='".$user_id."'"));

//блокировка
if($blocked!==0){
    $q_factor_job_block=mysqli_query($link,"SELECT job_id FROM for_users_corporat_jobs where user_id='$user_id'");
    while($row=mysqli_fetch_array($q_factor_job_block)){
        $job_id_blocked[]=$row["job_id"];
    }

    $job_id_blocked_string=implode(',',$job_id_blocked);

    $factor_job_block="AND job_id in($job_id_blocked_string)";
}
else{
    $factor_job_block="";
}
  

    $jobs_q=mysqli_query($link,"SELECT job_id FROM base_company_jobs WHERE city_id in($city_id_string) ".$factor_job_block);

    while($row=mysqli_fetch_array($jobs_q)){
        $job_id[]=$row["job_id"];
    }
    $jobs_array=implode(',',array_unique($job_id));

  $jtypes_q=mysqli_query($link,"SELECT jtype_id FROM base_job_types
                      WHERE job_id IN ($jobs_array)");
    while($row=mysqli_fetch_array($jtypes_q)){
        $jtype_id[]=$row["jtype_id"];
    }
    $jtypes_array=implode(',',array_unique($jtype_id));

  $city_q="WHERE id IN ($jtypes_array)";

$q_jtype=mysqli_query($link,"SELECT * from base_jtype ".$city_q." order by name");
//$q_jtype=mysqli_query($link,"SELECT * from base_jtype order by name");

?>

<ol>
<?php
while($out_jtype = mysqli_fetch_array($q_jtype)){
    $jtype_id=$out_jtype["id"];
    echo('
<li>
<div id="'.$jtype_id.'">
<p><a onClick=\'getJobs("'.$jtype_id.'","'.$city_id_string.'","'.$user_id.'")\' class="lk3">'.$out_jtype["name"].'</a></p>
</div>
    <div id="'.$jtype_id.'loading" style="display:none; font-size:14px; color:gray;">
     <img src="/_img/loader.gif" width="20" height="20" align="absmiddle">&nbsp;Загрузка...
</div><!--/loading_block-->
</li>
');
}

?>
</ol>

<input type="hidden" name="city" value='<?php echo $city_id_string; ?>'>