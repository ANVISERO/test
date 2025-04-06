<?php
$tit = implode("", file('_vars/title.txt'));
$key = implode("", file('_vars/key.txt'));
$des = implode("", file('_vars/des.txt'));
$title_raz=implode("", file('_vars/zag.txt'));
$folder="../../";
$css=$folder.'_css/business.css';
$content='_vars/content.php';
include($folder.'application/sql/mysql.php');

include($folder.'application/moduls/login_corporative/functions.php');
checkLogin('1 6 7', $link);

include($folder.'application/layouts/business.php');
?>