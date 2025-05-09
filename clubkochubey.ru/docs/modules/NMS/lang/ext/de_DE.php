<?php
$lang['html'] = 'HTML';
$lang['prompt_text_only'] = 'Diese Nachricht enth&auml;lt nur Text';
$lang['prompt_archivable'] = 'Soll diese Nachricht in den &ouml;ffentlichen Archivlisten erscheinen?';
$lang['select_one'] = 'Ihre Wahl';
$lang['help_archivemsg_template'] = 'Legt ein Template aus der Archiv-Nachrichten-Template-Liste fest, welches f&uuml;r die Anzeige der einzelnen Nachricht verwendet werden soll. Wenn dieser Wert nicht festgelegt wurde, wird das Template verwendet, welches aktuell als &quot;Voreinstellung&quot; gekennzeichnet ist.';
$lang['help_archivelist_template'] = 'Legt das Archiv-Listen-Template fest, welches f&uuml;r die Anzeige von Archivlisten verwendet werden soll. Dieser Parameter ist nur in Verbindung mit der &quot;archivelist&quot;-Aktion wirksam. Wenn dieser Wert nicht festgelegt wurde, wird das Template verwendet, welches aktuell als &quot;Voreinstellung&quot; gekennzeichnet ist.';
$lang['help_limit'] = 'In Kombination mit der &quot;archivelist&quot;-Aktion legt dieser Parameter die maximal angezeigte Anzahl von archivierten Nachrichten fest.';
$lang['help_sortorder'] = 'In Kombination mit der &quot;archivelist&quot;-Aktion legt dieser Parameter die Sortierreihenfolge der angezeigten Nachrichten fest. M&ouml;gliche Werte sind: ASC (f&uuml;r aufsteigend) und DESC (f&uuml;r absteigend)';
$lang['help_sortby'] = 'In Kombination mit der &quot;archivelist&quot;-Aktion legt dieser Parameter das Feld fest, nach welchem die Eintr&auml;ge sortiert werden sollen. M&ouml;gliche Werte sind msgid, id, subjectdate und entered.';
$lang['title_setdflt_archivemsgtmpl'] = 'Voreingestelltes Template f&uuml;r die Anzeige von Nachrichten';
$lang['info_setdflt_archivemsgtmpl'] = 'Mit diesem Formular k&ouml;nnen Sie einen &quot;Standard&quot;-Inhalt f&uuml;r die Templates zur Anzeige der Nachrichten festlegen, der eingef&uuml;gt wird, wenn Sie in der Registerkarte &quot;Archiv-Templates&quot; ein neues Template anlegen. Hier durchgef&uuml;hrte &Auml;nderungen haben keine direkten Auswirkungen auf die Anzeige auf der Webseite.';
$lang['addedit_archivemsg_template'] = 'Template f&uuml;r die Anzeige von Nachrichten hinzuf&uuml;gen/bearbeiten';
$lang['info_templatemessage_archivemsg'] = '';
$lang['modified'] = 'Ge&auml;ndert';
$lang['text_message'] = 'Text-Nachricht';
$lang['html_message'] = 'HTML-Nachricht';
$lang['message_id'] = 'Nachrichten-ID';
$lang['archive_summary_templates'] = 'Archiv-Zusammenfassungs-Templates';
$lang['archive_detail_templates'] = 'Archiv-Detail-Templates';
$lang['title_setdflt_archivelistmpl'] = 'Standard-Archivlisten-Template';
$lang['info_setdflt_archivelisttmpl'] = 'Mit diesem Formular k&ouml;nnen Sie einen &quot;Standard&quot;-Inhalt festlegen, der eingef&uuml;gt wird, wenn Sie in der Registerkarte &quot;Archiv-Templates&quot; ein neues Template anlegen. Hier durchgef&uuml;hrte &Auml;nderungen haben keine direkten Auswirkungen auf die Anzeige auf der Webseite.';
$lang['title_setdflt_messagetemplate'] = 'Standard-Nachrichten-Template';
$lang['info_setdflt_messagetemplate'] = 'Mit diesem Formular k&ouml;nnen Sie einen &quot;Standard&quot;-Inhalt f&uuml;r das Nachrichten-Template festlegen, der eingef&uuml;gt wird, wenn Sie in der Registerkarte &quot;Nachrichten-Templates&quot; ein neues Template anlegen.';
$lang['addedit_archivelist_template'] = 'Archivlisten-Template hinzuf&uuml;gen/bearbeiten';
$lang['info_templatemessage_archivelist_'] = '';
$lang['default_templates'] = 'Standard-Templates';
$lang['archive_templates'] = 'Archiv-Templates';
$lang['jobs_warning'] = '<h3>Warnung:</h3> Eine unsachgem&auml;&szlig;e Verwendung dieses Moduls kann erhebliche Probleme mit Ihrem Hoster, Ihren Kunden oder anderen rechtlichen Angelegenheiten zur Folge haben. Die Entwickler dieses Moduls &uuml;bernehmen bei Einsatz des Moduls weder ein Risiko noch eine Haftung. <strong>Die Verwendung erfolgt auf eigene Gefahr!</strong>';
$lang['warning'] = 'Warnung';
$lang['send_admin_copy'] = 'Dem Administrator eine Kopie senden';
$lang['message_charset'] = 'Kodierung der Nachricht';
$lang['bounce_limit'] = 'Limit der abgewiesenen Newsletter';
$lang['info_bounce_limit'] = 'Die Anzahl der abgewiesenen Newsletter, bevor ein Benutzer deaktiviert wird (max 100)';
$lang['bounce_messagelimit'] = 'Limit f&uuml;r abgewiesene Newsletter';
$lang['info_bounce_messagelimit'] = 'Die Anzahl der POP3-Nachrichten, die auf einmal verarbeitet werden sollen (max 1000).';
$lang['error_pop3_processing'] = 'Problem bei der Verarbeitung abgewiesener Newsletter';
$lang['error_pop3_connect'] = 'Problem bei der Verbindung mit dem POP3-Server';
$lang['error_invalidbounces'] = 'Der Wert f&uuml;r abgewiesene Newsletter ist ung&uuml;ltig (0 bis 100)';
$lang['bounce_count'] = 'Z&auml;hler f&uuml;r abgewiesene Newsletter';
$lang['nms_job_complete_subject'] = 'NMS-Email-Job erledigt';
$lang['nms_job_complete_msg'] = 'Der NMS-Email-Job wurde vollst&auml;ndig abgearbeitet. Er ben&ouml;tigte %s Sekunden.';
$lang['pop3_server'] = 'POP3-Server';
$lang['pop3_username'] = 'POP3-Benutzername';
$lang['pop3_password'] = 'POP3-Passwort';
$lang['admin_email'] = 'Emailadresse des Administrators';
$lang['admin_name'] = 'Name des Administrators';
$lang['admin_replyto'] = 'Antwort-Adresse des Administrators';
$lang['process_bounces'] = 'Abweisung von Nachrichten verarbeiten';
$lang['error_notemplates'] = 'Konnte kein mit den Vorgaben &uuml;bereinstimmendes Template finden';
$lang['error_notemplatebyname'] = 'Konnte kein Template mit dem Namen %s finden';
$lang['addedit_template'] = 'Nachrichten-Template hinzuf&uuml;gen/bearbeiten';
$lang['prompt_textmessage'] = 'Text der Nachricht';
$lang['found'] = 'gefunden';
$lang['template'] = 'Template';
$lang['templates'] = 'Templates';
$lang['add_template'] = 'Ein Template hinzuf&uuml;gen';
$lang['message_templates'] = 'Nachrichten-Templates';
$lang['default_confirm_subject'] = 'Bitte best&auml;tigen Sie Ihre Anmeldung';
$lang['default_postsubscribe_text'] = 'Vielen Dank f&uuml;r Ihre Anmeldung.';
$lang['default_subscribe_subject'] = 'Anmeldung best&auml;tigt';
$lang['default_unsubscribe_subject'] = 'Abmeldung best&auml;tigt';
$lang['cleantemptable'] = 'Tempor&auml;re Tabelle leeren';
$lang['error_problemwithmessage'] = 'Unbekanntes Problem mit einer Nachricht.';
$lang['prompt_usersettings_page'] = 'Weiterleitungs-Seite f&uuml;r das Benutzereinstellungsformular';
$lang['info_usersettings_page'] = 'Seite, auf die der Benutzer weitergeleitet wird, wenn ein Link in einer Email geklickt wird, um die Benutzereinstellungen zu bearbeiten.<br/>Das Zeichen (*) kennzeichnet die voreingestellte Seite.';
$lang['jobname'] = 'Job erzeugt am';
$lang['msg_jobprocessing'] = 'Fenster f&uuml;r die Stapel-Verarbeitung';
$lang['prompt_page'] = 'Weiterleitungs-Seite';
$lang['error_insufficientparams'] = 'In Ihrer Anfrage fehlen ein oder mehrere der erforderlichen Parameter. Die Aktion kann daher nicht fortgesetzt werden.';
$lang['prompt_from'] = 'Von';
$lang['prompt_replyto'] = 'Antwort an';
$lang['prompt_subject'] = 'Betreff';
$lang['prompt_template'] = 'Template';
$lang['prompt_selectstatus'] = 'Status ausw&auml;hlen';
$lang['prompt_message'] = 'Nachricht';
$lang['prompt_userfilter'] = 'Email-Filter (regexp)';
$lang['prompt_listfilter'] = 'Filtern nach Listen-Mitgliedschaft';
$lang['info_listfilter'] = '<strong>Hinweis:</strong> Halten Sie die STRG-Taste gedr&uuml;ckt und klicken Sie auf die Eintr&auml;ge, um diese aus- oder abzuw&auml;hlen.
';
$lang['message_help'] = 'Wenn Sie eine Nachricht eingeben, k&ouml;nnen Sie die folgenden <em>Smarty</em>-Variablen verwenden:<br/>
<em>{$username}</em> - der Benutzername<br/>
<em>{$email}</em> - die Email-Adresse des Benutzers<br/>
<em>{$unsubscribe}</em> - die URL der Seite f&uuml;r die Abmeldung von Mailinglisten<br/>
<em>{$preferences}</em> - die URL der Seite f&uuml;r die Anzeige der Benutzer-Einstellungen<br/>
<em>{$confirmurl}</em> - die URL der Seite f&uuml;r die Best&auml;tigung der Anmeldung<br/>
<p>Au&szlig;erdem k&ouml;nnen Sie auch jede andere Smarty-Variable, -Funktion oder -Modifikator in Ihrem Nachrichten-Template verwenden. Sie k&ouml;nnen auch die Ausgabewerte anderer CMSms-Module einbetten (if the template styles are taken care of, you may need to use seperate templates than what you use for your page output).  Um Fehler in Ihren Nachrichten zu ermitteln, k&ouml;nnen Sie den Tag {get_template_vars} und den Modifikator {$object|print_r} einsetzen.</p>
<p><strong>Hinweis: </strong>Die Bilder, die den Inhalts-Blocks mit dem WYSIWYYG-Editor hinzugef&uuml;gt wurden, werden in der ausgehenden Email absolut auf die externen Bilder referenziert.  <em>Die Bilder werden der Email NICHT angehangen.</em></p>
<p><strong>Tipp: </strong>Achten Sie darauf, dass Sie die \<style\> Tags mit den Tags {literal} und {/literal} maskieren.</p>';
$lang['message_help2'] = '<h3>Hinweis:</h3>
<p>Wenn Sie kein funktionst&uuml;chtiges Nachrichten-Template festgelegt haben, k&ouml;nnen Sie nur Text-Nachrichten erstellen, in dem die Inhalte aus der &quot;Text-Nachricht&quot;-Box enthalten sind. Wenn mindestens ein Inhaltsblock vorhanden ist, wird davon ausgegangen, dass die Nachricht HTML-Format hat. Wenn die &quot;Text-Nachricht&quot;-Box leer bleibt, dann wird der multipart-Teil der Email nicht versandt.</p>';
$lang['applyfilter'] = 'Filtern';
$lang['info_event_OnNewUser'] = 'Ausf&uuml;hren, wenn sich ein  Benutzer f&uuml;r eine oder mehrere Mailinglisten eintr&auml;gt';
$lang['info_event_OnEditUser'] = 'Ausf&uuml;hren, wenn die Daten eines Benutzers entweder &uuml;ber die Administration oder das Frontend ge&auml;ndert werden';
$lang['info_event_OnDeleteUser'] = 'Ausf&uuml;hren, wenn ein Benutzer gel&ouml;scht wurde';
$lang['info_event_OnNewList'] = 'Ausf&uuml;hren, wenn an einer Mailingliste &Auml;nderungen vorgenommen wurden';
$lang['info_event_OnDeleteList'] = 'Ausf&uuml;hren, wenn eine Mailingliste gel&ouml;scht wurde';
$lang['info_event_OnCreateMessage'] = 'Ausf&uuml;hren, wenn eine Nachricht erstellt wurde';
$lang['info_event_OnEditMessage'] = 'Ausf&uuml;hren, wenn eine Nachricht ge&auml;ndert wurde';
$lang['info_event_OnDeleteMessage'] = 'Ausf&uuml;hren, wenn eine Nachricht gel&ouml;scht wurde';
$lang['info_event_OnCreateJob'] = 'Ausf&uuml;hren, wenn ein Job erstellt wurde';
$lang['info_event_OnDeleteJob'] = 'Ausf&uuml;hren, wenn ein Job gel&ouml;scht wurde';
$lang['info_event_OnStartJob'] = 'Ausf&uuml;hren, wenn die Abarbeitung eines Jobs begonnen wurde';
$lang['info_event_OnFinishJob'] = 'Ausf&uuml;hren, wenn die Abarbeitung eines Job beendet wurde';
$lang['help_OnNewUser'] = '<p>Ausf&uuml;hren, wenn sich ein Benutzer f&uuml;r eine oder mehrere Mailinglisten eintr&auml;gt</p>
<h4>Parameter</h4>
<ul>
<li><em>email</em> - Emailadresse des Benutzers</li>
<li><em>username</em> - Benutzername</li>
<li><em>lists</em> - ausgew&auml;hlte Mailinglisten</li>
</ul>
';
$lang['help_OnEditUser'] = '<p>Ausf&uuml;hren, wenn die Daten eines Benutzers entweder &uuml;ber die Administration oder das Frontend ge&auml;ndert wurden</p>
<h4>Parameter</h4>
<ul>
<li><em>email</em> - Emailadresse des Benutzers</li>
<li><em>username</em> - Benutzername</li>
<li><em>lists</em> - ausgew&auml;hlte Mailinglisten</li>
<li><em>id</em> - die Benutzer-ID</li>
</ul>
';
$lang['help_OnDeleteUser'] = '<p>Ausf&uuml;hren, wenn ein Benutzer gel&ouml;scht wurde</p>
<h4>Parameter</h4>
<ul>
<li><em>id</em> - die Benutzer-ID</li>
</ul>
';
$lang['help_OnNewList'] = '<p>Ausf&uuml;hren, wenn eine neue Mailingliste erstellt wurde</p>
<h4>Parameter</h4>
<ul>
<li><em>name</em> - Name der Mailingliste</li>
<li><em>description</em> - Beschreibung der Mailingliste</li>
<li><em>public</em> - Kennzeichnung, ob die Mailingliste &ouml;ffentlich ist</li>
</ul>
';
$lang['help_OnEditList'] = '<p>Ausf&uuml;hren, wenn an einer Mailingliste &Auml;nderungen vorgenommen wurden</p>
<h4>Parameter</h4>
<ul>
<li><em>name</em> - Name der Mailingliste</li>
<li><em>description</em> - Beschreibung der Mailingliste</li>
<li><em>public</em> - Kennzeichnung, ob die Mailingliste &ouml;ffentlich ist</li>
<li><em>listid</em> - die ID der Mailingliste</li>
</ul>
';
$lang['help_OnDeleteList'] = '<p>Ausf&uuml;hren, wenn eine Mailingliste gel&ouml;scht wurde</p>
<h4>Parameter</h4>
<ul>
<li><em>listid</em> - die ID der Mailingliste</li>
</ul>
';
$lang['help_OnCreateMessage'] = '<p>Ausf&uuml;hren, wenn eine Nachricht erstellt wurde</p>
<h4>Parameter</h4>
<ul>
<li><em>fromwho</em> - Name des Erstellers der Nachricht</li>
<li><em>reply_to</em> - die Emailadresse f&uuml;r das ReplyTo-Feld</li>
<li><em>subject</em> - der Betreff der Nachricht</li>
<li><em>message</em> - der Text der Nachricht <em>(kann Smarty-Tags enthalten)</em></li>
<li><em>entered</em> - das Erstellungsdatum der Nachricht</li>
<li><em>uniqueid</em> - die eindeutige ID dieser Nachricht</em>
</ul>
';
$lang['help_OnEditMessage'] = '<p>Ausf&uuml;hren, wenn eine Nachricht ge&auml;ndert wurde</p>
<h4>Parameter</h4>
<ul>
<li><em>fromwho</em> - Name des Erstellers der Nachricht</li>
<li><em>reply_to</em> - die Emailadresse f&uuml;r das ReplyTo-Feld</li>
<li><em>subject</em> - der Betreff der Nachricht</li>
<li><em>message</em> - der Text der Nachricht <em>(kann Smarty-Tags enthalten)</em></li>
<li><em>messageid</em> - die ID dieser Nachricht</id>
</ul>
';
$lang['help_OnDeleteMessage'] = '<p>Ausf&uuml;hren, wenn eine Nachricht gel&ouml;scht wurde</p>
<h4>Parameter</h4>
<ul>
<li><em>messageid</em> - die ID dieser Nachricht</id>
</ul>
';
$lang['help_OnCreateJob'] = '<p>Ausf&uuml;hren, wenn ein Job erstellt wurde</p>
<h4>Parameter</h4>
<ul>
<li><em>jobid</em> - die ID dieses Jobs</li>
<li><em>jobname</em> - der Name dieses Jobs</li>
<li><em>lists</em> - eine Liste der betroffenen Mailinglisten</li>
</ul>
';
$lang['help_OnDeleteJob'] = '<p>Ausf&uuml;hren, wenn ein Job gel&ouml;scht wurde</p>
<h4>Parameter</h4>
<ul>
<li><em>jobid</em> - die ID dieses Jobs</li>
</ul>
';
$lang['help_OnStartJob'] = '<p>Ausf&uuml;hren, wenn mit der Verarbeitung eines Jobs begonnen wurde</p>
<h4>Parameter</h4>
<ul>
<li><em>jobid</em> - die ID dieses Jobs</li>
<li><em>jobname</em> - der Name dieses Jobs</li>
</ul>
';
$lang['help_OnFinishJob'] = '<p>Ausf&uuml;hren, wenn die Verarbeitung eines Job abgeschlossen wurde</p>
<h4>Parameter</h4>
<ul>
<li><em>jobid</em> - die ID dieses Jobs</li>
<li><em>jobname</em> - der Name dieses Jobs</li>
</ul>
';
$lang['error_needreplyto'] = 'Sie m&uuml;ssen hier eine g&uuml;ltige Antwort-Emailadresse eingeben.';
$lang['error_needfrom'] = 'Sie m&uuml;ssen f&uuml;r den Ersteller der Nachricht einen g&uuml;ltigen Namen eingeben.';
$lang['error_needsubject'] = 'Sie m&uuml;ssen hier einen g&uuml;ltigen Email-Betreff eingeben.';
$lang['error_needmessagetext'] = 'Sie m&uuml;ssen hier einen Nachrichtentext eingeben.';
$lang['error_formerror'] = 'Formular-Fehler';
$lang['error_dberror'] = 'Datenbank-Fehler';
$lang['error_nameexists'] = 'Ein Eintrag mit diesem Namen existiert bereits.';
$lang['error_itemnotfound'] = 'Der vorgegebene Eintrag konnte nicht gefunden werden';
$lang['error_invalidparam'] = 'Ung&uuml;ltiger Parameter';
$lang['invalidparam'] = 'Ung&uuml;ltige Parameter im NMS-Modul-Tag';
$lang['prompt_users_per_page'] = 'Anzahl der Benutzer, die auf jeder Seite der Benutzerliste angezeigt werden sollen';
$lang['disabled'] = 'Deaktiviert';
$lang['confirmed'] = 'Best&auml;tigt';
$lang['prompt_usersettings_text2'] = 'Angezeigter Text, wenn das Formular mit den Benutzereinstellungen versandt wurde';
$lang['prompt_usersettings_form2'] = 'Formular, das Benutzern angezeigt wird, die ihre Einstellungen &auml;ndern wollen';
$lang['prompt_usersettings_text'] = 'Angezeigter Text, wenn die Nachricht zum &Auml;ndern der Benutzereinstellungen versandt wurde';
$lang['prompt_usersettings_email_body'] = 'Inhalt der Email zum &Auml;ndern den Benutzereinstellungen';
$lang['prompt_usersettings_subject'] = 'Betreff der Email zum &Auml;ndern den Benutzereinstellungen';
$lang['prompt_usersettings_form'] = 'Formular, welches die Benutzer, die ihre Einstellungen &auml;ndern wollen, nach ihrer Emailadresse fragt';
$lang['prompt_post_unsubscribe_text'] = 'Angezeigter Text bei vollst&auml;ndiger Abmeldung';
$lang['user_settings'] = 'Benutzereinstellungen';
$lang['prompt_unsubscribe_prompt'] = 'Aufforderung an den Benutzer, seine Emailadresse zur Abmeldung einzutragen';
$lang['prompt_unsubscribe_text'] = 'Angezeigter Text bei vollst&auml;ndigem Abmeldeformular';
$lang['prompt_unsubscribe_subject'] = 'Betreff der versandten Abmeldungs-Email';
$lang['prompt_unsubscribe_email_body'] = 'Inhalt der versandten Abmeldungs-Email';
$lang['prompt_unsubscribe_form'] = 'Template f&uuml;r das Abmeldeformular';
$lang['error_accountdisabled'] = 'Ihr Konto wurde vor&uuml;bergehend deaktiviert - Sie k&ouml;nnen diese Aktion derzeit nicht ausf&uuml;hren.';
$lang['prompt_post_confirm_text'] = 'Mitteilung, die nach der Email-Best&auml;tigung angezeigt wird.';
$lang['prompt_confirm_email_body'] = 'Inhalt der Best&auml;tigungs-Email';
$lang['prompt_confirm_subject'] = 'Betreff der Best&auml;tigungs-Email';
$lang['confirm_subscribe'] = 'Anmeldung best&auml;tigen';
$lang['confirm_unsubscribe'] = 'Abmeldung best&auml;tigen';
$lang['nolists'] = 'Keine Liste zum Anmelden gefunden';
$lang['public'] = '&Ouml;ffentlich';
$lang['yes'] = 'Ja';
$lang['no'] = 'Nein';
$lang['prompt_postsubscribetext'] = 'Mitteilung, die nach dem Abonnement einer Liste angezeigt wird';
$lang['subscription_confirmed'] = 'Abonnement best&auml;tigt';
$lang['reset'] = 'Zur&uuml;cksetzen';
$lang['suspend'] = 'Ausgesetzt';
$lang['resume'] = 'Fortsetzen';
$lang['action'] = 'Aktion';
$lang['processing_records'] = '%s von %s Datens&auml;tzen abgearbeitet';
$lang['initializing_job'] = 'Job wird initialisiert ...';
$lang['processing_job'] = 'Job wird abgearbeitet ...';
$lang['deletecompleted'] = 'Erledigte Jobs l&ouml;schen';
$lang['error_importerrorcount'] = 'Fehlerz&auml;hler';
$lang['lines'] = 'Zeilen';
$lang['users_added'] = 'Benutzer hinzugef&uuml;gt';
$lang['memberships'] = 'Mitgliedschaft';
$lang['subscribe'] = 'Anmelden';
$lang['resetdefaults'] = 'Auf die programmseitigen Voreinstellung zur&uuml;cksetzen';
$lang['confirm_adjustsettings'] = 'Soll das Modul wirklich diese Einstellungen verwenden?';
$lang['confirm_resetdefaults'] = 'Wollen Sie dieses Formular wirklich auf die programmseitigen Voreinstellungen zur&uuml;cksetzen?';
$lang['prompt_subscribetext'] = 'Text der Anmeldung';
$lang['prompt_subscribesubject'] = 'Betreff der Anmeldung';
$lang['prompt_subscribe_email_body'] = 'Email-Inhalt der Anmeldung';
$lang['prompt_subscribe_form'] = 'Template f&uuml;r das Anmeldeformular';
$lang['subscribe_form'] = 'Anmelden';
$lang['unsubscribe_form'] = 'Abmelden';
$lang['error_insertinglist'] = 'Problem beim Erstellen der neuen Liste';
$lang['error_emailexists'] = 'Diese Emailadresse ist in der Benutzerliste bereits vorhanden.';
$lang['error_invalidusername'] = 'FEHLER - Ung&uuml;ltiger Benutzername';
$lang['error_invalidid'] = 'FEHLER - Ung&uuml;ltige ID';
$lang['error_invalidemail'] = 'FEHLER - Ung&uuml;ltige Emailadresse';
$lang['username'] = 'Benutzername';
$lang['name'] = 'Name';
$lang['prompt_public'] = 'Das ist eine &ouml;ffentliche Mailingliste.';
$lang['error_usernotfound'] = 'Konnte den Benutzer mit der vorgegebenen ID nicht finden';
$lang['prompt_ms_between_message_sleep'] = 'Verz&ouml;gerung (in Millisekunden) zwischen dem Versand jeder Nachricht';
$lang['prompt_between_batch_sleep'] = 'Verz&ouml;gerung (in Sekunden) zwischen jedem Stapel';
$lang['prompt_messages_per_batch'] = 'Maximale Anzahl der Nachrichten, die in einem Stapel versandt werden';
$lang['okclosewindow'] = 'Sie k&ouml;nnen dieses Fenster jetzt schlie&szlig;en.';
$lang['queuefinished'] = 'Die Warteschlange wurde vollst&auml;ndig abgearbeitet.';
$lang['totaltime'] = 'Verarbeitungszeit gesamt:';
$lang['seconds'] = 'Sekunden';
$lang['totalmails'] = 'Versandte Emails gesamt (einschlie&szlig;lich der an den Administrator):';
$lang['page'] = 'Seite';
$lang['of'] = 'von';
$lang['info_csvformat'] = '<p>Die zu importierende Datei muss im CSV-Format vorliegen (durch Komma getrennte Werte), jeweils einem Eintrag pro Zeile. Die Spalten m&uuml;ssen folgende sein:</p>
<code>Email-Adresse, Benutzername</code>
<ol>
<li>Das Feld Benutzername ist optional</li>
<li>Kommentare (alles nach den Zeichen # oder // wird ignoriert</li>
<li>Leere Zeilen werden ignoriert.</li>
</ol>';
$lang['prompt_lines'] = 'Zeilen importiert';
$lang['prompt_usersadded'] = 'Benutzer hinzugef&uuml;gt';
$lang['prompt_membershipsadded'] = 'Mitgliedschaft hinzugef&uuml;gt';
$lang['prompt_errorcount'] = 'Anzahl der Fehler';
$lang['importerror_cantgetuserid'] = 'Fehler in Zeile %s, konnte die Benutzer-ID %s nicht ermitteln';
$lang['importerror_cantcreateuser'] = 'Fehler in Zeile %s, konnte das Benutzerkonto %s nicht erstellen';
$lang['importerror_nosuchlist'] = 'Fehler in Zeile %s, keine Liste %s vorhanden';
$lang['importerror_nofields'] = 'Fehler in Zeile %s, nicht gen&uuml;gend Felder';
$lang['import_users'] = 'Benutzer aus einer CSV-Datei importieren';
$lang['error_emptyfile'] = 'FEHLER - es wurde eine leere Datei hochgeladen.';
$lang['error_nofilesuploaded'] = 'FEHLER - es wurde keine Datei hochgeladen.';
$lang['filename'] = 'Name der zu importierenden Datei';
$lang['title_users_import'] = 'Benutzer importieren';
$lang['title_users_export'] = 'Nutzer aus der Datenbank exportieren';
$lang['nummessages'] = 'Anzahl der Nachrichten';
$lang['created'] = 'Erstellt';
$lang['started'] = 'Gestartet';
$lang['finished'] = 'Beendet';
$lang['processjobs'] = 'Jobs abarbeiten';
$lang['status_error'] = 'FEHLER';
$lang['status_unstarted'] = 'Nicht gestartet';
$lang['status_inprogress'] = 'In Arbeit';
$lang['status_paused'] = 'Vor&uuml;bergehend unterbrochen';
$lang['status_complete'] = 'Komplett';
$lang['status_unknown'] = 'Unbekannt';
$lang['error_jobnameexists'] = 'FEHLER - Ein Job mit diesem Namen existiert bereits.';
$lang['createjob'] = 'Einen Job erstellen';
$lang['prompt_email_user_on_admin_subscribe'] = 'Den Benutzern eine Nachricht senden, wenn sie vom Administrator manuell zu einer Liste hinzugef&uuml;gt wurden.';
$lang['error_nomessagesselected'] = 'Keine Nachrichten ausgew&auml;hlt';
$lang['error_nolistsselected'] = 'Keine Listen ausgew&auml;hlt';
$lang['createjobmsg'] = 'W&auml;hlen Sie eine Nachricht sowie eine oder mehrere Listen aus, an die die Nachricht versandt werden soll.';
$lang['error_nojobname'] = 'FEHLER - Es wurde noch kein Jobname festgelegt!';
$lang['error_nolists'] = 'FEHLER - Es sind keine Listen vorhanden!';
$lang['error_nomessages'] = 'FEHLER - Es sind keine Nachrichten vorhanden!';
$lang['jobs'] = 'Jobs';
$lang['status'] = 'Status';
$lang['jobsfoundtext'] = 'Jobs gefunden';
$lang['messagesfoundtext'] = 'Nachrichten gefunden';
$lang['entered'] = 'Eingegeben';
$lang['subject'] = 'Betreff';
$lang['from'] = 'Von';
$lang['delete_user_confirm'] = 'Wollen Sie diesen Benutzer wirklich l&ouml;schen?';
$lang['info_singlelist'] = 'Dieser Benutzer wird der Mailingliste hinzugef&uuml;gt';
$lang['error_selectonelist'] = 'FEHLER - Sie m&uuml;ssen mindestens eine Liste ausw&auml;hlen.';
$lang['error_invaliduniqueid'] = 'FEHLER - ung&uuml;ltige ID';
$lang['error_couldnotfindjobpart'] = 'FEHLER - Der vorgegebene Job konnte nicht in der Datenbank gefunden werden. Dies kann darauf hindeuten, dass ein anderer Nutzer (Sie?) den Job w&auml;hrend dessen Verarbeitung bearbeitet bzw. gel&ouml;scht haben.';
$lang['error_couldnotfindmessage'] = 'FEHLER - Die vorgegebene Nachricht konnte nicht gefunden werden. Dies kann darauf hindeuten, dass ein anderer Nutzer (Sie?) Nachrichten w&auml;hrend der Verarbeitung des Jobs bearbeitet bzw. gel&ouml;scht haben.';
$lang['error_couldnotfindtemplate'] = 'FEHLER - Das vorgegebene Seiten-Template konnte nicht gefunden werden. Dies kann darauf hindeuten, dass das Template gel&ouml;scht wurde, nachdem die Nachricht erstellt wurde.';
$lang['error_temporarytableexists'] = 'FEHLER - Die f&uuml;r die Verarbeitung des Jobs verwendete, tempor&auml;re Datenbanktabelle existiert bereits. Dies kann darauf hindeuten, dass bei der Verarbeitung des vorherigen Jobs ein Fehler aufgetreten ist.';
$lang['error_buildingtemptable'] = 'FEHLER - Beim F&uuml;llen der tempor&auml;ren Tabelle ist ein Fehler aufgetreten.';
$lang['error_otherprocessingerror'] = 'FEHLER - W&auml;hrend der Verarbeitung ist ein Fehler aufgetreten.';
$lang['userid'] = 'Benutzer-ID';
$lang['emailaddress'] = 'Emailadresse';
$lang['usersfoundtext'] = 'Benutzer gefunden';
$lang['title_user_createnew'] = 'Einen Benutzer hinzuf&uuml;gen';
$lang['error_invalidlistname'] = 'FEHLER - ung&uuml;ltiger Listenname';
$lang['editlist_text'] = 'Liste bearbeiten';
$lang['id'] = 'ID';
$lang['listsfoundtext'] = 'Listen gefunden';
$lang['users'] = 'Benutzer ';
$lang['preferences'] = 'Einstellungen';
$lang['messages'] = 'Nachrichten';
$lang['queue'] = 'Warteschlange';
$lang['submit'] = 'Absenden';
$lang['cancel'] = 'Abbrechen';
$lang['description'] = 'Beschreibung';
$lang['createnewlist_text'] = 'Listen erstellen';
$lang['lists'] = 'Listen';
$lang['friendlyname'] = 'Newsletter made simple';
$lang['postinstall'] = 'Vielen Dank f&uuml;r die Installation von NMS. Stellen Sie sicher, dass Sie die Berechtigung &quot;Use NMS&quot; f&uuml;r die Verwendung des Moduls gesetzt haben!';
$lang['postuninstall'] = 'Newsletter Made Simple deinstalliert.';
$lang['uninstalled'] = 'Modul deinstalliert.';
$lang['installed'] = 'Modulversion %s installiert.';
$lang['prefsupdated'] = 'Die Einstellungen von Newsletter Made Simple wurden aktualisiert.';
$lang['newslettercreated'] = 'Ein neuer Newsletter wurde erstellt.';
$lang['no_email_error'] = 'Sie m&uuml;ssen hier eine Emailadresse eingeben.';
$lang['subscribe_thankyou'] = 'Vielen Dank f&uuml;r Ihre Anmeldung. Ihnen wurde zur Best&auml;tigung eine Email gesandt.';
$lang['enter_valid_email'] = 'Sie m&uuml;ssen eine g&uuml;ltige Email-Adresse eingeben und mindestens eine Liste ausw&auml;hlen.';
$lang['newslettercreatederror'] = 'Sie m&uuml;ssen hier einen Name und eine Beschreibung eintragen.';
$lang['accessdenied'] = 'Zugriff verweigert. Bitte pr&uuml;fen Sie Ihre Berechtigungen.';
$lang['error'] = 'Fehler!';
$lang['sent'] = 'Versandt';
$lang['inqueue'] = 'In Warteposition';
$lang['send_next_batch'] = 'Versand des n&auml;chsten Stapels von %s Emails; beginnend mit: %s';
$lang['messages_sent'] = '%s wurden versandt.';
$lang['closewindow'] = 'Fenster schlie&szlig;en';
$lang['testmode'] = 'Sie sind im Testmodus. Es werden keine Emails versandt.';
$lang['confirmdeletejob'] = 'Wollen Sie diesen Job wirklich l&ouml;schen?';
$lang['confirmsend'] = 'Wollen Sie wirklich alle Nachrichten versenden?\n\nDer Versand einer gr&ouml;&szlig;eren Anzahl von Nachrichten kann eine erhebliche Zeit in Anspruch nehmen und damit die Ressourcen Ihres Hosts fast vollst&auml;ndig in Anspruch nehmen.\n\nVERWENDUNG AUF EIGENE GEFAHR.';
$lang['confirmdelete'] = 'Wollen Sie diese Nachricht wirklich l&ouml;schen?';
$lang['confirmdeletelist'] = 'Wollen Sie diese Liste wirklich l&ouml;schen?';
$lang['keepwindowopen'] = 'Lassen Sie das Fenster ge&ouml;ffnet, bis alle Nachrichten versandt wurden.<br />';
$lang['profileupdated'] = 'Ihr Profil wurde aktualisiert.';
$lang['upgraded'] = 'Das Modul wurde auf Version %s aktualisiert.';
$lang['title_mod_prefs'] = 'Konfiguration';
$lang['title_mod_messages'] = 'Nachrichten-Warteschlange';
$lang['title_mod_createnew'] = 'Eine Liste erstellen';
$lang['title_mod_manage_user'] = 'Benutzer';
$lang['title_mod_compose_job'] = 'Einen Job erstellen';
$lang['title_mod_compose_message'] = 'Eine Nachricht verfassen';
$lang['title_mod_process_queue'] = 'Prozess-Warteschlange';
$lang['title_mod_admin'] = 'Listen verwalten';
$lang['user_delete_confirm'] = 'Wollen Sie diesen Benutzer wirklich l&ouml;schen?';
$lang['userdeleted'] = 'Benutzer gel&ouml;scht';
$lang['newsletterdeleted'] = 'Newsletter gel&ouml;scht';
$lang['delete'] = 'L&ouml;schen';
$lang['edit'] = 'Bearbeiten';
$lang['previous'] = 'Vorheriger';
$lang['next'] = 'N&auml;chster';
$lang['unsubscribemessage'] = 'Sie wurden ausgetragen. Vielen Dank!';
$lang['title_admin_panel'] = 'Newsletter made simple';
$lang['moddescription'] = 'Mit diesem Modul k&ouml;nnen Newsletter erstellt werden.';
$lang['welcome_text'] = '<p>Willkommen in der Administration von Newsletter made simple (NMS).</p>';
$lang['changelog'] = '<ul>
<li>Todo:
<ul>
<li>Lists Tab - show disabled vs active lists</li>
<li>Lists - ability to Mark a list as inactive</li>
<li>Users - Ability to filter on confirmed or unconfirmed
<p>Admin should be able to check all unconfirmed users and either confirm them all, or send them another confirmation email message</p>
<li>Users - Ability to prefer text or html mail (much later)</li>
<li>Something to allow a user to re-get the confirmation email</li>
<li>Docs, docs, and more docs</li>
<li><b>The frontend</b></li>
<ul>
  <li>complete the two stage unsubscribe process</li>
  <li>complete the two stage change preferences process</li>
  <li>Add a preference as to wether or not users should get a confirmation email after subscribing and unsubscribing</p>
</ul>
<li>Styling the progress page</li>
</ul>
</li>
<li>Version 2.2 - June, 2008
    <p>Now require CMS 1.3.1</p>
    <p>Fix the user settings functionality.</p>
    <p>Fix the CSV Import stuff to be more useable</p>
    <p>Adds the ability to mark a message for display in the archive list.  This solves the problem where some messages were showing up in the archive list even if they were just sent to a private list.  This is because messages in NMS are re-useable and you may send the same message to multiple lists at the same time.</p>
    <p>Fixes problems with the archive message display</p>
    <p>Adds the ability to mark a message as text only</p>
</li>
<li>Version 2.1.1 - March, 2008 (just after 2.1)

    <p>Adds two missing lines that resulted in the confirmation not working when subscribing</p>
</li>
<li>Version 2.1 - March, 2008
    <p>Adds the ability for other modules to interact with NMS</p>
</li>
<li>Version 2.0.1 - February, 2008
    <p>Bump dependencies,</p>
</li>
<li>Version 2.0 - December, 2007
    <p><strong>Note:</strong> This is a Significant set of enhancements to NMS that required breaking backwards compatibility, this version will NOT upgrade from previous versions of NMS.  You should export all data, save it to text files, etc.... and re-import the data later.</p>
    <ul>
      <li>Complete templating support</li>
      <li>Complete support for multipart messages (text and html)</li>
      <li>Complete support for embedded images and attachments</li>
      <li>Bounce Processing via pop3</li>
      <li>Significant rewrite of the frontend (archive and showtemplate actions)</li>
    </ul>
    <p>Thanks to _SjG_ for finding the simple templating issue that caused problems with empty email content on php4 hosts.</p>
</li>
<li>Version 1.0.2 - August, 2007</li>
<p>Allow importing users from FEU <em>(originally done by skypanther, re-implemented by calguy100).</em></p>
<p>Numerous bug fixes</p>
<li>Version 1.0.1 - December, 2006</li>
<p>Fixes to import users, and to a ternery expression when creating a message. I also fixed some stupid problems with process_queue resulting from me doing this too quickly.</p>
<li>Version 1.0 - December, 2006</li>
<p>This <b>is</b> essentially a complete rewrite of the old NMS module.  Everything has been cleaned up and attemtpts have been made to bring it up to proper standards, and lots of new features added. here is a list of the major improvements:</p>
<ul>
<li>Cleanup of the lang strings, etc.</li>
<li>Param-ize the queries for security</li>
<li>Added the concept of Jobs, so that messages can be re-used</li>
<li>Added the concept of username (optional)</li>
<li>Added smarty processing on templates</li>
<li>Added bulk import</li>
<li>Added the concept of a &#039;private list&#039;</p>
<li>Devided the admin panel into tabs</li>
<li>Show progress nicely when processing large jobs</li>
<li>Uses CMSMailer module</li>
<li>Events that can be trapped to add additional behaviour</li>
</ul>
<p><strong>Note</strong>, upgrade from the previous version <em>(Including previous betas)</em>is not possible.  A complete uninstall of the old version is required before installing this version of NMS.</p>
</li>
<li>Version .74 27 November 2005. Alpha 3 Release. Fixed bug with confirmation message returnid, image urls, windows php, and a few other small issues.</li>
<li>Version .73 23 November 2005. Alpha 2 Release. Fixed bug with adding messages.</li>
<li>Version .71 22 November 2005. Alpha 1 Release.</li>
<li>Version .5. 17 September 2005. Internal Release.</li>
</ul>';
$lang['helpselect'] = 'Legt eine durch Kommata getrennte Liste der anzuzeigenden Mailinglisten fest. <em>(Nur im Anmelde-Modus g&uuml;ltig)</em>';
$lang['helpaction'] = 'Damit kann das Verhalten des Moduls festgelegt werden. Es stehen folgende Optionen zur Verf&uuml;gung:
<ul>
<li>archivelist - zeigt ein Nachrichten-Archiv an</li>
<li>showmessage - zeigt eine bestimmte Nachricht an</li>
</ul>
';
$lang['helpmode'] = 'Legt den Anzeigemodus fest. Die Optionen sind folgende:
<ul>
<li>subscribe (default) - zeigt das Anmeldeformular an</li>
<li>unsubscribe - zeigt das Abmeldeformular an</li>
<li>usersettings - zeigt das Formular mit den Benutzer-Einstellungen an</li>
</ul>
';
$lang['help'] = '<h3>Was macht dieses Modul?</h3>
<p>Dieses Modul erm&ouml;glicht Ihnen den Versand von Newslettern via Email &uuml;ber CMS made simple.</p>
<p>F&auml;higkeiten:</p>
<ul>
  <li>Erlaubt &ouml;ffentliche (Benutzer k&ouml;nnen sich an- und abmelden) und private (Verwaltung durch den Administrator) Newsletter-Listen</li>
  <li>Erm&ouml;glicht die Best&auml;tigung von An- und Abmeldung per Email</li>
  <li>bestimmte Benutzer k&ouml;nnen deaktiviert werden</li>
  <li>Import und Export von Benutzern</li>
  <li>Vollst&auml;ndig Template-gesteuert</li>
  <li>Erlaubt die Anzeige von archivierten Nachrichten auf der Webseite</li>
  <li>Vollst&auml;ndig template-gesteuertes Nachrichten-System</li>
  <li>Nachrichten k&ouml;nnen gespeichert und wiederverwendet werden</li>
  <li>Erlaubt das Einbetten von Bildern in die Emails</li>
  <li>Erlaubt das Anh&auml;ngen von Bildern an die Emails</li>
  <li>Erlaubt die Verarbeitung abgewiesener Nachrichten</li>
  <li>Unterst&uuml;tzt Pretty URLs</li>
  <li>eine ganze Menge mehr ...</li>
</ul>

<br />
<h3 style=&quot;color: red;&quot;>UNBEDINGT ZUERST LESEN!!!</h3>
<p>Dieses Werkzeug richtet sich ausschlie&szlig;lich an Fachleute und wurde erstellt, um Massen-Emails zu versenden. Es ist NICHT f&uuml;r Anwender gedacht, die keine Kenntnisse der Vorteile und Fallstricke des Versands von HTML-Emails haben. Falls Sie sich dem zweiten Personenkreis zurechnen, sollten Sie auf den Einsatz dieses Moduls verzichten.</p>
<p>Dieses Modul kann verwendet werden, um Massen-Emails zu versenden. Dies kann unter Umst&auml;nden ein problematischer und fehleranf&auml;lliger Proze&szlig; sein, und Sie sollten sich vor dem Einsatz des Moduls ausf&uuml;hrlich (!) &uuml;ber folgende Themen informieren:
<ul>
  <li>Wie werden Massen-Emails versandt, ohne dass sie als Spam interpretiert werden</li>
  <li>Wiederholt versandter Spam bzw. der Versand einer Emails an eine gro&szlig;e Anzahl von Empf&auml;ngern kann zur Folge haben, dass Ihre Domain in eine Sperrliste (blacklist) aufgenommen wird (eventuell sogar alle von Ihrem Provider gehosteten Domains). <strong>Setzen Sie das Modul daher mit gr&ouml;&szlig;ter Vorsicht ein!</strong></li>
  <li>Wie werden HTML-Emails so versandt, dass Ihre Kunden Sie auch lesen k&ouml;nnen</li>
  <li>Vorgaben und Beschr&auml;nkungen Ihres Hosters hinsichtlich des Email-Versands</li>
  <li>Wie k&ouml;nnen Sie Ihren Hoster als Ergebnis von vermeintlichem Spam aus Sperrlisten (blacklists) l&ouml;schen lassen</li>
  <li>Wenn Sie Massen-Emails an eine Adressliste versenden, die Sie von anderen Dritten bekommen haben, sollten Sie sicher sein, dass diese Personen der ungebetenen Zusendung von Emails zugestimmt haben.</li>
</ul>
<br />
<p>Dieses Modul kann und wird zus&auml;tzliche Ressourcen Ihres Hosters ben&ouml;tigen. Die minimalen Anforderungen f&uuml;r den Betrieb von CMS Made Simple werden <strong>sehr wahrscheinlich nicht ausreichen</strong>. Bevor Sie dieses Modul einsetzen, sollten Sie Ihren Hoster kontaktieren, um das Speicher-Limit und den Wert f&uuml;r eine Zeit&uuml;berschreitung des Scripts (timeout) erh&ouml;hen zu lassen sowie au&szlig;erdem auf bestimmte Fehlermeldung reagieren k&ouml;nnen. Dieses Modul l&auml;sst sich auf einem Host, bei dem Sie die volle Kontrolle &uuml;ber die PHP-Einstellungen haben, am besten nutzen.</p>
<p>Die Entwickler dieses Moduls &uuml;bernehmen weder ein Risiko noch die Verantwortung bei falscher Verwendung des Moduls. <strong>Die Verwendung erfolgt auf eigene Gefahr!</strong></p>
<h3>Wie wird es eingesetzt?</h3>
<ol>
<li>Installieren Sie das Modul (was Sie wahrscheinlich bereits getan haben).</li>
<li>Stellen Sie sicher, dass das CMSMailer-Modul richtig konfiguriert ist und der Testversand der Email wie erwartet funktioniert.</li>
<li>Setzen Sie die entsprechenden Gruppen-Berechtigungen f&uuml;r den Zugriff auf NMS. Das Modul kennt die folgenden Berechtigungen:
	<ul>
	<li><tt>Manage NMS Lists</tt> - Hinzuf&uuml;gen und Entfernen von Mailinglisten</li>
	<li><tt>Manage NMS Users</tt> - Hinzuf&uuml;gen und Entfernen von Benutzern zur Datenbank</li>
	<li><tt>Manage NMS Messages</tt> - Hinzuf&uuml;gen, Bearbeiten und Entfernen von Nachrichten (kein Versand)</li>
	<li><tt>Manage NMS Jobs</tt> - Versenden von Nachrichten und die Ausf&uuml;hren anderer &quot;Job&quot;-Funktionen</li>
	</ul>
</li>
<li>Erstellen Sie eine beliebige Anzahl von Mailinglisten.</li>
<li>(Optional) F&uuml;gen Sie Ihrer Webseite <code>{NMS}</code> hinzu, um den Besuchern Ihrer Webseite ein Formular f&uuml;r das Abonnement Ihrer Mailinglisten anzeigen zu lassen.</li>
<li>(Optional) F&uuml;gen Sie &uuml;ber die Administration, Registerkarte &quot;Benutzer&quot; manuell Abonnenten Ihrer Mailingliste hinzu.</li>
<li>Erstellen Sie eine Nachricht, die als Teil eines Jobs versandt werden soll.</li>
<li>Erstellen Sie einen Job. Sie k&ouml;nnen hier die Nachricht, die versandt werden soll, und die Mailingliste, an die die Nachricht versandt werden soll, ausw&auml;hlen.</li>
<li>Starten Sie die Verarbeitung des Jobs und die Nachricht wird versandt
    <p><strong>Hinweis:</strong> NMS versendet die Nachrichten nur an &quot;best&auml;tigte&quot; Abonnenten. Sie m&uuml;ssen daher mindestens einen best&auml;tigten Benutzer in mindestens einer Liste haben.</p>
</li>
</ol>

<h4>Syntax:</h4>
<p><code>{NMS}</code></p>

<h4>Weitere Optionen:</h4>
<p>Weiter unten finden Sie eine vollst&auml;ndige Liste der verf&uuml;gbaren Parameter und deren Optionen.</p>

<h5>Anzeige des Abmelde-Formulars:</h5>
<p><code>{NMS mode=&quot;unsubscribe&quot;}</code></p>

<h5>Anzeige der Seite mit den Benutzer-Einstellungen:</h5>
<p><code>{NMS mode=&quot;usersettings&quot;}</code></p>

<h5>Anzeige des Archivs bereits versandter Newsletter:</h5>
<p><code>{NMS action=&quot;archivelist&quot;}</code></p>
<ul>
<lh>Optionale Parameter f&uuml;r die Archiv-Anzeige:</lh>

<li>limit=&quot;#&quot; - Anzahl der letzten Newsletter, die angezeigt werden sollen. Ohne Vorgabe werden alle angezeigt.</li>
<li>sortby=&quot;date&quot; - legt die Sortierung der Newsletter fest. M&ouml;gliche Werte sind date (das Versanddatum = Voreinstellung), id (die Nachrichten-ID) oder subject (der Betreff)</li>
<li>sortorder=&quot;DESC&quot; - Festlegung der Sortier-Reihenfolge, m&ouml;gliche Werte DESC (absteigend = Voreinstellung) oder ASC (aufsteigend)</li>
</ul>

<h3>Import der Abonnenten aus der FrontendUsers-Datenbank</h3>
<p>Hinweis: Sie m&uuml;ssen daf&uuml;r im FEU-Modul ein Feld definiert haben, welches die Email-Adresse der Benutzer enth&auml;lt. Wie Sie es benannt haben, ist egal.</p>
<ol>
<li>W&auml;hlen Sie in der Administration das Men&uuml; &quot;Erweiterungen > Newsletter made simple&quot;</li>
<li>Gehen Sie dort in die Registerkarte &quot;Benutzer&quot;</li>
<li>Klicken Sie dort auf den Link &quot;Benutzer vom FrontendUsers-Modul importieren&quot;.</li>
<li>W&auml;hlen Sie das FEU-Feld aus, welches die Email-Adresse des Benutzers enth&auml;lt.</li>
<li>W&auml;hlen Sie aus, ob der FEU-Benutzername als NMS-Benutzername &uuml;bernommen werden soll. Dieser Wert wird dann in den Nachrichten verwendet, wenn Sie dort den Platzhalter {<span>$</span>username} verwenden.</li>
<li>W&auml;hlen Sie die Liste, f&uuml;r die die Benutzer importiert werden sollen.</li>
<li>Klicken Sie auf &quot;Absenden&quot;.</li>
</ol>
<p>Anschlie&szlig;end erhalten Sie einen Bericht &uuml;ber die verarbeiteten Benutzer, z.Bsp. die bereits in der NMS-Datenbank enthalten waren, die bereits f&uuml;r eine Mailingliste registriert waren und die, die hinzugef&uuml;gt und eine Mailingliste abonniert haben. Benutzer werden keinesfalls mehrfach angelegt - Sie k&ouml;nnen daher bedenkenlos regelm&auml;&szlig;ig einen Datenimport durchf&uuml;hren.</p>

<h4>Nachrichten-Variablen:</h4>
<p>Diese sind bereits an anderer Stelle aufgef&uuml;hrt, wurde der Vollst&auml;ndigkeit halber jedoch hier hinzugef&uuml;gt. Wenn Sie diese Variablen Ihrer Nachricht hinzuf&uuml;gen, werden sie bei Versand der Nachricht durch echte Werte ersetzt.</p>

<ul>
<li>{<span>$</span>username} - der Benutzername</li>
<li>{<span>$</span>email} - die Email-Adresse des Benutzers</li>
<li>{<span>$</span>unsubscribe} - eine URL, die verwendet werden kann, um eine Seite f&uuml;r die Abmeldung eines Newsletter anzeigen zu lassen</li>
<li>{<span>$</span>preferences} - eine URL, die verwendet werden kann, um eine Seite mit den Benutzereinstellungen anzeigen zu lassen</li>
<li>{<span>$</span>confirmurl} - eine URL, die verwendet werden kann, um das Abonnement eines Newsletters best&auml;tigen zu lassen</li>
</ul>
<h4>Die Verarbeitung abgewiesener Nachrichten:</h4>
<p>Die eingebaute F&auml;higkeit zur Verarbeitung abgewiesener Nachrichten erlaubt das Lesen eines POP3-Emailkontos. Wenn beim Durchsuchen der eingehenden Emails eine abgewiesene Email an einen Benutzer eindeutig festgestellt werden kann, wird f&uuml;r diesen Benutzer ein Z&auml;hler f&uuml;r abgewiesene Nachrichten gestartet. Wenn der festgelegte Maximalwert abgewiesener Nachrichten erreicht ist, wird der Benutzer deaktiviert.</p>
<p><strong>Hinweis:</strong> M&ouml;glicherweise ist der Emailserver Ihres Hosters so konfiguriert, dass Sie f&uuml;r Ihr POP3-Emailkonto keine Benachrichtigungen &uuml;ber abgewiesene Nachrichten erhalten. In diesem Fall sollten Sie Ihren Hoster kontaktieren, um dies aktivieren zu lassen, damit Sie diese Funktionalit&auml;t verwenden k&ouml;nnen.</p>
<p>Es wird nachdr&uuml;cklich empfohlen, f&uuml;r den Versand der Emails die Email-Adresse des POP3-Emailkontos zu verwenden. Au&szlig;erdem sollten Sie dieses Emailkonto ausschlie&szlig;lich f&uuml;r die Verarbeitung abgewiesener Nachrichten verwenden.</p>

<h4>Tipps f&uuml;r die Nachrichten-Templates:</h4>
<h5>Gestaltung:</h5>
<p>F&uuml;r beste Ergebnisse beim Versand von HTML-Nachrichten sollten Sie keine Referenzen auf externe Stylesheets oder externe Bilder verwenden. Die meisten Email-Programme lesen externe Stylesheets nicht und blockieren Links zu externen Bildern.</p>
<h5>Inhaltsbl&ouml;cke:</h5>
<p>Die folgenden Smarty-Tags stehen speziell f&uuml;r die Verwendung in den NMS-Nachrichten-Templates bereit. Die Verwendung dieser Smarty-Tags in Ihrem Template aktiviert unterschiedliche Inhaltsbl&ouml;cke oder Funktionalit&auml;ten, wenn Sie eine Nachricht erstellen oder bearbeiten:
<ul>

<li>{nms_content name=&quot;block name&quot;}
    <p>Dieser Tag definiert einen Inhaltsblock. Wenn Sie eine Nachricht bearbeiten, wird f&uuml;r jeden nms_content-Tag in Ihrem Template ein Textfeld angezeigt.</p>
    Optionen:<br />
    <ul>
    <li><em>wysiwyg=&quot;false&quot;</em> - der WYSIWYG-Editor wird f&uuml;r diesen Inhaltsblock deaktiviert</li>
    <li><em>oneline=&quot;true&quot;</em> - anstatt eines Textfeldes wird lediglich eine Zeile angezeigt</li>
    <li><em>prompt=&quot;name&quot;</em> - legt einen Text als Prompt f&uuml;r dieses Feld fest, wenn eine Nachricht bearbeitet wird, die dieses Template verwendet.</li>
    </ul>
		<br />
</li>

<li>{nms_attachment name=&quot;block name&quot;}
    <p>Mit diesem Tag kann eine Referenz auf eine angehangene Datei erstellt werden (normalerweise kein Bild). Wenn Sie dann eine Nachricht bearbeiten, wird ein Listenfeld-Men&uuml; angezeigt, in dem Sie eine Datei ausw&auml;hlen k&ouml;nnen, die der Nachricht angehangen werden soll. Diese Datei muss bereits auf die Webseite hochgeladen worden sein. Beim Versand der Nachricht wird dann diese Datei der Nachricht angehangen. Alle in diesem Block angegebenen Referenzen werden durch Links auf die eingebettete Datei ersetzt.
    Optionen:<br />
    <ul>
    <li><em>prompt=&quot;name&quot;</em> - legt einen Text als Prompt f&uuml;r dieses Feld fest, wenn eine Nachricht bearbeitet wird, die dieses Template verwendet.</li>
    </ul><br />
    </p>
</li>

<li>{nms_image name=&quot;block name&quot;}
    <p>Mit diesem Tag kann eine Referenz auf ein angehangenes Bild erstellt werden. Wenn Sie dann eine Nachricht bearbeiten, wird ein Listenfeld-Men&uuml; angezeigt, in dem Sie ein Bild ausw&auml;hlen k&ouml;nnen, das der Nachricht angehangen werden soll. Dieses Bild muss bereits auf die Webseite hochgeladen worden sein. Beim Versand der Nachricht wird dann dieses Bild der Nachricht angehangen. Alle Referenzen auf das Bild werden durch Links auf das eigebettete Bild ersetzt.
    Optionen:<br />
    <ul>
    <li><em>prompt=&quot;name&quot;</em> - legt einen Text als Prompt f&uuml;r dieses Feld fest, wenn eine Nachricht bearbeitet wird, die dieses Template verwendet.</li>
    <li><em>src=&quot;image_name&quot;</em> - legt den Namen des Bildes fest. Wenn dieser Parameter gesetzt wurde, wird im Formular zum Bearbeiten der Nachricht kein Prompt f&uuml;r die Auswahl eines Bildes angezeigt.</li>
    <li>Sie k&ouml;nnen auch andere Atribute f&uuml;r diesen Tag vorgeben, wie zum Beispiel alt (alternativer Bildtext), width (Breite), height (H&ouml;he), class (CSS-Klasse, id (CSS-ID) usw. All dies wird xhtml-valid eingebunden.</li>
    </ul><br />
    </p>
</li>
</ul>
</p>

<h3>Support:</h3>
<p>Dieses Modul beinhaltet keinen kommerziellen Support. Sie k&ouml;nnen jedoch &uuml;ber folgende M&ouml;glichkeiten Hilfe zu dem Modul erhalten:</p>
<ul>
<li>F&uuml;r die letzte Version dieses Moduls, FAQs oder dem Versand eines Fehlerreports besuchen Sie bitte <a href="http://dev.cmsmadesimple.org/projects/newsletter/" target="_blank">http://dev.cmsmadesimple.org/projects/newsletter/</a>.</li>
<li>Weitere Diskussionen zu diesem Modul sind auch in den Foren von <a href="http://forum.cmsmadesimple.org">CMS Made Simple</a> zu finden.</li>
<li>Der Autor Robert Campbell ist auch h&auml;ufig im <a href="irc://irc.freenode.net/#cms">CMS IRC Channel</a> zu finden (username: calguy1000).</li>
<li>Letztlich erreichen Sie den Autor auch &uuml;ber eine direkte Email.</li>
</ul>
<p>Nach der GPL wird diese Software so ver&ouml;ffentlicht, wie sie ist. Bitte lesen Sie den Lizenztext f&uuml;r den vollen Haftungsausschluss.</p>
<h3>Copyright und Lizenz</h3>
<p>Copyright &copy; 2007, Robert Campbell <a href="mailto:calguy1000@hotmail.com">calguy1000@hotmail.com</a>. Alle Rechte vorbehalten.</p>
<p>Ein Dank geht an den urspr&uuml;nglichen Autor des Moduls Paul Lemke <a href="mailto:lemkepf@gmx.net"><lemkepf@gmx.net></a></p>
<p>Dieses Modul wurde unter der <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a> ver&ouml;ffentlicht. Sie m&uuml;ssen dieser Lizenz zustimmen, bevor Sie das Modul verwenden.</p>';
$lang['import_feu_title'] = 'Nutzer des FrontEndUsers-Modul importieren';
$lang['import_feu_info'] = 'W&auml;hlen Sie die FEU-Gruppen, die in NMS importiert werden sollen. <em>(es werden nur die Gruppen angezeigt, f&uuml;r die ein Email-Feld vorhanden ist)</em>';
$lang['import_feu_noproperties'] = 'Sie haben im FrontendUsers-Modul noch keine Eigenschaften definiert. Sie m&uuml;ssen mindestens eine Eigenschaft definieren, um die Email-Adresse des Interessenten zu speichern.';
$lang['import_feu_prompt_groupname'] = 'FrontEndUsers-Gruppe';
$lang['import_feu_prompt_copyusername'] = 'Sollen die Benutzernamen des FEU-Moduls in das NMS-Modul importiert werden?';
$lang['import_feu_info_copyusername'] = '<em>Falls &quot;Nein&quot; ausgew&auml;hlt wurde, wird der Benutzername leer gelassen.</em>';
$lang['import_feu_selectlists'] = 'Benutzer importieren in (Listenname)';
$lang['import_feu_feunotinstalled'] = 'Das FrontEndUsers-Modul ist nicht installiert oder die Eigenschaftstabelle existiert nicht. Die Benutzer des FEU-Moduls k&ouml;nnen nicht importiert werden.';
$lang['processedAddressesTitle'] = 'Verarbeitete Adressen';
$lang['inDatabaseTitle'] = 'Bereits in NMS vorhanden';
$lang['onListAlreadyTitle'] = 'Sie sind bereits angemeldet.';
$lang['addressSubscribedTitle'] = 'Angemeldet';
$lang['listidInfo'] = 'In die Listen-ID importieren: ';
$lang['processedAddressesCountInfo'] = 'Verarbeitete Adressen:';
$lang['archive_heading'] = '<h1>Newsletter-Archiv</h1>';
$lang['archivedmessage'] = '<h1>Archivierte Newsletter</h1>';
$lang['archive_tbl_msgID'] = 'Nachrichten-ID';
$lang['archive_tbl_subject'] = 'Betreff';
$lang['archive_tbl_fullurl'] = 'Nachrichten-Link';
$lang['archive_tbl_href'] = 'Ziel des Links';
$lang['archive_tbl_date'] = 'Datum';
$lang['utma'] = '156861353.717462736.1147511856.1213780620.1213782764.320';
?>