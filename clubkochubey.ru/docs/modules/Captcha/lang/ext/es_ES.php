<?php
$lang['friendlyname'] = 'Captcha ';
$lang['postinstall'] = 'El m&oacute;dulo Captcha se instal&oacute; con &eacute;xito. Controle que el servidor tenga puesto los permisos de escribir habilitados para el directorio images/captchas dentro del &aacute;rbol de archivos dentro del directorio del m&oacute;dulo Captcha';
$lang['postuninstall'] = 'Se ha desinstalado el m&oacute;dulo Captcha con &eacute;xito.';
$lang['really_uninstall'] = '&iquest;Esta seguro que quiere desinstalar el m&oacute;dulo Captcha? Otros m&oacute;dulos pueden estar us&aacute;ndolo.';
$lang['uninstalled'] = 'El m&oacute;dulo se desinstal&oacute;.';
$lang['installed'] = 'Se instal&oacute; la versi&oacute;n %s del m&oacute;dulo.';
$lang['upgraded'] = 'El m&oacute;dulo se actualiz&oacute; a la versi&oacute;n %s.';
$lang['moddescription'] = 'Habilita el soporte de captcha para el uso por otros m&oacute;dulos.';
$lang['error'] = '&iexcl;Error!';
$lang['err_no_gd_support'] = 'Su instalaci&oacute;n de PHP no tiene soporte para GD';
$lang['err_no_jpg_support'] = 'Su librer&iacute;a GD no tiene soporte para JPG';
$lang['err_no_freetype_support'] = 'Su librer&iacute;a GD no tiene soporte para FreeType';
$lang['admindescription'] = 'Configuraciones de Captcha';
$lang['accessdenied'] = 'Acceso Denegado. Por favor chequear sus permisos.';
$lang['title_general'] = 'General ';
$lang['title_cache'] = 'Cache ';
$lang['legend_pear'] = 'PEAR Captcha ';
$lang['label_enable_pear'] = 'Habilita PEAR Texto/Captcha (debe estar instalado, ver la ayuda del m&oacute;dulo Captcha)';
$lang['legend_active_lib'] = 'Librer&iacute;a activa';
$lang['label_captchalib_select'] = 'Librer&iacute;a Captcha a usar';
$lang['msg_active_lib_changed'] = 'Librer&iacute;a activa se cambi&oacute; a %s';
$lang['msg_no_changes'] = 'Sin cambios';
$lang['msg_pear_enabled'] = 'Se habilit&oacute; PEAR Texto/Captcha';
$lang['msg_pear_disabled'] = 'Se deshabilit&oacute; PEAR Texto/Captcha';
$lang['msg_pear_disable_while_selected'] = 'PEAR Captcha no se puede deshabilitar mientras est&aacute; en uso. <br />Por favor elija otra librer&iacute;a Captcha para usar antes de deshabilitar PEAR Captcha.';
$lang['msg_pear_unavailable'] = 'PEAR Texto/Captcha no est&aacute; habilitado en este sistema, vea la ayuda del m&oacute;dulo Captcha';
$lang['legend_cache'] = 'Cache ';
$lang['label_clear_cache'] = 'Eliminar todas las imagenes en el directorio cache';
$lang['msg_cache_overview'] = 'N&uacute;mero de archivos de imagenes en el directorio cache: %s';
$lang['cache_directory'] = 'Directorio cache';
$lang['msg_deleted_cache'] = 'Eliminados %s archivos de im&aacute;genes del directorio cache';
$lang['msg_deleted_cache_single'] = 'Eliminado 1 archivo de imagen del directorio cache';
$lang['legend_fonts'] = 'Fuentes';
$lang['label_font_path'] = 'Paso de fuentes';
$lang['available_fonts'] = 'Fuentes disponibles';
$lang['restore'] = 'Restaurar a valores por defecto';
$lang['msg_restored_defaults'] = 'Restaurados valores por defecto';
$lang['changelog'] = '<ul>
	<li>
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
$lang['help'] = '<h3>&iquest;Qu&eacute; Hace Esto?</h3>
<p>Habilita el soporte de captcha para su uso en otros m&oacute;dulos.
Vea <a href=&quot;http://www.wikipedia.org/wiki/Captcha&quot;>http://www.wikipedia.org/wiki/Captcha</a> por m&aacute;s informaci&oacute;n respecto a pruebas de respuesta de Captcha.
</p>
<p>
<strong>Su versi&oacute;n de PHP debe tener instalado a GD con soporte para gr&aacute;ficos JPEGs y fuentes TrueType</strong>. Por mayor informaci&oacute;n, ver <a href=&quot;http://www.php.net/image/&quot;>Funciones de Imagen PHP</a>.<br />
</p>
<h3>&iquest;C&oacute;mo lo Uso?</h3>
<p>
Este m&oacute;dulo no es como en otros casos para usar directamente en su p&aacute;gina, es una herramienta para ser usada por otros m&oacute;dulos. Si usted es un programador y desea usar el m&oacute;dulo Captcha en su m&oacute;dulo:
</p>
<p>
Para mostrar una imagen captcha:
<pre>
// crear una referencia a un objeto del m&oacute;dulo Captcha
$captcha = &amp;$this->getModuleInstance(&#039;Captcha&#039;);
// mostrar la imagen de captcha
echo $captcha->getCaptcha();
</pre>
Para chequear lo entrado por el usuario:
<pre>
// crear una referencia a un objeto del m&oacute;dulo Captcha
$captcha = &amp;$this->getModuleInstance(&#039;Captcha&#039;);
// controlar lo entrado por el usuario (el m&eacute;todo checkCaptcha devolver&aacute; un TRUE si $input es correcto, FALSE si $input es incorrecto)
$validated = $captcha->checkCaptcha($input);
</pre>
</p>
<p>
Algunos ejemplos de implementaci&oacute;n:<br />
<a href=&quot;http://viewsvn.cmsmadesimple.org/viewsvn?rev=60&amp;root=comments&amp;view=rev&quot; target=&quot;_blank&quot;>Comentarios</a><br />
<a href=&quot;http://viewsvn.cmsmadesimple.org/viewsvn?rev=101&amp;root=frontendusers&amp;view=rev&quot; target=&quot;_blank&quot;>Usuarios del Portal</a><br />
<a href=&quot;http://viewsvn.cmsmadesimple.org/viewsvn?rev=145&amp;root=gastbuch&amp;view=rev&quot; target=&quot;_blank&quot;>Libro de Visitas</a><br />
<a href=&quot;http://viewsvn.cmsmadesimple.org/viewsvn?rev=40&amp;root=questions&amp;view=rev&quot; target=&quot;_blank&quot;>Preguntas</a><br />
</p>
<h3>PEAR Texto/Captcha</h3>
<p>
Este m&oacute;dulo puede hacer uso del paquete de PEAR Text_CAPTCHA, el cual deber&aacute; estar instalado en el servidor.<br />
Text_CAPTCHA depende de dos paquetes m&aacute;s de PEAR, Image_Text y Text_Password. Con Text_Password genera la frase aleatoria usada en la prueba de CAPTCHA e Image_Text genera un archivo de imagen con el texto dentro de ella.<br />
El proceso para instalar Text_CAPTCHA en la l&iacute;nea de comando es:<br />
<pre>
$ pear install Text_Password
$ pear install Image_Text
$ pear install --alldeps Text_CAPTCHA
</pre>
</p>
<h3>permisos del servidor Web</h3>
<p>
El proceso del servidor web debe tener permiso de escritura en el directorio cache de las im&aacute;genes Captcha (es el directorio images/captchas dentro del &aacute;rbol de archivos del m&oacute;dulo Captcha).<br />
En algunos servidores (dependiendo siempre de su configuraci&oacute;n) la configuraci&oacute;n umask en las Configuraciones Globales de CMS Made Simple  deber&aacute; ser cambiada; trate de hacerlo poniendo 002 en reemplazo de 022 si las im&aacute;genes captcha son creadas pero no mostradas.
</p>';
$lang['utmz'] = '156861353.1201828397.299.82.utmccn=(organic)|utmcsr=google|utmctr=cmsms pretty urls|utmcmd=organic';
$lang['utma'] = '156861353.1283190177.1192572809.1201828397.1203632329.300';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>