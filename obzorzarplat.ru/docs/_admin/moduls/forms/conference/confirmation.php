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
				$error = '�� ��� ������������ ��������!';
			}
			elseif($row['key']!=$_GET['key'])
			{
				$error = '��� ��������� ��������!';
			}
			else
			{
				$update = mysqli_query($link,"UPDATE hrclub_meetings_registration SET active=1 WHERE id='".mysqli_real_escape_string($link,$row['id'])."'") or die(mysql_error());
				$msg = '��������� ������������, �� �������� ���� ������ �� ������� � ��������� �������������� ����������������� ��������� ����� &laquo;�������&raquo;.
                                        ���������� �� ����������� �������! <br>��� ������������ ������� � ��������� � ���� �������� ������������� ����� - ������� ���������';
			}
		}
		else {
		
			$error = '�� �� ���������� ��������!';
		
		}

	}
	else {

		$error = '������ ������� �������!';

	}

	if(isset($error))
	{
		echo $error;
	}
	else {
		echo $msg;
	}
  ?>