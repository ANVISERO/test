<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);
include($folder.'/_admin/moduls/functions/checkForm.php');

if($_GET['ID']!='' && numeric($_GET['ID'])==TRUE && strlen($_GET['key'])==32 && alpha_numeric($_GET['key'])==TRUE)
	{

		$query = mysqli_query($link,"SELECT * FROM hrclub_meeting_registration WHERE id = '".mysqli_real_escape_string($link,$_GET['ID'])."'");

		if(mysqli_num_rows($query)==1)
		{
			$row = mysql_fetch_assoc($query);
			if($row['confirmation_status']==1)
			{
				$error = '<p>Вы уже подтверждали участие!</p>';
			}
			elseif($row['random_key']!=$_GET['key'])
			{
				$error = '<p>Код активации ошибочен!</p>';
			}
			else
			{
				$update = mysqli_query($link,"UPDATE hrclub_meeting_registration SET confirmation_status=1 WHERE id='".mysqli_real_escape_string($link,$row['id'])."'") or die(mysql_error());
				$msg = '<p>Уважаемый пользователь, мы получили вашу заявку на участие в заседании Петербургского профессионального кадрового клуба &laquo;Кочубей&raquo;.</p>
                                        <p>Благодарим за проявленный интерес! <br>Для подтверждени участия в заседании с Вами свяжется администратор клуба - Петрова Екатерина</p>';

            //Формирование письма для компании
            $meeting_id=$row["hrclub_meeting_id"];
            $meeting_title=mysqli_result(mysqli_query($link,"select title from hrclub_meetings where id='$meeting_id'"),0,0);
            $msg_for_mail='Получено c сайта <b>'.$url.'</b><br>
            Регистрация на заседание Петербургского профессионального кадрового клуба Кочубей: '.$meeting_title.' подтверждена
            <hr>
            Имя: '.$row["name"].'<br>
            Компания: '.$row["company"].'<br>
            Должность: '.$row["job"].'<br>
            Адрес E-mail: '.$row["email"].'<br>
            Телефон:'.$row["tel"].'<br>
            ';

$msg=wordwrap($msg,70);
$sot_mail="kate@ant-management.spb.ru";
$topic="Подтверждение регистрации на заседание Петербургского профессионального кадрового клуба Кочубей";
$topic=wordwrap($topic,70);

//Отправка сообщения
mail("$sot_mail, tz@obzorzarplat.ru",$topic,$msg_for_mail,"FROM:<$sot_mail>\nContent-Type: text/html; charset=Windows-1251\nContent-Transfer-Encoding: 8bit");

			}
		}
		else {

			$error = '<p>Вы не определены системой!</p>';

		}

	}
	else {

		$error = '<p>Данные введены неверно!</p>';

	}

	if(isset($error))
	{
		echo $error;
	}
	else {
		echo $msg;
	}
  ?>
<hr>
<input type="button" value="Назад" class="but" onClick="self.location.href='/hrclub/estimated_meeting/';">