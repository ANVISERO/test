<?php
$folder="../../../";

$host=implode("", file($folder.'settings/mysql_host'));
$db=implode("", file($folder.'settings/mysql_db'));
$user=implode("", file($folder.'settings/mysql_user'));
$pass=implode("", file($folder.'settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!){echo "fuck!";}

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

header("Content-Type: text/html; charset=windows-1251");

$job_id=intval($_GET['job']);
$city_id=intval($_GET['city']);


if($city_id==0)
{
$q_companies=mysqli_query($link,'SELECT company_id
FROM base_company_jobs
WHERE job_id = "'.$job_id.'"');
}else{
$q_companies=mysqli_query($link,'SELECT company_id
FROM base_company_jobs
WHERE city_id = "'.$city_id.'"
AND job_id = "'.$job_id.'"');
}

while($row=mysqli_fetch_array($q_companies)){
    $companies[]=$row["company_id"];
}
$companies_string=implode(',',$companies);

$q_sphere=mysqli_query($link,"SELECT * from base_sphere
where id in(select sphere_id from base_company_sphere
where company_id in(".$companies_string.")) order by name");
?>

<select name='sphere' class="text_1" onChange='getStaff(<?=$job_id;?>,<?=$city_id?>,this.value)'>
  <option value="">--- ������� ---</option>
  <option value="0">�� ����� ��������</option>
  <?php while($row=mysqli_fetch_array($q_sphere)){
  echo('
  <option value="'.$row["id"].'">'.$row["name"].'</option>
  ');
  echo $row["name"];
  } 
  ?>
</select>