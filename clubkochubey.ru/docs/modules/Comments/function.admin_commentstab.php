<?php

if( !isset($gCms) ) exit;
//
// Setup
//
// Note: Page limit code adapted from Products dev-2.0 branch which is created by Robert Campbell 
$pagelimits = array('10'=>10,'50'=>50,'100'=>100,'500'=>500);
$pagelimit = 10;
$pagenumber = 1;

//
// Handle Get parameters
//
if( isset($params['pagenumber']) )
  {
    $pagenumber = (int)$params['pagenumber'];
  }
  
//
// Handle form submit
//
if( isset($params['submit']) )
  {
    $pagelimit = (int)$params['input_pagelimit'];
  }

//
// Begin the form
//
$smarty->assign('filter_formstart',$this->CGCreateFormStart($id,'defaultadmin'));
$smarty->assign('filter_formend',$this->CreateFormEnd());
$smarty->assign('input_pagelimit',$this->CreateInputDropdown($id,'input_pagelimit',$pagelimits,-1,$pagelimit));

//
// Build the query
//
$query1 = "SELECT * FROM ".cms_db_prefix()."module_comments ORDER by comment_date DESC";
$query2 = "SELECT count(p.comment_id) AS count FROM ".cms_db_prefix().'module_comments p';

//
// Setup start element, and count pages
//
$qparms = ''; // We don't need this, unlike Products.
$totalcount = $db->GetOne($query2,$qparms);
$pagecount = (int)($totalcount/$pagelimit);
if( ($totalcount % $pagelimit) != 0 ) $pagecount++;
$startelement = ($pagenumber-1) * $pagelimit;
//
$smarty->assign('pagenumber',$pagenumber);
$smarty->assign('pagecount',$pagecount);
$smarty->assign('totalrows',$totalcount);
if( $pagenumber > 1 )
  {
    $params['pagenumber'] = 1;
    $smarty->assign('firstpage_url',
		    $this->CreateURL($id,'defaultadmin','',$params));
    $params['pagenumber'] = $pagenumber - 1;
    $smarty->assign('prevpage_url',
		    $this->CreateURL($id,'defaultadmin','',$params));
  }
if( $pagenumber < $pagecount )
  {
    $params['pagenumber'] = $pagenumber + 1;
    $smarty->assign('nextpage_url',
		    $this->CreateURL($id,'defaultadmin','',$params));
    $params['pagenumber'] = $pagecount;
    $smarty->assign('lastpage_url',
		    $this->CreateURL($id,'defaultadmin','',$params));
  }
$entryarray = array();
$dbresult = $db->SelectLimit($query1,$pagelimit,$startelement,$qparms);

$rowclass = 'row1';

$message = '';
if($dbresult->RecordCount() == 0){
	$message = $this->Lang('nocommentsfound');
}

while ($dbresult && $row = $dbresult->FetchRow())
{
	$onerow = new stdClass();
	
	$onerow->id = $row['comment_id'];
	$data = substr($row['comment_data'], 0, 64);
	$onerow->data = $this->CreateLink($id, 'editcomment', $returnid, $data, array('commentid'=>$row['comment_id']));
	if ($row['active'])
	{
	$onerow->active = $this->CreateLink($id,'updatecomment',$returnid, lang('true'),
	   array('commentid'=>$row['comment_id'], 'state'=>'0'));
	}
 else
	{
	$onerow->active = $this->CreateLink($id,'updatecomment',$returnid, lang('false'),
	   array('commentid'=>$row['comment_id'], 'state'=>'1'));
	   }
	$onerow->postdate = $row['comment_date'];
	$onerow->title = $row['comment_title'];
	$onerow->author = $row['comment_author'];
	$onerow->title = $row['comment_title'];
	$onerow->email = $row['author_email'];
	$onerow->website = $row['author_website'];
	$onerow->pageid = $row['page_id']; //ContentManager::GetPageAliasFromID($row['page_id']);
	$onerow->createdate = $row['create_date'];
	$onerow->modifydate = $row['modified_date'];
	$onerow->trackback = $row['trackback'] == 1 ? lang('true') : lang('false');
	$onerow->editor = $row['editor'] == 1 ? lang('true') : lang('false');
	$onerow->rowclass = $rowclass;
	
	$onerow->editlink = $this->CreateLink($id, 'editcomment', $returnid, $gCms->variables['admintheme']->DisplayImage('icons/system/edit.gif', $this->Lang('edit'),'','','systemicon'), array('commentid'=>$row['comment_id']));
	$onerow->deletelink = $this->CreateLink($id, 'deletecomment', $returnid, $gCms->variables['admintheme']->DisplayImage('icons/system/delete.gif', $this->Lang('delete'),'','','systemicon'), array('commentid'=>$row['comment_id']), $this->Lang('areyousure'));
	$onerow->massdeletebox = $this->CreateInputCheckbox($id, 'massdel_'.$row['comment_id'], 'massdel_'.$row['comment_id'], -1);

	
	array_push($entryarray, $onerow);
	
	($rowclass=="row1"?$rowclass="row2":$rowclass="row1");
}

$this->smarty->assign('message', $message);
$this->smarty->assign('formstart', $this->CreateFormStart($id, 'massdelete', $returnid));
$this->smarty->assign('checkall', $this->CreateInputCheckBox($id,"tagall","tagall","","onclick='selectall();'"));
$this->smarty->assign('formend',  $this->CreateFormEnd());
$this->smarty->assign_by_ref('items', $entryarray);
$this->smarty->assign('itemcount', count($entryarray));

$this->smarty->assign('authortext', $this->Lang('author'));
$this->smarty->assign('titletext', $this->Lang('comment_title'));
$this->smarty->assign('emailtext', $this->Lang('email'));
$this->smarty->assign('websitetext', $this->Lang('website'));
$this->smarty->assign('activetext', $this->Lang('active'));
$this->smarty->assign('datatext', $this->Lang('data'));
$this->smarty->assign('postdatetext', $this->Lang('postdate'));
$this->smarty->assign('modifydatetext', $this->Lang('modifydate'));
$this->smarty->assign('enable_trackbacks', $this->GetPreference('enable_trackbacks'));
$this->smarty->assign('trackbacktext', $this->Lang('trackback'));
$this->smarty->assign('editortext', $this->Lang('editor'));
$this->smarty->assign('pageidtext', $this->Lang('pageid'));

$this->smarty->assign('massdelbutton', $this->CreateInputSubmit($id, 'delselected', $this->Lang('delselected'), '', '', $this->Lang('areyousure')));

#Display template
echo $this->ProcessTemplate('commentlist.tpl');

?>