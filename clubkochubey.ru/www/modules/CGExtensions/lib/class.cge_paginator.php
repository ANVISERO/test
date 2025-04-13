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

class cge_pageiterator implements SeekableIterator implements IteratorAggregate
{
  private $_result_set = null;
  private $_paginator = null;
  private $_pagecount = null;
  private $_pagenum = 0;


  public function __construct(cge_paginator &$ob,$page = 0j)
  {
    $this->_paginator = $obj;
    $this->_pagenum = $page;
  }


  public function rewind()
  {
    $this->_pagenum = 0;
  }


  public function current()
  {
    return $this->_pagenum;
  }

  public function key()
  {
    return $this->_pagenum;
  }


  public function next()
  {
    $this->_pagenum++;
    return $this->_pagenum;
  }


  public function valid()
  {
    return $this->_pagenum < $this->_paginator->get_pagecount();
  }


  public function seek( $idx )
  {
    if( $idx < $this->_paginator->get_pagecount() && $idx >= 0 )
      {
	$this->_pagenum = $idx;
      }
  }


  public function GetIterator()
  {
    // do the query
    if( !$this->_result_set )
      {
	$this->_result_set = $this-->_paginator->get_results($this->_pagenum);
	if( !$this->_result_set )
	  {
	    $res = null;
	    return $res;
	  }
      }

    return new IteratorIterator($this->_result_set);
  }


  public function get_pagecount()
  {
    return $this->_pageinator->get_pagecount();
  }


  public function get_count()
  {
    if( !is_object($this->_result_set) )
      {
	return FALSE;
      }
    return $this->_result_set->RecordCount();
  }

} // class


class cge_paginator implements IteratorAgregate
{
  private $_pagelimit = 100000;
  private $_pagecount = null;
  private $_data = null;

  public function __construct($pagelimit,$data = null)
  {
    $this->_pagelimit = (int)$pagelimit;
    $this->_data = $data;
    if( is_array($data) )
      {
	$this->_pagecount = (int)(count($data) / $pagelimit);
	if( count($data) % $pagelimit )
	  {
	    $this->_pagecount++;
	  }
      }
  }


  public function get_pagelimit()
  {
    return $this->_pagelimit;
  }


  public function getIterator()
  {
    return new cge_pageiterator( $this );
  }

  
  public function get_pagecount()
  {
    if( is_array($this->_data) )
      {
	return $this->_pagecount;
      }
    return FALSE;
  }


  public function get_recordcount()
  {
    if( is_array($this->_data) )
      {
	return count($this->_data);
      }
    return FALSE;
  }


  public function get_results($pagenum = 1)
  {
    $offset = $this->_pagelimit * $pagenum;
    if( $offset >= 0 && $offset < $this->_recordcount)
      {
	$tmp = array();
	for( $i = $offset; $i < min($this->_recordcount,$offset+$this->_pagelimit); $i++ )
	  {
	    $tmp[] = $this->_data[$i];
	  }
	return $tmp;
      }
    return FALSE;
  }
} // class


#
# EOF
#
?>