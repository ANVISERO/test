<?php
include('../_admin/sql/mysql.php');
$str = strip_tags($_GET['str']);
$mysqli = new mysqli($host,$user,$pass,$db);
$res = $mysqli->query("select * from base_regions where name like '%".$str."%'");
if($res && $res->num_rows>0) {
	echo "<script>
		$('.city_el').click(function(e) {
		e.preventDefault();
		$('#cities_container').hide();
		$('#city').val($(this).html());
		$('#city_input').val($(this).data('city-id'));
	});</script>";
	echo "<ul>";
	while($row = $res->fetch_object()) {
		echo "<li><a class='city_el' data-city-id='".$row->id."' href='#'>".$row->name."</a></li>";
	}
	echo "</ul>";
}

?>