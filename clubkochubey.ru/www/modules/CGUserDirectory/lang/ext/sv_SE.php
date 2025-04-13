<?php
$lang['addedit_browseprop_template'] = 'Add/Edit Browse Property Template';
$lang['addedit_detail_template'] = 'L&auml;gg till/redigera Detaljmall';
$lang['addedit_directory_template'] = 'L&auml;gg till/redigera Directorymall';
$lang['addedit_searchform_template'] = 'L&auml;gg till/redigera S&ouml;k formul&auml;rsmall';
$lang['addedit_summary_template'] = 'L&auml;gg till/redigera Summeringsmall';
$lang['all'] = 'Alla';
$lang['any'] = 'Valfri';
$lang['ask_really_uninstall'] = '&Auml;r du s&auml;ker p&aring; att du vill radera denna modul? Forts&auml;tter du s&aring; kommer du att f&ouml;rlora all associerade data.';
$lang['changelog'] = '<ul>
<li>Version 1.0 - Januari, 2009
  <p>F&ouml;rsta utg&aring;van</p>
</li>
</ul>';
$lang['created'] = 'Skapad';
$lang['error_invalidgroup'] = 'Ogiltig grupp';
$lang['error_invalidsortfield'] = 'Ogiltigt sorteringsf&auml;lt: %s';
$lang['error_missingparam'] = 'Otillr&auml;ckliga parametrar';
$lang['error_nofeu'] = 'Frontend User-modulen kunde inte hittas';
$lang['error_usernotfound'] = 'Kunde inte hitta n&aring;gon anv&auml;ndare med detta id';
$lang['expires'] = 'F&ouml;rfaller';
$lang['friendlyname'] = 'Calguys UserDirectory';
$lang['groups'] = 'Grupper';
$lang['help'] = '<h3>What does this do?</h3>
  <p>This module provides the ability for generating a directory of users from the FEU module, for generating a summary view of users matching specified criteria, and for displaying a detail report of a specific user.  It can be used for generating profile pages for your users, or a staff directory.</p>
<h3>Features:</h3>
<ul>
  <li>Complete template control
<p>All displays are completely configurable by templates allowing for javascript, ajax, or any other fancy displays.  Styling is completely controllable by the website developer.</p>
  </li>
  <li>Multiple database templates.
<p>You can configure multiple different views for each display, and use them under different situations.</p>
  </li>
<li>Filter summary views on user properties.
   <p>You can filter the output for the summary view based on the value of a specific user property from the FEU module.  This also includes &quot;LIKE&quot; based critera.
  </li>
  <li>Sorting on multiple different criteria.</li>
  <li>Supports SEO friendly URLS</li>
</ul>
<h3>How do I use it?</h3>
<p>The simplest way to use this module is to place a tag like this into your page template, or page content <code>{CGUserDirectory}</code>.  To expand on this functionality, or to display a subset of your users, see the parameters below.</p>
<h3>Examples:</h3>
<ul>
<li>Display a directory of all users:
<p><code>{CGUserDirectory action=&quot;directory&quot;}</code></p>
</li>
<li>Display a directory of all users organized by city:
<p><code>{CGUserDirectory action=&quot;directory&quot; prop=&quot;city&quot;}</code></p>
</li>
<li>Display a summary list of all users in the &quot;members&quot; group:
<p><code>{CGUserDirectory group=&quot;members&quot;}</code></p>
</li>
<li>Display a summary list of all users in the city of calgary:
<p><code>{CGUserDirectory prop=&quot;city&quot; propval=&quot;calgary&quot;}</code></p>
</li>
<li>Display a summary list of all users from countries that begin with C:
<p><code>{CGUserDirectory prop=&quot;city&quot; uselike=1 propval=&quot;c%&quot;}</code></p>
</li>

</ul>

<h3>Notes about pretty URLS</h3>
<p>&quot;Pretty&quot; or SEO friendly URLS limits the flexibility of this module, and the parameters that can be specified on the tag. Particularly those that can be passed on to subsequent views.  For this reason, the directory view does not generate pretty urls to the subsequent summary links.  This allows parameters like detailpage, detailtemplate, and summarytemplate to be passed in the tag to the directory view and to have those parameters passed down to the subsequent summary detail views.</p>
</p>
<h3>Support</h3>
<p>This module does not include commercial support. However, there are a number of resources available to help you with it:</p>
<ul>
<li>For the latest version of this module, FAQs, or to file a Bug Report or buy commercial support, please visit the cms development forge at <a href="http://dev.cmsmadesimple.org">dev.cmsmadesimple.org</a>.</li>
<li>Additional discussion of this module may also be found in the <a href="http://forum.cmsmadesimple.org">CMS Made Simple Forums</a>.</li>
<li>The author, calguy1000 all can often be found in the <a href="irc://irc.freenode.net/#cms">CMS IRC Channel</a>.</li>
<li>Lastly, you may have some success emailing the author(s) directly.</li>  
</ul>

<h3>Copyright and License</h3>
<p>Copyright &copy; 2008, Robert Campbel <a href="mailto:calguy1000@cmsmadesimple.org"><calguy1000@cmsmadesimple.org></a>. All Rights Are Reserved.</p>
<p>This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.</p>
<p>However, as a special exception to the GPL, this software is distributed
as an addon module to CMS Made Simple.  You may not use this software
in any Non GPL version of CMS Made simple, or in any version of CMS
Made simple that does not indicate clearly and obviously in its admin 
section that the site was built with CMS Made simple.</p>
<p>This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
Or read it <a href="http://www.gnu.org/licenses/licenses.html#GPL">online</a></p>';
$lang['help_param_action'] = 'This parameter controls the behaviour of the module.  There are three possible values:
<ul>
  <li>default - Displays a summary view of users that match the specified criteria, or all users if no critieria is specified.</li>
  <li>directory - Displays an alphabetical directory of links to summary views to users that match the specified criteria.  It is possible to create directory views on username, or on any other parameter</li>
  <li>detail - Displays a detail report about a specific user.</li>
</ul>';
$lang['help_param_browseproptemplate'] = 'Denna parameter till&aring;ter att man anger en icke standard egendomsmall.';
$lang['help_param_group'] = 'Anv&auml;nd med Default s&aring; ska denna parameter inneh&aring;lla namnet p&aring; en FEU anv&auml;ndargruppen och kommer att begr&auml;nsa visningen till medlemmar av den gruppen.';
$lang['help_param_gid'] = 'Anv&auml;nd med Default s&aring; ska denna parameter inneh&aring;lla ID:t p&aring; en FEU anv&auml;ndargruppen och kommer att begr&auml;nsa visningen till medlemmar av den gruppen. Denna parameter kan inte anv&auml;ndas tillsammans med Group parametern.';
$lang['help_param_showexpired'] = 'Grundinst&auml;llningen &auml;r att systemet exkluderar anv&auml;ndarkonton som har g&aring;tt ut. St&auml;lls parametern till 1 s&aring; inkluderas dessa anv&auml;ndare.';
$lang['help_param_bsortby'] = 'Used for the browse action, this parameter specifies the sort order of the generated property output.  Possible values are:
<ul>
  <li>name - the property name.</li>
  <li>count - the number of matches.</li>
</ul>';
$lang['help_param_sparse'] = 'Applicable only to the directory view this option will only show a directory  letter for which there are matching users.';
$lang['help_param_resultpage'] = 'Anv&auml;nds f&ouml;r att s&ouml;ka och bl&auml;ddra bland olika kriterier samt anger vilken inneh&aring;llssida som ska visa resultatet f&ouml;r matchande artiklar.';
$lang['help_param_sortby'] = 'Anv&auml;nd som grundinst&auml;llning, denna parameter specificerar hur resultatet ska sorteras. M&ouml;jliga v&auml;rden &auml;r:
<ul>
 <li>id - Anv&auml;ndarens id.</li>
 <li>username - Anv&auml;ndarnamnet.</li>
 <li>createdate - Datumet d&aring; kontot skapades.</li>
 <li>expires - Datumet kontot avslutas (eller har avslutats)</li>
 <li>activity - Datumet f&ouml;r senaste aktivitet (inloggad eller utloggad).</li>
</ul>';
$lang['help_param_bsortorder'] = 'Used for the browse action, this parameter specifies the sort order of the generated output.  Possible values are:
<ul>
  <li>ASC - Ascending order</li>
  <li>DESC - Descending order</li>
</ul>';
$lang['help_param_sortorder'] = 'Anv&auml;nd som grundinst&auml;llning, denna parameter specificerar hur resultatet ska sorteras. M&ouml;jliga v&auml;rden &auml;r:
<ul>
  <li>ASC - Stigande ordning</li>
  <li>DESC - Fallande ordning</li>
</ul>';
$lang['help_param_pagelimit'] = 'Anv&auml;nds f&ouml;r standard&aring;tg&auml;rden, denna parameter anger det h&ouml;gsta antalet poster som skall returneras.';
$lang['help_param_prop'] = 'Used for the default and directory actions, this parameter behaves in two different ways depending upon the action:
<ul>
  <li>The default (summary) action
    <p>In the default (summary) action, this parameter can be used to specify a property to filter the results by.</p>
  </li>
  <li>The directory action.
    <p>In the directory action, this aprameter can be used to specify a property to generate a directory from.   The default value in the directory action is &quot;unsername&amp;quote;</p>
  </li>
</ul>';
$lang['help_param_propval'] = 'Anv&auml;nd tillsammans med &quot;prop&quot; parametern f&ouml;r grundvisningen d&auml;r ett specifikt v&auml;rde kan anv&auml;ndas till att filtrera anv&auml;ndare.';
$lang['help_param_uselike'] = 'Used in conjunction with the &quot;prop&quot; and &quot;propval&quot; parameters, this parameter, if set to a positive integer value indicates that the propval parameter contains a LIKE expression';
$lang['help_param_detailpage'] = 'Denna parameter, om den anges, b&ouml;r inneh&aring;lla pageid eller alias f&ouml;r en CMS inneh&aring;lls sida d&auml;r du vill visa en detaljerad rapport';
$lang['help_param_summarytemplate'] = 'Denna parameter till&aring;ter att man anger en icke standard summeringsmall namn som ska anv&auml;ndas n&auml;r sammanst&auml;llningen visas';
$lang['help_param_detailtemplate'] = 'Denna parameter till&aring;ter att man anger en icke standard detaljmalls namn som ska anv&auml;ndas n&auml;r detaljer visas';
$lang['help_param_directorytemplate'] = 'Denna parameter till&aring;ter att man anger en icke standard katalogmalls namn som ska anv&auml;ndas n&auml;r katalogen visas';
$lang['help_param_searchformtemplate'] = 'Denna parameter till&aring;ter att man anger en icke standard s&ouml;kfunktion som du ska anv&auml;nda f&ouml;r att s&ouml;ka former';
$lang['help_param_searchproperty'] = 'This parameter allows specifying a single additional FEU property name to supply in the search form';
$lang['help_param_uid'] = 'Anv&auml;nds i samband med detalj displayen, denna parameter m&aring;ste inneh&aring;lla uid ett giltigt frontend anv&auml;ndarkonto';
$lang['info_browseprop_template'] = 'Browse Property templates display A list of unique values for the specified property.  Each item in the list is a link to a summary view containing the matching users that match that property value.  You may use any smarty logic or variables that have been created previously, or the ones made availability specifically for this view.';
$lang['info_browseprop_templates_tab'] = 'This tab contains the list of available browse property view templates.  One of them is marked as default.  The default one will be used when no alternate template name is supplied on the tag that calls this module';
$lang['info_detail_template'] = 'Detail templates display detailed information about a specific frontend user.  Here you design the way in which you want that information laid out.  You may use any smarty logic or variables that have been designed previously, or the ones made available specifically for this view';
$lang['info_detail_templates_tab'] = 'This tab contains the list of available detail view templates.  One of them is marked as default.  The default one will be used when no alternate template name is supplied on the tag that calls this module';
$lang['info_directory_template'] = 'Directory templates display an alphabetical list of links, when a link is clicked it will display a summary view of the matching users for that letter.  It is possible to create directories based on different properties.  Here you design the way in which you want that information laid out.  You may use any smarty logic or variables that have been designed previously, or the ones made available specifically for this view';
$lang['info_directory_templates_tab'] = 'This tab contains the list of available directory templates.  One of them is marked as default.  The default one will be used when no alternate template name is supplied on the tag that calls this module';
$lang['info_summary_template'] = 'Summary templates display information about a list of users that match a criteria.  Here you design the way in which you want that information laid out.  You may use any smarty logic or variables that have been designed previously, or the ones made available specifically for this view';
$lang['info_searchform_template'] = 'Search form templates display A form to allow searching for a particular user or group of users.  Here you design the way in which you want the form displayed.  You may use any smarty logic or variables that have been designed previously, or the ones made available specifically for this view';
$lang['info_searchform_templates_tab'] = 'This tab contains the list of available search form templates.  One of them is marked as default.  The default one will be used when no alternate template name is supplied on the tag that calls this module';
$lang['info_summary_templates_tab'] = 'This tab contains the list of available summary templates.  One of them is marked as default.  The default one will be used when no alternate template name is supplied on the tag that calls this module';
$lang['info_sysdflt_browseprop_template'] = 'System Default Browse Property View Template';
$lang['info_sysdflt_detail_template'] = 'Standard Detaljmall';
$lang['info_sysdflt_directory_template'] = 'Standard Directorymall';
$lang['info_sysdflt_searchform_template'] = 'Standard S&ouml;kmall';
$lang['info_sysdflt_summary_template'] = 'Standard Summeringsmall';
$lang['info_sysdflt_template'] = '&Auml;ndring av den h&auml;r mallen kommer inte att ha n&aring;gon omedelbar effekt p&aring; befintliga mallar. Denna form styr v&auml;rdet p&aring; den mall som skapas n&auml;r du klickar p&aring; &quot;New Template&quot; i l&auml;mplig mall flik.';
$lang['last_active'] = 'Senast aktiv';
$lang['lbl_browseproptemplates'] = 'Browse Property Templates';
$lang['lbl_defaulttemplates'] = 'Standarmallar';
$lang['lbl_detailtemplates'] = 'Detaljmallar';
$lang['lbl_directorytemplates'] = 'Directorymallar';
$lang['lbl_first_page'] = 'G&aring; till f&ouml;rsta sidan';
$lang['lbl_last_page'] = 'G&aring; till sista sidan';
$lang['lbl_next_page'] = 'G&aring; till n&auml;sta sida';
$lang['lbl_prev_page'] = 'G&aring; till f&ouml;reg&aring;ende sida';
$lang['lbl_searchformtemplates'] = 'S&ouml;kformul&auml;rsmall';
$lang['lbl_settings'] = 'Inst&auml;llningar';
$lang['lbl_summarytemplates'] = 'Summeringsmallar';
$lang['moddescription'] = 'En modul som g&ouml;r det m&ouml;jligt att s&ouml;ka, bl&auml;ddra och visa information om Frontend Users';
$lang['of'] = 'Av';
$lang['page'] = 'Sida';
$lang['postinstall'] = 'CGUserDirectory modulen &auml;r nu f&auml;rdig f&ouml;r konfiguration';
$lang['postuninstall'] = 'CGUserdirectory modulen, och all associerad data &auml;r nu raderat i databasen';
$lang['results_all_any'] = 'Return results that match all, or any of the conditions specified';
$lang['submit'] = 'Skicka';
$lang['username'] = 'Anv&auml;ndarnamn';
$lang['qca'] = 'P0-245748072-1251504180990';
$lang['utmz'] = '156861353.1269894903.22.15.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=modules cmsms';
$lang['utma'] = '156861353.2917280715391859000.1251504181.1269540149.1269891113.22';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353.1.10.1269891113';
?>