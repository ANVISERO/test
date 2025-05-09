<?php

# CMSMS - CMS Made Simple
#
# (c)2004 by Ted Kulp (wishy@users.sf.net)
#
# This project's homepage is: http://cmsmadesimple.org
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

function smarty_cms_function_contact_form($params, &$smarty) {

    global $gCms;

    if (FALSE == empty($params['captcha']) && $params['captcha'] && isset($gCms->modules['Captcha'])) 
    {
        $captcha =& $gCms->modules['Captcha']['object'];
    }

	if (empty($params['email'])){
		echo '<div class="formError">An email address must be specified in order to use this plugin.</div>';
		return;
	}else{
		$to = $params['email'];
	}
	
	$style = true; // Use default styles
	if (FALSE == empty($params['style']) && $params['style'] === "false" ) $style = false; // Except if "false" given in params
	
	// Default styles
	$inputStyle = 'style="width:100%;border: 1px solid black; margin:0 0 1em 0;"'; // input boxes
	$taStyle = 'style="width:100%; border: 1px solid black; margin:0 0 1em 0;"'; // TextArea boxes
	$formStyle = 'style="width:30em; important; font-weight: bold;"'; // form
	$errorsStyle = 'style="color: white; background-color: red; font-weight: bold; border: 3px solid black; margin: 1em;"'; // Errors box (div)
        $labelStyle = 'style="display:block;"';
        $buttonStyle = 'style="float:left; width:50%;"';
        $fieldsetStyle = 'style="padding:1em;"';
        $captchaStyle = 'style="margin-bottom:1em; text-align: center;"';

	$errors=$name=$email=$subject=$message = '';
	if (FALSE == empty($params['subject_get_var']) && FALSE == empty($_GET[$params['subject_get_var']]))
	  {
	    $subject = $_GET[$params['subject_get_var']];
	  }
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if (!empty($_POST['name'])) $name = cfSanitize($_POST['name']);
		if (!empty($_POST['email'])) $email = cfSanitize($_POST['email']);
		if (!empty($_POST['subject'])) $subject = cfSanitize($_POST['subject']);
		if (!empty($_POST['message'])) $message = $_POST['message'];
		if (FALSE == empty($params['captcha']) && $params['captcha'] && isset($gCms->modules['Captcha'])) 
		{
		    if (!empty($_POST['captcha_resp'])) { $captcha_resp = $_POST['captcha_resp']; }
		}

		//Mail headers
		$extra = "From: $name <$email>\r\n";
		$charset = isset($gCms->config['default_encoding']) && $gCms->config['default_encoding'] != '' ? $gCms->config['default_encoding'] : 'utf-8';
		$extra .= "Content-Type: text/plain; charset=" . $charset . "\r\n";
		
		if (empty($name)) $errors .= "\t\t<li>" . 'Please Enter Your Name' . "</li>\n";
		if (empty($email)) $errors .= "\t\t<li>" . 'Please Enter Your Email Address' . "</li>\n";
		elseif (!validEmail($email)) $errors .= "\t\t<li>" . 'Your Email Address is Not Valid' . "</li>\n";
		if (empty($subject)) $errors .= "\t\t<li>" . 'Please Enter a Subject' . "</li>\n";
		if (empty($message)) $errors .= "\t\t<li>" . 'Please Enter a Message' . "</li>\n";
		if (FALSE == empty($params['captcha']) && $params['captcha'] && isset($gCms->modules['Captcha']))
		{
		    if (empty($captcha_resp)) $errors .= "\t\t<li>" . 'Please enter the text in the image' . "</li>\n";
		    elseif (! ($captcha->checkCaptcha($captcha_resp))) $errors .= "\t\t<li>" . 'The text from the image was not entered correctly' . "</li>\n";
		}
		
		if (!empty($errors)) {
			echo '<div class="formError" ' . (($style) ? $errorsStyle:'') . '>' . "\n";
			echo '<p>Error(s) : </p>' . "\n";
			echo "\t<ul>\n";
			echo $errors;
			echo "\t</ul>\n";
			echo "</div>";
		}
		elseif (@mail($to, $subject, $message . "\n\nsender: ".$_SERVER["REMOTE_ADDR"] . ', ' . $_SERVER["HTTP_USER_AGENT"] , $extra)) {
			echo '<div class="formMessage">Your message was successfully sent.</div>' . "\n";
			return;
		}
		else {
			echo '<div class="formError" ' . (($style) ? $errorsStyle:'') . '>Sorry, the message was not sent. The server may be down!</div>' . "\n";
			return;
		}
	}

    if (isset($_SERVER['REQUEST_URI'])) 
    {
	$action = $_SERVER['REQUEST_URI'];
    }
    else
    {
	$action = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : '';
	if (isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != '') 
	{
	    $action .= '?'.$_SERVER['QUERY_STRING'];
	}
    }
?>

	<!-- CONTACT_FORM -->
	<form action="<?php echo $action ?>" method="post" <?php echo ($style) ? $formStyle:''; ?>>
                 <fieldset <?php echo ($style) ? $fieldsetStyle:''; ?>>
                        <legend>Форма обратной связи</legend>
			<label for="name" <?php echo ($style) ? $labelStyle:''; ?> >Ваше имя:</label>
			<input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" <?php echo ($style) ? $inputStyle:''; ?>/>

			<label for="email" <?php echo ($style) ? $labelStyle:''; ?> >Ваш е-мейл : </label>
			<input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" <?php echo ($style) ? $inputStyle:''; ?>/>

			<label for="subject" <?php echo ($style) ? $labelStyle:''; ?> >Тема письма : </label>
			<input type="text" id="subject" name="subject" value="<?php echo htmlspecialchars($subject); ?>" <?php echo ($style) ? $inputStyle:''; ?>/>

			<label for="message" <?php echo ($style) ? $labelStyle:''; ?> >Текст : </label>
			<textarea id="message" name="message" rows="12" cols="48" <?php echo ($style) ? $taStyle:''; ?>><?php echo $message; ?></textarea>

<?php
if (FALSE == empty($params['captcha']) && $params['captcha'] && isset($gCms->modules['Captcha'])) 
{
?>
			<label for="captcha_resp" <?php echo ($style) ? $labelStyle:''; ?> >Введите символы с картинки ниже : </label>
			<input type="text" id="captcha_resp" name="captcha_resp" value="" <?php echo ($style) ? $inputStyle:''; ?>/>

<?php
    echo "<div $captchaStyle>" . $captcha->getCaptcha() . '</div>';
}
?>

		        <input type="submit" class="button" value="Отправить" <?php echo ($style) ? $buttonStyle: ''; ?> /> 
                        <input type="reset"  class="button" value="Очистить" <?php echo ($style) ? $buttonStyle: ''; ?> />
                 </fieldset>
	</form>
	<!-- END of CONTACT_FORM -->

<?php
}

function smarty_cms_help_function_contact_form() {
{
?>

	<h3>What does this do?</h3>
	<p>Display's a contact form. This can be used to allow others to send an email message to the address specified.</p>
	<h3>How do I use it?</h3>
	<p>Just insert the tag into your template/page like: <code>{contact_form email="yourname@yourdomain.com"}</code><br />
	<br>
	If you would like to send an email to multiple adresses, seperate each address with a comma.</p>
	<h3>What parameters does it take?</h3>
	<ul>
		<li><tt>email</tt> - The email address that the message will be sent to.</li>
		<li><em>(optional)</em> <tt>style</tt> - true/false, use the predefined styles. Default is true.</li>
		<li><em>(optional)</em> <tt>subject_get_var</tt> - string, allows you to specify which _GET var to use as the default value for subject.
		<p>Example:</p>
		<code>{contact_form email="yourname@yourdomain.com" subject_get_var="subject"}</code>
		<p>Then call the page with the form on it like this: /index.php?page=contact&subject=test+subject</p>
		<p>And the following will appear in the "Subject" box: "test subject"</p>
		</li>
		<li><em>(optional)</em> <tt>captcha</tt> - true/false, use Captcha response test (Captcha module must be installed). Default is false.</li>
	</ul>
	</p>


<?php
}}

function smarty_cms_about_function_contact_form() {
	?>
	<p>Author: Brett Batie &lt;brett-cms@classicwebdevelopment.com&gt; &amp; Simon van der Linden &lt;ifmy@geekbox.be&gt;</p>
	<p>Version: 1.5</p>
	<p>
	Change History:<br />
        <ul>
        <li>l.2 : various improvements (errors handling, etc.)</li>
        <li>1.3 : added subject_get_var parameter (by elijahlofgren)</li>
        <li>1.4 : added captcha module support (by Dick Ittmann)</li>
        <li>1.5 : no real change - the tag will be no longer a part of default CMSms install, so he got an own project</li>
        </ul>
	</p>
	<?php
}

function cfsanitize($content){
	return str_replace(array("\r", "\n"), "", trim($content));
}

function validEmail($email) {
	if (!preg_match("/^([\w|\.|\-|_]+)@([\w||\-|_]+)\.([\w|\.|\-|_]+)$/i", $email)) {
		return false;
		exit;
	}
	return true;
}

?>
