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
#$Id: method.install.php 103 2010-05-01 19:58:22Z alby $

if(!isset($gCms)) exit;

if($this->LoadDataModule() !== true) die($this->LoadDataModule());

$db =& $gCms->GetDb();
$dict = NewDataDictionary($db);
#mysql-specific, but ignored by other database
$table_options = array('mysql'=>'TYPE=MyISAM', 'mysqli'=>'TYPE=MyISAM');
$idx_options = array('UNIQUE');


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
	$root_id = $this->TreeManager->addRoot($custom);
}
else
{
	die("Forum Made Simple required TreeManager module!");
}


#Table schema descriptions
$table_definitions = array(
	'properties' => "
		id I,
		name C(255),
		def_value C(255),
		type C(255),
		options C(255)
	",
	'forum_property' => "
		id I,
		forum_id I NOTNULL,
		property_id I NOTNULL,
		value C(255)
	",
	'topics' => "
		id I PRIMARY,
		forum_id I NOTNULL,
		poster_id I NOTNULL,
		poster_time I,
		last_post_id I,
		last_poster_id I,
		last_poster_time I,
		subject C(255),
		closed I1,
		sticky I1 NOTNULL,
		views I,
		status C(25),
		posts_count I NOTNULL
	",
	'posts' => "
		id I PRIMARY,
		forum_id I NOTNULL,
		topic_id I NOTNULL,
		poster_id I,
		poster_time I,
		poster_ip C(15),
		editor_id I,
		editor_time I,
		editor_ip C(15),
		status C(25),
		body X,
		body_raw X
	",
	'users' => "
		id I,
		user_id I NOTNULL,
		num_topics I NOTNULL,
		num_posts I NOTNULL,
		banreason C(255)
	",
	'banned' => "
		id I,
		banip C(15) NOTNULL,
		banreason C(255)
	"
);

foreach($table_definitions as $name=>$definition) {
	#Create the table
	$c = $dict->CreateTableSQL(cms_db_prefix()."module_forum_".$name, $definition, $table_options);
	$return = $dict->ExecuteSQLArray($c);
	if($return <> 2) die('Error: '.$c[0]);

	#Create a sequence
	$db->CreateSequence(cms_db_prefix()."module_forum_".$name."_seq");
}

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

$c = $dict->CreateIndexSQL(cms_db_prefix().'idx_users_by_userid', cms_db_prefix()."module_forum_users", 'user_id', $idx_options);
$return = $dict->ExecuteSQLArray($c);
if($return <> 2) die('Error: '.$c[0]);

$c = $dict->CreateIndexSQL(cms_db_prefix().'idx_banned_by_banip', cms_db_prefix()."module_forum_banned", 'banip', $idx_options);
$return = $dict->ExecuteSQLArray($c);
if($return <> 2) die('Error: '.$c[0]);


#Css example
$css_example = "a:link, a:visited\n{\n\tcolor: #476C8E;\n\ttext-decoration: none;\n}\na:hover\n{\n\ttext-decoration: underline overline;\n}\n\na img\n{\n\tborder: 0;\n}\na\n{\n\toutline: none;\n}\n\n\n#forum {}\n\n#forum .forum_link\n{\n\tfont-size:.85em;\n}\n\n\n.edit_table td.topic_link\n{\n\twidth:50%;\n\tfont-size:0.85em;\n\ttext-align:left;\n}\n.edit_table td.topic_action\n{\n\twidth:50%;\n\tfont-size:0.85em;\n\ttext-align:right;\n}\n.select_move\n{\n\tfont-size: 0.85em;\n}\n.topic_move_label\n{\n\tfont-size: 0.85em;\n}\n\n\n#forum .message\n{\n\tpadding: 2px;\n\tfont-size:.85em;\n\tfont-weight: bold;\n}\n#forum .forum_quote\n{\n\tborder: 1px solid #7777bb;\n\tpadding: 2px;\n\tbackground-color: #ccc;\n}\n\n\n.forum_border\n{\n\tmargin-top: 0.1em;\n\tborder: 0px;\n\tpadding: 2px;\n\tbackground-color: #FFFFFF;\n}\n.forum_border h3\n{\n\tmargin: 0;\n\tpadding: 0.2em;\n}\n\n.catbg, .catbg3\n{\n\tborder: solid 1px #88A7C6;\n\tpadding: 2px;\n\tpadding-left: 9px;\n\tpadding-right: 9px;\n\tcolor: #ffffff;\n\tbackground: #88A7C6;\n}\n.catbg:hover, .catbg3:hover\n{\n\tpadding-left: 9px;\n\tpadding-right: 9px;\n\tcolor: #ffffff;\n\tbackground: #A3BFD7;\n}\n.catbg\n{\n\tfont-weight: bold;\n}\n.catbg3, .catbg3 a:link, .catbg3 a:visited\n{\n\tfont-size: 97%;\n\tcolor: white;\n\ttext-decoration: none;\n}\n.catbg a:link, .catbg a:visited\n{\n\tcolor: white;\n\ttext-decoration: none;\n}\n.catbg a:hover, .catbg3 a:hover\n{\n\tcolor: #efefff;\n}\n\n\ntable\n{\n\tempty-cells: show;\n\twidth: 100%;\n\tmargin: 0px;\n\tpadding: 0px;\n}\n\n#index_table td.index_icon\n{\n\twidth: 7%;\n\tpadding: 0.2em;\n\ttext-align: center;\n}\n#index_table td.index_info\n{\n\twidth:58%;\n\tpadding: 0px;\n}\n#index_table td.index_info h4\n{\n\tmargin: 0px;\n\tpadding: 0.1em 0.2em;\n}\n#index_table td.index_info p\n{\n\tmargin: 0px;\n\tpadding: 0 0.2em;\n\tvertical-align: top;\n}\n#index_table td.index_stats\n{\n\twidth: 9%;\n\ttext-align: center;\n}\n#index_table td.index_lastpost\n{\n\twidth: 25%;\n\tpadding: 0.2em;\n\tvertical-align: top;\n}\n\n#forum_table td.forum_icon\n{\n\twidth: 7%;\n\tpadding: 0.2em;\n\ttext-align: center;\n}\n#forum_table td.forum_subject\n{\n\tpadding: 0.2em;\n}\n#forum_table td.forum_replies\n{\n\twidth: 8%;\n\tpadding: 0.2em;\n\ttext-align: center;\n}\n#forum_table td.forum_views\n{\n\twidth: 8%;\n\tpadding: 0.2em;\n\ttext-align: center;\n}\n#forum_table td.forum_lastpost\n{\n\twidth: 25%;\n\tpadding: 0.2em;\n\tvertical-align: top;\n}\n\n#topic_table td.forum_author\n{\n\twidth: 20%;\n\tpadding: 0.2em;\n\ttext-align: center;\n\tvertical-align: top;\n}\n#topic_table td.forum_body\n{\n\twidth: 60%;\n\tpadding: 0.2em;\n\tvertical-align: top;\n}\n#topic_table td.forum_edit\n{\n\twidth: 19%;\n\tpadding: 0.2em;\n\tvertical-align: top;\n}\n\n#post_table\n{\n\tborder: 1px solid #aaa;\n\tbackground-color: #f9f9f9;\n}\n#post_table td.forum_author\n{\n\twidth: 15%;\n\tpadding: 0.2em;\n\ttext-align: center;\n\tvertical-align: top;\n}\n#post_table td.forum_body\n{\n\twidth: 84%;\n\tpadding: 0.2em;\n\tvertical-align: top;\n}\n\n\n.windowbg\n{\n\tcolor: #000000;\n\tbackground-color: #ECEDF3;\n}\n.windowbg:hover\n{\n\tbackground-color: #E0E1E8;\n}\n.windowbg2\n{\n\tcolor: #000000;\n\tbackground-color: #F0F2F5;\n}\n.windowbg2:hover\n{\n\tbackground-color: #F5F7FA;\n}\n.windowbg3\n{\n\tcolor: #000000;\n\tbackground-color: #E0E1E8;\n}\n.windowbg3:hover\n{\n\tbackground-color: #ECEDF3;\n}\n\n\n.xsmalltext\n{\n\tfont-size:0.75em;\n\tfont-family:verdana, sans-serif;\n}\n.smalltext\n{\n\tfont-size:0.8em;\n\tfont-family:verdana, sans-serif;\n}\n.middletext\n{\n\tfont-size:0.85em;\n}\n.normaltext\n{\n\tfont-size:0.95em;\n}\n.largetext\n{\n\tfont-size:1.3em;\n}\n\n.floatright\n{\n\tfloat:right;\n}\n.floatleft\n{\n\tfloat:left;\n}\n\n/* Add a dashed underline to acronyms. */\nspan.bbcode_acronym { border-bottom:1px dashed green; }\nspan.bbcode_acronym:hover { color:green; border-bottom:1px dashed green; }\n\n/* Make spoilers invisible, so that you need to select them with the mouse. */\nspan.bbcode_spoiler { background-color:black; color:black; }\n\n/* Align columns to the top, and add some space between them. */\ntable.bbcode_columns { border-collapse:collapse; margin-top:1em; margin-bottom:1em; }\ntable.bbcode_columns td.bbcode_column { padding:0 1em; vertical-align:top; }\ntable.bbcode_columns td.bbcode_firstcolumn { border-left:0; padding-left:0; }\n\n/* Wrap quotes in a big blue box. */\ndiv.bbcode_quote, div.bbcode_code { border:1px solid #7777bb; margin:0.25em 0; }\ndiv.bbcode_quote_head, div.bbcode_code_head\n{\n\n\tbackground-color:#88A7C6;\n\n\tcolor:white;\n\n\tfont-weight:bold;\n\n\tpadding:0.25em;\n}\ndiv.bbcode_quote_head a:link { color:yellow; }\ndiv.bbcode_quote_head a:visited { color:yellow; }\ndiv.bbcode_quote_head a:hover { color:white; text-decoration:underline; }\ndiv.bbcode_quote_head a:active { color:white; text-decoration:underline; }\ndiv.bbcode_quote_body, div.bbcode_code_body\n{\n\n\tbackground-color:#ccc;\n\n\tcolor:black;\n\n\tpadding:0.25em 0.5em;\n}\ndiv.bbcode_code_body { font:0.9em monospace; }\n#helpline {\tbackground-color:transparent;\n\tborder-style:none;\n\tpadding:1px;\n\twidth:95%;\n\tfont-size:0.8em;\n}\n";

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


#Move templates in DB
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


#Create a permission
$this->CreatePermission('Modify Forum', 'Modify Forum');

#Default preferences
$preferences = array(
 'enable_report_moderators'=>0,
 'avatar_property_name'=>'',
 'topic_pagelimit'=>999,
 'post_pagelimit'=>999,
 'ranking'=>'25,50,100,200',
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
	1	=> array('member_group', '', 'InputDropdown', 'groups'),
	2	=> array('moderator_group', '', 'InputDropdown', 'groups'),
	3	=> array('allow_guest', 0, 'InputRadioGroup', ''),
	4	=> array('allow_guest-write', 0, 'InputRadioGroup', ''),
	5	=> array('property-feu', '', 'InputDropdown', 'defs'),
	6	=> array('use_avatar', 0, 'InputRadioGroup', ''),
	7	=> array('approval_moderator', 0, 'InputRadioGroup', ''),
	8	=> array('redirect', 'board', 'InputDropdown', 'redirect'),
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

#Put mention into the admin log
$this->Audit(0, $this->Lang('friendlyname'), $this->Lang('installed',$this->GetVersion()));
?>