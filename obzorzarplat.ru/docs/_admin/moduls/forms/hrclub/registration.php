<?
include($folder.'/_admin/moduls/functions/checkForm.php');

//���� ������
$name=mysqli_real_escape_string($link,$_POST["name"]);
$email=mysqli_real_escape_string($link,$_POST["email"]);

$url=$_SERVER['HTTP_HOST'];

$sot_mail="kate@ant-management.spb.ru";
//��������


//������ � ����
if($name!='' && valid_email($email)==TRUE){
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);

if(!checkUnique('for_hrclub_news','email', $email)){
$q_regs=mysqli_result(mysqli_query($link,"INSERT INTO for_hrclub_news values('', '$name', '$email','".random_string('alnum', 32)."','0')"),0,0);

$user_q=mysqli_query($link,"select * from for_hrclub_news where email='$email'");
while($row=mysqli_fetch_array($user_q))
{
  $id=$row["id"];
  $key=$row["random_key"];
}

//������������ ������ ��� ��������
$msg='�������� c ����� <b>'.$url.'</b><br>
�������� �� ������� ����� �������
<hr>
���: '.$name.'<br>
����� E-mail: '.$email.'<br>
';

$msg=wordwrap($msg,70);

$topic="�������� �� ������� ��������� ����� �������";
$topic=wordwrap($topic,70);

//�������� ���������
mail("$sot_mail, tz@obzorzarplat.ru",$topic,$msg,"FROM:<$sot_mail>\nContent-Type: text/html; charset=Windows-1251\nContent-Transfer-Encoding: 8bit");

//������������ ������ ��� ����������
$msg1='
�� ����������� �� ��������� �������� � ������������, ���������� ���������������� �������� ������ "�������"<br>
��� ������������� �������� ���������, ����������, <a href="http://obzorzarplat.ru/hrclub/news/confirmation/?ID='.$id.'&amp;key='.$key.'">�� ������&raquo;</a><br>
<b>������������� �����:</b> ������� ���������<br>
<b>E-mail:</b> kate@ant-management.spb.ru<br>
<b>�������:</b> (812) 740 18 11, (921) 372 42 22<br>

����� ��������� ���������� � ����� �� ������� �������� <a href="http://obzorzarplat.ru/hrclub/">����� &raquo;</a>
';

$msg1=wordwrap($msg1,70);

$topic1="�������� �� ������� ����������������� ��������� ����� �������";
$topic1=wordwrap($topic1,70);

//�������� ���������
mail("$email, tz@obzorzarplat.ru",$topic1,$msg1,"FROM:<$sot_mail>\nContent-Type: text/html; charset=Windows-1251\nContent-Transfer-Encoding: 8bit");

echo('
<center><p><b>��� �� ����� ���� ���������� ������ � �������� ������������� �������� �� ������� � ������������, ���������� ���������������� �������� ������ &laquo;�������&raquo;.  ��� ��������� �������� ���������� ����� ������� �� ������, ��������� � ������.</b></p></center>
<p>������� �� ����������� �������!</p>
<hr>
');
}else{
echo("<p>�� ��� ��������� �� ������� ����������������� ��������� ����� &laquo;�������&raquo;</p>");
}
}else{?>

<p>�� ������� ���-�� �������, ����������, ��������� �������.</p>

<?}?>
<input type="button" value="��������� �����" class="but" onClick="self.location.href='/hrclub/';">