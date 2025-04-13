<?php
/* Example of TreeManager integration */

if(!isset($gCms)) exit;

/* Begin method.install/upgrade.php */

$tree =& $this->GetModuleInstance("TreeManager");
if($tree)
{
	$customField = array(""); //your current custom fields in upgrade process
	$lang = "en_US"; //optional
	$tree->initTree('test', $customField, $lang);

	$test = $tree->dropModuleTable();
var_dump($test);



	$myschema = array("name"=>"C(165)", "alias"=>"C(165)", "description"=>"X");
	$test = $tree->addCustomField($myschema);
var_dump($test);
}
else
{
	die("Module not found");
}

/* End method.install/upgrade.php */





/* Begin editing operations */

$tree =& $this->GetModuleInstance("TreeManager");
if($tree)
{
	$myfield = array("name", "alias", "description");
	$lang = "en_US";
	$tree->initTree('test', $myfield, $lang);

	$custom = array("name"=>"CMS Publishing", "alias"=>"cmspub", "description"=>"CMS Publishing store");
	$root_id = $tree->addRoot($custom);
echo '$root_id:';
var_dump($root_id);

		$custom = array("name"=>"Article", "alias"=>"article", "description"=>"Articles on CMS's");
	$article_id = $tree->addChildren($root_id, $custom);
		$custom = array("name"=>"Tip", "alias"=>"tip", "description"=>"Tips and Tricks");
	$tip_id = $tree->addChildren($root_id, $custom);
		$custom = array("name"=>"Manual", "alias"=>"manual", "description"=>"Manuals, howto and supports");
	$manual_id = $tree->addChildren($root_id, $custom);
		$custom = array("name"=>"Magazine", "alias"=>"magazine", "description"=>"World magazines CMS related");
	$magazine_id = $tree->addChildren($root_id, $custom);
		$custom = array("name"=>"Book", "alias"=>"book", "description"=>"Books, draft and whatever CMS's");
	$book_id = $tree->addChildren($root_id, $custom);
echo "addChildren({$root_id}, Book data):";
var_dump($book_id);

		$custom = array("name"=>"CMSMS", "alias"=>"cmsms", "description"=>"CMS Made Simple articles");
	$article_cmsms_id = $tree->addChildren($article_id, $custom);
		$custom = array("name"=>"JOOMLA", "alias"=>"joomla", "description"=>"JOOMLA articles");
	$article_joomla_id = $tree->addChildren($article_id, $custom);
		$custom = array("name"=>"DRUPAL", "alias"=>"drupal", "description"=>"DRUPAL articles");
	$article_drupal_id = $tree->addChildren($article_id, $custom);

		$custom = array("name"=>"CMSMS", "alias"=>"cmsms", "description"=>"CMS Made Simple tips");
	$tip_cmsms_id = $tree->addChildren($tip_id, $custom);
		$custom = array("name"=>"JOOMLA", "alias"=>"joomla", "description"=>"JOOMLA tips");
	$tip_joomla_id = $tree->addChildren($tip_id, $custom);

		$custom = array("name"=>"CMSMS", "alias"=>"cmsms", "description"=>"CMS Made Simple manual");
	$manual_cmsms_id = $tree->addChildren($manual_id, $custom);

		$custom = array("name"=>"CMSMS", "alias"=>"cmsms", "description"=>"CMS Made Simple Magazine");
	$magazine_cmsms_id = $tree->addChildren($magazine_id, $custom);
echo "addChildren({$magazine_id}, CMS Made Simple Magazine):";
var_dump($magazine_cmsms_id);

		$custom = array("name"=>"CMSMS", "alias"=>"cmsms", "description"=>"CMS Made Simple Books");
	$book_cmsms_id = $tree->addChildren($book_id, $custom);
		$custom = array("name"=>"JOOMLA", "alias"=>"joomla", "description"=>"JOOMLA Books");
	$book_joomla_id = $tree->addChildren($book_id, $custom);

		$custom = array("name"=>"Module News", "alias"=>"news", "description"=>"Module News in deep");
	$article_cmsms_news_id = $tree->addChildren($article_cmsms_id, $custom);
		$custom = array("name"=>"Module Manager", "alias"=>"mm", "description"=>"Module Manager in deep");
	$article_cmsms_mm_id = $tree->addChildren($article_cmsms_id, $custom);
		$custom = array("name"=>"File Manager", "alias"=>"file", "description"=>"File Manager in deep");
	$article_cmsms_file_id = $tree->addChildren($article_cmsms_id, $custom);
		$custom = array("name"=>"Tree Manager", "alias"=>"tree", "description"=>"Tree Manager in deep - first");
	$article_cmsms_tree_id = $tree->addChildren($article_cmsms_id, $custom, 1);
echo "addChildren({$article_cmsms_id}, Tree Manager data, norder=1):";
var_dump($article_cmsms_tree_id);

		$custom = array("name"=>"Module Translations", "alias"=>"tr", "description"=>"Module Translations in deep");
	$article_cmsms_tr_id = $tree->addChildren($article_cmsms_id, $custom);

		$custom = array("name"=>"Themes", "alias"=>"theme", "description"=>"JOOMLA themes");
	$article_joomla_theme_id = $tree->addChildren($article_joomla_id, $custom);

		$custom = array("name"=>"Title News", "alias"=>"newstitle", "description"=>"Title News tip");
	$tip_cmsms_newstitle_id = $tree->addChildren($tip_cmsms_id, $custom);
		$custom = array("name"=>"Ecommerce", "alias"=>"ecommerce", "description"=>"Ecommerce with JOOMLA");
	$tip_joomla_ecommerce_id = $tree->addChildren($tip_joomla_id, $custom);

		$custom = array("name"=>"MLE manual", "alias"=>"mle", "description"=>"CMS Made Simple Multilingual Edition howto");
	$manual_cmsms_mle_id = $tree->addChildren($manual_cmsms_id, $custom);
		$custom = array("name"=>"Ecommerce", "alias"=>"ecommerce", "description"=>"Ecommerce solution with CMS Made Simple");
	$manual_cmsms_ecommerce_id = $tree->addChildren($manual_cmsms_id, $custom);

		$custom = array("name"=>"Building Websites", "alias"=>"building", "description"=>"Building Websites with CMS Made Simple");
	$book_cmsms_building_id = $tree->addChildren($book_cmsms_id, $custom);
		$custom = array("name"=>"Building Websites", "alias"=>"building", "description"=>"Building Websites with Joomla!");
	$book_joomla_building_id = $tree->addChildren($book_joomla_id, $custom);



		$custom = array("name"=>"MLE manual upd", "alias"=>"mle", "description"=>"CMS Made Simple Multilingual Edition: howto updated");
	$updateCustom = $tree->updateCustom($manual_cmsms_mle_id, $custom);
echo "updateCustom({$manual_cmsms_mle_id}, updated):";
var_dump($updateCustom);


	$moveNode = $tree->moveNode($manual_cmsms_ecommerce_id, $tip_cmsms_id, 1);
echo "moveNode({$manual_cmsms_ecommerce_id}, Under Tip-CMSMS, before norder=1):";
var_dump($moveNode);


	$updateContentAlias = $tree->updateContentAlias(7, 10);
echo "updateContentAlias(7, 10):";
var_dump($updateContentAlias);

	$updateContentAlias = $tree->updateContentAlias(9, 10);
echo "updateContentAlias(9, 10):";
var_dump($updateContentAlias);

	$updateContentAlias = $tree->updateContentAlias($magazine_cmsms_id, 10);
echo "updateContentAlias($magazine_cmsms_id, 10):";
var_dump($updateContentAlias);


	$deleteContentAlias = $tree->deleteContentAlias(7);
echo "deleteContentAlias(7):";
var_dump($deleteContentAlias);


	$deleteNode = $tree->deleteNode($magazine_id);
echo 'deleteNode({$magazine_id}) Magazine:';
var_dump($deleteNode);

	$deleteNode = $tree->deleteNode(3);
echo 'deleteNode(3) NO:';
var_dump($deleteNode);


	$moveOrderNode = $tree->moveOrderNode(16, -1, 4);
echo "moveOrderNode(16, -1, 4):";
var_dump($moveOrderNode);

}
else
{
	die('Module not found');
}

/* End editing operations */





/* Begin fetching operations */

$tree =& $this->GetModuleInstance("TreeManager");
if($tree)
{
	$myfield = array("name", "alias", "description");
	$lang = "en_US";
	$tree->initTree('test', $myfield, $lang);

	$tree->dumpTree();


	$test = $tree->getCustomFields();
echo '<br />getCustomFields()';
var_dump($test);

#	$test = $tree->getAllNodeFields();
#echo '<br />getAllNodeFields()';
#var_dump($test);


	$test = $tree->getRoot();
echo '<br />getRoot()';
var_dump($tree->numNodeInvolved);
var_dump($test);


	$test = $tree->getNode( 18 );
echo '<br />getNode( 18 )';
var_dump($tree->numNodeInvolved);
var_dump($test);

	$test = $tree->getNode( 1500 );
echo '<br />getNode( 1500 )';
var_dump($tree->numNodeInvolved);
var_dump($test);


	$test = $tree->getByNodeField('id', 18);
echo '<br />getByNodeField( $field="id", 18 )';
var_dump($tree->numNodeInvolved);
var_dump($test);

	$test = $tree->getByNodeField('level', 1);
echo '<br />getByNodeField( $field="level", 1 )';
var_dump($tree->numNodeInvolved);
var_dump($test);


	$test = $tree->getByCustomField( "id", 18 );
echo '<br />getByCustomField( $field="id", 18 )';
var_dump($tree->numNodeInvolved);
var_dump($test);

	$test = $tree->getByCustomField( "alias", "cmsms" );
echo '<br />getByCustomField( $field="alias", "cmsms" )';
var_dump($tree->numNodeInvolved);
var_dump($test);


	$test = $tree->getParent("id", 1);
echo '<br />getParent( $field="id", 1 )';
var_dump($tree->numNodeInvolved);
var_dump($test);

	$test = $tree->getParent("id", 23);
echo '<br />getParent( $field="id", 23 )';
var_dump($tree->numNodeInvolved);
var_dump($test);

	$test = $tree->getParent("alias", "cmsms");
echo '<br />getParent( $field="alias", "cmsms" )';
var_dump($tree->numNodeInvolved);
if($tree->numNodeInvolved > 1) {echo 'Nodes:'; var_dump($tree->arrNodeInvolved);}
var_dump($test);


	$test = $tree->getSibling("id", 18);
echo '<br />getSibling( $field="id", 18  )';
var_dump($tree->numNodeInvolved);
var_dump($test);

	$test = $tree->getSibling("id", 18, "rgt DESC", true);
echo '<br />getSibling( $field="id", 18, $orderby="rgt DESC", $nocurrent=true )';
var_dump($tree->numNodeInvolved);
var_dump($test);

	$test = $tree->getSibling("alias", "joomla");
echo '<br />getSibling( $field="alias", "joomla", $orderby="norder ASC", $nocurrent=false  )';
var_dump($tree->numNodeInvolved);
if($tree->numNodeInvolved > 1) {echo 'Nodes:'; var_dump($tree->arrNodeInvolved);}
var_dump($test);


	$test = $tree->has_children(18);
echo '<br />has_children( 18 )';
var_dump($test);

	$test = $tree->has_children(14);
echo '<br />has_children( 14 )';
var_dump($test);


	$test = $tree->getChildren("id", 2, 1);
echo '<br />getChildren( $field="id", 2, $depth=1 )';
var_dump($tree->numNodeInvolved);
var_dump($test);

	$test = $tree->getChildren("id", 2, 0);
echo '<br />getChildren( $field="id", 2, $depth=0 )';
var_dump($tree->numNodeInvolved);
var_dump($test);

	$test = $tree->getChildren("id", 2, -1, "level,norder", true);
echo '<br />getChildren( $field="id", 2, $depth=-1, $orderby="level,norder", $nocurrent=true )';
var_dump($tree->numNodeInvolved);
var_dump($test);

	$test = $tree->getChildren("alias", "cmsms", -1, "level,norder", true);
echo '<br />getChildren( $field="alias", "cmsms", $depth=-1, $orderby="level,norder", $nocurrent=true )';
var_dump($tree->numNodeInvolved);
if($tree->numNodeInvolved > 1) {echo 'Nodes:'; var_dump($tree->arrNodeInvolved);}
var_dump($test);


	$test = $tree->getChildrenCount('id', 2);
echo '<br />getChildrenCount( "id", 2 )';
var_dump($test);


	$test = $tree->getCountNodes();
echo '<br />getCountNodes( )';
var_dump($test);


	$test = $tree->getByLevel(2);
echo '<br />getByLevel( $level="2" )';
var_dump($tree->numNodeInvolved);
var_dump($test);

	$test = $tree->getByLevel(2, "rgt DESC");
echo '<br />getByLevel( $level="2", $orderby="rgt DESC" )';
var_dump($tree->numNodeInvolved);
var_dump($test);


	$test = $tree->getLeaf();
echo '<br />getLeaf( )';
var_dump($tree->numNodeInvolved);
var_dump($test);


	$test = $tree->getMaxDepth();
echo '<br />getMaxDepth( )';
var_dump($test);


	$test = $tree->getBreadcrumbs('id', 18);
echo '<br />getBreadcrumbs( $field="id", 18 )';
var_dump($tree->numNodeInvolved);
if($tree->numNodeInvolved > 1) {echo 'Nodes:'; var_dump($tree->arrNodeInvolved);}
var_dump($test);

	$test = $tree->getBreadcrumbs('id', 18, 'id', false, false, '', true);
echo '<br />getBreadcrumbs( $field="id", 18, $idx="id", $noroot=false, $nocurrent=false, $check="", $reverse=true )';
var_dump($tree->numNodeInvolved);
if($tree->numNodeInvolved > 1) {echo 'Nodes:'; var_dump($tree->arrNodeInvolved);}
var_dump($test);

	$test = $tree->getBreadcrumbs("alias", "ecommerce", 'alias', true);
echo '<br />getBreadcrumbs( $field="alias", "ecommerce", $idx="alias", $noroot=true )';
var_dump($tree->numNodeInvolved);
if($tree->numNodeInvolved > 1) {echo 'Nodes:'; var_dump($tree->arrNodeInvolved);}
var_dump($test);

	$test = $tree->getBreadcrumbs("alias", "ecommerce", 'alias', false, true, "cmsms");
echo '<br />getBreadcrumbs( $field="alias", "ecommerce", $idx="alias", $noroot=false, $nocurrent=true, $check="cmsms" )';
var_dump($tree->numNodeInvolved);
if($tree->numNodeInvolved > 1) {echo 'Nodes:'; var_dump($tree->arrNodeInvolved);}
var_dump($test);

}
else
{
	die('Module not found');
}
?>