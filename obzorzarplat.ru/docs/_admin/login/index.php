<?php 
$tit = implode("", file('_vars/title.txt'));
$key = implode("", file('_vars/key.txt'));
$des = implode("", file('_vars/des.txt'));
$title_raz=implode("", file('_vars/zag.txt'));
$folder=implode("", file('_vars/folder.txt'));
$temp=implode("", file('_vars/temp.txt'));
$css=$folder.'_css/templet/'.$temp.'/css.css';
$content='_vars/content.txt';
include($folder.'_admin/sql/mysql.php');

  $link = mysqli_connect($host,$user,$pass);
  mysqli_select_db($link,$db);

include($folder.'_admin/moduls/login_corporative/functions_admin.php');

if(!$link){echo("oops!");}

$login=$_POST["username"]; //login
$psw=mysqli_real_escape_string($link,$_POST["password"]); //password
$ip=$_SERVER["REMOTE_ADDR"]; //user's ip

		if ( $_POST['username'] != '' && $_POST['password'] != '' )
		{
			$query = mysqli_query($link,"SELECT * FROM for_users_corporat WHERE login ='$login' AND password = '".md5($psw)."' AND levelaccess='1'");

			if (mysqli_num_rows( $query )==1)
			{

while($row=mysqli_fetch_array($query))
        {
            set_login_sessions ( $row["id"], $_POST["password"], ( $_POST['remember'] ) ? TRUE : FALSE );
            header ( "Location: /_admin");

        }
			}else {		
				$error = 'Вы неверно указали пару <em>имя</em> и <em>пароль</em> при входе.';	
			}

    }
		else {
			$error = 'Пожалуйста, заполните все поля.';
		}

include($folder.'_admin/_adminfiles/statlogs/stat.php');
include($folder.'_admin/templet/'.$temp.'/cont.txt');
?>