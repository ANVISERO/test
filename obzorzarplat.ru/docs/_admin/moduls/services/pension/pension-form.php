<!--content -->
<style type="text/css">
<!--
.style4 {font-size:16px; font-weight:bold; text-align:center; color:#fff; text-decoration:none;}
-->
</style>

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

<form name="zp" method="post" action="?step=2" onSubmit="return testform();">
<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid silver;">
  <tr>
    <td align="right" width="40%">�������� ��� ��������</td>
    <td width="60%"><select class="text" name="birthday">
      <option value="">--- ������� ---</option>
      <?php
     $year_today=date("Y"); //������� ���
     $year_begin=1950;
      for($i=$year_begin;$i<=$year_today-18;$i++){
        echo('<option value="'.$i.'">'.$i.'</option>');
      }
      ?>
      </select>
      </tr>
  <tr>
    <td align="right">������� ����� <a href="#" id="pk_link" class="lk_info">���������� ����������</a>:</td>
    <td><input type="text" class="text" name="sum_pens" title="0"> ���</td>
    </tr>
 <tr>
    <td align="right">������� ��������:</td>
    <td><input type="text" class="text" name="sal" title="20000"/> ���/�����</td>
    </tr>
    <tr>
    <td align="right">��� ���</td>
    <td>
<label><input type="radio" name="sex" value="1" checked="checked"> �</label>
<label><input type="radio" name="sex" value="0"> �</label></td>
    </tr>
    <tr>
    <td align="right">������� ��� ��������� ���� �� ������� ������:</td>
    <td><input name="seniority" type="text" class="text" title="0" size="3" maxlength="3"> ���</td>
    </tr>
      <tr>
    <td align="right">������� ��� <a href="#" id="percent_capital_link" class="lk_info">�������������� ����� �� ������������� ����� ������</a></td>
    <td><input type="text" class="text" name="percent_capital" title="10"/> % � ���</td>
    </tr>
  <tr>
    <td align="right">������� � <a href="#" id="gos_finance_link" class="lk_info">��������� ���������������� ���������������� ������</a></td>
    <td><input type="checkbox" name="gos_finance" value="1"></td>
    </tr>
  <tr>
    <td></td>
    <td align="left"><input name="submit" type="submit" class="but_form" value="���c������!"></td>
    </tr>

</table>
</form>
<div class="ui-dialog-content info hide" title="���������� �������" id="pk_info">
<h3>���������� ������� (��)</h3>
<p>����� ����������� ��������, ������������ �� ����� ������������ �����, �� ������ ���������� � �������� ����������� ��� ��������� �� ���.</p>
<p align="center"><font color="#cc0000"><strong>��</strong><strong> =  ��<sub>1
</sub>+ �� + ��<sub>2</sub></strong></font>, ���</p>
<p align="justify"><font color="#cc0000"><strong>��<sub>1</sub></strong></font> � ��������� ���������� �������, ����������� ���
������ ���������� ���� ��������������� ���� �� ��������� �� 01.01.2002;<strong><br>
<font color="#cc0000">��</font></strong> � ����� �����������;<strong><br>
<font color="#cc0000">��<sub>2</sub></font></strong><font color="#cc0000"><sub> </sub></font>� �����
��������� ������� � ���� ����������� � ���������� ���� ���������� ��������� ��
�������������� ���� ������� � 01.01.2002 (������������ ������������� � ����� ����� 14% �� �� ���������);</p>
<p align="center"><font color="#cc0000"><strong>��</strong><sub>1</sub><strong>= (��-��) � �</strong></font></p>
<p align="justify"><font color="#cc0000"><strong>��</strong></font> � ��������� ������ �������� ������,
������������ � ������ ����� � ��������� ����������� ���� �� �������:<strong> </strong></p>
<p align="center"><font color="#cc0000"><strong>�� = �� � ��
/ �� � ���</strong></font></p>
<p align="justify"><strong><font color="#cc0000">��</font> </strong>� �������� �����������, �������
���������� 0,55 �� ����� ���� 20 ��� � ������, 25 ��� � ������ � ���������� ��
0,01 �� ������ ��� ������ ��������� ����� ����� 20 � 25 ��� ��������������, ��
�� ����� ��� �� 0,20.</p>
<div align="justify"></div>
<p align="justify">�������, ����������
� ����� �������� ���� (� ����������� �������):</p>
<div align="justify">
<ol>
<li> ������� ������ � ����
�����������-�������� ������������, ������� ���������� ������������</li>
<li>������ � ����������� ����� �
������������ � ��� ������</li>
<li>������� ���������
������������������, ���������� � ������ ������, � ������ ���������� ��
������������  I � II ������, ���������� ���������� ������, ���������� �
�������������, ��� ����������������� �����������</li>
<li>������ ���������� � ������
���������� ����� �����, ������������ ��� ���������� ����
������ ��������� ������� �� �����������, ������� � ������������ ������������
�������, �������� �� ����������� ��������������� ������ ��������� � ������
��������� ��� ���������������</li></ol></div>
<p align="justify"><font color="#cc0000"><strong>��/��</strong></font> � ��������� ���������
��������������� ���� (��) �� 2000-2001 �. �� ������ ���������������
(��������������������) ����� ���� �� ����� 60 ������� ������ �� ���� ��������
������������ �� 01.01.2002 �. � �������������� �������� � ������ (��) �� ��� ��
������. ������ ��������� ����������� � ������� �� ����� 1,2 �� �����������
��������, ��� ������� ��� �������� ����� ���� �� 1,4 �� 1,9.<strong><br>
<font color="#cc0000">���</font></strong> � ������� �������� � ����������
��������� �� III ������� 2001 �. ����� 1671 �����</p>
<p>��������: <a href="http://www.pfrf.ru/labor_old_age_pension/" class="lk2" target="_blank">http://www.pfrf.ru/</a></p>
</div>
<div class="ui-dialog-content info hide" title="�������������� ����� �� ������������� ����� ������" id="percent_capital_info">
<h3>�������������� ����� �� ������������� ����� ������</h3>
<p>��������, �� ������� ���������������� ������������ ���������� �����������  (������� �������������  - �������� ��������)  ����� 
    �������������� �������, ���� �������� ����������  ������������� ������ ����� ������� ������. �������� ������ ����������� 
    ������������� ����� ����� ������� ������:</p>
<ul>
    <li>
        <p>����� ���������� ���� ���������� ��������� (���), ������: </p>
        <p><a href="http://www.pfrf.ru/userdata/invest/uk/perech_uk.xls" class="lk2" target="_blank">����������� ��������, ���������� �� ����������� �������� (��)</a>. � ����� ����������� �������� ����� ������� �������� �������,
            � ������� ����� ���� ��������� ���� ���������� ����������, ��� � ��������������� ����������� ��������; </p>
        <p><em>��������������� ����������� �������� (���) - ��������������</em>. ��� ����������� �������� ���������� ���������� ������
            � ��������������� ������ ������, ��� �������� ����� ��������, �� � ����� ����������� ����� ���������� ����������� ������������.</p>
    </li>
    <li>
        <p><a href="http://www.pfrf.ru/userdata/invest/npf/npf.xls" class="lk2" target="_blank">����� ����������������� ���������� ����� (���)</a>,
        ����� �� ����� ������������ ������� �������� ���������� ����������� �������������� ���, ��������� ������� ����������� ������������� �����
        �������� ������ ����� ��������������� ����, � ����� �������������� ������� ���������� ����������, ��������������� ��� ������� ������.</p>
    </li>
</ul>
<p>��������: <a href="http://www.pfrf.ru/investing/" class="lk2" target="_blank">http://www.pfrf.ru/investing/</a></p>
</div>
<div class="ui-dialog-content info hide" title="��������� ���������������� ���������������� ������" id="gos_finance_info">
<h3>��������� ���������������� ���������������� ������</h3>
<p>������� � 1 ������ 2009 ����, �������� ����� ��������� ���� ������� �������� ������ � �������� �����������. � ���������� ���������
    ��������� ��������� ���������������� ���������������� ������: ����� ������� � ������������� ����� ������ ������ ��� ���������,
    ������ ����� � �����������.</p>
<p>��������� ��������� � ������������ � <a href="http://www.pfrf.ru/sofinansirovanie/" class="lk2" target="_blank">����������� ������� �� 30 ������ 2008 �. � 56-�� �� �������������� ��������� ������� �� ������������� ����� �������� ������ � ��������������� ��������� ������������ ���������� ����������</a>.</p>
<p>�������� � ��������� ����� �� 1 ������� 2013 ����. ����������� ����� �������� ��������������� ���� �������������� ���������� ���������� 
    � �������� �� <b>2 000</b> �� <b>12 000</b> ������ ������������ � ������� 10 ��� � ������� ������ ���� ������ ������� � ������ ���������.
    �� ������ ���� ���������� � ������ ������ ����� �������, � ����� ���������� ��� ����������� ������� � ����� ������� ��� ��� �����.</p>
<p>���� �� ������������ �� ������������� ����� ����� ������ 2 000 � ����� ������ � ���, ����������� <b>���������</b> ��� ������: 
    �� ��� �������������� ���������� ���� ����� ����������� ����� �� ����� � �������� 12 000 ������ � ���.</p>
<p>���� �� ������������ �� ������������� ����� ����� ������ <b>�����</b> 2 000 ������ � ���, ���������������� ������ ������������ <b>�� ��������������</b>.</p>
<p>��������: <a href="http://www.pfrf.ru/financed_public_pension/" class="lk2" target="_blank">http://www.pfrf.ru/financed_public_pension/</a></p>
</div>

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
	<!--end content -->