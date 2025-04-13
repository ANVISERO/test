<?php
if (!isset($gCms)) exit;
if (! $this->CheckPermission('Administer Quizzes'))
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}


$order_list = explode(',',$params['order']);
$count = 1;

if (! is_array($order_list))
	{
	$order_list = array($order_list);
	}

$db =& $gCms->GetDb();
$sql = 'update '.cms_db_prefix().
	'module_qz_questions set order_by=? where question_id=?';
	
foreach ($order_list as $thisField)
	{
   $thisField = substr($thisField,1);
	$rs = $db->Execute($sql, array($count, $thisField));
	$count++;
	}

$params['module_message'] = $this->Lang('reordered');
$this->DoAction('editquiz', $id, $params, $returnid);
?>