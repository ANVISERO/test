<?php
$lang['project'] = 'Modulul Captcha';
$lang['msg_changes'] = 'Schimbari salvate';
$lang['friendlyname'] = 'Modulul Captcha';
$lang['postinstall'] = 'Modulul Captcha a fost instalat cu succes. Asigurati-va ca server-ul web permite scrierea in directorul images/captchas din interiorul directorului modulului Captcha.';
$lang['postuninstall'] = 'Dezinstalarea modulului Captcha s-a facut cu succes.';
$lang['really_uninstall'] = 'Sunteti sigur ca doriti sa dezinstalati modulul Captcha? Alte module s-ar putea sa-l foloseasca.';
$lang['uninstalled'] = 'Modulul a fost dezinstalat.';
$lang['installed'] = 'Instalat - modulul versiunea %s.';
$lang['upgraded'] = 'Modulul a fost actualizat la versiunea %s.';
$lang['moddescription'] = 'Activeaza suportul captcha pentru a putea fi folosit in alte module.';
$lang['error'] = 'Eroare!';
$lang['err_no_gd_support'] = 'Instalarea dumneavoastra de PHP nu are suport pentru libraria GD';
$lang['err_no_jpg_support'] = 'Libraria GD nu suporta fisiere de tip JPG';
$lang['err_no_freetype_support'] = 'Libraria GD nu suporta fisiere FreeType';
$lang['admindescription'] = 'Setari Captcha';
$lang['accessdenied'] = 'Acces nepermis. Va rugam sa verificati permisiunile.';
$lang['title_general'] = 'General ';
$lang['title_cache'] = 'Cache ';
$lang['legend_pear'] = 'PEAR Captcha ';
$lang['label_enable_pear'] = 'Activare text PEAR/Captcha (trebuie sa fie instalat, vezi documentatia help pentru modulul Captcha)';
$lang['legend_active_lib'] = 'Librarie activa';
$lang['label_captchalib_select'] = 'Libraria Captcha pentru utilizare';
$lang['msg_active_lib_changed'] = 'Libraria activa s-a schimbat in %s';
$lang['msg_no_changes'] = 'Fara modicari';
$lang['msg_pear_enabled'] = 'S-a activat Text PEAR/Captcha';
$lang['msg_pear_disabled'] = 'S-a dezactivat Text PEAR/Captcha';
$lang['msg_pear_disable_while_selected'] = 'PEAR Captcha nu poate fi dezactivat cand este in folosinta. <br /> Va rugam sa alegeti alta librarie Captcha inainte de dezactivarea PEAR Captcha';
$lang['msg_pear_unavailable'] = 'Functia PEAR Text/Captcha nu este disponibila pe acest sistem, verificati documentatia modulului Captcha.';
$lang['legend_cache'] = 'Cache ';
$lang['label_clear_cache'] = 'Sterge toate imaginile din directorul cache';
$lang['msg_cache_overview'] = 'Numarul de imagini din directorul cache: %s';
$lang['cache_directory'] = 'Director cache';
$lang['msg_deleted_cache'] = '%s imagini au fost sterse din directorul cache';
$lang['msg_deleted_cache_single'] = '1 imagine a fost stearsa din directorul cache';
$lang['legend_fonts'] = 'Fonturi';
$lang['label_font_path'] = 'Cale fonturi';
$lang['available_fonts'] = 'Fonturi disponibile';
$lang['restore'] = 'Restaureaza valori implicite';
$lang['msg_restored_defaults'] = 'Au fost restaurate valorile implicite';
$lang['changelog'] = '<ul>
	<li>
		<p><b>Versiunea 0.3</b></p>
		<ul>
			<li>S-a trecut de la hn_captcha la hn_captcha_X1 care are <em>garbage collection</em></li>
			<li>S-a adaugat suport pentru libraria PhpCaptcha</li>
			<li>Setarile Librariei Captcha pot fi administrate din modulul de admin</li>
			<li>Librarii Captcha sunt incarcate automat din fisierele clasa disponibile</li>
			<li>Librarii Captcha nu sunt incarcate cat timp nu sunt necesare</li>
		</ul>
	</li>
	<li>
		<p><b>Versiunea 0.2.1</b></p>
		<ul>
			<li>S-a reparat utilizarea functiei PHP parse_url intr-o modalitate ce functioneaza numai in PHP5</li>
		</ul>
	</li>
	<li>
		<p><b>Versiunea 0.2</b></p>
		<ul>
			<li>Diverse fix-uri pentru sistemele windows. Imaginile captcha nu apareau in unele cazuri.</li>
			<li>Mici modificar pentru a fi siguri ca imaginea captcha apare cand este folosita libraria hn_captcha si $_SERVER[&#039;DOCUMENT_ROOT&#039;] nu este setat corect.</li>
			<li>S-a renuntat la suportul pentru libraria b2evo. Deriva din libraria hn_captcha si nu ofera functionalitate in plus.</li>
			<li>Folosirea unei versiuni nemodificate a librariei hn_captcha (numai niste modificari de pronuntie au fost pastrate).</li>
		</ul>
	</li>
	<li>
		<p><b>Versiunea 0.1.1</b></p>
		<ul>
			<li>Prevenirea unui mesaj de avertizare care apare daca <strong>allow_call_time_pass_reference</strong> este setat false in php.ini.</li>
		</ul>
	</li>
	<li>
		<p><b>Versiunea 0.1</b></p>
		<ul>
			<li>Release-ul initial.</li>
		</ul>
	</li>
</ul>';
$lang['help'] = '<h3>Ce face acest modul?</h3>
<p>Activeaza suportul captcha pentru a fi folosit in alte module.
Detalii pe <a href="http://www.wikipedia.org/wiki/Captcha">http://www.wikipedia.org/wiki/Captcha</a>.
</p>
<p>
<strong>Versiunea de PHP trebuie sa aiba libraria GD cu suport pentru JPEG si TrueType Fonts instalata.</strong>. Pentru mai multe detalii, vizitati <a href="http://www.php.net/image/">PHP Image Functions</a>.<br />
</p>
<h3>Cum se foloseste?</h3>
<p>
Acest modul nu se foloseste direct in pagina. Este un tool pentru a fi folosit de catre alte module. Daca sunteti dezvoltator de module si vreti safolositi Captcha in modulul dumneavoastra:
</p>
<p>
Pentru a arata o imagine Captcha:
<pre>
// Creeaza o referinta catre un obiect al modulului Captcha
$captcha = &amp;$this->getModuleInstance(&#039;Captcha&#039;); 
// arata imaginea Captcha
echo $captcha->getCaptcha();
</pre>
Pentru a verifica datele introduse de utilizator:
<pre>
// Creeaza o referinta catre un obiect al modulului Captcha
$captcha = &amp;$this->getModuleInstance(&#039;Captcha&#039;);
// verifica datele introduse de utilizator (functia checkCaptcha va returna TRUE daca $input este corect, FALSE daca $input este incorect)
$validated = $captcha->checkCaptcha($input);
</pre>
</p>
<p>
Exemple de implementare:<br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=60&amp;root=comments&amp;view=rev" target="_blank">Comentarii</a><br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=101&amp;root=frontendusers&amp;view=rev" target="_blank">FrontEndUsers</a><br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=145&amp;root=gastbuch&amp;view=rev" target="_blank">Carte de oaspeti</a><br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=40&amp;root=questions&amp;view=rev" target="_blank">Intrebari</a><br />
</p>
<h3>PEAR Text/Captcha</h3>
<p>
Acest modul poate folosi PEAR Text_CAPTCHA, care trebuie sa fie instalat pe server-ul dumneavoastra.<br />
Text_CAPTCHA depinde de alte doua pachete PEAR, Image_Text si Text_Password. Foloseste Text_Password pentru a genera cuvinte aleatoare folosit in CAPTCHA test si Image_Text pentru a genera un fisier imagine cu text in el.<br />
Procesul pentru instalare Text_CAPTCHA prin linie de comanda este:<br />
<pre>
$ pear install Text_Password
$ pear install Image_Text
$ pear install --alldeps Text_CAPTCHA
</pre>
</p>
<h3>Permisiunile webserver-ului</h3>
<p>
Server-ul trebuie sa aiba acces la scriere in directorul cache al modulului Captcha (directorul images/captchas din interiorul directorului modulului Captcha).<br />
Pe unele servere, in functie de setarile respective, setarea umask din CMS Made Simple Global Settings s-ar putea sa necesite schimbare din 022 in 002 in cazul in care imaginile captcha sunt create, dar nu sunt afisate.
</p>';
$lang['qca'] = 'P0-1838215043-1282807533934';
$lang['utmz'] = '156861353.1282807972.1.2.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=cmsms';
$lang['utma'] = '156861353.1191873817.1282807534.1282807534.1282807534.1';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353.12.9.1282807615368';
?>