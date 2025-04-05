<?php
require_once $folder.'pear/PEAR/Spreadsheet/Excel/Writer.php';
//
//src only fol localhost!!!!
//require_once $folder.'_admin/lib/Spreadsheet/Excel/Writer.php';

$company_name=stripslashes(mysqli_result(mysqli_query($link,"SELECT company from for_users_corporat where id = ".$_SESSION['user_id']. " AND password = '".$_SESSION['psw']."'"),0,0));
$header='Отчет подготовлен по заказу '.$company_name;
$footer='Аналитический обзор рынка заработных плат и компенсаций | Исследование подготовлено порталом http://obzorzarplat.ru';
$city='Город: '.$city_name;
//$factor=$factor_name.' '.$factor_value_name;

// Creating a workbook
$workbook = new Spreadsheet_Excel_Writer($filedir.$filename_xls);

$format =& $workbook->addFormat(array('Size' => 11,'Align' => 'center','Bold' => 1,'Border' => 1));
$format->setFontFamily('Times New Roman');

$format1 =& $workbook->addFormat(array('Size' => 11,'Align' => 'center','Border' => 1));
$format1->setFontFamily('Times New Roman');

$format2 =& $workbook->addFormat(array('Size' => 11, 'Border' => 1));
$format2->setFontFamily('Times New Roman');

$format3 =& $workbook->addFormat(array('Size' => 11,'Bold' => 1));
$format3->setFontFamily('Times New Roman');

// sending HTTP headers
//$workbook->send('test.xls');


// Creating 1 worksheet
$worksheet =& $workbook->addWorksheet('Компенсация труда');

$worksheet->setHeader($header,0.5);
$worksheet->setFooter($footer,0.5);
$worksheet->setLandscape();
$worksheet->hideScreenGridlines();

$worksheet->setColumn(0,0,40);
$worksheet->setColumn(1,6,12);
$worksheet->setColumn(7,7,15);

// The actual data

$worksheet->write(0,0,$city,$format3);
//$worksheet->write(3,0,$factor,$format3);

$n=3;
foreach($job as $job_id){

$worksheet->write($n, 0, $job_name[$job_id],$format3);
$n++;
$worksheet->write($n, 0, '',$format);
$worksheet->write($n, 1, '10%',$format);
$worksheet->write($n, 2, '25%',$format);
$worksheet->write($n, 3, 'Среднее',$format);
$worksheet->write($n, 4, 'Медиана',$format);
$worksheet->write($n, 5, '75%',$format);
$worksheet->write($n, 6, '90%',$format);
$n++;
// write to table monthly wage
    $worksheet->write($n, 0, 'Оклад',$format2);
    $worksheet->writeNumber($n, 1, round($base10[$job_id]),$format1);
    $worksheet->writeNumber($n, 2, round($base25[$job_id]),$format1);
    $worksheet->write($n, 3, round($baseAvr[$job_id]),$format1);
    $worksheet->write($n, 4, round($base50[$job_id]),$format1);
    $worksheet->write($n, 5, round($base75[$job_id]),$format1);
    $worksheet->write($n, 6, round($base90[$job_id]),$format1);
    $n++;

// write to table salary

 $worksheet->write($n,0,'Заработная плата',$format2);
    $worksheet->write($n, 1, round($salary10[$job_id]),$format1);
    $worksheet->write($n, 2, round($salary25[$job_id]),$format1);
    $worksheet->write($n, 3, round($salaryAvr[$job_id]),$format1);
    $worksheet->write($n, 4, round($salary50[$job_id]),$format1);
    $worksheet->write($n, 5, round($salary75[$job_id]),$format1);
    $worksheet->write($n, 6, round($salary90[$job_id]),$format1);
    $n++;

// write to table compensations

 $worksheet->write($n,0,'Бенефиты',$format2);
    $worksheet->write($n, 1, round($compensation10[$job_id]),$format1);
    $worksheet->write($n, 2, round($compensation25[$job_id]),$format1);
    $worksheet->write($n, 3, round($compensationAvr[$job_id]),$format1);
    $worksheet->write($n, 4, round($compensation50[$job_id]),$format1);
    $worksheet->write($n, 5, round($compensation75[$job_id]),$format1);
    $worksheet->write($n, 6, round($compensation90[$job_id]),$format1);
    $n=$n+2;
}
$n++;
$worksheet->write($n, 0, 'Все данные представлены в российских рублях до выплаты налогов (gross)',$format3);

// Let's send the file
$workbook->close();
?>