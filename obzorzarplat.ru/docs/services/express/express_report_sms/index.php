<?php

if (isset($_REQUEST['xml']) and isset($_REQUEST['sign']))
// Если не получили параметры xml и sign, то нечего проверять
{
	$xml = base64_decode(str_replace(' ', '+', $_REQUEST['xml']));
	$sign = base64_decode(str_replace(' ', '+', $_REQUEST['sign']));
	$error = "";
	$hidden_key = "obzor@@@zarplata";
	if(md5($hidden_key . $xml . $hidden_key) == $sign)
	{
		$vars = simplexml_load_string($xml);
		if ($vars->status == 'success')
		{
			if(isset($vars->order_id))
			{
				$host='zarplata.mysql';
				$db='zarplata_db';
				$user='zarplata_mysql';
				$pass='70oiwgo9';

				$link = mysql_pconnect($host,$user,$pass);
				mysqli_select_db($link,$db);
				if(!mysqli_query($link,"UPDATE `for_count_job` SET `payed` = '1' WHERE `id` = '$vars->order_id'")) $error = "Ошибка обновления данных";
			}
			else $error = "Не установлен номер заказа";
		}
		else $error = "Платеж не подтвержден";
	}
	else $error = "Попытка фальсификации данных";
}

if($error == "") $status = "yes";
else $status = "no";
header('Content-Type: text/xml');

$answer_xml  = '<?xml version="1.0" encoding="UTF-8" ?>';
$answer_xml .= '<result>';
$answer_xml .=      '<status>' . $status . '</status>';
$answer_xml .=      '<error_msg>' . $error . '</error_msg>';
$answer_xml .= '</result>';

print $answer_xml;
?>