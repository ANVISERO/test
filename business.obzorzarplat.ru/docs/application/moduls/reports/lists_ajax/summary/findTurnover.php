<?php
header("Content-Type: text/html; charset=windows-1251");

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

$city_id=intval($_GET['city_id']);
$factor_id=$_GET["factor_id"];

//вычисл€ем id пользовател€
$session_id=mysqli_real_escape_string($link,  $_COOKIE["user_number"]);
$user_id=mysqli_result(mysqli_query($link,"SELECT user_id FROM for_users_corporat_login WHERE session_id='".$session_id."'"),0,0);

// костыль дл€ ћосквы
//$aFakedCities = Array("0", "1435", "1479", "1516", "1463", "1423", "1454", "1521", "1585","1479", "1445", "1597", "1431");
//if(in_array($aFakedCities, $city_id))$city_id = 1;
//if ($city_id == 1435 || $city_id == 1479 || $city_id == 1516 || $city_id == 1463  || $city_id == 1423 || $city_id == 1454 || $city_id == "1521" || $city_id == "1585"  || $city_id == "1479" || $city_id == "1445" || $city_id == "1597") $city_id = 1;
$city_key = mysqli_result(mysqli_query($link,"select fake_summary from base_regions where id='$city_id'"),0,0);
    if ($city_key) $city_id = 1;

if($city_id==0){
  echo("<p>Ќеобходимо сначала выбрать регион/город дл€ анализа</p>");
} else {
  $city_q="where id in(select turnover_id from base_companies where region_id='$city_id')";

  $q_turnover=mysqli_query($link,"SELECT id,title from base_turnover ".$city_q,$link);

?>

<select id="<?php echo $factor_id; ?>" name="factor_id" class="text_1 selectFactor">
  <option value="">не имеет значени€</option>
  <?php
while($row=mysqli_fetch_array($q_turnover)){
  echo('
  <option value="'.$row["id"].'">'.$row["title"].'</option>
  ');
  }
 
  ?>
</select>
<?php } ?>