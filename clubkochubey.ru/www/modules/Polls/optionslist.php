<?php

$totalvote=$this->GetTotalVotes($params["pollid"]);
?>
<table cellspacing="0" class="pagetable">
<thead>
<tr>
<th class="pagepos"><?php echo $this->Lang("optionname");?></th>
<th class="pagepos"><?php echo $this->Lang("votes");?></th>
<th class="pagepos"><?php echo $this->Lang("votepercent");?></th>
<th class='pageicon'><?php echo $this->Lang("delete");?></th>
</tr>
</thead>
<tbody>

<?php
//tr row1/2
$db=$this->GetDb();
$q="SELECT * FROM ".cms_db_prefix()."module_polloptions WHERE pollid=?";
$p=array($params["pollid"]);
$result=$db->Execute($q,$p);

if ($result && $result->RecordCount()>0) {
	$rowclass="row1";
	while ($row=$result->FetchRow()) {
		$percent=0;
		if ($row["count"]>0) $percent= round(($row["count"]*100)/$totalvote);
		echo "<tr class='$rowclass'>";
		echo "<td class='pagepos'>".$row["name"]."</td>";
		echo "<td class='pagepos'>".$row["count"]."</td>";
		echo "<td class='pagepos'>".$percent."%</td>";
		echo "<td class='pagepos'>";
	  $text="<img src='themes/default/images/icons/system/delete.gif' alt='Delete poll' class='systemicon'>";
    echo $this->CreateLink($id, "deleteoption",$returnid, $text, array("optionid"=>$row["id"],"pollid"=>$params["pollid"]),$this->Lang("confirmdeleteoption"));
		echo "</td>";

		echo "</td></tr>";
		if ($rowclass=="row1") $rowclass="row2"; else $rowclass="row1";

	}
} else {

}
?>

</tbody>
</table>
<?php
echo $this->CreateFormStart($id,"addoption",$returnid);
echo $this->CreateInputHidden($id,"pollid",$params["pollid"]);
echo $this->CreateInputSubmit($id,"addoption",$this->Lang("addoption"));
echo $this->CreateFormEnd();

echo "<br/>";
echo "<br/>";
echo $this->CreateFormStart($id,"resetpoll",$returnid);
echo $this->CreateInputHidden($id,"pollid",$params["pollid"]);
echo $this->CreateInputSubmit($id,"resetpoll",$this->Lang("resetpoll"),"","",$this->Lang("confirmresetpoll"));
echo $this->CreateFormEnd();

echo "<br/>";
echo "<br/>";
echo $this->CreateFormStart($id,"defaultadmin",$returnid);
echo $this->CreateInputSubmit($id,"return",$this->Lang("return"));
echo $this->CreateFormEnd();

?>