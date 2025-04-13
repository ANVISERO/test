<?php
$lang['project'] = 'Captcha ';
$lang['msg_changes'] = 'Modifications effectu&eacute;es';
$lang['friendlyname'] = 'Captcha ';
$lang['postinstall'] = 'Le module Captcha a &eacute;t&eacute; install&eacute; avec succ&egrave;s.';
$lang['postuninstall'] = 'Le module Captcha a &eacute;t&eacute; d&eacute;sinstall&eacute; avec succ&egrave;s';
$lang['really_uninstall'] = '&Ecirc;tes-vous s&ucirc;r de vouloir d&eacute;sinstaller le module Captcha ? D&#039;autres modules l&#039;utilisent peut-&ecirc;tre.';
$lang['uninstalled'] = 'Module d&eacute;sinstall&eacute;.';
$lang['installed'] = 'La version %s du module a &eacute;t&eacute; install&eacute;e.';
$lang['upgraded'] = 'Module mis &agrave; jour &agrave; la version %s.';
$lang['moddescription'] = 'Active le support Captcha pour l&#039;utiliser avec d&#039;autres modules.';
$lang['error'] = 'Erreur&nbsp;!';
$lang['err_no_gd_support'] = 'Votre installation PHP ne supporte pas la librairie GD';
$lang['err_no_jpg_support'] = 'La librairie GD ne supporte pas JPG';
$lang['err_no_freetype_support'] = 'La librairie GD ne supporte pas FreeType';
$lang['admindescription'] = 'Param&egrave;tres de Captcha';
$lang['accessdenied'] = 'Acc&egrave;s refus&eacute;. Veuillez v&eacute;rifier les permissions.';
$lang['title_general'] = 'G&eacute;n&eacute;ral';
$lang['title_cache'] = 'Cache&nbsp;';
$lang['legend_pear'] = 'PEAR Captcha&nbsp;';
$lang['label_enable_pear'] = 'Activer PEAR Text/Captcha (doit &ecirc;tre install&eacute;e, se r&eacute;f&eacute;rer &agrave; l&#039;aide du module Captcha)';
$lang['legend_active_lib'] = 'Librairie active';
$lang['label_captchalib_select'] = 'Librairie Captcha &agrave; utiliser&nbsp;';
$lang['msg_active_lib_changed'] = 'Librairie active modifi&eacute;e&nbsp;: %s';
$lang['msg_no_changes'] = 'Aucun changement';
$lang['msg_pear_enabled'] = 'PEAR Text/Captcha activ&eacute;';
$lang['msg_pear_disabled'] = 'PEAR Text/Captcha d&eacute;sactiv&eacute;';
$lang['msg_pear_disable_while_selected'] = 'PEAR Captcha ne peut pas &ecirc;tre d&eacute;sactiv&eacute; lorsqu&#039;il est utilis&eacute;. <br />Veuillez s&eacute;lectionner une autre librairie Captcha &agrave; utiliser avant de d&eacute;sactiver PEAR Captcha.';
$lang['msg_pear_unavailable'] = 'PEAR n&#039;est pas disponible sur ce syst&egrave;me, veuillez consulter l&#039;aide de Captcha';
$lang['legend_cache'] = 'Cache&nbsp;';
$lang['label_clear_cache'] = 'Supprimer toutes les images dans le r&eacute;pertoire du cache';
$lang['msg_cache_overview'] = 'Nombre d&#039;images dans le r&eacute;pertoire du cache&nbsp;: %s';
$lang['cache_directory'] = 'Dossier du cache&nbsp;';
$lang['msg_deleted_cache'] = '%s fichiers image supprim&eacute;s dans le r&eacute;pertoire du cache';
$lang['msg_deleted_cache_single'] = 'Un fichier image supprim&eacute; dans le r&eacute;pertoire du cache';
$lang['legend_fonts'] = 'Polices de caract&egrave;res';
$lang['label_font_path'] = 'Chemin des polices';
$lang['available_fonts'] = 'Polices de caract&egrave;res disponibles';
$lang['restore'] = 'Restaurer les param&egrave;tres par d&eacute;faut';
$lang['msg_restored_defaults'] = 'Param&egrave;tres par d&eacute;faut restaur&eacute;s ';
$lang['changelog'] = '<ul>
<li>
  <p><b>Version 0.4.2</b> - (calguy1000)</p>
  <ul>
    <li>Fixes a minor notice or two due to changes in PHP behaviour.</li>
  </ul>
</li>
<li>
  <p><b>Version 0.4.1</b> - (calguy1000)</p>
  <ul>
    <li>Fixes minor validation issues, and irritating bugs.</li>
  </ul>
</li>

	<li>
		<b>Version 0.3.2</b> (calguy1000)
		<ul>
		<li>Mise &agrave; jour hn_captcha version 1.5.0</li>
		<li>Ajout de captcha simple bas&eacute;e sur la lib. GD et n&#039;utilisant pas Freetype</li>
		</ul>
<br />
		<b>Version 0.3.1</b> (calguy1000)
		<ul>
                        <li>Utilise maintenant la permission &quot;Modify Site Preferences&quot;</li>
                        <li>Modifi&eacute; le dossier cache en tmp/cache</li>
		</ul>
	</li>
	<li><br />
		<b>Version 0.3</b>
		<ul>
		<li>Modifi&eacute; de hn_captcha &agrave; hn_captcha_X1 qui a la collection &quot;garbage&quot;</li>
		<li>Ajout du support pour la librairie PhpCaptcha</li>
		<li>Les param&egrave;tres sp&eacute;cifiques de la librairie Captcha peuvent maintenant &ecirc;tre g&eacute;r&eacute;s depuis l&#039;administration du module</li>
		<li>Les librairies Captcha se chargent automatiquement depuis les fichiers de classes disponibles</li>
		<li>Les librairies Captcha ne se chargent que lorsqu&#039;elles sont utiles</li>
		</ul>
	</li>
	<li><br />
		<b>Version 0.2.1</b>
		<ul>
			<li>Correction de l&#039;utilisation de la fonction PHP parse_url de telle mani&egrave;re qu&#039;elle ne fonctionne qu&#039;avec PHP5</li>
		</ul>
	</li>
	<li>
		<p><b>Version 0.2</b></p>
		<ul>
			<li>Corrige un probl&egrave;me qui faisait que l&#039;image Captcha ne s&#039;affichait pas dans certains cas sur les serveurs Windows</li>
			<li>Modification pour s&#039;assurer que l&#039;image captcha est affich&eacute;e correctement quand hn_captcha est utilis&eacute;e et que $_SERVER[&#039;DOCUMENT_ROOT&#039;] n&#039;est pas d&eacute;fini correctement.</li>
			<li>Suppression du support de la librairie b2evo.  C&#039;est un d&eacute;riv&eacute; de hn_captcha et n&#039;offre pas de fonctionnalit&eacute; suppl&eacute;mentaire.</li>
			<li>Utilise une version non-modifi&eacute;e de la librairie hn_captcha (&agrave; part quelques corrections orthographiques).</li>
		</ul>
	</li>
	<li>
		<p><b>Version 0.1.1</b></p>
		<ul>
			<li>&Eacute;vite un avertissement qui se produit si allow_call_time_pass_reference est d&eacute;fini en false dans php.ini.</li>
		</ul>
	</li>
	<li>
<p><b>Version 0.1. 10 Juillet 2006</b></p>
		<ul>
			<li>Version initiale.</li>
		</ul>
	</li>
</ul>';
$lang['help'] = '<h3>Que fait ce module ?</h3>
<p>Ce module active le support Captcha pour les autres modules.
Voir <a href="http://www.wikipedia.org/wiki/Captcha" target="_blank">http://www.wikipedia.org/wiki/Captcha</a> pour plus d&#039;information &agrave; propos des tests Captcha.
</p>
<p>Votre PHP devrait avoir la librairie GD install&eacute;e avec support pour les JPEGs et les polices TrueType. Pour plus d&#039;information, visitez <a href="http://www.php.net/image/" target="_blank">Fonctions image PHP</a>.<br />
</p>
<h3>Comment l&#039;utiliser ?</h3>
<p>
Ce module n&#039;est pas destin&eacute; &agrave; l&#039;usage direct dans une page, c&#039;est un outil utilis&eacute; par d&#039;autres modules. Si vous &ecirc;tes un d&eacute;veloppeur de module et d&eacute;sirez utiliser Captcha dans votre module&nbsp;:
</p>
<p>
Pour afficher une image Captcha&nbsp;:
<pre>
// cr&eacute;e une r&eacute;f&eacute;rence au module objet Captcha
$captcha = &amp;$this->getModuleInstance(&#039;Captcha&#039;); 

// affiche l&#039;image Captcha
echo $captcha->active_lib->getCaptcha();
</pre>
V&eacute;rification de l&#039;entr&eacute;e de l&#039;utilisateur&nbsp;:
<pre>
// cr&eacute;e une r&eacute;f&eacute;rence au module objet Captcha
$captcha = &amp;$this->getModuleInstance(&#039;Captcha&#039;);

// V&eacute;rifie l&#039;entr&eacute;e de l&#039;utilisateur (retourne TRUE si $input est correct, FALSE si $input est incorrect)
$captcha->active_lib->checkCaptcha($input);

</pre>
</p>
<p>
Quelques exemples d&#039;impl&eacute;mentation&nbsp;:<br />
<a href="http://viewsvn.cmsmadesimple.org/listing.php?repname=comments" target="_blank">Module Commentaires (Comments)</a><br />
<a href="http://viewsvn.cmsmadesimple.org/listing.php?repname=comments" target="_blank">FrontEndUsers</a><br />
<a href="http://viewsvn.cmsmadesimple.org/listing.php?repname=comments" target="_blank">Module Livre d&#039;Or (Guestbook)</a><br />
<a href="http://viewsvn.cmsmadesimple.org/listing.php?repname=questions" target="_blank">Module Questions (Questions)</a><br />
</p>
<h3>PEAR Texte/Captcha</h3>
<p>
Ce module peut utiliser Text_CAPTCHA de PEAR, qui doit &ecirc;tre install&eacute; sur le serveur.<br />
Text_CAPTCHA d&eacute;pend de deux autres paquets PEAR&nbsp;: Image_Text et Text_Password. Il utilise Text_Password pour g&eacute;n&eacute;rer une phrase au hasard, utilis&eacute;e dans le test CAPTCHA et Image_Text pour g&eacute;n&eacute;rer une image avec ce texte.<br />
Le processus d&#039;installation de Text_CAPTCHA en ligne de commande est&nbsp;:<br />
<pre>
$ pear install Text_Password
$ pear install Image_Text
$ pear install --alldeps Text_CAPTCHA
</pre>
</p>
<h3>Permissions du serveur web</h3>
<p>
Les processus du serveur doivent avoir l&#039;acc&egrave;s en &eacute;criture dans le r&eacute;pertoire de cache d&#039;images de Captcha (r&eacute;pertoire images/captchas dans l&#039;arborescence du module Captcha)<br />.(modifi&eacute; en tmp/cache depuis la version 3.1)
Sur certains serveurs (cela d&eacute;pend des param&egrave;tres du serveur) le param&egrave;tre umask (dans les param&egrave;tres globaux de CMS Made Simple) peut devoir &ecirc;tre chang&eacute; ; essayez de le changer de 022 &agrave; 002 si les images sont cr&eacute;&eacute;es mais non affich&eacute;es.</p>';
$lang['utma'] = '156861353.2127550232.1280235009.1280235009.1280235009.1';
$lang['utmc'] = '156861353';
$lang['utmz'] = '156861353.1280235009.1.1.utmccn=(direct)|utmcsr=(direct)|utmcmd=(none)';
$lang['utmb'] = '156861353';
?>