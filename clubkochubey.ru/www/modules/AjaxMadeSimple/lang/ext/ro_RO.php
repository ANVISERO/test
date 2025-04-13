<?php
$lang['friendlyname'] = 'Ajax Realizat Usor';
$lang['moddescription'] = 'Un modul pentru dezvoltatori care asigura altor module accesul facil la functionalitatea Ajax ';
$lang['installed'] = 'Ajax Realizat Usor versiunea %s a fost instalata cu succes';
$lang['postinstall'] = 'Ajax Realizat Usor versiunea %s a fost instalata cu succes';
$lang['upgraded'] = 'Versiunea Ajax Realizat Usor a fost actualizata cu succes la versiunea %s';
$lang['really_uninstall'] = 'Sunteti sigur(a) ca doriti sa dezinstalati Ajax Realizat Usor? Orice modul dependent nu va ma continua sa functioneze!';
$lang['uninstalled'] = 'Ajax Realizat Usor a fost dezinstalat cu succes';
$lang['modulenotfound'] = 'Modulul [%s] nu a fost gasit';
$lang['methodnotfound'] = 'Metoda [%s] din modulul [%s] nu a fost gasita';
$lang['changelog'] = '<ul>
<li><b>0.1.5</b> - <ul>
  <li>Mai multe comentarii au fost adaugate in cod</li>
	<li>A fost rezolvat un bug stupid care prevenea includerile de javascript sa apara in multe circumstante</li>
	<li>Compatibilitatea cu PHP4 a fost adaugata retroactiv</li>
	<li>Au fost adaugate facilitati pentru a permite crearea unui formular pentru incarcarea de fisiere &quot;lucrand/avand legatura&quot; cu modulul utilizatorului si Ajax</li>
	</ul></li>
<li><b>0.1.4</b> - Rescris pentru folosirea sesiunilor pentru includerea codului generat in fisierul extern js returnat
<li><b>0.1.3</b> - Javascript-ul a fost mutat intr-un fisier extern
<li><b>0.1.2</b> - A fost adaugata tratarea butoanelor radio, a fost rezolvata problema re-improspatarilor involuntare datorate valorilor implicite ale parametrilor</li>
<li><b>0.1.1</b> - Sincer nu imi amintesc</li>
<li><b>0.1.0</b> - Prima versiune functionala</li>
</ul>
';
$lang['help'] = '<b>Ce face acest modul?</b><br/>
Ajax Realizat Usor este un modul pentru dezvoltatori care ofera o interfata de programare API pentru ca programatorii de module sa poata extinde usor functionalitatea Ajax in prim-planul modulelor lor. Functionalitatea de administrare este planificata.
<br/> 
NOTA: In legatura cu functionalitatea de administrare: functioneaza. Puteti apela &quot;GetHeaderHTML&quot; ulterior in pagina decat la inceputul paginii. (Nu este un mod de lucru curat, dar va fi corectat, si, pentru moment functioneaza)
<br/>
<br/>
<b>Cum folosesc acest modul?</b><br/>
Trebuie sa fiti sigur(a) ca modulul dumneavoastra depinde de Ajax Realizat Usor pentru a avea certitudinea ca functioneaza pe toate sistemele.
Puteti sa va adaugati verificari pentru a permite functionarea fara Ajax Realizat Usor, dar, daca va doriti acest lucru probabil ca stiti cum sa procedati si nu voi insista asupra acestui lucru.<br>
<br/>
In prim-planul modulului dumneavoastra, de exemplu functia-Action sau fisierul action.default.php configurati Ajax-requester si oferiti fie fisierul extern sau metoda din modul care pune la dispozitie noul continut pentru a fi substituit de Ajax.<br/>
Aveti nevoie de una sau doua functii pentru a-l configura si API-ul arata cam asa:<br/>
<pre>
function RegisterAjaxRequester($modulename,$textid,$divid,$method=&quot;&quot;,$filename=&quot;&quot;,$params=array(),$formfields=array(),$refresh=-1)  {
</pre>
Parametrii:<br/>
<i>$modulename</i> este numele modulului dumneavoastra, folositi doar $this->GetName()
<br/><br/>

<i>$textid</i> este un id unic pentru acest requester, permitandu-va folosirea catorva requester-i in acelasi modul. Numele modulului este adaugat automat la nume si nu trebuie sa-l faceti unic la nivel global pentru intreg site-ul.
<br/><br/>

<i>$divid</i> este id-ul div-ului in interiorul caruia doriti ca noul continut sa fie plasat. Tot ce este cuprins in acest div va fi inlocuit.
<br/><br/>

<i>$method (optional)</i> este numele metodei din modulul dumneavoastra care doriti sa receptioneze intrari din partea Ajax si sa ofere noul continut. Poate fi denumita oricum, dar trebuie sa fie in formatul: function $MyAjaxOutput($vars=array()); $vars este un vector continand orice informatie pe care doriti sa o trimiteti la Ajax-provider, cum ar fi continutul campurilor din formular sau alte informatii (vezi $params si $formfields de mai jos).
<b></b>

<i>$filename (optional)</i> este numele fisierului care doriti sa receptioneze conexiunea de la ajax. Lucruri precum formfields sau alte informatii sunt transferate prin vectorul
$_GET  si este codificat in formatul base64! Va rog sa folositi functia base64_decode() pentru valori corecte! Daca parametrul $method este setat, $filename este ignorat.
<br/>

<b>Va rog sa setati fie $method sau $filename la ceva functional.  $method are intaietate...</b
<br/><br/>

<i>$params (optional)</i> este un vector care contine orice informatie pe care doriti sa o trimiteti la furnizorul ajax. Folositi formatul array(&quot;numevariabila&quot;=>&quot;valoare&quot;)
<br/><br/>

<i>$formfields (optional)</i> este un vector care contine id-urile campurilor intrarilor formularului al caror continut il doriti a fi transferat furnizorului ajax.
Campurile pot fi, optional, sterse dupa transmitere. Folositi formatul  array(&quot;id-ulcampuluimeu&quot;=>&quot;optiune&quot;)<br>
Optiuni valide pana acum sunt:<br>
&nbsp;&nbsp;<i>clear</i> - care sterge un textfield (camp text) dupa ce ajax a fost activat (intr-un camp de intrare de tip chat spre exemplu, vezi modulul Chat)
<br/>
&nbsp;&nbsp;<i>radio</i> - care indica faptul ca, campul dorit este un set de butoane radio (spre exemplu intr-un sistem de votare, vezi modulul Polls, care trebuie sa fie procesat intr-un mod special de catre ajax. Va rog sa luati in considerare ca, atunci cand se face referire la butoane radio, se foloseste numele etichetei butonului si nu id-ul!
<br/>
Ca o mentiune, pentru moment doar o singura optiune este posibila pentru fiecare camp din formular. Acest lucru poate fi schimbat in versiunile viitoare.

<br/><br/>

<i>$refresh (optional)</i> va permite sa declansati cereri ajax recurente la fiecare a x-a milisecunda. Permite continut de tip auto-actualizat. Implicit este fara continut auto-actualizat.
<br/><br/>

 <pre>
 function GetFormOnSubmit($modulename,$textid,$pre=&quot;&quot;,$post=&quot;&quot;)
 </pre>
 Rezultatul emis de catre aceasta functie trebuie plasat in instructiunea form a unui formular pentru declansarea automata a cererii Ajax cand formularul este trimis. Poate fi folosit ca $extra in functia CreateFormStart() a modulului sau pur si simplu ca ecou in formularul dumneavoastra inainte de terminatorul > din eticheta form.
 <br/><br/>
 Parametrii:<br/>
 <i>$modulename</i> este numele modulului dumneavoastra, doar folositi $this->GetName()
<br/><br/>

<i>$textid</i> este un id unic pentru acest requester, permitandu-va sa folositi mai multi requester-i in acelasi modul. Numele modulului este adaugat automat la nume astfel incat nu este necesar sa-l faceti unic la nivel global pentru intreg site-ul.
<br/><br/>
<i>$pre (optional)</i> reprezinta orice informatie pentru a fi inserata in rezultat, inainte de stuff-ul Ajax.
<b></b>
<i>$post (optional)</i> reprezinta orice informatie pentru a fi inserata in rezultat, dupa stuff-ul Ajax.
<br/>
<br/>
<br/>
Pentru un exemplu de utilizare, va rog sa instalati modulul ChatMadeSimple si sa va uitati in aceste fisiere:
<pre>
action.default.php (setarea conexiunilor, una folosind o metoda si alta folosind un fisier extern)
onlinenow.php (fisierul extern furnizat)
AjaxMadeSimple.method.php (cautati functia ChatEngine exemplificand o metoda furnizor)
</pre>
Si modulul Polls foloseste AjaxMS, insa in cu totul alt mod, va rog sa va uitati si acolo de asemenea.
<br/>
<br/>
Mult noroc! Este chiar usor atunci cand te prinzi de mersul lucrurilor ;-) Simtiti-va in masura sa cereti imbunatatiri sau ajutor in obtinerea modulului dumneavoastra Ajaxificat!

';
$lang['utma'] = '156861353.1422824650.1193244506.1193251702.1193416700.4';
$lang['utmb'] = '156861353';
$lang['utmz'] = '156861353.1193251702.3.2.utmccn=(referral)|utmcsr=localhost|utmcct=/cmsmadesimple/admin/moduleinterface.php|utmcmd=referral';
$lang['utmc'] = '156861353';
?>