<?php

$page='';
$page.='
<link href="/_css/summary/summary_print.css" rel="stylesheet" type="text/css">
<div class="summary">
<h2>Сводный аналитический обзор заработных плат '.$city_name_partitive.'</h2>
<p>'.$factor_name.' '.$factor_value_name.'</p>
';

foreach($job as $job_id){$page.=$out[$job_id];}

$page.='
</table>
<p>Все данные представлены в российских рублях <b>до выплаты налогов (gross)</b></p>
</div>
';


//Запись в файл
$fullpath=$filedir.$filename_html;
$file = fopen ("$fullpath","w+");
fputs ( $file, $page);
fclose ($file);

?>