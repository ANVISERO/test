<?php

$page='';
$page.='
<link href="/_css/summary/summary_print.css" rel="stylesheet" type="text/css">
<div class="summary">
<h2>������� ������������� ����� ���������� ����</h2>
<p>�����: '.$city_name.'</p>
<p>'.$factor_name.' '.$factor_value_name.'</p>


<h3>1.	�������� �������� ����������� ����� (���. � �����)</h3>
<p align="right"><em>������� 1.</em></p>
<table>
<tr class="X1_0">
  <th>���������</th>
  <th>�������</th>
  <th>25%</th>
  <th>�������</th>
  <th>�������</th>
  <th>75%</th>
  <th>��������</th>
  <th>����������</th>
</tr>
';

foreach($job as $job_id){$page.=$out_cash[$job_id];}

$page.='
</table>
<p>��� ������ ������������ � ���������� ������ <b>�� ������� ������� (gross)</b></p>
<br>

<h3>2.	�������� �������� ���������� ����� (���. � �����)</h3>
<p align="right"><em>������� 2.</em></p>
<table>
<tr class="X1_0">
  <th>���������</th>
  <th>�������</th>
  <th>25%</th>
   <th>�������</th>
  <th>�������</th>
  <th>75%</th>
  <th>��������</th>
  <th>����������</th>
</tr>
';

foreach($job as $job_id){$page.=$out_salary[$job_id];}

$page.='
</table>
<p>��� ������ ������������ � ���������� ������ <b>�� ������� ������� (gross)</b></p>
</div>
';


//������ � ����
$fullpath=$filedir.$filename_html;
$file = fopen ("$fullpath","w+");
fputs ( $file, $page);
fclose ($file);

?>