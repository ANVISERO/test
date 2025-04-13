<?php
		if (!isset($gCms)) exit;

		$detailpage = '';
		$feed_title = 'CMS Made Simple Comments Feed';


		
		$db = &$gCms->db;

		// Get comments
		$query = "SELECT * FROM ".cms_db_prefix()."module_comments WHERE  active='1'";
		// $dbresult = $db->Execute( $q );
		
		/*
		$query .= "(".$db->IfNull('start_time',$db->DBTimeStamp(1))." < ".$db->DBTimeStamp(time()).") ";
		$query .= " AND ((".$db->IfNull('end_time',$db->DBTimeStamp(1))." = ".$db->DBTimeStamp(1).") OR (end_time > ".$db->DBTimeStamp(time()).")) ";
		$query .= ' ORDER BY news_date DESC'; 
		*/
		$dbresult = '';

		$start = -1;
		$number = -1;
		if( isset( $params['number'] ) )
		{
			$number = $params['number'];
		}

		if( $number >= 0 )
		{
			$dbresult =& $db->SelectLimit($query, $number, $start);
		}
		else
		{
			$dbresult =& $db->Execute($query);
		}

		while ($dbresult && $row = $dbresult->FetchRow())
		{
		// print_r($row);
			$onerow = new stdClass();

			$sendtodetail = array('articleid'=>$row['comment_id']);
			$onerow->link = $gCms->config['root_url'].'/?'.$gCms->config['query_var'].'='.$row['page_id'];
			$onerow->id = $row['comment_id'];
			$onerow->title = $row['comment_title'];
			$onerow->content = $row['comment_data'];
			$onerow->summary = $row['comment_data'];
			$onerow->strippedcontent = strip_tags($onerow->content);
			$onerow->strippedsummary = strip_tags($onerow->summary);
			$onerow->postdate = $row['create_date'];
			$onerow->gmdate = gmdate('r', $db->UnixTimeStamp($row['create_date']));
			$onerow->startdate = $row['create_date'];
			$onerow->enddate = $row['modified_date'];
			$entryarray[]= $onerow;
		}

		$this->smarty->assign_by_ref('items', $entryarray);

		global $gCms;

		$this->smarty->assign_by_ref('root_url', $gCms->config['root_url']);
		$this->smarty->assign_by_ref('query_var', $gCms->config['query_var']);


		#Display template
		$variables =& $gCms->variables;
						if( preg_match( '/Mozilla/', $_SERVER["HTTP_USER_AGENT"] ) )
						{
		   $variables['content-type'] = 'text/xml';
						}
						else 
						{
		   $variables['content-type'] = 'application/rss+xml';
						}
		//$variables['content-filename'] = 'feed.xml';

		echo $this->ProcessTemplate('rssfeed.tpl');

# vim:ts=4 sw=4 noet
?>