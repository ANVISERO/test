<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

//���������, ���� �� ����������� �� ����������
$user_id=mysqli_result(mysqli_query($link,"SELECT id from for_users_corporat where id = ".$_SESSION['user_id']. " AND password = '".$_SESSION['psw']."' "),0,0);
$blocked=mysqli_num_rows(mysqli_query($link,"select * from for_users_corporat_jobs where user_id=".$user_id));

if($blocked!==0){
    $q_jtype_block="WHERE id IN(SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM for_users_corporat_jobs where user_id='$user_id'))";
    $q_job_block="AND id IN(SELECT job_id FROM for_users_corporat_jobs where user_id='$user_id')";
}
else{
    $q_jtype_block="";
    $q_job_block="";
}

if(isset($_POST['jtype'])){$jtype_id=intval($_POST['jtype']);}
if(isset($_POST['job'])){$job_id=intval($_POST['job']);}
if(isset($_POST['city'])){$city_id=intval($_POST['city']);}
?>

<script type="text/javascript" src="/_js/report_corporative/lists.js"></script>
<link type="text/css" href="/_js/jquery-ui-1.7.2.custom/development-bundle/themes/custom-theme-1/ui.all.css" rel="stylesheet" />

<form method='post' name="step1" action="" onSubmit="return testform1();">
    <?php
     if(isset($_POST['sphere'])){echo('<input type="hidden" name="sphere" value="'.intval($_POST['sphere']).'">');}
     if(isset($_POST['staff'])){echo('<input type="hidden" name="staff" value="'.intval($_POST['staff']).'">');}
     if(isset($_POST['turnover'])){echo('<input type="hidden" name="turnover" value="'.intval($_POST['turnover']).'">');}
    ?>

<p><span class="title_mini">1. ����� ��������� &raquo;</span><span class="title_mini_others"> 2. �������������� �������� &raquo;</span><span class="title_mini_others"> 3. ����� &raquo;</span></p>

<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid silver;">
<tr>
  <td height="40" colspan="2" align="left" valign="top"><em>����������, ��������� ��������������� ��� ����.</em></td>
</tr>

  <!--����������� ������ -->
<tr>
<td width="40%" align="right">����������� ������</td>
<td width="60%" height="30">
      <select name="jtype" class="text_1" onChange="getJob(this.value,1,<?php echo($user_id);?>)">
        <option value="">--- ������� ---</option>
  <?php
$result=mysqli_query($link,"select * from base_jtype ".$q_jtype_block." order by name");
$ch="";
while($row=mysqli_fetch_array($result))
{
if((isset($_POST['jtype'])) and ($_POST['jtype']==$row["id"])){$ch="selected";}
echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["name"].'</option>');
$ch="";
}
?>
</select></td>
</tr>


<!--��������� -->
<tr>
<td width="40%" align="right">���������</td>
<td height="30">
<div id='jobdiv'>
      <select name='job' class="text_1" onChange="return getBlocksCityJobDescript(this.value,1);">
        <option value="">--- ������� ---</option>
        <?php
       if(isset($_POST['jtype'])){
$q_jobs=mysqli_query($link,"SELECT * from base_jobs WHERE id in(select job_id from base_job_types
where jtype_id='$jtype_id') ".$q_job_block." order by name");
      $ch="";
      while($row=mysqli_fetch_array($q_jobs))
      {
      if((isset($_POST['job'])) and ($_POST['job']==$row["id"])){$ch="selected";}
      echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["name"].'</option>');
      $ch="";
      }
      }
        ?>
      </select>
</div>
<div id="loading_job" style="display:none">
     <img src="/_img/loader.gif" width="16" height="16" align="absmiddle">&nbsp;��������...
</div>
</td>
</tr>

<!--�����-->
<tr>
<td align="right">�����</td>
<td>
 <div id='citydiv'>
      <select name='city' class="text_1">
        <option value="">--- ������� ---</option>
        <?php
       if(isset($_POST['city']) and isset($_POST['job'])){
        $job_id=$_POST['job'];
        $result=mysqli_query($link,"select * from base_regions where id in(select city_id from base_company_jobs where job_id='$job_id')");
        if($city_id==0){
          echo('<option value="0" selected>��� ������</option>');
        }else{
          echo('<option value="0">��� ������</option>');
        }

      $ch="";
      while($row=mysqli_fetch_array($result))
      {
      if((isset($_POST['city'])) and ($_POST['city']==$row["id"])){$ch="selected";}
      echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["name"].'</option>');
      $ch="";
      }
      }
        ?>
      </select>
</div>
<div id="loading_city" style="display:none">
     <img src="/_img/loader.gif" width="16" height="16" align="absmiddle">&nbsp;��������...
</div>
</td>
</tr>

</table>
</form>

    <p align="right"><input type="button" value="������ &raquo;" class="but1" onClick="return testform1();"></p>

    <!--�������� ���������-->
<div id="job_descript">
    <?php
    if(isset($_POST["job"]))
    {
        echo('<a href="/servis/job_description/view/?id='.$_POST["job"].'&lang=0" class="lk1" target="jobDescript" onClick="window.open(this.href, this.target, config=\'height=850,width=510,toolbar=0, scrollbars=1\')">�������� ��������� &raquo;</a>');
    }
    else
    {
        echo('<span class="not_link">�������� ���������</span>');
    }
    ?>
</div>
<div id="loading_job_descript" style="display:none">
      <span class="not_link">�������� ���������</span>
</div>

<script>
function testform()
{
text="";
if(document.step1.jtype.value==""){text=text+'����������� ������;\n';}
if(document.step1.job.value==""){text=text+'���������;\n';}
if(document.step1.city.value==""){text=text+'�����;\n';}
if(text!=""){window.alert('�� �� �������:\n'+text);return false;}
else{
document.step1.action="?step=2";
document.step1.submit();
}
}

function testform1()
{
text="";
if(document.step1.jtype.value==""){text=text+'����������� ������;\n';}
if(document.step1.job.value==""){text=text+'���������;\n';}
if(document.step1.city.value==""){text=text+'�����;\n';}
if(text!=""){window.alert('�� �� �������:\n'+text);return false;
} else {
document.step1.action="?step=3";
document.step1.submit();
}
}
</script>