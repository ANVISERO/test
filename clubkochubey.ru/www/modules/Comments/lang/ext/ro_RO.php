<?php
$lang['description'] = 'Modulul comentarii permite vizitatorilor plasarea comentariilor pe site-ul dvs.';
$lang['addacomment'] = 'Adauga un comentariu';
$lang['active'] = 'Activ';
$lang['cancel'] = 'Anuleaza';
$lang['edit'] = 'Editeaza';
$lang['comment_updated'] = 'Comentariul a fost actualizat cu succes.';
$lang['delete'] = 'Sterge';
$lang['comment_deleted'] = 'Comentariul a fost sters cu succes.';
$lang['comments_deleted'] = 'Comentariile au fost sterse cu succes.';
$lang['areyousure'] = 'Sterg comentariul?';
$lang['comment'] = 'Comentariu';
$lang['error'] = 'Eroare';
$lang['errorenterauthor'] = 'Introdu un autor';
$lang['errorentercomment'] = 'Introdu un comentariu (nu-i asta scopul?)';
$lang['errorenteremail'] = 'Format e-mail incorect';
$lang['errorenterwebsite'] = 'Format URL incorect';
$lang['wrongcode'] = 'Codul introdus gresit.  Incearca din nou.';
$lang['submit'] = 'Trimite';
$lang['yourname'] = 'Numele tau';
$lang['needpermission'] = 'Aveti nevoie de permisiunea &#039;%s&#039; pentru a efectua operatia.';
$lang['entercode'] = 'Codul in imagine';
$lang['continue_back'] = 'Continua inapoi la pagina';
$lang['comment_awaiting_approval'] = 'Comentariul a fost receptionat si asteapta aprobarea';
$lang['sysdefaults'] = 'Restaureaza la setari implicite';
$lang['restoretodefaultsmsg'] = 'Aceasta operatie va restaura continutul sabloanelor la setarile implicite. Sigur doriti sa continuati?';
$lang['comments'] = 'Comentarii';
$lang['list_template'] = 'Sablon afisare comentariu';
$lang['list_template_updated'] = 'Sablonul afisare comentariu a fost actualizat cu succes.';
$lang['submit_template'] = 'Sablon formular trimitere';
$lang['submit_template_updated'] = 'Sablonul formular trimitere a fost actualizat cu succes.';
$lang['options'] = 'Optiuni';
$lang['options_updated'] = 'Optiunile au fost salvate cu succes.';
$lang['nocommentsfound'] = 'Nici un comentariu gasit';
$lang['help_akismet_check'] = '<b>Verificare Spam</b> - Bifeaza aceasta casuta pentru a folosi modulul Akismet pentru detectia spam-ului. <b>Nota: Folosirea acestei facilitati necesita ca modulul CMSakismet sa fie instalat.</b>';
$lang['author'] = 'Autor';
$lang['comment_title'] = 'Titlu';
$lang['data'] = 'Text comentariu';
$lang['email'] = 'Email';
$lang['modulename'] = 'Nume modul';
$lang['website'] = 'Site web';
$lang['pageid'] = 'Pagina';
$lang['postdate'] = 'Data postarii';
$lang['createdate'] = 'Data creerii';
$lang['modifydate'] = 'Data modificarii';
$lang['delselected'] = 'Sterge tot ce-i selectat';
$lang['notifysubj'] = 'Comentarii la &#039;%s&#039;! ';
$lang['notifymsg'] = 'Un nou comentariu a fost introdus in pagina &#039;%s&#039;. ';
$lang['postinstall'] = 'Nu uita sa:<br />
  1) Fii sigur(a) sa setezi <b>permisiunea &#039;Manage Comments&#039;</b> utilizatorilor care vor administra comentariile;<br />
  2) Instalezi si configurezi <b>modulul CMSMailer</b> pentru suportul mesageriei.';
$lang['helpnumber'] = 'Numar maxim de elemente afisate -- lasand necompletat se vor afisa toate elementele';
$lang['helpdateformat'] = 'Date/Time format using parameters from php&#039;s date function.  See
	<a href=&quot;http://php.net/date&quot; target=&quot;_blank&quot;>here</a> for a parameter list and information.';
$lang['helplocaledateformat'] = '<p>Puteti folosi aceasta impreuna cu parametrul lang pentru a obtine date localizate si formate data <a href=&quot;http://us2.php.net/strftime&quot; target=&quot;_blank&quot;>strftime</a> vor fi folosite in loc, de exemplu:</p><p><b>English Dates (example output: Thursday, July 19, 2007, 07:51 AM)</b></p><pre>{cms_module module=&#039;comments&#039; localedateformat=&#039;%B %d, %Y, %I:%M %p&#039; lang=&#039;en_US&#039;}</pre><p><b>French Dates (example output: jeudi, juillet 19, 2007, 07:51)</b></p><pre>{cms_module module=&#039;comments&#039; localedateformat=&#039;%B %d, %Y, %I:%M %p&#039; lang=&#039;fr_FR&#039;}</pre>';
$lang['localedateformat_error'] = 'Eroare: Apeland setlocale pentru a stabili formatul pt. afisare timp nu a functionat deoarece facilitatea de localizare nu este implementata pe platforma dvs., localizarea specificata nu exista sau numele categoriei este invalid.';
$lang['helpnotify'] = '<b>Notifica</b> - adresa de e-mail pentru notificari comentarii noi.  Daca nu se specifica, notificarile nu vor fi trimise.';
$lang['edit_comment'] = 'Editeaza comentariu';
$lang['helpmoderate'] = '<b>Modereaza</b> - Inactiveaza comentarii noi. Ele trebuie sa fie activate de catre un administrator inainte de a fi afisate pe site.';
$lang['comment_moderation_enabled'] = 'Important: Moderarea comentariilor este activata. Trebuie sa activezi acest comentariu inainte ca el sa apara pe pagina dvs.';
$lang['helpspamprotect'] = '<b>Protectie Spam</b> - Protejeaza comentariile impotriva spam-ului. Bifeaza aceasta casuta pentru a folosi modulul Captcha pentru a preveni spam-ul de tipul comentariu automat. <b>Utilizarea acestei facilitati necesita instalarea prealabila a modulului Captcha.</b>';
$lang['help_disable_html'] = '<b>Dezactiveaza HTML</b> - Bifeaza aceasta casuta pentru a dezactiva HTML in comentarii.';
$lang['help'] = '	<h3>Ce realizeaza acest modul?</h3>
	<p>Modulul comentarii este un modul de tip eticheta. Este folosit pentru a adauga comentarii paginilor individuale care pot fi citite de catre utilizatorii care le viziteaza ulterior. Motivul practic al acestui acest modul este documentarea paginilor astfel incat utilizatorii sa-si poata adauga comentarii si informatii aditionale in pagina.
	</p>
	<h3>Cum il folosesc?</h3>
	<p>Comentarii este doar un modul eticheta.  Este introdus in pagina sau sablonul dvs. prin folosirea etichetei cms_module.  Un exemplu de sintaxa:<br />
	<code>{cms_module module=&#039;comments&#039;}</code></p>
	<p>Pentru activarea notificarilor e-mail instalati si configurati modulul CMSMailer si includeti adresa e-mail a destinatarului in optiunea <i>notifica</i> din sectiunea Optiuni.</p>
	<p>Asigurati-va ca ati setat permisiunea &#039;Manage Comments&#039; pentru utilizatorii care vor administra comentariile.</p>
	<h3>Parametri</h3>
	<ul>
		<li><i>number</i> - numar comentarii pe pagina.  Daca nu e specificat, sunt afisate toate comentariile.</li>
		<li><i>emailfield</i> - setati pe 1 pentru a permite utilizatorilor introducerea adresei de e-mail proprie. Daca nu este setat, campul e-mail nu va fi afisat.</li>
		<li><i>websitefield</i> - setati pe 1 pentru a permite utilizatorilor introducerea site-ului web propriu. Daca nu este setat, campul site web nu va fi afisat.</li>
		<li><i>modulename</i> - name of the module for which these comments are being used.</li>
		<li><i>pageid</i> - id of item this is being used with, could be a picture or news id</li>
	</ul>
		<h4>Styling</h4>
		<p>To style the comments form you can add something like this to your stylesheet:</p>
        <pre>#comments textarea { width:300px; }</pre>

<h3>Examples</h3>
<h4>Example of using with News module</h4>
		<p>Put this in your News &quot;Detail Template&quot;:</p>
<pre>
{cms_module module=&#039;comments&#039; modulename=&#039;News&#039; pageid=$entry->id}
</pre>';
$lang['utmz'] = '156861353.1211532692.6.3.utmccn=(organic)|utmcsr=google|utmctr=http://translations.cmsmadesimple.org/|utmcmd=organic';
$lang['utma'] = '156861353.18530930.1207129453.1211452481.1211532306.6';
$lang['utmb'] = '156861353.2.10.1211532306';
$lang['utmc'] = '156861353';
?>