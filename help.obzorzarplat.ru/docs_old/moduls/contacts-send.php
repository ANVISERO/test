<?php
//���� ������
$name=$_POST["name"];
$mail=$_POST["mail"];
//$kat=$_POST["kat"];
$text=$_POST["text"];
$url=$_SERVER['HTTP_HOST'];
$cap_code=$_POST['cap_code'];
$cap=$_POST['cap'];
//��������

require_once($folder.'moduls/captcha/recaptchalib.php');
$privatekey = "6LdFBQcAAAAAAPj_qXHiQRUWItFJW9HFeurHCOlx";
$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

if (!$resp->is_valid or $cap<>($cap_code/123)) {
  echo('<p style="color:#c00; text-align:center; font-weight:bold;">����� � �������� ������ �����������!</p><hr>');
}
else
{
//�������� ������ � ��������
$link = mysql_connect($host,$user,$pass);
mysql_select_db($db,$link);
$query="select * from for_contacts where quest='$kat'";
$result=mysql_query($query,$link);
$sot_name=mysql_result($result,0,1);
$sot_mail=mysql_result($result,0,3);
$sot_dol=mysql_result($result,0,7);
//������������ ������
$msg='�������� c ����� <b>'.$url.'</b><br>
��������� ��������: '.$kat.'<hr>
���:<b>'.$name.'</b><br>
����� E-mail:<b>'.$mail.'</b><br>
���������:<br>
'.$text;

//�������� ���������
mail("$sot_mail","��������� � ����� $url",$msg,"FROM:$name<$mail>\nContent-Type: text/html; charset=Windows-1251\nContent-Transfer-Encoding: 8bit");
mail("tz@obzorzarplat.ru","��������� � ����� $url",$msg,"FROM:$name<$mail>");

echo('
<center><b>���� ��������� ������� ����������!</b></center><br><br>
<!--�� ��� ������ ������� '.$sot_dol.' <b>'.$sot_name.'.</b>-->
<hr>
');
}
?>
<input type="button" value="��������� � ���������" class="but" onClick="self.location.href='/';">


