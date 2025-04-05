<?php
header("Content-Type: text/html; charset=windows-1251");

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

$city_id=intval($_GET['city_id']);
$factor_id=$_GET["factor_id"];

//вычисляем id пользователя
$session_id=mysqli_real_escape_string($link,$_COOKIE["user_number"]);
$user_id=mysqli_result(mysqli_query($link,"SELECT user_id FROM for_users_corporat_login WHERE session_id='".$session_id."'"),0,0);

if($factor_id=='sphere'){

$q_companies=mysqli_query($link,'SELECT company_id
FROM base_company_jobs
WHERE city_id = "'.$city_id.'"');
  while($row=mysqli_fetch_array($q_companies)){
    $companies[]=$row["company_id"];
}
$companies_string=implode(',',$companies);

$q_sphere=mysqli_query($link,"SELECT id,name from base_sphere
where id in(select sphere_id from base_company_sphere
where company_id in(".$companies_string.")) order by name");

?>

<select id="<?php echo $factor_id; ?>" name="factor_id" class="text_1 selectFactor">
  <option value="">--- Выбрать ---</option>
  <?php 
  while($row=mysqli_fetch_array($q_sphere)){
  echo('
  <option value="'.$row["id"].'">'.$row["name"].'</option>
  ');
  } 
  ?>
</select>

<?php
}else{
    echo "<p>Произошла ошибка, команда проекта работает над ее исправлением. Приносим извинения за доставленные неудобства.</p>";
}
?>