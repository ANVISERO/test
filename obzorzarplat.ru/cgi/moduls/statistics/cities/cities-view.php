<?php

$city_id=intval($_GET["city_id"]);
$city_name=mysqli_result(mysqli_query($link,"select name from base_regions where id='$city_id'"),0,0);

?>
<h2><?php echo $city_name; ?></h2>
