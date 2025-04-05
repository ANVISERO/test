<?
define('FPDF_FONTPATH','../../_lib/font/');
require '../../_lib/fpdf.php';                    // Require the lib. 
require '../../_lib/PDF_MC_Table.php';

$folder="../../";
include($folder.'_admin/sql/mysql.php');
include($folder.'_admin/moduls/funcs.php');

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

header("Content-Type: application/pdf; charset=windows-1251");

//Данные для таблиц
$city_id=intval($_POST['city']);
$job=$_POST['job'];
$factor=$_POST['factor'];
$factor_value=intval($_POST['factor_value']);


/******************************************************/
//формирование таблицы
$header=array("Должность","Минимум","25%","Среднее","Медиана","75%","Максимум");

foreach($job as $job_id){

switch($factor){
case "n":
  $factor_name="Фактор не имеет значения";

  if($city_id==0){
  $query[$job_id]="SELECT * FROM base_people where job_id='$job_id'";
  }else{
   $query[$job_id]="SELECT * FROM base_people where job_id='$job_id' and region_id='$city_id'";
  }
  break;

case "sp":
  $factor_name="Сфера деятельности компании:";
  $factor_value_name=mysqli_result(mysqli_query($link,"SELECT name FROM base_sphere where id='$factor_value'"),0,0);

   if($city_id==0){
  $query[$job_id]="SELECT * FROM base_people where job_id='$job_id' 
  AND company_id in(select company_id from base_company_sphere
  where sphere_id='$factor_value')";
  }else{
  $query[$job_id]="SELECT * FROM base_people where job_id='$job_id' 
  AND region_id='$city_id'
  AND company_id in(select company_id from base_company_sphere
  where sphere_id='$factor_value')";
  }
  break;

case "t":
  $factor_name="Оборот компании:";  

  switch ($factor_value){
  case 0:
    $turnoverMIN=0;
    $turnoverMAX=10e9;
    $factor_value_name="не имеет значения";
    break;
  case 1:
    $turnoverMIN=0;
    $turnoverMAX=2e8;
    $factor_value_name="< 200 (млн. руб. в месяц)";
    break;
  case 2:
    $turnoverMIN=2e8+1;
    $turnoverMAX=4e8;
    $factor_value_name="200 - 400 (млн. руб. в месяц)";
    break;
  case 3:
    $turnoverMIN=4e8+1;
    $turnoverMAX=8e8;
    $factor_value_name="400 - 800 (млн. руб. в месяц)";
    break;
  case 4:
    $turnoverMIN=8e8+1;
    $turnoverMAX=1.6e9;
    $factor_value_name="800 - 1 600 (млн. руб. в месяц)";
    break;
  case 5:
    $turnoverMIN=1.6e9+1;
    $turnoverMAX=3.2e9;
    $factor_value_name="1 600 - 3 200 (млн. руб. в месяц)";
    break;
  case 6:
    $turnoverMIN=3.2e9+1;
    $turnoverMAX=10e9;
    $factor_value_name="> 3 200 (млн. руб. в месяц)";
    break;
}

  
  if($city_id==0){
  $query[$job_id]="SELECT * FROM base_people where job_id='$job_id' 
  AND company_id in(select id from base_companies
  where turnover BETWEEN '$turnoverMIN' AND '$turnoverMAX')";
  }else{
  $query[$job_id]="SELECT * FROM base_people where job_id='$job_id'
  AND region_id='$city_id'
  AND company_id in(select id from base_companies
  where turnover BETWEEN ".$turnoverMIN." AND ".$turnoverMAX.")";
  }
  
  break;
  
case "s":
  $factor_name="Штат компании:";
  $factor_value_name=mysqli_result(mysqli_query($link,"select title from base_personal where id='$factor_value'"),0,0);
  
  if($city_id==0){
  $query[$job_id]="SELECT * FROM base_people where job_id='$job_id' 
  AND company_id in(select id from base_companies
  where personal_id='$factor_value')";
  }else{
  $query[$job_id]="SELECT * FROM base_people where job_id='$job_id'
  AND region_id='$city_id'
  AND company_id in(select id from base_companies
  where personal_id='$factor_value')";
  }
  break;
}
$job_name=mysqli_result(mysqli_query($link,"select name from base_jobs where id='$job_id'"),0,0);

$q_people=mysqli_query($link,$query[$job_id]);

while ($row=mysqli_fetch_array($q_people)){
  $people_id[$job_id][]=$row["id"];
  $company_id[$job_id][]=$row["company_id"];
  $base[$job_id][]=$row["official_salary"];
  $add[$job_id][]=$row["add_payment"];
  $bonus[$job_id][]=$row["bonus"];
  $premium[$job_id][]=$row["premium"];
  $compensation[$job_id][]=$row["compensation"];
  $payment_id[$job_id][]=$row["payment_id"];
  $period_id[$job_id][]=$row["period_id"];
}

//echo $job_id.'<br>';

for($i=0;$i<count($people_id[$job_id]);$i++){
  if($base[$job_id][$i]>0){
    $salary[$job_id][$i]=$base[$job_id][$i]+$add[$job_id][$i]+$bonus[$job_id][$i]+$premium[$job_id][$i];
     $cash[$job_id][$i]=$salary[$job_id][$i]+$compensation[$job_id][$i];
  }
}

}
/******************************************************/

$pdf=new PDF_MC_Table();
$pdf->Open();
$pdf->AddPage('L');

$pdf-> AddFont('TimesNewRomanPSMT','','times1.php'); 
$pdf-> SetFont('TimesNewRomanPSMT','',12);

//Заголовок 1ой таблицы
$pdf->Cell(0,10,'1. Рыночная тенденция по значениям компенсации труда (руб. в месяц)',0,1);

//1ая таблица
$pdf->TableSummary($header,$job,$cash);
$pdf->Ln();

//Заголовок 2ой таблицы
$pdf->Cell(0,10,'2. Рыночная тенденция по значениям заработной платы (руб. в месяц)',0,1);

//2ая таблица
$pdf->TableSummary($header,$job,$salary);
$pdf->Ln();

$pdf->AliasNbPages();
$pdf->Output();

?>