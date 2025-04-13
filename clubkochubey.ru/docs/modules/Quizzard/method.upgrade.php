<?php
#-------------------------------------------------------------------------
# Module: Quizzard - a placement test module
# Version: 0.1, SjG
# Method: Upgrade
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

		$current_version = $oldversion;
		switch($current_version)
		{
			case "0.2":
			case "0.3":
   				 $sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_qz_questions",
   				 	"is_scored I");
    			 $dict->ExecuteSQLArray($sqlarray);
				$query = 'UPDATE '.cms_db_prefix().
		'module_qz_questions set is_scored=1 where question_type in (\'c\',\'m\',\'f\')';
				$dbresult = $db->Execute($query);
				$query = 'UPDATE '.cms_db_prefix().
		'module_qz_questions set is_scored=0 where question_type not in (\'c\',\'m\',\'f\')';
				$dbresult = $db->Execute($query);
			case "0.4":
			case "0.5":
			case "0.6":
   			$sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_qz_takers",
   				 	"completed I");
    			$dict->ExecuteSQLArray($sqlarray);
			   $sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_qz_takers",
   				 	"start_date ".CMS_ADODB_DT);
    			$dict->ExecuteSQLArray($sqlarray);
            $sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_qz_takers",
   				 	"completed_date ".CMS_ADODB_DT);
    			$dict->ExecuteSQLArray($sqlarray);
			case "0.6.1":
			case "0.6.2":
			case "0.6.3":
				$sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_qz_questions",
   				 	"title C(80)");
    			$dict->ExecuteSQLArray($sqlarray);
			case "0.6.4":
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
			case "0.6.5":
				$this->SetPreference('threshold',0);
				$this->SetPreference('threshold_message',$this->Lang('threshold_message'));
			case "0.7":
				$sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_qz_takers",
				 	"completed_score I");
				$dict->ExecuteSQLArray($sqlarray);
         case "0.8":
			   $sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_qz_takers",
				 	"quiz_id I");
				$dict->ExecuteSQLArray($sqlarray);
			   $db->Execute('create index '.cms_db_prefix().
				  'module_qz_res_idx on '.cms_db_prefix().
				  'module_qz_result (taker_id,quiz_id,question_id,answer_id)');
			   $db->Execute('create index '.cms_db_prefix().
				  'module_qz_ques_idx on '.cms_db_prefix().
				  'module_qz_question (quiz_id)');
			   $db->Execute('create index '.cms_db_prefix().
				  'module_qz_ans_idx on '.cms_db_prefix().
				  'module_qz_answers (quiz_id,question_id)');
		case "0.8.1":


		}
		
		// put mention into the admin log
		$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('upgraded',$this->GetVersion()));

?>