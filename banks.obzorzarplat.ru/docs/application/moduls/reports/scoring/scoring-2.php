<?php
//id клиента
$user_id=mysqli_result(mysqli_query($link,"SELECT user_id from for_users_corporat_login WHERE session_id='".$_SESSION["user_number"]."'"),0,0);

// нужна ли капча
$req_captcha=mysqli_result(mysqli_query($link,"SELECT req_captcha from for_users_corporat where id = '".$user_id. "'"),0,0);

$not_use_coef = 0;

$err = 0;
if($req_captcha)
{
	 if (empty($_SESSION['captcha']) || trim(strtolower($_POST['captcha_form'])) != $_SESSION['captcha']) {
		echo('<p><b>Неправильно текст с картинки!</b></p><p class="no_print"><input type="submit" value="&laquo; Новый отчет" onclick="self.location.href=\'/work/scoring/\';" class="submit"></p>');
		$err = 1;
	 }
}



if(!isset($_POST['job']))
{
	echo('<p><b>Должность не выбрана!</b></p><p class="no_print"><input type="submit" value="&laquo; Новый отчет" onclick="self.location.href=\'/work/scoring/\';" class="submit"></p>');
}


if( isset($_POST['job']) && !$err ){
    $jtype_id=$_POST['jtype'];
    $job_id=intval($_POST['job']);

    $region_id=intval($_POST['city']);
    //if there is no city => SPb
    if ($region_id==0) {$region_id=1;}

    $borrower_salary=$_POST['borrower_salary'];
    //print_r($_POST);

$jtype_name=mysqli_result(mysqli_query($link,"select name from base_jtype where id='$jtype_id'"),0,0);
$job_name=mysqli_result(mysqli_query($link,"select name from base_jobs where id='$job_id'"),0,0);
$job_name_partitive=mysqli_result(mysqli_query($link,"select name_partitive from base_jobs where id='$job_id'"),0,0);
$not_use_coef=mysqli_result(mysqli_query($link,"select not_use_coef from base_jobs where id='$job_id'"),0,0);

//echo $not_use_coef;

$region_coefficient=1;

$region_name=mysqli_result(mysqli_query($link,"select name from base_regions where id='$region_id'"),0,0);
$region_name_partitive="в ".mysqli_result(mysqli_query($link,"select name_partitive from base_regions where id='$region_id'"),0,0);
//


/*
if ($jtype_id == "11456" || $jtype_id == "11457" && $region_id != 1) {
    if ($jtype_id == "11456" || $jtype_id == "11457") {
        $filter = "select official_salary, add_payment, bonus, premium, (official_salary+add_payment+bonus+premium) as salary from base_people where job_id='$job_id' and region_id='$region_id'";
	if(mysqli_num_rows(mysqli_query($link,$filter))==0) $filter = "select official_salary, add_payment, bonus, premium, (official_salary+add_payment+bonus+premium) as salary from base_people where job_id='$job_id' and region_id='1556'";
        $region_coefficient_app = 1;
    } 

$not_use_coef = 1;
} else {
*/
#$filter="select official_salary, add_payment, bonus, premium, (official_salary+add_payment+bonus+premium) as salary from base_people where job_id='$job_id' and region_id='$region_id'";
$filter = "select official_salary, add_payment, bonus, premium, (official_salary+add_payment+compensation+premium+premium_quarterly/3+premium_annual/12+bonus/12) as salary from base_people where job_id='$job_id' and region_id='$region_id'";




if(mysqli_num_rows(mysqli_query($link,$filter))==0){
    $region_coefficient=mysqli_result(mysqli_query($link,"select coefficient from base_region_coefficients where city_id='$region_id'"),0,0);
    $filter="select  official_salary, add_payment, bonus, premium, (official_salary+add_payment+compensation+premium+premium_quarterly/3+premium_annual/12+bonus/12) as salary from base_people where job_id='$job_id' and region_id='1'";
}

//}
//echo $region_coefficient;
//if($not_use_coef) $region_coefficient=1;
//echo $region_coefficient;

$result=mysqli_query($link,$filter);
$col_people=mysqli_num_rows($result);


while($row=mysqli_fetch_array($result)){
    $official_salary[] = round($row['official_salary'] * $region_coefficient);
    $bonus[] = round($row['bonus'] * $region_coefficient);
    $add_payment[] = round($row['add_payment'] * $region_coefficient);
    $premium[] = round($row['premium'] * $region_coefficient);
    $salary[] = round($row['salary'] * $region_coefficient);
}

$official_salary  = add_items($official_salary);
$add_payment = add_items($add_payment);
$bonus = add_items($bonus);
$premium = add_items($premium);
$salary = add_items($salary);

//$salary = Array();
/*
$n = count($official_salary);

for ($i=0; $i<($n); $i++){
 $salary[$i]=$official_salary[$i]+$bonus[$i]+$add_payment[$i]+$premium[$i];
}
*/

//$salary = delete_from_array($salary,'0');
//$salary = add_items($salary);

//sort($salary);
/***********************************************/
$proc_10_salary=percentile($salary,10);
$proc_50_salary=percentile($salary,50);
$proc_75_salary=percentile($salary,75);
$proc_90_salary=percentile($salary,90);

$salary_sre=average($salary);
/*
if($borrower_salary < $salary_sre){
    $score=1;
    $scoring_results='<p>Размер среднемесячного дохода с учетом удержаний в сумме '.number_format($borrower_salary,0,',',' ').' руб. <b>считать <font style="color:yellowGreen;">ПОДТВЕРЖДЕННЫМ</font></b></p>';
}else{
    $score=0;
    $scoring_results='<p>Подтвержденным считать среднемесячный доход с учетом удержаний в сумме '.number_format($salary_sre,0,',',' ').' руб.</p>';
}
 ! $req_captcha &&
*/ 
if( !$req_captcha ){
    
    $formated_salary = number_format($borrower_salary,0,',',' ');
    $fomated_50_salary = number_format($proc_50_salary,0,',',' ');
    $fomated_75_salary = number_format($proc_75_salary,0,',',' ');
    $fomated_90_salary = number_format($proc_90_salary,0,',',' ');
    
} else {

    /*
    $formated_salary = mcrypt_ecb(MCRYPT_DES, "123", number_format($borrower_salary,0,',',' '), MCRYPT_ENCRYPT);
    $fomated_75_salary = mcrypt_ecb(MCRYPT_DES, "123", number_format($proc_75_salary,0,',',' '), MCRYPT_ENCRYPT);
    $fomated_90_salary = mcrypt_ecb(MCRYPT_DES, "123", number_format($proc_90_salary,0,',',' '), MCRYPT_ENCRYPT);  
     */ 
    $formated_salary   = number_format($borrower_salary,0,',',' ');
    $fomated_50_salary = number_format($proc_50_salary,0,',',' ');
    $fomated_75_salary = number_format($proc_75_salary,0,',',' ');
    $fomated_90_salary = number_format($proc_90_salary,0,',',' ');  
    
    $formated_salary = "<img src=\"http://banks.obzorzarplat.ru/strpng.php?str=".urlencode($formated_salary)."\">";
    $fomated_50_salary = "<img src=\"http://banks.obzorzarplat.ru/strpng.php?str=".urlencode($fomated_50_salary)."\">";
    $fomated_75_salary = "<img src=\"http://banks.obzorzarplat.ru/strpng.php?str=".urlencode($fomated_75_salary)."\">";
    $fomated_90_salary = "<img src=\"http://banks.obzorzarplat.ru/strpng.php?str=".urlencode($fomated_90_salary)."\">";
}



if ( ($region_id == 1 || $region_id == 1435) && $user_id != 1529 ) {
	
	if($borrower_salary < $proc_90_salary){
    	$score=1;
    	$scoring_results='<p>Размер среднемесячного дохода с учетом удержаний в сумме '.$formated_salary.' руб. <b>считать <font style="color:yellowGreen;">ПОДТВЕРЖДЕННЫМ</font></b></p>';
	}else{
    	$score=0;
    	$scoring_results='<p>Подтвержденным считать среднемесячный доход с учетом удержаний в сумме '.$fomated_90_salary.' руб.</p>';
	}
	
} else {

    if ( ($user_id != 1514 && $user_id != 1527)) {
	if($borrower_salary < $proc_75_salary){
        	$score=1;
		$scoring_results='<p>Размер среднемесячного дохода с учетом удержаний в сумме '.$formated_salary.' руб. <b>считать <font style="color:yellowGreen;">ПОДТВЕРЖДЕННЫМ</font></b></p>';
	} else {
    	    $score=0;
        	$scoring_results='<p>Подтвержденным считать среднемесячный доход с учетом удержаний в сумме '.$fomated_75_salary.' руб.</p>';
	}
    } else {
	if($borrower_salary < $proc_50_salary){
        	$score=1;
		$scoring_results='<p>Размер среднемесячного дохода с учетом удержаний в сумме '.$formated_salary.' руб. <b>считать <font style="color:yellowGreen;">ПОДТВЕРЖДЕННЫМ</font></b></p>';
	} else {
    	    $score=0;
        	$scoring_results='<p>Подтвержденным считать среднемесячный доход с учетом удержаний в сумме '.$fomated_50_salary.' руб.</p>';
	}

    }
}
//Конец вычисления параметров


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

$date=date("Y-m-d H:i:s");

$q_archive=mysqli_query($link,"INSERT INTO zarplata_banks.for_users_corporat_scoring_reports values(0,'$url','$user_id','$job_id','$region_id','$date','$borrower_salary','$score', '$proc_90_salary', 0, '$salary_sre')");

$order_id=mysqli_result(mysqli_query($link,"SELECT id from zarplata_banks.for_users_corporat_scoring_reports where url='$url' AND user_id='$user_id'"),0,0);

//echo "INSERT INTO zarplata_banks.for_users_corporat_scoring_stats values('$user_id', '$order_id', '$date', INET_ATON(".$_SERVER['REMOTE_ADDR']."), '".$_SERVER['HTTP_USER_AGENT']."')";
$q_stat = mysqli_query($link,"INSERT INTO zarplata_banks.for_users_corporat_scoring_stats(`user_id`, `report_id`, `date`, `ip`, `user_agent`) values('$user_id', '$order_id', '$date', INET_ATON('".$_SERVER['REMOTE_ADDR']."'), '".$_SERVER['HTTP_USER_AGENT']."')");

$filedir=$_SERVER['DOCUMENT_ROOT'].'/_report/user'.$user_id;

if (!is_dir($filedir)) mkdir($filedir);
    
$filedir = $filedir.'/';
$filename_html='report_'.$order_id.'.txt';

include($folder.'application/moduls/reports/scoring/scoring-html.php');
include($folder.'application/moduls/reports/scoring/scoring-2-echo.php');
}
?>