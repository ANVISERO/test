<style type="text/css">
<!--
.style1 {
	color: #cc0000;
	font-weight: bold;
}
-->
</style>
<input type="button" value="<< �����" class="but" onClick="self.location.href='/servis/lgot/';">
<br><br>
<?
//���� ������
$sal=$_POST['sal']; //��������
$percent=$_POST['percent']; //��������� ����

if($percent==0.6){$percent_echo='�� 5 ���';}
if($percent==0.8){$percent_echo='�� 5 �� 8 ���';}
if($percent==1){$percent_echo='8 ��� � �����';}

//�������
$s_1_1_1=$sal*$percent;if($s_1_1_1>17250){$s_1_1_1=17250;}
$s_1_1_2=$sal*0.6;if($s_1_1_2>17250){$s_1_1_2=17250;}
$s_1_2=$sal*$percent;
$s_1_3=$sal*$percent;if($s_1_3>17250){$s_1_3=17250;}
$s_1_4=$sal*$percent;if($s_1_4>17250){$s_1_4=17250;}
$s_1_5=$sal*$percent;if($s_1_5>17250){$s_1_5=17250;}
$s_1_6_1_1=$sal*$percent;if($s_1_6_1_1>17250){$s_1_6_1_1=17250;}
$s_1_6_1_2=$sal*0.5;if($s_1_6_1_2>17250){$s_1_6_1_2=17250;}

$s_1_6_7=$sal*$percent;if($s_1_6_7>17250){$s_1_6_7=17250;}
$s_1_7_1=$sal*$percent;if($s_1_7_1>17250){$s_1_7_1=17250;}
$s_1_7_2=$sal*$percent;if($s_1_7_2>17250){$s_1_7_2=17250;}
$s_1_8=$sal*$percent;if($s_1_8>17250){$s_1_8=17250;}

$s_2_1_1=$sal;if($s_2_1_1>23400){$s_2_1_1=23400;}
$s_2_1_2=$sal;if($s_2_1_2>23400){$s_2_1_2=23400;}
$s_2_1_3=$sal;if($s_2_1_3>23400){$s_2_1_3=23400;}


$p_1_1_1=$p_1_1_2=$p_1_2='���� ������ ��������� ������������������ �� ��� �������������� ���������������� (������������ ������������ � ������������ ����������� � �������� ������������)';

$p_1_3='�� ����� ������� ������� ������ ��� ���� ������� � ����������� ����';
$p_1_4='�� ��� �������������� ���������������� ��� �� ��� ���������� ������� ����������� ����������� � �������� ������������ ���������� ����������� ������������';
$p_1_5='������ ���������� � ���������-��������� ����������, �� �� ����� ��� 24 ����������� ���';
$p_1_6_1='���� ������ ������������� ������� ��� ����������� ���������� � �������� � ������������ �������-���������������� ����������, �� �� ����� ��� 60 ����������� ���� � ����������� ���� �� ���� ������� ����� �� ���� ��������';
$p_1_6_2='�� ����� ��� 90 ����������� ���� � ����������� ���� �� ���� ������� ����� �� ���� �������� � ����� � ��������� ������������';
$p_1_6_3='�� 15 ����������� ���� �� ������� ������ ������������� ������� ��� ����������� ���������� � �������� � ������������ �������-���������������� ����������, �� �� ����� ��� 45 ����������� ���� � ����������� ���� �� ���� ������� ����� �� ���� ��������';
$p_1_6_4='���� ������ ������������� ������� ��� ����������� ���������� � �������� � ������������ �������-���������������� ����������, �� �� ����� ��� 120 ����������� ���� � ����������� ���� �� ���� ������� ����� �� ���� ��������';
$p_1_6_5='���� ������ ����������� ���������� � �������� � ������������ �������-���������������� ����������';
$p_1_6_6='���� ������ ������������� ������� ��� ����������� ���������� � �������� � ������������ �������-���������������� ����������';
$p_1_6_7='�� ����� ��� �� 7 ����������� ���� �� ������� ������ �����������, �� �� ����� ��� �� 30 ����������� ���� � ����������� ���� �� ���� ������� ����� �� ���� ������ �����';
$p_1_7_1='���� ������ ���������';
$p_1_7_2='���� ������ ���������';
$p_1_8='���� ������ ������������ �� ������ �� ���� �������, ������� ����� ������� � ����� �������������� � �������';
//�����
?>
<a name="0"></a>
<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
<tr>
<td align="right">������� ��������</td>
<td><b><?=number_format($sal);?> ���/�����</b></td>
</tr>
<tr>
  <td align="right">��������� ����</td>
  <td><b><?=$percent_echo;?></b></td>
</tr>
</table>
<h1>�������</h1>
<ul>
<li><a href="#1" class="link_4">������� �� ��������� ������������������</a><br><br>
<li><a href="#2" class="link_4">������� �� ������������� ����������� ����������� � ����� � ������������ � ��������� �����</a><br><br>
<li><a href="#3" class="link_4">������� �� ����������</a><br><br>
</ul>
<p>� 01.01.09 <strong>1 ���� = 4330 �����</strong></p>
<hr>

<!--1. ������� �� ��������� ������������������-->
<a name="1"></a><h2 class="title">1. ������� �� ��������� ������������������</h2>
<table width="100%" class="lgot_disability" border="1" cellpadding="6" cellspacing="0">
  <tr bgcolor="#c0c0c0">
    <th width="5%" align="left"><span class="style1">�</span></th>
    <th align="left" width="30%"><span class="style1">������� ��������� ������������������</span></th>
    <th width="20%" align="left"><span class="style1">�������, ���</span></th>
    <th width="45%" align="left"><span class="style1">����������������� ������� �������</span></th>
  </tr>
  <tr class="table_1">
    <td><strong>1.</strong></td>
    <td><strong>����������� ��� ������, �����������:</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="table_2">
    <td>&nbsp;</td>
    <td><em><strong>1.1.</strong> � ������ �� ��� ���������� ��������� �������� �� ��� ��� �������������</em></td>
    <td><b><?=number_format($s_1_1_1);?></b></td>
    <td><?=$p_1_1_1;?></td>
  </tr>
  <tr class="table_1">
    <td>&nbsp;</td>
    <td><em><strong>1.2.</strong> � ������� 30 ����������� ���� ����� ����������� ������ �� ��������� ��������, ��������� ��� ���� ������������, � ������� ������� ��� �������� ������������� ����������� �����������</em></td>
    <td><b><?=number_format($s_1_1_2);?></b></td>
    <td><?=$p_1_1_2;?></td>
  </tr>
  <tr class="table_2">
    <td><strong>2.</strong></td>
    <td><strong>���������� ������ �� ������������ ��� ���������������� �����������</strong></td>
    <td><b><?=number_format($s_1_2);?></b></td>
    <td><?=$p_1_2;?></td>
  </tr>
  <tr class="table_1">
    <td><strong>3.</strong></td>
    <td><strong>��������� � ������������� ������� ��������� � ����������� ����������� � �������� ������������ (�� ����������� ����������� ������������)</strong></td>
    <td><b><?=number_format($s_1_3);?></b></td>
    <td><?=$p_1_3;?></td>
  </tr>
  <tr class="table_2">
    <td><strong>4.</strong></td>
    <td><strong>����������� ������������</strong></td>
    <td><b><?=number_format($s_1_4);?></b></td>
    <td><?=$p_1_4;?></td>
  </tr>
  <tr class="table_1">
    <td><strong>5.</strong></td>
    <td><strong>����������� � ���������-��������� ����������� ��������������� ����� ������������� �������, ������������� �� ���������� ���������� ���������</strong></td>
    <td><b><?=number_format($s_1_5);?></b></td>
    <td><?=$p_1_5;?></td>
  </tr>
  <tr class="table_2">
    <td><strong>6.</strong></td>
    <td><strong>������������� ������������� ����� �� ������� ������ �����:</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="table_1">
    <td>&nbsp;</td>
    <td><em><strong>6.1.</strong> ���� �� ������� �������� � �������� �� 7 ���</em></td>
    <td rowspan="6">
	<em>� ������ ������������� �������:</em><br>
	<br>
	�� ������ 10 ����������� ���� ������� ��������: <b><?=$s_1_6_1_1;?></b> ���.<br>
	�� ����������� ���: <b><?=$s_1_6_1_2;?></b> ���.<br>
	<br>
	<em>��� ������������ ������� ������� ��������: </em><br>
	<br>
	<b><?=$s_1_6_1_1;?></b> ���.
	</td>
    <td><?=$p_1_6_1;?></td>
  </tr>
    <tr class="table_2">
    <td>&nbsp;</td>
    <td><em><strong>6.2.</strong> ���� �� ������� �������� � �������� �� 7 ��� � ������ ����������� �������, ����������� � �������� �����������, ������������ ����������� ������� �������������� ������, �������������� ������� �� ��������� ��������������� �������� � ����������-��������� ������������� � ����� ��������������� � ����������� ��������</em></td>
    <td><?=$p_1_6_2;?></td>
  </tr>
    <tr class="table_1">
    <td>&nbsp;</td>
    <td><em><strong>6.3</strong>. ���� �� ������� �������� � �������� �� 7 �� 15 ���</em></td>
    <td><?=$p_1_6_3;?></td>
  </tr>
    <tr class="table_2">
    <td>&nbsp;</td>
    <td><em><strong>6.4.</strong> ���� �� ������� ��������-��������� � �������� �� 15 ���</em></td>
    <td><?=$p_1_6_4;?></td>
  </tr>
    <tr class="table_1">
    <td>&nbsp;</td>
    <td><em><strong>6.5.</strong> ���� �� ������� �������� � �������� �� 15 ���, ���������� ���-��������������</em></td>
    <td><?=$p_1_6_5;?></td>
  </tr>
    <tr class="table_2">
    <td>&nbsp;</td>
    <td><em><strong>6.6. </strong>���� �� ������� �������� � �������� �� 15 ��� ��� ��� �������, ��������� � ���������������� �����������</em></td>
    <td><?=$p_1_6_6;?></td>
  </tr>
    <tr class="table_1">
    <td>&nbsp;</td>
    <td><em><strong>6.7.</strong> ��������� ������ ����� �� ������� ������ ����� ��� ������������ �������</em></td>
    <td><b><?=number_format($s_1_6_7);?></b></td>
    <td><?=$p_1_6_7;?></td>
  </tr>
    <tr class="table_2">
    <td><strong>7.</strong></td>
    <td><strong>��������:</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
      <tr class="table_1">
    <td>&nbsp;</td>
    <td><em><strong>7.1.</strong> �������� ��������������� ����, ����������������� � ������������ ������� ��� � �������� �������� ��������������������</em></td>
    <td><b><?=number_format($s_1_7_1);?></b></td>
    <td><?=$p_1_7_1;?></td>
  </tr>
      <tr class="table_2">
    <td>&nbsp;</td>
    <td><em><strong>7.2.</strong> �������� ������� � �������� �� 7 ���, ����������� ���������� ��������������� ����������, ��� ������� ����� �����, ����������� � ������������� ������� ��������������</em></td>
    <td><b><?=number_format($s_1_7_2);?></b></td>
    <td><?=$p_1_7_2;?></td>
  </tr>
      <tr class="table_1">
    <td><strong>8. </strong></td>
    <td><strong>�������������� �� ����������� ����������</strong></td>
    <td><b><?=number_format($s_1_8);?></b></td>
    <td><?=$p_1_8;?></td>
  </tr>
</table>
<p>��������������� ����, �������� ��������� ���� ����� ����� �������, 
������� �� ��������� ������������������ ������������� � �������, �� ����������� �� ������ ����������� ����� ������������ ������� ������ �����, 
�������������� ����������� �������, � � ������� � ����������, � ������� � ������������� ������� ����������� �������� ������������ � ���������� �����, � �������, 
�� ����������� ������������ ������� ������ ����� � ������ ���� �������������.
</p>

<p>� ������, ���� �������������� ���� �������� � ���������� �������������, 
������ ������� �� ��������� ������������������ �� ����� ��������� ��������� ������������ ������ ���������� ������� �� ������� ����� ������.
</p>
<p align="right"><a href="#0" class="link_7">[�����]</a></p>
<hr>

<!--2. ������� �� ������������� ����������� ����������� � ����� � ������������ � ��������� �����-->
<a name="2"></a><h2 class="title">2. ������� �� ������������� ����������� ����������� � ����� � ������������ � ��������� �����</h2>

<table width="100%" class="lgot_pregnancy" border="1" cellpadding="6" cellspacing="0">
<tr bgcolor="#c0c0c0">
    <td width="30%"><span class="style1">�������</span></td>
    <td width="30%"><span class="style1">������ � ������ ������������ ���������� � 1,0185 � 01.01.2009</span></td>
    <td width="40%"><span class="style1">��������� ��� ���������� �������</span></td>
</tr>
<tr>
  <td>�������������� ������� ��������, �������� �� ���� � ����������� ����������� � ������ ����� ������������</td>
  <td><strong>359,7 ������</strong></td>
  <td>������� �� ������� ������������ � ���������� �� ���� �� 12 ������ ������������.</td>
</tr>
<tr>
  <td>������� �� ������������ � ����� ��������, ��������� � ����� � ����������� 
          �����������, ����������, ����������� � ������� 12 �������, �������������� ��� ��������� �� � ������������� ������� ������������
  </td>
  <td><strong>359,7 �����</strong></td>
  <td>
    ������� ����������� � ������������� �������� ���������� ������ ��������� �� ����� ���������� ��� ���� ���������� �����������:
    <ol>
      <li>��������� � ���������� �������.</li>
      <li>������ ������������������.</li>
      <li>������� �� �������� ������ � ��������� ����� ������.</li>
      <li>������� �� ������� ��������������� ������ ��������� ��������� � ��������� �� ������������.</li>
    </ol>
  </td>
</tr>
<tr>
  <td>�������������� ������� ��� �������� ������</td>
  <td><strong>9592,03 �����</strong></td>
  <td>
    <ol>
      <li>���������</li>
      <li>������� �����.</li>
      <li>������� � ����� ������ ������� �������� � ���, ��� �� �� ������� �������.</li>
    </ol>
  </td>
</tr>
<tr>
  <td>����������� ������� �� ����� �� �������� ��� ����������</td>
  <td>
    <p>40 % �������� ��������� �� ��������� 12 ����������� �������, ���������������� ������ ����������� ������� �� ����� �� ��������, 
    �� �� ����� <strong>1798,51 �����</strong> �� ����� �� ������ �������� � <strong>3597,01 �����</strong> �� ����� �� ������ �������� � ������������ ������.
    </p>
    <p>������������ ������ ������� �� ����� ��������� <strong>7194,03 ����� � �����</strong>.</p>
    <p>������������� ������ ������� �� ����� ��������� 100 % ������� ���������.</p>
  </td>
  <td>
    <ol>
      <li>���������</li>
      <li>����� ������������� � �������� ������</li>
      <li>����� ������������ � �������� ���������� �����</li>
      <li>������� �� ������� �� ������������ ��� �������� �����</li>
      <li>������� � ����� ������ (������ ���������� ������ ���������) ������� �������� � ���, ��� �� �� �������� ����������� ������� �� ����� �� ��������</li>
    </ol>
  </td>
</tr>
<tr>
  <td>����������� ������� �� ����� �� �������� ��� ������������ (����������� � ������� ���������� ������ ��������� �� ����� ����������)</td>
  <td>
    <p><strong>1798,51 �����</strong> �� ����� �� ������ ��������</p>
    <p><strong>3597,01 �����</strong> �� ����� �� ������ �������� � ������������ ������</p>
  </td>
  <td>
    <ol>
      <li> ���������</li>
      <li>����� ������������� � �������� ������</li>
      <li>����� ������������ � �������� ���������� �����</li>
      <li>������� �� ������� �� ������������ ��� �������� �����</li>
      <li>������� � ����� ������ (������ ���������� ������ ���������) ������� �������� � ���, ��� �� �� �������� ����������� ������� �� ����� �� ��������</li>
    </ol>
  </td>
</tr>
</table>

<p align="right"><a href="#0" class="link_7">[�����]</a></p>
<hr>

<!--3. ������� �� ����������-->
<a name="3"></a><h2 class="title">3. ������� �� ����������</h2>
<p>���������� ������� �� ���������� ���������� ������� ����������� � �������, �� ����������� �������������� ������� ����������� ������ �����. 
� 1 ������ 2009 ���� ������ ������� ���������� � ������� ������ � <b>4000 ������</b>. 
������� ������������� ������ �� �������������, �������� �� ���� ����������� ����������� ����������.
</p>
<p>� ������� � ����������, ��� ����������� �������� ����������� � ���������� �����, ���������� ������� �� ���������� ������������� � ������ ���� �������������.</p>
<p>������� �������� ��������, ��� �� ���� ������� ����� ����������� ����������� ���������� ��������� ��������� ���������� ������� ������������� 
�� ���������� ������� ���������� ������� � ������� ������������������ ������ ����� ���������� �������.
</p>
<p>������� ����������� ������� �� ���������� ������������ ������������, 
� ������� ������� �������, ���� �������� ���� �� ��������� ��� ������ ���� ����� �������� ������������������� �� ��������� ������� � ������.
</p>
<p>���������� ������� �� ���������� �������������, ���� ��������� �� ��� ����������� �� ������� ����� ������� �� ��� ������.</p>
<p align="right"><a href="#0" class="link_7">[�����]</a></p>