<?php
$url=$_SERVER['PHP_SELF'];
$url_abs=explode("/", $url);

echo('<a href="/">www.obzorzarplat.ru</a>');
foreach ($url_abs as $ukey => $uvalue) {
    echo(" - ".$uvalue);
}
?>