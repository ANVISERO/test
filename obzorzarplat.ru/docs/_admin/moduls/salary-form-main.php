<script type="text/javascript" src="/_js/prototype/prototype.js"></script>
<script type="text/javascript" src="/_js/prototype/prototip.js"></script>
<script type="text/javascript" src="/_js/express_report/lists.js"></script>
<script type="text/javascript" src="/_js/simpletip.js"></script>
<style type="text/css">
<!--
.style31 {font-size: 18px}
-->
</style>
<link type="text/css" href="/_js/jquery-ui-1.7.2.custom/development-bundle/themes/custom-theme-1/ui.all.css" rel="stylesheet" />

<div class="salary_on_main">

<form name="zp" method="post" action="">
<table width="100%" border="0" cellspacing="0" cellpadding="6"  border="0">

<!--Должностная группа-->

  <tr>
    <td>
      <select name="jtype" class="text_1" onChange="getBlocksJobCityJobDescript(this.value)">
        <option value="">Выберите должностную группу</option>
        <?
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$result=mysqli_query($link,"select * from base_jtype order by name");
$ch="";
while($row=mysqli_fetch_array($result))
{
echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["name"].'</option>');
echo('<option value="'.$row["id"].'" '.$ch.'>'.'ТЕСТ'.'</option>');
$ch="";
}
?>	
      </select>
    </td>
  </tr>

<!--Должность-->

  <tr>
    <td>
    <div id='jobdiv'>
      <select name='job' class="text_1">
        <option value="">Выберите должность</option>
      </select>
</div>
<div id="loading_job" style="display:none">  
     <img src="/_img/loader.gif" width="16" height="16" align="absmiddle">&nbsp;Загрузка...  
</div>
    </td>
  </tr>
<tr>
    <td align="left">
<div id="job_descript">
    <?php
/*
    if(isset($_POST["job"]))
    {
        echo('<a href="/servis/job_description/view/?id='.$_POST["job"].'&lang=0" class="lk1" target="jobDescript" onClick="window.open(this.href, this.target, config=\'height=850,width=510,toolbar=0, scrollbars=1\')">Описание должности</a>');
    }
    else
    {
 *
 */
        echo('<span class="not_link">Описание должности</span>');
  //  }
    ?>
</div>
<div id="loading_job_descript" style="display:none">
      <span class="not_link">Описание должности</span>
</div>
    </td>
</tr>
<!--Город-->

  <tr>
    <td>
    <div id='citydiv'>
      <select name='city' class="text_1">
        <option value="">Выберите город</option>
      </select>
        <p align="center"><input type="submit" value="Зарплата &raquo;" class="no_submit_button" onclick="return testform();"></p>
</div>
<div id="loading_city" style="display:none">  
     <img src="/_img/loader.gif" width="16" height="16" align="absmiddle">&nbsp;Загрузка...  
</div>
    </td>
  </tr>
</table>
</form>
</div>

<script language="javascript">
    function testform(){
text="";
if(document.zp.jtype.value==""){text=text+'Должностную группу;\n';}
if(document.zp.job.value==""){text=text+'Должность;\n';}
if(document.zp.city.value==""){text=text+'Город;\n';}
if(text!=""){window.alert('Вы не выбрали:\n'+text);return false;}
else{
document.zp.action='/servis/zp/?step=2';
document.zp.submit();
}
}

    function testform1(){
text="";
if(document.zp.jtype.value==""){text=text+'Должностную группу;\n';}
if(document.zp.job.value==""){text=text+'Должность;\n';}
if(document.zp.city.value==""){text=text+'Город;\n';}
if(text!=""){window.alert('Вы не выбрали:\n'+text);return false;}
else{
document.zp.action='/servis/otchet/';
document.zp.submit();
}
}
</script>