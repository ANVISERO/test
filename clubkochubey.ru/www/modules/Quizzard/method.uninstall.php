<?php
#-------------------------------------------------------------------------
# Module: Quizzard - a placement test module
# Version: 0.1, SjG
# Method: Uninstall
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2007 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
# The module's homepage is: http://dev.cmsmadesimple.org/projects/skeleton/
#
#-------------------------------------------------------------------------

/*
    For separated methods, you'll always want to start with the following
    line which check to make sure that method was called from the module
    API, and that everything's safe to continue:
*/ 
if (!isset($gCms)) exit;


/* After this, the code is identical to the code that would otherwise be
    wrapped in the Uninstall() method in the module body.
*/

		$db =& $gCms->GetDb();
		
		// remove the database table
		$dict = NewDataDictionary( $db );
		$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_qz_quizzes" );
		$dict->ExecuteSQLArray($sqlarray);
		$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_qz_questions" );
		$dict->ExecuteSQLArray($sqlarray);
		$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_qz_answers" );
		$dict->ExecuteSQLArray($sqlarray);
		$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_qz_takers" );
		$dict->ExecuteSQLArray($sqlarray);
		$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_qz_result" );
		$dict->ExecuteSQLArray($sqlarray);
		$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_qz_extra_fields" );
		$dict->ExecuteSQLArray($sqlarray);
		$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_qz_extra_vals" );
		$dict->ExecuteSQLArray($sqlarray);


		// remove the sequence
		$db->DropSequence( cms_db_prefix()."module_qz_quizzes_seq" );
		$db->DropSequence( cms_db_prefix()."module_qz_questions_seq" );
		$db->DropSequence( cms_db_prefix()."module_qz_answers_seq" );
		$db->DropSequence( cms_db_prefix()."module_qz_takers_seq" );
		$db->DropSequence( cms_db_prefix()."module_qz_result_seq" );
		$db->DropSequence( cms_db_prefix()."module_qz_extra_field_seq" );
		$db->DropSequence( cms_db_prefix()."module_qz_extra_vals_seq" );

		// remove the permissions
		$this->RemovePermission('Administer Quizzes');

		$this->RemovePreference("send_mail");
		$this->RemovePreference("send_to");
		$this->RemovePreference("email_from");
		$this->RemovePreference("email_fromname");
		$this->RemovePreference("email_subject");
		$this->RemovePreference("default_questions");
		$this->RemovePreference("case_sensitive");
      	$this->RemovePreference("fillin_len");
      	$this->RemovePreference("pagination");
        $this->RemovePreference("show_char_list");
        $this->RemovePreference("show_palette");
        $this->RemovePreference("multiple_fillin");
        $this->RemovePreference("save_button");
        $this->RemovePreference("renumber_by_section");
        $this->RemovePreference("wysiwyg_questions");
        $this->RemovePreference("html_email");
        $this->RemovePreference("require_user");
        $this->RemovePreference("quiz_inline");
        $this->RemovePreference("smarty_pages");
 		$this->RemovePreference('threshold');
		$this->RemovePreference('threshold_message');
		$this->RemovePreference('threshold_single_page');
		$this->RemovePreference('question_wrong');
		$this->RemovePreference('show_pagenav');

		// drop the templates
		$this->DeleteTemplate('quiz_template', 'Quizzard');
		$this->DeleteTemplate('score_template', 'Quizzard');
		$this->DeleteTemplate('signup_template', 'Quizzard');
		$this->DeleteTemplate('email_template', 'Quizzard');

        // delete admin's quiz cookie -- helps debug while developing :)
        setcookie ("quizzard_tid", "", time() - 3600);
		
		// put mention into the admin log
		$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('uninstalled'));

?>