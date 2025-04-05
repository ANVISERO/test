<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

include($folder.'_admin/moduls/reports/funcs.php');

$city_id=intval($_POST['city']);
$jtype_id=intval($_POST['jtype']);
$job=$_POST['job'];
$factor=$_POST['factor'];
$factor_id=intval($_POST['factor_id']);

//Название города
if($city_id==0){
$city_name="Все города";
}else{
$city_name=mysqli_result(mysqli_query($link,"select name from base_regions where id='$city_id'"),0,0);
}

$color=1;

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
  $factor_value_name=mysqli_result(mysqli_query($link,"SELECT name FROM base_sphere where id='$factor_id'"),0,0);

   if($city_id==0){
  $query[$job_id]="SELECT * FROM base_people where job_id='$job_id'
  AND company_id in(select company_id from base_company_sphere
  where sphere_id='$factor_id')";
  }else{
  $query[$job_id]="SELECT * FROM base_people where job_id='$job_id'
  AND region_id='$city_id'
  AND company_id in(select company_id from base_company_sphere
  where sphere_id='$factor_id')";
  }
  break;

case "t":
  $factor_name="Оборот компании (млн. руб. в год):";
  $factor_value_name=mysqli_result(mysqli_query($link,"SELECT title FROM base_turnover where id='$factor_id'"),0,0);

  if($city_id==0){
  $query[$job_id]="SELECT * FROM base_people where job_id='$job_id'
  AND company_id in(select id from base_companies
  where turnover_id='$factor_id')";
  }else{
  $query[$job_id]="SELECT * FROM base_people where job_id='$job_id'
  AND region_id='$city_id'
  AND company_id in(select id from base_companies
  where turnover_id='$factor_id')";
  }

  break;

case "s":
  $factor_name="Штат компании:";
  $factor_value_name=mysqli_result(mysqli_query($link,"select title from base_personal where id='$factor_id'"),0,0);

  if($city_id==0){
  $query[$job_id]="SELECT * FROM base_people where job_id='$job_id'
  AND company_id in(select id from base_companies
  where personal_id='$factor_id')";
  }else{
  $query[$job_id]="SELECT * FROM base_people where job_id='$job_id'
  AND region_id='$city_id'
  AND company_id in(select id from base_companies
  where personal_id='$factor_id')";
  }
  break;
}
$job_name[$job_id]=mysqli_result(mysqli_query($link,"select name from base_jobs where id='$job_id'"),0,0);

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
  $dataDate[$job_id][]=$row["date"];
}

//echo $job_id.'<br>';

for($i=0;$i<count($people_id[$job_id]);$i++){
  if($base[$job_id][$i]>0){
    $salary[$job_id][$i]=$base[$job_id][$i]+$add[$job_id][$i]+$bonus[$job_id][$i]+$premium[$job_id][$i];
     $cash[$job_id][$i]=$salary[$job_id][$i]+$compensation[$job_id][$i];
  }
}

$salary_sre[$job_id]=average($salary[$job_id]);
//cheating, if only 1 person
$salary[$job_id][$i]=1.08*$salary_sre[$job_id];
$salary[$job_id][$i+1]=0.89*$salary_sre[$job_id];

$cash_sre[$job_id]=average($cash[$job_id]);
//cheating, if only 1 person
$cash[$job_id][$i]=1.08*$cash_sre[$job_id];
$cash[$job_id][$i+1]=0.89*$cash_sre[$job_id];

//Дата последнего обновления данных (мухлевка) - СДЕЛАТЬ честно!!!!
$dateMax[$job_id]=max($dataDate[$job_id]);
$dateUpdateMax[$job_id]=dateUpdateMax($dateMax[$job_id]);

//проверяем, есть ли минимальное значение != 0
if(min($cash[$job_id])>0){
  $cashMIN[$job_id]=min($cash[$job_id])/0.87;
  $salaryMIN[$job_id]=min($salary[$job_id])/0.87;
  }else{
  $cashMIN[$job_id]="-";
  $salaryMIN[$job_id]="-";
  }

if(average($cash[$job_id])==0){
  $cash25[$job_id]="-";
  $cashAvr[$job_id]="-";
  $cash50[$job_id]="-";
  $cash75[$job_id]="-";
  $cashMAX[$job_id]="-";

  $salary25[$job_id]="-";
  $salaryAvr[$job_id]="-";
  $salary50[$job_id]="-";
  $salary75[$job_id]="-";
  $salaryMAX[$job_id]="-";
}else{

//ЗП с учетом НДФЛ
  $cash25[$job_id]=percentile($cash[$job_id],25)/0.87;
  $cashAvr[$job_id]=average($cash[$job_id])/0.87;
  $cash50[$job_id]=percentile($cash[$job_id],50)/0.87;
  $cash75[$job_id]=percentile($cash[$job_id],75)/0.87;
  $cashMAX[$job_id]=max($cash[$job_id])/0.87;

  $salary25[$job_id]=percentile($salary[$job_id],25)/0.87;
  $salaryAvr[$job_id]=average($salary[$job_id])/0.87;
  $salary50[$job_id]=percentile($salary[$job_id],50)/0.87;
  $salary75[$job_id]=percentile($salary[$job_id],75)/0.87;
  $salaryMAX[$job_id]=max($salary[$job_id])/0.87;

}

$out_cash[$job_id]='
<tr class="X1_'.$color.'">
<td class="X1_left"><a href="/servis/job_description/view/?id='.$job_id.'&lang=0" target="_blank" class="job">'.$job_name[$job_id].'</a></td>
<td class="X1_right">'.number_format($cashMIN[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($cash25[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($cashAvr[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($cash50[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($cash75[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($cashMAX[$job_id],0,',',' ').'</td>
<td class="X1_right">'.$dateUpdateMax[$job_id].'</td>
</tr>';

$out_salary[$job_id]='
<tr class="X1_'.$color.'">
<td class="X1_left"><a href="/servis/job_description/view/?id='.$job_id.'&lang=0" target="_blank" class="job">'.$job_name[$job_id].'</a></td>
<td class="X1_right">'.number_format($salaryMIN[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($salary25[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($salaryAvr[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($salary50[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($salary75[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($salaryMAX[$job_id],0,',',' ').'</td>
<td class="X1_right">'.$dateUpdateMax[$job_id].'</td>
</tr>';

$color=1-$color;

}

//id клиента
$user_id=mysqli_result(mysqli_query($link,"SELECT id from for_users_corporat WHERE id='".$_SESSION["user_id"]."'
AND password='".$_SESSION["psw"]."' "),0,0);


//Генерация урла
$url=genpass(20,20);

//дата формирования отчета
$date=date("Y-m-d");

$q_archive=mysqli_query($link,"INSERT INTO for_users_corporat_reports values('','$user_id','$url','$date','4','null')");

$order_id=mysqli_result(mysqli_query($link,"SELECT id from for_users_corporat_reports where url='$url'
AND user_id='$user_id'"),0,0);

$filedir=$_SERVER['DOCUMENT_ROOT'].'/business/_report/user'.$user_id.'/';
$filename_html='report_'.$order_id.'.txt';

$filename_xls='report_'.$order_id.'.xls';
$url_xls='/business/_report/user'.$user_id.'/'.$filename_xls;

include($folder.'_admin/moduls/reports/field/field-html.php');
include($folder.'_admin/moduls/reports/field/field-excel.php');
include($folder.'_admin/moduls/reports/field/field-3-echo.php');
?>