<?php
$folder='../../../../';

$host=implode("", file($folder.'/settings/mysql_host'));
$db=implode("", file($folder.'/settings/mysql_db'));
$user=implode("", file($folder.'/settings/mysql_user'));
$pass=implode("", file($folder.'/settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!){echo "ошибка подключения...";}

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

header("Content-Type: text/html; charset=windows-1251");

$Id=mysqli_real_escape_string($link,$_GET['Id']);
$user_id=mysqli_real_escape_string($link,$_GET['user_id']);

switch($Id){
case "sp":
  $function="onChange='getSphere(this.value)'";
  $factor_name="Сфера деятельности компании";
  $factor_prefix="sphere";
  break;

case "s":
  $function="onChange='getStaff(this.value)'";
  $factor_name="Штат компании";
  $factor_prefix="staff";
  break;

case "t":
  $function="onChange='getTurnover(this.value)'";
  $factor_name="Оборот компании, млн.руб. в год";
  $factor_prefix="turnover";
  break;

case "n":
  $function="";
  $factor_name="";
  $factor_prefix="";
  break;
}

?>

<table border="0" cellspacing="0" cellpadding="6">

<!--Город -->
<tr>
    <td align="right" width="30%">Город</td>
<td align="left">
<select id='city' name='city' class="text_1" <?=$function;?>>
<option value="">--- Выбрать ---</option>
<option value="0">Все города</option>
<option value="1">Санкт-Петербург</option>
<option value="">-------------------------</option>
<?php

$blocked=mysqli_num_rows(mysqli_query($link,"select * from for_users_corporat_cities where user_id='".$user_id."'"));

//блокировка для пользователей Лайта
if($blocked!==0){
    $q_block="AND id IN(SELECT city_id FROM for_users_corporat_cities where user_id='$user_id')";
}
else{
    $q_block="";
}

$q_city=mysqli_query($link,"SELECT * FROM base_regions where id in(select distinct city_id from base_company_jobs) ".$q_block." order by name");

$ch="";
while($out_city = mysqli_fetch_array($q_city))
{
if(($city_id<>'') and ($city_id==$out_city["id"])){$ch="selected";}
echo('<option value="'.$out_city["id"].'" '.$ch.'>'.$out_city["name"].'</option>');
$ch="";
}
?>
</select></td>
</tr>
<!--Выбранный фактор -->

<?php
if($Id!=="n")
{
echo('
  <tr>
    <td align="right">'.$factor_name.'</td>
    <td align="left">
    <div id="'.$factor_prefix.'div">
      <select name="'.$factor_prefix.'" id="'.$factor_prefix.'" class="text_1">
        <option value="">--- Выбрать ---</option>
        </select>
    </div>
<div id="loading" style="display:none">
     <img src="/_img/loader.gif" width="16" height="16" align="absmiddle">&nbsp;Загрузка...
</div>
</td>
</tr>
');
}
?>
</table>
    
 <input type="hidden" name="factor_prefix" value="<?php echo($factor_prefix);?>">

<script type="text/javascript">
function testform()
{
text="";
if(document.step1.city.value==""){text=text+'Город;\n';}
<?php
if($Id!=="n"){
echo('if(document.step1.'.$factor_prefix.'.value==""){text=text+\''.$factor_name.';\n\';}');
}
?>
if(text!=""){window.alert('Вы не выбрали:\n'+text);return false;}
else{
document.step1.action="?step=2";
document.step1.submit();
}
}
</script>