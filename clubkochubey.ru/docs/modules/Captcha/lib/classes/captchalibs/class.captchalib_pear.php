<?php
/**
 * PEAR captcha library
 * @see class.captchalib.php
 * @see CaptchaLib
 * @package Captcha
*/

/**
 * Needs class.captchalib.php
*/
require_once cms_join_path(dirname(dirname(__FILE__)), 'class.captchalib.php');

if (!function_exists('file_put_contents')) {
    function file_put_contents($filename, $content) {
        if (!($file = fopen($filename, 'w'))) {
            return false;
        }
        $n = fwrite($file, $content);
        fclose($file);
        return $n ? $n : false;
    }
}

/**
 * @extends CaptchaLib
*/
class CaptchaLib_pear extends CaptchaLib
{
	/**
	* Class constructor
	*/
	function CaptchaLib_pear($cmsconfig)
	{
		// call the parent constructor
		$this->CaptchaLib('pear', 'PEAR Captcha', $cmsconfig);
		
		$this->AddOption(new CaptchaLibOption('font_size', 'int', '30'));
		$this->AddOption(new CaptchaLibOption('width'    , 'int', '150'));
		$this->AddOption(new CaptchaLibOption('height'   , 'int', '70'));
		$this->AddOption(new CaptchaLibOption('font'	 , 'string', 'FreeSerif.ttf'));
		$this->AddOption(new CaptchaLibOption('text_color'	 , 'string', '#DDFF99'));
		$this->AddOption(new CaptchaLibOption('lines_color'	 , 'string', '#CCEEDD'));
		$this->AddOption(new CaptchaLibOption('background_color'	 , 'string', '#555555'));
	}
	
	/**
	* Check availability of the PEAR Captcha library
	* Overrides the CaptchaLib->checkAvailability() method
	* @return bool
	*/
	function checkAvailability() {
		if (@include_once('Text/CAPTCHA.php'))
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	function createCaptchaImage($options)
	{
		$imageOptions = array(
			'font_size' => $options['font_size'],
			'font_path' => $this->getFontPath() . DIRECTORY_SEPARATOR,
			'font_file' => $options['font'],
			'text_color' => $options['text_color'],
			'lines_color' => $options['lines_color'],
			'background_color' => $options['background_color']
		);

		$options = array(
			'width' => (int) $options['width'],
			'height' => (int) $options['height'],
			'output' => 'jpeg',
			'imageOptions' => $imageOptions
		);

		$retval = $this->object->init($options);
		if (PEAR::isError($retval)) {
			printf('Error initializing CAPTCHA: %s!', $retval->getMessage());
			exit;
    }

		$_SESSION['captcha_phrase'] = $this->object->getPhrase();

    $image_data = $this->object->getCAPTCHA();
    if (PEAR::isError($image_data)) {
        printf('Error generating CAPTCHA: %s!',
            $image_data->getMessage());
        exit;
    }

		file_put_contents(cms_join_path($this->getImagePath(), md5(session_id()) . '.jpg'), $image_data);

	}
	
	/**
	* Sets the session variable and returns the HTML to show the captcha
	*/
	function getCaptcha($options = array()) 
	{
		session_start();

		$this->load();
	
		$this->createCaptchaImage($options);
	
		return ('<img src="' . $this->getImageUrl() . '/'. md5(session_id()) . '.jpg?' . time() . '" width="' . $options['width'] . '" height="' . $options['height'] . '" />');
	}
	
	function checkCaptcha($input, $options = array())
	{
		unlink(cms_join_path($this->getImagePath(), md5(session_id()) . '.jpg'));
		return (
			isset($_SESSION['captcha_phrase']) &&
			is_string($_SESSION['captcha_phrase']) &&
			strlen($input) > 0 &&
			strlen($_SESSION['captcha_phrase']) > 0 &&
			$input == $_SESSION['captcha_phrase']
		) ? TRUE : FALSE;
	}
	
	function load()
	{
		if (! $this->checkAvailability())
		{
			return;
		}
		// Call the parent class load method (includes necessary files)
		CaptchaLib::load();
	
		if(!isset($this->object))
		{
			$this->object = Text_CAPTCHA::factory('Image');
		}
	}

}

?>