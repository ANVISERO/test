<?php
$user_id=mysqli_result(mysqli_query($link,"SELECT id from for_users_corporat where id = ".$_SESSION['user_id']. " AND password = '".$_SESSION['psw']."' "),0,0);

$company=mysqli_real_escape_string($link,$_POST["company"]);
$email=mysqli_real_escape_string($link,$_POST["email"]);
$name=mysqli_real_escape_string($link,$_POST["name"]);

mysqli_query($link,"UPDATE for_users_corporat
            SET name='$name', company='$company', email='$email'
            WHERE id='$user_id'");

?>
