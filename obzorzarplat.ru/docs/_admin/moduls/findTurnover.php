<?
$host=implode("", file('../settings/mysql_host'));
$db=implode("", file('../settings/mysql_db'));
$user=implode("", file('../settings/mysql_user'));
$pass=implode("", file('../settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!){echo "fuck!";}

header("Content-Type: text/html; charset=windows-1251");

$job_id=intval($_GET['job']);
$city_id=intval($_GET['city']);
$sphere_id=intval($_GET['sphere']);
$staff_id=intval($_GET['staff']);

if($city_id==0){
  $city_q="";
} else {
  $city_q="AND region_id='$city_id'";
}

if($staff_id==0){
  $staff_q="";
}else{
  $staff_q="AND personal_id='$staff_id'";
}

if($sphere_id==0){
  $sphere_q="";
}else{
  $sphere_q="AND id in(select company_id from base_company_sphere where sphere_id='$sphere_id')";
}

$turnover[1]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) from base_companies where turnover<200000000
AND id in(select company_id from base_company_jobs where job_id='$job_id')".$city_q.$sphere_q.$staff_q),0,0);

$turnover[2]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) from base_companies where turnover>=200000000 AND turnover<400000000
AND id in(select company_id from base_company_jobs where job_id='$job_id')".$city_q.$sphere_q.$staff_q),0,0);

$turnover[3]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) from base_companies where turnover>=400000000 AND turnover<800000000
AND id in(select company_id from base_company_jobs where job_id='$job_id')".$city_q.$sphere_q.$staff_q),0,0);

$turnover[4]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) from base_companies where turnover>=800000000 AND turnover<1600000000
AND id in(select company_id from base_company_jobs where job_id='$job_id')".$city_q.$sphere_q.$staff_q),0,0);

$turnover[5]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) from base_companies where turnover>=1600000000 AND turnover<3200000000
AND id in(select company_id from base_company_jobs where job_id='$job_id')".$city_q.$sphere_q.$staff_q),0,0);

$turnover[6]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) from base_companies where turnover>=3200000000
AND id in(select company_id from base_company_jobs where job_id='$job_id')".$city_q.$sphere_q.$staff_q),0,0);

?>

<select name='turnover' class="text_1">
  <option value="">--- Выбрать ---</option>
  <option value="0">не имеет значения</option>
  <? 
 if($turnover[1]>0){
    echo('<option value="1"><200</option>');
  }
  
  if($turnover[2]>0){
    echo('<option value="2">200 - 400</option>');
 }
 
  if($turnover[3]>0){
    echo('<option value="3">400 - 800</option>');
 }
 
 if($turnover[4]>0){
    echo('<option value="4">800 - 1 600</option>');
 }
 
 if($turnover[5]>0){
    echo('<option value="5">1 600 - 3 200</option>');
 }
 
 if($turnover[6]>0){
    echo('<option value="6">< 3 200</option>');
 }
 
  ?>
</select>