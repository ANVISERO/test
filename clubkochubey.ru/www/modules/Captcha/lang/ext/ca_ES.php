<?php
$lang['msg_changes'] = 'Canvis desats';
$lang['friendlyname'] = 'Captcha';
$lang['postinstall'] = 'El m&ograve;dul Captcha s&#039;ha instal.lat correctament. Assegura&#039;t que el servidor web t&eacute; permisos d&#039;escriptura al directori d&#039;imatges/captas dins de l&#039;arbre del m&ograve;dul Captca';
$lang['postuninstall'] = 'M&ograve;dul Captcha desinstal.lat correctament';
$lang['really_uninstall'] = 'N&#039;est&agrave;s segur que vols desinstal.lar el m&ograve;dul Captcha? Hi ha altres m&ograve;duls que potser en depenen.';
$lang['uninstalled'] = 'M&ograve;dul desinstal.lat';
$lang['installed'] = 'Versi&oacute; %s del m&ograve;dul instal.lada.';
$lang['upgraded'] = 'M&ograve;dul actualitzata la versi&oacute; %s.';
$lang['moddescription'] = 'Habilita el suport captcha per tal de ser utilitzat per altres m&ograve;duls';
$lang['error'] = 'Error!';
$lang['err_no_gd_support'] = 'La teva instal.laci&oacute; de PHP no incorpora suport per GD';
$lang['err_no_jpg_support'] = 'La llibreria GD instal.lada no incorpora suport per jpg';
$lang['err_no_freetype_support'] = 'La llibreria GD no incorpora suport per FreeType';
$lang['admindescription'] = 'Configuraci&oacute; de Captcha';
$lang['accessdenied'] = 'Acc&eacute;s denegat. Revisa els permisos';
$lang['title_general'] = 'General';
$lang['title_cache'] = 'Mem&ograve;ria cau';
$lang['legend_pear'] = 'PEAR Captcha';
$lang['label_enable_pear'] = 'Habilita PEAR Text/Captcha (ha d&#039;estar instal.lat, veure l&#039;ajuda del m&ograve;dul Captcha)';
$lang['legend_active_lib'] = 'Llibreria activa';
$lang['label_captchalib_select'] = 'Llibreria Captcha a utilitzar';
$lang['msg_active_lib_changed'] = 'Llibreria activa canviada per %s';
$lang['msg_no_changes'] = 'Sense canvis';
$lang['msg_pear_enabled'] = 'PEAR Text/Captcha habilitat';
$lang['msg_pear_disabled'] = 'PEAR Text/Captcha deshabilitat';
$lang['msg_pear_disable_while_selected'] = 'PEAR Captcha no pot ser deshabilitat mentre est&agrave; essent utilitzat. <br />Si et plau, tria una altra llibreria Captcha per utilitzar abans de deshabilitar PEAR Captcha.';
$lang['msg_pear_unavailable'] = 'PEAR Text/Captcha no est  disponible, verifica l&#039;ajuda del m&ograve;dul Captcha';
$lang['legend_cache'] = 'Mem&ograve;ria cau';
$lang['label_clear_cache'] = 'Esborra totes les imatges del directori de mem&ograve;ria cau';
$lang['msg_cache_overview'] = 'Nombre d&#039;arxius d&#039;imatge al directori de mem&ograve;ria cau: %s';
$lang['cache_directory'] = 'Directori de mem&ograve;ria cau';
$lang['msg_deleted_cache'] = 'Esborrats %s arxius d&#039;imatge del directori de mem&ograve;ria cau';
$lang['msg_deleted_cache_single'] = 'Esborrat 1 arxiu d&#039;imatge del directori de mem&ograve;ria cau';
$lang['legend_fonts'] = 'Tipus de lletra';
$lang['label_font_path'] = 'directori de tipus de lletra';
$lang['available_fonts'] = 'Tipus de lletra disponibles';
$lang['restore'] = 'Restaura valors per defecte';
$lang['msg_restored_defaults'] = 'Valors per defecte restaurats';
$lang['changelog'] = '<ul>
	<li>
		<p><b>Version 0.3.1</b> (calguy1000)</p>
		<ul>
                        <li>Now use the &#039;Modify Site Preferences&#039; Permission</p>
                        <li>Changed the cache directory to tmp/cache</li>
		</ul>
		<p><b>Version 0.3</b></p>
		<ul>
			<li>Switched from hn_captcha to hn_captcha_X1 which has garbage collection</li>
			<li>Added support for the PhpCaptcha library</li>
			<li>Captcha library specific settings can now be managed from the module admin</li>
			<li>Captcha libraries are autoloaded from the available class files</li>
			<li>Captcha libraries are not loaded untill needed</li>
		</ul>
	</li>
	<li>
		<p><b>Version 0.2.1</b></p>
		<ul>
			<li>Fixes use of the PHP parse_url function in a way that only works on PHP5</li>
		</ul>
	</li>
	<li>
		<p><b>Version 0.2</b></p>
		<ul>
			<li>Fixes for issue with captcha image not showing up on windows servers in some cases.</li>
			<li>Changes to make sure the captcha image is showed correctly when hn_captcha is used and $_SERVER[&#039;DOCUMENT_ROOT&#039;] is not set correctly.</li>
			<li>Removed support for the b2evo library. It is derived from hn_captcha and doesn&#039;t offer any extra functionality.</li>
			<li>Use an unmodified version of the hn_captcha library (only kept some spelling fixes).</li>
		</ul>
	</li>
	<li>
		<p><b>Version 0.1.1</b></p>
		<ul>
			<li>Prevent a warning that occurs if allow_call_time_pass_reference is set to false in php.ini.</li>
		</ul>
	</li>
	<li>
		<p><b>Version 0.1</b></p>
		<ul>
			<li>Initial Release.</li>
		</ul>
	</li>
</ul>
';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>Enables captcha support for use in other modules.
See <a href="http://www.wikipedia.org/wiki/Captcha">http://www.wikipedia.org/wiki/Captcha</a> for more information about Captcha challenge-response tests.
</p>
<p>
<strong>Your PHP version must have GD installed with support for JPEGs and TrueType fonts</strong>. For more information, see <a href="http://www.php.net/image/">PHP Image Functions</a>.<br />
</p>
<h3>How Do I Use It?</h3>
<p>
This module is not for use directly on a page, it is a tool to be used by other modules. If you are a module developer and want to use Captcha in your module:
</p>
<p>
To show a captcha image:
<pre>
// create a reference to a Captcha module object
$captcha = &amp;$this->getModuleInstance(&#039;Captcha&#039;); 
// show the captcha image
echo $captcha->getCaptcha();
</pre>
To check the user input:
<pre>
// create a reference to a Captcha module object
$captcha = &amp;$this->getModuleInstance(&#039;Captcha&#039;);
// check the user input (the checkCaptcha method will return TRUE if $input is correct, FALSE if $input is incorrect)
$validated = $captcha->checkCaptcha($input);
</pre>
</p>
<p>
Some implementation examples:<br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=60&amp;root=comments&amp;view=rev" target="_blank">Comments</a><br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=101&amp;root=frontendusers&amp;view=rev" target="_blank">FrontEndUsers</a><br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=145&amp;root=gastbuch&amp;view=rev" target="_blank">Guestbook</a><br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=40&amp;root=questions&amp;view=rev" target="_blank">Questions</a><br />
</p>
<h3>PEAR Text/Captcha</h3>
<p>
This module can make use of PEAR&#039;s Text_CAPTCHA, which will have to be installed on the server.<br />
Text_CAPTCHA depends on two other PEAR packages, Image_Text and Text_Password. It uses Text_Password to generate the random phrase used in the CAPTCHA test and Image_Text to generate an image file with text in it.<br />
The process for installing Text_CAPTCHA at the command line is:<br />
<pre>
$ pear install Text_Password
$ pear install Image_Text
$ pear install --alldeps Text_CAPTCHA
</pre>
</p>
<h3>Webserver permissions</h3>
<p>
The webserver process must have write access on the Captcha image cache directory (the images/captchas directory inside the Captcha module filetree).<br />
On some servers (depending on server settings) the umask in the CMS Made Simple Global Settings may have to be changed; try changing it from 022 to 002 if the captcha images are created but not shown.
</p>
';
$lang['utma'] = '156861353.3109145977533247500.1225311312.1256902475.1256908322.42';
$lang['utmz'] = '156861353.1254088757.35.2.utmccn=(referral)|utmcsr=66.147.244.155|utmcct=/~clubcocc/cmsmadesimple/install/index.php|utmcmd=referral';
$lang['qca'] = 'P0-894451108-1250455823820';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>