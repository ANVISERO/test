<?php
$lang['addedit_browseprop_template'] = 'Toevoegen/wijzigen browse eigenschappen sjabloon';
$lang['addedit_detail_template'] = 'Toevoegen/wijzigen detail sjaboon';
$lang['addedit_directory_template'] = 'Toevoegen/wijzigen directory sjabloon';
$lang['addedit_searchform_template'] = 'Toevoegen/wijzigen formulier sjaboon';
$lang['addedit_summary_template'] = 'Toevoegen/wijzigen samenvatting sjabloon';
$lang['all'] = 'Alle';
$lang['any'] = 'Enige';
$lang['ask_really_uninstall'] = 'Weet u zeker dat u dit wilt doen? Doorgaan zal alle gegevens van deze module definitief verwijderen';
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
$lang['created'] = 'Gemaakt';
$lang['error_invalidgroup'] = 'Verkeerde groep';
$lang['error_invalidsortfield'] = 'Verkeerd keuzeveld: %s';
$lang['error_missingparam'] = 'Te weinig parameters';
$lang['error_nofeu'] = 'De Frontend Users module is niet aanwezig';
$lang['error_usernotfound'] = 'De gebruiker met dit ID is niet gevonden';
$lang['expires'] = 'Verloopt';
$lang['friendlyname'] = 'Calguys User Directory ';
$lang['groups'] = 'Groepen';
$lang['help'] = '<h3>Waar wordt het voor gebruikt?</h3>
<p>Deze module geeft de mogelijkheid om overzichten te genereren met samenvattingen van gegevens van FrontEndUsers op basis van vooringestelde voorwaarden. Ook kan er een uitgebreidde pagina worden gemaakt. Het kan gebruikt worden voor het maken van profiel pagina&#039;s of als een zgn. smoelenboek.</p>

<h3>Mogelijkheden:</h3>
<ul>
  <li>Volledig sjabloonbeheer
<p>Alle schermen zijn door de beschikbare sjablonen geheel te configureren, er kan ook gebruik gemaakt worden van o.a. javascript, ajax, etc. De vormgeving is hierdoor geheel te wijzigen door de website vormgever.</p>
  </li>
  <li>Meerdere database sjablonen.
<p>U kunt op verschillende manieren met de gegevens schermen opbouwen en deze op diverse manieren gebruiken.</p>
  </li>
<li>Filter samenvattingen door gebruik van gebruikersgegevens.
<p>U kunt de uitkomst filteren gebaseerd op een specifieke gebruiker uit de FEU module. Dit is inclusief &quot;LIKE&quot; gebaseerde criteria.</p>
  </li>
  <li>Sorteren met meerdere criteria.</li>
  <li>Ondersteund SEO vriendelijke URL&#039;s</li>
</ul>
<h3>Hoe gebruik ik het?</h3>
<p>De makkelijkste manier om de module te gebruiken is door een tag in de paginasjabloon of in de pagina content te plaatsen: <code>{CGUserDirectory}</code>. Om de functionaliteit uit te breiden of om slechts een gedeelte te laten zien gebruik onderstaande parameters.</p>

<h3>Voorbeelden:</h3>
<ul>
<li>Laat alle gebruikers zien:
<p><code>{CGUserDirectory action=&quot;directory&quot;}</code></p>
</li>
<li>Laat de gebruikers per woonplaats zien:
<p><code>{CGUserDirectory action=&quot;directory&quot; prop=&quot;city&quot;}</code></p>
</li>
<li>Laat een samenvatting zien van alle gebruikers in de &quot;members&quot; groep:
<p><code>{CGUserDirectory group=&quot;members&quot;}</code></p>
</li>
<li>Laat alle bebruikers zien in de woonplaats &quot;Calgary&quot;:
<p><code>{CGUserDirectory prop=&quot;city&quot; propval=&quot;calgary&quot;}</code></p>
</li>
<li>Laat alle gebruikers zien die wonen in een land die begint met de letter C:
<p><code>{CGUserDirectory prop=&quot;city&quot; uselike=1 propval=&quot;c%&quot;}</code></p>
</li>

</ul>

<h3>Opmerkingen over &quot;pretty URL&#039;s&quot;</h3>
<p>&quot;Pretty&quot; of SEO vriendelijke URL&#039;s beperken de flexibiliteit van de module en de te gebruiken parameters. Met name diegene die doorgestuurd worden van onderliggende schermen. Om deze reden worden er geen pretty-url&#039;s gegenereerd in de samenvattings verwijzingen. Hierdoor kunnen de parameters zoals &quot;detailpage&quot;, &quot;detailtemplate&quot; en  &quot;summarytemplate&quot; worden gebruikt in de tag om de module te gebruiken en kunnen deze gebruikt worden in de onderliggende detail overzichten.<br />
<!-- Rolf: -->[Vertaler: Hopelijk is dit wat Calguy bedoelde, kijk anders even in de Engelse versie!]
</p>
<h3>Support [Eng.]</h3>
<p>This module does not include commercial support. However, there are a number of resources available to help you with it:</p>
<ul>
<li>For the latest version of this module, FAQs, or to file a Bug Report or buy commercial support, please visit the cms development forge at <a href="http://dev.cmsmadesimple.org">dev.cmsmadesimple.org</a>.</li>
<li>Additional discussion of this module may also be found in the <a href="http://forum.cmsmadesimple.org">CMS Made Simple Forums</a>.</li>
<li>The author, calguy1000 all can often be found in the <a href="irc://irc.freenode.net/#cms">CMS IRC Channel</a>.</li>
<li>Lastly, you may have some success emailing the author(s) directly.</li>  
</ul>

<h3>Copyright and License [Eng.]</h3>
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
$lang['help_param_action'] = 'Deze parameter beheert de werkwijze van de module. Er zijn drie mogelijke waarden:
<ul>
  <li>default - Laat een samenvatting van de gebruikers zien, die aan deze voorwaarden voldoet &oacute;f alle gebruikers als er geen voorwaarden ingevoerd zijn.</li>
  <li>directory - Geeft in alfabetische volgorde verwijzingen weer naar de samenvattingen van de gebruikers die voldoen aan de voorwaarden. Het is mogelijk om een directory overzicht te krijgen met een gebruikersnaam of elke andere parameter.</li>
  <li>detail - Geeft een volledig overzicht weer van de gespecificeerde gebruiker.</li>
</ul>';
$lang['help_param_browseproptemplate'] = 'This parameter allows specifying a non default browse property template name to use for a property browsing view';
$lang['help_param_group'] = 'Deze parameter moet de naam inhouden van een FEU gebruikersgroep ';
$lang['help_param_gid'] = 'Deze parameter moet de ID van een FEU gebruikersgroep bevatten en zal de uitkomst beperken tot de leden van deze groep. Deze parameter kan niet gebruikt worden samen met de &#039;group&#039; parameter.';
$lang['help_param_showexpired'] = 'Standaard waarde, de module zal verlopen gebruikers niet tonen in de gebruikte rapporten. Door de parameter op &quot;1&quot; te zetten zullen deze w&eacute;l worden getoond.';
$lang['help_param_bsortby'] = 'Used for the browse action, this parameter specifies the sort order of the generated property output.  Possible values are:
<ul>
  <li>name - the property name.</li>
  <li>count - the number of matches.</li>
</ul>';
$lang['help_param_sparse'] = 'Applicable only to the directory view this option will only show a directory  letter for which there are matching users.';
$lang['help_param_resultpage'] = 'Used for the search, and browse actions, this parameter specifies which CMSMS content page should be used to display the matching articles from the filter operation.';
$lang['help_param_sortby'] = 'Gebruikt voor standaard acties, deze parameter specificeert de volgorde van de gegenereerde uitkomst.  Mogelijke waarden zijn:
<ul>
 <li>id - De gebruikers id</li>
 <li>username - De gebruikersnaam</li>
 <li>createdate - De datum dat het gebruikersaccount is aangemaakt.</li>
 <li>expires - De datum wanneer het gebruikersaccount zal verlopen (of is verlopen).</li>
 <li>activity - De datum wanneer de gebruiker het laatst was in- of uitgelogd.</li>
</ul>';
$lang['help_param_bsortorder'] = 'Used for the browse action, this parameter specifies the sort order of the generated output.  Possible values are:
<ul>
  <li>ASC - Ascending order</li>
  <li>DESC - Descending order</li>
</ul>';
$lang['help_param_sortorder'] = 'Gebruik voor standaard acties, deze parameter specificeert de volgorde van weergeven van de gefilterde informatie. Mogelijke waarden zijn:
<ul>
  <li>ASC - (Ascending order) Aflopende volgorde</li>
  <li>DESC - (Descending order) Oplopende volgorde</li>
</ul>';
$lang['help_param_pagelimit'] = 'Deze parameter specificeerd het maximum aantal gebruikers die worden getoond.';
$lang['help_param_prop'] = 'Gebruikt voor de standaard en directory acties,  deze parameter gedraagt zich op twee verschillende manieren afhangend van de actie:

<ul>
  <li>De standaard (samenvatting) actie
    <p>In de standaard (samenvatting) actie, kan deze parameter worden gebruikt om een bepaalde eigenschap te specificeren om te filteren.</p>
  </li>
  <li>De directory actie.
    <p>In de directory actie, kan deze parameter worden gebruikt om een eigenschap te specificeren om een directory te specificeren. De standaard waarde is &quot;username&quot; (gebruikersnaam)</p>
  </li>
</ul>';
$lang['help_param_propval'] = 'Gebruikt in samenhang met de &quot;prop&quot; parameter voor de standaard (samenvatting) actie, met deze parameter kan een waarde worden gegeven waarmee de gebruikers gefilterd kan worden.';
$lang['help_param_uselike'] = 'Gebruikt in samenhang met de &quot;prop&quot; en de &quot;propval&quot; parameters. Als deze parameter een positieve waarde heeft, zal dit aangeven dat de &quot;propval&quot; parameter een LIKE &#039;expression&#039; bevat.
';
$lang['help_param_detailpage'] = 'Als deze parameter wordt gebruikt, zal deze een pagina ID of een pagina alias bevatten van een CMS pagina waar u het rapport wilt weergeven.';
$lang['help_param_summarytemplate'] = 'Deze parameter wordt gebruikt om een niet standaard samenvattingsjabloon te specificeren voor het samenvattingscherm.';
$lang['help_param_detailtemplate'] = 'Deze parameter wordt gebruikt om een niet standaard detail sjabloon te specificeren voor het detail scherm.';
$lang['help_param_directorytemplate'] = 'Deze parameter wordt gebruikt om een niet standaard detail sjabloon te specificeren voor het directory scherm.';
$lang['help_param_searchformtemplate'] = 'Met deze parameter kunt u een niet standaard zoeksjabloonnaam specificeren voor het gebruik van een zoekformulier';
$lang['help_param_searchproperty'] = 'Met deze parameter kunt u een enkelvoudige FEU eigenschapsnaam toevoegen aan het zoekformulier';
$lang['help_param_uid'] = 'Gebruikt in samenhang met het detail scherm, deze parameter moet een UID bevatten van een bestaand FrontEndUser account.';
$lang['info_browseprop_template'] = 'Browse Property templates display A list of unique values for the specified property.  Each item in the list is a link to a summary view containing the matching users that match that property value.  You may use any smarty logic or variables that have been created previously, or the ones made availability specifically for this view.';
$lang['info_browseprop_templates_tab'] = 'This tab contains the list of available browse property view templates.  One of them is marked as default.  The default one will be used when no alternate template name is supplied on the tag that calls this module';
$lang['info_detail_template'] = 'Detail sjablonen geven een gedetailleerde informatie weer van een bepaalde FrontEndUser. Hier bepaal je hoe deze informatie wordt weergegeven. U kunt gebruik maken van &quot;smarty&quot; logica of van variabelen die eerder zijn gemaakt of van variabelen die speciaal voor dit doel zijn gemaakt';
$lang['info_detail_templates_tab'] = 'Deze tab bevat een lijst met beschikbare detail sjablonen. E&eacute;n is aangevinkt alszijnde standaard. Deze standaard sjabloon zal worden gebruikt als er geen alternatief wordt aangemaakt in de {tag} die deze module aanroept';
$lang['info_directory_template'] = 'Directory sjablonen geven een alfabetische lijst van verwijzingen weer, wanneer op de link wordt geklikt zal een samenvatting geven van de bijbehorende gebruikers voor die letter. Het is mogelijk om directory&#039;s te cre&euml;ren gebaseerd op verschillende parameters.  Hier bepaal je hoe deze informatie wordt weergegeven. U kunt gebruik maken van &quot;smarty&quot; logica of van variabelen die eerder zijn gemaakt of van variabelen die speciaal voor dit doel zijn gemaakt';
$lang['info_directory_templates_tab'] = 'Deze tab bevat een lijst met beschikbare directory sjablonen. E&eacute;n is aangevinkt als zijnde standaard. Deze standaard sjabloon zal worden gebruikt als er geen alternatief wordt aangemaakt in de {tag} die deze module aanroept';
$lang['info_summary_template'] = 'Samenvattingssjablonen geven informatie weer van een lijst gebruikers die voldoen aan een bepaalde criteria. Hier bepaal je hoe deze informatie wordt weergegeven. U kunt gebruik maken van &quot;smarty&quot; logica of van variabelen die eerder zijn gemaakt of van variabelen die speciaal voor dit doel zijn gemaakt';
$lang['info_searchform_template'] = 'Zoekformulier sjablonen tonen een formulier die u laat zoeken naar een bepaalde gebruiker of naar een groep gebruikers. Hier kunt u het formulier vormgeven. U kunt gebruik maken van smarty logica of variabelen die eerder gemaakt zijn of diegene die speciaal voor dit doel zijn gemaakt';
$lang['info_searchform_templates_tab'] = 'Deze tab bevat een lijst van beschikbare zoekformulier sjablonen. E&#039;n ervan is gemerkt als standaard.  Deze wordt gebruikt wanneer er geen andere sjabloonnaam is ingevoerd in de tag die deze module aanroept';
$lang['info_summary_templates_tab'] = 'Deze tab bevat een lijst met beschikbare samenvattingsjablonen. E&eacute;n is aangevinkt als zijnde standaard. Deze standaard sjabloon zal worden gebruikt als er geen alternatief wordt aangemaakt in de {tag} die deze module aanroept';
$lang['info_sysdflt_browseprop_template'] = 'Standaard Browse Eigenschappen Overzicht Sjabloon';
$lang['info_sysdflt_detail_template'] = 'Standaard &quot;Detail View Template&quot;';
$lang['info_sysdflt_directory_template'] = 'Standaard &quot;Directory Template&quot;';
$lang['info_sysdflt_searchform_template'] = 'Systeem Standaard Zoekformulier Sjabloon';
$lang['info_sysdflt_summary_template'] = 'Standaard &quot;Summary View Template&quot;';
$lang['info_sysdflt_template'] = 'Het wijzigen van dit sjabloon zal geen direct effect hebben op de website. Dit formulier bepaalt de inhoud van een sjabloon die wordt gecre&euml;erd wanneer u op &quot;Nieuw sjabloon&quot;  klikt in de gewenste sjabloon tab.';
$lang['last_active'] = 'Laatst Actief';
$lang['lbl_browseproptemplates'] = 'Browse Eigenschappen Sjablonen';
$lang['lbl_defaulttemplates'] = 'Standaard Sjablonen';
$lang['lbl_detailtemplates'] = 'Gedetailleerde overzichtssjablonen';
$lang['lbl_directorytemplates'] = 'Directory Sjablonen';
$lang['lbl_first_page'] = 'Ga naar de eerste pagina';
$lang['lbl_last_page'] = 'Ga naar de laatste pagina';
$lang['lbl_next_page'] = 'Ga naar de volgende pagina';
$lang['lbl_prev_page'] = 'Ga naar de vorige pagina';
$lang['lbl_searchformtemplates'] = 'Zoek Formulier Sjablonen';
$lang['lbl_settings'] = 'Instellingen';
$lang['lbl_summarytemplates'] = 'Samenvatting Sjablonen';
$lang['moddescription'] = 'Een module die u de mogelijkheid geeft om de gegevens van FrontEndUsers te doorzoeken, door te bladeren en te bekijken';
$lang['of'] = 'van';
$lang['page'] = 'Pagina';
$lang['postinstall'] = 'De CGUserDirectory module is nu gereed voor configuratie';
$lang['postuninstall'] = 'De CGUserDirectory module, en alle geassocieerde data is uit de database verwijderd';
$lang['results_all_any'] = 'Return results that match all, or any of the conditions specified';
$lang['submit'] = 'Toevoegen';
$lang['username'] = 'Gebruikersnaam';
$lang['utma'] = '156861353.1493593438.1268660926.1269609855.1269700320.35';
$lang['utmz'] = '156861353.1268660929.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)';
$lang['qca'] = 'P0-1495034508-1268660928732';
$lang['utmb'] = '156861353.2.10.1269700320';
$lang['utmc'] = '156861353';
?>