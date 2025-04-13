<?php
$lang['project'] = 'Captcha ';
$lang['msg_changes'] = 'Instellingen Opgeslagen';
$lang['friendlyname'] = 'Captcha ';
$lang['postinstall'] = 'De Captcha module is ge&iuml;nstalleerd.';
$lang['postuninstall'] = 'De Captcha-module is gede&iuml;nstalleerd.';
$lang['really_uninstall'] = 'Weet u zeker dat u de Captcha module wilt de&iuml;nstalleren? Het kan zijn dat andere modules er gebruik van maken.';
$lang['uninstalled'] = 'Module gede&iuml;nstalleerd.';
$lang['installed'] = 'Moduleversie %s ge&iuml;nstalleerd.';
$lang['upgraded'] = 'Module opgewaardeerd naar versie %s.';
$lang['moddescription'] = 'Maakt het gebruik van captcha-identificatie door andere modules mogelijk.';
$lang['error'] = 'Fout!';
$lang['err_no_gd_support'] = 'Deze PHP-installatie heeft geen GD-support';
$lang['err_no_jpg_support'] = 'De GD-bibliotheek heeft geen JPG-support';
$lang['err_no_freetype_support'] = 'De GD-bibliotheek heeft geen FreeType-support';
$lang['admindescription'] = 'Captcha-instellingen';
$lang['accessdenied'] = 'Toegang geweigerd. Controleer of u over voldoende rechten beschikt.';
$lang['title_general'] = 'Algemeen';
$lang['title_cache'] = 'Buffer';
$lang['legend_pear'] = 'PEAR Captcha ';
$lang['label_enable_pear'] = 'PEAR Tekst/Captcha inschakelen (moet ge&iuml;nstalleerd zijn, zie de Captcha-modulehulp)';
$lang['legend_active_lib'] = 'Actieve bibliotheek';
$lang['label_captchalib_select'] = 'Gebruikte captcha-bibliotheek';
$lang['msg_active_lib_changed'] = 'Actieve bibliotheek gewijzigd naar %s';
$lang['msg_no_changes'] = 'Geen wijzigingen';
$lang['msg_pear_enabled'] = 'PEAR Tekst/Captcha inschakelen';
$lang['msg_pear_disabled'] = 'PEAR Tekst/Captcha uitschakelen';
$lang['msg_pear_disable_while_selected'] = 'PEAR Captcha kan niet uitgeschakeld worden terwijl het wordt gebruikt. <br />Selecteer eerste een andere Captcha-bibliotheek, voordat u PEAR Captcha uitschakelt.';
$lang['msg_pear_unavailable'] = 'PEAR Text/Captcha is niet beschikbaar op dit systeem, zie de Captcha-modulehulp';
$lang['legend_cache'] = 'Buffer';
$lang['label_clear_cache'] = 'Verwijder alle plaatjes in de buffer map';
$lang['msg_cache_overview'] = 'Aantal afbeeldingen in de buffermap: %s';
$lang['cache_directory'] = 'Buffermap';
$lang['msg_deleted_cache'] = '%s afbeeldingen verwijderd uit de buffer map';
$lang['msg_deleted_cache_single'] = 'E&eacute;n afbeelding verwijderd uit de buffer map';
$lang['legend_fonts'] = 'Lettertypen';
$lang['label_font_path'] = 'Lettertype pad';
$lang['available_fonts'] = 'Beschikbare lettertypen';
$lang['restore'] = 'Terug naar standaardwaarden';
$lang['msg_restored_defaults'] = 'Standaardwaarden hersteld';
$lang['changelog'] = '<ul>
<li>
  <p><b>Version 0.4.2<b> - (calguy1000)</p>
  <ul>
    <li>Fixes a minor notice.</li>
  </ul>
</li>
<li>
  <p><b>Version 0.4.1<b> - (calguy1000)</p>
  <ul>
    <li>Fixes minor validation issues, and irritating bugs.</li>
  </ul>
</li>

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
See <a href="http://nl.wikipedia.org/wiki/Captcha">http://nl.wikipedia.org/wiki/Captcha</a> for more information about Captcha challenge-response tests.
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
$lang['utma'] = '156861353.1738896039.1278840000.1280305238.1280321680.54';
$lang['utmz'] = '156861353.1280218995.48.5.utmcsr=forum.cmsmadesimple.org|utmccn=(referral)|utmcmd=referral|utmcct=/index.php/board,13.0.html';
$lang['qca'] = 'P0-854387043-1278840000917';
$lang['utmb'] = '156861353.6.10.1280321680';
$lang['utmc'] = '156861353';
?>