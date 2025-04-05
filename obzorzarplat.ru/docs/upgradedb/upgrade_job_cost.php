<?php
echo "Начало работы";
$host='zarplata.mysql';
$db='zarplata_db';
$user='zarplata_mysql';
$pass='70oiwgo9';

$link = mysql_pconnect($host,$user,$pass);
mysqli_select_db($link,$db);
echo "<br/>Подключились к БД";

$query1 = "select id, express_number_for_sms, indiv_number_for_sms from `base_jobs`";
$result1 = mysqli_query($link,$query1);
$num_rows = mysqli_num_rows($result1);
echo "<br/>Выбрали из БД список всех должностей - всего ";
echo $num_rows;
$w = 0;
while($row = mysqli_fetch_array($result1))
	{
		$id1 = $row['id'];
		$query2 = "select id from `job_cost` where job_id = '$id1'";
		$count = mysqli_num_rows(mysqli_query($link,"$query2"));
		if($count == 0)
			{
				$job_id = $row["id"];
				$express_cost = $row["express_number_for_sms"];
				$indiv_cost = $row["indiv_number_for_sms"];
				$query3 = "insert into `job_cost` (job_id, express_cost, indiv_cost) values ($job_id, $express_cost, $indiv_cost)";
				if(mysqli_query($link,$query3)) $w++;
			}


	}
echo "<br/> Добавлено ";
echo $w;
echo " записей";
?>