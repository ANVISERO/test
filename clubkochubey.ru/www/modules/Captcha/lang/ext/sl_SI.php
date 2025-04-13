<?php
$lang['msg_changes'] = 'Nastavitve shranjene';
$lang['friendlyname'] = 'Captcha';
$lang['postinstall'] = 'Captcha modul je bil uspe&scaron;no name&scaron;čen.';
$lang['postuninstall'] = 'Captcha modul je bil uspe&scaron;no odstranjen';
$lang['really_uninstall'] = 'Ste prepričani, da želite odstraniti Captcha modul? Ostali moduli ga morda uporabljajo.';
$lang['uninstalled'] = 'Modul odstranjen.';
$lang['installed'] = 'Name&scaron;čen modul različice %s.';
$lang['upgraded'] = 'Modul nadgrajen na različico %s.';
$lang['moddescription'] = 'Omogoči podporo za Captcha slike v ostalih modulih.';
$lang['error'] = 'Napaka!';
$lang['err_no_gd_support'] = 'Va&scaron;a PHP različica nima GD podpore';
$lang['err_no_jpg_support'] = 'Va&scaron;a GD knjižnica nima podpore za JPG datoteke';
$lang['err_no_freetype_support'] = 'Va&scaron;a GD knjižnica nima podpore za FreeType pisave';
$lang['admindescription'] = 'Captcha nastavitve';
$lang['accessdenied'] = 'Dostop zavrnjen. Prosimo, preverite va&scaron;e pravice.';
$lang['title_general'] = 'Splo&scaron;no';
$lang['title_cache'] = 'Predpomnilnik';
$lang['legend_pear'] = 'PEAR Captcha';
$lang['label_enable_pear'] = 'Omogoči PEAR Text/Captcha (mora biti name&scaron;čen - preverite pomoč za Captcha modul)';
$lang['legend_active_lib'] = 'Aktivna knjižnica';
$lang['label_captchalib_select'] = 'Captcha knjižnica za uporabo';
$lang['msg_active_lib_changed'] = 'Aktivna knjižnica spremenjena v %s';
$lang['msg_no_changes'] = 'Brez sprememb';
$lang['msg_pear_enabled'] = 'Omogočen PEAR Text/Captcha';
$lang['msg_pear_disabled'] = 'Onemogočen PEAR Text/Captcha';
$lang['msg_pear_disable_while_selected'] = 'PEAR Captcha ne morete onemogočiti, ko je v uporabi.<br />Prosimo, izberite drugo Captcha knjižnico, preden onemogočite PEAR Captcha.disabling PEAR Captcha.';
$lang['msg_pear_unavailable'] = 'PEAR Text/Captcha ni na voljo na tem sistemu. Prosimo, preverite pomoč modula.';
$lang['legend_cache'] = 'Predpomnilnik';
$lang['label_clear_cache'] = 'Izbri&scaron;i vse slike v predpomnilniku';
$lang['msg_cache_overview'] = '&Scaron;tevilo slik v predpomnilniku (cache mapa): %s';
$lang['cache_directory'] = 'Mapa za predpomnilnik (cache)';
$lang['msg_deleted_cache'] = 'Izbrisanih %s slik iz predpomnilnika';
$lang['msg_deleted_cache_single'] = 'Izbrisana 1 slika iz predpomnilnika';
$lang['legend_fonts'] = 'Pisave';
$lang['label_font_path'] = 'Pot do pisav (fontov)';
$lang['available_fonts'] = 'Pisave na voljo';
$lang['restore'] = 'Ponastavi na privzeto';
$lang['msg_restored_defaults'] = 'Ponastavljeno na privzeto';
$lang['changelog'] = '<ul>
	<li>
		<p><b>Version 0.3.2</b></p>
		<ul>
			<li>Updated hn_captcha to version 1.5.0</li>
			<li>Added a simple GD based captcha that doesn&#039;t use Freetype</li>
		</ul>
	</li>
	<li>
		<p><b>Version 0.3.1</b> (calguy1000)</p>
		<ul>
                        <li>Now use the &#039;Modify Site Preferences&#039; Permission</p>
                        <li>Changed the cache directory to tmp/cache</li>
		</ul>
	</li>
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
			<li>Changes to make sure the captcha image is showed correctly when hn_captcha is used and $_SERVER[&#039;DOCUMENT_ROOT&#039;] is not set correctly.</li>
			<li>Removed support for the b2evo library. It is derived from hn_captcha and doesn&#039;t offer any extra functionality.</li>
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
</ul>
';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>Enables captcha support for use in other modules.
See <a href="http://www.wikipedia.org/wiki/Captcha">http://www.wikipedia.org/wiki/Captcha</a> for more information about Captcha challenge-response tests.
</p>
<p>
<strong>Your PHP version must have GD installed with support for JPEGs and TrueType fonts</strong>. For more information, see <a href="http://www.php.net/image/">PHP Image Functions</a>.<br />
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
<p>
Some implementation examples:<br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=60&amp;root=comments&amp;view=rev" target="_blank">Comments</a><br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=101&amp;root=frontendusers&amp;view=rev" target="_blank">FrontEndUsers</a><br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=145&amp;root=gastbuch&amp;view=rev" target="_blank">Guestbook</a><br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=40&amp;root=questions&amp;view=rev" target="_blank">Questions</a><br />
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
The webserver process must have write access on the Captcha image cache directory (the images/captchas directory inside the Captcha module filetree).<br />
On some servers (depending on server settings) the umask in the CMS Made Simple Global Settings may have to be changed; try changing it from 022 to 002 if the captcha images are created but not shown.
</p>
';
$lang['utma'] = '156861353.982997797.1241023107.1241025774.1241028275.3';
$lang['utmc'] = '156861353';
$lang['utmz'] = '156861353.1241023107.1.1.utmccn=(direct)|utmcsr=(direct)|utmcmd=(none)';
$lang['utmb'] = '156861353';
?>