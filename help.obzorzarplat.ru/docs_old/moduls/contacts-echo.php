<?php
//������������ � ���� ���������
$link = mysql_connect($host,$user,$pass);
mysql_select_db($db,$link);
$query="select * from for_contacts where view='0'";
$result=mysql_query($query,$link);

while($row=mysql_fetch_array($result))
{
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
{$contact_photo='<img src="/_admin/elements/contacts/'.$contact_id.'.jpg" style="border:1px solid #2B2B2B">';}

if(!file_exists($folder.'_admin/elements/contacts/'.$contact_id.'.jpg'))
{$contact_photo='';}

echo('<hr>
<table width="100%" border="0" cellspacing="0" cellpadding="6">
  <tr>
  <td colspan="3"><font style=" color:#cc0000; font-size:12px; font-weight:bold">'.$name.'</font><br><em>'.$dol.'</em></td></tr>');

echo('<tr>
  <td width="120" rowspan="6" align="center" valign="top">'.$contact_photo.'</td>
<td align="right" width="120" valign="top">');
if($adress<>''){echo('�����: ');}
echo('</td>
<td align="left"><b>'.$adress.'</b></td>
</tr>');

if($phone<>''){
echo('<tr>
  <td align="right" width="120">�������: </td>
<td align="left"><b>'.$phone.'</b></td>
</tr>');}

if($fax<>''){
echo('<tr>
  <td align="right" width="120">����: </td>
<td align="left"><b>'.$fax.'</b></td>
</tr>');}

if($mail<>''){
echo('<tr>
  <td align="right" width="120">����� E-mail: </td>
<td align="left"><b><a href="mailto:'.$mail.'">'.$mail.'</a></b></td>
</tr>');}

if($icq<>''){
echo('<tr>
  <td align="right" width="120">ICQ: </td>
<td align="left"><b>'.$icq.'</b></td>
</tr>');}

if($skype<>''){
echo('<tr>
  <td align="right" width="120">Skype: </td>
<td align="left"><b>'.$skype.'</b></td>
</tr>');}



echo('</table>
');
}
?>
<hr>
<p><font style=" color:#cc0000; font-size:12px; font-weight:bold">������� ���� ������ ������������ ������� obzorzarplat.ru</font></p>
<form name="quest" action="/contacts/send/" method="post" onSubmit="return testform();">
<em>* ��� ���� ������������ ��� ����������</em>
<table width="100%" border="0" cellspacing="0" cellpadding="6">
  <tr>
    <td width="200" align="right" valign="top">������ ���:*</td>
    <td align="left" valign="top"><input type="text" value="" style=" width:300px; font-weight:bold; font-size:10px" name="name"></td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top">����� E-mail:*</td>
    <td align="left" valign="top"><input type="text" value="" style=" width:300px; font-weight:bold; font-size:10px" name="mail"></td>
  </tr>
<tr>
    <td align="right">��������� ��������</td>
    <td>
     <select name="kat" class="text_1">
         <option value="">--- ������� ---</option>
<?php
$quest_q=mysql_query("select distinct quest from for_contacts",$link);
while($row=mysql_fetch_array($quest_q)){
echo('<option value="'.$row["quest"].'">'.$row["quest"].'</option>');
}
?>
</select>
    </td>
</tr>
  <tr>
    <td width="200" align="right" valign="top">���������:*</td>
    <td align="left" valign="top">
<textarea name="text" style=" width:300px; height:80px; font-weight:normal; font-size:12px"></textarea>
	</td>
  </tr>

  <tr>
  <td width="200"></td>
  <td align="left">

<!--��������� �����-->
<script>
var RecaptchaOptions = {
   theme : 'white',
   lang: 'ru'
};
</script>
<?php

require_once($folder.'/_admin/moduls/captcha/recaptchalib.php');

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
    <td align="left" valign="top"><input type="submit" class="but_pension" value="��������� ���������" class="but"></td>
  </tr>
</table>
</form>

<script>
function testform()
{
if ((document.quest.name.value=="") || (document.quest.mail.value=="") || (document.quest.text.value==""))
{window.alert('�� ��� ���� ���������!');return false;}
}
</script>
