<?php
//require("funcs.php");
$string = isset($_REQUEST['str']) ? urldecode($_REQUEST['str']) : 0;
//$string = mcrypt_ecb(MCRYPT_DES, "123", $string, MCRYPT_DECRYPT);
header("Content-Type: image/png");
$im = @imagecreate(95, 18) or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 255, 255, 255);
$text_color = imagecolorallocate($im, 0, 0, 0);
imagestring($im, 5, 20, 2,  $string, $text_color);
imagepng($im);
imagedestroy($im);
?>