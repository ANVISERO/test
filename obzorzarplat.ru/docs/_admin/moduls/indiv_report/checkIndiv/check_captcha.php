<?php
//Сбор данных
$order_number=intval($_POST["order_number"]);
$user_tel=mysqli_real_escape_string($link,$_POST["user_tel"]);
//$name=$_POST["name"];
$usermail=mysqli_real_escape_string($link,$_POST["usermail"]);
//$kat=$_POST["kat"];
$text=mysqli_real_escape_string($link,$_POST["text"]);
$url=$_SERVER['HTTP_HOST'];
$cap_code=$_POST['cap_code'];
$cap=$_POST['cap'];
//Проверка

require_once($folder.'/_admin/moduls/captcha/recaptchalib.php');
$privatekey = "6LdFBQcAAAAAAPj_qXHiQRUWItFJW9HFeurHCOlx";
$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

if (!$resp->is_valid) {
  echo ("The reCAPTCHA wasn't entered correctly. Go back and try it again.(reCAPTCHA said: " . $resp->error . ")");
}
elseif ($cap<>($cap_code/123)){
    echo('<font style="color:#cc0000"><b>Номер с картинки введен не правильно!</b></font><hr>');
}
else
{
//Загрузка данных о контакте
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$kat="Персональный отчет";
$query="select * from for_contacts where quest='$kat'";
$result=mysqli_query($link,$query);
$sot_name=mysqli_result($result,0,1);
$sot_mail=mysqli_result($result,0,3);
$sot_dol=mysqli_result($result,0,7);
//Формирование письма
$msg='Получено c сайта <b>'.$url.'</b><br>
Заказ №: '.$order_id.'<hr>
Телефон, с которого была отправлена sms:<b>'.$user_tel.'</b><br>
Адрес E-mail:<b>'.$usermail.'</b><br>
Сообщение:<br>
'.$text;

//Отправка сообщения
mail("$sot_mail, tz@obzorzarplat.ru","Сообщение с сайта $url",$msg,"FROM:<$usermail>\nContent-Type: text/html; charset=Windows-1251\nContent-Transfer-Encoding: 8bit");

echo('
<center><b>Ваше сообщение успешно отправлено!</b></center><br><br>
<!--На ваш вопрос ответит '.$sot_dol.' <b>'.$sot_name.'.</b>-->
<hr>
');
    //запись в БД информации о заказе
    //Сбор данных
$order_id=mysqli_result(mysqli_query($link,"select max(id) from base_userorders"),0,0) + 1;
$jtype_id=intval($_POST['jtype']);
$job_id=intval($_POST['job']);
$city_id=intval($_POST['city']);
$sphere_id=intval($_POST['sphere']);
$staff_id=intval($_POST['staff']);
$fio=mysqli_real_escape_string($link,$_POST['fio']);
$usermail=mysqli_real_escape_string($link,$_POST['usermail']);
$responsibility=mysqli_real_escape_string($link,$_POST['responsibility']);

$education_id=intval($_POST['obrazovanie']);
$sub_id=intval($_POST['podchin']);
$experience_id=intval($_POST['stazh']);
//Генерация урла
$order_url=genpass(20,20);

//ip юзера
$user_ip=$_SERVER["REMOTE_ADDR"];

//дата заказа
$order_date=date("Y-m-d");

//Запись в базу
$result=mysqli_query($link,"insert into base_userorders value
    ('$order_id','$jtype_id','$job_id','$city_id','$sphere_id','$staff_id','$fio','$usermail','$education_id','$sub_id','$experience_id','$order_code','$order_url','1','$responsibility','$user_ip','$order_date')
");

}
?>
