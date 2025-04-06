<?php
if(!isset($folder)){$folder='../';}

$gl_fol=$folder.'_admin/settings/';

$host=implode("", file($gl_fol.'mysql_host'));
$db=implode("", file($gl_fol.'mysql_db'));
$user=implode("", file($gl_fol.'mysql_user'));
$pass=implode("", file($gl_fol.'mysql_pass'));
$gl_mail_send_1=implode("", file($gl_fol.'mail_send_1'));


//Функции
function countplus()
{
$count_file=$gl_fol.'settings/count_id';
$count=implode("", file($count_file));
$file = fopen ($count_file,"w+");
fputs ( $file, ($count+1));
fclose ($file);
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



?>