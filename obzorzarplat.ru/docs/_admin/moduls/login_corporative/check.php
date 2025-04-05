<style type="text/css">
<!--
.login{width:100%; margin:0 auto; font-size:16px; color:gray; font-weight:bold;}
.login table td{padding:5px; color:#000;}
.login input.reg{
    margin:0 7px 0 0;
    background-color:#f5f5f5;
    border:2px solid silver;
    color:#c00; text-weight:bold;
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

#block_left{width: 200px; float: left; height:100%;}
#block_main{width: 100%;}
-->
</style>

<?
//include(functions_my.php);


/**********FUNCTIONS**************/

function valid_email($email){
  return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) ? FALSE : TRUE;
}
/**********END_FUNCTIONS********/

$login=mysqli_real_escape_string($link,$_POST["login"]); //login
$psw=mysqli_real_escape_string($link,$_POST["psw"]); //password
if(isset($_POST["email"])){$email=mysqli_real_escape_string($link,$_POST["email"]);} //user's email
$ip=$_SERVER["REMOTE_ADDR"]; //user's ip

  $psw_md5=md5($psw); //password hash

$err=0; //индикатор ошибки

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

$check_ip_q=mysqli_query($link,"SELECT * FROM for_users_corporat WHERE ip='$ip'");

if(mysqli_num_rows($check_ip_q)==0){ //check if ip exists

if($_POST['login']!='' && $_POST['psw']!='' && $email!='' && valid_email($email)==TRUE){ //check if empty

  echo($psw_md5);
  $check_q=mysqli_query($link,"SELECT * from for_users_corporat where login='$login' AND password='$psw_md5'");

  if(mysqli_num_rows($check_q)==0){
    echo('
<div align="center">
<div class="login">
<p>Вы неверно указали пару <b>имя</b> и <b>пароль</b> при входе. </p>

<p>
      <form name="login" method="post" action="/tests/login/work/">
      <table border="0">
      <tr>
        <td align="right">Имя</td>
        <td align="left"><input type="text" name="login" value="'.$login.'" size="20" maxlength="10" class="inp1" /></td>
      </tr>
      <tr>
        <td align="right">Пароль</td>
        <td align="left"><input type="password" name="psw" value="'.$psw.'" size="20" maxlength="8" class="inp1" /></td>
      </tr>
      <tr>
        <td align="right">email</td>
        <td align="left"><input type="text" name="email" value="'.$email.'" size="20" maxlength="20" class="inp1" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" value="Войти&raquo;" class="reg" /></td>
      </tr>
      </table>
      </form>
      </p>
      <p>Пожалуйста, повторите попытку или свяжитесь с нашей службой поддержки:</p>
  <p><em>email</em>: tz@obzorzarplat.ru</p>
  <p><em>телефон</em>: (812) 740-18-11, (911) 909-24-54</p>
</div></div>
');
$err++;
  }else{
   // пишем в базу
while($row=mysqli_fetch_array($check_q)){
  $user_id=$row["id"];
  $password=$row["password"];
  $login=$row["login"];
  $tarif_id=$row["tarif_id"];
  $date_finish=$row["date_finish"];
  $tarif_title=mysqli_result(mysqli_query($link,"select title from for_tarif where id='$tarif_id'"),0,0);
  $update_q=mysqli_query($link,"UPDATE for_users_corporat
                                    SET ip='$ip', email='$email'
                                    WHERE login='$login' AND password='$password'");
}
  $err=0;
  }

}
elseif($_POST['login']=='' OR $_POST['psw']=='' OR $email=='' OR valid_email($email)!=TRUE){
      echo('
<div align="center">
<div class="login">
<p>Пожалуйста, заполните все поля корректно. </p>
<p>
      <form name="login" method="post" action="/tests/login/work/">
      <table border="0">
      <tr>
        <td align="right">Имя</td>
        <td align="left"><input type="text" name="login" value="'.$login.'" size="20" maxlength="10" class="inp1" /></td>
      </tr>
      <tr>
        <td align="right">Пароль</td>
        <td align="left"><input type="password" name="psw" value="'.$psw.'" size="20" maxlength="8" class="inp1" /></td>
      </tr>
      <tr>
        <td align="right">email</td>
        <td align="left"><input type="text" name="email" value="'.$email.'" size="20" maxlength="20" class="inp1" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" value="Войти&raquo;" class="reg" /></td>
      </tr>
      </table>
      </form>
      </p>
      <p>Повторите попытку или свяжитесь с нашей службой поддержки:<p/>
  <p><em>email</em>: tz@obzorzarplat.ru</p>
  <p><em>телефон</em>: (812) 740-18-11, (911) 909-24-54</p>
</div></div>
');
$err++;
}
}else{


if($_POST['login']!='' && $_POST['psw']!=''){ //check if empty
  $check_q=mysqli_query($link,"SELECT * from for_users_corporat where login='$login' AND password='$psw_md5'");

  if(mysqli_num_rows($check_q)==0){
    echo('
<div align="center">
<div class="login">
<p>Пожалуйста, заполните все поля корректно. </p>
<p>
      <form name="login" method="post" action="/tests/login/work/">
      <table border="0">
      <tr>
        <td align="right">Имя</td>
        <td align="left"><input type="text" name="login" value="'.$login.'" size="20" maxlength="10" class="inp1" /></td>
      </tr>
      <tr>
        <td align="right">Пароль</td>
        <td align="left"><input type="password" name="psw" value="'.$psw.'" size="20" maxlength="8" class="inp1" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" value="Войти&raquo;" class="reg" /></td>
      </tr>
      </table>
      </form>
      </p>
      <p>Повторите попытку или свяжитесь с нашей службой поддержки:<p/>
  <p><em>email</em>: tz@obzorzarplat.ru</p>
  <p><em>телефон</em>: (812) 740-18-11, (911) 909-24-54</p>
</div></div>
');
$err++;
  }else{
   // проверяем тариф
while($row=mysqli_fetch_array($check_q)){
  $user_id=$row["id"];
  $tarif_id=$row["tarif_id"];
  $date_finish=$row["date_finish"];
  $tarif_title=mysqli_result(mysqli_query($link,"select title from for_tarif where id='$tarif_id'"),0,0);
  $err=0;
}
  }

} else{
      echo('
<div align="center">
<div class="login">
<p>Пожалуйста, заполните все поля корректно. </p>
<p>
      <form name="login" method="post" action="/tests/login/work/">
      <table border="0">
      <tr>
        <td align="right">Имя</td>
        <td align="left"><input type="text" name="login" value="'.$login.'" size="20" maxlength="10" class="inp1" /></td>
      </tr>
      <tr>
        <td align="right">Пароль</td>
        <td align="left"><input type="password" name="psw" value="'.$psw.'" size="20" maxlength="8" class="inp1" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" value="Войти&raquo;" class="reg" /></td>
      </tr>
      </table>
      </form>
      </p>
      <p>Повторите попытку или свяжитесь с нашей службой поддержки:<p/>
  <p><em>email</em>: tz@obzorzarplat.ru</p>
  <p><em>телефон</em>: (812) 740-18-11, (911) 909-24-54</p>
</div></div>
');
$err++;
}
}

if($err==0){
//set_login_sessions($user_id, $psw, TRUE);

  echo('
 <table border="0" width="100%">
 <tr>
 <td width="300">
  <p>Вы подключены на тариф &laquo;'.$tarif_title.'&raquo;</p>
  <p>Дата окончания действия тарифа: '.$date_finish.'</p>
 <p>По всем вопросам и предложениям Вы можете обращаться к службе поддержки:<p/>
  <p><em>email</em>: tz@obzorzarplat.ru</p>
  <p><em>телефон</em>: (812) 740-18-11, (911) 909-24-54</p>
</td>
<td>
');

switch($tarif_id){
case "1":
  if(!isset($_GET["step"])){$step=0;}
  if(isset($_GET["step"])){$step=$_GET["step"];}
  echo "1";
  include($folder.'_admin/moduls/lite-pred-step'.$step.'.php');
  break;

case "2":
  if(!isset($_GET["step"])){$step=0;}
  if(isset($_GET["step"])){$step=$_GET["step"];}
  include($folder.'_admin/moduls/lite-pred-step'.$step.'.php');
  break;

case "3":
  if(!isset($_GET["step"])){$step=0;}
  if(isset($_GET["step"])){$step=$_GET["step"];}
  include($folder.'_admin/moduls/pred-step'.$step.'-work.php');
  break;

case "4":
  if(!isset($_GET["step"])){$step=0;}
  if(isset($_GET["step"])){$step=$_GET["step"];}
  include($folder.'_admin/moduls/pred-step'.$step.'-work.php');
  break;
}

echo('
</td>
</tr>
</table>
  ');

}


?>