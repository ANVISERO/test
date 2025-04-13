<?php
#A
$lang['addedit_browseprop_template'] = 'Add/Edit Browse Property Template';
$lang['addedit_detail_template'] = 'Add/Edit Detail Template';
$lang['addedit_directory_template'] = 'Add/Edit Directory Template';
$lang['addedit_searchform_template'] = 'Add/Edit Search Form Template';
$lang['addedit_summary_template'] = 'Add/Edit Summary Template';
$lang['all'] = 'All';
$lang['any'] = 'Any';
$lang['ask_really_uninstall'] = 'Are you sure you want to do this?  Continuing will permanently delete all data associated with this module';

#B


#C
$lang['changelog'] = <<<EOT
<ul>
<li>Version 1.0 - January, 2009
  <p>Initial Release</p>
</li>
<li>Version 1.1
  <p>Adds search and browse capabilities.</p>
</li>
<li>Version 1.1.1 - September, 2009
  <p>Adds sorting in the browse action.</p>
</li>
<li>Version 1.1.2 - September, 2009
  <p>Fix parameter conflict wrt sorting in the browse action.</p>
</li>
<li>Version 1.1.3 - October, 2009
  <p>Minor bug fix.</p>
</li>
<li>Version 1.1.4 - October, 2009
  <p>Minor bug fix.</p>
</li>
<li>Version 1.1.4 - October, 2009
  <p>Add missing lang string.</p>
</li>
<li>Version 1.1.5 - November, 2009
  <p>Minor bug fixes.</p>
</li>
<li>Version 1.1.6 - March, 2010
  <p>Add the ability to sort by user property in summary view</p>
</li>
<li>Version 1.2 - March, 2010
  <p>Adds the ability to search by two user defined properties in the search action.</p>
  <p>Adds numerical options to the directory view.</p>
</li>
<li>Version 1.2.1 - March, 2010
  <p>Modifies the searchproperty field to support a list of property names.</p>
  <p>Completely breaks existing search form templates.</p>
  <p>Removes the short lived searchproperty2 param.</p>
</li>
<li>Version 1.2.2 - June, 2010
  <p>Fixes a minor bug with the showexpired flag.</p>
</li>
</ul>
EOT;
$lang['created'] = 'Created';

#D


#E
$lang['error_invalidgroup'] = 'Invalid group';
$lang['error_invalidsortfield'] = 'Invalid sort field: %s';
$lang['error_missingparam'] = 'Insufficient Parameters';
$lang['error_nofeu'] = 'The Frontend Users module could not be found';
$lang['error_usernotfound'] = 'The user with the specified id could not be found';
$lang['expires'] = 'Expires';

#F
$lang['friendlyname'] = 'Calguys User Directory';

#G
$lang['groups'] = 'Groups';

#H
$lang['help'] = <<<EOT
<h3>What does this do?</h3>
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
<p>Copyright &copy; 2008, Robert Campbel <a href="mailto:calguy1000@cmsmadesimple.org">&lt;calguy1000@cmsmadesimple.org&gt;</a>. All Rights Are Reserved.</p>
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
Or read it <a href="http://www.gnu.org/licenses/licenses.html#GPL">online</a></p>
EOT;
$lang['help_param_action'] = 'This parameter controls the behaviour of the module.  There are three possible values:
<ul>
  <li>browse  - Display a navigation of property values, and allow drilling down to matching summary views.</li>
  <li>default - Displays a summary view of users that match the specified criteria, or all users if no critieria is specified.</li>
  <li>directory - Displays an alphabetical directory of links to summary views to users that match the specified criteria.  It is possible to create directory views on username, or on any other parameter</li>
  <li>detail - Displays a detail report about a specific user.</li>
  <li>search - Displays a search form.</li>
</ul>';
$lang['help_param_browseproptemplate'] = 'This parameter allows specifying a non default browse property template name to use for a property browsing view';
$lang['help_param_group'] = 'Used with the default action, this parameter should contain the name of an FEU user group, and will limit the output to members of that group';
$lang['help_param_gid'] = 'Used with the default action, this parameter should contain the id of an FEU user group, and will limit the output to members of that group.  This parameter cannot be used in conjunction with the group parameter.';
$lang['help_param_showexpired'] = 'By default, the system will exclude expired users from any generated report.  Setting this parameter to 1 will include these users.';
$lang['help_param_bsortby'] = 'Used for the browse action, this parameter specifies the sort order of the generated property output.  Possible values are:
<ul>
  <li>name - the property name.</li>
  <li>count - the number of matches.</li>
</ul>';
$lang['help_param_sparse'] = 'Applicable only to the directory view this option will only show a directory  letter for which there are matching users.';
$lang['help_param_resultpage'] = 'Used for the search, and browse actions, this parameter specifies which CMSMS content page should be used to display the matching articles from the filter operation.';
$lang['help_param_sortby'] = 'Used for the default action, this parameter specifies the sorting of the generated summary output.  Possible values are:
<ul>
 <li>id - The users id (default view only)</li>
 <li>username - The users username (default view only)</li>
 <li>createdate - The date at which the user account was created. (default view only)</li>
 <li>expires - The date at which the user account will expire (or did expire). (default view only)</li>
 <li>activity - The date at which the user account was last logged in or logged out. (default view only)</li>
 <li>f:propertyname - This allows sorting the output by a specified FEU property name. i.e: f:full_name.  <strong>Note:</strong> you may experience unexpected results if the group being displayed does not have that property, or not every user in the resulting set has that property defined.  Also, you may experience unexpected results if the field specified is not a text string.  You may have to adjust the sortorder parameter to get the desired output</ul>';
$lang['help_param_bsortorder'] = 'Used for the browse action, this parameter specifies the sort order of the generated output.  Possible values are:
<ul>
  <li>ASC - Ascending order</li>
  <li>DESC - Descending order</li>
</ul>';
$lang['help_param_sortorder'] = 'Used for the default action, this parameter specifies the sort order of the generated output.  Possible values are:
<ul>
  <li>ASC - Ascending order</li>
  <li>DESC - Descending order</li>
</ul>';
$lang['help_param_pagelimit'] = 'Used for the default action, this parameter specifies the maximum number of items to be returned.';
$lang['help_param_prop'] = 'Used for the default,browse and directory actions, this parameter behaves in two different ways depending upon the action:
<ul>
  <li>The default (summary) action
    <p>In the default (summary) action, this parameter can be used to specify a property to filter the results by.  It works in conjunction with the propval parameter below.</p>
  </li>
  <li>The browse action
    <p>In the browse action, this parameter can be used to specify an FEU property to browse</p>
  </li>
  <li>The directory action.
    <p>In the directory action, this aprameter can be used to specify a property to generate a directory from.   The default value in the directory action is &quot;username&quote;</p>
  </li>
</ul>';
$lang['help_param_propval'] = 'Used in conjunction with the &quot;prop&quot; parameter for the default (summary) action, this parameter allows specifying a value on which to filter users by.';
$lang['help_param_uselike'] = 'Used in conjunction with the &quot;prop&quot and &quot;propval&quot; parameters, this parameter, if set to a positive integer value indicates that the propval parameter contains a LIKE expression';
$lang['help_param_detailpage'] = 'This parameter, if specified, should contain the pageid or alias of a CMS content page on which you would like to show any detail report';
$lang['help_param_summarytemplate'] = 'This parameter allows specifying a non default summary template name to use for summary displays';
$lang['help_param_detailtemplate'] = 'This parameter allows specifying a non default detail template name to use for detail displays';
$lang['help_param_directorytemplate'] = 'This parameter allows specifying a non default directory template name to use with directory displays';
$lang['help_param_searchformtemplate'] = 'This parameter allows specifying a non default search template name to use in search forms';
$lang['help_param_searchproperty'] = 'This parameter allows specifying a single or comma separated list of additional FEU property names to supply in the search form';
$lang['help_param_uid'] = 'Used in conjunction with the detail display, this parameter must contain the uid of a valid frontend user account';

#I
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
$lang['info_sysdflt_detail_template'] = 'System Default Detail View Template';
$lang['info_sysdflt_directory_template'] = 'System Default Directory Template';
$lang['info_sysdflt_searchform_template'] = 'System Default Search Form Template';
$lang['info_sysdflt_summary_template'] = 'System Default Summary View Template';
$lang['info_sysdflt_template'] = 'Altering this template will have no immediate effect on any output.  This form controls the value of the template that is created when you click &quot;New Template&quot; in the appropriate template tab.';


#J


#K


#L
$lang['last_active'] = 'Last Active';
$lang['lbl_browseproptemplates'] = 'Browse Property Templates';
$lang['lbl_defaulttemplates'] = 'Default Templates';
$lang['lbl_detailtemplates'] = 'Detail View Templates';
$lang['lbl_directorytemplates'] = 'Directory Templates';
$lang['lbl_first_page'] = 'Go to First Page';
$lang['lbl_last_page'] = 'Go to Last Page';
$lang['lbl_next_page'] = 'Go to Next Page';
$lang['lbl_prev_page'] = 'Go to Previous Page';
$lang['lbl_searchformtemplates'] = 'Search Form Templates';
$lang['lbl_settings'] = 'Settings';
$lang['lbl_summarytemplates'] = 'Summary View Templates';

#M
$lang['moddescription'] = 'A module allowing searching, browsing, and viewing details about frontend users';

#N


#O
$lang['of'] = 'Of';

#P
$lang['page'] = 'Page';
$lang['postinstall'] = 'The CGUserDirectory module is now ready for configuration';
$lang['postuninstall'] = 'The CGUserdirectory module, and all associated data has been uninstalled from the database';

#Q


#R
$lang['results_all_any'] = 'Return results that match all, or any of the conditions specified';

#S
$lang['submit'] = 'Submit';

#T


#U
$lang['username'] = 'Username';

#V


#W


#X


#Y


#Z

?>
