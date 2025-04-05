<style type="text/css">
<!--
.login{width:100%; margin:0 auto; font-size:16px; color:gray; font-weight:bold;}
.login table td{padding:5px;}
.login input.reg{
    margin:0 7px 0 0;
    background-color:#f5f5f5;
    border:2px solid silver;
    color:#000; text-weight:bold;
    font-size:16px;
    width:100px;
    height:30px;
}
.login input.inp1{
    margin:0 7px 0 0;
    background-color:#fff;
    border:2px solid silver;
    color:#000; text-weight:bold;
    font-size:16px;
}

.login a.lk1, .login a.lk1:visited{color:gray; font-size:16px; text-decoration:none; border-bottom:1px dashed #000;}
.login a.lk1:hover{color:#000; font-size:16px; text-decoration:none; border-bottom:1px solid #000;}
-->
</style>

  <div align="center">

	<div class="login">
<?php if ( isset( $error ) ) { echo '			<p class="error">' . $error . '</p>' . "\n";}?>
<?php //echo("login= ".$_POST["username"]."; psw= ".$_POST["password"]);?>
		<form class="form" action="/business/login/" method="post">

			<input type="hidden" name="_submit_check" value="1"/>

			<table border="0">
<tr>
  <td align="right">Логин</td>
  <td align="left"><input type="text" id="username" name="username" value="<?php if(isset($_POST["username"])){echo($_POST["username"]);}?>" size="32" maxlength="10" class="inp1" /></td>
</tr>
<tr>
  <td align="right">Пароль</td>
  <td align="left"><input type="password" id="password" name="password" value="" size="32" maxlength="10" class="inp1" /></td>
</tr>

<tr>
				<td align="right"><input type="checkbox" name="remember" id="remember" checked /></td>
          <td align="left"><label for="remember">Запомнить</label></td>
</tr>

<tr>
  <td></td>
  <td align="left"><input type="submit" value="Войти&raquo;" class="reg" /></td>
</tr>
</table>
		</form>
  <!--<p><a href="/business/register/" class="lk1">Зарегистрироваться&raquo;</a></p>-->
	</div>

</div>