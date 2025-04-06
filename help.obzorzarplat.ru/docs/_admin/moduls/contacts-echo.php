<?php


ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if (isset($_POST["username"])){$username=$_POST["username"];}else{$username="";}
if (isset($_POST["usermail"])){$usermail=$_POST["usermail"];}else{$usermail="";}
if (isset($_POST["usermsg"])){$usermsg=$_POST["usermsg"];}else{$usermsg="";}
if (isset($_POST["kat"])){$kat=$_POST["kat"];}

//Подключаемся к базе контактов
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
mysqli_query($link,'set names utf8');
$query="select * from for_contacts where view='0'";
$result=mysqli_query($link,$query);

$url=$_SERVER['HTTP_HOST'];

while($row=mysqli_fetch_array($result))
{
$contact_id=$row["id"];
$company_name=$row["name"];
$phone=$row["phone"];
$fax=$row["fax"];
$mail=$row["mail"];
$icq=$row["icq"];
$skype=$row["skype"];
$adress=$row["adress"];
$dol=$row["dol"];

if(file_exists($folder.'_admin/elements/contacts/'.$contact_id.'.jpg'))
{$contact_photo='<img src="/_admin/elements/contacts/'.$contact_id.'.jpg" style="border:1px solid #2B2B2B">';}

if(!file_exists($folder.'_admin/elements/contacts/'.$contact_id.'.jpg'))
{$contact_photo='';}

echo('<hr>
<p style="color:#cc0000; font-size:13px; font-weight:bold; text-align:left;">'.$company_name.'</p>
<table width="100%" border="0" cellspacing="0" cellpadding="6">
');
if($adress<>''){echo('<tr>
  <td align="right" width="40%">Адрес: </td>');}
echo('</td>
<td  width="60%"><b>'.$adress.'</b></td>
</tr>');

if($phone<>''){
echo('<tr>
  <td align="right">Телефон: </td>
<td><b>'.$phone.'</b></td>
</tr>');}

if($fax<>''){
echo('<tr>
  <td align="right">Факс: </td>
<td><b>'.$fax.'</b></td>
</tr>');}

if($mail<>''){
echo('<tr>
  <td align="right">Адрес E-mail: </td>
<td><b><a href="mailto:'.$mail.'">'.$mail.'</a></b></td>
</tr>');}

if($icq<>''){
echo('<tr>
  <td align="right">ICQ: </td>
<td><b>'.$icq.'</b></td>
</tr>');}

if($skype<>''){
echo('<tr>
  <td align="right">Skype: </td>
<td><b>'.$skype.'</b></td>
</tr>');}

echo('</table>
');

}
?>
<hr>
<p style="color:#cc0000; font-size:13px; font-weight:bold; text-align:left;">Задайте вопрос специалистам нашего портала</p>
  <form id="quest" name="quest" action="" method="post" onsubmit="return testform();">
<em>* Все поля обязательные для заполнения</em>
<table width="100%" border="0">
  <tr>
    <td width="40%" align="right">Полное имя:*</td>
    <td width="60%"><input type="text" value="<?php echo($username);?>" class="text_1" name="username"></td>
  </tr>
  <tr>
    <td align="right">Адрес E-mail:*</td>
    <td><input type="text" value="<?php echo($usermail);?>" class="text_1" name="usermail"></td>
  </tr>
<tr>
    <td align="right">Категория вопросов*:</td>
    <td>
     <select name="kat" class="text_1">
<?php
$quest_q=mysqli_query($link,"select distinct question from contacts_questions");
while($row=mysqli_fetch_array($quest_q)){
    if($row["question"]==$kat){$selected="selected";}else{$selected="";}
    echo('<option value="'.$row["question"].'" '.$selected.'>'.$row["question"].'</option>');
}
?>
</select>
    </td>
</tr>
  <tr>
    <td align="right" valign="top">Сообщение*:</td>
    <td><textarea name="usermsg" style=" width:400px; height:80px; font-weight:normal; font-size:13px"><?php echo($usermsg);?></textarea></td>
  </tr>

  <tr>
  <td></td>
  <td>

<!--параметры капчи-->
<script type="text/javascript">
var RecaptchaOptions = {
   theme : 'custom',
   lang: 'ru',
   custom_theme_widget: 'recaptcha_widget'
};
</script>
<?php

require_once('_admin/moduls/captcha/recaptchalib.php');

// Get a key from http://recaptcha.net/api/getkey
$publickey = "6LdFBQcAAAAAAN8U1azBzK6pEoAL84OCllbA9lFC";
$privatekey = "6LdFBQcAAAAAAPj_qXHiQRUWItFJW9HFeurHCOlx";

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

# was there a reCAPTCHA response?
if (isset($_POST["submit"])) {
        $resp = recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);

        if ($resp->is_valid) {

                //Загрузка данных о контакте
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$query="select * from contacts_questions where question='$kat'";
$result=mysqli_query($link,$query);

//Формирование письма
$msg='Получено c сайта <b>'.$url.'</b><br>
Категория вопросов: '.$kat.'<hr>
Имя:<b>'.$username.'</b><br>
Адрес E-mail:<b>'.$usermail.'</b><br>
Сообщение:<br>
'.$usermsg;

//Отправка сообщения
while($row=mysqli_fetch_array($result)){
    $mail_to=$row["mail"];
    mail("$mail_to","Сообщение с сайта $url",$msg,"FROM:$name<$usermail>\nContent-Type: text/html; charset=Windows-1251\nContent-Transfer-Encoding: 8bit");
}
echo('
<font style="font-size:14px; color:#c00; font-weight:bold; text-align:center;">Ваше сообщение успешно отправлено!</font>
<hr>
');
        } else {
                # set the error code so that we can display it
                $error = $resp->error;
                echo recaptcha_get_html($publickey, $error);
        }
}
else{
    echo recaptcha_get_html($publickey, $error);
}
?>
  </td>
  </tr>
  <tr>
    <td></td>
    <td><input name="submit" id="submit" type="submit" class="but1" value="Отправить сообщение"></td>
  </tr>
</table>
</form>

<script>
function testform()
{
    if(document.quest.username.value==""){window.alert('Вы не указали имя.\n');return false;}
    if(document.quest.usermail.value==""){window.alert('Вы не указали email.\n');return false;}
    if(document.quest.usermsg.value==""){window.alert('Вы не написали сообщение.\n');return false;}
    if(document.quest.recaptcha_response_field.value==""){window.alert('Вы не указали, что нарисовано на картинке\n');return false;}
    else{
        return true;
    }
}
</script>
