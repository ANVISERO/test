<?php
$tit = implode("", file('_vars/title.txt'));
$key = implode("", file('_vars/key.txt'));
$des = implode("", file('_vars/des.txt'));
$title_raz=implode("", file('_vars/zag.txt'));
$folder="../../../";
$content='_vars/content.php';
include($folder.'application/sql/mysql.php');

include($folder.'application/moduls/login_corporative/functions.php');
include($folder.'application/moduls/reports/funcs.php');

checkLogin('1 2 5', $link);

include($folder.'application/layouts/business.php');
?>