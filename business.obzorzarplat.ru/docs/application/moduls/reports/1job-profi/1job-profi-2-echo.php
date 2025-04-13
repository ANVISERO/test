<p><span>1. <a href="?step=1">Выбор параметров для формирования отчета</a> &raquo;</span><span> 2. Отчет &raquo;</span></p>

<h2>Аналитический обзор заработной платы <?php echo($job_name_partitive.' '.$city_name_partitive);?></h2>

<p>Характеристика компаний:</p>
<ul>
    <li>Сфера деятельности компании: <em><?php echo($sphere_name);?></em></li>
    <li>Количество сотрудников в компании: <em><?php echo($personal_name);?></em></li>
    <li>Оборот компании: <em><?php echo($turnover_name);?> млн. руб. в год</em></li>
</ul>
<p>Все данные представлены в российских рублях <b>до выплаты налогов (gross)</b></p>
<p>Дата последнего обновления данных по выбранной должности: <b><?php echo($dateUpdateMax.' года');?></b></p>

<p align="right"><a href="/archive/html.php?d=<?php echo($url);?>" target="_blank">Версия для печати &raquo;</a>|
<img src="/_img/report-excel.png" alt="отчет в формате Excel" title="отчет в формате Excel"><a href="<?php echo($url_xls);?>">отчет в формате Excel</a></p>


<p><a class="link-h3" href="">1. Структура денежного вознаграждения</a></p>
<div>

<!--1.1 Распределение шкалированной оценки заработной платы (руб. в месяц)-->

<h4>1.1 Распределение шкалированной оценки заработной платы (руб. в месяц)</h4>
<p>Заработная плата включает в себя оклад, надбавки, доплаты, премии и бонусы.</p>
<p class="table_name">Таблица 1.1.1</p>
<table class="business">
<tr>
  <th>Интервалы значений заработной платы, тыс. руб.</th>
  <th>Количество сотрудников (% от общего числа сотрудников)</th>
</tr>

<?php
foreach($sal_print as $key => $sal){
    echo("<tr><td>".$key."</td><td>".number_format($sal,1)."%</td></tr>");
}
?>

</table>

<p align="center"><img src="<?php echo($img_src_salary); ?>" alt="Должностной оклад" /></p>
<p class="img_name">Рисунок 1.1.1 Распределение шкалированной оценки заработной платы, руб./месяц</p>

<!--1.2 Распределение шкалированной оценки компенсации труда (руб. в месяц)-->
<h4>1.2 Распределение шкалированной оценки компенсации труда (руб. в месяц)</h4>
<p class="table_name">Таблица 1.2.1</p>
<table class="business">
<tr>
  <th>Интервалы значений компенсации труда, тыс. руб.</th>
  <th>Количество сотрудников (% от общего числа сотрудников)</th>
</tr>

<?php
foreach($cash_print as $key => $cash1){
    echo("<tr><td>".$key."</td><td>".number_format($cash1,1)."%</td></tr>");
}
?>

</table>
<p align="center"><img src="<?php echo($img_src_cash); ?>" alt="Должностной оклад" /></p>
<p class="img_name">Рисунок 1.2.1 Распределение шкалированной оценки компенсации труда, руб./месяц</p>

<!--1.3	Среднемесячные значения статей компенсации труда (руб. в месяц)-->
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
  <td><?=$cash_indexes[0];?></td>
  <td><?=$cash_indexes[1];?></td>
  <td><?=$cash_indexes[2];?></td>
  <td><?=$cash_indexes[3];?></td>
  <td><?=$cash_indexes[4];?></td>
  <td><?=$cash_indexes[5];?></td>
</tr>
<tr>
  <th>Заработная плата</th>
  <td><?=$salary_indexes[0];?></td>
  <td><?=$salary_indexes[1];?></td>
  <td><?=$salary_indexes[2];?></td>
  <td><?=$salary_indexes[3];?></td>
  <td><?=$salary_indexes[4];?></td>
  <td><?=$salary_indexes[5];?></td>
</tr>
<tr>
  <th>Должностной оклад</th>
  <td><?=$base_indexes[0];?></td>
  <td><?=$base_indexes[1];?></td>
  <td><?=$base_indexes[2];?></td>
  <td><?=$base_indexes[3];?></td>
  <td><?=$base_indexes[4];?></td>
  <td><?=$base_indexes[5];?></td>
</tr>
<tr>
  <th>Премии</th>
  <td><?=$premium_indexes[0];?></td>
  <td><?=$premium_indexes[1];?></td>
  <td><?=$premium_indexes[2];?></td>
  <td><?=$premium_indexes[3];?></td>
  <td><?=$premium_indexes[4];?></td>
  <td><?=$premium_indexes[5];?></td>
</tr>
<tr>
  <th>Бонусы</th>
  <td><?=$bonus_indexes[0];?></td>
  <td><?=$bonus_indexes[1];?></td>
  <td><?=$bonus_indexes[2];?></td>
  <td><?=$bonus_indexes[3];?></td>
  <td><?=$bonus_indexes[4];?></td>
  <td><?=$bonus_indexes[5];?></td>
</tr>
<tr>
  <th>Бенефиты</th>
  <td><?=$compensation_indexes[0];?></td>
  <td><?=$compensation_indexes[1];?></td>
  <td><?=$compensation_indexes[2];?></td>
  <td><?=$compensation_indexes[3];?></td>
  <td><?=$compensation_indexes[4];?></td>
  <td><?=$compensation_indexes[5];?></td>
</tr>
</table>

<?php
$chl_cash=$salary_indexes[0].'|'.$salary_indexes[1].'|'.$salary_indexes[2].'|'.$salary_indexes[4].'|'.$salary_indexes[5];
$size='700x250';
$image_src_cash='http://chart.apis.google.com/chart?chxt=x,x,y,y&chof=gif&cht=bvs&chbh=40,30&chco=800080|6B8E23|00A5C6|FF1493|FF7F50&chd=t:10,25,50,25,10&chxl=0:|'.$chl_cash.'|1:|'.iconv('windows-1251','utf-8','Заработная плата, руб./мес.').'|3:|'.iconv('windows-1251', 'utf-8', 'Количество сотрудников, %').'&chxp=1,50|3,50&chs='.$size.'&chdl='.iconv('windows-1251', 'utf-8', '10 процентиль|25 процентиль|50 процентиль|75 процентиль|90 процентиль');
?>

<p align="center"><img src="<?php echo($image_src_cash); ?>" alt="Заработная плата" /></p>
<p class="img_name">Рисунок 1.3.1 Заработная плата <?php echo($job_name_partitive); ?>, руб./мес.</p>

<p align="right"><a href="" class="close-block">свернуть</a></p>
</div>

<p><a class="link-h3" href="">2. Политика выплат</a></p>
<div>
<h4>2.1 Метод выплат заработной платы.</h4>
<p class="table_name">Таблица 2.1</p>
<table class="business">
<tr>
  <th width="80%"></th>
  <th width="20%">Доля сотрудников</th>
</tr>

<?php echo $table2_1; ?>

</table>

<h4>2.2 Периодичность выплат заработной платы</h4>
<p class="table_name">Таблица 2.2</p>
<table class="business">
<tr>
  <th width="80%"></th>
  <th width="20%">Доля сотрудников</th>
</tr>
<?php echo $table2_1; ?>
</table>

<h4>2.3 Частота пересмотра заработной платы</h4>
<p class="table_name">Таблица 2.3</p>
<table class="business">
<tr>
  <th width="80%"></th>
  <th width="20%">Доля сотрудников</th>
</tr>
<?=$table2_3; ?>
</table>

<h4>2.4 Валютная политика выплаты заработной платы</h4>
<p class="table_name">Таблица 2.4</p>
<table class="business">
<tr >
  <th width="80%"></th>
  <th width="20%">Доля сотрудников</th>
</tr>
<?=$table2_4; ?>
</table>

<p align="right"><a href="" class="close-block">свернуть</a></p>
</div>

<!--3	Компенсационные и стимулирующие выплаты-->
<p><a class="link-h3" href="">3.	Компенсационные и стимулирующие выплаты</a></p>
<div>
<?php
if($out3!==null){foreach($out3 as $table3){echo $table3;}}
else{echo("<p>Процент людей, которым выплачиваются компенсационные и стимулирующие выплаты - 0,00%</p>");}
?>
    <p align="right"><a href="" class="close-block">свернуть</a></p>
</div>
<!--Конец компенсационных и стимулирующих выплат-->

<!--4	Премии-->
<p><a class="link-h3" href="">4. Премии</a></p>
<div>
<?php
if($out4!==null){
$number=1;

foreach($out4 as $premium_type => $table4){

//$zag4=mysqli_result(mysqli_query($link,"select title from base_premium_types where id in(select type_id from base_premium_titles where id='$title_id')"),0,0);

echo("<h4>4.".$number." ".$premium_type."</h4>");
echo('<p class="table_title">Таблица 4.'.$number.'</p>');
echo($table4);

$number++;
};
}
?>
<p align="right"><a href="" class="close-block">свернуть</a></p>
</div>
<!--Конец премий-->

<!--5	Базовые компенсации (Питание / Транспорт / Связь)-->
<p><a class="link-h3" href="">5. Базовые компенсации (Питание / Транспорт / Связь)</a></p>
<div>
<?php
if($out5!==null){foreach($out5 as $table5){echo $table5;}}
else{echo("<p>Процент людей, которым выплачиваются базовые компенсации - 0,00%</p>");}
?>
    <p align="right"><a href="" class="close-block">свернуть</a></p>
</div><!--/zp5-->

<!--6	Командировочные расходы.-->
<p><a class="link-h3" href="">6. Командировочные расходы</a></p>
<div>
<p>Процент сотрудников, которых отправляют в служебные командировки: <strong><?=number_format($tab6[2],1);?>%</strong></p>

<?php
if($tab6[2]!=0){
?>
<h4>6.1 Используемый тип транспорта</h4>
<p class="table_title">Таблица 6.2</p>
<table width="100%" border="0" >
<tr >
  <th width="50%"></th>
  <th width="30%"></th>
  <th width="20%">Доля сотрудников*</th>
</tr>
<tr ><td >Железнодорожный транспорт </td><td></td><td ><b><?=$tab6_1[1][1];?></b></td></tr>
<tr ><td></td><td >Плацкарт</td><td ><?=$tab6_1[1][2];?></td></tr>
<tr ><td></td><td >Купе</td><td ><?=$tab6_1[1][3];?></td></tr>
<tr ><td></td><td >Спальный люкс</td><td ><?=$tab6_1[1][4];?></td></tr>
<tr ><td >Авиационный транспорт</td><td></td><td ><b><?=$tab6_1[2][1];?></b></td></tr>
<tr ><td></td><td >Бизнес-класс</td><td ><?=$tab6_1[2][3];?></td></tr>
<tr ><td></td><td >Первый класс</td><td ><?=$tab6_1[2][2];?></td></tr>
<tr ><td></td><td >Эконом-класс</td><td ><?=$tab6_1[2][4];?></td></tr>
</table>

<p>* Доля участников исследования, удовлетворяющих условиям, установленным клиентом (должность, город, сфера деятельности компании, оборот компании)</p>

<h4>6.2 Проживание командированного</h4>
<p class="table_title">Таблица 6.2</p>
<table border="0" >
<tr >
  <th width="60%"></th>
  <th width="20%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб.</th>
</tr>
<tr ><td >Европа / дальнее зарубежье</td><td ><?=$tab6_2[1][1];?></td><td ><?php echo($tab6_2[1][2]);?></td></tr>
<tr ><td >Москва</td><td ><?=$tab6_2[2][1];?></td><td ><?php echo($tab6_2[2][2]);?></td></tr>
<tr ><td >Россия</td><td ><?=$tab6_2[3][1];?></td><td ><?php echo($tab6_2[3][2]);?></td></tr>
</table>
<br>

<h4>6.3 Суточные расходы в командировке</h4>
<p class="table_title">Таблица 6.3</p>
<table border="0" >
<tr >
  <th width="60%"></th>
  <th width="20%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб./день</th>
</tr>
<tr ><td >суточные расходы, Европа / дальнее зарубежье</td><td ><?=$tab6_3[1][1];?></td><td ><?php echo($tab6_3[1][2]);?></td></tr>
<tr ><td >суточные расходы, Москва</td><td ><?=$tab6_3[2][1];?></td><td ><?php echo($tab6_3[2][2]);?></td></tr>
<tr ><td >суточные расходы, Россия</td><td ><?=$tab6_3[3][1];?></td><td ><?php echo($tab6_3[3][2]);?></td></tr>
</table>

<h4>6.4 Транспортные расходы в командировке</h4>
<p class="table_title">Таблица 6.4</p>
<table border="0" >
<tr >
  <th width="60%"></th>
  <th width="20%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб.</th>
</tr>
<tr ><td >Фиксированная сумма в Европе/дальнем зарубежье</td><td ><?=$tab6_4[1][1];?></td><td ><?php echo($tab6_4[1][2]);?></td></tr>
<tr ><td >Фиксированная сумма в Москве</td><td ><?=$tab6_4[2][1];?></td><td ><?php echo($tab6_4[2][2]);?></td></tr>
<tr ><td >Фиксированная сумма в России</td><td ><?=$tab6_4[3][1];?></td><td ><?php echo($tab6_4[3][2]);?></td></tr>
</table>
<br>

<h4>6.5 Связь командированного</h4>
<p class="table_title">Таблица 6.5</p>
<table border="0" >
<tr >
  <th width="60%"></th>
  <th width="20%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб.</th>
</tr>
<tr ><td >Мобильная связь</td><td ><?=$tab6_5[1][1];?></td><td ><?php echo($tab6_5[1][2]);?></td></tr>
<tr ><td >Междугородняя связь</td><td ><?=$tab6_5[2][1];?></td><td ><?php echo($tab6_5[2][2]);?></td></tr>
</table>

<?php
}
?>
<p align="right"><a href="" class="close-block">свернуть</a></p>
</div><!--/zp6-->

<!--7	Кредитные практики и дисконтные программы.-->
<p><a class="link-h3" href="">7. Кредитные практики и дисконтные программы</a></p>
<div>
<h4>Кредиты</h4>
<p>Процент сотрудников, которым предоставляются кредиты: <strong><?php echo($tab7[2]);?>%</strong></p>
<p>Средняя суммарная величина выданных кредитов сотруднику за последний год: <strong><?php echo($tab7[3]);?> руб.</strong></p>

<?php
    if($tab7[2]!=0){
?>

<h4>7.1 Наличие условий кредитования</h4>
<p class="table_title">Таблица 7.1</p>
<table border="0">
<tr>
  <th width="50%"></th>
  <th width="30%"></th>
  <th width="20%">Доля сотрудников*</th>
</tr>
<tr><td >Кредиты предоставляются при определенных условиях</td><td></td><td ><b><?=$tab7_1[1][1];?></b></td></tr>
<tr><td></td><td >Стаж работы сотрудника в компании</td><td ><?=$tab7_1[1][2];?></td></tr>
<tr><td></td><td >Оклад сотрудника</td><td ><?=$tab7_1[1][3];?></td></tr>
<tr><td></td><td >Объект кредитования</td><td ><?=$tab7_1[1][4];?></td></tr>
<tr><td></td><td >Другой фактор</td><td ><?=$tab7_1[1][5];?></td></tr>
<tr><td >Кредиты предоставляются без условий</td><td></td><td ><b><?=$tab7_1[2][1];?></b></td></tr>
</table>

<h4>7.2 Виды кредитов</h4>
<p class="table_title">Таблица 7.2</p>
<table border="0">
<tr>
  <th width="80%"></th>
  <th width="20%">Доля сотрудников*</th>
</tr>
<tr><td >Кредит на покупку недвижимости</td><td ><?=$tab7_2[1];?></td></tr>
<tr><td >Кредит на покупку автомобиля</td><td ><?=$tab7_2[2];?></td></tr>
<tr><td >Кредит на покупку аудио-, видео-, бытовой, компьютерной техники</td><td ><?=$tab7_2[3];?></td></tr>
<tr><td >Кредит на оплату обучения</td><td ><?=$tab7_2[4];?></td></tr>
<tr><td >Прочие кредиты</td><td ><?=$tab7_2[5];?></td></tr>
</table>

<h4>7.3 Процент по кредиту</h4>
<p class="table_title">Таблица 7.3</p>
<table border="0" >
<tr >
  <th width="80%"></th>
  <th width="20%">Доля сотрудников*</th>
</tr>
<tr ><td >Беспроцентный кредит</td><td ><?=$tab7_3[1];?></td></tr>
<tr ><td >Процент по кредиту</td><td ><?=$tab7_3[2];?></td></tr>
</table><br>

<?php
}
?>
<p align="right"><a href="" class="close-block">свернуть</a></p>
</div><!--/zp7-->

<!--8	Страхование, здоровье, спорт.-->
<p><a class="link-h3" href="">8. Страхование, здоровье, спорт</a></p>
<div>
<h4>8.1 Негосударственное страхование</h4>
<p class="table_title">Таблица 8.1</p>
<table border="0">
<tr>
  <th width="60%"></th>
  <th width="20%">Доля сотрудников</th>
   <th width="20%">Среднее значение затрат, руб.</th>
</tr>
<tr><td>Негосударственное страхование жизни</td><td ><?=$tab8_2[0][0];?></td><td ><?php echo($tab8_2[0][1]);?></td></tr>
<tr><td>Негосударственное медицинское страхование</td><td ><?=$tab8_2[1][0];?></td><td ><?php echo($tab8_2[1][1]);?></td></tr>
<tr><td>Негосударственное пенсионное страхование</td><td ><?=$tab8_2[2][0];?></td><td ><?php echo($tab8_2[2][1]);?></td></tr>
</table>

<h4>8.2 Медицинское обслуживание</h4>
<p class="table_title">Таблица 8.2</p>
<table border="0" >
<tr >
  <th width="60%"></th>
  <th width="20%">Доля сотрудников</th>
  <th width="20%">Среднее значение затрат, руб./мес.</th>
</tr>

<?php
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

echo('
<tr class="X1_'.$col.'"><td >'.$title.'</td><td >'.$tab8_perc.'</td><td >'.$tab8_rub.'</td></tr>
');
$col=1-$col;
}
?>

</table>

<h4>8.3 Дополнительная программа по беременности</h4>
<p class="table_title">Таблица 8.3</p>
<table border="0" >
<tr >
  <th width="80%"></th>
  <th width="20%">Доля сотрудников*</th>
</tr>
<tr ><td >Предоставление оплачиваемого декретного отпуска</td><td ><?php echo($tab8_3[0]);?></td></tr>
<tr ><td >Отпуск по беременности (до родов)</td><td ><?php echo($tab8_3[1]);?></td></tr>
<tr ><td >Отпуск по родам (после родов)</td><td ><?php echo($tab8_3[2]);?></td></tr>
</table>

<h4>8.4 Занятия спортом</h4>
<p class="table_title">Таблица 8.3</p>
<table border="0" >
<tr ><td >Процент сотрудников, которым оплачиваются занятия спортом: <strong><?php echo($tab8_4[0]);?>%</strong></td></tr>
<tr ><td >Среднее значение затрат компании на занятия спортом: <strong><?php echo($tab8_4[1]);?> руб.</strong></td></tr>
</table>
<p align="right"><a href="" class="close-block">свернуть</a></p>
</div> <!--/zp8-->

<!--9	Обучение и развитие.-->
<p><a class="link-h3" href="">9. Обучение и развитие</a></p>
<div>
<p>Процент сотрудников, которым оплачивается обучение: <strong><?php echo($tab9_1[0]);?>%</strong></p>

<?php
if($comp_people[208]!=0){
?>

<h4>9.1 Финансирование обучения сотрудника в компании</h4>
<p class="table_title">Таблица 9.1</p>
<table border="0" >
<tr >
  <th width="80%"></th>
  <th width="20%">Доля сотрудников*</th>
</tr>
<tr ><td >Существует лимитированный бюджет на обучение сотрудника</td><td ><?php echo($tab9_2[0]);?></td></tr>
<tr ><td >Бюджет на обучение сотрудника не резервируется, но деньги выделяются</td><td ><?php echo($tab9_2[1]);?></td></tr>
</table>

<h4>9.2 Бюджет на обучение сотрудника</h4>
<p class="table_title">Таблица 9.2</p>
<table border="0" >
<tr >
  <th width="80%"></th>
  <th width="20%">Среднее значение, руб.</th>
</tr>
<tr ><td >Затраты на обучение на эту должность</td><td ><?php echo($tab9_3[0]);?></td></tr>
<tr ><td >Размер бюджета на обучение одного сотрудника</td><td ><?php echo($tab9_3[1]);?></td></tr>
</table>

<h4>9.3 Политика обучения сотрудников в компании</h4>
<p class="table_title">Таблица 9.3</p>
<table border="0" >
<tr >
  <th width="80%"></th>
  <th width="20%">Доля сотрудников*</th>
</tr>
<tr ><td >Проводится обучение в рамках корпоративных программ развития (обучение, организуемое силами компании)</td><td ><?php echo($tab9_4[0]);?></td></tr>
<tr ><td >Компанией компенсируются затраты сотрудника на обучение</td><td ><?php echo($tab9_4[1]);?></td></tr>
</table>

<h4>9.4 Компенсируемые компанией формы обучения сотрудника</h4>
<p class="table_title">Таблица 9.3</p>
<table border="0" >
<tr >
  <th width="60%"></th>
  <th width="20%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб./мес.</th>
</tr>
<?php
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

echo('
<tr class="X1_'.$col.'"><td >'.$title.'</td><td >'.$tab9_perc.'</td><td >'.$tab9_rub.'</td></tr>
');
$col=1-$col;
}
?>

</table>
<?php } ?>
<p align="right"><a href="" class="close-block">свернуть</a></p>
</div><!--/zp9-->

<!--10	Отпуск.-->
<p><a class="link-h3" href="">10. Отпуск</a></p>
<div>
<h4>10.1 Продолжительность оплачиваемого отпуска (календарных дней)</h4>
<p class="table_title">Таблица 10.1</p>
<table border="0" >
<tr >
  <th width="80%"></th>
  <th width="20%">Доля сотрудников</th>
</tr>

<?php
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

echo('
<tr class="X1_'.$col.'"><td >'.$title.'</td><td >'.$tab10_1_perc.'</td></tr>
');
$col=1-$col;
}
?>

</table>

<h4>10.2 Схема предоставления оплачиваемого отпуска</h4>
<p class="table_title">Таблица 10.2</p>
<table border="0" >
<tr >
  <th width="80%"></th>
  <th width="20%">Доля сотрудников</th>
</tr>

<?php
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

echo('
<tr class="X1_'.$col.'"><td >'.$title.'</td><td >'.$tab10_2_perc.'</td></tr>
');
$col=1-$col;
}
?>

</table>
    
<h4>10.3 Основа расчета размера отпускных</h4>
<p class="table_title">Таблица 10.3</p>
<table border="0" >
<tr >
  <th width="80%"></th>
  <th width="20%">Доля сотрудников</th>
</tr>

<?php
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

echo('
<tr class="X1_'.$col.'"><td >'.$title.'</td><td >'.$tab10_3_perc.'</td></tr>
');
$col=1-$col;
}
?>

</table>
<p align="right"><a href="" class="close-block">свернуть</a></p>
</div><!--/zp10-->

<!--11	Праздники.-->
<p><a class="link-h3" href="">11. Праздники</a></p>
<div>
<h4>11.1 Общегосударственные праздники</h4>
<p class="table_title">Таблица 11.1</p>
<table border="0" >
<tr >
  <th width="60%"></th>
  <th width="20%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб./чел.</th>
</tr>

<?php
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

echo('
<tr class="X1_'.$col.'"><td >'.$title.'</td><td >'.$tab11_1_perc.'</td><td >'.$tab11_1_rub.'</td></tr>
');
$col=1-$col;
}
?>

</table>

<h4>11.2 Корпоративные праздники</h4>

<p>Общий бюджет корпоративных праздников: <strong><?=number_format($tab11_2[0][0],0,',',' ');?> рублей</strong> на 1 сотрудника</p>
<p class="table_title">Таблица 11.2</p>
<table border="0" >
<tr >
  <th width="60%"></th>
  <th width="20%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб./чел.</th>
</tr>
<tr ><td >День рождения компании</td><td ><?php echo($tab11_2[1][0]);?></td><td ><?php echo($tab11_2[1][1]);?></td></tr>
<tr ><td >Другие корпоративные праздники</td><td ><?php echo($tab11_2[2][0]);?></td><td ><?php echo($tab11_2[2][1]);?></td></tr>
</table>
<br>

<h4>11.3 Подарки к праздничному дню сотрудника</h4>
<p class="table_title">Таблица 11.3</p>
<table border="0" >
<tr >
  <th width="60%"></th>
  <th width="20%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб./чел.</th>
</tr>

<?php
$q_tab11_3=mysqli_query($link,"select id,title from base_compensations where type_id=37");

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

echo('
<tr><th>'.$title.'</th><td>'.$tab11_3_perc.'</td><td>'.$tab11_3_rub.'</td></tr>
');
}
?>

</table>
<p align="right"><a href="" class="close-block">свернуть</a></p>
</div><!--/zp11-->

<!--Описание должности-->
<p><a class="link-h3" href="">Должностная инструкция <?php echo($job_name_partitive);?></a></p>
<div>
<table border="0" cellspacing="0" cellpadding="6">

<?php
if($job_other_name<>""){echo('
<tr><th width="10%">Другие названия должности:</th>
<td>'.$job_other_name.'</td></tr>
 ');}

if($job_conform<>""){echo('
  <tr>
    <th>Подчиняется:</th>
    <td>'.$job_conform.'</td>
  </tr>
');}

if($job_subordinate<>""){echo('
  <tr>
    <th>Подчинённые:</th>
    <td>'.$job_subordinate.'</td>
  </tr>
');}

if($job_purpose<>""){echo('
  <tr>
    <th>Цель:</th>
    <td>'.$job_purpose.'</td>
  </tr>
');}

if($job_mission<>""){echo('
  <tr>
    <th>Задачи:</th>
    <td>'.$job_mission.'</td>
  </tr>
');}

if($job_func<>""){echo('
  <tr>
    <th>Функции:</th>
    <td>'.$job_func.'</td>
  </tr>
');}

if($job_experience<>""){echo('
  <tr>
    <th>Требования к опыту и квалификации:</td>
    <td>'.$job_experience.'</td>
  </tr>
');
}
?>

</table>
    <p align="right"><a href="" class="close-block">свернуть</a></p>
</div><!--/zp12-->
<p><input type="button" value="&laquo; Новый отчет" class="submit" onclick="self.location.href='?step=1'"></p>