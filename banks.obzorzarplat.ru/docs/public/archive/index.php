<?php
$tit = implode("", file('_vars/title.txt'));
$title_raz=implode("", file('_vars/zag.txt'));
$folder='../../';
include($folder.'application/sql/mysql.php');
include($folder.'application/moduls/login_corporative/functions.php');

checkLogin('1 7', $link);

include($folder.'application/layouts/business.php');
?>