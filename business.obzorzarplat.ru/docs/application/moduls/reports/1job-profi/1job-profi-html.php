<?php
$page='';
$page.='
<div class="profi">

<h2>Аналитический обзор заработной платы '.$job_name_partitive.' '.$city_name_partitive.'</h2>

<table class="data">
<tr>
<td width="50%" class="title">Выбранные факторы для формирования отчета:</th>
<td class="title_none"></td>
</tr>
<tr>
<th>Должностная группа</th>
<td>'.$jtype_name.'</td>
</tr>
<tr>
<th>Должность</th>
<td>'.$job_name.'</td>
</tr>
<tr>
<th>Город</th>
<td>'.$city_name.'</td>
</tr>
<tr>
<th>Сфера деятельности компании</th>
<td>'.$sphere_name.'</td>
</tr>
<tr>
<th>Количество сотрудников в компании</th>
<td>'.$personal_name.'</td>
</tr>
<tr>
<th>Оборот компании</th>
<td>'.$turnover_name.'</td>
</tr>
</table>
<br>
<p>Все данные представлены в российских рублях <b>после выплаты налогов (net)</b></p>
<p>Дата последнего обновления данных по выбранной должности: <b>'.$dateUpdateMax.' года</b></p>
<h3>1. Структура денежного вознаграждения</h3>
<h4>1.1 Распределение шкалированной оценки заработной платы (руб. в месяц)</h4>
<p>Заработная плата включает в себя оклад, надбавки, доплаты, премии и бонусы.</p>
<p class="table_name">Таблица 1.1.1</p>
<table class="business">
<tr>
  <th>Интервалы значений заработной платы, тыс. руб.</th>
  <th>Количество сотрудников (% от общего числа сотрудников)</th>
</tr>
';

foreach($sal_print as $key => $sal){
$page.="<tr><td>".$key."</td><td>".number_format($sal,1)."%</td></tr>";
}

$page.='
</table>
<p align="center"><img src="'.$img_src_salary.'" alt="Должностной оклад" /></p>
<p class="img_name">Рисунок 1.1.1 Распределение шкалированной оценки заработной платы, руб./месяц</p>


<h4>1.2 Распределение шкалированной оценки компенсации труда (руб. в месяц)</h4>
<p class="table_title">Таблица 1.2.1</p>
<table class="business">
<tr>
  <th>Интервалы значений компенсации труда, тыс. руб.</th>
  <th>Количество сотрудников (% от общего числа сотрудников)</th>
</tr>
';

foreach($cash_print as $key => $cash1){
$page.="<tr><td>".$key."</td><td>".number_format($cash1,1)."%</td></tr>";
}
$page.='
</table>
<p align="center"><img src="'.$img_src_cash.'" alt="Должностной оклад" /></p>
<p class="img_name">Рисунок 1.2.1 Распределение шкалированной оценки компенсации труда, руб./месяц</p>


<h4>1.3	Среднемесячные значения статей компенсации труда (руб. в месяц)</h4>
<p class="table_name">Таблица 1.3.1</p>
<table class="business">
<tr>
  <th></th>
  <th>10%</th>
  <th>25%</th>
  <th>50%</th>
  <th>Среднее</th>
  <th>75%</th>
  <th>90%</th>
</tr>
<tr>
  <th>Компенсация труда</th>
  <td>'.$cash_indexes[0].'</td>
  <td>'.$cash_indexes[1].'</td>
  <td>'.$cash_indexes[2].'</td>
  <td>'.$cash_indexes[3].'</td>
  <td>'.$cash_indexes[4].'</td>
  <td>'.$cash_indexes[5].'</td>
</tr>
<tr>
  <th>Заработная плата</th>
  <td>'.$salary_indexes[0].'</td>
  <td>'.$salary_indexes[1].'</td>
  <td>'.$salary_indexes[2].'</td>
  <td>'.$salary_indexes[3].'</td>
  <td>'.$salary_indexes[4].'</td>
  <td>'.$salary_indexes[5].'</td>
</tr>
<tr>
  <th>Должностной оклад</th>
  <td>'.$base_indexes[0].'</td>
  <td>'.$base_indexes[1].'</td>
  <td>'.$base_indexes[2].'</td>
  <td>'.$base_indexes[3].'</td>
  <td>'.$base_indexes[4].'</td>
  <td>'.$base_indexes[5].'</td>
</tr>
<tr>
  <th>Премии</th>
  <td>'.$premium_indexes[0].'</td>
  <td>'.$premium_indexes[1].'</td>
  <td>'.$premium_indexes[2].'</td>
  <td>'.$premium_indexes[3].'</td>
  <td>'.$premium_indexes[4].'</td>
  <td>'.$premium_indexes[5].'</td>
</tr>
<tr>
  <th>Бонусы</th>
  <td>'.$bonus_indexes[0].'</td>
  <td>'.$bonus_indexes[1].'</td>
  <td>'.$bonus_indexes[2].'</td>
  <td>'.$bonus_indexes[3].'</td>
  <td>'.$bonus_indexes[4].'</td>
  <td>'.$bonus_indexes[5].'</td>
</tr>
<tr>
  <th>Бенефиты</th>
  <td>'.$compensation_indexes[0].'</td>
  <td>'.$compensation_indexes[1].'</td>
  <td>'.$compensation_indexes[2].'</td>
  <td>'.$compensation_indexes[3].'</td>
  <td>'.$compensation_indexes[4].'</td>
  <td>'.$compensation_indexes[5].'</td>
</tr>
</table>

<p align="center"><img src="'.$image_src_cash.'" alt="Заработная плата" /></p>
<p class="img_name">Рисунок 1.3.1 Заработная плата '.$job_name_partitive.', руб./мес.</p>

<h3>2. Политика выплат</h3>

<h4>2.1 Метод выплат оклада.</h4>
<p class="table_title">Таблица 2.1</p>
<table class="X1" border="0">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%" class="X1_right">Доля сотрудников</th>
</tr>
';

$color=1;
foreach($payment as $k=>$pay) {
    if($pay==0){$pay_print="-";}
    else{$pay_print=number_format($pay,1,',',' ')."%";}
  $page.="<tr class='X1_".$color."'><td class='X1_left'>".$k."</td><td class='X1_right'>".$pay_print."</td></tr>";
  $color=1-$color;
};

$page.='
</table><br>

<h4>2.2 Периодичность выплат оклада.</h4>
<p class="table_title">Таблица 2.2</p>
<table class="X1" border="0">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%" class="X1_right">Доля сотрудников</th>
</tr>
';

$color=1;
foreach($period as $k=>$pd) {
    if($pd==0){$pd_print="-";}
    else{$pd_print=number_format($pd,1,',',' ')."%";}
  $page.="<tr class='X1_".$color."'><td class='X1_left'>".$k."</td><td class='X1_right'>".$pd_print."</td></tr>";
  $color=1-$color;
}

$page.='
</table><br>

<h4>2.3 Частота пересмотра окладов.</h4>
<p class="table_title">Таблица 2.3</p>
<table class="X1" border="0">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%" class="X1_right">Доля сотрудников</th>
</tr>
';

$color=1;
foreach($freq as $k=>$fr) {
    if($fr==0){$fr_print="-";}
    else{$fr_print=number_format($fr,1,',',' ')."%";}
  $page.="<tr class='X1_".$color."'><td class='X1_left'>".$k."</td><td class='X1_right'>".$fr_print."</td></tr>";
  $color=1-$color;
}

$page.='
</table><br>

<h4>2.4 Валютная политика выплаты окладов.</h4>
<p class="table_title">Таблица 2.4</p>
<table class="X1" border="0">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%" class="X1_right">Доля сотрудников</th>
</tr>
';

$color=1;
foreach($currency as $k=>$cur) {
  $page.="<tr class='X1_".$color."'><td class='X1_left'>".$k."</td><td class='X1_right'>".number_format($cur,1,',',' ')." % </td></tr>";
  $color=1-$color;
}

$page.='
</table><br>
<h3>3.	Компенсационные и стимулирующие выплаты</h3>
';
if($out3!==null){
foreach($out3 as $table3){$page.=$table3;}
}
else{$page.="Процент людей, которым выплачиваются компенсационные и стимулирующие выплаты - 0,00%";}
$page.='
<h3>4.	Премии</h3>

<p class="table_title">Таблица 4.1</p>
<table border="0" class="X1">
<tr class="X1_0">        
<th></th>
<th>Премии</th>
<tr class="X1_1">
  <td class="X1_left">Процентиль 10</td>
  <td class="X1_right">'.number_format(percentile($premium1,10),0,',',' ').'р.</td>
</tr>
<tr class="X1_1">
  <td class="X1_left">Процентиль 25</td>
  <td class="X1_right">'.number_format(percentile($premium1,25),0,',',' ').'р.</td>
</tr>
<tr class="X1_1">
  <td class="X1_left">Процентиль 50</td>
  <td class="X1_right">'.number_format(percentile($premium1,50),0,',',' ').'р.</td>
</tr>
<tr class="X1_1">
  <td class="X1_left">Процентиль 75</td>
  <td class="X1_right">'.number_format(percentile($premium1,75),0,',',' ').'р.</td>
</tr>
<tr class="X1_1">
  <td class="X1_left">Процентиль 90</td>
  <td class="X1_right">'.number_format(percentile($premium1,90),0,',',' ').'р.</td>
</tr>
</table>
      <br>
';

$number=2;

if($out4!==null){
foreach($out4 as $premium_type => $table4){
    $page.="<h4>4.".$number." ".$premium_type."</h4><p class='table_title'>Таблица 4.".$number."</p>";
    $page.=$table4;
    $number++;
};
}

$page.='
<h3>5.	Базовые компенсации (Питание / Транспорт / Связь)</h3>
';

if($out5!==null)
{
   $number=1;
   foreach($out5 as $table5){$page.=$table5;}
}
else{$page.="<p>Процент людей, которым выплачиваются базовые компенсации - 0,00%</p>";}


$page.='
<h3>6.	Командировочные расходы</h3>
<p>Процент сотрудников, которых отправляют в служебные командировки: <strong>'.number_format($tab6[2],1).'%</strong></p>
';

if($tab6[2]!=0){
$page.='
<h4>6.1 Используемый тип транспорта</h4>
<p class="table_title">Таблица 6.1</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="50%"></th>
  <th width="30%"></th>
  <th width="20%">Доля сотрудников*</th>
</tr>
<tr class="X1_1"><td class="X1_left">Железнодорожный транспорт </td><td></td><td class="X1_right"><b>'.$tab6_1[1][1].'</b></td></tr>
<tr class="X1_0"><td></td><td class="X1_left">Плацкарт</td><td class="X1_right">'.$tab6_1[1][2].'</td></tr>
<tr class="X1_1"><td></td><td class="X1_left">Купе</td><td class="X1_right">'.$tab6_1[1][3].'</td></tr>
<tr class="X1_0"><td></td><td class="X1_left">Спальный люкс</td><td class="X1_right">'.$tab6_1[1][4].'</td></tr>
<tr class="X1_1"><td class="X1_left">Авиационный транспорт</td><td></td><td class="X1_right"><b>'.$tab6_1[2][1].'</b></td></tr>
<tr class="X1_0"><td></td><td class="X1_left">Бизнес-класс</td><td class="X1_right">'.$tab6_1[2][3].'</td></tr>
<tr class="X1_1"><td></td><td class="X1_left">Первый класс</td><td class="X1_right">'.$tab6_1[2][2].'</td></tr>
<tr class="X1_0"><td></td><td class="X1_left">Эконом-класс</td><td class="X1_right">'.$tab6_1[2][4].'</td></tr>
</table>
<br>

<h4>6.2 Проживание командированного</h4>
<p class="table_title">Таблица 6.2</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб.</th>
</tr>
<tr class="X1_1"><td class="X1_left">Европа / дальнее зарубежье</td><td class="X1_right">'.$tab6_2[1][1].'</td><td class="X1_right">'.$tab6_2[1][2].'</td></tr>
<tr class="X1_0"><td class="X1_left">Москва</td><td class="X1_right">'.$tab6_2[2][1].'</td><td class="X1_right">'.$tab6_2[2][2].'</td></tr>
<tr class="X1_1"><td class="X1_left">Россия</td><td class="X1_right">'.$tab6_2[3][1].'</td><td class="X1_right">'.$tab6_2[3][2].'</td></tr>
</table>
<br>

<h4>6.3 Суточные расходы в командировке</h4>
<p class="table_title">Таблица 6.3</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб./день</th>
</tr>
<tr class="X1_1"><td class="X1_left">суточные расходы, Европа / дальнее зарубежье</td><td class="X1_right">'.$tab6_3[1][1].'</td><td class="X1_right">'.$tab6_3[1][2].'</td></tr>
<tr class="X1_0"><td class="X1_left">суточные расходы, Москва</td><td class="X1_right">'.$tab6_3[2][1].'</td><td class="X1_right">'.$tab6_3[2][2].'</td></tr>
<tr class="X1_1"><td class="X1_left">суточные расходы, Россия</td><td class="X1_right">'.$tab6_3[3][1].'</td><td class="X1_right">'.$tab6_3[3][2].'</td></tr>
</table>
<br>

<h4>6.4 Транспортные расходы в командировке</h4>
<p class="table_title">Таблица 6.3</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб.</th>
</tr>
<tr class="X1_1"><td class="X1_left">Фиксированная сумма в Европе/дальнем зарубежье</td><td class="X1_right">'.$tab6_4[1][1].'</td><td class="X1_right">'.$tab6_4[1][2].'</td></tr>
<tr class="X1_0"><td class="X1_left">Фиксированная сумма в Москве</td><td class="X1_right">'.$tab6_4[2][1].'</td><td class="X1_right">'.$tab6_4[2][2].'</td></tr>
<tr class="X1_1"><td class="X1_left">Фиксированная сумма в России</td><td class="X1_right">'.$tab6_4[3][1].'</td><td class="X1_right">'.$tab6_4[3][2].'</td></tr>
</table>
<br>

<h4>6.5 Связь командированного</h4>
<p class="table_title">Таблица 6.5</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб.</th>
</tr>
<tr class="X1_1"><td class="X1_left">Мобильная связь</td><td class="X1_right">'.$tab6_5[1][1].'</td><td class="X1_right">'.$tab6_5[1][2].'</td></tr>
<tr class="X1_0"><td class="X1_left">Междугородняя связь</td><td class="X1_right">'.$tab6_5[2][1].'</td><td class="X1_right">'.$tab6_5[2][2].'</td></tr>
</table>
<br>
';
}

$page.='
<h3>7.	Кредитные практики и дисконтные программы</h3>

<h4>Кредиты</h4>
<p>Процент сотрудников, которым предоставляются кредиты: <strong>'.$tab7[2].'%</strong></p>
<p>Средняя суммарная величина выданных кредитов сотруднику за последний год: <strong>'.$tab7[3].' руб.</strong></p>
';
    if($tab7[2]!=0){
$page.='
<h4>7.1 Наличие условий кредитования</h4>
<p class="table_title">Таблица 7.1</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="50%"></th>
  <th width="30%"></th>
  <th width="20%">Доля сотрудников*</th>
</tr>
<tr class="X1_1"><td class="X1_left">Кредиты предоставляются при определенных условиях</td><td></td><td class="X1_right"><b>'.$tab7_1[1][1].'</b></td></tr>
<tr class="X1_0"><td></td><td class="X1_left">Стаж работы сотрудника в компании</td><td class="X1_right">'.$tab7_1[1][2].'</td></tr>
<tr class="X1_1"><td></td><td class="X1_left">Оклад сотрудника</td><td class="X1_right">'.$tab7_1[1][3].'</td></tr>
<tr class="X1_0"><td></td><td class="X1_left">Объект кредитования</td><td class="X1_right">'.$tab7_1[1][4].'</td></tr>
<tr class="X1_1"><td></td><td class="X1_left">Другой фактор</td><td class="X1_right">'.$tab7_1[1][5].'</td></tr>
<tr class="X1_0"><td class="X1_left">Кредиты предоставляются без условий</td><td></td><td class="X1_right"><b>'.$tab7_1[2][1].'</b></td></tr>
</table>
<br>

<h4>7.2 Виды кредитов</h4>
<p class="table_title">Таблица 7.2</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">Доля сотрудников*</th>
</tr>
<tr class="X1_1"><td class="X1_left">Кредит на покупку недвижимости</td><td class="X1_right">'.$tab7_2[1].'</td></tr>
<tr class="X1_0"><td class="X1_left">Кредит на покупку автомобиля</td><td class="X1_right">'.$tab7_2[2].'</td></tr>
<tr class="X1_1"><td class="X1_left">Кредит на покупку аудио-, видео-, бытовой, компьютерной техники</td><td class="X1_right">'.$tab7_2[3].'</td></tr>
<tr class="X1_0"><td class="X1_left">Кредит на оплату обучения</td><td class="X1_right">'.$tab7_2[4].'</td></tr>
<tr class="X1_1"><td class="X1_left">Прочие кредиты</td><td class="X1_right">'.$tab7_2[5].'</td></tr>
</table>
<br>

<h4>7.3 Процент по кредиту</h4>
<p class="table_title">Таблица 7.3</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">Доля сотрудников*</th>
</tr>
<tr class="X1_1"><td class="X1_left">Беспроцентный кредит</td><td class="X1_right">'.$tab7_3[1].'</td></tr>
<tr class="X1_0"><td class="X1_left">Процент по кредиту</td><td class="X1_right">'.$tab7_3[2].'</td></tr>
</table><br>
';
}

$page.='
<h3>8.	Страхование, здоровье, спорт</h3>

<h4>8.1 Негосударственное страхование</h4>
<p class="table_title">Таблица 8.1</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">Доля сотрудников</th>
   <th width="20%">Среднее значение затрат, руб.</th>
</tr>
<tr class="X1_1"><td class="X1_left">Негосударственное страхование жизни</td><td class="X1_right">'.$tab8_2[0][0].'</td><td class="X1_right">'.$tab8_2[0][1].'</td></tr>
<tr class="X1_0"><td class="X1_left">Негосударственное медицинское страхование</td><td class="X1_right">'.$tab8_2[1][0].'</td><td class="X1_right">'.$tab8_2[1][1].'</td></tr>
<tr class="X1_1"><td class="X1_left">Негосударственное пенсионное страхование</td><td class="X1_right">'.$tab8_2[2][0].'</td><td class="X1_right">'.$tab8_2[2][1].'</td></tr>
</table>
<br>

<h4>8.2 Медицинское обслуживание</h4>
<p class="table_title">Таблица 8.2</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">Доля сотрудников</th>
  <th width="20%">Среднее значение затрат, руб./мес.</th>
</tr>
';

$q_tab8_1=mysqli_query($link,"select * from base_compensations where type_id=31");

$col=1;

while($tab8_1=mysqli_fetch_array($q_tab8_1)){
$id=$tab8_1["id"];
$title=$tab8_1["title"];

$comp_keys8=array_keys($compensation_id,$id);
  foreach($comp_keys8 as $i => $key){
    if($sum[$key]!=0){
    $res8[$id][$i]=$sum[$key];
    }
  }

if($comp_people[$id]==0){
$tab8_perc="-";
}else{
$tab8_perc=number_format($comp_people[$id]/$people_sum*100,2)."%";
}

if($res8[$id]==0){
$tab8_rub="-";
}else{
$tab8_rub=number_format(average($res8[$id]),0,',',' ');
}

$page.='
<tr class="X1_'.$col.'"><td class="X1_left">'.$title.'</td><td class="X1_right">'.$tab8_perc.'</td><td class="X1_right">'.$tab8_rub.'</td></tr>
';
$col=1-$col;
}

$page.='
</table><br>

<h4>8.3 Дополнительная программа по беременности</h4>
<p class="table_title">Таблица 8.3</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">Доля сотрудников*</th>
</tr>
<tr class="X1_1"><td class="X1_left">Предоставление оплачиваемого декретного отпуска</td><td class="X1_right">'.$tab8_3[0].'</td></tr>
<tr class="X1_0"><td class="X1_left">Отпуск по беременности (до родов)</td><td class="X1_right">'.$tab8_3[1].'</td></tr>
<tr class="X1_1"><td class="X1_left">Отпуск по родам (после родов)</td><td class="X1_right">'.$tab8_3[2].'</td></tr>
</table>
<br>

<h4>8.4 Занятия спортом</h4>
<p class="table_title">Таблица 8.4</p>
<table border="0" class="X1">
<tr class="X1_0"><td class="X1_left">Процент сотрудников, которым оплачиваются занятия спортом: <strong>'.$tab8_4[0].'%</strong></td></tr>
<tr class="X1_1"><td class="X1_left">Среднее значение затрат компании на занятия спортом: <strong>'.$tab8_4[1].' руб.</strong></td></tr>
</table>
<br>


<h3>9. Обучение и развитие</h3>

<p>Процент сотрудников, которым оплачивается обучение: <strong>'.$tab9_1[0].'%</strong></p>
';

if($comp_people[208]!=0){
$page.='

<h4>9.1 Финансирование обучения сотрудника в компании</h4>
<p class="table_title">Таблица 9.1</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">Доля сотрудников*</th>
</tr>
<tr class="X1_1"><td class="X1_left">Существует лимитированный бюджет на обучение сотрудника</td><td class="X1_right">'.$tab9_2[0].'</td></tr>
<tr class="X1_0"><td class="X1_left">Бюджет на обучение сотрудника не резервируется, но деньги выделяются</td><td class="X1_right">'.$tab9_2[1].'</td></tr>
</table>
<br>

<h4>9.2 Бюджет на обучение сотрудника</h4>
<p class="table_title">Таблица 9.2</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">Среднее значение, руб.</th>
</tr>
<tr class="X1_1"><td class="X1_left">Затраты на обучение на эту должность</td><td class="X1_right">'.$tab9_3[0].'</td></tr>
<tr class="X1_0"><td class="X1_left">Размер бюджета на обучение одного сотрудника</td><td class="X1_right">'.$tab9_3[1].'</td></tr>
</table>
<br>

<h4>9.3 Политика обучения сотрудников в компании</h4>
<p class="table_title">Таблица 9.3</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">Доля сотрудников*</th>
</tr>
<tr class="X1_1"><td class="X1_left">Проводится обучение в рамках корпоративных программ развития (обучение, организуемое силами компании)</td><td class="X1_right">'.$tab9_4[0].'</td></tr>
<tr class="X1_0"><td class="X1_left">Компанией компенсируются затраты сотрудника на обучение</td><td class="X1_right">'.$tab9_4[1].'</td></tr>
</table>
<br>

<h4>9.4 Компенсируемые компанией формы обучения сотрудника</h4>
<p class="table_title">Таблица 9.4</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб./мес.</th>
</tr>
';

$q_tab9_5=mysqli_query($link,"select * from base_compensations where type_id=24");

$col=1;

while($tab9_5=mysqli_fetch_array($q_tab9_5)){
$id=$tab9_5["id"];
$title=$tab9_5["title"];

$comp_keys9=array_keys($compensation_id,$id);
  foreach($comp_keys9 as $i => $key){
    if($sum[$key]!=0){
    $res9[$id][$i]=$sum[$key];
    }
  }

if($comp_people[$id]==0){
$tab9_perc="-";
}else{
$tab9_perc=number_format($comp_people[$id]/$people_sum*100,2)."%";
}

if($res9[$id]==0){
$tab9_rub="-";
}else{
$tab9_rub=number_format(average($res9[$id]),0,',',' ');
}

$page.='
<tr class="X1_'.$col.'"><td class="X1_left">'.$title.'</td><td class="X1_right">'.$tab9_perc.'</td><td class="X1_right">'.$tab9_rub.'</td></tr>
';
$col=1-$col;
}
$page.='
</table>
<br>
';
 }
 
$page.='
<h3>10.	Отпуск</h3>

<h4>10.1 Продолжительность оплачиваемого отпуска (календарных дней)</h4>
<p class="table_title">Таблица 10.1</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">Доля сотрудников</th>
</tr>
';

$q_tab10_1=mysqli_query($link,"select * from base_compensation_politics where compensation_id=153");

$col=1;

while($tab10_1=mysqli_fetch_array($q_tab10_1)){
$id=$tab10_1["id"];
$title=$tab10_1["title"];

if($politics_people[$id]==0){
$tab10_1_perc="-";
}else{
$tab10_1_perc=number_format($politics_people[$id]/$comp_people[153]*100,2)."%";
}

$page.='
<tr class="X1_'.$col.'"><td class="X1_left">'.$title.'</td><td class="X1_right">'.$tab10_1_perc.'</td></tr>
';
$col=1-$col;
}

$page.='
</table><br>

<h4>10.2 Схема предоставления оплачиваемого отпуска</h4>
<p class="table_title">Таблица 10.2</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">Доля сотрудников</th>
</tr>
';

$q_tab10_2=mysqli_query($link,"select * from base_compensation_politics where compensation_id=154");

$col=1;

while($tab10_2=mysqli_fetch_array($q_tab10_2)){
$id=$tab10_2["id"];
$title=$tab10_2["title"];

if($politics_people[$id]==0){
$tab10_2_perc="-";
}else{
$tab10_2_perc=number_format($politics_people[$id]/$comp_people[154]*100,2)."%";
}

$page.='
<tr class="X1_'.$col.'"><td class="X1_left">'.$title.'</td><td class="X1_right">'.$tab10_2_perc.'</td></tr>
';
$col=1-$col;
}

$page.='
</table><br>
    
<h4>10.3 Основа расчета размера отпускных</h4>
<p class="table_title">Таблица 10.3</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">Доля сотрудников</th>
</tr>
';

$q_tab10_3=mysqli_query($link,"select * from base_compensation_politics where compensation_id=155");

$col=1;

while($tab10_3=mysqli_fetch_array($q_tab10_3)){
$id=$tab10_3["id"];
$title=$tab10_3["title"];

if($politics_people[$id]==0){
$tab10_3_perc="-";
}else{
$tab10_3_perc=number_format($politics_people[$id]/$comp_people[155]*100,2)."%";
}

$page.='
<tr class="X1_'.$col.'"><td class="X1_left">'.$title.'</td><td class="X1_right">'.$tab10_3_perc.'</td></tr>
';
$col=1-$col;
}

$page.='
</table>
<br>

<h3>11.	Праздники</h3>

<h4>11.1 Общегосударственные праздники</h4>
<p class="table_title">Таблица 11.1</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб./чел.</th>
</tr>
';

$q_tab11_1=mysqli_query($link,"select * from base_compensations where type_id=35");

$col=1;

while($tab11_1=mysqli_fetch_array($q_tab11_1)){
$id=$tab11_1["id"];
$title=$tab11_1["title"];

$comp_keys11_1=array_keys($compensation_id,$id);
  foreach($comp_keys11_1 as $i => $key){
    if($sum[$key]!=0){
    $res11[$id][$i]=$sum[$key];
    }
  }

if($comp_people[$id]==0){
$tab11_1_perc="-";
}else{
$tab11_1_perc=number_format($comp_people[$id]/$people_sum*100,2)."%";
}

if($res11[$id]==0){
$tab11_1_rub="-";
}else{
$tab11_1_rub=number_format(average($res11[$id]),0,',',' ');
}

$page.='
<tr class="X1_'.$col.'"><td class="X1_left">'.$title.'</td><td class="X1_right">'.$tab11_1_perc.'</td><td class="X1_right">'.$tab11_1_rub.'</td></tr>
';
$col=1-$col;
}

$page.='
</table><br>

<h4>11.2 Корпоративные праздники</h4>

<p>Общий бюджет корпоративных праздников: <strong>'.number_format($tab11_2[0][0],0,',',' ').' рублей</strong> на 1 сотрудника</p>
<p class="table_title">Таблица 11.2</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб./чел.</th>
</tr>
<tr class="X1_1"><td class="X1_left">День рождения компании</td><td class="X1_right">'.$tab11_2[1][0].'</td><td class="X1_right">'.$tab11_2[1][1].'</td></tr>
<tr class="X1_0"><td class="X1_left">Другие корпоративные праздники</td><td class="X1_right">'.$tab11_2[2][0].'</td><td class="X1_right">'.$tab11_2[2][1].'</td></tr>
</table>
<br>

<h4>11.3 Подарки к праздничному дню сотрудника</h4>
<p class="table_title">Таблица 11.3</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб./чел.</th>
</tr>
';

$q_tab11_3=mysqli_query($link,"select * from base_compensations where type_id=37");

$col=1;

while($tab11_3=mysqli_fetch_array($q_tab11_3)){
$id=$tab11_3["id"];
$title=$tab11_3["title"];

$comp_keys11_3=array_keys($compensation_id,$id);
  foreach($comp_keys11_3 as $i => $key){
    if($sum[$key]!=0){
    $res11[$id][$i]=$sum[$key];
    }
  }

if($comp_people[$id]==0){
$tab11_3_perc="-";
}else{
$tab11_3_perc=number_format($comp_people[$id]/$people_sum*100,2)."%";
}

if($res11[$id]==0){
$tab11_3_rub="-";
}else{
$tab11_3_rub=number_format(average($res11[$id]),0,',',' ');
}

$page.='
<tr class="X1_'.$col.'"><td class="X1_left">'.$title.'</td><td class="X1_right">'.$tab11_3_perc.'</td><td class="X1_right">'.$tab11_3_rub.'</td></tr>
';
$col=1-$col;
}

$page.='
</table>
<br>

<h3>Должностная инструкция '.$job_name_partitive.'</h3>

<table border="0" cellspacing="0" cellpadding="6">
';

if($job_other_name<>""){$page.='
<tr><td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Другие названия должности:</strong></em></td>
<td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_other_name.'</td></tr>
 ';}

if($job_conform<>""){$page.='
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Подчиняется:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_conform.'</td>
  </tr>
';}

if($job_subordinate<>""){$page.='
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Подчинённые:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_subordinate.'</td>
  </tr>
';}

if($job_purpose<>""){$page.='
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Цель:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_purpose.'</td>
  </tr>
';}

if($job_mission<>""){$page.='
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Задачи:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_mission.'</td>
  </tr>
';}

if($job_func<>""){$page.='
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Функции:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_func.'</td>
  </tr>
';}

if($job_experience<>""){$page.='
  <tr>
    <td width="200" align="right" valign="top"><em><strong>Требования к опыту и квалификации:</strong></em></td>
    <td valign="top">'.$job_experience.'</td>
  </tr>
';}

$page.='
</table>
';

//Запись в файл
$fullpath=$filedir.$filename_html;
$file = fopen ("$fullpath","w+");
fputs ( $file, $page);
fclose ($file);
?>