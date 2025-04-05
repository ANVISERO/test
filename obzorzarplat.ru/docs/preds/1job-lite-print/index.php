<?php
$tit = implode("", file('_vars/title.txt'));
$key = implode("", file('_vars/key.txt'));
$des = implode("", file('_vars/des.txt'));
$title_raz=implode("", file('_vars/zag.txt'));
$title_graf=implode("", file('_vars/zag_graf.txt'));
$folder=implode("", file('_vars/folder.txt'));
$content=implode("",file('_vars/content.txt'));
include($folder.'_admin/sql/mysql.php');
include($folder.'_admin/_adminfiles/statlogs/stat.php');
echo($content);
?>