<?
$year_today=date("Y");
?>
<center><b>������ � ����� �������� � ��������������� ������</b></center>
<br>
���������� � ������������� ��������� ������ ���� ����������� ����������������� (�.�. ���) ���������� ��������� ����� ����� ������, ��������, �� ��������� ��������, �� ������� � �������� ����� �������� ����������� ������ �� ������ ���������� ��� (����).
<br>
<form name="zp" method="post" action="?step=2" onSubmit="return testform();">
<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
  <tr>
    <td width="300" align="right"><strong>������� ���� �������� </strong></td>
    <td valign="top"><input type="text" class="text" name="sal" value="20000"> ���/�����</td>
  </tr>
  <tr>
    <td colspan="2" align="left">
	������� ���� ��������� ������� � <b><?=$year_today;?></b> ����:</td>
    </tr>
<tr>
<td colspan="2" align="center" bgcolor="#dddddd"><strong><em>���������� ��������� ������.</em></strong></td>
</tr>

<tr>
<td width="300" align="right"><strong>������� �� ���� ��������</strong><br>
	<em>(������������ ����� 50 000 ���.)</em>	</td>
    <td valign="top"><input type="text" class="text" name="education" value="0"> ���.</td>
  </tr> 
    <tr>
    <td width="300" align="right"><strong>������� �� �������� ������ �������, �������� �� ����������� ��� 24 ���</strong><br>
	<em>(������������ ����� 50 000 ���.)</em>	</td>
    <td valign="top"><input type="text" class="text" name="education_baby" value="0"> ���.</td>
  </tr>
    
<tr>
<td width="300" align="right"><strong>������� �� ���� ������� � ������� ����� �������������</strong><br>
<em>(������������ ����� 50 000 ���.)</em></td>
<td valign="top"><input type="text" class="text" name="treatment" value="0"> ���.</td>
</tr>
  
<tr>
<td width="300" align="right"><strong>������� �� ������������� �������</strong></td>
<td valign="top"><input type="text" class="text" name="treatment_dear" value="0"> ���.</td>
</tr> 

<tr>
<td width="300" align="right"><strong>����� �������, ������������� ���� �� ����������������� ����</strong><br>
<em>(������������ ����� 25% ������� ��������.)</em>
</td>
<td valign="top"><input type="text" class="text" name="welfair" value="0"> ���.</td>
</tr>

<tr>
<td colspan="2" align="center" bgcolor="#dddddd"><strong><em>������������� ��������� ������.</em></strong></td>
</tr> 
  <tr>
    <td colspan="2" align="left">���� �� ������� ��� ������������ �� ���������� ���������� ��������� ����� ��� ��� ��������, �� �� ������ ����� �� ������������� ����� � ����� �������� �� ������������ ��� ������������� �����.</td>
    </tr> 
	
	
<tr>
<td width="300" align="right"><strong>������� �� ������������� ��� ������������ �����</strong><br>
	<em>((������������ ����� 1 000 000 ���.)</em>	</td>
    <td valign="top"><input type="text" class="text" name="house" value="0"> ���.</td>
  </tr>	
 <tr>
<td width="300" align="right"><strong>������ �� ������� ���������</strong></td>
    <td valign="top"><input type="text" class="text" name="house_sale" value="0"> ���.</td>
  </tr>	 
<tr>
<td colspan="2" align="center" bgcolor="#dddddd"><strong><em>����������� ��������� ������.</em></strong></td>
</tr> 
  <tr>
    <td colspan="2" align="left">����������� ��������� ����� ��������������� �� ����������� ��������� ��������� ���������� ������������������ � ������������ ����� ����������� ���������� ��������� �� ����.</td>
    </tr>
	
<tr>
<td colspan="2" align="center" bgcolor="#dddddd"><strong><em>���������������� ��������� ������.</em></strong></td>
</tr> 
  <tr>
    <td colspan="2" align="left">����� �� ��������� ���������������� ��������� ������� ����� ���������������, ���������, ������������ ������� ���������, ��������, ���������� ����������� ��������, � ���� ����, ������������ ������� ���������.
<br><br>	
���������������� ��������� ������ ��������������� � ����� ���������� ������������� � ������������� �������������� ��������, ��������������� ��������� � ����������� �������.</td>
    </tr>	   
	
           <tr>
    <td colspan="2" align="center"><input type="submit" class="but" value="����������!"></td>
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