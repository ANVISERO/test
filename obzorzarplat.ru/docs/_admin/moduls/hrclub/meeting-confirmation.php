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
				$error = '<p>�� ��� ������������ �������!</p>';
			}
			elseif($row['random_key']!=$_GET['key'])
			{
				$error = '<p>��� ��������� ��������!</p>';
			}
			else
			{
				$update = mysqli_query($link,"UPDATE hrclub_meeting_registration SET confirmation_status=1 WHERE id='".mysqli_real_escape_string($link,$row['id'])."'") or die(mysql_error());
				$msg = '<p>��������� ������������, �� �������� ���� ������ �� ������� � ��������� �������������� ����������������� ��������� ����� &laquo;�������&raquo;.</p>
                                        <p>���������� �� ����������� �������! <br>��� ������������ ������� � ��������� � ���� �������� ������������� ����� - ������� ���������</p>';

            //������������ ������ ��� ��������
            $meeting_id=$row["hrclub_meeting_id"];
            $meeting_title=mysqli_result(mysqli_query($link,"select title from hrclub_meetings where id='$meeting_id'"),0,0);
            $msg_for_mail='�������� c ����� <b>'.$url.'</b><br>
            ����������� �� ��������� �������������� ����������������� ��������� ����� �������: '.$meeting_title.' ������������
            <hr>
            ���: '.$row["name"].'<br>
            ��������: '.$row["company"].'<br>
            ���������: '.$row["job"].'<br>
            ����� E-mail: '.$row["email"].'<br>
            �������:'.$row["tel"].'<br>
            ';

$msg=wordwrap($msg,70);
$sot_mail="kate@ant-management.spb.ru";
$topic="������������� ����������� �� ��������� �������������� ����������������� ��������� ����� �������";
$topic=wordwrap($topic,70);

//�������� ���������
mail("$sot_mail, tz@obzorzarplat.ru",$topic,$msg_for_mail,"FROM:<$sot_mail>\nContent-Type: text/html; charset=Windows-1251\nContent-Transfer-Encoding: 8bit");

			}
		}
		else {

			$error = '<p>�� �� ���������� ��������!</p>';

		}

	}
	else {

		$error = '<p>������ ������� �������!</p>';

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
<input type="button" value="�����" class="but" onClick="self.location.href='/hrclub/estimated_meeting/';">