<div class="login">
<?php if ( isset( $error ) ) { echo '			<p class="error">' . $error . '</p>' . "\n";}?>
<?php //echo("login= ".$_POST["username"]."; psw= ".$_POST["password"]);?>
		<form class="form" name="login_form" action="/login/" method="post">

			<input type="hidden" name="_submit_check" value="1"/>

			<table border="0">
<tr>
  <th width="30%">Логин</th>
  <td><input type="text" id="username" name="username" value="<?php if(isset($_POST["username"])){echo($_POST["username"]);}?>" size="32" maxlength="10" class="inp1" /></td>
</tr>
<tr>
  <th>Пароль</th>
  <td><input type="password" id="password" name="password" value="" size="32" maxlength="10" class="inp1" /></td>
</tr>
<tr>
    <th><input type="checkbox" name="remember" id="remember" /></th>
    <td><label for="remember">Запомнить</label></td>
</tr>
<tr>
    <td></td>
    <td><input type="submit" value="Войти" class="submit" /></td>
</tr>
</table>
		</form>
  <!--<p><a href="/business/register/" class="lk1">Зарегистрироваться&raquo;</a></p>-->
	</div>