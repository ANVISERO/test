<h1 class="title"><img src="/_img/arr_01" width="8" height="7">&nbsp;&nbsp;�������������� ������ ������������</h1>

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
$user_birth_arr=implode(" ",$user_birth);
$user_b_day=$user_birth_arr[0];
$user_b_mon=$user_birth_arr[1];
$user_b_year=$user_birth_arr[2];

$user_sex=mysqli_result($result,0,8);
if($user_sex=='m'){$chek_1='checked="checked"'; $chek_2='';}
if($user_sex=='zh'){$chek_2='checked="checked"'; $chek_1='';}
$user_country=mysqli_result($result,0,9);
$user_sity=mysqli_result($result,0,10);
$user_phone=mysqli_result($result,0,11);
$user_bisines=mysqli_result($result,0,12);
$user_icq=mysqli_result($result,0,13);
$user_skype=mysqli_result($result,0,15);
$user_web=mysqli_result($result,0,14);
?>

<form name="regist" method="post" action="?page=userupd">
<table width="100%" border="0" cellspacing="0" cellpadding="4">
    <tr>
    <td width="150" align="right"></td>
    <td><input type="button" value="������" class="but" onClick="self.location.href='?page=user'"> <input type="submit" value="���������" class="but"></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">nic-name:<br><em>(�����)</em></td>
    <td class="t_line"><b><?=$user_login;?></b></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">���:</td>
    <td class="t_line"><input type="text" name="im" class="text" style=" width:300px" value="<?=$user_im;?>"></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">�������:</td>
    <td class="t_line"><input type="text" name="fam" class="text" style=" width:300px" value="<?=$user_fam;?>"></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">��������:</td>
    <td class="t_line"><input type="text" name="otch" class="text" style=" width:300px" value="<?=$user_otch;?>"></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">����� E-mail:</td>
    <td class="t_line"><input type="text" name="mail" class="text" style=" width:300px" value="<?=$user_mail;?>"></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">���� ��������:</td>
    <td class="t_line">
<select name="day_b" class="text" style=" width:50px">
<? 
$chek_4='';
for($ii=1; $ii<=31; $ii++)
{
if($ii==$user_b_day){$chek_4='selected="selected"';}
echo('<option '.$chek_4.'>'.$ii.'</option>');
$chek_4='';
}
?>
</select>
<select name="mon_b" class="text" style=" width:150px">
<option <? if($user_b_mon=='������'){echo('selected="selected"');}?>>������</option>
<option <? if($user_b_mon=='�������'){echo('selected="selected"');}?>>�������</option>
<option <? if($user_b_mon=='�����'){echo('selected="selected"');}?>>�����</option>
<option <? if($user_b_mon=='������'){echo('selected="selected"');}?>>������</option>
<option <? if($user_b_mon=='���'){echo('selected="selected"');}?>>���</option>
<option <? if($user_b_mon=='����'){echo('selected="selected"');}?>>����</option>
<option <? if($user_b_mon=='����'){echo('selected="selected"');}?>>����</option>
<option <? if($user_b_mon=='�������'){echo('selected="selected"');}?>>�������</option>
<option <? if($user_b_mon=='��������'){echo('selected="selected"');}?>>��������</option>
<option <? if($user_b_mon=='�������'){echo('selected="selected"');}?>>�������</option>
<option <? if($user_b_mon=='������'){echo('selected="selected"');}?>>������</option>
<option <? if($user_b_mon=='�������'){echo('selected="selected"');}?>>�������</option>
</select>
	
<select name="year_b" class="text" style=" width:70px">
<?
$chek_3='';
for($ii=date("Y"); $ii>=1900; $ii--)
{
if($ii==$user_b_year){$chek_3='selected="selected"';}
echo('<option '.$chek_3.'>'.$ii.'</option>');
$chek_3='';
}
?>
</select>	</td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">���:</td>
    <td class="t_line">

<label><input type="radio" name="sex" value="m" <?=$chek_1;?>>�������</label>
<label><input type="radio" name="sex" value="zh" <?=$chek_2;?>>�������</label>	</td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">������:</td>
    <td class="t_line"><input type="text" name="country" class="text" style=" width:300px" value="<?=$user_country;?>"></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">�����:</td>
    <td class="t_line"><input type="text" name="sity" class="text" style=" width:300px" value="<?=$user_sity;?>"></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">�������:</td>
    <td class="t_line"><input type="text" name="phone" class="text" style=" width:300px" value="<?=$user_phone;?>"></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">��� ������������:</td>
    <td class="t_line"><input type="text" name="bisines" class="text" style=" width:300px" value="<?=$user_bisines;?>"></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">����� ICQ:</td>
    <td class="t_line"><input type="text" name="icq" class="text" style=" width:300px" value="<?=$user_icq;?>"></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">��� Skype:</td>
    <td class="t_line"><input type="text" name="skype" class="text" style=" width:300px" value="<?=$user_skype;?>"></td>
  </tr>
  <tr>
    <td class="t_line" width="150" align="right">Web-��������:</td>
    <td class="t_line"><input type="text" name="web" class="text" style=" width:300px" value="<?=$user_web;?>"></td>
  </tr>
  
    <tr>
    <td class="t_line" width="150" align="right">&nbsp;</td>
    <td class="t_line"><input type="button" value="������" class="but" onClick="self.location.href='?page=user'"> <input type="submit" value="���������" class="but"></td>
  </tr>
</table>

</form>