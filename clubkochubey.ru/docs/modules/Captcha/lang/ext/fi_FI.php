<?php
$lang['friendlyname'] = 'Captcha';
$lang['postinstall'] = 'Captcha-moduuli asennettu onnistuneesti. Tarkista ett&auml; web-palvelimella on kirjoitusoikeus images/capthcas-hakemistoon captcha-moduulin hakemistossa!';
$lang['postuninstall'] = 'Captcha-moduulin asennus poistettu';
$lang['really_uninstall'] = 'Haluatko varmasti poistaa captcha-moduulin, muut moduulit saattavat k&auml;ytt&auml;&auml; t&auml;t&auml; modulia';
$lang['uninstalled'] = 'Moduulin asennus poistettu';
$lang['installed'] = 'Moduulin versio %s asennettu';
$lang['upgraded'] = 'Moduuli p&auml;ivitetty versioon %s';
$lang['moddescription'] = 'Tarjoaa captcha-palvelun muille moduuleille';
$lang['error'] = 'Virhe!';
$lang['err_no_gd_support'] = 'Palvelimen PHP-asennus ei sis&auml;ll&auml; GD-tukea';
$lang['err_no_jpg_support'] = 'Palvelimen GD-asennus ei sis&auml;ll&auml; JPG-tukea';
$lang['err_no_freetype_support'] = 'Palvelimen GD-asennus ei sis&auml;ll&auml; FreeType-tukea';
$lang['admindescription'] = 'Captcha-asetukset';
$lang['accessdenied'] = 'K&auml;ytt&ouml;oikeusvirhe!';
$lang['title_general'] = 'Yleinen';
$lang['title_cache'] = 'V&auml;limuisti';
$lang['legend_pear'] = 'PEAR Captcha';
$lang['label_enable_pear'] = 'Ot&auml; k&auml;ytt&ouml;&ouml;n PEAR teksti/Captcha (T&auml;ytyy olla asennettuna, katso captcha modulin helppi)';
$lang['legend_active_lib'] = 'Aktiivinen kirjasto';
$lang['label_captchalib_select'] = 'K&auml;ytett&auml;v&auml; Captcha-kirjasto';
$lang['msg_active_lib_changed'] = 'Aktiivinen kirjasto vaihdettu (%s)';
$lang['msg_no_changes'] = 'Ei muutoksia';
$lang['msg_pear_enabled'] = 'PEAR text / captcha otettu k&auml;ytt&ouml;&ouml;n';
$lang['msg_pear_disabled'] = 'PEAR text / captcha poistettu k&auml;yt&ouml;st&auml;';
$lang['msg_pear_disable_while_selected'] = 'PEAR Captcha ei voida poistaa sen ollessa k&auml;yt&ouml;ss&auml;. <br />Ole hyv&auml; ja valitse eri captcha kirjasto ennen PEAR captcha poistamista k&auml;yt&ouml;st&auml;';
$lang['msg_pear_unavailable'] = 'PEAR test / captcha ei ole k&auml;ytett&auml;viss&auml;, katso captcha modulin helppi)';
$lang['legend_cache'] = 'V&auml;limuisti';
$lang['label_clear_cache'] = 'Poista kaikki kuvat v&auml;limuistista';
$lang['msg_cache_overview'] = 'Kuvia v&auml;limuistissa: %s';
$lang['cache_directory'] = 'V&auml;limuistikansio';
$lang['msg_deleted_cache'] = 'Poistettu %s kuvaa v&auml;limuistikansiosta';
$lang['msg_deleted_cache_single'] = 'Poistettu yksi kuva v&auml;limuistikansiosta';
$lang['legend_fonts'] = 'Fontit';
$lang['label_font_path'] = 'Fonttien polku';
$lang['available_fonts'] = 'K&auml;ytett&auml;viss&auml; olevat fontit';
$lang['restore'] = 'Restore to defaults';
$lang['msg_restored_defaults'] = 'Restored values to defaults';
$lang['changelog'] = '<ul>
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
</ul>';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>Enables captcha support for use in other modules.
See <a href=&quot;http://www.wikipedia.org/wiki/Captcha&quot;>http://www.wikipedia.org/wiki/Captcha</a> for more information about Captcha challenge-response tests.
</p>
<p>
<strong>Your PHP version must have GD installed with support for JPEGs and TrueType fonts</strong>. For more information, see <a href=&quot;http://www.php.net/image/&quot;>PHP Image Functions</a>.<br />
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
<a href=&quot;http://viewsvn.cmsmadesimple.org/viewsvn?rev=60&amp;root=comments&amp;view=rev&quot; target=&quot;_blank&quot;>Comments</a><br />
<a href=&quot;http://viewsvn.cmsmadesimple.org/viewsvn?rev=101&amp;root=frontendusers&amp;view=rev&quot; target=&quot;_blank&quot;>FrontEndUsers</a><br />
<a href=&quot;http://viewsvn.cmsmadesimple.org/viewsvn?rev=145&amp;root=gastbuch&amp;view=rev&quot; target=&quot;_blank&quot;>Guestbook</a><br />
<a href=&quot;http://viewsvn.cmsmadesimple.org/viewsvn?rev=40&amp;root=questions&amp;view=rev&quot; target=&quot;_blank&quot;>Questions</a><br />
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
</p>';
$lang['utma'] = '156861353.1959547193.1213865783.1213868095.1213870076.3';
$lang['utmc'] = '156861353';
$lang['utmz'] = '156861353.1213868095.2.2.utmccn=(organic)|utmcsr=google|utmctr=frontend users albums cmsms|utmcmd=organic';
$lang['utmb'] = '156861353';
?>