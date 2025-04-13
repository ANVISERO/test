<?php
$lang['msg_changes'] = 'Изменения сохранены';
$lang['friendlyname'] = 'Каптча';
$lang['postinstall'] = 'Модуль Captcha успешно установлен. Проверьте, что-бы вебсервер имел права записи в папке картинок, находящейся в папке модуля Captcha.';
$lang['postuninstall'] = 'Модуль Captcha успешно удалён.';
$lang['really_uninstall'] = 'Вы действительно хотите удалить модуль Captcha? Другие модули могут зависеть от него.';
$lang['uninstalled'] = 'Модуль удалён.';
$lang['installed'] = 'Установлен модуль версии %s.';
$lang['upgraded'] = 'Модуль обновлён до версии %s.';
$lang['moddescription'] = 'Включить поддержку Captcha для других модулей.';
$lang['error'] = 'Ошибка!';
$lang['err_no_gd_support'] = 'Ваша инсталляция PHP не имеет поддержки графической библиотеки GD';
$lang['err_no_jpg_support'] = 'Ваша графическая библиотека GD не поддерживает формат JPG';
$lang['err_no_freetype_support'] = 'Ваша графическая библиотека GD не поддерживает FreeType';
$lang['admindescription'] = 'Настройки Captcha';
$lang['accessdenied'] = 'Доступ запрещён. Пожалуйста, проверьте ваши права.';
$lang['title_general'] = 'Общее';
$lang['title_cache'] = 'Кеш';
$lang['legend_pear'] = 'PEAR Captcha';
$lang['label_enable_pear'] = 'Включить PEAR Текст/Captcha (должен быть установлен, смотрите помощь Captcha)';
$lang['legend_active_lib'] = 'Активная библиотека';
$lang['label_captchalib_select'] = 'Используемая библиотека Captcha';
$lang['msg_active_lib_changed'] = 'Активная библиотека изменена на %s';
$lang['msg_no_changes'] = 'Без изменений';
$lang['msg_pear_enabled'] = 'Включена PEAR Текст/Captcha';
$lang['msg_pear_disabled'] = 'Выключена PEAR Текст/Captcha';
$lang['msg_pear_disable_while_selected'] = 'PEAR Captcha не может быть выключена пока используется. <br />Пожалуйста, выберите другую библиотеку Captcha для использования, перед выключением PEAR Captcha.';
$lang['msg_pear_unavailable'] = 'PEAR Текст/Captcha не доступна в данной системе, смотрите помощь по модулю Captcha';
$lang['legend_cache'] = 'Кеш';
$lang['label_clear_cache'] = 'Удалить все изображения в папке кеша';
$lang['msg_cache_overview'] = 'Количество файлов в кеше: %s';
$lang['cache_directory'] = 'Папка кеша';
$lang['msg_deleted_cache'] = 'Удалено %s файлов изображений из папки кеша';
$lang['msg_deleted_cache_single'] = 'Удалён 1 файл изображения из папки кеша';
$lang['legend_fonts'] = 'Шрифты';
$lang['label_font_path'] = 'Путь к шрифтам';
$lang['available_fonts'] = 'Доступные шрифты';
$lang['restore'] = 'Восстановить по умолчанию';
$lang['msg_restored_defaults'] = 'Восстановлены значения по умолчанию';
$lang['changelog'] = '<ul>
	<li>
		<p><b>Version 0.3.2</b></p>
		<ul>
			<li>Updated hn_captcha to version 1.5.0</li>
			<li>Added a simple GD based captcha that doesn\'t use Freetype</li>
		</ul>
	</li>
	<li>
		<p><b>Version 0.3.1</b> (calguy1000)</p>
		<ul>
                        <li>Now use the \'Modify Site Preferences\' Permission</p>
                        <li>Changed the cache directory to tmp/cache</li>
		</ul>
	</li>
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
			<li>Changes to make sure the captcha image is showed correctly when hn_captcha is used and $_SERVER[\'DOCUMENT_ROOT\'] is not set correctly.</li>
			<li>Removed support for the b2evo library. It is derived from hn_captcha and doesn\'t offer any extra functionality.</li>
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
</ul>';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>Enables captcha support for use in other modules.
See <a href=\\"http://www.wikipedia.org/wiki/Captcha\\">http://www.wikipedia.org/wiki/Captcha</a> for more information about Captcha challenge-response tests.
</p>
<p>
<strong>Your PHP version must have GD installed with support for JPEGs and TrueType fonts</strong>. For more information, see <a href=\\"http://www.php.net/image/\\">PHP Image Functions</a>.<br />
</p>
<h3>How Do I Use It?</h3>
<p>
This module is not for use directly on a page, it is a tool to be used by other modules. If you are a module developer and want to use Captcha in your module:
</p>
<p>
To show a captcha image:
<pre>
// create a reference to a Captcha module object
$captcha = &$this->getModuleInstance(\'Captcha\'); 
// show the captcha image
echo $captcha->getCaptcha();
</pre>
To check the user input:
<pre>
// create a reference to a Captcha module object
$captcha = &$this->getModuleInstance(\'Captcha\');
// check the user input (the checkCaptcha method will return TRUE if $input is correct, FALSE if $input is incorrect)
$validated = $captcha->checkCaptcha($input);
</pre>
</p>
<p>
Some implementation examples:<br />
<a href=\\"http://viewsvn.cmsmadesimple.org/viewsvn?rev=60&root=comments&view=rev\\" target=\\"_blank\\">Comments</a><br />
<a href=\\"http://viewsvn.cmsmadesimple.org/viewsvn?rev=101&root=frontendusers&view=rev\\" target=\\"_blank\\">FrontEndUsers</a><br />
<a href=\\"http://viewsvn.cmsmadesimple.org/viewsvn?rev=145&root=gastbuch&view=rev\\" target=\\"_blank\\">Guestbook</a><br />
<a href=\\"http://viewsvn.cmsmadesimple.org/viewsvn?rev=40&root=questions&view=rev\\" target=\\"_blank\\">Questions</a><br />
</p>
<h3>PEAR Text/Captcha</h3>
<p>
This module can make use of PEAR\'s Text_CAPTCHA, which will have to be installed on the server.<br />
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
$lang['utma'] = '156861353.1443988646.1233819855.1250501567.1251381823.57';
$lang['utmz'] = '156861353.1244467062.46.14.utmcsr=merkle.ru|utmccn=(referral)|utmcmd=referral|utmcct=/admin/index.php';
$lang['qca'] = 'P0-1338893505-1250501566752';
$lang['utmb'] = '156861353.1.10.1251381823';
$lang['utmc'] = '156861353';
?>