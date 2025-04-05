<?php
$folder="../../";

$host=implode("", file($folder.'settings/mysql_host'));
$db=implode("", file($folder.'settings/mysql_db'));
$user=implode("", file($folder.'settings/mysql_user'));
$pass=implode("", file($folder.'settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!){echo 1;}

$job_id=intval($_POST['jobId']);
$indiv_cost=intval($_POST['indiv']);
$express_cost=intval($_POST['express']);

$result=mysqli_query($link,"update job_cost set express_cost='$express_cost', indiv_cost='$indiv_cost' where job_id='$job_id'");

if($result==false){echo 0;}
elseif($result==true)
{
    echo 1;
}
?>
