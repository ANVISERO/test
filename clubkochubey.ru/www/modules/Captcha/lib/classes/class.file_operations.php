<?php

class CMSCaptchaFileOperations
{
	/**
	* @return bool
	*/
	function isImageFilename($name)
	{
		if (strlen($name) < 4)
		{
			return FALSE;
		}
		
		$image_extensions = array('.jpg', '.gif', '.png');
		$name_length      = strlen($name);
		$file_extension   = substr($name, strlen($name) - 4);
		
		return in_array($file_extension, $image_extensions);
	}
}
?>
