<script type="text/javascript" src="/_js/lists_4summary_report.js"></script>

<p><span class="title_mini">1. ����� �������� &raquo;</span><span class="title_mini_others"> 2. ����� ���������� &raquo;</span><span class="title_mini_others"> 3. ����� &raquo;</span></p>


<form method='post' action="" name="step1" onSubmit="return testform();">

    <p>
<input type="radio" name="factor" value="n" id="n" checked onclick="loadBlock(this.value)"><label for="n" >������ �� ����� ��������</label><br>
<input type="radio" name="factor" value="sp" id="sp" onclick="loadBlock(this.value)"><label for="sp">����� ������������ ��������</label><br>
<input type="radio" name="factor" value="t" id="t" onclick="loadBlock(this.value)"><label for="t">������ ��������, ���. ������ � ���</label><br>
<input type="radio" name="factor" value="s" id="s" onclick="loadBlock(this.value)"><label for="s">���� ��������</label><br>
</p>
<br>

<div id="block" align="center">
    <table border="0" cellspacing="0" cellpadding="6">

<!--����� -->
<tr>
    <td align="right" width="30%">�����</td>
<td align="left">
<select id='city' name='city' class="text_1">
<option value="">--- ������� ---</option>
<option value="0">��� ������</option>
<option value="1">�����-���������</option>
<option value="">-------------------------</option>
<?php
$q_city=mysqli_query($link,"SELECT * FROM base_regions where id in(select region_id from base_companies) order by name");

$ch="";
while($out_city = mysqli_fetch_array($q_city))
{
if(($city_id<>'') and ($city_id==$out_city["id"])){$ch="selected";}
echo('<option value="'.$out_city["id"].'" '.$ch.'>'.$out_city["name"].'</option>');
$ch="";
}
?>
</select></td>
</tr>
</table>
<input type="hidden" name="factor_prefix" value="n">
<script type="text/javascript">
function testform()
{
text="";
if(document.step1.city.value==""){text=text+'�����;\n';}
if(text!=""){window.alert('�� �� �������:\n'+text);return false;}
else{
document.step1.action="?step=2";
document.step1.submit();
}
}
</script>
    </div><!--/block-->

    <div id="loading_block" style="display:none; font-size:14px; color:gray;" align="center">
     <img src="/_img/loader.gif" width="20" height="20" align="absmiddle">&nbsp;��������...
</div><!--/loading_block-->

<p align="right"><input type="button" value="������ &raquo;" class="but1" onClick="return testform();"></p>
</form>