<?php

if (!isset($gCms)) exit;
global $config;
$db = &$gCms->db;

// Get number of comments
$q = "SELECT * FROM ".cms_db_prefix()."module_comments 
WHERE  page_id =".$params['pageid']."
AND module_name='".$params['modulename']."' AND active='1'";
$dbresult = $db->Execute( $q );
if( !$dbresult ) { echo 'DB error: '. $db->ErrorMsg()."<br/>"; }
$num_rows = $dbresult->RecordCount();
echo $num_rows;

?>