<div class="report_navigation_pos">
<ul class="report_navigation">
    <li>
        <span class="title_mini_others">1. <a href="#" onClick="return testform_back1();">Параметры отчета</a> &raquo;</span>
        <em>Параметры для формирования отчета</em>
    </li>
    <li>
        <span class="title_mini_others"> 2. <a href="#" onClick="return testform_back2();">Оплата отчета</a> &raquo;</span>
        <em>Проверка введенных данных и оплата отчета</em>
    </li>
    <li>
        <span class="title_mini"> 3. Получение отчета &raquo;</span>
        <em>Получение прямой ссылки на отчет</em>
    </li>
</ul>
</div>
<br>

<?php
/**************************************************************************/
//проверка e-mail
function CheckEmail($Email)
{
    if (!eregi("^[\._a-zA-Z0-9-]+@[\.a-zA-Z0-9-]+\.[a-z]{2,6}$", $Email)) return 1;
    list($Username, $Domain) = implode("@",$Email);
    if (@getmxrr($Domain, $MXHost)) return 0;
    else
    {
        $f=@fsockopen($Domain, 25, $errno, $errstr, 30);
        if($f)
        {
            fclose($f);
            return 0;
        }
        else return 1;
    }
}

//ф-ция расчета процентилей
function percentile($data,$percentile){
          if( 0 < $percentile && $percentile < 1 ) {
               $p = $percentile;
          }else if( 1 < $percentile && $percentile <= 100 ) {
               $p = $percentile * .01;
          }else {
               return "";
          }
          $count = count($data);
          $allindex = ($count-1)*$p;
          $intvalindex = intval($allindex);
          $floatval = $allindex - $intvalindex;
          sort($data);
          if(!is_float($floatval)){
               $result = $data[$intvalindex];
          }else {
               if($count > $intvalindex+1)
                    $result = $floatval*($data[$intvalindex+1] - $data[$intvalindex]) + $data[$intvalindex];
               else
                    $result = $data[$intvalindex];
          }
          return $result;
     }

/****************************************************************************/

//подключение к БД
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

//Сбор данных
$order_id=mysqli_result(mysqli_query($link,"select max(id) from base_userorders"),0,0) + 1;
$jtype_id=intval($_POST['jtype']);
$job_id=intval($_POST['job']);
$city_id=intval($_POST['city']);
$sphere_id=intval($_POST['sphere']);
$personal_id=intval($_POST['staff']);
$fio=mysqli_real_escape_string($link,$_POST['fio']);
$usermail=mysqli_real_escape_string($link,$_POST['usermail']);
$responsibility=mysqli_real_escape_string($link,$_POST['responsibility']);

$education_id=intval($_POST['obrazovanie']);
$sub_id=intval($_POST['podchin']);
$experience_id=intval($_POST['stazh']);

//Генерация урла
$order_url=genpass(20,20);

//ip юзера
$user_ip=$_SERVER["REMOTE_ADDR"];

//дата заказа
$order_date=date("Y-m-d");

//проверка, оплачена ли услуга
$order_code=mysqli_real_escape_string($link,$_POST['code']);
$testcode=mysqli_num_rows(mysqli_query($link,"select smsid from inbox where smsid='$order_code' and payed_status='0'"));

if($testcode<>0)
{
    $filedir=$_SERVER['DOCUMENT_ROOT'].'/_orders/';
    $filename_pdf='report_express_'.$order_id.'.pdf';
    $filename_html='report_express_'.$order_id.'.txt';

    //Запись в базу
    $result=mysqli_query($link,"insert into base_userorders value
    ('$order_id','$jtype_id','$job_id','$city_id','$sphere_id','$personal_id','$fio','$usermail','$education_id','$sub_id','$experience_id','$order_code','$order_url','1','$responsibility','$user_ip','$order_date')
    ");
/*************ГОРОД, СФЕРА, СОТРУДНИКИ**************/
if($personal_id==0){
  $q_personal="";
  $personal_name="не имеет значения";
}else{
  $q_personal=" AND company_id in(select id from base_companies where personal_id='$personal_id') ";
  $personal_name=mysqli_result(mysqli_query($link,"select title from base_personal where id='$personal_id'"),0,0);
  $personal_name="Компании со штатом ".$personal_name;
}

if($sphere_id==0){
  $q_sphere="";
  $sphere_name="не имеет значения";
  $sphere_description="";
}else{
  $q_sphere="AND company_id in(SELECT company_id FROM base_company_sphere where sphere_id='$sphere_id') ";
  $sphere_name=mysqli_result(mysqli_query($link,"select name from base_sphere where id='$sphere_id'"),0,0);
  $sphere_description=mysqli_result(mysqli_query($link,"select description from base_sphere where id='$sphere_id'"),0,0);
}


if($city_id==0){
  $q_city="";
  $city_name="не имеет значения";
  $city_name_partitive="";
}else{
  $q_city="AND region_id='$city_id' ";
  $city_name=mysqli_result(mysqli_query($link,"select name from base_regions where id='$city_id'"),0,0);
  $city_name_partitive="в ".mysqli_result(mysqli_query($link,"select name_partitive from base_regions where id='$city_id'"),0,0);
}

switch($responsibility){
  case "greater":
    $responsibility_name="У Вас расширенный круг обязанностей по сравнению с описанием";
    break;
  case "equal":
    $responsibility_name="Полное соответствие описанию";
    break;
  case "lesser":
    $responsibility_name="У Вас более узкий круг обязанностей по сравнению с описанием";
    break;
}

/***********************************ОПИСАНИЕ ДОЛЖНОСТИ********************************************************/

$job_name=mysqli_result(mysqli_query($link,"select name from base_jobs where id='$job_id'"),0,0);
$jtype_id=mysqli_result(mysqli_query($link,"select jtype_id from base_jobs where id='$job_id'"),0,0);
$jtype_name=mysqli_result(mysqli_query($link,"select name from base_jtype where id='$jtype_id'"),0,0);
$job_other_name=mysqli_result(mysqli_query($link,"select other_name from base_jobs where id='$job_id'"),0,0);
$job_conform=mysqli_result(mysqli_query($link,"select conform from base_jobs where id='$job_id'"),0,0);
$job_subordinate=mysqli_result(mysqli_query($link,"select subordinate from base_jobs where id='$job_id'"),0,0);
$job_purpose=mysqli_result(mysqli_query($link,"select purpose from base_jobs where id='$job_id'"),0,0);
$job_mission=mysqli_result(mysqli_query($link,"select mission from base_jobs where id='$job_id'"),0,0);
$job_func=mysqli_result(mysqli_query($link,"select func from base_jobs where id='$job_id'"),0,0);
$job_experience=mysqli_result(mysqli_query($link,"select experience from base_jobs where id='$job_id'"),0,0);

/**************************************************************************************************************/

//-----------------Должность, штат компании, сфера деятельности, город
$zp_result=mysqli_query($link,"SELECT * FROM base_people where job_id='$job_id' ".$q_city.$q_personal.$q_sphere);

$ii=0; $zp_summ=0; $zp_comp_summ=0;
while($row=mysqli_fetch_array($zp_result))
{
$zp_array[$ii]=$row['official_salary']+$row['add_payment']+$row['bonus']+$row['premium'];
$zp_comp_array[$ii]=$zp_array[$ii]+$row['compensation'];
$zp_summ+=$zp_array[$ii];
$zp_comp_summ+=$zp_comp_array[$ii];
$ii++;
}
$zp10pro=number_format(percentile($zp_array,0.1),0,',',' ');
$zp25pro=number_format(percentile($zp_array,0.25),0,',',' ');
$zp50pro=number_format(percentile($zp_array,0.5),0,',',' ');
$zp75pro=number_format(percentile($zp_array,0.75),0,',',' ');
$zp90pro=number_format(percentile($zp_array,0.9),0,',',' ');
$zp_sre=number_format($zp_summ/$ii,0,',',' ');

$zp_comp_10pro=number_format(percentile($zp_comp_array,0.1),0,',',' ');
$zp_comp_25pro=number_format(percentile($zp_comp_array,0.25),0,',',' ');
$zp_comp_50pro=number_format(percentile($zp_comp_array,0.5),0,',',' ');
$zp_comp_75pro=number_format(percentile($zp_comp_array,0.75),0,',',' ');
$zp_comp_90pro=number_format(percentile($zp_comp_array,0.9),0,',',' ');
$zp_comp_sre=number_format($zp_comp_summ/$ii,0,',',' ');

//------------Только должность
$zp_result_1=mysqli_query($link,"select * from base_people where job_id='$job_id'");

$ii=0; $zp_1_summ=0; $zp_1_comp_summ=0;
while($row=mysqli_fetch_array($zp_result_1))
{
$zp_1_array[$ii]=$row['official_salary']+$row['add_payment']+$row['bonus']+$row['premium'];
$zp_1_comp_array[$ii]=$zp_1_array[$ii]+$row['compensation'];
$zp_1_summ+=$zp_1_array[$ii];
$zp_1_comp_summ+=$zp_1_comp_array[$ii];
$ii++;
}
$zp_1_10pro=number_format(percentile($zp_1_array,0.1),0,',',' ');
$zp_1_25pro=number_format(percentile($zp_1_array,0.25),0,',',' ');
$zp_1_50pro=number_format(percentile($zp_1_array,0.5),0,',',' ');
$zp_1_75pro=number_format(percentile($zp_1_array,0.75),0,',',' ');
$zp_1_90pro=number_format(percentile($zp_1_array,0.9),0,',',' ');
$zp_1_sre=number_format($zp_1_summ/$ii);

$zp_1_comp_10pro=number_format(percentile($zp_1_comp_array,0.1),0,',',' ');
$zp_1_comp_25pro=number_format(percentile($zp_1_comp_array,0.25),0,',',' ');
$zp_1_comp_50pro=number_format(percentile($zp_1_comp_array,0.5),0,',',' ');
$zp_1_comp_75pro=number_format(percentile($zp_1_comp_array,0.75),0,',',' ');
$zp_1_comp_90pro=number_format(percentile($zp_1_comp_array,0.9),0,',',' ');
$zp_1_comp_sre=number_format($zp_1_comp_summ/$ii,0,',',' ');

//------------Должность, штат компании
/*
$zp_result_2=mysqli_query($link,"select * from base_people where job_id='$job_id' ".$q_personal);

$ii=0; $zp_2_summ=0; $zp_2_comp_summ=0;
while($row=mysqli_fetch_array($zp_result_2))
{
$zp_2_array[$ii]=$row['official_salary']+$row['add_payment']+$row['bonus']+$row['premium'];
$zp_2_comp_array[$ii]=$zp_2_array[$ii]+$row['compensation'];
$zp_2_summ+=$zp_2_array[$ii];
$zp_2_comp_summ+=$zp_2_comp_array[$ii];
$ii++;
}
$zp_2_10pro=round(percentile($zp_2_array,0.1));
$zp_2_25pro=round(percentile($zp_2_array,0.25));
$zp_2_50pro=round(percentile($zp_2_array,0.5));
$zp_2_75pro=round(percentile($zp_2_array,0.75));
$zp_2_90pro=round(percentile($zp_2_array,0.9));
$zp_2_sre=round($zp_2_summ/$ii);

$zp_2_comp_10pro=round(percentile($zp_2_comp_array,0.1));
$zp_2_comp_25pro=round(percentile($zp_2_comp_array,0.25));
$zp_2_comp_50pro=round(percentile($zp_2_comp_array,0.5));
$zp_2_comp_75pro=round(percentile($zp_2_comp_array,0.75));
$zp_2_comp_90pro=round(percentile($zp_2_comp_array,0.9));
$zp_2_comp_sre=round($zp_2_comp_summ/$ii);

//------------Должность, штат компании, сфера деятельности
$zp_result_3=mysqli_query($link,"select * FROM base_people where job_id='$job_id' ".$q_personal.$q_sphere);

$ii=0; $zp_3_summ=0; $zp_3_comp_summ=0;
while($row=mysqli_fetch_array($zp_result_3))
{
$zp_3_array[$ii]=$row['official_salary']+$row['add_payment']+$row['bonus']+$row['premium'];
$zp_3_comp_array[$ii]=$zp_3_array[$ii]+$row['compensation'];
$zp_3_summ+=$zp_3_array[$ii];
$zp_3_comp_summ+=$zp_3_comp_array[$ii];
$ii++;
}
$zp_3_10pro=number_format(percentile($zp_3_array,0.1),0,',',' ');
$zp_3_25pro=number_format(percentile($zp_3_array,0.25),0,',',' ');
$zp_3_50pro=number_format(percentile($zp_3_array,0.5),0,',',' ');
$zp_3_75pro=number_format(percentile($zp_3_array,0.75),0,',',' ');
$zp_3_90pro=number_format(percentile($zp_3_array,0.9),0,',',' ');
$zp_3_sre=number_format($zp_3_summ/$ii);

$zp_3_comp_10pro=number_format(percentile($zp_3_comp_array,0.1),0,',',' ');
$zp_3_comp_25pro=number_format(percentile($zp_3_comp_array,0.25),0,',',' ');
$zp_3_comp_50pro=number_format(percentile($zp_3_comp_array,0.5),0,',',' ');
$zp_3_comp_75pro=number_format(percentile($zp_3_comp_array,0.75),0,',',' ');
$zp_3_comp_90pro=number_format(percentile($zp_3_comp_array,0.9),0,',',' ');
$zp_3_comp_sre=number_format($zp_3_comp_summ/$ii);
*/
$struc_sfer=implode("",file($_SERVER['DOCUMENT_ROOT'].'/_orders/struc_sfer.txt'));
$struc_shtat=implode("",file($_SERVER['DOCUMENT_ROOT'].'/_orders/struc_shtat.txt'));

//Собираем переменные
define('_ORDER',$order_id);
define('_JOB',mysqli_result(mysqli_query($link,"select name from base_jobs where id='$job_id'"),0,0));
define('_CITY',$city_name);
define('_CITY_NAME_PARTITIVE',$city_name_partitive);
define('_SPHERE',$sphere_name);
define('_STAFF',$personal_name);

define('_ZP10PRO',$zp10pro);
define('_ZP25PRO',$zp25pro);
define('_ZP75PRO',$zp75pro);
define('_ZPMED',$zp50pro);
define('_ZP90PRO',$zp90pro);
define('_ZPSRE',$zp_sre);

define('_ZP_COMP_10PRO',$zp_comp_10pro);
define('_ZP_COMP_25PRO',$zp_comp_25pro);
define('_ZP_COMP_75PRO',$zp_comp_75pro);
define('_ZP_COMP_MED',$zp_comp_50pro);
define('_ZP_COMP_90PRO',$zp_comp_90pro);
define('_ZP_COMP_SRE',$zp_comp_sre);

define('_ZP_1_10PRO',$zp_1_10pro);
define('_ZP_1_25PRO',$zp_1_25pro);
define('_ZP_1_75PRO',$zp_1_75pro);
define('_ZP_1_MED',$zp_1_50pro);
define('_ZP_1_90PRO',$zp_1_90pro);
define('_ZP_1_SRE',$zp_1_sre);

define('_ZP_1_COMP_10PRO',$zp_1_comp_10pro);
define('_ZP_1_COMP_25PRO',$zp_1_comp_25pro);
define('_ZP_1_COMP_75PRO',$zp_1_comp_75pro);
define('_ZP_1_COMP_MED',$zp_1_comp_50pro);
define('_ZP_1_COMP_90PRO',$zp_1_comp_90pro);
define('_ZP_1_COMP_SRE',$zp_1_comp_sre);
/*
define('_ZP_2_10PRO',$zp_2_10pro);
define('_ZP_2_25PRO',$zp_2_25pro);
define('_ZP_2_75PRO',$zp_2_75pro);
define('_ZP_2_MED',$zp_2_50pro);
define('_ZP_2_90PRO',$zp_2_90pro);
define('_ZP_2_SRE',$zp_2_sre);

define('_ZP_2_COMP_10PRO',$zp_2_comp_10pro);
define('_ZP_2_COMP_25PRO',$zp_2_comp_25pro);
define('_ZP_2_COMP_75PRO',$zp_2_comp_75pro);
define('_ZP_2_COMP_MED',$zp_2_comp_50pro);
define('_ZP_2_COMP_90PRO',$zp_2_comp_90pro);
define('_ZP_2_COMP_SRE',$zp_2_comp_sre);

define('_ZP_3_10PRO',$zp_3_10pro);
define('_ZP_3_25PRO',$zp_3_25pro);
define('_ZP_3_75PRO',$zp_3_75pro);
define('_ZP_3_MED',$zp_3_50pro);
define('_ZP_3_90PRO',$zp_3_90pro);
define('_ZP_3_SRE',$zp_3_sre);

define('_ZP_3_COMP_10PRO',$zp_3_comp_10pro);
define('_ZP_3_COMP_25PRO',$zp_3_comp_25pro);
define('_ZP_3_COMP_75PRO',$zp_3_comp_75pro);
define('_ZP_3_COMP_MED',$zp_3_comp_50pro);
define('_ZP_3_COMP_90PRO',$zp_3_comp_90pro);
define('_ZP_3_COMP_SRE',$zp_3_comp_sre);
*/
define('_JOB_OTHER',mysqli_result(mysqli_query($link,"select other_name from base_jobs where id='$job_id'"),0,0));
define('_JOB_PODCH',mysqli_result(mysqli_query($link,"select conform from base_jobs where id='$job_id'"),0,0));
define('_JOB_SUB',mysqli_result(mysqli_query($link,"select subordinate from base_jobs where id='$job_id'"),0,0));
define('_JOB_CEL',mysqli_result(mysqli_query($link,"select purpose from base_jobs where id='$job_id'"),0,0));
define('_JOB_ZAD',mysqli_result(mysqli_query($link,"select mission from base_jobs where id='$job_id'"),0,0));
define('_JOB_FUNC',mysqli_result(mysqli_query($link,"select func from base_jobs where id='$job_id'"),0,0));
define('_JOB_TREB',mysqli_result(mysqli_query($link,"select experience from base_jobs where id='$job_id'"),0,0));
define('_JOB_NAME_PARTITIVE',mysqli_result(mysqli_query($link,"select name_partitive from base_jobs where id='$job_id'"),0,0));
define('_FIO',$fio);

if($education_id!='' and $education_id!='0'){$obrazovanie_title=mysqli_result(mysqli_query($link,"select title from base_education where id='$education_id'"),0,0);}else{$obrazovanie_title='';}
if($sub_id!='' and $sub_id!='0'){$podchin_title=mysqli_result(mysqli_query($link,"select title from base_sub where id='$sub_id'"),0,0);}else{$podchin_title='';}
if($experience_id!='' and $experience_id!='0'){$stazh_title=mysqli_result(mysqli_query($link,"select title from base_experience where id='$experience_id'"),0,0);}else{$stazh_title='';}

define('_EDUCATION',$obrazovanie_title);
define('_COLSUB',$podchin_title);
define('_EXPERIENCE',$stazh_title);
define('_STRUC_SFER',$struc_sfer);
define('_STRUC_SHTAT',$struc_shtat);
define('_RESP',$responsibility_name);
define('_SPHERE_DESCRIPT',$sphere_description);

		//##################  ГЕНЕРИМ PDF-ОТЧЕТ ###############################
		//include($_SERVER['DOCUMENT_ROOT'].'/_admin/moduls/indiv-pdf.php');
		//#####################################################################

		//##################  ГЕНЕРИМ HTML-ОТЧЕТ ###############################
		include($_SERVER['DOCUMENT_ROOT'].'/_admin/moduls/indiv_report/indiv-html.php');
		//######################################################################

//пишем в БД, что этой смс была оплачен услуга
mysqli_query($link,"update inbox set payed_status='1' where smsid='$order_code'");

		//Вывод информации
		$kov="'";
		//$output='Ваш отчет сформирован! <a href="javascript:openwindow('.$kov.$order_url.$kov.');">Посмотрите Ваш отчет</a>';
                $output='<p>Ваш отчет сформирован и отправлен на указанный Вами почтовый ящик!</p>';

		//##################  ОТПРАВКА ПИСЬМА ##################################
		$testmail=CheckEmail($usermail);
		if($testmail==0)
		{
		$url="/servis/otchet/result/index.php?d=$order_url";
                $mailbody="Заказ №".$order_id.". Вы можете посмотреть свой персональный отчет по заработной плате, перейдя по ссылке: http://obzorzarplat.ru".$url;
		mail($usermail,"Портал ОбзорЗарплат.РУ",$mailbody);

		$output.='<p>На ваш E-mail (<b>'.$usermail.'</b>) отправлена прямая ссылка (<a href="'.$url.'" class="link_4" target="_blank">http://obzorzarplat.ru'.$url.'</a>), по который вы можете в любой момент посмотреть свой отчет</p>';
		}
                else
                {
                    $url="/servis/otchet/result/index.php?d=$order_url";
                    $output='<p>Какие-то проблемы с вашим email (<b>'.$usermail.'</b>).</p><p>Прямая ссылка на ваш персональный отчет: (<a href="'.$url.'" class="link_4" target="_blank">http://obzorzarplat.ru'.$url.'</a>).</p>';
                }
		//######################################################################

$output.='<p align="left"><input type="button" value="&laquo; в начало" onClick="self.location.href=\'/servis/otchet/\'" class="but1"></p>';
}
else
{
    $output='<p>Неверный проверочный код!<br>Повторите попытку или сообщите об ошибке</p>
  <form name="step3" action="" method="post">
<input type="hidden" name="city" value="'.$city_id.'">
<input type="hidden" name="jtype" value="'.$jtype_id.'">
<input type="hidden" name="job" value="'.$job_id.'">
<input type="hidden" name="sphere" value="'.$sphere_id.'">
<input type="hidden" name="staff" value="'.$personal_id.'">
<input type="hidden" name="responsibility" value="'.$responsibility.'">
<input type="hidden" name="usermail" value="'.$usermail.'">

<input type="hidden" name="fio" value="'.$fio.'">
<input type="hidden" name="obrazovanie" value="'.$education_id.'">
<input type="hidden" name="podchin" value="'.$sub_id.'">
<input type="hidden" name="stazh" value="'.$experience_id.'">
<input type="hidden" name="code" value="'.$order_code.'">
</form>
';
    $output.='<p align="left"><input type="button" value="&laquo; в начало" onClick="self.location.href=\'/servis/otchet/\'" class="but1"></p>';
}

echo($output);
?>
<hr>
<p>Если Вы не получили отчет по какой-либо причине,
    то по всем вопросам Вы можете обратиться в нашу службу поддержки: <a href="http://help.obzorzarplat.ru" class="link_4">http://help.obzorzarplat.ru</a></p>

  <form id="quest" name="quest" action="" method="post" onsubmit="return testform();">
<input type="hidden" name="city" value="<?php echo($city_id);?>">
<input type="hidden" name="jtype" value="<?php echo($jtype_id);?>">
<input type="hidden" name="job" value="<?php echo($job_id);?>">
<input type="hidden" name="sphere" value="<?php echo($sphere_id);?>">
<input type="hidden" name="staff" value="<?php echo($personal_id);?>">
<input type="hidden" name="responsibility" value="<?php echo($responsibility);?>">

<input type="hidden" name="fio" value="<?php echo($fio);?>">
<input type="hidden" name="obrazovanie" value="<?php echo($education_id);?>">
<input type="hidden" name="podchin" value="<?php echo($sub_id);?>">
<input type="hidden" name="stazh" value="<?php echo($experience_id);?>">
<input type="hidden" name="code" value="<?php echo($order_code);?>">
<em>* Все поля обязательные для заполнения</em>
<table width="100%" border="0">
  <tr>
    <td width="40%" align="right">Заказ №:*</td>
    <td width="60%"><input type="text" value=" <?php echo($order_id);?>" class="text_1" name="order_number"></td>
  </tr>
    <tr>
    <td align="right">Телефон (с которого была отправлена sms):*</td>
    <td><input type="text" value="<?php if(isset($_POST["user_tel"])){echo $_POST["user_tel"];}?>" class="text_1" name="user_tel" maxlength="11"></td>
  </tr>
  <tr>
    <td align="right">Адрес E-mail:*</td>
    <td><input type="text" value="<?php echo($usermail);?>" class="text_1" name="usermail"></td>
  </tr>

  <tr>
    <td align="right" valign="top">Сообщение:</td>
    <td><textarea name="text" style=" width:400px; height:80px; font-weight:normal; font-size:12px"></textarea></td>
  </tr>

  <tr>
  <td></td>
  <td>

<!--параметры капчи-->
<script type="text/javascript">
var RecaptchaOptions = {
   theme : 'custom',
   lang: 'ru',
   custom_theme_widget: 'recaptcha_widget'
};
</script>
<?php

require_once($folder.'/_admin/moduls/captcha/recaptchalib.php');

// Get a key from http://recaptcha.net/api/getkey
$publickey = "6LdFBQcAAAAAAN8U1azBzK6pEoAL84OCllbA9lFC";
$privatekey = "6LdFBQcAAAAAAPj_qXHiQRUWItFJW9HFeurHCOlx";

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

# was there a reCAPTCHA response?
if ($_POST["submit"]) {
        $resp = recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);

        if ($resp->is_valid) {

                //Загрузка данных о контакте
                $link = mysqli_connect($host,$user,$pass);
                mysqli_select_db($link,$db);
                $kat="Персональный отчет";
                $query="select * from for_contacts where quest='$kat'";
                $result=mysqli_query($link,$query);
                $sot_name=mysqli_result($result,0,1);
                $sot_mail=mysqli_result($result,0,3);
                $sot_dol=mysqli_result($result,0,7);
                //Формирование письма
                $user_tel=$_POST["user_tel"];
                $usermail=$_POST["usermail"];

                $msg='Получено c сайта <b>'.$url.'</b><br>
                Заказ №: '.$order_id.'<hr>
                Телефон, с которого была отправлена sms:<b>'.$user_tel.'</b><br>
                Адрес E-mail:<b>'.$usermail.'</b><br>
                Сообщение:<br>
                '.$text;

                //Отправка сообщения
                mail("$sot_mail, tz@obzorzarplat.ru","Сообщение с сайта $url",$msg,"FROM:<$usermail>\nContent-Type: text/html; charset=Windows-1251\nContent-Transfer-Encoding: 8bit");

                echo('
                <font style="color:#c00; font-weight:bold;">Ваше сообщение успешно отправлено!</font><br>
                <!--На ваш вопрос ответит '.$sot_dol.' <b>'.$sot_name.'.</b>-->
                <hr>
                ');

                //Запись в базу
                $result=mysqli_query($link,"insert into base_userorders value
                    ('$order_id','$jtype_id','$job_id','$city_id','$sphere_id','$personal_id','$fio','$usermail','$education_id','$sub_id','$experience_id','$order_code','$order_url','0','$responsibility','$user_ip','$order_date')
                    ");
        } else {
                # set the error code so that we can display it
                $error = $resp->error;
                echo recaptcha_get_html($publickey, $error);
        }
}
else{
    echo recaptcha_get_html($publickey, $error);
}
?>
  </td>
  </tr>
  <tr>
    <td></td>
    <td><input name="submit" id="submit" type="submit" class="but1" value="Отправить сообщение"></td>
  </tr>
</table>
</form>

<script type="text/javascript">
function testform()
{
    if(document.quest.usermail.value==""){window.alert('Вы не указали email.\n');return false;}
    if(document.quest.order_number.value==""){window.alert('Вы не указали номер вашего заказа\n');return false;}
    if(document.quest.user_tel.value==""){window.alert('Вы не указали номер телефона, с которого была отправлена смс\n');return false;}
    if(document.quest.recaptcha_response_field.value==""){window.alert('Вы не указали, что нарисовано на картинке\n');return false;}
    else{
        return true;
    }
}

function testform_back1()
{
document.step3.action='?step=1';
document.step3.submit();
}

function testform_back2()
{
document.step3.action='?step=2';
document.step3.submit();
}
</script>