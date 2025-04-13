<?php

$this->LoadLibs();

$changes = FALSE;

$admin =& $this->getAdmin();

$create_tabs = false;

$tabs = $admin->getTabs();
if (empty($tabs))
{
	$create_tabs = true;
}
if ($create_tabs)
{
	$admin->addTab(new AdminTab('general', $this->Lang('title_general')));
}		

$tab =& $admin->getTab('general');

$available_libs =& $this->getAvailableLibs();


// show a message if the user selected pear and disabled it at the same time
if (
	! isset($params['enable_pear']) 
	&& isset($params['select_captchalib'])
	&& $params['select_captchalib'] == 'pear'
)
{
	$tab->addError($this->Lang('msg_pear_disable_while_selected'));
}
else 
{
// otherwise save the settings
	if (isset($available_libs['pear']))
	{
		/* Enable/disable PEAR */
		// the current setting
		$enable_pear_current = $this->GetPreference('enable_pear');
		// the setting chosen on the admin form
		$enable_pear = isset($params['enable_pear']) ? $params['enable_pear'] : '0';
		
		$pear = &$this->getLibByName('pear');
		
		// change enable/disable PEAR setting if it was changed
		if ($enable_pear != $enable_pear_current)
		{
			$changes = TRUE;
			
			if ($enable_pear && ! $pear->checkAvailability())
			{
				$tab->addError(
					$this->ShowErrors(
						$this->lang('msg_pear_unavailable')
						. '<br />' 
						. $this->Lang('msg_pear_disabled')
					)
				);
			} else {
				// set the pear library object is_available property
				$pear->setIsAvailable($enable_pear);
				
				// set the enable_pear preference
				$this->SetPreference('enable_pear', $enable_pear);
				
				// set the pear library object enabled property
				$pear->setIsEnabled($enable_pear);
				
				// show a message to the user
				$msg = $enable_pear ? $this->Lang('msg_pear_enabled') : $this->Lang('msg_pear_disabled');
				$tab->addMessage($msg);
			}
		}
	}	
	// change the active library if a new one was selected
	if (isset($params['select_captchalib']))
	{
		/* Active Captcha Library */
		// the current active lib
		$active_lib_current = $this->GetPreference('active_lib');
		$active_lib = $params['select_captchalib'];
		
		if ($active_lib != $active_lib_current)
		{
			$changes = TRUE;
			// set the active_lib preference
			$lib = $this->captchalibs[$active_lib];
			$this->setActiveLib($lib);
			$tab->addMessage($this->Lang('msg_active_lib_changed', $lib->getFriendlyName()));
		}
	}
	
	// clear cached captcha images if checkbox was selected
	if (isset($params['clear_cache']))
	{
		$active_lib = &$this->getActiveLib();
		$image_path = $active_lib->getImagePath();
		
		$image_filenames = $this->getImageFilenames($image_path);
		
		$deleted = 0;
		foreach ($image_filenames as $filename)
		{
			if (unlink(cms_join_path($image_path, $filename)))
			{
				$deleted++;
			}
		}
		
		if ($deleted > 0) {
			$msg = 
				($deleted == 1)
				? $this->Lang('msg_deleted_cache_single')
				: $this->Lang('msg_deleted_cache', $deleted);
			$changes = TRUE;
			$tab->addMessage($msg);
		}
	}
	
	// show a message if no changes were made
	if (! $changes)
	{
		$tab->addMessage($this->Lang('msg_no_changes'));
	}
}

if ($create_tabs)
{
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

// show the module adminpanel
echo $this->getAdminHtml($id, $returnid, $params);

?>
