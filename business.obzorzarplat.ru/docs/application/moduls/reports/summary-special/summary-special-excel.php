<?php
require_once $folder.'application/libs/pear/PEAR/Spreadsheet/Excel/Writer.php';

$company_name=stripslashes(mysqli_result(mysqli_query($link,"SELECT company from for_users_corporat where id = '$user_id'"),0,0));
$header='Отчет подготовлен по заказу '.$company_name;
$footer='Аналитический обзор рынка заработных плат и компенсаций | Исследование подготовлено порталом http://obzorzarplat.ru';
$city='Город: '.$city_name;
$factor=$factor_name.' '.$factor_value_name;

// Creating a workbook
$workbook = new Spreadsheet_Excel_Writer($filedir.$filename_xls);

$format =& $workbook->addFormat(array('Size' => 11,'Align' => 'center','Bold' => 1,'Border' => 1));
$format->setFontFamily('Times New Roman');

$format1 =& $workbook->addFormat(array('Size' => 11,'Align' => 'center','Border' => 1));
$format1->setFontFamily('Times New Roman');

$format2 =& $workbook->addFormat(array('Size' => 11, 'Border' => 1));
$format2->setFontFamily('Times New Roman');

$format3 =& $workbook->addFormat(array('Size' => 11));
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
$worksheet->write(0,0,'Таблица 1. Среднемесячные значения компенсации труда (руб. в месяц)',$format3);

$worksheet->write(2,0,$city,$format3);
$worksheet->write(3,0,$factor,$format3);

$worksheet->write(5, 0, 'Должность',$format);
$worksheet->write(5, 1, '10%',$format);
$worksheet->write(5, 2, '25%',$format);
$worksheet->write(5, 3, 'Среднее',$format);
$worksheet->write(5, 4, 'Медиана',$format);
$worksheet->write(5, 5, '75%',$format);
$worksheet->write(5, 6, '90%',$format);
$worksheet->write(5, 7, 'Обновление',$format);

$n=6;
foreach($job as $job_id){
    $worksheet->write($n, 0, $job_name[$job_id],$format2);
    $worksheet->write($n, 1, str_replace(' ', '', $cash_indexes[$job_id][0]),$format1);
    $worksheet->write($n, 2, str_replace(' ', '', $cash_indexes[$job_id][1]),$format1);
    $worksheet->write($n, 3, str_replace(' ', '', $cash_indexes[$job_id][2]),$format1);
    $worksheet->write($n, 4, str_replace(' ', '', $cash_indexes[$job_id][3]),$format1);
    $worksheet->write($n, 5, str_replace(' ', '', $cash_indexes[$job_id][4]),$format1);
    $worksheet->write($n, 6, str_replace(' ', '', $cash_indexes[$job_id][5]),$format1);
    $worksheet->write($n, 7, $dateUpdateMax[$job_id],$format1);
    $n++;
}
$n++;
$worksheet->write($n, 0, 'Все данные представлены в российских рублях до выплаты налогов (gross)',$format3);


// Creating 2 worksheet
$worksheet =& $workbook->addWorksheet('Заработная плата');

$worksheet->setHeader($header,0.5);
$worksheet->setFooter($footer,0.5);
$worksheet->setLandscape();
$worksheet->hideScreenGridlines();

$worksheet->setColumn(0,0,40);
$worksheet->setColumn(1,6,12);
$worksheet->setColumn(7,7,15);

// The actual data
$worksheet->write(0,0,'Таблица 2. Среднемесячные значения заработной платы (руб. в месяц)',$format3);

$worksheet->write(2,0,$city,$format3);
$worksheet->write(3,0,$factor,$format3);

$worksheet->write(5, 0, 'Должность',$format);
$worksheet->write(5, 1, '10%',$format);
$worksheet->write(5, 2, '25%',$format);
$worksheet->write(5, 3, 'Среднее',$format);
$worksheet->write(5, 4, 'Медиана',$format);
$worksheet->write(5, 5, '75%',$format);
$worksheet->write(5, 6, '90%',$format);
$worksheet->write(5, 7, 'Обновление',$format);

$n=6;
foreach($job as $job_id){
    $worksheet->write($n, 0, $job_name[$job_id],$format2);
    $worksheet->write($n, 1, str_replace(' ', '', $salary_indexes[$job_id][0]),$format1);
    $worksheet->write($n, 2, str_replace(' ', '', $salary_indexes[$job_id][1]),$format1);
    $worksheet->write($n, 3, str_replace(' ', '', $salary_indexes[$job_id][2]),$format1);
    $worksheet->write($n, 4, str_replace(' ', '', $salary_indexes[$job_id][3]),$format1);
    $worksheet->write($n, 5, str_replace(' ', '', $salary_indexes[$job_id][4]),$format1);
    $worksheet->write($n, 6, str_replace(' ', '', $salary_indexes[$job_id][5]),$format1);
    $worksheet->write($n, 7, $dateUpdateMax[$job_id],$format1);
    $n++;
}
$n++;
$worksheet->write($n, 0, 'Все данные представлены в российских рублях до выплаты налогов (gross)',$format3);


// Creating 3 worksheet
$worksheet =& $workbook->addWorksheet('Должностной оклад');

$worksheet->setHeader($header,0.5);
$worksheet->setFooter($footer,0.5);
$worksheet->setLandscape();
$worksheet->hideScreenGridlines();

$worksheet->setColumn(0,0,40);
$worksheet->setColumn(1,6,12);
$worksheet->setColumn(7,7,15);

// The actual data
$worksheet->write(0,0,'Таблица 3. Среднемесячные значения должностного оклада (руб. в месяц)',$format3);
$worksheet->write(2,0,$city,$format3);
$worksheet->write(3,0,$factor,$format3);

$worksheet->write(5, 0, 'Должность',$format);
$worksheet->write(5, 1, '10%',$format);
$worksheet->write(5, 2, '25%',$format);
$worksheet->write(5, 3, 'Среднее',$format);
$worksheet->write(5, 4, 'Медиана',$format);
$worksheet->write(5, 5, '75%',$format);
$worksheet->write(5, 6, '90%',$format);
$worksheet->write(5, 7, 'Обновление',$format);

$n=6;
foreach($job as $job_id){
    $worksheet->write($n, 0, $job_name[$job_id],$format2);
    $worksheet->write($n, 1, str_replace(' ', '', $base_indexes[$job_id][0]),$format1);
    $worksheet->write($n, 2, str_replace(' ', '', $base_indexes[$job_id][1]),$format1);
    $worksheet->write($n, 3, str_replace(' ', '', $base_indexes[$job_id][2]),$format1);
    $worksheet->write($n, 4, str_replace(' ', '', $base_indexes[$job_id][3]),$format1);
    $worksheet->write($n, 5, str_replace(' ', '', $base_indexes[$job_id][4]),$format1);
    $worksheet->write($n, 6, str_replace(' ', '', $base_indexes[$job_id][5]),$format1);
    $worksheet->write($n, 7, $dateUpdateMax[$job_id],$format1);
    $n++;
}
$n++;
$worksheet->write($n, 0, 'Все данные представлены в российских рублях до выплаты налогов (gross)',$format3);

// Creating 4 worksheet
$worksheet =& $workbook->addWorksheet('Премии');

$worksheet->setHeader($header,0.5);
$worksheet->setFooter($footer,0.5);
$worksheet->setLandscape();
$worksheet->hideScreenGridlines();

$worksheet->setColumn(0,0,40);
$worksheet->setColumn(1,6,12);
$worksheet->setColumn(7,7,15);

// The actual data
$worksheet->write(0,0,'Таблица 4. Среднемесячные значения премиальной части компенсационного пакета (руб. в месяц)',$format3);
$worksheet->write(2,0,$city,$format3);
$worksheet->write(3,0,$factor,$format3);

$worksheet->write(5, 0, 'Должность',$format);
$worksheet->write(5, 1, '10%',$format);
$worksheet->write(5, 2, '25%',$format);
$worksheet->write(5, 3, 'Среднее',$format);
$worksheet->write(5, 4, 'Медиана',$format);
$worksheet->write(5, 5, '75%',$format);
$worksheet->write(5, 6, '90%',$format);
$worksheet->write(5, 7, 'Обновление',$format);

$n=6;
foreach($job as $job_id){
    $worksheet->write($n, 0, $job_name[$job_id],$format2);
    $worksheet->write($n, 1, str_replace(' ', '', $premium_indexes[$job_id][0]),$format1);
    $worksheet->write($n, 2, str_replace(' ', '', $premium_indexes[$job_id][1]),$format1);
    $worksheet->write($n, 3, str_replace(' ', '', $premium_indexes[$job_id][2]),$format1);
    $worksheet->write($n, 4, str_replace(' ', '', $premium_indexes[$job_id][3]),$format1);
    $worksheet->write($n, 5, str_replace(' ', '', $premium_indexes[$job_id][4]),$format1);
    $worksheet->write($n, 6, str_replace(' ', '', $premium_indexes[$job_id][5]),$format1);
    $worksheet->write($n, 7, $dateUpdateMax[$job_id],$format1);
    $n++;
}
$n++;
$worksheet->write($n, 0, 'Все данные представлены в российских рублях до выплаты налогов (gross)',$format3);


// Creating 5 worksheet
$worksheet =& $workbook->addWorksheet('Бонусы');

$worksheet->setHeader($header,0.5);
$worksheet->setFooter($footer,0.5);
$worksheet->setLandscape();
$worksheet->hideScreenGridlines();

$worksheet->setColumn(0,0,40);
$worksheet->setColumn(1,6,12);
$worksheet->setColumn(7,7,15);

// The actual data
$worksheet->write(0,0,'Таблица 5. Среднемесячные значения бонусной части компенсационного пакета (руб. в месяц)',$format3);
$worksheet->write(2,0,$city,$format3);
$worksheet->write(3,0,$factor,$format3);

$worksheet->write(5, 0, 'Должность',$format);
$worksheet->write(5, 1, '10%',$format);
$worksheet->write(5, 2, '25%',$format);
$worksheet->write(5, 3, 'Среднее',$format);
$worksheet->write(5, 4, 'Медиана',$format);
$worksheet->write(5, 5, '75%',$format);
$worksheet->write(5, 6, '90%',$format);
$worksheet->write(5, 7, 'Обновление',$format);

$n=6;
foreach($job as $job_id){
    $worksheet->write($n, 0, $job_name[$job_id],$format2);
    $worksheet->write($n, 1, str_replace(' ', '', $bonus_indexes[$job_id][0]),$format1);
    $worksheet->write($n, 2, str_replace(' ', '', $bonus_indexes[$job_id][1]),$format1);
    $worksheet->write($n, 3, str_replace(' ', '', $bonus_indexes[$job_id][2]),$format1);
    $worksheet->write($n, 4, str_replace(' ', '', $bonus_indexes[$job_id][3]),$format1);
    $worksheet->write($n, 5, str_replace(' ', '', $bonus_indexes[$job_id][4]),$format1);
    $worksheet->write($n, 6, str_replace(' ', '', $bonus_indexes[$job_id][5]),$format1);
    $worksheet->write($n, 7, $dateUpdateMax[$job_id],$format1);
    $n++;
}
$n++;
$worksheet->write($n, 0, 'Все данные представлены в российских рублях до выплаты налогов (gross)',$format3);

// Let's send the file
$workbook->close();
?>