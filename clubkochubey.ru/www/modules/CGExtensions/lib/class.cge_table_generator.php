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

class cge_table_data
{
  protected $_data;
  private $_numrows = null;
  private $_numcols = null;
  
  public function __construct($numrows,$numcols)
  {
    $this->_numrows = $numrows;
    $this->_numcols = $numcols;

    $this->_data = array();
    for( $r = 0; $r < $this->_numrows; $r++ )
      {
	$this->_data[$r] = array();
	for( $c = 0; $c < $this->_numcols; $c++ )
	  {
	    $this->_data[$r][$c] = null;
	  }
      }
  }


  public function set($row,$col,$data)
  {
    if( $row < $this->_numrows && $col < $this->_numcols )
      {
	$this->_data[$row][$col] = $data;
	return TRUE;
      }
    return FALSE;
  }


  public function get($row,$col,$dflt = '')
  {
    if( is_null($this->_data[$r][$c]) ) return $dflt;
    return $this->_data[$r][$c];
  }


  public function get_row($row)
  {
    if( $row < $this->_numrows )
      {
	return $this->_data[$r];
      }
    return FALSE;
  }


  public function get_col($col)
  {
    if( $col < $this->_numcols )
      {
	$tmp = array();
	for( $r = 0; $r < $this->_numrows; $r++ )
	  {
	    $tmp[] = $this->_data[$r][$col];
	  }
	return $tmp;
      }
    return FALSE;
  }


  public function num_rows()
  {
    return $this->_numrows;
  }


  public function num_cols()
  {
    return $this->_numcols;
  }


  public function is_valid()
  {
    if( !is_array($this->_data) ) return FALSE;
    return TRUE;
  }

  
  public function is_editable()
  {
    return TRUE;
  }
} // end of class


class cge_table_by_query extends cge_table_data
{
  private $_query = null;
  private $_countquery = null;

  public function construct($query,$countquery = '')
  {
  }

  public function num_rows()
  {
  }

  public function num_cols()
  {
  }

  public function is_valid()
  {
    if( is_null($this->_query) ) return FALSE;
    return true;
  }


  protected function get_data()
  {
    if( !$this->is_valid() ) return FALSE;
    if( is_array($this->_data) ) return TRUE;

    global $gCms;
    $db = $gCms->GetDb();

    $dbr = $db->GetArray($this->_query);
    if( !$dbr ) return FALSE;

    $this->_data = $dbr;
  }


  public function set($row,$col,$data)
  {
    return FALSE;
  }


  public function is_editable()
  {
    return FALSE;
  }
}


class cge_table_generator
{
  private $_module = null;
  private $_key = null;
  private $_template = null;
  private $_data = null;
  private $_query = null;
  private $_countquery = null;
  private $_pagelimit = 10000;
  private $_pagenum = 1;
  private $_auto_headers = 

  
  public function __construct(&$module,$key,$template)
  {
    $this->_module = $module;
    $this->_key = $key;
    $this->_template = $template;
  }


  public function set_data(cge_table_data $data)
  {
    $this->_query = null;
    $this->_data = $data;
  }


  public function set_query($str)
  {
    $this->_data = null;
    $this->_query = $str;
  }


  public function set_countquery($str)
  {
    if( $this->_query )
      {
	$this->_countquery = $str;
      }
  }

  protected function get_count()
  {
  }

  protected function get_subset()
  {
    if( $this->_data )
      {
	// get the number of rows.
	
      }
    else if( $this->_query )
      {
      }
    return FALSE;
  }


  public function generate()
  {
  }

} // end of class.

#
# EOF
#
?>