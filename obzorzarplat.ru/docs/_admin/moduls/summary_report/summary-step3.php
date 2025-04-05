<?
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

include($folder.'_admin/moduls/funcs.php');

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
  $factor_name="Оборот компании:";  
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

if(min($cash[$job_id])>0){
  $cashMIN=number_format(min($cash[$job_id]),0,',',' ');
  $salaryMIN=number_format(min($salary[$job_id]),0,',',' ');
  }else{
  $cashMIN="-";
  $salaryMIN="-";
  }

if(average($cash[$job_id])==0){
  $cash25="-";
  $cashAvr="-";
  $cash50="-";
  $cash75="-";
  $cashMAX="-";
  
  $salary25="-";
  $salaryAvr="-";
  $salary50="-";
  $salary75="-";
  $salaryMAX="-";
}else{
  $cash25=percentile($cash[$job_id],25);
  $cashAvr=average($cash[$job_id]);
  $cash50=percentile($cash[$job_id],50);
  $cash75=percentile($cash[$job_id],75);
  $cashMAX=number_format(max($cash[$job_id]),0,',',' ');
  
  $salary25=percentile($salary[$job_id],25);
  $salaryAvr=average($salary[$job_id]);
  $salary50=percentile($salary[$job_id],50);
  $salary75=percentile($salary[$job_id],75);
  $salaryMAX=number_format(max($salary[$job_id]),0,',',' ');
}

$out_cash[$job_id]='
<tr class="X1_lite_'.$color.'">
<td class="X1_left_lite">'.$job_name.'</td>
<td class="X1_right_lite">'.$cashMIN.'</td>
<td class="X1_right_lite">'.$cash25.'</td>
<td class="X1_right_lite">'.$cashAvr.'</td>
<td class="X1_right_lite">'.$cash50.'</td>
<td class="X1_right_lite">'.$cash75.'</td>
<td class="X1_right_lite">'.$cashMAX.'</td>
</tr>';

$out_salary[$job_id]='
<tr class="X1_lite_'.$color.'">
<td class="X1_left_lite">'.$job_name.'</td>
<td class="X1_right_lite">'.$salaryMIN.'</td>
<td class="X1_right_lite">'.$salary25.'</td>
<td class="X1_right_lite">'.$salaryAvr.'</td>
<td class="X1_right_lite">'.$salary50.'</td>
<td class="X1_right_lite">'.$salary75.'</td>
<td class="X1_right_lite">'.$salaryMAX.'</td>
</tr>';

$color=1-$color;

}

include($folder.'_admin/moduls/summary_report/summary-step3-echo.php');
?>