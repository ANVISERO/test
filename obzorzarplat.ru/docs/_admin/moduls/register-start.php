<?
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

//Сбор переменных
$kov="'";
$login=$_POST['login'];
$pass_1=$_POST['pass_1'];
$pass_2=$_POST['pass_2'];
$im=$_POST['im'];
$fam=$_POST['fam'];


$otch='';
$mail='';
$day_b='';
$mon_b='';
$year_b='';
$birth=$day_b.' '.$mon_b.' '.$year_b;
$sex='';
$country='';
$sity='';
$phone='';
$bisines='';
$icq='';
$skype='';
$web='';
$status=1;
$type=0;
$money=0;

$date=date("Y-m-d");
$cap_code=$_POST['cap_code'];
$cap=$_POST['cap'];

//Ошибки
$err[1]=$err[2]=$err[3]=$err[4]=$err[5]=0;
//Проверки
if(mysqli_num_rows(mysqli_query($link,"select * from for_users where log='$login'"))<>0){$err[1]=1;}
if($pass_1<>$pass_2){$err[2]=1;}
if((eregi("@",$login)==0)){$err[3]=1;}
if($cap<>($cap_code/123)){$err[4]=1;}
if(!isset($_POST['pravila'])){$err[5]=1;}

if(($err[1]+$err[2]+$err[3]+$err[4]+$err[5])==0)
{
$id=implode("", file($folder.'_admin/settings/count_id'));

$count_file=$folder.'_admin/settings/count_id';
$count=implode("", file($count_file));
$file = fopen ($count_file,"w+");
fputs ( $file, ($count+1));
fclose ($file);

//Запись в базу
$query=mysqli_query($link,"insert into for_users value ('$id','$login','$pass_1','$im','$fam','$otch','$mail','$birth','$sex','$country','$sity','$phone','$bisines','$icq','$web','$skype','$status','$type','$money','$date')");

//Запись в историю
$str_date=date("Y.m.d H:i");
$result2=mysqli_query($link,"insert into for_schethistory value ('$id','$str_date','+','0','Создание счета')");


echo('
<center><font style="color:#00B115"><b>'.$im.' '.$fam.', Поздравляем! Ваша учетная запись ('.$login.') успешно активирована!</b></font>
<br><br>
Вы зарегистрированы в системе как <b>"Индивидуальный пользователь"</b>. Для входа используйте ваши E-mail и Пароль.
<br><br>
По вопросам регистрации со статусом "Корпоративный пользователь" обращайтесь к администрации сайта.
</center>
');

}
else
{
echo('<b>Возникшие ошибки:</b><br><br>');
if($err[1]<>0){echo('Пользователь с логином <b>'.$login.'</b> уже существует<br><br>');}
if($err[2]<>0){echo('Указанные пароли не совпадают<br><br>');}
if($err[3]<>0){echo('E-mail указан не правильно<br><br>');}
if($err[4]<>0){echo('Номер на картинке указан не верно<br><br>');}
if($err[5]<>0){echo('Вы не соласились с правилами сайта<br><br>');}
echo('<input type="button" class="but" value="Повторить регистрацию" onClick="self.location.href='.$kov.'?step=0'.$kov.'">');
}
?>