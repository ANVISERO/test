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
	"Фамилия",
	"Имя",
	"Отчество",
	"Навание компании",
	"Должность",
	"E-mail"
	);

foreach ($chnameru as $key => $value){
	if(trim(strip_tags($_POST[$chname[$key]]))==""){
		$ret.="Поле \"".$value."\" обязательно для заполнения<br>";
		$errors=1;
		}
	}
/*
if (!$errors&&!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $_POST["femail"])){
	$ret.="E-mail введен неправильно<br/>";
	$errors=1;
	}
*/
$ret.="</p>";
if(!$errors){
	$subject = "Прием заявки от:".iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fsurname"]));
	$message = '
		<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru">
			<head>
				<title>Анкета обратной связи участника конференции</title>
			</head>
			<body>
				<table cellspacing="2" cellpadding="2" border="1">
					<tr>
						<td align="right">Фамилия*</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fsurname"])).'</td>
					</tr>
					<tr>
						<td align="right">Имя*</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fname"])).'</td>
					</tr>
					<tr>
						<td align="right">Отчество*</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fpatronymic"])).'</td>
					</tr>
					<tr>
						<td align="right">Навание компании*</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fcompanyname"])).'</td>
					</tr>
					<tr>
						<td align="right">Должность*</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fposition"])).'</td>
					</tr>
					<tr>
						<td align="right">Из каких источников Вы узнали о Конференции</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fsourse"])).'</td>
					</tr>
					<tr>
						<td align="right">E-mail*</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["femail"])).'</td>
					</tr>
					<tr>
						<td align="right">Оправдала ли конференция Ваши ожидания?  Оцените мероприятие В ЦЕЛОМ по 5-балльной шкале.</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fwithreport_0"])).'</td>
					</tr>
					<tr>
						<td align="right">Ваши комментарии</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["frecvisits_1"])).'</td>
					</tr>
					<tr>
						<td align="right">ПРОФЕССИОНАЛИЗМ ДОКЛАДЧИКОВ.</td>
                                                <td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fwithreport_12"])).'</td>
					</tr>
					<tr>
						<td align="right">Ваши комментарии</td>						
                                           <td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["frecvisits_2"])).'</td>
					</tr>
					<tr>
						<td align="right">ВОПРОСЫ  КОНФЕРЕНЦИИ. </td>
                                               	<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["frecvisits_3"])).'</td>
					</tr>
					<tr>
						<td align="right">ОРГАНИЗАЦИЯ КОНФЕРЕНЦИИ.</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fwithreport_13"])).'</td>
					</tr>
					<tr>
						<td align="right">Ваши комментарии</td>	
                                                <td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["frecvisits_4"])).'</td>
					</tr>
					<tr>
						<td align="right">Участие государственных чиновников высокого уровня</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fwithreport_1"])).'</td>
					</tr>
					<tr>
						<td align="right">Высокий уровень выступающих (высокие должности)</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fwithreport_2"])).'</td>
					</tr>
					<tr>
						<td align="right">Высокий профессионализм выступающих</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fwithreport_3"])).'</td>
					</tr>
					<tr>
						<td align="right">Высокий уровень участников конференци</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fwithreport_4"])).'</td>
					</tr>
					<tr>
						<td align="right">Кол-во участников конференции</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fwithreport_5"])).'</td>
					</tr>
					<tr>
						<td align="right">Хорошая организация мероприятия – доверие к компании-организатору.</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fwithreport_6"])).'</td>
					</tr>
					<tr>
						<td align="right">Раздаточные материалы, хэндауты, полезные для работы.</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fwithreport_7"])).'</td>
					</tr>
					<tr>
						<td align="right">Наличие фуршета и развлекательной программы.</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fwithreport_8"])).'</td>
					</tr>
					<tr>
						<td align="right">Посоветуйте, пожалуйста, тему конференции, которую Вы оцениваете как актуальную.</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["frecvisits_5"])).'</td>
					</tr>
					<tr>
						<td align="right">Рекомендуте ли Вы конференцию другим сотрудникам?</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fwithreport_9"])).'</td>
					</tr>
					<tr>
						<td align="right">Хотите ли Вы принять участие в конференции в следующем году?</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fwithreport_10"])).'</td>
					</tr>
					<tr>
						<td align="right">Поможет ли участие в конференции в Вашей работе?</td>
						<td>'.iconv("UTF-8", "WINDOWS-1251",strip_tags($_POST["fwithreport_11"])).'</td>
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
	}else{
	echo $ret;
	}
?>