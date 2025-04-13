<?php
$folder='../../';
include($folder.'application/sql/mysql.php');

include($folder.'application/moduls/login_corporative/functions.php');
logout();
header ( "Location: /login/" );
?>