<?php

if (isset($params['cancel']))
{
	$this->DoAction('defaultadmin', $id, array());
	return;
}

$libname = $params['libname'];
$submitted_options = $params['options'];

$this->loadLibs();
$lib = $this->getLibByName($libname);

if (! isset($params['reset']))
{
	$changes = false;
	
	foreach ($submitted_options as $option_name => $value)
	{
		$option =& $lib->options[$option_name];
		$default = $option->getDefault();
		$pref_name = 'captchalib_' . $libname . '_' . $option_name;
		$current = $this->GetPreference($pref_name, $default);
		
		switch ($option->getType())
		{
			case 'int':
			case 'string':
				
				if ($current != $default)
				{ // there's a pref value in the db
					if ($value != $current)
					{
						if ($value == $default)
						{
							$this->RemovePreference($pref_name);
							$changes = true;
						}
						else
						{
							$this->SetPreference($pref_name, $value);
							$changes = true;
						}
					}
				}
				else
				{
					if ($value != $default)
					{
						$this->SetPreference($pref_name, $value);
						$changes = true;
					}
				}
				break;
			case 'bool':
				if ($current == '0')
				{
					$this->setPreference($pref_name, '1');
					$changes = true;
				}
				break;
		}
	}
	
	foreach ($lib->getOptions() as $liboption)
	{
		if ($liboption->getType() == 'bool')
		{
			$default = $liboption->getDefault();
			$pref_name = 'captchalib_' . $libname . '_' . $liboption->getName();
			$current = $this->GetPreference($pref_name, $default);

			if (!isset($params['options'][$liboption->name]) && $current == '1')
			{
				if ($default == '0')
				{
					$this->RemovePreference($pref_name);
				}
				elseif ($default == '1')
				{
					$this->SetPreference($pref_name, '0');
				}
				$changes = true;
			}
		}
	}
	
}
$admin =& $this->getAdmin();
$tabs = $admin->getTabs();
if (empty($tabs))
{
	$admin->addTab(new AdminTab('general', $this->Lang('title_general')));
			
	foreach ($this->getAvailableLibs() as $available_lib)
	{
		$options = $available_lib->getOptions();
		if (! empty($options))
		{
			if (! ($lib->getName() == 'pear' && $this->GetPreference('enable_pear') == '0'))
			{
				$admin->addTab(new AdminTab($available_lib->getName(), $available_lib->getFriendlyName()));
			}
		}
	}
}

$tab =& $admin->tabs[$libname];

if (isset($params['reset']))
{
	foreach($lib->options as $option)
	{
		$pref_name = 'captchalib_' . $libname . '_' . $option->getName();
		$this->RemovePreference($pref_name);
	}
	$tab->addMessage($this->Lang('msg_restored_defaults'));
}
elseif ($changes)
{
	$tab->addMessage($this->Lang('msg_changes'));
}
else
{
	$tab->addMessage($this->Lang('msg_changes'));
}

$params['active_tab'] = $params['libname'];
echo $this->getAdminHtml($id, $returnid, $params);

?>