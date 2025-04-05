<?php
include_once $folder.'../cgi/moduls/reports/funcs.php';

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

$kov="'";

$city_id_string=$_POST['city'];
$job_id=$_POST['job'];
$jgroup_id=intval($_POST['jgroup']);
$step=$_POST["step"];
$date=$_POST["date"];
$job_names="";

$job_id_string=implode(',',$job_id);

$job_names_q=mysqli_query($link,"SELECT name from base_jobs where id in($job_id_string) order by name");
while($row=mysqli_fetch_array($job_names_q)){
    $job_names.="<li>".$row["name"]."</li>";
}

$city_names_q=mysqli_query($link,"SELECT name from base_regions where id in($city_id_string) order by name");
while($row=mysqli_fetch_array($city_names_q)){
    $city_names.="<li>".$row["name"]."</li>";
}

$copyright='<p>Copyright ©  1996-'.date('Y').' Ant-Management</p>';


/*************ГОРОД, ДОЛЖНОСТНАЯ ГРУППА**************/

  $q_city=" AND region_id in($city_id_string)";


if($jgroup_id==0){
  $jgroup_name="все группы";
  $q_jgroup="";
}else{
  $jgroup_name=mysqli_result(mysqli_query($link,"select name from base_jobs_groups where id='$jgroup_id'"),0,0);
  $q_jgroup=" AND job_id in(select id from base_jobs
                  where jobs_group_id='$jgroup_id')";
}


  $q_jobs=" AND job_id in($job_id_string)";

/*************ГОД**************/
 if($date==0){
  $date_name="текущие значения";
  $q_date="";
}else{
  $date_name=$date.' год';
  $q_date=" AND date LIKE '$date%'";
}

/***************PEOPLE_ID*******************/
$query="SELECT  id,official_salary,add_payment,bonus,premium,compensation,(official_salary+add_payment+bonus+premium),
        (official_salary+add_payment+bonus+premium+compensation), payment_id, period_id FROM base_people
        WHERE 1 ".$q_city.$q_jobs.$q_jgroup.$q_date;

if ($date<='2009' && $date!=0) {
    $query="SELECT  id,official_salary,add_payment,bonus,premium,compensation,(official_salary+add_payment+bonus+premium),
        (official_salary+add_payment+bonus+premium+compensation), payment_id, period_id FROM archive_people
        WHERE 1 ".$q_city.$q_jobs.$q_jgroup.$q_date;
}

echo($query);

$q_people=mysqli_query($link,$query);

/***************PEOPLE_ID*******************/
//Компании, которые попали в выборку
$companies_q=mysqli_query($link,"SELECT id FROM base_companies WHERE region_id in($city_id_string)");
while ($companies = mysqli_fetch_object($companies_q)) {
    $companies_array[]=$companies->id;
}

$companies_string=implode(',', array_unique($companies_array));

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
$i=0;
while($i<(count($base))){
    $salary[$i]=$base[$i]+$add[$i]+$bonus[$i]+$premium[$i];
     $cash[$i]=$salary[$i]+$compensation[$i];
     $i++;
}

$people_sum=count($base);

$salary_indexes=salary_indexes($salary);
$cash_indexes=salary_indexes($cash);
$base_indexes=salary_indexes($base);
$premium_indexes=salary_indexes($premium);
$bonus_indexes=salary_indexes($bonus);
$compensation_indexes=salary_indexes($compensation);


if($step['2']=="1"){
/*******************Таблица 2.1***********************/

$payment=table2_1($payment_id);

/*******************Таблица 2.2***********************/

$period=table2_2($period_id);

/*******************Таблица 2.3, 2.4*******************/

$companies=array_unique($company_id);
$all_companies=count($companies);

foreach($company_id as $c_id){
  $query=mysqli_query($link,"select * from base_companies where id='$c_id'");
  while($row=mysqli_fetch_array($query)){
    $freq_id[]=$row["freq_id"];
    $currency_id[]=$row["currency_id"];
  }
}

$freq_id_u=array_unique($freq_id);
$currency_id_u=array_unique($currency_id);

foreach($freq_id_u as $f_id_u){
$name=mysqli_result(mysqli_query($link,"select title from base_freq where id='$f_id_u'"),0,0);
  foreach($freq_id as $f_id){
    if($f_id==$f_id_u){$tab2_3[$name]++;}
  }
  $freq[$name]=$tab2_3[$name]/$people_sum*100;
}

foreach($currency_id_u as $cur_id_u){
$name=mysqli_result(mysqli_query($link,"select title from base_currency where id='$cur_id_u'"),0,0);
  foreach($currency_id as $cur_id){
    if($cur_id==$cur_id_u){$tab2_4[$name]++;}
  }
  $currency[$name]=$tab2_4[$name]/$people_sum*100;
}
}


/********************************************************/
/***********People premiums and compensations*************/
/********************************************************/
if($step['3']=="1" OR $step['4']=="1" OR $step['5']=="1" OR $step['6']=="1" OR $step['7']=="1"  OR $step['8']=="1" OR $step['9']=="1"  OR $step['10']=="1" OR $step['11']=="1"){
foreach($people_id as $pid) {
    $q_people_compensations=mysqli_query($link,"select * from base_people_compensations where people_id='$pid'");
    while($row=mysqli_fetch_array($q_people_compensations)) {
      $compensation_id[]=$row["compensation_id"];
      $sum[]=$row["sum"];
      $company_part[]=$row["company_part"];
      $politics_id[]=$row["politics_id"];
      //$company_id_c[][$row["compensation_id"]]=$row["company_id"];
    }


    $q_people_premiums=mysqli_query($link,"select * from base_people_premiums where people_id='$pid'");
    while($row=mysqli_fetch_array($q_people_premiums)) {
      $premium_id[]=$row["premium_id"];
      $premium_title_id[]=$row["premium_title_id"];
    }
    }

$comp_people=count_people($compensation_id); //скольким людям выплачивают определенную компенсацию
$politics_people=count_people($politics_id);        //скольким людям выплачивают определенную компенсацию, следую соответствующей политике

$premium_people=count_people($premium_id); //скольким людям начисляется определенную премия

//для таблиц с премиями
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
 if($step['3']=="1"){
$string3=array(1,2,3);
$out3=table_type2("3",$string3,$comp_people,$people_sum,$sum,$compensation_id,$politics_people);
 }

/*******************Таблицы 4 (Premiums)***********************/

if($step['4']=="1"){
foreach($premium_types as $type_id => $type){

$out4[$type]=
"<table width='100%' border='0' class='X1'>
<tr class='X1_0'>
  <th width='55%'></th>
  <th width='30%'></th>
  <th width='15%'>Учитывается</th>
</tr>";

$color=1;

foreach($premium_title as $m => $title_id){

$query4=mysqli_query($link,"SELECT * FROM base_premium_titles where id='$title_id' and type_id='$type_id'");
while($row1=mysqli_fetch_array($query4)){
  $id4=$row1["id"];
  $title4=$row1["title"];

  $tab4[$title4]=$premium_people[$id4]/$people_sum*100;

  //таблица, показывающая процент людей, которым начисляются премии
  $out4[$type].="<tr class='X1_".$color."'><td class='X1_left'>".$title4."</td><td></td><td></td></tr>";

  $color=1-$color;

  //compensaition_politics
  $q_prem_id=mysqli_query($link,"SELECT * FROM base_premiums where title_id='$id4'");
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
/*******************Таблицы 5 Базовые компенсации (Еда/транспорт/связь)***********************/

if($step['5']=="1"){
$string5=array(4,5,6,21);
$out5=table_type2("5",$string5,$comp_people,$people_sum,$sum,$compensation_id,$politics_people);
}

/*******************Таблицы 6 (Командировочные расходы)***********************/
//$string6=array(7,8,9,10,11,12,13,14,15,16,17,18,19,20);
//$out6=table_type2("6",$string6,$comp_people,$people_sum,$sum,$compensation_id,$politics_people);

if($step['6']=="1"){
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
$tab6_2[1][2]=average($res6[66]);
}

if($comp_people[67]==0){
$tab6_2[2][1]="-";
$tab6_2[2][2]="-";
}else{
$tab6_2[2][1]=number_format($comp_people[67]/$comp_people[207]*100,2)."%"; // Москва
$tab6_2[2][2]=average($res6[67]);
}

if($comp_people[68]==0){
$tab6_2[3][1]="-";
$tab6_2[3][2]="-";
}else{
$tab6_2[3][1]=number_format($comp_people[68]/$comp_people[207]*100,2)."%"; // Россия
$tab6_2[3][2]=average($res6[68]);
}

// 6.3 Суточные расходы в командировке

if($comp_people[69]==0){
$tab6_3[1][1]="-";
$tab6_3[1][2]="-";
}else{
$tab6_3[1][1]=number_format($comp_people[69]/$comp_people[207]*100,2)."%"; // Европа / дальнее зарубежье
$tab6_3[1][2]=average($res6[69]);
}

if($comp_people[70]==0){
$tab6_3[2][1]="-";
$tab6_3[2][2]="-";
}else{
$tab6_3[2][1]=number_format($comp_people[70]/$comp_people[207]*100,2)."%"; // Москва
$tab6_3[2][2]=average($res6[70]);
}

if($comp_people[71]==0){
$tab6_3[3][1]="-";
$tab6_3[3][2]="-";
}else{
$tab6_3[3][1]=number_format($comp_people[71]/$comp_people[207]*100,2)."%"; // Россия
$tab6_3[3][2]=average($res6[71]);
}

// 6.4 Транспортные расходы в командировке

if($comp_people[72]==0){
$tab6_4[1][1]="-";
$tab6_4[1][2]="-";
}else{
$tab6_4[1][1]=number_format($comp_people[72]/$comp_people[207]*100,2)."%"; // Европа / дальнее зарубежье
$tab6_4[1][2]=average($res6[72]);
}

if($comp_people[73]==0){
$tab6_4[2][1]="-";
$tab6_4[2][2]="-";
}else{
$tab6_4[2][1]=number_format($comp_people[73]/$comp_people[207]*100,2)."%"; // Москва
$tab6_4[2][2]=average($res6[73]);
}

if($comp_people[74]==0){
$tab6_4[3][1]="-";
$tab6_4[3][2]="-";
}else{
$tab6_4[3][1]=number_format($comp_people[74]/$comp_people[207]*100,2)."%"; // Россия
$tab6_4[3][2]=average($res6[74]);
}

// 6.5 Связь командированного

if($comp_people[101]==0){
$tab6_5[1][1]="-";
$tab6_5[1][2]="-";
}else{
$tab6_5[1][1]=number_format($comp_people[101]/$comp_people[207]*100,2)."%"; // Мобильная связь
$tab6_5[1][2]=average($res6[101]);
}

if($comp_people[99]==0){
$tab6_5[2][1]="-";
$tab6_5[2][2]="-";
}else{
$tab6_5[2][1]=number_format($comp_people[99]/$comp_people[207]*100,2)."%"; // Междугородняя связь
$tab6_5[2][2]=average($res6[99]);
}
}
/*******************Таблицы 7 (Кредитные практики и дисконтные программы)***********************/
//$string7=array(22);
//$out7=table_type2("7",$string7,$comp_people,$people_sum,$sum,$compensation_id,$politics_people);

if($step['7']=="1"){
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
$tab7[3]="-";
}else{
$tab7[3]=average($res7[124])." руб.";                         // Средняя суммарная величина выданных кредитов сотруднику за последний год
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
}

/*******************Таблицы 8 (Страхование, здоровье, спорт)***********************/
//$string8=array(27,28,29,30,31,32,33);
//$out8=table_type2("8",$string8,$comp_people,$people_sum,$sum,$compensation_id,$politics_people);

if($step['8']=="1"){
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
$tab8_2[0][1]=average($res8[175]);
}

if($comp_people[176]==0){
$tab8_2[1][0]="-";
$tab8_2[1][1]="-";
}else{
$tab8_2[1][0]=number_format($comp_people[176]/$people_sum*100,2)."%";  // Негосударственное медицинское страхование
$tab8_2[1][1]=average($res8[176]);
}

if($comp_people[184]==0){
$tab8_2[2][0]="-";
$tab8_2[2][1]="-";
}else{
$tab8_2[2][0]=number_format($comp_people[184]/$people_sum*100,2)."%";  // Негосударственное пенсионное страхование
$tab8_2[2][1]=average($res8[184]);
}

// Дополнительная программа по беременности

if($comp_people[161]==0){$tab8_3[0]="-";}else{$tab8_3[0]=number_format($comp_people[161]/$people_sum*100,2)."%";}  // Предоставление оплачиваемого декретного отпуска
if($comp_people[162]==0){$tab8_3[1]="-";}else{$tab8_3[1]=number_format($comp_people[162]/$people_sum*100,2)."%";}   // Отпуск по беременности (до родов)
if($comp_people[163]==0){$tab8_3[2]="-";}else{$tab8_3[2]=number_format($comp_people[163]/$people_sum*100,2)."%";}  // Отпуск по родам (после родов)

// Занятия спортом

$tab8_4[0]=number_format($comp_people[174]/$people_sum*100,2);
$tab8_4[1]=average($res8[174]);
}
/*******************Таблицы 9 (Обучение и развитие)***********************/
//$string9=array(23,24,25);
//$out9=table_type2("9",$string9,$comp_people,$people_sum,$sum,$compensation_id,$politics_people);

if($step['9']=="1"){
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

if($comp_people[132]==0){$tab9_3[0]="-";}else{$tab9_3[0]=average($res9[132]);}  // Затраты на обучение на эту должность
if($comp_people[133]==0){$tab9_3[1]="-";}else{$tab9_3[1]=average($res9[133]);}  // Размер бюджета на обучение одного сотрудника

// Политика обучения сотрудников в компании

if($politics_people[114]==0){$tab9_4[0]="-";}else{$tab9_4[0]=number_format($politics_people[114]/$comp_people[134]*100,2)."%";}  // Проводится обучение в рамках корпоративных программ развития (обучение, организуемое силами компании)
if($politics_people[115]==0){$tab9_4[1]="-";}else{$tab9_4[1]=number_format($politics_people[115]/$comp_people[134]*100,2)."%";}  // Компанией компенсируются затраты сотрудника на обучение
}

/*******************Таблицы 10 (Отпуск)***********************/
if($step['10']=="1"){
$string10="26";
$out10=table_type1($string10, $comp_people, $people_sum, $sum, $compensation_id,$politics_people);
}

/*******************Таблицы 11 (Праздники)***********************/

//$string11=array(35,36,37);
//$out11=table_type2("11",$string11,$comp_people,$people_sum,$sum,$compensation_id,$politics_people);
if($step['11']=="1"){
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
$tab11_2[1][1]=average($res11[194]);
}

if($comp_people[195]==0){
$tab11_2[2][0]="-";
$tab11_2[2][1]="-";
}else{
$tab11_2[2][0]=number_format($comp_people[195]/$people_sum*100,2)."%";  // Другие корпоративные праздники
$tab11_2[2][1]=average($res11[195]);
}
}
//test
//echo($query);
//echo "<br><br>";
//echo('<p style="color:white;">'.count($people_id).'</p>');
//echo "<br><br>";
//print_r($people_id);
//print_r($premium1);
//print_r($comp_keys6_2);
//print_r($company_id_c);

/**************************************************************/
include($folder.'/_admin/moduls/statistics/salary_job_types/job_types2-echo.php');
?>