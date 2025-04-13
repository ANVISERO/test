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

		//Now remove the article
		$query = "DELETE FROM ".cms_db_prefix()."module_comments WHERE comment_id = ?";
		$db->Execute($query, array($commentid));

$params = array('tab_message'=> 'comment_deleted', 'active_tab' => 'comments');
$this->Redirect($id, 'defaultadmin', '', $params);
?>
