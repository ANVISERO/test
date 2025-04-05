<script type="text/javascript" src="/_js/lists.js"></script>
<style type="text/css">
<!--
.style31 {font-size: 18px}
table.style32{
border:1px solid silver
}
-->
</style>


<form name="zp" method="post" action="/servis/zp/?step=2" onsubmit="return testform();">
<table width="100%" border="0" cellspacing="0" cellpadding="6" class="style32">

<!--Должностная группа-->
  <tr>
    <td width="40%" align="right">Выберите должностную группу</td>
    <td width="60%">
      <select name="jtype" class="text_1" onChange="getJob(this.value,1)">
        <option value="">--- Выбрать ---</option>
        <?
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$result=mysqli_query($link,"select * from base_jtype order by name");
$ch="";
while($row=mysqli_fetch_array($result))
{
echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["name"].'</option>');
echo('<option value="'.$row["id"].'" '.$ch.'>'.'Тест1'.'</option>');
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
      <select name='job' class="text_1">
        <option value="">--- Выбрать ---</option>
      </select>
</div>
<div id="loading_job" style="display:none">  
     <img src="/_img/loader.gif" width="16" height="16" align="absmiddle">&nbsp;Загрузка...  
</div>
    </td>
  </tr>

<tr>
    <td></td>
    <td>
<div id="job_descript">
    <?php

    if(isset($_POST["job"]))
    {
        echo('<a href="/servis/job_description/view/?id='.$_POST["job"].'&lang=0" class="link_4" target="jobDescript" onClick="window.open(this.href, this.target, config=\'height=850,width=510,toolbar=0, scrollbars=1\')">Описание должности</a>');
    }
    else
    {
        echo('<span class="not_link">Описание должности</span>');
    }
    ?>
</div>
<div id="loading_job_descript" style="display:none">
      <span class="not_link">Описание должности</span>
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
      </select>
</div>
<div id="loading_city" style="display:none">  
     <img src="/_img/loader.gif" width="16" height="16" align="absmiddle">&nbsp;Загрузка...  
</div>
    </td>
  </tr>
  
  <tr>
    <td align="right">&nbsp;</td>
    <td><input type="submit" value="Зарплата &raquo;" class="but_pension"></td>
  </tr>
</table>
</form>
<p><i><font style="color:#900;">* Вы можете посмотреть информацию по 3-м должностям в свободном доступе в течение одного календарного месяца.</font></i></p>

<script language="javascript">
function testform(){
text="";
if(document.zp.jtype.value==""){text=text+'Должностную группу;\n';}
if(document.zp.job.value==""){text=text+'Должность;\n';}
if(document.zp.city.value==""){text=text+'Город;\n';}
if(text!=""){window.alert('Вы не выбрали:\n'+text);return false;}
else{
document.zp.submit();
}
}
</script>