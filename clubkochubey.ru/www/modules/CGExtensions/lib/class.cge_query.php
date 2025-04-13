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

class cge_query
{
  private $_qstr;
  private $_qparms;
  
  public function __construct($str,$params = '')
  {
    $this->_qstr = $str;
    $this->_qparms = array();
    if( is_array($params) )
      {
	$this->_qparms = $params;
      }
    else if( $params && $params !== 0 )
      {
	$this->_qparms[] = $params;
      }
  }


  public function execute($nrows = -1,$offset = -1)
  {
    global $gCms;
    $db = $gCms->GetDb();

    $rs = $db->Execute($this->_qstr,$nrows,$offset,$this->_qparms);
    return $res;
  }

  
  public function get_one()
  {
    global $gCms;
    $db = $gCms->GetDb();

    $tmp = $db->GetOne($this->_qstr,$this->_qparms);
    return $res;
  }


  public function get_error()
  {
    global $gCms;
    $db = $gCms->GetDb();

    return $db->ErrorMsg();
  }
} // class

#
# EOF
#
?>