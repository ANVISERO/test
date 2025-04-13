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
#$Id: Forum.module.php 105 2010-05-03 15:43:18Z alby $

class Forum extends CMSModule
{
	var $ModuleData;
	var $MyUserData;
	var $PropertiesForum=array();
	var $FrontEndUsers;
	var $CMSMailer;
	var $TreeManager;
	var $customField;
	var $lang;

	function Forum()
	{
		global $gCms;
		parent::CMSModule();
		$smarty =& $gCms->GetSmarty();
		$smarty->assign_by_ref('fms', $this);

		$this->customField = array('type','name','description','forum_icon','topics_count','posts_count');
		global $mlelocale_cms;
		$this->lang = (empty($mlelocale_cms) ? '' : $mlelocale_cms);
		define('CMS_TABLE_FORUM_POSTS', cms_db_prefix().'module_forum_posts');
		define('CMS_TABLE_FORUM_TOPICS', cms_db_prefix().'module_forum_topics');
		define('CMS_TABLE_FORUM_FORUM_PROPERTY', cms_db_prefix().'module_forum_forum_property');
		define('CMS_TABLE_FORUM_PROPERTIES', cms_db_prefix().'module_forum_properties');
		define('CMS_TABLE_FORUM_USERS', cms_db_prefix().'module_forum_users');
		define('CMS_TABLE_FORUM_BANNED', cms_db_prefix().'module_forum_banned');
	}

	function LoadDataModule()
	{
		global $gCms;
		$arr = $this->GetDependencies();
		if(count($arr) > 0)
		{
			foreach($arr as $module=>$version)
			{
				$this->{$module} =& $this->GetModuleInstance($module);
				if(false === $this->{$module})
					return $this->Lang('error_noreqmodule', $module);
			}
		}

		$tmp=array();
		if(isset($gCms->variables['content_id']))
		{
			$hm =& $gCms->GetHierarchyManager();
			$curPageNode = $hm->sureGetNodeById( $gCms->variables['content_id'] );
			$curPage = $curPageNode->GetContent();
			$tmp['CurrentPath'] = $curPage->HierarchyPath();
		}
		$tmp['ModulePath'] = dirname(__FILE__).DIRECTORY_SEPARATOR;
		$tmp['ImagePath'] = $tmp['ModulePath'].'images'.DIRECTORY_SEPARATOR;
		$tmp['ImageUrl'] = $gCms->config['root_url'].'/modules/'.$this->GetName().'/images/';
		$tmp['TemplatePath'] = $tmp['ModulePath'].'templates'.DIRECTORY_SEPARATOR;
		$this->smarty->assign('ImageUrl', $tmp['ImageUrl']);
		$this->ModuleData = $tmp;

		$tmp=array();
		$tmp['ip'] = $this->realip();
		if($this->FrontEndUsers->LoggedInId())
		{
			$tmp['id'] =& $this->FrontEndUsers->LoggedInId();
			$tmp['username'] =& $this->FrontEndUsers->GetUserName($tmp['id']);
			$tmp['email'] =& $this->FrontEndUsers->GetEmail($tmp['id']);
			$tmp['userproperties'] =& $this->FrontEndUsers->GetUserProperties($tmp['id']);
			$usergroups =& $this->FrontEndUsers->GetMemberGroupsArray($tmp['id']);
			foreach($usergroups as $arr) $tmp['groups'][] = $arr['groupid'];
		}
		else
		{
			$tmp['id'] = 0;
			$tmp['username'] = $this->Lang('guest_user_name');
			$tmp['email'] = '';
			$tmp['userproperties'] = array();
			$tmp['groups'] = array();
		}
		$this->MyUserData = $tmp;

		return true;
	}

	function AllowAutoInstall() {return false;}

	function GetName() {return 'Forum';}

	function GetFriendlyName() {return $this->Lang('friendlyname');}

	function GetVersion() {return '0.9.4';}

	function GetHelp() {return $this->Lang('help');}

	function GetAuthor() {return 'tamlyn/alby';}

	function GetAuthorEmail() {return 'tam@zenology.co.uk/cms@xme.it';}

	function GetChangeLog() {return $this->ProcessTemplate('changelog.tpl');}

	function IsPluginModule() {return true;}

	function HasAdmin() {return true;}

	function IsAdminOnly() {return false;}

	function GetAdminSection() {return 'extensions';}

	function GetAdminDescription() {return $this->Lang('moddescription');}

	function VisibleToAdminUser() {return $this->CheckPermission('Modify Forum');}

	function GetDependencies() {return array('CMSMailer'=>'1.73.9', 'FrontEndUsers'=>'1.6', 'TreeManager'=>'0.6');}

	function HasCapability($capability, $params=array())
	{
		if('forum' == strtolower($capability)) return true;
		return false;
	}

	function GetEventDescription( $eventname ) {return $this->lang('event_info_'. $eventname);}

	function GetEventHelp( $eventname ) {return $this->lang('event_help_'. $eventname);}

	function MinimumCMSVersion() {return '1.5.1';}

	function InstallPostMessage() {return $this->Lang('postinstall');}

	function UninstallPostMessage() {return $this->Lang('postuninstall');}

	function UninstallPreMessage() {return $this->Lang('really_uninstall');}

	function _DisplayErrorPage($id, &$params, $returnid, $message='', $admin=false)
	{
		if($admin) $this->smarty->assign('title_error', $this->Lang('error'));
		$this->smarty->assign('message', $message);
		echo $this->ProcessTemplate('error.tpl');
	}

	function SetParameters()
	{
		$this->RestrictUnknownParams();
		$this->RegisterRoute('/[fF]orum\/(?P<action>section)\/(?P<fid>[0-9]+)\/(?P<forum>[0-9,]+)\/(?P<returnid>[0-9]+)$/');
		$this->RegisterRoute('/[fF]orum\/(?P<action>board)\/(?P<fid>[0-9]+)\/(?P<topic_pagenumber>[0-9]+)\/(?P<returnid>[0-9]+)$/');
		$this->RegisterRoute('/[fF]orum\/(?P<action>topic)\/(?P<fid>[0-9]+)\/(?P<tid>[0-9]+)\/(?P<post_pagenumber>[0-9]+)\/(?P<returnid>[0-9]+)$/');
		$this->RegisterRoute('/[fF]orum\/(?P<action>edit_topic)\/(?P<edit>[a-z]+)\/(?P<tid>[0-9]+)\/(?P<returnid>[0-9]+)$/');
		$this->RegisterRoute('/[fF]orum\/(?P<action>new_topic)\/(?P<fid>[0-9]+)\/(?P<returnid>[0-9]+)$/');
		$this->RegisterRoute('/[fF]orum\/(?P<action>reply_topic)\/(?P<tid>[0-9]+)\/(?P<pid>[0-9]+)\/(?P<returnid>[0-9]+)$/');
		$this->RegisterRoute('/[fF]orum\/(?P<action>edit_post)\/(?P<pid>[0-9]+)\/(?P<returnid>[0-9]+)$/');
		$this->RegisterRoute('/[fF]orum\/(?P<action>modify_post)\/(?P<edit>[a-z]+)\/(?P<pid>[0-9]+)\/(?P<returnid>[0-9]+)$/');
		$this->RegisterRoute('/[fF]orum\/(?P<action>report_moderator)\/(?P<pid>[0-9]+)\/(?P<returnid>[0-9]+)$/');
		$this->RegisterRoute('/[fF]orum\/(?P<action>profile)\/(?P<fid>[0-9]+)\/(?P<uid>[0-9]+)\/(?P<returnid>[0-9]+)$/');
		$this->CreateParameter('forum','',$this->Lang('helpforum'));
		$this->CreateParameter('num',5,$this->Lang('helpnum'));

		$this->SetParameterType('fid',CLEAN_INT);
		$this->SetParameterType('tid',CLEAN_INT);
		$this->SetParameterType('pid',CLEAN_INT);
		$this->SetParameterType('uid',CLEAN_INT);
		$this->SetParameterType('newfid',CLEAN_INT);
		$this->SetParameterType('edit',CLEAN_STRING);
		$this->SetParameterType('prev_link',CLEAN_STRING);
		$this->SetParameterType('topic_pagenumber',CLEAN_INT);
		$this->SetParameterType('post_pagenumber',CLEAN_INT);
		$this->SetParameterType('forum',CLEAN_STRING);
		$this->SetParameterType('message',CLEAN_STRING);
		$this->SetParameterType('error',CLEAN_STRING);
		$this->SetParameterType('report_comment',CLEAN_STRING);
		$this->SetParameterType('num',CLEAN_INT);

		$this->SetParameterType('submit',CLEAN_STRING);
		$this->SetParameterType('cancel',CLEAN_STRING);
		$this->SetParameterType('topic_subject',CLEAN_STRING);
		$this->SetParameterType('post_body',CLEAN_STRING);
		$this->SetParameterType('fmscode',CLEAN_STRING);
	}


	function trimParam( &$value ) {$value = trim($value);}
	function CheckForumParam($params, $forum_id=0)
	{
		$tmp = trim($params['forum']);
		$this->TreeManager->initTree($this, $this->customField, $this->lang);
		if(false !== strpos($tmp, ','))
		{
			$forums = explode(',', $tmp);
			array_walk($forums, array($this, 'trimParam'));

			if(!empty($forum_id)) return in_array($forum_id, $forums);

			$subnodes=array();
			foreach($forums as $forum)
			{
				if(is_numeric($forum))
					$test = $this->TreeManager->getNode($forum);
				else
					$test = $this->TreeManager->getByCustomField('name', $forum);

				if( $test )
				{
					if($this->TreeManager->numNodeInvolved == 1)
					{
						$subnodes += $this->TreeManager->getSubNodes($test, -1, 'lft', false, 'id');
					}
					else
					{
						foreach($test as $item)
							$subnodes += $this->TreeManager->getSubNodes($item, -1, 'lft', false, 'id');
					}
				}
				else
					return false;

			}
			return implode(',', array_keys($subnodes));
		}
		else
		{
			if(!empty($forum_id)) return ($tmp == $forum_id);

			$subnodes=array();
			if(is_numeric($tmp))
				$test = $this->TreeManager->getNode($tmp);
			else
				$test = $this->TreeManager->getByCustomField('name', $tmp);

			if( $test )
			{
				if($this->TreeManager->numNodeInvolved == 1)
					$subnodes += $this->TreeManager->getSubNodes($test, -1, 'lft', false, 'id');
				else
				{
					foreach($test as $item)
						$subnodes += $this->TreeManager->getSubNodes($item, -1, 'lft', false, 'id');
				}
			}
			else
				return false;

			return implode(',', array_keys($subnodes));
		}
	}

	function CheckForumPermission($action, $forum_id, $check='')
	{
		if(empty($this->PropertiesForum[$forum_id])) $this->GetForumIDProperties($forum_id);

		switch($action)
		{
			case 'default':
				if($this->IsModerator($forum_id) || $this->IsMember($forum_id) || $this->IsGuestWrite($forum_id) || $this->IsGuestRead($forum_id))
					return true;
				break;
			case 'new_topic':
			case 'reply_topic':
			case 'new_post':
				if($this->IsModerator($forum_id) || $this->IsMember($forum_id) || $this->IsGuestWrite($forum_id))
					return true;
				break;
			case 'report_moderator':
				if(($this->IsModerator($forum_id) || $this->IsMember($forum_id)) && !$this->IsPoster($check))
					return true;
				break;
			case 'edit_post':
			case 'delete_post':
				if($this->IsModerator($forum_id) || $this->IsPoster($check))
					return true;
				break;
			case 'edit_topic':
				return $this->IsModerator($forum_id);
				break;
			case 'approval_post':
				return ($this->IsModerator($forum_id) || (empty($this->PropertiesForum[$forum_id]['approval_moderator']) && $check=='published'));
				break;
			default: return false;
		}

		return false;
	}
	function IsModerator( $forum_id )
	{
		$groups = $this->MyUserData['groups'];
		if(count($groups) == 0) return false;
		if(empty($this->PropertiesForum[$forum_id])) $this->GetForumIDProperties($forum_id);
		if(!empty($this->PropertiesForum[$forum_id]['moderator_group']) && in_array($this->PropertiesForum[$forum_id]['moderator_group'],$groups))
			return true;

		return false;
	}
	function IsMember( $forum_id )
	{
		$groups = $this->MyUserData['groups'];
		if(count($groups) == 0) return false;
		if(empty($this->PropertiesForum[$forum_id])) $this->GetForumIDProperties($forum_id);
		if(!empty($this->PropertiesForum[$forum_id]['member_group']) && in_array($this->PropertiesForum[$forum_id]['member_group'],$groups))
			return true;

		return false;
	}
	function IsGuestWrite( $forum_id )
	{
		if(empty($this->PropertiesForum[$forum_id])) $this->GetForumIDProperties($forum_id);
		if(!empty($this->PropertiesForum[$forum_id]['allow_guest-write']) && $this->PropertiesForum[$forum_id]['allow_guest-write']==1)
			return true;

		return false;
	}
	function IsGuestRead( $forum_id )
	{
		if(empty($this->PropertiesForum[$forum_id])) $this->GetForumIDProperties($forum_id);
		if(!empty($this->PropertiesForum[$forum_id]['allow_guest']) && $this->PropertiesForum[$forum_id]['allow_guest']==1)
			return true;

		return false;
	}
	function IsPoster( $user_id )
	{
		if($this->MyUserData['id'] === $user_id) return true;
		return false;
	}
	function IsLogged()
	{
		if($this->MyUserData['id'] <> 0) return true;
		return false;
	}
	function userIsModerator($forum_id, $user_id)
	{
		if($user_id == 0) return false;
		if($usergroups =& $this->FrontEndUsers->GetMemberGroupsArray($user_id))
		{
			$groups=array();
			foreach($usergroups as $arr) $groups[] = $arr['groupid'];

			if(empty($this->PropertiesForum[$forum_id])) $this->GetForumIDProperties($forum_id);
			if(!empty($this->PropertiesForum[$forum_id]['moderator_group']) && in_array($this->PropertiesForum[$forum_id]['moderator_group'],$groups))
				return true;
		}
		return false;
	}
	function IsBanned()
	{
		$db =& $this->GetDb();
		if(!empty($this->MyUserData['id']))
		{
			$q = "SELECT banreason
				FROM ". CMS_TABLE_FORUM_USERS ."
				WHERE user_id = ?";
			$dbresult =& $db->SelectLimit($q, 1, 0, array($this->MyUserData['id']));
			if($dbresult && $row=$dbresult->FetchRow())
				if(!empty($row['banreason'])) return $row['banreason'];
		}
		if(!empty($this->MyUserData['ip']))
		{
			$q = "SELECT banreason
				FROM ". CMS_TABLE_FORUM_BANNED ."
				WHERE banip = ?";
			$dbresult =& $db->SelectLimit($q, 1, 0, array($this->MyUserData['ip']));
			if($dbresult && $row=$dbresult->FetchRow())
				if(!empty($row['banreason'])) return $row['banreason'];
		}
		return false;
	}

	function GetPropertiesFEU( $user_id )
	{
		if($user_id == 0) return array();

		$userinfo = $this->FrontEndUsers->GetUserInfo($user_id);
		if( $userinfo[0] )
		{
			$arr_userinfo = $userinfo[1];
			unset($arr_userinfo['password']);
			$properties = $this->FrontEndUsers->GetUserProperties($user_id);
			if(count($properties) > 0)
			{
				$arr_properties=array();
				$email =& $this->FrontEndUsers->GetEmail($user_id);
				foreach($properties as $item)
				{
					if($item['data'] == $email)
					{
						$arr_properties['email'] = $email;
						continue;
					}
					$arr_properties[$item['title']] = $item['data'];
				}
			}
			return array_merge($arr_userinfo, $arr_properties);
		}
		return false;
	}
	function GetPropertyFEU($user_id, $property='')
	{
		if($user_id == 0) return $this->Lang('guest_user_name');
		if(empty($property))
		{
			if($user_id == $this->MyUserData['id']) return $this->MyUserData['username'];
		}
		elseif($arr_properties = $this->FrontEndUsers->GetUserProperties($user_id))
		{
			foreach($arr_properties as $idx=>$arr)
				if(strtolower($property) == strtolower($arr['title'])) return $arr['data'];
		}

		$tmp = $this->FrontEndUsers->GetUserName($user_id);
		if(!$tmp) return $this->Lang('unsigned_user_name');

		return $tmp;
	}

	function testProperty($forum_id, $property, $value, $global)
	{
		if(empty($this->PropertiesForum[$forum_id])) $this->GetForumIDProperties($forum_id);
		if(
			isset($this->PropertiesForum[$forum_id][$property]) &&
			($this->PropertiesForum[$forum_id][$property] == $value) &&
			$this->GetPreference($property, $global)
		) return true;
		return false;
	}
	function GetForumProperties()
	{
		$res=array();
		$db =& $this->GetDb();
		$q = "SELECT id, name, def_value, type, options
			FROM ". CMS_TABLE_FORUM_PROPERTIES ."
			ORDER BY id";
		$dbresult =& $db->Execute($q);
		while($dbresult && $row=$dbresult->FetchRow())
			$res[] = $row;

		return $res;
	}
	function GetForumIDProperties( $forum_id )
	{
		$res=array();
		$db =& $this->GetDb();
		$q = "SELECT f.value AS property_value, p.name AS property_name
			FROM ". CMS_TABLE_FORUM_FORUM_PROPERTY ." AS f LEFT JOIN ". CMS_TABLE_FORUM_PROPERTIES ." AS p ON f.property_id = p.id
			WHERE f.forum_id = ?";
		$dbresult =& $db->Execute($q, array($forum_id));
		while($dbresult && $row=$dbresult->FetchRow())
			$res["{$row['property_name']}"] = $row['property_value'];

		$this->PropertiesForum[$forum_id] = $res;
		return $res;
	}

	function ReportModerator($forum_id, $data)
	{
		if(empty($this->PropertiesForum[$forum_id])) $this->GetForumIDProperties($forum_id);
		$moderator_groupid = $this->PropertiesForum[$forum_id]['moderator_group'];
		if(empty($moderator_groupid))
			return $this->Lang('no_group_moderator');

		$moderators = $this->FrontEndUsers->GetUsersInGroup($moderator_groupid);
		if(empty($moderators)) return $this->Lang('no_feumoderators');

		$data['email_moderator']=array();
		foreach($moderators as $moderator)
		{
			$email =& $this->FrontEndUsers->GetEmail($moderator['id']);
			if(!empty($email)) $data['email_moderator'][] = $email;
		}
		if(count($data['email_moderator']) == 0) return $this->Lang('no_moderators_email');

		$data['email_user'] = (empty($this->MyUserData['email'])) ? $this->CMSMailer->GetPreference('from') : $this->MyUserData['email'];

		if(!$this->_SendUserConfirmationEmail($data)) return $this->Lang('error_send_moderators');
		return true;
	}
	/*--------------------------------
	 _SendUserConfirmationEmail(array)
	----------------------------------*/
	function _SendUserConfirmationEmail( $data )
	{
		$sitename = get_site_preference('sitename', 'CMSMS');
		$this->smarty->assign('data', $data);

		$this->CMSMailer->reset();
		$this->CMSMailer->IsHTML(false);
		$this->CMSMailer->SetBody( $this->ProcessTemplateFromDatabase('report_moderator_email') );
		$this->CMSMailer->SetSubject($this->Lang('report_moderator_subject').': '.$data['topic_content'].' '.$this->Lang('by').' '.$data['poster_name']);
		$this->CMSMailer->AddCustomHeader('X-Mailer: CMS Made Simple('.$this->GetName().' '.$this->GetVersion().')');
		$this->CMSMailer->SetCharSet('utf-8');
		$this->CMSMailer->ClearAllRecipients();
		$this->CMSMailer->SetFrom($data['email_user']);
		$this->CMSMailer->SetFromName($sitename.' '.$this->GetName().' '.$this->GetVersion());
		$this->CMSMailer->AddReplyTo($data['email_user']);
		$_allok=true;
		foreach($data['email_moderator'] as $address)
		{
			$this->CMSMailer->AddAddress($address);
			if(!$this->CMSMailer->Send()) $_allok = false;
		}
		return $_allok;
	}

	function forumPrettyURL($id, $action, $returnid='', $contents='', $params=array(), $warn_message='', $onlyhref=false, $param1='', $param2=0, $param3=0, $prefix_path='', $inline=true, $addtext='', $targetcontentonly=false)
	{
		if(empty($prefix_path)) $prefix_path = $this->ModuleData['CurrentPath'];
		$params['action'] = $action;
		#Relative to RegisterRoute
		switch($action)
		{
			case 'section':
				$params['fid'] = $param1;
				$params['forum'] = $param2;
				$prettyurl = $prefix_path.'/forum/default/'.$params['fid'].'/'.$params['forum'].'/'.$returnid;
				break;
			case 'board':
				$params['fid'] = $param1;
				$params['topic_pagenumber'] = $param2;
				$prettyurl = $prefix_path.'/forum/board/'.$params['fid'].'/'.$params['topic_pagenumber'].'/'.$returnid;
				break;
			case 'topic':
				$params['fid'] = $param1;
				$params['tid'] = $param2;
				$params['post_pagenumber'] = $param3;
				$prettyurl = $prefix_path.'/forum/topic/'.$params['fid'].'/'.$params['tid'].'/'.$params['post_pagenumber'].'/'.$returnid;
				break;
			case 'new_topic':
				$params['fid'] = $param1;
				$prettyurl = $prefix_path.'/forum/new_topic/'.$params['fid'].'/'.$returnid;
				break;
			case 'reply_topic':
				$params['tid'] = $param1;
				$params['pid'] = $param2;
				$prettyurl = $prefix_path.'/forum/reply_topic/'.$params['tid'].'/'.$params['pid'].'/'.$returnid;
				break;
			case 'edit_topic':
				$params['tid'] = $param1;
				$params['edit'] = $param2;
				$prettyurl = $prefix_path.'/forum/edit_topic/'.$params['edit'].'/'.$params['tid'].'/'.$returnid;
				break;
			case 'edit_post':
				$params['pid'] = $param1;
				$prettyurl = $prefix_path.'/forum/edit_post/'.$params['pid'].'/'.$returnid;
				break;
			case 'modify_post':
				$params['pid'] = $param1;
				$params['edit'] = $param2;
				$prettyurl = $prefix_path.'/forum/modify_post/'.$params['edit'].'/'.$params['pid'].'/'.$returnid;
				break;
			case 'profile':
				$params['fid'] = $param1;
				$params['uid'] = $param2;
				$prettyurl = $prefix_path.'/forum/profile/'.$params['fid'].'/'.$params['uid'].'/'.$returnid;
				break;
			case 'report_moderator':
				$params['pid'] = $param1;
				$prettyurl = $prefix_path.'/forum/report_moderator/'.$params['pid'].'/'.$returnid;
				break;
			default:
				$prettyurl = $prefix_path.'/forum/default/'.$returnid;
		}

		return $this->CreateLink($id, $action, $returnid, $contents, $params, $warn_message, $onlyhref, $inline, $addtext, $targetcontentonly, $prettyurl);
	}

	function GetStatisticsUser( $userid=0 )
	{
		$data=array();
		$data[0] = array('num_topics'=>'', 'num_posts'=>'', 'banreason'=>'', 'rank'=>'');
		$ranks = explode(',', $this->GetPreference('ranking', ''));
		$where = (empty($userid)) ? 'user_id <> 0' : 'user_id = '.$userid;

		$db =& $this->GetDb();
		$q = "SELECT user_id, num_topics, num_posts, banreason
			FROM ". CMS_TABLE_FORUM_USERS ."
			WHERE {$where}";
		$dbresult =& $db->Execute($q);
		while($dbresult && $row=$dbresult->FetchRow())
		{
			$r=0;
			while($r < count($ranks) && $row['num_posts'] >= $ranks[$r]) $r++;
			$data["{$row['user_id']}"] = array('num_topics'=>$row['num_topics'], 'num_posts'=>$row['num_posts'], 'banreason'=>$row['banreason'], 'rank'=>$r);
		}
		return $data;
	}

	function forumBreadcrumbs($arr, $arr_url, $forum_id, $id, $returnid, $topic_id=0, $topic_subject='')
	{
		$tmp=array();
		foreach($arr as $key=>$item)
		{
			if($key == 0)
			{
				global $gCms;
				$contentops =& $gCms->GetContentOperations();
				$contentobj = $contentops->LoadContentFromId( $gCms->variables['content_id'] );
				if($contentobj)
					$tmp[] = '<a href="'. $contentobj->GetURL() .'">'. $item['name'] .'</a>';
			}
			elseif($key == count($arr)-1)
			{
				if(empty($topic_id))
					$tmp[] = $item['name'];
				else
					$tmp[] = $this->forumPrettyURL($id, 'topic', $returnid, $topic_subject, $arr_url, '', false, $forum_id, $topic_id, 1);
			}
			else
			{
				if('forum' == $item['type'])
					$tmp[] = $this->forumPrettyURL($id, 'board', $returnid, $item['name'], $arr_url, '', false, $item['id'], 1);
				else
					$tmp[] = $this->forumPrettyURL($id, 'section', $returnid, $item['name'], $arr_url, '', false, $item['id'], (empty($arr_url['forum']) ? 0 : $arr_url['forum']), 1);
			}
		}
		return $tmp;
	}

	function FormatDate( $timestamp )
	{
		if(empty($timestamp)) return '';
		return strftime($this->Lang('datetime_format'), $timestamp);
	}


	/**
	 * General FrontEnd Function
	 */
	function GetForumIDTopicIDFromPostID( $post_id )
	{
		$db =& $this->GetDb();
		$q = "SELECT forum_id, topic_id
			FROM ". CMS_TABLE_FORUM_POSTS ."
			WHERE id = ?";
		$dbresult =& $db->SelectLimit($q, 1, 0, array($post_id));
		if($dbresult && $row=$dbresult->FetchRow())
			return array($row['forum_id'], $row['topic_id']);

		return false;
	}
	function GetForumIDFromTopicID( $topic_id )
	{
		$db =& $this->GetDb();
		$q = "SELECT forum_id
			FROM ". CMS_TABLE_FORUM_TOPICS ."
			WHERE id = ?";
		$dbresult =& $db->SelectLimit($q, 1, 0, array($topic_id));
		if($dbresult && $row=$dbresult->FetchRow())
			return $row['forum_id'];

		return false;
	}
	function GetForumName( $forum_id )
	{
		if(!isset($this->TreeManager))
		{
			$this->TreeManager =& $this->GetModuleInstance('TreeManager');
			if(false === $this->TreeManager)
				return $this->Lang('error_noreqmodule', 'TreeManager');
		}
		$this->TreeManager->initTree($this, $this->customField, $this->lang);
		$arr = $this->TreeManager->getNode($forum_id);
		return empty($arr['name']) ? '?' : $arr['name'];
	}
	function GetForumDetails( $forum_id )
	{
		$this->TreeManager->initTree($this, $this->customField, $this->lang);
		$arr = $this->TreeManager->getNode($forum_id);
		if($arr && 'forum'==$arr['type'])
		{
			if(empty($this->PropertiesForum[$forum_id])) $this->GetForumIDProperties($forum_id);
			$arr = array_merge($arr, $this->PropertiesForum[$forum_id]);
		}
		return $arr;
	}
	function GetLastPosts($forum_id=0, $num=1, $where_in='')
	{
		$out=array();
		$where='';
		$where .= (empty($forum_id)) ? ((empty($where_in))?'1=1':$where_in) : "t.forum_id = ".$forum_id;
		if(!$this->isModerator($forum_id)) $where .= " AND t.posts_count > 0";

		$db =& $this->GetDb();
		$q = "SELECT p.body,
			t.id as topic_id, t.forum_id, t.poster_id as startedby_id, t.poster_time as startedby_time, t.last_post_id as post_id, t.last_poster_id, t.last_poster_time, t.subject, t.status
			FROM ". CMS_TABLE_FORUM_TOPICS ." AS t
			LEFT JOIN ". CMS_TABLE_FORUM_POSTS ." AS p ON (t.last_post_id=p.id)
			WHERE {$where} ORDER BY t.last_poster_time DESC";
		$dbresult =& $db->SelectLimit($q, $num, 0);
		while($dbresult && $row=$dbresult->FetchRow())
		{
			$row['forum_name'] = $this->GetForumName($row['forum_id']);
			$out[] = $row;
		}
		return $out;
	}

	function ApprovePost($status, $forum_id, $topic_id, $post_id, $user_id, $posts_count, $topic_subject, $body)
	{
		if($this->CheckForumPermission('approval_post', $forum_id, $status))
		{
			$db =& $this->GetDb();
			$qu = "UPDATE ". CMS_TABLE_FORUM_POSTS ."
				SET status = 'published'
				WHERE id = ?";
			$dbresult = $db->Execute($qu, array($post_id));
			if(!$dbresult) return false;

			$q = "SELECT status
				FROM ". CMS_TABLE_FORUM_POSTS ."
				WHERE topic_id = ? AND status != 'published'";
			$dbresult =& $db->SelectLimit($q, 1, 0, array($topic_id));
			if($dbresult && $dbresult->RecordCount()==0)
				$status = 'published';
			elseif($dbresult && $row=$dbresult->FetchRow())
				$status = $row['status'];

			$q = "SELECT id, poster_id, poster_time
				FROM ". CMS_TABLE_FORUM_POSTS ."
				WHERE topic_id = ? AND status = 'published'
				ORDER BY poster_time DESC";
			$dbresult =& $db->SelectLimit($q, 1, 0, array($topic_id));
			if($dbresult && $row=$dbresult->FetchRow())
			{
				$qu = "UPDATE ". CMS_TABLE_FORUM_TOPICS ."
					SET last_post_id = ?, last_poster_id = ?, last_poster_time = ?, status = ?, posts_count = posts_count+1
					WHERE id = ?";
				$dbresult = $db->Execute($qu, array($row['id'], $row['poster_id'], $row['poster_time'], $status, $topic_id));
				if(!$dbresult) return false;
			}

			$forum_det = $this->GetForumDetails($forum_id);
			if('forum' == $forum_det['type'])
			{
				$input=array();
				if($posts_count == 0)
				{
					$input['topics_count'] = $forum_det['topics_count']+1;

					#Update search index
					$search =& $this->GetModuleInstance('Search');
					if(false !== $search)
						$search->AddWords($this->GetName(), $topic_id, 'topic', $topic_subject.' '.$topic_subject);
				}
				$input['posts_count'] = $forum_det['posts_count']+1;

				$this->TreeManager->initTree($this, $this->customField, $this->lang);
				$this->TreeManager->updateCustom($forum_id, $input);

				$set_users = ($posts_count==0) ? ', num_topics = num_topics+1' : '';
				$qu = "UPDATE ". CMS_TABLE_FORUM_USERS ."
					SET num_posts = num_posts+1 {$set_users}
					WHERE user_id = ?";
				$dbresult = $db->Execute($qu, array($user_id));
				if( $dbresult )
				{
					$q = "SELECT id
						FROM ". CMS_TABLE_FORUM_USERS ."
						WHERE user_id = ?";
					$dbresult =& $db->Execute($q, array($user_id));
					if($dbresult && $dbresult->RecordCount()==0)
					{
						$uid = $db->GenID(CMS_TABLE_FORUM_USERS.'_seq');
						$qi = "INSERT INTO ". CMS_TABLE_FORUM_USERS ."
							(id, user_id, num_topics, num_posts, banreason)
							VALUES (?,?,?,?,?)";
						$dbresult = $db->Execute($qi, array($uid, $user_id, (($posts_count==0)?1:0), 1, ''));
						if(!$dbresult) return false;
					}
				}
			}

			#Update search index
			$search =& $this->GetModuleInstance('Search');
			if(false !== $search) $search->AddWords($this->GetName(), $post_id, 'post', $body);
			return true;
		}
		return false;
	}
	function DeletePost($post_id, $topic_id, $forum_id, $user_id)
	{
		$db =& $this->GetDb();
		$qd = "DELETE FROM ". CMS_TABLE_FORUM_POSTS ."
				WHERE id = ? AND forum_id = ? AND topic_id = ?";
		$dbresult = $db->Execute($qd, array($post_id, $forum_id, $topic_id));
		if(!$dbresult) return false;

		$qu = "UPDATE ". CMS_TABLE_FORUM_TOPICS ."
			SET posts_count = posts_count-1
			WHERE id = ?";
		$dbresult = $db->Execute($qu, array($topic_id));
		if(!$dbresult) return false;

		$this->TreeManager->initTree($this, $this->customField, $this->lang);
		$arr = $this->TreeManager->getNode($forum_id);
		if($arr && 'forum'==$arr['type'])
		{
			$input = array('posts_count'=>$arr['posts_count']-1);
			$test = $this->TreeManager->updateCustom($forum_id, $input);
			if(!$test) return false;
		}

		$qu = "UPDATE ". CMS_TABLE_FORUM_USERS ."
			SET num_posts = num_posts-1
			WHERE user_id = ?";
		$dbresult = $db->Execute($qu, array($user_id));
		if(!$dbresult) return false;

		#Update search index
		$search =& $this->GetModuleInstance('Search');
		if(false !== $search) $search->DeleteWords($this->GetName(), $post_id, 'post');

		$q = "SELECT id as post_id, poster_id, poster_time
			FROM ". CMS_TABLE_FORUM_POSTS ."
			WHERE topic_id = ? ORDER BY id DESC";
		$dbresult =& $db->SelectLimit($q, 1, 0, array($topic_id));
		if(!$dbresult) return false;
		if($dbresult->RecordCount() == 0)
		{
			$qd = "DELETE FROM ". CMS_TABLE_FORUM_TOPICS ."
				WHERE id = ? AND forum_id = ?";
			$dbresult =& $db->Execute($qd, array($topic_id, $forum_id));
			if(!$dbresult) return false;

			if($arr && 'forum'==$arr['type'])
			{
				$input = array('topics_count'=>$arr['topics_count']-1);
				$test = $this->TreeManager->updateCustom($forum_id, $input);
				if(!$test) return false;
			}

			$qu = "UPDATE ". CMS_TABLE_FORUM_USERS ."
				SET num_topics = num_topics-1
				WHERE user_id = ?";
			$dbresult = $db->Execute($qu, array($user_id));
			if(!$dbresult) return false;

			#Update search index
			$search =& $this->GetModuleInstance('Search');
			if(false !== $search) $search->DeleteWords($this->GetName(), $topic_id, 'topic');
		}
		else
		{
			$row = $dbresult->FetchRow();
			$qu = "UPDATE ". CMS_TABLE_FORUM_TOPICS ."
				SET last_post_id = ?, last_poster_id = ?, last_poster_time = ?
				WHERE id = ?";
			$dbresult = $db->Execute($qu, array($row['post_id'], $row['poster_id'], $row['poster_time'], $topic_id));
			if(!$dbresult) return false;
		}
		return true;
	}

	function SearchResult($returnid, $item_id, $attr='')
	{
		$this->LoadDataModule();
		$db =& $this->GetDb();
		$result=array();
		switch ($attr)
		{
			case 'post':
				$q = "SELECT id, topic_id
					FROM ". CMS_TABLE_FORUM_POSTS ."
					WHERE id = ?";
				$dbresult =& $db->Execute($q, array($item_id));
				if($dbresult && $row=$dbresult->FetchRow())
				{
					$item_id = (int)@$row['topic_id'];
					$post = $row['id'];
					#Fall through
				}
				else
				{
					break;
				}
			case 'topic':
				$q = "SELECT forum_id, subject
				FROM ". CMS_TABLE_FORUM_TOPICS ."
				WHERE id = ?";
				$dbresult =& $db->Execute($q, array($item_id));
				if($dbresult && $row=$dbresult->FetchRow())
				{
					#0 position is the prefix displayed in the list results
					$result[0] = cms_htmlentities($this->GetForumName($row['forum_id']));

					#1 position is the title
					$result[1] = cms_htmlentities($row['subject']);

					#2 position is the URL to the title
					$forumpath='';
					$forumpageID=0;
					$forumpage = $this->GetPreference('forumpage', '');
					if(!empty($forumpage))
					{
						global $gCms;
						$contentops =& $gCms->GetContentOperations();
						$contentobj = $contentops->LoadContentFromAlias($forumpage);
						if($contentobj)
						{
							$forumpageID = $contentobj->Id();
							$forumpath = $contentobj->HierarchyPath();
						}
					}
					$pagenumber = $this->findMultiPagePost($item_id);
					$arr_url = array('lang'=>$this->lang, 'fid'=>$row['forum_id'], 'tid'=>$item_id);
					$result[2] = $this->forumPrettyURL('cntnt01', 'topic', (!empty($forumpageID)?$forumpageID:$returnid), '', $arr_url, '', true, $row['forum_id'], $item_id, $pagenumber, $forumpath, false);
					if(isset($post)) $result[2] .= '#msg'.$post;
				}
				break;
		}
		return $result;
	}
	function SearchReindex( &$search )
	{
		$db =& $this->GetDb();
		$q = "SELECT id as topic_id, subject
			FROM ". CMS_TABLE_FORUM_TOPICS ."
			WHERE posts_count > 0
			ORDER BY last_poster_time";
		$dbresult =& $db->Execute($q);
		while($dbresult && $row=$dbresult->FetchRow())
			$search->AddWords($this->GetName(), $row['topic_id'], 'topic', $row['subject'].' '.$row['subject']);

		$q = "SELECT id as post_id, body,
			FROM ". CMS_TABLE_FORUM_POSTS ."
			WHERE status = 'published'
			ORDER BY poster_time";
		$dbresult =& $db->Execute($q);
		while($dbresult && $row=$dbresult->FetchRow())
			$search->AddWords($this->GetName(), $row['post_id'], 'post', $row['body']);
	}

	function findMultiPagePost($topic_id, $orderby='ASC')
	{
		$db =& $this->GetDb();
		$q = "SELECT forum_id, posts_count
			FROM ". CMS_TABLE_FORUM_TOPICS ."
			WHERE id = ?";
		$dbresult =& $db->Execute($q, array($topic_id));
		if($dbresult && $row=$dbresult->FetchRow())
		{
			$posts_count = $row['posts_count'];
			if(empty($this->PropertiesForum[$row['forum_id']])) $this->GetForumIDProperties($row['forum_id']);
			if(!empty($this->PropertiesForum[$row['forum_id']]['post_pagelimit'])) $post_pagelimit = $this->PropertiesForum[$row['forum_id']]['post_pagelimit'];
		}
		if(empty($posts_count)) return 1;

		$pagenumber = (int)($posts_count / $post_pagelimit);
		if(($posts_count % $post_pagelimit) <> 0) $pagenumber++;
		return $pagenumber;
	}

	function cleanString($string, $trim='trim')
	{
		if(is_null($string) || empty($string)) return '';
		$string = call_user_func($trim, $string);
		$string = cms_html_entity_decode($string);
		$string = strip_tags($string);
		return $string;
	}
	function ProcessPostBody( $body_raw )
	{
		require_once 'nbbc/nbbc_main.php';
		$bbcode = new BBCode;
		$bbcode->SetSmileyURL($this->ModuleData['ImageUrl'].'smileys');
		return $bbcode->Parse($body_raw);
	}

	#Returns the real IP address of the user (www.php.net/source.php?url=/include/ip-to-country.inc)
	function realip()
	{
		#No IP found (will be overwritten by for if any IP is found behind a firewall)
		$ip = FALSE;

		#If HTTP_CLIENT_IP is set, then give it priority
		if(!empty($_SERVER["HTTP_CLIENT_IP"]))
			$ip = $_SERVER["HTTP_CLIENT_IP"];

		#User is behind a proxy and check that we discard RFC1918 IP addresses if
		#they are behind a proxy then only figure out which IP belongs to the user.
		#Might not need any more hackin if there is a squid reverse proxy infront of apache.
		if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
			#Put the IP's into an array which we shall work with shortly.
			$ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
			if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }

			for ($i = 0; $i < count($ips); $i++) {
				#Skip RFC 1918 IP's 10.0.0.0/8, 172.16.0.0/12 and 192.168.0.0/16
				if (!preg_match('/^(?:10|172\.(?:1[6-9]|2\d|3[01])|192\.168)\./', $ips[$i])) {
					if (version_compare(phpversion(), "5.0.0", ">=")) {
						if (ip2long($ips[$i]) != false) {
							$ip = $ips[$i];
							break;
						}
					} else {
						if (ip2long($ips[$i]) != -1) {
							$ip = $ips[$i];
							break;
						}
					}
				}
			}
		}

		#Return with the found IP or the remote address
		return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
	}

	function createTextareaBBCode($id='', $text='', $name='', $cols='80', $rows='15', $classname='', $htmlid='', $encoding='', $addtext='', $after=true)
	{
		global $gCms;
		if(!empty($gCms->variables['formcount']))
		{
			$formcount = $gCms->variables['formcount'];
			if($after) $formcount--;
		}
		else
			$formcount = 1;

//http://javascript.html.it/script/vedi/552/textarea-con-bbcode
$bbcodejs = <<<EOT
<script type="text/javascript">
// <![CDATA[
var isMozilla=(navigator.userAgent.toLowerCase().indexOf('gecko')!=-1) ? true : false;
var regexp=new RegExp("[\\r]","gi");
function storeCaret(selec_start, selec_end)
{
	if (isMozilla)
	{
		oField=document.forms['{$id}moduleform_{$formcount}'].elements['{$id}{$name}'];
		objectValue=oField.value;
		deb=oField.selectionStart;
		fin=oField.selectionEnd;
		objectValueDeb=objectValue.substring(0,oField.selectionStart);
		objectValueFin=objectValue.substring(oField.selectionEnd,oField.textLength);
		objectSelected=objectValue.substring(oField.selectionStart,oField.selectionEnd);
		oField.value=objectValueDeb + "[" + selec_start + "]" + objectSelected + "[/" + selec_end + "]" + objectValueFin;
		oField.selectionStart=strlen(objectValueDeb);
		oField.selectionEnd=strlen(objectValueDeb + "[" + selec_start + "]" + objectSelected + "[/" + selec_end + "]");
		oField.focus();
		oField.setSelectionRange(objectValueDeb.length + selec_start.length + 2,objectValueDeb.length + selec_end.length + 2);
	}
	else
	{
		oField=document.forms['{$id}moduleform_{$formcount}'].elements['{$id}{$name}'];
		var str=document.selection.createRange().text;
		if (str.length>0)
		{
			//Si on a selectionnÃ© du texte
			var sel=document.selection.createRange();
			sel.text="[" + selec_start + "]" + str + "[/" + selec_end + "]";
			sel.collapse();
			sel.select();
		}
		else
		{
			oField.focus(oField.caretPos);
			oField.focus(oField.value.length);
			oField.caretPos=document.selection.createRange().duplicate();
			var bidon = "%~%";
			var orig=oField.value;
			oField.caretPos.text=bidon;
			var i=oField.value.search(bidon);
			oField.value=orig.substr(0,i) + "[" + selec_start + "][/" + selec_end + "]" + orig.substr(i, oField.value.length);
			var r=0;
			for(n=0; n<i; n++) {if(regexp.test(oField.value.substr(n,2)) == true){r++;}};
			pos = i + 2 + selec.length - r;
			var r=oField.createTextRange();
			r.moveStart('character',pos);
			r.collapse();
			r.select();
		}
	}
}
function bbhelpline(text)
{
	document.forms['{$id}moduleform_{$formcount}'].helpline.value=text;
}
// ]]>
</script>
<a href="javascript:void(0);" onclick="storeCaret('b','b');return false;" onmouseover="bbhelpline('{$this->Lang('bbhelpline_b')}');" onmouseout="bbhelpline('{$this->Lang('bbhelpline_tip')}');"><img src="{$this->ModuleData['ImageUrl']}toobar_bold.gif" alt="Bold" title="Bold" style="margin:1px; background-image:url({$this->ModuleData['ImageUrl']}bbc_bg.gif);" /></a>
<a href="javascript:void(0);" onclick="storeCaret('i','i');return false;" onmouseover="bbhelpline('{$this->Lang('bbhelpline_i')}');" onmouseout="bbhelpline('{$this->Lang('bbhelpline_tip')}');"><img src="{$this->ModuleData['ImageUrl']}toobar_italic.gif" alt="Italic" title="Italic" style="margin:1px; background-image:url({$this->ModuleData['ImageUrl']}bbc_bg.gif);" /></a>
<a href="javascript:void(0);" onclick="storeCaret('u','u');return false;" onmouseover="bbhelpline('{$this->Lang('bbhelpline_u')}');" onmouseout="bbhelpline('{$this->Lang('bbhelpline_tip')}');"><img src="{$this->ModuleData['ImageUrl']}toobar_under.gif" alt="Under" title="Under" style="margin:1px; background-image:url({$this->ModuleData['ImageUrl']}bbc_bg.gif);" /></a>
<a href="javascript:void(0);" onclick="storeCaret('quote','quote');return false;" onmouseover="bbhelpline('{$this->Lang('bbhelpline_quote')}');" onmouseout="bbhelpline('{$this->Lang('bbhelpline_tip')}');"><img src="{$this->ModuleData['ImageUrl']}toobar_quote.gif" alt="Quote" title="Quote" style="margin:1px; background-image:url({$this->ModuleData['ImageUrl']}bbc_bg.gif);" /></a>
<a href="javascript:void(0);" onclick="storeCaret('code','code');return false;" onmouseover="bbhelpline('{$this->Lang('bbhelpline_code')}');" onmouseout="bbhelpline('{$this->Lang('bbhelpline_tip')}');"><img src="{$this->ModuleData['ImageUrl']}toobar_code.gif" alt="Code" title="Code" style="margin:1px; background-image:url({$this->ModuleData['ImageUrl']}bbc_bg.gif);" /></a>
<a href="javascript:void(0);" onclick="storeCaret('img','img');return false;" onmouseover="bbhelpline('{$this->Lang('bbhelpline_img')}');" onmouseout="bbhelpline('{$this->Lang('bbhelpline_tip')}');"><img src="{$this->ModuleData['ImageUrl']}toobar_img.gif" alt="Image" title="Image" style="margin:1px; background-image:url({$this->ModuleData['ImageUrl']}bbc_bg.gif);" /></a>
<a href="javascript:void(0);" onclick="storeCaret('url','url');return false;" onmouseover="bbhelpline('{$this->Lang('bbhelpline_url')}');" onmouseout="bbhelpline('{$this->Lang('bbhelpline_tip')}');"><img src="{$this->ModuleData['ImageUrl']}toobar_url.gif" alt="URL" title="URL" style="margin:1px; background-image:url({$this->ModuleData['ImageUrl']}bbc_bg.gif);" /></a>
<a href="javascript:void(0);" onclick="storeCaret('center','center');return false;" onmouseover="bbhelpline('{$this->Lang('bbhelpline_center')}');" onmouseout="bbhelpline('{$this->Lang('bbhelpline_tip')}');"><img src="{$this->ModuleData['ImageUrl']}toobar_center.gif" alt="Center" title="Center" style="margin:1px; background-image:url({$this->ModuleData['ImageUrl']}bbc_bg.gif);" /></a>
<select onchange="storeCaret('color=' + this.options[this.selectedIndex].value.toLowerCase(),'color'); this.selectedIndex=0;" style="margin-bottom:7px; background-color:white;" onmouseover="bbhelpline('{$this->Lang('bbhelpline_color')}');" onmouseout="bbhelpline('{$this->Lang('bbhelpline_tip')}');">
	<option value="" selected="selected">{$this->Lang('toolbar_textcolor')}</option>
	<option value="Black">Black</option>
	<option value="Red">Red</option>
	<option value="Yellow">Yellow</option>
	<option value="Pink">Pink</option>
	<option value="Green">Green</option>
	<option value="Orange">Orange</option>
	<option value="Purple">Purple</option>
	<option value="Blue">Blue</option>
	<option value="Beige">Beige</option>
	<option value="Brown">Brown</option>
	<option value="Teal">Teal</option>
	<option value="Navy">Navy</option>
	<option value="Maroon">Maroon</option>
	<option value="LimeGreen">Lime Green</option>
</select>
<br /><input type="text" name="helpline" id="helpline" value="{$this->Lang('bbhelpline_tip')}" />
EOT;
		$result = $bbcodejs.'<br /><textarea name="'.$id.$name.'" cols="'.$cols.'" rows="'.$rows.'"';

		if(!empty($classname)) $result .= ' class="'.$classname.'"';
		if(!empty($htmlid)) $result .= ' id="'.$htmlid.'"';
		if(!empty($addtext)) $result .= ' '.$addtext;
		$result .= '>'.cms_htmlentities($text,ENT_NOQUOTES,get_encoding($encoding)).'</textarea>';
		return $result;
	}


	/**
	 * General BackEnd Function
	 */
	function InsertForumProperties($forum_id, $property_id, $value)
	{
		$db =& $this->GetDb();
		$id = $db->GenID(CMS_TABLE_FORUM_FORUM_PROPERTY.'_seq');
		$qi = "INSERT INTO ". CMS_TABLE_FORUM_FORUM_PROPERTY ."
			(id, forum_id, property_id, value)
			VALUES(?,?,?,?)";
		$dbresult = $db->Execute($qi, array($id, $forum_id, $property_id, $value));
		if(!$dbresult) return false;
		return true;
	}
	function ForumCreateLabel($form_id, $type, $name, $label)
	{
		switch($type)
		{
			case 'InputDropdown': return $label; break;
			default: return $this->CreateLabelForInput($form_id, $name, $label);
		}
	}
	function ForumCreateEdit($form_id, $type, $name, $value, $options)
	{
		switch($type)
		{
			case 'InputDropdown':
				return $this->CreateInputDropdown($form_id, $name, $options, -1, $value);
				break;
			case 'InputCheckbox':
				return $this->CreateInputCheckbox($form_id, $name, $value, $options);
				break;
			case 'InputRadioGroup':
				if(empty($options)) $options = array($this->Lang('no')=>0,$this->Lang('yes')=>1);
				return $this->CreateInputRadioGroup($form_id, $name, $options, (!empty($value)?$value:0));
				break;
			case 'InputTextAreaBBCode':
				return $this->createTextareaBBCode($form_id, $value, $name, $options['cols'], $options['rows']);
				break;
			default:
				return $this->CreateInputText($form_id, $name, $value);
		}
	}
}
?>
