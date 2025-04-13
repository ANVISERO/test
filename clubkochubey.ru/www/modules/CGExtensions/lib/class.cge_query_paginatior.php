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

/*
$query = new cge_query('SELECT * FROM cms_module_products');
$countquery = new cge_query('SELECT count(id) FROM cms_module_products');
$paginator = new cge_query_paginator($query,$countquery,$pagelimit);
$page_iterator = $paginator->GetIterator();
$page_iterator->seek($page_num);
foreach( $page_iterator as $page )
{
   $row_iterator = $page->GetIterator();
   foreach( $row_iterator as $one_row )
   {
      debug_display($row_iterator);
   }
}
*/


class cge_query_pageiterator extends cge_pageiterator
{
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

    return new ADODB_Iterator($this->_result_set);
  }

} // class


class cge_query_paginator extends cge_paginator
{
  private $_query = null;
  private $_countquery = null;


  public function __construct(cge_query $query,cge_query $countquery,
			      $pagelimit = 100000)
  {
    parent::__construct($pagelimit);
    $this->_query = $query;
    $this->_countquery = $countquery;
  }


  public function get_pagecount()
  {
    $this->_calc_metadata();
    return $this->_pagecount;
  }


  public function get_recordcount()
  {
    $this->_calc_metadata();
    return $this->_recordcount;
  }


  private function _calc_metadata()
  {
    if( !is_null($this->_recordcount) ) return;

    if( is_null($this->_countquery) ) 
      {
	$this->_recordcount = FALSE;
	$this->_pagecount = FALSE;
      }

    $this->_recordcount = $this->_countquery->get_one();
    if( !$this->_recordcount ) return FALSE;

    $this->_pagecount = (int)($this->_recordcount / $this->_pagelimit);
    if( $this->_recordcount % $this->_pagelimit != 0 )
      {
	$this->_pagecount++;
      }

    return TRUE;
  }


  public function get_results($pagenum = 1)
  {
    $this->_calc_metadata();
    $offset = $this->_pagelimit * $pagenum;
    $rs = $this->_query->execute($this->_pagelimit,$offset);
    if( !$rs ) return FALSE;
    return $rs;
  }


  public function get_error()
  {
    return $this->_query->get_error();
  }
} // class

#
# EOF
#
?>