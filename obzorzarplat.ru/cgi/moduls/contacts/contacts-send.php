<?php
//Data
$name=$_POST["name"];
$mail=$_POST["mail"];
//$kat=$_POST["kat"];
$text=$_POST["text"];
$url=$_SERVER['HTTP_HOST'];
$cap_code=$_POST['cap_code'];
$cap=$_POST['cap'];
//��������

require_once($folder.'../cgi/moduls/captcha/recaptchalib.php');
$privatekey = "6LdFBQcAAAAAAPj_qXHiQRUWItFJW9HFeurHCOlx";
$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
if($name=='' || $mail=='' || $text==''){
    echo "<p>����������, ��������� ��� ���� �����.</p>";
}
elseif (!$resp->is_valid) {
  echo ("<p>����� ���� ������� �������. ����������, ��������� �������.</p>");
      // "(reCAPTCHA said: " . $resp->error . ")");
}
elseif ($cap<>($cap_code/123)){
    echo('<font style="color:#cc0000"><b>����� � �������� ������ �� ���������!</b></font><hr>');
}
else{
//�������� ������ � ��������
$query="select * from for_contacts where view='0'";
$result=mysqli_query($link,$query);
$sot_name=mysqli_result($result,0,1);
$sot_mail=mysqli_result($result,0,3);
$sot_dol=mysqli_result($result,0,7);
//������������ ������
$msg='�������� c ����� <b>'.$url.'</b><br>
���:<b>'.$name.'</b><br>
����� E-mail:<b>'.$mail.'</b><br>
���������:<br>
'.$text;

echo $sot_mail;

//�������� ���������
mail("<$sot_mail>,<tz@obzorzarplat.ru>","��������� � ����� $url",$msg,"FROM:$name<$mail>\nContent-Type: text/html; charset=Windows-1251\nContent-Transfer-Encoding: 8bit");
?>
<p>���� ��������� ������� ����������!</p>
<p>�� ��� ������ ������� <?=$sot_dol.' - '.$sot_name;?>.</p>
<?php } ?>