<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
/*
$col_clients=mysqli_result(mysqli_query($link,"select COUNT(*) from for_clients"),0,0);
$client_random_num=rand(1,$col_clients);

$client_q=mysqli_query($link,"select * from for_clients where id=$client_random_num");
// вот чудеса
*/

$client_q=mysqli_query($link,"select * from for_clients WHERE active = 1 ORDER BY RAND() LIMIT 1") or die(mysql_error());


while($client=mysqli_fetch_array($client_q)){
  $client_title=$client["title"];
  //$client_opis=$client["opis"];
  $client_logo=$client["logo"];
}
?>

<a href="/clients"><img src="/_img/<?php echo $client_logo;?>" width="150" border="0"></a>
<br><br>
<b><?php //echo $client_title;?></b>