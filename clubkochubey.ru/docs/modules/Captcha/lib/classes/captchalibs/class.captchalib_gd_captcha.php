<?php
/**
 * GD captcha library
 * @see class.captchalib.php
 * @see CaptchaLib
 * @package Captcha
*/

/**
 * Needs class.captchalib.php
*/
require_once cms_join_path(dirname(dirname(__FILE__)), 'class.captchalib.php');

/**
 * @extends CaptchaLib
*/
class CaptchaLib_gd_captcha extends CaptchaLib
{
	/**
	* Class constructor
	*/
	function CaptchaLib_gd_captcha($cmsconfig)
	{
		// call the parent constructor
		$this->CaptchaLib('gd_captcha', 'GD Captcha', $cmsconfig);

		$this->setPath('gd_captcha');
		$this->setImageUrl($this->cmsconfig['root_url'] . '/modules/Captcha/lib/gd_captcha/captcha.php');
	}
	
	/**
	* Check availability of the GD Captcha library
	* Overrides the CaptchaLib->checkAvailability() method
	* @return bool
	*/
	function checkAvailability() {
		$location = cms_join_path(CMS_CAPTCHA_MODULE_PATH, 'lib', $this->getPath(), 'captcha.php');
		$this->setIsAvailable(is_readable($location) ? TRUE : FALSE);
		return is_readable($location) ? TRUE : FALSE;
	}
	
	/**
	* Sets the session variable and returns the HTML to show the captcha
	*/
	function getCaptcha($options = array()) 
	{
		session_start();
		return ('<img alt="" src="' . $this->getImageUrl() . '?sess=' . session_name(session_name()) . '" />');
	}
	
	function checkCaptcha($input, $options = array())
	{
       return $_SESSION['session_captchaText'] == $input ? TRUE : FALSE;
	}

	function load()
	{
	}	
}

?>
