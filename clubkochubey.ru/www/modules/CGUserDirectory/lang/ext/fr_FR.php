<?php
$lang['addedit_browseprop_template'] = 'Ajouter/Editer un gabarit de propri&eacute;t&eacute; de recherche&nbsp;';
$lang['addedit_detail_template'] = 'Ajouter/Editer un gabarit de d&eacute;tail&nbsp;';
$lang['addedit_directory_template'] = 'Ajouter/Editer un gabarit de r&eacute;pertoire&nbsp;';
$lang['addedit_searchform_template'] = 'Ajouter/Editer un gabarit de recherche&nbsp;';
$lang['addedit_summary_template'] = 'Ajouter/Editer un gabarit de r&eacute;sum&eacute;&nbsp;';
$lang['all'] = 'Tous';
$lang['any'] = 'N&#039;importe lequel';
$lang['ask_really_uninstall'] = '&Ecirc;tes-vous s&ucirc;r de vouloir faire cela ? Cela va supprimer d&eacute;finitivement toutes les donn&eacute;es associ&eacute;es &agrave; ce module.';
$lang['changelog'] = '<ul>
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
</ul>';
$lang['created'] = 'Cr&eacute;&eacute;&nbsp;';
$lang['error_invalidgroup'] = 'Groupe invalide';
$lang['error_invalidsortfield'] = 'Champ de tri invalide&nbsp;: %s';
$lang['error_missingparam'] = 'Param&egrave;tres insuffisants';
$lang['error_nofeu'] = 'Le module Frontend Users ne peut pas &ecirc;tre trouv&eacute;';
$lang['error_usernotfound'] = 'L&#039;utilisateur avec l&#039;id sp&eacute;cifi&eacute; n&#039;a pas pu &ecirc;tre trouv&eacute;';
$lang['expires'] = 'Expire&nbsp;';
$lang['friendlyname'] = 'Calguys User Directory ';
$lang['groups'] = 'Groupes&nbsp;';
$lang['help'] = '<h3>Que fait ce module ?</h3>
<p> Ce module offre la possibilit&eacute; de g&eacute;n&eacute;rer un r&eacute;pertoire des utilisateurs du module FEU, pour g&eacute;n&eacute;rer une vue r&eacute;sum&eacute;e des utilisateurs selon des crit&egrave;res d&eacute;finis, et pour afficher des informations d&eacute;taill&eacute;es sur un utilisateur sp&eacute;cifi&eacute;. Il peut &ecirc;tre utilis&eacute; pour afficher une page de profil d&#039;utilisateur, ou une liste de membres par exemple.</p>
<h3>Caract&eacute;ristiques :</h3>
<ul>
  <li>Un contr&ocirc;le int&eacute;gral du gabarit
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
<h3>Comment l&#039;utiliser ?</h3>
<p>Le moyen le plus smple de l&#039;utiliser et de placer le tag <code>{CGUserDirectory}</code> dans votre gabarit ou la page d&eacute;sir&eacute;e. Pour ajouter des param&egrave;tres, vous pouvez utiliser les exemples suivants.</p>
<h3>Exemples :</h3>
<ul>
<li>R&eacute;pertorier tous les utilisateurs :
<p><code>{CGUserDirectory action=&quot;directory&quot;}</code></p>
</li>
<li>R&eacute;pertorier tous les utilisateurs en fonction de la ville:
<p><code>{CGUserDirectory action=&quot;directory&quot; prop=&quot;ville&quot;}</code></p>
</li>
<li>Afficher une liste r&eacute;sumant tous les utilisateurs du groupe &quot;membres&quot; :
<p><code>{CGUserDirectory group=&quot;membres&quot;}</code></p>
</li>
<li>Afficher tous les utilisateurs ayant pour ville &quot;Perpignan&quot; :
<p><code>{CGUserDirectory prop=&quot;ville&quot; propval=&quot;perpignan&quot;}</code></p>
</li>
<li>Display a summary list of all users from countries that begin with C:
<p><code>{CGUserDirectory prop=&quot;city&quot; uselike=1 propval=&quot;c%&quot;}</code></p>
</li>

</ul>

<h3>Notes au sujet des &quot;Pretty URLs&quot; (r&eacute;-&eacute;criture d&#039;URL)</h3>
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
$lang['help_param_action'] = 'Ces param&egrave;tres contr&ocirc;lent le comportement du module.  Il y a trois possibilit&eacute;s :
<ul>
<li>browse  - Display a navigation of property values, and allow drilling down to matching summary views.</li>
  <li>default - Displays a summary view of users that match the specified criteria, or all users if no critieria is specified.</li>
  <li>directory - Displays an alphabetical directory of links to summary views to users that match the specified criteria.  It is possible to create directory views on username, or on any other parameter</li>
  <li>detail - Displays a detail report about a specific user.</li>
<li>search - Displays a search form.</li>
</ul>';
$lang['help_param_browseproptemplate'] = 'Ce param&egrave;tre permet de sp&eacute;cifier aucune valeur par d&eacute;faut pour la recherche pour parcourir le nom du gabarit &agrave; utiliser';
$lang['help_param_group'] = 'Utilis&eacute; avec l&#039;action par d&eacute;faut, ce param&egrave;tre doit contenir le nom d&#039;un groupe d&#039;utilisateurs FEU, et limite la sortie aux membres du groupe';
$lang['help_param_gid'] = 'Utilis&eacute; avec l&#039;action par d&eacute;faut, ce param&egrave;tre doit contenir l&#039;ID d&#039;un groupe d&#039;utilisateurs FEU, et limite la sortie aux membres de ce groupe. Ce param&egrave;tre ne peut pas &ecirc;tre utilis&eacute; en conjonction avec le param&egrave;tre groupe.';
$lang['help_param_showexpired'] = 'Par d&eacute;faut, le syst&egrave;me va exclure du rapport tous les utilisateurs expir&eacute;s. Mettre se param&egrave;tre &agrave; 1 va inclure ces utilisateurs.';
$lang['help_param_bsortby'] = 'Utilis&eacute; pour l&#039;action browse, ce param&egrave;tre d&eacute;fini l&#039;ordre de tri de la sortie des propri&eacute;t&eacute;s g&eacute;n&eacute;r&eacute;es.  Les valeurs possibles sont :
<ul>
  <li>name - le nom de la propri&eacute;t&eacute;</li>
  <li>count - le nombre de correspondances</li>
</ul>';
$lang['help_param_sparse'] = 'Applicable uniquement pour l&#039;affichage du dossier, cette option ne fera que montrer une lettre r&eacute;pertoire pour lequel il existe des utilisateurs.';
$lang['help_param_resultpage'] = 'Utilis&eacute; pour la recherche pour les actions, ce param&egrave;tre sp&eacute;cifie le contenu de la page CMSMS qui devrait &ecirc;tre utilis&eacute; pour afficher les articles correspondants &agrave; l&#039;op&eacute;ration de filtrage';
$lang['help_param_sortby'] = 'Used for the default action, this parameter specifies the sorting of the generated summary output.  Possible values are:
<ul>
 <li>id - The users id (default view only)</li>
 <li>username - The users username (default view only)</li>
 <li>createdate - The date at which the user account was created. (default view only)</li>
 <li>expires - The date at which the user account will expire (or did expire). (default view only)</li>
 <li>activity - The date at which the user account was last logged in or logged out. (default view only)</li>
 <li>f:propertyname - This allows sorting the output by a specified FEU property name. i.e: f:full_name.  <strong>Note:</strong> you may experience unexpected results if the group being displayed does not have that property, or not every user in the resulting set has that property defined.  Also, you may experience unexpected results if the field specified is not a text string.  You may have to adjust the sortorder parameter to get the desired output</ul>>';
$lang['help_param_bsortorder'] = 'Utilis&eacute; pour l&#039;action browse, ce param&egrave;tre d&eacute;fini l&#039;ordre de tri de la sortie g&eacute;n&eacute;r&eacute;e.  Les valeurs possibles sont :
<ul>
  <li>ASC - ordre ascendant</li>
  <li>DESC - ordre descendant</li>
</ul>';
$lang['help_param_sortorder'] = 'Utilis&eacute; pour l&#039;action default, ce param&egrave;tre d&eacute;fini l&#039;ordre de tri de la sortie des propri&eacute;t&eacute;s g&eacute;n&eacute;r&eacute;es.  Les valeurs possibles sont :
<ul>
  <li>ASC - ordre ascendant</li>
  <li>DESC - ordre descendant</li>
</ul>';
$lang['help_param_pagelimit'] = 'Utilis&eacute; pour l&#039;action default, ce param&egrave;tre sp&eacute;cifie le nombre maximum d&#039;items qui doivent &ecirc;tre retourn&eacute;s.';
$lang['help_param_prop'] = 'Used for the default,browse and directory actions, this parameter behaves in two different ways depending upon the action:
<ul>
  <li>The default (summary) action
    <p>In the default (summary) action, this parameter can be used to specify a property to filter the results by.  It works in conjunction with the propval parameter below.</p>
  </li>
<li>The browse action
    <p>In the browse action, this parameter can be used to specify an FEU property to browse</p>
  </li>
  <li>The directory action.
    <p>In the directory action, this aprameter can be used to specify a property to generate a directory from.   The default value in the directory action is &amp;quot;username&amp;quote;</p>
  </li>
</ul>';
$lang['help_param_propval'] = 'Used in conjunction with the &quot;prop&quot; parameter for the default (summary) action, this parameter allows specifying a value on which to filter users by.';
$lang['help_param_uselike'] = 'Used in conjunction with the &quot;prop&quot; and &quot;propval&quot; parameters, this parameter, if set to a positive integer value indicates that the propval parameter contains a LIKE expression';
$lang['help_param_detailpage'] = 'Ce param&egrave;tre, si sp&eacute;cifi&eacute;, doit contenir la pageid ou alias d&#039;une page CMS de type contenu, sur laquelle vous souhaitez afficher les rapport de d&eacute;tail';
$lang['help_param_summarytemplate'] = 'Ce param&egrave;tre permet de sp&eacute;cifier un nom de gabarit &agrave; utiliser pour l&#039;affichage des r&eacute;sum&eacute;s';
$lang['help_param_detailtemplate'] = 'Ce param&egrave;tre permet de sp&eacute;cifier un nom de gabarit &agrave; utiliser pour l&#039;affichage des d&eacute;tails';
$lang['help_param_directorytemplate'] = 'Ce param&egrave;tre permet de sp&eacute;cifier un nom de gabarit &agrave; utiliser pour l&#039;affichage des r&eacute;pertoires';
$lang['help_param_searchformtemplate'] = 'Ce param&egrave;tre permet de sp&eacute;cifier un nom de gabarit &agrave; utiliser pour l&#039;afficage des formulaire de recherche';
$lang['help_param_searchproperty'] = 'Ce param&egrave;tre permet de sp&eacute;cifier, une liste simple ou s&eacute;par&eacute;e par des virgules, de noms de propri&eacute;t&eacute; suppl&eacute;mentaire de FEU pour les fournir dans le formulaire de recherche';
$lang['help_param_uid'] = 'Utilis&eacute; conjointement avec l&#039;affichage du d&eacute;tail, ce param&egrave;tre doit contenir l&#039;uid du compte d&#039;un utilisateur du FEU.';
$lang['info_browseprop_template'] = 'Browse Property templates display A list of unique values for the specified property.  Each item in the list is a link to a summary view containing the matching users that match that property value.  You may use any smarty logic or variables that have been created previously, or the ones made availability specifically for this view.';
$lang['info_browseprop_templates_tab'] = 'Cet onglet contient la liste des gabarits disponibles concernant les propri&eacute;t&eacute;s. Il y a toujours un gabarit d&eacute;finit par d&eacute;faut. Celui-ci sera utilis&eacute; si aucun autre nom de gabarit est sp&eacute;cifi&eacute; dans la tag qui appelle ce module.';
$lang['info_detail_template'] = 'Detail templates display detailed information about a specific frontend user.  Here you design the way in which you want that information laid out.  You may use any smarty logic or variables that have been designed previously, or the ones made available specifically for this view';
$lang['info_detail_templates_tab'] = 'This tab contains the list of available detail view templates.  One of them is marked as default.  The default one will be used when no alternate template name is supplied on the tag that calls this module';
$lang['info_directory_template'] = 'Directory templates display an alphabetical list of links, when a link is clicked it will display a summary view of the matching users for that letter.  It is possible to create directories based on different properties.  Here you design the way in which you want that information laid out.  You may use any smarty logic or variables that have been designed previously, or the ones made available specifically for this view';
$lang['info_directory_templates_tab'] = 'Cet onglet contient la liste des r&eacute;pertoires des gabarits disponibles. L&#039;un d&#039;eux est marqu&eacute; par d&eacute;faut. Le r&eacute;pertoire par d&eacute;faut sera utilis&eacute; lorsque aucun nom est fourni sur la balise qui appelle ce module';
$lang['info_summary_template'] = 'Summary templates display information about a list of users that match a criteria.  Here you design the way in which you want that information laid out.  You may use any smarty logic or variables that have been designed previously, or the ones made available specifically for this view';
$lang['info_searchform_template'] = 'Search form templates display A form to allow searching for a particular user or group of users.  Here you design the way in which you want the form displayed.  You may use any smarty logic or variables that have been designed previously, or the ones made available specifically for this view';
$lang['info_searchform_templates_tab'] = 'Cet onglet contient la liste des gabarits disponibles dans le formulaire de recherche. L&#039;un d&#039;eux est marqu&eacute; par d&eacute;faut. Le gabarit par d&eacute;faut sera utilis&eacute; lorsque aucun nom  est fourni sur la balise qui appelle ce module';
$lang['info_summary_templates_tab'] = 'Cet onglet contient la liste des gabarits sommaires disponibles. L&#039;un d&#039;eux est marqu&eacute; par d&eacute;faut. Le gabarit par d&eacute;faut sera utilis&eacute; lorsque aucun nom est fourni sur la balise qui appelle ce module';
$lang['info_sysdflt_browseprop_template'] = 'System Default Browse Property View Template';
$lang['info_sysdflt_detail_template'] = 'Gabarit par d&eacute;faut de d&eacute;tail';
$lang['info_sysdflt_directory_template'] = 'Gabarit par d&eacute;faut de r&eacute;pertoire';
$lang['info_sysdflt_searchform_template'] = 'Syst&egrave;me de recherche par d&eacute;faut du gabarit';
$lang['info_sysdflt_summary_template'] = 'Gabarit par d&eacute;faut de r&eacute;sum&eacute;';
$lang['info_sysdflt_template'] = 'Modifier ce gabarit n&#039;aura aucun effet imm&eacute;diat sur les affichages. Il est utilis&eacute; uniquement lors de la cr&eacute;ation de nouveau gabarit par un clic sur &quot;Nouveau gabarit&quot; dans l&#039;onglet appropri&eacute;.';
$lang['last_active'] = 'Dernier actif&nbsp;';
$lang['lbl_browseproptemplates'] = 'Gabarits de propri&eacute;t&eacute;';
$lang['lbl_defaulttemplates'] = 'Gabarits par d&eacute;faut';
$lang['lbl_detailtemplates'] = 'Gabarits de d&eacute;tail';
$lang['lbl_directorytemplates'] = 'Gabarits de r&eacute;pertoire';
$lang['lbl_first_page'] = 'Aller &agrave; la premi&egrave;re page';
$lang['lbl_last_page'] = 'Aller &agrave; la derni&egrave;re page';
$lang['lbl_next_page'] = 'Aller &agrave; la page suivante';
$lang['lbl_prev_page'] = 'Aller &agrave; la page pr&eacute;c&eacute;dente';
$lang['lbl_searchformtemplates'] = 'Gabarits de formulaire de recherche';
$lang['lbl_settings'] = 'Param&egrave;tres';
$lang['lbl_summarytemplates'] = 'Gabarits de r&eacute;sum&eacute;';
$lang['moddescription'] = 'Un module permettant la recherche, la navigation et l&#039;affichage d&#039;informations sur la gestion des utilisateurs du site';
$lang['of'] = 'de ';
$lang['page'] = 'Page ';
$lang['postinstall'] = 'Le module CGUserDirectory est maintenant pr&ecirc;t &agrave; &ecirc;tre configur&eacute;';
$lang['postuninstall'] = 'Le module CGUserDirectory, et toutes les donn&eacute;es associ&eacute;es ont &eacute;t&eacute; d&eacute;sinstall&eacute; de la base de donn&eacute;es';
$lang['results_all_any'] = 'Renvoie les r&eacute;sultats qui correspondent, &agrave; tous, ou &agrave; l&#039;une des conditions pr&eacute;cis&eacute;es';
$lang['submit'] = 'Envoyer';
$lang['username'] = 'Nom d&#039;utilisateur&nbsp;';
$lang['qca'] = 'P0-58741428-1276531635559';
$lang['utma'] = '156861353.1249395224.1276535615.1276535615.1276620959.2';
$lang['utmz'] = '156861353.1276620959.2.2.utmccn=(referral)|utmcsr=dev.cmsmadesimple.org|utmcct=/projects/feunotification|utmcmd=referral';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>