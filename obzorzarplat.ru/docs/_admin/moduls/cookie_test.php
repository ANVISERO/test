<?

//************установка cookie
if (isset($_COOKIE["count"]))
{
	$howmuch = $_COOKIE["count"];
}
else
{
	$howmuch = 0;
};


$howmuch++;
setcookie('count',$howmuch,time()+600);
//echo("<font style='color:#fff;'>Вы на этой странице ".$_COOKIE['count']."-й раз.</font><br>");
?>