<?php
require_once $folder.'application/libs/pear/PEAR/Spreadsheet/Excel/Writer.php';
//
//src only fol localhost!!!!
//require_once '/Spreadsheet/Excel/Writer.php';

$company_name=stripslashes(mysqli_result(mysqli_query($link,"SELECT company from for_users_corporat where id ='$user_id' "),0,0));
$header='����� ����������� �� ������ '.$company_name;
$footer='������������� ����� ����� ���������� ���� � ����������� | ������������ ������������ �������� http://obzorzarplat.ru';


$for_replacing=array(' ','-');
// Creating a workbook
$workbook = new Spreadsheet_Excel_Writer($filedir.$filename_xls);

$format =& $workbook->addFormat(array('Size' => 11,'Align' => 'center','Bold' => 1,'Border' => 1));
$format->setFontFamily('Times New Roman');

$format1 =& $workbook->addFormat(array('Size' => 11,'Align' => 'center','Border' => 1));
$format1->setFontFamily('Times New Roman');

$format2 =& $workbook->addFormat(array('Size' => 11, 'Border' => 1));
$format2->setFontFamily('Times New Roman');

$format3 =& $workbook->addFormat(array('Size' => 13));
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
$worksheet->write(0,0,'����������� ������: '.$jtype_name,$format3);
$worksheet->write(1,0,'���������: '.$job_name,$format3);
$worksheet->write(2,0,'�����: '.$city_name,$format3);
$worksheet->write(4,0,'�������������� ��������: ', $format3);
$worksheet->write(5,0,'����� ������������ ��������: '.$sphere_name,$format3);
$worksheet->write(6,0,'���������� ����������� � ��������: '.$personal_name,$format3);
$worksheet->write(7,0,'������ ��������: '.$turnover_name,$format3);
$worksheet->write(9,0,'��� ������ ������������ � ���������� ������ ����� ������� ������� (net)',$format3);
$worksheet->write(10,0,'���� ���������� ���������� ������ �� ��������� ���������: '.$dateUpdateMax.' ����',$format3);

$worksheet->write(12,0,'������� 1. �������������� �������� ������ ����������� ����� (���. � �����)',$format3);
$worksheet->write(14, 0, '',$format);
$worksheet->write(14, 1, '10 ����������',$format);
$worksheet->write(14, 2, '25 ����������',$format);
$worksheet->write(14, 3, '50 ���������� (�������)',$format);
$worksheet->write(14, 4, '�������',$format);
$worksheet->write(14, 5, '75 ����������',$format);
$worksheet->write(14, 6, '90 ����������',$format);

$worksheet->write(15, 0, '����������� �����',$format2);
$worksheet->writeNumber(15, 1, str_replace($for_replacing,'',$cash_indexes[0]),$format1);
$worksheet->writeNumber(15, 2, str_replace($for_replacing,'',$cash_indexes[1]),$format1);
$worksheet->writeNumber(15, 3, str_replace($for_replacing,'',$cash_indexes[2]),$format1);
$worksheet->writeNumber(15, 4, str_replace($for_replacing,'',$cash_indexes[3]),$format1);
$worksheet->writeNumber(15, 5, str_replace($for_replacing,'',$cash_indexes[4]),$format1);
$worksheet->writeNumber(15, 6, str_replace($for_replacing,'',$cash_indexes[5]),$format1);

$worksheet->write(16, 0, '���������� �����',$format2);
$worksheet->writeNumber(16, 1, str_replace($for_replacing,'',$salary_indexes[0]),$format1);
$worksheet->writeNumber(16, 2, str_replace($for_replacing,'',$salary_indexes[1]),$format1);
$worksheet->writeNumber(16, 3, str_replace($for_replacing,'',$salary_indexes[2]),$format1);
$worksheet->writeNumber(16, 4, str_replace($for_replacing,'',$salary_indexes[3]),$format1);
$worksheet->writeNumber(16, 5, str_replace($for_replacing,'',$salary_indexes[4]),$format1);
$worksheet->writeNumber(16, 6, str_replace($for_replacing,'',$salary_indexes[5]),$format1);

$worksheet->write(17, 0, '����������� �����',$format2);
$worksheet->writeNumber(17, 1, str_replace($for_replacing,'',$base_indexes[0]),$format1);
$worksheet->writeNumber(17, 2, str_replace($for_replacing,'',$base_indexes[1]),$format1);
$worksheet->writeNumber(17, 3, str_replace($for_replacing,'',$base_indexes[2]),$format1);
$worksheet->writeNumber(17, 4, str_replace($for_replacing,'',$base_indexes[3]),$format1);
$worksheet->writeNumber(17, 5, str_replace($for_replacing,'',$base_indexes[4]),$format1);
$worksheet->writeNumber(17, 6, str_replace($for_replacing,'',$base_indexes[5]),$format1);

$worksheet->write(18, 0, '������',$format2);
$worksheet->writeNumber(18, 1, str_replace($for_replacing,'',$premium_indexes[0]),$format1);
$worksheet->writeNumber(18, 2, str_replace($for_replacing,'',$premium_indexes[1]),$format1);
$worksheet->writeNumber(18, 3, str_replace($for_replacing,'',$premium_indexes[2]),$format1);
$worksheet->writeNumber(18, 4, str_replace($for_replacing,'',$premium_indexes[3]),$format1);
$worksheet->writeNumber(18, 5, str_replace($for_replacing,'',$premium_indexes[4]),$format1);
$worksheet->writeNumber(18, 6, str_replace($for_replacing,'',$premium_indexes[5]),$format1);

$worksheet->write(19, 0, '������',$format2);
$worksheet->writeNumber(19, 1, str_replace($for_replacing,'',$bonus_indexes[0]),$format1);
$worksheet->writeNumber(19, 2, str_replace($for_replacing,'',$bonus_indexes[1]),$format1);
$worksheet->writeNumber(19, 3, str_replace($for_replacing,'',$bonus_indexes[2]),$format1);
$worksheet->writeNumber(19, 4, str_replace($for_replacing,'',$bonus_indexes[3]),$format1);
$worksheet->writeNumber(19, 5, str_replace($for_replacing,'',$bonus_indexes[4]),$format1);
$worksheet->writeNumber(19, 6, str_replace($for_replacing,'',$bonus_indexes[5]),$format1);

$worksheet->write(20, 0, '��������',$format2);
$worksheet->writeNumber(20, 1, str_replace($for_replacing,'',$compensation_indexes[0]),$format1);
$worksheet->writeNumber(20, 2, str_replace($for_replacing,'',$compensation_indexes[1]),$format1);
$worksheet->writeNumber(20, 3, str_replace($for_replacing,'',$compensation_indexes[2]),$format1);
$worksheet->writeNumber(20, 4, str_replace($for_replacing,'',$compensation_indexes[3]),$format1);
$worksheet->writeNumber(20, 5, str_replace($for_replacing,'',$compensation_indexes[4]),$format1);
$worksheet->writeNumber(20, 6, str_replace($for_replacing,'',$compensation_indexes[5]),$format1);

$workbook->close();
?>
