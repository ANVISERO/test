<link type="text/css" href="/_css/express_report/salary.css" rel="stylesheet" />
<link type="text/css" href="/_js/jquery-ui-1.7.2.custom/development-bundle/themes/custom-theme-1/ui.all.css" rel="stylesheet" />

<div class="salary">
    <div class="img_left"><img src="/_img/services/express/express128x128.png" width="128" height="128" alt="Экспресс отчет"></div>
    <div class="descript">
    <p>Средняя заработная плата для различных должностей в городах России (Санкт-Петербурге, Москве, Новгороде, Екатеринбурге и других)
        исчисляется на основе данных портала obzorzarplat.ru</p>
    <p>Напоминаем, что мы используем только <b>фактические данные</b>, полученные нами непосредственно от компаний-участниц исследования
        (подробнее о процессе сбора данных можно прочитать <a href="/isl/metod/" class="lk2">здесь &raquo;</a>)</p>
    </div>
    <div class="clear"></div>
    <p align="right"><i>Таблица 1. Средняя заработная плата в 2010 году по данным портала <b>obzorzarplat.ru</b></i>.</p>
<table width="100%" border="0" class="salary_data">
  <tr>
    <th></th>
    <th>Средняя зарплата в <em>России (руб/мес.)</em></th>
    <th>Средняя зарплата в <em>Санкт-Петербурге (руб/мес.)</em></th>
  </tr>
  <tr>
    <td>2010 год</td>
    <td align="center"><b>26 118 рублей</b></td>
    <td align="center"><b>28 899 рублей</b></td>
  </tr>
  <tr>
</table>
<br>
<h2>Обзоры заработных плат по должностям</h2>
<?php
$news_q=mysqli_query($link,"SELECT id,zag,date FROM for_news WHERE status='1' AND category_id='4' order by date desc limit 5");
    while ($news = mysqli_fetch_object($news_q)) {
        echo '<h3>'.date('d.m.Y',  strtotime($news->date)).' '.$news->zag.'</h3>';
        if(file_exists($folder.'_admin/elements/news/'.$news->id.'_an.txt')){
            echo implode("", file($folder.'_admin/elements/news/'.$news->id.'_an.txt'));
        }
        echo '<p align="right"><a href="/isl/salary/?id='.$news->id.'">подробнее</a></p>';

    }
    ?>
<h2>Формирование экспресс отчета о заработной плате</h2>
<p>Заработные платы по должностям вы можете посмотреть ниже, выбрав должностную группу, должность и город. В отчете Вы получите значения
    заработной платы и должностного оклада, а также описание должности.</p>

<?php
include($folder.'_admin/moduls/express_report/salary-form.php');
?>
</div>