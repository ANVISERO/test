<?php
include($folder.'/_admin/moduls/functions/checkForm.php');

if($_GET['ID']!='' && numeric($_GET['ID'])==TRUE && strlen($_GET['key'])==32 && alpha_numeric($_GET['key'])==TRUE)
	{

		$query = mysqli_query($link,"SELECT id, key, confirmation_status FROM hrclub_meetings_registration WHERE id = '".mysqli_real_escape_string($link,$_GET['ID'])."'");
		
		if(mysqli_num_rows($query)==1)
		{
			$row = mysql_fetch_assoc($query);
			if($row['confirmation_status']==1)
			{
				$error = 'Вы уже подтверждали подписку!';
			}
			elseif($row['key']!=$_GET['key'])
			{
				$error = 'Код активации ошибочен!';
			}
			else
			{
				$update = mysqli_query($link,"UPDATE hrclub_meetings_registration SET active=1 WHERE id='".mysqli_real_escape_string($link,$row['id'])."'") or die(mysql_error());
				$msg = 'Уважаемый пользователь, мы получили вашу заявку на участие в заседании Петербургского профессионального кадрового клуба &laquo;Кочубей&raquo;.
                                        Благодарим за проявленный интерес! <br>Для подтверждени участия в заседании с Вами свяжется администратор клуба - Петрова Екатерина';
			}
		}
		else {
		
			$error = 'Вы не определены системой!';
		
		}

	}
	else {

		$error = 'Данные введены неверно!';

	}

	if(isset($error))
	{
		echo $error;
	}
	else {
		echo $msg;
	}
  ?>