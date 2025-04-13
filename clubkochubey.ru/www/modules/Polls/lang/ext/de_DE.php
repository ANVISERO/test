<?php
$lang['friendlyname'] = 'Polls made simple';
$lang['moddescription'] = 'Dieses Modul erm&ouml;glicht einfache Abstimmungen';
$lang['permission'] = 'Polls Verwalten';
$lang['postinstall'] = 'Polls-Version %s wurde erfolgreich installiert';
$lang['upgraded'] = 'Polls wurde erfolgreich auf Version %s aktualisiert';
$lang['really_uninstall'] = 'Sind Sie sicher, dass Sie Polls deinstallieren und alle gesammelten Daten l&ouml;schen wollen?';
$lang['postuninstall'] = 'Polls wurde erfolgreich deinstalliert';
$lang['help_poll_id'] = 'Auswahl der ID eines anderen Poll als der als aktiv gesetzte';
$lang['showwhatpoll'] = 'Zeigen';
$lang['activepoll'] = 'Aktiv';
$lang['randompoll'] = 'Zuf&auml;llig gew&auml;hlter offener Poll';
$lang['pollname'] = 'Poll-Name';
$lang['pollstatus'] = 'Poll-Status';
$lang['edit'] = 'Bearbeiten';
$lang['delete'] = 'L&ouml;schen';
$lang['pollstartdate'] = 'Start-Datum';
$lang['pollclosedate'] = 'End-Datum';
$lang['pollinfo'] = 'Poll-Informationen';
$lang['pollranfor'] = 'Poll lief';
$lang['pollhasbeenrunningfor'] = 'Der Poll lief';
$lang['days'] = 'Tage';
$lang['open'] = 'Offen';
$lang['closed'] = 'Geschlossen';
$lang['confirmclosepoll'] = 'Sind Sie sicher, dass dieser Poll geschlossen werden soll?';
$lang['pollwasclosed'] = 'Der Poll wurde geschlossen';
$lang['addpoll'] = 'Poll hinzuf&uuml;gen';
$lang['addnewpoll'] = 'Neuer Poll hinzuf&uuml;gen';
$lang['addandaddoptions'] = 'Poll und Optionen hinzuf&uuml;gen';
$lang['pollnamerequired'] = 'Es wird ein Name f&uuml;r den Poll ben&ouml;tigt';
$lang['polladded'] = 'Der Poll wurde hinzugef&uuml;gt';
$lang['add'] = 'Hinzuf&uuml;gen';
$lang['cancel'] = 'Abbrechen';
$lang['confirmdeletepoll'] = 'Sind Sie sicher, dass Sie diesen Poll l&ouml;schen m&ouml;chten?';
$lang['polldeleted'] = 'Der Poll wurde gel&ouml;scht';
$lang['confirmresetpoll'] = 'Sind Sie sicher, dass Sie die Stimmen f&uuml;r diesen Poll zur&uuml;cksetzten m&ouml;chten?';
$lang['optionnamerequired'] = 'Es wird ein Name f&uuml;r die Option ben&ouml;tigt';
$lang['addoption'] = 'Option hinzuf&uuml;gen';
$lang['votes'] = 'Stimmen';
$lang['votepercent'] = '%';
$lang['confirmdeleteoption'] = 'Sind Sie sicher, dass Sie diese Option l&ouml;schen wollen?';
$lang['editoptions'] = 'Option bearbeiten';
$lang['addingto'] = 'Hinzuf&uuml;gen zu:';
$lang['optionadded'] = 'Die Option wurde hinzugef&uuml;gt';
$lang['optiondeleted'] = 'Die Option wurde gel&ouml;scht';
$lang['addnewoption'] = 'Option hinzuf&uuml;gen';
$lang['editpoll'] = 'Poll bearbeiten';
$lang['resetpoll'] = 'Poll zur&uuml;cksetzten';
$lang['pollreset'] = 'Die Stimmen f&uuml;r diesen Poll wurden zur&uuml;ckgesetzt';
$lang['optionname'] = 'Optionsname';
$lang['polls'] = 'Polls';
$lang['showpeekbutton'] = 'Resultate-Button anzeigen';
$lang['settings'] = 'Einstellungen';
$lang['savesettings'] = 'Einstellungen speichern';
$lang['settingssaved'] = 'Einstellungen wurden gespeichert';
$lang['polltemplate'] = 'Poll Template';
$lang['resulttemplate'] = 'Ergebnis-Template';
$lang['listtemplate'] = 'Poll-Auflistungs-Template';
$lang['return'] = 'Zur&uuml;ck';
$lang['ok'] = 'OK';
$lang['resettodefault'] = 'Auf das Standard-Template zur&uuml;cksetzen';
$lang['confirmtemplate'] = 'Sind Sie sicher, dass Sie auf das Standard-Template zur&uuml;cksetzen m&ouml;chten?';
$lang['templatesaved'] = 'Template wurde gespeichert';
$lang['templatereset'] = 'Template wurde auf das Standard-Template zur&uuml;ckgesetzt';
$lang['votetext'] = 'Abstimmen';
$lang['votestext'] = 'Stimmen';
$lang['totalvotes'] = 'Stimmen gesamt';
$lang['vote'] = 'Stimme';
$lang['peekresult'] = 'Ergebnisse anzeigen';
$lang['returntovote'] = 'Geh zur Abstimmung';
$lang['changelog'] = '<ul>
<li>
<p>Version 0.1.7</p>
<p>Cleaned up smarty names</p>
<p>Anzahl abstimmungen pro option und Anzahl totaler Abstimmungen hinzugef&uuml;gt</p>
</li>
<li>
<p>Version 0.1.6</p>
<p>poll_id hinzugef&uuml;gt um mehrfachpolls zu handhaben (danke pumuklee)</p>
</li>
<li>
<p>Version 0.1.4</p>
<p>Fix: Option um den ResulateteButton zu verstecken hinzugef&uuml;gt (keine Ahngung was in V.0.1.3 falsch lief)</p>
<p>Fix: Fehler beim standard resultate Template</p>
<p>Fix: Syntaxfehler im Poll Formular</p>
<p>Cut down on the ajax-code if peekbutton was disabled</p>
</li>
<li>
<p>Version 0.1.3</p>
<p>Option um den ResultateButton zu verstecken hinzugef&uuml;gt</p>
</li>
<li>
<p>version 0.1.0</p>
<p>Erste brauchbare version</p>
</li>
</ul>';
$lang['help'] = '<b>Was macht dieses Modul?</b>
<br/>
<br/>
<br/>
<b>Wie verwende ich dieses Modul?</b>
<br/>
Nach der Installation hat man &uuml;ber die Administration die M&ouml;glichkeit, Abstimmungen zu erstellen und diese auf Aktiv oder Inaktiv zu setzten.
<br/>
In die Seite oder in das Template m&uuml;ssen Sie folgendes einf&uuml;gen:
<pre>
{cms_module module=&#039;polls&#039;}
</pre>
Danach wird die aktive Abstimmung dort erscheinen.
<br/>
<br/>
Mehr Optionen und eine bessere Hilfe werden folgen.
';
$lang['utmz'] = '156861353.1189002384.179.113.utmccn=(referral)|utmcsr=blog.cmsmadesimple.org|utmcct=/|utmcmd=referral';
$lang['utma'] = '156861353.717462736.1147511856.1190927575.1190934899.216';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>