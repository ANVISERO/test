<?php
$tit = "ОБЗОР ЗАРПЛАТ - Вход для клиентов";
$key = implode("", file('_vars/key.txt'));
$des = implode("", file('_vars/des.txt'));
$title_raz="Вход для клиентов";
$folder="../../";
include($folder.'application/sql/mysql.php');

include($folder.'application/moduls/login_corporative/functions.php');

$error="";

$login=mysqli_real_escape_string($link,$_POST["username"]); //login
$psw=mysqli_real_escape_string($link,$_POST["password"]); //password
$ip=$_SERVER["REMOTE_ADDR"]; //user's ip

		if ( $_POST['username'] != '' && $_POST['password'] != '' )
		{
			$query = mysqli_query($link,"SELECT id FROM for_users_corporat WHERE login ='$login' AND password = '".md5($psw)."'");

			if (mysqli_num_rows( $query )==1)
			{

while($row=mysqli_fetch_array($query))
        {
            //$user_number=md5(genpass(intval($row["id"]),100));
            $user_number=genpass(10,100);
            $date=date('Y-m-d h:m:s');

            //first time visited
            $visited=mysqli_result(mysqli_query($link,"SELECT visited FROM for_users_corporat WHERE id='".$row["id"]."'"),0,0);
            if($visited=='0'){
                $date_start=date('Y-m-d');
                $months=intval(mysqli_result(mysqli_query($link,"SELECT months_of_use FROM for_users_corporat WHERE id='".$row["id"]."'"),0,0));
                $date_finish=date('Y-m-d',strtotime(date("Y-m-d", strtotime($date_start)) . "+".$months." month"));
                mysqli_query($link,"UPDATE for_users_corporat SET date_start='$date_start', date_finish='$date_finish', visited='1'
                        WHERE id='".$row["id"]."'");
            }

            mysqli_query($link,"DELETE FROM for_users_corporat_login WHERE user_id='".$row["id"]."'");
            mysqli_query($link,"INSERT INTO for_users_corporat_login(user_id,session_id,date) Values('".$row["id"]."','".$user_number."','".$date."')");
            set_login_sessions ( $user_number, ( $_POST['remember'] ) ? TRUE : FALSE );
            header ( "Location: /");
        }
			}else {
				$error = 'Вы неверно указали пару <em>имя</em> и <em>пароль</em> при входе.';
			}

    }
		else {
			$error = 'Пожалуйста, заполните все поля.';
		}

include($folder.'application/layouts/business-login.php');
?>