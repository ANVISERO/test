<?
include($folder.'/_admin/moduls/functions/checkForm.php');

if($_GET['ID']!='' && numeric($_GET['ID'])==TRUE && strlen($_GET['key'])==32 && alpha_numeric($_GET['key'])==TRUE)
	{

		$query = mysqli_query($link,"SELECT id, random_key, active FROM for_hrclub_news WHERE id = '".mysqli_real_escape_string($link,$_GET['ID'])."'");
		
		if(mysqli_num_rows($query)==1)
		{
			$row = mysql_fetch_assoc($query);
			if($row['active']==1)
			{
				$error = 'Вы уже подтверждали подписку!';
			}
			elseif($row['random_key']!=$_GET['key'])
			{
				$error = 'Код активации ошибочен!';
			}
			else
			{
				$update = mysqli_query($link,"UPDATE for_hrclub_news SET active=1 WHERE id='".mysqli_real_escape_string($link,$row['id'])."'") or die(mysql_error());
				$msg = 'Поздравляем! Вы зарегистрированы на заседание Петербургского профессионального кадрового клуба &laquo;Кочубей&raquo;!';
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