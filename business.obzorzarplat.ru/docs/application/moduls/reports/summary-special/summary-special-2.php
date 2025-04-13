<?php
include($folder.'application/moduls/reports/funcs.php');

$city_id=intval($_POST['city_id']);
$job=$_POST['job'];
$factor=$_POST['factor'];
$factor_id=intval($_POST['factor_id']);
$year=$_POST['year'];

if(empty($_POST)){ ?>
    <p>Кажется, Вы не выбрали факторы для формирования отчета</p>
    <p align="right"><input type="button" value="Новый отчет &raquo;" class="submit" onclick="self.location.href='/work/summary/';"></p>
<?php
    }else{
    //Название города
if($city_id==0){
    $city_name="";
}else{
    $city_name=mysqli_result(mysqli_query($link,"select name from base_regions where id='$city_id'"),0,0);
}

$color=1;

foreach($job as $job_id){

switch($factor){
case "no_factor":
  $factor_name="Фактор не имеет значения";
  $factor_value_name="";

  if($city_id==0){
  // $query[$job_id]="SELECT * FROM archive_people where job_id='$job_id' and date like '$year%'";
   $query[$job_id]="SELECT * FROM archive_people a where a.job_id='$job_id' and DATE_FORMAT(a.date, '%Y') = '$year'";
  }else{
   //$query[$job_id]="SELECT * FROM archive_people where job_id='$job_id' and region_id='$city_id' and date like '$year%'";
   $query[$job_id]="SELECT * FROM archive_people a where a.job_id='$job_id' and a.region_id='$city_id' and DATE_FORMAT(a.date, '%Y') = '$year'";
  }
  break;

case "sphere":
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

case "turnover":
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

case "personal":
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

$q_people=mysqli_query($link$query[$job_id],$link);

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

// Оклад
$base[$job_id]=add_items($base[$job_id]);
$base_indexes[$job_id]=salary_indexes($base[$job_id]);

// Бонусы
$bonus[$job_id]=add_items($bonus[$job_id]);
$bonus_indexes[$job_id]=salary_indexes($bonus[$job_id]);

// Дополнительные выплаты
$add[$job_id]=add_items($add[$job_id]);
$add_indexes[$job_id]=salary_indexes($add[$job_id]);

// Премии
$premium[$job_id]=add_items($premium[$job_id]);
$premium_indexes[$job_id]=salary_indexes($premium[$job_id]);

//Компенсации
$compensation[$job_id]=add_items($compensation[$job_id]);
$compensation_indexes[$job_id]=salary_indexes($compensation[$job_id]);

for($i=0;$i<count($base[$job_id]);$i++){
  if($base[$job_id][$i]>0){
    $salary[$job_id][$i]=$base[$job_id][$i]+$add[$job_id][$i]+$bonus[$job_id][$i]+$premium[$job_id][$i];
     $cash[$job_id][$i]=$salary[$job_id][$i]+$compensation[$job_id][$i];
  }
}

$salary_indexes[$job_id]=salary_indexes($salary[$job_id]);
$cash_indexes[$job_id]=salary_indexes($cash[$job_id]);

$out_cash[$job_id]='
<tr>
<td class="left"><a href="/servis/job_description/view/?id='.$job_id.'&lang=0" target="_blank" class="job">'.$job_name[$job_id].'</a></td>
<td>'.$cash_indexes[$job_id][0].'</td>
<td>'.$cash_indexes[$job_id][1].'</td>
<td>'.$cash_indexes[$job_id][2].'</td>
<td>'.$cash_indexes[$job_id][3].'</td>
<td>'.$cash_indexes[$job_id][4].'</td>
<td>'.$cash_indexes[$job_id][5].'</td>
</tr>';

$out_salary[$job_id]='
<tr>
<td class="left"><a href="/servis/job_description/view/?id='.$job_id.'&lang=0" target="_blank" class="job">'.$job_name[$job_id].'</a></th>
<td>'.$salary_indexes[$job_id][0].'</td>
<td>'.$salary_indexes[$job_id][1].'</td>
<td>'.$salary_indexes[$job_id][2].'</td>
<td>'.$salary_indexes[$job_id][3].'</td>
<td>'.$salary_indexes[$job_id][4].'</td>
<td>'.$salary_indexes[$job_id][5].'</td>
</tr>';

$out_base[$job_id]='
<tr>
<td class="left"><a href="/servis/job_description/view/?id='.$job_id.'&lang=0" target="_blank" class="job">'.$job_name[$job_id].'</a></td>
<td>'.$base_indexes[$job_id][0].'</td>
<td>'.$base_indexes[$job_id][1].'</td>
<td>'.$base_indexes[$job_id][2].'</td>
<td>'.$base_indexes[$job_id][3].'</td>
<td>'.$base_indexes[$job_id][4].'</td>
<td>'.$base_indexes[$job_id][5].'</td>
</tr>';

$out_premium[$job_id]='
<tr>
<td class="left"><a href="/servis/job_description/view/?id='.$job_id.'&lang=0" target="_blank" class="job">'.$job_name[$job_id].'</a></td>
<td>'.$premium_indexes[$job_id][0].'</td>
<td>'.$premium_indexes[$job_id][1].'</td>
<td>'.$premium_indexes[$job_id][2].'</td>
<td>'.$premium_indexes[$job_id][3].'</td>
<td>'.$premium_indexes[$job_id][4].'</td>
<td>'.$premium_indexes[$job_id][5].'</td>
</tr>';

$out_bonus[$job_id]='
<tr>
<td class="left"><a href="/servis/job_description/view/?id='.$job_id.'&lang=0" target="_blank" class="job">'.$job_name[$job_id].'</a></td>
<td>'.$bonus_indexes[$job_id][0].'</td>
<td>'.$bonus_indexes[$job_id][1].'</td>
<td>'.$bonus_indexes[$job_id][2].'</td>
<td>'.$bonus_indexes[$job_id][3].'</td>
<td>'.$bonus_indexes[$job_id][4].'</td>
<td>'.$bonus_indexes[$job_id][5].'</td>
</tr>';

$out_compensation[$job_id]='
<tr>
<td class="left"><a href="/servis/job_description/view/?id='.$job_id.'&lang=0" target="_blank" class="job">'.$job_name[$job_id].'</a></td>
<td>'.$compensation_indexes[$job_id][0].'</td>
<td>'.$compensation_indexes[$job_id][1].'</td>
<td>'.$compensation_indexes[$job_id][2].'</td>
<td>'.$compensation_indexes[$job_id][3].'</td>
<td>'.$compensation_indexes[$job_id][4].'</td>
<td>'.$compensation_indexes[$job_id][5].'</td>
</tr>';

}

//id клиента
$user_id=mysqli_result(mysqli_query($link,"SELECT id from for_users_corporat WHERE id=(
    SELECT user_id FROM for_users_corporat_login where session_id='".$_SESSION["user_number"]."') "),0,0);

//Генерация урла
$url=genpass(20,20);

//дата формирования отчета
$date=date("Y-m-d");

$q_archive=mysqli_query($link,"INSERT INTO for_users_corporat_reports values(0,'$user_id','$url','$date','5','null','$city_id')");

$order_id=mysqli_result(mysqli_query($link,"SELECT id from for_users_corporat_reports where url='$url'
AND user_id='$user_id'"),0,0);

$filedir=$_SERVER['DOCUMENT_ROOT'].'/_report/user'.$user_id.'/';
$filename_html='report_'.$order_id.'.txt';

$filename_xls='report_'.$order_id.'.xls';
$url_xls='/_report/user'.$user_id.'/'.$filename_xls;

if(!is_dir($filedir)) {
    mkdir($filedir, 0755, true);
}

include($folder.'application/moduls/reports/summary-special/summary-special-html.php');
include($folder.'application/moduls/reports/summary-special/summary-special-excel.php');
include($folder.'application/moduls/reports/summary-special/summary-special-2-echo.php');
}
?>