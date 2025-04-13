<?php

?>
<table cellspacing="0" class="pagetable">
<thead>
<tr>
<th class="pagepos">Poll ID</th>
<th class="pagepos"><?php echo $this->Lang("pollname");?></th>
<th class="pagepos"><?php echo $this->Lang("pollstatus");?></th>
<th class='pageicon'><?php echo $this->Lang("activepoll");?></th>
<th class='pageicon'><?php echo $this->Lang("edit");?></th>
<th class='pageicon'><?php echo $this->Lang("delete");?></th>
<th class="pagepos"><?php echo $this->Lang("pollstartdate");?></th>
<th class="pagepos"><?php echo $this->Lang("pollclosedate");?></th>
<th class="pagepos"><?php echo $this->Lang("pollinfo");?></th>
</tr>
</thead>
<tbody>

<?php
//tr row1/2
$db=$this->GetDb();
$q="SELECT * FROM ".cms_db_prefix()."module_polls";
$result=$db->Execute($q);
if ($result && $result->RecordCount()>0) {
	$rowclass="row1";
	while ($row=$result->FetchRow()) {
		echo "<tr class='$rowclass'>";
		echo "<td class='pagepos'>".$row["poll_id"]."</td>";
		echo "<td class='pagepos'>";
		echo $this->CreateLink($id, "editpoll",$returnid, $row["name"], array("pollid"=>$row["id"]));
		echo "</td>";

		$status="";
		if ($row["closed"]==0) {
			if ($row["id"]==$activepoll) {
				$status=$this->Lang("open");
			} else {
				$text="<img src='themes/default/images/icons/system/false.gif' class='systemicon' alt='Close poll'>";
				$status=$this->Lang("open")."&nbsp;".$this->CreateLink($id, "closepoll",$returnid, $text, array("pollid"=>$row["id"]), $this->lang("confirmclosepoll"));
			}
		} else {
			$status=$this->Lang("closed");
		}
		echo "<td class='pagepos'>".$status."</td>";

		echo "<td class='pagepos'>";
		if ($row["closed"]==0) {
		if ($row["id"]==$activepoll) {
			echo "<img src='themes/default/images/icons/system/true.gif' alt='Active poll' class='systemicon'>";
		} else {
			$text="<img src='themes/default/images/icons/system/false.gif' alt='Close poll' class='systemicon'>";
			echo $this->CreateLink($id, "activatepoll",$returnid, $text, array("pollid"=>$row["id"]));
		}
		} else {
			echo "&nbsp;";
		}
		echo "</td>";

		echo "<td class='pagepos'>";
		$text="<img src='themes/default/images/icons/system/edit.gif' alt='Close poll' class='systemicon'>";
	  echo $this->CreateLink($id, "editpoll",$returnid, $text, array("pollid"=>$row["id"]));
		echo "</td>";


		echo "<td class='pagepos'>";
		if ($row["id"]==$activepoll) {
			echo "&nbsp;";
		} else {
		  $text="<img src='themes/default/images/icons/system/delete.gif' alt='Delete poll' class='systemicon'>";
	    echo $this->CreateLink($id, "deletepoll",$returnid, $text, array("pollid"=>$row["id"]),$this->Lang("confirmdeletepoll"));
		}

		echo "</td>";

		echo "<td class='pagepos'>".date("d/m/Y",$row["createtime"])."</td>";

		echo "<td class='pagepos'>".($row["closed"]==1?date("d/m/Y",$row["closetime"]):"&nbsp;")."</td>";

		echo "<td class='pagepos'>";
		if ($row["closed"]) {
			echo $this->Lang("pollranfor")." ";
			echo ceil((($row["closetime"]-$row["createtime"]) / (3600*24)));
			echo " ".$this->Lang("days");
		} else {
			echo $this->Lang("pollhasbeenrunningfor")." ";
			echo ceil(((time()-$row["createtime"]) / (3600*24)));
			echo " ".$this->Lang("days");
		}
		echo "</td></tr>";
		if ($rowclass=="row1") $rowclass="row2"; else $rowclass="row1";

	}
} else {

}
?>

</tbody>
</table>
<?php

echo $this->CreateFormStart($id,"addpoll",$returnid);
echo $this->CreateInputSubmit($id,"addpoll",$this->Lang("addpoll"));
echo $this->CreateFormEnd();

?>