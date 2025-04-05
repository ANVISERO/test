<?

$user_ip=$_SERVER["REMOTE_ADDR"]; 
$ban_date=date("Y-m-d");

$count1=mysqli_result(mysqli_query($link,"select count from for_count where ip='$user_ip'"),0,0);

if(empty($count1)){
  $count1=1;
  mysqli_query($link,"insert into for_count (ip,count,date) values('$user_ip','$count1','$ban_date')");
}else{
  if($count1<3){
    $count1++;
    mysqli_query($link,"update for_count set count='$count1' where ip='$user_ip'");
  }else{
    $url="http://obzorzarplat.ru/";
    //header("Status: 200");
header("Expires: 0");
    //Header("Location: $url");
  }
}

?>