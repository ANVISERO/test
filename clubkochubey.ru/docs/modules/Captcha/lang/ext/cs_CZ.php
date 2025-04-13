<?php
$lang['project'] = 'Captcha';
$lang['msg_changes'] = 'Uložen&eacute; změny';
$lang['friendlyname'] = 'Captcha';
$lang['postinstall'] = 'The Captcha modul byl &uacute;spě&scaron;ně nainstalov&aacute;n. Pros&iacute;m ujistěte se, že webserver může zapisovat do adres&aacute;ře images/captchas v adres&aacute;ři modulu Captcha';
$lang['postuninstall'] = 'Modul Captcha byl &uacute;spě&scaron;ně nainstalov&aacute;n.';
$lang['really_uninstall'] = 'Opravdu chcete odinstalovat modul Captcha? Ostatn&iacute; moduly ho mohou pr&aacute;vě použ&iacute;vat.';
$lang['uninstalled'] = 'Modul odinstalov&aacute;n.';
$lang['installed'] = 'Verze %s modulu byla nainstalov&aacute;na.';
$lang['upgraded'] = 'Modul upgradov&aacute;n na verzi %s.';
$lang['moddescription'] = 'Umožn&iacute; užit&iacute; podpory Captcha v ostatn&iacute;ch modulech.';
$lang['error'] = 'Chyba!';
$lang['err_no_gd_support'] = 'Instalace va&scaron;eho PHP nepodporuje GD';
$lang['err_no_jpg_support'] = 'Va&scaron;e GD library nepodporuje JPG';
$lang['err_no_freetype_support'] = 'Va&scaron;e GD library nepodporuje FreeType';
$lang['admindescription'] = 'Nastaven&iacute; Captcha';
$lang['accessdenied'] = 'Př&iacute;stup zak&aacute;z&aacute;n. Pros&iacute;m zkontrolujte sv&aacute; opr&aacute;vněn&iacute;.';
$lang['title_general'] = 'Obecn&eacute;';
$lang['title_cache'] = 'Cache';
$lang['legend_pear'] = 'PEAR Captcha';
$lang['label_enable_pear'] = 'Umožn&iacute; užit&iacute; PEAR Text/Captcha (mus&iacute; b&yacute;t nainstalov&aacute;no, viz help modulu Captcha)';
$lang['legend_active_lib'] = 'Activn&iacute; knihovna';
$lang['label_captchalib_select'] = 'Použ&iacute;t knihovnu CAPTCHA';
$lang['msg_active_lib_changed'] = 'Activn&iacute; knihovna změněna na %s';
$lang['msg_no_changes'] = 'Beze změn';
$lang['msg_pear_enabled'] = 'Povoleno PEAR Text/Captcha';
$lang['msg_pear_disabled'] = 'Zak&aacute;z&aacute;no PEAR Text/Captcha';
$lang['msg_pear_disable_while_selected'] = 'PEAR Captcha nemůže b&yacute;t vypnuta, když je použ&iacute;v&aacute;na. <br />Pros&iacute;m vyberte jinou CAPTCHA knihovnu, než ji vypnete.';
$lang['msg_pear_unavailable'] = 'PEAR Text/Captcha nen&iacute; k m&aacute;n&iacute; na tomto syst&eacute;mu, zkontrolujte help modulu Captcha';
$lang['legend_cache'] = 'Cache';
$lang['label_clear_cache'] = 'Smazat v&scaron;echny obr&aacute;zky v adrs&aacute;ři cache';
$lang['msg_cache_overview'] = 'Počet obrazov&yacute;ch souborů v adres&aacute;ři cache: %s';
$lang['cache_directory'] = 'Adres&aacute;ř cache';
$lang['msg_deleted_cache'] = 'Smz&aacute;n %s obrazov&yacute;ch souborů z cache adrs&aacute;ře';
$lang['msg_deleted_cache_single'] = 'Smz&aacute;n 1 obrazov&yacute; soubor z cache adrs&aacute;ře';
$lang['legend_fonts'] = 'Fonty';
$lang['label_font_path'] = 'Cesta k fontům';
$lang['available_fonts'] = 'Dostupn&eacute; fonty';
$lang['restore'] = 'Nastavit v&yacute;choz&iacute; hodnoty';
$lang['msg_restored_defaults'] = 'Nastaveny v&yacute;choz&iacute; hodnoty';
$lang['changelog'] = '<ul>
	<li>
		<p><b>Version 0.3</b></p>
		<ul>
			<li>Switched from hn_captcha to hn_captcha_X1 which has garbage collection</li>
			<li>Added support for the PhpCaptcha library</li>
			<li>Captcha library specific settings can now be managed from the module admin</li>
			<li>Captcha libraries are autoloaded from the available class files</li>
			<li>Captcha libraries are not loaded untill needed</li>
		</ul>
	</li>
	<li>
		<p><b>Version 0.2.1</b></p>
		<ul>
			<li>Fixes use of the PHP parse_url function in a way that only works on PHP5</li>
		</ul>
	</li>
	<li>
		<p><b>Version 0.2</b></p>
		<ul>
			<li>Fixes for issue with captcha image not showing up on windows servers in some cases.</li>
			<li>Changes to make sure the captcha image is showed correctly when hn_captcha is used and $_SERVER[\&#039;DOCUMENT_ROOT\&#039;] is not set correctly.</li>
			<li>Removed support for the b2evo library. It is derived from hn_captcha and doesn\&#039;t offer any extra functionality.</li>
			<li>Use an unmodified version of the hn_captcha library (only kept some spelling fixes).</li>
		</ul>
	</li>
	<li>
		<p><b>Version 0.1.1</b></p>
		<ul>
			<li>Prevent a warning that occurs if allow_call_time_pass_reference is set to false in php.ini.</li>
		</ul>
	</li>
	<li>
		<p><b>Version 0.1</b></p>
		<ul>
			<li>Initial Release.</li>
		</ul>
	</li>
</ul>';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>Enables captcha support for use in other modules.
See <a href=\"http://www.wikipedia.org/wiki/Captcha\">http://www.wikipedia.org/wiki/Captcha</a> for more information about Captcha challenge-response tests.
</p>
<p>
<strong>Your PHP version must have GD installed with support for JPEGs and TrueType fonts</strong>. For more information, see <a href=\"http://www.php.net/image/\">PHP Image Functions</a>.<br />
</p>
<h3>How Do I Use It?</h3>
<p>
This module is not for use directly on a page, it is a tool to be used by other modules. If you are a module developer and want to use Captcha in your module:
</p>
<p>
To show a captcha image:
<pre>
// create a reference to a Captcha module object
$captcha = &amp;$this->getModuleInstance(\&#039;Captcha\&#039;); 
// show the captcha image
echo $captcha->getCaptcha();
</pre>
To check the user input:
<pre>
// create a reference to a Captcha module object
$captcha = &amp;$this->getModuleInstance(\&#039;Captcha\&#039;);
// check the user input (the checkCaptcha method will return TRUE if $input is correct, FALSE if $input is incorrect)
$validated = $captcha->checkCaptcha($input);
</pre>
</p>
<p>
Some implementation examples:<br />
<a href=\"http://viewsvn.cmsmadesimple.org/viewsvn?rev=60&amp;root=comments&amp;view=rev\" target=\"_blank\">Comments</a><br />
<a href=\"http://viewsvn.cmsmadesimple.org/viewsvn?rev=101&amp;root=frontendusers&amp;view=rev\" target=\"_blank\">FrontEndUsers</a><br />
<a href=\"http://viewsvn.cmsmadesimple.org/viewsvn?rev=145&amp;root=gastbuch&amp;view=rev\" target=\"_blank\">Guestbook</a><br />
<a href=\"http://viewsvn.cmsmadesimple.org/viewsvn?rev=40&amp;root=questions&amp;view=rev\" target=\"_blank\">Questions</a><br />
</p>
<h3>PEAR Text/Captcha</h3>
<p>
This module can make use of PEAR\&#039;s Text_CAPTCHA, which will have to be installed on the server.<br />
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
The webserver process must have write access on the Captcha image cache directory (the images/captchas directory inside the Captcha module filetree).<br />
On some servers (depending on server settings) the umask in the CMS Made Simple Global Settings may have to be changed; try changing it from 022 to 002 if the captcha images are created but not shown.
</p>';
$lang['qca'] = 'P0-390133276-1275213321958';
$lang['utma'] = '156861353.71659362.1275223702.1283283063.1283286338.18';
$lang['utmz'] = '156861353.1283272682.16.13.utmccn=(referral)|utmcsr=forum.cmsmadesimple.org|utmcct=/index.php/topic,20346.0.html|utmcmd=referral';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>