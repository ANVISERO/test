<!--<link type="text/css" href="/_js/jquery-ui-1.7.2.custom/development-bundle/themes/custom-theme-1/ui.all.css" rel="stylesheet" />-->
	<script type="text/javascript" src="/_js/jquery-ui-1.7.2.custom/development-bundle/ui/ui.core.js"></script>

	<script type="text/javascript">
	$(function() {
        $('#salary_accordion div:not(:first)').hide();

        $('#salary_accordion p a.h3-click').click(function(){
            $(this).parent('p').next('div').slideToggle(400).siblings('div:visible').slideUp(400);
            return false;
        });

        //$('#salary_accordion #id1 *').tooltip();
$("#id1 a[title]").tooltip({ position: 'top center'});

	});
	</script>



<div id="salary_result_view">
        <h2>Заработная плата <?php echo($jobs.' '.$region);?></h2>
        <div id="salary_accordion">
            <p><a class="h3-click" href="">Заработная плата</a></p>
    <div>
        <p>Индивидуальный отчет о заработной плате можно получить <a href="/servis/otchet/">здесь &raquo;</a></p>
        <p><b>Заработная плата</b> включает в себя оклад, надбавки, доплаты, премии и бонусы.</p>
        <p align="center"><img src="http://chart.apis.google.com/chart?chxt=x,y,y
&chof=gif
&cht=bvs
&chbh=40,30
&chco=800080|6B8E23|00A5C6
&chd=t:25,50,25
&chxl=0:|<?php echo(number_format($proc_25_salary_bonus,0,'.',' ')) ?>%20%D1%80.|
<?php echo(number_format($salary_bonus_sre,0,'.',' ')); ?>%20%D1%80.|
<?php echo(number_format($proc_75_salary_bonus,0,'.',' '));  ?>%20%D1%80.|
2:|%D0%9A%D0%BE%D0%BB%D0%B8%D1%87%D0%B5%D1%81%D1%82%D0%B2%D0%BE%20%D1%81%D0%BE%D1%82%D1%80%D1%83%D0%B4%D0%BD%D0%B8%D0%BA%D0%BE%D0%B2,%20%
&chxp=2,50
&chs=600x150
&chts=000000,11.5
&chxs=0,000000
&chdl=25%20%D0%BF%D1%80%D0%BE%D1%86%D0%B5%D0%BD%D1%82%D0%B8%D0%BB%D1%8C|
%D1%81%D1%80%D0%B5%D0%B4%D0%BD%D0%B5%D0%B5+%D0%B7%D0%BD%D0%B0%D1%87%D0%B5%D0%BD%D0%B8%D0%B5|
75%20%D0%BF%D1%80%D0%BE%D1%86%D0%B5%D0%BD%D1%82%D0%B8%D0%BB%D1%8C" alt="Заработная плата" width="600" height="150" /></p>
<p align="center">Рисунок 1. Заработная плата <?php echo $jobs; ?>, руб./мес.</p>
<p id="id1">На картинке представлены:
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
    <a href="/isl/glossary/?str=0-9" target="_blank" title="Значение, выше которого расположено 25% результатов наблюдений.">75 процентиль</a>.
</p>

<?php
$month=(date('m')-1);
if($month == "1" ){$month_ru="Январь";}
elseif($month == "2" ){$month_ru="Февраль";}
elseif($month == "3" ){$month_ru="Март";}
elseif($month == "4" ){$month_ru="Апрель";}
elseif($month == "5" ){$month_ru="Май";}
elseif($month == "6" ){$month_ru="Июнь";}
elseif($month == "7" ){$month_ru="Июль";}
elseif($month == "8" ){$month_ru="Август";}
elseif($month == "9" ){$month_ru="Сентябрь";}
elseif($month == "10"){$month_ru="Октябрь";}
elseif($month == "11"){$month_ru="Ноябрь";}
elseif($month == "12"){$month_ru="Декабрь";}
?>
<p>Все данные отображаются в российских рублях и показывают доход сотрудника
    после налогообложения (на руки).</p>
<p>* Последнее обновление данных: <i><?php echo($month_ru.' '.date('Y')); ?>г.</i></p>

</div>
            <p><a class="h3-click" href="">Должностная инструкция <?php echo($jobs);?></a></p>
    <div>
<table width="100%" title="Должностная инструкция '.$jobs.'">
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em>Другие названия должности:</em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;<?php echo($jobs_other_name);?></td>
  </tr>
  <tr>
    <td><em>Подчиняется:</em></td>
    <td><?php echo($jobs_conform);?></td>
  </tr>
  <tr>
    <td><em>Подчинённые:</em></td>
    <td><?php echo($jobs_subordinate);?></td>
  </tr>
  <tr>
    <td><em>Цель:</em></td>
    <td><?php echo($jobs_purpose);?></td>
  </tr>
  <tr>
    <td><em>Задачи:</em></td>
    <td><?php echo($jobs_mission);?></td>
  </tr>
  <tr>
    <td><em>Функции:</em></td>
    <td><?php echo($jobs_func);?></td>
  </tr>
  <tr>
    <td><em>Требования к опыту и квалификации:</em></td>
    <td><?php echo($jobs_experience);?></td>
  </tr>
</table>
    </div>
</div><!--end salary_accordion-->
</div><!--end salary_result_view-->