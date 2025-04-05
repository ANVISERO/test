<?php
include('../_admin/sql/mysql.php');
$str = strip_tags($_GET['str']);
$mysqli = new mysqli($host,$user,$pass,$db);
$res = $mysqli->query("SELECT a.id as job_id,a.name as job_name,b.jtype_id as job_type_id from base_jobs a, base_job_types b where a.id = b.job_id and a.name like '%".$str."%'");
if($res && $res->num_rows>0) {
	echo "<script>
		$('.job_el').click(function(e) {
		e.preventDefault();
		$('#jobs_container').hide();
		$('#place').val($(this).html());
		$('#jtype_input').val($(this).data('job-type-id'));
		$('#job_input').val($(this).data('job-id'));
	});
	</script>";
	echo "<ul>";
	while($row = $res->fetch_object()) {
		echo "<li><a class='job_el' data-job-type-id='".$row->job_type_id."' data-job-id='".$row->job_id."' href='#'>".$row->job_name."</a></li>";
	}
	echo "</ul>";
}

?>