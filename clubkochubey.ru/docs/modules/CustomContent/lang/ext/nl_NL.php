<?php
$lang['error_nofeusers'] = 'Fout: Kan de FrontEndUsers module niet vinden';
$lang['friendlyname'] = 'Custom Content Module ';
$lang['postinstall'] = ' ';
$lang['postuninstall'] = ' ';
$lang['uninstalled'] = 'Module verwijderd.';
$lang['installed'] = 'Module versie %s ge&iuml;nstalleerd.';
$lang['accessdenied'] = 'Toegang geweigerd. Controleer je rechten.';
$lang['error'] = 'Fout!';
$lang['upgraded'] = 'Module geupgrade naar versie %s.';
$lang['moddescription'] = 'Deze module geeft de mogelijkheid om verschillende content aan groepen of gebruikers te tonen.';
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
</ul>';
$lang['help'] = '<h3>Wat doet het?</h3>
<p>Deze module laat, samen met de FrontEndUser module, u pagina&#039;s cre&euml;ren die zijn afgestemd op de persoon die ze opvraagt. U kunt verschillende inhoud specificeren voor specifieke gebruikers of leden van een specifieke.</p>
<p><b>Opmerking 1:</b> Als u custom smarty logic in een pagina plaats vergewist u er dan van dat de pagina niet gecached wordt.  Dit wordt voorkomen door op de pagina &quot;Kan in buffer opgenomen worden&quot; uit te vinken (zie Pagina&#039;s menu).</p>
<p><b>Opmerking 2:</b> Als smarty logic is het sjabloon is verwerkt moet mag geen van de pagina&#039;s die deze sjabloon gebruikt opgeslagen wordt in de buffer (not cachable)</p>
<h3>Hoe gebruikt u het?</h3>
<p>Om de functionaliteit te gebruiken plaatst u de tag {cms_module  module=CustomContent} in de pagina of het sjabloon met daaronder de inhoud die u wilt beperken tot specifieke gebruikers in groepen. Dit kan door de volgende smarty syntax te gebruiken.</p>
<h4>Methode 1: smarty tags</h4>
<pre>
{if $customcontent_loggedin}
  Welkom <b>{$customcontent_loginname}</b>
{else}
  U bent niet bevoegd om deze gegevens te bekijken
{/if}
</pre>
<p>Of u kunt de $ccuser variabele gebruiken waarmee beter getest kan worden en wat beter leesbaar is.</p>
<pre>
{if $ccuser->loggedin() &amp;&amp; $ccuser->memberof(&#039;members&#039;) &amp;&amp; $ccuser->ipmatches(&#039;192.168.0.0/24&#039;)}
Welkom ingelogde lokaal lid
{elseif $ccuser->loggedin() &amp;&amp; $ccuser->memberof(&#039;members&#039;)}
Welkom ingelogd lidr
{elseif $ccuser->loggedin()}
Welkom gebruiker van een andere groep
{else}
Anonieme gebruiker
{/if}
</pre>
<p>Iedere smarty-compatible expressie of logica kan worden gebruikt met de beschikbare variabelen.  Expressies mogen genest zijn en kan er samengestelde logica worden gebruikt.</p>
<h4>Beschikbare parameters</h4> 
<ul>
<li><p><em>ccuser</em> - Een object om testen van functies te vergemakkelijken.</p>
<p>Dit object bevat enkele methode waarmee uitgebreidere customcontent logica uitgevoerd kan worden of om het sjabloon er wat beter uit te laten zien. De beschikbare methoden zijn:</p>
  <ul>
<li><em>$ccuser->groups()</em> - toont een lijst met gebruikerslidgroepen</li>
<li><em>$ccuser->memberof(&#039;group&#039;)</em> - geeft een boolean als de gebruiker inderdaad lid is van deze groep. Deze functie accepteert ook een lijst met kommagescheiden groepsnamen.</li>
<li><em>$ccuser->loggedin()</em> - geeft een boolean als de gebruiker ingelogd is</li>
<li><em>$ccuser->property(&#039;propertyname&#039;)</em> - geeft de waarde van de eigenschap van de huidig, ingelogde gebruiker.</li>
<li><em>$ccuser->module_installed(&#039;modulename&#039;)</em> - geeft een boolean als de opgegeven module ge&iuml;nstalleerd en beschikbaar is.</li>
<li><em>$ccuser->ipmatches($ranges)</em> - geeft een boolean als het ip-adres van de gebruiker overeenkomt met een van de adressen in de koamagescheiden ip-bereiken. Accepteert bereiken zoals ###.###.###.###/##, dus b.v.: 192.168.0.0/24</li>
  </ul>
<br/>
</li>
<li><p><em>customcontent_ip</em> - Het remote IP-adres</p></li>
<li><p><em>customcontent_loggedin</em> - Een boolean die aangeeft of een gebruiker is ingelogd of niet</p></li>
<li><p><em>customcontent_loginname</em> - De naam van de huidige, ingelogde gebruiker</p></li>
<li><p><em>customcontent_groupcount</em> - Een telling van het aantal groepen waar deze gebruiker lid van is</p></li>
<li><p><em>customcontent_groups</em> - Een string met alle groepsnamen van alle lidgroepen</p></li>
<li><p><em>customcontent_memberof_*</em> - Een serie booleaanse variabelen die groepslidmaatschap aangeven, bijvoorbeeld: customcontent_memberof_staff, customcontent_memberof_users, etc.  Er worden geen variabelen gedefinieerd voor groepen waar deze gebruiker geen lid van is</p></li>
<li><p><em>customcontent_dayzeros</em> - Dag van de maand, twee karakters met voorloopnullen</p></li> 
<li><p><em>customcontent_day3text</em> - Een tekstuele weergave van een dag, drie letters</p></li>
<li><p><em>customcontent_day</em> - Dag van de maand, zonder voorloopnullen</p></li> 
<li><p><em>customcontent_weekday</em> - Een lange, tekstuele weergave van een dag van de week</p></li> 
<li><p><em>customcontent_dayordsuffix</em> - Engelsche &#039;ordinal suffix&#039; van de dag van de maand, 2 karakters (1st, 2nd)</p></li> 
<li><p><em>customcontent_dayofweek</em> - Numerieke weergave van de week</p></li> 
<li><p><em>customcontent_dayofyear</em> - De dag van het jaar (beginnend met 0)</p></li> 
<li><p><em>customcontent_weeknum</em> - ISO-8601 weeknummer van het jaar, weken starten op maandag</p></li> 
<li><p><em>customcontent_monthfulltext</em> - Een lange, tekstuele weergave van een maand, zoals januari of maart</p></li> 
<li><p><em>customcontent_monthnumzeros</em> - Numerieke weergave van een maand, met voorloopnullen</p></li> 
<li><p><em>customcontent_monthshorttext</em> - Een korte, tekstuele weergave van een maand, drie letters</p></li> 
<li><p><em>customcontent_monthnum</em> - Numerieke weergave van een maand, zonder voorloopnullen</p></li> 
<li><p><em>customcontent_monthnumdays</em> - Aantal dagen in de huidige maand</p></li> 
<li><p><em>customcontent_leapyear</em> - Waar als het een schrikkeljaar betreft</p></li> 
<li><p><em>customcontent_4digityear</em> - Een lange, numerieke weergave van het jaar, vier karakters</p></li> 
<li><p><em>customcontent_2digityear</em> - Een korte, numerieke weergave van het jaar, twee karakters</p></li> 
<li><p><em>customcontent_lowerampm</em> - Onderkast Ante meridiem (am) en Post meridiem (pm)</p></li> 
<li><p><em>customcontent_upperampm</em> - Bovenkast Ante meridiem (AM) en Post meridiem (PM)</p></li>
<li><p><em>customcontent_inettime</em> - Swatch Internettijd</p></li>
<li><p><em>customcontent_12hour</em> - 12-uurs weergave van een uur zonder voorloopnullen</p></li>
<li><p><em>customcontent_24hour</em> - 24-uurs weergave van een uur zonder voorloopnullen</p></li>
<li><p><em>customcontent_12hourzeros</em> - 12-uurs weergave van een uur met voorloopnullen</p></li>
<li><p><em>customcontent_24hourzeros</em> - 24-uurs weergave van een uur met voorloopnullen</p></li>
<li><p><em>customcontent_minutes</em> - Minuten met voorloopnullen</p></li>
<li><p><em>customcontent_seconds</em> - Seconden met voorloopnullen</p></li>
<li><p><em>customcontent_timezone</em> - Tijdzone instellingen van deze computer</p></li>
<li><p><em>customcontent_date</em> - RFC 2822 geformateerde datum</p></li>
<li><p><em>customcontent_epochseconds</em> - Seconden sinds de Unix Epoch (January 1 1970 00:00:00 GMT)</p></li>
</ul>
<h4>Methode 2: commentaar tags <em>(vervallen vanaf versie 1.5)</em></h3>
<p>To use it you place the tag {cms_module module=CustomContent} into your page or template, and then below that you place the content you want isolated to specific users in groups in one of two ways, either using specially formatted comment tags, or using smarty syntax.</p>
<pre>
{cms_module module=CustomContent}
cms_module module=CustomContent}
&amp;lt;!--customContent: startif group=testers,admins --&amp;gt;
&amp;lt;H1&amp;gt;This content is only available to logged in testers and and admins&amp;lt;/H1&amp;gt;
&amp;lt;!--customContent: else --&amp;gt;
&amp;lt;H1&amp;gt;This content is available to everybody else&amp;lt;/H1&amp;gt;
&amp;lt;!--customContent: endif --&amp;gt;
&amp;lt;!--customContent: startif group=users --&amp;gt;
&amp;lt;H1&amp;gt;This content is only available to logged in users &amp;lt;/H1&amp;gt;
&amp;lt;!--customContent: endif --&amp;gt;
</pre>
<h4>Beschikbare variabelen:</h4>
<ul>
<li><p><em>ip</em> - evalueert of de remote-ip overeenkomt met een netwerk of opgegevens ip-adres. Geldige formaten zijn xxx.xxx.xxx.xxx (exact), xxx.xxx.xxx.[yyy-zzz] (bereik) en xxx.xxx.xxx/nn (nn = # bits, bijvoorbeeld  192.168.1.0/24)</p></li>
<li><p><em>group</em> - evalueert of de huidige, ingelogde gebruiker lid is van een van de opgegeven groepen</p></li>
<li><p><em>user</em> - evalueert of de huidige, ingelogde username overeenkomt met &eacute;&eacute;n van de opgegeven namen</p></li>
<li><p><em>loggedin</em> - evalueert of de huidige gebruiker ingelogd is of niet.</p></li>
</ul>
<p>Er wordt ge&euml;valueerd met de logische OR methode in de volgende rangorde: ip-adres, groep en gebruiker.  De eerste, goede overeenkomst zal een &quot;waar&quot; van de ge&euml;valueerde expressie opleveren<p>

<h3>Copyright and Licentie</h3>
<p>Copyright &copy; 2005, Robert Campbell <a href=&quot;mailto:rob@techcom.dyndns.org&quot;><rob@techcom.dyndns.org></a>. Alle rechten zijn voorbehouden.</p>
<p>Deze module is vrijgegeven onder de <a href=&quot;http://www.gnu.org/licenses/licenses.html#GPL&quot;>GNU Public License</a>. Je moet toestemmen met deze licentie v&oacute;&oacute;r het gebruik van deze module.</p>
';
$lang['utma'] = '156861353.1412123065.1200399601.1200756910.1200815227.5';
$lang['utmz'] = '156861353.1200756910.4.4.utmccn=(referral)|utmcsr=cmsmadesimple.org|utmcct=/|utmcmd=referral';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>