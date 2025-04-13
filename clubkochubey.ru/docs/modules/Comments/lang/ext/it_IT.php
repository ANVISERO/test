<?php
$lang['description'] = 'Il modulo commenti permette ai visitatori di lasciare commenti sul vostro sito.';
$lang['addacomment'] = 'Aggiungi un commento';
$lang['active'] = 'Attiva';
$lang['cancel'] = 'Cancella';
$lang['edit'] = 'Modifica';
$lang['comment_updated'] = 'Il commento &egrave; stato aggiornato con successo.';
$lang['delete'] = 'Cancella';
$lang['comment_deleted'] = 'Il commento &egrave; stato cancellato con successo.';
$lang['comments_deleted'] = 'I commenti sono stati cancellati con successo.';
$lang['areyousure'] = 'Cancella commento?';
$lang['comment'] = 'Commento';
$lang['error'] = 'Errore';
$lang['errorenterauthor'] = 'Inserisci l&#039;autore';
$lang['errorentercomment'] = 'Inserisci un commento (non &egrave; questo il punto?)';
$lang['errorenteremail'] = 'Formato email invalido';
$lang['errorenterwebsite'] = 'Inserito formato URL invalido';
$lang['filters'] = 'Filtri';
$lang['firstpage'] = '<<';
$lang['friendlyname'] = 'Commenti';
$lang['wrongcode'] = 'Codice inserito invalido. Provare di nuovo.';
$lang['submit'] = 'Invia';
$lang['yourname'] = 'Il tuo Nome';
$lang['needpermission'] = 'Hai bisogno del permesso &#039;%s&#039; per utilizzare questa funzione.';
$lang['entercode'] = 'Codice nella foto';
$lang['continue_back'] = 'Ritorna alla pagina';
$lang['comment_awaiting_approval'] = 'Il vostro commento &egrave; stato ricevuto ed &egrave; in attesa di approvazione';
$lang['sysdefaults'] = 'Ripristina al predefinito';
$lang['restoretodefaultsmsg'] = 'Questa operazione ripristina il contenuto del Modello a quello predefinito. Siete sicuri di voler procedere?';
$lang['comments'] = 'Commenti';
$lang['list_template'] = 'Modello lista';
$lang['list_template_updated'] = 'Il Modello di Visualizzazione dei Commenti &egrave; stato aggiornato con successo.';
$lang['submit_template'] = 'Invia Modello';
$lang['submit_template_updated'] = 'Il Modello di Modulo di Invio &egrave; stato aggiornato con successo.';
$lang['options'] = 'Opzioni';
$lang['options_updated'] = 'Le opzioni sono state salvate con successo.';
$lang['nocommentsfound'] = 'Nessun commento trovato';
$lang['help_akismet_check'] = '<b>Check for Spam</b> - Spuntate questa casella per usare il modulo Akismet per individuare lo spam. <b>Nota: Utilizzare questa opzione implica l&#039;installazione del modulo CMSakismet.</b>';
$lang['author'] = 'Autore';
$lang['comment_title'] = 'Titolo';
$lang['data'] = 'Testo del commento';
$lang['email'] = 'Email';
$lang['modulename'] = 'Nome Modulo';
$lang['website'] = 'Sito WEB';
$lang['lastpage'] = '>>';
$lang['nextpage'] = '>';
$lang['pageid'] = 'Pagina';
$lang['page'] = 'Page';
$lang['page_of'] = 'Pagina %s di %s';
$lang['page_limit'] = 'Limite di Pagina';
$lang['postdate'] = 'Data';
$lang['prevpage'] = '<';
$lang['trackback'] = 'Trackback';
$lang['help_enable_trackbacks'] = '<b>Enable Trackbacks</b> - Check this box to enable the trackback functionality in comments.';
$lang['check_trackback_url'] = 'This URL is for trackbacks only.';
$lang['help_enable_trackback_backlink_check'] = '<b>Enable Backlink Check for Trackbacks</b> - To check, whether the sender website contains a link to your website.';
$lang['authornotifymsg'] = 'A new comment has been posted on &#039;%s&#039;';
$lang['authornotifysubj'] = 'New comment on &#039;%s&#039;';
$lang['authornotify'] = 'Reply Notify';
$lang['editor'] = 'Edit.Com.';
$lang['ip'] = 'IP dell&#039;autore';
$lang['help_enable_cookie_support'] = '<b>Enable Cookie Support</b> - This will restore the comment form for a visitor, that he/she doenst need to fill in Name, EMail, etc. every time.';
$lang['createdate'] = 'Data di creazione';
$lang['modifydate'] = 'Data di modifica';
$lang['delselected'] = 'Cancella i selezionati';
$lang['notifysubj'] = 'Commento su &#039;%s&#039;! ';
$lang['notifymsg'] = 'Un nuovo commento &egrave; stato inserito sulla pagina &#039;%s&#039;. ';
$lang['postinstall'] = 'Non dimenticate:<br />
  1) Essere sicuri di settare il permesso a <b>&#039;Gestione Commenti&#039;</b> sugli utenti che devono amministrare i commenti;<br />
  2) Installare e configurare il modulo <b>CMSMailer</b> per le funzionalit&agrave; di mailing.';
$lang['helpnumber'] = 'Massimo numero di commenti da visualizzare -- lasciando vuoto verranno mostrati tutti';
$lang['helpdateformat'] = 'Il formato data/ora utilizza i parametri della funzione data di php. Vedere <a href=&amp;quot;http://php.net/date&amp;quot; target=&amp;quot;_blank&amp;quot;>qui</a> per una lista dei parametri ed ulteriori informazioni.';
$lang['helplocaledateformat'] = '<p>Potete utilizzarlo assieme al parametro lang per usare date localizzate e il formato data <a href="http://us2.php.net/strftime" target="_blank">strftime</a>, per esempio:</p><p><b>Date Inglesi (esempio di output: Thursday, July 19, 2007, 07:51 AM)</b></p><pre>{cms_module module=&#039;comments&#039; localedateformat=&#039;%B %d, %Y, %I:%M %p&#039; lang=&#039;en_US&#039;}</pre><p><b>Date Francesi (esempio di output: jeudi, juillet 19, 2007, 07:51)</b></p><pre>{cms_module module=&#039;comments&#039; localedateformat=&#039;%B %d, %Y, %I:%M %p&#039; lang=&#039;fr_FR&#039;}</pre>';
$lang['localedateformat_error'] = 'Errore: Utilizzare setlocale per impostare il formato di orario non funziona perch&egrave; la funzionalit&agrave; locale non &egrave; implementata sulla vostra piattaforma, la variabile locale specificata non esiste, o il nome della categoria non &egrave; valido.';
$lang['helpnotify'] = '<i>notifica</i> - indirizzo email per la notifica di nuovi commenti.  Se non &egrave; specificato non verranno inviate notifiche.';
$lang['edit_comment'] = 'Modifica Commento';
$lang['helpmoderate'] = '<i>modera</i> - Disattiva i nuovi commenti.  Devono essere attivati da un amministratore prima di essere visualizzati sul sito.';
$lang['comment_moderation_enabled'] = 'Importante: La moderazione dei commenti &egrave; abilitata. Dovrete attivare questo commento prima che appaia nella vostra pagina.';
$lang['helpspamprotect'] = '<i>Protezione Spam</i> - proteggete i commenti dallo spam. Selezionate questa casella per utilizzare il modulo Captcha per prevenire i commenti automatici. <b>Utilizzare questa opzione implica l&#039;installazione del modulo Captcha</b>';
$lang['help_disable_html'] = '<b>Disabilita HTML</b> - Selezionate questa casella per disabilitare l&#039;uso di codice HTML nei commenti.';
$lang['help'] = '	<h3>Che cosa fa?</h3>
	<p>Il modulo comments &egrave; un modulo tag.  E&#039; usato per aggiungere commenti a pagine individuali, le quali possono essere lette dagli utenti. La ragione pratica di questo modulo &egrave; per la documentazione delle pagine. Cos&igrave; gli utenti possono aggiungere commenti ed informazioni alla pagina.</p>
	<h3>Come usarlo?</h3>
	<p>E&#039; inserito nelle pagine o template usando il tag cms_module. Esempio di sintassi: <code>{cms_module module=&quot;comments&quot; notify=&quot;myemail@example.com&quot; spamprotect=1}</code></p>
<p>Per abilitare la notifica email, settare e configurare il modulo CMSMailer e includere l&#039;email nel parametro <i>notify</i>.</p>
	<p>Essere sicuri di settare il permesso &#039;Gestione Commenti&#039; sugli utenti che amministreranno i commenti.</p>
	<h3>Quali parametri ci sono?</h3>
	<p>
	<ul>
		<li><em>(opzionale)</em> number - Numero di commenti da visualizzare. Se non specificato vengono visualizzati tutti.</li>
		<li><i>notify</i> - indirizzo email di notifica di inserimenti. Se non specificato, le notifiche non saranno inviate.</li>
		<li><i>spamprotect</i> - settato a 1 per proteggere i commenti dallo spam. Se non settato, non sar&agrave; usata nessuna protezione contro lo spam.</li>
		<li><i>moderate</i> - setta a 1 se i nuovi coomenti devono essere inattivi. Dovranno essere settati come attivi da un amministrativo prima di essere visualizzati.</li>
		<li><i>emailfield</i> - settato a 1 permette agli utenti di inserire il loro indirizzo email. Se non settato, il campo email non sar&agrave; mostrato.</li>
		<li><i>websitefield</i> - settato to 1 permette agli utenti di inserire il loro indirizzo web. Se non settato, il campo per l&#039;indirizzo web non sar&agrave; mostrato.</li>
	</ul>';
$lang['utmz'] = '156861353.1228168733.609.121.utmccn=(referral)|utmcsr=forum.cmsmadesimple.org|utmcct=/index.php|utmcmd=referral';
$lang['utma'] = '156861353.1807151640.1182960456.1227740242.1228168733.609';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>