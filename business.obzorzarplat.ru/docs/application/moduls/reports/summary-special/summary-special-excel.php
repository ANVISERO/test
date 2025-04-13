<?php
require_once $folder.'application/libs/pear/PEAR/Spreadsheet/Excel/Writer.php';

$company_name=stripslashes(mysqli_result(mysqli_query($link,"SELECT company from for_users_corporat where id = '$user_id'"),0,0));
$header='����� ����������� �� ������ '.$company_name;
$footer='������������� ����� ����� ���������� ���� � ����������� | ������������ ������������ �������� http://obzorzarplat.ru';
$city='�����: '.$city_name;
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
$worksheet =& $workbook->addWorksheet('����������� �����');

$worksheet->setHeader($header,0.5);
$worksheet->setFooter($footer,0.5);
$worksheet->setLandscape();
$worksheet->hideScreenGridlines();

$worksheet->setColumn(0,0,40);
$worksheet->setColumn(1,6,12);
$worksheet->setColumn(7,7,15);

// The actual data
$worksheet->write(0,0,'������� 1. �������������� �������� ����������� ����� (���. � �����)',$format3);

$worksheet->write(2,0,$city,$format3);
$worksheet->write(3,0,$factor,$format3);

$worksheet->write(5, 0, '���������',$format);
$worksheet->write(5, 1, '10%',$format);
$worksheet->write(5, 2, '25%',$format);
$worksheet->write(5, 3, '�������',$format);
$worksheet->write(5, 4, '�������',$format);
$worksheet->write(5, 5, '75%',$format);
$worksheet->write(5, 6, '90%',$format);
$worksheet->write(5, 7, '����������',$format);

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
$worksheet->write($n, 0, '��� ������ ������������ � ���������� ������ �� ������� ������� (gross)',$format3);


// Creating 2 worksheet
$worksheet =& $workbook->addWorksheet('���������� �����');

$worksheet->setHeader($header,0.5);
$worksheet->setFooter($footer,0.5);
$worksheet->setLandscape();
$worksheet->hideScreenGridlines();

$worksheet->setColumn(0,0,40);
$worksheet->setColumn(1,6,12);
$worksheet->setColumn(7,7,15);

// The actual data
$worksheet->write(0,0,'������� 2. �������������� �������� ���������� ����� (���. � �����)',$format3);

$worksheet->write(2,0,$city,$format3);
$worksheet->write(3,0,$factor,$format3);

$worksheet->write(5, 0, '���������',$format);
$worksheet->write(5, 1, '10%',$format);
$worksheet->write(5, 2, '25%',$format);
$worksheet->write(5, 3, '�������',$format);
$worksheet->write(5, 4, '�������',$format);
$worksheet->write(5, 5, '75%',$format);
$worksheet->write(5, 6, '90%',$format);
$worksheet->write(5, 7, '����������',$format);

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
$worksheet->write($n, 0, '��� ������ ������������ � ���������� ������ �� ������� ������� (gross)',$format3);


// Creating 3 worksheet
$worksheet =& $workbook->addWorksheet('����������� �����');

$worksheet->setHeader($header,0.5);
$worksheet->setFooter($footer,0.5);
$worksheet->setLandscape();
$worksheet->hideScreenGridlines();

$worksheet->setColumn(0,0,40);
$worksheet->setColumn(1,6,12);
$worksheet->setColumn(7,7,15);

// The actual data
$worksheet->write(0,0,'������� 3. �������������� �������� ������������ ������ (���. � �����)',$format3);
$worksheet->write(2,0,$city,$format3);
$worksheet->write(3,0,$factor,$format3);

$worksheet->write(5, 0, '���������',$format);
$worksheet->write(5, 1, '10%',$format);
$worksheet->write(5, 2, '25%',$format);
$worksheet->write(5, 3, '�������',$format);
$worksheet->write(5, 4, '�������',$format);
$worksheet->write(5, 5, '75%',$format);
$worksheet->write(5, 6, '90%',$format);
$worksheet->write(5, 7, '����������',$format);

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
$worksheet->write($n, 0, '��� ������ ������������ � ���������� ������ �� ������� ������� (gross)',$format3);

// Creating 4 worksheet
$worksheet =& $workbook->addWorksheet('������');

$worksheet->setHeader($header,0.5);
$worksheet->setFooter($footer,0.5);
$worksheet->setLandscape();
$worksheet->hideScreenGridlines();

$worksheet->setColumn(0,0,40);
$worksheet->setColumn(1,6,12);
$worksheet->setColumn(7,7,15);

// The actual data
$worksheet->write(0,0,'������� 4. �������������� �������� ����������� ����� ���������������� ������ (���. � �����)',$format3);
$worksheet->write(2,0,$city,$format3);
$worksheet->write(3,0,$factor,$format3);

$worksheet->write(5, 0, '���������',$format);
$worksheet->write(5, 1, '10%',$format);
$worksheet->write(5, 2, '25%',$format);
$worksheet->write(5, 3, '�������',$format);
$worksheet->write(5, 4, '�������',$format);
$worksheet->write(5, 5, '75%',$format);
$worksheet->write(5, 6, '90%',$format);
$worksheet->write(5, 7, '����������',$format);

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
$worksheet->write($n, 0, '��� ������ ������������ � ���������� ������ �� ������� ������� (gross)',$format3);


// Creating 5 worksheet
$worksheet =& $workbook->addWorksheet('������');

$worksheet->setHeader($header,0.5);
$worksheet->setFooter($footer,0.5);
$worksheet->setLandscape();
$worksheet->hideScreenGridlines();

$worksheet->setColumn(0,0,40);
$worksheet->setColumn(1,6,12);
$worksheet->setColumn(7,7,15);

// The actual data
$worksheet->write(0,0,'������� 5. �������������� �������� �������� ����� ���������������� ������ (���. � �����)',$format3);
$worksheet->write(2,0,$city,$format3);
$worksheet->write(3,0,$factor,$format3);

$worksheet->write(5, 0, '���������',$format);
$worksheet->write(5, 1, '10%',$format);
$worksheet->write(5, 2, '25%',$format);
$worksheet->write(5, 3, '�������',$format);
$worksheet->write(5, 4, '�������',$format);
$worksheet->write(5, 5, '75%',$format);
$worksheet->write(5, 6, '90%',$format);
$worksheet->write(5, 7, '����������',$format);

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
$worksheet->write($n, 0, '��� ������ ������������ � ���������� ������ �� ������� ������� (gross)',$format3);

// Let's send the file
$workbook->close();
?>