<?php 
/*
Author: Noel McGran
Email:  nmcgran@telus.net

LinkMgr is a CMSmadesimple module that provides
a simple interface for managing external links. 

*/
class LinkMgr extends CMSModule{
	function GetName(){
		return 'LinkMgr';
	}
	function GetFriendlyName(){
		return $this->Lang('friendlyname');
	}
	function GetVersion(){
		return '1.5.1';
	}
	function GetHelp(){
		return $this->Lang('help');
	}
	function GetAuthor(){
		return 'Noel McGran';
	}
	function GetAuthorEmail(){
		return 'nmcgran@telus.net';
	}
	function GetChangeLog(){
		return $this->Lang('changelog');
	}
	function SetParameters(){
		$this->RestrictUnknownParams();
		$this->CreateParameter('template', 'default', $this->Lang('help param template'));
		$this->CreateParameter('category', '', $this->lang('help_category'));
		$this->SetParameterType('template',CLEAN_STRING);
		$this->SetParameterType('category',CLEAN_STRING);
	}
	function IsPluginModule(){
		return true;
	}
	function HasAdmin(){
		return true;
	}
	function GetAdminSection(){
		return 'content';
	}
	function GetAdminDescription(){
		return $this->Lang('moddescription');
	}
	function VisibleToAdminUser(){
        	return $this->CheckPermission('LinkMgr: modify links');
	}
	function GetDependencies(){
		return array();
	}
	function MinimumCMSVersion(){
		return "1.0";
	}
	function InstallPostMessage(){
		return $this->Lang('postinstall');
	}
	function UninstallPostMessage(){
		return $this->Lang('postuninstall');
	}
}
?>
