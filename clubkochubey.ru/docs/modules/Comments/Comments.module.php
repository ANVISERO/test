<?php
#CMS - CMS Made Simple
#(c)2004 by Ted Kulp (wishy@users.sf.net)
#This project's homepage is: http://cmsmadesimple.sf.net
#
#This program is free software; you can redistribute it and/or modify
#it under the terms of the GNU General Public License as published by
#the Free Software Foundation; either version 2 of the License, or
#(at your option) any later version.
#
#This program is distributed in the hope that it will be useful,
#but WITHOUT ANY WARRANTY; without even the implied warranty of
#MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#GNU General Public License for more details.
#You should have received a copy of the GNU General Public License
#along with this program; if not, write to the Free Software
#Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#
#$Id: Comments.module.php 2114 2005-11-04 21:51:13Z wishy $

$cgextensions = cms_join_path($gCms->config['root_path'],'modules',
			      'CGExtensions','CGExtensions.module.php');
if( !is_readable( $cgextensions ) )
{
  echo '<h1><font color="red">ERROR: The CGExtensions module could not be found.</font></h1>';
  return;
}
require_once($cgextensions);

class Comments extends CGExtensions
{
	function GetName()
	{
		return 'Comments';
	}

	function GetVersion()
	{
		return '1.9.2';
	}

	function GetHelp($lang = 'en_US')
	{
		return $this->Lang('help');
	}

	function GetAuthor()
	{
		return 'Ted Kulp';
	}

	function GetAuthorEmail()
	{
		return 'ted@cmsmadesimple.org';
	}

	function Install()
	{
		$db = $this->cms->db;
		$dict = NewDataDictionary($db);
		$flds = "
			comment_id I KEY,
			comment_data X,
			comment_date ".CMS_ADODB_DT.",
			comment_author C(255),
			author_email C(255),
			author_website C(255),
			page_id C(255),
			module_name C(50),
			active I1,
			create_date DT,
			modified_date DT,
			comment_title C(255),
			trackback I1,
			editor I1,
			author_notify I1,
			notified I1,
			ip C(25)
		";
		$taboptarray = array('mysql' => 'TYPE=MyISAM');
		$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_comments", $flds, $taboptarray);
		$dict->ExecuteSQLArray($sqlarray);

		$db->CreateSequence(cms_db_prefix()."module_comments_seq");
		
		$this->CreatePermission('Manage Comments', 'Manage Comments');

		# Install template
		$this->SetTemplate('default_display', $this->GetTemplateFromFile('default_display'));
		
		$this->SetPreference('moderate', ''); // Spam protect off by default
		$this->SetPreference('spamprotect', '');
		$this->SetPreference('disable_html', 1); //  Disable HTML for everyone by default
		$this->SetPreference('akismet_check',0);//Disable spam checking
		$this->SetPreference('enable_trackbacks',0);// Enable trackbacks
		$this->SetPreference('enable_trackback_backlink_check',0);// Enable trackback link check
		$this->SetPreference('enable_cookie_support',0);// Enable cookie support for restore the form values

	}

	function InstallPostMessage()
	{
		return $this->Lang('postinstall');
	}

	function Upgrade($oldversion, $newversion)
	{
		$current_version = $oldversion;
		switch($current_version)
		{
			case "1.0":
			case "1.1":
			case "1.2":
			case "1.3":
				$this->CreatePermission('Manage Comments', 'Manage Comments');
				$current_version = '1.4';
			case "1.4":
				$db =& $this->GetDb();
				$dict = NewDataDictionary($db);
				$flds = "
					author_email C(255),
					author_website C(255)
				";
                $sqlarray = $dict->AddcolumnSQL(cms_db_prefix()."module_comments", $flds);
				$dict->ExecuteSQLArray( $sqlarray );

				$current_version = '1.5';
			case "1.5":
				$db =& $this->GetDb();

				$dict = NewDataDictionary($db);
				$flds = "
					module_name C(50),
					active I1
				";
                $sqlarray = $dict->AddcolumnSQL(cms_db_prefix()."module_comments", $flds);
				$dict->ExecuteSQLArray( $sqlarray );

				$db->Execute("UPDATE ".cms_db_prefix()."module_comments SET module_name = ''");
				$db->Execute("UPDATE ".cms_db_prefix()."module_comments SET active = 1");
				$current_version = '1.6';	
			case "1.6":
				# Install template
				$this->SetTemplate('default_display', $this->GetTemplateFromFile('default_display'));
				$current_version = '1.7';
			case "1.7":
			case "1.7.1":
			case "1.7.2":
			case "1.8.0":
			case "1.8.1":
			case "1.8.2":
				# Add title and trackback fields
				$db =& $this->GetDb();
				$dict = NewDataDictionary($db);
				$flds = "
					comment_title C(255),
					trackback I1,
					editor I1,
					author_notify I1,
					notified I1,
					ip C(25)
				";
                $sqlarray = $dict->AddcolumnSQL(cms_db_prefix()."module_comments", $flds);
                $dict->ExecuteSQLArray( $sqlarray );
				# Install template
				$this->SetTemplate('default_display', $this->GetTemplateFromFile('default_display'));
				# Disable trackbacks by default
				$this->SetPreference('enable_trackbacks',0);
				$this->SetPreference('enable_trackback_backlink_check',0);
				$this->SetPreference('enable_cookie_support',0);
		}
		// Disable HTML for upgrades from all version previous to 1.8.0
		if ($current_version < '1.8.0')
		{
			$this->SetPreference('disable_html', 1); //  Disable HTML for everyone by default	
			$this->SetPreference('akismet_check',0); //Disable spam checking
		}
	}
	
	function Uninstall()
	{
		$db = $this->cms->db;
		$dict = NewDataDictionary($db);
		$sqlarray = $dict->DropTableSQL(cms_db_prefix()."module_comments");
		$dict->ExecuteSQLArray($sqlarray);

		$db->DropSequence(cms_db_prefix()."module_comments_seq");

		$this->RemovePermission('Manage Comments');
	}

	function GetDependencies()
	{
	  return array('CGExtensions'=>'1.9',
		       'CGSimpleSmarty'=>'1.4');
	}

	function GetChangeLog()
	{
		return "
                        1.9.2: January, 2009 - Calguy1000<br/>
                        <ul>
                        <li>Fix ugly problem when moderation is on, that it would not redirect back to the designated url.</li>
                        <li>Removed badly implemented trackback capability</li>
                        <li>Removed badly implemented Edit.com? (whatever this was) functionality</li>
                        <li>Renamed the notification stuff so that it made sense</li>
                        <li>Made the edit-comment form inline.</li>
                        <li>Revised the default display template</li>
                        <li>Call SetParameterType for all parameters so that no more warnings are generated.</li>
                        </ul>
                        <br/>
			1.9: Oct 6, 2008 (updates by Elijah Lofgren and Andi Petzoldt)<br />
			Added Admin Pagination using code from Products module.<br />
			Added trackback functionality for using the news module as a blog.<br />
			Added spam protection for the trackback functionality (IP-based and remote website analysis).<br />
			Added functionality to edit the author website and email.<br />
			Added possibility to distinguish between comments from visitors or editors or trackbacks.<br />
			Added IP logging.<br />
			Added notify functionality (EMail and RSS) for a comment author by new comments.<br />
			Added cookie support for restoring the form values.<br />
			Some code cleaning.<br />
			1.8.3 March 2008 (updates by Elijah Lofgren<br />
			Added title field.
			1.8.1: August 2007 (updates by Elijah Lofgren<br />
			CMSMS 1.1 compatibility and various little fixes.
			1.8: December 2006 (updates by Elijah Lofgren)<br />
			Various little fixes.
			Offload Capcha capability to the Captcha module. Disable Captcha by default since it requires a another module.
			Add ability to disable HTML in comments and turn it on by default and for upgrades to prevent XSS vulnerabilities.
			1.7: June 2006 (updates by Elijah Lofgren)<br />
			Made comment form be shown on the same page as the comments and shown/hidden with the startExpandCollapse tag.
			Combined templates into 1 template and made it be stored in a separate file.
			1.6: May 2006 (updates by Ted/wishy)<br />
			Added moderate functionaltiy/active flags
			Added ability to work from modules, though it's not automated
			1.5: April 2006 (updates by Katon)<br />
			Added mass delete functionality<br />
			Added author email and author website fields<br />
			1.4: April 2006 (updates by Katon)<br />
			Actions moved in separate files<br />
			Added admin management panel<br />
			Added mailing functionality<br />
			Added spamprotect functionality<br />
			1.3: Module API changes<br />
			1.2: Oct 13, 2004<br />
			Added newline parsing (kickthedonkey)<br />
			Removed a rogue div (kickthedonkey)<br />
			1.1: Sep 28, 2004<br />
			Added <em>number</em> and <em>dateformat</em> options, plus little cosmetic changes.<br />
			1.0: Initial Release
		";
	}

	function SetParameters()
	{
	  $this->RegisterModulePlugin();
	  $this->RestrictUnknownParams();

	  // Make it possible to include HTML in comments by disabling HTML cleaning.		
	  // The "Disable HTML" option can still be used to disable HTML and prevent issue with that..
	  $this->SetParameterType('pageid',CLEAN_INT);
	  $this->SetParameterType('modulename',CLEAN_STRING);
	  $this->SetParameterType('emailfield',CLEAN_STRING);
	  $this->SetParameterType('websitefield',CLEAN_STRING);
	  $this->SetParameterType('website',CLEAN_STRING);
	  $this->SetParameterType('email',CLEAN_STRING);
	  $this->SetParameterType('image',CLEAN_STRING);
	  $this->SetParameterType('title',CLEAN_STRING);
	  $this->SetParameterType('author',CLEAN_STRING);
	  $this->SetParameterType('submitcomment',CLEAN_STRING);
	  $this->SetParameterType('cancelcomment',CLEAN_STRING);
	  $this->SetParameterType('redirecturl',CLEAN_STRING);
	  $this->SetParameterType('number',CLEAN_INT);
	  $this->SetParameterType('dateformat',CLEAN_STRING);
	  $this->SetParameterType('localeformat',CLEAN_STRING);
	  $this->SetParameterType('imgLoc',CLEAN_STRING);
	  $this->SetParameterType('authornotify',CLEAN_INT);
	  $this->SetParameterType('captcha_phrase',CLEAN_STRING);
	  $this->SetParameterType('list_template',CLEAN_STRING);

	  $this->SetParameterType('content', CLEAN_NONE);
	  $this->SetParameterType('redirecturl',CLEAN_NONE);
	  
	  $this->CreateParameter('inline','',$this->Lang('help_inline'));
	  $this->SetParameterType('inline',CLEAN_INT);

	  $this->CreateParameter('usesession','',$this->Lang('help_usesession'));
	  $this->SetParameterType('usesession',CLEAN_INT);
	  $this->CreateParameter('dateformat', '', $this->lang('helpdateformat'));
	  $this->CreateParameter('localedateformat', '', $this->lang('helplocaledateformat'));
	  
	  $this->CreateParameter('number', '5', $this->lang('helpnumber'));
	}

    function isValidURL($url)
    {
        return preg_match("/^[a-zA-Z]+[:\/\/]+[A-Za-z0-9\-_]+\\.+[A-Za-z0-9\.\/%&=\?\-_]+$/i", $url);
    }
	
    function isValidEmail($email)
    {
        return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/i", $email);
    }

	function trackbackError ($error) {
		global $config, $db;
		header ("Content-type: text/xml");
		echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
		echo "<response>\n";
		echo "<error>1< /error>\n";
		echo "<message>$error</message>\n";
		echo "</response>\n";
		#if ($errorlog = fopen($config['root_path']."/tmp/trackback_error.log", "a")) {
		#	fwrite($errorlog, date("d.m.Y H:i:s")." - ".$error."\n");
		#	fclose($errorlog);
		#}
		exit;
	}

	/**
	 * Should always get this page url even when using internal pretty urls
	 */
	function selfURL()
	{
		$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
		$protocol = $this->strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s;
		$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
 		$s = $protocol."://".$_SERVER['SERVER_NAME'].$port;

		global $gCms;
		$config =& $gCms->GetConfig();
		return $s.$_SERVER['REQUEST_URI'];
		  //return $config['root_url'].$_SERVER['REQUEST_URI'];
	}

	function strleft($s1, $s2)
	{
		return substr($s1, 0, strpos($s1, $s2));
	}

    function IsPluginModule()
	{
		return true;
	}

	function HasAdmin()
	{
		return true;
	}

    function VisibleToAdminUser()
    {
      return $this->CheckPermission('Manage Comments');
    }

	function MinimumCMSVersion()
	{
		return '1.4.1';
	}

	function GetAdminDescription()
	{
		return $this->Lang('description');
	}

	function GetAdminSection()
	{
		return 'content';
	}
	
}

# vim:ts=4 sw=4 noet
?>