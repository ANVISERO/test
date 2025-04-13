<?php
$lang['friendlyname'] = 'Captcha';
$lang['postinstall'] = 'Captcha modulet blev installeret. S&oslash;rg for at webserveren har skrive rettigheder til images/captchas mappen indeni Captcha modulets filstruktur';
$lang['postuninstall'] = 'Captcha modulet blev afinstalleret.';
$lang['really_uninstall'] = 'Er du sikker p&aring; at du vil afinstallere Captcha modulet? Andre moduler anvender det muligvis.';
$lang['uninstalled'] = 'Modulet er afinstalleret';
$lang['installed'] = 'Modul version %s er installeret.';
$lang['upgraded'] = 'Modul opgraderet til version %s.';
$lang['moddescription'] = 'Muligg&oslash;r captcha support i andre moduler';
$lang['error'] = 'Fejl!';
$lang['err_no_gd_support'] = 'Din PHP installation underst&oslash;tter ikke GD';
$lang['err_no_jpg_support'] = 'Dit GD bibliotek underst&oslash;tter ikke JPG';
$lang['err_no_freetype_support'] = 'Dit GD bibliotek underst&oslash;tter ikke FreeType';
$lang['admindescription'] = 'Captcha indstillinger';
$lang['accessdenied'] = 'Adgang n&aelig;gtet. Check dine tilladelser.';
$lang['title_general'] = 'Generelt';
$lang['title_cache'] = 'Cache (et depot hvor edb-ting samles)';
$lang['legend_pear'] = 'PEAR Captcha';
$lang['label_enable_pear'] = 'Sl&aring; PEAR Text/Captcha til (skal v&aelig;re installeret, se hj&aelig;lpen til Captcha-modulet)';
$lang['legend_active_lib'] = 'Aktivt bibliotek';
$lang['label_captchalib_select'] = 'Captcha bibliotek, der skal bruges';
$lang['msg_active_lib_changed'] = 'Aktivt bibliotek &aelig;ndret til %s';
$lang['msg_no_changes'] = 'Ingen &aelig;ndringer';
$lang['msg_pear_enabled'] = 'PEAR Text/Captcha blev sl&aring;et til';
$lang['msg_pear_disabled'] = 'PEAR Text/Captcha blev sl&aring;et fra';
$lang['msg_pear_disable_while_selected'] = 'PEAR Captcha kan ikke sl&aring;s fra mens det er i brug. <br />V&aelig;lg venligst et andet Captcha bibliotek, der skal bruges f&oslash;r du sl&aring;r PEAR Captcha fra.';
$lang['msg_pear_unavailable'] = 'PEAR Text/Captcha er ikke tilg&aelig;ngeligt p&aring; dette system, check Captcha modulets hj&aelig;lpefunktion';
$lang['legend_cache'] = 'Cache (et depot hvor edb-ting samles)';
$lang['label_clear_cache'] = 'Slet alle billeder i cache biblioteket';
$lang['msg_cache_overview'] = 'Antal af billedfiler i cache biblioteket: %s';
$lang['cache_directory'] = 'Cache bibliotek';
$lang['msg_deleted_cache'] = 'Slettet %s billedfiler fra cache biblioteket';
$lang['msg_deleted_cache_single'] = 'Slettet 1 billedfil fra cache biblioteket';
$lang['legend_fonts'] = 'Skrifttyper';
$lang['label_font_path'] = 'Sti til skrifttyper';
$lang['available_fonts'] = 'Tilg&aelig;ngelige skrifttyper';
$lang['restore'] = 'Gendan standardinstillingerne';
$lang['msg_restored_defaults'] = 'Standardv&aelig;rdier gendannet';
$lang['changelog'] = '<ul>
	<li>
		<p><b>Version 0.3</b></p>
		<ul>
			<li>hn_captcha er udskiftet med hn_captcha_X1, som har en funktion der indsamler &quot;affald&quot;</li>
			<li>Unders&oslash;ttelse PhpCaptcha-bibliotek tilf&oslash;jet</li>
			<li>Indstillinger, der er specifikke for Captcha-biblioteket, kan nu h&aring;ndteres fra modulets administrationssider</li>
			<li>Captcha-biblioteker indl&aelig;ses automatisk fra de tilg&aelig;ngelige klasse-filer</li>
			<li>Captcha-biblioteker indl&aelig;ses f&oslash;rst n&aring;r de skal bruges</li>
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
$lang['utma'] = '156861353.1094114404.1206635603.1216588040.1216590749.34';
$lang['utmz'] = '156861353.1216588040.33.28.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=cms made simple';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>