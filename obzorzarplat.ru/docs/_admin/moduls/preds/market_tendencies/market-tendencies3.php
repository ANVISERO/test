<?
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

include($folder.'_admin/moduls/funcs.php');

$city_id=intval($_POST['city']);
$jtype_id=intval($_POST['jtype']);
$job=$_POST['job'];
$period=$_POST['period'];

$period_now="2009 2 квартал";

//Название города
if($city_id==0){
$city_name="Все города";
}else{
$city_name=mysqli_result(mysqli_query($link,"select name from base_regions where id='$city_id'"),0,0);
}

$color=1;

foreach($job as $job_id){

  $factor_name="Выбранный период для сравнения:";
  $factor_value_name=$period;

   if($city_id==0){
  $query[$job_id]="SELECT * FROM base_people where job_id='$job_id' 
  AND company_id in(select company_id from base_company_jobs
  WHERE job_id='$job_id'
  AND quarter='$period')";
  
  $query_now[$job_id]="SELECT * FROM base_people where job_id='$job_id' 
  AND company_id in(select company_id from base_company_jobs
  WHERE job_id='$job_id'
  AND quarter='$period_now')";
  }else{
  $query[$job_id]="SELECT * FROM base_people where job_id='$job_id' 
  AND region_id='$city_id'
  AND company_id in(select company_id from base_company_jobs
  WHERE job_id='$job_id'
  AND quarter='$period')";
  
  $query_now[$job_id]="SELECT * FROM base_people where job_id='$job_id' 
  AND region_id='$city_id'
  AND company_id in(select company_id from base_company_jobs
  WHERE job_id='$job_id'
  AND quarter='$period_now')";
  }

$job_name=mysqli_result(mysqli_query($link,"select name from base_jobs where id='$job_id'"),0,0);

$q_people=mysqli_query($link,$query[$job_id]);
$q_people_now=mysqli_query($link,$query_now[$job_id]); //за текущий период

while ($row=mysqli_fetch_array($q_people) OR $row_now=mysqli_fetch_array($q_people_now)){
  $people_id[$job_id][]=$row["id"];
  $company_id[$job_id][]=$row["company_id"];
  $base[$job_id][]=$row["official_salary"];
  $add[$job_id][]=$row["add_payment"];
  $bonus[$job_id][]=$row["bonus"];
  $premium[$job_id][]=$row["premium"];
  $compensation[$job_id][]=$row["compensation"];
  $payment_id[$job_id][]=$row["payment_id"];
  $period_id[$job_id][]=$row["period_id"];
  
  $people_id_now[$job_id][]=$row_now["id"];
  $company_id_now[$job_id][]=$row_now["company_id"];
  $base_now[$job_id][]=$row_now["official_salary"];
  $add_now[$job_id][]=$row_now["add_payment"];
  $bonus_now[$job_id][]=$row_now["bonus"];
  $premium_now[$job_id][]=$row_now["premium"];
  $compensation_now[$job_id][]=$row_now["compensation"];
  $payment_id_now[$job_id][]=$row_now["payment_id"];
  $period_id_now[$job_id][]=$row_now["period_id"];
}

//echo $job_id.'<br>';

for($i=0;$i<count($people_id[$job_id]);$i++){
  if($base[$job_id][$i]>0){
    $salary[$job_id][$i]=$base[$job_id][$i]+$add[$job_id][$i]+$bonus[$job_id][$i]+$premium[$job_id][$i];
     $cash[$job_id][$i]=$salary[$job_id][$i]+$compensation[$job_id][$i];
  }
}

for($i=0;$i<count($people_id_now[$job_id]);$i++){
  if($base_now[$job_id][$i]>0){
    $salary_now[$job_id][$i]=$base_now[$job_id][$i]+$add_now[$job_id][$i]+$bonus_now[$job_id][$i]+$premium_now[$job_id][$i];
     $cash_now[$job_id][$i]=$salary_now[$job_id][$i]+$compensation_now[$job_id][$i];
  }
}


if(average($cash[$job_id])==0){
  $cashAvr="-";
  $salaryAvr="-";
}else{
  $cashAvr=average($cash[$job_id]);
  $salaryAvr=average($salary[$job_id]);
}

if(average($cash_now[$job_id])==0){
  $cashAvr_now="-";
  $salaryAvr_now="-";
}else{
  $cashAvr_now=average($cash_now[$job_id]);
  $salaryAvr_now=average($salary_now[$job_id]);
}



$out[$job_id]='
<tr class="X1_lite_'.$color.'">
<td class="X1_left_lite">'.$job_name.'</td>
<td class="X1_right_lite" align="center">'.$salaryAvr.'</td>
<td class="X1_right_lite" align="center">'.$salaryAvr_now.'</td>
<td class="X1_right_lite" align="center">'.$cashAvr.'</td>
<td class="X1_right_lite" align="center">'.$cashAvr_now.'</td>
</tr>';

$color=1-$color;

}

include($folder.'_admin/moduls/preds/market_tendencies/market-tendencies3-echo.php');
?>