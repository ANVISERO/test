<?php
$lang['friendlyname'] = 'Captcha ';
$lang['postinstall'] = 'Il modul captcha è vegnì installà cun success. ';
$lang['postuninstall'] = 'Il modul captcha è vegnì deinstallà cun success.';
$lang['really_uninstall'] = 'Es ti segir che ti vuls deinstallar il modul Captcha? Auters moduls fan eventualmain diever da quel. ';
$lang['uninstalled'] = 'Deinstallà il modul. ';
$lang['installed'] = 'Installà la versiun %s dal mudul. ';
$lang['upgraded'] = 'Actualisà il modul a la versiun %s.';
$lang['moddescription'] = 'Enables captcha support for use by other modules.';
$lang['error'] = 'Sbagl!';
$lang['err_no_gd_support'] = 'Your PHP installation does not have GD support';
$lang['err_no_jpg_support'] = 'Your GD library does not have JPG support';
$lang['err_no_freetype_support'] = 'Your GD library does not have FreeType support';
$lang['admindescription'] = 'Captcha settings';
$lang['accessdenied'] = 'Access Denied. Please check your permissions.';
$lang['title_general'] = 'General ';
$lang['title_cache'] = 'Cache ';
$lang['legend_pear'] = 'PEAR Captcha';
$lang['label_enable_pear'] = 'Enable PEAR Text/Captcha (must be installed, see the Captcha module help)';
$lang['legend_active_lib'] = 'Biblioteca activa';
$lang['label_captchalib_select'] = 'Utilisar suandanta biblioteca';
$lang['msg_active_lib_changed'] = 'Tschernì %s sco biblioteca activa';
$lang['msg_no_changes'] = 'No changes';
$lang['msg_pear_enabled'] = 'Enabled PEAR Text/Captcha';
$lang['msg_pear_disabled'] = 'Disabled PEAR Text/Captcha';
$lang['msg_pear_disable_while_selected'] = 'PEAR Captcha cannot be disabled while it is being used. <br />Please select another Captcha library to use before disabling PEAR Captcha.';
$lang['msg_pear_unavailable'] = 'PEAR Text/Captcha is not available on this system, check the Captcha module help';
$lang['legend_cache'] = 'Cache ';
$lang['label_clear_cache'] = 'Stidar tut ils maletgs en l\'ordinatur da cache';
$lang['msg_cache_overview'] = 'Number of image files in the cache directory: %s';
$lang['cache_directory'] = 'Ordinatur da cache';
$lang['msg_deleted_cache'] = 'Deleted %s image files from the cache directory';
$lang['msg_deleted_cache_single'] = 'Deleted 1 image file from the cache directory';
$lang['legend_fonts'] = 'Scrittiras';
$lang['label_font_path'] = 'Decurs a las scrittiras';
$lang['available_fonts'] = 'Scrittiras che stattan a disposiziun';
$lang['restore'] = 'Restore to defaults';
$lang['msg_restored_defaults'] = 'Restored values to defaults';
$lang['changelog'] = '<ul>
	<li>
		<p><b>Version 0.3.1</b> (calguy1000)</p>
		<ul>
                        <li>Now use the \'Modify Site Preferences\' Permission</p>
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
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=60&root=comments&view=rev" target="_blank">Comments</a><br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=101&root=frontendusers&view=rev" target="_blank">FrontEndUsers</a><br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=145&root=gastbuch&view=rev" target="_blank">Guestbook</a><br />
<a href="http://viewsvn.cmsmadesimple.org/viewsvn?rev=40&root=questions&view=rev" target="_blank">Questions</a><br />
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
$lang['utmz'] = '156861353.1219008274.1.1.utmccn=(direct)|utmcsr=(direct)|utmcmd=(none)';
$lang['utma'] = '156861353.578823098.1219008274.1219008274.1219049006.2';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>