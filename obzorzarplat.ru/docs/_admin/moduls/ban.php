<?
if (isset($_COOKIE['count'])){
echo("<font style='color:#fff;'>�� �� ���� �������� ".$_COOKIE['count']."-� ���.</font><br>");

//***********������ ip ��� ������, ������� �������� �������� ������ 3 ���
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