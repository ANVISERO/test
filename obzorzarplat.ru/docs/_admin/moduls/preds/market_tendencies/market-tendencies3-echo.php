<?
echo('
<table width="100%" border="0" cellspacing="0">

<tr valign="top" >
<td width="100%" align="right">
<a href="?step=0" class="link_3">������� ������ ����� ������</a>
</td>
</tr>

<tr valign="top" >
<td width="100%">
<p>�����: '.$city_name.'</p>
<p>'.$factor_name.' '.substr($period,5).', '.substr($period,0,4).' ���</p>


<h3 class="lite">1.	�������� ��������� �� ��������� ����������� ����� � ���������� ����� (���. � �����)</h3>
<table width="100%" border="0" class="X1_lite">
<tr class="X1_lite_0">
  <th></th>
  <th colspan="2">���������� �����</th>
  <th colspan="2">����������� �����</th>
</tr>
<tr class="X1_lite_1">
  <th>���������</th>
  <th>'.substr($period,5).', '.substr($period,0,4).' ���</th>
  <th>'.substr($period_now,5).', '.substr($period_now,0,4).' ���</th>
  <th>'.substr($period,5).', '.substr($period,0,4).' ���</th>
  <th>'.substr($period_now,5).', '.substr($period_now,0,4).' ���</th>
</tr>
');

foreach($job as $job_id){
echo($out[$job_id]);
}

echo('
</table><br>

</td>
</tr>
</table>

<table width="100%" border="0">
<tr valign="top">
<td align="left">
	<form name="back" action="?step=2" method="post">
	<input type="hidden" name="period" value="'.$period.'">
	<input type="hidden" name="city" value="'.$city_id.'">
	<input type="submit" value="<< �����" class="but3_lite">
	</form>
</td>
</tr>
</table>
');

?>