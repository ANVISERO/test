<center><b>����������� ���� ������ � �����������</b></center>
<br>
<form name="zp" method="post" action="?step=2" onSubmit="return testform();">
<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
  <tr>
    <td width="200" align="right"><strong>������� ��������</strong></td>
    <td><input type="text" class="text" name="sal" value="20000"> ���/�����</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>
	
<em>C������ ��������� ������������ ������ �� ���������� ����������� �������� � ������������� ������� �� 12 ����������� �������, �������������� �������, ��� �������� ������������ ������� ��������.</em>	</td>
  </tr>
  <tr>
    <td align="right"><strong>��������� ����</strong></td>
    <td><select class="text" name="percent">
	<option value="0.6">�� 5 ���</option>
	<option value="0.8">�� 5 �� 8 ���</option>
	<option value="1">8 � ����� ���</option>
	</select></td>
  </tr> 
           <tr>
    <td width="200" align="right"></td>
    <td><input type="submit" class="but" value="���c������!"></td>
  </tr>  
</table>
</form>
<script>
function testform()
{
var reg = new RegExp("^\\d+$");
if (!(reg.test(document.zp.sal.value))) {window.alert('������� ������ �����');return false;}
if (document.zp.sal.value=="")
{window.alert('�� �� ������� ��������');return false;}
}
</script>