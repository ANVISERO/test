<?php

$ret="<p class='error'>";
$noerrors=true;

$chname=Array(
"fsurname",
"fname",
"fpatronymic",
"fcompanyname",
"fposition",
"femail"
);
$chnameru=Array(
"�������",
"���",
"��������",
"������� ��������",
"���������",
"E-mail"
);

for ($i=0;$i<6;$i++)
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
        <td align="right">E-mail*</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["femail"]).'</td>
</tr>
<tr>
        <td align="right">��������� ����� �����. ������� ���� � �������� �������������� ����������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse1"]).'</td>
</tr>
<tr>
        <td align="right">Executive search: ����� ���-����������-2012.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse2"]).'</td>
</tr>
<tr>
        <td align="right">�������������� � ���� � ����� �� ������ ����������� �������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse3"]).'</td>
</tr>
<tr>
        <td align="right">����������� ����������� ���������� ����������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse4"]).'</td>
</tr>
<tr>
        <td align="right">�������� � ����������: ���������, ����������, ������, ������ �����������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse5"]).'</td>
</tr>
<tr>
        <td align="right">����� ������� ��������� � ������ ������������� ��� ������.� � ����������: ���������, ����������, ������, ������ �����������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse6"]).'</td>
</tr>
<tr>
        <td align="right">������ ����������� �� �����, ������ � ����� ���������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse7"]).'</td>
</tr>
<tr>
        <td align="right">������������ ������ ������� ��������� vs ���������� �������� �������. ������������ � �������������� ������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse8"]).'</td>
</tr>
<tr>
        <td align="right">������ � �������� ������������� ��� ���������� � ������� ��������. ��������� ���������� � ������� � ������� �������� ��� ��������� � �����������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse9"]).'</td>
</tr>
<tr>
        <td align="right">������������� ���������: ������������ ���� "�������� �����".</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse10"]).'</td>
</tr>
<tr>
        <td align="right">��������� ���������: ��������� ������, ������� ��������� ��������� �������� ���������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse11"]).'</td>
</tr>
<tr>
        <td align="right">���������� ����������� ��������� �������� �������� ���������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse12"]).'</td>
</tr>
<tr>
        <td align="right">����� �������� ������� �������������������� ��������. ������� ��������� �������� ��������� � �����, � �������� �������� �����������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse13"]).'</td>
</tr>
<tr>
        <td align="right">��� ����� � �������� ������ �����������: ���� ���������� � �������� ������� ���������� ���������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse14"]).'</td>
</tr>
<tr>
        <td align="right">�������� ������: �������� � ����������������, ���������� ���������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse15"]).'</td>
</tr>
<tr>
        <td align="right">�������� ������������ ������� "��� ���������" � "��� ������".</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse16"]).'</td>
</tr>
<tr>
        <td align="right">����������� � ����� ���������� ������������� �������� ��������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse17"]).'</td>
</tr>
<tr>
        <td align="right">�������� ��������� � �������� ��� ������������ ��������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse18"]).'</td>
</tr>
<tr>
        <td align="right">������� � �������������� ��� ����������� �������� ���������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse19"]).'</td>
</tr>
<tr>
        <td align="right">��������� ����� ��������. ������� ���� � �������� �������������� ����������� ��������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse20"]).'</td>
</tr>
<tr>
        <td align="right">������ ��������� � �������������� KPI. ������ ��������� �� �������� �������. ������ �������������. ������ ������������ �������� �����. ������ ���-����������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse21"]).'</td>
</tr>
<tr>
        <td align="right">����������� ���������� ���������� ���������� �������������� ������: �� �������� �� ���. ���������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse22"]).'</td>
</tr>
<tr>
        <td align="right">������ ������ ���������� � ���������������� ������� ����������. ���� �� ����� �� ������ � ������ �������: ����������� ��� ��������?</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse23"]).'</td>
</tr>
<tr>
        <td align="right">���������� ��������� � ����� �������� ��������� � ������������ ��������� �������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse24"]).'</td>
</tr>
<tr>
        <td align="right">������ ������ � �������� ���������� ����������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse25"]).'</td>
</tr>
<tr>
        <td align="right">������ �� ������ 360 ������������� � ���������� � ����������������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse26"]).'</td>
</tr>
<tr>
        <td align="right">������ ��������� ������: ���������, ������� ������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse27"]).'</td>
</tr>
<tr>
        <td align="right">���������� ������������ � �������� � ������ �������: �������������� ���������, ��� ���� �� ����� ����� �����������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse28"]).'</td>
</tr>
<tr>
        <td align="right">�������������� � ������������ ������������: �������������� ����� ������������ ���������������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse29"]).'</td>
</tr>
<tr>
        <td align="right">����� ������������: �������������� ������ ���������� � ������ ���������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse30"]).'</td>
</tr>
<tr>
        <td align="right">�������� ������� ����������� ���������� ������������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse31"]).'</td>
</tr>
<tr>
        <td align="right">��������� � ���������� � �����������. ���� �� �� � ����������� � ��� ��� ����������?</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse32"]).'</td>
</tr>
<tr>
        <td align="right">�����������: ��� �������� ������ � ��������?(���������� �������� �����������).</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse33"]).'</td>
</tr>
<tr>
        <td align="right">�������� ������� �������� ������. ����������� ������� ���������� ����������. ��������� ����� ����.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse34"]).'</td>
</tr>
<tr>
        <td align="right">���� ��������� ������������� �������������� ������������, ������ ����������, ���-�����������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse35"]).'</td>
</tr>
<tr>
        <td align="right">����� ����������� ��������������� �������� ���������������� �������� � ������ �� ������������� �� ������ ����� �� ��������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse36"]).'</td>
</tr>
<tr>
        <td align="right">���������� ��������������� �������� � ������������ � �������� � ������-���������� �����������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse37"]).'</td>
</tr>
<tr>
        <td align="right">��������� ������������������ �����.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse38"]).'</td>
</tr>
<tr>
        <td align="right">��� ������������ ���������: ������ HR-� � ������ ������������ ������ ������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse39"]).'</td>
</tr>
<tr>
        <td align="right">������� ��������� ���������, ����������� ��� ������/ �� ������������� ������. �������� �������� ��������� � ������������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse40"]).'</td>
</tr>
<tr>
        <td align="right">��� ��������� ������ �����������, ���� ��� ����������� ������� �� �������� ��������: �� ��������� ������� ������������ ����������� ������. �������������� ���������. ������ ���������� vs ������ ������������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse41"]).'</td>
</tr>
<tr>
        <td align="right">��������� �� ��������: ������ �������� ������������ � ���������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse42"]).'</td>
</tr>
<tr>
        <td align="right">�������������: ��������� ����� �������� ���������� � ���������. �������� ������������� ������� ��� � ���� HayGroup.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse43"]).'</td>
</tr>
<tr>
        <td align="right">������� ������������ ������������ ������� ��������� ����������� �� ������������� ���������� ������������ ��������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse44"]).'</td>
</tr>
<tr>
        <td align="right">����� ���������� ���� � �����������: ���� � ������� ������ � 2012 ����.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse45"]).'</td>
</tr>
<tr>
        <td align="right">���������� ��������� �� ��������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse46"]).'</td>
</tr>
<tr>
        <td align="right">����������� �������: ���������� �������� ����������, ���������� � ��������� ���������� �����(KPI).</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse47"]).'</td>
</tr>
<tr>
        <td align="right">HR-�����������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse48"]).'</td>
</tr>
<tr>
        <td align="right">HR-������: ��������� � ��������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse49"]).'</td>
</tr>
<tr>
        <td align="right">������ ��������� ��� �������� �����, ��� ����� ���������� ������� �������� ������ � ������ ���������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse50"]).'</td>
</tr>
<tr>
        <td align="right">��� ��������� ������� ��������? ����� ������ HR.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse51"]).'</td>
</tr>
<tr>
        <td align="right">HR-�����: �������� ������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse52"]).'</td>
</tr>
<tr>
        <td align="right">KPI ��� HR.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse53"]).'</td>
</tr>
<tr>
        <td align="right">������ � ������������ �����: ����������, ���������� ������, ���������� ������� ����. ��� ��� ���������������: ������ ��������� ��� ������ ������������?</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse54"]).'</td>
</tr>
<tr>
        <td align="right">��� ������������ ����������� �������������� �������? ����� �� ������ ��������� ������� �� ���-���������� � ��������?</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse55"]).'</td>
</tr>
<tr>
        <td align="right">���������� ������������ � ������� �� ������������ �����.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse56"]).'</td>
</tr>
<tr>
        <td align="right">Performance management: ���������� ��������� �������� ����� ���������� ��������������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse57"]).'</td>
</tr>
<tr>
        <td align="right">����������� � ������������� ��������� ����������������. ������������� HR-������� - ������ ��� ��������� ���������� ��������� �� ��������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse58"]).'</td>
</tr>
<tr>
        <td align="right">���������� ������������� ������: ����� ����������� � �������� �������. ����� �������� ��������-�������. ��� �������� ������������� �������������� �������?</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse59"]).'</td>
</tr>
<tr>
        <td align="right">����������� ������������ ������������� �������� �� ���������������� (�������� � �.�.) ������������ (���������� ����).</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse60"]).'</td>
</tr>
<tr>
        <td align="right">������������� ������ �����������. ������� ����.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse61"]).'</td>
</tr>
<tr>
        <td align="right">������� ���������� (GOAL-����������) ��� ���������� ���������� ����������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse62"]).'</td>
</tr>
<tr>
        <td align="right">��������� � HR: ����� ���������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse63"]).'</td>
</tr>
<tr>
        <td align="right">��� ����� HR-���������?</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse64"]).'</td>
</tr>
<tr>
        <td align="right">���������� HR-��������� ���������������� �����������: ����, ����� � �����������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse65"]).'</td>
</tr>
<tr>
        <td align="right">������������ HR-����������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse66"]).'</td>
</tr>
<tr>
        <td align="right">������������ ������� ���� "����������� ����� ����� � ���������� ���������� � ��������� �����".</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse67"]).'</td>
</tr>
<tr>
        <td align="right">�������� ���������� � ������.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse68"]).'</td>
</tr>
<tr>
        <td align="right">������ HR �� ������ �������� �������� ��-���-��?</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse69"]).'</td>
</tr>
<tr>
        <td align="right">���������� (������������� ����). ����� ����� ���� ������?</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse70"]).'</td>
</tr>
<tr>
        <td align="right">�����������, ������ � ������� �������� ������ HR.</td>
        <td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse71"]).'</td>
</tr>
</table>

    </body>
</html>';
$headers  = "Content-type: text/html; charset=windows-1251 \r\n";
$headers .= "From: New client\r\n";
$headers .= "\r\n";
$to  = "rodionova.anastasija@clubkochubey.ru" ;
//$to  = "octane89@mail.ru";
mail($to, $subject, $message, $headers);
echo "ok";
}
else{echo $ret;}

?>