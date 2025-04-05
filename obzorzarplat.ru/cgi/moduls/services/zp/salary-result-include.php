<?php

$job_id = intval($_POST['job']); // Id должности
$region_id = intval($_POST['city']); // Id города

include($folder.'/express-ok/funcs.php');
include($folder.'/express-ok/1job-lite-2.php');
include($folder.'/express-ok/1job-lite-html.php');
//include($folder.'/express-ok/1job-lite-excel.php');
include($folder.'/express-ok/1job-lite-2-echo.php');


?>