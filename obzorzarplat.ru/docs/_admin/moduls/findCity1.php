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
//$job_id=mysqli_result(mysqli_query($link,"select id from base_jobs where name='$job'"),0,0);

//echo($job_id);

$q_city=mysqli_query($link,"select * from base_regions where id in(select city_id from base_company_jobs where job_id='$job_id')");
?>

<select name='regions' class="text" style="width:340px; height:20px;">
 
  <option>Все города</option>
  <? 
while($row=mysqli_fetch_array($q_city)){
  echo('
  <option>'.$row["name"].'</option>
  ');
  } 
  ?>
</select>