<?php
$lang['error_nofeusers'] = 'Fehler: Konnte kein installiertes FrontEndUsers-Modul finden';
$lang['friendlyname'] = 'CustomContent-Modul';
$lang['postinstall'] = '';
$lang['postuninstall'] = '';
$lang['uninstalled'] = 'Modul deinstalliert.';
$lang['installed'] = 'Modulversion %s installiert.';
$lang['accessdenied'] = 'Zugriff verweigert. Bitte pr&uuml;fen Sie Ihre Berechtigungen.';
$lang['error'] = 'Fehler!';
$lang['upgraded'] = 'Modul auf Version %s aktualisiert.';
$lang['moddescription'] = 'Mit diesem Modul k&ouml;nnen Sie in Abh&auml;ngigkeit der Gruppenzugeh&ouml;rigkeit oder des Benutzernamens verschiedene Inhalte auf Ihrer Homepage anzeigen lassen.';
$lang['changelog'] = '<ul><li>Version 1.0. 14 September 2005. Initial Release.</li></ul>
<ul>
<li>Version 1.1.  - September 2005. Added startif/else/endif, and search through multiple groups and users.</li>
<li>Version 1.2.  - September 2005. Added loggedin optional parameter</li>
<li>Version 1.3   - October   2005. Changed to use FrontEndUsers instead of UserID</li>
<li>Version 1.3.1 - November 2005. Very minor bugfix to the parameter parsing</li>
<li>Version 1.4.0 - January, 2006.
<p>Added smarty compatible variables</p>
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
</li>
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
$lang['help'] = '<h3>Was macht dieses Modul?</h3>
<p>Dieses Modul erm&ouml;glicht es, in Verbindung mit dem FrontendUsers-Modul eine Seite zu erstellen, deren Inhalt von der Person abh&auml;ngig ist, die sie betrachtet. So k&ouml;nnen Sie f&uuml;r bestimmte Benutzer oder Mitglieder bestimmter Gruppen unterschiedliche Inhalte festlegen.</p>
<p><b>Hinweis 1:</b> Wenn Sie die Smarty-Logik im Inhalt einer Seite einf&uuml;gen, sollten Sie darauf achten, dass beim Speichern dieser Seite der Parameter &quot;Zwischenspeichern&quot; (Reiter Optionen) nicht aktiviert ist.</p>
<p><b>Hinweis 2:</b> Wenn Sie die Smarty-Logik in Ihrem Template einsetzen, sollten Sie darauf achten, dass f&uuml;r jede Seite, die dieses Template verwendet, der Parameter &quot;Zwischenspeichern&quot; deaktiviert ist.</p>
<h3>Wie wird es eingesetzt?</h3>
<p>Rufen Sie das Modul mit {cms_module module=&#039;CustomContent&#039;} in einer Seite oder einem Template auf. Unterhalb plazieren Sie die Inhalte, die den Besuchern in Abh&auml;ngigkeit von Ihres Status (Anmeldung, Gruppenzugeh&ouml;rigkeit etc.)  angezeigt werden sollen:</p>
<pre>
{if $customcontent_loggedin > 0}
  Willkommen &amp;lt;b&amp;gt;{$customcontent_loginname}&amp;lt;/b&amp;gt;&amp;lt;br/&amp;gt;
{else}
  <h1>Sie sind nicht authorisiert, diese Daten zu sehen.</h>
{/if}
</pre>
<p>Oder Sie verwenden die $ccuser-Variable f&uuml;r erweiterte und einfacher zu lesende Abfragen:</p>
<pre>
{if $ccuser->loggedin() &amp;&amp; $ccuser->memberof(&#039;members&#039;) &amp;&amp; $ccuser->ipmatches(&#039;192.168.0.0/24&#039;)}
   Willkommen, angemeldetes Mitglied
{elseif $ccuser->loggedin() &amp;&amp; $ccuser->memberof(&#039;members&#039;)}
   Willkommen, angemeldetes Mitglied
{elseif $ccuser->loggedin()}
   Willkommen, Benutzer einer anderen Gruppe
{else}
   Anonymer Benutzer
{/if}
</pre>
<p>Ein anderes Beispiel: (den Seiten-Alias der &uuml;bergeordneten Seite (1. Ebene) ermitteln)</p>
<pre>
{capture assign=&#039;rootalias&#039;}{$ccuser->get_root_alias()}{/capture}
</pre>
<p>Alternativ:</p>
{$ccuser->get_root_alias(&#039;&#039;,&#039;assign&#039;)}
<p>Die verf&uuml;gbaren Variablen k&ouml;nnen mit jeder Smarty-kompatiblen ODER-Logik verwendet werden. Wenn Sie Smarty-Syntax einsetzen, k&ouml;nnen die Ausdr&uuml;cke verschachtelt sein oder eine komplexe Logik verwenden.</p>
<p><b>Verf&uuml;gbare Variablen:</b></p>
<ul>
<li><p><em>ccuser</em> - Ein Objekt mit komfortablen Funktionen zum Testen.</p>
<p>Dieses Objekt enth&auml;lt einige komfortable Methoden, um eine erweiterte CustomContent-Logik zu verwenden oder Ihr Template etwas besser aussehen zu lassen. Die verf&uuml;gbaren Methoden sind folgende:</p>
  <ul>
<li><em>$ccuser->get_parent_alias($alias,$assign)</em> - gibt den Seiten-Alias der &uuml;bergeordneten Seite aus oder ist leer, wenn die vorgegebene Seite keine &uuml;bergeordneten Seiten hat (also selbst eine Seite in der 1. Ebene ist).  Diese Funktion akzeptiert den Seiten-Alias als Argument. Ist der Seiten-Alias nicht vorgegeben oder leer, wird die aktuelle Seite verwendet. Wenn der assign Parameter nicht leer gelassen wurde, wird das Ergebnis einer Smarty-Variablen mit diesem Namen zugewiesen.</li>
<li><em>$ccuser->get_root_alias($alias,$assign)</em> - gibt den Seiten-Alias der &uuml;bergeordneten Seite der 1. Ebene aus oder ist leer, wenn die vorgegebene Seite keine &uuml;bergeordneten Seiten hat (also selbst eine Seite in der 1. Ebene ist).  Diese Funktion akzeptiert den Seiten-Alias als Argument. Ist der Seiten-Alias nicht vorgegeben oder leer, wird die aktuelle Seite verwendet. Wenn der assign Parameter nicht leer gelassen wurde, wird das Ergebnis einer Smarty-Variablen mit diesem Namen zugewiesen.</li>
<li><em>$ccuser->get_page_title($alias,$assign)</em> - gibt den Titel einer Seite aus, dessen Seiten-Alias vorgegeben wurde.  Diese Funktion akzeptiert den Seiten-Alias als Argument. Ist der Seiten-Alias nicht vorgegeben oder leer, wird die aktuelle Seite verwendet. Wenn der assign Parameter nicht leer gelassen wurde, wird das Ergebnis einer Smarty-Variablen mit diesem Namen zugewiesen.</li>
<li><em>$ccuser->has_children($alias,$assign)</em> - gibt eine Variable vom Typ Boolean aus, wenn die vorgegebene Seite untergeordnete Seiten hat oder nicht.  Diese Funktion akzeptiert den Seiten-Alias als Argument. Ist der Seiten-Alias nicht vorgegeben oder leer, wird die aktuelle Seite verwendet. Wenn der assign Parameter nicht leer gelassen wurde, wird das Ergebnis einer Smarty-Variablen mit diesem Namen zugewiesen.</li>
<li><em>$ccuser->groups()</em> - gibt eine Liste der Benutzer aller Gruppenmitglieder aus</li>
<li><em>$ccuser->memberof(&#039;group&#039;)</em> - gibt eine Variable vom Typ Boolean aus, wenn der Benutzer Mitglied dieser Gruppe ist. Diese Funktion akzeptiert auch eine mit Kommata getrennte Liste von Gruppennamen.</li>
<li><em>$ccuser->loggedin()</em> - gibt eine Variable vom Typ Boolean aus, wenn der Benutzer angemeldet ist</li>
<li><em>$ccuser->property(&#039;propertyname&#039;)</em> - gibt den Wert der Eigenschaft f&uuml;r den aktuell angemeldeten Benutzer aus.</li>
<li><em>$ccuser->module_installed(&#039;modulename&#039;)</em> - gibt eine Variable vom Typ Boolean aus, wenn das vorgegebene Modul installiert und verf&uuml;gbar ist.</li>
<li><em>$ccuser->ipmatches($ranges)</em> - gibt eine Variable vom Typ Boolean aus, wenn die IP des Benutzers mit einem Wert einer vorgegebenen (durch Kommata zu trennenden) IP-Liste &uuml;bereinstimmt.  Es werden Werte im Format ###.###.###.###/## akzeptiert, z. Bsp: 192.168.0.0/24</li>
  </ul>
<br/>
</li>
<li><p><em>customcontent_ip</em> - die Remote-IP-Adresse</p></li>
<li><p><em>customcontent_loggedin</em> - eine Variable vom Typ Boolean, die bestimmt, ob ein Benutzer angemeldet ist oder nicht</p></li>
<li><p><em>customcontent_loginname</em> - der Name des aktuell angemeldeten Benutzers</p></li>
<li><p><em>customcontent_groupcount</em> - ein Z&auml;hler f&uuml;r die Anzahl der Gruppen, in denen dieser Benutzer Mitglied ist</p></li>
<li><p><em>customcontent_groups</em> - ein String, der die Gruppennamen aller Gruppen enth&auml;lt</p></li>
<li><p><em>customcontent_memberof_*</em> - eine Reihe von Variablen vom Typ Boolean, die eine Gruppenmitgliedschaft festlegt.  z. Bsp.: customcontent_memberof_staff, customcontent_memberof_users, usw.  Wurden keine Variablen f&uuml;r die Gruppen definiert, bedeutet das, dass der Benutzer kein Mitglied einer der Gruppen ist.</p></li>
<li><p><em>customcontent_dayzeros</em> - Tag des Monats, 2 Zeichen mit f&uuml;hrenden Nullen</p></li> 
<li><p><em>customcontent_day3text</em> - Abk&uuml;rzung des Namens des Tages mit drei Buchstaben</p></li>
<li><p><em>customcontent_day</em> - Tag des Monats ohne f&uuml;hrende Nullen</p></li> 
<li><p><em>customcontent_weekday</em> - vollst&auml;ndige Textanzeige des Wochentages</p></li> 
<li><p><em>customcontent_dayordsuffix</em> - Englisches Suffix f&uuml;r den Tag des Monats, 2 Zeichen</p></li> 
<li><p><em>customcontent_dayofweek</em> - Numerische Anzeige der Woche</p></li> 
<li><p><em>customcontent_dayofyear</em> - Tag des Jahres (beginnend mit 0)</p></li> 
<li><p><em>customcontent_weeknum</em> - Wochennummer des Jahres nach ISO-8601, Wochen beginnen mit Montag</p></li> 
<li><p><em>customcontent_monthfulltext</em> - vollst&auml;ndige Textanzeige des Monatsnamens (zum Beispiel Januar oder M&auml;rz)</p></li> 
<li><p><em>customcontent_monthnumzeros</em> - Numerische Darstellung eines Monats, mit f&uuml;hrenden Nullen</p></li> 
<li><p><em>customcontent_monthshorttext</em> - Abk&uuml;rzung eines Monats, drei Buchstaben</p></li> 
<li><p><em>customcontent_monthnum</em> - Numerische Darstellung eines Monats, ohne f&uuml;hrende Nullen</p></li> 
<li><p><em>customcontent_monthnumdays</em> - Anzahl der Tage des aktuellen Monats</p></li> 
<li><p><em>customcontent_leapyear</em> - Wenn es ein Schaltjahr ist</p></li> 
<li><p><em>customcontent_4digityear</em> - vierstellige numerische Darstellung eines Jahres</p></li> 
<li><p><em>customcontent_2digityear</em> - zweistellige Darstellung eines Jahres</p></li> 
<li><p><em>customcontent_lowerampm</em> - Ante meridiem und Post meridiem klein geschrieben</p></li> 
<li><p><em>customcontent_upperampm</em> - Ante meridiem und Post meridiem gross geschrieben</p></li>
<li><p><em>customcontent_inettime</em> - Swatch Internet Zeit</p></li>
<li><p><em>customcontent_12hour</em> - 12-Stunden-Format ohne f&uuml;hrende Nullen</p></li>
<li><p><em>customcontent_24hour</em> - 24-Stunden-Format ohne f&uuml;hrende Nullen</p></li>
<li><p><em>customcontent_12hourzeros</em> - 12-Stunden-Format mit f&uuml;hrenden Nullen</p></li>
<li><p><em>customcontent_24hourzeros</em> - 24-Stunden-Format mit f&uuml;hrenden Nullen</p></li>
<li><p><em>customcontent_minutes</em> - Minuten mit f&uuml;hrenden Nullen</p></li>
<li><p><em>customcontent_seconds</em> - Sekunden, mit f&uuml;hrenden Nullen</p></li>
<li><p><em>customcontent_timezone</em> - Zeitzone dieses Systems</p></li>
<li><p><em>customcontent_date</em> - nach RFC 2822 formatiertes Datum</p></li>
<li><p><em>customcontent_epochseconds</em> - Sekunden seit Beginn der Unix-Epoche (1. Januar 1970 00:00:00 GMT)</p></li>
</ul>
<h3>Copyright und Lizenz</h3>
<p>Copyright &copy; 2005, Robert Campbell <a href="mailto:rob@techcom.dyndns.org">rob@techcom.dyndns.org</a>. Alle Rechte vorbehalten.</p>
<p>Dieses Modul wurde unter der <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a> ver&ouml;ffentlicht. Sie m&uuml;ssen dieser Lizenz zustimmen, bevor sie das Modul verwenden.</p>
';
$lang['utma'] = '156861353.717462736.1147511856.1213780620.1213782764.320';
$lang['utmz'] = '156861353.1212906535.318.1.utmccn=(direct)|utmcsr=(direct)|utmcmd=(none)';
?>