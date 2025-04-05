<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

$user_id=mysqli_result(mysqli_query($link,"SELECT id from for_users_corporat where id = ".$_SESSION['admin_user_id']. " AND password = '".$_SESSION['admin_psw']."' AND levelaccess='1' "),0,0);

if(isset($_POST["job"])){
    $jobs_id_selected_string=$_POST["job"];
    $jobs_id_selected_array=implode(',',$jobs_id_selected_string);
    }

$city_id_selected_array=array();

if(isset($_POST["city"])){
    $city_id_selected_string=$_POST["city"];
    $city_id_selected_array=implode(',',$city_id_selected_string);
    }

?>

<script type="text/javascript" src="/_js/lists_4stat.js"></script>
<script type="text/javascript" src="http://www.iknowkungfoo.com/elements/js/jquery/jquery-1.2.6.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js" type="text/javascript"></script>
<script src="http://jquery-ui.googlecode.com/svn/tags/latest/external/bgiframe/jquery.bgiframe.min.js" type="text/javascript"></script>
<script src="http://jquery-ui.googlecode.com/svn/tags/latest/ui/minified/i18n/jquery-ui-i18n.min.js" type="text/javascript"></script>
<script src="/_js/jquery.form.js" type="text/javascript"></script> 

   

<table width="100%">

<!--Город -->
<tr>
    <td align="right" width="30%">Город</td>
<td align="left">
<form id="cities" method="post" action="">
 <input type="hidden" name="user" value="<?php echo $user_id; ?>">
<ul>

<?php
//проверяем, есть ли ограничение по должностям
$user=mysqli_query($link,"SELECT * from for_users_corporat where id = '".$_SESSION['admin_user_id']. "' AND password = '".$_SESSION['admin_psw']."' ");

if(mysqli_num_rows($user)=='1'){
$blocked_q=mysqli_query($link,"select city_id from for_users_corporat_cities where user_id='".$user_id."'");

//блокировка
if(mysqli_num_rows($blocked_q)!==0){
    while($row=mysqli_fetch_array($blocked_q)){
        $city_id[]=$row["city_id"];
    }
    $city_id_list=implode(',',$city_id);
    $q_block="AND id in(".$city_id_list.")";
}
else{
    $q_block="";
}

$q_city=mysqli_query($link,"SELECT * FROM base_regions where 1 ".$q_block." order by name");


while($out_city = mysqli_fetch_array($q_city)){
    $ch="";
    if(in_array($out_city["id"],$city_id_selected_array)){$ch="checked";}

    echo('<li><input type="checkbox" name="city[]" value="'.$out_city["id"].'" id="city_'.$out_city["id"].'" '.$ch.'><label for="city_'.$out_city["id"].'">'.$out_city["name"].'</label></li>');
}

}
?>
</ul>
<input type="submit" id="cities_submit" value="Выбрать должности" class="submit">
</form>
    <script type="text/javascript">
// готовим объект
var options_social = {
  target: "#jtypediv",
  url: "<?php echo($folder);?>_admin/moduls/statistics/lists_4stat/findJtype.php"

};

// передаем опции в  ajaxSubmit
$("#cities").ajaxForm(options_social);

var options1 = {
  target: "#result",
  url: "?page=statistics-job-types&step=2"

};

// передаем опции в  ajaxSubmit
$("#step1").ajaxForm(options1);


</script>
</td>
</tr>
</table>

<form method='post' action="?page=statistics-job-types&step=2" name="step1" id="step1">
    <table width="100%">
<!--Должностная группа-->
  <tr>
    <td align="right">Должностная группа</td>
    <td>
    <div id="jtypediv">
        <ol>
        <?php
        if (isset($jobs_id_selected_array) && isset($city_id_selected_array)){

//проверяем, есть ли ограничение по должностям
$blocked=mysqli_num_rows(mysqli_query($link,"select * from for_users_corporat_jobs where user_id='".$user_id."'"));

//блокировка
if($blocked!==0){
    $q_factor_job_block=mysqli_query($link,"SELECT job_id FROM for_users_corporat_jobs where user_id='$user_id'");
    while($row=mysqli_fetch_array($q_factor_job_block)){
        $job_id_blocked[]=$row["job_id"];
    }

    $job_id_blocked_string=implode(',',$job_id_blocked);

    $factor_job_block="AND job_id in($job_id_blocked_string)";
    $factor_job_block_1="AND id in($job_id_blocked_string)";
}
else{
    $factor_job_block="";
    $factor_job_block_1="";
}

if($city_id==0){
  $city_q="";
} else {
    $jobs_q=mysqli_query($link,"SELECT job_id FROM base_company_jobs WHERE city_id in($city_id_selected_string) ".$factor_job_block);

    while($row=mysqli_fetch_array($jobs_q)){
        $job_id[]=$row["job_id"];
    }
    $jobs_array=implode(',',array_unique($job_id));

  $jtypes_q=mysqli_query($link,"SELECT jtype_id FROM base_job_types
                      WHERE job_id IN ($jobs_array)");
    while($row=mysqli_fetch_array($jtypes_q)){
        $jtype_id[]=$row["jtype_id"];
    }
    $jtypes_array=implode(',',array_unique($jtype_id));

  $city_q="WHERE id IN ($jtypes_array)";
}

//echo("SELECT * from base_jtype ".$city_q." order by name");

$q_jtype=mysqli_query($link,"SELECT * from base_jtype ".$city_q." order by name");
while($row=mysqli_fetch_array($q_jtype)){
    $jtype_id=$row["id"];
    $jtype_name=$row["name"];

    $q_jobs=mysqli_query($link,"select id,name from base_jobs
where id in(select job_id from base_job_types where jtype_id='$jtype_id') AND id in($jobs_array) ".$factor_job_block_." order by name");

        ?>
        <li><input type="checkbox" name="jtype[]" id="jtype_<?php echo $jtype_id ?>" value="<?php echo $jtype_id; ?>" onclick="jqCheckAll2(this.id,'div_jtype_<?php echo $jtype_id; ?>')"><b><?php echo $jtype_name; ?></b></li>
<div id="div_jtype_<?php echo $jtype_id; ?>" class="shift">
  <?php
while($out_jobs=mysqli_fetch_array($q_jobs)){
$job_id=$out_jobs["id"];

$ch="";
if(in_array($job_id,$jobs_id_selected_array)){$ch="checked";}

echo('<input type="checkbox" name="job[]" id="jobs_'.$job_id.'" value="'.$job_id.'" '.$ch.'><label for="jobs_'.$job_id.'" >'.$out_jobs["name"].'</label><br>');

  }
  ?>
</div>
        <?php
}

?>
   <input type="hidden" name="city" value='<?php echo $city_id_selected_string; ?>'>
<?php
        }
?>
        </ol>
    </div>
<div id="loading_jtype" style="display:none">  
     <img src="/_img/loader.gif" width="16" height="16" align="absmiddle">&nbsp;Загрузка...  
</div>
</td>
</tr>
<tr>
    <td>Дата для анализа</td>
    <td>
        <select name="date">
            <option value="0">текущие значения</option>
            <option value="2007">2007</option>
            <option value="2008">2008</option>
            <option value="2009">2009</option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
        </select>
    </td>
</tr>
<tr>
      <td align="right"><input type="checkbox" name="step[1]" value="1" checked></td>
      <td>Структура денежного вознаграждения » (без шкалированной оценки)</td>
  </tr>
  <tr>
      <td align="right"><input type="checkbox" name="step[12]" value="1"></td>
      <td>Структура денежного вознаграждения » (все таблицы)</td>
  </tr>
    <tr>
      <td align="right"><input type="checkbox" name="step[2]" value="1"></td>
      <td>Политика выплат »</td>
  </tr>
  <tr>
      <td align="right"><input type="checkbox" name="step[3]" value="1"></td>
      <td>Компенсационные и стимулирующие выплаты »</td>
  </tr>
  <tr>
      <td align="right"><input type="checkbox" name="step[4]" value="1"></td>
      <td>Премии »</td>
  </tr>
  <tr>
      <td align="right"><input type="checkbox" name="step[5]" value="1"></td>
      <td>Базовые компенсации (Питание / Транспорт / Связь) »</td>
  </tr>
  <tr>
      <td align="right"><input type="checkbox" name="step[6]" value="1"></td>
      <td>Командировочные расходы »</td>
  </tr>
  <tr>
      <td align="right"><input type="checkbox" name="step[7]" value="1"></td>
      <td>Кредитные практики и дисконтные программы »</td>
  </tr>
  <tr>
      <td align="right"><input type="checkbox" name="step[8]" value="1"></td>
      <td>Страхование, здоровье, спорт »</td>
  </tr>
  <tr>
      <td align="right"><input type="checkbox" name="step[9]" value="1"></td>
      <td>Обучение и развитие »</td>
  </tr>
  <tr>
      <td align="right"><input type="checkbox" name="step[10]" value="1"></td>
      <td>Отпуск »</td>
  </tr>
  <tr>
      <td align="right"><input type="checkbox" name="step[11]" value="1"></td>
      <td>Праздники »</td>
  </tr>
<tr>
    <td align="left"></td>
    <td align="right"><input type="submit" value="дальше &raquo;" class="submit"></td>
  </tr>
</table>
</form>

<div id="result"></div>