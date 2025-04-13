<?php
# Thumbnails. A plugin for CMS - CMS Made Simple
# Copyright (c) 2006-08 by Morten Poulsen (morten@poulsen.org)
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


class Thumbnails extends CMSModule {
	var $prefix="thumb_";
	var $prefixlen=6;
	var $_createifallowed=true;
	var $_checkdimensions=false;
	
  /* API Part start*/	
	function GetThumbnailFormat() {
		$this->GetPreference("thumbnailformat","jpg");
	}
	
	function SetCreateIfAllow($create) {
		$this->_createifallowed=$create;
	}
	
	function SetCheckDimensions($check) {
		$this->_checkdimensions=$check;
	}

	function GetThumbnailImageTag($filename,$relpath, $style="", $forcesize="", $addtext="") {
		$result="<img src='";
		$result.=$this->GetThumbnailImageUrl($filename,$relpath,$forcesize);
		$result.="' ";
		$result.=$style;
		$result.="title='".$filename."' ".$addtext." />";
		//echo $result;die();
		return $result;
	}

	function GetThumbnailImageUrl($filename,$relpath,$forcesize="") {
		
		$thurl=$this->ThumbnailImageUrl($filename,$relpath);
		//echo $thurl;die();
		$thpath=$this->ThumbnailImagePath($filename,$relpath);
		//echo $thpath;die();
		$create=false;
				
		if ($this->ThumbnailExists($thpath)) {			
			if ($this->_checkdimensions) {
				if (!$this->DimensionsFit($filename,$relpath)) $create=true;
			}
		} else {
			$create=true;
		}
			
		if ($create && $this->_createifallowed) {			
			//if (check_login(true) && $this->CheckPermission("Modify Files")) {
				$this->CreateThumbnail($filename,$relpath,$forcesize);
//			}
		}
		//echo $thpath;die();
		if ($this->ThumbnailExists($thpath) && is_readable($thpath)) {
			//die();
			return $thurl;
		} else {
			//return $this->GetDefaultUrl();
			return $this->GetOntheFlyUrl($filename,$relpath,$forcesize);
		}
	}



	function GetThumbnailImageObject($filename,$relpath) {
    $fullname=$this->ImagePath($filename,$relpath);
		$outname=$this->ThumbnailImagePath($filename,$relpath);
		if (!$this->CanBeCreated($outname)) return false;
		return $this->ThumbnailObject($fullname);
	}

	function CleanupFile($filename) {

	}

	function CleanupDir($dirname) {

	}

	/* API Part end*/

	function CanBeCreated($file) {
		$file=$this->Slashes($file);
		if (file_exists($file)) return is_writable($file);
		$fp = @fopen($file, 'w');
		
		if (!$fp) return false;
		//die($file);
		@fclose($file);
		@unlink($file);
		return true;
	}
	
	function GetOntheFlyUrl($filename,$relpath,$size="") {
	  $image=$this->ImagePath($filename,$relpath);
	  $image64=base64_encode($image);
	  $config=$this->GetConfig();
	  $url=$config["root_url"]."/modules/Thumbnails/thumbnail.php?image=".$image64;
	  if ($size!="") $url.="&size=".$size;
	  return $url;
	}
	
	function ImagePath($filename,$relpath) {
		$config=$this->GetConfig();
		$imagepath=$this->Slash($relpath,$filename);
		$imagepath=$this->Slash($config["root_path"],$imagepath);
		return $imagepath;
	}

	function ThumbnailImageUrl($filename,$relpath) {
		$config=$this->cms->GetConfig();
		$thfilename=$this->prefix.$filename;
		$imageurl=$this->Slash($relpath,$thfilename);
		$imageurl=$this->Slash($config["root_url"],$imageurl);
		return $imageurl;
	}

	function ThumbnailImagePath($filename,$relpath) {
		$config=$this->cms->GetConfig();
		$thfilename=$this->prefix.$filename;
		$imagepath=$this->Slash($relpath,$thfilename);
		$imagepath=$this->Slash($config["root_path"],$imagepath);
		return $imagepath;
	}

	function ThumbnailExists($thumbnail) {
		return file_exists($thumbnail);
	}

	function CreateThumbnail($filename,$relpath,$forcesize="") {
		
		$fullname=$this->ImagePath($filename,$relpath);
		$outname=$this->ThumbnailImagePath($filename,$relpath);
		if (!$this->CanBeCreated($outname)) return false;
		$newimage=$this->ThumbnailObject($fullname,$forcesize);
		if (!$newimage) return false;
		
		$jpgquality=$this->GetPreference("jpgquality","90");
		$format=$this->GetPreference("thumbnailformat","jpg");
		switch ($format) {
			case "jpg" : return imagejpeg($newimage,$outname,$jpgquality);
			case 'gif': return imagegif($newimage,$outname);
			case 'png': return imagepng($newimage,$outname);
		}
	}

	function CheckGD() {
		return function_exists("imagecreatefromjpeg");
	}
	
	function ThumbnailObject($fullname,$forcesize="") {
		//var_dump(gd_info());
		if (!$this->CheckGD()) return false;
		//die("here-".$fullname.$outname);
		
		$img_data = getimagesize($fullname);
		$mime = $img_data['mime'];
		$image="";
		switch($mime) {
			case 'image/jpeg': $image = imagecreatefromjpeg($fullname); break;
			case 'image/gif': $image = imagecreatefromgif($fullname);	break;
			case 'image/png': $image = imagecreatefrompng($fullname);	break;
			default: return false;
		}
		
		$width = imagesx($image);
		$height = imagesy($image);
		$whratio=$width/$height;
		$hwratio=$height/$width;
		$newwidth="";$newheight="";
		/*
		 * 		$this->Lang("forcewidth")=>1,
		 $this->Lang("forceheight")=>2,
		 $this->Lang("forcelargest")=>3,
		 $this->Lang("forceboth")=>4,*/

		$resizing=1;	
		if ($width<$height) {			
			$resizing="2";
		}
		$thumbnailsize=$this->GetPreference("thumbnailsize","100");
		if ($forcesize!="") $thumbnailsize=$forcesize;
		
			//die($width."x".$height);
		switch ($resizing) {
			case "1" : {
				if ($width<$thumbnailsize) {
					$newwidth=$width;
					$newheight=$height;
				} else {
					$newwidth=$thumbnailsize;
					$newheight=$newwidth*$hwratio;
				}
				break;
			}
			case "2" : {
				if ($height<$thumbnailsize) {
					$newwidth=$width;
					$newheight=$height;
				} else {
					$newheight=$thumbnailsize;
					$newwidth=$newheight*$whratio;
					break;
				}
			}
		}
		//echo $resizing;
		//echo round($newwidth)."x".round($newheight);die();
		// die($newwidth."x".$newheight);

		$newimage = imagecreatetruecolor(round($newwidth),round($newheight));
		imagecopyresampled($newimage, $image, 0, 0, 0, 0, $newwidth, $newheight,$width, $height);
		return $newimage;
	}
	

	function GetDefaultUrl() {
		$defaulticon=$this->GetPreference("defaulticon");
		$config=$this->cms->GetConfig();
		$defaulticon="/modules/Thumbnails/icons/".$defaulticon;
		$imagepath=$this->Slash($config["root_url"],$defaulticon);
		return $imagepath;
	}

	function GetDefaultPath() {
		$defaulticon=$this->GetPreference("defaulticon");
		$config=$this->cms->GetConfig();
		$thfilename=$this->prefix.$defaulticon;
		$imagepath=$this->Slash($relpath,$thfilename);
		$imagepath=$this->Slash($config["root_path"],$imagepath);
		return $imagepath;
	}

	function DimensionsCorrect($filename,$relpath) {

	}

	function WidthGreatest($fullpath) {
		$temp=getimagesize($fullpath);
    if (!$temp) return false;
    return ($temp["width"]>$temp["height"]);
	}

	function GetName() {
		return 'Thumbnails';
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
		return 'Silmarillion';
	}

	function GetAuthorEmail()	{
		return 'morten@poulsen.org';
	}



	function IsPluginModule() {
		return false;
	}

	function HasAdmin() {
		return true;
	}

	function GetAdminSection() {
		return 'extensions';
	}

	function GetAdminDescription() {
		return $this->Lang('moddescription');
	}

	function VisibleToAdminUser() {
		return ($this->CheckPermission('Modify Site Preferences') || $this->CheckPermission('Modify Files'));
	}

	function MinimumCMSVersion() {
		return "1.3";
	}


	function InstallPostMessage() {
		return $this->Lang('postinstall');
	}
	function UninstallPostMessage() {
		return $this->Lang('postuninstall');
	}

	function GetDefaultIconList() {
		$icons=array();
		$dir=@opendir(dirname(__FILE__)."/icons/");
		if (!$dir) return false;
		while ($file=readdir($dir)) {
			if ($file==".") continue;
			if ($file=="..") continue;
			if ($file[0]==".") continue;
			$icons[$file]=$file;
		}
		if (count($icons)==0) return false;
		return $icons;
	}

	function IconListTable() {
		$config=$this->cms->GetConfig();
		$icons=$this->GetDefaultIconList();
		if (count($icons)==0) return "";
		$output="";
		$output.="<table style='border:0px'>";
		$output.="<tr>";
		foreach ($icons as $icon) {
			$output.="<td><img src='";
			$output.=$config["root_url"]."/modules/Thumbnails/icons/".$icon;
			$output.="' /></td>";
		}
		$output.="</tr><tr>";
		foreach ($icons as $icon) {
			$output.="<td>$icon</td>";
		}
		$output.="</tr></table>";
		return $output;
	}

	function UninstallPreMessage() {
		return $this->Lang('really_uninstall');
	}

	function Slashes($url) {
		$result=str_replace("\\","/",$url);

		//$result=str_replace("/",DIRECTORY_SEPARATOR,$url);
		//return str_replace("\\",DIRECTORY_SEPARATOR,$result);
		return $result;
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


	function GetChangeLog()	{
		return $this->ProcessTemplate("changelog.tpl");
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