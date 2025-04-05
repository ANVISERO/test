<script type="text/javascript" src="http://business.obzorzarplat.ru/_js/jquery/summary.js"></script>
<link rel="stylesheet" href="/_css/business/reports.css" type="text/css">

<h2>Сводный экспресс отчет о заработной плате</h2>

<p>Город: <em>Санкт-Петербург</em></p>
<p>Сфера деятельности компании: <em>Нефть / Газ</em></p>
<p>Все данные представлены в российских рублях <b>до выплаты налогов (gross)</b></p>


<p align="right"><img src="/_img/business/report-excel.png" alt="отчет в формате Excel" title="отчет в формате Excel"><a href="/preds/summary/summary.xls" class="lk2">отчет в формате Excel</a> |
<a href="/preds/summary/print/" class="lk2" target="_blank">Версия для печати &raquo;</a></p>
<?php
$month=(date('m')-1);
$year=date('Y');
if($month<=0){
    $month=12+$month;
    $year=date('Y')-1;
}

//квартал, когда обновлялись данные
if($month==1 || $month==2 || $month==3){$quarter=1;}
elseif($month==4 || $month==5 || $month==6){$quarter=2;}
elseif($month==7 || $month==8 || $month==9){$quarter=3;}
else{$quarter=4;}

$date_update=$quarter.' квартал '.$year.' г.';
?>

<h3>Среднемесячные значения статей компенсации труда (руб. в месяц)</h3>

<div id="summary-result">
<ul id="links">
    <li><a href="#" class="link1 active">Должностной оклад</a></li>
    <li><a href="#" class="link2">Заработная плата</a></li>
</ul>
<div class="clearfloat"></div>
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

<tr>
<td class="left"><a href="http://obzorzarplat.ru/servis/job_description/view/?id=1485&lang=0" target="_blank" class="job">Инженер-сметчик</a></td>
<td>
    <div class="link1">24 335</div>
    <div class="link2">46 821</div>
</td>
<td>
    <div class="link1">25 870</div>

    <div class="link2">46 933</div>
</td>
<td>
    <div class="link1">28 700</div>
    <div class="link2">46 984</div>
</td>
<td>
    <div class="link1">27 947</div>
    <div class="link2">47 053</div>

</td>
<td>
    <div class="link1">31 498</div>
    <div class="link2">47 200</div>
</td>
<td>
    <div class="link1">33 220</div>
    <div class="link2">47 364</div>
</td>

<td>на текущую дату</td>
</tr>


<tr>
<td class="left"><a href="http://obzorzarplat.ru/servis/job_description/view/?id=1582&lang=0" target="_blank" class="job">Машинист экскаватора </a></td>
<td>
    <div class="link1">18 466</div>
    <div class="link2">33 000</div>
</td>
<td>

    <div class="link1">18 923</div>
    <div class="link2">35 254</div>
</td>
<td>
    <div class="link1">21 165</div>
    <div class="link2">35 200</div>
</td>
<td>
    <div class="link1">21 675</div>

    <div class="link2">35 313</div>
</td>
<td>
    <div class="link1">22 785</div>
    <div class="link2">35 366</div>
</td>
<td>
    <div class="link1">23 577</div>
    <div class="link2">36 649</div>

</td>
<td>на текущую дату</td>
</tr>


<tr>
<td class="left"><a href="http://obzorzarplat.ru/servis/job_description/view/?id=1394&lang=0" target="_blank" class="job">Руководитель проекта</a></td>
<td>
    <div class="link1">64 253</div>
    <div class="link2">85 670</div>
</td>

<td>
    <div class="link1">67 874</div>
    <div class="link2">90 498</div>
</td>
<td>
    <div class="link1">76 059</div>
    <div class="link2">101 412</div>
</td>
<td>

    <div class="link1">68 966</div>
    <div class="link2">91 954</div>
</td>
<td>
    <div class="link1">87 069</div>
    <div class="link2">116 091</div>
</td>
<td>
    <div class="link1">92 414</div>

    <div class="link2">123 218</div>
</td>
<td>на текущую дату</td>
</tr>


<tr>
<td class="left"><a href="http://obzorzarplat.ru/servis/job_description/view/?id=1265&lang=0" target="_blank" class="job">Водитель легкового автомобиля</a></td>
<td>
    <div class="link1">37 793</div>
    <div class="link2">45 541</div>

</td>
<td>
    <div class="link1">40 069</div>
    <div class="link2">48 283</div>
</td>
<td>
    <div class="link1">45 499</div>
    <div class="link2">54 826</div>
</td>

<td>
    <div class="link1">45 977</div>
    <div class="link2">55 402</div>
</td>
<td>
    <div class="link1">49 310</div>
    <div class="link2">59 419</div>
</td>
<td>

    <div class="link1">53 241</div>
    <div class="link2">64 156</div>
</td>
<td>на текущую дату</td>
</tr>


<tr>
<td class="left"><a href="http://obzorzarplat.ru/servis/job_description/view/?id=1239&lang=0" target="_blank" class="job">Диспетчер</a></td>
<td>
    <div class="link1">18 060</div>

    <div class="link2">31 005</div>
</td>
<td>
    <div class="link1">18 820</div>
    <div class="link2">32 925</div>
</td>
<td>
    <div class="link1">21 245</div>
    <div class="link2">34 014</div>

</td>
<td>
    <div class="link1">21 628</div>
    <div class="link2">33 214</div>
</td>
<td>
    <div class="link1">22 834</div>
    <div class="link2">35 446</div>
</td>

<td>
    <div class="link1">24 778</div>
    <div class="link2">36 201</div>
</td>
<td>на текущую дату</td>
</tr>


<tr>
<td class="left"><a href="http://obzorzarplat.ru/servis/job_description/view/?id=1559&lang=0" target="_blank" class="job">Инженер по организации (нормированию) труда</a></td>
<td>

    <div class="link1">18 984</div>
    <div class="link2">35 116</div>
</td>
<td>
    <div class="link1">20 346</div>
    <div class="link2">35 177</div>
</td>
<td>
    <div class="link1">21 886</div>

    <div class="link2">35 288</div>
</td>
<td>
    <div class="link1">21 664</div>
    <div class="link2">35 390</div>
</td>
<td>
    <div class="link1">23 777</div>
    <div class="link2">35 473</div>

</td>
<td>
    <div class="link1">24 664</div>
    <div class="link2">35 547</div>
</td>
<td>на текущую дату</td>
</tr>


<tr>
<td class="left"><a href="http://obzorzarplat.ru/servis/job_description/view/?id=1290&lang=0" target="_blank" class="job">Менеджер по персоналу (до 200 сотрудников)</a></td>

<td>
    <div class="link1">18 638</div>
    <div class="link2">35 069</div>
</td>
<td>
    <div class="link1">19 986</div>
    <div class="link2">35 159</div>
</td>
<td>

    <div class="link1">21 653</div>
    <div class="link2">35 243</div>
</td>
<td>
    <div class="link1">21 621</div>
    <div class="link2">35 297</div>
</td>
<td>
    <div class="link1">23 843</div>

    <div class="link2">35 448</div>
</td>
<td>
    <div class="link1">24 302</div>
    <div class="link2">35 616</div>
</td>
<td>на текущую дату</td>
</tr>


<tr>
<td class="left"><a href="http://obzorzarplat.ru/servis/job_description/view/?id=1429&lang=0" target="_blank" class="job">Начальник отдела по работе с персоналом (от 200 до 500 сотрудников)</a></td>
<td>
    <div class="link1">75 586</div>
    <div class="link2">91 081</div>
</td>
<td>
    <div class="link1">80 138</div>
    <div class="link2">96 566</div>

</td>
<td>
    <div class="link1">90 998</div>
    <div class="link2">109 652</div>
</td>
<td>
    <div class="link1">91 954</div>
    <div class="link2">110 805</div>
</td>

<td>
    <div class="link1">98 621</div>
    <div class="link2">118 838</div>
</td>
<td>
    <div class="link1">106 483</div>
    <div class="link2">128 312</div>
</td>
<td>на текущую дату</td>
</tr>
</table>
</div>
<h3>Глоссарий</h3>
<p><b><i>Должностной оклад</i></b> - ежемесячный размер оплаты труда работника, зависящий от занимаемой должности
    и требований к квалификации, предъявляемых содержанием выполняемых работ,
    а также деловых качеств работника. Должностной оклад устанавливается, как правило,
    в расчете на месяц и используется в организациях для оплаты руководителей, служащих и специалистов.
    Оклад должностной – основа исчисления общего заработка сотрудников, так как на него начисляется премия,
    доплаты и надбавки. Должностной оклад зафиксирован в штатном расписании, представляя собой
    гарантированную сумму выплат в соответствии с Трудовым Кодексом РФ.</p>
<p><b><i>Заработная плата</i></b> - совокупность вознаграждений, выплачиваемых сотруднику
    за исполнение трудовых обязанностей и достижение результатов.
    Включает в себя оклад, надбавки, доплаты, премии и бонусы.</p>
<p><b><i>Среднее значение заработной платы</i></b></p>

<ol><li>отношение фонда заработной платы к среднесписочной численности в целом по организации и категориям
работников. Используется как аналитический и динамический показатель организации.
Может исчисляться как среднемесячная или среднегодовая в зависимости от целевой направленности.</li>
<li>отношение фактически начисленной работнику заработной платы (в которую включаются все выплаты,
предусмотренные системой оплаты труда, применяемые в организации независимо от источников этих выплат)
к фактически отработанному им времени за 12 месяцев, предшествующему моменту выплаты.
Регулируется статьей 139 Трудового Кодекса РФ.</li></ol>
<p><b><i>10 процентиль</i></b> - значение, ниже которого расположено 10% результатов наблюдений</p>
<p><b><i>25 процентиль</i></b> - значение, ниже которого расположено 25% результатов наблюдений</p>
<p><b><i>50 процентиль (медиана)</i></b> - значение, ниже которого расположена половина результатов наблюдений</p>
<p><b><i>75 процентиль</i></b> - значение, выше которого расположено 25% результатов наблюдений</p>

<p><b><i>90 процентиль</i></b> - значение, выше которого расположено 10% результатов наблюдений</p>