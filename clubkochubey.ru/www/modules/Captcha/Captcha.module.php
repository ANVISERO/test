<?php
#-------------------------------------------------------------------------
# Module: Captcha - Enables captcha support for use in other modules.
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2006 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details:
# http://www.gnu.org/licenses/licenses.html#GPL
#
#-------------------------------------------------------------------------
/*
 * This file is called by CMS Made Simple to load the module class
*/

# This file holds the Captcha class which extends the CMSModule class

if (! function_exists('cms_join_path'))
{
	function cms_join_path()
	{
		$num_args = func_num_args();
		$args = func_get_args();
		$path = $args[0];
	
		if ($num_args > 1)
		{
			for ($i = 1; $i < $num_args; $i++)
			{
				$path .= DIRECTORY_SEPARATOR . $args[$i];
			}
		}
		
		return $path;
	}
}

require_once cms_join_path(dirname(__FILE__),'lib','classes','module','class.captcha.php');

?>
