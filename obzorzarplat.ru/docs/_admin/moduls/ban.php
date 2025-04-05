<?
if (isset($_COOKIE['count'])){
echo("<font style='color:#fff;'>¬ы на этой странице ".$_COOKIE['count']."-й раз.</font><br>");

//***********запись ip тех юзеров, которые посетили страницу больше 3 раз
if($_COOKIE['count']==3){
//$url="http://obzorzarplat.ru/";
//header ("Location: $url");

$user_ip=$_SERVER["REMOTE_ADDR"]; 
$ban_date=date("Y-m-d");
$q = mysqli_query($link,"insert into base_usersban(ip, date) values ('$user_ip','$ban_date')");
}

}else{
echo("<font style='color:#fff;'>no</font><br>");
}

?>