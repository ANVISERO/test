<?php
#-------------------------------------------------------------------------
# Module: Captcha - Enables captcha support for use in other modules.
#
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2006 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details:
# http://www.gnu.org/licenses/licenses.html#GPL
#
#-------------------------------------------------------------------------

/**
 * The Captcha module class. Child class of the CMSModule class.
 *
 * @package Captcha
 * @author Dick Ittmann<dick@ittmann.nl>
*/
class Captcha extends CMSModule
{
	/**
	 * @var array   Messages to be shown to the user
	*/
	var $messages;

	/**
	* @var array   Error messages to be shown to the user
	*/
	var $errors;
	
	/**
	* @var array   The PHP Captcha libraries known to the module
	*/
	var $known_captchalibs;
	
	/**
	* @var array   Holds references to the CaptchaLib objects
	*/
	var $captchalibs;

	/**
	* The currently active Captcha library
	* @var object The active Captcha library
	*/
	var $active_lib;
	
	/**
	* @var object	Can hold a reference to a Admin object
	*/
	var $admin;
	
	/**
	* Module class constructor
	*/
	function Captcha() 
	{
		// call the parent constructor
		$this->CMSModule();
		
		$this->setMessages(array());
		$this->setErrors(array());
		$this->known_captchalibs = NULL;
		$this->captchalibs = array();
		$this->active_lib = NULL;
		$this->admin = NULL;
		
		if (! defined('CMS_CAPTCHA_MODULE_PATH'))
		{
			define('CMS_CAPTCHA_MODULE_PATH', $this->getModulePath());
		}
	}
	
	/**
	* @param array
	*/
	function setMessages($array)
	{
		$this->messages = $array;
	}
	
	/**
	* @return array
	*/
	function getMessages()
	{
		return $this->messages;
	}
	
	/**
	* @param array
	*/
	function setErrors($array)
	{
		$this->errors = $array;
	}
	
	/**
	* @return array
	*/
	function getErrors()
	{
		return $this->errors;
	}
	
	/**
	* @param string
	*/
	function addMessage($msg)
	{
		$this->messages[] = $msg;
	}
	
	/**
	* @param string
	*/
	function addError($error_msg)
	{
		$this->errors[] = $error_msg;
	}
	
	/**
	* @param array
	*/
	function setKnownCaptchaLibs($array)
	{
		$this->known_captchalibs = $array;
	}
	
	/**
	* @return array
	*/
	function &getKnownCaptchaLibs()
	{
		$libs = &$this->known_captchalibs;
		return $libs;
	}
	
	/**
	* @param array
	*/
	function setCaptchaLibs($array)
	{
		$this->captchalibs = $array;
	}
	
	/**
	* @return array
	*/
	function getCaptchaLibs()
	{
		$libs = &$this->captchalibs;
		return $libs;
	}
	
	/**
	* @param object
	*/
	function setActiveLib($lib)
	{
		$this->active_lib = $lib;
		$this->setPreference('active_lib', $lib->getName());
	}
	
	/**
	* @return object
	*/
	function &getActiveLib()
	{
		$lib = &$this->active_lib;;
		return $lib;
	}
	
	function & getAdmin()
	{
		if (! $this->admin)
		{
			require cms_join_path($this->getModulePath(), 'lib', 'classes', 'module', 'class.admin.php');
			$this->admin = new CaptchaModuleAdmin($this->cms->db, $this->smarty);
		}
		return $this->admin;
	}
	
	/**
	* Loads the Captchalib objects
	*/
	function loadLibs()
	{
		// create an array that holds the known libraries
		// TODO: these should be managed from the admin panel
		$captchalib_dir = cms_join_path($this->getModulePath(), 'lib', 'classes', 'captchalibs');
		require_once cms_join_path(dirname(dirname(__FILE__)), 'class.fs_operations.php');

		if (! is_dir($captchalib_dir))
		{
			echo 'Captcha library directory doesn\'t exists';
			return;
		}
		$found = @ CMSCaptchaFSOperations::scanDir($captchalib_dir);
		if (! $found)
		{
			echo 'No Captcha library class files found';
			return;
		}

		$known_captchalibs = array();
		foreach ($found as $filename)
		{
			if (substr($filename, 0, 17) == 'class.captchalib_')
			{
				$known_captchalibs[] = substr($filename, 17, strlen($filename) - 21);
			}
		}

		// set the known_captchalibs property
		$this->setKnownCaptchaLibs($known_captchalibs);
		
		// create an array to keep references to the library objects
		$captchalibs = array();

		// fill the array
		foreach ($this->getKnownCaptchaLibs() as $libname)
		{
			// require the Captcha library specific PHP class file
			$class_file = cms_join_path(dirname(dirname(__FILE__)), 'captchalibs', 'class.captchalib_' . $libname . '.php');
			require_once $class_file;
			
			// create an object of the library class
			$classname = 'CaptchaLib_' . $libname;
			$captchalib = new $classname($this->cms->config);
			$captchalib->setFontPath($this->GetModulePath().'/fonts');
			
			// PEAR library availability
			if (
				$captchalib->getName() == 'pear' 
				&& 
				$this->getPreference('enable_pear') == FALSE
			)
			{
				$captchalib->disable();
			}
			
			$captchalib->setIsAvailable($captchalib->checkAvailability());
			
			// set the default lib with the value from the db module preference
			if (
				count($known_captchalibs) != 1
				&& ($captchalib->getName() == $this->getPreference('active_lib'))
				&& $captchalib->isEnabled()
			)
			{
				$this->setActiveLib($captchalib);
			}
			
			// add the library to the $captchalibs variable
			$captchalibs[$libname] = $captchalib;
		}
		if (count($known_captchalibs) == 1)
		{
			$libname = $known_captchalibs[0];
			$lib =& $captchalibs[$libname];
			$this->setActiveLib($lib);
		}
		// set the captchalibs property
		$this->setCaptchaLibs($captchalibs);
		
		#! $this->captchalibs is not availabe before this point
	}	
	
	/**
	* @return string
	*/
	function getClassName()
	{
		return 'CaptchaModule';
	}
	
	/**
	* @return string
	*/
	function GetName()
	{
		return 'Captcha';
	}
	
	/*---------------------------------------------------------
	   GetFriendlyName()
	   This can return any string, preferably a localized name
	   of the module. This is the name that's shown in the
	   Admin Menus and section pages (if the module has an admin
	   component).
	
	   See the note on localization at the top of this file.
	  ---------------------------------------------------------*/
	function GetFriendlyName()
	{
		return $this->Lang('friendlyname');
	}
	
	
	/*---------------------------------------------------------
	   GetVersion()
	   This can return any string, preferably a number or
	   something that makes sense for designating a version.
	   The CMS will use this to identify whether or not
	   the installed version of the module is current, and
	   the module will use it to figure out how to upgrade
	   itself if requested.	   
	  ---------------------------------------------------------*/
	function GetVersion()
	{
		return '0.4.3';
	}

	/*---------------------------------------------------------
	   GetHelp()
	   This returns HTML information on the module.
	   Typically, you'll want to include information on how to
	   use the module.
	   
	   See the note on localization at the top of this file.
	  ---------------------------------------------------------*/
	function GetHelp()
	{
		return $this->Lang('help');
	}

	/*---------------------------------------------------------
	   GetAuthor()
	   This returns a string that is presented in the Module
	   Admin if you click on the "About" link.
	  ---------------------------------------------------------*/
	function GetAuthor()
	{
		return 'Dick Ittmann';
	}

	/*---------------------------------------------------------
	   GetAuthorEmail()
	   This returns a string that is presented in the Module
	   Admin if you click on the "About" link. It helps users
	   of your module get in touch with you to send bug reports,
	   questions, cases of beer, and/or large sums of money.
	  ---------------------------------------------------------*/
	function GetAuthorEmail()
	{
		return 'cmsms@ittmann.nl';
	}

	/*---------------------------------------------------------
	   GetChangeLog()
	   This returns a string that is presented in the module
	   Admin if you click on the About link. It helps users
	   figure out what's changed between releases.
	   See the note on localization at the top of this file.
	  ---------------------------------------------------------*/
	function GetChangeLog()
	{
		return $this->Lang('changelog');
	}

	/*---------------------------------------------------------
	   IsPluginModule()
	   This function returns true or false, depending upon
	   whether users can include the module in a page or
	   template using a smarty tag of the form
	   {cms_module module='Captcha' param1=val param2=val...}
	   
	   If your module does not get included in pages or
	   templates, return "false" here.
	  ---------------------------------------------------------*/
	function IsPluginModule()
	{
		return false;
	}

	/*---------------------------------------------------------
	   HasAdmin()
	   This function returns a boolean value, depending on
	   whether your module adds anything to the Admin area of
	   the site. For the rest of these comments, I'll be calling
	   the admin part of your module the "Admin Panel" for
	   want of a better term.
	  ---------------------------------------------------------*/
	function HasAdmin()
	{
	    return TRUE;
	}
	
	function IsAdminOnly() {
	    return FALSE;
	}


	/*---------------------------------------------------------
	   GetAdminSection()
	   If your module has an Admin Panel, you can specify
	   which Admin Section (or top-level Admin Menu) it shows
	   up in. This method returns a string to specify that
	   section. Valid return values are:

	   main        - the Main menu tab.
	   content     - the Content menu
	   layout      - the Layout menu
	   usersgroups - the Users and Groups menu
	   extensions  - the Extensions menu (this is the default)
	   siteadmin   - the Site Admin menu
	   viewsite    - the View Site menu tab
	   logout      - the Logout menu tab
	   
	   Note that if you place your module in the main,
	   viewsite, or logout sections, it will show up in the
	   menus, but will not be visible in any top-level
	   section pages.
	  ---------------------------------------------------------*/
	function GetAdminSection()
	{
		return 'extensions';
	}


	/*---------------------------------------------------------
	   GetAdminDescription()
	   If your module does have an Admin Panel, you
	   can have it return a description string that gets shown
	   in the Admin Section page that contains the module.
	  ---------------------------------------------------------*/
	function GetAdminDescription()
	{
		return $this->Lang('admindescription');
	}


	/*---------------------------------------------------------
	   VisibleToAdminUser()
	   If your module does have an Admin Panel, you
	   can control whether or not it's displayed by the boolean
	   that is returned by this method. This is primarily used
	   to hide modules from admins who lack permission to use
	   them.
	   
	   Typically, you'll use some permission to set this
	   (e.g., $this->CheckPermission('Some Permission'); )
	  ---------------------------------------------------------*/
	function VisibleToAdminUser()
	{
	  return $this->CheckPermission('Modify Site Preferences');
	}
	

	/*---------------------------------------------------------
	   CheckAccess()
	   This wrapper function will check against the specified permission,
	   and display an error page if the user doesn't have adequate permissions.
	  ---------------------------------------------------------*/
	function CheckAccess($id, $params, $return_id,$perm = 'Change Captcha Settings')
		{
		if (! $this->CheckPermission($perm))
            {
            $this->DisplayErrorPage($id, $params, $return_id,
            			$this->Lang('accessdenied'));
			return false;
			}
		return true;
		}
	
	/*---------------------------------------------------------
	   DisplayErrorPage()
	   This is a simple function for generating error pages.
	  ---------------------------------------------------------*/
	function DisplayErrorPage($id, &$params, $return_id, $message='')
	{
		$this->smarty->assign('title_error', $this->Lang('error'));
		$this->smarty->assign_by_ref('message', $message);
		
		// Display the populated template
		echo $this->ProcessTemplate('error.tpl');
	}
	


	/*---------------------------------------------------------
	   GetDependencies()
	   Your module may need another module to already be installed
	   before you can install it.
	   This method returns a list of those dependencies and
	   minimum version numbers that this module requires.
	   
	   It should return an hash, eg.
	   return array('somemodule'=>'1.0', 'othermodule'=>'1.1');
	  ---------------------------------------------------------*/
	function GetDependencies()
	{
		return array();
	}

	function HasCapability($capability,$params=array())
	{
	  $cap = strtolower($capability);
	  if( $cap == 'captcha' ) return true;
	  return false;
	}


	/*---------------------------------------------------------
	   MinimumCMSVersion()
	   Your module may require functions or objects from
	   a specific version of CMS Made Simple.
	   Ever since version 0.11, you can specify which minimum
	   CMS MS version is required for your module, which will
	   prevent it from being installed by a version of CMS that
	   can't run it.
	   
	   This method returns a string representing the
	   minimum version that this module requires.
	   ---------------------------------------------------------*/
	function MinimumCMSVersion()
	{
		return "1.5.2";
	}


	/*---------------------------------------------------------
	   Install()
	   When your module is installed, you may need to do some
	   setup. Typical things that happen here are the creation
	   and prepopulation of database tables, database sequences,
	   permissions, preferences, etc.
	   	   
	   For information on the creation of database tables,
	   check out the ADODB Data Dictionary page at
	   http://phplens.com/lens/adodb/docs-datadict.htm
	   
	   This function can return a string in case of any error,
	   and CMS will not consider the module installed.
	   Successful installs should return FALSE or nothing at all.
	  ---------------------------------------------------------*/
	function Install()
	{
		// create a preference for enabling PEAR Captcha
		$this->SetPreference('enable_pear', '0');
	
		// create a preference for the active PHP Captcha library
		$this->SetPreference('active_lib', 'hncaptcha');
	
		// put mention into the admin log
		$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('installed',$this->GetVersion()));
	}

	/*---------------------------------------------------------
	   InstallPostMessage()
	   After installation, there may be things you want to
	   communicate to your admin. This function returns a
	   string which will be displayed.
	  ---------------------------------------------------------*/
	function InstallPostMessage()
	{
		return $this->Lang('postinstall');
	}

	/*---------------------------------------------------------
	   UninstallPostMessage()
	   After removing a module, there may be things you want to
	   communicate to your admin. This function returns a
	   string which will be displayed.
	  ---------------------------------------------------------*/
	function UninstallPostMessage()
	{
		return $this->Lang('postuninstall');
	}

    /*
     * Upgrades the module
    */
    function Upgrade($oldversion, $newversion)
    {
	$current_version = $oldversion;
	switch($current_version)
	{
	    case '0.1-beta1':
			// create a preference for the font dir
			$this->SetPreference('font_path', cms_join_path($this->GetModulePath(), 'fonts'));
			$current_version = '0.1';
	    case '0.1':
			$current_version = '0.1.1';
	    case '0.1.1':
			if ($this->GetPreference('active_lib') == 'b2evo')
			{
				$this->SetPreference('active_lib', 'hncaptcha');
			}
			$current_version = '0.2';
		case '0.2':
			$current_version = '0.2.1';
		case '0.2.1':
			$current_version = '0.3';
	}
		
	// put mention into the admin log
	$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('upgraded',$this->GetVersion()));
    }


	/**
	 * UninstallPreMessage()
	 * This allows you to display a message along with a Yes/No dialog box. If the user responds
	 * in the affirmative to your message, the uninstall will proceed. If they respond in the
	 * negative, the uninstall will be canceled. Thus, your message should be of the form
	 * "All module data will be deleted. Are you sure you want to uninstall this module?"
	 *
	 * If you don't want the dialog, have this method return a FALSE, which will cause the
	 * module to uninstall immediately if the user clicks the "uninstall" link.
	 */
	function UninstallPreMessage()
	{
		return $this->Lang('really_uninstall');
	}
	
	/*---------------------------------------------------------
	   Uninstall()
	   Sometimes, an exceptionally unenlightened or ignorant
	   admin will wish to uninstall your module. While it
	   would be best to lay into these idiots with a cluestick,
	   we will do the magnanimous thing and remove the module
	   and clean up the database, permissions, and preferences
	   that are specific to it.
	   This is the method where we do this.
	  ---------------------------------------------------------*/
	function Uninstall()
	{
		
		$this->RemovePreference();
		
		// put mention into the admin log
		$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('uninstalled'));
	}
	
	
	function getCaptcha() 
	{
		$this->LoadLibs();
		$lib = &$this->getActiveLib();
		$options = array();
		foreach ($lib->options as $option)
		{
			$options[$option->getName()] = $this->GetPreference('captchalib_' . $lib->getName() . '_' . $option->getName(), $option->getDefault());
		}
		return $lib->getCaptcha($options);
	}
	
	function CheckCaptcha($input)
	{
		$this->LoadLibs();
		$lib = &$this->getActiveLib();
		$options = array();
		foreach ($lib->options as $option)
		{
			$options[$option->getName()] = $this->GetPreference('captchalib_' . $lib->getName() . '_' . $option->getName(), $option->getDefault());
		}
		return $lib->checkCaptcha($input, $options);
	}
	
	function &getAvailableLibs()
	{
		$available = array();
		foreach ($this->getCaptchaLibs() as $shortname => $lib) {
			if ($lib->isAvailable())
			{
				$available[$shortname] = $lib;
			}
		}
		return $available;
	}
	
	function getAdminHtml($id, $return_id, $params) 
	{
		$active_tab = isset($params['active_tab']) ? $params['active_tab'] : '';
		
		// get an admin object
		$admin =& $this->getAdmin();
		
		// create admin tab objects if needed
		if (empty($admin->tabs))
		{
			$admin->addTab(new AdminTab('general', $this->Lang('title_general')));
			
			foreach ($this->getAvailableLibs() as $lib)
			{
				$options = $lib->getOptions();
				if (! empty($options))
				{
					if (! ($lib->getName() == 'pear' && $this->GetPreference('enable_pear') == '0'))
					{
						$admin->addTab(new AdminTab($lib->getName(), $lib->getFriendlyName()));
					}
				}
			}
			
		}
		
		// GD checks
		switch (function_exists('gd_info'))
		{
			case false:
				$this->addError($this->Lang('err_no_gd_support'));
				break;
			case true:
				$gd_info = gd_info();
				if ( (!isset($gd_info['JPG Support']) || !$gd_info['JPG Support']) &&
				     (!isset($gd_info['JPEG Support']) || !$gd_info['JPEG Support']) )
				{
					$this->addError($this->Lang('err_no_jpg_support'));
				}
				if (! isset($gd_info['FreeType Support']) || ! $gd_info['FreeType Support'])
				{
					$this->addError($this->Lang('err_no_freetype_support'));
				}
		}
		
		// tabheaders
		$tabheaders = array();
		$tabheaders['start'] = $this->StartTabHeaders();
		$tabheaders['tabheaders'] = array();
		foreach ($admin->tabs as $tab)
		{
			// set tab start and end
			$tab->start = $this->StartTab($tab->name);
			$tab->end   = $this->EndTab();
			$admin->tabs[$tab->name] = $tab;
			// set tabheaders
			$tabheaders['tabheaders'][] = $this->SetTabHeader($tab->name, $tab->title, ($active_tab == $tab->name));
		}
		$tabheaders['end'] = $this->EndTabHeaders();
		
		// General Tab
		
		// Get the known Libraries
		$available_libs =& $this->getAvailableLibs();
		if(empty($available_libs))
		{
			// No Captcha libraries are available
			$this->addMessage('No Captcha libraries available');
		} 
		else 
		{
			$active_lib =& $this->getActiveLib();
			$image_path = $active_lib->getImagePath();
			
			// Show the active library fieldset legend
			$this->smarty->assign('active_legend', $this->Lang('legend_active_lib'));
			
			// Captcha library select title
			$this->smarty->assign('captchalib_select_label', $this->Lang('label_captchalib_select'));
			
			// Only show the select if other libraries are available
			if (count($available_libs) != 1)
			{
				// Create an array to hold the menuitems (will be passed to CreateInputDropDown())
				$items = array();
				
				// Keep track of the array index
				$i = 0;
				$selectedindex = -1;
				foreach ($available_libs as $shortname => &$lib)
				{
					if ($lib->isEnabled())
					{
						// add the available libraries
						$items[$lib->getFriendlyName()] = $lib->getName();
						if ($active_lib->getName() == $lib->getName())
						{
							$selectedindex = $i;
						}
						$i++;
						}
				}
				// Captcha library dropdown
				$this->smarty->assign('captchalib_select', $this->CreateInputDropDown($id, 'select_captchalib', $items, $selectedindex, '', 'id="select_captchalib"'));
			} 
			else
			{
				// Don't show the select, but the name of the only available lib
				$this->smarty->assign('captchalib_select', $this->active_lib->getFriendlyName());
			}
			
			// Options link
			$options =& $active_lib->getOptions();
			if (! empty($options))
			{
				$linkparms = array();
				$linkparms['active_tab'] = $active_lib->getName();
				$link = $this->CreateLink($id, 'defaultadmin', $return_id, 'options', $linkparms);
				$this->smarty->assign('options_link', $link);
			}
			
			// Enable PEAR Captcha selectbox
			if (isset($available_libs['pear']))
			{
				$this->smarty->assign('pear_legend', $this->Lang('legend_pear'));
				$this->smarty->assign('enable_pear_label', $this->Lang('label_enable_pear'));
				$selectedvalue = $this->getPreference('enable_pear') ? '1' : '0';
				$this->smarty->assign(
					'enable_pear_checkbox', 
					$this->CreateInputCheckbox(
						$id, 
						'enable_pear', 
						'1', 
						$selectedvalue,
						'id="enable_pear"'
					)
				);
			}
			
			// Cache
			$this->smarty->assign('cache_directory_title', $this->Lang('cache_directory'));
			$this->smarty->assign('cache_directory', $image_path);
			$this->smarty->assign(
				'cache_overview', 
				$this->Lang(
					'msg_cache_overview', 
					$this->getNumberOfCachedImages($image_path)
				)
			);
			$this->smarty->assign('cache_legend', $this->Lang('legend_cache'));
			$this->smarty->assign('clear_cache_label', $this->Lang('label_clear_cache'));
			$this->smarty->assign(
				'clear_cache_checkbox', 
				$this->CreateInputCheckbox(
					$id, 
					'clear_cache', 
					'1',
					'0',
					'id="clear_cache"'
				)
			);
			
			$this->smarty->assign('available_fonts_header', $this->Lang('available_fonts'));
	
			$fonts = array();
			if ($handle = opendir($this->GetModulePath().'/fonts')) 
			{
				while (false !== ($file = readdir($handle))) 
				{
					if ($file != '.' && $file != '..' && substr($file,strlen($file) - 4, 4) == '.ttf') 
					{
						$fontfile = cms_join_path($this->GetModulePath(), 'fonts', $file);
						if(is_readable($fontfile))
						{
							$fonts[] = substr($file, 0, strlen($file)-4);
						}
					}
				}
				closedir($handle);
			}
			$this->smarty->assign('available_fonts', $fonts);
	
			// Submit button
			$this->smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', lang('submit')));
			
			$tab =& $admin->tabs['general'];
			foreach ($tab->messages as $key => $msg)
			{
				$tab->messages[$key] = $this->HtmlMessage($msg);
			}
			foreach ($tab->errors as $key => $err)
			{
				$tab->errors[$key] = $this->HtmlError($err);
			}

			$this->smarty->assign('tab', $tab);
			$this->smarty->assign('formstart', $this->CreateFormStart($id, 'save_general_admin', $return_id));
			$this->smarty->assign('formend', $this->CreateFormEnd());

			$tab->content = $this->ProcessTemplate('admin_general.tpl');
			
			// Library Options
			foreach ($this->getAvailableLibs() as $lib)
			{
				if (! ($lib->getName() == 'pear' && $this->GetPreference('enable_pear') == '0'))
				{
	
					$options =& $lib->getOptions();
					if (! empty($options))
					{
						$tab =& $admin->tabs[$lib->getName()];
						foreach ($options as $key => $option)
						{
							$option->input = $this->getOptionInput($id, $lib->getName(), $option);
							$options[$key] = $option;
						}
						foreach ($tab->messages as $key => $msg)
						{
							$tab->messages[$key] = $this->HtmlMessage($msg);
						}
						foreach ($tab->errors as $key => $err)
						{
							$tab->errors[$key] = $this->HtmlError($err);
						}
						$this->smarty->assign('cancel', $this->CreateInputSubmit($id, 'cancel', lang('cancel')));
						$this->smarty->assign('reset' , $this->CreateInputSubmit($id, 'reset', $this->Lang('restore')));
						$this->smarty->assign('options', $options);
						$this->smarty->assign('options_legend', $lib->getFriendlyName() . ' options');
						$parms = array('libname' => $lib->getName());
						$this->smarty->assign('formstart', $this->CreateFormStart($id, 'save_captcha_options', $return_id, 'post', '', false, '', $parms));
						$this->smarty->assign('tab', $tab);
						$tab->content = $this->ProcessTemplate('admin_liboptions.tpl');
					}
				}
			}
			
			// global errors
			$html_errors = array();
			foreach ($this->getErrors() as $err)
			{
				$html_errors[] = $this->HtmlError($err);
			}
			// global messages
			$html_messages = array();
			foreach ($this->getMessages() as $msg)
			{
				$html_messages[] = $this->HtmlMessage($msg);
			}
			
			// assign smarty variables
			$this->smarty->assign('errors', $html_errors);
			$this->smarty->assign('messages', $html_messages);
			$this->smarty->assign('tabheaders', $tabheaders);
			$this->smarty->assign('start_tab_content', $this->StartTabContent());
			$this->smarty->assign('tabs', $admin->getTabs());
			$this->smarty->assign('tab_footers',$this->EndTabContent());
			
			// process the template
			return $this->ProcessTemplate('adminpanel.tpl');
		}
	}
	
	/**
	* Returns a reference to a library object by name
	* @return object
	*/
	function &getLibByName($name)
	{
		$lib = &$this->captchalibs[$name];
		return $lib;
	}
	
	function getNumberOfCachedImages($cache_dir)
	{
		return count($this->getImageFilenames($cache_dir));
	}
	
	/**
	* Returns an array with image filenames inside a given dir
	* @return array
	*/
	function getImageFilenames($dir)
	{
		$filenames = array();
		if ($handle = opendir($dir)) 
		{
			require_once cms_join_path(dirname(dirname(__FILE__)), 'class.file_operations.php');

			/* Loop over the directory. */
			while (($file = readdir($handle)) !== false) 
			{
				if (CMSCaptchaFileOperations::isImageFilename($file))
				{
					$filenames[] = $file;
				}
			}
			closedir($handle);
		}
		return ($filenames);
	}
	
	// GetModulePath doesn't work correctly on 0.13 during CMS install
	function GetModulePath() 
	{
		if (defined('CMS_CAPTCHA_MODULE_PATH')) 
		{
			return CMS_CAPTCHA_MODULE_PATH;
		}
		else
		{
			$root_path = '';
			if (substr($this->cms->config['root_path'], strlen($this->cms->config['root_path'])-8, 8) == DIRECTORY_SEPARATOR . 'install')
			{
				$root_path = dirname(dirname(__FILE__));
			}
			else
			{
				$root_path = $this->cms->config['root_path'];
			}
			return cms_join_path($root_path, 'modules', $this->GetName());
		}
	}
	
	function HtmlMessage(&$msg)
	{
		if (method_exists($this, 'ShowMessage'))
		{
			return $this->ShowMessage($msg);
		} 
		else
		{
			return '<div class="message"><strong>' . $msg . '</strong></div>';
		}
	}
	
	function HtmlError(&$err)
	{
		if (method_exists($this, 'ShowErrors'))
		{
			return $this->ShowErrors($err);
		} 
		else
		{
			return '<div class="error"><strong>ERROR: ' . $err . '</strong></div>';
		}
	}
	
		
	function getOptionInput($id, $libname, &$option)
	{
		switch ($option->type)
		{
			case 'int':
				return $this->CreateInputText($id, 'options[' . $option->getName() . ']', $this->GetPreference('captchalib_' . $libname . '_' . $option->getName(), $option->getDefault()), 3);
				break;
			case 'bool':
				return $this->CreateInputCheckbox($id, 'options[' . $option->getName() . ']', $this->GetPreference('captchalib_' . $libname . '_' . $option->getName(), $option->getDefault()), '1');
				break;
			case 'string':
				return $this->CreateInputText($id, 'options[' . $option->getName() . ']', $this->GetPreference('captchalib_' . $libname . '_' . $option->getName(), $option->getDefault()), 15);
				break;
		}
	}

	
} // end of class Captcha

?>
