<?php
$lang['msg_changes'] = 'Salva i cambiamenti';
$lang['friendlyname'] = 'Captcha';
$lang['postinstall'] = 'Il modulo captcha &egrave; stato installato con successo.';
$lang['postuninstall'] = 'Disinstallazione del modulo Captcha avvenuta con successo.';
$lang['really_uninstall'] = 'Siete sicuri di voler disinstallare il modulo Captcha? Potrebbe essere in uso da parte di altri moduli.';
$lang['uninstalled'] = 'Modulo disinstallato.';
$lang['installed'] = 'Versione del modulo %s installata.';
$lang['upgraded'] = 'Modulo aggiornato alla versione %s.';
$lang['moddescription'] = 'Abilita il supporto captcha per altri moduli.';
$lang['error'] = 'Errore!';
$lang['err_no_gd_support'] = 'La vostra installazione di PHP non ha il supporto per la libreria GD';
$lang['err_no_jpg_support'] = 'La vostra libreria GD non ha il supporto per il formato JPG';
$lang['err_no_freetype_support'] = 'La vostra libreria GD non ha il supporto per il formato FreeType';
$lang['admindescription'] = 'Impostazioni Captcha';
$lang['accessdenied'] = 'Accesso negato. Si prega di verificare i vostri permissi.';
$lang['title_general'] = 'Generale';
$lang['title_cache'] = 'Cache';
$lang['legend_pear'] = 'PEAR Text/Captcha';
$lang['label_enable_pear'] = 'Abilita PEAR Text/Captcha (deve essere installato, consultate l&#039;aiuto del modulo Captcha)';
$lang['legend_active_lib'] = 'Libreria attiva';
$lang['label_captchalib_select'] = 'Libreria Captcha da utilizzare';
$lang['msg_active_lib_changed'] = 'Libreria attiva cambiata per %s';
$lang['msg_no_changes'] = 'Nessun cambiamento';
$lang['msg_pear_enabled'] = 'Abilita PEAR Text/Captcha';
$lang['msg_pear_disabled'] = 'Disabilita PEAR Text/Captcha';
$lang['msg_pear_disable_while_selected'] = 'Il PEAR Captcha non pu&ograve; essere disabilitato mentre &egrave; in uso. <br />Selezionate un&#039;altra libreria Captcha prima di disabilitare la PEAR Captcha.';
$lang['msg_pear_unavailable'] = 'PEAR Text/Captcha non &egrave; disponibile sul sistema, consultate l&#039;aiuto del modulo Captcha.';
$lang['legend_cache'] = 'Cache';
$lang['label_clear_cache'] = 'Rimuove tutte le immagini nella cartella cache';
$lang['msg_cache_overview'] = 'Numero di immagini nella cartella cache: %s';
$lang['cache_directory'] = 'Cartella cache';
$lang['msg_deleted_cache'] = 'Eliminati %s file di immagini dalla cartella di cache';
$lang['msg_deleted_cache_single'] = 'Eliminato 1 file di immagine file dalla cartella di cache';
$lang['legend_fonts'] = 'Font';
$lang['label_font_path'] = 'Percorso Font';
$lang['available_fonts'] = 'Font disponibili';
$lang['restore'] = 'Ripristina i valori predefiniti';
$lang['msg_restored_defaults'] = 'Valori predefiniti ripristinati';
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
$lang['help'] = '<h3>Che cosa f&agrave;?</h3>
<p>Abilita il supporto captcha per essere utilizzato in altri moduli.
Consulta <a href="http://it.wikipedia.org/wiki/Captcha">http://it.wikipedia.org/wiki/Captcha</a> per ulteriori informazioni sul test Captcha challenge-response.
</p>
<p>
Dovete avere installato PHP con il supporto GD configurato per JPEGs e i font TrueType. Per ulteriori informazioni consultate <a href="http://it2.php.net/it/image/">PHP Funzioni per le immagini</a>.<br />
</p>
<h3>Come utilizzarlo?</h3>
<p>
Questo modulo non &egrave; fatto per essere utilizzato direttamente sulle pagine, &egrave; uno strumento fatto per essere utilizzato da altri moduli. Se sei uno sviluppatore di moduli e vuoi utilizzare Captcha nel tuo modulo:
</p>
<p>
Per mostrare un&#039;immagine captcha:
<pre>
// create a un riferimento all&#039;oggeto del modulo Captcha
$captcha = &amp;$this->getModuleInstance(&#039;Captcha&#039;); 
// per mostrare l&#039;immagine captcha
echo $captcha->getCaptcha();
</pre>
Per verificare l&#039;input dell&#039;utente:
<pre>
// create a un riferimento all&#039;oggeto del modulo Captcha
$captcha = &amp;$this->getModuleInstance(&#039;Captcha&#039;);
// verificate l&#039;input dell&#039;utente (il metodo checkCaptcha restituisce TRUE se $input &egrave; correto, FALSE se $input &egrave; sbagliato)
$validated = $captcha->checkCaptcha($input);
</pre>
</p>
<p>
Alcuni esempi di implementazioni<br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=60&amp;root=comments&amp;view=rev" target="_blank">Commenti</a><br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=101&amp;root=frontendusers&amp;view=rev" target="_blank">FrontEndUsers</a><br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=145&amp;root=gastbuch&amp;view=rev" target="_blank">Guestbook</a><br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=40&amp;root=questions&amp;view=rev" target="_blank">Questions</a><br />
</p>
<h3>PEAR Text/Captcha</h3>
<p>
Questo modulo pu&ograve; utilizzare PEAR Text_CAPTCHA, che deve essere installato e disponibile sul server.<br />
Text_CAPTCHA ha dipendenza da altri due pacchetti del PEAR, Image_Text e Text_Password. Utilizza Text_Password per generare un testo casuale da utilizzare per il test CAPTCHA e Image_Text per generare il file con l&#039;immagine contenete il testo casuale.<br />
La procedura per installare Text_CAPTCHA da riga di comando &egrave;:<br />
<pre>
$ pear install Text_Password
$ pear install Image_Text
$ pear install --alldeps Text_CAPTCHA
</pre>
</p>
<h3>permessi di accesso del webserver</h3>
<p>
Il processo del webserver deve avere diritti di scrittura sulla directory cache delle immagini del modulo Captcha (la directory images/captchas dentro la struttura di directory del modulo Captcha).<br />
Su alcuni server (dipendenti dalla configurazione) la maschera umask nella Configurazioni Globali di CMSMS devono essere modificate; provate cambiando da 022 a 002 se le immagini captcha sono create ma non visualizzate</p>';
$lang['qca'] = 'P0-341425854-1271258489279';
$lang['utma'] = '156861353.1785716972.1271258827.1272464498.1272484592.7';
$lang['utmz'] = '156861353.1272484592.7.6.utmcsr=forum.cmsmadesimple.org|utmccn=(referral)|utmcmd=referral|utmcct=/index.php';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353.1.10.1272484592';
?>