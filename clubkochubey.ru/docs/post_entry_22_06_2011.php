<?php
$ret="<p class='error'>";
$errors=0;

$chname=Array(
	"fsurname",
	"fname",
	"fpatronymic",
	"fcompanyname",
	"fposition",
	"femail",
	"fsourse",
	"frecvisits_1",
	"frecvisits_2",
	"frecvisits_3",
	"frecvisits_4",
	"frecvisits_5",
	"fwithreport_0",
	"fwithreport_1",
	"fwithreport_2",
	"fwithreport_3",
	"fwithreport_4",
	"fwithreport_5",
	"fwithreport_6",
	"fwithreport_7",
	"fwithreport_8",
	"fwithreport_9",
	"fwithreport_10",
	"fwithreport_11",
        "fwithreport_12",
        "fwithreport_13",
	"fmailer"
	);
$chnameru=Array(
	"�������",
	"���",
	"��������",
	"������� ��������",
	"���������",
	"E-mail"
	);

foreach ($chnameru as $key => $value){
	if(trim(strip_tags($_POST[$chname[$key]]))==""){
		$ret.="���� \"".$value."\" ����������� ��� ����������<br>";
		$errors=1;
		}
	}
/*
if (!$errors&&!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $_POST["femail"])){
	$ret.="E-mail ������ �����������<br/>";
	$errors=1;
	}
*/
$ret.="</p>";
if(!$errors){
	$subject = "����� ������ ��:".iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fsurname"]));
	$message = '
		<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru">
			<head>
				<title>������ �������� ����� ��������� �����������</title>
			</head>
			<body>
				<table cellspacing="2" cellpadding="2" border="1">
					<tr>
						<td align="right">�������*</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fsurname"])).'</td>
					</tr>
					<tr>
						<td align="right">���*</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fname"])).'</td>
					</tr>
					<tr>
						<td align="right">��������*</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fpatronymic"])).'</td>
					</tr>
					<tr>
						<td align="right">������� ��������*</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fcompanyname"])).'</td>
					</tr>
					<tr>
						<td align="right">���������*</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fposition"])).'</td>
					</tr>
					<tr>
						<td align="right">�� ����� ���������� �� ������ � ���������</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fsourse"])).'</td>
					</tr>
					<tr>
						<td align="right">E-mail*</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["femail"])).'</td>
					</tr>
					<tr>
						<td align="right">��������� �� ��������� ���� ��������? ������� ����������� � ����� �� 5-�������� �����.</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fwithreport_0"])).'</td>
					</tr>
					<tr>
						<td align="right">���� �����������</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["frecvisits_1"])).'</td>
					</tr>
					<tr>
						<td align="right">��������������� �����������.</td>
                                                <td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fwithreport_12"])).'</td>
					</tr>
					<tr>
						<td align="right">���� �����������</td>						
                                           <td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["frecvisits_2"])).'</td>
					</tr>
					<tr>
						<td align="right">�������� ���� </td>
                                               	<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["frecvisits_3"])).'</td>
					</tr>
					<tr>
						<td align="right">�����������</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fwithreport_13"])).'</td>
					</tr>
					<tr>
						<td align="right">���� �����������</td>	
                                                <td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["frecvisits_4"])).'</td>
					</tr>
					<tr>
						<td align="right">�����������, ����������, ����, ������� �� ���������� ��� ����������.</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["frecvisits_5"])).'</td>
					</tr>
					<tr>
						<td align="right">����������� �� �� ���� ������ �����������?</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fwithreport_9"])).'</td>
					</tr>
					<tr>
						<td align="right">������ �� �� ������ � ������������� �������� � ������������� ���������������� �������� ����� "�������"?</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fwithreport_10"])).'</td>
					</tr>
									</table>
			</body>
		</html>';
	$headers  = "Content-type: text/html; charset=windows-1251 \r\n";
	$headers .= "From: Entry 22 june\r\n";
	$headers .= "\r\n";
	$to  = "petrova.ekaterina@clubkochubey.ru" ;
	mail($to, $subject, $message, $headers);
	echo "ok";
	}else{
	echo $ret;
	}
?>