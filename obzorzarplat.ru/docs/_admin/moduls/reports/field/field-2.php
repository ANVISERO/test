<script type='text/javascript'>
<!--
function $(e)
{
if (typeof e == "object") return e;
if (document.getElementById) return (document.getElementById(e));
else if (document.all) return document.all(e);
else if (typeof (seekLayer) == "function") return seekLayer(document, e);
return null;
}

function hide(e) {if ($(e)) $(e).style.display = "none";}

function show(e, val, force) {if(!val)val="";if(($(e)&&$(e).style.display=="none")||force)$(e).style.display=val;}

function toggle(o) {var o=$(o); if(o) {if(o.style.display === 'none') show(o); else hide(o);} return false;}

function getParent(e) {return ((e.parentElement)?e.parentElement:((e.parentNode)?e.parentNode:null));}



function check_block(id, chek_block_id){
var checked_block = $(chek_block_id).checked; // ����� �� ������� � ��������� �����
if(checkedCount > 29 && checked_block) //�������� �� ������� �������� ���������, ����� ������� ����� �� ���������
{
checkedCount++;
return;
}
var main_div = document.getElementById(id); // ����� ������� div
var div_array = main_div.getElementsByTagName("div"); // ���������� �������� div�
var inputs = main_div.getElementsByTagName("input"); // ������ ���� ��������� ��� ������� div��

// ������� ������� div
main_div.style.display = "block";

// ������� �c�� ��� �����������
for (var i = 0; i < div_array.length; i++)
{
div_array[i].style.display = "block";
}

// ������ ������� ��� �������, � ����������� � ��������
for (var i = 0; i < inputs.length; i++)
{
if (inputs[i].type.toLowerCase() == "checkbox")
{
if(checked_block != 1)
{
if(inputs[i].name != "dont_for_findCheckedItems" && inputs[i].checked == 1) checkedCount--;
inputs[i].checked = 0;
}
else
{
if(checkedCount > 29) break; // �������� ��������
if(inputs[i].name != "dont_for_findCheckedItems" && inputs[i].checked != 1) checkedCount++;
inputs[i].checked = 1;
}
}
}
}


function o(id, force_open){
if($(id).style.display=="none" || force_open)
{
show(id, "block", force_open);

}
else
{
hide(id);

}
}


var treeHTML = "";
var checkedCount = 0;
aChecked = new Array();
aBlocks = new Array();


function findCheckedItems()
{
aChecked.length = 0;

for (var j=0;j< Blocks.length;j++)
{
if (!$(Blocks[j]))
continue;

aBlocks[Blocks[j]] = 0;

var inputs = $(Blocks[j]).getElementsByTagName("input");

for (var i = 0; i < inputs.length; i++)
{
if (inputs[i].type.toLowerCase() == "checkbox")
{
if (inputs[i].checked && inputs[i].id != "")
{
if(!in_array(inputs[i].id,aChecked,0))
{
// �������� �� ���� ������, ��� ��� �� ������� ��������� �����
if(inputs[i].name != "dont_for_findCheckedItems")
{
aChecked.push(inputs[i].id); // ������ � ����������� ����������
}
}

// �������� ��� ����:
if (aBlocks[Blocks[j]] != 1)
aBlocks[Blocks[j]] = 1;
}
}
}
}

return false;
}

function checkTree(event)
{
event = event || window.event;
var clickedElem = event.target || event.srcElement;
if (clickedElem.tagName == "INPUT" && clickedElem.name != "dont_for_findCheckedItems")
{
if(clickedElem.checked)
checkedCount++;
else
checkedCount--;
}
if (checkedCount > 30)
{
alert("����������, �������� �� ����� 30 ����������!");
checkedCount--;
return false;
}
else
{
return true;
}
}

function openChecks()
{
// ��������� �������
for(blockId in aBlocks)
{
if (aBlocks[blockId] == 1)
o(blockId, true);
}
// ������ checked
for (var j=0;j< Blocks.length;j++)
{
if (!$(Blocks[j]))
continue;
var inputs = $(Blocks[j]).getElementsByTagName("input");

for (var i = 0; i < inputs.length; i++)
{
for (k in aChecked)
{
if (inputs[i].id == aChecked[k]) // ��������
{
if (inputs[i].checked == false)
inputs[i].checked = true;
break;
}
}
}
}

 return false;
}

//-->
</script>



<style>
 .rshift { position:relative; left:35px; }
</style>

<?php

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

$city_id=intval($_POST['city']);
$factor=$_POST['factor'];
$factor_prefix=$_POST['factor_prefix'];
$user_id=mysqli_result(mysqli_query($link,"SELECT id from for_users_corporat where id = ".$_SESSION['user_id']. " AND password = '".$_SESSION['psw']."' "),0,0);
$blocked=mysqli_num_rows(mysqli_query($link,"select * from for_users_corporat_jobs where user_id='".$user_id."'"));

if(isset($_POST['factor_id'])){$factor_id=$_POST['factor_id'];}

if($city_id==0){
  $city_q="";
  $city_name="��� ������";
} else {
  $city_q="AND city_id='$city_id'";
  $city_name=mysqli_result(mysqli_query($link,"select name from base_regions where id='$city_id'"),0,0);
}

//���������� ��� ������������� �����
if($blocked!==0){
    $q_factor_block="AND job_id IN(SELECT job_id FROM for_users_corporat_jobs where user_id='$user_id')";
    $q_factor_job_block="AND id IN(SELECT job_id FROM for_users_corporat_jobs where user_id='$user_id')";
}
else{
    $q_factor_block="";
    $q_factor_job_block="";
}

//
switch($factor){
case "sp":
  if(!isset($_POST['factor_id'])){$factor_id=intval($_POST['sphere']);}
  
  $factor_name="����� ������������ ��������:";
  $factor_value_name=mysqli_result(mysqli_query($link,"SELECT name FROM base_sphere where id='$factor_id'"),0,0);

  if($city_id==0){
    $q_factor="WHERE id IN (SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM base_company_jobs bcj
                      inner JOIN `base_company_sphere` bcs ON bcj.company_id = bcs.company_id
                      WHERE  bcs.sphere_id ='$factor_id') $q_factor_block)";
    $q_factor_job="AND id IN (SELECT job_id FROM base_company_jobs bcj
                      inner JOIN `base_company_sphere` bcs ON bcj.company_id = bcs.company_id
                      WHERE  bcs.sphere_id ='$factor_id') $q_factor_job_block";
  }else{
    $q_factor="WHERE id IN (SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM base_company_jobs bcj
                      inner JOIN `base_company_sphere` bcs ON bcj.company_id = bcs.company_id
                      WHERE  bcs.sphere_id ='$factor_id'
                      AND bcj.city_id='$city_id') $q_factor_block)";
    $q_factor_job="AND id IN (SELECT job_id FROM base_company_jobs bcj
                      inner JOIN `base_company_sphere` bcs ON bcj.company_id = bcs.company_id
                      WHERE  bcs.sphere_id ='$factor_id'
                      AND bcj.city_id='$city_id') $q_factor_job_block";

  }
  break;

case "s":
  if(!isset($_POST['factor_id'])){$factor_id=intval($_POST['staff']);}

  $factor_name="���� ��������:";
  $factor_value_name=mysqli_result(mysqli_query($link,"select title from base_personal where id='$factor_id'"),0,0);

  if($city_id==0){
    $q_factor="WHERE id IN (SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.personal_id ='$factor_id') $q_factor_block)";
    $q_factor_job="AND id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.personal_id ='$factor_id') $q_factor_job_block";
  }else{
    $q_factor="WHERE id IN (SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.personal_id ='$factor_id'
                      AND bc.region_id='$city_id') $q_factor_block)";
    $q_factor_job="AND id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.personal_id ='$factor_id'
                      AND bc.region_id='$city_id') $q_factor_job_block";
  }
  break;

case "t":
  if(!isset($_POST['factor_id'])){$factor_id=intval($_POST['turnover']);}

  $factor_name="������ �������� (���. ���. � ���):";
  $factor_value_name=mysqli_result(mysqli_query($link,"SELECT title FROM base_turnover where id='$factor_id'"),0,0);

  if($city_id==0){
    $q_factor="WHERE id IN (SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.turnover_id ='$factor_id') $q_factor_block)";
    $q_factor_job="AND id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.turnover_id ='$factor_id') $q_factor_job_block";
  }else{
    $q_factor="WHERE id IN (SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.turnover_id ='$factor_id'
                      AND bc.region_id='$city_id') $q_factor_block)";
    $q_factor_job="AND id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.turnover_id ='$factor_id'
                      AND bc.region_id='$city_id') $q_factor_job_block";
  }
  break;

case "n":
    $factor_name="������ �� ����� ��������";
    $factor_value_name="";
  if($city_id==0){
    $q_factor="WHERE id IN(SELECT jtype_id FROM base_job_types
                      WHERE 1 $q_factor_block)";
    $q_factor_job=$q_factor_job_block;
  }else{
    $q_factor="WHERE id IN (SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE bc.region_id='$city_id') $q_factor_block)";
    $q_factor_job="AND id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE bc.region_id='$city_id') $q_factor_job_block";
  }
  break;
}

//$q_jtype=mysqli_query($link,"SELECT * from base_jtype ".$q_factor." order by name");

$q_jtype=mysqli_query($link,"SELECT * from base_jtype order by name");
?>

<p><span class="title_mini_others">1. <a href="#" onclick="return document.back.submit();">����� �������� &raquo;</a></span><span class="title_mini"> 2. ����� ���������� &raquo;</span><span class="title_mini_others"> 3. ����� &raquo;</span></p>
<br>
<p>�����: <em><?php echo($city_name);?></em></p>
<p><?php echo($factor_name.' <em>'.$factor_value_name).'</em>';?></p>

<form method='post' action="?step=3" name="step2" onSubmit="return testform();">
<input type="hidden" name="factor" value="<?php echo($factor);?>">
<input type="hidden" name="factor_id" value="<?php echo($factor_id);?>">
<input type="hidden" name="city" value="<?php echo($city_id);?>">
<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:0;">

<tr>
<td>

<div id="our_tree" onclick="return checkTree(arguments[0]);">

<?php

while($out_jtype = mysqli_fetch_array($q_jtype))
{
$jtype_id=$out_jtype["id"];
echo('
<div class="T0">
<input type="checkbox" name="dont_for_findCheckedItems" id="'.$jtype_id.'" onclick=\'javascript:check_block("N'.$jtype_id.'", "'.$jtype_id.'")\'>
<a href=\'javascript:o("N'.$jtype_id.'")\' class="link_4">'.$out_jtype["name"].'</a><br>
</div>
');

echo('
<div class="rshift" id="N'.$jtype_id.'" style="display:none">
<div>
');


$q_jobs=mysqli_query($link,"select * from base_jobs where id in(select job_id from base_job_types where jtype_id='$jtype_id') ".$q_factor_job." order by name");

while($out_jobs = mysqli_fetch_array($q_jobs)){
$job_id=$out_jobs["id"];

echo('<input type="checkbox" name="job['.$job_id.']" id="'.$job_id.'" value="'.$job_id.'">'.$out_jobs["name"].'<br>');

}

echo ('</div></div>');
}
?>

</div>
</td>
</tr>

</table>
</form>
<table width="100%" border="0">
  <tr>
    <td align="left" valign="top">
	<form name="back" action="?step=1" method="post">
	<input type="hidden" name="factor" value="<?php echo($factor);?>">
	<input type="hidden" name="city" value="<?php echo($city_id);?>">
        <input type="submit" value="&laquo; �����" class="but1">
	</form>
</td>
    <td align="right" valign="top"><input type="button" value="������ &raquo;" class="but1" onClick="return document.step2.submit();"></td>
  </tr>
</table>



<script language="JavaScript">
<!--
hideBlocks();
findCheckedItems();
checkedCount = aChecked.length;
//-->
</script>