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
$function=$_GET["function"];

if($function=="jtype"){$onchange='getJtype('.$city_id.',"s",this.value)';}
elseif($function=="jgroup"){$onchange='getJgroup('.$city_id.',"s",this.value)';}

if($city_id==0){
  $city_q="where id in(select personal_id from base_companies)";
} else {
  $city_q="where id in(select personal_id from base_companies 
              where region_id='$city_id')";
}

$q_staff=mysqli_query($link,"SELECT * from base_personal ".$city_q." order by id");

?>

<select name='staff' class="text" onChange="getJtype('<?php echo $city_id;?>','s',this.value)">
  <option value="">--- Выбрать ---</option>
  <option value="0">не имеет значения</option>
  <?php
  while($row=mysqli_fetch_array($q_staff)){
  echo('
  <option value="'.$row["id"].'">'.$row["title"].'</option>
  ');
  } 
  ?>
</select>