<?php
$lang['msg_changes'] = 'Sparade &auml;ndringar';
$lang['friendlyname'] = 'Captcha (Robotf&auml;lla)';
$lang['postinstall'] = 'Captcha-modulen installerades utan problem. Se till att webbservern har skrivr&auml;ttigheter i  images/captchas-katalogen i Captcha-modulens mapp.';
$lang['postuninstall'] = 'Avinstallerade Captcha-modulen utan problem.';
$lang['really_uninstall'] = '&Auml;r du s&auml;ker p&aring; att di vill avinstallera Captcha-modulen? Andra moduler kanske drar nytta av den.';
$lang['uninstalled'] = 'Modulen avinstallerad.';
$lang['installed'] = 'Modul-version %s &auml;r installerad.';
$lang['upgraded'] = 'Modulen uppgraderad till version %s.';
$lang['moddescription'] = 'M&ouml;jligg&ouml;r att captcha anv&auml;nds till andra moduler.';
$lang['error'] = 'Fel!';
$lang['err_no_gd_support'] = 'Din PHP-installation har inte GD-support.';
$lang['err_no_jpg_support'] = 'Ditt GD-bilbliotek har inte st&ouml;d f&ouml;r JPG.';
$lang['err_no_freetype_support'] = 'Ditt GD-bibliotek har inte st&ouml;r f&ouml;r &#039;FreeType&#039;.';
$lang['admindescription'] = 'Captcha-inst&auml;llningar';
$lang['accessdenied'] = '&Aring;tkomst nekad. Kontrollera &aring;tkomst-inst&auml;llningarna.';
$lang['title_general'] = 'Allm&auml;nt';
$lang['title_cache'] = 'Cachen';
$lang['legend_pear'] = 'PEAR-Captcha';
$lang['label_enable_pear'] = 'Enable PEAR Text/Captcha (m&aring;ste vara installerat, se Captcha module-hj&auml;lp)';
$lang['legend_active_lib'] = 'Aktivt bibliotek';
$lang['label_captchalib_select'] = 'Captcha-bibliotek att anv&auml;nda';
$lang['msg_active_lib_changed'] = 'Aktivt bibliotek &auml;ndrat till %s';
$lang['msg_no_changes'] = 'Inga &auml;ndringar';
$lang['msg_pear_enabled'] = 'Aktivera PEAR Text/Captcha';
$lang['msg_pear_disabled'] = 'Avaktivera PEAR Text/Captcha';
$lang['msg_pear_disable_while_selected'] = 'PEAR Captcha kan inte avaktiveras n&auml;r det anv&auml;nds. <br />Anv&auml;nd ett annat Captcha-bibliotek att anv&auml;nda f&ouml;re du avaktiverar PEAR Captcha.';
$lang['msg_pear_unavailable'] = 'PEAR Text/Captcha &auml;r inte till&auml;ngligt p&aring; det h&auml;r systemet, l&auml;s i Captcha module help.';
$lang['legend_cache'] = 'Cachen';
$lang['label_clear_cache'] = 'Ta bort alla bilder i cache-katalogen';
$lang['msg_cache_overview'] = 'Antal bilder i cache-katalogen: %s';
$lang['cache_directory'] = 'Cache-katalog';
$lang['msg_deleted_cache'] = 'Tog bort %s bilder fr&aring;n cache-katalogen';
$lang['msg_deleted_cache_single'] = 'Tog bort 1 bild fr&aring;n cache-katalogen';
$lang['legend_fonts'] = 'Typsnitt';
$lang['label_font_path'] = 'Typsnitts-s&ouml;kv&auml;g';
$lang['available_fonts'] = 'Tillg&auml;ngliga typsnitt';
$lang['restore'] = '&Aring;terst&auml;ll till standard';
$lang['msg_restored_defaults'] = '&Aring;terst&auml;ll v&auml;rden till standard';
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
$lang['utma'] = '156861353.950238273729472100.1237140425.1241157231.1241160728.119';
$lang['utmz'] = '156861353.1241160728.119.8.utmccn=(referral)|utmcsr=forum.cmsmadesimple.org|utmcct=/index.php/topic,33295.msg157807.html|utmcmd=referral';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>