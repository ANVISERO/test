<?php
		// create a permission
		$this->CreatePermission('administratepolls', $this->Lang('permission'));

		$db = &$this->GetDb();
		$dict = NewDataDictionary($db);
		$taboptarray = array('mysql' => 'TYPE=MyISAM');

		//List of polls
		$flds = "
			id I KEY,
			name C(128),
			closed I,
			createtime I,
			closetime I,
      poll_id varchar(30)
		";

		$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_polls", $flds, $taboptarray );
		$dict->ExecuteSQLArray( $sqlarray );
		$db->CreateSequence( cms_db_prefix()."module_polls_seq" );

		//Poll options attached to a poll
		$flds = "
			id I KEY,
			pollid I,
			name C(40),
			count I
		";
		$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_polloptions", $flds, $taboptarray);
		$dict->ExecuteSQLArray($sqlarray);
		$db->CreateSequence(cms_db_prefix()."module_polloptions_seq");


		/*//Poll results attached to a poll and an option
		$flds = "
		pollid I,
		optionid I,
		count I
		";
		$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_pollresults", $flds, $taboptarray);
		$dict->ExecuteSQLArray($sqlarray);
		*/

		//List of people blocked from voting again
		$flds = "
			sessionid C(32),
			votetime I,
			pollid I
		";
		$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_pollblocked", $flds, $taboptarray);
		$dict->ExecuteSQLArray($sqlarray);

		// create a preference
		$this->SetPreference("showwhatpoll", "activepoll");

		$this->SetPreference("activepoll", -1);
		$this->SetPreference("showpeekbutton", 1);

		$this->SetPreference("polltemplate", $this->GetTemplateFromFile("defaultpoll"));
		$this->SetPreference("resulttemplate", $this->GetTemplateFromFile("defaultresult"));
		$this->SetPreference("polllisttemplate", $this->GetTemplateFromFile("defaultpolllist"));
		/*$this->SetPreference("password", "");
		$this->SetPreference("rootpath", "");
		$this->SetPreference("passivemode", "true");*/

		// register an event that the Skeleton will issue. Other modules
		// or user tags will be able to subscribe to this event, and trigger
		// other actions when it gets called.
		//		$this->CreateEvent( 'OnSkeletonPreferenceChange' );

		// put mention into the admin log
		$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('installed',$this->GetVersion()));
?>