<?
$host=implode("", file('../../../../settings/mysql_host'));
$db=implode("", file('../../../../settings/mysql_db'));
$user=implode("", file('../../../../settings/mysql_user'));
$pass=implode("", file('../../../../settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!){echo "fuck!";}

header("Content-Type: text/html; charset=windows-1251");

$city_id=intval($_GET['city']);

if($city_id==0){
  $city_q="";
} else {
  $city_q="where city_id='$city_id'";
}

$q_sphere=mysqli_query($link,"SELECT distinct quarter from base_company_jobs ".$city_q." order by quarter");
?>

<select name='period' class="text" style="width:340px; height:20px;" >
  <option value="">--- Выбрать ---</option>
  <? while($row=mysqli_fetch_array($q_sphere)){
  echo('
  <option>'.$row["quarter"].'</option>
  ');
  } 
  ?>
</select>