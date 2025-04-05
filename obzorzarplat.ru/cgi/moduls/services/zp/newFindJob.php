<?php

$mysqli = new mysqli($host,$user,$pass,$db);
$res = $mysqli->query("SELECT a.id as job_id,a.name as job_name,b.jtype_id as job_type_id from base_jobs a, base_job_types b where a.id = b.job_id limit 10");
if($res && $res->num_rows>0) {
	echo "<ul>";
	while($row = $res->fetch_object()) {
		$job_type = $mysqli->query("")
		echo "<li><a data-job-type-id='".$row->job_type_id."' data-job-id='".$row->job_id."' href='#'>".$row->job_name."</a></li>";
	}
	echo "</ul>":
}

?>