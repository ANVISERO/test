<?
$year_today=date("Y");
?>
<center><b>������ � ����� �������� � ��������������� ������</b></center>
<br>
���������� � ������������� ��������� ������ ���� ����������� ����������������� (�.�. ���) ���������� ��������� ����� ����� ������, ��������, �� ��������� ��������, �� ������� � �������� ����� �������� ����������� ������ �� ������ ���������� ��� (����).<br>
<br>
<form name="zp" method="post" action="?step=2" onSubmit="return testform();">
<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
  <tr>
    <td width="357" align="right"><strong>������� ���� �������� </strong></td>
    <td width="364" valign="top"><input type="text" class="text" name="sal" value="20000" onFocus="if(this.value=='20000'){this.value='';}" onBlur="if(this.value==''){this.value='20000';}">
���/�����</td>
    <td width="469" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="left">
	������� ���� ��������� ������� � <b><?=$year_today;?></b> ����:</td>
    </tr>
<tr>
<td colspan="3" align="center" bgcolor="#dddddd"><strong><em>���������� ��������� ������.</em></strong></td>
</tr>

<tr>
  <td align="right">&nbsp;</td>
  <td valign="top">&nbsp;</td>
  <td rowspan="6" valign="middle"><img src="/_img/nalog.jpg" width="460" height="258"></td>
</tr>
<tr>
<td width="357" align="right"><strong>������� �� ���� ��������</strong><br>
	<em>(������������ ����� 50 000 ���.)</em>	</td>
    <td valign="top"><input type="text" class="text" name="education" value="0">
���.</td>
    </tr> 
    <tr>
    <td width="357" align="right"><strong>������� �� �������� ������ �������, �������� �� ����������� ��� 24 ���</strong><br>
	<em>(������������ ����� 50 000 ���.)</em>	</td>
    <td valign="top"><input type="text" class="text" name="education_baby" value="0">
���.</td>
    </tr>
    
<tr>
<td width="357" align="right"><strong>������� �� ���� ������� � ������� ����� �������������</strong><br>
<em>(������������ ����� 50 000 ���.)</em></td>
<td valign="top"><input type="text" class="text" name="treatment" value="0">
���.</td>
</tr>
  
<tr>
<td width="357" align="right"><strong>������� �� ������������� �������</strong></td>
<td valign="top"><input type="text" class="text" name="treatment_dear" value="0">
���.</td>
</tr> 

<tr>
<td width="357" align="right"><strong>����� �������, ������������� ���� �� ����������������� ����</strong><br>
<em>(������������ ����� 25% ������� ��������.)</em>
</td>
<td valign="top"><input type="text" class="text" name="welfair" value="0">
���.</td>
</tr>

<tr>
<td colspan="3" align="center" bgcolor="#dddddd"><strong><em>������������� ��������� ������.</em></strong></td>
</tr> 
  <tr>
    <td colspan="3" align="left">���� �� ������� ��� ������������ �� ���������� ���������� ��������� ����� ��� ��� ��������, �� �� ������ ����� �� ������������� ����� � ����� �������� �� ������������ ��� ������������� �����.</td>
    </tr> 
	
	
<tr>
<td width="357" align="right"><strong>������� �� ������������� ��� ������������ �����</strong><br>
	<em>((������������ ����� 1 000 000 ���.)</em>	</td>
    <td valign="top"><input type="text" class="text" name="house" value="0">
���.</td>
    <td valign="top">&nbsp;</td>
  </tr>	
 <tr>
<td width="357" align="right"><strong>������ �� ������� ���������</strong></td>
    <td valign="top"><input type="text" class="text" name="house_sale" value="0">
���.</td>
    <td valign="top">&nbsp;</td>
  </tr>	 
<tr>
<td colspan="3" align="center" bgcolor="#dddddd"><strong><em>����������� ��������� ������.</em></strong></td>
</tr> 
  <tr>
    <td colspan="3" align="left">����������� ��������� ����� ��������������� �� ����������� ��������� ��������� ���������� ������������������ � ������������ ����� ����������� ���������� ��������� �� ����.</td>
    </tr>
	
<tr>
<td colspan="3" align="center" bgcolor="#dddddd"><strong><em>���������������� ��������� ������.</em></strong></td>
</tr> 
  <tr>
    <td colspan="3" align="left">����� �� ��������� ���������������� ��������� ������� ����� ���������������, ���������, ������������ ������� ���������, ��������, ���������� ����������� ��������, � ���� ����, ������������ ������� ���������.
<br><br>	
���������������� ��������� ������ ��������������� � ����� ���������� ������������� � ������������� �������������� ��������, ��������������� ��������� � ����������� �������.</td>
    </tr>	   
	
           <tr>
    <td colspan="3" align="center"><input type="submit" class="but" value="����������!"></td>
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