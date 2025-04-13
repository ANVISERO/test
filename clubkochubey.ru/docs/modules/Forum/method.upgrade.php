<?php
#-------------------------------------------------------------------------
# Forum Made Simple - a threaded multi-forum message board
# http://dev.cmsmadesimple.org/projects/forummadesimple
# 2006-2007 (c) tamlyn (Tamlyn Rhodes)
# 2007-2010 (c) alby (Alberto Benati)
#------------------------------------------------------------------------
# CMS Made Simple is (c) 2005-2010 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://cmsmadesimple.org
#------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#
#------------------------------------------------------------------------
#$Id: method.upgrade.php 103 2010-05-01 19:58:22Z alby $

if(!isset($gCms)) exit;

if($this->LoadDataModule() !== true) die($this->LoadDataModule());

$db =& $gCms->GetDb();
$dict = NewDataDictionary($db);
#mysql-specific, but ignored by other database
$table_options = array('mysql'=>'TYPE=MyISAM', 'mysqli'=>'TYPE=MyISAM');
$idx_options = array('UNIQUE');


$current_version = $oldversion;


switch($current_version) {
	case "0.1" :
	case "0.2" :
	case "0.3" :
		#Add two new columns
		$q = $dict->AddColumnSQL(cms_db_prefix()."module_forum_topics", "poster_id I NOTNULL, last_post_id I NOTNULL");
		$dict->ExecuteSQLArray($q);
		#Put some meaningful values in the new columns. this is actually wrong but it's better than nothing.
		$q = "UPDATE ".cms_db_prefix()."module_forum_topics t, cms_module_forum_posts p SET t.last_post_id = p.id WHERE p.topic_id = t.id";
		$db->Execute($q);

	case "0.4" :
	case "0.5" :
		#Add new column
		$q = $dict->AddColumnSQL(cms_db_prefix()."module_forum_topics", "views I NOTNULL");
		$dict->ExecuteSQLArray($q);

	case "0.6" :
		$q = $dict->AlterColumnSQL(cms_db_prefix()."module_forum_topics", "sticky I1 NOTNULL");
		$dict->ExecuteSQLArray($q);

	case "0.7" :
	case "0.8" :
		$css_example = "#forum .forum_title{ font-weight:bold; }\n#forum .forum_link{ font-size:.9em; }\n#forum a.forum_link{ text-decoration:none; }\n#forum form textarea{ border:1px inset #eee; font-size:1.1em; background-color:#ddd; width:570px; height:450px; }\n\n#forum table.forum_pagetable{ width:561px; margin:0; padding:0; border:0; }\ntable.forum_pagetable th,td{ padding:1px; }\n\n.forum_head_table{ background-color:#cdc; }\n\n.forum_head_icon{ width:22px; }\n.forum_head_name{ width:82%; text-align:left; }\n.forum_head_count{ width:14%; text-align:center; }\n.forum_head_subject{ width:47%; text-align:left; }\n.forum_head_views{ width:14%; text-align:center; }\n.forum_head_info{ width:21%; text-align:center; }\n.forum_head_topic{ font-weight:bold; }\n.forum_head_reply{ text-align:right; }\n\n.forum_icon{ vertical-align:top; }\n.forum_name{ vertical-align:top; }\n.forum_count{ text-align:center; vertical-align:top; }\n.forum_subject{ vertical-align:top; }\n.forum_views{text-align:center; vertical-align:top; }\n.forum_info{ width:21%; font-size:.8em; text-align:center; vertical-align:top; }\n.forum_content{ width:66%; vertical-align:top; }\n.forum_edit{ width:13%; text-align:center; vertical-align:top; }\n.forum_bodypost{ width:79%; vertical-align:top; }\n\n#forum td.forum_alternate1{ background-color:#eed; }\n#forum td.forum_alternate2{ background-color:#eef; }\n\n.forum_pagination{ font-size:.9em; }\n.forum_quote{ padding:0 7px; border:1px solid #000; background-color:#dce; }\n.forum_center{ margin:0; padding:0; border:0; text-align:center; }\n\n#forum a.reply_link{ font-size:.8em; text-decoration:none; }\n#forum span.reply_link{ font-size:.8em; }";
		$css_id = $db->GenID(cms_db_prefix()."css_seq");
		$q = "INSERT INTO ".cms_db_prefix()."css (CSS_ID, CSS_NAME, CSS_TEXT, MEDIA_TYPE, CREATE_DATE, MODIFIED_DATE) VALUES (?,?,?,?,".$db->DBTimeStamp(time()).",".$db->DBTimeStamp(time()).")";
		$db->Execute($q, array($css_id, 'Forum_Made_Simple', $css_example, 'screen'));

	case "0.9.0" :
		#Move templates in DB
		$templates = array('edit_post', 'forum', 'index', 'new_topic', 'reply', 'topic');
		foreach ($templates as $template)
		{
			#Personal
			$fn = cms_join_path(dirname(__FILE__), 'templates', $template.'.tpl');
			if( is_readable($fn) )
			{
				$content = @file_get_contents($fn);
				$this->SetTemplate($template, $content);
			}
			else
			{
				$fn = cms_join_path(dirname(__FILE__), 'templates', 'orig_'.$template.'.tpl');
				if( is_readable($fn) )
				{
					$orig_content = @file_get_contents($fn);
					$this->SetTemplate($template, $orig_content);
				}
			}
		}

		#Add new tables properties per forums
		$table_definitions = array(
			'properties' => "
				id I PRIMARY,
				name C(255),
				def_value C(255),
				type C(255),
				options C(255)
			",
			'forum_property' => "
				id I PRIMARY,
				forum_id INT NOTNULL,
				property_id INT NOTNULL,
				value C(255)
			",
			'users' => "
				id I PRIMARY,
				user_id I NOTNULL,
				num_topics I NOTNULL,
				num_posts I NOTNULL,
				banreason C(255)
			",
			'banned' => "
				id I PRIMARY,
				banip C(15) NOTNULL,
				banreason C(255)
			"
		);
		foreach($table_definitions as $name => $definition) {
			#Create the table
			$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_forum_".$name, $definition, $table_options);
			$dict->ExecuteSQLArray($sqlarray);
			#Create a sequence
			$db->CreateSequence(cms_db_prefix()."module_forum_".$name."_seq");
		}

		# Properties
		$props = array(
			1 => array('member_group', '', 'InputDropdown', 'groups'),
			2 => array('moderator_group', '', 'InputDropdown', 'groups'),
			3 => array('allow_guest', 0, 'InputRadioGroup', ''),
			4 => array('allow_guest-write', 0, 'InputRadioGroup', ''),
			5 => array('property-feu', '', 'InputDropdown', 'defs')
		);
		$q = "INSERT INTO ".cms_db_prefix()."module_forum_properties (id, name, def_value, type, options) VALUES (?,?,?,?,?)";
		foreach($props as $prop)
		{
			$catid = $db->GenID(cms_db_prefix()."module_forum_properties_seq");
			$db->Execute($q, array($catid, $prop[0], $prop[1], $prop[2], $prop[3]));
		}

		$member_group = $this->GetPreference('member_group', '');
		$moderator_group = $this->GetPreference('moderator_group', '');
		$allow_guest = $this->GetPreference('allow_guest', 0);
		# Definitions
		$props = array(
			1 => $member_group,
			2 => $moderator_group,
			3 => $allow_guest,
			4 => $allow_guest,
			5 => ''
		);
		$q = "INSERT INTO ".cms_db_prefix()."module_forum_forum_property (id, forum_id, property_id, value) VALUES (?,?,?,?)";

		$sql = "SELECT id FROM ".cms_db_prefix()."module_forum_forums";
		$dbresult =& $db->Execute($sql);
		while($dbresult && $row = $dbresult->FetchRow())
		{
			foreach($props as $prop=>$def_value)
			{
				$catid = $db->GenID(cms_db_prefix()."module_forum_forum_property_seq");
				$db->Execute($q, array($catid, $forum_id, $prop, $def_value));
			}
		}

		#Remove old preferences
		$this->RemovePreference('member_group');
		$this->RemovePreference('moderator_group');
		$this->RemovePreference('allow_guest');
		#Default preferences
		$preferences = array('topic_pagelimit'=>$this->GetPreference('topic_pagelimit', 999), 'post_pagelimit'=>$this->GetPreference('post_pagelimit', 999), 'avatar_property_name'=>'', 'ranking'=>'25,50,100,200');
		foreach ($preferences as $preference=>$value)
		{
			$this->SetPreference($preference, $value);
		}

		#Users
		$q1 = "INSERT INTO ".cms_db_prefix()."module_forum_users (id, user_id, num_topics, num_posts) VALUES (?,?,?,?)";
		$q2 = "SELECT COUNT(id) AS num_topics
			FROM ".cms_db_prefix()."module_forum_topics
			WHERE poster_id = ?
			GROUP BY poster_id, id, forum_id, last_post_id, subject, closed, sticky, views";

		$sql = "SELECT user_id, COUNT(id) AS num_posts
			FROM ".cms_db_prefix()."module_forum_posts
			GROUP BY user_id, id, topic_id, posted, edited, edited_by, body, body_raw";
		$dbresult =& $db->Execute($sql);
		while($dbresult && $row = $dbresult->FetchRow())
		{
			$db_q2 =& $db->Execute($q2, array($row['user_id']));
			if($db_q2) $row_q2 = $db_q2->FetchRow();

			$catid = $db->GenID(cms_db_prefix()."module_forum_users_seq");
			$db->Execute($q1, array($catid, $row['user_id'], $row_q2['num_topics'], $row['num_posts']));
		}

		#Add three new columns to posts
		$q = $dict->AddColumnSQL(cms_db_prefix()."module_forum_posts", "forum_id INT NOTNULL, poster_ip C(15), editor_ip C(15)");
		$dict->ExecuteSQLArray($q);
		#Put some meaningful values in the new columns. this is actually wrong but it's better than nothing.
		$q1 = "UPDATE ".cms_db_prefix()."module_forum_posts SET forum_id = ? WHERE id = ?";
		$q2 = "SELECT t.forum_id
			FROM ".cms_db_prefix()."module_forum_topics AS t, ".cms_db_prefix()."module_forum_posts AS c
			WHERE c.id = ? AND c.topic_id = t.id";

		$sql = "SELECT id FROM ".cms_db_prefix()."module_forum_posts";
		$dbresult =& $db->Execute($sql);
		while($dbresult && $row = $dbresult->FetchRow())
		{
			$db_q2 =& $db->Execute($q2, array($forum_id));
			if($db_q2) $row_q2 = $db_q2->FetchRow();

			$db->Execute($q1, array($row_q2['forum_id'], $forum_id));
		}

		#Add three new columns to topics
		$q = $dict->AddColumnSQL(cms_db_prefix()."module_forum_topics", "poster_time I, last_poster_time I, posts_count I NOTNULL");
		$dict->ExecuteSQLArray($q);
		#Put some meaningful values in the new columns. this is actually wrong but it's better than nothing.
		$q1 = "UPDATE ".cms_db_prefix()."module_forum_topics SET last_post_id = ?, last_poster_time = ?, posts_count = ? WHERE id = ?";
		$q2 = "SELECT poster_id, poster_time FROM ".cms_db_prefix()."module_forum_posts WHERE topic_id = ? ORDER BY id DESC LIMIT 1";
		$q3 = "SELECT COUNT(*) AS posts_count FROM ".cms_db_prefix()."module_forum_posts WHERE topic_id = ?";

		$sql = "SELECT id FROM ".cms_db_prefix()."module_forum_topics";
		$dbresult =& $db->Execute($sql);
		while($dbresult && $row = $dbresult->FetchRow())
		{
			$db_q2 =& $db->Execute($q2, array($forum_id));
			if($db_q2) $row_q2 = $db_q2->FetchRow();

			$db_q3 =& $db->Execute($q3, array($forum_id));
			if($db_q3) $row_q3 = $db_q3->FetchRow();

			$db->Execute($q1, array($row_q2['poster_id'], $row_q2['poster_time'], $row_q3['posts_count'], $forum_id));
		}

		#Add three new columns to forums
		$q = $dict->AddColumnSQL(cms_db_prefix()."module_forum_forums", "forum_icon C(255), topics_count INT NOTNULL, posts_count INT NOTNULL");
		$dict->ExecuteSQLArray($q);
		#Put some meaningful values in the new columns. this is actually wrong but it's better than nothing.
		$q1 = "UPDATE ".cms_db_prefix()."module_forum_forums SET topics_count = ?, posts_count = ? WHERE id = ?";
		$q2 = "SELECT COUNT(*) AS topics_count FROM ".cms_db_prefix()."module_forum_topics WHERE forum_id = ?";
		$q3 = "SELECT COUNT(*) AS posts_count FROM ".cms_db_prefix()."module_forum_posts WHERE forum_id = ?";

		$sql = "SELECT id FROM ".cms_db_prefix()."module_forum_forums";
		$dbresult =& $db->Execute($sql);
		while($dbresult && $row = $dbresult->FetchRow())
		{
			$db_q2 =& $db->Execute($q2, array($forum_id));
			if($db_q2) $row_q2 = $db_q2->FetchRow();

			$db_q3 =& $db->Execute($q3, array($forum_id));
			if($db_q3) $row_q3 = $db_q3->FetchRow();

			$db->Execute($q1, array($row_q2['topics_count'], $row_q3['posts_count'], $forum_id));
		}

		#Rename four columns to posts
		$rename_fields = array('user_id'=>'poster_id', 'posted'=>'poster_time', 'edited_by'=>'editor_id', 'edited'=>'editor_time');
		foreach($rename_fields as $old=>$new)
		{
			$q = $dict->RenameColumnSQL(cms_db_prefix()."module_forum_posts", $old, $new, "I I");
			$dict->ExecuteSQLArray($q);
		}

		#Rename one column to topics
		$rename_fields = array('last_post_id'=>'last_poster_id');
		foreach($rename_fields as $old=>$new)
		{
			$q = $dict->RenameColumnSQL(cms_db_prefix()."module_forum_topics", $old, $new, "I I");
			$dict->ExecuteSQLArray($q);
		}

	case "0.9.1" :
		#Move templates in DB
		$templates = array('report_moderator', 'report_moderator_email', 'last_posts');
		foreach ($templates as $template)
		{
			$fn = cms_join_path(dirname(__FILE__), 'templates', 'orig_'.$template.'.tpl');
			if( is_readable($fn) )
			{
				$orig_content = @file_get_contents($fn);
				$this->SetTemplate($template, $orig_content);
			}
		}

		# Properties
		$props = array(
			6 => array('use_avatar', 0, 'InputRadioGroup', ''),
			7 => array('approval_moderator', 0, 'InputRadioGroup', ''),
		);
		$q = "INSERT INTO ".cms_db_prefix()."module_forum_properties (id, name, def_value, type, options) VALUES (?,?,?,?,?)";
		foreach($props as $prop)
		{
			$catid = $db->GenID(cms_db_prefix()."module_forum_properties_seq");
			$db->Execute($q, array($catid, $prop[0], $prop[1], $prop[2], $prop[3]));
		}

		$q = "INSERT INTO ".cms_db_prefix()."module_forum_forum_property (id, forum_id, property_id, value) VALUES (?,?,?,?)";

		$sql = "SELECT id FROM ".cms_db_prefix()."module_forum_forums";
		$dbresult =& $db->Execute($sql);
		while($dbresult && $row = $dbresult->FetchRow())
		{
			foreach($props as $prop=>$arr_prop)
			{
				$catid = $db->GenID(cms_db_prefix()."module_forum_forum_property_seq");
				$db->Execute($q, array($catid, $forum_id, $prop, $arr_prop[1]));
			}
		}

		#Default preferences
		$preferences = array('enable_report_moderators'=>'');
		foreach ($preferences as $preference=>$value)
		{
			$this->SetPreference($preference, $value);
		}

		#Add new column to posts
		$q = $dict->AddColumnSQL(cms_db_prefix()."module_forum_posts", "status C(25)");
		$dict->ExecuteSQLArray($q);
		#Put some meaningful values in the new columns. this is actually wrong but it's better than nothing.
		$q = "UPDATE ".cms_db_prefix()."module_forum_posts SET status = 'published'";
		$db->Execute($q);

		#Add new column to topics
		$q = $dict->AddColumnSQL(cms_db_prefix()."module_forum_topics", "status C(25)");
		$dict->ExecuteSQLArray($q);
		#Put some meaningful values in the new columns. this is actually wrong but it's better than nothing.
		$q = "UPDATE ".cms_db_prefix()."module_forum_topics SET status = 'published'";
		$db->Execute($q);

	case "0.9.2" :
		$q = "SELECT MAX(id) as root
			FROM ".cms_db_prefix()."module_forum_forums";
		$dbresult =& $db->Execute($q);
		if($dbresult && $row=$dbresult->FetchRow())
			$root = $row['root']+1;
		else
			die('Error retrive max forum ID!');

		if($this->TreeManager)
		{
			$mycustom=array(); //your current custom fields in upgrade process
			$this->TreeManager->initTree($this, $mycustom, $this->lang);

			$myschema = array(
				'type'	=> 'C(8)',
				'name'	=> 'C(40)',
				'description'	=> 'C(255)',
				'forum_icon'	=> 'C(255)',
				'topics_count'	=> 'I',
				'posts_count'	=> 'I'
			);
			$this->TreeManager->addCustomField($myschema);

			$custom = array(
				'type'	=> 'section',
				'name'	=> 'Forum Made Simple',
				'description'	=> 'Forum Made Simple',
				'forum_icon'	=> null,
				'topics_count'	=> null,
				'posts_count'	=> null
			);
			$root_id = $this->TreeManager->addRoot($custom, $root);
			if(!$root_id) die('Error add root node #'. $root .'! Is taken?');
		}
		else
		{
			die("Forum Made Simple required TreeManager module!");
		}

		$q = "SELECT id, name, description, forum_icon, topics_count, posts_count
			FROM ".cms_db_prefix()."module_forum_forums
			ORDER BY position, id";
		$dbresult =& $db->Execute($q);
		while($dbresult && $row=$dbresult->FetchRow())
		{
			$input = array(
				'type'	=> 'forum',
				'name'	=> $row['name'],
				'description'	=> $row['description'],
				'forum_icon'	=> $row['forum_icon'],
				'topics_count'	=> $row['topics_count'],
				'posts_count'	=> $row['posts_count']
			);
			$forum_id = $this->TreeManager->addChildren($root_id, $input, -1, $row['id']);
			if(!$forum_id) die('Error add forum #'.$row['id']);
		}

		#Add new column to topics
		$c = $dict->AddColumnSQL(cms_db_prefix()."module_forum_topics", "last_post_id I");
		$return = $dict->ExecuteSQLArray($c);
		if($return <> 2) die('Error: '.$c[0]);

		#Optimizations
		$c = $dict->CreateIndexSQL(cms_db_prefix().'idx_property_by_forumid', cms_db_prefix()."module_forum_forum_property", 'forum_id');
		$return = $dict->ExecuteSQLArray($c);
		if($return <> 2) die('Error: '.$c[0]);

		$c = $dict->CreateIndexSQL(cms_db_prefix().'idx_topics_by_forumid', cms_db_prefix()."module_forum_topics", 'forum_id');
		$return = $dict->ExecuteSQLArray($c);
		if($return <> 2) die('Error: '.$c[0]);

		$c = $dict->CreateIndexSQL(cms_db_prefix().'idx_posts_by_topicid', cms_db_prefix()."module_forum_posts", 'topic_id');
		$return = $dict->ExecuteSQLArray($c);
		if($return <> 2) die('Error: '.$c[0]);

		$c = $dict->CreateIndexSQL(cms_db_prefix().'idx_users_by_userid', cms_db_prefix()."module_forum_users", 'user_id');
		$return = $dict->ExecuteSQLArray($c);
		if($return <> 2) die('Error: '.$c[0]);

		$c = $dict->CreateIndexSQL(cms_db_prefix().'idx_banned_by_banip', cms_db_prefix()."module_forum_banned", 'banip', $idx_options);
		$return = $dict->ExecuteSQLArray($c);
		if($return <> 2) die('Error: '.$c[0]);

		#Css example
		$css_example = "a:link, a:visited\n{\n\tcolor: #476C8E;\n\ttext-decoration: none;\n}\na:hover\n{\n\ttext-decoration: underline overline;\n}\n\na img\n{\n\tborder: 0;\n}\na\n{\n\toutline: none;\n}\n\n\n#forum {}\n\n#forum .forum_link\n{\n\tfont-size:.85em;\n}\n\n\n.edit_table td.topic_link\n{\n\twidth:50%;\n\tfont-size:0.85em;\n\ttext-align:left;\n}\n.edit_table td.topic_action\n{\n\twidth:50%;\n\tfont-size:0.85em;\n\ttext-align:right;\n}\n.select_move\n{\n\tfont-size: 0.85em;\n}\n.topic_move_label\n{\n\tfont-size: 0.85em;\n}\n\n\n#forum .message\n{\n\tpadding: 2px;\n\tfont-size:.85em;\n\tfont-weight: bold;\n}\n#forum .forum_quote\n{\n\tborder: 1px solid #7777bb;\n\tpadding: 2px;\n\tbackground-color: #ccc;\n}\n\n\n.forum_border\n{\n\tmargin-top: 0.1em;\n\tborder: 0px;\n\tpadding: 2px;\n\tbackground-color: #FFFFFF;\n}\n.forum_border h3\n{\n\tmargin: 0;\n\tpadding: 0.2em;\n}\n\n.catbg, .catbg3\n{\n\tborder: solid 1px #88A7C6;\n\tpadding: 2px;\n\tpadding-left: 9px;\n\tpadding-right: 9px;\n\tcolor: #ffffff;\n\tbackground: #88A7C6;\n}\n.catbg:hover, .catbg3:hover\n{\n\tpadding-left: 9px;\n\tpadding-right: 9px;\n\tcolor: #ffffff;\n\tbackground: #A3BFD7;\n}\n.catbg\n{\n\tfont-weight: bold;\n}\n.catbg3, .catbg3 a:link, .catbg3 a:visited\n{\n\tfont-size: 97%;\n\tcolor: white;\n\ttext-decoration: none;\n}\n.catbg a:link, .catbg a:visited\n{\n\tcolor: white;\n\ttext-decoration: none;\n}\n.catbg a:hover, .catbg3 a:hover\n{\n\tcolor: #efefff;\n}\n\n\ntable\n{\n\tempty-cells: show;\n\twidth: 100%;\n\tmargin: 0px;\n\tpadding: 0px;\n}\n\n#index_table td.index_icon\n{\n\twidth: 7%;\n\tpadding: 0.2em;\n\ttext-align: center;\n}\n#index_table td.index_info\n{\n\twidth:58%;\n\tpadding: 0px;\n}\n#index_table td.index_info h4\n{\n\tmargin: 0px;\n\tpadding: 0.1em 0.2em;\n}\n#index_table td.index_info p\n{\n\tmargin: 0px;\n\tpadding: 0 0.2em;\n\tvertical-align: top;\n}\n#index_table td.index_stats\n{\n\twidth: 9%;\n\ttext-align: center;\n}\n#index_table td.index_lastpost\n{\n\twidth: 25%;\n\tpadding: 0.2em;\n\tvertical-align: top;\n}\n\n#forum_table td.forum_icon\n{\n\twidth: 7%;\n\tpadding: 0.2em;\n\ttext-align: center;\n}\n#forum_table td.forum_subject\n{\n\tpadding: 0.2em;\n}\n#forum_table td.forum_replies\n{\n\twidth: 8%;\n\tpadding: 0.2em;\n\ttext-align: center;\n}\n#forum_table td.forum_views\n{\n\twidth: 8%;\n\tpadding: 0.2em;\n\ttext-align: center;\n}\n#forum_table td.forum_lastpost\n{\n\twidth: 25%;\n\tpadding: 0.2em;\n\tvertical-align: top;\n}\n\n#topic_table td.forum_author\n{\n\twidth: 20%;\n\tpadding: 0.2em;\n\ttext-align: center;\n\tvertical-align: top;\n}\n#topic_table td.forum_body\n{\n\twidth: 60%;\n\tpadding: 0.2em;\n\tvertical-align: top;\n}\n#topic_table td.forum_edit\n{\n\twidth: 19%;\n\tpadding: 0.2em;\n\tvertical-align: top;\n}\n\n#post_table\n{\n\tborder: 1px solid #aaa;\n\tbackground-color: #f9f9f9;\n}\n#post_table td.forum_author\n{\n\twidth: 15%;\n\tpadding: 0.2em;\n\ttext-align: center;\n\tvertical-align: top;\n}\n#post_table td.forum_body\n{\n\twidth: 84%;\n\tpadding: 0.2em;\n\tvertical-align: top;\n}\n\n\n.windowbg\n{\n\tcolor: #000000;\n\tbackground-color: #ECEDF3;\n}\n.windowbg:hover\n{\n\tbackground-color: #E0E1E8;\n}\n.windowbg2\n{\n\tcolor: #000000;\n\tbackground-color: #F0F2F5;\n}\n.windowbg2:hover\n{\n\tbackground-color: #F5F7FA;\n}\n.windowbg3\n{\n\tcolor: #000000;\n\tbackground-color: #E0E1E8;\n}\n.windowbg3:hover\n{\n\tbackground-color: #ECEDF3;\n}\n\n\n.xsmalltext\n{\n\tfont-size: 0.75em;\n\tfont-family: verdana, sans-serif;\n}\n.smalltext\n{\n\tfont-size: 0.8em;\n\tfont-family: verdana, sans-serif;\n}\n.middletext\n{\n\tfont-size: 0.85em;\n}\n.normaltext\n{\n\tfont-size: 0.95em;\n}\n.largetext\n{\n\tfont-size: 1.3em;\n}\n\n.floatright\n{\n\tfloat: right;\n}\n.floatleft\n{\n\tfloat: left;\n}\n";

		$q = "SELECT css_id FROM ".cms_db_prefix()."css WHERE css_name = ?";
		$dbresult =& $db->Execute($q, array('Forum_Made_Simple2'));
		if( $dbresult )
		{
			if($dbresult->RecordCount() > 0)
			{
				$this->Audit(0, $this->Lang('friendlyname'), $this->Lang('css_installed'));
			}
			else
			{
				$css_id = $db->GenID(cms_db_prefix()."css_seq");
				$qi = "INSERT INTO ". cms_db_prefix()."css
					(CSS_ID, CSS_NAME, CSS_TEXT, MEDIA_TYPE, CREATE_DATE, MODIFIED_DATE)
					VALUES ( ?,?,?,?,".$db->DBTimeStamp(time()).",".$db->DBTimeStamp(time())." )";
				$db->Execute($qi, array($css_id, 'Forum_Made_Simple2', $css_example, 'screen'));
			}
		}

		#Upgrade all templates in DB and Add profile
		$templates = array(
		 'index', 'forum', 'topic',
		 'new_topic', 'reply', 'edit_post',
		 'profile', 'report_moderator', 'report_moderator_email', 'last_posts'
		);
		foreach ($templates as $template)
		{
			#Original
			$fn = cms_join_path(dirname(__FILE__), 'templates', 'orig_'.$template.'.tpl');
			if( is_readable($fn) )
			{
				$orig_content = @file_get_contents($fn);
				$this->SetTemplate($template, $orig_content);
			}
		}

		#Default preferences
		$preferences = array(
		 'use_bbcode'=>1,
		 'use_captcha'=>0,
		 'use_akismet'=>0,
		 'forumpage'=>''
		);
		foreach($preferences as $preference=>$value)
		{
			$this->SetPreference($preference, $value);
		}

		# Properties
		$props = array(
			8	=> array('redirect', 'forum', 'InputDropdown', 'redirect'),
			9	=> array('topic_pagelimit', 999, 'InputText', ''),
			10	=> array('post_pagelimit', 999, 'InputText', ''),
			11	=> array('use_bbcode', 1, 'InputRadioGroup', ''),
			12	=> array('use_captcha', 0, 'InputRadioGroup', ''),
			13	=> array('use_akismet', 0, 'InputRadioGroup', ''),
		);
		$qi = "INSERT INTO ".cms_db_prefix()."module_forum_properties
			(id, name, def_value, type, options)
			VALUES (?,?,?,?,?)";
		foreach($props as $idx=>$prop)
		{
			$catid = $db->GenID(cms_db_prefix()."module_forum_properties_seq");
			$db->Execute($qi, array($catid, $prop[0], $prop[1], $prop[2], $prop[3]));
		}

		#Events
		$this->CreateEvent( 'OnNewTopic' );
		$this->CreateEvent( 'OnReplyPost' );
		$this->CreateEvent( 'OnEditPost' );

		#Drop old table
		$d = $dict->DropTableSQL(cms_db_prefix()."module_forum_forums");
		$return = $dict->ExecuteSQLArray($d);
		if($return <> 2) die('Error: '.$c[0]);

		#Remove the sequence
		$db->DropSequence(cms_db_prefix()."module_forum_forums_seq" );

	case "0.9.3" :
		#Update to board name
		$qu = "UPDATE ".cms_db_prefix()."forum_property SET value = 'board' WHERE value = 'forum'";
		$db->Execute($qu);

		#Css example
		$css_example = "/* Add a dashed underline to acronyms. */\nspan.bbcode_acronym { border-bottom:1px dashed green; }\nspan.bbcode_acronym:hover { color:green; border-bottom:1px dashed green; }\n\n/* Make spoilers invisible, so that you need to select them with the mouse. */\nspan.bbcode_spoiler { background-color:black; color:black; }\n\n/* Align columns to the top, and add some space between them. */\ntable.bbcode_columns { border-collapse:collapse; margin-top:1em; margin-bottom:1em; }\ntable.bbcode_columns td.bbcode_column { padding:0 1em; vertical-align:top; }\ntable.bbcode_columns td.bbcode_firstcolumn { border-left:0; padding-left:0; }\n\n/* Wrap quotes in a big blue box. */\ndiv.bbcode_quote, div.bbcode_code { border:1px solid #7777bb; margin:0.25em 0; }\ndiv.bbcode_quote_head, div.bbcode_code_head\n{\n\n\tbackground-color:#88A7C6;\n\n\tcolor:white;\n\n\tfont-weight:bold;\n\n\tpadding:0.25em;\n}\ndiv.bbcode_quote_head a:link { color:yellow; }\ndiv.bbcode_quote_head a:visited { color:yellow; }\ndiv.bbcode_quote_head a:hover { color:white; text-decoration:underline; }\ndiv.bbcode_quote_head a:active { color:white; text-decoration:underline; }\ndiv.bbcode_quote_body, div.bbcode_code_body\n{\n\n\tbackground-color:#ccc;\n\n\tcolor:black;\n\n\tpadding:0.25em 0.5em;\n}\ndiv.bbcode_code_body { font:0.9em monospace; }\n#helpline {\tbackground-color:transparent;\n\tborder-style:none;\n\tpadding:1px;\n\twidth:95%;\n\tfont-size:0.8em;\n}\n";
		$q = "SELECT css_id FROM ".cms_db_prefix()."css WHERE css_name = ?";
		$dbresult =& $db->Execute($q, array('Forum_Made_Simple2_2'));
		if( $dbresult )
		{
		if($dbresult->RecordCount() > 0)
		{
			$this->Audit(0, $this->Lang('friendlyname'), $this->Lang('css_installed'));
		}
		else
		{
			$css_id = $db->GenID(cms_db_prefix()."css_seq");
			$qi = "INSERT INTO ". cms_db_prefix()."css
				(CSS_ID, CSS_NAME, CSS_TEXT, MEDIA_TYPE, CREATE_DATE, MODIFIED_DATE)
				VALUES ( ?,?,?,?,".$db->DBTimeStamp(time()).",".$db->DBTimeStamp(time())." )";
			$db->Execute($qi, array($css_id, 'Forum_Made_Simple2_2', $css_example, 'screen'));
		}
	}
}


#Put mention into the admin log
$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('upgraded',$this->GetVersion()));
?>