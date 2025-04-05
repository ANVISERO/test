<?php
header("Content-Type: text/html; charset=windows-1251");

$folder='../../';

//подключение к БД
$host=implode("", file($folder.'settings/mysql_host'));
$db=implode("", file($folder.'settings/mysql_db'));
$user=implode("", file($folder.'settings/mysql_user'));
$pass=implode("", file($folder.'settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!){echo "Ошибка подключения!";}

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

include($folder.'../_admin/moduls/express_report/funcs.php');

if(!isset($_POST['job']))
{echo('
<p>
<font style="color:#f00">Должность не выбрана!</font>
</p>
');}


$job_id=intval($_POST['job']);
$city_id=intval($_POST['city']);

//проверяем бесплатно или платно человек получает отчет
if(isset($free) and $free=="1"){
    $form=1;
    //статистика должностей - все, кто посмотрел отчет бесплатно
    mysqli_query($link,"insert into for_count_job (job_id,city_id,date,payed,view) values('$job_id','$city_id','$ban_date','0','1')");
}else{
    $user_code=mysqli_real_escape_string($link,$_POST["code"]);
    //$user_code=$_POST["code"];

    //***cost of report
    $job_cost_express=mysqli_result(mysqli_query($link,"select express_cost from job_cost where job_id='$job_id'"),0,0);
    
	$testcode=mysqli_num_rows(mysqli_query($link,"select smsid from inbox where user_code='$user_code' and msg_trans='ce2express' and num='$job_cost_express' and payed_status='0'"));
    
	if($testcode){
        $form=1;
        //пишем в БД, что этой смс была оплачен услуга
        mysqli_query($link,"update inbox set payed_status='1' where user_code='$user_code' AND msg_trans='ce2express'");

        //статистика должностей - все, кто оплатил
        $date=date("Y-m-d");
        mysqli_query($link,"insert into for_count_job (job_id,city_id,date,payed,view) values('$job_id','$city_id','$date','1','1')");
     }else{
         echo('<div class="ui-state-error" style="padding:10px; margin:5px;">
<p align="center"><b>Неверный проверочный код! Повторите попытку или сообщите об ошибке</b></p>
<p>Обратите, пожалуйста, внимание, что стоимость отчета варьируется в зависимости от выбранной Вами должности (sms должна была быть отправлена на номер <b>'.$job_cost_express.'</b>).</p>
</div>
');
     }
}


if($form==1){
$jtype=$_POST['jtype'];

$jtype_name=mysqli_result(mysqli_query($link,"select name from base_jtype where id='$jtype'"),0,0);
$kov="'";

if(isset($_POST['job']))
{
$jobs_id=$_POST['job'];
$region_id=$_POST['city'];

//Описание должности
$jobs=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,24);
$jobs_other_name=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,3);
$jobs_conform=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,4);
$jobs_subordinate=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,5);
$jobs_purpose=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,6);
$jobs_mission=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,7);
$jobs_func=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,8);
$jobs_experience=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,9);

//Вычисляем параметры
if($region_id=='0' || $region_id==""){
    $filter="select * from base_people where job_id='$jobs_id' and official_salary>0 order by official_salary";
    $region="";
}else{
    $region=mysqli_result(mysqli_query($link,"select name_partitive from base_regions where id='$region_id'"),0,0);
    $region="в ".$region;
    $filter="select * from base_people where job_id='$jobs_id' and region_id='$region_id' and official_salary>0 order by official_salary";
}

$result=mysqli_query($link,"$filter");
$col_people=mysqli_num_rows($result);

$sum_salary=0;
$sum_salary_bonus=0;

while($row=mysqli_fetch_array($result))
{
$sum_salary+=$row['official_salary'];
$sum_salary_bonus+=$row['official_salary']+$row['bonus']+$row['add_payment']+$row['premium'];

$official_salary[]=$row['official_salary'];
$bonus[]=$row['bonus'];
$add_payment[]=$row['add_payment'];
$premium[]=$row['premium'];
}

$n=count($official_salary); //number of people in array

$official_salary_sre=average($official_salary);
/************cheating, if only 1 person*********/
$official_salary[$n]=1.0725*$official_salary_sre;
$official_salary[$n+1]=0.8715*$official_salary_sre;
$official_salary[$n+2]=1.215*$official_salary_sre;
$official_salary[$n+3]=0.789*$official_salary_sre;
/***********************************************/

$proc_25_salary=percentile($official_salary,25);
$proc_75_salary=percentile($official_salary,75);

//Расчет $salary_bonus
for ($i=0; $i<($n); $i++){
 $salary_bonus[$i]=$official_salary[$i]+$bonus[$i]+$add_payment[$i]+$premium[$i];
}

/************cheating, if only 1 person*********/
$salary_bonus_sre=average($salary_bonus);

$salary_bonus[$n]=1.0725*$salary_bonus_sre;
$salary_bonus[$n+1]=0.8715*$salary_bonus_sre;
$salary_bonus[$n+2]=1.215*$salary_bonus_sre;
$salary_bonus[$n+3]=0.789*$salary_bonus_sre;
/***********************************************/

sort($salary_bonus);

$proc_25_salary_bonus=percentile($salary_bonus,25);
$proc_75_salary_bonus=percentile($salary_bonus,75);
//Конец вычисления параметров

//Вывод

include($folder.'../_admin/moduls/express_report/salary-echo.php');
}
}
else{
    ?>
<hr>
<p>Если Вы не получили отчет по какой-либо причине, то по всем вопросам Вы можете обратиться в нашу службу поддержки:
    <a href="http://help.obzorzarplat.ru">http://help.obzorzarplat.ru</a></p>

  <form id="quest" name="quest" action="" method="post" onsubmit="return testform();">
<input type="hidden" name="city" value="<?php echo($_POST["city"]); ?>">
<input type="hidden" name="jtype" value="<?php echo($_POST["jtype"]); ?>">
<input type="hidden" name="job" value="<?php echo($_POST["job"]); ?>">

<em>Все поля, помеченные звездочкой, обязательны для заполнения</em>
<table width="100%" border="0">
    <tr>
    <td align="right" width="30%">Телефон (с которого была отправлена sms):*</td>
    <td><input type="text" value="<?php if(isset($_POST["user_tel"])){echo $_POST["user_tel"];}?>" class="text_1" name="user_tel" maxlength="11"></td>
  </tr>
  <tr>
    <td align="right">Адрес E-mail:*</td>
    <td><input type="text" value="" class="text_1" name="usermail"></td>
  </tr>

  <tr>
    <td align="right" valign="top">Сообщение:</td>
    <td><textarea name="text" style=" width:400px; height:80px; font-weight:normal; font-size:12px"></textarea></td>
  </tr>
  <tr>
    <td></td>
    <td><input name="submit" id="submit" type="submit" class="submit" value="Отправить сообщение"></td>
  </tr>
</table>
</form>

<script type="text/javascript">
function testform()
{
    if(document.quest.usermail.value==""){window.alert('Вы не указали email.\n');return false;}
    if(document.quest.user_tel.value==""){window.alert('Вы не указали номер телефона, с которого была отправлена смс\n');return false;}
    else{
        return true;
    }
}
</script>
    <?php
}
?>