<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

/*******проверка количества просмотров юзером этой страницы*/

//ip пользователя
$user_ip=$_SERVER["REMOTE_ADDR"]; 
$ban_date=date("Y-m-d");

$count_q=mysqli_query($link,"select count from for_count_indiv where ip='$user_ip'");

if(mysqli_num_rows($count_q)==0){
  /********первый заход*/
  $count=1;
  mysqli_query($link,"insert into for_count_indiv (ip,count,date) values('$user_ip','$count','$ban_date')");

?>

<script>
function openwindow(url)
{
banwin = window.open('/_orders/html.php?d='+url,'','width=900, height=600, directories=no, location=no, menubar=no, resizeble=yes, scrollbars=yes, status=no, toolbar=no, left=100');
}
</script>

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

//Получение данных
$order_id=intval($_POST['order_id']);
$order_code=mysqli_real_escape_string($link,$_POST['code']);

//Проверка реквизитов
$testcode=mysqli_num_rows(mysqli_query($link,"select code from base_userorders where id='$order_id' and code='$order_code'"));

$output="";
if($testcode<>0)
{
//Поднимаем данные из базы
$status=mysqli_result(mysqli_query($link,"select status from base_userorders where id='$order_id'"),0,0);
		$filedir=$_SERVER['DOCUMENT_ROOT'].'/_orders/';
		$filename_pdf='report_express_'.$order_id.'.pdf';
		$filename_html='report_express_'.$order_id.'.txt';

	if($status==1)
	{
	//$output='Ваш отчет сформирован и отправлен на указанный Вами почтовый ящик!';
  $output='Ваш отчет сформирован! Посмотреть отчет Вы можете, перейдя по ссылке: <a href="'.$filedir.$filename.'" target="_blank">Перейти</a>';
	}
	if($status<>1)
	{
	//Сбор и вычисление всех необходимых переменных

		$jtype_id=mysqli_result(mysqli_query($link,"select jtype_id from base_userorders where id='$order_id'"),0,0);
		$job_id=mysqli_result(mysqli_query($link,"select job_id from base_userorders where id='$order_id'"),0,0);
		$city_id=mysqli_result(mysqli_query($link,"select city_id from base_userorders where id='$order_id'"),0,0);
		$sphere_id=mysqli_result(mysqli_query($link,"select sphere_id from base_userorders where id='$order_id'"),0,0);
		$personal_id=mysqli_result(mysqli_query($link,"select staff_id from base_userorders where id='$order_id'"),0,0);
		$fio=mysqli_result(mysqli_query($link,"select fio from base_userorders where id='$order_id'"),0,0);
                $mail=mysqli_result(mysqli_query($link,"select mail from base_userorders where id='$order_id'"),0,0);
		$education_id=mysqli_result(mysqli_query($link,"select education_id from base_userorders where id='$order_id'"),0,0);
		$sub_id=mysqli_result(mysqli_query($link,"select sub_id from base_userorders where id='$order_id'"),0,0);
		$experience_id=mysqli_result(mysqli_query($link,"select experience_id from base_userorders where id='$order_id'"),0,0);
		$order_url=mysqli_result(mysqli_query($link,"select url from base_userorders where id='$order_id'"),0,0);
    $responsibility=mysqli_result(mysqli_query($link,"select responsibility from base_userorders where id='$order_id'"),0,0);


/*************ГОРОД, СФЕРА, СОТРУДНИКИ**************/
if($personal_id==0){
  $q_personal="";
  $personal_name="Все компании";
}else{
  $q_personal=" AND company_id in(select id from base_companies where personal_id='$personal_id') ";
  $personal_name=mysqli_result(mysqli_query($link,"select title from base_personal where id='$personal_id'"),0,0);
  $personal_name="Компании со штатом ".$personal_name;
}

if($sphere_id==0){
  $q_sphere="";
  $sphere_name="Все сферы деятельности";
  $sphere_description="";
}else{
  $q_sphere="AND company_id in(SELECT company_id FROM base_company_sphere where sphere_id='$sphere_id') ";
  $sphere_name=mysqli_result(mysqli_query($link,"select name from base_sphere where id='$sphere_id'"),0,0);
  $sphere_description=mysqli_result(mysqli_query($link,"select description from base_sphere where id='$sphere_id'"),0,0);
}


if($city_id==0){
  $q_city="";
  $city_name="Все города";
}else{
  $q_city="AND region_id='$city_id' ";
  $city_name=mysqli_result(mysqli_query($link,"select name from base_regions where id='$city_id'"),0,0);
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

/***********************************ОПИСАНИЕ ДОЛЖНОСТИ*************************************************/

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
$zp10pro=round(percentile($zp_array,0.1));
$zp25pro=round(percentile($zp_array,0.25));
$zp50pro=round(percentile($zp_array,0.5));
$zp75pro=round(percentile($zp_array,0.75));
$zp90pro=round(percentile($zp_array,0.9));
$zp_sre=round($zp_summ/$ii);

$zp_comp_10pro=round(percentile($zp_comp_array,0.1));
$zp_comp_25pro=round(percentile($zp_comp_array,0.25));
$zp_comp_50pro=round(percentile($zp_comp_array,0.5));
$zp_comp_75pro=round(percentile($zp_comp_array,0.75));
$zp_comp_90pro=round(percentile($zp_comp_array,0.9));
$zp_comp_sre=round($zp_comp_summ/$ii);

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
$zp_1_10pro=round(percentile($zp_1_array,0.1));
$zp_1_25pro=round(percentile($zp_1_array,0.25));
$zp_1_50pro=round(percentile($zp_1_array,0.5));
$zp_1_75pro=round(percentile($zp_1_array,0.75));
$zp_1_90pro=round(percentile($zp_1_array,0.9));
$zp_1_sre=round($zp_1_summ/$ii);

$zp_1_comp_10pro=round(percentile($zp_1_comp_array,0.1));
$zp_1_comp_25pro=round(percentile($zp_1_comp_array,0.25));
$zp_1_comp_50pro=round(percentile($zp_1_comp_array,0.5));
$zp_1_comp_75pro=round(percentile($zp_1_comp_array,0.75));
$zp_1_comp_90pro=round(percentile($zp_1_comp_array,0.9));
$zp_1_comp_sre=round($zp_1_comp_summ/$ii);

//------------Должность, штат компании
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
$zp_3_10pro=round(percentile($zp_3_array,0.1));
$zp_3_25pro=round(percentile($zp_3_array,0.25));
$zp_3_50pro=round(percentile($zp_3_array,0.5));
$zp_3_75pro=round(percentile($zp_3_array,0.75));
$zp_3_90pro=round(percentile($zp_3_array,0.9));
$zp_3_sre=round($zp_3_summ/$ii);

$zp_3_comp_10pro=round(percentile($zp_3_comp_array,0.1));
$zp_3_comp_25pro=round(percentile($zp_3_comp_array,0.25));
$zp_3_comp_50pro=round(percentile($zp_3_comp_array,0.5));
$zp_3_comp_75pro=round(percentile($zp_3_comp_array,0.75));
$zp_3_comp_90pro=round(percentile($zp_3_comp_array,0.9));
$zp_3_comp_sre=round($zp_3_comp_summ/$ii);

$struc_sfer=implode("",file($_SERVER['DOCUMENT_ROOT'].'/_orders/struc_sfer.txt'));
$struc_shtat=implode("",file($_SERVER['DOCUMENT_ROOT'].'/_orders/struc_shtat.txt'));

//Собираем переменные
define('_ORDER',$order_id); 
define('_JOB',mysqli_result(mysqli_query($link,"select name from base_jobs where id='$job_id'"),0,0));
define('_CITY',$city_name);
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

define('_JOB_OTHER',mysqli_result(mysqli_query($link,"select other_name from base_jobs where id='$job_id'"),0,0));
define('_JOB_PODCH',mysqli_result(mysqli_query($link,"select conform from base_jobs where id='$job_id'"),0,0));
define('_JOB_SUB',mysqli_result(mysqli_query($link,"select subordinate from base_jobs where id='$job_id'"),0,0));		
define('_JOB_CEL',mysqli_result(mysqli_query($link,"select purpose from base_jobs where id='$job_id'"),0,0));	
define('_JOB_ZAD',mysqli_result(mysqli_query($link,"select mission from base_jobs where id='$job_id'"),0,0));	
define('_JOB_FUNC',mysqli_result(mysqli_query($link,"select func from base_jobs where id='$job_id'"),0,0));	
define('_JOB_TREB',mysqli_result(mysqli_query($link,"select experience from base_jobs where id='$job_id'"),0,0));
define('_FIO',$fio);

if($obrazovanie!='' and $obrazovanie!='0'){$obrazovanie_title=mysqli_result(mysqli_query($link,"select title from base_education where id='$obrazovanie'"),0,0);}else{$obrazovanie_title='';}
if($podchin!='' and $podchin!='0'){$podchin_title=mysqli_result(mysqli_query($link,"select title from base_sub where id='$podchin'"),0,0);}else{$podchin_title='';}
if($stazh!='' and $stazh!='0'){$stazh_title=mysqli_result(mysqli_query($link,"select title from base_experience where id='$stazh'"),0,0);}else{$stazh_title='';}

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
		

		
		//Вывод информации
		$kov="'";
		//$output='Ваш отчет сформирован! <a href="javascript:openwindow('.$kov.$order_url.$kov.');">Посмотрите Ваш отчет</a>';
    $output='<p>Ваш отчет сформирован и отправлен на указанный Вами почтовый ящик!</p>';
		
		//##################  ОТПРАВКА ПИСЬМА ##################################
		$testmail=CheckEmail($mail);
		if($testmail==0)
		{
		$url="/servis/otchet/result/?d=$order_url";
                $mailbody="Вы можете посмотреть свой персональный отчет по заработной плате, перейдя по ссылке: <a href='$url' class='link_4' target='_blank'>http://obzorzarplat.ru".$url."</a>";
		mail($mail,"Портал ОбзорЗарплат.РУ",$mailbody);
		
		$output.='<p>На ваш E-mail (<b>'.$mail.'</b>) отправлена прямая ссылка (<a href="'.$url.'" class="link_4" target="_blank">http://obzorzarplat.ru'.$url.'</a>), по который вы можете в любой момент посмотреть свой отчет</p>';
		}
                else
                {
                    $output='<p>Какие-то проблемы с вашим email (<b>'.$mail.'</b>).</p><p>Прямая ссылка на ваш персональный отчет: (<a href="'.$url.'" class="link_4" target="_blank">http://obzorzarplat.ru'.$url.'</a>).</p>';
                }
		//######################################################################		
		
	}
	




}
else
{$output='<p>Неверный проверочный код!<br><a href="?step=5&order='.$order_id.'"><< Возврат</a></p>';}

echo($output);
?>

<table width="100%" border="0">
<tr>
<td align="left">
	<form name="back" action="?step=1" method="post">
	<input type="submit" value="&laquo; в начало" class="but1">
	</form>
</td>
<td align="right"></td>
</tr>

</table>

<?php
}
?>