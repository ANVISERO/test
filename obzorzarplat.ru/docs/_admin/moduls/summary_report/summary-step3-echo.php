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
<p>'.$factor_name.' '.$factor_value_name.'</p>


<h3 class="lite">1.	�������� ��������� �� ��������� ����������� ����� (���. � �����)</h3>
<table width="100%" border="0" class="X1_lite">
<tr class="X1_lite_0">
  <th>���������</th>
  <th>�������</th>
  <th>25%</th>
  <th>�������</th>
  <th>�������</th>
  <th>75%</th>
  <th>��������</th>
</tr>
');

foreach($job as $job_id){
echo($out_cash[$job_id]);
}

echo('
</table>
<br>

<h3 class="lite">2.	�������� ��������� �� ��������� ���������� ����� (���. � �����)</h3>
<table width="100%" border="0" class="X1_lite">
<tr class="X1_lite_0">
  <th>���������</th>
  <th>�������</th>
  <th>25%</th>
   <th>�������</th>
  <th>�������</th>
  <th>75%</th>
  <th>��������</th>
</tr>
');

foreach($job as $job_id){
echo($out_salary[$job_id]);
}

echo('
</table><br>

</td>
</tr>
</table>

<table width="100%" border="0">
<tr valign="top">
<td align="left">
	<form name="back" action="?step=4" method="post">
	<input type="hidden" name="factor" value="'.$factor.'">
  <input type="hidden" name="factor_id" value="'.$factor_id.'">
  <input type="hidden" name="factor_prefix" value="'.$factor_prefix.'">
	<input type="hidden" name="city" value="'.$city_id.'">
	<input type="submit" value="<< �����" class="but3_lite">
	</form>
</td>
<td align="right">
<!--
	<form name="form_pdf" action="make_pdf.php" method="post">
	<input type="hidden" name="factor" value="'.$factor.'">
  <input type="hidden" name="factor_id" value="'.$factor_id.'">
	<input type="hidden" name="city" value="'.$city_id.'">
        <input type="hidden" name="job" value="'.$job.'">
	<input type="submit" value="pdf test" class="but3_lite">
	</form>
-->
</td>
</tr>
</table>
');

?>