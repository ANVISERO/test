<?php
if(!isset($_POST['job']))
{echo('
<p><b>Должность не выбрана!</b></p>
<p class="no_print"><input type="submit" value="&laquo; Новый отчет" onclick="self.location.href=\'/work/scoring-entrepreneur-max/\';" class="submit"></p>
');}


if(isset($_POST['job'])){
    $jtype_id=$_POST['stype'];
    $job_id=intval($_POST['job']);

    $region_id=intval($_POST['city']);
    //if there is no city => SPb
    if($region_id==0) {$region_id=1;}

    $borrower_salary=$_POST['borrower_salary'];
    //print_r($_POST);

$jtype_name=mysqli_result(mysqli_query($link,"select name from base_jtype where id='$jtype_id'"),0,0);
//$job_name=mysqli_result(mysqli_query($link,"select name from base_jobs where id='$job_id'"),0,0);
$job_name=mysqli_result(mysqli_query($link,"select name from base_entrepreneur_services where id='$job_id'"),0,0);
//$job_name_partitive=mysqli_result(mysqli_query($link,"select name_partitive from base_jobs where id='$job_id'"),0,0);

$region_name=mysqli_result(mysqli_query($link,"select name from base_regions where id='$region_id'"),0,0);
$region_name_partitive="в ".mysqli_result(mysqli_query($link,"select name_partitive from base_regions where id='$region_id'"),0,0);

$filter="select (official_salary+add_payment+bonus+premium) as salary from base_entrepreneur_max where job_id in (select job_id from base_entrepreneur_service_jobs where service_id = '$job_id') and region_id='$region_id' order by official_salary";


if(mysqli_num_rows(mysqli_query($link,$filter))==0){
    $region_coefficient=mysqli_result(mysqli_query($link,"select coefficient from base_region_coefficients where city_id='$region_id'"),0,0);
    $filter="select (official_salary+add_payment+bonus+premium) as salary from base_entrepreneur_max where job_id in (select job_id from base_entrepreneur_service_jobs where service_id = '$job_id') and region_id='1' order by official_salary";
    }else{
       $region_coefficient=1;
    }

$result=mysqli_query($link,$filter);
$col_people=mysqli_num_rows($result);

while($row=mysqli_fetch_array($result)){
    $salary[]=$row['salary']/0.87;
}

//**********
$salary=delete_from_array($salary,'0');
$i=count($salary);
$salary_sre=average($salary);
/*
$salary[$i]=1.0725*$salary_sre;
$salary[$i+1]=0.8715*$salary_sre;
$salary[$i+2]=1.215*$salary_sre;
$salary[$i+3]=0.789*$salary_sre;
$salary[$i+4]=0.231*$salary_sre;
$salary[$i+5]=1.452*$salary_sre;
*/
/***********************************************/
$proc_10_salary=percentile($salary,10)*$region_coefficient;
$proc_90_salary=percentile($salary,90)*$region_coefficient;

$salary_sre=average($salary)*$region_coefficient;

if($borrower_salary < $salary_sre){
    $score=1;
    $scoring_results='<p>Размер среднемесячного дохода с учетом удержаний в сумме '.number_format($borrower_salary,0,',',' ').' руб. <b>считать <font style="color:yellowGreen;">ПОДТВЕРЖДЕННЫМ</font></b></p>';
}else{
    $score=0;
    $scoring_results='<p>Подтвержденным считать среднемесячный доход с учетом удержаний в сумме '.number_format($salary_sre,0,',',' ').' руб.</p>';
}

/*
if($borrower_salary<$proc_90_salary){
    $score=1;
    $scoring_results='<p>Размер среднемесячного дохода с учетом удержаний в сумме '.number_format($borrower_salary,0,',',' ').' руб. <b>считать <font style="color:yellowGreen;">ПОДТВЕРЖДЕННЫМ</font></b></p>';
}else{
    $score=0;
    $scoring_results='<p>Подтвержденным считать среднемесячный доход с учетом удержаний в сумме '.number_format($proc_90_salary,0,',',' ').' руб.</p>';
}
*/
//Конец вычисления параметров

//id клиента
$user_id=mysqli_result(mysqli_query($link,"SELECT user_id from for_users_corporat_login WHERE session_id='".$_SESSION["user_number"]."'"),0,0);
//имя пользователя
$user_name=mysqli_result(mysqli_query($link,"SELECT name from for_users_corporat WHERE id='".$user_id."'"),0,0);
//компания
$company_name=mysqli_result(mysqli_query($link,"SELECT company from for_users_corporat WHERE id='".$user_id."'"),0,0);
//кол-во сформированных отчетов
$reports=mysqli_result(mysqli_query($link,"SELECT reports from for_users_corporat WHERE id='".$user_id."'"),0,0);
//переписываем кол-во отчетов
$reports++;
mysqli_query($link,"update for_users_corporat set reports='$reports' WHERE id='".$user_id."'");

//Генерация урла
$url=genpass(20,20);

//дата формирования отчета

$date=date("Y-m-d H:i");

$q_archive=mysqli_query($link,"INSERT INTO zarplata_banks.for_users_corporat_scoring_reports values('','$url','$user_id','$job_id','$region_id','$date','$borrower_salary','$score','$proc_90_salary', '3', '$salary_sre')");

$order_id=mysqli_result(mysqli_query($link,"SELECT id from zarplata_banks.for_users_corporat_scoring_reports where url='$url' AND user_id='$user_id'"),0,0);

$filedir=$_SERVER['DOCUMENT_ROOT'].'/_report/user'.$user_id.'/';
$filename_html='report_'.$order_id.'.txt';

include($folder.'application/moduls/reports/scoring-entrepreneur-max/scoring-html.php');
include($folder.'application/moduls/reports/scoring-entrepreneur-max/scoring-2-echo.php');
}
?>