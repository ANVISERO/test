<?php
//require_once $folder.'application/libs/pear/PEAR/Spreadsheet/Excel/Writer.php';
//
//src only fol localhost!!!!
require_once 'Spreadsheet/Excel/Writer.php';

$company_name=stripslashes(mysqli_result(mysqli_query($link,"SELECT company from for_users_corporat where id ='$user_id' "),0,0));
$header='����� ����������� �� ������ '.$company_name;
$footer='������������� ����� ����� ���������� ���� � ����������� | ������������ ������������ �������� http://obzorzarplat.ru';

$jtype='����������� ������: '.$jtype_name;
$job='���������: '.$name;
$city='�����: '.$region_name;

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

// Creating 1 worksheet
$worksheet =& $workbook->addWorksheet('�����, ���������� �����');

$worksheet->setHeader($header,0.5);
$worksheet->setFooter($footer,0.5);
$worksheet->setLandscape();
$worksheet->hideScreenGridlines();

$worksheet->setColumn(0,0,20);
$worksheet->setColumn(1,2,17);
$worksheet->setColumn(3,3,25);
$worksheet->setColumn(4,4,10);
$worksheet->setColumn(5,6,17);

// The actual data
$worksheet->write(0,0,$jtype,$format3);
$worksheet->write(1,0,$job,$format3);
$worksheet->write(2,0,$city,$format3);

$worksheet->write(4,0,'������� 1. ����������� �����, ���������� �����',$format3);
$worksheet->write(6, 0, '',$format);
$worksheet->write(6, 1, '10 ����������',$format);
$worksheet->write(6, 2, '25 ����������',$format);
$worksheet->write(6, 3, '50 ���������� (�������)',$format);
$worksheet->write(6, 4, '�������',$format);
$worksheet->write(6, 5, '75 ����������',$format);
$worksheet->write(6, 6, '90 ����������',$format);

$worksheet->write(7, 0, '����������� �����',$format2);
$worksheet->writeNumber(7, 1, round($proc_10_salary),$format1);
$worksheet->writeNumber(7, 2, round($proc_25_salary),$format1);
$worksheet->writeNumber(7, 3, round($proc_50_salary),$format1);
$worksheet->writeNumber(7, 4, round($official_salary_sre),$format1);
$worksheet->writeNumber(7, 5, round($proc_75_salary),$format1);
$worksheet->writeNumber(7, 6, round($proc_90_salary),$format1);

$worksheet->write(8, 0, '���������� �����',$format2);
$worksheet->writeNumber(8, 1, round($proc_10_salary_bonus),$format1);
$worksheet->writeNumber(8, 2, round($proc_25_salary_bonus),$format1);
$worksheet->writeNumber(8, 3, round($proc_50_salary_bonus),$format1);
$worksheet->writeNumber(8, 4, round($salary_bonus_sre),$format1);
$worksheet->writeNumber(8, 5, round($proc_75_salary_bonus),$format1);
$worksheet->writeNumber(8, 6, round($proc_90_salary_bonus),$format1);

$worksheet->write(10, 0, '��� ������ ������������ � ���������� ������ �� ������� ������� (gross)',$format3);

// Creating 2 worksheet
$worksheet =& $workbook->addWorksheet('��������������� �����');

$format4 =& $workbook->addFormat(array('Size' => 11,'Align' => 'center','Bold' => 1,'Border' => 1, 'FgColor' => 'silver'));
$format4->setFontFamily('Times New Roman');

$worksheet->setHeader($header,0.5);
$worksheet->setFooter($footer,0.5);
$worksheet->setLandscape();
$worksheet->hideScreenGridlines();

$worksheet->setColumn(0,0,18);
$worksheet->setColumn(1,1,28);
$worksheet->setColumn(2,3,18);
$worksheet->setColumn(4,4,20);

// The actual data
$worksheet->write(0,0,$jtype,$format3);
$worksheet->write(1,0,$job,$format3);
$worksheet->write(2,0,$city,$format3);

$worksheet->write(4,0,'������� 2. ��������� ���������������� ������',$format3);
$worksheet->write(6, 0, '������������� �����',$format4);
$worksheet->write(6, 1, '',$format4);
$worksheet->setMerge(6, 0, 6, 1);
$worksheet->write(6, 2, '���������� �����',$format4);
$worksheet->write(6, 3, '',$format4);
$worksheet->setMerge(6, 2, 6, 3);
$worksheet->write(6, 4, '�����������',$format4);
$worksheet->write(7, 4, '',$format4);
$worksheet->setMerge(6, 4, 7, 4);
$worksheet->write(7, 0, '�����',$format4);
$worksheet->write(7, 1, '������� � ��������',$format4);
$worksheet->write(7, 2, '������',$format4);
$worksheet->write(7, 3, '������',$format4);

$worksheet->write(8, 0, number_format($official_salary_part,1,',',' ').'%',$format1);
$worksheet->write(8, 1, number_format($add_payment_part,1,',',' ').'%',$format1);
$worksheet->write(8, 2, number_format($bonus_part,1,',',' ').'%',$format1);
$worksheet->write(8, 3, number_format($premium_part,1,',',' ').'%',$format1);
$worksheet->write(8, 4, number_format($compensation_part,1,',',' ').'%',$format1);

$workbook->close();
?>
