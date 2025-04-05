<?php
$key = implode("", file('_vars/key.txt'));
$des = implode("", file('_vars/des.txt'));
$folder=implode("", file('_vars/folder.txt'));
$content='_vars/content.txt';
include($folder.'_admin/sql/mysql.php');
include($folder.'_admin/_adminfiles/statlogs/stat.php');
include($content);
?>