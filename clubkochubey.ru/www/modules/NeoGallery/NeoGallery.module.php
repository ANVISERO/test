<?php
# NeoGallery. A plugin for CMS - CMS Made Simple
# Copyright (c) 2008 by Morten Poulsen <morten@poulsen.org>
#
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

if (!function_exists("stripos")) {
	function stripos($str,$needle) {
		return strpos(strtolower($str),strtolower($needle));
	}
}

class NeoGallery extends CMSModule {
	var $headeradditions="";
	function GetName() {
		//$this->CreateLink($id,"editgallery",$returnid,">",$params,"",true,
		return 'NeoGallery';
	}

	function GetFriendlyName() {
		return $this->Lang('friendlyname');
	}

	function GetVersion() {
		return '0.1.1';
	}

	function GetHelp() {
		return $this->Lang('help');
	}

	function GetAuthor() {
		return 'Morten Poulsen (Silmarillion)';
	}

	function GetAuthorEmail()	{
		return 'morten@poulsen.org';
	}
	
	function ContentPostRender(&$content) {
		if ($this->headeradditions=="") return $content;
		$pos=strpos(strtolower($content),"</head");
		if ($pos===false) return $content;
		$content=substr($content,0,$pos).$this->headeradditions.substr($content,$pos);
		return $content;
	}
	
	function AddToHeader($newheadinfo) {
		if (stripos($this->headeradditions,$newheadinfo)===false) {
			$this->headeradditions.=$newheadinfo;
		}
	}

	/*
	 function GetHeaderHTML() {
		echo "hiasdfasdfasd";
		if ($this->headeradditions!="") return $this->headeradditions;
		}
		*/
	function IsPluginModule() {
		return true;
	}

	function HasAdmin() {
		return true;
	}

	function GetAdminSection() {
		return 'content';
	}

	function GetAdminDescription() {
		return $this->Lang('moddescription');
	}

	function MinimumCMSVersion() {
		return "1.3";
	}

	function VisibleToAdminUser() {
		return ($this->CheckPermission("Administrate NeoGallery") || $this->CheckPermission('Modify Site Preferences'));
	}

	function GetDependencies() {
		return array('Thumbnails'=>'0.1.1');
	}

	function SetParameters() {
		//	$this->RestrictUnknownParams();
		$this->RegisterModulePlugin();

		$this->params=array();
		$this->CreateParameter('gallery', 'mygallery', $this->lang('helpgallery'));
		$this->SetParameterType('gallery',CLEAN_STRING);

		$this->CreateParameter('template', 'mytemplate', $this->lang('helptemplate'));
		$this->SetParameterType('template',CLEAN_STRING);

		$this->CreateParameter('imagesperpage', '10', $this->lang('helpimagesperpage'));
		$this->SetParameterType('imagesperpage',CLEAN_INT);
		
		$this->CreateParameter('image', '/uploads/images/mypic.jpg', $this->lang('helpimage'));
		$this->SetParameterType('image',CLEAN_STRING);
		
		$this->CreateParameter('subsystem', 'greybox', $this->lang('helpsubsystem'));
		$this->SetParameterType('subsystem',CLEAN_STRING);
		
		$this->CreateParameter('description', 'My picture', $this->lang('helpdescription'));
		$this->SetParameterType('description',CLEAN_STRING);
		
		$this->CreateParameter('float', '', $this->lang('helpfloat'));
		$this->SetParameterType('float',CLEAN_STRING);
		
		$this->CreateParameter('size', '', $this->lang('helpsize'));
		$this->SetParameterType('size',CLEAN_STRING);		
		
		$this->CreateParameter('addstyle', '', $this->lang('helpaddstyle'));
		$this->SetParameterType('addstyle',CLEAN_STRING);
		
		$this->CreateParameter('addtext', '', $this->lang('helpaddtext'));
		$this->SetParameterType('addtext',CLEAN_STRING);

		/*$this->CreateParameter('moretext', '...', $this->lang('helpmoretext'));
		 $this->SetParameterType('moretext',CLEAN_STRING);

		 //$this->CreateParameter('module_error', '', $this->lang('helpinternal'));
		 $this->SetParameterType('module_error',CLEAN_STRING);
		 $this->SetParameterType('module_message',CLEAN_STRING);
		 $this->SetParameterType('author',CLEAN_STRING);
		 $this->SetParameterType('text',CLEAN_STRING);
		 $this->SetParameterType('captcha',CLEAN_STRING);
		 $this->SetParameterType('submit',CLEAN_STRING);

		 //$this->CreateParameter('entryid', '', $this->lang('helpinternal'));
		 $this->SetParameterType('entryid',CLEAN_INT);
		 */
	}




	function InstallPostMessage() {
		return $this->Lang('postinstall');
	}

	function UninstallPostMessage()	{
		return $this->Lang('uninstalled');
	}



	function UninstallPreMessage() {
		return $this->Lang('really_uninstall');
	}


	function Slash($str,$str2="",$str3="") {
		if ($str=="") return $str2;
		if ($str2=="") return $str;
		if ($str[strlen($str)-1]!="/") {
			if ($str2[0]!="/") {
				return $str."/".$str2;
			} else {
				return $str.$str2;
			}
		} else {
			if ($str2[0]!="/") {
				return $str.$str2;
			} else {
				return $str.substr($str2,1); //trim away one of the slashes
			}
		}
		//Three strings not supported yet...
		return "Error in Slash-function. Please report";
	}


	function FileManagerCompareFiles($a,$b) {
		/*print_r($a);
		 print_r($b);*/
		if ($a["dir"] || $b["dir"]) {
			if ($a["dir"] && $b["dir"]) {
				return strncasecmp($a["name"],$b["name"],strlen($a["name"]));
			} else {
				if ($a["dir"]) return -1; else return 1;
			}
		}
		return strncasecmp($a["name"],$b["name"],strlen($a["name"]));
	}

	function columnSort($unsorted) {
		$sorted = $unsorted;
		for ($i=0; $i < sizeof($sorted)-1; $i++) {
			for ($j=0; $j<sizeof($sorted)-1-$i; $j++) {
				if ($this->FileManagerCompareFiles($sorted[$j],$sorted[$j+1])>0) {
					$tmp = $sorted[$j];
					$sorted[$j] = $sorted[$j+1];
					$sorted[$j+1] = $tmp;
				}
			}
		}
		return $sorted;
	}

	function FormatFileSize($_size) {
		$unit=$this->Lang("bytes");
		//$size=$filelist[$i]["size"];
		$size=$_size;
			
		if ($size>10000 && $size<(1024*1024)) {
			$size=round($size/1024);
			$unit=$this->Lang("kb");
		}
			
		if ($size>(1024*1024)) {
			$size=round($size/(1024*1024),1);
			$unit=$this->Lang("mb");
		}
			
		if ($this->GetPreference("thousanddelimiter")!="") {
			$size=number_format($size,0,"",$this->GetPreference("thousanddelimiter"));
		}
			
		$result=array();
		$result["size"]=$size;
		$result["unit"]=$unit;
		return $result;
	}



	function CountImages($gid,$includehidden=false) {

		$config =$this->GetConfig();

		$gallery=$this->GetGallery($gid);
		if (!$gallery) return false;
		$path=$gallery["path"];
		$realpath=$this->Slash($config["root_path"],$path);
		$dir=@opendir($realpath);
		if (!$dir) return false;
		$count=0;
		while ($file=readdir($dir)) {
			if ($file==".") continue;
			if ($file=="..") continue;
			if ($file[0]==".") continue;
			if (substr($file,0,6)=="thumb_") {
				continue;
			}
			if (is_dir($this->Slash($realpath,$file))) {
				continue;
			}
			$allowedext=array("jpg","gif","png");

			$explodedfile=explode(".",$file);
			$ext=strtolower(array_pop($explodedfile));
			if (!in_array($ext,$allowedext)) continue;
			$info["hidden"]=$this->GetImageProp("hidden",$file,$gid,"");
			if ($info["hidden"]=="1" && $includehidden=false) continue;
			$count++;
		}
		//$result=$this->columnSort($result);
		return $count;
	}

	function GetImageList($gid,$page="",$imagesperpage="",$includehidden=false,$markshow=true) {
		//echo "<b>$path</b>";
		$result=array();

		$config =$this->GetConfig();
		
		$gallery=$this->GetGallery($gid);
		
		if (!$gallery) return false;
		$path=$gallery["path"];
		$realpath=$this->Slash($config["root_path"],$path);
		$dir=@opendir($this->Slashes($realpath));
		if (!$dir) return false;
		$offset=0;
		if ($page!="") $offset=($page-1)*$imagesperpage;
		$count=0;
		
		//echo $offset.".".$imagesperpage;
		while ($file=readdir($dir)) {
			if ($file==".") continue;
			if ($file=="..") continue;
			if ($file[0]==".") continue;
			if (substr($file,0,6)=="thumb_") {
				continue;
			}

			if (is_dir($this->Slash($realpath,$file))) {
				continue;
			}
			$allowedext=array("jpg","gif","png");

			$explodedfile=explode(".",$file);
			$ext=strtolower(array_pop($explodedfile));
			if (!in_array($ext,$allowedext)) continue;
			//echo $file;
			$info=array();
			$info["name"]=$file;
			$info["base64"]=base64_encode($file);

			$statinfo=stat($this->Slash($realpath,$file));
			$info["size"]=$statinfo["size"];
			$info["date"]=$statinfo["atime"];
			$info["url"]=$this->Slashes($config["root_url"].$this->Slash($path,$file));

			$info["fullpath"]=$this->Slash($realpath,$file);

			$info["ext"]=$ext;
			$info["thumbnailimg"]=$this->GetThumbnailImg($file,$path);
			
			$info["thumbnailurl"]=$this->GetThumbnailUrl($file,$path);
			$info["info"]=$this->GetImageInfo($info["fullpath"]);

			$info["description"]=$this->GetImageProp("description",$file,$gid,"");

			$info["hidden"]=$this->GetImageProp("hidden",$file,$gid,"");

			//Ignore images set to be hidden in props
			if ($info["hidden"]=="1" && $includehidden==false) continue;
			$count++;
			$info["show"]="1";
			if ($page!="") {
				if ($count<=$offset) {
					if ($markshow) {
						$info["show"]="0";
					} else continue;
				}
				if ($count>$offset+$imagesperpage) {
					if ($markshow) {
						$info["show"]="0";
					} else break;
				}
			}

			$result[]=$info;
		}


		if (count($result)==0) return false;

		//$result=$this->columnSort($result);
		return $result;
	}

	function GetImageInfo($file) {
		$temp=getimagesize($file);
		if ($temp) {
			$info=$temp[0]."x".$temp[1]."x".$temp["bits"];
			return $info;
		} else {
			return false;
		}
	}

	function GetThumbnailImg($file,$path,$forcesize="") {
		$thumbnails=$this->GetModuleInstance("Thumbnails");
		return $thumbnails->GetThumbnailImageTag($file,$path,"",$forcesize);//,20
	}

	function GetThumbnailUrl($file,$path,$forcesize="") {
		$thumbnails=$this->GetModuleInstance("Thumbnails");
		return $thumbnails->GetThumbnailImageUrl($file,$path,$forcesize);//,20
	}

	function GetSubsystemList() {
		$subsystems=array();
		$dir=@opendir(dirname(__FILE__)."/subsystems/");
		if (!$dir) return false;
		while ($file=readdir($dir)) {
			if ($file==".") continue;
			if ($file=="..") continue;
			if ($file[0]==".") continue;
			$subsystems[$this->Lang("dropdown_".$file)]=$file;
		}
		ksort($subsystems);
		if (count($subsystems)==0) return false;
		return $subsystems;
	}

	function GetDefaultTemplateArray() {
		$defaulttemplates=$this->GetDefaultTemplates();
		$result=array();
		foreach($defaulttemplates as $template) {
			$result[$template["textid"]]=$template["textid"];
		}
		return $result;
	}

	function GetDefaultTemplates() {
		$defaulttemplates=array();
		$dir=@opendir(dirname(__FILE__)."/templates/subsystems/");
		if (!$dir) return false;
		while ($file=readdir($dir)) {
			if ($file==".") continue;
			if ($file=="..") continue;
			if ($file[0]==".") continue;
			$template=array();
			$template["id"]=-1;
			$template["textid"]=str_replace(".tpl","",$file);
			$defaulttemplates[]=$template;
		}
		//ksort($defaulttemplates);
		if (count($defaulttemplates)==0) return false;
		return $defaulttemplates;
	}

	function ChangeGalleryName($gid,$name) {
		$db=&$this->GetDB();
		$query="UPDATE ".cms_db_prefix()."module_neogallery SET name=? WHERE id=?";
		$result=$db->Execute($query,array($name,$gid));
	}

	function InsertGallery($name) {
		$db=$this->GetDb();
		$newid=$db->GenID(cms_db_prefix()."module_neogallery_seq");
		$sql="INSERT INTO ".cms_db_prefix()."module_neogallery (id,name) VALUES (?,?)";
		$values=array($newid,$name);
		$result=$db->Execute($sql,$values);
		return $newid;
	}

	function DeleteGallery($gid) {
		$db=&$this->GetDB();
		$query="DELETE FROM ".cms_db_prefix()."module_neogallery_props WHERE gallery=?";
		$result=$db->Execute($query,array($gid));
		$query="DELETE FROM ".cms_db_prefix()."module_neogallery WHERE id=?";
		$result=$db->Execute($query,array($gid));
		$this->DeleteImageProps($gid);
	}

	function IdentifyGallery($gallery) {
		//echo $gallery;
		if (is_numeric($gallery)) return $gallery;
		$galleries=$this->GetGalleries();
		if (!$galleries) return false;
		foreach ($galleries as $gal) {
			if ($gal["textid"]==$gallery && $gal["textid"]!="") return $gal["id"];
			if ($gal["name"]==$gallery && $gal["name"]!="") return $gal["id"];
		}
		return false;
	}

	function GetGallery($gid) {
		$db=$this->GetDB();

		$query="SELECT * FROM ".cms_db_prefix()."module_neogallery WHERE id=?";

		$result=$db->Execute($query,array($gid));
		if (!$result || ($result->RecordCount()==0)) {
			return false;
		}

		$row=$result->FetchRow();
		$props=$this->GetGalleryProps($gid);
		//print_r($props);
		$output=array_merge($row,$props);

		return $output;
	}

	function CountGalleries() {
		$db=&$this->GetDB();
		$query="SELECT id FROM ".cms_db_prefix()."module_neogallery";

		$result=$db->Execute($query);
		if (!$result) return false;
		return $result->RecordCount();

	}

	function GetGalleries() {
		$db=&$this->GetDB();
		$query="SELECT * FROM ".cms_db_prefix()."module_neogallery";

		$result=$db->Execute($query);
		if (!$result || ($result->RecordCount()==0)) {
			return false;
		}
		$output=array();
		while($row=$result->FetchRow()) {
			$props=$this->GetGalleryProps($row["id"]);
			$entry=array_merge($row,$props);
			$output[$row["name"]]=$entry;
		}
		return $output;
	}

	function GetGalleryArray() {
		$db=&$this->GetDB();
		$query="SELECT * FROM ".cms_db_prefix()."module_neogallery";

		$result=$db->Execute($query);
		if (!$result || ($result->RecordCount()==0)) {
			return false;
		}
		$output=array();
		while($row=$result->FetchRow()) {
			$output[$row["name"]]=$row["id"];
		}
		return $output;
	}

	function SetGalleryProp($gid,$name,$value) {
		$db=&$this->GetDB();
		$query="UPDATE ".cms_db_prefix()."module_neogallery_props SET propvalue=? WHERE propname=? AND gallery=?";
		$params=array($value,$name,$gid);
		$result=$db->Execute($query,$params);

		if (!$result || $result->RecordCount()==0) {
			$query="INSERT INTO ".cms_db_prefix()."module_neogallery_props (gallery,propname,propvalue) VALUES (?,?,?)";
			$params=array($gid,$name,$value);
			$result=$db->Execute($query,$params);
			if (!$result) {
				echo $db->ErrorMsg(); die();
			}
		}

		if (!$result) return false;
	}

	function GetGalleryProp($gid,$name,$default="") {
		$db=&$this->GetDB();
		$query="SELECT propvalue FROM ".cms_db_prefix()."module_neogallery_props WHERE propname=? AND gallery=?";
		$result=$db->Execute($query,array($name,$gid));
		if (!$result || $result->RecordCount()==0) return $default;
		$row=$result->FetchRow();
		return $row["propvalue"];
	}

	function GetGalleryProps($gid) {
		$db=&$this->GetDB();
		$query="SELECT propname,propvalue FROM ".cms_db_prefix()."module_neogallery_props WHERE gallery=?";
		$dbresult=$db->Execute($query,array($gid));
		$result=array();
		if (!$dbresult || $dbresult->RecordCount()==0) return $result;
		while ($row=$dbresult->FetchRow()) {
			$result[$row["propname"]]=$row["propvalue"];
		}
		return $result;
	}


	function SetImageProp($filename,$gid,$propname,$propvalue) {
		$db=&$this->GetDB();
		$query="UPDATE ".cms_db_prefix()."module_neogallery_imgprops SET propvalue=? WHERE propname=? AND filename=? AND gallery=?";
		$params=array($propvalue,$propname,$filename,$gid);
		$result=$db->Execute($query,$params);
		if (!$result || $result->RecordCount()==0) {
			$query="INSERT INTO ".cms_db_prefix()."module_neogallery_imgprops (propvalue,propname,filename,gallery) VALUES (?,?,?,?)";
			$result=$db->Execute($query,$params);
		}
		return ($result!==false);
	}

	function GetImageProp($propname,$filename,$gid,$default="") {
		$db=&$this->GetDB();
		$query="SELECT propvalue FROM ".cms_db_prefix()."module_neogallery_imgprops WHERE propname=? AND filename=? AND gallery=?";
		$result=$db->Execute($query,array($propname,$filename,$gid));
		if (!$result || $result->RecordCount()==0) return $default;
		$row=$result->FetchRow();
		return $row["propvalue"];
	}

	function GetImageProps($filename,$gid) {
		$db=&$this->GetDB();
		$query="SELECT propname,propvalue FROM ".cms_db_prefix()."module_neogallery_imgprops WHERE filename=? AND gallery=?";
		$dbresult=$db->Execute($query,array($filename,$gid));
		$result=array();
		if (!$dbresult || $dbresult->RecordCount()==0) return $result;
		while ($row=$dbresult->FetchRow()) {
			$result[$row["propname"]]=$row["propvalue"];
		}
		return $result;
	}

	function DeleteImageProps($gid) {
		$db=&$this->GetDB();
		$query="DELETE FROM ".cms_db_prefix()."module_neogallery_imgprops WHERE gallery=?";
		$dbresult=$db->Execute($query,array($gid));
		$result=array();
		if (!$dbresult || $dbresult->RecordCount()==0) return $result;
		while ($row=$dbresult->FetchRow()) {
			$result[$row["propname"]]=$row["propvalue"];
		}
		return $result;
	}

	function GetTemplateArray() {
		$output=$this->GetDefaultTemplateArray();
		/*foreach($this->subsystems as $subsystem=>$id) {
			$name="default_$subsystem ".$this->Lang("readonly");
			$output[$name]="default_$subsystem";
			}*/
		$db=$this->GetDb();
		$q="SELECT * FROM ".cms_db_prefix()."module_neogallery_templates";

		$result=$db->Execute($q);
		if ($result && ($result->RecordCount()>0)) {
			while($row=$result->FetchRow()) {
				$output[$row["textid"]]=$row["textid"];
			}
		}
		return $output;
	}

	function GetTemplates() {
		//$output=array();
		$output=$this->GetDefaultTemplates();
		/*foreach($this->subsystems as $subsystem=>$id) {
			$name="default_$subsystem ".$this->Lang("readonly");
			$row["textid"]=$name;
			$row["id"]=$id;
			$output[]=$row;
			}*/
		$db=$this->GetDb();
		$q="SELECT textid,id FROM ".cms_db_prefix()."module_neogallery_templates";

		$result=$db->Execute($q);
		if ($result && ($result->RecordCount()!=0)) {

			while($row=$result->FetchRow()) {
				$output[]=$row;
			}

		}
		//var_dump($output);
		return $output;
	}

	function AddTemplate($textid,$content) {
		/*echo $textid.$content;
		 die();*/
		$db=$this->GetDb();
		$newid=$db->GenID(cms_db_prefix()."module_neogallery_templates_seq");
		$sql="INSERT INTO ".cms_db_prefix()."module_neogallery_templates (id,textid,content) VALUES (?,?,?)";
		$values=array($newid,$textid,$content);
		$result=$db->Execute($sql,$values);
		//echo $db->ErrorMsg();mysql_error();die();
		return $newid;
	}

	function UpdateTemplate($tid,$textid,$content) {
		$db=$this->GetDb();
		$q="UPDATE ".cms_db_prefix()."module_neogallery_templates SET textid=?,content=? WHERE id=?";
		$p=array($textid,$content,$tid);
		$result=$db->Execute($q,$p);
		return true;
	}

	function DeleteTemplate($tid) {
		$db=$this->GetDb();
		$q="DELETE FROM ".cms_db_prefix()."module_neogallery_templates WHERE id=?";
		$p=array($id);
		$result=$db->Execute($q,array($tid));
		return true;
	}

	function GetDefaultTemplate($tid) {
		/*$subsys="";
		 foreach($this->subsystems as $subsystem=>$id) {
			if ($id==$tid) $subsys=$subsystem;
			}*/
		if (file_exists(dirname(__FILE__)."/templates/subsystems/".$tid.".tpl")) {
			$result=array();
			$result["content"]=@file_get_contents(dirname(__FILE__)."/templates/subsystems/".$tid.".tpl");
			if (!$result["content"]) return false;
			$result["textid"]=$tid;
			$result["id"]=-1;
			return $result;
		}
		return false;
		/*$result=array();
		 $result["content"]=file_get_contents(dirname(__FILE__)."/templates/subsystems/default_".$subsys.".tpl");
		 $result["textid"]=$name="default_$subsystem ".$this->Lang("readonly");
		 $result["id"]=$tid;
		 */

	}

	function TemplateName($tid) {
		$template=$this->GetNeoTemplate($tid);
		//var_dump($template["textid"]);
		if ($template) {
			if ($template["id"]==-1) {
				return $template["textid"]." ".$this->Lang("readonly");
			} else {
				return $template["textid"];
			}
		}
		return "";
	}

	function GetNeoTemplate($tid="") {
		$db=$this->GetDb();
		$q="";$p=array();
		if (is_numeric($tid)) {
			if ($tid<0) {
				return $this->GetDefaultTemplate($tid);
			} else {
				$q="SELECT * FROM ".cms_db_prefix()."module_neogallery_templates WHERE id=?";
				$p=array($tid);
			}
		} else {
			//die("here".$tid);
			$defaulttemplate=$this->GetDefaultTemplate($tid);
			if ($defaulttemplate!=false) return $defaulttemplate;
			/*foreach($this->subsystems as $subsystem=>$id) {
				if ($tid=="default_".$subsystem) {
				return $this->GetDefaultTemplate($id);
				}
				}*/
			$q="SELECT * FROM ".cms_db_prefix()."module_neogallery_templates WHERE textid=?";
			$p=array($tid);
		}
		$result=$db->Execute($q,$p);
		if (!$result || ($result->NumRows()==0)) {
			return false;
		}
		$row=$result->FetchRow();

		return $row;

	}

	function ParseTemplate($template) {
		$templateparts=explode("<!-- * BODY * -->",$template["content"]);
		$headpart=""; $bodypart="";
		if (count($templateparts)!=2) {
			return false;
		} else {
			$headpart=$templateparts[0];
			$headpart=str_replace("<!-- * HEAD * -->","",$headpart);
			$bodypart=$templateparts[1];
		}
		return array("head"=>$headpart,"body"=>$bodypart);
	}

	function Slashes($url) {
		$result=str_replace("\\","/",$url);

		//$result=str_replace("/",DIRECTORY_SEPARATOR,$url);
		//return str_replace("\\",DIRECTORY_SEPARATOR,$result);
		return $result;
	}
	function GetChangeLog()	{
		return $this->ProcessTemplate("changelog.tpl");
	}
	

}


?>
