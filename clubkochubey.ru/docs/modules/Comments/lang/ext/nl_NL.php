<?php
$lang['help_usesession'] = 'If this parameter is set, the form will store the form variables in a session on error, and redirect back to the originating url to display the error message';
$lang['help_inline'] = 'Wanneer deze parameter is gezet, wordt het form &quot;inline&quot; geplaatst, oftewel het vervangt de positie van de aanroep, wanneer deze parameter de waarde &quot;false&quot; heeft, dan wordt de content-tag vervangen.';
$lang['description'] = 'Met de comments module kunnen bezoekers commentaar op jouw website achterlaten.';
$lang['addacomment'] = 'Voeg commentaar toe';
$lang['active'] = 'Actief';
$lang['cancel'] = 'Annuleer';
$lang['edit'] = 'Wijzig';
$lang['comment_updated'] = 'Het commentaar is met succes bijgewerkt.';
$lang['delete'] = 'Verwijder';
$lang['comment_deleted'] = 'Het commentaar is met succes verwijderd.';
$lang['comments_deleted'] = 'De commentaren zijn met succes verwijder.';
$lang['areyousure'] = 'Verwijder opmerking?';
$lang['comment'] = 'Reactie';
$lang['error'] = 'Fout';
$lang['errorenterauthor'] = 'Vul een naam in.';
$lang['errorentercomment'] = 'Vul een reactie in.';
$lang['errorenteremail'] = 'Foutief e-mailadres';
$lang['errorenterwebsite'] = 'Foutief URL-formaat';
$lang['filters'] = 'Filters ';
$lang['firstpage'] = '<<';
$lang['friendlyname'] = 'Comments ';
$lang['wrongcode'] = 'Verkeerde code ingevoerd, probeer opnieuw.';
$lang['submit'] = 'Toevoegen';
$lang['yourname'] = 'Uw naam';
$lang['needpermission'] = 'Je hebt de &#039;%s&#039; bevoegdheid nodig om deze functie te gebruiken.';
$lang['entercode'] = 'Code in de afbeelding';
$lang['continue_back'] = 'Ga terug naar Pagina';
$lang['comment_awaiting_approval'] = 'Jouw commentaar is ontvangen en wacht op acceptatie';
$lang['sysdefaults'] = 'Terug naar beginwaarden';
$lang['restoretodefaultsmsg'] = 'De opdracht reset de template inhoud naar de standaard waardes. Weet je zeker dat je dit wilt doen?';
$lang['comments'] = 'Opmerkingen';
$lang['list_template'] = 'Opmerkingen weergave template';
$lang['list_template_updated'] = 'De Opmerkingen weergave template is met succes bijgewerkt.';
$lang['submit_template'] = 'Toevoegen template';
$lang['submit_template_updated'] = 'De Toevoegen template is met succes bijgewerkt.';
$lang['options'] = 'Opties';
$lang['options_updated'] = 'De opties zijn met succes opgeslagen.';
$lang['nocommentsfound'] = 'Geen opmerkingen gevonden';
$lang['help_akismet_check'] = '<b>Controleer voor SPAM</b> - Aanvinken als je Akismet wilt gebruiken om spam te detecteren. <b>Let op: Hiervoor moet de CMSakismet module ge&iuml;nstalleerd zijn.</b>';
$lang['author'] = 'Schrijver';
$lang['comment_title'] = 'Titel';
$lang['data'] = 'Opmerkingen inhoud';
$lang['email'] = 'E-mail';
$lang['modulename'] = 'Module naam';
$lang['website'] = 'Web-site';
$lang['lastpage'] = '>>';
$lang['nextpage'] = '>';
$lang['pageid'] = 'Pagina';
$lang['page'] = 'Pagina';
$lang['page_of'] = 'Pagina %s van %s';
$lang['page_limit'] = 'Pagina limiet';
$lang['postdate'] = 'Post datum';
$lang['prevpage'] = '<';
$lang['trackback'] = 'Trackback ';
$lang['help_enable_trackbacks'] = '<b>Activeer Trackbacks</b> - Selecteer dit vakje om de trackback functionaliteit in te schakelen voor commentaren.';
$lang['check_trackback_url'] = 'Deze URL is alleen voor trackbacks.';
$lang['help_enable_trackback_backlink_check'] = '<b>Schakel Backlink controle in voor Trackbacks</b> -  	
Om te controleren of de website van de afzender een link bevat naar uw website.';
$lang['authornotifymsg'] = 'Een nieuw commentaar is geplaatst op on &#039;%s&#039;';
$lang['authornotifysubj'] = 'Nieuwe commentaren op &#039;%s&#039;';
$lang['authornotify'] = 'Ontvangstbericht';
$lang['editcomment_authornotify'] = 'Breng de auteur op de hoogte van verdere berichten op dit onderwerp';
$lang['editor'] = 'Edit.Com. ';
$lang['ip'] = 'Auteurs IP';
$lang['help_enable_cookie_support'] = '<b>Schakel Cookie ondersteuning in</b> - Dit zorgt ervoor dat een bezoeker niet steeds zijn/haar naam, e-mail, etc. hoeft in te vullen.';
$lang['createdate'] = 'Aanmaak datum';
$lang['modifydate'] = 'Wijzigings datum';
$lang['delselected'] = 'Verwijder geselecteerde';
$lang['notifysubj'] = 'Opmerkingen op &#039;%s&#039;! ';
$lang['notifymsg'] = 'Een nieuwe opmerking is geplaatst op pagina &#039;%s&#039;. ';
$lang['postinstall'] = 'Vergeet niet:<br />
  1) Make sure to set the <b>&#039;Manage Comments&#039; permission</b> on users who will be administering comments;<br />
  2) Installeer en configureer de <b>CMSMailer module</b> voor mail ondersteuning.';
$lang['helpnumber'] = 'Maximaal aantal getoonde items -- indien leeg worden alle items getoond';
$lang['helpdateformat'] = 'Datum/Tijd formaat vanuit php&#039;s date functie.  Kijk <a href="http://php.net/manual/nl/function.date.php" target="_blank">hier</a> voor een parameterlijst en informatie.';
$lang['helplocaledateformat'] = '<p>You can use this with the lang parameter to get localized dates and <a href="http://us2.php.net/strftime" target="_blank">strftime</a> date formats will be used instead, for example:</p><p><b>English Dates (example output: Thursday, July 19, 2007, 07:51 AM)</b></p><pre>{cms_module module=&#039;comments&#039; localedateformat=&#039;%B %d, %Y, %I:%M %p&#039; lang=&#039;en_US&#039;}</pre><p><b>French Dates (example output: jeudi, juillet 19, 2007, 07:51)</b></p><pre>{cms_module module=&#039;comments&#039; localedateformat=&#039;%B %d, %Y, %I:%M %p&#039; lang=&#039;fr_FR&#039;}</pre>';
$lang['localedateformat_error'] = 'Fout!: Calling setlocale to set time format did not work because locale functionality is not implemented on your platform, the specified locale does not exist, or the category name is invalid.';
$lang['helpnotify'] = '<b>Notify</b> - E-mail adres voor nieuw commentaar notificaties. Indien niet opgegeven worden er geen notificaties verstuurd.';
$lang['edit_comment'] = 'Wijzig Commentaar';
$lang['helpmoderate'] = '<b>Moderate</b> - Inactieve nieuwe commentaren. Ze moeten actief gemaakt worden door een beheerder voordat ze zichtbaar zijn op de site.';
$lang['comment_moderation_enabled'] = 'Belangrijk: Commenteer moderatie staat aan. Dit Commenteer moet eerst goedgekeurd worden voordat het getoond zal worden.';
$lang['helpspamprotect'] = '<b>Spam protection</b> - Bescherm commentaren tegen spam. Zet dit aan en maak gebruik van de Captcha module om automatische spam commentaren tegen te gaan. <b>De module Captcha moet ge&iuml;nstalleerd zijn om gebruik te kunnen maken van deze functie.</b>';
$lang['help_disable_html'] = '<b>Zet HTML Functie uit</b> - Aanvinken als je het gebruik van HTML in commentaar NIET toestaat';
$lang['help'] = '	<h3>Wat dit doet?</h3>
	<p>
	De module Comments is een tagmodule. Het wordt gebruikt om commentaren aan individuele pagina&#039;s toe te voegen die door gebruikers kunnen worden gelezen die de pagina later bezoeken. De praktische reden voor deze module is voor documentatiepagina&#039;s, zodat de gebruikers extra commentaren en informatie aan de pagina kunnen toevoegen.
	</p>
	<h3>Hoe gebruik ik het?</h3>
	<code>{cms_module module=&quot;comments&quot; notify=&quot;myemail@example.com&quot; spamprotect=1}</code></p>
	<p>To enable email notifications, set up and configure CMSMailer module and include 
	recipient email in the <i>notify</i> parameter.</p>
	<p>Make sure to set the &#039;Manage Comments&#039; permission on users who will be administering comments.</p>
	<h3>Parameters</h3>
	<ul>
		<li><i>number</i> - number of comments on the page.  If not specifid, all comments are shown.</li>
		<li><i>notify</i> - email address for post notifications.  If not specifid, notifications won&#039;t be sent.</li>
		<li><i>spamprotect</i> - set to 1 to protect comments for spam. If not set, no spam protection will be used.</li>
		<li><i>moderate</i> - set to 1 if new comments should be set as inactive.  They must then be set as active by an admin before being displayed on the site.</li>
		<li><i>emailfield</i> - set to 1 to allow users enter their email address. If not set, email field won&#039;t show.</li>
		<li><i>websitefield</i> - set to 1 to allow users enter their website url. If not set, website field won&#039;t show.</li>
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
$lang['utma'] = '156861353.4482586581539311000.1235506828.1235987807.1235989670.4';
$lang['utmz'] = '156861353.1235987807.3.3.utmcsr=forum.cmsmadesimple.org|utmccn=(referral)|utmcmd=referral|utmcct=/index.php';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>