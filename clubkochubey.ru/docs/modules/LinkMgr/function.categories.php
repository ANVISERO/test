<?php

$query = 'SELECT * FROM	' . cms_db_prefix() . 'module_linkmgr_categories;';

$dbresult =& $db->Execute($query);

$items = Array();
$rowclass = 'row1';

while($dbresult && $row = $dbresult->FetchRow()){
	$i = count($items);
	$items[$i]['link'] = $this->CreateLink($id, 'admin_editcategory', $returnid, $row['link_category'], array('cat_id' => $row['cat_id']));

	$items[$i]['editcategory'] = $this->CreateLink($id, 'admin_editcategory', $returnid,
		$gCms->variables['admintheme']->DisplayImage('icons/system/edit.gif', $this->Lang('editcategory'),'','','systemicon'),
		array('cat_id' => $row['cat_id'])); 

	$items[$i]['delete'] = $this->CreateLink($id, 'admin_deletecategory', $returnid,
		$gCms->variables['admintheme']->DisplayImage('icons/system/delete.gif', $this->Lang('delete'),'','','systemicon'),
		array('cat_id' => $row['cat_id']), $this->Lang('areyousure')); 

	$items[$i]['rowclass']	= $rowclass;
	$rowclass = ($rowclass == 'row1' ? 'row2' : 'row1');
}
$smarty->assign('items', $items);
$smarty->assign('header_category', $this->Lang('header_category'));
$smarty->assign('addlink', $this->CreateLink($id, 'admin_addcategory', $returnid,
	$gCms->variables['admintheme']->DisplayImage('icons/system/newobject.gif', $this->Lang('editcategory'),'','','systemicon') . ' ' . $this->Lang('addcategory')
));
echo $this->ProcessTemplate('listcategories.tpl');

?>
