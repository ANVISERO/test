<input type="button" value="<< �����" class="but" onClick="self.location.href='/servis/million/';">
<br><br>
<?
//���� ������
$sal=$_POST['sal']; //��������
$rate_sal=$_POST['rate_sal']+($_POST['rate_sal_dr']/100); //���������� �� � ���
$age=$_POST['age']; //�������
$econom=$_POST['econom']; //����������
$rate=$_POST['rate']+($_POST['rate_dr']/100); // ������� �����
$sav=$_POST['sav']; // ����������� � ��� ������
?>

<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:1px solid #999">
<tr>
<td width="344" height="50" align="right">�������� � ��������� �����</td>
<td width="603"><b><?=$sal;?> ���</b></td>
<td width="260" colspan="2" rowspan="6"><img src="/_img/milliion.gif" width="277" height="277"></td>
</tr>
<tr>
<td width="344" align="right">��������� ���������� ��������</td>
<td><b><?=$rate_sal;?> %</b></td>
</tr> 
<tr>
<td width="344" align="right">����������</td>
<td><b><?=$econom;?> ���</b></td>
</tr>   
<tr>
<td width="344" align="right">���������� ������</td>
<td><b><?=$rate;?> %/���</b></td>
</tr>  
<tr>
<td width="344" align="right">�������</td>
<td><b><?=$age;?> ���</b></td>
</tr>  
<tr>
<td width="344" align="right" valign="top">�� ������������ � ���</td>
<td height="60" valign="top"><b><?=$sav;?> ���</b></td>
</tr>
<tr>
  <td height="93" colspan="4" align="right" valign="top"><div align="left"></div>    <?
if($econom>=1000000)
{
echo('
<center>
<br>
<font style="color:#cc0000"><b>�����������! �� ��� ���������!</b></font>
</center>
');
}
else
{
if($sal>=1000000)
{
echo('
<center>
<br>
<font style="color:#cc0000"><b>�� ������� ����������� ����� ����� ��������� ��������!</b></font>
</center>
');
}
else
{
//������
$age_mil=0;
$econom_1=$econom;
$age_1=$age;
$rate_1=$rate;
$sav_1=$sav;
while ($econom_1<1000000){
$econom_1=$econom_1*(1+$rate_1/100)+$sav_1;
$age_1++;
$age_mil=$age_1;
if($age_mil>=150){break;}
}


$sal_2=$sal;
$sav_2=$sav;
$age_2=$age;
$rate_2=$rate;
$rate_sal_2=$rate_sal;
$econom_2=$econom;

$sal_2=$sal_2*12; // �������� �� ���
$percent=$sav_2/$sal_2;  //����������� ������� �� ��������
while($econom_2<1000000){
$econom_2=$econom_2*(1+$rate_2/100)+$sav_2;
$sal_2=$sal_2*(1+$rate_sal_2/100);
$sav_2=$sal_2*(1+$rate_sal_2/100)*$percent;
$age_2++;
$age_mil2=$age_2;
if($age_mil2>=150){break;}
}
//����� ������

$proc=round(($sav/($sal*12))*100);
echo('
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;���� �� ����� ���������� ����������� <b>'.$sav.'</b> ���/���, �� ����������� ��� ���� �����������, �� ������� ����������� � <font style="font-size:16px; color:#cc0000"><b>'.$age_mil.'</b></font> �����.
<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;���� �� ������ ����������� <b>'.$proc.'</b>% �� ����� ��������, �� � ������ �� ���������, �� ������� �������� ��� ������� � <font style="font-size:16px; color:#cc0000"><b>'.$age_mil2.'</b></font> �����.
<br><br>');

$wid_1=$wid_2=200;
$otn=$age_mil/$age_mil2;
if($otn>=1){$wid_1=200; $wid_2=200/$otn;}
if($otn<1){$wid_2=200; $wid_1=200*$otn;}

echo('<b>���������:</b><br><br>
<table width="100%" border="0" cellspacing="0" cellpadding="6">
  <tr>
    <td width="250" align="right" valign="middle">���������� <b>'.$sav.'</b> ���/���</td>
    <td valign="middle"><img src="/_img/r_dot.gif" width="'.$wid_1.'" height="14" align="absmiddle"> <b>'.$age_mil.'</b> ���</td>
  </tr>
  <tr>
    <td width="250" align="right" valign="middle">���������� <b>'.$proc.'</b> %/���</td>
    <td valign="middle"><img src="/_img/b_dot.gif" width="'.$wid_2.'" height="14" align="absmiddle"> <b>'.$age_mil2.'</b> ���</td>
  </tr>
</table>');
}
}
?></td>
  </tr> 
  </table>


