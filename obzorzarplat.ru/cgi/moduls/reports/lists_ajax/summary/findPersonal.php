<?php
header("Content-Type: text/html; charset=windows-1251");

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

$city_id=intval($_GET['city_id']);
$factor_id=$_GET["factor_id"];

//вычисл€ем id пользовател€
$session_id=mysqli_real_escape_string($link,$_COOKIE["user_number"]);
$user_id=mysqli_result(mysqli_query($link,"SELECT user_id FROM for_users_corporat_login WHERE session_id='".$session_id."'"),0,0);

if($city_id==0){
  echo("<p>Ќеобходимо сначала выбрать регион/город дл€ анализа</p>");
} else {
  $city_q="where id in(select personal_id from base_companies 
              where region_id='$city_id')";

$q_staff=mysqli_query($link,"SELECT id, title from base_personal ".$city_q." order by id");

?>

<select id="<?php echo $factor_id; ?>" name="factor_id" class="text_1 selectFactor">
  <option value="">не имеет значени€</option>
  <?php while($row=mysqli_fetch_array($q_staff)){
  echo('
  <option value="'.$row["id"].'">'.$row["title"].'</option>
  ');
  } 
  ?>
</select>
<?php } ?>