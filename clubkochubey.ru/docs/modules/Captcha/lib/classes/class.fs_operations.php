<?php
	
class CMSCaptchaFSOperations
{
	function scanDir($dir = './', $sort = false)
	{
		$dir_open = opendir($dir);
		if (! $dir_open)
		{
			return false;
		}
		$files = array();
		while ($dir_content = readdir($dir_open))
		{
			if( preg_match( "/^\./", $dir_content)) // ignore dot files
			{
				continue;
			}
			$files[] = $dir_content;
		}
		
		if(is_array($files))
		{
			$sort == true ? rsort($files, SORT_STRING) : sort($files, SORT_STRING);
		}
		
		return $files;
	}
}


?>