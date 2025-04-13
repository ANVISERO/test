<?php
#-------------------------------------------------------------------------
# Module: Quizzard - a placement test module
# Version: 0.6.4, SjG
#
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2007 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
# The module's homepage is: http://dev.cmsmadesimple.org/projects//
#
#-------------------------------------------------------------------------
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
#-------------------------------------------------------------------------


class Quizzard extends CMSModule
{

	var $taker_id=-1;

	function GetName()
	{
		return 'Quizzard';
	}

	function GetFriendlyName()
	{
		return $this->Lang('friendlyname');
	}

	function GetVersion()
	{
		return '0.8.2';
	}

	function GetHelp()
	{
		return $this->Lang('help');
	}
	
	function SetParameters()
	{
    	$this->RestrictUnknownParams();
    	$this->CreateParameter('qzz_*','null',$this->Lang('quizzard_params_general'));
		$this->SetParameterType(CLEAN_REGEXP.'/qzz_.*/',CLEAN_NONE);
		$this->CreateParameter('quiz_id','null',$this->Lang('quizzard_params_quiz_id'));
    	$this->SetParameterType('quiz_id',CLEAN_INT);

		$this->CreateParameter('question','null',$this->Lang('quizzard_params_question'));
    	$this->SetParameterType('question',CLEAN_INT);
		$this->CreateParameter('question_id','null',$this->Lang('quizzard_params_question'));
    	$this->SetParameterType('question_id',CLEAN_INT);

      $this->CreateParameter('list_takers','null',$this->Lang('quizzard_params_list_takers'));
    	$this->SetParameterType('list_takers',CLEAN_STRING);


  	}
	

	function GetAuthor()
	{
		return 'SjG';
	}
	function GetAuthorEmail()
	{
		return 'sjg@cmsmodules.com';
	}
	function GetChangeLog()
	{
		return $this->Lang('changelog');
	}
	function IsPluginModule()
	{
		return true;
	}
	function HasAdmin()
	{
		return true;
	}
	function GetAdminSection()
	{
		return 'content';
	}
	function GetAdminDescription()
	{
		return $this->Lang('moddescription');
	}
	function VisibleToAdminUser()
	{
        return $this->CheckPermission('Administer Quizzes');
	}
	function GetDependencies()
	{
		return array('CMSMailer'=>'1.73.10');
	}
	function MinimumCMSVersion()
	{
		return "1.0";
	}
	function UninstallPreMessage()
	{
		return $this->Lang('really_uninstall');
	}
	
    function AdminStyle()
    {
      return "\n.quizzard_area_short {width: 500px; height: 100px;}\n.quizzard_area_long {width: 500px; height: 300px;}\n";
    }
	

    function DisplayErrorPage($id, &$params, $returnid, $message='')
    {
    	error_log($message);
		$this->smarty->assign('title_error', $this->Lang('error'));
		if ($message != '')
			{
			$this->smarty->assign_by_ref('message', $message);
			}

        // Display the populated template
        echo $this->ProcessTemplate('error.tpl');
    }


	function setTakerId($id,$quiz_id,$session=true)
	{
		// we can obscure/encrypt this later, should we so desire
		setcookie ('quiZZard_'.$quiz_id,$id,($session?0:(time()+60*60*24*30)));	
	}
		
	function getTakerId($quiz_id)
	{
      global $gCms;
      $ret = -1;
	  if ($this->taker_id != -1)
		{
		return $this->taker_id;
		}
	// and reflect that encryption/obscuration here
	if (isset($_COOKIE['quiZZard_'.$quiz_id]))
		{
        	// validate the quiz is still incomplete...
       	$db =& $gCms->GetDb();
       	$query = 'SELECT * FROM '. cms_db_prefix().
			'module_qz_takers where taker_id=? and completed=0';
     	$prev = $db->Execute($query,array($_COOKIE['quiZZard_'.$quiz_id]));
       	if ($prev && $prev->RecordCount() > 0)
           	{
			$ret = $_COOKIE['quiZZard_'.$quiz_id];
			$row = $prev->FetchRow();
			$this->smarty->assign('quizzard_taker_name',$row['name']);
			$this->smarty->assign('quizzard_taker_email',$row['email']);
			}
		}
	return $ret;
	}

	function resetTakerId($quiz_id)
	{
		// and here as well
		setcookie ('quiZZard_'.$quiz_id,'-1');
		$this->taker_id = -1;
	}
	

	function getQuizList($id, &$params, $returnid)
	{
        global $gCms;
		$db =& $gCms->GetDb();

        $entryarray = array();

		$query = "SELECT quiz_id, name, description FROM ".
			cms_db_prefix()."module_qz_quizzes ORDER by name";        	
        	
        $dbresult = $db->Execute($query);
        while ($dbresult !== false && $row = $dbresult->FetchRow())
        {
	       $onerow = new stdClass();

	       $onerow->id = $row['quiz_id'];
	       $onerow->title = $row['name'];
	       $onerow->desc = $row['description'];
	       array_push($entryarray, $onerow);
        }
		$query = "SELECT count(qq.question_id) as qcount FROM ".
				cms_db_prefix()."module_qz_quizzes qz, ".
				cms_db_prefix()."module_qz_questions qq where " .
				"qq.quiz_id = qz.quiz_id and qq.question_type in ('m','f','c') ".
				"and qz.quiz_id=?";        	
		for ($i=0;$i<count($entryarray);$i++)
			{

		        $dbresult = $db->Execute($query,array($entryarray[$i]->id));
		        if ($dbresult !== false && $row = $dbresult->FetchRow())
		        	{
				       $entryarray[$i]->qcount = $row['qcount'];
					}
				
			}
		return $entryarray;
	}
	
    function listQuizzes($id, &$params, $returnid)
    {
        global $gCms;

        $entryarray = $this->getQuizList($id, $params, $returnid);
		$rowclass="row1";
        for ($i=0;$i<count($entryarray);$i++)
        {
	       $entryarray[$i]->name = $this->CreateLink($id, 'editquiz', $returnid,
	       		$entryarray[$i]->title, array('quiz_id'=>$entryarray[$i]->id));

			 $entryarray[$i]->export = $this->CreateLink($id, 'exportquiz', $returnid,
	       		'<img src="'.$gCms->config['root_url'].
	       			'/images/cms/xml_rss.gif" alt="'.
	       			$this->Lang('export').'" class="systemicon" />', array('quiz_id'=>$entryarray[$i]->id,'xml'=>'1'));
	       	 $entryarray[$i]->rowclass = $rowclass;
			 $entryarray[$i]->stats = $this->CreateLink($id, 'quizstats', $returnid,
	       			$this->Lang('stats'), array('quiz_id'=>$entryarray[$i]->id));
			 $entryarray[$i]->manage = $this->CreateLink($id, 'managequiz', $returnid,
	       			$this->Lang('manage'), array('quiz_id'=>$entryarray[$i]->id));
			 $entryarray[$i]->browse = $this->CreateLink($id, 'showquizresults', $returnid,
					$this->Lang('browse_results'), array('quiz_id'=>$entryarray[$i]->id));
	
	       $entryarray[$i]->editlink = $this->CreateLink($id, 'editquiz', $returnid,
	       		$gCms->variables['admintheme']->DisplayImage('icons/system/edit.gif',
	       			$this->Lang('edit'),'','','systemicon'),
	       		 	array('quiz_id'=>$entryarray[$i]->id));
	       $entryarray[$i]->deletelink = $this->CreateLink($id, 'deletequiz', $returnid,
	       		$gCms->variables['admintheme']->DisplayImage('icons/system/delete.gif',
	       			$this->Lang('delete'),'','','systemicon'),
	       			array('quiz_id'=>$entryarray[$i]->id), $this->Lang('areyousurequiz'));
	       	($rowclass=="row1"?$rowclass="row2":$rowclass="row1");

        }

        $this->smarty->assign_by_ref('items', $entryarray);
        $this->smarty->assign('itemcount', count($entryarray));
        $this->smarty->assign('section',$this->Lang('quizlist'));
        $this->smarty->assign('column_name',$this->Lang('column_name'));
        $this->smarty->assign('column_desc',$this->Lang('column_desc'));
        $this->smarty->assign('column_qcount',$this->Lang('column_qcount'));
        $this->smarty->assign('column_export',$this->Lang('column_export'));
        $this->smarty->assign('noquizzes',$this->Lang('noquizzes'));

        $this->smarty->assign('addlink',
            $this->CreateLink($id, 'editquiz', $returnid,
                $gCms->variables['admintheme']->DisplayImage('icons/system/newobject.gif',
                $this->Lang('addquiz'),'','','systemicon'), array(), '', false, false, '') .' '.
            $this->CreateLink($id, 'editquiz', $returnid,
                $this->Lang('addquiz'), array(), '', false, false, 'class="pageoptions"'));
    }

    function listQuestions($id, &$params, $returnid)
    {
        global $gCms;
		$db =& $gCms->GetDb();

        $entryarray = array();

		if (!isset($params['quiz_id']))
			{
			$params['quiz_id'] = -1;
			}
		$qcount = 1;
        $query = "SELECT question_id, question, title, question_type FROM ".
        	cms_db_prefix()."module_qz_questions WHERE quiz_id=? ORDER by order_by";
        $dbresult = $db->Execute($query,array($params['quiz_id']));

        $rowclass = 'row1';

		$prev = -1;
		$qnum = 1;
        while ($dbresult !== false && $row = $dbresult->FetchRow())
        {
	       $onerow = new stdClass();
	       if ($row['question_type'] == 'c' || $row['question_type'] == 'f' || $row['question_type'] == 'm')
	       	{
				$onerow->num = $qnum++;
				}
			else
				{
				$onerow->num = '';
				if ($row['question_type'] == 's' && $this->GetPreference('renumber_by_section','') == '1')
					{
					$qnum = 1;
					}
				}
		   $onerow->qcount = $qcount++;
	       $onerow->id = $row['question_id'];
		   if ($row['question_type'] == 'b' || strlen($row['question']) < 1)
				{
				$onerow->title = '---';
				}
			else if ($row['question_type'] == 'p')
				{
				$onerow->title = $this->Lang('type_p').': '.$row['title'];
				}
			else
				{
				$onerow->title = $row['question'];	
				}
	       $onerow->name = $this->CreateLink($id, 'editquestion', $returnid,
	       		$onerow->title,
					 array('question_id'=>$row['question_id'],'quiz_id'=>$params['quiz_id']));
	       $onerow->rowclass = $rowclass;
	       $onerow->type = $this->Lang('type_'.$row['question_type']);

	       $onerow->editlink = $this->CreateLink($id, 'editquestion', $returnid,
	       		$gCms->variables['admintheme']->DisplayImage('icons/system/edit.gif',
	       			$this->Lang('edit'),'','','systemicon'),
	       		 	array('question_id'=>$row['question_id'],
	       		 	'quiz_id'=>$params['quiz_id']));
	       $onerow->deletelink = $this->CreateLink($id, 'deletequestion', $returnid,
	       		$gCms->variables['admintheme']->DisplayImage('icons/system/delete.gif',
	       			$this->Lang('delete'),'','','systemicon'),
	       			array('question_id'=>$row['question_id'],
	       			'quiz_id'=>$params['quiz_id']), $this->Lang('areyousurequestion'));

		   $onerow->uplink = '';
		   $onerow->downlink = '';
	       array_push($entryarray, $onerow);

	       ($rowclass=="row1"?$rowclass="row2":$rowclass="row1");
        }

		$len = count($entryarray);
		for ($i = 0; $i < $len; $i++)
			{
			if ($i < $len - 1)
				{
	       		$entryarray[$i]->downlink = $this->CreateLink($id, 'orderquestion',
	       			$returnid,
	  				$gCms->variables['admintheme']->DisplayImage('icons/system/arrow-d.gif',
	       			$this->Lang('down'),'','','systemicon'),
	       		 	array('src'=>$entryarray[$i]->id,
	       		 	'dst'=>$entryarray[$i + 1]->id,
	       		 	'quiz_id'=>$params['quiz_id']));				
				}
			if ($i > 0)
				{
	       		$entryarray[$i]->uplink = $this->CreateLink($id, 'orderquestion',
	       			$returnid,
	  				$gCms->variables['admintheme']->DisplayImage('icons/system/arrow-u.gif',
	       			$this->Lang('up'),'','','systemicon'),
	       		 	array('src'=>$entryarray[$i]->id,
	       		 	'dst'=>$entryarray[$i - 1]->id,
	       		 	'quiz_id'=>$params['quiz_id']));				
				
				}
			}
        $this->smarty->assign_by_ref('items', $entryarray);
        $this->smarty->assign('itemcount', count($entryarray));
        $this->smarty->assign('section',$this->Lang('quizlist'));
        $this->smarty->assign('column_question',$this->Lang('column_question'));
        $this->smarty->assign('column_type',$this->Lang('column_type'));
        $this->smarty->assign('noquestions',$this->Lang('noquestions'));

        $this->smarty->assign('addlink',
            $this->CreateLink($id, 'editquestion', $returnid,
                $gCms->variables['admintheme']->DisplayImage('icons/system/newobject.gif',
                $this->Lang('addquestion'),'','','systemicon'),
                array('quiz_id'=>$params['quiz_id']), '', false, false, '').
                ' '.
            $this->CreateLink($id, 'editquestion', $returnid,
                $this->Lang('addquestion'), array('quiz_id'=>$params['quiz_id']), '', false, false, 'class="pageoptions"'));
    }

    function listAnswers($id, &$params, $returnid)
    {
        global $gCms;
		$db =& $gCms->GetDb();

        $entryarray = array();

		if (!isset($params['question_id']))
			{
			$params['question_id'] = -1;
			}

        $query = "SELECT question_type FROM ".
        	cms_db_prefix()."module_qz_questions WHERE question_id=?";
        $dbresult = $db->Execute($query,array($params['question_id']));
        $theType = $dbresult->FetchRow();
        	


        $query = "SELECT answer_id, is_correct, answer FROM ".
        	cms_db_prefix()."module_qz_answers WHERE question_id=? ".
        	"order by answer_id";
        $dbresult = $db->Execute($query,array($params['question_id']));

        $rowclass = 'row1';

		$answerCount = 0;
        while ($dbresult !== false && $row = $dbresult->FetchRow())
        {
			$onerow = new stdClass();
			$onerow->acount = $answerCount;
			$onerow->id = $row['answer_id'];
			$onerow->mcorrect = '<input type="radio" name="'.
	       		$id.'rad'.$params['question_id'].
	       		'"  value="'.$answerCount.'"';
			if ($row['is_correct'] == 1)
				{
				$onerow->mcorrect .= ' ' . 'checked="checked"';
				}
			$onerow->mcorrect .= ' />';
			$onerow->ccorrect = '<input type="checkbox" name="'.
	       		$id.'check'.$answerCount.
	       		'"  value="1"';
			if ($row['is_correct'] == 1)
				{
				$onerow->ccorrect .= ' ' . 'checked="checked"';
				}
			$onerow->ccorrect .= ' />';
			$onerow->rowclass = $rowclass;
			$onerow->answer = $this->CreateInputText($id, 'answer'.
				$answerCount,
				$row['answer'], 60, 255);

			array_push($entryarray, $onerow);
			$answerCount++;
	       ($rowclass=="row1"?$rowclass="row2":$rowclass="row1");
        }
        for($i=$answerCount;$i<$this->GetPreference('max_answers',5);$i++)
        	{
        	$onerow = new stdClass();
			$onerow->id = $i;
			$onerow->acount = $i;
			$onerow->mcorrect = '<input type="radio" name="'.
	       		$id.'rad'.$params['question_id'].
	       		'"  value="'.$i.'"';
			if ($row['is_correct'] == 1)
				{
				$onerow->mcorrect .= ' ' . 'checked="checked"';
				}
			$onerow->mcorrect .= ' />';
			$onerow->ccorrect = '<input type="checkbox" name="'.
	       		$id.'check'.$i.
	       		'"  value="1"';
			if ($row['is_correct'] == 1)
				{
				$onerow->ccorrect .= ' ' . 'checked="checked"';
				}
			$onerow->ccorrect .= ' />';
			$onerow->rowclass = $rowclass;
			$onerow->answer = $this->CreateInputText($id, 'answer'.
				$i,'', 60, 255);

			array_push($entryarray, $onerow);

	       ($rowclass=="row1"?$rowclass="row2":$rowclass="row1");
        	
        	}
        $this->smarty->assign_by_ref('items', $entryarray);
        $this->smarty->assign('itemcount', count($entryarray));
        $this->smarty->assign('column_answer',$this->Lang('column_answer'));
        $this->smarty->assign('column_correct',$this->Lang('column_correct'));
        $this->smarty->assign('noanswers',$this->Lang('noanswers'));

    }

	function storeScore($quiz_id,$score)
	{
        global $gCms;
		$db =& $gCms->GetDb();
		$taker_id = $this->getTakerId($quiz_id);
		$query = 'update '.cms_db_prefix().
				"module_qz_takers set completed_score=? where taker_id=?";
		$dbresult = $db->Execute($query,array($score,$taker_id));
	}

	function saveQuestionAnswers($id, &$params, $returnid)
	{
        global $gCms;
		$db =& $gCms->GetDb();
		$taker_id = $this->getTakerId($params['quiz_id']);
		
		$theseQuestions = array();
		foreach ($params as $thisKey=>$thisVal)
			{
			if (substr($thisKey,0,6) == 'qzz_q_' &&
					(
					(!is_array($thisVal) && strlen($thisVal)>0) ||
					( is_array($thisVal) && count($thisVal) > 0)))
				{
				$safeThisParam = preg_replace("/\D/","",substr($thisKey,6));
				
				array_push($theseQuestions,$safeThisParam);
				}
			}
			
		if (count($theseQuestions) > 0)
			{
			$questions = $this->getQuestionsInRange($id, $params, $returnid, true);
        	$entryarray = $questions->questions;

			$query = "DELETE FROM ".cms_db_prefix().
					"module_qz_result where quiz_id=? and taker_id=? and question_id in (".implode(',',$theseQuestions).")";
			$dbresult = $db->Execute($query,
				array($params['quiz_id'],$taker_id));

			$mquery = "INSERT INTO ".cms_db_prefix().
				"module_qz_result (result_id, taker_id, quiz_id, question_id, answer, answer_id, is_correct) VALUES (?,?,?,?,?,?,?)";
			$fquery = "INSERT INTO ".cms_db_prefix().
				"module_qz_result (result_id, taker_id, quiz_id, question_id, answer, is_correct) VALUES (?,?,?,?,?,?)";

			foreach($theseQuestions as $thisQuestion)
				{
				// save it
				if ($entryarray[$thisQuestion]->type == 'f')
					{
					$count = 0;
					if (! is_array($params['qzz_q_'.$thisQuestion]))
						{
						$params['qzz_q_'.$thisQuestion] = array($params['qzz_q_'.$thisQuestion]);
						}
					foreach($params['qzz_q_'.$thisQuestion] as $thisResp)
						{
						$correct = 1;
						if ($this->GetPreference("case_sensitive",0) == 0)
							{
							if (strtolower($entryarray[$thisQuestion]->correctanswers[$count]) != strtolower($thisResp))
								{
								$correct = 0;
								}
							}
						else
							{
							if ($entryarray[$thisQuestion]->correctanswers[$count] != $thisResp)
								{
								$correct = 0;
								}
							}
						$count++;
						$result_id = $db->GenID(cms_db_prefix().
							'module_qz_result_seq');

						$dbresult = $db->Execute($fquery,
							array($result_id,
								$taker_id,
								$params['quiz_id'],
								$thisQuestion,
								htmlentities($thisResp,ENT_COMPAT,'UTF-8'),
								$correct
								)
							);
						}
					}
				else if ($entryarray[$thisQuestion]->type == 'm')
					{
					$result_id = $db->GenID(cms_db_prefix().
							'module_qz_result_seq');
					$dbresult = $db->Execute($mquery,
						array($result_id,
							$taker_id,
							$params['quiz_id'],
							$thisQuestion,
							htmlentities($entryarray[$thisQuestion]->rawanswers[
								$params['qzz_q_'.$thisQuestion]],ENT_COMPAT,'UTF-8'),
							$params['qzz_q_'.$thisQuestion],
							(($entryarray[$thisQuestion]->correctanswers[0] == $params['qzz_q_'.$thisQuestion])?1:0)
							)
						);
					}
				else if ($entryarray[$thisQuestion]->type == 'c')
					{
					$count = 0;
					if (! is_array($params['qzz_q_'.$thisQuestion]))
						{
						$params['qzz_q_'.$thisQuestion] = array($params['qzz_q_'.$thisQuestion]);
						}
					foreach($entryarray[$thisQuestion]->correctanswers as $cKey=>$cVal)
						{
						$correct = 0;
						$thisResp = array_search($cKey, $params['qzz_q_'.$thisQuestion]);
                  if (($thisResp !== false && $cVal == 1) ||
							($thisResp === false && $cVal == 0))
							{
							$correct = 1;
							}
						$count++;
						$result_id = $db->GenID(cms_db_prefix().
							'module_qz_result_seq');

						$dbresult = $db->Execute($mquery,
							array($result_id,
								$taker_id,
								$params['quiz_id'],
								$thisQuestion,
								htmlentities($entryarray[$thisQuestion]->rawanswers[$cKey],ENT_COMPAT,'UTF-8'),
								$cKey,
								$correct
								)
							);
						}
					}
				}
			}

	}
	
	
   function nerfQuestionsForDisplay(&$entryarray)
	{
		foreach(array_keys($entryarray) as $i)
			{
			if ($entryarray[$i]->type == 'f')
				{
				$entryarray[$i]->question = str_replace("_","___",$entryarray[$i]->question);
				}
			}
	}
   
	
   function computeScoreValues($id, &$params, $returnid, &$entryarray)
   {
   		global $gCms;
		$db =& $gCms->GetDb();
		if (isset($params['qzz_taker_id']))
			{
			$taker_id = $params['qzz_taker_id'];
			}
		else
			{
			$taker_id = $this->getTakerId($params['quiz_id']);
			}

		$total_questions = 0;
		$total_scored = 0;
		$skipped = 0;

		$qs = array();
		foreach(array_keys($entryarray) as $i)
			{
			$entryarray[$i]->correct = 1;
			$entryarray[$i]->skipped = 1;
			array_push($qs,$i);
   			}

   		$query = 'SELECT * from '.cms_db_prefix()."module_qz_result where quiz_id=? and taker_id=? and question_id in (".
			implode(',',$qs). ") order by result_id";

		$dbresult = $db->Execute($query, array($params['quiz_id'],$taker_id));
        while ($dbresult !== false && $row = $dbresult->FetchRow())
        {
        	if (! empty($row['answer']) && strlen($row['answer'])>0)
        		{
        		$entryarray[$row['question_id']]->skipped = 0;
        		}
        	if ($entryarray[$row['question_id']]->type == 'm')
        		{
        		$entryarray[$row['question_id']]->givenanswer =
        			(isset($entryarray[$row['question_id']]->rawanswers[$row['answer_id']])?
						$entryarray[$row['question_id']]->rawanswers[$row['answer_id']]:'');
        		}
        	else if ($entryarray[$row['question_id']]->type == 'f')
        		{
        		$entryarray[$row['question_id']]->givenanswers[] =
					$row['answer'];
        		}
        	else if ($entryarray[$row['question_id']]->type == 'c')
        		{
        		if ($row['is_correct'] == 1 &&
        			$entryarray[$row['question_id']]->correctanswers[$row['answer_id']] == 1)
        			{
					$entryarray[$row['question_id']]->givenanswers[] =
						$row['answer'];
					}
				else if ($row['is_correct'] == 0 &&
					$entryarray[$row['question_id']]->correctanswers[$row['answer_id']] == 0)
        			{
					$entryarray[$row['question_id']]->givenanswers[] =
						$row['answer'];
					}				
        		}
        	$entryarray[$row['question_id']]->correct &= $row['is_correct'];
        }
        //debug_display($entryarray);
        $score = 0;
		foreach(array_keys($entryarray) as $i)
			{
			if ($entryarray[$i]->type == 'm')
				{
				$entryarray[$i]->correctanswer = $entryarray[$i]->rawanswers[$entryarray[$i]->correctanswers[0]];
				$entryarray[$i]->question_txt = strip_tags($entryarray[$i]->question);
				$entryarray[$i]->givenanswer_txt =
				(isset($entryarray[$i]->givenanswer)?strip_tags($entryarray[$i]->givenanswer):'');
				$entryarray[$i]->correctanswer_txt =
				strip_tags($entryarray[$i]->correctanswer);
				}
			else if ($entryarray[$i]->type == 'f')
				{
				$entryarray[$i]->givenanswer = 
					$this->replaceBlanksWithValues(
						$entryarray[$i]->question,
						(isset($entryarray[$i]->givenanswers)?$entryarray[$i]->givenanswers:''),
						'<span class="given_answer">_', '_</span>',false);

				$entryarray[$i]->correctanswer =
				 	$this->replaceBlanksWithValues(
						$entryarray[$i]->question,
						$entryarray[$i]->correctanswers,
						'<span class="correct_answer">_', '_</span>',false);
					
				$entryarray[$i]->question_txt = strip_tags($entryarray[$i]->question);
				$entryarray[$i]->givenanswer_txt =
					strip_tags($entryarray[$i]->givenanswer);
				$entryarray[$i]->correctanswer_txt =
					strip_tags($entryarray[$i]->correctanswer);									
				}
			else if ($entryarray[$i]->type == 'c')
				{
				$entryarray[$i]->correctanswer = '';
				foreach ($entryarray[$i]->correctanswers as $ckey=>$cval)
					{
					if ($cval == 1)
						{
						$entryarray[$i]->correctanswer .=
							$entryarray[$i]->rawanswers[$ckey] . ', ';
						}
					}
				$entryarray[$i]->correctanswer = rtrim($entryarray[$i]->correctanswer,", ");
				$entryarray[$i]->question_txt = strip_tags($entryarray[$i]->question);

				if (isset($entryarray[$i]->givenanswers))
					{
					$entryarray[$i]->givenanswer = implode(', ',$entryarray[$i]->givenanswers);

					$entryarray[$i]->givenanswer_txt =
						strip_tags($entryarray[$i]->givenanswer);
					}
				else
					{
					$entryarray[$i]->givenanswer = '';
					$entryarray[$i]->givenanswer_txt = '';
					}
				$entryarray[$i]->correctanswer_txt =
				strip_tags($entryarray[$i]->correctanswer);
				}

			else if ($entryarray[$i]->type == 's')
				{
				$entryarray[$i]->question_txt = strip_tags($entryarray[$i]->question);
				}
			if ($entryarray[$i]->type == 'm' ||
				$entryarray[$i]->type == 'f' ||
				$entryarray[$i]->type == 'c')
				{
				$total_questions++;
				if ($entryarray[$i]->is_scored == 1)
					{
					$total_scored++;
					}
				if ($entryarray[$i]->skipped == 1 &&
					$entryarray[$i]->is_scored == 1)
					{
					$skipped++;
					$entryarray[$i]->correct = 0;
					}
				if ($entryarray[$i]->correct == 1 &&
					$entryarray[$i]->is_scored == 1)
					{
					$score++;
					}
				}
			}

		$scoreboard = new stdClass();
		$scoreboard->score = $score;
		$scoreboard->total_questions = $total_scored;
		$scoreboard->skipped = $skipped;
		$scoreboard->answered = $total_scored - $skipped;
		if ($total_scored != 0)
			{
			$scoreboard->percent_right = sprintf("%02.0f",(100 * $score/$total_scored));
			$scoreboard->percent_answered = sprintf("%02.0f",
				(100*($total_scored-$skipped)/$total_scored));
			$scoreboard->percent_skipped = sprintf("%02.0f",(100*$skipped/$total_scored));
			}
		else
			{
			$scoreboard->percent_right = $this->Lang('na');
			$scoreboard->percent_answered = $this->Lang('na');
			$scoreboard->percent_skipped = $this->Lang('na');
			}
		if ($total_scored-$skipped > 0)
			{
			$scoreboard->score_percent_answered = sprintf("%02.0f",(100 * $score/($total_scored-$skipped)));
			}
		else
			{
			$scoreboard->score_percent_answered = $this->Lang('na');
			}

		return $scoreboard;
   }
	
	
	function filterForWrongAnswers(&$entryarray)
		{
		$entryarray = array_filter($entryarray,array($this,"testforcorrect"));
		}
	
	/* 
		returns an object:
		$returnObj->questions = array of questions;
		$returnObj->page_count = # of pages;
		$returnObj->this_page = current page number;
		
		set $getall to true to retrieve ALL questions
		
	
	start at end means to advance in the quiz, otherwise we're looking at
	   questions for which we have answers */
	function &getQuestionsInRange($id, &$params, $returnid, $getall = false)
	{
		
        global $gCms;
		$db =& $gCms->GetDb();

        $entryarray = array();

		$startAtEnd = false;
		if ($startAtEnd)
			{
			$start_question = (isset($params['question'])?$params['question']:0);
			}
		else
			{
			$start_question = (isset($params['qzz_prevquestion'])?$params['qzz_prevquestion']:0);
			}
			
		$startPage = (isset($params['qzz_page'])?$params['qzz_page']:1);



		if ($this->GetPreference('pagination','count') == 'count')
			{
			$number_to_add = $this->GetPreference('default_questions','10');
			}
		else
			{
			$number_to_add = 10000; // surely no reasonable quiz has 10000 questions... (famous last words)
			}

		$query = "SELECT question_id, question, title, question_type, is_scored, order_by FROM ".
        	cms_db_prefix()."module_qz_questions WHERE quiz_id=? ORDER by order_by";
      
		$dbresult = $db->Execute($query,array($params['quiz_id']));

		$question_count = 0;
		$page = 1;
		$question_number = 1;
		$break_after_prev = false;

		while ($dbresult !== false && $row = $dbresult->FetchRow())
        {
        	$onerow = new stdClass();
			$incr = false;
			if ($break_after_prev)
				{
				$page++;
				$break_after_prev = false;
				}
			if ($row['question_type'] == 'm' || $row['question_type'] == 'f' || $row['question_type'] == 'c')
				{
				$onerow->num = $question_number++;
				$question_count++;
				}
			else if ($row['question_type'] == 's')
				{
				$onerow->num = '';
				if ($this->GetPreference('renumber_by_section','') == '1')
					{
					$question_number = 1;
					}
				}
			else if ($row['question_type'] == 'b')
				{
				$page++;
				}
			else if ($row['question_type'] == 'p')
				{
				$break_after_prev = true;
				}
			else
				{
				$onerow->num = '';
				}
			
			if ($getall || $page == $startPage)
				{
				$onerow->id = $row['question_id'];
				$onerow->question = $row['question'];
				$onerow->title = isset($row['title'])?$row['title']:'';
				$onerow->type = $row['question_type'];
				$onerow->order_by = $row['order_by'];
				$onerow->is_scored = $row['is_scored']?true:false;
				$onerow->rawanswers = array();
				$onerow->correctanswers = array();
				$entryarray[$row['question_id']] = $onerow;
				}
			if ($question_count == $number_to_add)
				{
				$question_count = 0;
				$page++;
				$incr = true;
				}
		}
		
		// was our last question on an increment threshold? If so, get rid of the extra page.
		if ($incr)
			{
			$page--;
			}

		foreach(array_keys($entryarray) as $i)
			{
			if ($entryarray[$i]->type == 'p' && $this->GetPreference('smarty_pages', '0') == '1')
				{
				$entryarray[$i]->question = $this->ProcessTemplateFromData( $entryarray[$i]->question );
				}
			else if ($entryarray[$i]->type == 'm')
				{
				// multiple-choice
        		$query = "SELECT answer_id, answer, is_correct FROM ".
        			cms_db_prefix().
        			"module_qz_answers WHERE question_id=? and quiz_id=? ".
        			"order by answer_id";
        		$dbresult = $db->Execute($query,
        			array($entryarray[$i]->id,$params['quiz_id']));

				$acount = 0;
        		while ($dbresult !== false && $row = $dbresult->FetchRow())
        			{
					$entryarray[$i]->rawanswers[$row['answer_id']] = $row['answer'];
					if (!empty($row['is_correct']))
						{
						$entryarray[$i]->correctanswers[0] = $row['answer_id'];
						}
					}
				}
			else if ($entryarray[$i]->type == 'f')
				{
				// fill in the blank
        		$query = "SELECT answer_id, answer FROM ".
        			cms_db_prefix().
        			"module_qz_answers WHERE question_id=? and quiz_id=? ".
        			"order by answer_id";
        		$dbresult = $db->Execute($query,array($entryarray[$i]->id,
        				$params['quiz_id']));
        		$corind = 0;
				while ($dbresult !== false && $row = $dbresult->FetchRow())
        			{
        			$entryarray[$i]->correctanswers[$corind] = $row['answer'];
        			$entryarray[$i]->rawanswers[$corind] = $row['answer'];
        			$entryarray[$i]->answerids[$corind] = $row['answer_id'];
        			$corind++;
        			}
				}
			else if ($entryarray[$i]->type == 'c')
				{
        		$query = "SELECT answer,answer_id,is_correct FROM ".
        			cms_db_prefix().
        			"module_qz_answers WHERE question_id=? and quiz_id=? ".
        			"order by answer_id";
        		$dbresult = $db->Execute($query,array($entryarray[$i]->id,
        				$params['quiz_id']));
				while ($dbresult !== false && $row = $dbresult->FetchRow())
        			{
        			$entryarray[$i]->correctanswers[$row['answer_id']] = $row['is_correct'];
        			$entryarray[$i]->rawanswers[$row['answer_id']] = $row['answer'];
        			}
				}
			}
					
		$returnObj = new stdClass();
		$returnObj->questions = $entryarray;
		$returnObj->page_count = $page;
		$returnObj->this_page = $startPage;
		return $returnObj;
	}
	
	
	
	
	

    function makeQuestionsForms($id, &$params, $returnid, $withAnswers=false, &$entryarray)
    {
        global $gCms;
		$db =& $gCms->GetDb();
		$hasTextInput = false;
		$answerarray = array();

		$taker_id = $this->getTakerId($params['quiz_id']);

        $query = "SELECT count(question_id) FROM ".
        	cms_db_prefix()."module_qz_questions WHERE quiz_id=?";
        $total_questions = $db->GetOne($query,array($params['quiz_id']));

		$query = "SELECT question_id, answer, answer_id, is_correct from ".
			cms_db_prefix()."module_qz_result where quiz_id=? and taker_id=?";

		$dbresult = $db->Execute($query, array($params['quiz_id'],$taker_id));
        while ($dbresult !== false && $row = $dbresult->FetchRow())
        {
        	if (! isset($entryarray[$row['question_id']]))
        		{
        		// skip this
        		}
        	else if ($entryarray[$row['question_id']]->type == 'm')
        		{
        		$answerarray[$row['question_id']][0] = $row['answer_id'];
        		}
        	else if ($entryarray[$row['question_id']]->type == 'f')
        		{
        		$answerarray[$row['question_id']][] = $this->html_entity_decode_utf8($row['answer']);
        		}
        	else if ($entryarray[$row['question_id']]->type == 'c')
        		{
        		if ($row['is_correct'] == 1)
        			{
					$answerarray[$row['question_id']][$row['answer_id']] =
						$entryarray[$row['question_id']]->correctanswers[$row['answer_id']];
					}
				else
					{
					$answerarray[$row['question_id']][$row['answer_id']] = 1 -
						$entryarray[$row['question_id']]->correctanswers[$row['answer_id']];
					}
				}
        }

		foreach(array_keys($entryarray) as $i)
			{
			if ($withAnswers)
				{
				$entryarray[$i]->typefield = '<input type="hidden" name="'.
					$id.'qzz_t_'.$entryarray[$i]->id.'" value="'.
					$entryarray[$i]->type.'" />';
				}
			if ($entryarray[$i]->type == 'm')
				{
				// multiple-choice
				$acount = 0;
				$entryarray[$i]->answers = array();
        		foreach ($entryarray[$i]->rawanswers as $rawKey=>$rawVal)
        			{
					$entryarray[$i]->answers[$acount] = 
						'<input type="radio" name="'.$id.'qzz_q_'.
						$entryarray[$i]->id.
						'" id="a_'.$rawKey.
						'" value="'.$rawKey.
						'"';
					if ((isset($answerarray[$entryarray[$i]->id][0]) &&
						$answerarray[$entryarray[$i]->id][0] == $rawKey) ||
						($withAnswers &&
						isset($entryarray[$i]->correctanswers[0]) &&
						$entryarray[$i]->correctanswers[0] == $rawKey))
						{
						$entryarray[$i]->answers[$acount] .= ' checked="checked"';
						}
					$entryarray[$i]->answers[$acount] .=
						' /><label for="a_'.
						$rawKey.'">'.
						$rawVal.
						'</label>';
					$acount++;
					}
				}
			else if ($entryarray[$i]->type == 'f')
				{
				// fill-in-the-blank
				$hasTextInput = true;

				$values = array();
				for ($j=0;$j<count($entryarray[$i]->correctanswers);$j++)
					{
					$len = 15;
					if ($this->GetPreference('fillin_len','0') == '1')
						{
						$len = strlen($entryarray[$i]->correctanswers[$j]) +
							rand(0,3);
						}
					if ($withAnswers)
						{
						$len =
							strlen($entryarray[$i]->correctanswers[$j]);
						if ($len < 1)
							{
							$len = 10;
							}
						}
					if (isset($answerarray[$entryarray[$i]->id][$j]))
						{
						$val = $answerarray[$entryarray[$i]->id][$j];
						}
					else
						{
						$val = '';
						}
					if ($withAnswers)
						{
						$val = $entryarray[$i]->correctanswers[$j];
						}
					if ($withAnswers)
						{
						$values[$j] = $this->CreateInputText($id,'qzz_q_'.
							$entryarray[$i]->id.'_'.
							$entryarray[$i]->answerids[$j],$val,$len, 255);
						}
					else
						{
						$values[$j] = $this->CreateInputText($id, 'qzz_q_'.
							$entryarray[$i]->id.'[]',$val,$len, 255);
						}
					}
				$entryarray[$i]->question = $this->replaceBlanksWithValues($entryarray[$i]->question, $values);
				}
			else if ($entryarray[$i]->type == 'c')
				{
				$acount = 0;
				$entryarray[$i]->answers = array();
        		foreach ($entryarray[$i]->rawanswers as $rawKey=>$rawVal)
        			{
					$entryarray[$i]->answers[$acount] =
						'<input type="checkbox" name="'.$id.'qzz_q_'.
						$entryarray[$i]->id.
						'[]" id="a_'.$rawKey.
						'" value="'.$rawKey.'"';
					if ((isset($answerarray[$entryarray[$i]->id][$rawKey]) &&
						$answerarray[$entryarray[$i]->id][$rawKey] == 1) ||
						($withAnswers && $entryarray[$i]->correctanswers[$rawKey] == 1))
						{
						$entryarray[$i]->answers[$acount] .= ' checked="checked"';
						}
					$entryarray[$i]->answers[$acount] .=
						' /><label for="a_'.
						$rawKey.'">'.
						$rawVal.
						'</label>';
					$acount++;
					}
				}				
			}

	return $hasTextInput;
    }

	function &getEntireQuiz($id, &$params, $returnid)
	{
		//return $this->getQuestionsForPage($id, $params, $returnid, true);
		return $this->getQuestionsInRange($id, $params, $returnid, true);
	}
        
        
	function testforcorrect($var)
	{
		return (!$var->correct && ($var->type == 'f' || $var->type == 'm' || $var->type == 'c'));
	}
        
	function SuppressAdminOutput(&$request)
   {
      if (strpos($_SERVER['QUERY_STRING'],'exportquiz') !== false)
         {
         return true;
         }
      return false;
   }


	function &getExtras()
	{
		global $gCms;
		$db =& $gCms->GetDb();

		$extras = array();
		$query = 'select * from '.cms_db_prefix().'module_qz_extra_fields order by field_weight';
	    $dbresult = $db->Execute($query);
		while ($dbresult !== false && $row = $dbresult->FetchRow())
	        {
			array_push($extras,$row);
			}
		return $extras;
	}
	
	
	function &getPopulatedExtraFields($id, &$params, $takerid = -1, $makeInputs = false)
	{
		global $gCms;
		$db =& $gCms->GetDb();

		$extras = $this->getExtras();
		$query = 'select * from '.cms_db_prefix().'module_qz_extra_vals where taker_id=? and field_id=?';
		for ($i=0;$i<count($extras);$i++)
			{
			$row = array('value'=>'');
			if ($takerid > 0)
				{
				$result = $db->Execute($query,array($takerid,$extras[$i]['field_id']));
				if ($result)
				 	{
					$row=$result->FetchRow();
					}
				else
					{
					$row = array('value'=>'');
					}
				}
			// params (form-provided values) override stored values
			if (isset($params['qzz_extra_'.$extras[$i]['field_id']]))
				{
				$row = array('value'=>$params['qzz_extra_'.$extras[$i]['field_id']]);
				}
			$extras[$i]['value'] = $row['value'];
			if (substr($extras[$i]['field_type'],0,11) == 'extra_check')
				{
				$extras[$i]['human_value'] = ($row['value'] == '1'?'True':'False');	
				}
			else
				{
				$extras[$i]['human_value'] = $row['value'];	
				}
			if (substr($extras[$i]['field_type'],-2,2) == '_r')
				{
				$extras[$i]['required'] = true;
				}
			else
				{
				$extras[$i]['required'] = false;
				}
			if ($makeInputs)
				{
				$extras[$i]['input'] = $this->makeExtraInput($id,$extras[$i], $row['value']);
				$extras[$i]['label'] = '<label for="'.$extras[$i]['field_id'].'">'.htmlentities($extras[$i]['field_name'],ENT_QUOTES).'</label>';
				}
			}
		return $extras;
	}
	
	function makeExtraInput($id,$extra,$val)
	{
		if ($extra['field_type'] != 'extra_check' && $extra['field_type'] != 'extra_check_r')
			{
			return $this->CreateInputText($id, 'qzz_extra_'.$extra['field_id'], $val, $extra['field_display_len'], $extra['field_max_len'],
			 	'id="extra_'.$extra['field_id'].'"');
			}
		return $this->CreateInputCheckbox($id, 'qzz_extra_'.$extra['field_id'], 1,
				((isset($val)&&$val == '1')?'1':'0'),
				 	'id="extra_'.$extra['field_id'].'"');
	}
	
	function validateExtra(&$extra,&$params)
		{
		if (!isset($params['qzz_extra_'.$extra['field_id']]) || empty($params['qzz_extra_'.$extra['field_id']]))
			{
			if ($extra['field_type'] == 'extra_check_r')
				{
				return array(false,$this->Lang('valid_required_check',$extra['field_name']));
				}
			else
				{
				return array(false,$this->Lang('valid_required_field',$extra['field_name']));
				}
			}
		if ($extra['field_type'] == 'extra_number_r' && ! is_numeric($params['qzz_extra_'.$extra['field_id']]))
			{
			return array(false,$this->Lang('valid_required_number',$extra['field_name']));
			}
		if ($extra['field_type'] == 'extra_phone_r' && ! preg_match('/^(\d[\s\.-]?)?\(?\d{3}\)?[\s\.-]?\d{3}[\s\.-]?\d{4}$/',
			$params['qzz_extra_'.$extra['field_id']]))
			{
			return array(false,$this->Lang('valid_required_phone', $extra['field_name']));
			}
		return array(true,'');
		}
		
	function importQuiz(&$in_file)
	{
	global $gCms;
	$db =& $gCms->GetDb();

	$quiz_id = $db->GenID(cms_db_prefix().'module_qz_quizzes_seq');

	$quizline = explode("\t",$in_file[0]);
	$query = 'INSERT INTO '. cms_db_prefix().
				'module_qz_quizzes (quiz_id, name, description) VALUES (?,?,?)';

	$dbresult = $db->Execute($query,array($quiz_id,
               	$quizline[0],$quizline[1]));

	for ($i=1;$i<count($in_file);$i++)
		{
		$question_id = $db->GenID(cms_db_prefix().'module_qz_questions_seq');
		$thisq = explode("\t",$in_file[$i]);
		$query = 'INSERT INTO '. cms_db_prefix().
					'module_qz_questions (question_id, quiz_id,  question_type,order_by,is_scored,question) VALUES (?,?,?,?,1,?)';

		if (is_numeric($thisq[0]))
			{
			$num = array_shift($thisq);
			}
		$dbresult = $db->Execute($query,array($question_id,
					$quiz_id,
					array_shift($thisq),
					$i,
					array_shift($thisq)));
		$j = 0;
		while (isset($thisq[$j]) && !strlen($thisq[$j]) == 0)
			{
			$answer_id = $db->GenID(cms_db_prefix().'module_qz_answers_seq');

			$query = 'INSERT INTO '.cms_db_prefix().'module_qz_answers (answer_id, question_id, quiz_id, is_correct, answer) VALUES (?,?,?,?,?)';
			$dbresult = $db->Execute($query,array($answer_id,
				$question_id,
				$quiz_id,
				$thisq[$j],
				isset($thisq[$j+1])?$thisq[$j+1]:''));
			$j += 2;
			}
		}
	}

  function importQuizXML($id,&$params)
  {
	global $gCms;
	$db =& $gCms->GetDb();

  	// xml_parser_create, xml_parse_into_struct
  	$parser = xml_parser_create('');
   xml_parser_set_option( $parser, XML_OPTION_CASE_FOLDING, 0 );
   xml_parser_set_option( $parser, XML_OPTION_SKIP_WHITE, 0 ); // was 1
	xml_parse_into_struct($parser,
		file_get_contents($_FILES[$id.'textfile']['tmp_name']),
		$vals);
	xml_parser_free($parser);
	$elements = array();
	$stack = array();
	foreach ( $vals as $tag )
		{
		$index = count( $elements );
		if ( $tag['type'] == "complete" || $tag['type'] == "open" )
			{
			$elements[$index] = array();
			$elements[$index]['name'] = $tag['tag'];
			$elements[$index]['attributes'] = empty($tag['attributes']) ? "" : $tag['attributes'];
			$elements[$index]['content']    = empty($tag['value']) ? "" : $tag['value'];
			if ( $tag['type'] == "open" )
				{    # push
				$elements[$index]['children'] = array();
				$stack[count($stack)] = &$elements;
				$elements = &$elements[$index]['children'];
				}
        }
		if ( $tag['type'] == "close" )
			{    # pop
			$elements = &$stack[count($stack) - 1];
			unset($stack[count($stack) - 1]);
			}
		}
	if (!isset($elements[0]) || !isset($elements[0]) || !isset($elements[0]))
		{
		//parsing failed, or invalid file.
		return false;
		}
	$name = "";
	$desc = "";
	$quiz = $elements[0]['children'];
	for ($i=0;$i<count($quiz);$i++)
		{
		if ($quiz[$i]['name'] == 'name')
			{
			$name = $quiz[$i]['content'];
			}
		if ($quiz[$i]['name'] == 'description')
			{
			$desc = $quiz[$i]['content'];
			}
		if ($quiz[$i]['name'] == 'questions')
			{	
			$questions = $quiz[$i]['children'];
			}
		}
	
	$quiz_id = $db->GenID(cms_db_prefix().'module_qz_quizzes_seq');

	$query = 'INSERT INTO '. cms_db_prefix().
				'module_qz_quizzes (quiz_id, name, description) VALUES (?,?,?)';

	$dbresult = $db->Execute($query,array($quiz_id,
               	$name,$desc));
	$qquery = 'INSERT INTO '. cms_db_prefix().
					'module_qz_questions (question_id, quiz_id,  question_type,order_by,is_scored,question) VALUES (?,?,?,?,?,?)';
	$aquery = 'INSERT INTO '.cms_db_prefix().'module_qz_answers (answer_id, question_id, quiz_id, is_correct, answer) VALUES (?,?,?,?,?)';

	$count = 0;

	foreach ($questions as $thisChild)
		{
		$attrs = $thisChild['attributes'];
		$question_id = $db->GenID(cms_db_prefix().'module_qz_questions_seq');
		if ($attrs['type'] == 's' || $attrs['type'] == 't' ||
			$attrs['type'] == 'b')
			{
			$dbresult = $db->Execute($qquery,
				array($question_id,
               		$quiz_id,
               		$attrs['type'],
               		$count,
               		0,
               		$thisChild['children'][0]['content']));
			}
		else if ($attrs['type'] == 'm' || $attrs['type'] == 'c')
			{
			$dbresult = $db->Execute($qquery,
				array($question_id,
               		$quiz_id,
               		$attrs['type'],
               		$count,
               		$attrs['is_scored'],
               		$thisChild['children'][0]['content']));
			
			$acount = 0;
			foreach ($thisChild['children'][1]['children'] as $thisAnswer)
				{
				$answer_id = $db->GenID(cms_db_prefix().'module_qz_answers_seq');
			
				$dbresult = $db->Execute($aquery,
				array($answer_id,
					$question_id,
               		$quiz_id,
               		$thisAnswer['attributes']['is_correct'],
               		$thisAnswer['content']));

				}
			}
		else if ($attrs['type'] == 'f')
			{
			$dbresult = $db->Execute($qquery,
				array($question_id,
               		$quiz_id,
               		$attrs['type'],
               		$count,
               		$attrs['is_scored'],
               		$thisChild['children'][0]['content']));
			
			$acount = 0;
			foreach ($thisChild['children'][1]['children'] as $thisAnswer)
				{
				$answer_id = $db->GenID(cms_db_prefix().'module_qz_answers_seq');
			
				$dbresult = $db->Execute($aquery,
				array($answer_id,
					$question_id,
               		$quiz_id,
               		1,
               		$thisAnswer['content']));

				}
			}
		$count++;
		}
	return true;	
  }

  function inXML(&$var)
  {
  		if (isset($var) && strlen($var) > 0)
  			{
			return true;
			}
		else
			{
			return false;
			}
  }

	
	function replaceBlanksWithValues($string, $values, $ldelim="",
		$rdelim="", $nerf_values=false)
	{
		$ans_index = 0;
		$offset = 0;
		while (strpos($string,"_",$offset) !== false)
			{
			$us = strpos($string,"_",$offset);
			if ($nerf_values)
				{
				$string = substr($string,0,$us) . $ldelim .
					htmlentities($values[$ans_index]) . $rdelim .
					substr($string,$us+1);
				
				$offset = $us +
					strlen(htmlentities($values[$ans_index])) +
					strlen($ldelim) +
					strlen($rdelim);
				}
			else
				{
				$string = substr($string,0,$us) . $ldelim .
					(isset($values[$ans_index])?$values[$ans_index]:'').
					$rdelim . substr($string,$us+1);
				
				$offset = $us +
					strlen((isset($values[$ans_index])?$values[$ans_index]:'')) +
					strlen($ldelim) +
					strlen($rdelim);
				}
			$ans_index++;
			}
		return $string;
	}

/*
   The following two methods come straight from the user-submitted comments at
   http://www.php.net/html_entity_decode
   to remedy the problems with PHP 4.x and html_entity_decode and UTF-8
   if this usage is not compliant with the (unspecified) licenses desired
   by the comment submitters, these two methods should be considered a bug
   and replaced.
*/

function html_entity_decode_utf8($string)
{
    static $trans_tbl;
   
    // replace numeric entities
    $string = preg_replace('~&#x([0-9a-f]+);~ei', 'code2utf(hexdec("\\1"))', $string);
    $string = preg_replace('~&#([0-9]+);~e', 'code2utf(\\1)', $string);

    // replace literal entities
    if (!isset($trans_tbl))
    {
        $trans_tbl = array();
       
        foreach (get_html_translation_table(HTML_ENTITIES) as $val=>$key)
            $trans_tbl[$key] = utf8_encode($val);
    }
   
    return strtr($string, $trans_tbl);
}

// Returns the utf string corresponding to the unicode value (from php.net, courtesy - romans@void.lv)
function code2utf($num)
 {
    if ($num < 128) return chr($num);
    if ($num < 2048) return chr(($num >> 6) + 192) . chr(($num & 63) + 128);
    if ($num < 65536) return chr(($num >> 12) + 224) . chr((($num >> 6) & 63) + 128) . chr(($num & 63) + 128);
    if ($num < 2097152) return chr(($num >> 18) + 240) . chr((($num >> 12) & 63) + 128) . chr((($num >> 6) & 63) + 128) . chr(($num & 63) + 128);
    return '';
 }

	function setFormSmarty($id, $returnid, &$params, $page_no, $page_count, &$entryarray)
		{
		$this->smarty->assign_by_ref('questions', $entryarray);

		$taker_id = $this->getTakerId($params['quiz_id']);
		
	    if ($page_no >= $page_count)
	    	{
	    	$this->smarty->assign('lastpage',1);
	    	$params['qzz_lastpage'] = 1;
	    	}
	    else
	    	{
	    	$this->smarty->assign('lastpage',0);
	    	$params['qzz_lastpage'] = 0;
	    	}
	
		$remedial = '';
		$remedialkey = $taker_id.$params['quiz_id'];
		$is_remedial = false;
		// we do some trivial encoding of the remedial flag
		if (isset($params['qzz_remedial']) && $params['qzz_remedial']==$remedialkey)
			{
			$remedial = $this->CreateInputHidden($id,
				'qzz_remedial',$remedialkey);
			$is_remedial = true;
			}
		if ($this->GetPreference('show_pagenav', '0') == '1')
			{
			$pn = array();
			$par = array('quiz_id'=>$params['quiz_id']);
			if (isset($params['qzz_remedial']) && $params['qzz_remedial']==$remedialkey)
				{
				$par['qzz_remedial']=$remedialkey;
				}
				
			for ($i=1;$i<=$page_count;$i++)
				{
				if ($i == $page_no)
					{
					array_push($pn,$i);
					}
				else
					{
					array_push($pn,	$this->CreateFrontendLink( $id, $returnid, 'takequiz', $i, array_merge($par,array('qzz_next_page'=>$i))));
					}
				}
			$this->smarty->assign('pagenav',$this->Lang('page').' '.implode(' : ',$pn));
			}
		else
			{
			$this->smarty->assign('pagenav','');
			}
		$this->smarty->assign('remedial',($is_remedial?'1':'0'));
	    $this->smarty->assign('pagecount', $page_count);
	    $this->smarty->assign('pagexofy', $this->Lang('pagexofy',
	    	array($page_no,$page_count)));
		$this->smarty->assign('hidden',
			$this->CreateInputHidden($id,
				'qzz_next_page', $page_no + 1).
			$this->CreateInputHidden($id,
				'quiz_id',$params['quiz_id']) .
			$this->CreateInputHidden($id,
				'qzz_prev_page',$page_no - 1) .
			$this->CreateInputHidden($id,
				'qzz_page',$page_no).
			$remedial
			);
	}

	function setScoreSmarty($scoreboard)
	{
		$this->smarty->assign('score',$scoreboard->score);
		$this->smarty->assign('total_questions',$scoreboard->total_questions);
		$this->smarty->assign('questions_skipped',$scoreboard->skipped);
		$this->smarty->assign('questions_answered',$scoreboard->answered);
		$this->smarty->assign('score_percent',$scoreboard->percent_right);
		$this->smarty->assign('percent_answered',$scoreboard->percent_answered);
		$this->smarty->assign('percent_skipped',$scoreboard->percent_skipped);
		$this->smarty->assign('score_percent_answered',$scoreboard->score_percent_answered);
	}

	/* returns true if there are text inputs
	   loads up all the questions into Smarty.
	 */
	function getQuestionPage($id, &$params, $returnid, $withAnswers=false)
		{
		$has_text = false;
		$questions = $this->getQuestionsInRange($id, $params, $returnid);
		if (isset($params['qzz_remedial']) && $params['qzz_remedial'] == $this->getTakerId($params['quiz_id']).$params['quiz_id'])
			{
			//debug_display("running remedial code");
			$scoreboard = $this->computeScoreValues($id, $params, $returnid, $questions->questions);
			}
		$has_text = $this->makeQuestionsForms($id, $params, $returnid, $withAnswers, $questions->questions);
		$this->setFormSmarty($id, $returnid, $params, $questions->this_page, $questions->page_count, $questions->questions);
		return $has_text;
		}

	function computeScore($id, &$params, $returnid)
		{
		$questions = $this->getQuestionsInRange($id, $params, $returnid, true);
		$scoreboard = $this->computeScoreValues($id, $params, $returnid, $questions->questions);
		$this->setScoreSmarty($scoreboard);
		return array($scoreboard->percent_right,$questions);
		}

}
?>
