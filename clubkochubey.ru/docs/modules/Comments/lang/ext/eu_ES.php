<?php
$lang['description'] = 'comments moduluak bisitariari zure webgunean iruzkinak uzteko ahalmena ematen dio';
$lang['addacomment'] = 'Iruzkin bat gehitu';
$lang['active'] = 'Aktibatu';
$lang['cancel'] = 'Ezeztatu';
$lang['edit'] = 'Editatu';
$lang['comment_updated'] = 'Iruzkina arazorik gabe eguneratu da.';
$lang['delete'] = 'Ezabatu';
$lang['comment_deleted'] = 'Iruzkina arazorik gabe ezabatu da.';
$lang['comments_deleted'] = 'Iruzkinak arazorik gabe eguneratu dira.';
$lang['areyousure'] = 'Iruzkina ezabatu?';
$lang['comment'] = 'Iruzkina';
$lang['error'] = 'Errorea';
$lang['errorenterauthor'] = 'Egilea sartu';
$lang['errorentercomment'] = 'Iruzkin bat sartu';
$lang['errorenteremail'] = 'Emailaren formatua ez da zuzena';
$lang['errorenterwebsite'] = 'URL-aren formatua ez da zuzena';
$lang['wrongcode'] = 'Kodea ez da zuzena. Saiatu berriro.';
$lang['submit'] = 'Bidali';
$lang['yourname'] = 'Zure Izena';
$lang['needpermission'] = '&#039;%s&#039; baimena behar duzu funtzio hau aurrera eramateko.';
$lang['entercode'] = 'Marrazkiko kodea';
$lang['continue_back'] = 'Orrialdera Itzuli';
$lang['comment_awaiting_approval'] = 'Zure iruzkina jaso da eta baimentze prozesuan dago';
$lang['sysdefaults'] = 'Lehenetsietara itzuli';
$lang['restoretodefaultsmsg'] = 'Eragiketa honek txantiloiaren edukiak lehenetsietara itzuliko ditu. Hau egin nahi duzula zihur al zaude?';
$lang['comments'] = 'Iruzkinak';
$lang['list_template'] = 'Iruzkin &quot;Display&quot; Txantiloia';
$lang['list_template_updated'] = 'Iruzkin &quot;Display&quot; Txantiloia arazorik gabe eguneratu da.';
$lang['submit_template'] = 'Inprimaki Txantiloia Bidali';
$lang['submit_template_updated'] = 'The Submit Form Template was successfully updated.';
$lang['options'] = 'Aukerak';
$lang['options_updated'] = 'Aukerak arazorik gabe gorde dira.';
$lang['nocommentsfound'] = 'Ez da iruzkinik topatu';
$lang['help_akismet_check'] = '<b>Check for Spam</b> - Check this box to use Akismet module to detect spam. <b>Note: Using this feature requires that the CMSakismet module be installed.</b>';
$lang['author'] = 'Egilea';
$lang['data'] = 'Iruzkinaren textua';
$lang['email'] = 'Emaila';
$lang['modulename'] = 'Moduluaren Izena';
$lang['website'] = 'Webgunea';
$lang['pageid'] = 'Orrialdea';
$lang['postdate'] = 'Bidaltze-data';
$lang['createdate'] = 'Sortze-data';
$lang['modifydate'] = 'Eguneraketa-data';
$lang['delselected'] = 'Hautatutakoa ezabatu';
$lang['notifysubj'] = 'Comment on &#039;%s&#039;! ';
$lang['notifymsg'] = '&#039;%s&#039; orrialdean iruzkin berri bat argitaratu da.';
$lang['postinstall'] = 'Don&#039;t forget to:<br />
  1) Make sure to set the <b>&#039;Manage Comments&#039; permission</b> on users who will be administering comments;<br />
  2) Install and configure the <b>CMSMailer module</b> to support mailing functionality.';
$lang['helpnumber'] = 'Maximum number of items to display -- leaving empty will show all items';
$lang['helpdateformat'] = 'Date/Time format using parameters from php&#039;s date function.  See
	<a href=&quot;http://php.net/date&quot; target=&quot;_blank&quot;>here</a> for a parameter list and information.';
$lang['helplocaledateformat'] = '<p>You can use this with the lang parameter to get localized dates and <a href=&quot;http://us2.php.net/strftime&quot; target=&quot;_blank&quot;>strftime</a> date formats will be used instead, for example:</p><p><b>English Dates (example output: Thursday, July 19, 2007, 07:51 AM)</b></p><pre>{cms_module module=&#039;comments&#039; localedateformat=&#039;%B %d, %Y, %I:%M %p&#039; lang=&#039;en_US&#039;}</pre><p><b>French Dates (example output: jeudi, juillet 19, 2007, 07:51)</b></p><pre>{cms_module module=&#039;comments&#039; localedateformat=&#039;%B %d, %Y, %I:%M %p&#039; lang=&#039;fr_FR&#039;}</pre>';
$lang['localedateformat_error'] = 'Error: Calling setlocale to set time format did not work because locale functionality is not implemented on your platform, the specified locale does not exist, or the category name is invalid.';
$lang['helpnotify'] = '<b>Notify</b> - email address for new comment notifications.  If not specified, notifications will not be sent.';
$lang['edit_comment'] = 'Iruzkina Editatu';
$lang['helpmoderate'] = '<b>Moderate</b> - Inactivate new comments.  They must then be set as active by an admin before being displayed on the site.';
$lang['comment_moderation_enabled'] = 'Important: Comment moderation is enabled. You will need to activate this comment before it will show up on your page.';
$lang['helpspamprotect'] = '<b>Spam Protectection</b> - Protect comments from spam. Check this box to use the Captcha module to help prevent automated comment spam. <b>Using this feature requires that the Captcha module be installed.</b>';
$lang['help_disable_html'] = '<b>Disable HTML</b> - Check this box to disable HTML in comments.';
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
$lang['utma'] = '156861353.775372662.1187730593.1187730593.1187730593.1';
$lang['utmc'] = '156861353';
$lang['utmz'] = '156861353.1187730593.1.1.utmccn=(direct)|utmcsr=(direct)|utmcmd=(none)';
?>