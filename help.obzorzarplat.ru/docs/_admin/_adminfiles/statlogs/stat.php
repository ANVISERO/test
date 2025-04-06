<?php
$stat_url=$HTTP_SERVER_VARS['PHP_SELF'];
$stat_ip=$HTTP_SERVER_VARS['REMOTE_ADDR'];
$date=date("Y-m-d");

$stat_file_name=$folder.'_admin/_adminfiles/statlogs/'.$date.'.log';
$stat_time=date("H:i");
$stat_text=$stat_time.'#'.$stat_ip.'#'.$stat_url;
$file = fopen ("$stat_file_name","a+");
fputs ($file, "$stat_text\n");
fclose ($file);
?>