<?php
header("Content-Type: text/html; charset=windows-1251");

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

//должностная группа
$jtype_id=intval($_POST['jtype_id']);
$jtype_name=mysqli_result(mysqli_query($link,"SELECT name FROM base_jtype WHERE id='$jtype_id'"),0,0);

//проводим расчеты выводим списки
//вывод должностей
    $jobs_query=mysqli_query($link,"SELECT name FROM base_jobs
                WHERE id IN(SELECT job_id FROM base_job_types
                    WHERE jtype_id='".$jtype_id."')order by name");
?>
<a href="#" class="close black"><b><?php echo $jtype_name; ?></b></a>
<div>
<ul class="shift_right">
<?php
while($out_jobs = mysqli_fetch_object($jobs_query)){
    echo '<li>'.$out_jobs->name.'</li>';
}
 ?>
</ul><!--shift_right-end-->
</div>