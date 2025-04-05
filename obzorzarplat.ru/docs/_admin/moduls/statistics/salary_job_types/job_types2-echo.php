<script type="text/javascript">
    $(document).ready(function(){
    //toggle message body
    $(".hide").hide();
    $(".down h2").click(function()
    {
        $(this).next('div').slideToggle(400);
        return false;
    });

});
</script>

<table width="100%" border="0">
<tr>
<td align="right" width="30%">Должности:</td>
<td width="70%"><ul><?php echo $job_names; ?></ul></td>
</tr>
<tr>
<td align="right">Уровень должности:</td>
<td width="50%"><b><?php echo $jgroup_name;?></b></td>
</tr>
<tr>
<td align="right">Город:</td>
<td width="50%"><ul><?php echo $city_names; ?></ul></td>
</tr>
<tr>
<td align="right">Год:</td>
<td width="50%"><ul><?php echo $date_name; ?></ul></td>
</tr>
<tr>
<td align="right">Количество анкет:</td>
<td width="50%"><b><?php echo $people_sum; ?></b></td>
</tr>
<tr>
    <td></td>
  <td>
	<input type="button" class="submit" value="&laquo; назад"
               onclick="self.location.href='?page=statistics-job-types&step=1'">
  </td>
</tr>
</table>
<br>

<ul id="nav">
    <li class="down"><h2>1. Структура денежного вознаграждения</h2>
    <div class="report_body">
<?php
if($step['12']=="1"){
?>

<br>
<?php
}
if($step['1']==1 OR $step['12']==1){
?>
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

<?php
}
echo $copyright;
?>
    </div>
    </li>
    <li class="down"><h2>2. Политика выплат »</h2>
    <div class="report_body hide">
        <?php
        if($step['2']=="1"){
?>
<h3>2.1 Метод выплат оклада.</h3>
<table width="100%" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%" class="X1_right">Доля сотрудников</th>
</tr>

<?php
$color=1;
foreach($payment as $k=>$pay) {
  echo("<tr class='X1_".$color."'><td class='X1_left'>".$k."</td><td class='X1_right'>".number_format($pay,1)." % </td></tr>");
  $color=1-$color;
}
?>
</table>

<h3>2.2 Периодичность выплат оклада.</h3>
<table width="100%" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%" class="X1_right">Доля сотрудников</th>
</tr>

<?php
$color=1;
foreach($period as $k=>$pd) {
  echo("<tr class='X1_".$color."'><td class='X1_left'>".$k."</td><td class='X1_right'>".number_format($pd,1)." % </td></tr>");
  $color=1-$color;
}
?>

</table>

<h3>2.3 Частота пересмотра окладов.</h3>
<table width="100%" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%" class="X1_right">Доля сотрудников</th>
</tr>

<?
$color=1;
foreach($freq as $k=>$fr) {
  echo("<tr class='X1_".$color."'><td class='X1_left'>".$k."</td><td class='X1_right'>".number_format($fr,1)." % </td></tr>");
  $color=1-$color;
}
?>
</table>

<h3>2.4 Валютная политика выплаты окладов</h3>
<table width="100%" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%" class="X1_right">Доля сотрудников</th>
</tr>

<?php
$color=1;
foreach($currency as $k=>$cur) {
  echo("<tr class='X1_".$color."'><td class='X1_left'>".$k."</td><td class='X1_right'>".number_format($cur,1)." % </td></tr>");
  $color=1-$color;
}
?>
</table>
<?php }
echo $copyright;
?>
    </div>
    </li>
    <!--3 Компенсационные и стимулирующие выплаты-->
    <li class="down"><h2>3. Компенсационные и стимулирующие выплаты »</h2>
    <div class="report_body hide">
        <?php
        if($step['3']=="1"){
            foreach($out3 as $table3){echo $table3;};
        }
        echo $copyright;
        ?>
    </div>
    </li>
    <!--Конец компенсационных и стимулирующих выплат-->

    <!--4 Премии-->
    <li class="down"><h2>4. Премии  »</h2>
    <div class="report_body hide">
        <?php
        if($step['4']=="1"){
            $number=1;
            foreach($out4 as $premium_type => $table4){
                echo("<h3>4.".$number." ".$premium_type."</h3>");
                echo($table4);
                echo("<br>");
                $number++;
            };
            echo $copyright;
        }
        ?>
    </div>
    </li>
    <!--Конец премий-->

    <!--5. Базовые компенсации (Питание / Транспорт / Связь)-->
    <li class="down"><h2>5.	Базовые компенсации (Питание / Транспорт / Связь) &raquo;</h2>
    <div class="report_body hide">
        <?php
        if($step['5']=="1"){
            foreach($out5 as $table5){echo $table5;};
            echo $copyright;
        }
        ?>
    </div>
    </li>
    <!--Конец базовых компенсаций (Питание / Транспорт / Связь)-->

    <!--6.	Командировочные расходы-->
    <li class="down"><h2>6. Командировочные расходы</h2>
    <div class="report_body hide">
        <?php
        if($step['6']=="1"){
            ?>
        <h3>Служебные командировки.</h3>
<p><strong>Процент сотрудников, которых отправляют в служебные командировки: <?php echo number_format($tab6[2],2);?>% </strong></p>

<?php
if($tab6[2]!=0){
?>
<h3>6.1 Используемый тип транспорта</h3>
<table width="100%" border="0" class="X1">
<tr class="X1_0">
  <th width="50%"></th>
  <th width="30%"></th>
  <th width="20%">Доля сотрудников*</th>
</tr>
<tr class="X1_1"><td class="X1_left">Железнодорожный транспорт </td><td></td><td class="X1_right"><b><?php echo $tab6_1[1][1];?></b></td></tr>
<tr class="X1_0"><td></td><td class="X1_left">Плацкарт</td><td class="X1_right"><?php echo $tab6_1[1][2];?></td></tr>
<tr class="X1_1"><td></td><td class="X1_left">Купе</td><td class="X1_right"><?php echo $tab6_1[1][3];?></td></tr>
<tr class="X1_0"><td></td><td class="X1_left">Спальный люкс</td><td class="X1_right"><?php echo $tab6_1[1][4];?></td></tr>
<tr class="X1_1"><td class="X1_left">Авиационный транспорт</td><td></td><td class="X1_right"><b><?php echo $tab6_1[2][1];?></b></td></tr>
<tr class="X1_0"><td></td><td class="X1_left">Бизнес-класс</td><td class="X1_right"><?php echo $tab6_1[2][3];?></td></tr>
<tr class="X1_1"><td></td><td class="X1_left">Первый класс</td><td class="X1_right"><?php echo $tab6_1[2][2];?></td></tr>
<tr class="X1_0"><td></td><td class="X1_left">Эконом-класс</td><td class="X1_right"><?php echo $tab6_1[2][4];?></td></tr>
</table>
<br>

<p>* Доля участников исследования, удовлетворяющих условиям, установленным клиентом (должность, город, сфера деятельности компании, оборот компании)</p>

<h3>6.2 Проживание командированного</h3>
<table width="100%" border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб.</th>
</tr>
<tr class="X1_1"><td class="X1_left">Европа / дальнее зарубежье</td><td class="X1_right"><?php echo $tab6_2[1][1];?></td><td class="X1_right"><?php echo $tab6_2[1][2];?></td></tr>
<tr class="X1_0"><td class="X1_left">Москва</td><td class="X1_right"><?php echo $tab6_2[2][1];?></td><td class="X1_right"><?php echo $tab6_2[2][2];?></td></tr>
<tr class="X1_1"><td class="X1_left">Россия</td><td class="X1_right"><?php echo $tab6_2[3][1];?></td><td class="X1_right"><?php echo $tab6_2[3][2];?></td></tr>
</table>
<br>

<h3>6.3 Суточные расходы в командировке</h3>
<table width="100%" border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб./день</th>
</tr>
<tr class="X1_1"><td class="X1_left">суточные расходы, Европа / дальнее зарубежье</td><td class="X1_right"><?php echo $tab6_3[1][1];?></td><td class="X1_right"><?php echo $tab6_3[1][2];?></td></tr>
<tr class="X1_0"><td class="X1_left">суточные расходы, Москва</td><td class="X1_right"><?php echo $tab6_3[2][1];?></td><td class="X1_right"><?php echo $tab6_3[2][2];?></td></tr>
<tr class="X1_1"><td class="X1_left">суточные расходы, Россия</td><td class="X1_right"><?php echo $tab6_3[3][1];?></td><td class="X1_right"><?php echo $tab6_3[3][2];?></td></tr>
</table>
<br>

<h3>6.4 Транспортные расходы в командировке</h3>
<table width="100%" border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб.</th>
</tr>
<tr class="X1_1"><td class="X1_left">Фиксированная сумма в Европе/дальнем зарубежье</td><td class="X1_right"><?php echo $tab6_4[1][1];?></td><td class="X1_right"><?php echo $tab6_4[1][2];?></td></tr>
<tr class="X1_0"><td class="X1_left">Фиксированная сумма в Москве</td><td class="X1_right"><?php echo $tab6_4[2][1];?></td><td class="X1_right"><?php echo $tab6_4[2][2];?></td></tr>
<tr class="X1_1"><td class="X1_left">Фиксированная сумма в России</td><td class="X1_right"><?php echo $tab6_4[3][1];?></td><td class="X1_right"><?php echo $tab6_4[3][2];?></td></tr>
</table>
<br>

<h3>6.5 Связь командированного</h3>
<table width="100%" border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб.</th>
</tr>
<tr class="X1_1"><td class="X1_left">Мобильная связь</td><td class="X1_right"><?php echo $tab6_5[1][1];?></td><td class="X1_right"><?php echo $tab6_5[1][2];?></td></tr>
<tr class="X1_0"><td class="X1_left">Междугородняя связь</td><td class="X1_right"><?php echo $tab6_5[2][1];?></td><td class="X1_right"><?php echo $tab6_5[2][2];?></td></tr>
</table>
        <?php
        }
        echo $copyright; 
        }
        ?>
    </div>
    </li>
    <!--Конец Командировочных расходов-->
    
    <!--7	Кредитные практики и дисконтные программы.-->
    <li class="down"><h2>7.	Кредитные практики и дисконтные программы</h2>
    <div class="report_body hide">
          <?php
          if($step['7']=="1"){
          ?>
        <h3>Кредиты</h3>
<p><strong>Процент сотрудников, которым предоставляются кредиты: <i><?php echo $tab7[2];?>%</i></strong></p>
<p><strong>Средняя суммарная величина выданных кредитов сотруднику за последний год: <i><?php echo $tab7[3];?></i></strong></p>

<?php
if($tab7[2]!=0){
?>
<h3>7.1 Наличие условий кредитования</h3>
<table width="100%" border="0" class="X1">
<tr class="X1_0">
  <th width="50%"></th>
  <th width="30%"></th>
  <th width="20%">Доля сотрудников*</th>
</tr>
<tr class="X1_1"><td class="X1_left">Кредиты предоставляются при определенных условиях</td><td></td><td class="X1_right"><b><?php echo $tab7_1[1][1];?></b></td></tr>
<tr class="X1_0"><td></td><td class="X1_left">Стаж работы сотрудника в компании</td><td class="X1_right"><?php echo $tab7_1[1][2];?></td></tr>
<tr class="X1_1"><td></td><td class="X1_left">Оклад сотрудника</td><td class="X1_right"><?php echo $tab7_1[1][3];?></td></tr>
<tr class="X1_0"><td></td><td class="X1_left">Объект кредитования</td><td class="X1_right"><?php echo $tab7_1[1][4];?></td></tr>
<tr class="X1_1"><td></td><td class="X1_left">Другой фактор</td><td class="X1_right"><?php echo $tab7_1[1][5];?></td></tr>
<tr class="X1_0"><td class="X1_left">Кредиты предоставляются без условий</td><td></td><td class="X1_right"><b><?php echo $tab7_1[2][1];?></b></td></tr>
</table>
<br>

<h3>7.2 Виды кредитов</h3>
<table width="100%" border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">Доля сотрудников*</th>
</tr>
<tr class="X1_1"><td class="X1_left">Кредит на покупку недвижимости</td><td class="X1_right"><?php echo $tab7_2[1];?></td></tr>
<tr class="X1_0"><td class="X1_left">Кредит на покупку автомобиля</td><td class="X1_right"><?php echo $tab7_2[2];?></td></tr>
<tr class="X1_1"><td class="X1_left">Кредит на покупку аудио-, видео-, бытовой, компьютерной техники</td><td class="X1_right"><?php echo $tab7_2[3];?></td></tr>
<tr class="X1_0"><td class="X1_left">Кредит на оплату обучения</td><td class="X1_right"><?php echo $tab7_2[4];?></td></tr>
<tr class="X1_1"><td class="X1_left">Прочие кредиты</td><td class="X1_right"><?php echo $tab7_2[5];?></td></tr>
</table>
<br>

<h3>7.3 Процент по кредиту</h3>
<table width="100%" border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">Доля сотрудников*</th>
</tr>
<tr class="X1_1"><td class="X1_left">Беспроцентный кредит</td><td class="X1_right"><?php echo $tab7_3[1];?></td></tr>
<tr class="X1_0"><td class="X1_left">Процент по кредиту</td><td class="X1_right"><?php echo $tab7_3[2];?></td></tr>
</table>
<?php }  
echo $copyright;
} ?>
    </div>
    </li>
    <!--Конец Кредитных практик и дисконтных программ-->
    
    <!--8	Страхование, здоровье, спорт.-->
    <li class="down"><h2>8.	Страхование, здоровье, спорт</h2>
    <div class="report_body hide">
    <?php
          if($step['8']=="1"){
          ?>
              <h3>8.1 Негосударственное страхование</h3>
<table width="100%" border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">Доля сотрудников</th>
   <th width="20%">Среднее значение затрат, руб.</th>
</tr>
<tr class="X1_1"><td class="X1_left">Негосударственное страхование жизни</td><td class="X1_right"><?php echo $tab8_2[0][0];?></td><td class="X1_right"><?php echo $tab8_2[0][1];?></td></tr>
<tr class="X1_0"><td class="X1_left">Негосударственное медицинское страхование</td><td class="X1_right"><?php echo $tab8_2[1][0];?></td><td class="X1_right"><?php echo $tab8_2[1][1];?></td></tr>
<tr class="X1_1"><td class="X1_left">Негосударственное пенсионное страхование</td><td class="X1_right"><?php echo $tab8_2[2][0];?></td><td class="X1_right"><?php echo $tab8_2[2][1];?></td></tr>
</table>


<h3>8.2 Медицинское обслуживание</h3>
<table width="100%" border="0" class="X1">
<tr class="X1_0">
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
$tab8_rub=average($res8[$id]);
}

echo('
<tr class="X1_'.$col.'"><td class="X1_left">'.$title.'</td><td class="X1_right">'.$tab8_perc.'</td><td class="X1_right">'.$tab8_rub.'</td></tr>
');
$col=1-$col;
}
?>
</table>

<h3>8.3 Дополнительная программа по беременности</h3>
<table width="100%" border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">Доля сотрудников*</th>
</tr>
<tr class="X1_1"><td class="X1_left">Предоставление оплачиваемого декретного отпуска</td><td class="X1_right"><?php echo $tab8_3[0];?></td></tr>
<tr class="X1_0"><td class="X1_left">Отпуск по беременности (до родов)</td><td class="X1_right"><?php echo $tab8_3[1];?></td></tr>
<tr class="X1_1"><td class="X1_left">Отпуск по родам (после родов)</td><td class="X1_right"><?php echo $tab8_3[2];?></td></tr>
</table>

<h3>8.4 Занятия спортом</h3>
<table width="100%" border="0" class="X1">
<tr class="X1_0"><td class="X1_left"><strong>Процент сотрудников, которым оплачиваются занятия спортом: <i><?php echo $tab8_4[0];?>%</i></strong></td></tr>
<tr class="X1_1"><td class="X1_left"><strong>Среднее значение затрат компании на занятия спортом: <i><?php echo $tab8_4[1];?> руб.</i></strong></td></tr>
</table>
<?php
echo $copyright;
          }
    ?>
    </div>
    </li>
    <!--Конец Страхования, здоровья, спорта.-->
    
    <!--9	Обучение и развитие-->
    <li class="down"><h2>9. Обучение и развитие</h2>
    <div class="report_body hide">
          <?php
          if($step['9']=="1"){
          ?>
              <h3>Обучение</h3>
<p><strong>Процент сотрудников, которым оплачивается обучение: <i><?php echo $tab9_1[0];?>%</i></strong></p>
<?php
if($comp_people[208]!=0){
?>
<h3>9.1 Финансирование обучения сотрудника в компании</h3>
<table width="100%" border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">Доля сотрудников*</th>
</tr>
<tr class="X1_1"><td class="X1_left">Существует лимитированный бюджет на обучение сотрудника</td><td class="X1_right"><?php echo $tab9_2[0];?></td></tr>
<tr class="X1_0"><td class="X1_left">Бюджет на обучение сотрудника не резервируется, но деньги выделяются</td><td class="X1_right"><?php echo $tab9_2[1];?></td></tr>
</table>
<br>

<h3>9.2 Бюджет на обучение сотрудника</h3>
<table width="100%" border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">Среднее значение, руб.</th>
</tr>
<tr class="X1_1"><td class="X1_left">Затраты на обучение на эту должность</td><td class="X1_right"><?php echo $tab9_3[0];?></td></tr>
<tr class="X1_0"><td class="X1_left">Размер бюджета на обучение одного сотрудника</td><td class="X1_right"><?php echo $tab9_3[1];?></td></tr>
</table>
<br>

<h3>9.3 Политика обучения сотрудников в компании</h3>
<table width="100%" border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">Доля сотрудников*</th>
</tr>
<tr class="X1_1"><td class="X1_left">Проводится обучение в рамках корпоративных программ развития (обучение, организуемое силами компании)</td><td class="X1_right"><?php echo $tab9_4[0];?></td></tr>
<tr class="X1_0"><td class="X1_left">Компанией компенсируются затраты сотрудника на обучение</td><td class="X1_right"><?php echo $tab9_4[1];?></td></tr>
</table>
<br>

<h3>9.4 Компенсируемые компанией формы обучения сотрудника</h3>
<table width="100%" border="0" class="X1">
<tr class="X1_0">
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
$tab9_rub=average($res9[$id]);
}

echo('
<tr class="X1_'.$col.'"><td class="X1_left">'.$title.'</td><td class="X1_right">'.$tab9_perc.'</td><td class="X1_right">'.$tab9_rub.'</td></tr>
');
$col=1-$col;
}
?>

</table>
<?php
}
echo $copyright;
          }
          ?>
    </div>
    </li>
    <!--Конец Обучения и развития.-->
    
    <!--10	Отпуск-->
    <li class="down"><h2>10.	Отпуск</h2>
    <div class="report_body hide">
        <?php
        if($step['10']=="1"){
        ?>
            <h3>10.1 Продолжительность оплачиваемого отпуска (календарных дней)</h3>
<table width="100%" border="0" class="X1">
<tr class="X1_0">
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
<tr class="X1_'.$col.'"><td class="X1_left">'.$title.'</td><td class="X1_right">'.$tab10_1_perc.'</td></tr>
');
$col=1-$col;
}
?>
</table>
<br>

<h3>10.2 Схема предоставления оплачиваемого отпуска</h3>
<table width="100%" border="0" class="X1">
<tr class="X1_0">
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
<tr class="X1_'.$col.'"><td class="X1_left">'.$title.'</td><td class="X1_right">'.$tab10_2_perc.'</td></tr>
');
$col=1-$col;
}
?>
</table>
<br>

<h3>10.3 Основа расчета размера отпускных</h3>
<table width="100%" border="0" class="X1">
<tr class="X1_0">
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
<tr class="X1_'.$col.'"><td class="X1_left">'.$title.'</td><td class="X1_right">'.$tab10_3_perc.'</td></tr>
');
$col=1-$col;
}
?>
</table>
<?php
echo $copyright;
        }
        ?>
    </div>
    </li>
    <!--Конец Отпуска-->
    
    <!--11	Праздники-->
    <li class="down"><h2>11.	Праздники</h2>
    <div class="report_body hide">
    <?php
         if($step['11']=="1"){
         ?>
            <h3>11.1 Общегосударственные праздники</h3>
<table width="100%" border="0" class="X1">
<tr class="X1_0">
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
$tab11_1_rub=average($res11[$id]);
}

echo('
<tr class="X1_'.$col.'"><td class="X1_left">'.$title.'</td><td class="X1_right">'.$tab11_1_perc.'</td><td class="X1_right">'.$tab11_1_rub.'</td></tr>
');
$col=1-$col;
}
?>
</table>
<br>

<h3>11.2 Корпоративные праздники</h3>

<p><strong>Общий бюджет корпоративных праздников: <i><?php echo $tab11_2[0][0];?></i> руб. на 1 сотрудника</strong></p>

<table width="100%" border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб./чел.</th>
</tr>
<tr class="X1_1"><td class="X1_left">День рождения компании</td><td class="X1_right"><?php echo $tab11_2[1][0];?></td><td class="X1_right"><?php echo $tab11_2[1][1];?></td></tr>
<tr class="X1_0"><td class="X1_left">Другие корпоративные праздники</td><td class="X1_right"><?php echo $tab11_2[2][0];?></td><td class="X1_right"><?php echo $tab11_2[2][1];?></td></tr>
</table>
<br>

<h3>11.3 Подарки к праздничному дню сотрудника</h3>
<table width="100%" border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб./чел.</th>
</tr>

<?php
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
$tab11_3_rub=average($res11[$id]);
}

echo('
<tr class="X1_'.$col.'"><td class="X1_left">'.$title.'</td><td class="X1_right">'.$tab11_3_perc.'</td><td class="X1_right">'.$tab11_3_rub.'</td></tr>
');
$col=1-$col;
}
?>
</table>
<?
echo $copyright;
         }
    ?>
    </div>
    </li>
    <!--/Праздники.-->
</ul>