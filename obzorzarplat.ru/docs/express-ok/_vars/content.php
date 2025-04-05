
<?php

if (isset($_REQUEST['xml']) and isset($_REQUEST['sign']))
// Если не получили параметры xml и sign, то нечего проверять
{
	$xml = base64_decode(str_replace(' ', '+', $_REQUEST['xml']));
	$sign = base64_decode(str_replace(' ', '+', $_REQUEST['sign']));
	$error = '';
	$secret_key = "obzorZPzarplata";
	if(md5($secret_key . $xml . $secret_key) == $sign)
	{
		$vars = simplexml_load_string($xml);
		if ($vars->status == 'success')
		{
			if(isset($vars->order_id))
			{


				$mysql_result1 = mysqli_query($link,"SELECT * FROM for_count_job WHERE id = '$vars->order_id'");
				$job_id = mysqli_result($mysql_result1, 0, 1); // Id должности
				$region_id = mysqli_result($mysql_result1, 0, 2); // Id города

				include($folder.'/express-ok/funcs.php');
				include($folder.'/express-ok/1job-lite-2.php');
				include($folder.'/express-ok/1job-lite-html.php');
				//include($folder.'/express-ok/1job-lite-excel.php');
				include($folder.'/express-ok/1job-lite-2-echo.php');





				mysqli_query($link,"UPDATE `for_count_job` SET `view` = '1' WHERE `id` = '$vars->order_id'");


			}
		}

	}

}

?>