<?php
$lang['friendlyname'] = 'Captcha';
$lang['postinstall'] = 'A Captcha modult sikeresen telep&iacute;tett&uuml;k. Bizonyosodj meg r&oacute;la, hogy a webszerver rendelkezik &iacute;r&aacute;si joggal az images/captchas k&ouml;nyvt&aacute;rra a Captcha modul k&ouml;nyvt&aacute;rszerkezet&eacute;n bel&uuml;l';
$lang['postuninstall'] = 'Sikeresen elt&aacute;vol&iacute;tottuk a Captcha modult.';
$lang['really_uninstall'] = 'Biztosan elt&aacute;vol&iacute;tod a Captcha modult? Esetleg m&aacute;s modulok is haszn&aacute;lj&aacute;k...';
$lang['uninstalled'] = 'A modult elt&aacute;vol&iacute;tottuk.';
$lang['installed'] = 'A modulb&oacute;l a(z) %s verzi&oacute; van telep&iacute;tve.';
$lang['upgraded'] = 'A modult friss&iacute;tett&uuml;k a(z) %s verzi&oacute;ra.';
$lang['moddescription'] = 'Lehetőv&eacute; teszi m&aacute;s modulok sz&aacute;m&aacute;ra a Captcha szolg&aacute;ltat&aacute;sainak ig&eacute;nybe v&eacute;tel&eacute;t.';
$lang['error'] = 'Hiba!';
$lang['err_no_gd_support'] = 'Ebben a PHP-ban nincs el&eacute;rhető GD modul';
$lang['err_no_jpg_support'] = 'A GD k&ouml;nyvt&aacute;r nem rendelkezik jpeg t&aacute;mogat&aacute;ssal';
$lang['err_no_freetype_support'] = 'A GD k&ouml;nyvt&aacute;r nem rendelkezik FreeType t&aacute;mogat&aacute;ssal';
$lang['admindescription'] = 'Captcha be&aacute;ll&iacute;t&aacute;sok';
$lang['accessdenied'] = 'A hozz&aacute;f&eacute;r&eacute;s megtagadva. K&eacute;rlek, ellenőrizd a jogosults&aacute;gokat.';
$lang['title_general'] = '&Aacute;ltal&aacute;nos';
$lang['title_cache'] = 'Cache';
$lang['legend_pear'] = 'PEAR Captcha';
$lang['label_enable_pear'] = 'PEAR Text/Captcha enged&eacute;lyez&eacute;se (telep&iacute;tve kell lennie, l&aacute;sd a Captcha modul s&uacute;g&oacute;j&aacute;t)';
$lang['legend_active_lib'] = 'Akt&iacute;v k&ouml;nyvt&aacute;r';
$lang['label_captchalib_select'] = 'Haszn&aacute;land&oacute; Captcha k&ouml;nyvt&aacute;r';
$lang['msg_active_lib_changed'] = 'Az akt&iacute;v k&ouml;nyvt&aacute;r megv&aacute;ltozott erre: %s';
$lang['msg_no_changes'] = 'Nincs v&aacute;ltoz&aacute;s';
$lang['msg_pear_enabled'] = 'A PEAR Text/Captcha enged&eacute;lyezve van';
$lang['msg_pear_disabled'] = 'PEAR Text/Captcha letilt&aacute;sa';
$lang['msg_pear_disable_while_selected'] = 'A PEAR Captcha nem tilthat&oacute; le am&iacute;g haszn&aacute;latban van. <br />K&eacute;rlek, v&aacute;lassz m&aacute;sik Captcha k&ouml;nyvt&aacute;rat mielőtt letiltod a PEAR Captcha haszn&aacute;lat&aacute;t.';
$lang['msg_pear_unavailable'] = 'A PEAR Text/Captcha nem el&eacute;rhető ezen a rendszeren, n&eacute;zd meg a Captcha modul s&uacute;g&oacute;t tov&aacute;bbi inform&aacute;ci&oacute;&eacute;rt';
$lang['legend_cache'] = 'Cache';
$lang['label_clear_cache'] = 'A cache k&ouml;nyvt&aacute;r tartalm&aacute;nak t&ouml;rl&eacute;se';
$lang['msg_cache_overview'] = 'A cache k&ouml;nyvt&aacute;rban levő k&eacute;pek sz&aacute;ma: %s';
$lang['cache_directory'] = 'Cache k&ouml;nyvt&aacute;r';
$lang['msg_deleted_cache'] = 'Let&ouml;r&ouml;lt&uuml;nk %s k&eacute;pfile-t a cache k&ouml;nyvt&aacute;rb&oacute;l';
$lang['msg_deleted_cache_single'] = 'Let&ouml;r&ouml;lt&uuml;nk 1 k&eacute;pfile-t a cache k&ouml;nyvt&aacute;rb&oacute;l';
$lang['legend_fonts'] = 'Font-ok';
$lang['label_font_path'] = 'Font &uacute;tvonal';
$lang['available_fonts'] = 'El&eacute;rhető font-ok';
$lang['restore'] = 'Vissza&aacute;ll&iacute;t&aacute;s az alap&eacute;rtelmezett &eacute;rt&eacute;kekre';
$lang['msg_restored_defaults'] = 'Az alap&eacute;rtelmezett &eacute;rt&eacute;keket vissza&aacute;ll&iacute;tottuk';
$lang['changelog'] = '<ul><li>Version 0.1. 10 July 2006. Initial Release.</li></ul>';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>Enables captcha support for use in other modules.
See <a href=&quot;http://www.wikipedia.org/wiki/Captcha&quot;>http://www.wikipedia.org/wiki/Captcha</a> for more information about Captcha challenge-response tests.
</p>
<p>
You must have GD installed with support for JPEGs and TrueType fonts. For more information, see <a href=&quot;http://www.php.net/image/&quot;>PHP Image Functions</a>.<br />
</p>
<h3>How Do I Use It?</h3>
<p>
You don&#039;t. This module is not for use directly on a page, it is a tool to be used by other modules. If you are a module developer and want to use Captcha in you module:
</p>
<p>
To show a captcha image:
<pre>
// create a reference to a Captcha module object
$captcha = &amp;$this->getModuleInstance(&#039;Captcha&#039;); 
// show the captcha image
echo $captcha->getCaptcha();
</pre>
To check the user input:
<pre>
// create a reference to a Captcha module object
$captcha = &amp;$this->getModuleInstance(&#039;Captcha&#039;);
// check the user input (the checkCaptcha method will return TRUE if $input is correct, FALSE if $input is incorrect)
$validated = $captcha->checkCaptcha($input);
</pre>
</p>
<h3>PEAR Text/Captcha</h3>
<p>
This module can make use of PEAR&#039;s Text_CAPTCHA, which will have to be installed on the server.<br />
Text_CAPTCHA depends on two other PEAR packages, Image_Text and Text_Password. It uses Text_Password to generate the random phrase used in the CAPTCHA test and Image_Text to generate an image file with text in it.<br />
The process for installing Text_CAPTCHA at the command line is:<br />
<pre>
$ pear install Text_Password
$ pear install Image_Text
$ pear install --alldeps Text_CAPTCHA
</pre>
</p>
<h3>Webserver permissions</h3>
<p>
The webserver process must have write access on the Captcha image cache directory (the images/captchas directory inside the Captcha module filetree).
</p>
';
$lang['utma'] = '156861353.171847622.1175495376.1175863769.1176358586.8';
$lang['utmz'] = '156861353.1175495376.1.1.utmccn=(direct)|utmcsr=(direct)|utmcmd=(none)';
?>