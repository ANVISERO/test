<?php
$lang['project'] = 'Captcha ';
$lang['msg_changes'] = 'Endringene ble lagret';
$lang['friendlyname'] = 'Captcha ';
$lang['postinstall'] = 'Captcha modulen er installert.';
$lang['postuninstall'] = 'Avinstallerte Captcha modulen';
$lang['really_uninstall'] = 'Er du sikker p&aring; du vil avinstallere Captcha modulen? Kanskje andre moduler benytter den. ';
$lang['uninstalled'] = 'Modulen er avinstallert.';
$lang['installed'] = 'Modul versjon %s installert.';
$lang['upgraded'] = 'Modul oppgradert til versjon %s.';
$lang['moddescription'] = 'Aktiverer captcha st&oslash;tte for bruk for andre moduler.';
$lang['error'] = 'Feil!';
$lang['err_no_gd_support'] = 'Din PHP installasjon har ikke GD st&oslash;tte';
$lang['err_no_jpg_support'] = 'Ditt GD bibliotek har ikke JPG st&oslash;tte';
$lang['err_no_freetype_support'] = 'Ditt GD bibliotek har ikke FreeType st&oslash;tte';
$lang['admindescription'] = 'Captcha innstillinger';
$lang['accessdenied'] = 'Tilgang nektet. Vennligst sjekk dine rettigheter.';
$lang['title_general'] = 'Generelt';
$lang['title_cache'] = 'Cache ';
$lang['legend_pear'] = 'PEAR Captcha ';
$lang['label_enable_pear'] = 'Aktiver PEAR Tekst/Captcha (m&aring; installeres, se Captcha modul hjelp)';
$lang['legend_active_lib'] = 'Aktivt bibliotek';
$lang['label_captchalib_select'] = 'Captcha Bibliotek &aring; bruke';
$lang['msg_active_lib_changed'] = 'Aktivt bibliotek endret til %s';
$lang['msg_no_changes'] = 'Ingen endringer';
$lang['msg_pear_enabled'] = 'Aktiver PEAR Tekst/Captcha';
$lang['msg_pear_disabled'] = 'Deaktiverte PEAR Tekst/Captcha';
$lang['msg_pear_disable_while_selected'] = 'PEAR Captcha kan ikke deaktiveres mens den er i bruk. <br />Vennligst velg &aring; benytte et annet Captcha bibliotek f&oslash;r deaktivering av PEAR Captcha.';
$lang['msg_pear_unavailable'] = 'PEAR Tekst/Captcha er ikke tilgjengelig p&aring; dette systemet, se etter i Captcha modul hjelpen';
$lang['legend_cache'] = 'Cache ';
$lang['label_clear_cache'] = 'Slett alle bilder i cache katalogen';
$lang['msg_cache_overview'] = 'Antall bildefiler cache katalogen: %s';
$lang['cache_directory'] = 'Cache katalog';
$lang['msg_deleted_cache'] = 'Slettet %s bildefiler fra cache katalogen';
$lang['msg_deleted_cache_single'] = 'Slettet 1 bildefil fra cache katalogen';
$lang['legend_fonts'] = 'Fonter';
$lang['label_font_path'] = 'Font sti';
$lang['available_fonts'] = 'Tilgjengelige fonter';
$lang['restore'] = 'Tilbakestill til standard';
$lang['msg_restored_defaults'] = 'Tilbakestilte verdier til standard';
$lang['changelog'] = '
<ul>
<li>
  <p><b>Version 0.4.2<b> - (calguy1000)</p>
  <ul>
    <li>Fixes a minor notice or two due to changes in PHP behaviour.</li>
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
</ul>';
$lang['help'] = '<h3>Hva gj&oslash;r denne Modulen?</h3>
<p>Tillater captcha st&oslash;tte for bruk i andre moduler.
Se <a href="http://www.wikipedia.org/wiki/Captcha">http://www.wikipedia.org/wiki/Captcha</a> for mer informasjon om Captcha utfordring-respons tester.
</p>
<p>
<strong>Din PHP versjon m&aring; ha GD installert med st&oslash;tte for JPEGs og TrueType fonts</strong>. For mer informasjon, se <a href="http://www.php.net/image/">PHP Image Functions</a>.<br />
</p>

<h3>Hvordan bruker jeg den?</h3>
<p>
Denne modulen er ikke for bruk direkte p&aring; en side, det er et verkt&oslash;y som kan brukes av andre moduler. Dersom du er en modulutvikler og &oslash;nsker &aring; bruke Captcha i din modul:
</p>
<p>
For &aring; vise et captcha bilde:
<pre>
// create a reference to a Captcha module object
$captcha = &amp;$this->getModuleInstance(&#039;Captcha&#039;); 
// show the captcha image
echo $captcha->getCaptcha();
</pre>

For &aring; sjekke bruker input:
<pre>
// create a reference to a Captcha module object
$captcha = &amp;$this->getModuleInstance(&#039;Captcha&#039;);
// check the user input (the checkCaptcha method will return TRUE if $input is correct, FALSE if $input is incorrect)
$validated = $captcha->checkCaptcha($input);
</pre>
</p>
<p>
Noen implementasjonseksempler:<br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=60&amp;root=comments&amp;view=rev" target="_blank">Comments</a><br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=101&amp;root=frontendusers&amp;view=rev" target="_blank">FrontEndUsers</a><br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=145&amp;root=gastbuch&amp;view=rev" target="_blank">Guestbook</a><br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=40&amp;root=questions&amp;view=rev" target="_blank">Questions</a><br />
</p>

<h3>PEAR Text/Captcha</h3>
<p>
Denne modulen kan anvende PEAR&#039;s Text_CAPTCHA, som da m&aring; v&aelig;re installert p&aring; serveren.<br />
Text_CAPTCHA avhenger av to andre PEAR pakker, Image_Text og Text_Password. Den bruker Text_Password for &aring; generere den tilfeldige frasen som brukes i CAPTCHA tester og Image_Text for &aring; generere en bildefil av teksten tekst.<br />
Prosessen for &aring; installere Text_CAPTCHA med kommandolinje er:<br />
<pre>
$ pear install Text_Password
$ pear install Image_Text
$ pear install --alldeps Text_CAPTCHA
</pre>
</p>

<h3>Webserver tillatelser</h3>
<p>
Webserver prosessen m&aring; ha skrivetillatelse for Captcha image cache katalogen ( images/captchas katalogen i Captcha modul katalogen).<br />
P&aring; noen servere (avhengig av server innstillinger) m&aring; kanskje umask i CMS Made Simple Global Settings endres;  fors&oslash;k &aring; endre den fra 022 til 002 dersom captcha bilder opprettes, men ikke vises.
</p>';
$lang['utmz'] = '156861353.1279922282.3039.70.utmcsr=forum.cmsmadesimple.org|utmccn=(referral)|utmcmd=referral|utmcct=/index.php';
$lang['utma'] = '156861353.179052623084110100.1210423577.1280091346.1280174240.3055';
$lang['qca'] = '1210971690-27308073-81952832';
$lang['utmb'] = '156861353.1.10.1280174240';
$lang['utmc'] = '156861353';
?>