<?php
$lang['friendlyname'] = 'Ajax made simple';
$lang['moddescription'] = 'Ein Modul f&uuml;r Entwickler. Damit werden f&uuml;r andere Module AJAX-Funktionalit&auml;ten bereit gestellt.';
$lang['installed'] = 'Ajax made simple Version %s wurde erfolgreich installiert';
$lang['postinstall'] = 'Ajax made simple Version %s wurde erfolgreich installiert';
$lang['upgraded'] = 'Ajax Made Simple wurde erfolgreich auf Version %s aktualisiert';
$lang['really_uninstall'] = 'Wollen Sie wirklich Ajax made simple deinstallieren? Module, die von Ajax made simple abh&auml;ngen, werden dann nicht mehr funktionieren!';
$lang['uninstalled'] = 'Ajax made simple wurde erfolgreich deinstalliert';
$lang['modulenotfound'] = 'Das Modul [%s] konnte nicht gefunden werden';
$lang['methodnotfound'] = 'Die Methode [%s] im Modul [%s] konnte nicht gefunden werden';
$lang['changelog'] = '<ul>
<li><b>0.1.5</b> - <ul>
  <li>Added a lot of comments in code</li>
	<li>Fixed stupid bug preventing javascript inclusions to appear in many circumstances.</li>
	<li>Added backware compatibility with PHP4</li>
	<li>Added some stuffs to allow you to create an upload file form &quot;working/dealing&quot; with your module and Ajax</li>
	</ul></li>
<li><b>0.1.4</b> - Rewrote to using sessions to carry generated code into the external js-returning file
<li><b>0.1.3</b> - Moved javascript to an external file
<li><b>0.1.2</b> - Added handling of radiobuttons, fixed involentary refreshes due to bad default paramter-value</li>
<li><b>0.1.1</b> - Honestly don&#039;t remember</li>
<li><b>0.1.0</b> - First functioning release</li>
</ul>';
$lang['help'] = '<h3>Was macht dieses Modul?</h3>
<p>Ajax made simple ist ein reines Modul f&uuml;r Modul-Programmierer. Es stellt eine API bereit, um den Modul-Ausgaben auf der Webseite Ajax-Funktionalit&auml;ten hinzuzuf&uuml;gen. Funktionalit&auml;ten f&uuml;r die Administration sind geplant.</p>
<p>HINWEIS: Die Administrations-Funktionalit&auml;t funktioniert bereits. So k&ouml;nnen Sie anstatt des Headers sp&auml;ter auf der Seite &quot;GetHeaderHTML&quot; aufrufen. (Das ist zwar nicht der sauberste Weg, aber f&uuml;r den Moment funktioniert es)</p>

<h3>Wie wird das Modul eingesetzt?</h3>
<p>Zun&auml;chst sollten Sie sicherstellen, dass Sie Ihr Modul von einem installierten Ajax made simple Modul abh&auml;ngig gemacht haben. Damit stellen Sie sicher, dass es auf allen Systemen funktioniert.</p> 
<p>Dann m&uuml;ssen Sie Ihrem Modul-Frontend (also zum Beispiel in Ihrer action-Funktion oder Ihrer action.default.php-Datei) die Ajax-Abfragen hinzuf&uuml;gen und entweder eine externe Datei oder eine Modul-Methode angeben, die die via Ajax auszutauschenden Inhalte enth&auml;lt. Daf&uuml;r m&uuml;ssen nur 1 oder 2 Funktionen eingef&uuml;gt werden:</p>

<pre>
function RegisterAjaxRequester($modulename,$textid,$divid,$method=&quot;&quot;,$filename=&quot;&quot;,$params=array(),$formfields=array(),$refresh=-1)  {
</pre>

<h4>Die Parameter:</h4>
<ul>
<li><i>$modulename</i> - der Name Ihres Moduls, verwenden Sie hier einfach $this->GetName()</li>

<li><i>$textid</i> - eine eindeutige Text-ID f&uuml;r diese Abfrage. Dies erlaubt Ihnen, mehrere Abfragen in einem Modul zu verwenden. Da der Text-ID automatisch der Modulname hinzugef&uuml;gt wird, m&uuml;ssen Sie sich nicht darum k&uuml;mmern, dass die Text-ID systemweit einzigartig ist.</li>

<li><i>$divid</i> - die ID des div-Containers, in dem der neue Inhalt ausgegeben werden soll. Alles innerhalb dieses div-Containers wird ersetzt.</li>

<li><i>$method (optional)</i> - der Name der Methode in Ihrem Modul, welche die Eingaben von Ajax entgegen nimmt und den neuen Inhalt wieder ausgibt. Der Name der Methode kann frei gew&auml;hlt werden, sollte aber in folgender Form erfolgen:

<pre>function $MyAjaxOutput($vars=array());</pre>

$vars ist ein Array, welches die Informationen enth&auml;lt, die an Ajax weitergegeben werden sollen wie zum Beispiel den Inhalt von Formularfeldern oder andere Informationen (siehe dazu $params und $formfields weiter unten).</li>

<li><i>$filename (optional)</i> - der Name der Datei, der von Ajax &uuml;bergeben werden soll. Werte wie zum Beispiel die Inhalte von Formularfelder oder andere Informationen werden im $_GET-Array &uuml;bergeben und sind base64-kodiert! Um die richtigen Werte zu erhalten, m&uuml;ssen Sie die Funktion base64_decode() verwenden! Wenn der Parameter $method gesetzt wurde, wird $filename ignoriert.
<br /><br />
<strong>Bitte beachten Sie, dass entweder der Parameter $method oder der Parameter $filename gesetzt werden MUSS. Ansonsten wird es nicht funktionieren. Dabei hat der Parameter $method Vorrang ...</strong></li>

<li><i>$params (optional)</i> - ein Array, welches die Informationen enth&auml;lt, die &uuml;ber Ajax ausgegeben werden sollen. Verwenden Sie dabei folgende Form: 

<pre>array(&quot;varname&quot;=>&quot;value&quot;)</pre></li>

<i>$formfields (optional)</i> - ein Array, welches die ID&#039;s derjenigen Formularfelder enth&auml;lt, deren Werte via Ajax weitergegeben werden sollen. Optional k&ouml;nnen die Formularfelder nach dem Versand geleert werden. Verwenden Sie dabei folgende Form:  

<pre>array(&quot;myfieldid&quot;=>&quot;option&quot;)</pre>

<br /><br />
G&uuml;ltige Optionen sind:<br>
<ul>
<li><i>clear</i> - leert ein Textfeld, wenn dessen Inhalt via Ajax versandt wurde (zum Beispiel das Eingabefeld im Chat-Modul)</li>

<li><i>radio</i> - zeigt an, dass die zu &uuml;bermittelnden Felder ein Set von Optionsfeldern enth&auml;lt (zum Beispiel bei einer Abstimmung - siehe Poll-Modul), die auf besondere Weise durch Ajax verarbeitet werden. 
<br /><br />
HINWEIS 1: Wenn die Werte von Optionsfeldern &uuml;bergeben werden sollen, wird der Name des Optionsfeldes verwendet, nicht dessen ID!
<br /><br />
HINWEIS 2: Derzeit ist f&uuml;r jedes Formularfeld nur eine Option m&ouml;glich. Dies wird eventuell in k&uuml;nftigen Versionen ge&auml;ndert.</li>

<li><i>$refresh (optional)</i> - erlaubt die Wiederholung von Ajax-Abfragen aller x Millisekunden. Damit lassen sich selbstaktualisierende Inhalte realisieren. In der Voreinstellung ist dies deaktiviert.</li>
</ul></ul>

 <pre>
 function GetFormOnSubmit($modulename,$textid,$pre=&quot;&quot;,$post=&quot;&quot;)
 </pre>

 <p>Der R&uuml;ckgabewert dieser Funktion sollte direkt im form-Tag des Formulars eingef&uuml;gt werden, um bei Versand des Formulars automatisch eine Ajax-Abfrage auszul&ouml;sen. Dieser kann als Parameter $extra in der Modul-API-Funktion CreateFormStart() erfolgen oder einfach in Ihrem Formular vor dem schlie&szlig;enden > des form-Tags via echo ausgegeben werden.</p>

 <h4>Die Parameter:</h4>
<ul>
<li><i>$modulename</i> - der Name Ihres Moduls, verwenden Sie hier einfach $this->GetName()</li>

<li><i>$textid</i> - eine eindeutige Text-ID f&uuml;r diese Abfrage. Dies erlaubt Ihnen, mehrere Abfragen in einem Modul zu verwenden. Da der Text-ID automatisch der Modulname hinzugef&uuml;gt wird, m&uuml;ssen Sie sich nicht darum k&uuml;mmern, dass die Text-ID systemweit einzigartig ist.</li>

<li><i>$pre (optional)</i> - eine beliebige Information, die VOR dem Versand der Ergebnisse/Werte via Ajax eingef&uuml;gt wird.</li>

<li><i>$post (optional)</i> - eine beliebige Information, die NACH dem Versand der Ergebnisse/Werte via Ajax eingef&uuml;gt wird.</li>
</ul>

<p>F&uuml;r ein Beispiel aus der Praxis installieren Sie sich das Chat made simple-Modul und schauen sich die folgenden Dateien an:</p>

<pre>
action.default.php (Einstellung der Verbindungen, eine verwendet eine Methode, die andere eine externe Datei)
onlinenow.php (die externe Datei)
AjaxMadeSimple.method.php (hier finden Sie ein Beispiel f&uuml;r eine Methode, wie sie die die ChatEngine-Funktion verwendet)
</pre>

<p>Das Polls-Modul verwendet Ajax made simple auf ganz andere Weise - schauen Sie es sich einfach an.</p>
<p>Viel Erfolg! Es ist wirklich einfach, wenn Sie es erst einmal verstanden haben ;-). Und wenn Sie weitere Features oder Hilfe beim Einsatz von Ajax in Ihren Modulen ben&ouml;tigen - fragen Sie einfach!</p>';
$lang['utma'] = '156861353.717462736.1147511856.1202387832.1202390778.299';
$lang['utmz'] = '156861353.1194284715.245.114.utmccn=(referral)|utmcsr=google.de|utmcct=/ig|utmcmd=referral';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>