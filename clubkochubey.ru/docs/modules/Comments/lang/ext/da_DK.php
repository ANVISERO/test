<?php
$lang['description'] = 'Kommentar-modulet tillader bes&oslash;gende at efterlade kommentarer p&aring; dit site.';
$lang['addacomment'] = 'Tilf&oslash;j en kommentar';
$lang['active'] = 'Aktiv';
$lang['cancel'] = 'Afbryd';
$lang['edit'] = 'Redig&eacute;r';
$lang['comment_updated'] = 'Kommentaren blev opdateret';
$lang['delete'] = 'Slet';
$lang['comment_deleted'] = 'Kommentaren blev slettet';
$lang['comments_deleted'] = 'Kommentarene blev slettet';
$lang['areyousure'] = 'Slet kommentar?';
$lang['comment'] = 'Kommentar';
$lang['error'] = 'Fejl';
$lang['errorenterauthor'] = 'Angiv en forfatter';
$lang['errorentercomment'] = 'Angiv en kommentar (er det ikke ligesom meningen?)';
$lang['errorenteremail'] = 'Forkert email format';
$lang['errorenterwebsite'] = 'Fejl i URL format';
$lang['wrongcode'] = 'Koden var ikke korrekt indtastet. Pr&oslash;v igen';
$lang['submit'] = 'Send';
$lang['yourname'] = 'Dit navn';
$lang['needpermission'] = 'Du skal have &#039;%s&#039; tilladelsen for at kunne g&oslash;re dette';
$lang['entercode'] = 'Koden i billedet';
$lang['continue_back'] = 'Forts&aelig;t tilbage til side';
$lang['comment_awaiting_approval'] = 'Din kommentar er modtaget og afventer godkendelse';
$lang['sysdefaults'] = 'Genskab standardv&aelig;rdierne';
$lang['restoretodefaultsmsg'] = 'Dette vil gendanne skabelonen til standardindholdet. Er du sikker p&aring; du vil forts&aelig;tte?';
$lang['comments'] = 'Kommentarer';
$lang['list_template'] = 'Skabelon til visning af kommentar';
$lang['list_template_updated'] = 'Skabelonen til visning af kommentarer blev opdateret';
$lang['submit_template'] = 'Skabelonen til tilf&oslash;jelse kommentar';
$lang['submit_template_updated'] = 'Skabelonen til tilf&oslash;jelse kommentar blev opdateret';
$lang['options'] = 'Indstillinger';
$lang['options_updated'] = 'Indstillinger blev gemt';
$lang['nocommentsfound'] = 'Ingen kommentarer fundet';
$lang['help_akismet_check'] = '<b>Check for Spam</b> - S&aelig;t kryds i denne boks for at bruge Akismet modulet for at opdage spam. <b>Note: Brug af denne feature kr&aelig;ver at CMSakismet modulet er installeret.</b>';
$lang['author'] = 'Forfatter';
$lang['data'] = 'Kommentar tekst';
$lang['email'] = 'Email';
$lang['modulename'] = 'Modulnavn';
$lang['website'] = 'Hjemmeside';
$lang['pageid'] = 'Side';
$lang['postdate'] = 'Dato';
$lang['createdate'] = 'Oprettet d.';
$lang['modifydate'] = '&AElig;ndret d.';
$lang['delselected'] = 'Slet valgt(e)';
$lang['notifysubj'] = 'Komment&eacute;r &#039;%s&#039;! ';
$lang['notifymsg'] = 'En ny kommentar er skrevet til siden &#039;%s&#039;. ';
$lang['postinstall'] = 'Husk at:<br />
  1) Sikre dig at <b>&#039;Manage Comments&#039; tilladelsen</b> er sat for brugere der skal kunne administrere kommentarer<br />
  2) Install&eacute;r og konfigur&eacute;r <b>CMSMailer modulet</b> for at underst&oslash;tte email-funktionaliteten';
$lang['helpnumber'] = 'Det maksimale antal kommentarer der skal vises - alle kommentarer vises hvis feltet er blankt';
$lang['helpdateformat'] = 'Formatet for dato og tidspunkt, bruger parametrene fra php&#039;s date()-funktion.  Se <a href=&quot;http://php.net/date&quot; target=&quot;_blank&quot;>her</a> for en oversigt over paramtre og yderligere information.';
$lang['helplocaledateformat'] = '<p>You can use this with the lang parameter to get localized dates and <a href=&quot;http://us2.php.net/strftime&quot; target=&quot;_blank&quot;>strftime</a> date formats will be used instead, for example:</p><p><b>English Dates (example output: Thursday, July 19, 2007, 07:51 AM)</b></p><pre>{cms_module module=&#039;comments&#039; localedateformat=&#039;%B %d, %Y, %I:%M %p&#039; lang=&#039;en_US&#039;}</pre><p><b>French Dates (example output: jeudi, juillet 19, 2007, 07:51)</b></p><pre>{cms_module module=&#039;comments&#039; localedateformat=&#039;%B %d, %Y, %I:%M %p&#039; lang=&#039;fr_FR&#039;}</pre>';
$lang['localedateformat_error'] = 'Error: Calling setlocale to set time format did not work because locale functionality is not implemented on your platform, the specified locale does not exist, or the category name is invalid.';
$lang['helpnotify'] = '<i>notify</i> - Email adresse, hvortil meddelelse om nye kommentarer sendes. Hvis der ikke er indtastet en mail adresse vil der ikke blive sendt en meddelelse.';
$lang['edit_comment'] = 'Rediger kommentar';
$lang['helpmoderate'] = '<i>Moderer</i> - Deaktiverer nye kommentarer.  De skal aktiveres af en admin f&oslash;r de vises p&aring; siden.';
$lang['comment_moderation_enabled'] = 'Vigtigt: Kommentar moderering er sl&aring;et til. Du skal aktivere denne kommentar f&oslash;r den vil blive vist p&aring; siden.';
$lang['helpspamprotect'] = '<i>spamprotect</i> - Protect comments from spam. If not set, no spam protection will be used.';
$lang['help_disable_html'] = '<b>Sl&aring; HTML fra</b> - S&aelig;t kryds i denne boks for at sl&aring; HTML i kommentarer fra.';
$lang['help'] = '	<h3>Hvad g&oslash;r dette module?</h3>
	<p>Dette modul bruges til at tilf&oslash;je kommentarer til de enkelte sider, som s&aring; kan l&aelig;ses af brugere, der bes&oslash;ger siden senere. Et praktisk form&aring;l med modulet er til dokumentations sider, hvor brugere kan tilf&oslash;je yderligere kommentarer og informationer til siden.</p>
	<h3>Hvordan bruges modulet?</h3>
	<p>Comments er bare et tag modul. Det inds&aelig;ttes i din side eller skabelon ved hj&aelig;lp af en cms_module tag. Et eksempel p&aring; syntaks kunne v�re: <code>{cms_module module=&quot;comments&quot;}</code></p>	
             <p>For at muligg&oslash;re email notifikationer, skal du konfigurere CMSMailer modulet og inkludere modtager email i <i>notif</i> optionen p&aring; Options tab.</p>
';
$lang['utma'] = '156861353.819513027.1186664218.1189495616.1189748057.15';
$lang['utmz'] = '156861353.1189495616.14.4.utmccn=(referral)|utmcsr=forum.cmsmadesimple.org|utmcct=/index.php|utmcmd=referral';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>