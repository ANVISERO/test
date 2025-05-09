<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: CGExtensions (c) 2008 by Robert Campbell 
#         (calguy1000@cmsmadesimple.org)
#  An addon module for CMS Made Simple to provide useful functions
#  and commonly used gui capabilities to other modules.
# 
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2005 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
#
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# However, as a special exception to the GPL, this software is distributed
# as an addon module to CMS Made Simple.  You may not use this software
# in any Non GPL version of CMS Made simple, or in any version of CMS
# Made simple that does not indicate clearly and obviously in its admin 
# section that the site was built with CMS Made simple.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#
#-------------------------------------------------------------------------
#END_LICENSE

class cge_url
{
  public static function current_url()
  {
    // rebuild the current url.
    global $gCms;
    $uri_parts = explode('/',$_SERVER['REQUEST_URI']);
    $uri_parts = cge_array::remove_by_value($uri_parts);
    $tmp = parse_url($gCms->config['root_url']);
    $root_parts = array();
    if( isset($tmp['path']) )
      {
	$root_parts = explode('/',$tmp['path']);
	$root_parts = cge_array::remove_by_value($root_parts);
      }
    
    $newdata = array();
    for($i = 0; $i < max(count($uri_parts),count($root_parts)); $i++ )
      {
	if( ($i < count($uri_parts)) && 
	    ($i < count($root_parts)) && 
	    ($root_parts[$i] == $uri_parts[$i]) )
	  {
	    continue;
	  }
	$newdata[] = $uri_parts[$i];
      }
    $url = $gCms->config['root_url'].'/'.implode('/',$newdata);
    return $url;
  }
}

#
# EOF
#
?>