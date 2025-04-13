<?php

$query = 'SELECT l.*, lc.link_category FROM ' . cms_db_prefix() . 'module_linkmgr_links l LEFT JOIN '.cms_db_prefix().'module_linkmgr_categories lc ON l.link_cat = lc.cat_id ORDER BY link_category ASC';

$dbresult =& $db->Execute($query);

$items = Array();
$rowclass = 'row1';

while($dbresult && $row = $dbresult->FetchRow()){
	$i = count($items);
	$items[$i]['link_name'] = $this->CreateLink($id, 'admin_editlink', $returnid, $row['link_name'], array('entry_id' => $row['entry_id']));
	$items[$i]['link_url'] = $row['link_url'];
	$items[$i]['link_img'] = $row['link_img'];
	$items[$i]['link_category'] = $row['link_category'];
	$items[$i]['link_desc'] = $row['link_desc'];

	$items[$i]['editlink'] = $this->CreateLink($id, 'admin_editlink', $returnid,
		$gCms->variables['admintheme']->DisplayImage('icons/system/edit.gif', $this->Lang('editlink'),'','','systemicon'),
		array('entry_id' => $row['entry_id'])); 

	$items[$i]['delete'] = $this->CreateLink($id, 'admin_deletelink', $returnid,
		$gCms->variables['admintheme']->DisplayImage('icons/system/delete.gif', $this->Lang('delete'),'','','systemicon'),
		array('entry_id' => $row['entry_id']), $this->Lang('areyousure')); 
	$items[$i]['rowclass']	= $rowclass;
	$rowclass = ($rowclass == 'row1' ? 'row2' : 'row1');
}
$smarty->assign('items', $items);
$smarty->assign('header_name', $this->Lang('header_name'));
$smarty->assign('header_url', $this->Lang('header_url'));
$smarty->assign('header_img', $this->Lang('header_img'));
$smarty->assign('header_category', $this->Lang('header_category'));
$smarty->assign('addlink', $this->CreateLink($id, 'admin_addlink', $returnid,
	$gCms->variables['admintheme']->DisplayImage('icons/system/newobject.gif', $this->Lang('addlink'),'','','systemicon') . ' ' . $this->Lang('addlink')
));

echo $this->ProcessTemplate('listlinks.tpl');

?>
