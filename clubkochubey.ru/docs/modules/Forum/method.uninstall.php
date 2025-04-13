<?php
#-------------------------------------------------------------------------
# Forum Made Simple - a threaded multi-forum message board
# http://dev.cmsmadesimple.org/projects/forummadesimple
# 2006-2007 (c) tamlyn (Tamlyn Rhodes)
# 2007-2010 (c) alby (Alberto Benati)
#------------------------------------------------------------------------
# CMS Made Simple is (c) 2005-2010 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://cmsmadesimple.org
#------------------------------------------------------------------------

if(!isset($gCms)) exit;

if($this->LoadDataModule() !== true) die($this->LoadDataModule());

$db =& $gCms->GetDb();
$dict = NewDataDictionary($db);

$table_names = array('properties','forum_property','topics','posts','users','banned');
foreach($table_names as $name) {
	#Remove the database table and sequence
	$d = $dict->DropTableSQL(cms_db_prefix()."module_forum_".$name);
	$return = $dict->ExecuteSQLArray($d);
	if($return <> 2) die('Error drop: '.cms_db_prefix()."module_forum_".$name);

	#Remove the sequence
	$db->DropSequence(cms_db_prefix()."module_forum_".$name."_seq" );
}

if($this->TreeManager)
{
	$this->TreeManager->initTree($this, $this->customField, $this->lang);
	$this->TreeManager->dropModuleTable();
}


#Remove all preferences for this module
$this->RemovePreference();

#and all templates
$this->DeleteTemplate();

#and remove the permissions
$this->RemovePermission('Modify Forum');

#and remove css associated
$sqlsearch = "SELECT css_id FROM ".cms_db_prefix()."css WHERE css_name = ?";
$dbresult =& $db->Execute($sqlsearch, array('Forum_Made_Simple2'));
if($dbresult && $row = $dbresult->FetchRow())
{
	$qd = "DELETE FROM ".cms_db_prefix()."css_assoc WHERE assoc_css_id = ?";
	$dbresult = $db->Execute($qd, array($row['css_id']));

	$qd = "DELETE FROM ".cms_db_prefix()."css WHERE css_id = ?";
	$dbresult = $db->Execute($qd, array($row['css_id']));
}

#Events
$this->RemoveEvent( 'OnNewTopic' );
$this->RemoveEvent( 'OnReplyPost' );
$this->RemoveEvent( 'OnEditPost' );

#Put mention into the admin log
$this->Audit(0, $this->Lang('friendlyname'), $this->Lang('uninstalled'));
?>