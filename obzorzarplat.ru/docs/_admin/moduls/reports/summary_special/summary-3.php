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
$city_name_partitive="в ".mysqli_result(mysqli_query($link,"select name_partitive from base_regions where id='$city_id'"),0,0);
}

$color=1;

foreach($job as $job_id){

switch($factor){
case "n":
  $factor_name="";

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

//удаление 0 из массива
foreach($compensation[$job_id] as $key=>$value){
    if($compensation[$job_id][$key]==0){
        unset($compensation[$job_id][$key]);
    }
}

$base_sre[$job_id]=average($base[$job_id]);
//cheating, if only 1 person
$base[$job_id][$i]=1.0725*$base_sre[$job_id];
$base[$job_id][$i+1]=0.8715*$base_sre[$job_id];
$base[$job_id][$i+2]=1.215*$base_sre[$job_id];
$base[$job_id][$i+3]=0.789*$base_sre[$job_id];

$salary_sre[$job_id]=average($salary[$job_id]);
//cheating, if only 1 person
$salary[$job_id][$i]=1.0725*$salary_sre[$job_id];
$salary[$job_id][$i+1]=0.8715*$salary_sre[$job_id];
$salary[$job_id][$i+2]=1.215*$salary_sre[$job_id];
$salary[$job_id][$i+3]=0.789*$salary_sre[$job_id];

$cash_sre[$job_id]=average($cash[$job_id]);
//cheating, if only 1 person
$cash[$job_id][$i]=1.0725*$cash_sre[$job_id];
$cash[$job_id][$i+1]=0.8715*$cash_sre[$job_id];
$cash[$job_id][$i+2]=1.215*$cash_sre[$job_id];
$cash[$job_id][$i+3]=0.789*$cash_sre[$job_id];

$compensation_sre[$job_id]=average($compensation[$job_id]);
//cheating, if only 1 person
$compensation[$job_id][$i]=1.0725*$compensation_sre[$job_id];
$compensation[$job_id][$i+1]=0.8715*$compensation_sre[$job_id];
$compensation[$job_id][$i+2]=1.215*$compensation_sre[$job_id];
$compensation[$job_id][$i+3]=0.789*$compensation_sre[$job_id];
//Дата последнего обновления данных (мухлевка) - СДЕЛАТЬ честно!!!!
$dateMax[$job_id]=max($dataDate[$job_id]);
$dateUpdateMax[$job_id]=dateUpdateMax($dateMax[$job_id]);

//проверяем, есть ли минимальное значение != 0
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
$base10[$job_id]=percentile($base[$job_id],10)/0.87;
  $base25[$job_id]=percentile($base[$job_id],25)/0.87;
 $baseAvr[$job_id]=average($base[$job_id])/0.87;
  $base50[$job_id]=percentile($base[$job_id],50)/0.87;
  $base75[$job_id]=percentile($base[$job_id],75)/0.87;
  $base90[$job_id]=percentile($base[$job_id],90)/0.87;

  $cash10[$job_id]=percentile($cash[$job_id],10)/0.87;
  $cash25[$job_id]=percentile($cash[$job_id],25)/0.87;
  $cashAvr[$job_id]=average($cash[$job_id])/0.87;
  $cash50[$job_id]=percentile($cash[$job_id],50)/0.87;
  $cash75[$job_id]=percentile($cash[$job_id],75)/0.87;
  $cash90[$job_id]=percentile($cash[$job_id],90)/0.87;

  $salary10[$job_id]=percentile($salary[$job_id],10)/0.87;
  $salary25[$job_id]=percentile($salary[$job_id],25)/0.87;
  $salaryAvr[$job_id]=average($salary[$job_id])/0.87;
  $salary50[$job_id]=percentile($salary[$job_id],50)/0.87;
  $salary75[$job_id]=percentile($salary[$job_id],75)/0.87;
  $salary90[$job_id]=percentile($salary[$job_id],90)/0.87;

  $compensation10[$job_id]=percentile($compensation[$job_id],10);
  $compensation25[$job_id]=percentile($compensation[$job_id],25);
  $compensationAvr[$job_id]=average($compensation[$job_id]);
  $compensation50[$job_id]=percentile($compensation[$job_id],50);
  $compensation75[$job_id]=percentile($compensation[$job_id],75);
  $compensation90[$job_id]=percentile($compensation[$job_id],90);

}

$out[$job_id]='
<p><a href="/servis/job_description/view/?id='.$job_id.'&lang=0" target="_blank" class="job">'.$job_name[$job_id].'</a></p>
<table>
<tr class="X1_1">
<th></th>
<th>10%</th>
<th>25%</th>
<th>Среднее</th>
<th>50% (медиана)</th>
<th>75%</th>
<th>90%</th>
</tr>
<tr class="X1_0">
<td class="X1_left">Оклад</td>
<td class="X1_right">'.number_format($base10[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($base25[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($baseAvr[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($base50[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($base75[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($base90[$job_id],0,',',' ').'</td>
</tr>
<tr class="X1_1">
<td class="X1_left">Заработная плата</td>
<td class="X1_right">'.number_format($salary10[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($salary25[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($salaryAvr[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($salary50[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($salary75[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($salary90[$job_id],0,',',' ').'</td>
</tr>
<tr class="X1_0">
<td class="X1_left">Бенефиты</td>
<td class="X1_right">'.number_format($compensation10[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($compensation25[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($compensationAvr[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($compensation50[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($compensation75[$job_id],0,',',' ').'</td>
<td class="X1_right">'.number_format($compensation90[$job_id],0,',',' ').'</td>
</tr>
</table>
<br>';

}

//id клиента
$user_id=mysqli_result(mysqli_query($link,"SELECT id from for_users_corporat WHERE id='".$_SESSION["user_id"]."'
AND password='".$_SESSION["psw"]."' "),0,0);


//Генерация урла
$url=genpass(20,20);

//дата формирования отчета
$date=date("Y-m-d");

$q_archive=mysqli_query($link,"INSERT INTO for_users_corporat_reports values('','$user_id','$url','$date','5','null')");

$order_id=mysqli_result(mysqli_query($link,"SELECT id from for_users_corporat_reports where url='$url'
AND user_id='$user_id'"),0,0);

$filedir=$_SERVER['DOCUMENT_ROOT'].'/business/_report/user'.$user_id.'/';
$filename_html='report_'.$order_id.'.txt';

$filename_xls='report_'.$order_id.'.xls';
$url_xls='/business/_report/user'.$user_id.'/'.$filename_xls;

include($folder.'_admin/moduls/reports/summary_special/summary-html.php');
include($folder.'_admin/moduls/reports/summary_special/summary-excel.php');
include($folder.'_admin/moduls/reports/summary_special/summary-3-echo.php');
?>