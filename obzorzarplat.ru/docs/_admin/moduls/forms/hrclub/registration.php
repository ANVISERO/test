<?
include($folder.'/_admin/moduls/functions/checkForm.php');

//Сбор данных
$name=mysqli_real_escape_string($link,$_POST["name"]);
$email=mysqli_real_escape_string($link,$_POST["email"]);

$url=$_SERVER['HTTP_HOST'];

$sot_mail="kate@ant-management.spb.ru";
//Проверка


//Запись в базу
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

//Формирование письма для компании
$msg='Получено c сайта <b>'.$url.'</b><br>
Подписка на новости клуба Кочубей
<hr>
Имя: '.$name.'<br>
Адрес E-mail: '.$email.'<br>
';

$msg=wordwrap($msg,70);

$topic="Подписка на новости кадрового клуба Кочубей";
$topic=wordwrap($topic,70);

//Отправка сообщения
mail("$sot_mail, tz@obzorzarplat.ru",$topic,$msg,"FROM:<$sot_mail>\nContent-Type: text/html; charset=Windows-1251\nContent-Transfer-Encoding: 8bit");

//Формирование письма для подписчика
$msg1='
Вы подписались на получение новостей о мероприятиях, проводимых профессиональным кадровым клубом "Кочубей"<br>
Для подтверждения подписки перейдите, пожалуйста, <a href="http://obzorzarplat.ru/hrclub/news/confirmation/?ID='.$id.'&amp;key='.$key.'">по ссылке&raquo;</a><br>
<b>Администратор клуба:</b> Петрова Екатерина<br>
<b>E-mail:</b> kate@ant-management.spb.ru<br>
<b>Телефон:</b> (812) 740 18 11, (921) 372 42 22<br>

Более подробную информацию о клубе Вы сможете прочесть <a href="http://obzorzarplat.ru/hrclub/">здесь &raquo;</a>
';

$msg1=wordwrap($msg1,70);

$topic1="Подписка на новости профессионального кадрового клуба Кочубей";
$topic1=wordwrap($topic1,70);

//Отправка сообщения
mail("$email, tz@obzorzarplat.ru",$topic1,$msg1,"FROM:<$sot_mail>\nContent-Type: text/html; charset=Windows-1251\nContent-Transfer-Encoding: 8bit");

echo('
<center><p><b>Вам на почту было отправлено письмо с просьбой подтверждения подписки на новости о мероприятиях, проводимых профессиональным кадровым клубом &laquo;Кочубей&raquo;.  Для активации подписки необходимо будет перейти по ссылке, указанной в письме.</b></p></center>
<p>Спасибо за проявленный интерес!</p>
<hr>
');
}else{
echo("<p>Вы уже подписаны на новости профессионального кадрового клуба &laquo;Кочубей&raquo;</p>");
}
}else{?>

<p>Вы сделали что-то неверно, пожалуйста, повторите попытку.</p>

<?}?>
<input type="button" value="Вернуться назад" class="but" onClick="self.location.href='/hrclub/';">