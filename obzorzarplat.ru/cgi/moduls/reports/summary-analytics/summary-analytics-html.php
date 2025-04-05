<?php

$page='';
$page.='
<link href="/_css/print.css" rel="stylesheet" type="text/css">
<div class="print">
<h2>Сводный аналитический обзор заработных плат</h2>
<p>Город: '.$city_name.'</p>
<p>'.$factor_name.' '.$factor_value_name.'</p>
    <br>
<p>Все данные представлены в российских рублях <b>до выплаты налогов (gross)</b></p>

<h3>1.	Среднемесячные значения компенсации труда (руб. в месяц)</h3>
<table class="business">
<tr>
  <th width="20%">Должность</th>
  <th width="10%">10%</th>
  <th width="10%">25%</th>
  <th width="10%">Среднее</th>
  <th width="10%">50% (Медиана)</th>
  <th width="10%">75%</th>
  <th width="10%">90%</th>
  <th width="10%">Обновление</th>
</tr>
';

foreach($job as $job_id){$page.=$out_cash[$job_id];}

$page.='
</table>

<h3>2.	Среднемесячные значения заработной платы (руб. в месяц)</h3>
<table class="business">
<tr>
  <th width="20%">Должность</th>
  <th width="10%">10%</th>
  <th width="10%">25%</th>
  <th width="10%">Среднее</th>
  <th width="10%">50% (Медиана)</th>
  <th width="10%">75%</th>
  <th width="10%">90%</th>
  <th width="10%">Обновление</th>
</tr>
';

foreach($job as $job_id){$page.=$out_salary[$job_id];}

$page.='
</table>

<h3>3.	Среднемесячные значения должностного оклада (руб. в месяц)</h3>
<table class="business">
<tr>
  <th width="20%">Должность</th>
  <th width="10%">10%</th>
  <th width="10%">25%</th>
  <th width="10%">Среднее</th>
  <th width="10%">50% (Медиана)</th>
  <th width="10%">75%</th>
  <th width="10%">90%</th>
  <th width="10%">Обновление</th>
</tr>
';

foreach($job as $job_id){$page.=$out_base[$job_id];}

$page.='
</table>

<h3>4.	Среднемесячные значения премиальной части компенсационного пакета (руб. в месяц)</h3>
<table class="business">
<tr>
  <th width="20%">Должность</th>
  <th width="10%">10%</th>
  <th width="10%">25%</th>
  <th width="10%">Среднее</th>
  <th width="10%">50% (Медиана)</th>
  <th width="10%">75%</th>
  <th width="10%">90%</th>
  <th width="10%">Обновление</th>
</tr>
';

foreach($job as $job_id){$page.=$out_premium[$job_id];}

$page.='
</table>

<h3>5.	Среднемесячные значения бонусной части копенсационного пакета (руб. в месяц)</h3>
<table class="business">
<tr>
  <th width="20%">Должность</th>
  <th width="10%">10%</th>
  <th width="10%">25%</th>
  <th width="10%">Среднее</th>
  <th width="10%">50% (Медиана)</th>
  <th width="10%">75%</th>
  <th width="10%">90%</th>
  <th width="10%">Обновление</th>
</tr>
';

foreach($job as $job_id){$page.=$out_bonus[$job_id];}

$page.='
</table>

<br>
<p align="right">Подготовлено порталом <a href="obzorzarplat.ru">obzorzarplat.ru</a></p>
<p align="right"> (Дата составления отчета: '.date('d.m.Y').')</p>
</div>
';


//Запись в файл
$fullpath=$filedir.$filename_html;
$file = fopen ("$fullpath","w+");
fputs ( $file, $page);
fclose ($file);

?>