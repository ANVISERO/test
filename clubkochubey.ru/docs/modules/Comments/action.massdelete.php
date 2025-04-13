<?php
		if (!isset($gCms)) exit;


		if (!$this->CheckPermission('Manage Comments'))
		{
			echo '<p class="error">'.$this->Lang('needpermission', array('Manage Comments')).'</p>';
			return;
		}

		$query = "DELETE FROM ".cms_db_prefix()."module_comments WHERE";
		
		foreach($params as $param){
		echo $param."<br>";
			if(strpos("_".$param, 'massdel_')){
				$commentid = substr($param, 8);
				$query .= " comment_id = $commentid OR"; 
			}
		}
		$query = substr($query, 0, -3);
		echo $query;

		$result = $db->Execute($query);

$params = array('tab_message'=> 'comments_deleted', 'active_tab' => 'comments');
$this->Redirect($id, 'defaultadmin', '', $params);
?>
