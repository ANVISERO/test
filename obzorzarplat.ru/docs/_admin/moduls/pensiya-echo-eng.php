<center><b>���� ������</b></center>
<br>
<form name="zp" method="post" action="?step=2" onSubmit="return testform();">
<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
 
  <tr>
    <td width="200" align="right"><strong>�������� ��� ��������</strong></td>
    <td><select class="text" name="birthday" style="width:120px">
	<option value="">--- ������� ---</option>
	<?
	
	$yaer_today=date("Y");
	$yaer_first=$yaer_today-59;
	for($ii=$yaer_first; $ii<=($yaer_today-18); $ii++)
	{
	echo('<option value="'.$ii.'">'.$ii.'</option>');
	}
	?>
	</select></td>
  </tr>
 <tr>
    <td width="200" align="right"><strong>������� ��������</strong></td>
    <td><input type="text" class="text" name="sal" value="20000" style="width:120px"> ���/�����</td>
  </tr>
    <tr>
    <td width="200" align="right"><strong>��� ���</strong></td>
    <td>
<label><input type="radio" name="sex" value="1" checked="checked">�</label>
<label><input type="radio" name="sex" value="0">�</label></td>
  </tr>
    <tr>
    <td width="200" align="right"><strong>������� ��� ��������� ���� �� ������� ������</strong></td>
    <td><input name="seniority" type="text" class="text" value="0" size="3" maxlength="3" style="width:120px"> 
      ���</td>
  </tr>
  <tr>
    <td width="200" align="right">&nbsp;</td>
    <td>
	
<em><strong>* � ��������� ���� ����������: </strong>
<ul>
<li>������ �� ��������� ��������; 
<li>��������������� ����������� ��� ������������� ������; 
<li>���� ������������, � ������� ������� �� ��������� ������������� ����������� ����������� �� ������ ��������� ������������������ � � ����� � ������������.
</ul></em>	</td>
  </tr> 
  
      <tr>
    <td width="200" align="right"><strong>������� ��� �������������� ����� �� ������������� ����� ������ **</strong></td>
    <td><input name="percent_capital" type="text" class="text" size="5" maxlength="5" value="10" style="width:120px"> % � ���</td>
  </tr>
    <tr>
    <td width="200" align="right">&nbsp;</td>
    <td>
	
<em>** � ������������ � ���������� ����������������� ������������� ����� ���������� ������ � ��� ������ ���� �������������</em>	</td>
  </tr>

           <tr>
    <td colspan="2" align="center"><input type="submit" class="but" value="���c������!"></td>
    </tr>  
</table>
</form>
<script>
function testform()
{
var reg = new RegExp("^\\d+$");
if (!(reg.test(document.zp.sal.value))) {window.alert('������� ������ �����');return false;}

if (document.zp.birthday.value==""){window.alert('�� �� ������� ��� ��������');return false;}
if (document.zp.sal.value==""){window.alert('�� �� ������� ��������');return false;}
if (document.zp.capital.value==""){window.alert('�� �� ������� ���������� �������');return false;}
}
</script>
