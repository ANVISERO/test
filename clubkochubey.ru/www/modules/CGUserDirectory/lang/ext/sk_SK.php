<?php
$lang['addedit_detail_template'] = 'Pridať/Upraviť &scaron;abl&oacute;nu detailu';
$lang['addedit_directory_template'] = 'Pridať/Upraviť  &scaron;abl&oacute;nu adres&aacute;ra';
$lang['addedit_summary_template'] = 'Pridať/Upraviť &scaron;abl&oacute;nu prehľadu';
$lang['ask_really_uninstall'] = 'Ste si ist&yacute;?  Pokračovan&iacute;m odstr&aacute;niť v&scaron;etky d&aacute;ta s&uacute;visiace s t&yacute;mto modulom';
$lang['changelog'] = '<ul>
<li>Verzia 1.0 - January, 2009
  <p>Initial Release</p>
</li>
</ul>';
$lang['created'] = 'Vytvoren&yacute;';
$lang['error_invalidgroup'] = 'Neplatn&aacute; skupina';
$lang['error_invalidsortfield'] = 'Neplatn&eacute; pole pre triedenie: %s';
$lang['error_missingparam'] = 'Nedostatok parametrov';
$lang['error_nofeu'] = 'Modul Frontend Users  nen&aacute;jden&yacute;';
$lang['error_usernotfound'] = 'Už&iacute;vateľ so zadan&yacute;m id nen&aacute;jden&yacute;';
$lang['expires'] = 'Vypr&scaron;&iacute;';
$lang['friendlyname'] = 'Calguyov&eacute; zoznamy už&iacute;vateľov';
$lang['groups'] = 'Skupiny';
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
$lang['help_param_group'] = 'Used with the default action, this parameter should contain the name of an FEU user group, and will limit the output to members of that group';
$lang['help_param_gid'] = 'Used with the default action, this parameter should contain the id of an FEU user group, and will limit the output to members of that group.  This parameter cannot be used in conjunction with the group parameter.';
$lang['help_param_showexpired'] = 'By default, the system will exclude expired users from any generated report.  Setting this parameter to 1 will include these users.';
$lang['help_param_sortby'] = 'Used for the default action, this parameter specifies the sorting of the generated output.  Possible values are:
<ul>
 <li>id - The users id</li>
 <li>username - The users username</li>
 <li>createdate - The date at which the user account was created.</li>
 <li>expires - The date at which the user account will expire (or did expire).</li>
 <li>activity - The date at which the user account was last logged in or logged out.</li>
</ul>';
$lang['help_param_sortorder'] = 'Used for the default action, this parameter specifies the sort order of the generated output.  Possible values are:
<ul>
  <li>ASC - Ascending order</li>
  <li>DESC - Descending order</li>
</ul>';
$lang['help_param_pagelimit'] = 'Used for the default action, this parameter specifies the maximum number of items to be returned.';
$lang['help_param_prop'] = 'Used for the default and directory actions, this parameter behaves in two different ways depending upon the action:
<ul>
  <li>The default (summary) action
    <p>In the default (summary) action, this parameter can be used to specify a property to filter the results by.</p>
  </li>
  <li>The directory action.
    <p>In the directory action, this aprameter can be used to specify a property to generate a directory from.   The default value in the directory action is &quot;unsername&amp;quote;</p>
  </li>
</ul>';
$lang['help_param_propval'] = 'Used in conjunction with the &quot;prop&quot; parameter for the default (summary) action, this parameter allows specifying a value on which to filter users by.';
$lang['help_param_uselike'] = 'Used in conjunction with the &quot;prop&quot; and &quot;propval&quot; parameters, this parameter, if set to a positive integer value indicates that the propval parameter contains a LIKE expression';
$lang['help_param_detailpage'] = 'This parameter, if specified, should contain the pageid or alias of a CMS content page on which you would like to show any detail report';
$lang['help_param_summarytemplate'] = 'This parameter allows specifying a non default summary template name to use for summary displays';
$lang['help_param_detailtemplate'] = 'This parameter allows specifying a non default detail template name to use for detail displays';
$lang['help_param_directorytemplate'] = 'This parameter allows specifying a non default directory template name to use with directory displays';
$lang['help_param_uid'] = 'Used in conjunction with the detail display, this parameter must contain the uid of a valid frontend user account';
$lang['info_detail_template'] = 'Detail templates display detailed information about a specific frontend user.  Here you design the way in which you want that information laid out.  You may use any smarty logic or variables that have been designed previously, or the ones made available specifically for this view';
$lang['info_detail_templates_tab'] = 'This tab contains the list of available detail view templates.  One of them is marked as default.  The default one will be used when no alternate template name is supplied on the tag that calls this module';
$lang['info_directory_template'] = 'Directory templates display an alphabetical list of links, when a link is clicked it will display a summary view of the matching users for that letter.  It is possible to create directories based on different properties.  Here you design the way in which you want that information laid out.  You may use any smarty logic or variables that have been designed previously, or the ones made available specifically for this view';
$lang['info_directory_templates_tab'] = 'This tab contains the list of available directory templates.  One of them is marked as default.  The default one will be used when no alternate template name is supplied on the tag that calls this module';
$lang['info_summary_template'] = 'Summary templates display information about a list of users that match a criteria.  Here you design the way in which you want that information laid out.  You may use any smarty logic or variables that have been designed previously, or the ones made available specifically for this view';
$lang['info_summary_templates_tab'] = 'This tab contains the list of available summary templates.  One of them is marked as default.  The default one will be used when no alternate template name is supplied on the tag that calls this module';
$lang['info_sysdflt_detail_template'] = 'Prednastaven&aacute; &scaron;abl&oacute;na pre detail';
$lang['info_sysdflt_directory_template'] = 'Prednastaven&aacute; &scaron;abl&oacute;na pre adres&aacute;r';
$lang['info_sysdflt_summary_template'] = 'Prednastaven&aacute; &scaron;abl&oacute;na pre v&yacute;pis';
$lang['info_sysdflt_template'] = 'Altering this template will have no immediate effect on any output.  This form controls the value of the template that is created when you click &quot;New Template&quot; in the appropriate template tab.';
$lang['last_active'] = 'Posledn&aacute; zmena';
$lang['lbl_defaulttemplates'] = 'Prednastaven&eacute; &scaron;abl&oacute;ny';
$lang['lbl_detailtemplates'] = '&Scaron;abl&oacute;ny detailu';
$lang['lbl_directorytemplates'] = '&Scaron;abl&oacute;ny adres&aacute;ra';
$lang['lbl_first_page'] = 'Prejsť na prv&uacute; stranu';
$lang['lbl_last_page'] = 'Prejsť na posledn&uacute; stranu';
$lang['lbl_next_page'] = 'Prejsť na nasleduj&uacute;cu stranu';
$lang['lbl_prev_page'] = 'Prejsť na predch&aacute;dzaj&uacute;cu stranu';
$lang['lbl_settings'] = 'Nastavenia';
$lang['lbl_summarytemplates'] = '&Scaron;abl&oacute;ny v&yacute;pisov';
$lang['moddescription'] = 'Modul umožnuje vyhľad&aacute;vanie, zobrazovanie, prech&aacute;dzanie a zobrazovanie inform&aacute;cii o už&iacute;vateľoch';
$lang['of'] = 'z';
$lang['page'] = 'Strana';
$lang['postinstall'] = 'CGUserDirectory modul je pripraven&yacute; na konfigur&aacute;ciu';
$lang['postuninstall'] = 'CGUserdirectory modul bude odin&scaron;talovan&yacute; (vr&aacute;ta d&aacute;t)';
$lang['username'] = 'Už&iacute;vateľsk&eacute; meno';
$lang['utmz'] = '156861353.1231184975.2.2.utmcsr=forum.cmsmadesimple.org|utmccn=(referral)|utmcmd=referral|utmcct=/';
$lang['utma'] = '156861353.2782859655112726500.1231168503.1231168503.1231184975.2';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353.1.10.1231184975';
?>