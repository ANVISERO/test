<?
$tit = implode("", file('_vars/title.txt'));
$key = implode("", file('_vars/key.txt'));
$des = implode("", file('_vars/des.txt'));
$title_raz=implode("", file('_vars/zag.txt'));
$title_graf=implode("", file('_vars/zag_graf.txt'));
$folder=implode("", file('_vars/folder.txt'));
$temp=implode("", file('_vars/temp.txt'));
$css=$folder.'_admin/templet/'.$temp.'/css.css';
$content='_vars/content.txt';
$leftblock='/_admin/moduls/clients-random.php';
include($folder.'_admin/sql/mysql.php');

include($folder.'_admin/moduls/login_corporative/functions_test.php');
logout();
include($folder.'_admin/_adminfiles/statlogs/stat.php');
include($folder.'_admin/templet/'.$temp.'/cont.txt');
?>