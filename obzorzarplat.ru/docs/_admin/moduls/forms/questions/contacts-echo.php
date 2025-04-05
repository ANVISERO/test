<?
//Подключаемся к базе контактов
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$query="select * from for_contacts where view='0'";
$result=mysqli_query($link,$query);

while($row=mysqli_fetch_array($result))
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
if($adress<>''){echo('Адрес: ');}
echo('</td>
<td align="left"><b>'.$adress.'</b></td>
</tr>');

if($phone<>''){
echo('<tr>
  <td align="right" width="120">Телефон: </td>
<td align="left"><b>'.$phone.'</b></td>
</tr>');}

if($fax<>''){
echo('<tr>
  <td align="right" width="120">Факс: </td>
<td align="left"><b>'.$fax.'</b></td>
</tr>');}

if($mail<>''){
echo('<tr>
  <td align="right" width="120">Адрес E-mail: </td>
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
<form name="quest" action="/contacts/send/" method="post" onSubmit="return testform();">
<font style=" color:#cc0000; font-size:12px; font-weight:bold">Обратная связь</font><br>
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
    <td width="200" align="right" valign="top">Категория вопроса:*</td>
    <td align="left" valign="top">
<select name="kat" style=" width:306px; font-weight:bold; font-size:10px">
<?
//Вывод вариантов вопросов
$query3="select * from for_contacts";
$result3=mysqli_query($link,$query3);
while($row=mysqli_fetch_array($result3))
{
$quest=$row["quest"];
if($quest<>'')
{
echo('<option>'.$quest.'</option>');
}
}
?>
</select>

	</td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top">Сообщение:*</td>
    <td align="left" valign="top">
<textarea name="text" style=" width:300px; height:80px; font-weight:normal; font-size:12px"></textarea>
	</td>
  </tr>
   <tr>
    <td width="200" align="right" valign="top">

<?
$url_img=$folder.'_admin/_adminfiles/capcha/';
$cap[0]='q';$cap[1]='w'; $cap[2]='e'; $cap[3]='r'; $cap[4]='t'; $cap[5]='y'; $cap[6]='u'; $cap[7]='i'; $cap[8]='o'; $cap[9]='p';
$cap_f=rand(0,9);$cap_s=rand(0,9);$cap_t=rand(0,9);
$cap_code=($cap_f*100 + $cap_s*10 + $cap_t)*123;
echo('
<img src="'.$url_img.'cap_'.$cap[$cap_f].'.gif" width="18" height="30" style="border:1px solid #eee">
<img src="'.$url_img.'cap_'.$cap[$cap_s].'.gif" width="18" height="30" style="border:1px solid #eee">
<img src="'.$url_img.'cap_'.$cap[$cap_t].'.gif" width="18" height="30" style="border:1px solid #eee">
<input type="hidden" name="cap_code" value="'.$cap_code.'">
');
?>

	</td>
    <td align="left" valign="top">
<strong>*</strong>Номер на картинке: <input name="cap" type="text" class="text" size="3" maxlength="3" style="font-size:20px; font-weight:bold; height:27px">
	</td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top">&nbsp;</td>
    <td align="left" valign="top"><input type="submit" value="Отправить сообщение" class="but"></td>
  </tr>
</table>
</form>
<script>
function testform()
{
if ((document.quest.name.value=="") || (document.quest.mail.value=="") || (document.quest.text.value==""))
{window.alert('Не все поля заполнены!');return false;}
}
</script>

