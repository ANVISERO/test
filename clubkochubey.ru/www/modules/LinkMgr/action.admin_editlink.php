<?php

if (!isset($gCms)) exit;

if (isset($params['cancel'])) 
	$this->Redirect($id, 'defaultadmin', $returnid, array('active_tab' => 'links'));

$db =& $this->GetDb();

$errors 	= array();

$entry_id 	= (isset($params['entry_id']) ? $params['entry_id'] : '');
$link_name 	= (isset($params['link_name']) ? $params['link_name'] : '');
$link_url 	= (isset($params['link_url']) ? $params['link_url'] : '');
$link_img 	= (isset($params['link_img']) ? $params['link_img'] : '');
$link_cat 	= (isset($params['link_cat']) ? $params['link_cat'] : '');
$link_desc 	= (isset($params['link_desc']) ? $params['link_desc'] : '');

if(isset($params['submit']) || isset($params['apply'])) {


	if(!$this->CheckPermission('LinkMgr: modify links')) {

		$errors[] = $this->Lang('needpermission', array($this->Lang('modlinkslisting')));

	} else {

		if($params['link_name'] != '' && $params['link_url'] != '' && $params['link_desc'] != '') {

			if (!preg_match("/http:/i", $link_url)) {

				$link_url = "http://" . $link_url;

			}

			$query = 'UPDATE ' . cms_db_prefix() . 'module_linkmgr_links 

				SET
					link_name=?,
					link_url=?,
					link_img=?,
					link_cat=?,
					link_desc=? 
				WHERE 
					entry_id=' . $entry_id;

			$result = $db->Execute($query, array($link_name, $link_url, $link_img, $link_cat, $link_desc));

			if(!$result) {

				$errors[] = 'SQL ERROR: ' . $db->ErrorMsg() . '(with ' . $db->sql . ')';

			} else {

				if(!isset($params['apply'])) {

					$this->Redirect($id, 'defaultadmin', $returnid, array('active_tab' => 'links', 'message' => 'changessaved'));

				} else {

					echo $this->ShowMessage($this->Lang('changessaved'));

				}

			}

		} else {

			if($params['link_name'] == '')
				$errors[] = $this->Lang('no_link_name');

			if($params['link_url'] == '')
				$errors[] = $this->Lang('no_link_url');

			if($params['link_desc'] == '')
				$errors[] = $this->Lang('no_link_desc');

		}

	}

} else {

	$query = 'SELECT * FROM ' . cms_db_prefix() . 'module_linkmgr_links WHERE entry_id = ' . $entry_id;

	$dbresult =& $db->Execute($query);

	if(!$dbresult) {

		$errors[] = $this->Lang('nosuchid', array($entry_id));
		$entry_id = '';

	} else {

		$row 		= $dbresult->FetchRow();
		$link_name	= $row['link_name'];
		$link_url	= $row['link_url'];
		$link_img	= $row['link_img'];
		$link_cat	= $row['link_cat'];
		$link_desc 	= $row['link_desc'];

	}

}

if(count($errors))
	echo $this->ShowErrors($errors);

if(isset($entry_id))
	$smarty->assign('idfield', $this->CreateInputHidden($id, 'entry_id', $entry_id));

$categorylist = array();
$query = "SELECT * FROM ".cms_db_prefix()."module_linkmgr_categories ORDER BY link_category";
$dbresult = $db->Execute($query);
    
while ($dbresult && $row = $dbresult->FetchRow())
	{
		$categorylist[$row['link_category']] = $row['cat_id'];
  	}

$dirPath = dir($config['image_uploads_path'] . DIRECTORY_SEPARATOR . 'linkmgr');
$imglist = array();
$imglist[$this->Lang('no_img')] = $this->Lang('no_img');
$imgArray = array();
while (($file = $dirPath->read()) !== false) {
	if ((substr($file, 0, 6)<>"thumb_"))
	{
		if ((substr($file, -3)=="gif") || (substr($file, -3)=="jpg") || (substr($file, -3)=="png"))
		{
   			$imgArray[ ] = trim($file);
		}
	}
}
$dirPath->close();
sort($imgArray);

$c = count($imgArray);
for($i=0; $i<$c; $i++)
{
	$imglist[$imgArray[$i]] = $imgArray[$i];
}

$onchangetext='onchange="document'.$id.'moduleform_1.submit()"';


$smarty->assign('formid',$id);
$smarty->assign('startform', $this->CreateFormStart($id, 'admin_editlink', $returnid));
$smarty->assign('endform', $this->CreateFormEnd());

$smarty->assign('prompt_name', $this->Lang('prompt_name'));
$smarty->assign('prompt_url', $this->Lang('prompt_url'));
$smarty->assign('prompt_img', $this->Lang('prompt_img'));
$smarty->assign('note_img', $this->Lang('note_img'));
$smarty->assign('prompt_desc', $this->Lang('prompt_desc'));
$smarty->assign('prompt_link_category', $this->Lang('prompt_link_category'));

$smarty->assign('input_name', $this->CreateInputText($id, 'link_name', $link_name, $size='70', $maxlength='255'));
$smarty->assign('input_url', $this->CreateInputText($id, 'link_url', $link_url, $size='70', $maxlength='255'));
$smarty->assign('input_img', $this->CreateInputDropdown($id, 'link_img', $imglist, -1, $link_img, $link_img));
$smarty->assign('input_desc', $this->CreateInputText($id, 'link_desc', $link_desc, $size='70', $maxlength='255'));
$smarty->assign('input_link_cat', $this->CreateInputDropdown($id, 'link_cat', $categorylist, -1, $link_cat, $onchangetext));

$smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', lang('submit')));
$smarty->assign('apply', $this->CreateInputSubmit($id, 'apply', lang('apply')));
$smarty->assign('cancel', $this->CreateInputSubmit($id, 'cancel', lang('cancel')));
echo $this->ProcessTemplate('editlink.tpl');
?>
