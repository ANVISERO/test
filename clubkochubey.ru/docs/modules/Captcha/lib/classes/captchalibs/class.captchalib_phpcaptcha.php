<?php
/**
 * hn_captcha
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
class CaptchaLib_phpcaptcha extends CaptchaLib
{
	/**
	* Class constructor
	*/
	function CaptchaLib_phpcaptcha($cmsconfig)
	{
		// call the parent constructor
		$this->CaptchaLib('phpcaptcha', 'PhpCaptcha', $cmsconfig);
		
		$this->setPath('phpcaptcha');
		$this->setIncludeFiles(array('php-captcha.inc.php'));
		
		$this->AddOption(new CaptchaLibOption('width'         , 'int'   , '200'));
		$this->AddOption(new CaptchaLibOption('height'        , 'int'   , '60'));
		$this->AddOption(new CaptchaLibOption('display_shadow', 'bool'  , '0'));
		$this->AddOption(new CaptchaLibOption('use_color'     , 'bool'  , '1'));
		$this->AddOption(new CaptchaLibOption('owner_text'    , 'string', ''));
		$this->AddOption(new CaptchaLibOption('alt'           , 'string', 'Visual Captcha'));
	}
	
	function getCaptcha($options = array())
	{
		global $gCms;
		$config = $gCms->config;
		$this->load($options);
		
		$imagefile = cms_join_path($this->getImagePath(), 'php-captcha.jpg');
		$this->object->Create($imagefile);
		
		$url = $this->getImageUrl() . '/php-captcha.jpg';
		
		return '<img src="'. $url. '" width="'. $options['width'] . '" height="' . $options['height'] . '" alt="' . $options['alt'] . '" />';
	}
	
	function checkCaptcha($input, $options = array()) 
	{
		$this->load($options);
		return PhpCaptcha::Validate($input);
	}
	
	function load($options = array())
	{
		// Call the parent class load method (includes necessary files)
		CaptchaLib::load();
		
		$aFonts = array(
			cms_join_path($this->getFontPath(), 'FreeSans.ttf'), 
			cms_join_path($this->getFontPath(), 'FreeSerif.ttf')
		);
		if(!isset($this->object))
		{
			$this->object =& new PhpCaptcha($aFonts, $options['width'], $options['height']);
			$this->object->DisplayShadow($options['display_shadow'] == '1' ? true : false);
			$this->object->UseColour($options['use_color'] == '1' ? true : false);
			if ($options['owner_text'] != '')
			{
				$this->object->SetOwnerText($options['owner_text']);
			}
		}
	}
}
?>