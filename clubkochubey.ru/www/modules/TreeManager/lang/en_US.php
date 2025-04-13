<?php
$lang['error_module'] = 'Error: no module supplied!';
$lang['error_module_name'] = 'Error: no module name %s founded!';
$lang['error_schema'] = 'Error: schema is not array?';
$lang['error_field'] = 'Error: customField is not array?';
$lang['error_cleanfield'] = 'Error: no custom fields?';
$lang['tree'] = 'Tree';
$lang['error'] = 'Error';
$lang['friendlyname'] = 'Tree Manager';
$lang['moddescription'] = 'TreeManager modules provides helpful nested trees like categories for other modules.';
$lang['installed'] = 'Module version %s installed.';
$lang['upgraded'] = 'Module was upgraded to version %s';
$lang['uninstalled'] = 'Module uninstalled.';
$lang['postinstall'] = 'The Module was succesfully installed';
$lang['postuninstall'] = 'The Module was succesfully uninstalled.';
$lang['really_uninstall'] = 'Are you sure the TreeManager module should be uninstalled? This drops all trees.';
$lang['event_info_OnAddChildren'] = 'An event generated when a node children is created';
$lang['event_help_OnAddChildren'] = '
<p>An event generated when a node children is created</p>
<h4>Parameters</h4>
<ul>
<li><em>id</em> - node id created</li>
<li><em>level</em> - level of node</li>
<li><em>norder</em> - numerical order of node</li>
<li><em>tree</em> - tree</li>
</ul>
';
$lang['event_info_OnMoveNode'] = 'An event generated when move a node in other subtree';
$lang['event_help_OnMoveNode'] = '
<p>An event generated when move a node in other subtree</p>
<h4>Parameters</h4>
<ul>
<li><em>id</em> - node id</li>
<li><em>parent</em> - new parent id of node</li>
<li><em>norder</em> - numerical order of node</li>
<li><em>tree</em> - tree</li>
</ul>
';
$lang['event_info_OnMoveOrderNode'] = 'An event generated when move a node in same subtree';
$lang['event_help_OnMoveOrderNode'] = '
<p>An event generated when move a node in same subtree</p>
<h4>Parameters</h4>
<ul>
<li><em>id</em> - node id</li>
<li><em>norder</em> - numerical order of node</li>
<li><em>tree</em> - tree</li>
</ul>
';
$lang['event_info_OnDeleteNode'] = 'An event generated when a node is deleted';
$lang['event_help_OnDeleteNode'] = '
<p>An event generated when a node is deleted</p>
<h4>Parameters</h4>
<ul>
<li><em>id</em> - node id</li>
<li><em>tree</em> - tree</li>
</ul>
';
$lang['event_info_OnUpdateCustom'] = 'An event generated when custom values of a node are updated';
$lang['event_help_OnUpdateCustom'] = '
<p>An event generated when custom values of a node are updated</p>
<h4>Parameters</h4>
<ul>
<li><em>id</em> - node id</li>
<li><em>tree</em> - tree</li>
</ul>
';
$lang['event_info_OnUpdateContentAlias'] = 'An event generated when a content alias of other node is updated';
$lang['event_help_OnUpdateContentAlias'] = '
<p>An event generated when a content alias of other node is updated</p>
<h4>Parameters</h4>
<ul>
<li><em>id</em> - node id</li>
<li><em>alias</em> - alias node id</li>
<li><em>tree</em> - tree</li>
</ul>
';
$lang['event_info_OnDeleteContentAlias'] = 'An event generated when a content alias is deleted';
$lang['event_help_OnDeleteContentAlias'] = '
<p>An event generated when a content alias is deleted</p>
<h4>Parameters</h4>
<ul>
<li><em>id</em> - node id</li>
<li><em>tree</em> - tree</li>
</ul>
';
$lang['help'] = 'This module allows you to build one or more nested trees for your modules. You can add your custom fields also.
<br />
<h3>For module-developers</h3>
Connect your module with TreeManager through <b>GetModuleInstance</b>().<br />
Calling mandatory <b>initTree</b>(your_module) with $this (this call your GetName() function) or use any string that you want, $customField is an array of your custom fields and optional $lang.<br />
Surely you want add custom fields, add them with <b>addCustomField</b>() function (see example below).<br />
Now you can playing with API functions<br />

<br />
<h4>In method.install.php/method.upgrade.php use:</h4>
<pre>

$tree =& $this->GetModuleInstance("TreeManager");
if($tree)
{
	$mycustom = array(); //put your current custom fields in upgrade process
	$lang = "en_US"; //optional
	$tree->initTree($this, $mycustom, $lang);

		$myschema = array("name"=>"C(165)", "alias"=>"C(165)", "description"=>"X");
	$tree->addCustomField($myschema);
}
else
{
	die("TreeManager module not found");
}
</pre>

<br />
<h4>In method.uninstall.php use:</h4>
<pre>

$tree =& $this->GetModuleInstance("TreeManager");
if($tree)
{
	$mycustom = array("name", "alias", "description"); //your current custom fields
	$lang = "en_US"; //optional
	$tree->initTree($this, $mycustom, $lang);

	if(! $tree->dropModuleTable()) die("TreeManager module drop error!");
}
else
{
	die("TreeManager module not found");
}
</pre>

<br />
<h4>In your module use:</h4>
<pre>

$tree =& $this->GetModuleInstance("TreeManager");
if($tree)
{
	$mycustom = array("name", "alias", "description"); //your current custom fields
	$lang = "en_US"; //optional
	$tree->initTree($this, $mycustom, $lang);

	//Example of editing operation
		$input = array("name"=>"Root", "alias"=>"root", "description"=>"Root folder");
	$root_id = $tree->addRoot($custom);
		$input = array("name"=>"Node number1", "alias"=>"node1", "description"=>"First Node");
	$node1_id = $tree->addChildren($root_id, $custom);
		$input = array("name"=>"Node number11", "alias"=>"node11", "description"=>"Second Node");
	$node11_id = $tree->addChildren($node1_id, $custom);
		$input = array("name"=>"Node number12", "alias"=>"node12", "description"=>"Third Node Before");
	$node12_id = $tree->addChildren($node1_id, $custom, 1);

	$bool = $tree->deleteNode($node11_id);

	//Example of fetching
	$node_array = $tree->getNode($node1_id);
}
else
{
	die("TreeManager module not found");
}
</pre>

<br />
<h3>Methods</h3>
<dl>
	<dt>(void) <b>initTree</b>( $module, $customField=array(), $lang="en_US" )</dt>
	<dd><p><b>MANDATORY</b>. Initialize data and check your tables. If your tables not exist create two tables: node (hierarchy) and content (custom).</p></dd>
	<dt>(array) <b>setCmsDropdown</b>( $arr, $option="id", $format=true )</dt>
	<dd><p>Return an array for CMS CreateInputDropdown method. $option is the field that display in option, value is id field of array. If $format is true it display an indent hierarchyhie with level field.</p></dd>
	<dt>(boolean) <b>dropModuleTable</b>()</dt>
	<dd><p>Drop all module tables. Useful in method.uninstall.php</p></dd>
	<dt>(boolean) <b>inTransaction</b>()</dt>
	<dd><p>Return if current transaction locking is in or not.</p></dd>
	<dt>(void) <b>setPeriodTransaction</b>( $period=120 )</dt>
	<dd><p>Set expire period of transaction locking for avoid problem. Default is 120 seconds.</p></dd>
	<dt>(void) <b>endTransaction</b>()</dt>
	<dd><p>Freeing transaction locking for avoid problem.</p></dd>
</dl>

<br />
<h3>Function API editing</h3>
<p>Return boolean false on failure</p>
<dl>
	<dt>(integer) <b>addRoot</b>( $input=array(), $forceid=false )</dt>
	<dd><p>Create a root Node. If you have any custom fields, you can pass values through $input array: ("field"=>$value). If you put a integer $forceid (at your own risk!) you force this $ID and not a sequential $ID. Return $ID of root Node.</p></dd>
	<dt>(integer) <b>addChildren</b>( $id, $input=array(), $order=-1, $forceid=false )</dt>
	<dd><p>Create a new Node as a descendent of another node (whose $id is the parent). Setting $id to 0, -1 or not exist yet then will call addRoot(). You can pass values of custom fields through $input array. $order=-1 add node after other childrens, otherwise add node before others, default -1. If you put a integer $forceid (at your own risk!) you force this $ID and not a sequential $ID. Return $id of new Node.</p></dd>
	<dt>(boolean) <b>moveNode</b>( $id, $newparent, $order=-1 )</dt>
	<dd><p>Move Node $id to descendent of another node $newparent. If Node $id and Node $newparent have same parent then run <b>moveOrderNode</b> function. $order=-1 add node after other childrens, otherwise add node before others, default -1. Return boolean true.</p></dd>
	<dt>(boolean) <b>moveOrderNode</b>( $id, $newid=-1, $neworder=-1 )</dt>
	<dd><p>Move Node $id to place of $newid or $neworder, up or down in same subtree (parent). Return boolean true.</p></dd>
	<dt>(mixed) <b>deleteNode</b>( $id )</dt>
	<dd><p>Delete the Node with $id. This will also delete any descendents of this node. Return boolean true or integer 0 if you try to delete alias node for others.</p></dd>
	<dt>(void) <b>addCustomField</b>( $schema=array() )</dt>
	<dd><p>Add custom fields through $input array. Add column (and create if not) to content table.</p></dd>
	<dt>(boolean) <b>updateCustom</b>( $id, $input=array() )</dt>
	<dd><p>Update values of custom fields of $id, in content table, through $input array. Return boolean true.</p></dd>
	<dt>(boolean) <b>updateContentAlias</b>( $id, $aliasnode )</dt>
	<dd><p>Set a Content Alias of $aliasnode. Now you retrieve content value from $aliasnode and not from $id. Return boolean true.</p></dd>
	<dt>(boolean) <b>deleteContentAlias</b>( $id )</dt>
	<dd><p>Delete Content Alias of Node $id. Now you retrieve content value from $id and not from prev alias node. Return boolean true.</p></dd>
</dl>

<br />
<h3>Function API fetching</h3>
<p>Return array, integer or boolean true on success and boolean false on failure.<br />
Fields of <b>node table</b> are: id, parent, lft, rgt, level, norder. Fields of <b>content table</b> are your custom content fields.<br />
$tree->numNodeInvolved count Nodes <b>involved</b> in operation (if > 1 you have $tree->arrNodeInvolved also with information of that nodes). I.E. getChildren("alias", $value) with 2 nodes with same alias $value return a multidimensional array of 2 array with relative children, numNodeInvolved = 2 and arrNodeInvolved is an array of 2 nodes.</p>
<dl>
	<dt>(array) <b>getCustomFields</b>()</dt>
	<dd><p>Get list about your current <b>Custom Fields</b>.</p></dd>
	<dt>(array) <b>getAllNodeFields</b>()</dt>
	<dd><p>Get list about <b>All Node Fields</b>: fields of <b>node table</b> and <b>content table</b>.</p></dd>
	<dt>(array) <b>getRoot</b>()</dt>
	<dd><p>Get array information about root Node.</p></dd>
	<dt>(array) <b>getNode</b>( $id )</dt>
	<dd><p>Get array information about Node with $id.</p></dd>
	<dt>(array) <b>getByNodeField</b>( $field="id", $value, $orderby="lft" )</dt>
	<dd><p>Get array(s) information about Node by $field of <b>All Node Fields</b>, default is id. $orderby order output array (lft|rgt|norder ASC|DESC), default is "lft". Check $tree->numNodeInvolved: if = 1 then you have array information of nodeID.</p></dd>
	<dt>(array) <b>getByCustomField</b>( $field="id", $value, $orderby="lft" )</dt>
	<dd><p>Alias of <b>getByNodeField</b>(), $field <b>id</b> or <b>Custom Fields</b>, default is id.</p></dd>
	<dt>(array) <b>getParent</b>( $field="id", $value )</dt>
	<dd><p>Get array(s) information about Parent Node by $field <b>id</b> or <b>Custom Fields</b>, default is id. Check $tree->numNodeInvolved, if = 1 then you have array information of nodeID and check $tree->arrNodeInvolved if >1.</p></dd>
	<dt>(array) <b>getSibling</b>( $field="id", $value, $orderby="norder", $nocurrent=false, $idx="id" )</dt>
	<dd><p>Get array(s) informations about Sibling Nodes (Adjacents) by $field <b>id</b> or <b>Custom Fields</b>, default is id. $orderby order output array (norder|lft|rgt ASC|DESC), default is "norder". If $nocurrent is true, skip founded Node from result. $idx put this field, numeric field if empty, in key array, default is id. Check $tree->numNodeInvolved/$tree->arrNodeInvolved.</p></dd>
	<dt>(integer) <b>getSiblingCount</b>( $id )</dt>
	<dd><p>How many Sibling Nodes of Node $id?</p></dd>
	<dt>(boolean) <b>has_children</b>( $id )</dt>
	<dd><p>Has children Node $id? Boolean true/false.</p></dd>
	<dt>(array) <b>getChildren</b>( $field="id", $value, $depth=1, $orderby="level,norder", $nocurrent=false, $idx="", $fieldallow="", $valueallow=false, $fielddeny="", $valuedeny=false )</dt>
	<dd><p>Get array(s) informations about Children Nodes by $field <b>id</b> or <b>Custom Fields</b>, default is id. Setting $depth to 0 or greater get children of $depth sublevel only, with -1 get all Childrens; default is 1 (first depth childrens). $orderby order output array (level|norder|lft|rgt ASC|DESC), default is "level,norder". If $nocurrent is true, skip $node from result. $idx put this field, numeric field if empty, in key array, default is empty. $fieldallow and $valueallow, $fielddeny and $valuedeny are for limit to allow or deny only to this; perform a sql LIKE or NOT LIKE operation. Check $tree->numNodeInvolved/$tree->arrNodeInvolved.</p></dd>
	<dt>(integer) <b>getChildrenCount</b>( $field="id", $value )</dt>
	<dd><p>How many Children Nodes by $field <b>id</b> or <b>Custom Fields</b>, default is id?</p></dd>
	<dt>(integer) <b>getCountNodes</b>()</dt>
	<dd><p>Returns the total number of Nodes in a tree.</p></dd>
	<dt>(array) <b>getByLevel</b>( $level=0, $orderby="lft" )</dt>
	<dd><p>Alias of <b>getByNodeField</b>("level", $level, $orderby). Get array(s) (monodimensional) informations about Nodes with level $level, default 0 (root) and left sorting. You can check $tree->numNodeInvolved for how many nodes.</p></dd>
	<dt>(integer) <b>getMaxDepth</b>()</dt>
	<dd><p>Get max Depth of whole tree.</p></dd>
	<dt>(array) <b>getLeaf</b>( $orderby="lft" )</dt>
	<dd><p>Get array(s) (monodimensional) informations about all Leaf Nodes. $orderby order output array (level|norder|lft|rgt ASC|DESC), default is "lft". You can check $tree->numNodeInvolved for how many nodes.</p></dd>
	<dt>(array) <b>getSubNodes</b>( $node, $depth=1, $orderby="level,norder", $nocurrent=false, $idx="", $fieldallow="", $valueallow=false, $fielddeny="", $valuedeny=false )</dt>
	<dd><p>Same of <b>getChildren</b>() but with a take a complete $node array (mandatory lft,rgt,level key).</p></dd>
	<dt>(array) <b>getBreadcrumbs</b>( $field="id", $value, $idx="id", $noroot=false, $nocurrent=false, $check="", $reverse=false, $orderby="" )</dt>
	<dd><p>Get array(s) information about Path Node by $field <b>id</b> or <b>Custom Fields</b>, default is id. $idx put this field, numeric field if empty, in key array, default is id. $noroot true skip root node, default false. $nocurrent true skip current node, default false. If $check is set you can select exact path that match $field with $value. Check $tree->numNodeInvolved/$tree->arrNodeInvolved.</p></dd>
	<dt>(boolean) <b>matchHierarchy</b>( $path, $field, $delimiter="/" )</dt>
	<dd><p>match hierarchy string $path with a tree path when are made with $field and $delimiter? Boolean true/false.</p></dd>
	<dt>(array) <b>getTree</b>( $depth=-1, $orderby="lft", $idx="", $fieldallow="", $valueallow=false, $fielddeny="", $valuedeny=false )</dt>
	<dd><p>Whole array Node structure of the tree. Setting $depth to 0 or greater get Nodes of $depth only, with -1 get all Nodes; default is -1 (all nodes). $orderby order output array (level|norder|lft|rgt ASC|DESC), default is "lft". $idx put this field, numeric field if empty, in key array, default is empty. $fieldallow and $valueallow, $fielddeny and $valuedeny are for limit to allow or deny only to this; perform a sql LIKE or NOT LIKE operation.</p></dd>
	<dt><b>dumpTree</b>( $depth=-1, $orderby="lft", $fieldallow="", $valueallow=false, $fielddeny="", $valuedeny=false )</dt>
	<dd>Alias of getTree() function. Dump whole Node structure of the tree in a smarty template.</p></dd>
</dl>

<br />
<h3>Copyright and License</h3>

<p>Copyright &copy; 2009, Alberto Benati <a href="mailto:cms@xme.it">alby</a>.<br />
Some Rights Reserved.</p>
<p>This module has been released under the
<a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>.
You must agree to this license before using the module.</p>
';
?>
