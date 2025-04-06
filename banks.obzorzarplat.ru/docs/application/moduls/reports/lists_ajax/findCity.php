<?php
header("Content-Type: text/html; charset=Windows-1251");

$job_id=intval($_GET['job_id']);

//вычисляем id пользователя
$session_id=mysqli_real_escape_string($link,$_COOKIE["user_number"]);
$user_id=mysqli_result(mysqli_query($link,"SELECT user_id FROM for_users_corporat_login WHERE session_id='".$session_id."'"),0,0);


//блокировка по доступным городам для клиентов (если есть)

$blocked=mysqli_num_rows(mysqli_query($link,"select id from for_users_corporat_cities where user_id='".$user_id."'"));

if($blocked!=0){
    $q_block="id IN(SELECT city_id FROM for_users_corporat_cities where user_id='$user_id')";
}else{
    $q_block="1";
}

$q_city=mysqli_query($link,"SELECT id,name FROM base_regions where ".$q_block." order by name");

if(mysqli_num_rows($q_city)>0){
?>

<select name='city' class="text_1" id="city">
    <option value="1">Санкт-Петербург</option>
    <option value="0">---------------------------</option>
  <?php
while($row=mysqli_fetch_array($q_city)){
  echo('<option value="'.$row["id"].'">'.$row["name"].'</option>');
} 
  ?>
</select>
<?php
}
?>