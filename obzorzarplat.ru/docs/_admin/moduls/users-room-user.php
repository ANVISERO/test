<h1 class="title"><img src="/_img/arr_01" width="8" height="7">&nbsp;&nbsp;Данные пользователя</h1>
<style>
td.t_line{border-top:1px solid #ddd;}
</style>
<br>
<?
$result=mysqli_query($link,"select * from for_users where id='$user_id'");
$user_login=mysqli_result($result,0,1);
$user_im=mysqli_result($result,0,3);
$user_fam=mysqli_result($result,0,4);
$user_otch=mysqli_result($result,0,5);
$user_mail=mysqli_result($result,0,6);
$user_birth=mysqli_result($result,0,7);
$user_sex=mysqli_result($result,0,8);
if($user_sex=='m'){$user_sex_name='Мужской';}
if($user_sex=='zh'){$user_sex_name='Женский';}
$user_country=mysqli_result($result,0,9);
$user_sity=mysqli_result($result,0,10);
$user_phone=mysqli_result($result,0,11);
$user_bisines=mysqli_result($result,0,12);
$user_icq=mysqli_result($result,0,13);
$user_skype=mysqli_result($result,0,15);
$user_web=mysqli_result($result,0,14);
?>


<table width="100%" border="0" cellspacing="0" cellpadding="4">
    <tr>
    <td  width="150" align="right">&nbsp;</td>
    <td >&nbsp;<input type="button" value="Редактировать" class="but" onClick="self.location.href='?page=userred'"></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">nic-name:<br><em>(логин)</em></td>
    <td class="t_line">&nbsp;<strong><?=$user_login;?></strong></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">Имя:</td>
    <td class="t_line">&nbsp;<strong><?=$user_im;?></strong></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">Фамилия:</td>
    <td class="t_line">&nbsp;<strong><?=$user_fam;?></strong></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">Отчество:</td>
    <td class="t_line">&nbsp;<strong><?=$user_otch;?></strong></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">Адрес E-mail:</td>
    <td class="t_line">&nbsp;<strong><?=$user_mail;?></strong></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">Дата рождения:</td>
    <td class="t_line">&nbsp;<strong><?=$user_birth;?></strong></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">Пол:</td>
    <td class="t_line">&nbsp;<strong><?=$user_sex_name;?></strong></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">Страна:</td>
    <td class="t_line">&nbsp;<strong><?=$user_country;?></strong></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">Город:</td>
    <td class="t_line">&nbsp;<strong><?=$user_sity;?></strong></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">Телефон:</td>
    <td class="t_line">&nbsp;<strong><?=$user_phone;?></strong></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">Вид деятельности:</td>
    <td class="t_line">&nbsp;<strong><?=$user_bisines;?></strong></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">Номер ICQ:</td>
    <td class="t_line">&nbsp;<strong><?=$user_icq;?></strong></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">Имя Skype:</td>
    <td class="t_line">&nbsp;<strong><?=$user_skype;?></strong></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">Web-страница:</td>
    <td class="t_line">&nbsp;<strong><?=$user_web;?></strong></td>
  </tr>
  
    <tr>
    <td class="t_line" width="150" align="right">&nbsp;</td>
    <td class="t_line">&nbsp;<input type="button" value="Редактировать" class="but" onClick="self.location.href='?page=userred'"></td>
  </tr>
</table>
