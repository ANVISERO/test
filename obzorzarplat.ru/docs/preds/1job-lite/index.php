<?php
if (isset($_GET['order_id']) && !empty($_GET['order_id'])) {
    $tit = implode("", file('_vars/title.txt'));
    $key = implode("", file('_vars/key.txt'));
    $des = implode("", file('_vars/des.txt'));
    //$title_raz=implode("", file('_vars/zag.txt'));
    $title_raz = 'Ёкспресс отчет о заработной плате';
    $folder=implode("", file('_vars/folder.txt'));
    $temp=implode("", file('_vars/temp.txt'));
    $css=$folder.'_css/templet/'.$temp.'/css.css';

    $content='_vars/ya_content.php';

    include($folder.'_admin/sql/mysql.php');
    include($folder.'_admin/_adminfiles/statlogs/stat.php');
    include($folder.'_admin/templet/'.$temp.'/cont.txt');

} else {
    $tit = implode("", file('_vars/title.txt'));
    $key = implode("", file('_vars/key.txt'));
    $des = implode("", file('_vars/des.txt'));
    $title_raz=implode("", file('_vars/zag.txt'));
    $folder=implode("", file('_vars/folder.txt'));
    $temp=implode("", file('_vars/temp.txt'));
    $css=$folder.'_css/templet/'.$temp.'/css.css';
    $content='_vars/content.php';
    include($folder.'_admin/sql/mysql.php');
    include($folder.'_admin/_adminfiles/statlogs/stat.php');
    include($folder.'_admin/templet/'.$temp.'/cont.txt');
}
?>