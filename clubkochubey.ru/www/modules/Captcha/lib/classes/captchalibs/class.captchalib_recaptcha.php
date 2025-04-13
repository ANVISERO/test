<?php
/**
 * recaptcha
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
class CaptchaLib_recaptcha extends CaptchaLib
{
	/**
	* Class constructor
	*/
	function CaptchaLib_recaptcha($cmsconfig)
	{
		// call the parent constructor
		$this->CaptchaLib('recaptcha', 'reCaptcha', $cmsconfig);
		
		$this->setPath('recaptcha-php-1.10');
		$this->setIncludeFiles(array('recaptchalib.php'));
		
		$this->AddOption(new CaptchaLibOption('publickey' , 'string', ''));
        $this->AddOption(new CaptchaLibOption('privatekey' , 'string', ''));
	}
	
	function getCaptcha($options = array())
	{
		$this->load();
		return recaptcha_get_html($options['publickey']);
		
	}
	
	function checkCaptcha($input, $options = array()) 
	{
		$this->load();
        $privatekey = $options['privatekey'];
        $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
        return $resp->is_valid;
	}
	
}
?>
