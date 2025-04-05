<?php
$host=implode("", file('../../../settings/mysql_host'));
$db=implode("", file('../../../settings/mysql_db'));
$user=implode("", file('../../../settings/mysql_user'));
$pass=implode("", file('../../../settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!){echo "fuck!";}

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

header("Content-Type: text/html; charset=windows-1251");

$city_id=intval($_GET['city']);
$factor=$_GET['factor'];
$factor_id=intval($_GET['factorId']);
$jtype_id=intval($_GET['jtypeId']);
  
if($city_id==0){
  $city_q="";
} else {
  $city_q="AND city_id='$city_id'";
}

if($jtype_id==0){
  $jtype_q="";
} else {
  $jtype_q="AND id in(select job_id from base_job_types where jtype_id='$jtype_id')";
}

switch($factor){

case "n":
    if($city_id==0){
       $q_factor="";
    }else{
        $q_factor="WHERE id in(SELECT jobs_group_id FROM base_jobs
                      WHERE id IN(select job_id FROM base_company_jobs where city_id='$city_id'))";
    }
    break;

case "sp":
  if($city_id==0){
    $q_factor="WHERE id IN (SELECT jobs_group_id FROM base_jobs
                      WHERE id IN (SELECT job_id FROM base_company_jobs bcj
                      inner JOIN `base_company_sphere` bcs ON bcj.company_id = bcs.company_id 
                      WHERE  bcs.sphere_id ='$factor_id') ".$jtype_q.")";
  }else{
    $q_factor="WHERE id IN (SELECT jobs_group_id FROM base_jobs
                      WHERE id IN (SELECT job_id FROM base_company_jobs bcj
                      inner JOIN `base_company_sphere` bcs ON bcj.company_id = bcs.company_id 
                      WHERE  bcs.sphere_id ='$factor_id'
                      AND bcj.city_id='$city_id') ".$jtype_q.")";
  }
  break;

case "s":
  if($city_id==0){
    $q_factor="WHERE id IN (SELECT jobs_group_id FROM base_jobs
                      WHERE id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id 
                      WHERE  bc.personal_id ='$factor_id') ".$jtype_q.")";
  }else{
    $q_factor="WHERE id IN (SELECT jobs_group_id FROM base_jobs
                      WHERE id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id 
                      WHERE  bc.personal_id ='$factor_id'
                      AND bc.region_id='$city_id') ".$jtype_q.")";
  }
  break;

case "t":
  if($city_id==0){
    $q_factor="WHERE id IN (SELECT jobs_group_id FROM base_jobs
                      WHERE id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id 
                      WHERE  bc.turnover_id ='$factor_id') ".$jtype_q.")";
  }else{
    $q_factor="WHERE id IN (SELECT jobs_group_id FROM base_jobs
                      WHERE id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id 
                      WHERE  bc.turnover_id ='$factor_id'
                      AND bc.region_id='$city_id') ".$jtype_q.")";
  }
  break;
}

$q_jgroup=mysqli_query($link,"SELECT * from base_jobs_groups ".$q_factor." order by name");

//echo "SELECT * from base_jobs_groups ".$q_factor." order by name";
//$q_jtype=mysqli_query($link,"SELECT * from base_jtype order by name");

//echo "SELECT * from base_jtype ".$q_factor." order by name";
?>

<?
/*
echo('city_id='.$city_id.';');
echo('factor='.$factor.';');
echo('factor_id='.$factor_id.';');
echo('jtype_id='.$jtype_id.';');
 *
 */
?>

<select name='jgroup' class="text">
  <option value="">--- Выбрать ---</option>
  <option value="0">не имеет значения</option>
  <?php while($row=mysqli_fetch_array($q_jgroup)){
  echo('<option value="'.$row["id"].'">'.$row["name"].'</option>');
  } 
  ?>
</select>