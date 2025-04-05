<?php
//сбор данных

//print_r($_POST);

$id = intval($_POST["id"]);

$name = $_POST["name"];
$jid  = $_POST["jid"];


//описание услуги
mysqli_query($link,"insert into base_entrepreneur_services(`id`, `name`) values ('$id', '$name')") or die(mysql_error());

//должности в услуге
//$job_types_old_q=mysqli_query($link,"delete from base_entrepreneur_service_jobs WHERE service_id='$id'");
foreach($jid as $job_id){
    mysqli_query($link,"insert into base_entrepreneur_service_jobs(service_id, job_id) VALUES('$id','$job_id')");
}

?>
<script type="text/javascript">
	self.location.href='?page=services';
</script>
