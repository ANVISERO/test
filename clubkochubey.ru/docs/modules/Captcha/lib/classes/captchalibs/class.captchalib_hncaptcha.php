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
class CaptchaLib_hncaptcha extends CaptchaLib
{
	/**
	* Class constructor
	*/
	function CaptchaLib_hncaptcha($cmsconfig)
	{
		// call the parent constructor
		$this->CaptchaLib('hncaptcha', 'hn_captcha', $cmsconfig);
		
		$this->setPath('hn_captcha');
		$this->setIncludeFiles(array('hn_captcha.class.x1.php'));
		
		$this->AddOption(new CaptchaLibOption('chars'                , 'int'   , '5'));
		$this->AddOption(new CaptchaLibOption('minsize'              , 'int'   , '20'));
		$this->AddOption(new CaptchaLibOption('maxsize'              , 'int'   , '30'));
		$this->AddOption(new CaptchaLibOption('maxrotation'          , 'int'   , '25'));
		$this->AddOption(new CaptchaLibOption('noise'                , 'bool'  , '1'));
		$this->AddOption(new CaptchaLibOption('websafecolors'        , 'bool'  , '0'));
		$this->AddOption(new CaptchaLibOption('secretstring'         , 'string', 'A very, very secret string which is used to generate a md5-key!'));
		$this->AddOption(new CaptchaLibOption('secretposition'       , 'int'   , '15'));
		$this->AddOption(new CaptchaLibOption('collect_garbage_after', 'int'   , '10'));
		$this->AddOption(new CaptchaLibOption('maxlifetime'          , 'int'   , '30'));
	}
	
	function getCaptcha($options = array())
	{
		global $gCms;
		$config = $gCms->config;
		
		$this->load($options);
		
		$parsed = parse_url($config['root_url']);
		$path = '';
		if( isset($parsed['path']) )
		  $path = $parsed['path'];

		// hn_captcha uses $_SERVER['DOCUMENT_ROOT'] - make sure it's the same as $config['root_path'] - $path (the path part of $config['root_url'])
		if ($_SERVER['DOCUMENT_ROOT'] . $path != str_replace("\\", "/", $config['root_path']))
		{
			$oldvalue = $_SERVER['DOCUMENT_ROOT'];
			$_SERVER['DOCUMENT_ROOT'] = str_replace($path, '', str_replace("\\", "/", $config['root_path']));
		}
		$result = $this->object->display_form_part('image');
		
		// reset $_SERVER['DOCUMENT_ROOT'] to the original value
		if (isset($oldvalue))
		{
			$_SERVER['DOCUMENT_ROOT'] = $oldvalue;
		}
		
		return $result;
	}
	
	function checkCaptcha($input, $options = array()) 
	{
		$this->load($options, $input);
		
		return $this->object->validate_submit() == 1;
	}
	
	function load($options = array(), $input = '')
	{
		// Call the parent class load method (includes necessary files)
		CaptchaLib::load();
		
		// ConfigArray
		$CAPTCHA_INIT = array(
			// hn_captcha expects forward slashes, not backslashes in 'tempfolder'
			'tempfolder'     => str_replace("\\", "/", $this->getImagePath()) . '/',  // string: absolute path (with trailing slash!) to a writeable tempfolder which is also accessible via HTTP!
			'TTF_folder'     => $this->getFontPath() . '/', // string: absolute path (with trailing slash!) to folder which contains your TrueType-Fontfiles.
								// mixed (array or string): basename(s) of TrueType-Fontfiles
			'TTF_RANGE'      => array('FreeSans.ttf', 'FreeSerif.ttf'),
	
			'chars'          => (int) $options['chars'],       // integer: number of chars to use for ID
			'minsize'        => (int) $options['minsize'],      // integer: minimal size of chars
			'maxsize'        => (int) $options['maxsize'],      // integer: maximal size of chars
			'maxrotation'    => (int) $options['maxrotation'],      // integer: define the maximal angle for char-rotation, good results are between 0 and 30
	
			'noise'          => $options['noise'] == '1' ? true : false,    // boolean: TRUE = noisy chars | FALSE = grid
			'websafecolors'  => $options['websafecolors'] == '1' ? true : false,   // boolean
			'refreshlink'    => TRUE,    // boolean
			'lang'           => 'en',    // string:  ['en'|'de']
			'maxtry'         => 3,       // integer: [1-9]
	
			'badguys_url'    => '/',     // string: URL
			'secretstring'   => $options['secretstring'],
			'secretposition' => (int) $options['secretposition'],      // integer: [1-32]
	
			'debug'          => FALSE,

			'counter_filename'		=> '',              // string: absolute filename for textfile which stores current counter-value. Needs read- & write-access!
			'prefix'				=> 'hn_captcha_',   // string: prefix for the captcha-images, is needed to identify the files in shared tempfolders
			'collect_garbage_after'	=> (int) $options['collect_garbage_after'],             // integer: the garbage-collector run once after this number of script-calls
			'maxlifetime'			=> (int) $options['maxlifetime']              // integer: only imagefiles which are older than this amount of seconds will be deleted
		);
		
		if(! isset($this->object))
		{
			$_POST['hncaptcha_private_key'] = $input;

			$this->object =& new hn_captcha_X1($CAPTCHA_INIT);
		}
	}
}
?>
