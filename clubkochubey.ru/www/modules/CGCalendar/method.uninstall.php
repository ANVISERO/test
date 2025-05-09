<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: Skeleton (c) 2008 
#      by Robert Allen (akrabat) and
#         Robert Campbell (calguy1000@cmsmadesimple.org)
#  An addon module for CMS Made Simple to allow displaying calendars,
#  and management and display of time based events.
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

$db =& $this->GetDb(); /* @var $db ADOConnection */
$dict = NewDataDictionary($db);

$sqlarray = $dict->DropTableSQL($this->events_table_name);
$dict->ExecuteSQLArray($sqlarray);

$sqlarray = $dict->DropTableSQL($this->events_to_categories_table_name);
$dict->ExecuteSQLArray($sqlarray);

$sqlarray = $dict->DropTableSQL($this->categories_table_name);
$dict->ExecuteSQLArray($sqlarray);

$sqlarray = $dict->DropTableSQL($this->event_field_values_table_name);
$dict->ExecuteSQLArray($sqlarray);

$sqlarray = $dict->DropTableSQL($this->fields_table_name);
$dict->ExecuteSQLArray($sqlarray);


$db->DropSequence($this->events_table_name.'_seq');
$db->DropSequence($this->categories_table_name.'_seq');

// templates
$this->DeleteTemplate();

// preferences
$this->RemovePreference();

// Events
$this->RemoveEvent('EventAdded');
$this->RemoveEvent('EventEdited');
$this->RemoveEvent('EventDeleted');
$this->RemoveEvent('CategoryAdded');
$this->RemoveEvent('CategoryEdited');
$this->RemoveEvent('CategoryDeleted');

// Permissions
$this->RemovePermission('Modify Calendar');
$this->RemovePermission('Manage Calendar Attributes');

?>