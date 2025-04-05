<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

$jtype_id=intval($_POST['jtype']);
$job_id=intval($_POST['job']);
$city_id=intval($_POST['city']);
if(isset($_POST['sphere'])){$sphere_id=intval($_POST['sphere']);}else{$sphere_id=0;}
if(isset($_POST['staff'])){$staff_id=intval($_POST['staff']);}else{$staff_id=0;}

$job_name=mysqli_result(mysqli_query($link,"select name from base_jobs where id='$job_id'"),0,0);
$jtype_name=mysqli_result(mysqli_query($link,"select name from base_jtype where id='$jtype_id'"),0,0);

if($city_id==0)
{
    $city_name="(����� �� ����� ��������)";
    $q_companies=mysqli_query($link,'SELECT company_id
        FROM base_company_jobs
        WHERE job_id = "'.$job_id.'"');
}else{
    $city_name="� ".mysqli_result(mysqli_query($link,"select name_partitive from base_regions where id='$city_id'"),0,0);
    $q_companies=mysqli_query($link,'SELECT company_id
        FROM base_company_jobs
        WHERE city_id = "'.$city_id.'"
        AND job_id = "'.$job_id.'"');
}

while($row=mysqli_fetch_array($q_companies)){
    $companies[]=$row["company_id"];
}
$companies_string=implode(',',$companies);

$q_sphere=mysqli_query($link,"SELECT * from base_sphere
where id in(select sphere_id from base_company_sphere
where company_id in(".$companies_string.")) order by name");

?>

<script type="text/javascript" src="/_js/lists.js"></script>

<p><span class="title_mini_others">1. <a href="#" onclick="return back();">����� ���������</a> &raquo;</span><span class="title_mini">2. �������������� �������� &raquo;</span><span class="title_mini_others"> 3. ����� &raquo;</span></p>

 <center> <h2><?php echo($job_name.' '.$city_name);?></h2></center><br>

<form method='post' action="" name="step3" onSubmit="return testform();">
<input type="hidden" name="job" value="<?php echo($job_id);?>">
<input type="hidden" name="jtype" value="<?php echo($jtype_id);?>">
<input type="hidden" name="city" value="<?php echo($city_id);?>">

<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
<!--����������� ������, ��������� -->

<tr>
  <td height="40" colspan="2" align="left" valign="top"><em>����������, ��������� ��������������� ��� ����.</em></td>
  </tr>

<!--����� ������������ �������� -->
<tr>
<td width="35%" align="right">����� ������������ ��������</td>
<td>
  <select name='sphere' class="text_1" onchange='getStaff(<?php echo($job_id);?>,<?php echo($city_id);?>,this.value)'>
   <option value="">--- ������� ---</option>
<?php
$ch="";

if(isset($_POST['sphere']) and $_POST['sphere']==0){echo('<option value="0" selected>�� ����� ��������</option>');}
else{echo('<option value="0">�� ����� ��������</option>');}

while($out_sphere = mysqli_fetch_array($q_sphere))
{
if((isset($_POST['sphere'])) and ($_POST['sphere']==$out_sphere['id'])){$ch="selected";}
echo('<option value="'.$out_sphere['id'].'" '.$ch.'>'.$out_sphere['name'].'</option>');
$ch="";
}
?>
</select>
</td>
</tr>

<!--���������� ����������� � �������� -->
<tr>
<td align="right">���������� ����������� � ��������</td>
<td>
<div id='staffdiv'>
      <select name='staff' class="text_1" onChange='getTurnover(<?php echo($job_id.','.$city_id.','.$sphere_id);?>,this.value)'>
        <option value="">--- ������� ---</option>
         <?php
       if(isset($_POST['sphere'])){
        if($city_id==0){
          $city_q="";
        } else {
          $city_q="AND city_id='$city_id'";
        }

      if($sphere_id==0){
        $sphere_q="";
      } else {
        $sphere_q="AND id in(select company_id from base_company_sphere where sphere_id='$sphere_id')";
      }

      $q_staff=mysqli_query($link,"SELECT * from base_personal
      where id in(select personal_id from base_companies
      where id in(select company_id from base_company_jobs where job_id='$job_id' ".$city_q.") ".$sphere_q.") order by id");

      $ch="";

      if(isset($_POST["staff"]) and $_POST["staff"]==0){
        echo('<option value="0" selected>�� ����� ��������</option>');
      } else {
        echo('<option value="0">�� ����� ��������</option>');
      }

      while($row=mysqli_fetch_array($q_staff)){
        if(isset($_POST["staff"]) and $_POST["staff"]==$row["id"]){$ch="selected";}
        echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["title"].'</option>');
      }
      $ch="";
      }
      ?>
      </select>
</div>
<div id="loading_staff" style="display:none">
     <img src="/_img/loader.gif" width="16" height="16" align="absmiddle">&nbsp;��������...
</div>
</td>
</tr>

<!--�������������� ������ �������� (���. ���.) -->
<tr>
<td align="right">������� ������� ������ �������� (���. ���.)</td>
<td>
<div id='turnoverdiv'>
      <select name='turnover' class="text_1">
        <option value="">--- ������� ---</option>
<?php

        if(isset($_POST['turnover'])){
          if($city_id==0)
{
$q_companies=mysqli_query($link,'SELECT company_id
FROM base_company_jobs
WHERE job_id = "'.$job_id.'"');
}else{
$q_companies=mysqli_query($link,'SELECT company_id
FROM base_company_jobs
WHERE city_id = "'.$city_id.'"
AND job_id = "'.$job_id.'"');
}

while($row=mysqli_fetch_array($q_companies)){
    $companies[]=$row["company_id"];
}
$companies_string=implode(',',$companies);

if($staff_id==0){
  $staff_q="";
}else{
  $staff_q=" AND personal_id='$staff_id'";
}

if($sphere_id==0){
  $sphere_q="";
}else{
  $sphere_q=" AND id in(select company_id from base_company_sphere where sphere_id='$sphere_id')";
}

$q_turnover=mysqli_query($link,"SELECT * from base_turnover where id in(select turnover_id from base_companies where id in
                        (".$companies_string.")".$sphere_q.$staff_q.")");

 $ch="";

      if(isset($_POST["turnover"]) and $_POST["turnover"]==0){
        echo('<option value="0" selected>�� ����� ��������</option>');
      } else {
        echo('<option value="0">�� ����� ��������</option>');
      }

    while($row=mysqli_fetch_array($q_turnover))
    {
        if(isset($_POST["turnover"]) and $row["id"]==$_POST["turnover"]){$ch="selected";}
        echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["title"].'</option>');
    }
$ch="";
        }

        ?>
      </select>
</div>
<div id="loading_turnover" style="display:none">
     <img src="/_img/loader.gif" width="16" height="16" align="absmiddle">&nbsp;��������...
</div>
</td>
</tr>

</table>
</form>
<table width="100%">
<tr>
<td align="left">
    <input type="button" onClick="return back();" value="&laquo; �����" class="but1">
</td>
<td align="right"><input type='button' onClick="return testform();" class='but1' value="������ &raquo;"></td>
</tr>
</table>
 
<script type="text/javascript">
function testform()
{
text="";
if(document.step3.sphere.value==""){text=text+'����� ������������ ��������;\n';}
if(document.step3.staff.value==""){text=text+'���������� ����������� � ��������;\n';}
if(document.step3.turnover.value==""){text=text+'�������������� ������ ��������;\n';}
if(text!=""){window.alert('�� �� �������:\n'+text);return false;
} else {
document.step3.action="?step=4";
document.step3.submit();}
}

function back()
{
document.step3.action="?step=1";
document.step3.submit();
}
</script>