<?php
$page='';
$page.='
<link href="/express_ok/1job_lite_print.css" rel="stylesheet" type="text/css">
<div class="lite_single">

<h1>Аналитический обзор заработной платы '.$name_partitive.' '.$region_name_partitive.'</h1>

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
<td>'.$name.'</td>
</tr>
<tr>
<th>Город</th>
<td>'.$region_name.'</td>
</tr>
</table>

<h3>1.	Должностной оклад, заработная плата '.$name_partitive.'</h3>
<p align="right"><em>Таблица 1.</em></p>
<table>
<tr>
  <th></th>
  <th>10%</th>
  <th>25%</th>
  <th>50% (медиана)</th>
  <th>75%</th>
  <th>90%</th>
  <th>среднее</th>
</tr>
<tr>
  <td class="X1_left">Должностной оклад</td>
  <td>'.number_format($proc_10_salary,0,',',' ').'</td>
  <td>'.number_format($proc_25_salary,0,',',' ').'</td>
  <td>'.number_format($proc_50_salary,0,',',' ').'</td>
  <td>'.number_format($proc_75_salary,0,',',' ').'</td>
  <td>'.number_format($proc_90_salary,0,',',' ').'</td>
  <td>'.number_format($official_salary_sre,0,',',' ').'</td>
</tr>
<tr>
  <td class="X1_left">Заработная плата</td>
  <td>'.number_format($proc_10_salary_bonus,0,',',' ').'</td>
  <td>'.number_format($proc_25_salary_bonus,0,',',' ').'</td>
  <td>'.number_format($proc_50_salary_bonus,0,',',' ').'</td>
  <td>'.number_format($proc_75_salary_bonus,0,',',' ').'</td>
  <td>'.number_format($proc_90_salary_bonus,0,',',' ').'</td>
  <td>'.number_format($salary_bonus_sre,0,',',' ').'</td>
</tr>
</table>
<p>Все данные представлены в российских рублях <b>до выплаты налогов (gross)</b></p>

<h3>2.	Структура компенсационного пакета '.$name_partitive.'</h3>
<p align="right"><em>Таблица 2.</em></p>
<table border="0" width="100%" class="structure">
    <tr>
        <th colspan="2">Фиксированная часть</th>
        <th colspan="2">Переменная часть</th>
        <th rowspan="2">Компенсации</th>
    </tr>
    <tr>
        <th>Оклад</th>
        <th>Доплаты и надбавки</th>
        <th>Бонусы</th>
        <th>Премии</th>
    </tr>
    <tr>
        <td>'.number_format($official_salary_part,1,',',' ').' %</td>
        <td>'.number_format($add_payment_part,1,',',' ').' %</td>
        <td>'.number_format($bonus_part,1,',',' ').' %</td>
        <td>'.number_format($premium_part,1,',',' ').' %</td>
        <td>'.number_format($compensation_part,1,',',' ').' %</td>
    </tr>
</table>

<h3>3. Должностная инструкция '.$name_partitive.'</h3>';

$filefolder=$folder.'application/elements/job_description/';
if(file_exists($filefolder.$job_id.'_ekts.txt')){
    $page.='<h2>Описание должности по ЕТКС</h2>';

    $job_description_ekts=implode("", file($filefolder.$job_id.'_ekts.txt'));
    $page.=$job_description_ekts;
}

if($func!=""){

$page.='<h2>Описание должности по данным портала obzorzarplat.ru</h2>
<table class="job_description">';
if($name!=""){ $page.='<tr><td>Название должности: </td><td>'.$name.'</td></tr>';}
if($other_name!=""){ $page.='<tr><td>Другое название должности: </td><td>'.$other_name.'</td></tr>';}
if($conform!=""){ $page.='<tr><td>Подчиняется: </td><td>'.$conform.'</td></tr>'; }
if($subordinate!=""){ $page.='<tr><td>Подчинённые: </td><td>'.$subordinate.'</td></tr>';}
if($purpose!=""){ $page.='<tr><td>Цель: </td><td>'.$purpose.'</td></tr>'; }
if($mission!=""){ $page.='<tr><td>Задачи: </td><td>'.$mission.'</td></tr>'; }
if($func!=""){ $page.='<tr><td>Функции: </td><td>'.$func.'</td></tr>'; }
if($experience!=""){ $page.='<tr><td>Требования к опыту и квалификации: </td><td>'.$experience.'</td></tr>'; }
$page.='</table>';
 }

 if($func=="" AND !file_exists($filefolder.$job_id.'_ekts.txt')){
    $page.='<p align="center">Описание должности в настоящее время находится на стадии обработки и добавления в базу данных.</p></div>';
 }


//Запись в файл
$fullpath=$filedir.$filename_html;
$file = fopen ("$fullpath","w+");
fputs ( $file, $page);
fclose ($file);

?>