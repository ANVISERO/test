<?php
$lang['description'] = 'Modul Komentarji omogoča obiskovalcem objavo komentarjev na va&scaron;i spletni strani.';
$lang['addacomment'] = 'Dodaj komentar';
$lang['active'] = 'Aktivno';
$lang['cancel'] = 'Prekliči';
$lang['edit'] = 'Uredi';
$lang['comment_updated'] = 'Komentar je bil uspe&scaron;no spremenjen.';
$lang['delete'] = 'Izbri&scaron;i';
$lang['comment_deleted'] = 'Komentar je bil uspe&scaron;no izbrisan.';
$lang['comments_deleted'] = 'Komentarji so bili uspe&scaron;no izbrisani.';
$lang['areyousure'] = 'Izbri&scaron;em komentar?';
$lang['comment'] = 'Komentar';
$lang['error'] = 'Napaka';
$lang['errorenterauthor'] = 'Vpi&scaron;ite avtorja';
$lang['errorentercomment'] = 'Vpi&scaron;ite komentar (ali ni to namen?)';
$lang['errorenteremail'] = 'E-mail naslov je napačen';
$lang['errorenterwebsite'] = 'URL naslov je napačen';
$lang['filters'] = 'Filtri';
$lang['firstpage'] = '<<';
$lang['friendlyname'] = 'Komentarji';
$lang['wrongcode'] = 'Vne&scaron;ena je bila napačna koda. Prosimo, poizkusite ponovno.';
$lang['submit'] = 'Po&scaron;lji';
$lang['yourname'] = 'Va&scaron;e ime';
$lang['needpermission'] = 'Imeti morate pravice &#039;%s&#039; če želite izvajati to funkcijo.';
$lang['entercode'] = 'Koda na sliki';
$lang['continue_back'] = 'Nazaj na stran';
$lang['comment_awaiting_approval'] = 'Va&scaron; komentar je bil sprejet in čaka na potrditev administratorja';
$lang['sysdefaults'] = 'Povrni na privzeto';
$lang['restoretodefaultsmsg'] = 'Ta operacija bo povrnila vsebino predloge na njene tovarni&scaron;ke nastavitve. Ste prepričani, da želite nadaljevati?';
$lang['comments'] = 'Komentarji';
$lang['list_template'] = 'Predloga za prikaz komentarjev';
$lang['list_template_updated'] = 'Predloga za prikaz komentarjev je bila uspe&scaron;no posodobljena.';
$lang['submit_template'] = 'Predloga za oddajo komentarja';
$lang['submit_template_updated'] = 'Predloga za oddajo komentarja je bila uspe&scaron;no posodobljena.';
$lang['options'] = 'Možnosti';
$lang['options_updated'] = 'Možnosti so bile uspe&scaron;no shranjene';
$lang['nocommentsfound'] = 'Ni komentarjev';
$lang['help_akismet_check'] = '<b>Preverjanje Spam-a</b> - Označite to možnost, če želite uporabiti Akismet modul za ugotavljanje nezaželenih komentarjev <b>Pozor: Če želite uporabljati to možnost morate namestiti modul CMSakismet.</b>';
$lang['author'] = 'Avtor';
$lang['comment_title'] = 'Naslov';
$lang['data'] = 'Besedilo komentarja';
$lang['email'] = 'E-mail';
$lang['modulename'] = 'Ime modula';
$lang['website'] = 'Spletna stran';
$lang['lastpage'] = '>>';
$lang['nextpage'] = '>';
$lang['pageid'] = 'Stran';
$lang['page'] = 'Stran';
$lang['page_of'] = 'Stran %s od %s';
$lang['page_limit'] = 'Omejitev strani';
$lang['postdate'] = 'Datum objave';
$lang['prevpage'] = '<';
$lang['trackback'] = 'Sledilni URL';
$lang['help_enable_trackbacks'] = '<b>Omogoči sledilni URL</b> - Označite to možnost, če želite omogočiti sledilne URL naslove (trackback) pri komentarjih.';
$lang['check_trackback_url'] = 'Ta URL je samo za sledilne URL naslove.';
$lang['help_enable_trackback_backlink_check'] = '<b>Omogoči preverjanje povratne povezave pri sledilnih URL naslovih</b> - Če želite preverjati, ali spletna stran vsebuje povezavo na va&scaron;o stran.';
$lang['authornotifymsg'] = 'Objavljen je bil nov komentar na &#039;%s&#039;';
$lang['authornotifysubj'] = 'Nov komentar na &#039;%s&#039;';
$lang['authornotify'] = 'Obvestilo o odgovoru';
$lang['editor'] = 'Uredi komentar';
$lang['ip'] = 'IP avtorja';
$lang['help_enable_cookie_support'] = '<b>Omogoči pi&scaron;kotke</b> - Obiskovalcem bo omogočalo shranitev obrazca za objavo komentarja, tako da jim ne bo potrebno vedno vpisovati imena, E-maila in drugih nastavitev.';
$lang['createdate'] = 'Datum objave';
$lang['modifydate'] = 'Datum spremembe';
$lang['delselected'] = 'Izbri&scaron;i izbrane';
$lang['notifysubj'] = 'Komentar na &#039;%s&#039;! ';
$lang['notifymsg'] = 'Nov komentar je bil objavljen na strani &#039;%s&#039;. ';
$lang['postinstall'] = 'Don&#039;t forget to:<br />
  1) Make sure to set the <b>&#039;Manage Comments&#039; permission</b> on users who will be administering comments;<br />
  2) Install and configure the <b>CMSMailer module</b> to support mailing functionality.';
$lang['helpnumber'] = 'Največje &scaron;tevilo zapisov za prikaz -- če pustite prazno, bodo prikazani vsi zapisi.';
$lang['helpdateformat'] = 'Date/Time format using parameters from php&#039;s date function.  See
	<a href="http://php.net/date" target="_blank">here</a> for a parameter list and information.';
$lang['helplocaledateformat'] = '<p>You can use this with the lang parameter to get localized dates and <a href="http://us2.php.net/strftime" target="_blank">strftime</a> date formats will be used instead, for example:</p><p><b>English Dates (example output: Thursday, July 19, 2007, 07:51 AM)</b></p><pre>{cms_module module=&#039;comments&#039; localedateformat=&#039;%B %d, %Y, %I:%M %p&#039; lang=&#039;en_US&#039;}</pre><p><b>French Dates (example output: jeudi, juillet 19, 2007, 07:51)</b></p><pre>{cms_module module=&#039;comments&#039; localedateformat=&#039;%B %d, %Y, %I:%M %p&#039; lang=&#039;fr_FR&#039;}</pre>';
$lang['localedateformat_error'] = 'Error: Calling setlocale to set time format did not work because locale functionality is not implemented on your platform, the specified locale does not exist, or the category name is invalid.';
$lang['helpnotify'] = '<b>Obve&scaron;čanje</b> - E-mail naslov za obvestilo o novih komentarjih. Če ta naslov ni določen, obvestila ne bodo poslana.';
$lang['edit_comment'] = 'Uredi komentar';
$lang['helpmoderate'] = '<b>Moderirano</b> - Novi komentarji bodo prikazani na strani &scaron;ele, ko jih potrdi administrator.';
$lang['comment_moderation_enabled'] = 'Pomembno: Omogočeno je moderiranje komentarjev. Komentar morate aktivirati preden bo prikazan na va&scaron;i strani.';
$lang['helpspamprotect'] = '<b>Za&scaron;čita pred nezaželenimi komentarji</b> - Za&scaron;čiti komentarje pred spam-om. Označite to možnost, če želite uporabiti modul Captcha za preprečitev avtomatskih objav komentarjev. <b>Če uporabite to možnost, morate namestiti tudi modul Captcha</b>';
$lang['help_disable_html'] = '<b>Onemogoči HTML</b> - Označite, če ne želite dovoliti HTML oznak v komentarjih.';
$lang['help'] = '	<h3>What does this do?</h3>
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
$lang['utma'] = '156861353.587959277.1217433595.1227543360.1227551485.24';
$lang['utmz'] = '156861353.1227544792.23.13.utmccn=(organic)|utmcsr=google|utmctr=cms made simple login|utmcmd=organic';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>