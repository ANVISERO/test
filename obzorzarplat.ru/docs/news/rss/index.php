<?php
header("Content-Type: text/xml; charset=windows-1251");
$folder="../../";
include("../../_admin/classes/RSS.class.php");

$rss = new RSS();
echo $rss->GetFeed();
?>
