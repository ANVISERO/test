<?
//Проверка поплнения с WEBMONEY
if((isset($_POST['LMI_PAYMENT_AMOUNT']))and(isset($_POST['LMI_PAYMENT_NO'])))
{
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$add_sum=$_POST['LMI_PAYMENT_AMOUNT'];
$add_user_id=$_POST['LMI_PAYMENT_NO'];


$user_money=mysqli_result(mysqli_query($link,"select * from for_users where id='$add_user_id'"),0,18);
$new_sum=$user_money+$add_sum;
$result=mysqli_query($link,"update for_users SET `money` = '$new_sum' where `id`='$add_user_id'");
//Запись в историю
$date=date("Y.m.d H:i");
$result2=mysqli_query($link,"insert into for_schethistory value ('$add_user_id','$date','+','$add_sum','WebMoney, пополнение счета')");

}
//Конец проверки

if((isset($_POST['login']))and(isset($_POST['password'])))
{
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

$user_login=$_POST['login'];
$user_password=$_POST['password'];
$user_type=$_POST['type_enter'];
if($user_type=='индивидуальный'){$type=0;}
if($user_type=='корпоративный'){$type=1;}

$test_user=mysqli_query($link,"select * from for_users where log='$user_login' and pas='$user_password' and type='$type'");
$test_col=mysqli_num_rows($test_user);

if($test_col==0){include($folder.'_admin/moduls/users-avtor-eng.php');}
if($test_col<>0){
$kov="'";
$user_id=mysqli_result($test_user,0,0);

$user_ip=$_SERVER['REMOTE_ADDR'];
$date=date("Y-m-d");

mkdir($folder.'_admin/elements/users/enter/'.$date);
$fullpath=$folder.'_admin/elements/users/enter/'.$date.'/'.$user_ip.'.txt';
$file = fopen ("$fullpath","w+");
fputs ( $file, $user_id);
fclose ($file);
echo('<script>self.location.href='.$kov.'/eng/users/'.$kov.'</script>');
}

}
else
{
$user_ip=$_SERVER['REMOTE_ADDR'];
$date=date("Y-m-d");
if(!file_exists($folder.'_admin/elements/users/enter/'.$date.'/'.$user_ip.'.txt'))
{include($folder.'_admin/moduls/users-avtor-eng.php');}

if(file_exists($folder.'_admin/elements/users/enter/'.$date.'/'.$user_ip.'.txt'))
{include($folder.'_admin/moduls/users-room-eng.php');}

}

?>