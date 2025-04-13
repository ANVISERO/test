<?php

require_once 'class.captchalib_option.php';

/**
 * A PHP Class representing a PHP Captcha Library
 * Base class for different available captcha PHP libraries
 * @package Captcha
*/
class CaptchaLib {
	
	/**
	* Can be used to keep a reference to a captcha library class object
	*/
	var $object;
	
	/**
	* The shortname of the Captcha Library
	* Must be unique for every library and a class.captchalib_{shortname}.php file must be present containing a 
	* @var string The name of the Captcha Library
	*/
	var $name;
	
	/**
	* @var string	The friendly name of the Captcha Library
	*/
	var $friendlyname;
	
	/**
	* @var array	Array of file names that need to be included
	*/
	var $includefiles;
	
	/**
	* @var string	The (include) path (if needed) for the Captcha Library
	*/
	var $path;
    
    /**
    * @var array   CMS Config
    */
    var $cmsconfig;
	
	/**
	* @var string	The path to write captcha images to if needed
	*/
	var $imagepath;
	
	/**
	* @var string	The url to the captcha images directory
	*/
	var $image_url;
	
	/**
	* @var string	The folder where fonts are stored
	*/
	var $fontpath;
	
	/**
	* @var bool	Whether the Captcha Library is available on the system
	*/
	var $is_available;
	/**
	* @var bool	Whether the Captcha Library is enabled (true) or disabled (false)
	*/
	var $is_enabled;
	
	var $options;
	
	/**
	* The class constructor
	*/
	function CaptchaLib($name = '', $friendlyname = '', $cmsconfig) 
	{
		$this->object = NULL;
		$this->setName($name);
		$this->setFriendlyName($friendlyname);
		$this->setPath('');
		$this->setImagePath('');
        $this->cmsconfig = $cmsconfig;
        $this->setImagePath(cms_join_path($this->cmsconfig['root_path'],'tmp','cache'));
        $this->setImageUrl($this->cmsconfig['root_url'] . '/tmp/cache');
		$this->setIncludeFiles(array());
		$this->setIsAvailable(FALSE);
		$this->setIsEnabled(TRUE);
		$this->options = array();
	}


/* Start Get and Set methods */

	/**
	* Set method for the is_available property
	*/    
	function setIsAvailable($bool)
	{
	$this->is_available = $bool;
	}
	
	/**
	* Get method for the is_available property
	* @return bool
	*/    
	function getIsAvailable()
	{
		return $this->is_available;
	}
	
	/**
	* Set method for the is_enabled property
	*/    
	function setIsEnabled($bool)
	{
	$this->is_enabled = $bool;
	}
	
	/**
	* Get method for the is_enbled property
	* @return bool
	*/    
	function getIsEnabled()
	{
		return $this->is_enabled;
	}
	
	/**
	* Set method for the name property
	* @param string name
	*/
	function setName($name)
	{
		$this->name = $name;
	}
	
	/**
	* Get method for the name property
	* @return string
	*/    
	function getName()
	{
		return $this->name;
	}
	
	/**
	* Set method for the friendlyname property
	* @param string Friendly name
	*/
	function setFriendlyName($name)
	{
		$this->friendlyname = $name;
	}
	
	/**
	* Get method for the friendlyname property
	* @return string Friendly name
	*/    
	function getFriendlyName()
	{
		return $this->friendlyname;
	}
	
	/**
	* Set method for the includefile property
	* @param string filename
	*/
	function setIncludeFiles($files_array)
	{
		$this->includefiles = $files_array;
	}
	
	/**
	* Get method for the includefile property
	* @return string
	*/
	function getIncludeFiles()
	{
		return $this->includefiles;
	}
	
	/**
	* Set method for the path property
	* @param string path
	*/
	function setPath($path)
	{
		global $config;
		$this->path = $path;
	}
	
	/**
	* Get method for the path property
	* @return string
	*/
	function getPath()
	{
		return $this->path;
	}
	
	/**
	* Set method for the imagepath property
	* @param string path
	*/
	function setImagePath($path)
	{
		$this->imagepath = $path;
	}
	
	/**
	* Get method for the imagepath property
	* @return string
	*/
	function getImagePath()
	{
		return $this->imagepath;
	}
	
	
	/**
	* Set method for the image_url property
	* @param string url
	*/
	function setImageUrl($url)
	{
		$this->image_url = $url;
	}
	
	/**
	* Get method for the image_url property
	* @return string
	*/
	function getImageUrl()
	{
		return $this->image_url;
	}
	
	/**
	* Set method for the fontpath property
	* @param string path
	*/
	function setFontPath($path)
	{
		$this->fontpath = $path;
	}
	
	/**
	* Get method for the imagepath property
	* @return string
	*/
	function getFontPath()
	{
		return $this->fontpath;
	}

/* End Get and Set methods */

	/**
	* Alias for the get method getIsAvailable()
	* @return bool
	* @see getIsAvailable()
	*/
	function isAvailable()
	{
		return $this->getIsAvailable();
	}
	
	/**
	* Alias for the get method getIsEnabled()
	* @return bool
	* @see getIsEnabled()
	*/
	function isEnabled()
	{
		return $this->getIsEnabled();
	}
	
	/**
	* "Negative" Alias for the get method getIsEnabled()
	* @return bool
	* @see getIsEnabled()
	*/
	function isDisabled()
	{
		return (! $this->getIsEnabled());
	}
	
	/**
	* Enables the Captcha library (within the module/application)
	* @see setIsEnabled()
	*/
	function enable()
	{
		$this->setIsEnabled(TRUE);
	}
	
	/**
	* Disables the Captcha library (within the module/application)
	* @see setIsEnabled()
	*/
	function disable()
	{
		$this->setIsEnabled(FALSE);
	}
	
	function & getOptions()
	{
		$options =& $this->options;
		return $options;
	}
	function setOptions($options)
	{
		$this->options = $options;
	}
	
	function addOption(&$option)
	{
		$this->options[$option->name] = $option;
	}


/* functions below should be overridden by child classes */

	/**
	* Checks availabiltity of the Captcha Library.
	* Is supposed to be overridden by a child class.
	* @return bool	Whether the library is available on the system
	*/
	function checkAvailability() {
		$available = FALSE;
		$missing_files = FALSE;
		
		foreach ($this->getIncludeFiles() as $includefile)
		{
			$location = cms_join_path(CMS_CAPTCHA_MODULE_PATH, 'lib', $this->getPath(), $includefile);
			if (is_readable($location))
			{
				$available = TRUE;
			} else {
				$missing_files = TRUE;
			}
		}
		
		if ($missing_files)
		{
			$available = FALSE;
		}
		
		$this->setIsAvailable($available);
		return $available;
	}
	
	/**
	* Includes necessary library (class) files
	*/
	function load()
	{
		foreach ($this->getIncludeFiles() as $includefile)
		{
			$location = cms_join_path(CMS_CAPTCHA_MODULE_PATH, 'lib', $this->getPath(), $includefile);
			require_once($location);
		}
	}
	
	/**
	* returns the HTML to show the Captcha image
	*/
	function getCaptcha($options=array()) {
		return '';
	}
	
	/**
	* Checks the user input.
	* @param string 
	* @return bool
	*/
	function checkCaptcha($input)
	{
		return false;
	}

}

?>