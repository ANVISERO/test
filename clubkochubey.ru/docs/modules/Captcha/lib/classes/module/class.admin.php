<?php

require_once 'class.admin_tab.php';

class CaptchaModuleAdmin
{
	var $db;
	var $smarty;
	
	var $tabs;
	
	function CaptchaModuleAdmin(&$db, &$smarty)
	{
		$this->db =& $db;
		$this->smarty =& $smarty;
		$this->tabs = array();
	}
	
	function & getTabs()
	{
		$tabs =& $this->tabs;
		return $tabs;
	}
	
	function & getTab($name)
	{
		$tab =& $this->tabs[$name];
		return $tab;
	}
	
	function addTab(&$tab)
	{
		$tabs =& $this->tabs;
		$tabs[$tab->getName()] =& $tab;
	}
	
}

?>