<?php
include($folder.'/_admin/moduls/functions/checkForm.php');

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);

//Сбор данных
$meeting_id=intval($_POST["meeting_id"]);
$name=mysqli_real_escape_string($link,$_POST["name"]);
$mail=mysqli_real_escape_string($link,$_POST["email"]);
$tel=$_POST["tel"];
$job=mysqli_real_escape_string($link,$_POST["job"]);
$company=mysqli_real_escape_string($link,$_POST["company"]);
$key=random_string('alnum', 32);
$url=$_SERVER['HTTP_HOST'];

$sot_mail="kate@ant-management.spb.ru";
//Проверка

$id=mysqli_query($link,"select id from hrclub_meeting_registration where email='$mail' AND hrclub_meeting_id='$meeting_id'");
if(mysqli_num_rows($id)==0){
//Запись в базу
$q_regs=mysqli_query($link,"INSERT INTO hrclub_meeting_registration values('','$meeting_id', '$mail', '$name', '$company', '$job', '$tel','$key','0')");
$id=mysqli_result(mysqli_query($link,"select id from hrclub_meeting_registration where email='$mail' AND hrclub_meeting_id='$meeting_id' AND random_key='$key'"),0,0);
$meeting_title=mysqli_result(mysqli_query($link,"select title from hrclub_meetings where id='$meeting_id'"),0,0);
//Формирование письма для компании
$msg='Получено c сайта <b>'.$url.'</b><br>
Регистрация на заседание Петербургского профессионального кадрового клуба Кочубей: '.$meeting_title.'
<hr>
Имя: '.$name.'<br>
Компания: '.$company.'<br>
Должность: '.$job.'<br>
Адрес E-mail: '.$mail.'<br>
Телефон:'.$tel.'<br>
';

$msg=wordwrap($msg,70);

$topic="Регистрация на заседание Петербургского профессионального кадрового клуба Кочубей";
$topic=wordwrap($topic,70);

//Отправка сообщения
mail("$sot_mail, tz@obzorzarplat.ru",$topic,$msg,"FROM:<$sot_mail>\nContent-Type: text/html; charset=Windows-1251\nContent-Transfer-Encoding: 8bit");

//Формирование письма для участника
$msg1='
Вами была отправлена заявка на регистрацию на заседание Петербургского профессионального кадрового клуба "Кочубей": '.$meeting_title.'<br>
Для подтверждения регистрации перейдите, пожалуйста, по ссылке: <a href="http://obzorzarplat.ru/hrclub/estimated_meeting/confirmation/?ID='.$id.'&amp;key='.$key.'">http://obzorzarplat.ru/hrclub/estimated_meeting/confirmation/?ID='.$id.'&amp;key='.$key.'</a><br>
Посмотрите информацию о ближайших заседаниях <a href="http://obzorzarplat.ru/hrclub/estimated_meeting/">здесь &raquo;</a><br>
<b>Администратор клуба:</b> Петрова Екатерина<br>
<b>E-mail:</b> kate@ant-management.spb.ru<br>
<b>Телефон:</b> +7 (812) 740 18 11, +7 (921) 372 42 22<br>

Более подробную информацию о клубе Вы сможете прочесть <a href="http://obzorzarplat.ru/hrclub/">здесь &raquo;</a>
';

$msg1=wordwrap($msg1,70);

$topic1="Регистрация на заседание Петербургского профессионального кадрового клуба Кочубей";
$topic1=wordwrap($topic1,70);

//Отправка сообщения
mail("$mail, tz@obzorzarplat.ru",$topic1,$msg1,"FROM:<$sot_mail>\nContent-Type: text/html; charset=Windows-1251\nContent-Transfer-Encoding: 8bit");

echo('
<p align="center">Вы успешно прошли регистрацию!
<br> Для подтверждения регистрации Вам необходимо перейти по ссылке, указанной в электронном письме, отправленном на Ваш почтовый ящик ('.$mail.'). После этого с Вами свяжется администратор профессионального кадрового клуба &laquo;Кочубей&raquo; - Петрова Екатерина </p>
');
}else{
    echo('<p>Вы уже отправляли заявку на регистрацию. <br> Для подтверждения регистрации Вам необходимо перейти по ссылке, указанной в электронном письме, отправленном на Ваш почтовый ящик. После этого с Вами свяжется администратор профессионального кадрового клуба &laquo;Кочубей&raquo; - Петрова Екатерина ( +7 (812) 740 18 11; +7 (921) 372 42 22)</p>');
}
?>
<hr>
<input type="button" value="Назад" class="but" onClick="history.back(-1);">