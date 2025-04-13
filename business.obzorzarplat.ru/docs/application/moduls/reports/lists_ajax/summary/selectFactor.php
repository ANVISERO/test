<?php
header("Content-Type: text/html; charset=windows-1251");

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

//вычисляем id пользователя
$session_id=mysqli_real_escape_string($link,  $_COOKIE["user_number"]);
$user_id=mysqli_result(mysqli_query($link,"SELECT user_id FROM for_users_corporat_login WHERE session_id='".$session_id."'"),0,0);

$factor_id=mysqli_real_escape_string($link,  $_GET["factor_id"]);

$factor_name="";
$action="";

$factor_name=mysqli_result(mysqli_query($link,"SELECT name FROM base_factors WHERE value='$factor_id'"),0,0);

switch($factor_id){
case "sphere":
  $action="findSphere";
  break;

case "personal":
  $action="findPersonal";
  break;

case "turnover":
  $action="findTurnover";
  break;
}

?>

<table border="0" class="report_form">

<!--Город -->
<tr>
    <th width="35%">Город</th>
<td>
  <?php

$blocked=mysqli_num_rows(mysqli_query($link,"select * from for_users_corporat_cities where user_id='".$user_id."'"));

?>
    <select id='city_id' name='city_id' class="text_1">
        <?php /*<option value="">--- Выбрать ---</option>
        <option value="1">Санкт-Петербург</option>
	<option value="1435">Москва</option>
        <option value="">-------------------------</option>*/?>
<?php 
//блокировка для пользователей Лайта
if($blocked!=0){
    $q_block="AND id IN(SELECT city_id FROM for_users_corporat_cities where user_id='".$user_id."')";
}else{
    $q_block="";
}

$q_city=mysqli_query($link,"SELECT * FROM base_regions where (id in(select distinct city_id from base_company_jobs) OR id = 1597 OR id in (SELECT id from base_regions WHERE fake_summary = 1)) ".$q_block." order by name") OR die(mysqli_error($link));

$cyc_num = 1;
while($out_city = mysqli_fetch_array($q_city))
{
    if($cyc_num == 1) {
      $first_city = $out_city["id"];
    }
    echo('<option value="'.$out_city["id"].'">'.$out_city["name"].'</option>');
    $cyc_num++;
}
?>
</select></td>
</tr>
<?php if($factor_id!='no_factor'){ ?>
<tr>
    <th><?php echo $factor_name; ?></th>
    <td>
        <div id="<?php echo $factor_id; ?>selectFactorDiv">
        <select name="factor_id" class="text_1">
            <option value="">--- Выбрать ---</option>
        </select>
        </div>
    </td>
</tr>
<?php } ?>
</table>

<?php
//echo "SELECT * FROM base_regions where id in(select distinct city_id from base_company_jobs)
//    ".$q_block." order by name";
?>


<script type="text/javascript">
    $(document).ready(function() {
      $('#<?php echo $factor_id; ?>selectFactorDiv').empty().html('<img src="/_img/loader.gif"> Загрузка...');
          $.ajax({
              url:"/work/summary/<?php echo $action; ?>/",
              data:{user_id:"<?php echo $user_id; ?>",city_id:"<?=$first_city?>",factor_id:"<?php echo $factor_id; ?>"},
              dataType:"html",
              success:function(data){
                  $('#<?php echo $factor_id; ?>selectFactorDiv').html(data);
              },
              error:function(){
                  alert("error occured");
              }
          });
    });
    $("#city_id").live('change',function()
    {
        $('#<?php echo $factor_id; ?>selectFactorDiv').empty().html('<img src="/_img/loader.gif"> Загрузка...');
          $.ajax({
              url:"/work/summary/<?php echo $action; ?>/",
              data:{user_id:"<?php echo $user_id; ?>",city_id:this.value,factor_id:"<?php echo $factor_id; ?>"},
              dataType:"html",
              success:function(data){
                  $('#<?php echo $factor_id; ?>selectFactorDiv').html(data);
              },
              error:function(){
                  alert("error occured");
              }
          });
    });
</script>
