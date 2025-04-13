<p><span class="title_mini_others">1. <a href="/work/summary-analytics/">����� ��������</a></span><span class="title_mini_others"> 2. �����</span></p>

<p>�����: <?php echo($city_name);?></p>
<p><?php echo($factor_name.' '.$factor_value_name);?></p>
<p>��� ��� �������: <b><?php echo $year; ?> ���</b></p>
<p>��� ������ ������������ � ���������� ������ <b>�� ������� ������� (gross)</b></p>

<p align="right">
    <img src="http://obzorzarplat.ru/_img/business/report-excel.png" alt="����� � ������� Excel" title="����� � ������� Excel"><a href="<?php echo($url_xls);?>" target="_blank" class="lk2">����� � ������� Excel</a> |
    <a href="/archive/html.php?d=<?php echo($url);?>" class="lk2" target="_blank">������ ��� ������</a>
</p>

<h3>�������������� �������� ������ ����������� ����� (���. � �����)</h3>
<div id="summary-result">
<ul id="links">
    <li><a href="#" class="link1  active">����������� �����</a></li>
    <li><a href="#" class="link2">���������� �����</a></li>
    <li><a href="#" class="link3">����������� �����</a></li>
    <li><a href="#" class="link4">������</a></li>
    <li><a href="#" class="link5">������</a></li>
    <li><a href="#" class="link6">��������</a></li>
</ul>
<div class="clearfloat"></div>
<table class="business">
<tr>
  <th width="20%">���������</th>
  <th width="10%">10%</th>
  <th width="10%">25%</th>
  <th width="10%">�������</th>
  <th width="10%">50% (�������)</th>
  <th width="10%">75%</th>
  <th width="10%">90%</th>
</tr>
<?php
foreach($job as $job_id){
    ?>

<tr>
<td class="left"><a href="http://obzorzarplat.ru/servis/job_description/view/?id=<?=$job_id;?>&lang=0" target="_blank" class="job"><?=$job_name[$job_id];?></a></td>
<td>
    <div class="link1"><?=$cash_indexes[$job_id][0];?></div>
    <div class="link2"><?=$salary_indexes[$job_id][0];?></div>
    <div class="link3"><?=$base_indexes[$job_id][0];?></div>
    <div class="link4"><?=$premium_indexes[$job_id][0];?></div>
    <div class="link5"><?=$bonus_indexes[$job_id][0];?></div>
    <div class="link6"><?=$compensation_indexes[$job_id][0];?></div>
</td>
<td>
    <div class="link1"><?=$cash_indexes[$job_id][1];?></div>
    <div class="link2"><?=$salary_indexes[$job_id][1];?></div>
    <div class="link3"><?=$base_indexes[$job_id][1];?></div>
    <div class="link4"><?=$premium_indexes[$job_id][1];?></div>
    <div class="link5"><?=$bonus_indexes[$job_id][1];?></div>
    <div class="link6"><?=$compensation_indexes[$job_id][1];?></div>
</td>
<td>
    <div class="link1"><?=$cash_indexes[$job_id][2];?></div>
    <div class="link2"><?=$salary_indexes[$job_id][2];?></div>
    <div class="link3"><?=$base_indexes[$job_id][2];?></div>
    <div class="link4"><?=$premium_indexes[$job_id][2];?></div>
    <div class="link5"><?=$bonus_indexes[$job_id][2];?></div>
    <div class="link6"><?=$compensation_indexes[$job_id][2];?></div>
</td>
<td>
    <div class="link3"><?=$base_indexes[$job_id][3];?></div>
    <div class="link2"><?=$salary_indexes[$job_id][3];?></div>
    <div class="link1"><?=$cash_indexes[$job_id][3];?></div>
    <div class="link4"><?=$premium_indexes[$job_id][3];?></div>
    <div class="link5"><?=$bonus_indexes[$job_id][3];?></div>
    <div class="link6"><?=$compensation_indexes[$job_id][3];?></div>
</td>
<td>
    <div class="link1"><?=$cash_indexes[$job_id][4];?></div>
    <div class="link2"><?=$salary_indexes[$job_id][4];?></div>
    <div class="link3"><?=$base_indexes[$job_id][4];?></div>
    <div class="link4"><?=$premium_indexes[$job_id][4];?></div>
    <div class="link5"><?=$bonus_indexes[$job_id][4];?></div>
    <div class="link6"><?=$compensation_indexes[$job_id][4];?></div>
</td>
<td>
    <div class="link1"><?=$cash_indexes[$job_id][5];?></div>
    <div class="link2"><?=$salary_indexes[$job_id][5];?></div>
    <div class="link3"><?=$base_indexes[$job_id][5];?></div>
    <div class="link4"><?=$premium_indexes[$job_id][5];?></div>
    <div class="link5"><?=$bonus_indexes[$job_id][5];?></div>
    <div class="link6"><?=$compensation_indexes[$job_id][5];?></div>
</td>
</tr>

<?
}
?>

</table>
</div>
<p><input type="button" value="&laquo; ����� �����" class="submit" onclick="self.location.href='/work/summary-special/';"></p>