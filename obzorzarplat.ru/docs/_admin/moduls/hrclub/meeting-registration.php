<?php
include($folder.'/_admin/moduls/functions/checkForm.php');

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);

//���� ������
$meeting_id=intval($_POST["meeting_id"]);
$name=mysqli_real_escape_string($link,$_POST["name"]);
$mail=mysqli_real_escape_string($link,$_POST["email"]);
$tel=$_POST["tel"];
$job=mysqli_real_escape_string($link,$_POST["job"]);
$company=mysqli_real_escape_string($link,$_POST["company"]);
$key=random_string('alnum', 32);
$url=$_SERVER['HTTP_HOST'];

$sot_mail="kate@ant-management.spb.ru";
//��������

$id=mysqli_query($link,"select id from hrclub_meeting_registration where email='$mail' AND hrclub_meeting_id='$meeting_id'");
if(mysqli_num_rows($id)==0){
//������ � ����
$q_regs=mysqli_query($link,"INSERT INTO hrclub_meeting_registration values('','$meeting_id', '$mail', '$name', '$company', '$job', '$tel','$key','0')");
$id=mysqli_result(mysqli_query($link,"select id from hrclub_meeting_registration where email='$mail' AND hrclub_meeting_id='$meeting_id' AND random_key='$key'"),0,0);
$meeting_title=mysqli_result(mysqli_query($link,"select title from hrclub_meetings where id='$meeting_id'"),0,0);
//������������ ������ ��� ��������
$msg='�������� c ����� <b>'.$url.'</b><br>
����������� �� ��������� �������������� ����������������� ��������� ����� �������: '.$meeting_title.'
<hr>
���: '.$name.'<br>
��������: '.$company.'<br>
���������: '.$job.'<br>
����� E-mail: '.$mail.'<br>
�������:'.$tel.'<br>
';

$msg=wordwrap($msg,70);

$topic="����������� �� ��������� �������������� ����������������� ��������� ����� �������";
$topic=wordwrap($topic,70);

//�������� ���������
mail("$sot_mail, tz@obzorzarplat.ru",$topic,$msg,"FROM:<$sot_mail>\nContent-Type: text/html; charset=Windows-1251\nContent-Transfer-Encoding: 8bit");

//������������ ������ ��� ���������
$msg1='
���� ���� ���������� ������ �� ����������� �� ��������� �������������� ����������������� ��������� ����� "�������": '.$meeting_title.'<br>
��� ������������� ����������� ���������, ����������, �� ������: <a href="http://obzorzarplat.ru/hrclub/estimated_meeting/confirmation/?ID='.$id.'&amp;key='.$key.'">http://obzorzarplat.ru/hrclub/estimated_meeting/confirmation/?ID='.$id.'&amp;key='.$key.'</a><br>
���������� ���������� � ��������� ���������� <a href="http://obzorzarplat.ru/hrclub/estimated_meeting/">����� &raquo;</a><br>
<b>������������� �����:</b> ������� ���������<br>
<b>E-mail:</b> kate@ant-management.spb.ru<br>
<b>�������:</b> +7 (812) 740 18 11, +7 (921) 372 42 22<br>

����� ��������� ���������� � ����� �� ������� �������� <a href="http://obzorzarplat.ru/hrclub/">����� &raquo;</a>
';

$msg1=wordwrap($msg1,70);

$topic1="����������� �� ��������� �������������� ����������������� ��������� ����� �������";
$topic1=wordwrap($topic1,70);

//�������� ���������
mail("$mail, tz@obzorzarplat.ru",$topic1,$msg1,"FROM:<$sot_mail>\nContent-Type: text/html; charset=Windows-1251\nContent-Transfer-Encoding: 8bit");

echo('
<p align="center">�� ������� ������ �����������!
<br> ��� ������������� ����������� ��� ���������� ������� �� ������, ��������� � ����������� ������, ������������ �� ��� �������� ���� ('.$mail.'). ����� ����� � ���� �������� ������������� ����������������� ��������� ����� &laquo;�������&raquo; - ������� ��������� </p>
');
}else{
    echo('<p>�� ��� ���������� ������ �� �����������. <br> ��� ������������� ����������� ��� ���������� ������� �� ������, ��������� � ����������� ������, ������������ �� ��� �������� ����. ����� ����� � ���� �������� ������������� ����������������� ��������� ����� &laquo;�������&raquo; - ������� ��������� ( +7 (812) 740 18 11; +7 (921) 372 42 22)</p>');
}
?>
<hr>
<input type="button" value="�����" class="but" onClick="history.back(-1);">