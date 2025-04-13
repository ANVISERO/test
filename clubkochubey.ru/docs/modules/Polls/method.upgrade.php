<?php
$current_version = $oldversion;
    /*switch ($current_version) {
      case "0.1.5":
		    $dict = NewDataDictionary($db);
		    $sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_polls", "poll_id varchar(30)");
		    $dict->ExecuteSQLArray($sqlarray);      
    }*/
		// put mention into the admin log

$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('upgraded',$this->GetVersion()));
?>