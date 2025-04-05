<?

//Модуль закрытой страницы
function getip()
{
  if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"),"unknown"))
    $ip = getenv("HTTP_CLIENT_IP");

  elseif (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
    $ip = getenv("HTTP_X_FORWARDED_FOR");

  elseif (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
    $ip = getenv("REMOTE_ADDR");

  elseif (!empty($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
    $ip = $_SERVER['REMOTE_ADDR'];
  
  else
    $ip = "unknown";
  return($ip);
}

$lock = implode("", file('_vars/lock.txt'));
if((isset($lock)) and ($lock<>0))
	{
	$user_ip=getip();
	$today_date=date("Y-m-d");
	$link = mysqli_connect($host,$user,$pass);
	mysqli_select_db($link,$db);
	
	$user_login=$user_pass='';
	if(isset($_POST['login'])){$user_login=$_POST['login'];}
	if(isset($_POST['pass'])){$user_pass=$_POST['pass'];}	
	
	$test_user_col = mysqli_num_rows(mysqli_query($link,"select ip from for_user_logout where ip='$user_ip' and date='$today_date' and tarif='$lock'"));
	$test_user_cal2 = mysqli_num_rows(mysqli_query($link,"select ip from for_user_logout where login='$user_login' and pass='$user_pass' and tarif='$lock'"));
	
		
		
		if(($test_user_col==0) and ($test_user_cal2==0)){$temp='user_logout';}
		if($test_user_cal2<>0)
		{
		mysqli_query($link,"update for_user_logout SET `ip` = '$user_ip', `date` = '$today_date' where `login`='$user_login' and `pass`='$user_pass'");
		}
	}
	

//Конец модуль закрытой страницы

?>