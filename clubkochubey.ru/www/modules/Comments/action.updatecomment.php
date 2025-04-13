<?php
		if (!isset($gCms)) exit;


		if (!$this->CheckPermission('Manage Comments'))
		{
			echo '<p class="error">'.$this->Lang('needpermission', array('Manage Comments')).'</p>';
			return;
		}

		$commentid = '';
		if (isset($params['commentid']))
		{
			$commentid = $params['commentid'];
		}

		$query = "UPDATE ".cms_db_prefix()."module_comments SET active=? WHERE comment_id = ?";
		$db->Execute($query, array($params['state'],$commentid));

$params = array('tab_message'=> 'comment_updated', 'active_tab' => 'comments');
$this->Redirect($id, 'defaultadmin', '', $params);
?>
