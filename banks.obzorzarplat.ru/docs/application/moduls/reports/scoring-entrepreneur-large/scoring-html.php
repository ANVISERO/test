<?php
/*
$page='
<h1>Отчет о доходе'.$job_name_partitive.' '.$region_name_partitive.'</h1>
*/
$page='
<h1>Отчет о доходе '.$region_name_partitive.'</h1>

<table class="standart">
    <tr>
        <th class="th_left" width="30%">Дата отчета</th>
        <td width="70%">"'.date('d').'" '.months(date('m')).' '.date('Y').'г., '.date('H:i').'</td>
    </tr>
    <tr>
        <th class="th_left">Должностная группа</th>
        <td>'.$jtype_name.'</td>
    </tr>
    <tr>
        <th class="th_left">Тип услуги:</th>
        <td>'.$job_name.'</td>
    </tr>
    <tr>
        <th class="th_left">Город:</th>
        <td>'.$region_name.'</td>
    </tr>
</table>

<h2>Результаты проведенного анализа</h2>
'.$scoring_results;

//$page1=$page.'<p>Разброс заработных плат составляет: '.number_format($proc_10_salary,0,',',' ').'р. - '.number_format($proc_90_salary,0,',',' ').'р.</p>';
$page1='<p>Разброс дохода составляет: '.number_format($proc_10_salary,0,',',' ').'р. - '.number_format($proc_90_salary,0,',',' ').'р.</p>';

$page2='
<hr/>
<p>Отчет подготовил пользователь: <b>'.$user_name.'</b></p>
<p>в интересах '.stripslashes($company_name).'</p>
';
$page1.=$page2;
$page.=$page1;

//Запись в файл
$fullpath=$filedir.$filename_html;
$file = fopen ("$fullpath","w+");
fputs ( $file, $page1);
fclose ($file);

?>