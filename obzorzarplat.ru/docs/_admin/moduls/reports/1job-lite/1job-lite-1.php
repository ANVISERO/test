<?php
if(isset($_POST['job'])){$job_id=intval($_POST['job']);}
if(isset($_POST['city'])){$city_id=intval($_POST['city']);}

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

 //проверяем, есть ли ограничение по должностям
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
?>
<script type="text/javascript" src="/_js/report_corporative/lists.js"></script>
<link type="text/css" href="/_js/jquery-ui-1.7.2.custom/development-bundle/themes/custom-theme-1/ui.all.css" rel="stylesheet" />

<p><span class="title_mini">1. Выбор должности &raquo;</span><span class="title_mini_others"> 2. Отчет &raquo;</span></p>

<form method='post' action="?step=2" name="step1">
<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
  <!--Должностная группа-->
  <tr>
    <td width="30%" align="right">Выберите должностную группу</td>
    <td width="60%">
      <select name="jtype" class="text_1" onChange="getJob(this.value,1,<?php echo($user_id);?>)">
        <option value="">--- Выбрать ---</option>
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
</select>
</td>
  </tr>


<!--Должность-->
  <tr>
    <td align="right">Выберите должность</td>
    <td>
    <div id='jobdiv'>
      <select name='job' class="text_1" onChange="return getBlocksCityJobDescript(this.value,1);">
        <option value="">--- Выбрать ---</option>
        <?php
       if(isset($_POST['jtype'])){
      $jtype_id=$_POST['jtype'];
      $result=mysqli_query($link,"select * from base_jobs where jtype_id='$jtype_id' ".$q_job_block." order by name");
      $ch="";
      while($row=mysqli_fetch_array($result))
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
     <img src="/_img/loader.gif" width="16" height="16" align="absmiddle" alt="" />&nbsp;Загрузка...
</div>
    </td>
</tr>

<!--Город-->
  <tr>
    <td align="right">Выберите город</td>
    <td>
    <div id='citydiv'>
      <select name='city' class="text_1">
        <option value="">--- Выбрать ---</option>
        <?php
       if(isset($_POST['city']) and isset($_POST['job'])){
        $job_id=$_POST['job'];
        $result=mysqli_query($link,"select * from base_regions where id in(select city_id from base_company_jobs where job_id='$job_id')");
        if($city_id==0){
          echo('<option value="0" selected>Все города</option>');
        }else{
          echo('<option value="0">Все города</option>');
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
    <img src="/_img/loader.gif" width="16" height="16" align="absmiddle" alt="" />&nbsp;Загрузка...
</div>
    </td>
</tr>

</table>

<p align="right"><input type="button" value="дальше &raquo;" class="but1" onClick="return testform();"></p>
</form>

<!--Описание должности-->
<div id="job_descript">
    <?php
    if(isset($_POST["job"])){
        echo('<a href="/servis/job_description/view/?id='.$_POST["job"].'&lang=0" class="lk1" target="jobDescript" onClick="window.open(this.href, this.target, config=\'height=850,width=510,toolbar=0, scrollbars=1\')">Описание должности &raquo;</a>');
     }else{echo('<span class="not_link">Описание должности</span>');}
    ?>
</div>
<div id="loading_job_descript" style="display:none">
      <span class="not_link">Описание должности</span>
</div>


<script language="javascript">
function testform(){
text="";
if(document.step1.jtype.value==""){text=text+'Должностную группа;\n';}
if(document.step1.job.value==""){text=text+'Должность;\n';}
if(document.step1.city.value==""){text=text+'Город;\n';}
if(text!=""){window.alert('Вы не выбрали:\n'+text);return false;}
else{
    document.step1.submit();
}}
</script>