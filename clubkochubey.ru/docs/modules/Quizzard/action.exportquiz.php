<?php
if (!isset($gCms)) exit;
if (! $this->CheckPermission('Administer Quizzes'))
	{
	return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
	}

	$query = "SELECT * FROM ".cms_db_prefix().
		"module_qz_quizzes WHERE quiz_id=?";
	$dbresult = $db->Execute($query,array($params['quiz_id']));
	if ($dbresult !== false && $row = $dbresult->FetchRow())
		{
		$name = $row['name'];
		$desc = $row['description'];
		}

    $spec = preg_replace("/\W/","_",$name);

	 $entryarray = $this->getEntireQuiz($id, $params, $returnid);

if (isset($params['xml']))
	{
	$spec .= ".xml";
	$contenttype = "text/xml; charset=utf-8";
	$reportString = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	$reportString .= "<quiz>\n";
	$reportString .= "<name><![CDATA[".$name."]]></name>\n";
	$reportString .= "<description><![CDATA[".$desc."]]></description>\n";
	$reportString .= "<questions>\n";
	$containingSection = 0;
	foreach(array_keys($entryarray->questions) as $i)
	 	{
		if ($entryarray->questions[$i]->type=='s')
			{
			$containingSection = $entryarray->questions[$i]->question;
			}
	 	$reportString .= "\t<question type=\"".
	 		$entryarray->questions[$i]->type."\"";
		$reportString .= " num=\"".$entryarray->questions[$i]->num."\"";
		$reportString .= " is_scored=\"".
					($entryarray->questions[$i]->is_scored?"1":"0") .
					"\">\n";
	 	$reportString .= "\t\t<question_text><![CDATA[".
	 		$entryarray->questions[$i]->question.
	 		"]]></question_text>\n";
	 	if (count($entryarray->questions[$i]->rawanswers) > 0)
			{
			$reportString .= "\t\t<answers>\n";
			foreach ($entryarray->questions[$i]->rawanswers as $key=>$val)
				{
				$reportString .= "\t\t\t<answer";
				if ($entryarray->questions[$i]->type == 'm')
					{
					if ($entryarray->questions[$i]->correctanswers[0] == $key)
						{
						$reportString .= " is_correct=\"1\"";
						}
					else
						{
						$reportString .= " is_correct=\"0\"";

						}
					}
				else if ($entryarray->questions[$i]->type == 'c')
					{
					if ($entryarray->questions[$i]->correctanswers[$key] == '1')
						{
						$reportString .= " is_correct=\"1\"";

						}
					else
						{
						$reportString .= " is_correct=\"0\"";

						}
					}
				$reportString .= "><![CDATA[".$val.
					"]]></answer>\n";
				}
			$reportString .= "\t\t</answers>\n";
			}
		$reportString .= "\t</question>\n";
	 	}
	$reportString .= "</questions>\n";
	$reportString .= "</quiz>";
	}
else
	{
	$spec .= ".txt";
	$contenttype = "application/force-download; charset=utf-8";
	 $reportString = "$name\t$desc\n";

	 $count = 1;
	 foreach(array_keys($entryarray->questions) as $i)
	 	{
	 	//debug_display($entryarray[$i]);
	 	if ($entryarray->questions[$i]->type == 'm' ||
	 		$entryarray->questions[$i]->type == 'f' ||
			$entryarray->questions[$i]->type == 'c')
	 		{
	 		$reportString .= $count."\t";
	 		$count++;
	 		}
		$reportString .= $entryarray->questions[$i]->type;
		$reportString .= "\t".$entryarray->questions[$i]->question;
		foreach ($entryarray->questions[$i]->rawanswers as $key=>$val)
			{
			$reportString .= "\t";
			if ($entryarray->questions[$i]->type == 'm')
				{
				if ($entryarray->questions[$i]->correctanswers[0] == $key)
					{
					$reportString .= "1";
					}
				else
					{
					$reportString .= "0";
					}
				}
			else if ($entryarray->questions[$i]->type == 'c')
				{
				if ($entryarray->questions[$i]->correctanswers[$key] == '1')
					{
					$reportString .= "1";
					}
				else
					{
					$reportString .= "0";
					}
				}
			else if ($entryarray->questions[$i]->type == 'f')
				{
				$reportString .= "1";
				}
			$reportString .= "\t".$val;
			}
		$reportString .= "\n";
		}
	}
    @ob_clean();
    @ob_clean();
    header('Pragma: public');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Cache-Control: private',false);
    header('Content-Description: File Transfer');
    header('Content-Type: '.$contenttype);
    header('Content-Length: ' . strlen($reportString));
    header('Content-Disposition: attachment; filename=' . $spec);
    echo $reportString;
    exit;
?>