<?php
$lang['project'] = 'Captcha ';
$lang['msg_changes'] = 'Gespeicherte &Auml;nderungen';
$lang['friendlyname'] = 'Captcha-Modul';
$lang['postinstall'] = 'Das Captcha-Modul wurde erfolgreich installiert. Stellen Sie sicher, dass der Webserver die Schreibberechtigung f&uuml;r das Verzeichnis images/captchas innerhalb des Captcha-Modulverzeichnisses hat.';
$lang['postuninstall'] = 'Das Captcha-Modul wurde erfolgreich deinstalliert.';
$lang['really_uninstall'] = 'Wollen Sie das Captcha-Modul wirklich deinstallieren? Eventuell wird es von anderen Modulen genutzt.';
$lang['uninstalled'] = 'Modul deinstalliert.';
$lang['installed'] = 'Modulversion %s installiert.';
$lang['upgraded'] = 'Modul auf Version %s aktualisiert.';
$lang['moddescription'] = 'Aktiviert die Captcha-Unterst&uuml;tzung zur Verwendung durch andere Module.';
$lang['error'] = 'Fehler!';
$lang['err_no_gd_support'] = 'Die GD-Bibliothek wird von Ihrer PHP-Installation nicht unterst&uuml;tzt .';
$lang['err_no_jpg_support'] = 'JPEG wird von Ihrer GD-Bibliothek nicht unterst&uuml;tzt .';
$lang['err_no_freetype_support'] = 'FreeType wird von Ihrer GD-Bibliothek nicht unterst&uuml;tzt .';
$lang['admindescription'] = 'Captcha-Einstellungen';
$lang['accessdenied'] = 'Zugriff verweigert. Bitte pr&uuml;fen Sie Ihre Berechtigungen.';
$lang['title_general'] = 'Allgemein';
$lang['title_cache'] = 'Zwischenspeicher';
$lang['legend_pear'] = 'PEAR-Captcha';
$lang['label_enable_pear'] = 'PEAR-Text/Captcha aktivieren (muss installiert sein, siehe Captcha-Modul-Hilfe)';
$lang['legend_active_lib'] = 'Aktive Bibliothek';
$lang['label_captchalib_select'] = 'Zu verwendende Captcha-Bibliothek';
$lang['msg_active_lib_changed'] = 'Aktive Bibliothek auf %s ge&auml;ndert';
$lang['msg_no_changes'] = 'Keine &Auml;nderungen';
$lang['msg_pear_enabled'] = 'PEAR-Text/Captcha aktiviert';
$lang['msg_pear_disabled'] = 'PEAR-Text/Captcha deaktiviert';
$lang['msg_pear_disable_while_selected'] = 'PEAR-Captcha kann nicht deaktiviert werden, solange es in Benutzung ist. <br />Bitte w&auml;hlen Sie eine andere Captcha-Bibliothek, bevor Sie PEAR-Captcha deaktivieren.';
$lang['msg_pear_unavailable'] = 'PEAR-Text/Captcha ist auf diesem System nicht verf&uuml;gbar. Weitere Informationen erhalten Sie in der Hilfe dieses Moduls.';
$lang['legend_cache'] = 'Zwischenspeicher';
$lang['label_clear_cache'] = 'Alle Bilder aus dem Modul-Zwischenspeicher l&ouml;schen';
$lang['msg_cache_overview'] = 'Anzahl der Bilddateien im Zwischenspeicher: %s';
$lang['cache_directory'] = 'Zwischenspeicher-Verzeichnis';
$lang['msg_deleted_cache'] = '%s Bilddateien aus dem Zwischenspeicher-Verzeichnis gel&ouml;scht';
$lang['msg_deleted_cache_single'] = 'Eine Bilddatei aus dem Zwischenspeicher-Verzeichnis gel&ouml;scht';
$lang['legend_fonts'] = 'Schriften';
$lang['label_font_path'] = 'Schriftpfad';
$lang['available_fonts'] = 'Verf&uuml;gbare Schriften';
$lang['restore'] = 'Auf den Modulstandard zur&uuml;cksetzen';
$lang['msg_restored_defaults'] = 'Die Einstellungen wurden auf den Modulstandard zur&uuml;ckgesetzt.';
$lang['changelog'] = '<ul>
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
$lang['help'] = '<h3>Was macht dieses Modul?</h3>
<p>Aktiviert Captcha-Support zur Verwendung in anderen Modulen.
Weitere Informationen &uuml;ber Captcha finden Sie unter <a href="http://www.wikipedia.org/wiki/Captcha">http://www.wikipedia.org/wiki/Captcha</a>.
</p>
<p>
<strong>Ihre PHP-Installation muss die GD-Bibliothek mit Unterst&uuml;tzung f&uuml;r JPEGs und TrueType-Fonts installiert haben.</strong> Weitere Informationen dazu finden Sie unter <a href="http://www.php.net/image/">PHP Grafik-Funktionen</a>.<br />
</p>
<h3>Wie wird es eingesetzt?</h3>
<p>
Dieses Modul ist nicht f&uuml;r den direkten Einsatz auf einer Seite gedacht. Es ist eher ein Werkzeug f&uuml;r andere Module. Wenn Sie selbst Module programmieren und Captcha in Ihrem Modul einsetzen m&ouml;chten:
</p>
<p>
Ein Captcha-Bild anzeigen:
<pre>
// Referenz auf ein Captcha-Modulobjekt erzeugen
$captcha = &amp;$this->getModuleInstance(&#039;Captcha&#039;); 
// das Captcha-Bild anzeigen
echo $captcha->getCaptcha();
</pre>
Die Benutzereingabe &uuml;berpr&uuml;fen:
<pre>
// Referenz auf ein Captcha-Modulobjekt erzeugen
$captcha = &amp;$this->getModuleInstance(&#039;Captcha&#039;);
// &uuml;berpr&uuml;ft die Benutzereingabe (die Methode checkCaptcha gibt TRUE zur&uuml;ck, wenn $input richtig ist und FALSE, wenn $input falsch ist)
$validated = $captcha->checkCaptcha($input);
</pre>
</p>
<p>
Einige Implementationsbeispiele finden Sie hier:<br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=60&amp;root=comments&amp;view=rev" target="_blank">Comments-Modul</a><br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=101&amp;root=frontendusers&amp;view=rev" target="_blank">FrontEndUsers-Modul</a><br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=145&amp;root=gastbuch&amp;view=rev" target="_blank">Guestbook-Modul</a><br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=40&amp;root=questions&amp;view=rev" target="_blank">Questions-Modul</a><br />
</p>
<h3>PEAR-Text/Captcha</h3>
<p>
Dieses Modul kann PEAR&#039;s Text_CAPTCHA verwenden, was jedoch auf dem Server installiert sein muss.<br />
Text_CAPTCHA ist von zwei anderen PEAR-Paketen abh&auml;ngig, Image_Text und Text_Password. Text_Password wird eingesetzt, um einen Zufallstext aus Buchstaben und Zahlen zu erzeugen, der dann im CAPTCHA-Test abgefragt wird. Mit Image_Text wird dann eine Bilddatei erzeugt, welches diesen Text enth&auml;lt.<br />
Um Text_CAPTCHA zu installieren, m&uuml;ssen Sie auf der Kommandozeile folgendes eingeben:<br />
<pre>
$ pear install Text_Password
$ pear install Image_Text
$ pear install --alldeps Text_CAPTCHA
</pre>
</p>
<h3>Berechtigungen des Webservers</h3>
<p>
Der Webserver-Prozess muss Schreibzugriff auf das Verzeichnis des Captcha-Zwischenspeichers haben (Verzeichnis images/captchas im Captcha-Modulverzeichnis).<br />
Auf einigen Servern (in Abh&auml;ngigkeit von deren Einstellungen) muss der umask-Wert in den Globalen Einstellungen von CMS made simple ge&auml;ndert werden. Wenn die Captcha-Bilder zwar erzeugt, aber nicht angezeigt werden, versuchen Sie,, diesen Wert von 022 auf 002 zu &auml;ndern.
</p>';
$lang['utma'] = '156861353.230875029.1281005888.1281005888.1281005888.1';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
$lang['utmz'] = '156861353.1281005888.1.1.utmccn=(referral)|utmcsr=dev.cmsmadesimple.org|utmcct=/|utmcmd=referral';
?>