<?php
//сбор данных
//print_r($_POST);

$id = intval($_POST["id"]);
$name = $_POST["name"];
$jtype = $_POST["jtype"];
$jobs_group_id = $_POST["jobs_groups"];
$other_name = $_POST["other_name"];
$conform = $_POST["conform"];
$subordinate = $_POST["subordinate"];
$purpose = $_POST["purpose"];
$mission = $_POST["mission"];
$func = $_POST["func"];
$experience = $_POST["experience"];
$pos = isset($_POST["pos"]) ? $_POST["pos"] : 0;
$name_partitive = $_POST["name_partitive"];
$ekts = $_POST["ekts"];
$express_number_for_sms = $_POST["express_cost"];
$indiv_number_for_sms = $_POST["indiv_cost"];
$not_use_coef = (isset($_POST["not_use_coef"])) ? 1 : 0;

//описание должности
//echo "update base_jobs SET `jobs_group_id`='$jobs_group_id', `name` = '$name', `other_name` = '$other_name', `conform` = '$conform', `subordinate` = '$subordinate', `purpose` = '$purpose', `mission` = '$mission', `func` = '$func', `experience` = '$experience', `pos` = '$pos', `name_partitive`='$name_partitive',`express_number_for_sms`='$express_number_for_sms',`indiv_number_for_sms`='$indiv_number_for_sms', `not_use_coef` = '$not_use_coef' where `id`='$id'";
$result=mysqli_query( $link, "update base_jobs SET `jobs_group_id`='$jobs_group_id', `name` = '$name', `other_name` = '$other_name', `conform` = '$conform', `subordinate` = '$subordinate', `purpose` = '$purpose', `mission` = '$mission', `func` = '$func', `experience` = '$experience', `pos` = '$pos', `name_partitive`='$name_partitive',`express_number_for_sms`='$express_number_for_sms',`indiv_number_for_sms`='$indiv_number_for_sms', `not_use_coef` = '$not_use_coef' where `id`='$id'")
    or die(mysqli_error($link));
//стоимость отчетов (смс номер)

mysqli_query($link,"update job_cost set express_cost='$express_cost', indiv_cost='$indiv_cost' where job_id='$id')");

//должностные группы
$job_types_old_q=mysqli_query($link, "delete from base_job_types WHERE job_id='$id'");
foreach($jtype as $jtype_id){
    mysqli_query($link,"insert into base_job_types(job_id,jtype_id) VALUES('$id','$jtype_id')");
}

//описание по ЕКТС
$filefolder='elements/job_description/';

//Создание файлов
$fullpath=$filefolder.$id.'_ekts.txt';
$file = fopen ("$fullpath","w+");
fputs ( $file, $ekts);
fclose ($file);
?>
<script type="text/javascript">
self.location.href='?page=jobs';
</script>