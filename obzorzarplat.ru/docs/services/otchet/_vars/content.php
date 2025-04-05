<link href="/_css/indiv_report/indiv_report.css" type="text/css" rel="stylesheet">
<link type="text/css" href="/_js/jquery-ui-1.7.2.custom/development-bundle/themes/custom-theme-1/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="/_js/indiv_report/indiv_report.js"></script>
<div class="indiv">
<div class="img_left"><img src="/_img/services/indiv/indiv128x128.png" width="128" height="128" title="Персональный отчет"></div>
<p>Персональный Отчет по заработной плате - это документ, отражающий статистические данные по структуре и величине Вашего компенсационного пакета.
Отчет по заработной плате формируется на основании выбранной Вами должности и дополнительных переменных. Удобный, четкий, подготовленный 
на основании изучения фактических выплат, Отчет поможет Вам при приеме на работу, повышении в должности, либо пересмотре заработной платы.
Персональный отчет о заработной плате позволяет иметь достоверный документ по величине возможного компенсационного пакета, учитывающий город,
сферу деятельности и количество сотрудников в компании.</p>
<p>Стоимость отчета варьируется в зависимости от выбранной Вами <b>должности</b> и <b>оператора связи</b> и составляет от <b>150 до 300 рублей</b>, без учета НДС.</p>
<p>Посмотрите <a href='http://obzorzarplat.ru/servis/otchet/result/index.php?d=9BaaIq10u1bo5fQk1t0B' class="lk1" target="_blank">пример персонального отчет по заработной плате менеджера по персоналу (до 200 сотрудников) в Санкт-Петербурге &raquo;</a></p>
<p>Вы имеете возможность оплатить услугу по безналичному расчету (для юридических лиц и индивидуальных предпринимателей).
<a href="/servis/dogovor/" class="lk1">Перейти к оформлению счета &raquo</a></p>
<h2>Формирование отчета</h2>
<?php
if(!isset($_GET["step"])){$step=1;}
if(isset($_GET["step"])){$step=$_GET["step"];}
echo('<div class="indiv">');
include($folder.'_admin/moduls/indiv_report/indiv-step'.$step.'.php');
echo('</div>');
?>
<p><a href='http://obzorzarplat.ru/servis/otchet/result/index.php?d=9BaaIq10u1bo5fQk1t0B' class="lk1" target="_blank">Посмотрите образец отчета по заработной плате</a></p>
<p>По всем вопросам обращайтесь в нашу службу поддержки: <a href="http://help.obzorzarplat.ru" class="lk1">http://help.obzorzarplat.ru</a></p>
</div>