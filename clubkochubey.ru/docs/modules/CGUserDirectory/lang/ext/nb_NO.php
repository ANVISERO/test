<?php
$lang['addedit_browseprop_template'] = 'Legg til/rediger s&oslash;k-i-egenskap(Browse Property)-mal';
$lang['addedit_detail_template'] = 'Legg til/rediger dataljmal';
$lang['addedit_directory_template'] = 'Legg til/rediger katalogmal';
$lang['addedit_searchform_template'] = 'Legg til/rediger s&oslash;keskjemamal';
$lang['addedit_summary_template'] = 'Legg til/rediger sammendragsmal';
$lang['all'] = 'Alle';
$lang['any'] = 'Enhver';
$lang['ask_really_uninstall'] = 'Er du sikker p&aring; at du vil gj&oslash;re dette? &Aring; fortsette vil ugjenkallelig slette all data assosiert med denne modulen.';
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
$lang['created'] = 'Opprettet';
$lang['error_invalidgroup'] = 'Ugyldig gruppe';
$lang['error_invalidsortfield'] = 'Ugyldig sorteringsfelt: %s';
$lang['error_missingparam'] = 'Utilstrekkelige parametere';
$lang['error_nofeu'] = 'Frontend Users modulen ble ikke funnet';
$lang['error_usernotfound'] = 'Brukeren med den oppgitte id ble ikke funnet';
$lang['expires'] = 'Utl&oslash;per';
$lang['friendlyname'] = 'Calguys User Directory ';
$lang['groups'] = 'Grupper';
$lang['help'] = '<h3>What does this do?</h3>
  <p>This module provides the ability for generating a directory of users from the FEU module, for generating a summary view of users matching specified criteria, and for displaying a detail report of a specific user.  It can be used for generating profile pages for your users, or a staff directory.</p>
<h3>Features:</h3>
<ul>
  <li>Complete template control
<p>All displays are completely configurable by templates allowing for javascript, ajax, or any other fancy displays.  Styling is completely controllable by the website developer.</p>
  </li>
  <li>Multiple database templates.
<p>You can configure multiple different views for each display, and use them under different situations.</p>
  </li>
<li>Filter summary views on user properties.
   <p>You can filter the output for the summary view based on the value of a specific user property from the FEU module.  This also includes &amp;quot;LIKE&amp;quot; based critera.
  </li>
  <li>Sorting on multiple different criteria.</li>
  <li>Supports SEO friendly URLS</li>
</ul>
<h3>How do I use it?</h3>
<p>The simplest way to use this module is to place a tag like this into your page template, or page content <code>{CGUserDirectory}</code>.  To expand on this functionality, or to display a subset of your users, see the parameters below.</p>
<h3>Examples:</h3>
<ul>
<li>Display a directory of all users:
<p><code>{CGUserDirectory action=&amp;quot;directory&amp;quot;}</code></p>
</li>
<li>Display a directory of all users organized by city:
<p><code>{CGUserDirectory action=&amp;quot;directory&amp;quot; prop=&amp;quot;city&amp;quot;}</code></p>
</li>
<li>Display a summary list of all users in the &amp;quot;members&amp;quot; group:
<p><code>{CGUserDirectory group=&amp;quot;members&amp;quot;}</code></p>
</li>
<li>Display a summary list of all users in the city of calgary:
<p><code>{CGUserDirectory prop=&amp;quot;city&amp;quot; propval=&amp;quot;calgary&amp;quot;}</code></p>
</li>
<li>Display a summary list of all users from countries that begin with C:
<p><code>{CGUserDirectory prop=&amp;quot;city&amp;quot; uselike=1 propval=&amp;quot;c%&amp;quot;}</code></p>
</li>

</ul>

<h3>Notes about pretty URLS</h3>
<p>&amp;quot;Pretty&amp;quot; or SEO friendly URLS limits the flexibility of this module, and the parameters that can be specified on the tag. Particularly those that can be passed on to subsequent views.  For this reason, the directory view does not generate pretty urls to the subsequent summary links.  This allows parameters like detailpage, detailtemplate, and summarytemplate to be passed in the tag to the directory view and to have those parameters passed down to the subsequent summary detail views.</p>
</p>
<h3>Support</h3>
<p>This module does not include commercial support. However, there are a number of resources available to help you with it:</p>
<ul>
<li>For the latest version of this module, FAQs, or to file a Bug Report or buy commercial support, please visit the cms development forge at <a href="http://dev.cmsmadesimple.org">dev.cmsmadesimple.org</a>.</li>
<li>Additional discussion of this module may also be found in the <a href="http://forum.cmsmadesimple.org">CMS Made Simple Forums</a>.</li>
<li>The author, calguy1000 all can often be found in the <a href="irc://irc.freenode.net/#cms">CMS IRC Channel</a>.</li>
<li>Lastly, you may have some success emailing the author(s) directly.</li>  
</ul>

<h3>Copyright and License</h3>
<p>Copyright &amp;copy; 2008, Robert Campbel <a href="mailto:calguy1000@cmsmadesimple.org">&amp;lt;calguy1000@cmsmadesimple.org&amp;gt;</a>. All Rights Are Reserved.</p>
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
$lang['help_param_action'] = 'Denne parameter kontrollerer oppf&oslash;rselen for denne modulen. Det er tre mulige verdier:
<ul>
  <li>browse  - Vis en navigasjon av egenskapsverdier, og tillater &aring; drille ned til tilh&oslash;rende sammendragsvisninger.</li>
  <li>default - Viser en sammendragsvisning av brukere som passer til det spesifiserte kriteriet, eller alle brukere om ingen kriterie er satt.</li>
  <li>directory - Viser en alfabetisk katalog av lenker til sammendragsvisning av brukere som passer til det spesifiserte kriteriet. Det er mulig &aring; opprette katalogvisninger p&aring; brukernavn eller p&aring; enhver annen parameter.</li>
  <li>detail - Viser detaljrapport om en spesifik bruker.</li>
  <li>search - Viser et s&oslash;keskjema.</li>
</ul>';
$lang['help_param_browseproptemplate'] = 'Denne parameter tillater &aring; spesifisere navnet p&aring; en s&oslash;k-i-egenskap(browse property)-mal som ikke er standard &aring; benytte for s&oslash;ke-visningen';
$lang['help_param_group'] = 'N&aring;r benyttet med standard handlingen b&oslash;r denne parameter inneholde navnet p&aring; en FEU brukergruppe, og vil da begrense visningen til kun medlemmer av den gruppen.';
$lang['help_param_gid'] = 'N&aring;r benyttet med standard handlingen b&oslash;r denne parameter inneholde id&#039;en p&aring; en FEU brukergruppe, og vil da begrense visningen til kun medlemmer av den gruppen. Denne parameter kan ikke brukes sammen med &#039;group&#039; parameteren.';
$lang['help_param_showexpired'] = 'Som standard, vil systemet utelukke utl&oslash;pte brukere fra alle genererte rapporter. &Aring; sette denne parameter til  1  vil ogs&aring; utl&oslash;pte brukere bli inkludert.';
$lang['help_param_bsortby'] = 'N&aring;r benyttet med s&oslash;ke handlingen, vil denne parameter spesifisere sorteringsrekkef&oslash;lgen for den genererte egenskapsvisningen.  Mulige verdier er:
<ul>
  <li>name - egenskapens navn.</li>
  <li>count - antall treff.</li>
</ul>';
$lang['help_param_sparse'] = 'Gjelder kun for katalogenvisning. Denne muligheten vil bare vise en katalogbokstav der det er samsvarende brukere.';
$lang['help_param_resultpage'] = 'Benyttet ved s&oslash;k og bla-gjennom handlinger vil denne parameter spesifisere hvilken CMSMS innholdside som skal benyttes for &aring; vise de passende artiklene fra filtreringsoperasjonen.';
$lang['help_param_sortby'] = 'Brukt med standard handlingen vil denne parameteren spesifisere sorteringen av den genererte visningen. Mulige verdier er:
<ul>
 <li>id - Brukerens id (kun standard visning)</li>
 <li>username - Brukerens brukernavn (kun standard visning)</li>
 <li>createdate - Dato for n&aring;r brukerkontoen ble opprettet. (kun standard visning)</li>
 <li>expires - Dato for n&aring;r brukerkontoen vil utl&oslash;pe (eller n&aring;r den utl&oslash;p). (kun standard visning)</li>
 <li>activity - Dato for n&aring;r det sist ble logget inn eller ut av brukerkontoen. (kun standard visning)</li>
 <li>f:propertyname - Dette tillater sortering av utdata etter et spesifisert FEU-egenskapsnavn f.eks.: f:full_name.  <strong>Merk:</strong> du kan se uventede resultater om gruppen som vises ikke har denne egenskapen, eller ikke hver bruker i resultatsettet har denne egenskapen definert. Du kan ogs&aring; erfare uventede resultater om feltet som er spesifisert ikke er en tekststreng. Du kan kanskje trenge &aring; endre sortorder (sorteringsrekkef&oslash;lge)-parameteren for &aring; f&aring; det &oslash;nskede resultat.</ul>';
$lang['help_param_bsortorder'] = 'N&aring;r benyttet med s&oslash;ke handlingen, vil denne parameter spesifisere sorteringsrekkef&oslash;lgen for den genererte visninge.  Mulige verdier er:
<ul>
  <li>ASC - Stigende rekkef&oslash;lge</li>
  <li>DESC - Synkende rekkef&oslash;lge</li>
</ul>';
$lang['help_param_sortorder'] = 'Brukt med standard handlingen vil denne parameteren spesifisere sorteringsretningen p&aring; den genererte visningen. Mulige verdier er:
<ul>
  <li>ASC - Stigende rekkef&oslash;lge</li>
  <li>DESC - Synkende rekkef&oslash;lge</li>
</ul>';
$lang['help_param_pagelimit'] = 'Brukt med standard handlingen vil denne parameteren spesifisere maksimalt antall poster som skal vises.';
$lang['help_param_prop'] = 'Brukt med standard og directory handlingene vil denne parameter oppf&oslash;re seg p&aring; to ulike m&aring;ter alt etter handlingen:
<ul>
  <li>Standard (sammendrag) handlingen.
    <p>I standard (sammendrag) handlingen kan denne parameteren benyttes for &aring; spesifisere en egenskap man vil filtrere p&aring;.</p>
  </li>
  <li>Browse handlingen
    <p>I browse handlingen kan denne parameteren benyttes for &aring; spesifisere en FEU egenskap &aring; lete i</p>
  </li>
  <li>Katalog handlingen.
    <p>I directory(katalog) handlingen kan denne parameteren benyttes for &aring; spesifisere en egenskap man vil generere en katalog fra. Standard verdi i directory(katalog) handlingen er &amp;quote;unsername&amp;quote;</p>
  </li>
</ul>';
$lang['help_param_propval'] = 'Benyttet sammen med  &quot;prop&quot;  parameteren for standard (sammendrag) handlingen, tillater denne parameteren &aring; spesifisere en verdi som brukere skal filtreres med.';
$lang['help_param_uselike'] = 'Benyttet sammen med  &quot;prop&quot;  og  &quot;propval&quot;  parameteren, vil denne parameteren - om den er satt til en positiv integer verdi - indikere at propval parameteren inneholder et LIKE uttrykk (LIKE expression).';
$lang['help_param_detailpage'] = 'Denne parameteren, om spesifisert, b&oslash;r inneholde pageid eller alias for en CMS innholdside hvor du vil at detaljrapporter skal vises.';
$lang['help_param_summarytemplate'] = 'Denne parameter tillater &aring; spesifisere navnet p&aring; en mal, som ikke er systemstandard for sammendrag, &aring; benytte for sammendragsvisninger';
$lang['help_param_detailtemplate'] = 'Denne parameter tillater &aring; spesifisere navnet p&aring; en mal, som ikke er systemstandard for detaljvisning, &aring; benytte for detaljvisninger';
$lang['help_param_directorytemplate'] = 'Denne parameter tillater &aring; spesifisere navnet p&aring; en mal, som ikke er systemstandard for katalogvisning, &aring; benytte for katalogvisninger';
$lang['help_param_searchformtemplate'] = 'Denne parameter tillater &aring; spesifisere navnet p&aring; en s&oslash;kemal som ikke er satt standard &aring; benytte i s&oslash;keskjema';
$lang['help_param_searchproperty'] = 'Denne parameter tillater &aring; spesifisere et enkelt ekstra FEU egenskapsnavn &aring; tilf&oslash;re til s&oslash;keskjemaet';
$lang['help_param_uid'] = 'Benyttet sammen med detaljvisningen, m&aring; denne parameteren inneholde uid for en gyldig FrontEndUser konto';
$lang['info_browseprop_template'] = 'S&oslash;k-iegenskap(Browse Property)-maler viser en liste med unike verdier for den spesifiserte egenskapen. Hver oppf&oslash;ring i listen er en lenke til en sammendragsvisning som inneholder de brukerne som passer den egenskapsverdien. Du kan benytte envher smartylogikk eller variabler som allerede er opprettet, eller de som spesifikt er gjort tilgjengelige for denne visningen.';
$lang['info_browseprop_templates_tab'] = 'Denne fanen inneholderlisten med tilgjengelige s&oslash;k-iegenskap(browse property) visningsmaler. En av dem er satt som standard. Den som er standard vil bli benyttet n&aring;r ingen andre malnavn er oppgitt i taggen som kaller denne modulen';
$lang['info_detail_template'] = 'Detaljmaler viser detaljert informasjon om en spesifiesert FrontEndUser. HEr designer du m&aring;ten du vil at denne informasjonen skal vises. Du kan bruke all smarty logikk eller variabler som fra f&oslash;r har blitt designet, eller de som er gjort tilgjengelige spesielt for denne visningen';
$lang['info_detail_templates_tab'] = 'Denne fanen inneholder listen med tilgjengelige detaljvisning maler. En av dem er markert som standard. Den som er standard vil bli benyttet n&aring;r ikke et annet malnavn er eksplisitt angitt i taggen som kaller denne modulen';
$lang['info_directory_template'] = 'Katalogmaler viser en alfabetisk liste med lenker. N&aring;r en lenke klikkes vil den vise en sammendragsvisning av de brukerne som passer med den bokstaven. Det er mulig &aring; opprette kataloger basert p&aring; forskjellige egenskaper. Her designer du hvordan du vil at denne informasjonen skal vises. Du kan bruke all smarty logikk eller variabler som fra f&oslash;r har blitt designet, eller de som er gjort tilgjengelige spesielt for denne visningen';
$lang['info_directory_templates_tab'] = 'Denne fanen inneholder listen med tilgjengelige katalogmaler. En av dem er markert som standard. Den som er standard vil bli benyttet n&aring;r ikke et annet malnavn er eksplisitt angitt i taggen som kaller denne modulen';
$lang['info_summary_template'] = 'Sammendragsmaler viser informasjon om en liste med brukere som samsvarer med et kriterium.  Her designer du hvordan du vil at denne informasjonen skal vises. Du kan bruke all smartylogikk eller variabler som fra f&oslash;r har blitt designet, eller de som er gjort tilgjengelige spesielt for denne visningen';
$lang['info_searchform_template'] = 'S&oslash;keskjemamaler viser et skjema for &aring; tillate s&oslash;king etter en bestemt bruker eller en brukergruppe. Her designer du m&aring;ten du vil at skjema skal vises. Du kan bruke all smartylogikk eller variabler som fra f&oslash;r har blitt designet, eller de som er gjort tilgjengelige spesielt for denne visningen';
$lang['info_searchform_templates_tab'] = 'Denne fanen inneholder listen med tilgjengelige s&oslash;keskjemamaler. En av disse er markert som standard. Den som er standard vil automatisk bli benyttet om det ikke et annet navn oppgis i taggen som kaller opp denne modulen';
$lang['info_summary_templates_tab'] = 'Denne fanen inneholder listen med tilgjengelige sammendragsmaler. En av dem er markert som standard. Den som er standard vil bli benyttet n&aring;r ikke et annet malnavn er eksplisitt angitt i taggen som kaller denne modulen';
$lang['info_sysdflt_browseprop_template'] = 'Systemstandard s&oslash;k-i-egenskap(Browse Property) visningsmal';
$lang['info_sysdflt_detail_template'] = 'Systemstandard detaljvisningsmal';
$lang['info_sysdflt_directory_template'] = 'Systemstandard katalogmal';
$lang['info_sysdflt_searchform_template'] = 'Systemstandard s&oslash;keskjemamal';
$lang['info_sysdflt_summary_template'] = 'Systemstandard sammendragsvisningsmal';
$lang['info_sysdflt_template'] = '&Aring; endre i denne mal vil ikke ha noen umiddelbar effekt p&aring; noen visning.  Dette skjema kontrollerer innholdet p&aring; malen som opprettes n&aring;r du klikker &quot;Ny mal&quot; i den aktuelle fanen.';
$lang['last_active'] = 'Siste aktive';
$lang['lbl_browseproptemplates'] = 'S&oslash;k-i-egenskap(Browse Property) maler';
$lang['lbl_defaulttemplates'] = 'Standard maler';
$lang['lbl_detailtemplates'] = 'Detaljvisnings maler';
$lang['lbl_directorytemplates'] = 'Katalogmaler';
$lang['lbl_first_page'] = 'G&aring; til f&oslash;rste siden';
$lang['lbl_last_page'] = 'G&aring; til siste siden';
$lang['lbl_next_page'] = 'G&aring; til neste side';
$lang['lbl_prev_page'] = 'G&aring; til forrige side';
$lang['lbl_searchformtemplates'] = 'S&oslash;keskjemamaler';
$lang['lbl_settings'] = 'Innstillinger';
$lang['lbl_summarytemplates'] = 'Sammendragsvisnings maler';
$lang['moddescription'] = 'En modul som tillater s&oslash;king, blaing og visning av detaljer om FrontEndUsers';
$lang['of'] = 'av';
$lang['page'] = 'Side';
$lang['postinstall'] = 'CGUserDirectory modulen er n&aring; klar for &aring; konfigureres';
$lang['postuninstall'] = 'CGUserdirectory modulen, og alle assosierte data har blitt avinstallert fra databasen';
$lang['results_all_any'] = 'Returner resultater som samsvarer med alle eller enhver av vilk&aring;rene spesifisert';
$lang['submit'] = 'Utf&oslash;r';
$lang['username'] = 'Brukernavn';
$lang['utmz'] = '156861353.1269284905.2536.55.utmcsr=forum.cmsmadesimple.org|utmccn=(referral)|utmcmd=referral|utmcct=/index.php';
$lang['utma'] = '156861353.179052623084110100.1210423577.1269722579.1269734421.2567';
$lang['qca'] = '1210971690-27308073-81952832';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>