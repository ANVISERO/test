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

class SuperSizer {
	 var $strOriginalImagePath;
	 var $strResizedImagePath;
	 var $arrOriginalDetails;
	 var $arrResizedDetails;
	 var $resOriginalImage; 
	 var $resResizedImage;
	 var $errors;
	 var $boolProtect = true; 
	 
	 function __constructor($strPath='', $strSavePath='', $strType = 'W', $value = '150', $Quality = 85, $crop=false,$SAMPLE=true, $boolProtect = true, $filter, $fa1, $fa2, $fa3, $fa4){
		$this->SuperSizer($strPath, $strSavePath, $strType, $value, $Quality, $crop, $SAMPLE, $boolProtect, $filter, $fa1, $fa2, $fa3, $fa4); 
	 }
	 
	
	 function SuperSizer($strPath='', $strSavePath='', $strType = 'W', $value = '150', $Quality = 85, $crop=false, $SAMPLE=true, $boolProtect = true, $filter=null, $fa1=null, $fa2=null, $fa3=null, $fa4=null){
		if($strSavePath!=''){
			$this->strOriginalImagePath = rawurldecode($strPath); 
			$this->strResizedImagePath = $strSavePath; 
			$this->boolProtect = $boolProtect;  
			//get the image dimensions
			if(!@getimagesize($this->strOriginalImagePath)){
				$this->errors[]= "<br/><font color=\"#FF0000\">There is a path issue with the orginal image!</font><br/><strong>Does this look right?<br/>Path:</strong>".$this->strOriginalImagePath."<br/>";
				return false;
			}else{
				$this->arrOriginalDetails = getimagesize($this->strOriginalImagePath);
			}
			$this->arrResizedDetails = $this->arrOriginalDetails;
			//create an image resouce to work with
			$this->resOriginalImage = $this->createImage($this->strOriginalImagePath);
			if(!@imagesx($this->resOriginalImage)){
				$this->errors[]=  '<br/><font color="#FF0000">Your orginal image has a corrupted header or is the wrong file type.</font><br/>';
				return false;
			}
			//select the image resize type
			switch(strtoupper($strType)){
			   case 'P':
				  $this->resizeToPercent($value, $Quality, $crop, $SAMPLE, $filter, $fa1, $fa2, $fa3, $fa4);
				  break;
			   case 'H':
				  $this->resizeToHeight($value, $Quality, $crop, $SAMPLE, $filter, $fa1, $fa2, $fa3, $fa4);
				  break;
			   case 'C':
				  $this->resizeToCustom($value, $Quality, $crop, $SAMPLE, $filter, $fa1, $fa2, $fa3, $fa4);
				  break;
			   case 'W':
			   default:
				  $this->resizeToWidth($value, $Quality, $crop, $SAMPLE, $filter, $fa1, $fa2, $fa3, $fa4); 
				  break;
			} 
		} 
	 }
	
	 function findResourceDetails($resImage){
		//check to see what image is being requested
		if($resImage==$this->resResizedImage){                              
		   //return new image details
		   return $this->arrResizedDetails;
		}else{
		   //return original image details
		   return $this->arrOriginalDetails;
		}
	 }
	
	 function updateNewDetails(){ 
		if(!@imagesx($this->resResizedImage)){
			$this->errors[]=  '<br/><font color="#FF0000">The resized image has not be created.</font><br/>';
			return false;
		}
		$this->arrResizedDetails[0] = imagesx($this->resResizedImage);
		$this->arrResizedDetails[1] = imagesy($this->resResizedImage);
	 }
	
	 function createImage($strImagePath){
		//get the image details
		$arrDetails = $this->findResourceDetails($strImagePath);
		  
		//choose the correct function for the image type  
		switch($arrDetails['mime']){
		   case 'image/jpeg':
			  return imagecreatefromjpeg($strImagePath);
			  break;
		   case 'image/png':
			  return imagecreatefrompng($strImagePath);
			  break;
		   case 'image/gif':
			  return imagecreatefromgif($strImagePath);
			  break;
		}
	 } 
	
	  function filters($filter, $fa1, $fa2, $fa3, $fa4){
		//choose the correct function for the image type  
		switch($filter){
		   case 'NEGATE':
			  return imagefilter($this->resResizedImage, IMG_FILTER_NEGATE);
			  break;
		   case 'GRAYSCALE':
			 return imagefilter($this->resResizedImage, IMG_FILTER_GRAYSCALE);
			  break;
		   case 'BRIGHTNESS':
			  return imagefilter($this->resResizedImage, IMG_FILTER_BRIGHTNESS, $fa1);
			  break;
		   case 'CONTRAST':
			 return imagefilter($this->resResizedImage, IMG_FILTER_CONTRAST, $fa1);
			  break;
		   case 'COLORIZE':
			  return imagefilter($this->resResizedImage, IMG_FILTER_COLORIZE, $fa1, $fa2, $fa3, $fa4);
			  break;
		   case 'EDGEDETECT':
			  return imagefilter($this->resResizedImage, IMG_FILTER_EDGEDETECT);
			  break;
		   case 'EMBOSS':
			  return imagefilter($this->resResizedImage, IMG_FILTER_EMBOSS);
			  break;
		   case 'GAUSSIAN_BLUR':
			  return imagefilter($this->resResizedImage, IMG_FILTER_GAUSSIAN_BLUR);
			  break;
		   case 'SELECTIVE_BLUR':
			  return imagefilter($this->resResizedImage, IMG_FILTER_SELECTIVE_BLUR);
			  break;
		   case 'MEAN_REMOVAL':
			 return imagefilter($this->resResizedImage, IMG_FILTER_MEAN_REMOVAL);
			  break;
		   case 'SMOOTH':
			  return imagefilter($this->resResizedImage, IMG_FILTER_SMOOTH, $fa1);
			  break;
		   case 'PIXELATE':
			  return imagefilter($this->resResizedImage, IMG_FILTER_PIXELATE, $fa1,$fa2);
			  break;
		   case 'IMAGEHUE':
			  $this->imagefilterhue($this->resResizedImage,$fa1, $fa2, $fa3);
			  break;
		}
	} 
	
	function imagefilterhue($im,$r,$g,$b){
		$rgb = $r+$g+$b;
		$col = array($r/$rgb,$b/$rgb,$g/$rgb);
		$height = imagesy($im);
		$width = imagesx($im);
			for($x=0; $x<$width; $x++){
				for($y=0; $y<$height; $y++){
					$rgb = ImageColorAt($im, $x, $y);
					$r = ($rgb >> 16) & 0xFF;
					$g = ($rgb >> 8) & 0xFF;
					$b = $rgb & 0xFF;
					$newR = $r*$col[0] + $g*$col[1] + $b*$col[2];
					$newG = $r*$col[2] + $g*$col[0] + $b*$col[1];
					$newB = $r*$col[1] + $g*$col[2] + $b*$col[0];
					$img=imagesetpixel($im, $x, $y,imagecolorallocate($im, $newR, $newG, $newB));
				}
			}
		return $img;
	}

	 function saveImage($Quality = 85){
		if($this->strResizedImagePath==$this->strOriginalImagePath){
			if(!is_writable($this->strOriginalImagePath)){
						chmod($this->strOriginalImagePath,777);   
			}
			if(!is_writable($this->strOriginalImagePath)){
				$this->errors[]=  '<br/><font color="#FF0000">Your orginal needs to have the permissions changed.  The file has <pre>'.substr(sprintf('%o', fileperms($this->strOriginalImagePath)), -4).'</pre></font><br/>';  
			}
		}
		switch($this->arrResizedDetails['mime']){
		   case 'image/jpeg':
				imagejpeg($this->resResizedImage, $this->strResizedImagePath, $Quality);
				break;
		   case 'image/png':
			  // imagepng = [0-9] (not [0-100]) 
			  $newNumber=$Quality/10;
			  $Quality = number_format($newNumber, 0, '.', '');
			  imagepng($this->resResizedImage, $this->strResizedImagePath, $Quality);
			  break;
		   case 'image/gif':
			  imagegif($this->resResizedImage, $this->strResizedImagePath); 
			  break;
		}
	 }
	
	 function showImage($resImage){
		//get the image details
		$arrDetails = $this->findResourceDetails($resImage);
		  
		//set the correct header for the image we are displaying  
		header("Content-type: ".$arrDetails['mime']);
		  
		switch($arrDetails['mime']){
		   case 'image/jpeg':
			  return imagejpeg($resImage);
			  break;
		   case 'image/png':
			  return imagepng($resImage);
			  break;
		   case 'image/gif':
			  return imagegif($resImage); 
			  break;
		}
	 }
	
	 function destroyImage($resImage){
		imagedestroy($resImage);
	 }
	
	 function _resize($numWidth, $numHeight, $Quality, $crop, $SAMPLE, $filter, $fa1, $fa2, $fa3, $fa4){
		//check for image protection
			if($this->_imageProtect($numWidth, $numHeight)){     
			if($this->arrOriginalDetails['mime']=='image/jpeg'){
			  //JPG image
				$this->resResizedImage = imagecreatetruecolor($numWidth, $numHeight);
				imageinterlace($this->resResizedImage, false);
				//imageantialias($this->resResizedImage, true);
			}else if($this->arrOriginalDetails['mime']=='image/gif'){
			  //GIF image
				$this->resResizedImage = imagecreatetruecolor($numWidth, $numHeight);
				imagetruecolortopalette($this->resResizedImage, true, 256);
				//imageantialias($this->resResizedImage, true);
				imagealphablending($this->resResizedImage, false);
				imagesavealpha($this->resResizedImage,true);
				$transparent = imagecolorallocatealpha($this->resResizedImage, 255, 255, 255, 127);
				imagefilledrectangle($this->resResizedImage, 0, 0, $numWidth, $numHeight, $transparent);
				imagecolortransparent($this->resResizedImage, $transparent);
			}else if($this->arrOriginalDetails['mime']=='image/png'){  
			  //PNG image  
				 $this->resResizedImage = imagecreatetruecolor($numWidth, $numHeight);  
				imagecolortransparent($this->resResizedImage, imagecolorallocate($this->resResizedImage, 0, 0, 0));   
				// Turn off transparency blending (temporarily)
				imagealphablending($this->resResizedImage, false);
				// Create a new transparent color for image
				$color = imagecolorallocatealpha($this->resResizedImage, 0, 0, 0, 127);
				// Completely fill the background of the new image with allocated color.
				imagefill($this->resResizedImage, 0, 0, $color);
				// Restore transparency blending
				imagesavealpha($this->resResizedImage, true);
			}

			$src_x = 0;
			$src_y = 0;
			$dst_x = 0;
			$dst_y = 0;
			$dst_w=$numWidth;
			$dst_h=$numHeight;
			$src_w=$this->arrOriginalDetails[0];
			$src_h=$this->arrOriginalDetails[1];	
			$crop="true";
				if($crop[0]==true){
					if(strlen($crop)>=4){$crop=explode(",", $crop);}else{$crop="true,0,0";}
				//if the image is smaller than crop size
					//we're always going to crop from center
					$src_x = $src_y = 0;
					$src_w = $src_w;
					$src_h = $src_h;
					$cmp_x = $src_w  / $dst_w;
					$cmp_y = $src_h / $dst_h;
					// calculate x or y coordinate and width or height of source
					if ( $cmp_x > $cmp_y ) {
						$src_w = round( ( $src_w / $cmp_x * $cmp_y ) );
						$src_x = round( ( $src_w - ( $src_w / $cmp_x * $cmp_y ) ) / 2 )+$crop[1];
					} elseif ( $cmp_y > $cmp_x ) {
						$src_h = round( ( $src_h / $cmp_y * $cmp_x ) );
						$src_y = round( ( $src_h - ( $src_h / $cmp_y * $cmp_x ) ) / 2 )+$crop[2];
				}
			}
			//update the image size details  
			$this->updateNewDetails();  
			if($SAMPLE==true){
				//do the actual image resize  
				//print_r('<br/>'.$this->resResizedImage.'<br/>');
				//print_r('<br/>'.$this->resOriginalImage.'<br/>');
				imagecopyresampled($this->resResizedImage, $this->resOriginalImage, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
			}else{
				imagecopyresized ($this->resResizedImage, $this->resOriginalImage, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
			}

			if($filter!=""){
				//filter
				// Here we split the variables. 
				$FiltersArray = explode(",", $filter); 
				$Fa1Array     = explode(",", $fa1); 
				$Fa2Array     = explode(",", $fa2); 
				$Fa3Array     = explode(",", $fa3); 
				$Fa3Array     = explode(",", $fa4); 
				$i = 0; 
				foreach ($FiltersArray as $Filter){ 
					$this->filters($FiltersArray[$i], $Fa1Array[$i], $Fa2Array[$i], $Fa3Array[$i], $Fa4Array[$i]); 
					$i++;
				}				
				//$this->filters($filter, $fa1, $fa2, $fa3, $fa4);
			}  	
	
		   //saves the image  
		   $this->saveImage($Quality);  
		}  
	 }
		
	 function _imageProtect($numWidth, $numHeight){  
		if($this->boolProtect AND ($numWidth > $this->arrOriginalDetails[0] OR $numHeight > $this->arrOriginalDetails[1])){  
		   return 0;  
		}
		return 1;  
	 }  
	
	 function resizeToWidth($numWidth, $Quality, $crop, $SAMPLE, $filter, $fa1, $fa2, $fa3, $fa4){ 
		$numHeight=(int)(($numWidth*$this->arrOriginalDetails[1])/$this->arrOriginalDetails[0]);
		$this->_resize($numWidth, $numHeight, $Quality, $crop, $SAMPLE, $filter, $fa1, $fa2, $fa3, $fa4);   
	 }
	 	
	 function resizeToHeight($numHeight, $Quality, $crop, $SAMPLE, $filter, $fa1, $fa2, $fa3, $fa4){
		$numWidth=(int)(($numHeight*$this->arrOriginalDetails[0])/$this->arrOriginalDetails[1]);
		$this->_resize($numWidth, $numHeight, $Quality, $crop, $SAMPLE, $filter, $fa1, $fa2, $fa3, $fa4);   
	 }
	
	
	 function resizeToPercent($numPercent, $Quality, $crop, $SAMPLE, $filter, $fa1, $fa2, $fa3, $fa4){
		$numWidth = (int)(($this->arrOriginalDetails[0]/100)*$numPercent);
		$numHeight = (int)(($this->arrOriginalDetails[1]/100)*$numPercent);
		$this->_resize($numWidth, $numHeight, $Quality, $crop, $SAMPLE, $filter, $fa1, $fa2, $fa3, $fa4);   
	 }
	 
	
	 function resizeToCustom($size, $Quality, $crop, $SAMPLE, $filter, $fa1, $fa2, $fa3, $fa4){
		if(!is_array($size)){
		   $this->_resize((int)$size, (int)$size, $Quality, $crop, $SAMPLE, $filter, $fa1, $fa2, $fa3, $fa4);
		}else{
		   $this->_resize((int)$size[0], (int)$size[1], $Quality, $crop, $SAMPLE, $filter, $fa1, $fa2, $fa3, $fa4);
		}
	 }
	function recursive_rmdir($dir)
	 {
		// all subdirectories and contents:
		if(is_dir($dir)){
			$dir_handle=opendir($dir);
		}else{
			return false;
		}
		while($file=readdir($dir_handle))
		{
		if($file!="." && $file!="..")
		{
		if(!is_dir($dir."/".$file))unlink ($dir."/".$file);
		else $this->recursive_rmdir($dir."/".$file);
		}
		}
		closedir($dir_handle);
		rmdir($dir);
		return true;
	}

}



function smarty_cms_function_supersizer($params, &$smarty) {
	global $gCms;
	$config =& $gCms->GetConfig(); 
	
	$debugIT = isset($params['debugIT']) ? $params['debugIT']:false;
	$noOutPut = isset($params['noOutPut']) ? $params['noOutPut']:false;
	$Assign = isset($params['Assign']) ? $params['Assign']:'';
	$path = isset($params['path']) ? $params['path']:false;
	$orginPath=$path;
	$Prefix = isset($params['Prefix']) ? $params['Prefix']:'';
	$Suffix = isset($params['Suffix']) ? $params['Suffix']:'';
	$Subdir = isset($params['Subdir']) ? $params['Subdir'] : "";
	$stripTags  = isset($params['stripTags']) ? $params['stripTags'] : false;
	if($stripTags==true){
			$path = preg_replace('/.*src=([\'"])((?:(?!\1).)*)\1.*/si','$2',$path);
	}
	$showErrors = isset($params['showErrors']) ? $params['showErrors']:true;
	$removeUniqueness  = isset($params['removeUniqueness']) ? $params['removeUniqueness'] : false;
	$URL = isset($params['URL']) ? $params['URL']:'';
	$OlDextension = substr($path, (strrpos($path,".")+1));
	$extension = strtolower(substr($path, (strrpos($path,".")+1)));
	$filebasename = basename($path, $OlDextension);

	$crop  = isset($params['crop']) ? $params['crop'] : false;
	$SAMPLE = isset($params['Sample']) ? $params['Sample']:true;
	$filter = isset($params['filter']) ? $params['filter'] : "";
	
	if(!isset($params['width']) && !isset($params['height']) && !isset($params['percentage'])) {
		$percentage = 25;
	}else{
		$width = isset($params['width']) ? intval($params['width']) : 0;
		$height = isset($params['height']) ? intval($params['height']) : 0;
		$percentage = isset($params['percentage']) ? intval($params['percentage']) : 0;
	}
	
	if(isset($Subdir)){
		if ((substr($Subdir, 0,1))=="/"){$Subdir=substr_replace($Subdir, '', 0, 1);}
		if (((substr($Subdir, -1))!="/")&&$Subdir!=''){$Subdir.='/';}
	}

	if(isset($path)){
		if ((substr($path, 0,5))=="http:"){$L=strlen($config['root_url']);$path = substr_replace($path, '', 0, $L);}
		if ((substr($path, 0,1))=='/'){$path=substr_replace($path, '', 0, 1);}
	}else{
		if($showErrors==true){
			echo "<font color=\"#FF0000\">You have forgoten to define the orginal image. Please do so.</font>";
			return false;
		}
	}
	
	if($removeUniqueness==false){
		$U='';
		$U="-w".$width."-h".$height."-p".$percentage."-F".$filter."-S".$SAMPLE;
	}
	
	$path=$config['root_path']."/".$path;
	$rootUrl = isset($params['rootUrl']) ? $params['rootUrl'] : $config['uploads_url'];
	$overwrite = isset($params['overwrite']) ? $params['overwrite'] : false;
	if($overwrite==true){
		$filename=$path;
	}else{
		$filename=$config['uploads_path']."/SuperSizerTmp/".$Subdir.$Prefix.$filebasename.$U.$Suffix.".".$extension;
	}
	$fileLINK=$rootUrl."/SuperSizerTmp/".$Subdir.$Prefix.$filebasename.$U.$Suffix.".".$extension;
	$Protect= isset($params['Protect']) ? $params['Protect'] : true;
	if($overwrite==false){
		if(file_exists($filename)){
			if($debugIT==true){
					unlink ($filename);
					//smarty_cms_function_supersizer($params, &$smarty);
			}elseif(@filemtime($filename) < @filemtime($path)){
					unlink ($filename);
			}
		}
	}
	$class = isset($params['class']) ? ' class="'.$params['class'].'" ':'';
	$alt = isset($params['alt']) ? $params['alt']:'';
	$id = isset($params['id']) ? ' id="'.$params['id'].'" ':'';
	$title = isset($params['title']) ? ' title="'.$params['title'].'" ':'';
	$style = isset($params['style']) ? ' style="'.$params['style'].'" ':'';
	$tagWidth = isset($params['tagWidth']) ? ' width="'.$params['tagWidth'].'" ':'';
	$tagHeight = isset($params['tagHeight']) ? ' height="'.$params['tagHeight'].'" ':'';
	if(!file_exists($filename)||$overwrite==true){
		if(!file_exists($config['uploads_path']."/SuperSizerTmp/".$Subdir)){
			mkdir($config['uploads_path']."/SuperSizerTmp/".$Subdir, 0777, true);
		}
		$Quality = isset($params['Quality']) ? intval($params['Quality']) : 85;
		$passThru = isset($params['passThru']) ? $params['passThru']:false;
		$cacheBuster = isset($params['cacheBuster']) ? $params['cacheBuster']:false;
		$fa1 = isset($params['farg1']) ? $params['farg1'] : "";
		$fa2 = isset($params['farg2']) ? $params['farg2'] : "";
		$fa3 = isset($params['farg3']) ? $params['farg3'] : "";
		$fa4 = isset($params['farg4']) ? $params['farg4'] : "";
		
		if($width>0 || $height>0) {
			if ($width>0 && $height==0){
				 $objResize = new SuperSizer($path, $filename, 'W', $width, $Quality, $crop, $SAMPLE, $Protect,$filter, $fa1, $fa2, $fa3, $fa4);
			}elseif($height>0 && $width==0){
				 $objResize = new SuperSizer($path, $filename, 'H', $height, $Quality, $crop,$SAMPLE, $Protect, $filter, $fa1, $fa2, $fa3, $fa4);
			}else{
				$objResize = new SuperSizer($path, $filename, 'C', array($width, $height), $Quality, $crop, $SAMPLE, $Protect, $filter, $fa1, $fa2, $fa3, $fa4);
			}
		}else{
			$objResize = new SuperSizer($path, $filename, 'P', $percentage, $Quality, $crop, $SAMPLE, $Protect,$filter, $filterarg1,  $fa1, $fa2, $fa3, $fa4);
		}
		if($debugIT==true){
			print_r($objResize);
		}
		if($showErrors==true){
			if($objResize->errors !=''){
				foreach($objResize->errors as $error){
					echo $error;
				}
			}
		}
		if($debugIT==true){
			echo '<h2 class="title">Original Image</h2><pre>';
			print_r($objResize->findResourceDetails($objResize->resOriginalImage));
			echo '</pre><h2 class="title">Resized Image</h2><pre>';
			print_r($objResize->findResourceDetails($objResize->resResizedImage)); 
			echo '</pre>';
			error_reporting(E_ALL);
		}
		if($passThru==true||$overwrite==true){
			if($cacheBuster==true){
				$orginPath=$orginPath."?".@filemtime($orginPath);
			}
			if($objResize->resResizedImage==''||$overwrite==true){
				if($URL!=true){
					if($Assign!=''){
						$smarty->assign($Assign, "<img src=\"$orginPath\" $title $id $class alt=\"alt1\" $style $tagWidth $tagHeight />");
					}else{
						echo "<img src=\"$orginPath\" $title $id $class alt=\"alt2\" $style $tagWidth $tagHeight />";
					}
				}else{
					if($Assign!=''){
						$smarty->assign($Assign,$orginPath);
					}else{
						echo $orginPath;
					}
				}
				return false;
			}
		}

	}
	if($noOutPut==false){
		
		if($cacheBuster==true){
			$fileLINK=$fileLINK."?".@filemtime($filename);
		}
		if($URL!=true){
			$fillHW = isset($params['fillHW']) ? $params['fillHW']:false;
			if($fillHW==true&&$tagWidth==''&&$tagHeight==''){
				if(isset($objResize)){
					$ResizedImage=$objResize->findResourceDetails($objResize->resResizedImage);
					$tagWidth = ' width="'.$ResizedImage[0].'"';
					$tagHeight = ' height="'.$ResizedImage[1].'"';
				}else{
					$ResizedImage=getimagesize($fileLINK);
					$tagWidth = ' width="'.$ResizedImage[0].'"';
					$tagHeight = ' height="'.$ResizedImage[1].'"';
				}
			}
			if($Assign!=''){
				$smarty->assign($Assign,"<img src=\"$fileLINK\" $title $id $class alt=\"alt3\" $style $tagWidth $tagHeight />");
			}else{
				echo "<div class=\"thumb\" style=\"background:url($fileLINK) no-repeat;\"></div>";
			}
		}else{
		
			if($Assign!=''){
				$smarty->assign($Assign,$fileLINK);
			}else{
				echo $fileLINK;
			}
		}
		
	}
}


function smarty_cms_help_function_supersizer() {
	echo'<fieldset style=" color:#333333; background-color:#FFCC00;"><img src="http://www.corbensproducts.com/uploads/module/supersizer/superSizer300x225.min.png" style="float:left; padding-right:35px;" />';
global $gCms;
		$config =& $gCms->GetConfig();
	

	
	echo'<form action="" method="post">
<input type="hidden" name="clearcache" value="1"><input name="" type="submit" value="Clear the cache" />
</form>';
	if(isset($_POST['clearcache'])&&$_POST['clearcache']==1){
		$objResize = new SuperSizer();
		$dirpath=$config['uploads_path']."/SuperSizerTmp/";
		$deleted = $objResize->recursive_rmdir($dirpath);
		if($deleted){
			echo "<h2>Cleared $dirpath</h2>";
		}else{
			echo "<h2>Sorry: $dirpath<br/><font color=\"red\"><strong>DOES NOT yet exist run the plug-in on an image first.</strong></font><br/></h2>";
		}
	}else{
		echo "<br/><span style=\"color:#0066CC; font-weight:900;\">Your cache path is: ".$config['uploads_path']."/SuperSizerTmp/</span>";
	}
	
	?>
    

	<h3>What does this tag do?</h3>
	<ul>
	<li>Creates a resized version of an image on the fly.</li>
    <li>Creates a cached version of the image to be served.</li>
    <li>Supporting <strong>Subdomains, Caching, filters and more</strong></li>
    <li>For a small slow changing sites, to huge user based sites<strong> GAIN FULL CONTROL!!!!</strong></li>
	</ul>
    </fieldset>
	<h3>How do I use this tag?</h3>
<h2><a href="http://wiki.cmsmadesimple.org/index.php/User_Handbook/Admin_Panel/Tags/supersizer#How_do_I_use_this_tag.3F" target="_blank">Get Detailed useage here.</a>
</h2>
<h3>What parameters does it take?</h3>
<h2><a href="http://wiki.cmsmadesimple.org/index.php/User_Handbook/Admin_Panel/Tags/supersizer#What_parameters_does_it_take.3F" target="_blank">Get Detailed parameters here.</a>
</h2>
   
<br /><br />
<h3>Why so little help here?</h3>
<h4>to keep it light and fast. <a href="http://wiki.cmsmadesimple.org/index.php/User_Handbook/Admin_Panel/Tags/supersizer" target="_blank"> Use wiki for help.</a>
</h4>
<h4>Also On:<br/>
 <a href="http://groups.google.com/group/supersizer?hl=en" target="_blank">
 <img src="http://groups.google.com/intl/en/images/logos/groups_logo_sm.gif" style="padding-right:35px;" />
 </a><br/>
and<br/>
 <a href="http://forum.cmsmadesimple.org/index.php/topic,38094.0.html" target="_blank">
 <img src="http://www.cmsmadesimple.org/images/cmsmslogo.gif" style="padding-right:35px;" />
 </a>


</h4>
<br /><br />  
   
    <p><strong>Author:</strong> jeremyBass &lt;jeremybass@cableone.net&gt;<br />
    <strong>Website:</strong> <a href="http://www.corbensproducts.com" target="_blank">CorbensProducts.com</a><br />
    <strong>Support more mods like this:</strong><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="8817675">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form><br/>

    <strong>Version:</strong> BETA 0.9.3, 4.10.2010</p>
	<?php
}

function smarty_cms_about_function_supersizer() {
	?>
	<p>Author: jeremyBass &lt;jeremybass@cableone.net&gt;<br />
	<br />
    Version: BETA 0.9.3, 4.10.2010</p>
	<?php
}
?>
