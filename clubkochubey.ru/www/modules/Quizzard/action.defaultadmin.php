<?php
if (!isset($gCms)) exit;

if (! $this->CheckPermission('Administer Quizzes'))
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}
	
include "accented.php";

if (FALSE == empty($params['active_tab']))
  {
    $tab = $params['active_tab'];
  } else {
  $tab = '';
 }

$this->smarty->assign('tabheaders', $this->StartTabHeaders() .
	$this->SetTabHeader('quizzes',$this->Lang('quizzes'),('quizzes' == $tab)?true:false) .
	$this->SetTabHeader('import',$this->Lang('import'),('import' == $tab)?true:false) .
	$this->SetTabHeader('extrafields',$this->Lang('extrafields'),('extra' == $tab)?true:false) .
	$this->SetTabHeader('threshold',$this->Lang('threshold'),('threshold' == $tab)?true:false) .
	$this->SetTabHeader('quiztemplate',$this->Lang('quiztemplate'),('template' == $tab)?true:false) .
	$this->SetTabHeader('emailtemplate',$this->Lang('emailtemplate'),('emailtemplate' == $tab)?true:false) .
	$this->SetTabHeader('scoretemplate',$this->Lang('scoretemplate'),('scoretemplate' == $tab)?true:false) .
	$this->SetTabHeader('emailconfig',$this->Lang('emailconfig'),('email' == $tab)?true:false) .
	$this->SetTabHeader('chars',$this->Lang('characters'),('characters' == $tab)?true:false) .
	$this->SetTabHeader('config',$this->Lang('configuration'),('configuration' == $tab)?true:false) .
	$this->EndTabHeaders().
	$this->StartTabContent());
$this->smarty->assign('start_quiztab',$this->StartTab('quizzes'));
$this->smarty->assign('start_configtab',$this->StartTab('config'));
$this->smarty->assign('start_emailconfigtab',$this->StartTab('emailconfig'));
$this->smarty->assign('start_importtab',$this->StartTab('import'));
$this->smarty->assign('start_extratab',$this->StartTab('extrafields'));
$this->smarty->assign('start_thresholdtab',$this->StartTab('threshold'));
$this->smarty->assign('start_quiztemplatetab',$this->StartTab('quiztemplate'));
$this->smarty->assign('start_charactertab',$this->StartTab('chars'));
$this->smarty->assign('start_emailtemplatetab',$this->StartTab('emailtemplate'));
$this->smarty->assign('start_scoretemplatetab',$this->StartTab('scoretemplate'));
$this->smarty->assign('end_tab',$this->EndTab());
$this->smarty->assign('end_tabs',$this->EndTabContent());
$this->smarty->assign('start_uploadform',$this->CreateFormStart($id,
			'importquiz', $returnid,'post','multipart/form-data'));
$this->smarty->assign('start_configform',$this->CreateFormStart($id,
			'saveadminprefs', $returnid,'post'));
$this->smarty->assign('start_templateform',$this->CreateFormStart($id,
			'savetemplates', $returnid,'post'));
$this->smarty->assign('start_thresholdform',$this->CreateFormStart($id,
			'savethreshold', $returnid,'post'));
$this->smarty->assign('end_form', $this->CreateFormEnd());
$this->smarty->assign('message',isset($params['module_message'])?$params['module_message']:'');

$this->smarty->assign('column_embed',$this->Lang('column_embed'));
$this->smarty->assign('title_send_email',$this->Lang('title_send_email'));
$this->smarty->assign('title_questions_case_sensitive',$this->Lang('title_questions_case_sensitive'));
$this->smarty->assign('title_fillin_len',$this->Lang('title_fillin_len'));
$this->smarty->assign('title_extrafields',$this->Lang('title_extrafields'));

$this->smarty->assign('title_send_to',$this->Lang('title_send_to'));
$this->smarty->assign('title_default_questions',$this->Lang('title_default_questions'));
$this->smarty->assign('title_pagination',$this->Lang('title_pagination'));
$this->smarty->assign('title_show_pagenav',$this->Lang('title_show_pagenav'));
$this->smarty->assign('title_pagination_help',$this->Lang('title_pagination_help'));
$this->smarty->assign('title_max_answers',$this->Lang('title_max_answers'));
$this->smarty->assign('title_file_to_upload',$this->Lang('title_file_to_upload'));
$this->smarty->assign('title_show_palette',$this->Lang('title_show_palette'));
$this->smarty->assign('title_palette_chars',$this->Lang('title_palette_chars'));
$this->smarty->assign('title_quiz_template',$this->Lang('title_quiz_template'));
$this->smarty->assign('title_signup_template',$this->Lang('title_signup_template'));
$this->smarty->assign('title_email_template',$this->Lang('title_email_template'));
$this->smarty->assign('title_score_template',$this->Lang('title_score_template'));
$this->smarty->assign('title_email_from',$this->Lang('title_email_from'));
$this->smarty->assign('title_email_fromname',$this->Lang('title_email_fromname'));
$this->smarty->assign('title_email_subject',$this->Lang('title_email_subject'));
$this->smarty->assign('title_multiple_fillin',$this->Lang('title_multiple_fillin'));
$this->smarty->assign('title_save_button',$this->Lang('title_save_button'));
$this->smarty->assign('title_renumber_by_section',$this->Lang('title_renumber_by_section'));
$this->smarty->assign('title_smarty_process_pages',$this->Lang('title_smarty_process_pages'));

$this->smarty->assign('title_wysiwyg_questions',$this->Lang('title_wysiwyg_questions'));
$this->smarty->assign('title_html_email',$this->Lang('title_html_email'));
$this->smarty->assign('title_require_user',$this->Lang('title_require_user'));
$this->smarty->assign('title_quiz_inline',$this->Lang('title_quiz_inline'));

$this->smarty->assign('title_file_to_upload_help',$this->Lang('title_file_to_upload_help'));

$this->smarty->assign('input_quiz_template', $this->CreateTextArea(false,
	$id, $this->GetTemplate('quiz_template', 'Quizzard'),
	'quiz_template', '','','','',80,25));
$this->smarty->assign('input_signup_template', $this->CreateTextArea(false,
	$id, $this->GetTemplate('signup_template', 'Quizzard'),
	'signup_template', '','','','',80,25));
$this->smarty->assign('input_score_template', $this->CreateTextArea(false,
	$id, $this->GetTemplate('score_template', 'Quizzard'),
	'score_template', '','','','',80,25));
$this->smarty->assign('input_email_template', $this->CreateTextArea(false,
	$id, $this->GetTemplate('email_template', 'Quizzard'),
	'email_template', '','','','',80,25));


$questions = array();
for($i=1;$i<31;$i++)
	{
	$questions[$i]=$i;
	}
$this->smarty->assign('input_default_questions', $this->CreateInputDropdown($id, 'default_questions', $questions, -1,  $this->GetPreference('default_questions','10')));

$answers = array();
for($i=1;$i<16;$i++)
	{
	$answers[$i]=$i;
	}
$this->smarty->assign('input_max_answers', $this->CreateInputDropdown($id, 'max_answers', $answers, -1,  $this->GetPreference('max_answers','5')));


$this->smarty->assign('title_score_threshold',$this->Lang('title_score_threshold'));
$thresh = array();
for($i=0;$i<100;$i++)
	{
	$thresh[$i.'%']=$i;
	}
$this->smarty->assign('input_score_threshold',
	$this->CreateInputDropdown($id, 'threshold', $thresh, -1,  $this->GetPreference('threshold','0')));

$this->smarty->assign('title_threshold_message',$this->Lang('title_threshold_message'));
$this->smarty->assign('input_threshold_message', $this->CreateTextArea(false,
	$id, $this->GetPreference('threshold_message', $this->Lang('threshold_message')),
	'threshold_message', '','','','',80,25));

$this->smarty->assign('title_threshold_single_page',$this->Lang('title_threshold_single_page'));
$this->smarty->assign('input_threshold_single_page',$this->CreateInputCheckbox($id, 'threshold_single_page', 1,
	$this->GetPreference('threshold_single_page', '0')).'&nbsp;'.$this->Lang('title_threshold_single_page_help'));

$this->smarty->assign('title_question_wrong',$this->Lang('title_question_wrong'));
$this->smarty->assign('input_question_wrong',$this->CreateInputText($id, 'question_wrong',
	$this->GetPreference('question_wrong', $this->Lang('question_wrong'))));


$paginations = array();
$paginations[$this->Lang('title_paginate_count')] = 'count';
$paginations[$this->Lang('title_paginate_break')] = 'break';
$this->smarty->assign('input_pagination',$this->CreateInputRadioGroup($id, 'pagination', $paginations, $this->GetPreference('pagination','count')));
$this->smarty->assign('input_show_pagenav',$this->CreateInputCheckbox($id, 'show_pagenav', 1,
	$this->GetPreference('show_pagenav', '0')));


$this->smarty->assign('input_send_email',$this->CreateInputCheckbox($id, 'send_email', 1,
	$this->GetPreference('send_email', '1')).'&nbsp;'.$this->Lang('title_send_email'));

$this->smarty->assign('input_require_user',$this->CreateInputCheckbox($id, 'require_user', 1,
	$this->GetPreference('require_user', '1')).'&nbsp;'.$this->Lang('title_require_user_help'));

$this->smarty->assign('input_quiz_inline',$this->CreateInputCheckbox($id, 'quiz_inline', 1,
	$this->GetPreference('quiz_inline', '1')).'&nbsp;'.$this->Lang('title_quiz_inline_help'));

$this->smarty->assign('input_smarty_process_pages',$this->CreateInputCheckbox($id, 'smarty_pages', 1,
		$this->GetPreference('smarty_pages', '0')).'&nbsp;'.$this->Lang('title_smarty_process_pages_help'));

$this->smarty->assign('input_questions_case_sensitive',$this->CreateInputCheckbox($id, 'case_sensitive', 1,
	$this->GetPreference('case_sensitive','0')).'&nbsp;'.$this->Lang('title_questions_case_sensitive_help'));
$this->smarty->assign('input_send_to',$this->CreateInputText($id, 'send_to', $this->GetPreference('send_to','you@yourdomain.com'), 40, 255));

$this->smarty->assign('input_email_subject',$this->CreateInputText($id,
	'email_subject',$this->GetPreference("email_subject",
	$this->Lang('email_subject')), 40, 255));
	
$this->smarty->assign('input_email_from',$this->CreateInputText($id,
	'email_from',$this->GetPreference("email_from",
	$this->Lang('email_from')), 40, 255));
	
$this->smarty->assign('input_email_fromname',$this->CreateInputText($id,
	'email_fromname',$this->GetPreference("email_fromname",
	$this->Lang('email_fromname')), 40, 255));
      	
$this->smarty->assign('input_fillin_len',$this->CreateInputCheckbox($id, 'fillin_len', 1,
	$this->GetPreference('fillin_len', '1')).'&nbsp;'.$this->Lang('title_fillin_len_help'));

$this->smarty->assign('input_multiple_fillin',$this->CreateInputCheckbox($id, 'multiple_fillin', 1,
	$this->GetPreference('multiple_fillin', '1')).'&nbsp;'.$this->Lang('title_multiple_fillin_help'));


$this->smarty->assign('input_file_to_upload',$this->CreateInputFile($id, 'textfile'));

$this->smarty->assign('input_show_palette',$this->CreateInputCheckbox($id, 'show_palette', 1,
	$this->GetPreference('show_palette', '0')).'&nbsp;'.$this->Lang('title_show_palette_help'));

$this->smarty->assign('input_save_button',$this->CreateInputCheckbox($id, 'save_button', 1,
	$this->GetPreference('save_button', '0')).'&nbsp;'.$this->Lang('title_save_button_help'));

$this->smarty->assign('input_renumber_by_section',$this->CreateInputCheckbox($id, 'renumber_by_section', 1,
	$this->GetPreference('renumber_by_section', '0')).'&nbsp;'.$this->Lang('title_renumber_by_section_help'));

$this->smarty->assign('input_wysiwyg_questions',$this->CreateInputCheckbox($id, 'wysiwyg_questions', 1,
	$this->GetPreference('wysiwyg_questions', '0')).'&nbsp;'.$this->Lang('title_wysiwyg_questions'));

$this->smarty->assign('input_html_email',$this->CreateInputCheckbox($id, 'html_email', 1,
	$this->GetPreference('html_email', '0')).'&nbsp;'.$this->Lang('title_html_email'));



$palette_chars = '';
$show_char = $this->GetPreference('show_char_list',
'00000000000000000000000000000111111111111111111111111111111');
for ($i=0;$i<count($accented);$i++)
	{
	$palette_chars .= '<input type="checkbox" id="ac'.$i.
		'" name="'.$id.'ac_'.$i.'" value="1"';
	if ($show_char[$i]=='1')
		{
		$palette_chars .= ' checked="checked"';
		}
	$palette_chars .= '><label for="ac'.$i.'">'.$accented[$i].'</label> ';
	}
$this->smarty->assign('input_palette_chars',$palette_chars);
$this->smarty->assign('title_select_all',$this->Lang('title_select_all'));
$this->smarty->assign('title_select_none',$this->Lang('title_select_none'));
$this->smarty->assign('id',$id);
$this->smarty->assign('accentlen',count($accented));

$this->smarty->assign('title_field_name',$this->Lang('title_field_name'));
$this->smarty->assign('title_field_type',$this->Lang('title_field_type'));
$this->smarty->assign('title_field_display_len',$this->Lang('title_field_display_len'));
$this->smarty->assign('title_field_max_len',$this->Lang('title_field_max_len'));
$this->smarty->assign('title_field_del',$this->Lang('title_field_del'));
$this->smarty->assign('title_field_weight',$this->Lang('title_field_weight'));

$extralist = $this->getExtras();
$extra_sel=array($this->Lang('extra_text')=>'extra_text',
$this->Lang('extra_text_r')=>'extra_text_r',
$this->Lang('extra_check')=>'extra_check',
$this->Lang('extra_check_r')=>'extra_check_r',
$this->Lang('extra_number')=>'extra_number',
$this->Lang('extra_number_r')=>'extra_number_r',
$this->Lang('extra_phone')=>'extra_phone',
$this->Lang('extra_phone_r')=>'extra_phone_r'
);

for($i=0;$i<count($extralist);$i++)
	{
	$extralist[$i]['input_type'] = $this->CreateInputDropdown($id, 'extra_t_'.$extralist[$i]['field_id'], $extra_sel, -1, $extralist[$i]['field_type']);
	$extralist[$i]['input_display_len'] = $this->CreateInputText($id, 'extra_l_'.$extralist[$i]['field_id'], $extralist[$i]['field_display_len'], 4, 10);
	$extralist[$i]['input_max_len'] = $this->CreateInputText($id, 'extra_m_'.$extralist[$i]['field_id'], $extralist[$i]['field_max_len'], 4, 10);
	$extralist[$i]['input_weight'] = $this->CreateInputText($id, 'extra_w_'.$extralist[$i]['field_id'], ($i+1), 4, 10);
	$extralist[$i]['input_name'] = $this->CreateInputText($id, 'extra_n_'.$extralist[$i]['field_id'], $extralist[$i]['field_name'], 30);
	$extralist[$i]['input_del'] = $this->CreateInputCheckbox($id, 'extra_d'.$extralist[$i]['field_id'], 1,
		$this->GetPreference('case_sensitive','0'));
	}

$extralist[$i]['input_type'] = $this->CreateInputDropdown($id, 'extra_t_-1', $extra_sel, -1, '');
$extralist[$i]['input_display_len'] = $this->CreateInputText($id, 'extra_l_-1', '0', 4, 10);
$extralist[$i]['input_max_len'] = $this->CreateInputText($id, 'extra_m_-1', '0', 4, 10);
$extralist[$i]['input_weight'] = $this->CreateInputText($id, 'extra_w_-1', ($i+1), 4, 10);
$extralist[$i]['input_name'] = $this->CreateInputText($id, 'extra_n_-1', '', 30);
$extralist[$i]['input_del'] = '';
$this->smarty->assign('start_extraform',$this->CreateFormStart($id,
			'saveextras', $returnid,'post'));

$this->smarty->assign('extras',$extralist);

$this->smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', $this->Lang('title_save_prefs')));
$this->smarty->assign('import', $this->CreateInputSubmit($id, 'import', $this->Lang('title_import')));
$this->smarty->assign('submittemplates', $this->CreateInputSubmit($id, 'submittemplates', $this->Lang('title_save_templates')));

$this->listQuizzes($id, $params, $returnid);

echo $this->ProcessTemplate('adminpanel.tpl');
?>