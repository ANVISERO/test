<?php

if(!isset($folder)){$folder='../../';}

$gl_fol=$folder.'_admin/settings/';

$host=implode("", file($gl_fol.'mysql_host'));
$db=implode("", file($gl_fol.'mysql_db'));
$user=implode("", file($gl_fol.'mysql_user'));
$pass=implode("", file($gl_fol.'mysql_pass'));

DEFINE ('DB_USER', $user);
  DEFINE ('DB_PASSWORD', $pass);
  DEFINE ('DB_HOST', $host);
  DEFINE ('DB_NAME', $db);

  // Make the connnection and then select the database.
  $dbc = @mysql_connect (DB_HOST, DB_USER, DB_PASSWORD) OR die ('Could not connect to MySQL: ' . mysql_error() );
  mysql_select_db (DB_NAME) OR die ('Could not select the database: ' . mysql_error() );


?>
