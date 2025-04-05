<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js" type="text/javascript"
		xmlns="http://www.w3.org/1999/html"></script>
<script src="http://jquery-ui.googlecode.com/svn/tags/latest/external/bgiframe/jquery.bgiframe.min.js" type="text/javascript"></script>
<script src="/_js/jquery.form.js" type="text/javascript"></script>
<script src="/_js/jquery.example.js" type="text/javascript"></script>

<?php
//Подключаемся к базе контактов

$query="select id,name,phone,fax,mail,icq,skype,adress,dol,quest from for_contacts where view='0'";
$result=mysqli_query($link,$query);

while($row=mysqli_fetch_array($result)){
    $contact_id=$row["id"];
    $name=$row["name"];
    $phone=$row["phone"];
    $fax=$row["fax"];
    $mail=$row["mail"];
    $icq=$row["icq"];
    $skype=$row["skype"];
    $adress=$row["adress"];
    $dol=$row["dol"];
    $quest=$row["quest"];

if(file_exists($folder.'_admin/elements/contacts/'.$contact_id.'.jpg'))
{$contact_photo='<img src="/_admin/elements/contacts/'.$contact_id.'.jpg">';}

if(!file_exists($folder.'_admin/elements/contacts/'.$contact_id.'.jpg'))
{$contact_photo='';}
?>
<h2><?=$name.' - '.$dol;?></h2>

<!--<table width="100%">
<?php
if($adress<>''){?>
    <tr>
        <td align="right">Адрес: </td>
        <td><?=$adress?></td>
<?php }
if($phone<>''){ ?>
    <tr>
        <td align="right">Телефон: </td>
        <td><?=$phone;?></td>
    </tr>
<?php }
if($fax<>''){ ?>
    <tr>
        <td align="right">Факс: </td>
        <td><?=$fax;?></td>
</tr>
<?php }
if($mail<>''){ ?>
    <tr>
        <td align="right">Адрес E-mail: </td>
        <td><a href="mailto:<?=$mail;?>"><?=$mail;?></a></td>
</tr>
<?php }
if($icq<>''){ ?>
     <tr>
        <td align="right">ICQ: </td>
        <td><?=$icq;?></td>
</tr>
<?php }
if($skype<>''){ ?>
    <tr>
        <td align="right">Skype: </td>
        <td><?=$skype;?></td>
    </tr>
<?php } ?>
</table>--->
<?php } ?>
<p><strong><span style="line-height: 1.5;">Юридический адрес</span></strong></br>	199226, г. Санкт-Петербург, Галерный проезд, д. 5.</p>
<p><strong><span style="line-height: 1.5;">Физический адрес</span></strong></br>	199178, г. Санкт-Петербург, Малый пр. В.О., д. 58, литер А, офис 3.</p>
<p><strong><span style="line-height: 1.5;">Телефон:</span></strong>	+7 (921) 793-92-47</p>
<p><strong><span style="line-height: 1.5;">E-mail:</span></strong>	<a href="mailto:tz@obzorzarplat.ru">tz@obzorzarplat.ru</a></p>
<p><strong><span style="line-height: 1.5;">Реквизиты Продавца</span></strong></br>
	Индивидуальный предприниматель Куприн Валерий Владимирович</br>
	ИНН: 780400007113</br>
	ОГРНИП: 304780423700026</br>
	Банк: Филиал СПБ ПАО &laquo;Ханты-Мансийский банк Открытие&raquo;</br>
	Р/сч.: 40802810103000000006</br>
	К/сч.: 30101810800000000735</br>
	БИК: 044030735</br>
	ОКПО: 0114001235</p>
<h2>Задайте свой вопрос специалистам портала obzorzarplat.ru</h2>
<form name="quest" id="quest" action="" method="post">
<em>* Все поля обязательные для заполнения</em>
<table width="100%" border="0" cellspacing="0" cellpadding="6">
  <tr>
    <td width="200" align="right" valign="top">Полное имя:*</td>
    <td align="left" valign="top"><input type="text" value="" style=" width:300px; font-weight:bold; font-size:10px" name="name"></td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top">Адрес E-mail:*</td>
    <td align="left" valign="top"><input type="text" value="" style=" width:300px; font-weight:bold; font-size:10px" name="mail"></td>
  </tr>

  <tr>
    <td width="200" align="right" valign="top">Сообщение:*</td>
    <td align="left" valign="top">
<textarea name="text" style=" width:300px; height:80px; font-weight:normal; font-size:12px"></textarea>
	</td>
  </tr>

  <tr>
  <td width="200"></td>
  <td align="left">

<!--параметры капчи-->
<script type="text/javascript">
var RecaptchaOptions = {
   theme : 'custom',
   lang: 'ru',
   custom_theme_widget: 'recaptcha_widget'
};
</script>
<?php

require_once($folder.'../cgi/moduls/captcha/recaptchalib.php');

// Get a key from http://recaptcha.net/api/getkey
$publickey = "6LdFBQcAAAAAAN8U1azBzK6pEoAL84OCllbA9lFC";
$privatekey = "6LdFBQcAAAAAAPj_qXHiQRUWItFJW9HFeurHCOlx";

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

# was there a reCAPTCHA response?
if ($_POST["recaptcha_response_field"]) {
        $resp = recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);

        if ($resp->is_valid) {
                echo "You got it!";
        } else {
                # set the error code so that we can display it
                $error = $resp->error;
        }
}
echo recaptcha_get_html($publickey, $error);
?>
  </td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top">&nbsp;</td>
    <td align="left" valign="top"><input type="submit" class="submit" value="Отправить сообщение" class="but"></td>
  </tr>
</table>
</form>
<div id="quest_result"></div>



<script type="text/javascript">
    $(document).ready(function(){
        $('#quest_result').dialog({
		autoOpen: false,
                modal:true,
		width: 650,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
                                Recaptcha.reload()
			}
		}
	});

        $("#quest").ajaxForm({
    url:"/contacts/send/",
    target:"#quest_result",
    success:function(){
        $("#quest_result").dialog('open')
    },
    error:function(){
        alert("error")
    }

            })
        })
</script>
