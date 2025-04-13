<?php
#-------------------------------------------------------------------------
# Module: Quizzard - a placement test module
# Version: 0.6.5, SjG
# Method: Install
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2007 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
# The module's homepage is: http://dev.cmsmadesimple.org/projects/skeleton/
#
#-------------------------------------------------------------------------

if (!isset($gCms)) exit;

		$db =& $gCms->GetDb();
		
		// mysql-specific, but ignored by other database
		$taboptarray = array('mysql' => 'TYPE=MyISAM');

		$dict = NewDataDictionary($db);
		
        $flds = "
			quiz_id I KEY,
			name C(80),
			description C(80)
			";
		$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_qz_quizzes",
				$flds, $taboptarray);
		$dict->ExecuteSQLArray($sqlarray);
		$db->CreateSequence(cms_db_prefix()."module_qz_quizzes_seq");

        $flds = "
        	question_id I KEY,
			quiz_id I,
			order_by I,
			is_scored I,
			question_type C(1),
			title C(80),
			question X
			";
		$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_qz_questions",
				$flds, $taboptarray);
		$dict->ExecuteSQLArray($sqlarray);
		$db->CreateSequence(cms_db_prefix()."module_qz_questions_seq");

        $flds = "
        	answer_id I KEY,
			question_id I,
			quiz_id I,
			is_correct I,
			answer C(255)
			";
		$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_qz_answers",
				$flds, $taboptarray);
		$dict->ExecuteSQLArray($sqlarray);
		$db->CreateSequence(cms_db_prefix()."module_qz_answers_seq");

        $flds = "
        	taker_id I KEY,
        	name C(255),
			email C(255),
			send_result I,
			quiz_id I,
			start_date ".CMS_ADODB_DT.",
         completed_date ".CMS_ADODB_DT.",
			completed I,
			completed_score I
			";
		$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_qz_takers",
				$flds, $taboptarray);
		$dict->ExecuteSQLArray($sqlarray);
		$db->CreateSequence(cms_db_prefix()."module_qz_takers_seq");

		$flds = "
			field_id I KEY,
			field_name X,
			field_type C(80),
			field_display_len I,
			field_max_len I,
			field_weight I
			";
		$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_qz_extra_fields",
				$flds, $taboptarray);
		$dict->ExecuteSQLArray($sqlarray);
		$db->CreateSequence(cms_db_prefix()."module_qz_extra_field_seq");

		$flds = "
			taker_id I,
			field_id I,
			value C(255)
			";
		$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_qz_extra_vals",
				$flds, $taboptarray);
		$dict->ExecuteSQLArray($sqlarray);
		$db->CreateSequence(cms_db_prefix()."module_qz_extra_vals_seq");

        $flds = "
        	result_id I KEY,
        	taker_id I,
        	quiz_id I,
			question_id I,
			answer_id I,
			answer C(255),
			is_correct I
			";
		$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_qz_result",
				$flds, $taboptarray);
		$dict->ExecuteSQLArray($sqlarray);
		$db->CreateSequence(cms_db_prefix()."module_qz_result_seq");

		$db->Execute('create index '.cms_db_prefix().
			'module_qz_res_idx on '.cms_db_prefix().
			'module_qz_result (taker_id,quiz_id,question_id,answer_id)');
		$db->Execute('create index '.cms_db_prefix().
			'module_qz_ques_idx on '.cms_db_prefix().
			'module_qz_question (quiz_id)');
		$db->Execute('create index '.cms_db_prefix().
			'module_qz_ans_idx on '.cms_db_prefix().
			'module_qz_answers (quiz_id,question_id)');


		// create a permission
        $this->CreatePermission('Administer Quizzes', 'Administer Quizzes');

		$this->SetPreference("send_email","true");
		$this->SetPreference("send_to","you@yourdomain.com");
		$this->SetPreference("default_questions",10);
      $this->SetPreference("case_sensitive",0);
		$this->SetPreference('max_answers', 5);
        
		$this->SetPreference('email_from', $this->Lang('email_from'));
		$this->SetPreference('email_fromname', $this->Lang('email_fromname'));
		$this->SetPreference('email_subject', $this->Lang('email_subject'));
		$this->SetPreference('fillin_len', 0);
		$this->SetPreference('pagination', 'break');
		$this->SetPreference('threshold',0);
		$this->SetPreference('threshold_message',$this->Lang('threshold_message'));

      // set default templates
      $template = file_get_contents(dirname(__FILE__).'/templates/stdquiz.tpl');
      $this->SetTemplate('quiz_template',$template,'Quizzard');
      $template = file_get_contents(dirname(__FILE__).'/templates/scorequiz.tpl');
      $this->SetTemplate('score_template',$template,'Quizzard');
      $template = file_get_contents(dirname(__FILE__).'/templates/signup.tpl');
      $this->SetTemplate('signup_template',$template,'Quizzard');
      $template = file_get_contents(dirname(__FILE__).'/templates/email.tpl');
      $this->SetTemplate('email_template',$template,'Quizzard');

		// import a sample quiz
		$in_file = array_map('rtrim',file(dirname(__FILE__).'/include/sample.txt'));
		$this->importQuiz($in_file);


		// put mention into the admin log
		$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('installed',$this->GetVersion()));

?>