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

require_once($folder.'moduls/captcha/recaptchalib.php');
$privatekey = "6LdFBQcAAAAAAPj_qXHiQRUWItFJW9HFeurHCOlx";
$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

if (!$resp->is_valid or $cap<>($cap_code/123)) {
  echo('<p style="color:#c00; text-align:center; font-weight:bold;">Номер с картинки введен неправильно!</p><hr>');
}
else
{
//Загрузка данных о контакте
$link = mysql_connect($host,$user,$pass);
mysql_select_db($db,$link);
$query="select * from for_contacts where quest='$kat'";
$result=mysql_query($query,$link);
$sot_name=mysql_result($result,0,1);
$sot_mail=mysql_result($result,0,3);
$sot_dol=mysql_result($result,0,7);
//Формирование письма
$msg='Получено c сайта <b>'.$url.'</b><br>
Категория вопросов: '.$kat.'<hr>
Имя:<b>'.$name.'</b><br>
Адрес E-mail:<b>'.$mail.'</b><br>
Сообщение:<br>
'.$text;

//Отправка сообщения
mail("$sot_mail","Сообщение с сайта $url",$msg,"FROM:$name<$mail>\nContent-Type: text/html; charset=Windows-1251\nContent-Transfer-Encoding: 8bit");
mail("tz@obzorzarplat.ru","Сообщение с сайта $url",$msg,"FROM:$name<$mail>");

echo('
<center><b>Ваше сообщение успешно отправлено!</b></center><br><br>
<!--На ваш вопрос ответит '.$sot_dol.' <b>'.$sot_name.'.</b>-->
<hr>
');
}
?>
<input type="button" value="Вернуться к контактам" class="but" onClick="self.location.href='/';">


