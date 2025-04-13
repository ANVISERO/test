<?php
$ret="<p class='error'>";
$noerrors=true;

$chname=Array(
"fsurname",
"fname",
"fpatronymic",
"fcompanyname",
"fposition",
"fcountry",
"fsity",
"faddress",
"femail",
"frecvisits"
);
$chnameru=Array(
"Фамилия",
"Имя",
"Отчество",
"Навание компании",
"Должность",
"Страна",
"Город",
"Адрес",
"E-mail",
"Реквизиты"
);
for ($i=0;$i<10;$i++)
{  if ($_POST[$chname[$i]]=="")
  {    $ret.="Поле \"".$chnameru[$i]."\" обязательно для заполнения<br>";
    $noerrors=false;
  }
};
/*if ($noerrors&&!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $_POST["femail"]))
{	$ret.="E-mail введен неправильно<br>";
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
	<td align="right">Страна (выбрать страну)*</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fcountry"]).'</td>
</tr>
<tr>
	<td align="right">Город*</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fsity"]).'</td>
</tr>
<tr>
	<td align="right">Адрес*</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["faddress"]).'</td>
</tr>


<tr>
	<td align="right">телефон</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fphone"]).'</td>
</tr>
<tr>
	<td align="right">мобильный телефон</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fmphone"]).'</td>
</tr>
<tr>
	<td align="right">E-mail*</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["femail"]).'</td>
</tr>
<tr>
	<td align="right">Реквизиты</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["frecvisits"]).'</td>
</tr>

<tr>
	<td align="right">Я принимаю участие в конференции с докладом</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fwithreport"]).'</td>
</tr>
<tr>
	<td align="right">Название доклада*</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["freporttitle"]).'</td>
</tr>
<tr>
	<td align="right">Настоящим я подтверждаю свое участие в ежегодной<br>конференции «Внутрекорпоративные коммуникации 2011»</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fconference"]).'</td>
</tr>
<tr>
	<td align="right">Подписаться на рассылку</td>
	<td>'.iconv("UTF-8", "WINDOWS-1251",$_POST["fmailer"]).'</td>
</table>

    </body>
</html>';
$headers  = "Content-type: text/html; charset=windows-1251 \r\n";
$headers .= "From: New client\r\n";
$headers .= "\r\n";
$to  = "yavaleriyamail@yandex.ru" ;
//$to  = "octane89@mail.ru";
mail($to, $subject, $message, $headers);
echo "ok";
}
else
{
echo $ret;
}
?>