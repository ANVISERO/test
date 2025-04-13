<?php
if (!isset($gCms)) exit;

if (! $this->CheckPermission('Administer Quizzes'))
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}
include "accented.php";

$this->SetPreference('send_email', isset($params['send_email'])?$params['send_email']:'');
$this->SetPreference('require_user', isset($params['require_user'])?$params['require_user']:'');
$this->SetPreference('quiz_inline', isset($params['quiz_inline'])?$params['quiz_inline']:'');
$this->SetPreference('smarty_pages', isset($params['smarty_pages'])?$params['smarty_pages']:'');
$this->SetPreference('case_sensitive', isset($params['case_sensitive'])?$params['case_sensitive']:'');
$this->SetPreference('show_palette', isset($params['show_palette'])?$params['show_palette']:'');

$this->SetPreference('multiple_fillin', isset($params['multiple_fillin'])?$params['multiple_fillin']:'');
$this->SetPreference('save_button', isset($params['save_button'])?$params['save_button']:'');

$this->SetPreference('renumber_by_section', isset($params['renumber_by_section'])?$params['renumber_by_section']:'');
$this->SetPreference('wysiwyg_questions', isset($params['wysiwyg_questions'])?$params['wysiwyg_questions']:'');

$this->SetPreference('default_questions', isset($params['default_questions'])?$params['default_questions']:'10');

$this->SetPreference('max_answers', isset($params['max_answers'])?$params['max_answers']:'5');
        
$this->SetPreference('send_to', isset($params['send_to'])?$params['send_to']:'you@yourdomain.com');

$this->SetPreference('email_from', isset($params['email_from'])?$params['email_from']:$this->Lang('email_from'));
$this->SetPreference('email_fromname', isset($params['email_fromname'])?$params['email_fromname']:$this->Lang('email_fromname'));
$this->SetPreference('email_subject', isset($params['email_subject'])?$params['email_subject']:$this->Lang('email_subject'));

$this->SetPreference('fillin_len', isset($params['fillin_len'])?$params['fillin_len']:'');

$this->SetPreference('pagination', isset($params['pagination'])?$params['pagination']:'');

$this->SetPreference('show_pagenav', isset($params['show_pagenav'])?$params['show_pagenav']:'');

$show_chars = '';
for ($i=0;$i<count($accented);$i++)
	{
	if (isset($params['ac_'.$i]))
		{
		$show_chars .= '1';
		}
	else
		{
		$show_chars .= '0';
		}
	}
	
	
$this->SetPreference('show_char_list',$show_chars);

$params = array('tab_message'=> 'prefsupdated', 'active_tab' => 'configuration');
//$params['module_message'] = $this->Lang('prefsupdated');
//$this->Redirect($id, 'defaultadmin', $returnid, $params);
$this->DoAction('defaultadmin', $id, $params, $returnid);
?>