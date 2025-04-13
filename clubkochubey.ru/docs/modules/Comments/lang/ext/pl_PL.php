<?php
$lang['description'] = 'Moduł komentarzy pozwala na dodawanie komentarzy na stronach.';
$lang['addacomment'] = 'Dodaj komentarz';
$lang['active'] = 'Aktywuj';
$lang['cancel'] = 'Anuluj';
$lang['edit'] = 'Edytuj';
$lang['comment_updated'] = 'Zaktualizowano komentarz.';
$lang['delete'] = 'Usuń';
$lang['comment_deleted'] = 'Usunięto';
$lang['comments_deleted'] = 'Usunięto';
$lang['areyousure'] = 'Usunąć komentarz?';
$lang['comment'] = 'Komentarz';
$lang['error'] = 'Błąd';
$lang['errorenterauthor'] = 'Wpisz autora';
$lang['errorentercomment'] = 'Wpisz komentarz';
$lang['errorenteremail'] = 'Błędny adres e-mail.';
$lang['errorenterwebsite'] = 'Błedny adres URL';
$lang['filters'] = 'Filtry';
$lang['firstpage'] = '&amp;lt;&amp;lt;';
$lang['friendlyname'] = 'Komentarze';
$lang['wrongcode'] = 'Błedny kod. Spr&oacute;buj ponownie.';
$lang['submit'] = 'Wyślij';
$lang['yourname'] = 'Twoje imię';
$lang['needpermission'] = 'Potrzebujesz \&#039;%s\&#039; uprawnienia aby wykonać operację';
$lang['entercode'] = 'Przepisz kod z obrazka';
$lang['continue_back'] = 'Kliknij tutaj aby wr&oacute;cić do poprzedniej strony';
$lang['comment_awaiting_approval'] = 'Tw&oacute;j komentarz został zapisany i pojawi się na stronie po akceptacji administratora';
$lang['sysdefaults'] = 'Przywr&oacute;ć domyślne';
$lang['restoretodefaultsmsg'] = 'Przywr&oacute;cić do domyślnego szablonu?';
$lang['comments'] = 'Komentarze';
$lang['list_template'] = 'Szablon';
$lang['list_template_updated'] = 'Zaktualizowano szablon.';
$lang['submit_template'] = 'Zatwierdź';
$lang['submit_template_updated'] = 'Szablon został zaktualizowany.';
$lang['options'] = 'Ustawienia';
$lang['options_updated'] = 'Zapisano ustawienia.';
$lang['nocommentsfound'] = 'Brak komentarzy';
$lang['help_akismet_check'] = '<b>Ochrona antyspamowa</b> - Zaznacz ten checkbox, aby użyć modułu Aksimet do wykrywania spamerskich komentarzy. <b>Uwaga: Ta opcja wymaga zainstalowanego moodułu CMSakismet.</b>';
$lang['author'] = 'Autor';
$lang['comment_title'] = 'Tytuł';
$lang['data'] = 'Treść';
$lang['email'] = 'Adres email';
$lang['modulename'] = 'Nazwa modułu';
$lang['website'] = 'www';
$lang['lastpage'] = '&amp;gt;&amp;gt;';
$lang['nextpage'] = '&amp;gt;';
$lang['pageid'] = 'Strona';
$lang['page'] = 'Strona';
$lang['page_of'] = 'Strona %s z %s';
$lang['page_limit'] = 'Limit na stronę';
$lang['postdate'] = 'Data utworzenia';
$lang['prevpage'] = '&amp;lt;';
$lang['createdate'] = 'Data utworzenia';
$lang['modifydate'] = 'Data zmiany';
$lang['delselected'] = 'Usuń zaznaczone';
$lang['notifysubj'] = 'Komentarz na %s';
$lang['notifymsg'] = 'Dodano nowy komentarz na stronie %s. ';
$lang['postinstall'] = 'PAMIĘTAJ<br />
  1) Upewnij się, że nadałeś odpowiednie <b>&#039;Uprawnienia&#039; </b> użytkownikom, kt&oacute;rzy będą administrować komentarzami;<br />
  2) Zainstaluj moduł <b>CMSMailer </b> aby dodać powiadamianie emailowe.';
$lang['helpnumber'] = 'Maksymalna ilość element&oacute;w do wyświetlenia -- pozostawienie pustego spowoduje wyświetlenie wszystkich element&oacute;w';
$lang['helpdateformat'] = 'Format daty/czasu oparty na parametrach z funkcji PHP date. Zobacz <a href=&amp;quot;http://php.net/date&amp;quot; target=&amp;quot;_blank&amp;quot;>tutaj</a> aby obejrzeć listę parametr&oacute;w i informacje o funkcji.';
$lang['helplocaledateformat'] = '<p>You can use this with the lang parameter to get localized dates and <a href="http://us2.php.net/strftime" target="_blank">strftime</a> date formats will be used instead, for example:</p><p><b>English Dates (example output: Thursday, July 19, 2007, 07:51 AM)</b></p><pre>{cms_module module=&#039;comments&#039; localedateformat=&#039;%B %d, %Y, %I:%M %p&#039; lang=&#039;en_US&#039;}</pre><p><b>French Dates (example output: jeudi, juillet 19, 2007, 07:51)</b></p><pre>{cms_module module=&#039;comments&#039; localedateformat=&#039;%B %d, %Y, %I:%M %p&#039; lang=&#039;fr_FR&#039;}</pre>';
$lang['localedateformat_error'] = 'Błąd: Wywołanie setlocale, aby ustawić format daty i czasu nie powiodło się, ponieważ tw&oacute;j serwer nie posiada takiej funkcjonalności, Twoje locale nie jest zainstalowane lub nazwa kategorii jest nieprawidłowa.';
$lang['helpnotify'] = '<i>Powiadamianie</i> - adres e-mail do wysyłania powiadomień o nowych komentarzach.  Pozostawienie pustego oznacza brak powiadomień.';
$lang['edit_comment'] = 'Edycja komentarza';
$lang['helpmoderate'] = '<i>Moderowanie</i> - Zaznaczenie tej opcji powoli na zarządzanie (aktywowanie) komentarzami przez administratora.';
$lang['comment_moderation_enabled'] = 'Ważne: włączone jest moderowanie komentarzy. Każdy komentarz będzie musiał być zaktywowany przez administratora zanim pojawi się na frontendzie.';
$lang['helpspamprotect'] = '<i>Walidacja</i> - Zabezpieczenie przed spamingiem - walidacja kodu z obrazka. ';
$lang['help_disable_html'] = '<b>Wyłącz HTML</b> - Zaznacz ten checkbox aby wyłączyć możliwośc używania kodu HTML w komentarzach.';
$lang['help'] = '<h3>What does this do?</h3>
	<p>The comments module is a tag module.  It&#039;s used to add comments to individual pages which 
	can be read by users who visit the page later.  The practical reason for this module is for 
	documentation pages, so that users can add additional comments and information to the page.
	</p>
	<h3>How do I use it?</h3>
	<p>Comments is just a tag module.  It&#039;s inserted into your page or template by using the 
	cms_module tag.  Example syntax would be:<br />
	<code>{cms_module module=&#039;comments&#039;}</code></p>
	<p>To enable email notifications, set up and configure CMSMailer module and include 
	recipient email in the <i>notify</i> option in the Options tab.</p>
	<p>Make sure to set the &#039;Manage Comments&#039; permission on users who will be administering comments.</p>
	<h3>Parameters</h3>
	<ul>
		<li><i>number</i> - number of comments on the page.  If not specifid, all comments are shown.</li>
		<li><i>emailfield</i> - set to 1 to allow users enter their email address. If not set, email field won&#039;t show.</li>
		<li><i>websitefield</i> - set to 1 to allow users enter their website url. If not set, website field won&#039;t show.</li>
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
$lang['utma'] = '156861353.2359145497878676500.1213200278.1219765764.1219796631.100';
$lang['utmz'] = '156861353.1219796631.100.19.utmccn=(referral)|utmcsr=dev.cmsmadesimple.org|utmcct=/tracker/index.php|utmcmd=referral';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>