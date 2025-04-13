<?php
if(!isset($_POST['job'])) {
 echo('<p><font style="color:#f00"><b>Должность не выбрана!</b></font></p>');
}

if(isset($_POST['job']))
{
    $jtype_id=intval($_POST['jtype']);
    $job_id=intval($_POST['job']);
    $region_id=intval($_POST['city']);

$jtype_name=mysqli_result(mysqli_query($link, "select name from base_jtype where id='$jtype_id'"),0,0);
$kov="'";

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
$region_coefficient = 1;
//


if ($region_id == 0) {
    $region_name="город не имеет значения";
    $region_name_partitive="(город не имеет значения)";
    $filter="select * from base_people where job_id='$job_id' and official_salary > 0 order by official_salary";
} else {
    $region_name = mysqli_result( mysqli_query($link, "select name from base_regions where id='$region_id'") , 0, 0);
    $region_name_partitive = mysqli_result( mysqli_query($link, "select name_partitive from base_regions where id='$region_id'"), 0, 0);
    
    $city_key = mysqli_result(mysqli_query($link,"select fake_express from base_regions where id='$region_id'"),0,0);
    //$city_key = array_search($region_id, $aFakedCities);
    // echo $city_key;

#if ($jtype_id == "11456" || $jtype_id == "11457" || $jtype_id == "11465") {
#    $city_key = 0;
#    $region_coefficient = 1;
#}
  /*
    if (false
      //$city_key
      ) {
    	$filter="SELECT * FROM base_people where job_id='$job_id' and region_id = 1";
	$region_coefficient=mysqli_result(mysqli_query($link,"select coefficient from base_region_coefficients where city_id = '".$region_id."'"),0,0);
    } else {
	$filter="SELECT * FROM base_people where job_id='$job_id' and region_id='$region_id'";
	$region_coefficient = 1;
    }

  */  	

    $region_job_data_exists = mysqli_num_rows(mysqli_query($link,"SELECT * FROM base_people where job_id='$job_id' and region_id='$region_id'"));

    if($region_job_data_exists) {
 
      $filter = "SELECT *, (official_salary+add_payment+compensation+premium+(premium_quarterly/3)+(premium_annual/12)+(bonus/12)) as salary FROM base_people where job_id='$job_id' and region_id='$region_id'";
      $region_coefficient = 1;
      //var_dump('EXISTS');
    } else {
      $filter = "SELECT * , (official_salary+add_payment+compensation+premium+(premium_quarterly/3)+(premium_annual/12)+(bonus/12)) as salary FROM base_people where job_id='$job_id' and region_id = 1";
      $region_coefficient = mysqli_result(mysqli_query($link,"select coefficient from base_region_coefficients where city_id = '".$region_id."'"),0,0);
       //var_dump('NOT EXISTS');
    }

    //echo $filter;
 /*   
    if ($region_id == 1423) {
         $filter="select * from base_people where job_id='$job_id' and region_id='1'";
         $region_coefficient=mysqli_result(mysqli_query($link,"select coefficient from base_region_coefficients where city_id = '1423'"),0,0);
    }
    if ($region_id == 1521) {
         $filter="select * from base_people where job_id='$job_id' and region_id='1'";
         $region_coefficient=mysqli_result(mysqli_query($link,"select coefficient from base_region_coefficients where city_id = '1521'"),0,0);
    }
    if ($region_id == 1585) {
         $filter="select * from base_people where job_id='$job_id' and region_id='1'";
         $region_coefficient=mysqli_result(mysqli_query($link,"select coefficient from base_region_coefficients where city_id = '1585'"),0,0);
    }
  */  
    //else {
     //   $filter="select * from base_people where job_id='$job_id' and region_id='$region_id'";
  //  }
// order by official_salary
}

$result = mysqli_query($link, $filter) or die(mysqli_error($link));
$col_people = mysqli_num_rows($result);
//echo $region_coefficient;
$sum_salary=0;
$sum_salary_bonus=0;

$premium_quarterly = array();
$premium_annual = array();
$premium_total = array();

$i = 0;

#if ($jtype_id == "11456" || $jtype_id == "11457" || $jtype_id == "11465") $region_coefficient = 1;

#$filter = "select official_salary, add_payment, bonus, premium, (official_salary+add_payment+compensation+premium+premium_quarterly/3+premium_annual/12+bonus/12) as salary from base_people where job_id='$j_id' and region_id='$c_id'";

while($row=mysqli_fetch_array($result))
{
	$official_salary[$i] = round($row['official_salary'] * $region_coefficient);
	$bonus[$i] = round($row['bonus']/12 * $region_coefficient);
	$add_payment[$i] = round($row['add_payment'] * $region_coefficient);
	$premium[$i] = round($row['premium'] * $region_coefficient);
	$compensation[$i] = round($row['compensation'] * $region_coefficient);
	$premium_quarterly[$i] = round($row['premium_quarterly'] * $region_coefficient / 3);
	$premium_annual[$i] = round($row['premium_annual'] * $region_coefficient / 12);
	$premium_total[$i] = round(($row['premium'] + $row['premium_quarterly'] / 3 + $row['premium_annual'] / 12) * $region_coefficient);

	$off_salary[$i] = round($row["salary"] * $region_coefficient);
	$i++;
}


//$off_salary = add_items($off_salary);
//$official_salary = add_items($official_salary);
//$bonus = add_items($bonus);
//$premium = add_items($premium);
//$compensation = add_items($compensation);

$add_payment_sre = average($add_payment);
$bonus_sre = average($bonus);
$premium_sre = average($premium_total);
$compensation_sre = average($compensation);


$official_salary_sre = average($off_salary);
//***************************cheating, if only 1 person
/*
$official_salary  = add_items($official_salary);
$official_salary_sre = average($official_salary);

$add_payment = add_items($add_payment);
$add_payment_sre = average($add_payment);

$bonus = add_items($bonus);
$bonus_sre = average($bonus);

$premium = add_items($premium);
$premium_sre = average($premium);

$compensation = add_items($compensation);
$compensation_sre = average($compensation);
*/

//**************************************************************

//Расчет $salary_bonus
$salary_bonus = array();

$n = count($official_salary); //number of people in array

for ($i=0; $i<($n); $i++){
 $salary_bonus[$i] = $official_salary[$i] + $bonus[$i] + $add_payment[$i] + $premium[$i] + $premium_quarterly[$i] + $premium_annual[$i] + $compensation[$i];
}


//$salary_bonus = add_items($salary_bonus);

$official_salary=delete_from_array($official_salary,'0');
$salary_bonus=delete_from_array($salary_bonus,'0');

sort($salary_bonus);
sort($official_salary);

//print_r($salary_bonus);
/***********************************************/

$proc_10_salary=percentile($official_salary,10);
$proc_25_salary=percentile($official_salary,25);
$proc_50_salary=percentile($official_salary,50);
$proc_75_salary=percentile($official_salary,75);
$proc_90_salary=percentile($official_salary,90);
$official_salary_sre=average($official_salary);

//print_r($salary_bonus);
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
$premium_sum=array_sum($premium) + array_sum($premium_quarterly) + array_sum($premium_annual);
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

$q_archive=mysqli_query($link,"INSERT INTO for_users_corporat_reports values(0,'$user_id','$url','$date','2','$job_id','$region_id')");

$order_id=mysqli_result(mysqli_query($link,"SELECT id from for_users_corporat_reports where url='$url' AND user_id='$user_id'"),0,0);

		$filedir=$_SERVER['DOCUMENT_ROOT'].'/_report/user'.$user_id.'/';
		$filename_html='report_'.$order_id.'.txt';

$filename_xls='report_'.$order_id.'.xls';
$url_xls='/_report/user'.$user_id.'/'.$filename_xls;

if(!is_dir($filedir)) {
    mkdir($filedir, 0755, true);
}

include($folder.'application/moduls/reports/1job-lite/1job-lite-html.php');
include($folder.'application/moduls/reports/1job-lite/1job-lite-excel.php');
include($folder.'application/moduls/reports/1job-lite/1job-lite-2-echo.php');
}
?>