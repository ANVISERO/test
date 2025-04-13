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
"Фамилия",
"Имя",
"Отчество",
"Навание компании",
"Должность",
"Источники",
"Город",
"Адрес",
"E-mail",
"Реквизиты"
);
for ($i=0;$i<10;$i++)
{
  if ($_POST[$chname[$i]]=="")
  {
    $ret.="Поле \"".$chnameru[$i]."\" обязательно для заполнения<br>";
    $noerrors=false;
  }
};
/*if ($noerrors&&!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $_POST["femail"]))
{
	$ret.="E-mail введен неправильно<br>";
    $noerrors=false;
}     */
$ret.="</p>";
if ($noerrors)
{

$subject = "Прием заявки от:".$_POST["fsurname"];
$message = '
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru">
<html>
    <head>
        <title>Заявка нового клиента</title>
    </head>
    <body>

	<table cellspacing="2" cellpadding="2" border="1">
<tr >
	<td align="right">Фамилия*</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsurname"]).'</td>
</tr>
<tr>
	<td align="right">Имя*</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fname"]).'</td>
</tr>
<tr>
	<td align="right">Отчество*</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fpatronymic"]).'</td>
</tr>
<tr>
	<td align="right">Навание компании*</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fcompanyname"]).'</td>
</tr>

<tr>
	<td align="right">Должность*</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fposition"]).'</td>
</tr>

<tr>
	<td align="right">Из каких источников Вы узнали о мастер-классе</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsourse"]).'</td>
</tr>
<tr>
	<td align="right">E-mail*</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["femail"]).'</td>
</tr>
<tr>
	<td align="right">Ваши ожидания от мастер-класса оправдались?</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["frecvisits_1"]).'</td>
</tr>
<tr>
	<td align="right">Вы получили в ходе встречи новые знания?</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["frecvisits_2"]).'</td>
</tr>
<tr>
	<td align="right">Информация полученная на мастер-классе поможет улучшению организации Вашей работы?</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["frecvisits_3"]).'</td>
</tr>
<tr>
	<td align="right">Какие темы Вам хотелось бы обсудить на следующих мастер-классах?</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["frecvisits_4"]).'</td>
</tr>
<tr>
	<td align="right">Считаете ли Вы мастер-класс удобным форматом для обучения по данной теме?</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fwithreport_1"]).'</td>
</tr>
<tr>
	<td align="right">Вас устраивает время проведения?</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fwithreport_2"]).'</td>
</tr>
<tr>
	<td align="right">Вас устраивает место проведения?</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fwithreport_3"]).'</td>
</tr>
<tr>
	<td align="right">Есть ли нарекания по кофе-брейку?</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fwithreport_4"]).'</td>
</tr>
<tr>
	<td align="right">Интересно ли Вам принять участие в следующем мастер-классе, посвященном сложным увольнениям?</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fwithreport_5"]).'</td>
</tr>
<tr>
	<td align="right">Интересно ли Вам принять участие в следующем мастер-классе, посвященном материальной ответственности?</td>
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