<?php
include('functions_test.php');

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

$ip=$_SERVER["REMOTE_ADDR"]; //user's ip
/*
$checkip_q=mysqli_query($link,"SELECT * from for_users_corporat where ip='$ip' ");
   if(mysqli_num_rows($checkip_q)==1){
          $user_q=mysqli_query($link,"UPDATE for_users_corporat SET email='".$_POST["email"]."', ip='$ip' ");
          $msg="Вы успешно зарегистрированы в системе! Пожалуйста, войдите под своим именем и пролем, перейдя по ссылке: <a href='/tests/login/'>вход&raquo;</a>";
        }
        else{
          $msg="Вы уже регистрировались в системе"
        }
*/

		if ( $_POST['login'] != '' && $_POST['psw'] != '' && $_POST['email'] != '' && valid_email ( $_POST['email'] ) == TRUE && $_POST['name']!='' && $_POST['company']!='')
		{
      $check_q=mysqli_query($link,"SELECT * from for_users_corporat where login='".$_POST["login"]."' AND password='".md5($_POST["psw"])."' AND levelaccess in(1, 2) ");
      if(mysqli_num_rows($check_q)==1){
       $checkip_q=mysqli_query($link,"SELECT * from for_users_corporat where login='".$_POST["login"]."' AND password='".md5($_POST["psw"])."' AND levelaccess in(1, 2) AND ip='' and email='' ");
        if(mysqli_num_rows($checkip_q)==1){
          $user_q=mysqli_query($link,"UPDATE for_users_corporat SET email='".$_POST["email"]."', ip='$ip', name='".$_POST["name"]."', company='".$_POST["company"]."' WHERE  login='".$_POST["login"]."' AND password='".md5($_POST["psw"])."' ");
          $msg="Вы успешно зарегистрированы в системе!<br> Пожалуйста, войдите под своим <em>именем</em> и <em>паролем</em>, перейдя по ссылке: <a href='/tests/login/' class='lk1'>вход&raquo;</a>";
        }
        else{
          $msg="Вы уже регистрировались в системе. Пожалуйста, войдите под своим именем и паролем, перейдя по ссылке: <a href='/tests/login/' class='lk1'>вход&raquo;</a>";
        }
      }
      else{
        $error="<p>Вы неверно указали пару <b>имя</b> и <b>пароль</b> при входе. </p>";
      }

		}
		else {
			$error = 'Пожалуйста, заполните все поля в форме корректно.';
		}
?>

<style type="text/css">
<!--
.login{width:100%; margin:0 auto; font-size:16px; color:gray; font-weight:bold;}
.login table td{padding:5px;}
.login input.reg{
    margin:0 7px 0 0;
    background-color:#f5f5f5;
    border:2px solid silver;
    color:#c00; text-weight:bold;
    font-size:16px;
    height:30px;
}
.login input.inp1{
    margin:0 7px 0 0;
    background-color:#fff;
    border:2px solid silver;
    color:#000; text-weight:bold;
    font-size:16px;
}

.login a.lk1, .login a.lk1:visited{color:#000; font-size:16px; text-decoration:none; border-bottom:1px dashed #000;}
.login a.lk1:hover{color:#c00; font-size:16px; text-decoration:none; border-bottom:1px solid #c00;}
-->
</style>

  <div align="center">
		<div class="login">
<?php	if ( isset ( $error ) )	{ echo '			<p class="error">' . $error . '</p>' . "\n";	}	?>
<?php	if ( isset ( $msg ) )	{ echo '			<p class="msg">' . $msg . '</p>' . "\n";	} else {//if we have a mesage we don't need this form again.?>


	<form action="/tests/register/" method="post">
		<input type="hidden" name="_submit_check" value="1"/>

    <table border="0">
    <tr>
		<td align="right"><label for="login">Логин</label></td>
		<td align="left"><input class="input" type="text" id="login" name="login" size="32" value="<?php if(isset($_POST['login'])){echo $_POST['login'];}?>" /></td>
    </tr>
    <tr>
		<td align="right"><label for="psw">Пароль</label></td>
		<td align="left"><input class="input" type="password" id="psw" name="psw" size="32" value="" /></td>
    </tr>
    <tr>
        <td colspan="2"><hr></td>
    </tr>
    <tr>
		<td align="right"><label for="name">Имя</label></td>
		<td align="left"><input class="input" type="text" id="name" name="name" size="32" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>" /></td>
    </tr>
    <tr>
		<td align="right"><label for="company">Компания</label></td>
		<td align="left"><input class="input" type="text" id="company" name="company" size="32" value="<?php if(isset($_POST['company'])){echo $_POST['company'];}?>" /></td>
    </tr>
    <tr>
		<td align="right"><label for="email">Email</label></td>
		<td align="left"><input class="input" type="text" id="email" name="email" size="32" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" /></td>
    </tr>
    <tr>
      <td></td>
      <td align="left"><input type="submit" value="Зарегистрироваться&raquo;" class="reg" /></td>
    </tr>
   </table>
	</form>

  <p>По всем вопросам Вы можете обратиться к нашей службе поддержки:</p>
  <p><em>email</em>: tz@obzorzarplat.ru</p>
  <p><em>телефон</em>: (812) 740-18-11, (911) 909-24-54</p>
	</div>
  </div>
<?php } ?>