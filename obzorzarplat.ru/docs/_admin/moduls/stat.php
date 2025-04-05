<?
$url_folder=$_SERVER['PHP_SELF'];
$user_ip=$_SERVER['REMOTE_ADDR'];
$root_url=implode("", file('_vars/folder.txt'));
$date=date("Y-m-d");
$stat_file_name=$root_url.'_admin/_adminfiles/statlogs/'.$date.'.log';
$time=date("H:i");
$text=$time.'#'.$user_ip.'#'.$url_folder;
$file = fopen ("$stat_file_name","a+");
fputs ( $file, "$text\n");
fclose ($file);
?>