<p><span class="title_mini_others">1. <a href="?step=1">����� �������� &raquo;</a></span><span class="title_mini_others"> 2. <a href="#">����� ���������� &raquo;</a></span><span class="title_mini"> 3. ����� &raquo;</span></p>
<br>

<h2>������� ������������� ����� ���������� ����</h2>

<p>�����: <?php echo($city_name);?></p>
<p><?php echo($factor_name.' '.$factor_value_name);?></p>
<p>��� ������ ������������ � ���������� ������ <b>�� ������� ������� (gross)</b></p>

<p align="right"><img src="/_img/business/report-excel.png" alt="����� � ������� Excel" title="����� � ������� Excel"><a href="<?php echo($url_xls);?>" target="_blank" class="lk2">����� � ������� Excel &raquo;</a></p>
<p align="right"><a href="/business/archive/html.php?d=<?php echo($url);?>" class="lk2" target="_blank">������ ��� ������ &raquo;</a></p>

<h3>1.	�������� �������� ����������� ����� (���. � �����)</h3>
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
<?php
foreach($job as $job_id){echo($out_cash[$job_id]);}
?>

</table>
<br>

<h3>2.	�������� �������� ���������� ����� (���. � �����)</h3>
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
<?php
foreach($job as $job_id){echo($out_salary[$job_id]);}
?>
</table>
<br>
<!--
<p align="left" style="padding:0; margin:0;">
	<form name="back" action="?step=2" method="post">
	<input type="hidden" name="factor" value="<?php echo($factor);?>">
  <input type="hidden" name="factor_id" value="<?php echo($factor_id);?>">
  <input type="hidden" name="factor_prefix" value="<?php echo($factor_prefix);?>">
	<input type="hidden" name="city" value="<?php echo($city_id);?>">
	<input type="submit" value="&laquo; �����" class="but1">
	</form>
</p>
-->

<p><input type="button" value="����� ����� &raquo;" onclick="self.location.href='/business/work/summary/'" class="but1"></p>