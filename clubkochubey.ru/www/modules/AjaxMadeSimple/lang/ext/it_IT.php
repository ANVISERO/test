<?php
$lang['friendlyname'] = 'Ajax Made Simple';
$lang['moddescription'] = 'Un modulo per soli sviluppatori che permette un accesso semplice alle funzionalit&agrave; Ajax negli altri moduli';
$lang['installed'] = 'Ajax Made Simple versione %s installato con successo';
$lang['postinstall'] = 'Ajax Made Simple version %s installato con successo';
$lang['upgraded'] = 'Ajax Made Simple aggiornato correttamente alla versione %s';
$lang['really_uninstall'] = 'Siete certi che Ajax Made Simple debba essere disinstallato? Tutti i moduli che hanno dipendenze da questo non funzioneranno pi&ugrave;!';
$lang['uninstalled'] = 'Ajax Made Simple disinstallato con successo';
$lang['modulenotfound'] = 'Il modulo [%s] non &egrave; stato trovato';
$lang['methodnotfound'] = 'Il metodo [%s] nel modulo [%s] non &egrave; stato trovato';
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
</ul>
';
$lang['help'] = '<b>Cosa fa questo modulo?</b><br/>
Ajax Made Simple &egrave; un modulo per sviluppatori che fornisce un API che permette ai programmatori di moduli di aggiungere facilmente funzionalit&agrave; Ajax all&#039;interfaccia dei propri moduli.
<br/> 
NOTA: In merito alla funzionalit&agrave; di Amministrazione, funziona. 
Potete richiamare &quot;GetHeaderHTML&quot; anche successivamente nella pagina invece che nell&#039;header. (Non &egrave; una modalit&agrave; corretta, ma verr&agrave; sistemata e per ora funziona)
<br/>
<br/>
<b>Come usare questo modulo?</b><br/>
Dovreste innanzitutto accertarvi che il vostro modulo dipenda da AjaxMadeSimple  per essere certi che funzioni su tutti i sistemi. Potete aggiungere controlli per permettere funzionalit&agrave; senza AjaxMadeSimple, ma se sapete di avere bisogno che sia cos&igrave;, probabilmente sapete anche come farlo, perci&ograve; non mi occuper&ograve; del caso.<br>
<br/>
Nell&#039;interfaccia del vostro modulo, che sar&agrave;, per esempio, la vostra funzione &quot;Action&quot; o il vostro file action.default.php, impostate la richiesta Ajax e fornite il file esterno o il metodo del modulo con il nuovo contenuto che Ajax dovr&agrave; sostituire.
<br/>
Avete bisogno solo di 1 o 2 funzioni per impostarlo e l&#039;API lavora in questo modo:<br/>
<pre>
function RegisterAjaxRequester($modulename,$textid,$divid,$method=&quot;&quot;,$filename=&quot;&quot;,$params=array(),$formfields=array(),$refresh=-1)  {
</pre>
I parametri:<br/>
<i>$modulename</i> &egrave; il nome del vostro modulo, usate $this->GetName()
<br/><br/>

<i>$textid</i> &egrave; un&#039;ID unico per questa chiamata, permettendovi di usare diverse chiamate nello stesso modulo. Il nome del modulo viene aggiunto automaticamente al nome, perci&ograve; non c&#039;&egrave; bisogno che sia unico per tutto il sito.
<br/><br/>

<i>$divid</i> &egrave; l&#039;ID del livello (div) in cui volete mettere il nuovo contenuto. Qualsiasi cosa all&#039;interno di questo livello sar&agrave; sostituita.
<br/><br/>

<i>$method (optional)</i> &egrave; il nome del metodo, nel vostro modulo, che volete riceva l&#039;input da Ajax e fornisca il nuovo contenuto.
Pu&ograve; essere chiamato in qualsiasi modo, ma dovrebbe essere del tipo: 
function $MyAjaxOutput($vars=array()); 
$vars &egrave; un array che contiene tutte le informazioni che volete passare all&#039;elaboratore Ajax, come contenuto dei campi modulo o altre informazioni (guardate $params e $formfields sotto).
<b></b>

<i>$filename (optional)</i> &egrave; il nome del file che volete riceva la connessione da Ajax. Oggetti come campi modulo o altre informazioni vengono passate nell&#039;array $_GET array che &egrave; codificato base64! Usate la funzione base64_decode() per i valori appropriati! Se il parametro $method &egrave; impostato,  $filename sar&agrave; ignorato.
<br/>

<b>Assicuratevi che $method o $filename siano impostati ad un valore funzionante, e $method ha la precedenza...</b>
<br/><br/>

<i>$params (opzionale)</i> &egrave; un array che contiene tutte le informazioni che volete passare all&#039;elaboratore ajax. Usate la formula array(&quot;varname&quot;=>&quot;value&quot;)
<br/><br/>

<i>$formfields (opzionale)</i> &egrave; un array che contiene l&#039;identificativo degli input modulo (form) dei campi che contengono i dati che volete passare ad Ajax.
I campi possono essere opzionalmente cancellati dopo l&#039;invio. 
Usate la formula array(&quot;myfieldid&quot;=>&quot;option&quot;)<br>
Opzioni utilizzabili sono anche:<br>
&nbsp;&nbsp;<i>clear</i> - che pulisce un campo di testo dopo che ajax &egrave; stato attivato (in un campo input di una chat, per esempio, guardate il modulo Chat)
<br/>
&nbsp;&nbsp;<i>radio</i> - che indica che il campo desiderato &egrave; un gruppo di radio button (per esempio in un box di votazione, guardate il modulo Polls, che deve essere elaborato in modo particolare da Ajax. Fate attenzione al fatto che, quando fate riferimenti ai pulsanti radio deve essere usato il nome del tag pulsante, non l&#039;ID!
<br/>
Per il momento &egrave; possibile una sola opzione per ogni campo modulo. Potrebbe cambiare nelle versioni future.
<br/><br/>

<i>$refresh (optional)</i> allows you to trigger recurring ajax-requests every x&#039;th millisecond. Allow self-updating content. Default is no automatic refresh.
<br/><br/>

 <pre>
 function GetFormOnSubmit($modulename,$textid,$pre=&quot;&quot;,$post=&quot;&quot;)
 </pre>
 The output returned from this function should be put into the form-statement of a form to automatically
 trigger a Ajax-request when the form is submitted. It can be used as $extra in the module-API function CreateFormStart()
 or simply echo&#039;ed into your own form before the ending > in the form-tag.
 <br/><br/>
 The parameters:<br/>
 <i>$modulename</i> is the name of your module, just use $this->GetName()
<br/><br/>

<i>$textid</i> is a unique id for this requester, allowing you to use several requester in the same module. The modulename is automatically
added to the name to there&#039;s no need to make it site-wide unique.
<br/><br/>
<i>$pre (optional)</i> is any info to be inserted before the Ajax-stuff in the result.
<b></b>
<i>$post (optional)</i> is any info to be inserted after the Ajax-stuff in the result.
<br/>
<br/>
<br/>
For a live example of usage, please install the ChatMadeSimple-module and look into the files:
<pre>
action.default.php (setting up the connections, one using a method the other and external file)
onlinenow.php (the external file-provider)
AjaxMadeSimple.method.php (find the ChatEngine-function exampling a method-provider)
</pre>
The Polls-module also uses AjaxMS in a whole other way, so please have a look there as well.
<br/>
<br/>
Good luck! It&#039;s actually quite easy when you get the hang of it ;-) And feel free to ask for features or help on getting
your module Ajaxified!

';
$lang['utmz'] = '156861353.1192804159.44.1.utmccn=(direct)|utmcsr=(direct)|utmcmd=(none)';
$lang['utma'] = '156861353.2123299222.1160127657.1193821545.1194538797.47';
$lang['utmc'] = '156861353';
?>