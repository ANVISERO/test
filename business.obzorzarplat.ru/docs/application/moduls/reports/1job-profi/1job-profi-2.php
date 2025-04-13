<?php
//error_reporting(E_ALL);

$kov="'";

//print_r($_POST);

$city_id=intval($_POST['city']);
$jtype_id=intval($_POST['jtype']);
$job_id=intval($_POST['job']);

$sphere_id= isset($_POST['sphere']) ? (intval($_POST['sphere'])) : 0;
$personal_id=isset($_POST['staff']) ? (intval($_POST['staff'])) : 0;
$turnover_id=isset($_POST['turnover']) ? (intval($_POST['turnover'])) : 0;

/************* ЗАПРОСЫ И НАЗВАНИЯ - ГОРОД, СФЕРА, СОТРУДНИКИ, ОБОРОТ КОМПАНИИ **************/
//--------ГОРОД---------
  $city_name=mysqli_result(mysqli_query($link,"select name from base_regions where id='$city_id'"),0,0);
  $city_name_partitive="в ".mysqli_result(mysqli_query($link,"select name_partitive from base_regions where id='$city_id'"),0,0);
  $q_city="AND region_id='$city_id'";

//--------СФЕРА----------
if($sphere_id==0){
    $sphere_name="не имеет значения";
    $q_sphere="";
}else{
    $sphere_name=mysqli_result(mysqli_query($link,"select name from base_sphere where id='$sphere_id'"),0,0);
    $q_sphere=" AND id in(SELECT company_id FROM base_company_sphere where sphere_id='$sphere_id')";
}

//--------СОТРУДНИКИ-----
if($personal_id==0){
    $personal_name="не имеет значения";
    $q_personal="";
}else{
    $personal_name=mysqli_result(mysqli_query($link,"select title from base_personal where id='$personal_id'"),0,0);
    $q_personal="AND personal_id='$personal_id'";
}

//--------ОБОРОТ-------
if($turnover_id==0){
    $turnover_name="не имеет значения";
    $turnover_id_max=mysqli_result(mysqli_query($link,"select max(id) from base_turnover"),0,0);
    $q_turnover="turnover_id between 0 and $turnover_id_max";
}else{
    $turnover_name=mysqli_result(mysqli_query($link,"select title from base_turnover where id='$turnover_id'"),0,0);
    $q_turnover="turnover_id='$turnover_id'";
}

/***********************************ОПИСАНИЕ ДОЛЖНОСТИ****************************************************************/

$job_name=mysqli_result(mysqli_query($link,"select name from base_jobs where id='$job_id'"),0,0);
$jtype_name=mysqli_result(mysqli_query($link,"select name from base_jtype where id='$jtype_id'"),0,0);
$job_other_name=mysqli_result(mysqli_query($link,"select other_name from base_jobs where id='$job_id'"),0,0);
$job_conform=mysqli_result(mysqli_query($link,"select conform from base_jobs where id='$job_id'"),0,0);
$job_subordinate=mysqli_result(mysqli_query($link,"select subordinate from base_jobs where id='$job_id'"),0,0);
$job_purpose=mysqli_result(mysqli_query($link,"select purpose from base_jobs where id='$job_id'"),0,0);
$job_mission=mysqli_result(mysqli_query($link,"select mission from base_jobs where id='$job_id'"),0,0);
$job_func=mysqli_result(mysqli_query($link,"select func from base_jobs where id='$job_id'"),0,0);
$job_experience=mysqli_result(mysqli_query($link,"select experience from base_jobs where id='$job_id'"),0,0);
$job_name_partitive=mysqli_result(mysqli_query($link,"select name_partitive from base_jobs where id='$job_id'"),0,0);

/***********************************************************************************************************************/

/***************PEOPLE_ID*******************/
//Компании, которые попали в выборку
//echo "SELECT id FROM base_companies WHERE ".$q_turnover." ".$q_personal." ".$q_city." ".$q_sphere;

$companies_q=mysqli_query($link, "SELECT id FROM base_companies WHERE ".$q_turnover." ".$q_personal." ".$q_city." ".$q_sphere) or die(mysqli_error($link));

while ($companies = mysqli_fetch_object($companies_q)) {
    $companies_array[]=$companies->id;
}

$companies_string = implode(',', array_unique($companies_array));
//echo $companies_string;

// Люди в компаниях
$q_people=mysqli_query($link,"SELECT * FROM base_people where job_id='$job_id' AND company_id in(".$companies_string.")");

while ($row=mysqli_fetch_array($q_people)){
  $people_id[]=$row["id"];
  $company_id[]=$row["company_id"];
  $base[]=$row["official_salary"];
  $add[]=$row["add_payment"];
  $bonus[]=$row["bonus"];
  $premium[]=$row["premium"];
  $compensation[]=$row["compensation"];
  $dataDate[]=$row["date"];
}

//Уникальные компании, вошедшие в выборку
$companies_array=array_unique($company_id);
$companies_string=implode(',', array_unique($companies_array));
$companies_count=count($companies_array);

/*********************Дата последнего обновления данных (мухлевка) - СДЕЛАТЬ честно!!!! ****************************/
$dateMax=max($dataDate);
$dateUpdateMax=dateUpdateMax($dateMax);

$i=0;
while($i<(count($base))){
     $salary[$i]=$base[$i]+$add[$i]+$bonus[$i]+$premium[$i];
     $cash[$i]=$salary[$i]+$compensation[$i];
     $i++;
} 

$i=count($people_id);
//********************cheating, if only 1 person
$base=add_items($base);
$add=add_items($add);
$bonus=add_items($bonus);
$premium=add_items($premium);
$compensation=add_items($compensation);

//****************************************************************
//расчет премий
/*
foreach($premium as $p){
  if($p>0){$premium1[]=$p;}
}
*/
//расчет ЗП и полной компенсации с учетом НДФЛ

$people_sum=count($base);

/*************Расчет интервальных значений***********/
/********************Таблица 1.1***********************/
//Расчет шкалированной оценки для ЗП

$sal_print=interval($salary);

/*Расчеты для построения графиков*/
$sal_print_keys = array_keys($sal_print);
$chl_salary = implode($sal_print_keys, '|');
$chd_salary = implode($sal_print, ',');
$chdl_salary = implode($sal_print_keys, '|');
$size='700x250';
$img_src_salary='http://chart.apis.google.com/chart?chof=gif&cht=p&chco=0000ff&chd=t:'.$chd_salary.'&chs='.$size.'&chl='.iconv('windows-1251','utf-8',$chl_salary).'&chdl='.iconv('windows-1251','utf-8',$chdl_salary);

/********************Таблица 1.2***********************/
$cash_print=interval($cash);

/*Расчеты для построения графиков*/
$cash_print_keys=array_keys($cash_print);
$chl_cash=implode($cash_print_keys, '|');
$chd_cash=  implode($cash_print, ',');
$chdl_cash=  implode($cash_print_keys, '|');
$size='700x250';
$img_src_cash='http://chart.apis.google.com/chart?chof=gif&cht=p&chco=008000&chd=t:'.$chd_cash.'&chs='.$size.'&chl='.iconv('windows-1251','utf-8',$chl_cash).'&chdl='.iconv('windows-1251','utf-8',$chdl_cash);


/********************Таблица 1,3**********************/
$salary_indexes=salary_indexes($salary);
$cash_indexes=salary_indexes($cash);
$base_indexes=salary_indexes($base);
$premium_indexes=salary_indexes($premium);
$bonus_indexes=salary_indexes($bonus);
$compensation_indexes=salary_indexes($compensation);

/*******************Таблица 2.1 Методика выплат заработной платы***********************/
//echo 'companies_string='.$companies_string.'<br>';

$payments_q = mysqli_query($link, "SELECT id, name FROM base_payment order by name") or die(mysqli_error($link));

$table2_1="";
while ($payments = mysqli_fetch_object($payments_q)) {
//    echo "SELECT COUNT(id) FROM base_companies WHERE id IN(".$companies_string.") AND payment_id='".$payments->id."'";
    $payments_count = mysqli_result(mysqli_query($link, "SELECT COUNT(id) FROM base_companies WHERE id IN(".$companies_string.") AND payment_id='".$payments->id."'"),0,0);
    $payments_percent=$payments_count/$companies_count*100;
    $table2_1.="<tr><td class='left'>".$payments->name."</td><td>".$payments_percent."%</td></tr>";
}

/************ Таблица 2.2 Периодичность выплат заработной платы **************/
$periods_q=mysqli_query($link,"SELECT id,name FROM base_period order by name");

$table2_2="";
while ($periods = mysqli_fetch_object($periods_q)) {
    $periods_count=mysqli_result(mysqli_query($link,"SELECT COUNT(id) FROM base_companies WHERE id IN(".$companies_string.") AND period_id='".$periods->id."'"),0,0);
    $periods_percent=$periods_count/$companies_count*100;
    $table2_2.="<tr>
        <td class='left'>".$periods->name."</td><td>".$periods_percent."%</td>
</tr>";
}

/************ Таблица 2.3 Частота пересмотра заработной платы **************/
$freq_q=mysqli_query($link,"SELECT id,title FROM base_freq order by title");

$table2_3="";
while ($freq = mysqli_fetch_object($freq_q)) {
    $freq_count=mysqli_result(mysqli_query($link,"SELECT COUNT(id) FROM base_companies WHERE id IN(".$companies_string.") AND freq_id='".$freq->id."'"),0,0);
    $freq_percent=$freq_count/$companies_count*100;
    $table2_3.="<tr>
        <td class='left'>".$freq->title."</td><td>".$freq_percent."%</td>
</tr>";
}

/************ Таблица 2.4 Валютная политика выплаты заработной платы **************/
$currency_q=mysqli_query($link,"SELECT id,title FROM base_currency order by title");

$table2_4="";
while ($currency = mysqli_fetch_object($currency_q)) {
    $currency_count=mysqli_result(mysqli_query($link,"SELECT COUNT(id) FROM base_companies WHERE id IN(".$companies_string.") AND currency_id='".$currency->id."'"),0,0);
    $currency_percent=$currency_count/$companies_count*100;
    $table2_4.="<tr>
        <td class='left'>".$currency->title."</td><td>".$currency_percent."%</td>
</tr>";
}

/********************************************************/
/***********People premiums and compensations*************/
/********************************************************/
	//echo "select * from base_people_compensations where job_id='$job_id' AND company_id IN (".$companies_string.")";
    $q_people_compensations=mysqli_query($link,"select * from base_people_compensations where job_id='$job_id' AND company_id IN (".$companies_string.")");
    if (mysqli_num_rows($q_people_compensations)){
    	while($row=mysqli_fetch_array($q_people_compensations)) {
      		//$compensation_id[$row["id"]][]=$row["compensation_id"];
			$compensation_id[$row["id"]]=$row["compensation_id"];
      		//$sum[$row["id"]][]=$row["sum"];
			$sum[$row["id"]]=$row["sum"];
      		//$company_part[$row["id"]][]=$row["company_part"];
			$company_part[$row["id"]]=$row["company_part"];
      		//$politics_id[$row["id"]][]=$row["politics_id"];
			$politics_id[$row["id"]]=$row["politics_id"];
    	}
    }

	
    //$q_people_premiums=mysqli_query($link,"select * from base_people_premiums where people_id='$pid'");
	$q_people_premiums=mysqli_query($link, "select * from base_people_premiums where job_id='$job_id' AND company_id IN (".$companies_string.")");
    if (mysqli_num_rows($q_people_premiums))
    {
        while($row=mysqli_fetch_array($q_people_premiums)) {
            $premium_id[$row["id"]]=$row["premium_id"];
            $premium_title_id[$row["id"]]=$row["premium_title_id"];
        }
    }

//print_r($compensation_id);
$comp_people=count_people($compensation_id); //скольким людям выплачивают определенную компенсацию
$politics_people=count_people($politics_id);        //скольким людям выплачивают определенную компенсацию, следуя соответствующей политике
$premium_people=count_people($premium_id); //скольким людям начисляется определенную премия
//print_r($comp_people);
//для таблиц с премиями
if($premium_id!==null){
    $premium_title=array_unique($premium_title_id); //id премий
    asort($premium_title);

    foreach($premium_title as $premium_title_id){
        $q_premium_type=mysqli_query($link,"select * from base_premium_types where id in(select type_id from base_premium_titles where id=$premium_title_id)");
        while($row=mysqli_fetch_array($q_premium_type)){
            $type_id=$row["id"];
            $type[$type_id]=$row["title"];
        }
    }
    $premium_types=array_unique($type);
}

/*******************Таблицы 3 (Компенсационные и стимулирующие выплаты)***********/
if($compensation_id!==null){
    $string3=array(1,2,3);
    $out3=table_type2("3",$string3,$comp_people,$people_sum,$sum,$compensation_id,$politics_people,$link);
}
/*******************Таблицы 4 (Premiums)***********************/
if($premium_id!==null){
foreach($premium_types as $type_id => $type){

$out4[$type]=
"<table width='100%' border='0' class='business'>
<tr class='X1_0'>
  <th width='55%'></th>
  <th width='30%'></th>
  <th width='15%'>Учитывается</th>
</tr>";

$color=1;

foreach($premium_title as $m => $title_id){

$query4=mysqli_query($link, "SELECT * FROM base_premium_titles where id='$title_id' and type_id='$type_id'");
while($row1=mysqli_fetch_array($query4)){
  $id4=$row1["id"];
  $title4=$row1["title"];

  $tab4[$title4]=$premium_people[$id4]/$people_sum*100;

  //таблица, показывающая процент людей, которым начисляются премии
  $out4[$type].="<tr class='X1_".$color."'><td class='X1_left'>".$title4."</td><td></td><td></td></tr>";

  $color=1-$color;

  //compensaition_politics
  $q_prem_id=mysqli_query($link, "SELECT * FROM base_premiums where title_id='$id4'");
  while($row2=mysqli_fetch_array($q_prem_id)){
    $premium_id4=$row2["id"];
    $subtitle_premium4=$row2["subtitle"];
    if(isset($premium_people[$premium_id4])){
      $tab4[$m][$subtitle_premium4]=$premium_people[$premium_id4]/$people_sum*100;
      $out4[$type].="<tr class='X1_".$color."'><td></td><td class='X1_left'>".$subtitle_premium4."</td><td class='X1_right'>".number_format($tab4[$m][$subtitle_premium4],2)."%</td></tr>";
      $color=1-$color;
    }
  }

}
}
$out4[$type].="</table>";
}
}

//если нет компенсаций, то считать нет смысла
if($compensation_id!==null){

/*******************Таблицы 5 Базовые компенсации (Еда/транспорт/связь)***********************/
$string5=array(4,5,6,21);
$out5=table_type2("5",$string5,$comp_people,$people_sum,$sum,$compensation_id,$politics_people,$link);

/*******************Таблицы 6 (Командировочные расходы)***********************/
//$string6=array(7,8,9,10,11,12,13,14,15,16,17,18,19,20);
//$out6=table_type2("6",$string6,$comp_people,$people_sum,$sum,$compensation_id,$politics_people,$link);

$tab6[2]=$comp_people[207]/$people_sum*100;  // Процент сотрудников, которых отправляют в служебные командировки:

if($comp_people[63]==0){$tab6_1[1][1]="-";}else{$tab6_1[1][1]=number_format($comp_people[63]/$comp_people[207]*100,2)."%";}
if($politics_people[11]==0){$tab6_1[1][2]="-";}else{$tab6_1[1][2]=number_format($politics_people[11]/$comp_people[63]*100,2)."%";}  // Плацкарт
if($politics_people[10]==0){$tab6_1[1][3]="-";}else{$tab6_1[1][3]=number_format($politics_people[10]/$comp_people[63]*100,2)."%";}  // Купе
if($politics_people[9]==0){$tab6_1[1][4]="-";}else{$tab6_1[1][4]=number_format($politics_people[9]/$comp_people[63]*100,2)."%";}   // Спальный люкс
//$tab6_1[1][5]=$politics_people[12]/$comp_people[63]*100;                 // любой вагон


if($comp_people[64]==0){$tab6_1[2][1]="-";}else{$tab6_1[2][1]=number_format($comp_people[64]/$comp_people[207]*100,2)."%";}
if($politics_people[17]==0){$tab6_1[2][2]="-";}else{$tab6_1[2][2]=number_format($politics_people[17]/$comp_people[64]*100,2)."%";}  // Бизнес-класс
if($politics_people[18]==0){$tab6_1[2][3]="-";}else{$tab6_1[2][3]=number_format($politics_people[18]/$comp_people[64]*100,2)."%";}  // Первый класс
if($politics_people[19]==0){$tab6_1[2][4]="-";}else{$tab6_1[2][4]=number_format($politics_people[19]/$comp_people[64]*100,2)."%";}  // Эконом-класс

// Сумма затрат

$id6=array(66,67,68,69,70,71,72,73,74,99,101);
foreach($id6 as $id){
$comp_keys6=array_keys($compensation_id,$id);
  foreach($comp_keys6 as $i => $key){
    if($sum[$key]!=0){
    $res6[$id][$i]=$sum[$key];
    }
  }
  }

// 6.2 Проживание командированного

if($comp_people[66]==0){
$tab6_2[1][1]="-";
$tab6_2[1][2]="-";
}else{
$tab6_2[1][1]=number_format($comp_people[66]/$comp_people[207]*100,2)."%"; // Европа / дальнее зарубежье
$tab6_2[1][2]=number_format(average($res6[66]),0,',',' ');
}

if($comp_people[67]==0){
$tab6_2[2][1]="-";
$tab6_2[2][2]="-";
}else{
$tab6_2[2][1]=number_format($comp_people[67]/$comp_people[207]*100,2)."%"; // Москва
$tab6_2[2][2]=number_format(average($res6[67]),0,',',' ');
}

if($comp_people[68]==0){
$tab6_2[3][1]="-";
$tab6_2[3][2]="-";
}else{
$tab6_2[3][1]=number_format($comp_people[68]/$comp_people[207]*100,2)."%"; // Россия
$tab6_2[3][2]=number_format(average($res6[68]),0,',',' ');
}

// 6.3 Суточные расходы в командировке

if($comp_people[69]==0){
$tab6_3[1][1]="-";
$tab6_3[1][2]="-";
}else{
$tab6_3[1][1]=number_format($comp_people[69]/$comp_people[207]*100,2)."%"; // Европа / дальнее зарубежье
$tab6_3[1][2]=number_format(average($res6[69]),0,',',' ');
}

if($comp_people[70]==0){
$tab6_3[2][1]="-";
$tab6_3[2][2]="-";
}else{
$tab6_3[2][1]=number_format($comp_people[70]/$comp_people[207]*100,2)."%"; // Москва
$tab6_3[2][2]=number_format(average($res6[70]),0,',',' ');
}

if($comp_people[71]==0){
$tab6_3[3][1]="-";
$tab6_3[3][2]="-";
}else{
$tab6_3[3][1]=number_format($comp_people[71]/$comp_people[207]*100,2)."%"; // Россия
$tab6_3[3][2]=number_format(average($res6[71]),0,',',' ');
}

// 6.4 Транспортные расходы в командировке

if($comp_people[72]==0){
$tab6_4[1][1]="-";
$tab6_4[1][2]="-";
}else{
$tab6_4[1][1]=number_format($comp_people[72]/$comp_people[207]*100,2)."%"; // Европа / дальнее зарубежье
$tab6_4[1][2]=number_format(average($res6[72]),0,',',' ');
}

if($comp_people[73]==0){
$tab6_4[2][1]="-";
$tab6_4[2][2]="-";
}else{
$tab6_4[2][1]=number_format($comp_people[73]/$comp_people[207]*100,2)."%"; // Москва
$tab6_4[2][2]=number_format(average($res6[73]),0,',',' ');
}

if($comp_people[74]==0){
$tab6_4[3][1]="-";
$tab6_4[3][2]="-";
}else{
$tab6_4[3][1]=number_format($comp_people[74]/$comp_people[207]*100,2)."%"; // Россия
$tab6_4[3][2]=number_format(average($res6[74]),0,',',' ');
}

// 6.5 Связь командированного

if($comp_people[101]==0){
$tab6_5[1][1]="-";
$tab6_5[1][2]="-";
}else{
$tab6_5[1][1]=number_format($comp_people[101]/$comp_people[207]*100,2)."%"; // Мобильная связь
$tab6_5[1][2]=number_format(average($res6[101]),0,',',' ');
}

if($comp_people[99]==0){
$tab6_5[2][1]="-";
$tab6_5[2][2]="-";
}else{
$tab6_5[2][1]=number_format($comp_people[99]/$comp_people[207]*100,2)."%"; // Междугородняя связь
$tab6_5[2][2]=number_format(average($res6[99]),0,',',' ');
}

/*******************Таблицы 7 (Кредитные практики и дисконтные программы)***********************/
//$string7=array(22);
//$out7=table_type2("7",$string7,$comp_people,$people_sum,$sum,$compensation_id,$politics_people,$link);

$id7=array(124);
foreach($id7 as $id){
$comp_keys7=array_keys($compensation_id,$id);
  foreach($comp_keys7 as $i => $key){
    if($sum[$key]!=0){
    $res7[$id][$i]=$sum[$key];
    }
  }
  }


$tab7[2]=number_format($comp_people[114]/$people_sum*100,2); // Процент сотрудников, которым предоставляются кредиты


if($res7[124]==0){
$tab7[3]="0";
}else{
$tab7[3]=number_format(average($res7[124]),0,',',' ');                         // Средняя суммарная величина выданных кредитов сотруднику за последний год
}

// 7.1 Наличие условий кредитования

if($comp_people[205]==0){
$tab7_1[1][1]="-";
$tab7_1[2][1]="-";
}else{
$tab7_1[1][1]=number_format($comp_people[205]/$comp_people[114]*100,2)."%";     // Кредиты предоставляются при определенных условиях
$tab7_1[2][1]=number_format(100-$tab7_1[1][1],2)."%";                                      // Кредиты предоставляются без условий
}

if($politics_people[205]==0){$tab7_1[1][2]="-";}else{$tab7_1[1][2]=number_format($politics_people[205]/$comp_people[205]*100,2)."%";}  // Стаж работы сотрудника в компании
if($politics_people[206]==0){$tab7_1[1][3]="-";}else{$tab7_1[1][3]=number_format($politics_people[206]/$comp_people[205]*100,2)."%";}  // Оклад сотрудника
if($politics_people[207]==0){$tab7_1[1][4]="-";}else{$tab7_1[1][4]=number_format($politics_people[207]/$comp_people[205]*100,2)."%";}  // Объект кредитования
if($politics_people[208]==0){$tab7_1[1][5]="-";}else{$tab7_1[1][5]=number_format($politics_people[208]/$comp_people[205]*100,2)."%";}  // Другой фактор


// 7.2 Виды кредитов

if($politics_people[209]==0){$tab7_2[1]="-";}else{$tab7_2[1]=number_format($politics_people[209]/$comp_people[114]*100,2)."%";}   // Кредит на покупку недвижимости
if($politics_people[210]==0){$tab7_2[2]="-";}else{$tab7_2[2]=number_format($politics_people[210]/$comp_people[114]*100,2)."%";}   // Кредит на покупку автомобиля
if($politics_people[211]==0){$tab7_2[3]="-";}else{$tab7_2[3]=number_format($politics_people[211]/$comp_people[114]*100,2)."%";}   // Кредит на покупку аудио-, видео-, бытовой, компьютерной техники
if($politics_people[212]==0){$tab7_2[4]="-";}else{$tab7_2[4]=number_format($politics_people[212]/$comp_people[114]*100,2)."%";}   // Кредит на оплату обучения
if($politics_people[213]==0){$tab7_2[5]="-";}else{$tab7_2[5]=number_format($politics_people[213]/$comp_people[114]*100,2)."%";}   // Прочие кредиты

// 7.3 Процент по кредиту

if($politics_people[55]==0){$tab7_3[1]="-";}else{$tab7_3[1]=number_format($politics_people[55]/$comp_people[117]*100,2)."%";}    // Беспроцентный кредит
if($politics_people[56]==0){$tab7_3[2]="-";}else{$tab7_3[2]=number_format($politics_people[56]/$comp_people[117]*100,2)."%";}    // Процент по кредиту

/*******************Таблицы 8 (Страхование, здоровье, спорт)***********************/
//$string8=array(27,28,29,30,31,32,33);
//$out8=table_type2("8",$string8,$comp_people,$people_sum,$sum,$compensation_id,$politics_people,$link);

$id8=array(175,176,184,174);
foreach($id8 as $id){
$comp_keys8=array_keys($compensation_id,$id);
  foreach($comp_keys8 as $i => $key){
    if($sum[$key]!=0){
    $res8[$id][$i]=$sum[$key];
    }
  }
  }

//  Негосударственное страхование
if($comp_people[175]==0){
$tab8_2[0][0]="-";
$tab8_2[0][1]="-";
}else{
$tab8_2[0][0]=number_format($comp_people[175]/$people_sum*100,2)."%";  // Негосударственное страхование
$tab8_2[0][1]=number_format(average($res8[175]),0,',',' ');
}

if($comp_people[176]==0){
$tab8_2[1][0]="-";
$tab8_2[1][1]="-";
}else{
$tab8_2[1][0]=number_format($comp_people[176]/$people_sum*100,2)."%";  // Негосударственное медицинское страхование
$tab8_2[1][1]=number_format(average($res8[176]),0,',',' ');
}

if($comp_people[184]==0){
$tab8_2[2][0]="-";
$tab8_2[2][1]="-";
}else{
$tab8_2[2][0]=number_format($comp_people[184]/$people_sum*100,2)."%";  // Негосударственное пенсионное страхование
$tab8_2[2][1]=number_format(average($res8[184]),0,',',' ');
}

// Дополнительная программа по беременности

if($comp_people[161]==0){$tab8_3[0]="-";}else{$tab8_3[0]=number_format($comp_people[161]/$people_sum*100,2)."%";}  // Предоставление оплачиваемого декретного отпуска
if($comp_people[162]==0){$tab8_3[1]="-";}else{$tab8_3[1]=number_format($comp_people[162]/$people_sum*100,2)."%";}   // Отпуск по беременности (до родов)
if($comp_people[163]==0){$tab8_3[2]="-";}else{$tab8_3[2]=number_format($comp_people[163]/$people_sum*100,2)."%";}  // Отпуск по родам (после родов)

// Занятия спортом

$tab8_4[0]=number_format($comp_people[174]/$people_sum*100,2,',',' ');
$tab8_4[1]=number_format(average($res8[174]),0,',',' ');

/*******************Таблицы 9 (Обучение и развитие)***********************/
//$string9=array(23,24,25);
//$out9=table_type2("9",$string9,$comp_people,$people_sum,$sum,$compensation_id,$politics_people,$link);

$id9=array(132,133);
foreach($id9 as $id){
$comp_keys9=array_keys($compensation_id,$id);
  foreach($comp_keys9 as $i => $key){
    if($sum[$key]!=0){
    $res9[$id][$i]=$sum[$key];
    }
  }
  }

$tab9_1[0]=number_format($comp_people[208]/$people_sum*100,2);

// Финансирование обучения сотрудника в компании

if($politics_people[106]==0){$tab9_2[0]="-";}else{$tab9_2[0]=number_format($politics_people[106]/$comp_people[130]*100,2)."%";}  // Существует лимитированный бюджет на обучение сотрудника
if($politics_people[107]==0){$tab9_2[1]="-";}else{$tab9_2[1]=number_format($politics_people[107]/$comp_people[130]*100,2)."%";}  // Бюджет на обучение сотрудника не резервируется, но деньги выделяются

// Бюджет на обучение сотрудника

if($comp_people[132]==0){$tab9_3[0]="-";}else{$tab9_3[0]=number_format(average($res9[132]),0,',',' ');}  // Затраты на обучение на эту должность
if($comp_people[133]==0){$tab9_3[1]="-";}else{$tab9_3[1]=number_format(average($res9[133]),0,',',' ');}  // Размер бюджета на обучение одного сотрудника

// Политика обучения сотрудников в компании

if($politics_people[114]==0){$tab9_4[0]="-";}else{$tab9_4[0]=number_format($politics_people[114]/$comp_people[134]*100,2)."%";}  // Проводится обучение в рамках корпоративных программ развития (обучение, организуемое силами компании)
if($politics_people[115]==0){$tab9_4[1]="-";}else{$tab9_4[1]=number_format($politics_people[115]/$comp_people[134]*100,2)."%";}  // Компанией компенсируются затраты сотрудника на обучение


/*******************Таблицы 10 (Отпуск)***********************/
//$string10="26";
//$out10=table_type1($string10, $comp_people, $people_sum, $sum, $compensation_id,$politics_people,$link);

/*******************Таблицы 11 (Праздники)***********************/

//$string11=array(35,36,37);
//$out11=table_type2("11",$string11,$comp_people,$people_sum,$sum,$compensation_id,$politics_people,$link);

$id11=array(193,194,195);
foreach($id11 as $id){
$comp_keys11=array_keys($compensation_id,$id);
  foreach($comp_keys11 as $i => $key){
    if($sum[$key]!=0){
    $res11[$id][$i]=$sum[$key];
    }
  }
  }

$tab11_2[0][0]=average($res11[193]);// Общий бюджет корпоративных праздников (руб. на 1 сотрудника)

if($comp_people[194]==0){
$tab11_2[1][0]="-";
$tab11_2[1][1]="-";
}else{
$tab11_2[1][0]=number_format($comp_people[194]/$people_sum*100,2)."%";  // День рождения компании
$tab11_2[1][1]=number_format(average($res11[194]),0,',',' ');
}

if($comp_people[195]==0){
$tab11_2[2][0]="-";
$tab11_2[2][1]="-";
}else{
$tab11_2[2][0]=number_format($comp_people[195]/$people_sum*100,2)."%";  // Другие корпоративные праздники
$tab11_2[2][1]=number_format(average($res11[195]),0,',',' ');
}

} //-------/if($compensation_id!==null)------------------
//test
//echo($query);
//echo "<br><br>";
//echo('<p style="color:white;">'.count($people_id).'</p>');
//echo "<br><br>";
//print_r($people_id);
//print_r($premium1);
//print_r($comp_keys6_2);
//print_r($company_id_c);

//Версия для печати
//Конец вычисления параметров

//id клиента
$user_id=mysqli_result(mysqli_query($link,"SELECT user_id from for_users_corporat_login where session_id = '".$_SESSION['user_number']. "'"),0,0);


//Генерация урла
$url=genpass(20,20);

//дата формирования отчета
$date=date("Y-m-d");

$q_archive=mysqli_query($link,"INSERT INTO for_users_corporat_reports values(0,'$user_id','$url','$date','1','$job_id','$city_id')");

$order_id=mysqli_result(mysqli_query($link,"SELECT id from for_users_corporat_reports where url='$url' AND user_id='$user_id'"),0,0);

$filedir=$_SERVER['DOCUMENT_ROOT'].'/_report/user'.$user_id.'/';
$filename_html='report_'.$order_id.'.txt';

$filename_xls='report_'.$order_id.'.xls';
$url_xls='/_report/user'.$user_id.'/'.$filename_xls;

if(!is_dir($filedir)) {
    mkdir($filedir, 0755, true);
}

//Вывод
/**************************************************************/
include($folder.'application/moduls/reports/1job-profi/1job-profi-2-echo.php');
include($folder.'application/moduls/reports/1job-profi/1job-profi-excel.php');
include($folder.'application/moduls/reports/1job-profi/1job-profi-html.php');
?>