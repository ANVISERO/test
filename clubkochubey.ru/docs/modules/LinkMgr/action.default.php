<?php

global $gCms;

$db =& $this->GetDb();

if (isset($params["category"]) && $params["category"] != '') {

$category = strtoupper(cms_html_entity_decode(trim($params['category'])));

$query1 = 'SELECT * FROM ' . cms_db_prefix() . 'module_linkmgr_categories WHERE upper(link_category) = "'.$category.'" ORDER BY cat_id ASC';

$dbresult1 =& $db->Execute($query1);

if($dbresult1 && $row1 = $dbresult1->FetchRow()) {

	$link_cat = $row1['cat_id'];

} else { 
	die('Error: '.mysql_error());}

$query = 'SELECT l.*, lc.link_category FROM ' . cms_db_prefix() . 'module_linkmgr_links l LEFT JOIN '.cms_db_prefix().'module_linkmgr_categories lc ON l.link_cat = lc.cat_id WHERE link_cat='.$link_cat.' ORDER BY link_name ASC';

} else {

	$query = 'SELECT l.*, lc.link_category FROM ' . cms_db_prefix() . 'module_linkmgr_links l LEFT JOIN '.cms_db_prefix().'module_linkmgr_categories lc ON l.link_cat = lc.cat_id ORDER BY link_category,link_name ASC';

}

$dbresult =& $db->Execute($query);
$items = Array();
while($row = $dbresult->FetchRow()){                    
	$i 				= count($items);
	$items[$i]['link_name']		= $this->ProcessTemplateFromData($row['link_name']);
	$items[$i]['link_category'] 	= $this->ProcessTemplateFromData($row['link_category']);
	$items[$i]['link_url']		= $this->ProcessTemplateFromData($row['link_url']);
	if ($row['link_img'] <> $this->Lang('no_img')) {
		$items[$i]['link_img']	= $this->ProcessTemplateFromData($config['image_uploads_url'] . '/linkmgr/' . $row['link_img']);
	}
	$items[$i]['link_desc']		= $this->ProcessTemplateFromData($row['link_desc']);
}
$smarty->assign('items', $items);

$query2 = 'SELECT * FROM ' . cms_db_prefix() . 'module_linkmgr_categories ORDER BY link_category ASC';
$dbresult =& $db->Execute($query2);
$cats = Array();
while($row = $dbresult->FetchRow()){                    
	$i 				= count($cats);
	$cats[$i]['links_category']	= $this->ProcessTemplateFromData($row['link_category']);

}
$smarty->assign('cats', $cats);


if(!isset($params['template'])) {
	$template = 'default';
} else {
	$template = $params['template'];
}

$query = 'SELECT content FROM ' . cms_db_prefix() . 'module_linkmgr_templates WHERE name=?';
$dbresult =& $db->Execute($query, array($template));
$items = Array();

if($dbresult && $row = $dbresult->FetchRow()){
	echo $this->ProcessTemplateFromData($row['content']);
} else {
	echo 'ERROR: No such template: ' . $params['template'];
}
?>
