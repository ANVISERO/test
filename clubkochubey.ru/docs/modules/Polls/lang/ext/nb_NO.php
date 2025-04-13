<?php
$lang['friendlyname'] = 'Polls(Valg) Made Simple';
$lang['moddescription'] = 'Denne modulen tilbyr enkel valg/avstemnings funksjonalitet til frontend brukerne.';
$lang['permission'] = 'Administrer Valg';
$lang['postinstall'] = 'Valg(Polls) versjon %s ble installert';
$lang['upgraded'] = 'Valg ble oppgradert til versjon %s';
$lang['really_uninstall'] = 'Er du sikker p&aring; du vil avinstallere Valg og slette alle oppsamlede data?';
$lang['postuninstall'] = 'valg ble avinstallert';
$lang['help_poll_id'] = 'Benytt dette til &aring; spesifisere id&#039;en til et annet valg enn det som satt som aktivt';
$lang['showwhatpoll'] = 'Vis';
$lang['activepoll'] = 'Aktiv';
$lang['randompoll'] = 'Tilfeldig valgt &aring;pent Valg';
$lang['pollname'] = 'Valg navn';
$lang['pollstatus'] = 'Valg status';
$lang['edit'] = 'Endre';
$lang['delete'] = 'Slett';
$lang['pollstartdate'] = 'Start dato';
$lang['pollclosedate'] = 'Slutt dato';
$lang['pollinfo'] = 'Valg info';
$lang['pollranfor'] = 'Valget kj&oslash;rte i';
$lang['pollhasbeenrunningfor'] = 'Valget har blitt kj&oslash;rt i';
$lang['days'] = 'dager';
$lang['open'] = '&Aring;pne';
$lang['closed'] = 'Lukket';
$lang['confirmclosepoll'] = 'Er du sikker p&aring; at dette valget skal lukkes?';
$lang['pollwasclosed'] = 'Valget ble stengt';
$lang['addpoll'] = 'Legg til Valg';
$lang['addnewpoll'] = 'Legg til nytt Valg';
$lang['addandaddoptions'] = 'Legg til Valg og opsjoner';
$lang['pollnamerequired'] = 'Et navn p&aring; Valget er n&oslash;dvendig';
$lang['polladded'] = 'Valget ble lagt til';
$lang['add'] = 'Legg til';
$lang['cancel'] = 'Avbryt';
$lang['confirmdeletepoll'] = 'Er du sikker p&aring; at dette Valget skal slettes?';
$lang['polldeleted'] = 'Valget ble slettet';
$lang['confirmresetpoll'] = 'Er du sikker p&aring; at du vil nullstille stemmene for dette Valget?';
$lang['optionnamerequired'] = 'Et navn for opsjonen er n&oslash;dvendig';
$lang['addoption'] = 'Legg til opsjon';
$lang['votes'] = 'Stemmer';
$lang['votepercent'] = '% ';
$lang['confirmdeleteoption'] = 'Er du sikker p&aring; du vil slette denne opsjonen?';
$lang['editoptions'] = 'Rediger opsjon';
$lang['addingto'] = 'Lagt til til: ';
$lang['optionadded'] = 'Opsjonen ble lagt til';
$lang['optiondeleted'] = 'Opsjonen ble slettet';
$lang['addnewoption'] = 'Legg til opsjon';
$lang['editpoll'] = 'Rediger Valg';
$lang['resetpoll'] = 'Nullstill Valg';
$lang['pollreset'] = 'Stemmene for dette valget ble nullstilt';
$lang['optionname'] = 'Opsjon navn';
$lang['template'] = 'Mal';
$lang['polls'] = 'Valg';
$lang['showpeekbutton'] = 'Vis Status n&aring;-knapp';
$lang['settings'] = 'Instillinger';
$lang['savesettings'] = 'Lagre instillinger';
$lang['settingssaved'] = 'Instillinger lagret';
$lang['polltemplate'] = 'Valg mal';
$lang['resulttemplate'] = 'Resultat mal';
$lang['listtemplate'] = 'Valg-liste mal';
$lang['return'] = 'Tilbake';
$lang['ok'] = 'OK ';
$lang['resettodefault'] = 'Tilbakesatt til standard mal';
$lang['confirmtemplate'] = 'Er du sikker p&aring; du vil tilbakestille til standard mal?';
$lang['templatesaved'] = 'Malen ble lagret';
$lang['templatereset'] = 'Malen ble tilbakesatt til standard';
$lang['votetext'] = 'stem';
$lang['votestext'] = 'stemmer';
$lang['totalvotes'] = 'Totalt stemmer';
$lang['vote'] = 'Stem';
$lang['peekresult'] = 'Status n&aring;';
$lang['returntovote'] = 'G&aring; til avstemning';
$lang['pollcontenthelp'] = '
Parameters available:<br/><br/>
{$pollname}<br/>
{$totalvotestext}<br/>
{$totalvotes}<br/>
{$voteform} - a button to return to voteform when peeking<br/>
<br/>
{$option->label} - the optiontext<br/>
{$option->uniqueid} - a unique text-id<br/>
{$option->value} - the value that should be returned
';
$lang['resultcontenthelp'] = '
Parameters available:<br/><br/>
{$pollid}<br/>
{$pollname}<br/>
<br/>
{$option->label} - the optiontext<br/>
{$option->votes} - The number of votes<br/>
{$option->percent} - The percent of this option
';
$lang['changelog'] = '
<ul>
<li>
<p>Version 0.2.0</p>
<p>Multiple polls on same page</p>
<p>Added help for template params</p>
<p>Cleaned up default templates, added labels</p>
</li>
<li>
<p>Version 0.1.7</p>
<p>Cleaned up smarty names</p>
<p>Added number of votes and total votes to params passed to templates</p>
</li>
<li>
<p>Version 0.1.6</p>
<p>Added a poll_id for controlling multiple polls (thank pumuklee)</p>
</li>
<li>
<p>Version 0.1.4</p>
<p>Really added the option for hiding peek button (don&#039;t know what went wrong i 0.1.3)</p>
<p>Fixed a bug with default result template</p>
<p>Fixed a syntax bug in the poll form</p>
<p>Cut down on the ajax-code if peekbutton was disabled</p>
</li>
<li>
<p>Version 0.1.3</p>
<p>Added an option for hiding the peek button</p>
</li>
<li>
<p>version 0.1.0</p>
<p>First usable version</p>
</li>
</ul>';
$lang['help'] = '<b>What does this module do?</b>
<br/>
<br/>
<br/>
<b>How do I use this module?</b>
<br/>
Basically you install the module, access it&#039;s administration interface and creates a poll, you add options to it
and activates it.
<br/>
In you page content or template you then insert something like:
<pre>
{cms_module module=&#039;polls&#039;}
</pre>
and your activates poll should emerge there.
<br/>
<br/>
More options and a more thorough help may be done later.';
$lang['utma'] = '156861353.525406812.1188077417.1193077969.1193082464.172';
$lang['utmz'] = '156861353.1192042748.132.7.utmccn=(referral)|utmcsr=cms1.helminikon.no|utmcct=/admin/listtags.php|utmcmd=referral';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>