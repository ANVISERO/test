<?php
$lang['friendlyname'] = 'Captcha';
$lang['postinstall'] = 'Captcha modulis sėkmingai įdiegtas. Įsitikinkite, kad serveris turi teise ra&scaron;yti į  images/captcha direktoriją, Captcha modulio direktorijoje.';
$lang['postuninstall'] = 'Modulis sėkmingai pa&scaron;alintas';
$lang['really_uninstall'] = 'Ar tikrai norite pa&scaron;alinti Captcha modulį? Kiti moduliai gali jį naudoti.
';
$lang['uninstalled'] = 'Modulis pa&scaron;alintas';
$lang['installed'] = 'Modulio %s versija įdiegta.';
$lang['upgraded'] = 'Modulio versija atnaujinta į %s.';
$lang['moddescription'] = 'Įjungimas leidžia &scaron;į modulį naudoti kitiems moduliams.';
$lang['error'] = 'Klaida!';
$lang['err_no_gd_support'] = 'Your PHP installation does not have GD support';
$lang['err_no_jpg_support'] = 'Your GD library does not have JPG support';
$lang['err_no_freetype_support'] = 'Your GD library does not have FreeType support';
$lang['admindescription'] = 'Captcha nuostatos';
$lang['accessdenied'] = 'Uždrausta. Pasitikrinkite savo leidimus.';
$lang['title_general'] = 'Bendrai';
$lang['title_cache'] = 'Cache';
$lang['legend_pear'] = 'PEAR Captcha';
$lang['label_enable_pear'] = 'Enable PEAR Text/Captcha (must be installed, see the Captcha module help)';
$lang['legend_active_lib'] = 'Aktyvi biblioteka';
$lang['label_captchalib_select'] = 'Captcha Library to use';
$lang['msg_active_lib_changed'] = 'Active library changed to %s';
$lang['msg_no_changes'] = 'Jokių pakeitimų';
$lang['msg_pear_enabled'] = 'Enabled PEAR Text/Captcha';
$lang['msg_pear_disabled'] = 'Disabled PEAR Text/Captcha';
$lang['msg_pear_disable_while_selected'] = 'PEAR Captcha cannot be disabled while it is being used. <br />Please select another Captcha library to use before disabling PEAR Captcha.';
$lang['msg_pear_unavailable'] = 'PEAR Text/Captcha is not available on this system, check the Captcha module help';
$lang['legend_cache'] = 'Laikinoji atmintis';
$lang['label_clear_cache'] = 'I&scaron;trinti visus paveikslėlius i&scaron; laikinosios atminties';
$lang['msg_cache_overview'] = 'Paveiksėlių skaičius laikinosios atmities direktorijoje: %s';
$lang['cache_directory'] = 'Laikinosios atminties direktorija';
$lang['msg_deleted_cache'] = 'I&scaron;trinti %s paveikelėlius i&scaron; laikinosios atminties';
$lang['msg_deleted_cache_single'] = 'I&scaron;trinti 1 paveikelėlį i&scaron; laikinosios atminties';
$lang['legend_fonts'] = '&Scaron;riftai';
$lang['label_font_path'] = '&Scaron;rifto kelias';
$lang['available_fonts'] = 'Galimi &scaron;rifta';
$lang['restore'] = 'Restore to defaults';
$lang['msg_restored_defaults'] = 'Restored values to defaults';
$lang['changelog'] = '<ul><li>Version 0.1. 10 July 2006. Initial Release.</li></ul>';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>Enables captcha support for use in other modules.
See <a href="http://www.wikipedia.org/wiki/Captcha">http://www.wikipedia.org/wiki/Captcha</a> for more information about Captcha challenge-response tests.
</p>
<p>
You must have GD installed with support for JPEGs and TrueType fonts. For more information, see <a href="http://www.php.net/image/">PHP Image Functions</a>.<br />
</p>
<h3>How Do I Use It?</h3>
<p>
This module is not for use directly on a page, it is a tool to be used by other modules. If you are a module developer and want to use Captcha in your module:
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
$lang['utmz'] = '156861353.1217483792.13.12.utmccn=(referral)|utmcsr=forum.cmsmadesimple.org|utmcct=/index.php/topic,22566.0.html|utmcmd=referral';
$lang['utma'] = '156861353.3824783600689563600.1212128768.1213255610.1217483792.13';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>