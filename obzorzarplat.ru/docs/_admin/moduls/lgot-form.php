<style type="text/css">
<!--
.style2 {font-size: 12px; color: #595959;}
-->
</style>
<center><b>����������� ���� �������</b></center>
<br>

<form name="zp" method="post" action="?step=2" onSubmit="return testform();">
  <table width="100%" border="0" cellpadding="6" cellspacing="0"  style="border:1px solid #999">
    <tr>
      <td height="15" align="right" valign="bottom" bgcolor="#FFFFFF">&nbsp;</td>
      <td valign="bottom" bgcolor="#FFFFFF">&nbsp;</td>
      <td rowspan="5" valign="middle"> <div align="center"><img src="/_img/lgot.jpg" width="149" height="234"></div></td>
    </tr>
    <tr>
      <td width="110" height="20" align="right" valign="bottom" bgcolor="#FFFFFF"><strong>������� ���� ������� ��������</strong></td>
      <td valign="middle" bgcolor="#e0e0e0"><input type="text" class="text" name="sal" value="20000" onFocus="if(this.value==20000){value='';}" 
     onBlur="if(this.value==''){value=20000;}" style="width:150px; height:15px"/> ���/�����</td>
    </tr>
    <tr>
      <td></td>
      <td bgcolor="#FFFFFF"> <em>C������ �������� ������������ ������ �� ���������� ����������� �������� � ������������� ������� �� 12 ����������� �������, �������������� �������, ��� �������� ������������ ������� ��������.</em> </td>
    </tr>
   
    <tr>
      <td height="20" align="right" bgcolor="#FFFFFF"><strong>��������� ����</strong></td>
      <td bgcolor="#e0e0e0"><select class="text_form" name="percent" style="width:150px; height:15px">
        <option value="0.6">�� 5 ���</option>
        <option value="0.8">�� 5 �� 8 ���</option>
        <option value="1">8 � ����� ���</option>
      </select></td>
    </tr>

    <tr>
      <td height="36" align="right" bgcolor="#FFFFFF"></td>
      <td align="center" valign="middle" bgcolor="#FFFFFF"><div align="center">
        <input name="submit" type="submit" class="but_form" value="���c������!" />
      </div></td>
    </tr>
    <tr>
      <td height="158" align="right" valign="top" bgcolor="#FFFFFF"></td>
      <td valign="top" bgcolor="#FFFFFF"><p>������ ������� ��� ���������� ��������� �������:</p>
        <ul>
          <li> ������� �� ��������� ������������������</li>
          <li>������� �� ������������ � �����</li>
          <li>�������������� ������� ��������, �������� �� ���� � ����������� ���������� � ������ ����� ������������ (�� 12 ������)</li>
          <li>������� ��� �������� �������</li>
          <li>������� �� ����������</li>
      </ul></td>
    </tr>
    <tr>
      <td colspan="3" valign="top" style="border-top:1px solid #ccc;"><p align="center" class="style2">������� ������������� �� ��������� </p>
        <p class="style2">1. ������������ ������ &quot;� ��������������� �������� ���������, ������� �����&quot;</p>
        <p class="style2">2. ������������ ������ &quot;� �������� ��������� � ��������� ��������������� ���� ���������� ��������� � ����� ��������� �������� ��������� ����� ���������� ������ � ��������� ������ ���������� �����&quot;</p>
        <p class="style2">3. ������ ����� ����������� ����������� ���������� ��������� �� 5 ����� 2008 �. N 02-18/07-1931 </p>
      <p align="left" class="style2">4. ������������� ������������� ���������� ��������� &quot;� ������� ���������� ������� ���, ���������� � ������� ������, ����������� � ������� �����, ����������� ������� ������ � �������� ��������, �����������, �������� � �������������� ������������ ������ ��� �� ��������� � �������� ������, ��������, ��������� � ������� ���� ������ � ������� ���������� ���, ��������������� ��������������� ������, ����������� � ������� ��������-�������������� �������, � �� ������ � ���������� ���������&quot; </p></td>
    </tr>
  </table>
</form>

<script>
function testform()
{
var reg = new RegExp("^\\d+$");
if (!(reg.test(document.zp.sal.value))) {window.alert('������� ������ ������������� �����');return false;}
if (document.zp.sal.value=="")
{window.alert('�� �� ������� ��������');return false;}
}
</script>