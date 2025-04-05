<?
$host=implode("", file('../../../settings/mysql_host'));
$db=implode("", file('../../../settings/mysql_db'));
$user=implode("", file('../../../settings/mysql_user'));
$pass=implode("", file('../../../settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!){echo "fuck!";}

header("Content-Type: text/html; charset=windows-1251");

$city_id=intval($_GET['city']);

if($city_id==0){
  $city_q="where id in(select turnover_id from base_companies)";
} else {
  $city_q="where id in(select turnover_id from base_companies where region_id='$city_id')";
}

$q_turnover=mysqli_query($link,"SELECT * from base_turnover ".$city_q);

?>

<select name='turnover' class="text" style="width:340px; height:20px;" onChange='getJtype(<?=$city_id;?>,"t",this.value)'>
  <option value="">--- Выбрать ---</option>
  <? 
while($row=mysqli_fetch_array($q_turnover)){
  echo('
  <option value="'.$row["id"].'">'.$row["title"].'</option>
  ');
  }
 
  ?>
</select>