<?php
//FOR LOCALHOST
/*
$host='localhost';
$db='zarplata_development';
$user='root';
$pass='';
 *
 */

//FOR HTTP
/*
function mysqli_result($res, $row, $field=0) {
	$res->data_seek($row);
	$datarow = $res->fetch_array();
	return $datarow[$field];
}
*/

$host='zarplata.mysql';
$db='zarplata_db';
$user='zarplata_mysql';
$pass='70oiwgo9';

#$link = mysql_pconnect($host,$user,$pass);
$link = mysqli_connect($host,$user,$pass,$db);

/* check connection */ 
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

mysqli_select_db($link, $db);

mysqli_query($link, "SET character_set_client='cp1251'");
mysqli_query($link, "SET character_set_connection='cp1251'");
mysqli_query($link, "SET character_set_results='cp1251'");
mysqli_query($link, "SET NAMES 'cp1251'");

function mysqli_result($result, $row, $field = 0) {
    if (!is_object($result)) {
        //print 'object is expected in param1, ' . gettype($result) . ' is given';
        return NULL;
    }
    $result->data_seek($row); // right here is line 3
    $data = $result->fetch_array();

    return $data[$field];
}

//генерация пароля
function genpass($min, $max){
    $pwd="";
    for($i=0;$i<rand($min,$max);$i++){
        $numt[1]=rand(48,57);
        $numt[2]=rand(65,90);
        $numt[3]=rand(97,122);
        $nums=rand(1,3);
        $num=$numt[$nums];

        $pwd.=chr($num);
    }
return $pwd;
}

function countplus()
{
$count_file=$gl_fol.'settings/count_id';
$count=implode("", file($count_file));
$file = fopen ($count_file,"w+");
fputs ( $file, ($count+1));
fclose ($file);
}


?>