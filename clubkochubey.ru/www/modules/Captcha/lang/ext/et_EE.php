<?php
$lang['msg_changes'] = 'Muudatused salvestatud';
$lang['friendlyname'] = 'Captcha ';
$lang['postinstall'] = 'Captcha moodul paigaldatud edukalt.';
$lang['postuninstall'] = 'Captcha moodul eemaldatud edukalt.';
$lang['really_uninstall'] = 'Oled sa kindel, et soovid eemaldada Captcha mooduli? Teised moodulid v&otilde;ivad sellest kasu saada.';
$lang['uninstalled'] = 'Moodul eemaldatud';
$lang['installed'] = 'Moodul versiooniga %s paigaldatud.';
$lang['upgraded'] = 'Moodul uuendatud versiooniks %s.';
$lang['moddescription'] = 'V&otilde;imaldab teistel moodulitel captcha toetust kasutada.';
$lang['error'] = 'Viga!';
$lang['err_no_gd_support'] = 'Sinu PHP paigaldusel ei ole GD toetust';
$lang['err_no_jpg_support'] = 'Sinu GD teegil ei ole JPG toetust';
$lang['err_no_freetype_support'] = 'Sinu GD teegil ei ole FreeType toetust';
$lang['admindescription'] = 'Captcha seaded';
$lang['accessdenied'] = 'Ligip&auml;&auml;s piiratud. Palun kontrolli oma &otilde;iguseid.';
$lang['title_general'] = '&Uuml;ldised';
$lang['title_cache'] = 'Puhver';
$lang['legend_pear'] = 'PEAR Captcha';
$lang['label_enable_pear'] = 'Enable PEAR Text/Captcha (must be installed, see the Captcha module help)';
$lang['legend_active_lib'] = 'Active library';
$lang['label_captchalib_select'] = 'Captcha Library to use';
$lang['msg_active_lib_changed'] = 'Active library changed to %s';
$lang['msg_no_changes'] = 'Muudatusi ei ole';
$lang['msg_pear_enabled'] = 'Enabled PEAR Text/Captcha';
$lang['msg_pear_disabled'] = 'Disabled PEAR Text/Captcha';
$lang['msg_pear_disable_while_selected'] = 'PEAR Captcha cannot be disabled while it is being used. <br />Please select another Captcha library to use before disabling PEAR Captcha.';
$lang['msg_pear_unavailable'] = 'PEAR Text/Captcha is not available on this system, check the Captcha module help';
$lang['legend_cache'] = 'Puhver';
$lang['label_clear_cache'] = 'Kustuta k&otilde;ik pildid puhvri kataloogist';
$lang['msg_cache_overview'] = 'Pildifailide arv puhvri kataloogis: %s';
$lang['cache_directory'] = 'Puhvri kataloog';
$lang['msg_deleted_cache'] = 'Kustutatud %s pildifaili puhvri kataloogist';
$lang['msg_deleted_cache_single'] = 'Kustutatud 1 pildifail puhvri kataloogist';
$lang['legend_fonts'] = 'Fondid';
$lang['label_font_path'] = 'Fondi tee';
$lang['available_fonts'] = 'Saadava fondid';
$lang['restore'] = 'Taasta vaikimisi v&auml;&auml;rtusteks';
$lang['msg_restored_defaults'] = 'Taastatud vaikimisi v&auml;&auml;rtused';
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
<a href="http://viewsvn.cmsmadesimple.org/listing.php?repname=comments" target="_blank">Comments</a><br />
<a href="http://viewsvn.cmsmadesimple.org/listing.php?repname=frontendusers" target="_blank">FrontEndUsers</a><br />
<a href="http://viewsvn.cmsmadesimple.org/listing.php?repname=gastbuch" target="_blank">Guestbook</a><br />
<a href="http://viewsvn.cmsmadesimple.org/listing.php?repname=questions" target="_blank">Questions</a><br />
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
$lang['utma'] = '156861353.3215545266732019000.1241091787.1254409301.1254415743.144';
$lang['utmz'] = '156861353.1253888638.132.27.utmcsr=forum.cmsmadesimple.org|utmccn=(referral)|utmcmd=referral|utmcct=/index.php/topic,37360.0.html';
$lang['qca'] = '1240683615-58409973-79915303';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353.1.10.1254415743';
?>