<p><span class="title_mini_others">1. <a href="?step=1">Выбор факторов &raquo;</a></span><span class="title_mini_others"> 2. <a href="#" onclick="return document.back.submit();">Выбор должностей &raquo;</a></span><span class="title_mini"> 3. Отчет &raquo;</span></p>
<br>

<h2>Сводный аналитический обзор заработных плат <?php echo($city_name_partitive); ?></h2>

<p><?php echo($factor_name.' '.$factor_value_name);?></p>
<p>Все данные представлены в российских рублях <b>до выплаты налогов (gross)</b></p>

<p align="right"><img src="/_img/business/report-excel.png" alt="отчет в формате Excel" title="отчет в формате Excel"><a href="<?php echo($url_xls);?>" target="_blank" class="lk2">отчет в формате Excel &raquo;</a> | 
<a href="/business/archive/html.php?d=<?php echo($url);?>" class="lk2" target="_blank">Версия для печати &raquo;</a></p>


<?php
foreach($job as $job_id){
    echo($out[$job_id]);
}
?>

<p><input class="but1" value="Новый отчет &raquo;" onClick="self.location.href='/business/work/summary_special/?step=1'"></p>