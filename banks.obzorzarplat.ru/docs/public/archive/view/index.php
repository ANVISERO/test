<?php
$tit = implode("", file('_vars/title.txt'));
$folder='../../../';
include($folder.'application/sql/mysql.php');
include($folder.'application/moduls/login_corporative/functions.php');
checkLogin('1 7', $link);

$title_raz='';

include($folder.'application/layouts/business.php');
?>