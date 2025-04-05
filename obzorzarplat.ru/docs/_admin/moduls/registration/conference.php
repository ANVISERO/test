<style type="text/css">
<!--
.RegConf{width:100%; margin:0 auto; font-size:16px; color:gray; font-weight:bold;}
.RegConf table td{padding:5px;}
.RegConf input.reg{
    margin:0 7px 0 0;
    background-color:#f5f5f5;
    border:2px solid silver;
    color:#c00; text-weight:bold;
    font-size:16px;
    width:100px;
    height:30px;
}
-->
</style>

<div align="center">
<div class="RegConf">

<form name="conf" method="post" action="/gift/registration/">
<table border="0">
<tr>
  <td align="right">Имя</td>
  <td align="left"><input type="text" name="login" value="" size="20" maxlength="5" /></td>
</tr>
<tr>
  <td align="right">Пароль</td>
  <td align="left"><input type="password" name="psw" value="" size="20" maxlength="5" /></td>
</tr>
<tr>
  <td align="right" colspan="2">Вы уже регистрировались в системе?</td>
</tr>
<tr>
  <td align="center">Да</br><input type="radio" name="regs" value="1" checked /></td>
  <td align="center">Нет</br><input type="radio" name="regs" value="0" /></td>
<tr>
  <td colspan="2" align="center"><input type="submit" value="Войти&raquo;" class="reg" /></td>
</tr>
</table>
</form>

</div>
</div>