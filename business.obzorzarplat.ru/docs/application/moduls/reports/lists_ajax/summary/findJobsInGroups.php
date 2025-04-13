<?php
header("Content-Type: text/html; charset=windows-1251");

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

$city_id=intval($_POST['city_id']);
$factor=$_POST['factor'];
$factor_id=intval($_POST['factor_id']);

//должностная группа
$jtype_id=intval($_POST['jtype_id']);
$jtype_name=mysqli_result(mysqli_query($link,"SELECT name FROM base_jtype WHERE id='$jtype_id'"),0,0);



//если фактор не выбран или установлен в "не имеет значения", то это равносильно выбору фактора "Только регион"
if($factor_id=="0"){
    $factor="no_factor";
    $factor_id="0";
}
    //проводим расчеты выводим списки

//вычисляем id пользователя
$session_id=mysqli_real_escape_string($link,  $_COOKIE["user_number"]);
$user_id=mysqli_result(mysqli_query($link,"SELECT user_id FROM for_users_corporat_login WHERE session_id='".$session_id."'"),0,0);

//ограничение списка доступных должностей для пользователя
$blocked=mysqli_num_rows(mysqli_query($link,"select id from for_users_corporat_jobs where user_id='".$user_id."'"));

if($blocked!==0){
    $block_job_query=mysqli_query($link,"SELECT job_id FROM for_users_corporat_jobs where user_id='".$user_id."'");
    while($jobs=  mysqli_fetch_object($block_job_query)){
        $block_job_id[]=$jobs->job_id;
    }
    $block_job_string=implode(',',array_unique($block_job_id));

    mysqli_free_result($block_job_query);

    $block_job_subquery=" AND id IN(".$block_job_string.")";
    $block_jtype_subquery=" AND job_id IN(".$block_job_string.")";
}else{
    $block_job_subquery="";
    $block_jtype_subquery="";
}

//print_r($_POST);


//формируем запросы по должностям с учетом факторов
// костыль для Москвы
$tmpCity = $city_id;
/*
if ($city_id == "1435" || $city_id == "1479" || $city_id == "1516" || $city_id == "1463" || $city_id != "1423" || $city_id != "1454" || $city_id != "1521" || $city_id != "1585"  || $city_id != "1479" || $city_id != "1445" || $city_id != "1431") {
	$city_id = 1;
}
*/
$city_key = mysqli_result(mysqli_query($link,"select fake_summary from base_regions where id='$city_id'"),0,0);
    if ($city_key) $city_id = 1;

switch($factor){
    case "sphere":

    $factor_job_query="SELECT job_id FROM base_company_jobs WHERE company_id in (SELECT company_id FROM `base_company_sphere` WHERE sphere_id='$factor_id') AND city_id='$city_id'";
    break;

case "personal":

    $factor_job_query="SELECT job_id FROM base_company_jobs
                    WHERE company_id in(
                        SELECT id FROM base_companies WHERE personal_id='$factor_id')
            AND city_id='$city_id'";
    break;

case "turnover":

    $factor_job_query="SELECT job_id FROM base_company_jobs
                    WHERE company_id in(
                        SELECT id FROM base_companies WHERE turnover_id='$factor_id')
            AND city_id='$city_id'";
    break;

case "no_factor":
    $factor_job_query="SELECT job_id FROM base_company_jobs WHERE city_id='$city_id'";
    break;
}

//$city_id = $tmpCity;
 
//формировнаие строки из id должностей
$factor_job_result=mysqli_query($link, $factor_job_query);
while ($jobs = mysqli_fetch_object($factor_job_result)) {
        $factor_job_id[]=$jobs->job_id;
    }
    //строка из массива job_id
    $factor_job_string=implode(',',array_unique($factor_job_id));


//вывод должностей
    $jobs_query=mysqli_query($link,"SELECT id,name FROM base_jobs WHERE id IN(".$factor_job_string.") ".$block_job_subquery." AND id IN(SELECT job_id FROM base_job_types WHERE jtype_id='".$jtype_id."') order by name");

?>
<p><b><?php echo $jtype_name; ?></b></p>
<p><input type="checkbox" name="checkAllAuto_<?php echo $jtype_id; ?>" class="checkAllAuto"/>Выбрать все</p>
<div class="shift_right">
<?php while($out_jobs = mysqli_fetch_object($jobs_query)){ ?>
<input type="checkbox" name="job[]" id="<?php echo $out_jobs->id; ?>" value="<?php echo $out_jobs->id; ?>">
    <label for="<?php echo $out_jobs->id; ?>"><?php echo $out_jobs->name; ?></label><br>

<?php } ?>
</div><!--shift_right-end-->