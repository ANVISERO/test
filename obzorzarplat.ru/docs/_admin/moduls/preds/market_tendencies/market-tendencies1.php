<script type="text/javascript" src="/_js/lists_MarketTend.js"></script>

<p align="right"><a href="?step=0" class="link_3">������� ������ ����� ������</a></p>

<form method='post' action="" name="step1" onSubmit="return testform();">

<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">


<!--����� -->

<tr>
  <td height="40" colspan="2" align="left" valign="top"><font style="background-color:#000000; color:#FFFFFF; padding:3px"><em>����� ��������</em></font></td>
  </tr>
<tr>
<td width="35%" align="right">�����</td>
<td height="30" colspan="2">
<select id='city' name='city' class="text" onChange='getPeriod(this.value)'  style="width:340px; height:20px;">
<option value="">--- ������� ---</option>
<option value="0">��� ������</option>
<option value="1">�����-���������</option>
<option value="">-------------------------</option>
<?
$q_city=mysqli_query($link,"SELECT * FROM base_regions order by name");

$ch="";
while($out_city = mysqli_fetch_array($q_city))
{
if(($city_id<>'') and ($city_id==$out_city["id"])){$ch="selected";}
echo('<option value="'.$out_city["id"].'" '.$ch.'>'.$out_city["name"].'</option>');
$ch="";
}
?>
</select>
</td>
</tr>

  <tr>
    <td align="right">�������� ������������ ������</td>
    <td>
    <div id="perioddiv">
      <select name="period" class="text" style="width:340px; height:20px;">
        <option>--- ������� ---</option>
        </select>
    </div>
<div id="loading" style="display:none">  
     <img src="/_img/loader.gif" width="16" height="16" align="absmiddle">&nbsp;��������...  
</div>
</td>
</tr>

</table>

</form>

<table width="100%" border="0">
<tr>
    <td>&nbsp;</td>
    <td align="right"><input type="button" value="������ >>" class="but1" onClick="return testform();"></td>
  </tr>
</table>

<script>
function testform()
{
text="";
if(document.step1.city.value==""){text=text+'�����;\n';}
if(document.step1.period.value==""){text=text+'������ ��� ���������;\n';}
if(text!=""){window.alert('�� �� �������:\n'+text);return false;}
else{
document.step1.action="?step=2";
document.step1.submit();
}
}
</script>
