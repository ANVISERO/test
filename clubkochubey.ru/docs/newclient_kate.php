<?php
$ret="<p class='error'>";
$noerrors=true;

$chname=Array(
"fsurname",
"fname",
"fpatronymic",
"fcompanyname",
"fposition",
"fsourse",
"femail",
"frecvisits_1",
"frecvisits_2",
"frecvisits_3",
"frecvisits_4",
"fwithreport_1",
"fwithreport_2",
"fwithreport_3",
"fwithreport_4",
"fwithreport_5",
"fwithreport_6",
"fmailer"
);
$chnameru=Array(
"�������",
"���",
"��������",
"������� ��������",
"���������",
"���������",
"�����",
"�����",
"E-mail",
"���������"
);
for ($i=0;$i<10;$i++)
{
  if ($_POST[$chname[$i]]=="")
  {
    $ret.="���� \"".$chnameru[$i]."\" ����������� ��� ����������<br>";
    $noerrors=false;
  }
};
/*if ($noerrors&&!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $_POST["femail"]))
{
	$ret.="E-mail ������ �����������<br>";
    $noerrors=false;
}     */
$ret.="</p>";
if ($noerrors)
{

$subject = "����� ������ ��:".$_POST["fsurname"];
$message = '
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru">
<html>
    <head>
        <title>������ ������ �������</title>
    </head>
    <body>

	<table cellspacing="2" cellpadding="2" border="1">
<tr >
	<td align="right">�������*</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsurname"]).'</td>
</tr>
<tr>
	<td align="right">���*</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fname"]).'</td>
</tr>
<tr>
	<td align="right">��������*</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fpatronymic"]).'</td>
</tr>
<tr>
	<td align="right">������� ��������*</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fcompanyname"]).'</td>
</tr>

<tr>
	<td align="right">���������*</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fposition"]).'</td>
</tr>

<tr>
	<td align="right">�� ����� ���������� �� ������ � ������-������</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse"]).'</td>
</tr>
<tr>
	<td align="right">E-mail*</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["femail"]).'</td>
</tr>
<tr>
	<td align="right">���� �������� �� ������-������ �����������?</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["frecvisits_1"]).'</td>
</tr>
<tr>
	<td align="right">�� �������� � ���� ������� ����� ������?</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["frecvisits_2"]).'</td>
</tr>
<tr>
	<td align="right">���������� ���������� �� ������-������ ������� ��������� ����������� ����� ������?</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["frecvisits_3"]).'</td>
</tr>
<tr>
	<td align="right">����� ���� ��� �������� �� �������� �� ��������� ������-�������?</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["frecvisits_4"]).'</td>
</tr>
<tr>
	<td align="right">�������� �� �� ������-����� ������� �������� ��� �������� �� ������ ����?</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fwithreport_1"]).'</td>
</tr>
<tr>
	<td align="right">��� ���������� ����� ����������?</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fwithreport_2"]).'</td>
</tr>
<tr>
	<td align="right">��� ���������� ����� ����������?</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fwithreport_3"]).'</td>
</tr>
<tr>
	<td align="right">���� �� ��������� �� ����-������?</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fwithreport_4"]).'</td>
</tr>
<tr>
	<td align="right">��������� �� ��� ������� ������� � ��������� ������-������, ����������� ������� �����������?</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fwithreport_5"]).'</td>
</tr>
<tr>
	<td align="right">��������� �� ��� ������� ������� � ��������� ������-������, ����������� ������������ ���������������?</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fwithreport_6"]).'</td>
</tr>
</table>

    </body>
</html>';
$headers  = "Content-type: text/html; charset=windows-1251 \r\n";
$headers .= "From: New client\r\n";
$headers .= "\r\n";
$to  = "petrova.ekaterina@clubkochubey.ru" ;
//$to  = "octane89@mail.ru";
mail($to, $subject, $message, $headers);
echo "ok";
}
else{echo $ret;}
?>