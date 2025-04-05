<?php
 //connecting to DB
        include('_admin/sql/mysql.php');
        include('_admin/_adminfiles/statlogs/stat.php');
        $link = mysqli_connect($host,$user,$pass);
        mysqli_select_db($link,$db);
        return mysqli_query($link,"update for_users_corporat
                            set reports='10',
                            money='100'
                            where login='user1'");

?>
