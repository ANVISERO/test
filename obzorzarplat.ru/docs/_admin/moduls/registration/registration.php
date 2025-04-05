<style type="text/css">
<!--
.RegConf{width:100%; margin:0 auto; font-size:16px; color:gray; font-weight:bold;}
.RegConf table td{padding:5px; text-align:left;}
.RegConf input.RegBut{
    margin:0 7px 0 0;
    background-color:#f5f5f5;
    border:2px solid silver;
    color:#c00;
    font-size:14px;
    height:25px;
    text-align:center;
}
.RegConf input.txt{font-size:15px; border:2px solid silver; heigt:40px}
.RegConf a.linkReg, a.linkReg:visited{color:#000; font-size:16px; text-decoration:none; border-bottom:1px dashed #000;}
-->
</style>

<?
$login=mysqli_real_escape_string($link,$_POST["login"]);
$psw=mysqli_real_escape_string($link,$_POST["psw"]);
$regs=intval($_POST["regs"]);
$ip=$_SERVER["REMOTE_ADDR"];

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if($login!=="user" OR $psw!=="pass"){
echo('
<div align="center">
<div class="RegConf">
<p>Вы неверно указали пару <b>имя</b> и <b>пароль</b> при входе.
Пожалуйста, повторите попытку или свяжитесь с нашей службой поддержки<p/>
<p align="center"><input type="button" class="RegBut" value="&laquo; Войти еще раз" onClick="self.location.href=\' /gift/\'"></p>
</div></div>
');
}else{
$check_q=mysqli_query($link,"select * from for_RegConf where user_ip='$ip'");

if(mysqli_num_rows($check_q)==0){
   if($regs=="1"){
   echo('
    <div align="center">
    <div class="RegConf">
      <p>Пожалуйста, введите свой email, указанный при регистрации:</p>
      <p>
      <form action="/gift/lite/" method="post" name="RegEmail">
      <input type="hidden" name="regs" value="1">
      <p><input type="text" name="email" value="" maxlength="32" class="txt" /></p>
      <p align="center">
      <input type="button" class="RegBut" value="&laquo; Назад" onClick="self.location.href=\'/gift/\'"><input type="submit" value="Войти в систему &raquo;" class="RegBut" />
      </p>
      </form>
      </p>
    </div>
    </div>
    ');
    }
    elseif($regs=="0"){
    echo('
    <div align="center">
    <div class="RegConf">
      <p>Заполните, пожалуйста, все поля анкеты:</p>
      <p>
      <form action="/gift/lite/" method="post" name="RegAll">
      <input type="hidden" name="regs" value="0">
      <table border="0">
      <tr>
        <td>Имя и фамилия</td>
        <td><input type="text" name="name" value="" /></td>
      </tr>
      <tr>
        <td>Компания</td>
        <td><input type="text" name="company" value="" /></td>
      </tr>
      <tr>
        <td>Должность в компании</td>
        <td><input type="text" name="job" value="" /></td>
      </tr>
      <tr>
        <td>Электронная почта</td>
        <td><input type="text" name="email" value="" /></td>
      </tr>
      <tr>
        <td colspan="2"><p align="center">
        <input type="button" class="RegBut" value="&laquo; Назад" onClick="self.location.href=\'/gift/\'">  <input type="submit" value="Войти в систему &raquo;" class="RegBut" />
        </p></td>
      </tr>
      </table>
      </form>
      </p>
    </div>
    </div>
  ');
  }
}else{
  $name=mysqli_result($check_q,0,2);
    echo('
    <div align="center">
    <div class="RegConf">
    <p>Добро пожаловать!</p>
    <p>Вы можете формировать неограниченное количество отчетов до 31.07.2009г.
    Полученные отчеты соответствуют тарифному плану <a href="/preds/tarif_unlimited/" class="linkReg" target="_blank">&laquo;Лайт. Безлимитный&raquo;</a> (ссылка открывается в новом окне)</p>
    <p>С другими тарифными планами Вы можете ознакомиться <a href="/preds/" class="linkReg" target="_blank">здесь</a> (ссылка открывается в новом окне).</p>
    <p>По всем вопросам Вы можете обращаться к нашей службе поддержки:</p>
    <p><em>email</em>:tz@obzorzarplat.ru</p>
    <p><em>телефон</em>:(812) 740-18-11, (911) 909-24-54</p>
    <p><input type="button" value="Войти в систему &raquo;" class="RegBut" onClick="self.location.href=\'/gift/lite/\'" /></p>
    </div>
    </div>
    ');
  }
}

?>