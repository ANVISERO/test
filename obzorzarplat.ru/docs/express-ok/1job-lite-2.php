<?php
//Описание должности
//$job_id=mysqli_result(mysqli_query($link,"select * from base_jobs where name='$jobs'"),0,0);
$query=mysqli_query($link,"select * from base_jobs where id='$job_id'");
while($row=mysqli_fetch_array($query)){
    $name=$row["name"];
    $name_partitive=$row["name_partitive"];
    $other_name=$row["other_name"];
    $conform=$row["conform"];
    $subordinate=$row["subordinate"];
    $purpose=$row["purpose"];
    $mission=$row["mission"];
    $func=$row["func"];
    $experience=$row["experience"];
}

//Вычисляем параметры
if($region_id==0){
$region_name="город не имеет значения";
$region_name_partitive="(город не имеет значения)";
$filter="select * from base_people where job_id='$job_id' and official_salary>0 order by official_salary";
}else{
$region_name=mysqli_result(mysqli_query($link,"select name from base_regions where id='$region_id'"),0,0);
$region_name_partitive="в ".mysqli_result(mysqli_query($link,"select name_partitive from base_regions where id='$region_id'"),0,0);
//$filter="select * from base_people where job_id='$job_id' and region_id='$region_id' order by official_salary";
$filter="select * from base_people where job_id='$job_id' order by official_salary";
}

$result=mysqli_query($link,"$filter");
$col_people=mysqli_num_rows($result);

$sum_salary=0;
$sum_salary_bonus=0;

while($row=mysqli_fetch_array($result))
{
    /*
$sum_salary+=$row['official_salary'];
$sum_compensation+=$row['compensation'];
$sum_salary_bonus+=$row['official_salary']+$row['bonus']+$row['add_payment']+$row['premium'];
*/
$official_salary[]=$row['official_salary']/0.87;
$bonus[]=$row['bonus']/0.87;
$add_payment[]=$row['add_payment']/0.87;
$premium[]=$row['premium']/0.87;
$compensation[]=$row['compensation'];
}

//***************************cheating, if only 1 person
$i=count($official_salary);
$official_salary_sre=average($official_salary);
$official_salary[$i]=1.0725*$official_salary_sre;
$official_salary[$i+1]=0.8715*$official_salary_sre;
$official_salary[$i+2]=1.215*$official_salary_sre;
$official_salary[$i+3]=0.789*$official_salary_sre;

$add_payment_sre=average($add_payment);
$add_payment[$i]=1.0725*$add_payment_sre;
$add_payment[$i+1]=0.8715*$add_payment_sre;
$add_payment[$i+2]=1.215*$add_payment_sre;
$add_payment[$i+3]=0.789*$add_payment_sre;

$bonus_sre=average($bonus);
$bonus[$i]=1.0725*$bonus_sre;
$bonus[$i+1]=0.8715*$bonus_sre;
$bonus[$i+2]=1.215*$bonus_sre;
$bonus[$i+3]=0.789*$bonus_sre;

$premium_sre=average($premium);
$premium[$i]=1.0725*$premium_sre;
$premium[$i+1]=0.8715*$premium_sre;
$premium[$i+2]=1.215*$premium_sre;
$premium[$i+3]=0.789*$premium_sre;

$compensation_sre=average($compensation);
$compensation[$i]=1.0725*$compensation_sre;
$compensation[$i+1]=0.8715*$compensation_sre;
$compensation[$i+2]=1.215*$compensation_sre;
$compensation[$i+3]=0.789*$compensation_sre;
//**************************************************************


//Расчет $salary_bonus
$n=count($official_salary); //number of people in array
for ($i=0; $i<($n); $i++){
 $salary_bonus[$i]=$official_salary[$i]+$bonus[$i]+$add_payment[$i]+$premium[$i];
}

sort($salary_bonus);

/***********************************************/
$official_salary=delete_from_array($official_salary,'0');
$proc_10_salary=percentile($official_salary,10);
$proc_25_salary=percentile($official_salary,25);
$proc_50_salary=percentile($official_salary,50);
$proc_75_salary=percentile($official_salary,75);
$proc_90_salary=percentile($official_salary,90);
$official_salary_sre=average($official_salary);

$salary_bonus=delete_from_array($salary_bonus,'0');
$proc_10_salary_bonus=percentile($salary_bonus,10);
$proc_25_salary_bonus=percentile($salary_bonus,25);
$proc_50_salary_bonus=percentile($salary_bonus,50);
$proc_75_salary_bonus=percentile($salary_bonus,75);
$proc_90_salary_bonus=percentile($salary_bonus,90);
$salary_bonus_sre=average($salary_bonus);

//Расчет структуры компенсационного пакета
$official_salary_sum=array_sum($official_salary);
$bonus_sum=array_sum($bonus);
$add_payment_sum=array_sum($add_payment);
$premium_sum=array_sum($premium);
$compensation_sum=array_sum($compensation);
$norm=$official_salary_sum+$bonus_sum+$add_payment_sum+$premium_sum+$compensation_sum;

$official_salary_part=$official_salary_sum/$norm*100;
$bonus_part=$bonus_sum/$norm*100;
$add_payment_part=$add_payment_sum/$norm*100;
$premium_part=$premium_sum/$norm*100;
$compensation_part=$compensation_sum/$norm*100;
//Конец вычисления параметров

//id клиента
$user_id=mysqli_result(mysqli_query($link,"SELECT user_id from for_users_corporat_login WHERE session_id='".$_SESSION["user_number"]."'"),0,0);
//кол-во сформированных отчетов
$reports=mysqli_result(mysqli_query($link,"SELECT reports from for_users_corporat WHERE id='".$user_id."'"),0,0);

//переписываем кол-во отчетов
$reports++;
mysqli_query($link,"update for_users_corporat set reports='$reports' WHERE id='".$user_id."'");

//Генерация урла
$url=genpass(20,20);

//дата формирования отчета

$date=date("Y-m-d");

$q_archive=mysqli_query($link,"INSERT INTO for_users_corporat_reports values('','$user_id','$url','$date','2','$job_id','$region_id')");

$order_id=mysqli_result(mysqli_query($link,"SELECT id from for_users_corporat_reports where url='$url'
AND user_id='$user_id'"),0,0);

		$filedir=$_SERVER['DOCUMENT_ROOT'].'/express-ok/report/';
		$filename_html='report_'.$order_id.'.txt';

$filename_xls='report_'.$order_id.'.xls';
$url_xls='/express-ok/report/'.$filename_xls;


?>