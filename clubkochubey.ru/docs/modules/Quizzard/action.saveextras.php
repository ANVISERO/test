<?php
if (!isset($gCms)) exit;

if (! $this->CheckPermission('Administer Quizzes'))
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}

	$db =& $gCms->GetDb();

	$upquery = 'update '.cms_db_prefix().'module_qz_extra_fields set field_name=?, field_type=?, field_display_len=?, field_max_len=?, field_weight=? where field_id=?';
	$iquery = 'insert into '.cms_db_prefix().'module_qz_extra_fields (field_id,field_name,field_type,field_display_len,field_max_len,field_weight) values (?,?,?,?,?,?)';
	
	foreach ($params as $pkey=>$pval)
		{
		if (substr($pkey,0,7) == 'extra_n' && !empty($params[$pkey]))
			{
			$ef = explode('_',$pkey);
			if ($ef[2] == -1)
				{
				$e_id = $db->GenID(cms_db_prefix().'module_qz_extra_field_seq');
				$dbresult = $db->Execute($iquery,array(
					$e_id,
					$params['extra_n_-1'],
					$params['extra_t_-1'],
					$params['extra_l_-1'],
					$params['extra_m_-1'],
					$params['extra_w_-1']
					));
				}
			else
				{
				$dbresult = $db->Execute($upquery, array(
					$params['extra_n_'.$ef[2]],
					$params['extra_t_'.$ef[2]],
					$params['extra_l_'.$ef[2]],
					$params['extra_m_'.$ef[2]],
					$params['extra_w_'.$ef[2]],
					$ef[2]
					));	
				}
			if ($dbresult === false)
			    {
			    return $this->DisplayErrorPage($id, $params, $returnid, $db->ErrorMsg());
			    }
			}
		}

$params = array('tab_message'=> 'extrasupdated', 'active_tab' => 'extra');
$this->DoAction('defaultadmin', $id, $params, $returnid);
?>