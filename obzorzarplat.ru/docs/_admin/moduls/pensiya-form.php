<!--content -->
<style type="text/css">
<!--
.style4 {font-size:16px; font-weight:bold; text-align:center; color:#fff; text-decoration:none;}
-->
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="6" style="border:1px #FF0000">
  <td width="50%"><tr>
<td height="62" colspan="2" valign="top">
<style type="text/css">
<!--
.style1 {
	color: #999999;
	font-style: italic;
}
.style2 {font-size: 10px}
.style3 {font-size: 14px}
.style9 {color: #000000}
.style14 {color: #CCCCCC}
.style15 {color: #595959;}
.style16 {
	font-size: 12px;
	color: #595959;
	font-style: italic;
}
.style17 {color: #666666}
.style18 {font-size: 10px; color: #595959; }
-->
</style>
<center>
</center>
<form name="zp" method="post" action="?step=2" onSubmit="return testform();">
<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
 
  <tr>
    <td width="345" align="right">&nbsp;</td>
    <td width="328" bgcolor="#FFFFFF">&nbsp;</td>
    <td rowspan="7"><div align="right"><span class="style14"><span class="style2"><img src="/_img/pensiya.jpg" width="299" height="200"></span></span></div></td>
  </tr>
  <tr>
    <td align="right"><strong>�������� ��� ��������</strong></td>
    <td width="328" bgcolor="#e0e0e0"><select class="text_form" name="birthday" style="width:150px; height:15px">
      <option value="">--- ������� ---</option>
      <?
     $year_today=date("Y"); //������� ���
     $year_begin=1950;
      for($i=$year_begin;$i<=$year_today-18;$i++){
        echo('<option value="'.$i.'">'.$i.'</option>');
      }
      ?>
      </tr>
  <tr>
    <td width="345" align="right"><strong>������� ����� ���������� ����������:</strong></td>
    <td><input type="text" class="text" name="sum_pens" value="0" style="width:150px; height:15px" onFocus="if(this.value==0){value='';}" 
     onBlur="if(this.value==''){value=0;}"> ���</td>
    </tr>
 <tr>
    <td width="345" align="right"><strong>������� ��������:</strong></td>
    <td bgcolor="#e0e0e0"><input type="text" class="text" name="sal" value="20000" onFocus="if(this.value==20000){value='';}" 
     onBlur="if(this.value==''){value=20000;}" style="width:150px; height:15px" /> ���/�����</td>
    </tr>
    <tr>
    <td width="345" align="right"><strong>��� ���</strong></td>
    <td>
<label><input type="radio" name="sex" value="1" checked="checked">�</label>
<label><input type="radio" name="sex" value="0">�</label></td>
    </tr>
    <tr>
    <td width="345" align="right"><strong>������� ��� ��������� ���� �� ������� ������:</strong></td>
    <td bgcolor="#e0e0e0"><input name="seniority" type="text" class="text" value="0" size="3" maxlength="3" style="width:150px; height:15px" onFocus="if(this.value==0){value='';}" 
     onBlur="if(this.value==''){value=0;}"> ���</td>
    </tr>
  <tr>
    <td align="right">
	
      <div align="left"><strong>������� ��� �������������� ����� �� ������������� ����� ������ **</strong> </div>      </td>
    <td align="right"><div align="left">
      <input name="percent_capital" type="text" class="text" size="5" maxlength="5" value="10" style="width:150px; height:15px" onFocus="if(this.value==10){value='';}" 
     onBlur="if(this.value==''){value=10;}"> % � ���</div></td>
    </tr>
  <tr>
    <td></td>
    <td align="right" bgcolor="#FFFFFF"><div align="left" class="style3">
      <div align="center"><span class="style3 style9">
        <input name="submit" type="submit" class="but_form" value="���c������!">
      </span></div>
    </div>      </td>
    </tr>
  <style type="text/css">
<!--
.style1 {color: #666666}
-->
</style>
<style type="text/css">
<!--
.style1 {
	color: #666666;
	font-weight: bold;
	font-style: italic;
}
.style3 {color: #666666}
.style4 {color: #666666}
.style5 {color: #CCCCCC}
-->
</style>
<style type="text/css">
<!--
.style1 {
	color: #666666;
	font-weight: bold;
	font-style: italic;
}
.style3 {color: #666666}
.style6 {color: #999999}
-->
</style>
 <tr>
    <td colspan="3" align="right" style="border-top:1px solid #ccc;"><div align="left" class="style3 style15"><em><strong>* � ��������� ���� ����������: </strong> </em> 
      <div align="left" class="style16">
        <ol>
          <li>������ �� ��������� ��������; </li>
          <li><em>��������������� ����������� ��� ������������� ������; </em></li>
          <li><em>���� ������������, � ������� ������� �� ��������� ������������� ����������� ����������� �� ������ ��������� ������������������ � � ����� � ������������. </em></li>
        </ol>
      </div>
      </div>
  </td>
</tr> 
<tr>
  <td colspan="3" align="right"><p align="left" class="style3 style15">����� �� �������� ������ �� �������� �����:</p>
    <div align="left">
<ul>
              <li><span class="style18 style3">������� � �������� 60 ��� ��� ��������� ����� �� ����� 5 ���. </span> </li>
              <li><span class="style18 style3">������� � �������� 55 ��� ��� ��������� ����� �� ����� 5 ���.</span></li>
              <li><span class="style18 style3">��������� ��������� ������� ����� ����� �� ��������� ���������� �������� ������ ��� ��������, ��������������� �����������������.</span><font class="style18" style="font-size:10px; font-weight:normal; font-style:normal; text-decoration:none; color:#494949"></font></span></li>
            </ul>
        </div></td>
        <td width="0" class="style6"></td>
      </tr>
    <tr>
    <td colspan="3" align="right" bgcolor="#FFFFFF">
	
      <div align="left" class="style18">
        <p class="style3">** � ������������ � ���������� ����������������� ������������� ����� ���������� ������ � ��� ������ ���� ������������� </p>
        <p><noindex><span style="color: #666666"><span style=""><span style=""><font style="font-size:14px">��������� �����.</font> <br>
            <br>
������ ��������� ����� (��) �������� ������ ������������ �� �������: </span></span></span>
        <center class="style3">
��=��/�,
</center>
          <span class="style3">���:<br>
�� � ��������� ����� �������� ������ �� ��������;<br>
�� � ����� ���������� ����������� ��������, ������� ����������� ������ �� ��������� ����� ������;<br>
� � ���������� ������� ���������� ������� ������� �������� ������ �� ��������, ����������� ��� ������� ��������� ����� �������� ������. <br>
          <br>
����������� � ���������� �� 12 ��� (144 ���.) �� 19 ��� (228 ���.). ��� �������� �� ��������, ��� ���������� ����� ������������� ������ ������ � ������� 12 ��� 19 ���, ��� ����������� ������������� ��� �������. </span><span class="style1"><br>
<br>
        </span></noindex></p>
        <hr>
        <span class="style3"><font style="font-size:14px">������������� �����.</font> <br>
        <br>
������ ������������� ����� �������� ������ �� �������� ������������ �� �������: </span>
        <center class="style3">
�� = ��/�;
</center>
        <span class="style3">���:<br>
�� � ������ ������������� ����� �������� ������;<br>
�� � ����� ���������� ���������� ��������������� ����, �������� � ����������� ����� ��� ��������������� �������� ����� �� ��������� �� ����, � �������� ��� ����������� ������������� ����� �������� ������ �� ��������;<br>
� � ���������� ������� ���������� ������� ������� �������� ������ �� ��������, ����������� ��� ������� ������������� ����� �������� ������. <br>
        <br>
� ������������ � ���������� ����������������� ������������� ����� ���������� ������ � ��� ������ ���� �������������. ������� �������, ��� ������ ������ �������� � ��������� ����� ��������������� ����. ���� ����� ���� ����� ������������� ������������� �� ��� ��������� ������� �� ������������ ������������� ����� ������ � �������� ����� ���������� ����������. <br>
<br>
���������� ������� ����� ������ ����� ������� ������ ��������������, ��� ��� ���������� ����� ��������������� ������ �� ��������� ��� ������ ����������� ����������. <br>
<br>
��������������, ��� ��� �������������� ����� ����� ���������� 10% �������.</span></div>
</td>
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
</script><div align="right">
  
</div></td>
</tr>
</table>
	<!--end content -->