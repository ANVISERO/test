<script type="text/javascript" src="/_js/lists.js"></script>

<style>
.bg a, a:visited{color:#000000; font-size:13px;}
.bg input.sub{width:100px; height:25px; background:gray; color:#fff; cursor:pointer;}
.bg input.sub:hover{width:100px; height:25px; background:#c00; color:#fff; cursor:pointer;}
</style>

<div class="bg">
<a href="/servis/zp/">����������!<br> ������� �������� � 2009�.</a>
<br>

<form name="zp" method="post" action="/servis/zp/?step=2" onSubmit="return testform();">
<table width="100%" border="0" cellspacing="0" cellpadding="2"  border="0">

<!--����������� ������-->
<?php

echo('�� ��� ��������');

?>
  <tr>
    <td>
      <select name="jtype" class="text_0" onChange="getJob(this.value,0)">
        <option value="">�������� ����������� ������</option>
        <?
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$result=mysqli_query($link,"select * from base_jtype order by name");
$ch="";
while($row=mysqli_fetch_array($result))
{
echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["name"].'</option>');
$ch="";
}
?>	
      </select>
    </td>
  </tr>

<!--���������-->
  <tr>
    <td>
    <div id='jobdiv'>
      <select name='job' class="text_0">
        <option value="">�������� ���������</option>
      </select>
</div>
<div id="loading_job" style="display:none">  
     <img src="/_img/loader.gif" width="16" height="16" align="absmiddle">&nbsp;��������...  
</div>
    </td>
  </tr>

<!--�����-->
  <tr>
    <td>
    <div id='citydiv'>
      <select name='city' class="text_0">
        <option value="">�������� �����</option>
      </select>
</div>
<div id="loading_city" style="display:none">  
     <img src="/_img/loader.gif" width="16" height="16" align="absmiddle">&nbsp;��������...  
</div>
    </td>
  </tr>
  
  <tr>
    <td align="center"><input type="button" class="sub" value="�������� &#187;" onClick="return testform();"></td>
  </tr>
</table>
</form>

</div>

<script language="javascript">
function testform(){
text="";
if(document.zp.jtype.value==""){text=text+'����������� ������;\n';}
if(document.zp.job.value==""){text=text+'���������;\n';}
if(document.zp.city.value==""){text=text+'�����;\n';}
if(text!=""){window.alert('�� �� �������:\n'+text);return false;}
else{
document.zp.submit();
}
}
</script>