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
$try=$_GET["try"]; //SMS ����� ����� ������� ��������� SMS � ����������� retry =1 ��� try<>1
$ran=$_GET["ran"]; //�������� ���������� ������������ ������: 1-4 - ����������, 5-7 - �������, 8-10 - ��������
$skey=$_GET["skey"]; //md5(secret_key)
$sign=$_GET["sign"];

$folder="../../../_admin/";

$host=implode("", file($folder.'settings/mysql_host'));
$db=implode("", file($folder.'settings/mysql_db'));
$user=implode("", file($folder.'settings/mysql_user'));
$pass=implode("", file($folder.'settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

function genpass($min, $max)
{
$pwd="";
for($i=0;$i<rand($min,$max);$i++)
{
$numt[1]=rand(48,57);
$numt[2]=rand(65,90);
$numt[3]=rand(97,122);
$nums=rand(1,3);
$num=$numt[$nums];

$pwd.=chr($num);
}
return $pwd;
}

$user_code=genpass(8,8);

mysqli_query($link,"insert into inbox VALUES('','$date','$msg','$msg_trans','$operator_id','$user_id', '$smsid','$cost_rur','$cost','','$num',
'$skey','$sign','$ran','','0','$user_code')");

//$secretkey = "test";

//if (md5($secretkey) != $skey) header("HTTP/1.0 404 Not Found");

echo "smsid:$smsid\n";
echo "status:reply\n";
echo "\n";
echo "Usluga individualniy otchet portala http://obzorzarplat.ru/ oplachena.\n";
echo "code: $user_code\n";
?>
