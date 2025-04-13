<?php
$lang['error_nofeusers'] = 'Errore: Non trovo il modulo FrontEndUsers';
$lang['friendlyname'] = 'Modulo Custom Content';
$lang['postinstall'] = '';
$lang['postuninstall'] = '';
$lang['uninstalled'] = 'Modulo disinstallato.';
$lang['installed'] = 'Versione del modulo %s installata.';
$lang['accessdenied'] = 'Accesso negato. Si prega di controllare i permessi.';
$lang['error'] = 'Errore!';
$lang['upgraded'] = 'Modulo aggiornato alla versione %s.';
$lang['moddescription'] = 'Questo modulo provvede l&#039;abilit&agrave; di specificare contenuto differente per gruppo o nome utente';
$lang['changelog'] = '<ul><li>Version 1.0. 14 September 2005. Initial Release.</li></ul>
<ul>
<li>Version 1.1.  - September 2005. Added startif/else/endif, and search through multiple groups and users.</li>
<li>Version 1.2.  - September 2005. Added loggedin optional parameter</li>
<li>Version 1.3   - October   2005. Changed to use FrontEndUsers instead of UserID</li>
<li>Version 1.3.1 - November 2005. Very minor bugfix to the parameter parsing</li>
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
$lang['help'] = '<h3>Che cosa fa?</h3>
<p>Questo modulo assieme al modulo UserID permette di creare una pagina che viene visualizzata differentemente a seconda della persona. Potete specificare un differente contenuto per utente o per membri di un certo gruppo.</p>
<p><b>Nota 1:</b> Quando mettete la sintassi smarty in ogni pagina, dovreste assicurarvi che le pagine non siano cached. Questo &egrave; effettuato assicurandosi che il campo &quot;cachable&quot; &egrave; vuoto</p>
<p><b>Note 2:</b>Se la sintassi smarty &egrave; nel Modello, dovete assicurarvi che ciascuna pagina che usa il Modello non &egrave; cachable</p>
<h3>Come usarlo</h3>
<pre>
{if $customcontent_loggedin > 0}
  Benvenuto <b>{$customcontent_loginname}</b><br />
{else}
  <h1>Non siete autorizzato a visualizzare questi dati</h1>
{/if}
</pre>
<p>O potete utilizzare la variabile $ccuser per un uso pi&ugrave; avanzato e di pi&ugrave; facile lettura e testing</p>
<pre>
{if $ccuser->loggedin() &amp;&amp; $ccuser->memberof(&#039;members&#039;) &amp;&amp; $ccuser->ipmatches(&#039;192.168.0.0/24&#039;)}
Benvenuto nei membri locali
{elseif $ccuser->loggedin() &amp;&amp; $ccuser->memberof(&#039;members&#039;)}
Benvenuto nei membri
{elseif $ccuser->loggedin()}
Benvenuto utente di altri gruppi
{else}
Utente anonimo
{/if}
</pre>
<p>Altro esempio: (prendere l&#039;alias della pagina root)</p>
<pre>
{capture assign=&#039;rootalias&#039;}{$ccuser->get_root_alias()}{/capture}
</pre>
<p>Alternativamente:</p>
{$ccuser->get_root_alias(&#039;&#039;,&#039;assign&#039;)}
<p>Qualsiasi espressione o logica di smarty pu&ograve; essere usata con le variabili utilizzabili. Usando questa sintassi, si useranno espressioni inserite uno dentro l&#039;altra o si user&agrave; una logica complessa.</p>
<p><b>Variabili utilizzabili:</b></p>
<ul>
<li><p><em>ccuser</em> - An object with convenience functions for testing.</p>
<p>This object contains some convenience methods for performing more advanced customcontent logic, or for making your template look a little bit better. The available methods are:</p>
  <ul>
<li><em>$ccuser->get_parent_alias($alias,$assign)</em> - outputs l&#039;alias della pagina parent, o vuoto se la pagina specificata non ha un parent (&egrave; il top). Quest funzione accetta un alias di pagina come argomento, se nessun alias &egrave; specificato o &egrave; vuoto, &egrave; assunta la pagina corrente. Se il parametro assign non &egrave; vuoto il risultato sar&agrave; assegnato a una variabile smarty che coincide con il nome dato.</li>
<li><em>$ccuser->get_root_alias($alias,$assign)</em> - outputs the page alias of the topmost parent page, or empty if the specified page does not have a parent (is at the top).  This function will accept a page alias as an argument, if no page alias is specified or is empty, the current page is assumed. If the assign parameter is not empty the results will be assigned to a smarty variable matching the supplied name.</li>
<li><em>$ccuser->get_page_title($alias,$assign)</em> - outputs the title of the page matching the supplied alias.  This function will accept a page alias as an argument, if no page alias is specified or it is empty, the current page is assumed. If the assign parameter is not empty the results will be assigned to a smarty variable matching the supplied name.</li>
<li><em>$ccuser->has_children($alias,$assign)</em> - outputs a boolean indicating if the specified page has child pages or not.  This function will accept a page alias as an argument, if no page alias is specified or it is empty, the current page is assumed. If the assign parameter is not empty the results will be assigned to a smarty variable matching the supplied name.</li>
<li><em>$ccuser->groups()</em> - outputs a list of the users member groups</li>
<li><em>$ccuser->memberof(&#039;group&#039;)</em> - outputs a boolean if the user is indeed a member of this group.  This function will also accept a comma separated list of group names.</li>
<li><em>$ccuser->loggedin()</em> - outputs a boolean if the user is loggedin</li>
<li><em>$ccuser->username()</em> - outputs the username of the currently logged in user.</li>
<li><em>$ccuser->property(&#039;propertyname&#039;)</em> - outputs the value of the property for the currently logged in user.</li>
<li><em>$ccuser->module_installed(&#039;modulename&#039;)</em> - outputs a boolean if the specified module is installed and available.</li>
<li><em>$ccuser->ipmatches($ranges)</em> - outputs a boolean if the users ip address matches one of the comma separated ip ranges.  Accepts ranges like ###.###.###.###/## i.e: 192.168.0.0/24</li>
  </ul>
<br/>
</li>
<li><p><em>customcontent_ip</em> - L&#039;indirizzo IP remoto</p></li>
<li><p><em>customcontent_loggedin</em> - Un valore booleano (true/false) che indica se l&#039;utente &egrave; autenticato o meno</p></li>
<li><p><em>customcontent_loginname</em> - Il nome del corrente utente autenticato</p></li>
<li><p><em>customcontent_groupcount</em> - Un contatore del numero di gruppi a cui appartiene questo utente</p></li>
<li><p><em>customcontent_groups</em> - Una stringa contenente il nome di tutti i gruppi</p></li>
<li><p><em>customcontent_memberof_*</em> - Una serie di valori booleani indicanti l&#039;appartenenza al gruppo. p.e.: customcontent_memberof_staff, customcontent_memberof_users, etc. Nessuna variabile &egrave; definita per i gruppi a cui non appartiene l&#039;utente.</p></li>
<li><p><em>customcontent_dayzeros</em> - Day of the month, 2 digits with leading zeros</p></li>
<li><p><em>customcontent_day3text</em> - A textual representation of a day, three letters</p></li>
<li><p><em>customcontent_day</em> - Day of the month without leading zeros</p></li>
<li><p><em>customcontent_weekday</em> - A full textual representation of the day of the week</p></li>
<li><p><em>customcontent_dayordsuffix</em> - English ordinal suffix for the day of the month, 2 characters</p></li>
<li><p><em>customcontent_dayofweek</em> - Numeric representation of the week</p></li>
<li><p><em>customcontent_dayofyear</em> - The day of the year (starting from 0)</p></li>
<li><p><em>customcontent_weeknum</em> - ISO-8601 week number of year, weeks starting on Monday</p></li>
<li><p><em>customcontent_monthfulltext</em> - A full textual representation of a month, such as January or March</p></li>
<li><p><em>customcontent_monthnumzeros</em> - Numeric representation of a month, with leading zeros</p></li>
<li><p><em>customcontent_monthshorttext</em> - A short textual representation of a month, three letters</p></li>
<li><p><em>customcontent_monthnum</em> - Numeric representation of a month, without leading zeros</p></li>
<li><p><em>customcontent_monthnumdays</em> - Number of days in the current month</p></li>
<li><p><em>customcontent_leapyear</em> - Wether it&#039;s a leap year</p></li>
<li><p><em>customcontent_4digityear</em> - A full numeric representation of a year, 4 digits</p></li>
<li><p><em>customcontent_2digityear</em> - A two digit representation of a year</p></li>
<li><p><em>customcontent_lowerampm</em> - Lowercase Ante meridiem and Post meridiem</p></li>
<li><p><em>customcontent_upperampm</em> - Uppercase Ante meridiem and Post meridiem</p></li>
<li><p><em>customcontent_inettime</em> - Swatch Internet time</p></li>
<li><p><em>customcontent_12hour</em> - 12-hour format of an hour without leading zeros</p></li>
<li><p><em>customcontent_24hour</em> - 24-hour format of an hour without leading zeros</p></li>
<li><p><em>customcontent_12hourzeros</em> - 12-hour format of an hour with leading zeros</p></li>
<li><p><em>customcontent_24hourzeros</em> - 24-hour format of an hour with leading zeros</p></li>
<li><p><em>customcontent_minutes</em> - Minutes with leading zeros</p></li>
<li><p><em>customcontent_seconds</em> - Seconds, with leading zeros</p></li>
<li><p><em>customcontent_timezone</em> - Timezone setting of this machine</p></li>
<li><p><em>customcontent_date</em> - RFC 2822 formatted date</p></li>
<li><p><em>customcontent_epochseconds</em> - Seconds since the Unix Epoch (January 1 1970 00:00:00 GMT)</p></li>
</ul>
<h3>Copyright e licenza</h3>
<p>Copyright &copy; 2005, Robert Campbell <a href="mailto:calguy1000@hotmail.com"><calguy1000@hotmail.com></a>. Tutti i diritti sono riservati.</p>
<p>Questo modulo &egrave; stato rilasciato sotto la <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. Devi aderire a questa licenza prima di usare il modulo.</p>';
$lang['utmz'] = '156861353.1228168733.609.121.utmccn=(referral)|utmcsr=forum.cmsmadesimple.org|utmcct=/index.php|utmcmd=referral';
$lang['utma'] = '156861353.1807151640.1182960456.1227740242.1228168733.609';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>