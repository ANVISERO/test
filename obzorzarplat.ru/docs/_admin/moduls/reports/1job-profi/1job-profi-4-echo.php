<div id="menu_report">
    <p align="center"><b>���������� ������:</b></p>
    <ol>
        <li><a href="#zp1">��������� ��������� ��������������</a></li>
        <li><a href="#zp2">�������� ������</a></li>
        <li><a href="#zp3">��������������� � ������������� �������</a></li>
        <li><a href="#zp4">������</a></li>
        <li><a href="#zp5">������� ����������� (������� / ��������� / �����)</a></li>
        <li><a href="#zp6">��������������� �������</a></li>
        <li><a href="#zp7">��������� �������� � ���������� ���������</a></li>
        <li><a href="#zp8">�����������, ��������, �����</a></li>
        <li><a href="#zp9">�������� � ��������</a></li>
        <li><a href="#zp10">������</a></li>
        <li><a href="#zp11">���������</a></li>
        <li><a href="#zp12">����������� ����������</a></li>
    </ol>
</div>

<p><span class="title_mini_others">1. <a href="?step=1">����� ���������</a> &raquo;</span><span class="title_mini_others">2. <a href="#" onclick="return document.back.submit();">�������������� ��������</a> &raquo;</span><span class="title_mini"> 3. ����� &raquo;</span></p>

<h2>������������� ����� ���������� ����� <?php echo($job_name_partitive.' '.$city_name_partitive);?></h2>

<p>�������������� ��������:</p>
<ul>
    <li>����� ������������ ��������: <em><?php echo($sphere_name);?></em></li>
    <li>���������� ����������� � ��������: <em><?php echo($personal_name);?></em></li>
    <li>������ ��������: <em><?php echo($turnover_name);?> ���. ���. � ���</em></li>
</ul>
<p>��� ������ ������������ � ���������� ������ <b>�� ������� ������� (gross)</b></p>
<p>���� ���������� ���������� ������ �� ��������� ���������: <b><?php echo($dateUpdateMax.' ����');?></b></p>

<p align="right"><a href="/business/archive/html.php?d=<?php echo($url);?>" class="lk2" target="_blank">������ ��� ������ &raquo;</a></p>
<br>
<div id="pagecontent">

<h2 class="tabset_label">Table of Contents</h2>
<ul class="tabset_tabs">
	<li><a href="#zp1" class="active">��� 1</a></li><li><a href="#zp2">��� 2</a></li><li><a href="#zp3">��� 3</a></li><li><a href="#zp4">��� 4</a></li><li><a href="#zp5">��� 5</a></li><li><a href="#zp6">��� 6</a></li><li><a href="#zp7">��� 7</a></li><li><a href="#zp8">��� 8</a></li><li><a href="#zp9">��� 9</a></li><li><a href="#zp10">��� 10</a></li><li><a href="#zp11">��� 11</a></li><li><a href="#zp12">��� 12</a></li>
</ul>


<div id="zp1" class="tabset_content">
<h2 class="tabset_label">��� 1</h2>

<h3>1. ��������� ��������� ��������������</h3>

<!--1.1 ������������� ������������� ������ ���������� ����� (���. � �����)-->

<h4>1.1 ������������� ������������� ������ ���������� ����� (���. � �����)</h4>
<p>���������� ����� �������� � ���� �����, ��������, �������, ������ � ������.</p>
<p class="table_title">������� 1.1</p>
<table class="X1" border="0">
<tr class="X1_0">
  <th>��������� �������� ���������� �����, ���. ���.</th>
  <th>���������� ����������� (% �� ������ ����� �����������)</th>
</tr>

<?php
$color=1;
foreach($sal_print as $key => $sal){
echo("<tr class='X1_".$color."'><td class='X1_left'>".$key."</td><td align='left'>".graf($sal,number_format($sal,1))."</td></tr>");
$color=1-$color;
}
?>

</table>
<p class="line"> </p>
<br>

<!--1.2 ������������� ������������� ������ ����������� ����� (���. � �����)-->

<h4>1.2 ������������� ������������� ������ ����������� ����� (���. � �����)</h4>
<p class="table_title">������� 1.2</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th>��������� �������� ����������� �����, ���. ���.</th>
  <th>���������� ����������� (% �� ������ ����� �����������)</th>
</tr>

<?php
$color=1;
foreach($cash_print as $key => $cash1){
echo("<tr class='X1_".$color."'><td class='X1_left'>".$key."</td><td align='left'>".graf($cash1, number_format($cash1,1))."</td></tr>");
$color=1-$color;
}
?>

</table>

<!--1.3	�������������� �������� ������ ����������� ����� (���. � �����)-->

<h4>1.3	�������������� �������� ������ ����������� ����� (���. � �����)</h4>
<p class="table_title">������� 1.3</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th></th>
  <th>�������</th>
  <th>�������</th>
  <th>��������</th>
</tr>
<tr class="X1_1">
  <td class="X1_left">����������� �����</td>
  <td class="X1_right"><?=$cashMin;?></td>
  <td class="X1_right"><?=$cashAvg;?></td>
  <td class="X1_right"><?=$cashMax;?></td>
</tr>
<tr class="X1_0">
  <td class="X1_left">���������� �����</td>
  <td class="X1_right"><?=$salMin;?></td>
  <td class="X1_right"><?=$salAvg;?></td>
  <td class="X1_right"><?=$salMax;?></td>
</tr>
<tr class="X1_1">
  <td class="X1_left">����������� �����</td>
  <td class="X1_right"><?=$baseMin;?></td>
  <td class="X1_right"><?=$baseAvg;?></td>
  <td class="X1_right"><?=$baseMax;?></td>
</tr>
<tr class="X1_0">
  <td class="X1_left">������</td>
  <td class="X1_right"><?=$prmMin;?></td>
  <td class="X1_right"><?=$prmAvg;?></td>
  <td class="X1_right"><?=$prmMax;?></td>
</tr>
<tr class="X1_1">
  <td class="X1_left">������</td>
  <td class="X1_right"><?=$bonMin;?></td>
  <td class="X1_right"><?=$bonAvg;?></td>
  <td class="X1_right"><?=$bonMax;?></td>
</tr>
<tr class="X1_0">
  <td class="X1_left">��������</td>
  <td class="X1_right"><?=$compMin;?></td>
  <td class="X1_right"><?=$compAvg;?></td>
  <td class="X1_right"><?=$compMax;?></td>
</tr>
</table>

<!--1.3	��������� ����������� ����� (% �� ������� ����������� �����)-->

<!--1.4	�������� ��������� �� ��������� ����������� ����� � ���������� ����� (���. � �����)-->
<h4>1.4	�������� ��������� �� ��������� ����������� ����� � ���������� ����� (���. � �����)</h4>
<p class="table_title">������� 1.4</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th></th>
  <th>����������� �����</th>
  <th>���������� �����</th>
</tr>
<tr class="X1_1">
  <td class="X1_left">���������� 10</td>
  <td class="X1_right"><?=number_format(percentile($cash,10),0,',',' ');?></td>
  <td class="X1_right"><?=number_format(percentile($salary,10),0,',',' ');?></td>
</tr>
<tr class="X1_0">
  <td class="X1_left">���������� 25</td>
  <td class="X1_right"><?=number_format(percentile($cash,25),0,',',' ');?></td>
  <td class="X1_right"><?=number_format(percentile($salary,25),0,',',' ');?></td>
</tr>
<tr class="X1_1">
  <td class="X1_left">���������� 50</td>
  <td class="X1_right"><?=number_format(percentile($cash,50),0,',',' ');?></td>
  <td class="X1_right"><?=number_format(percentile($salary,50),0,',',' ');?></td>
</tr>
<tr class="X1_0">
  <td class="X1_left">������� ��������</td>
  <td class="X1_right"><?=number_format(average($cash),0,',',' ');?></td>
  <td class="X1_right"><?=number_format(average($salary),0,',',' ');?></td>
</tr>
<tr class="X1_1">
  <td class="X1_left">���������� 75</td>
  <td class="X1_right"><?=number_format(percentile($cash,75),0,',',' ');?></td>
  <td class="X1_right"><?=number_format(percentile($salary,75),0,',',' ');?></td>
</tr>
<tr class="X1_0">
  <td class="X1_left">���������� 90</td>
  <td class="X1_right"><?=number_format(percentile($cash,90),0,',',' ');?></td>
  <td class="X1_right"><?=number_format(percentile($salary,90),0,',',' ');?></td>
</tr>
</table>
<br/>

</div>

<div id="zp2" class="tabset_content">
<h2 class="tabset_label">��� 2</h2>

<h3>2. �������� ������</h3>

<h4>2.1 ����� ������ ������.</h4>
<p class="table_title">������� 2.1</p>
<table class="X1" border="0">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%" class="X1_right">���� �����������</th>
</tr>

<?php
$color=1;
foreach($payment as $k=>$pay) {
    if($pay==0){$pay_print="-";}
    else{$pay_print=number_format($pay,1,',',' ')."%";}
  echo("<tr class='X1_".$color."'><td class='X1_left'>".$k."</td><td class='X1_right'>".$pay_print."</td></tr>");
  $color=1-$color;
};
?>

</table><br>

<h4>2.2 ������������� ������ ������.</h4>
<p class="table_title">������� 2.2</p>
<table class="X1" border="0">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%" class="X1_right">���� �����������</th>
</tr>

<?php
$color=1;
foreach($period as $k=>$pd) {
    if($pd==0){$pd_print="-";}
    else{$pd_print=number_format($pd,1,',',' ')."%";}
  echo("<tr class='X1_".$color."'><td class='X1_left'>".$k."</td><td class='X1_right'>".$pd_print."</td></tr>");
  $color=1-$color;
}
?>

</table><br>

<h4>2.3 ������� ���������� �������.</h4>
<p class="table_title">������� 2.3</p>
<table class="X1" border="0">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%" class="X1_right">���� �����������</th>
</tr>

<?php
$color=1;
foreach($freq as $k=>$fr) {
    if($fr==0){$fr_print="-";}
    else{$fr_print=number_format($fr,1,',',' ')."%";}
  echo("<tr class='X1_".$color."'><td class='X1_left'>".$k."</td><td class='X1_right'>".$fr_print."</td></tr>");
  $color=1-$color;
}
?>

</table><br>

<h4>2.4 �������� �������� ������� �������.</h4>
<p class="table_title">������� 2.4</p>
<table class="X1" border="0">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%" class="X1_right">���� �����������</th>
</tr>

<?php
$color=1;
foreach($currency as $k=>$cur) {
  echo("<tr class='X1_".$color."'><td class='X1_left'>".$k."</td><td class='X1_right'>".number_format($cur,1,',',' ')." % </td></tr>");
  $color=1-$color;
}
?>

</table>

</div>

<!--3	��������������� � ������������� �������-->
<div id="zp3" class="tabset_content">
<h2 class="tabset_label">��� 3</h2>

<h3>3.	��������������� � ������������� �������</h3>
<?php
if($out3!==null){foreach($out3 as $table3){echo $table3;}}
else{echo("<p>������� �����, ������� ������������� ��������������� � ������������� ������� - 0,00%</p>");}
?>
</div>
<!--����� ��������������� � ������������� ������-->

<!--4	������-->
<div id="zp4" class="tabset_content">
<h2 class="tabset_label">��� 4</h2>

<h3>4.	������</h3>

<?php
if($out4!==null){
$number=1;

foreach($out4 as $premium_type => $table4){

//$zag4=mysqli_result(mysqli_query($link,"select title from base_premium_types where id in(select type_id from base_premium_titles where id='$title_id')"),0,0);

echo("<h4>4.".$number." ".$premium_type."</h4>");
echo('<p class="table_title">������� 4.'.$number.'</p>');
echo($table4);

$number++;
};
}
?>

</div>
<!--����� ������-->

<!--5	������� ����������� (������� / ��������� / �����)-->
<div id="zp5" class="tabset_content">
<h2 class="tabset_label">��� 5</h2>

<h3>5.	������� ����������� (������� / ��������� / �����)</h3>
<?php
if($out5!==null){foreach($out5 as $table5){echo $table5;}}
else{echo("<p>������� �����, ������� ������������� ������� ����������� - 0,00%</p>");}
?>
</div><!--/zp5-->

<!--6	��������������� �������.-->
<div id="zp6" class="tabset_content">
<h2 class="tabset_label">��� 6</h2>

<h3>6.	��������������� �������</h3>

<p>������� �����������, ������� ���������� � ��������� ������������: <strong><?=number_format($tab6[2],1);?>%</strong></p>

<?php
if($tab6[2]!=0){
?>
<h4>6.1 ������������ ��� ����������</h4>
<p class="table_title">������� 6.2</p>
<table width="100%" border="0" class="X1">
<tr class="X1_0">
  <th width="50%"></th>
  <th width="30%"></th>
  <th width="20%">���� �����������*</th>
</tr>
<tr class="X1_1"><td class="X1_left">��������������� ��������� </td><td></td><td class="X1_right"><b><?=$tab6_1[1][1];?></b></td></tr>
<tr class="X1_0"><td></td><td class="X1_left">��������</td><td class="X1_right"><?=$tab6_1[1][2];?></td></tr>
<tr class="X1_1"><td></td><td class="X1_left">����</td><td class="X1_right"><?=$tab6_1[1][3];?></td></tr>
<tr class="X1_0"><td></td><td class="X1_left">�������� ����</td><td class="X1_right"><?=$tab6_1[1][4];?></td></tr>
<tr class="X1_1"><td class="X1_left">����������� ���������</td><td></td><td class="X1_right"><b><?=$tab6_1[2][1];?></b></td></tr>
<tr class="X1_0"><td></td><td class="X1_left">������-�����</td><td class="X1_right"><?=$tab6_1[2][3];?></td></tr>
<tr class="X1_1"><td></td><td class="X1_left">������ �����</td><td class="X1_right"><?=$tab6_1[2][2];?></td></tr>
<tr class="X1_0"><td></td><td class="X1_left">������-�����</td><td class="X1_right"><?=$tab6_1[2][4];?></td></tr>
</table>
<br>

<table border="0" width="100%">
<tr>
    <td width="960" valign="top" style="background-image:url(/_img/g_dot_2.gif); background-position:bottom; background-repeat:repeat-x;"></td>
</tr>
</table>
<p>* ���� ���������� ������������, ��������������� ��������, ������������� �������� (���������, �����, ����� ������������ ��������, ������ ��������)</p>

<h4>6.2 ���������� ����������������</h4>
<p class="table_title">������� 6.2</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">���� �����������*</th>
  <th width="20%">������� �������� ������, ���.</th>
</tr>
<tr class="X1_1"><td class="X1_left">������ / ������� ���������</td><td class="X1_right"><?=$tab6_2[1][1];?></td><td class="X1_right"><?php echo($tab6_2[1][2]);?></td></tr>
<tr class="X1_0"><td class="X1_left">������</td><td class="X1_right"><?=$tab6_2[2][1];?></td><td class="X1_right"><?php echo($tab6_2[2][2]);?></td></tr>
<tr class="X1_1"><td class="X1_left">������</td><td class="X1_right"><?=$tab6_2[3][1];?></td><td class="X1_right"><?php echo($tab6_2[3][2]);?></td></tr>
</table>
<br>

<h4>6.3 �������� ������� � ������������</h4>
<p class="table_title">������� 6.3</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">���� �����������*</th>
  <th width="20%">������� �������� ������, ���./����</th>
</tr>
<tr class="X1_1"><td class="X1_left">�������� �������, ������ / ������� ���������</td><td class="X1_right"><?=$tab6_3[1][1];?></td><td class="X1_right"><?php echo($tab6_3[1][2]);?></td></tr>
<tr class="X1_0"><td class="X1_left">�������� �������, ������</td><td class="X1_right"><?=$tab6_3[2][1];?></td><td class="X1_right"><?php echo($tab6_3[2][2]);?></td></tr>
<tr class="X1_1"><td class="X1_left">�������� �������, ������</td><td class="X1_right"><?=$tab6_3[3][1];?></td><td class="X1_right"><?php echo($tab6_3[3][2]);?></td></tr>
</table>
<br>

<table border="0" width="100%">
<tr>
    <td width="960" valign="top" style="background-image:url(/_img/g_dot_2.gif); background-position:bottom; background-repeat:repeat-x;"></td>
</tr>
</table>
<br>

<h4>6.4 ������������ ������� � ������������</h4>
<p class="table_title">������� 6.4</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">���� �����������*</th>
  <th width="20%">������� �������� ������, ���.</th>
</tr>
<tr class="X1_1"><td class="X1_left">������������� ����� � ������/������� ���������</td><td class="X1_right"><?=$tab6_4[1][1];?></td><td class="X1_right"><?php echo($tab6_4[1][2]);?></td></tr>
<tr class="X1_0"><td class="X1_left">������������� ����� � ������</td><td class="X1_right"><?=$tab6_4[2][1];?></td><td class="X1_right"><?php echo($tab6_4[2][2]);?></td></tr>
<tr class="X1_1"><td class="X1_left">������������� ����� � ������</td><td class="X1_right"><?=$tab6_4[3][1];?></td><td class="X1_right"><?php echo($tab6_4[3][2]);?></td></tr>
</table>
<br>

<h4>6.5 ����� ����������������</h4>
<p class="table_title">������� 6.5</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">���� �����������*</th>
  <th width="20%">������� �������� ������, ���.</th>
</tr>
<tr class="X1_1"><td class="X1_left">��������� �����</td><td class="X1_right"><?=$tab6_5[1][1];?></td><td class="X1_right"><?php echo($tab6_5[1][2]);?></td></tr>
<tr class="X1_0"><td class="X1_left">������������� �����</td><td class="X1_right"><?=$tab6_5[2][1];?></td><td class="X1_right"><?php echo($tab6_5[2][2]);?></td></tr>
</table>
<br>

<?php
}
?>

</div><!--/zp6-->

<!--7	��������� �������� � ���������� ���������.-->
<div id="zp7" class="tabset_content">
<h2 class="tabset_label">��� 7</h2>

<h3>7.	��������� �������� � ���������� ���������</h3>

<h4>�������</h4>
<p>������� �����������, ������� ��������������� �������: <strong><?php echo($tab7[2]);?>%</strong></p>
<p>������� ��������� �������� �������� �������� ���������� �� ��������� ���: <strong><?php echo($tab7[3]);?> ���.</strong></p>

<?php
    if($tab7[2]!=0){
?>

<h4>7.1 ������� ������� ������������</h4>
<p class="table_title">������� 7.1</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="50%"></th>
  <th width="30%"></th>
  <th width="20%">���� �����������*</th>
</tr>
<tr class="X1_1"><td class="X1_left">������� ��������������� ��� ������������ ��������</td><td></td><td class="X1_right"><b><?=$tab7_1[1][1];?></b></td></tr>
<tr class="X1_0"><td></td><td class="X1_left">���� ������ ���������� � ��������</td><td class="X1_right"><?=$tab7_1[1][2];?></td></tr>
<tr class="X1_1"><td></td><td class="X1_left">����� ����������</td><td class="X1_right"><?=$tab7_1[1][3];?></td></tr>
<tr class="X1_0"><td></td><td class="X1_left">������ ������������</td><td class="X1_right"><?=$tab7_1[1][4];?></td></tr>
<tr class="X1_1"><td></td><td class="X1_left">������ ������</td><td class="X1_right"><?=$tab7_1[1][5];?></td></tr>
<tr class="X1_0"><td class="X1_left">������� ��������������� ��� �������</td><td></td><td class="X1_right"><b><?=$tab7_1[2][1];?></b></td></tr>
</table>
<br>

<h4>7.2 ���� ��������</h4>
<p class="table_title">������� 7.2</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">���� �����������*</th>
</tr>
<tr class="X1_1"><td class="X1_left">������ �� ������� ������������</td><td class="X1_right"><?=$tab7_2[1];?></td></tr>
<tr class="X1_0"><td class="X1_left">������ �� ������� ����������</td><td class="X1_right"><?=$tab7_2[2];?></td></tr>
<tr class="X1_1"><td class="X1_left">������ �� ������� �����-, �����-, �������, ������������ �������</td><td class="X1_right"><?=$tab7_2[3];?></td></tr>
<tr class="X1_0"><td class="X1_left">������ �� ������ ��������</td><td class="X1_right"><?=$tab7_2[4];?></td></tr>
<tr class="X1_1"><td class="X1_left">������ �������</td><td class="X1_right"><?=$tab7_2[5];?></td></tr>
</table>
<br>

<h4>7.3 ������� �� �������</h4>
<p class="table_title">������� 7.3</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">���� �����������*</th>
</tr>
<tr class="X1_1"><td class="X1_left">������������� ������</td><td class="X1_right"><?=$tab7_3[1];?></td></tr>
<tr class="X1_0"><td class="X1_left">������� �� �������</td><td class="X1_right"><?=$tab7_3[2];?></td></tr>
</table><br>

<?php
}
?>
</div><!--/zp7-->

<!--8	�����������, ��������, �����.-->
<div id="zp8" class="tabset_content">
<h2 class="tabset_label">��� 8</h2>

<h3>8.	�����������, ��������, �����</h3>

<h4>8.1 ����������������� �����������</h4>
<p class="table_title">������� 8.1</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">���� �����������</th>
   <th width="20%">������� �������� ������, ���.</th>
</tr>
<tr class="X1_1"><td class="X1_left">����������������� ����������� �����</td><td class="X1_right"><?=$tab8_2[0][0];?></td><td class="X1_right"><?php echo($tab8_2[0][1]);?></td></tr>
<tr class="X1_0"><td class="X1_left">����������������� ����������� �����������</td><td class="X1_right"><?=$tab8_2[1][0];?></td><td class="X1_right"><?php echo($tab8_2[1][1]);?></td></tr>
<tr class="X1_1"><td class="X1_left">����������������� ���������� �����������</td><td class="X1_right"><?=$tab8_2[2][0];?></td><td class="X1_right"><?php echo($tab8_2[2][1]);?></td></tr>
</table>
<br>

<h4>8.2 ����������� ������������</h4>
<p class="table_title">������� 8.2</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">���� �����������</th>
  <th width="20%">������� �������� ������, ���./���.</th>
</tr>

<?php
$q_tab8_1=mysqli_query($link,"select * from base_compensations where type_id=31");

$col=1;

while($tab8_1=mysqli_fetch_array($q_tab8_1)){
$id=$tab8_1["id"];
$title=$tab8_1["title"];

$comp_keys8=array_keys($compensation_id,$id);
  foreach($comp_keys8 as $i => $key){
    if($sum[$key]!=0){
    $res8[$id][$i]=$sum[$key];
    }
  }

if($comp_people[$id]==0){
$tab8_perc="-";
}else{
$tab8_perc=number_format($comp_people[$id]/$people_sum*100,2)."%";
}

if($res8[$id]==0){
$tab8_rub="-";
}else{
$tab8_rub=number_format(average($res8[$id]),0,',',' ');
}

echo('
<tr class="X1_'.$col.'"><td class="X1_left">'.$title.'</td><td class="X1_right">'.$tab8_perc.'</td><td class="X1_right">'.$tab8_rub.'</td></tr>
');
$col=1-$col;
}
?>

</table><br>

<h4>8.3 �������������� ��������� �� ������������</h4>
<p class="table_title">������� 8.3</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">���� �����������*</th>
</tr>
<tr class="X1_1"><td class="X1_left">�������������� ������������� ���������� �������</td><td class="X1_right"><?php echo($tab8_3[0]);?></td></tr>
<tr class="X1_0"><td class="X1_left">������ �� ������������ (�� �����)</td><td class="X1_right"><?php echo($tab8_3[1]);?></td></tr>
<tr class="X1_1"><td class="X1_left">������ �� ����� (����� �����)</td><td class="X1_right"><?php echo($tab8_3[2]);?></td></tr>
</table><br>

<h4>8.4 ������� �������</h4>
<p class="table_title">������� 8.3</p>
<table border="0" class="X1">
<tr class="X1_0"><td class="X1_left">������� �����������, ������� ������������ ������� �������: <strong><?php echo($tab8_4[0]);?>%</strong></td></tr>
<tr class="X1_1"><td class="X1_left">������� �������� ������ �������� �� ������� �������: <strong><?php echo($tab8_4[1]);?> ���.</strong></td></tr>
</table><br>

</div> <!--/zp8-->

<!--9	�������� � ��������.-->
<div id="zp9" class="tabset_content">
<h2 class="tabset_label">��� 9</h2>

<h3>9. �������� � ��������</h3>

<p>������� �����������, ������� ������������ ��������: <strong><?php echo($tab9_1[0]);?>%</strong></p>

<?php
if($comp_people[208]!=0){
?>

<h4>9.1 �������������� �������� ���������� � ��������</h4>
<p class="table_title">������� 9.1</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">���� �����������*</th>
</tr>
<tr class="X1_1"><td class="X1_left">���������� �������������� ������ �� �������� ����������</td><td class="X1_right"><?php echo($tab9_2[0]);?></td></tr>
<tr class="X1_0"><td class="X1_left">������ �� �������� ���������� �� �������������, �� ������ ����������</td><td class="X1_right"><?php echo($tab9_2[1]);?></td></tr>
</table>
<br>

<h4>9.2 ������ �� �������� ����������</h4>
<p class="table_title">������� 9.2</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">������� ��������, ���.</th>
</tr>
<tr class="X1_1"><td class="X1_left">������� �� �������� �� ��� ���������</td><td class="X1_right"><?php echo($tab9_3[0]);?></td></tr>
<tr class="X1_0"><td class="X1_left">������ ������� �� �������� ������ ����������</td><td class="X1_right"><?php echo($tab9_3[1]);?></td></tr>
</table>
<br>

<h4>9.3 �������� �������� ����������� � ��������</h4>
<p class="table_title">������� 9.3</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">���� �����������*</th>
</tr>
<tr class="X1_1"><td class="X1_left">���������� �������� � ������ ������������� �������� �������� (��������, ������������ ������ ��������)</td><td class="X1_right"><?php echo($tab9_4[0]);?></td></tr>
<tr class="X1_0"><td class="X1_left">��������� �������������� ������� ���������� �� ��������</td><td class="X1_right"><?php echo($tab9_4[1]);?></td></tr>
</table>
<br>

<h4>9.4 �������������� ��������� ����� �������� ����������</h4>
<p class="table_title">������� 9.3</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">���� �����������*</th>
  <th width="20%">������� �������� ������, ���./���.</th>
</tr>
<?php
$q_tab9_5=mysqli_query($link,"select * from base_compensations where type_id=24");

$col=1;

while($tab9_5=mysqli_fetch_array($q_tab9_5)){
$id=$tab9_5["id"];
$title=$tab9_5["title"];

$comp_keys9=array_keys($compensation_id,$id);
  foreach($comp_keys9 as $i => $key){
    if($sum[$key]!=0){
    $res9[$id][$i]=$sum[$key];
    }
  }

if($comp_people[$id]==0){
$tab9_perc="-";
}else{
$tab9_perc=number_format($comp_people[$id]/$people_sum*100,2)."%";
}

if($res9[$id]==0){
$tab9_rub="-";
}else{
$tab9_rub=number_format(average($res9[$id]),0,',',' ');
}

echo('
<tr class="X1_'.$col.'"><td class="X1_left">'.$title.'</td><td class="X1_right">'.$tab9_perc.'</td><td class="X1_right">'.$tab9_rub.'</td></tr>
');
$col=1-$col;
}
?>

</table><br>
<?php } ?>
</div><!--/zp9-->

<!--10	������.-->
<div id="zp10" class="tabset_content">
<h2 class="tabset_label">��� 10</h2>

<h3>10.	������</h3>

<h4>10.1 ����������������� ������������� ������� (����������� ����)</h4>
<p class="table_title">������� 10.1</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">���� �����������</th>
</tr>

<?php
$q_tab10_1=mysqli_query($link,"select * from base_compensation_politics where compensation_id=153");

$col=1;

while($tab10_1=mysqli_fetch_array($q_tab10_1)){
$id=$tab10_1["id"];
$title=$tab10_1["title"];

if($politics_people[$id]==0){
$tab10_1_perc="-";
}else{
$tab10_1_perc=number_format($politics_people[$id]/$comp_people[153]*100,2)."%";
}

echo('
<tr class="X1_'.$col.'"><td class="X1_left">'.$title.'</td><td class="X1_right">'.$tab10_1_perc.'</td></tr>
');
$col=1-$col;
}
?>

</table><br>

<h4>10.2 ����� �������������� ������������� �������</h4>
<p class="table_title">������� 10.2</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">���� �����������</th>
</tr>

<?php
$q_tab10_2=mysqli_query($link,"select * from base_compensation_politics where compensation_id=154");

$col=1;

while($tab10_2=mysqli_fetch_array($q_tab10_2)){
$id=$tab10_2["id"];
$title=$tab10_2["title"];

if($politics_people[$id]==0){
$tab10_2_perc="-";
}else{
$tab10_2_perc=number_format($politics_people[$id]/$comp_people[154]*100,2)."%";
}

echo('
<tr class="X1_'.$col.'"><td class="X1_left">'.$title.'</td><td class="X1_right">'.$tab10_2_perc.'</td></tr>
');
$col=1-$col;
}
?>

</table><br>
    
<h4>10.3 ������ ������� ������� ���������</h4>
<p class="table_title">������� 10.3</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="80%"></th>
  <th width="20%">���� �����������</th>
</tr>

<?php
$q_tab10_3=mysqli_query($link,"select * from base_compensation_politics where compensation_id=155");

$col=1;

while($tab10_3=mysqli_fetch_array($q_tab10_3)){
$id=$tab10_3["id"];
$title=$tab10_3["title"];

if($politics_people[$id]==0){
$tab10_3_perc="-";
}else{
$tab10_3_perc=number_format($politics_people[$id]/$comp_people[155]*100,2)."%";
}

echo('
<tr class="X1_'.$col.'"><td class="X1_left">'.$title.'</td><td class="X1_right">'.$tab10_3_perc.'</td></tr>
');
$col=1-$col;
}
?>

</table><br>

</div><!--/zp10-->

<!--11	���������.-->
<div id="zp11" class="tabset_content">
<h2 class="tabset_label">��� 11</h2>

<h3>11.	���������</h3>

<h4>11.1 ������������������� ���������</h4>
<p class="table_title">������� 11.1</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">���� �����������*</th>
  <th width="20%">������� �������� ������, ���./���.</th>
</tr>

<?php
$q_tab11_1=mysqli_query($link,"select * from base_compensations where type_id=35");

$col=1;

while($tab11_1=mysqli_fetch_array($q_tab11_1)){
$id=$tab11_1["id"];
$title=$tab11_1["title"];

$comp_keys11_1=array_keys($compensation_id,$id);
  foreach($comp_keys11_1 as $i => $key){
    if($sum[$key]!=0){
    $res11[$id][$i]=$sum[$key];
    }
  }

if($comp_people[$id]==0){
$tab11_1_perc="-";
}else{
$tab11_1_perc=number_format($comp_people[$id]/$people_sum*100,2)."%";
}

if($res11[$id]==0){
$tab11_1_rub="-";
}else{
$tab11_1_rub=number_format(average($res11[$id]),0,',',' ');
}

echo('
<tr class="X1_'.$col.'"><td class="X1_left">'.$title.'</td><td class="X1_right">'.$tab11_1_perc.'</td><td class="X1_right">'.$tab11_1_rub.'</td></tr>
');
$col=1-$col;
}
?>

</table><br>

<h4>11.2 ������������� ���������</h4>

<p>����� ������ ������������� ����������: <strong><?=number_format($tab11_2[0][0],0,',',' ');?> ������</strong> �� 1 ����������</p>
<p class="table_title">������� 11.2</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">���� �����������*</th>
  <th width="20%">������� �������� ������, ���./���.</th>
</tr>
<tr class="X1_1"><td class="X1_left">���� �������� ��������</td><td class="X1_right"><?php echo($tab11_2[1][0]);?></td><td class="X1_right"><?php echo($tab11_2[1][1]);?></td></tr>
<tr class="X1_0"><td class="X1_left">������ ������������� ���������</td><td class="X1_right"><?php echo($tab11_2[2][0]);?></td><td class="X1_right"><?php echo($tab11_2[2][1]);?></td></tr>
</table>
<br>

<h4>11.3 ������� � ������������ ��� ����������</h4>
<p class="table_title">������� 11.3</p>
<table border="0" class="X1">
<tr class="X1_0">
  <th width="60%"></th>
  <th width="20%">���� �����������*</th>
  <th width="20%">������� �������� ������, ���./���.</th>
</tr>

<?php
$q_tab11_3=mysqli_query($link,"select * from base_compensations where type_id=37");

$col=1;

while($tab11_3=mysqli_fetch_array($q_tab11_3)){
$id=$tab11_3["id"];
$title=$tab11_3["title"];

$comp_keys11_3=array_keys($compensation_id,$id);
  foreach($comp_keys11_3 as $i => $key){
    if($sum[$key]!=0){
    $res11[$id][$i]=$sum[$key];
    }
  }

if($comp_people[$id]==0){
$tab11_3_perc="-";
}else{
$tab11_3_perc=number_format($comp_people[$id]/$people_sum*100,2)."%";
}

if($res11[$id]==0){
$tab11_3_rub="-";
}else{
$tab11_3_rub=number_format(average($res11[$id]),0,',',' ');
}

echo('
<tr class="X1_'.$col.'"><td class="X1_left">'.$title.'</td><td class="X1_right">'.$tab11_3_perc.'</td><td class="X1_right">'.$tab11_3_rub.'</td></tr>
');
$col=1-$col;
}
?>

</table><br>

</div><!--/zp11-->

<!--�������� ���������-->
<div id="zp12" class="tabset_content">
<h2 class="tabset_label">��� 12</h2>

 <center><h3>����������� ���������� <?php echo($job_name_partitive);?></h3></center>

<table border="0" cellspacing="0" cellpadding="6">

<?php
if($job_other_name<>""){echo('
<tr><td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>������ �������� ���������:</strong></em></td>
<td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_other_name.'</td></tr>
 ');}

if($job_conform<>""){echo('
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>�����������:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_conform.'</td>
  </tr>
');}

if($job_subordinate<>""){echo('
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>����������:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_subordinate.'</td>
  </tr>
');}

if($job_purpose<>""){echo('
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>����:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_purpose.'</td>
  </tr>
');}

if($job_mission<>""){echo('
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>������:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_mission.'</td>
  </tr>
');}

if($job_func<>""){echo('
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>�������:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">'.$job_func.'</td>
  </tr>
');}

if($job_experience<>""){echo('
  <tr>
    <td width="200" align="right" valign="top"><em><strong>���������� � ����� � ������������:</strong></em></td>
    <td valign="top">'.$job_experience.'</td>
  </tr>
');
}
?>

</table>

</div><!--/zp12-->
</div><!--/pagecontent-->
<p align="left">
  <form name="back" action="?step=3" method="post">
  <input type="hidden" name="job" value="<?=$job_id;?>">
  <input type="hidden" name="jtype" value="<?=$jtype_id;?>">
  <input type="hidden" name="city" value="<?=$city_id;?>">
  <input type="hidden" name="sphere" value="<?=$sphere_id;?>">
  <input type="hidden" name="staff" value="<?=$personal_id;?>">
  <input type="hidden" name="turnover" value="<?=$turnover_id;?>">
  <input type="submit" value="&laquo; �����" class="but1">
  </form>
</p>