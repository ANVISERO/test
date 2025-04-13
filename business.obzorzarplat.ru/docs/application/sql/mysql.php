<?php
if(!isset($folder)){$folder='../';}

$gl_fol=$folder.'application/settings/';

$host=implode("", file($gl_fol.'mysql_host'));
$db=implode("", file($gl_fol.'mysql_db'));
$user=implode("", file($gl_fol.'mysql_user'));
$pass=implode("", file($gl_fol.'mysql_pass'));
$gl_mail_send_1=implode("", file($gl_fol.'mail_send_1'));

function mysqli_result($result, $row, $field = 0) {
    if (!is_object($result)) {
        //print 'object is expected in param1, ' . gettype($result) . ' is given';
        return NULL;
    }
    $result->data_seek($row); // right here is line 3
    $data = $result->fetch_array();

    return $data[$field];
}

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

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!$link){echo "failed connection";}

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

?>