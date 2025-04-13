<?php
//string of cities IDs (city_id[1],city_id[2],...)
$city_id=intval($_POST['city_id']);
//$city_id_string=implode(',',$city_id);

$factor=$_POST['factor'];
$factor_id=intval($_POST['factor_id']);

//если фактор не выбран или установлен в "не имеет значени€", то это равносильно выбору фактора "“олько регион"
if($factor_id=="0"){
    $factor="no_factor";
    $factor_id="0";
}

//если не выбран регион, то просим это сделать
if($city_id=="0" || $city_id==""){
    echo "<p>ƒл€ получени€ списка должностей необходимо выбрать фактор дл€ анализа и нажать на кнопку <b>¬ыбрать должности &raquo;</b></p>";
}else{
    //проводим расчеты выводим списки

$lists=$_POST["lists"]; //вывод списка должностей или списка должностных групп

//вычисл€ем id пользовател€
$session_id=mysqli_real_escape_string($link,  $_COOKIE["user_number"]);
$user_id=mysqli_result(mysqli_query($link,"SELECT user_id FROM for_users_corporat_login WHERE session_id='".$session_id."'"),0,0);

//ограничение списка доступных должностей дл€ пользовател€
$blocked=mysqli_num_rows(mysqli_query($link,"select job_id from for_users_corporat_jobs where user_id='".$user_id."'"));

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


//формируем запросы по должност€м с учетом факторов
// и ставим костыль дл€ ћосквы 
$city_key = mysqli_result(mysqli_query($link,"select fake_summary from base_regions where id='$city_id'"),0,0);

if (!$city_key) {
	switch($factor){
    	case "sphere":
    			$factor_job_query="SELECT job_id FROM base_company_jobs	WHERE company_id in (SELECT company_id FROM base_company_sphere WHERE sphere_id='$factor_id') AND city_id='$city_id'";
    	break;

		case "personal":

			    $factor_job_query="SELECT job_id FROM base_company_jobs WHERE company_id in
	                   (SELECT id FROM base_companies WHERE personal_id='$factor_id')
          	  		    AND city_id='$city_id'";
    	break;

		case "turnover":

    			$factor_job_query="SELECT job_id FROM base_company_jobs WHERE company_id in
	                   (SELECT id FROM base_companies WHERE turnover_id='$factor_id')
                        AND city_id='$city_id'";
    	break;

		case "no_factor":
		// тут срочный костыль дл€ ћосквы, выводим должности ѕитера с коэф. ћосквы
				 $factor_job_query="SELECT job_id FROM base_company_jobs WHERE city_id='$city_id'";
	    break;
	}
} else {
	switch($factor){
    	case "sphere":

    			$factor_job_query="SELECT job_id FROM base_company_jobs	WHERE company_id in 
		               (SELECT company_id FROM base_company_sphere WHERE sphere_id='$factor_id')
                    	AND city_id='1'";
    	break;

		case "personal":

			    $factor_job_query="SELECT job_id FROM base_company_jobs WHERE company_id in 
	                   (SELECT id FROM base_companies WHERE personal_id='$factor_id')
          	  		    AND city_id='1'";
    	break;

		case "turnover":

    			$factor_job_query="SELECT job_id FROM base_company_jobs WHERE company_id in 
	                   (SELECT id FROM base_companies WHERE turnover_id='$factor_id')
                        AND city_id='1'";
    	break;

		case "no_factor":
				 $factor_job_query="SELECT job_id FROM base_company_jobs WHERE city_id='1'";
	    break;
	}	
}
//echo  $factor_job_query;
//формировнаие строки из id должностей
$factor_job_result=mysqli_query($link,$factor_job_query);
while ($jobs = mysqli_fetch_object($factor_job_result)) {
        $factor_job_id[]=$jobs->job_id;
    }
    //строка из массива job_id
    $factor_job_string=implode(',',array_unique($factor_job_id));


//вывод должностей без разбиени€ по группам
if($lists=='true'){
    $jobs_query=mysqli_query($link,"SELECT id,name FROM base_jobs WHERE id IN(".$factor_job_string.") ".$block_job_subquery." order by name");

?>

<p><input type="checkbox" name="checkAllAuto" class="checkAllAuto"/>¬ыбрать все</p>
<div class="shift_right">
<?php while($out_jobs = mysqli_fetch_object($jobs_query)){ ?>
<input type="checkbox" name="job[]" id="<?php echo $out_jobs->id; ?>" value="<?php echo $out_jobs->id; ?>">
    <label for="<?php echo $out_jobs->id; ?>"><?php echo $out_jobs->name; ?></label><br>

<?php } ?>
</div><!--shift_right-end-->

<?php 
}elseif($lists=='false'){
    //вывод должностных групп с учетом факторов
   $factor_jtype_result=mysqli_query($link,"SELECT jtype_id FROM base_job_types WHERE job_id IN(".$factor_job_string.") ".$block_jtype_subquery);
   while($jtype=mysqli_fetch_object($factor_jtype_result)){
        $factor_jtype_id[]=$jtype->jtype_id;
   }

   $factor_jtype_string=implode(',',array_unique($factor_jtype_id));
   $jtypes_query=  mysqli_query($link,"SELECT id,name FROM base_jtype WHERE id in(".$factor_jtype_string.") order by name");
?>

<ol id="jtypes">
<?php while($jtype=mysqli_fetch_object($jtypes_query)){ ?>
    <li>
        <div id="<?php echo $jtype->id; ?>">
            <p><a><?php echo $jtype->name; ?></a></p>
            <div></div>
        </div>
    </li>
<?php } ?>
</ol>
<?php 
    }
} //else-end ?>