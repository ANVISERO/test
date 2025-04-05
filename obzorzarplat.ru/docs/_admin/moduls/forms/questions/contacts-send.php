<?php
//Сбор данных
$name=$_POST["name"];
$mail=$_POST["mail"];
//$kat=$_POST["kat"];
$text=$_POST["text"];
$url=$_SERVER['HTTP_HOST'];
$cap_code=$_POST['cap_code'];
$cap=$_POST['cap'];
//Проверка

require_once($folder.'/_admin/moduls/captcha/recaptchalib.php');
$privatekey = "...";
$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
/*
if (!$resp->is_valid) {
  die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
       "(reCAPTCHA said: " . $resp->error . ")");
}
*/
if ($cap<>($cap_code/123)){
echo('<font style="color:#cc0000"><b>Номер с картинки введен неправильно!</b></font><hr>');
}
else
{
//Загрузка данных о контакте
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$query="select * from for_contacts where quest='$kat'";
$result=mysqli_query($link,$query);
$sot_name=mysqli_result($result,0,1);
$sot_mail=mysqli_result($result,0,3);
$sot_dol=mysqli_result($result,0,7);
//Формирование письма
$msg='Получено c сайта <b>'.$url.'</b><br>
Категория вопросов: '.$kat.'<hr>
Имя:<b>'.$name.'</b><br>
Адрес E-mail:<b>'.$mail.'</b><br>
Сообщение:<br>
'.$text;

//Отправка сообщения
mail("$sot_mail, tz@obzorzarplat.ru","Сообщение с сайта $url",$msg,"FROM:$name<$mail>\nContent-Type: text/html; charset=Windows-1251\nContent-Transfer-Encoding: 8bit");

echo('
<center><b>Ваше сообщение успешно отправлено!</b></center><br><br>
<!--На ваш вопрос ответит '.$sot_dol.' <b>'.$sot_name.'.</b>-->
<hr>
');
}
?>
<input type="button" value="Вернуться к контактам" class="but" onClick="self.location.href='/contacts/';">


