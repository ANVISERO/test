<?php
$date=$_GET["date"];
$msg=$_GET["msg"];
$msg_trans=$_GET["msg_trans"];
$operator_id=$_GET["operator_id"];
$user_id=$_GET["user_id"];
$smsid=$_GET["smsid"];
$cost_rur=$_GET["cost_rur"];
$cost=$_GET["cost"];
$num=$_GET["num"];
$retry=$_GET["retry"]; //if $retry==1 =>sms repeated
$try=$_GET["try"]; //SMS можно также считать повторной SMS с параметрами retry =1 или try<>1
$ran=$_GET["ran"]; //параметр надежности абонентского номера: 1-4 - ненадежные, 5-7 - средние, 8-10 - надежные
$skey=$_GET["skey"]; //md5(secret_key)
$sign=$_GET["sign"];

$folder="../../../";

$host=implode("", file($folder.'settings/mysql_host'));
$db=implode("", file($folder.'settings/mysql_db'));
$user=implode("", file($folder.'settings/mysql_user'));
$pass=implode("", file($folder.'settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

mysqli_query($link,"insert into inbox VALUES('','$date','$msg','$msg_trans','$operator_id','$user_id', '$smsid','$cost_rur','$cost','','$num',
'$skey','$sign','$ran','','0')");

//$secretkey = "test";

//if (md5($secretkey) != $skey) header("HTTP/1.0 404 Not Found");

echo "smsid:$smsid\n";
echo "status:reply\n";
echo "\n";
echo "Usluga individualniy otchet portala http://obzorzarplat.ru/ oplachena.\n";
echo "code: $user_code\n";


?>
