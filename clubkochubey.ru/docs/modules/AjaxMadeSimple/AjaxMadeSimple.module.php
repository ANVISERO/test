<?php
# AjaxMadeSimple. A plugin for CMS - CMS Made Simple
# Copyright (c) 2006 by Morten Poulsen (morten@poulsen.org)
#
# CMS- CMS Made Simple is Copyright (c) Ted Kulp (wishy@users.sf.net)
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA


class AjaxMadeSimple extends CMSModule {
	var $ajaxmsactive=false;
	var $config=array();

	function GetName() {
		return 'AjaxMadeSimple';
	}

	function GetFriendlyName() {
		return $this->Lang('friendlyname');
	}

	function GetVersion() {
		return '0.1.6';
	}

	function GetHelp() {
		return $this->Lang('help');
	}

	function GetAuthor() {
		return 'Silmarillion';
	}

	function GetAuthorEmail()	{
		return 'morten@poulsen.org';
	}

	function GetChangeLog()	{
		return $this->ProcessTemplate("changelog.tpl");
	}

	function IsPluginModule() {
		return false;
	}

	function HasAdmin() {
		return false;
	}

	function GetAdminSection() {
		return 'extensions';
	}

	function GetAdminDescription() {
		return $this->Lang('moddescription');
	}

	function MinimumCMSVersion() {
		return "1.1";
	}

	function Install()
	{
		// create a permission
//		$this->CreatePermission('changeajaxsettings', $this->Lang('permission'));

		// register an event that the Skeleton will issue. Other modules
		// or user tags will be able to subscribe to this event, and trigger
		// other actions when it gets called.
		//		$this->CreateEvent( 'OnSkeletonPreferenceChange' );

		// put mention into the admin log
		$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('installed',$this->GetVersion()));
	}


	//function InstallPostMessage(){	return $this->Lang('postinstall');}
	//function UninstallPostMessage(){	return $this->Lang('postinstall');}


	function Upgrade($oldversion, $newversion) {
	  $current_version = $oldversion;

    // put mention into the admin log
	  $this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('upgraded',$this->GetVersion()));
	}

	function UninstallPreMessage() {
		return $this->Lang('really_uninstall');
	}


	function Uninstall() {
		// put mention into the admin log
		$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('uninstalled'));
	}

	function GetHeaderHTML() {	
	  if ($this->ajaxmsactive)
	  {
	  	
	  	// NOTE: It's perhaps better to use the core CMSMS features just 'in case of'.
	  	//return '<script language="JavaScript" type="text/javascript" src="'.$GLOBALS["config"]["root_url"].'/modules/AjaxMadeSimple/ajaxmadesimple.js.php" ></script>';
	  	
	  	if (count($this->config) == 0)
	  	{
	  		$this->config = $this->GetConfig();
	  	}
	  		  	
	  	return '<script language="JavaScript" type="text/javascript" src="'.$this->config['root_url'].'/modules/AjaxMadeSimple/ajaxmadesimple.js.php" ></script>';
	  }
	  else 
	  {
	  	return '';
	  }
	}
	
	function ContentPostRender(&$content) {
	  $tempcontent=$content;
	  $pos=stripos($tempcontent,"</head");
	  
	  if ($pos===false) return $content;
	  
	  $content=substr($content,0,$pos).$this->GetHeaderHTML().substr($content,$pos);
	  
	  return $content;
	}

	function RegisterAjaxRequester($modulename, $textid,$divid,$method="",$filename="",$params=array(),$formfields=array(),$refresh=-1)  {	  
    if (session_id()=="") session_start();
		if (!$this->ajaxmsactive) {
		  //Clear old values
		  $_SESSION["ajaxmsgeneratedcode"]="";
		  unset($_SESSION["ajaxmsgeneratedcode"]);
		}
		$this->ajaxmsactive=true;
		
	  $name=$modulename.$textid;

	  $starter='
function gethttp() {
  var http_request = false;
  if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    http_request = new XMLHttpRequest();
  } else if (window.ActiveXObject) { // IE
    try {
      http_request = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        http_request = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e) {}
    }
  }
  if (!http_request) {
    alert("Giving up :( Cannot create an XMLHTTP instance");
    return false;
  } else {
    return http_request;
  }
}
';

	  $requester="
function make".$name."Request() {
  var http_request=gethttp();
  http_request.onreadystatechange = function() { alert".$name."(http_request,true); };";

    $submithandler="";
		if (count($formfields)>0) {
			$fields="";
		  $values="";
		  $clears="";
		  $i=0;
		  foreach ($formfields as $field=>$option) {
		  	switch ($option) {
		  		case "clear" : {
		  			$fields.="
  var field".$i."=document.getElementById('".$field."');
  var value".$i."=field".$i.".value;";
		  			if ($values!="") $values.="&";
		        $values.=$field."='+value".$i."+'";
		        $clears.="
  field".$i.".value='';
";
		        break;
		  		}
		  		case "radio" : {
		  			$fields.="
	var radiochoices=document.getElementsByName('".$field."');
	var value".$i."='';
	for(var i=0; i < radiochoices.length; i++) {
	  if (radiochoices[i].checked==1) {
	    value".$i."=radiochoices[i].value;
	    break;
	  }
	}";
		  			if ($values!="") $values.="&";
		        $values.=$field."='+value".$i."+'";
		        break;
		  		}


		  		default: {
		  			$fields.="
  var field".$i."=document.getElementById('".$field."');
  var value".$i."=field".$i.".value;";
		  			if ($values!="") $values.="&";
		        $values.=$field."='+value".$i."+'";
		  		}
		  	}

		    $i++;
		  }

		  $submithandler="
function ".$name."FormSubmit(myform) {
  ".$fields."
  ".$clears."
";
$submithandler.="
  var http_request=gethttp();
  http_request.onreadystatechange = function() { alert".$name."(http_request,false); };
";
		}

    //if ($fields
	  $vars="";
	  if (count($params)>0) {
	  	foreach ($params as $paramname=>$value) {
	  		if ($vars!="") $vars.="&";
	  		$vars.=$paramname."=".$value;//base64_encode
	  	}
	  }
	  if ($method!="") {
	    $requester.="
  http_request.open('GET', '".$this->config['root_url']."/modules/AjaxMadeSimple/requesthandler.php?module=".$modulename."&method=".$method."&".$vars."', true);
  http_request.send(null);
";

	  	if ($submithandler!="") {
	  	  $submithandler.="
  http_request.open('GET', '".$this->config['root_url']."/modules/AjaxMadeSimple/requesthandler.php?module=".$modulename."&method=".$method."&".$values."&".$vars."', true);
  http_request.send(null);
  return false;
}
";
	  	}
	  } else {
	  	$requester.="
  http_request.open('GET', '".$this->config['root_url']."/modules/".$modulename."/".$filename."?".$vars."', true);
  http_request.send(null);
";
	  	if ($submithandler!="") {
	  	  $submithandler.="
  http_request.open('GET', '".$this->config['root_url']."/modules/".$modulename."/".$filename."?".$values."&".$vars."', true);
  http_request.send(null);
  return false;
}
";
	  	}
    }
    $requester.="}
";

    $requesters=$requester;


    $submithandlers=$submithandler;

    $alert="
function alert".$name."(http_request,refresh) {
  if (http_request.readyState == 4) {
    if (http_request.status == 200) {
      element=document.getElementById('".$divid."');
      element.innerHTML=http_request.responseText;
      h = element.scrollHeight;
      element.scrollTop = h;";
      if ($refresh!="") {
    	  $alert.="
      if (refresh) window.setTimeout('make".$name."Request()',".$refresh.");";
      }
    $alert.="
    } else {
      alert('There was a problem with the request.');
    };";


    $alert.="
  }
}
";
    $alerts=$alert;
		$refreshstarters="";
    if ($refresh!=-1) {
    	$refreshstarter="make".$name."Request();
";
    	$refreshstarters=$refreshstarter;
    }
    $code=$starter.$requesters.$submithandlers.$alerts.$refreshstarters;

    
    $_SESSION["ajaxmsgeneratedcode"].=$code;
    //echo $_SESSION["ajaxmsgeneratedcode"];
    //$this->SetPreference("generatedcode",$this->GetPreference("generatedcode").$code);
	}

	/**
	 * Get an onsubmit condition for your ajax form
	 *
	 * @param string $modulename The module you want to work with
	 * @param string $textid an id (??)
	 * @param string $pre Javascript you want to put before the FormSubmit.
	 * @param string $post Javascript you want to put post the FormSubmit.
	 * @return string Returns [onsubmit="blabla"]
	 */

	function GetFormOnSubmit($modulename,$textid,$pre="",$post="") {
		$name=$modulename.$textid;
	  return " onsubmit='".$pre."return ".$name."FormSubmit();".$post."'";
	}
	
	/**
	 * This function allow you to run a part of your module externaly, so you can load it in an iframe, for example
	 *
	 * @param string $modulename Name of the module you call
	 * @param string $method Name of the method you want to execute
	 * @param string $vars List of vars in a POST style string 
	 * @param vars $valuesList of value in a POST style string 
	 * @return string An url to load to get the method executed
	 */
	
	function GetRequestURL ($modulename, $method, $vars='', $values='')
	{
		if ($values != '')
		{
			return $this->config['root_url']."/modules/AjaxMadeSimple/requesthandler.php?module=".$modulename."&method=".$method."&".$values."&".$vars."";
		}
		else 
		{
			return $this->config['root_url']."/modules/AjaxMadeSimple/requesthandler.php?module=".$modulename."&method=".$method."&".$vars."";
		}
	}
}

// Cross compatibility between PHP4 and PHP5
if (!function_exists("stripos")) {
	/**
	 * Find position of first occurrence of a case-insensitive string
	 *
	 * @param string $haystack The string where to search
	 * @param string $needle The string to search in the haystack
	 * @param int $offset The position to begin searching in the haystack
	 * @return Return a numeric value of the first occurence of needle in the haystack. Return boolean FALSE if nothing is found.
	 */
  function stripos($haystack,$needle,$offset=0)
  {
      return strpos(strtolower($haystack),strtolower($needle),$offset);
  }
}

?>