<?php
$lang['error_nofeusers'] = 'Erreur : Ne trouve pas le module FrontEndUsers';
$lang['friendlyname'] = 'Contenu Personnalis&eacute;';
$lang['postinstall'] = '';
$lang['postuninstall'] = '';
$lang['uninstalled'] = 'Module d&eacute;sinstall&eacute;.';
$lang['installed'] = 'Version %s du module install&eacute;e.';
$lang['accessdenied'] = 'Acc&egrave;s refus&eacute;. Veuillez v&eacute;rifier vos permissions.';
$lang['error'] = 'Erreur !';
$lang['upgraded'] = 'Module mis &agrave; jour &agrave; la version %s.';
$lang['moddescription'] = 'Ce module permet de sp&eacute;cifier un contenu diff&eacute;rent selon le groupe ou l&#039;utilisateur';
$lang['changelog'] = '<ul><li>Version 1.0. 14 Septembre 2005. Version initiale.</li></ul>
<ul>
<li>Version 1.1. 15 Septembre 2005. Ajout&eacute; startif/else/endif, et la recherche par groupes et utilisateurs multiples.</li>
<li>Version 1.2. 26 Septembre 2005. Ajout&eacute; le param&egrave;tre optionnel loggedin </li>
<li>Version 1.3  25 Octobre 2005. Chang&eacute; en FrontEndUsers au lieu de UserID</li>
<li>Version 1.3.1 08 Novembre 2005. Correction d&#039;un petit bug dans la g&eacute;n&eacute;ration des param&egrave;tres</li>
<li>Version 1.4.0 - January, 2006.
<p>Added smarty compatible variables</p></li>
<li>Version 1.4.1 - May, 2006.
<p>Smarty variables now work in 0.13b2</p>
<p>Now require CMS 0.13b2 as a minimum</p>
<p>Updated the help</p>
</li>
<li>Version 1.4.3 - June, 2006.
<p>Added search module compatibility</p>
<p>Added date and time smarty variables</p>
</li>
<li>Version 1.4.4 - Dec, 2006.
<p>Added TemplatePrecompile callback</p>
<li>Version 1.4.5 - Mar, 2007.
<p>Removed the SearchItemAdded callback...</p>
<li>Version 1.4.6 - Apr, 2007.
<p>Added the ccuser object for easier expressions.</p>
<li>Version 1.4.7 - Sep, 2007.
<p>Adjusted the help, the comment syntax is now deprecated</p>
<p>Added a property method to the ccuser object</p>
</li>
<li>Version 1.4.8 - Sep, 2007.
<p>Added the module_exists method to the ccuser object</p>
</li>
<li>Version 1.4.9 - Oct. 2007.
<p>Some minor fixes that seem to fix problems where FEU would get instantiated twice</p>
<p>Fixes an issue in the memberof() method of ccuser when not logged in</p>
</li>
<li>Version 1.4.10 - Nov. 2007.
<p>Minimum CMS Version is now 1.2</p>
<p>Adds new functions to the ccuser object: get_parent_alias(), get_root_alias(), get_page_title(), has_children()</p>
</li>
<li>Version 1.4.11 - Dec. 2007.
<p>Adds the ability to assign the output of some functions in the ccuser object to smarty variables without having to use the capture smarty tag.</p>
<li>Version 1.5 - Feb, 2008.
<p>Removes the comment style syntax once and for all... and sets all of the variables ion the object constructor.</p>
<p>Adds the {$ccuser->setup()} method to ensure that the smarty variables are setup</p>
<p>Removes the redundant functions from ccuser that are now in CGSimpleSmarty</p>
</li>
<li>Version 1.5.1 - August, 2008
<p>Minor optimizations and add the username function to $ccuser</p>
</ul>';
$lang['help'] = '<h3>Que fait ce module?</h3>
<p>Ce module, en association avec le module FrontEndUsers permet de cr&eacute;er une page diff&eacute;rente selon la personne qui la regarde. Vous pouvez sp&eacute;cifier un contenu diff&eacute;rent pour certains utilisateurs ou membres d&#039;un certain groupe.</p>
<p><b>Note 1 : </b>Quand vous mettez ces balises Smarty dans une page, assurez vous que la page n&#039;est pas cachable. (d&eacute;selectionner dans l&#039;onglet options de la page)</p>
<p><b>Note 2 : </b>Si vous mettez ces balises Smarty dans un gabarit, assurez vous que l&#039;ensemble des pages utilisant ce gabarit n&#039;est pas cachable.</p>
<h3>Comment l&#039;utiliser</h3>
<p>Vous pouvez utiliser les variables du module</p>
<pre>
{if $customcontent_loggedin > 0}
<b>Bienvenue {$customcontent_loginname}</b>
{else}
<b>Vous n&#039;&ecirc;tes pas autoris&eacute; &agrave; regarder ce contenu</b>
{/if}
</pre>
<p>Variante : (nomgroupe est &agrave; remplacer par le nom d&#039;un groupe FrontEndUsers)</p>
<pre>
{if $customcontent_loggedin == &#039;1&#039; and $customcontent_memberof_nomgroupe and $customcontent_ip == &#039;127.0.0.1&#039;}
<b>Bienvenue {$customcontent_loginname} connect&eacute; avec IP : {$customcontent_ip}</b>
{elseif $customcontent_loggedin and $customcontent_memberof_nomgroupe}
<b>Bienvenue {$customcontent_loginname} du mon groupe {$customcontent_groups}</b>
{elseif $customcontent_loggedin}
<b>Bienvenue {$customcontent_loginname} du groupe {$customcontent_groups}</b>
{else}
<b>Bienvenue cher anonyme</b>
{/if}
</pre>
<p>Ou vous pouvez utiliser l&#039;objet $ccuser pour une utilisation plus avanc&eacute;e, avec des tests plus faciles</p>
<p><b>Note 3 :</b> Quand vous mettez ces balises Smarty dans une page, les symboles -> &amp;&amp; ne peuvent &ecirc;tre correctement interpr&eacute;t&eacute;s si la page est en mode WYSIWYG (&agrave; d&eacute;cocher)</p>
<pre>
{if $ccuser->loggedin() &amp;&amp; $ccuser->memberof(&#039;members&#039;) &amp;&amp; $ccuser->ipmatches(&#039;192.168.0.0/24&#039;)}
<b>Bienvenue cher membre connect&eacute; en local</b>
{elseif $ccuser->loggedin() &amp;&amp; $ccuser->memberof(&#039;members&#039;)}
<b>Bienvenue cher membre connect&eacute;</b>
{elseif $ccuser->loggedin()}
<b>Bienvenue cher utilisateur d&#039;un autre groupe</b>
{else}
<b>Bienvenue cher anonyme</b>
{/if}
</pre>
<p>Autre exemple : (Obtenir the root page alias)</p>
<pre>
{capture assign=&#039;rootalias&#039;}{$ccuser->get_root_alias()}{/capture}
</pre>
<p>Variante :</p>
{$ccuser->get_root_alias(&#039;&#039;,&#039;assign&#039;)}
<p>N&#039;importe quelles expressions logiques ou compatibles avec Smarty, peuvent &ecirc;tre utilis&eacute;es avec les variables disponibles. En utilisant cette syntaxe, les expressions peuvent &ecirc;tre imbriqu&eacute;es ou d&#039;une logique complexe.</p>
<h4>Variables disponibles</h4>
<ul>
<li><p><em>ccuser</em> - Un objet avec des fonctions pratiques pour vos tests.</p>
<p>Cet objet contient quelques m&eacute;thodes pratiques pour l&#039;ex&eacute;cution plus avanc&eacute;e que les variables du module, permettant la cr&eacute;ation d&#039;un gabarit de qualit&eacute;.<br /> Les m&eacute;thodes disponibles sont les suivantes :</p>
  <ul>
<li><em>$ccuser->get_parent_alias($alias,$assign)</em> - Retourne l&#039;alias de la page parent, ou vide si la page ne poss&egrave;de pas un parent (&agrave; la racine). Cette fonction accepte un alias de page comme argument, si aucun alias de page est pr&eacute;cis&eacute; ou vide, la page courante est s&eacute;lectionn&eacute;e. Si le param&egrave;tre attribu&eacute; n&#039;est pas vide, le r&eacute;sultat sera affect&eacute; &agrave; la variable smarty $assign pass&eacute;e en argument.</li>
<li><em>$ccuser->get_root_alias($alias,$assign)</em> - Retourne l&#039;alias de la page parent &agrave; la racine, ou vide si la page ne poss&egrave;de pas un parent (&agrave; la racine). Cette fonction accepte un alias de page (voir ci-dessus).</li>
<li><em>$ccuser->get_page_title($alias,$assign)</em> - Retourne le titre de la page contenant l&#039;alias fourni. Cette fonction accepte un alias de page (voir ci-dessus).</li>
<li><em>$ccuser->has_children($alias,$assign)</em> - Retourne un bool&eacute;en indiquant si la page a des pages enfants ou non. Cette fonction accepte un alias de page (voir ci-dessus).</li>
<li><em>$ccuser->groups()</em> - Retourne une liste des groupes d&#039;utilisateur</li>
<li><em>$ccuser->memberof(&#039;group&#039;)</em> - Retourne un bool&eacute;en si l&#039;utilisateur est en effet un membre de ce groupe. Cette fonction accepte aussi une virgule pour s&eacute;parer une liste de nom de groupe.</li>
<li><em>$ccuser->loggedin()</em> - Retourne un bool&eacute;en si l&#039;utilisateur est connect&eacute;</li>
<li><em>$ccuser->username()</em> - Retourne le nom d&#039;utilisateur de l&#039;utilisateur connect&eacute;.</li>
<li><em>$ccuser->property(&#039;propertyname&#039;)</em> - Retourne la valeur de la propri&eacute;t&eacute; de l&#039;utilisateur connect&eacute;.</li>
<li><em>$ccuser->module_installed(&#039;modulename&#039;)</em> - Retourne un bool&eacute;en si le module sp&eacute;cifi&eacute; est install&eacute; et disponible.</li>
<li><em>$ccuser->ipmatches($ranges)</em> - Retourne un bool&eacute;en si l&#039;adresse IP de l&#039;utilisateur correspond &agrave; l&#039;une des plages d&#039;adresses IP de $ranges, s&eacute;par&eacute;es par des virgules, les plages d&#039;adresses IP.  Accepte comme plages IP ###.###.###.###/##  Exemple : 192.168.0.0/24</li>
  </ul>

<br/>
</li>
<li><p><em>customcontent_ip</em> - Addresse IP distante</p></li>
<li><p><em>customcontent_loggedin</em> - Un entier indiquant l&#039;id de l&#039;utilisateur si celui-ci est connect&eacute;.  Cette variable peut exister sans avoir de valeur si l&#039;utilisateur nest pas connect&eacute;.</p></li>
<li><p><em>customcontent_loginname</em> - Identifiant de l&#039;utilisateur connect&eacute;</p></li>
<li><p><em>customcontent_groupcount</em> - Le nombre de groupes que cet utilisateur est membre</p></li>
<li><p><em>customcontent_groups</em> -  Liste des noms des diff&eacute;rents groupes de l&#039;utilisateur connect&eacute;</p></li>
<li><p><em>customcontent_memberof_*</em> - Variable bool&eacute;enne indiquant si l&#039;utilisateur est membre du groupe.  Exemple : customcontent_memberof_staff, customcontent_memberof_users, etc.  Pas de valeur indique que l&#039;utilisateur n&#039;est pas membre de.</p></li>
<li><p><em>customcontent_dayzeros</em> - Jour du mois, 2 chiffres avec des z&eacute;ros de t&ecirc;te</p></li> 
<li><p><em>customcontent_day3text</em> - texte repr&eacute;sentant le jour, trois lettres</p></li>
<li><p><em>customcontent_day</em> - Jour du mois sans z&eacute;ros de t&ecirc;te</p></li> 
<li><p><em>customcontent_weekday</em> - Texte complet du jour de la semaine</p></li> 
<li><p><em>customcontent_dayordsuffix</em> - Suffixe ordinal pour le jour du mois, 2 caract&egrave;res</p></li> 
<li><p><em>customcontent_dayofweek</em> - Repr&eacute;sentation num&eacute;rique de la semaine</p></li> 
<li><p><em>customcontent_dayofyear</em> - Le jour de l&#039;ann&eacute;e (d&eacute;but &agrave; 0)</p></li> 
<li><p><em>customcontent_weeknum</em> - ISO-8601 nombre de la semaine de l&#039;ann&eacute;e, les semaines compt&eacute;es &agrave; partir du lundi</p></li> 
<li><p><em>customcontent_monthfulltext</em> - Texte complet repr&eacute;sentant le mois, comme January ou March</p></li> 
<li><p><em>customcontent_monthnumzeros</em> - Nombre repr&eacute;sentant le mois, avec des z&eacute;ros de t&ecirc;te</p></li> 
<li><p><em>customcontent_monthshorttext</em> - Texte court repr&eacute;sentant le mois, trois lettres</p></li> 
<li><p><em>customcontent_monthnum</em> - Nombre repr&eacute;sentant le mois, sans z&eacute;ros de t&ecirc;te</p></li> 
<li><p><em>customcontent_monthnumdays</em> - Nombre de jour in le mois courant</p></li> 
<li><p><em>customcontent_leapyear</em> - Indicateur ann&eacute;e bissextile</p></li> 
<li><p><em>customcontent_4digityear</em> - Repr&eacute;sentation num&eacute;rique de l&#039;ann&eacute;e, 4 chiffres</p></li> 
<li><p><em>customcontent_2digityear</em> - Deux chiffres representant l&#039;ann&eacute;e</p></li> 
<li><p><em>customcontent_lowerampm</em> - Minuscule Ante meridien and Post meridien</p></li> 
<li><p><em>customcontent_upperampm</em> - Majuscule Ante meridien and Post meridien</p></li>
<li><p><em>customcontent_inettime</em> - Swatch Internet time (Temps Internet&deg;</p></li>
<li><p><em>customcontent_12hour</em> - heure au format 12h sans des z&eacute;ros de t&ecirc;te</p></li>
<li><p><em>customcontent_24hour</em> - heure au format 24h sans des z&eacute;ros de t&ecirc;te</p></li>
<li><p><em>customcontent_12hourzeros</em> - heure au format 12h avec des z&eacute;ros de t&ecirc;te</p></li>
<li><p><em>customcontent_24hourzeros</em> - heure au format 24h avec des z&eacute;ros de t&ecirc;te</p></li>
<li><p><em>customcontent_minutes</em> - Minutes avec des z&eacute;ros de t&ecirc;te</p></li>
<li><p><em>customcontent_seconds</em> - Secondes, avec des z&eacute;ros de t&ecirc;te</p></li>
<li><p><em>customcontent_timezone</em> - Fuseau horaire de cette machine</p></li>
<li><p><em>customcontent_date</em> - date au format RFC 2822</p></li>
<li><p><em>customcontent_epochseconds</em> - le nombre de secondes &eacute;coul&eacute;es depuis le 1 janvier 1970 00:00:00 GMT (timestamp UNIX)</p></li></ul>
<p><b>Note 4 :</b> Les textes repr&eacute;sentant les dates sont en anglais</p>

<h3>Copyright et License</h3>
<p>Copyright &copy; 2005, Robert Campbell <a href="mailto:rob@techcom.dyndns.org">rob@techcom.dyndns.org</a>. Tous droits r&eacute;serv&eacute;s.</p>
<p>Ce module est publi&eacute; sous la license <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. Vous devez agr&eacute;er &agrave; cette license avant d&#039;utiliser ce module.</p>
';
$lang['utma'] = '156861353.1089788044.1218474041.1218474041.1218474041.1';
$lang['utmc'] = '156861353';
$lang['utmz'] = '156861353.1218474041.1.1.utmccn=(direct)|utmcsr=(direct)|utmcmd=(none)';
$lang['utmb'] = '156861353';
?>