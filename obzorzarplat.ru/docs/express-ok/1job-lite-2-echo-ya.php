<!--
<div id="menu_report">
    <p align="center"><b>Содержание отчета:</b></p>
    <ul>
        <li><a href="#zp1">Должностной оклад</a></li>
        <li><a href="#zp2">Заработная плата</a></li>
        <li><a href="#zp3">Бенефиты</a></li>
        <li><a href="#zp4">Должностная инструкция</a></li>
    </ul>
</div>
-->
<!--/menu_report-->

<h2>Аналитический обзор заработной платы <?php echo($name_partitive);?> <?php echo($region_name_partitive);?></h2>
<p>Все данные представлены в российских рублях <b>до выплаты налогов (gross)</b></p>
<!--<p align="right"><img src="/_img/report-excel.png" alt="отчет в формате Excel" title="отчет в формате Excel"><a href="<?php echo($url_xls);?>">отчет в формате Excel</a> |
<a href="/archive/html.php?d=<?=$url;?>" target="_blank">Версия для печати &raquo;</a></p>--->

<div id="tabs">
            <ul style="height:33px;">
                <li><a href="#tabs-1">Должностной оклад</a></li>
                <li><a href="#tabs-2">Заработная плата</a></li>
                <li><a href="#tabs-3">Компенсационный пакет</a></li>
                <li><a href="#tabs-4">Должностная инструкция</a></li>
            </ul>
            <div id="tabs-1">
<h3>Должностной оклад</h3>

<?php
$chl_salary=number_format($proc_10_salary,0,',',' ').'|'.number_format($proc_25_salary,0,',',' ').'|'.number_format($proc_50_salary,0,',',' ').'|'.number_format($proc_75_salary,0,',',' ').'|'.number_format($proc_90_salary,0,',',' ');
$size='660x250';
$src_salary='http://chart.apis.google.com/chart?chxt=x,x,y,y&chof=gif&cht=bvs&chbh=40,30&chco=800080|6B8E23|00A5C6|FF1493|FF7F50&chd=t:10,25,50,25,10&chxl=0:|'.$chl_salary.'|1:|'.iconv('windows-1251','utf-8','Должностной оклад, руб./мес.').'|3:|'.iconv('windows-1251', 'utf-8', 'Количество сотрудников, %').'&chxp=1,50|3,50&chs='.$size.'&chdl='.iconv('windows-1251', 'utf-8', '10 процентиль|25 процентиль|50 процентиль|75 процентиль|90 процентиль');
?>

<p align="center"><img src="<?php echo($src_salary); ?>" alt="Должностной оклад" /></p>
<p class="img_name">Рисунок 1. Должностной оклад <?php echo($name_partitive); ?></p>

<p>Среднее значение оклада составляет: <b><?php echo number_format($official_salary_sre,0,',',' ');?> руб./мес.</b></p>
</div><!--/tabs-1-->

<div id="tabs-2">
<h3>Заработная плата</h3>

<?php
$chl_cash=number_format($proc_10_salary_bonus,0,',',' ').'|'.number_format($proc_25_salary_bonus,0,',',' ').'|'.number_format($proc_50_salary_bonus,0,',',' ').'|'.number_format($proc_75_salary_bonus,0,',',' ').'|'.number_format($proc_90_salary_bonus,0,',',' ');
$size='660x250';
$src_cash='http://chart.apis.google.com/chart?chxt=x,x,y,y&chof=gif&cht=bvs&chbh=40,30&chco=800080|6B8E23|00A5C6|FF1493|FF7F50&chd=t:10,25,50,25,10&chxl=0:|'.$chl_cash.'|1:|'.iconv('windows-1251','utf-8','Заработная плата, руб./мес.').'|3:|'.iconv('windows-1251', 'utf-8', 'Количество сотрудников, %').'&chxp=1,50|3,50&chs='.$size.'&chdl='.iconv('windows-1251', 'utf-8', '10 процентиль|25 процентиль|50 процентиль|75 процентиль|90 процентиль');
?>

<p align="center"><img src="<?php echo($src_cash); ?>" alt="Заработная плата" /></p>
<p class="img_name">Рисунок 2. Заработная плата <?php echo($name_partitive); ?></p>

<p>Среднее значение заработной платы составляет: <b><?php echo number_format($salary_bonus_sre,0,',',' ');?> руб./мес.</b></p>
</div><!--/tabs-2-->

<div id="tabs-3">
<h3>Структура компенсационного пакета</h3>
<?php
$chd_structure=number_format($official_salary_part,1,'.',' ');
$chdl_structure=iconv('windows-1251', 'utf-8', 'Оклад');
$chl_structure=number_format($official_salary_part,1,',',' ').'%';

if($add_payment_part>0){
    $chd_structure.=','.number_format($add_payment_part,1,'.',' ');
    $chdl_structure.='|'.iconv('windows-1251', 'utf-8', 'Доплаты и надбавки');
    $chl_structure.='|'.number_format($add_payment_part,1,'.',' ').'%';
}

if($bonus_part>0){
    $chd_structure.=','.number_format($bonus_part,1,'.',' ');
    $chdl_structure.='|'.iconv('windows-1251', 'utf-8', 'Бонусы');
    $chl_structure.='|'.number_format($bonus_part,1,'.',' ').'%';
}

if($premium_part>0){
    $chd_structure.=','.number_format($premium_part,1,'.',' ');
    $chdl_structure.='|'.iconv('windows-1251', 'utf-8', 'Премии');
    $chl_structure.='|'.number_format($premium_part,1,'.',' ').'%';
}

if($compensation_part>0){
    $chd_structure.=','.number_format($compensation_part,1,'.',' ');
    $chdl_structure.='|'.iconv('windows-1251', 'utf-8', 'Компенсации');
    $chl_structure.='|'.number_format($compensation_part,1,'.',' ').'%';
}

$size='550x250';
$src_structure='http://chart.apis.google.com/chart?chof=gif&cht=p&chd=t:'.$chd_structure.'&chs='.$size.'&chl='.$chl_structure.'&chdl='.$chdl_structure;
?>

<p align="center"><img src="<?php echo($src_structure); ?>" alt="Структура компенсационного пакета" /></p>
<p class="img_name">Рисунок 3. Структура компенсационного пакета <?php echo($name_partitive); ?></p>

<p class="table_name">Таблица 3. Структура компенсационного пакета <?php echo($name_partitive); ?></p>
<table class="business">
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
        <td><?php echo number_format($official_salary_part,1,',',' '); ?> %</td>
        <td><?php echo number_format($add_payment_part,1,',',' '); ?> %</td>
        <td><?php echo number_format($bonus_part,1,',',' '); ?> %</td>
        <td><?php echo number_format($premium_part,1,',',' '); ?> %</td>
        <td><?php echo number_format($compensation_part,1,',',' '); ?> %</td>
    </tr>
</table>

</div><!--/tabs-3-->

<div id="tabs-4">
<h3>Должностная инструкция <?php echo $name_partitive;?></h3>
<?php
$q_job=mysqli_query($link,"select * from base_company_jobs where job_id='$job_id'");
if(mysqli_num_rows($q_job)==0){
    echo('<div class="ui-state-error" style="width:380px; padding:10px; margin-top:10px;">
    <p align="center">Данные по выбранной должности в настоящее время находятся на стадии обработки и добавления в базу данных.</p></div>');
}
?>

<?php
$filefolder=$folder.'_admin/elements/job_description/';
if(file_exists($filefolder.$job_id.'_ekts.txt')){
    ?>
<h2>Описание должности по ЕТКС</h2>
<?php
    $job_description_ekts=implode("", file($filefolder.$job_id.'_ekts.txt'));
    echo($job_description_ekts);
}
?>

<?php if($func!=""){ ?>
<h2>Описание должности по данным портала obzorzarplat.ru</h2>
<table>
   <?php if($name!=""){?> <tr><td>Название должности: </td><td><?php echo $name; ?></td></tr><?php } ?>
   <?php if($other_name!=""){?> <tr><td>Другое название должности: </td><td><?php echo $other_name; ?></td></tr><?php } ?>
   <?php if($conform!=""){?> <tr><td>Подчиняется: </td><td><?php echo $conform; ?></td></tr><?php } ?>
   <?php if($subordinate!=""){?> <tr><td>Подчинённые: </td><td><?php echo $subordinate; ?></td></tr><?php } ?>
   <?php if($purpose!=""){?> <tr><td>Цель: </td><td><?php echo $purpose; ?></td></tr><?php } ?>
   <?php if($mission!=""){?> <tr><td>Задачи: </td><td><?php echo $mission; ?></td></tr><?php } ?>
   <?php if($func!=""){?> <tr><td>Функции: </td><td><?php echo $func; ?></td></tr><?php } ?>
   <?php if($experience!=""){?> <tr><td>Требования к опыту и квалификации: </td><td><?php echo $experience; ?></td></tr><?php } ?>
</table>
<?php } ?>

<?php if($func=="" AND !file_exists($filefolder.$job_id.'_ekts.txt')){ ?>

<p align="center">Описание должности в настоящее время находится на стадии обработки и добавления в базу данных.</p>

<?php } ?>

</div><!--/tabs-4-->

</div><!--/tabs-->

<p id="glossary">На диаграммах представлены:
    <a href="/isl/glossary/?str=0-9" target="_blank" title="Значение, ниже которого расположено 10% результатов наблюдений">10 процентиль</a>,
    <a href="/isl/glossary/?str=0-9" target="_blank" title="Значение, ниже которого расположено 25% результатов наблюдений">25 процентиль</a>,
    <a href="/isl/glossary/?str=%D1" target="_blank" title="<ol>
            <li>
                отношение фонда заработной платы к среднесписочной численности в целом
                по организации и категориям работников. Используется как аналитический
                и динамический показатель организации. Может исчисляться как среднемесячная
                или среднегодовая в зависимости от целевой направленности.
            </li>
            <li>
                отношение фактически начисленной работнику заработной платы
                (в которую включаются все выплаты, предусмотренные системой оплаты труда,
                применяемые в организации независимо от источников этих выплат)
                к фактически отработанному им времени за 12 месяцев, предшествующему моменту выплаты.
                Регулируется статьей 139 Трудового Кодекса РФ.
                </li></ol>">среднее значение</a>,
    <a href="/isl/glossary/?str=0-9" target="_blank" title="Значение, ниже которого расположено 50% результатов наблюдений">50 процентиль (медиана)</a>,
    <a href="/isl/glossary/?str=0-9" target="_blank" title="Значение, выше которого расположено 25% результатов наблюдений.">75 процентиль</a>,
    <a href="/isl/glossary/?str=0-9" target="_blank" title="Значение, выше которого расположено 10% результатов наблюдений.">90 процентиль</a>.
</p>