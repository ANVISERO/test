<p><span>1. <a href="?step=1">����� ���������� ��� ������������ ������</a> &raquo;</span><span> 2. ����� &raquo;</span></p>

<h2>������������� ����� ���������� ����� <?php echo($job_name_partitive.' '.$city_name_partitive);?></h2>

<p>�������������� ��������:</p>
<ul>
    <li>����� ������������ ��������: <em><?php echo($sphere_name);?></em></li>
    <li>���������� ����������� � ��������: <em><?php echo($personal_name);?></em></li>
    <li>������ ��������: <em><?php echo($turnover_name);?> ���. ���. � ���</em></li>
</ul>
<p>��� ������ ������������ � ���������� ������ <b>�� ������� ������� (gross)</b></p>
<p>���� ���������� ���������� ������ �� ��������� ���������: <b><?php echo($dateUpdateMax.' ����');?></b></p>

<p align="right"><a href="/archive/html.php?d=<?php echo($url);?>" target="_blank">������ ��� ������ &raquo;</a>|
<img src="/_img/report-excel.png" alt="����� � ������� Excel" title="����� � ������� Excel"><a href="<?php echo($url_xls);?>">����� � ������� Excel</a></p>


<p><a class="link-h3" href="">1. ��������� ��������� ��������������</a></p>
<div>

<!--1.1 ������������� ������������� ������ ���������� ����� (���. � �����)-->

<h4>1.1 ������������� ������������� ������ ���������� ����� (���. � �����)</h4>
<p>���������� ����� �������� � ���� �����, ��������, �������, ������ � ������.</p>
<p class="table_name">������� 1.1.1</p>
<table class="business">
<tr>
  <th>��������� �������� ���������� �����, ���. ���.</th>
  <th>���������� ����������� (% �� ������ ����� �����������)</th>
</tr>

<?php
foreach($sal_print as $key => $sal){
    echo("<tr><td>".$key."</td><td>".number_format($sal,1)."%</td></tr>");
}
?>

</table>

<p align="center"><img src="<?php echo($img_src_salary); ?>" alt="����������� �����" /></p>
<p class="img_name">������� 1.1.1 ������������� ������������� ������ ���������� �����, ���./�����</p>

<!--1.2 ������������� ������������� ������ ����������� ����� (���. � �����)-->
<h4>1.2 ������������� ������������� ������ ����������� ����� (���. � �����)</h4>
<p class="table_name">������� 1.2.1</p>
<table class="business">
<tr>
  <th>��������� �������� ����������� �����, ���. ���.</th>
  <th>���������� ����������� (% �� ������ ����� �����������)</th>
</tr>

<?php
foreach($cash_print as $key => $cash1){
    echo("<tr><td>".$key."</td><td>".number_format($cash1,1)."%</td></tr>");
}
?>

</table>
<p align="center"><img src="<?php echo($img_src_cash); ?>" alt="����������� �����" /></p>
<p class="img_name">������� 1.2.1 ������������� ������������� ������ ����������� �����, ���./�����</p>

<!--1.3	�������������� �������� ������ ����������� ����� (���. � �����)-->
<h4>1.3	�������������� �������� ������ ����������� ����� (���. � �����)</h4>
<p class="table_name">������� 1.3.1</p>
<table class="business">
<tr>
  <th></th>
  <th>10%</th>
  <th>25%</th>
  <th>50%</th>
  <th>�������</th>
  <th>75%</th>
  <th>90%</th>
</tr>
<tr>
  <th>����������� �����</th>
  <td><?=$cash_indexes[0];?></td>
  <td><?=$cash_indexes[1];?></td>
  <td><?=$cash_indexes[2];?></td>
  <td><?=$cash_indexes[3];?></td>
  <td><?=$cash_indexes[4];?></td>
  <td><?=$cash_indexes[5];?></td>
</tr>
<tr>
  <th>���������� �����</th>
  <td><?=$salary_indexes[0];?></td>
  <td><?=$salary_indexes[1];?></td>
  <td><?=$salary_indexes[2];?></td>
  <td><?=$salary_indexes[3];?></td>
  <td><?=$salary_indexes[4];?></td>
  <td><?=$salary_indexes[5];?></td>
</tr>
<tr>
  <th>����������� �����</th>
  <td><?=$base_indexes[0];?></td>
  <td><?=$base_indexes[1];?></td>
  <td><?=$base_indexes[2];?></td>
  <td><?=$base_indexes[3];?></td>
  <td><?=$base_indexes[4];?></td>
  <td><?=$base_indexes[5];?></td>
</tr>
<tr>
  <th>������</th>
  <td><?=$premium_indexes[0];?></td>
  <td><?=$premium_indexes[1];?></td>
  <td><?=$premium_indexes[2];?></td>
  <td><?=$premium_indexes[3];?></td>
  <td><?=$premium_indexes[4];?></td>
  <td><?=$premium_indexes[5];?></td>
</tr>
<tr>
  <th>������</th>
  <td><?=$bonus_indexes[0];?></td>
  <td><?=$bonus_indexes[1];?></td>
  <td><?=$bonus_indexes[2];?></td>
  <td><?=$bonus_indexes[3];?></td>
  <td><?=$bonus_indexes[4];?></td>
  <td><?=$bonus_indexes[5];?></td>
</tr>
<tr>
  <th>��������</th>
  <td><?=$compensation_indexes[0];?></td>
  <td><?=$compensation_indexes[1];?></td>
  <td><?=$compensation_indexes[2];?></td>
  <td><?=$compensation_indexes[3];?></td>
  <td><?=$compensation_indexes[4];?></td>
  <td><?=$compensation_indexes[5];?></td>
</tr>
</table>

<?php
$chl_cash=$salary_indexes[0].'|'.$salary_indexes[1].'|'.$salary_indexes[2].'|'.$salary_indexes[4].'|'.$salary_indexes[5];
$size='700x250';
$image_src_cash='http://chart.apis.google.com/chart?chxt=x,x,y,y&chof=gif&cht=bvs&chbh=40,30&chco=800080|6B8E23|00A5C6|FF1493|FF7F50&chd=t:10,25,50,25,10&chxl=0:|'.$chl_cash.'|1:|'.iconv('windows-1251','utf-8','���������� �����, ���./���.').'|3:|'.iconv('windows-1251', 'utf-8', '���������� �����������, %').'&chxp=1,50|3,50&chs='.$size.'&chdl='.iconv('windows-1251', 'utf-8', '10 ����������|25 ����������|50 ����������|75 ����������|90 ����������');
?>

<p align="center"><img src="<?php echo($image_src_cash); ?>" alt="���������� �����" /></p>
<p class="img_name">������� 1.3.1 ���������� ����� <?php echo($job_name_partitive); ?>, ���./���.</p>

<p align="right"><a href="" class="close-block">��������</a></p>
</div>

<p><a class="link-h3" href="">2. �������� ������</a></p>
<div>
<h4>2.1 ����� ������ ���������� �����.</h4>
<p class="table_name">������� 2.1</p>
<table class="business">
<tr>
  <th width="80%"></th>
  <th width="20%">���� �����������</th>
</tr>

<?php echo $table2_1; ?>

</table>

<h4>2.2 ������������� ������ ���������� �����</h4>
<p class="table_name">������� 2.2</p>
<table class="business">
<tr>
  <th width="80%"></th>
  <th width="20%">���� �����������</th>
</tr>
<?php echo $table2_1; ?>
</table>

<h4>2.3 ������� ���������� ���������� �����</h4>
<p class="table_name">������� 2.3</p>
<table class="business">
<tr>
  <th width="80%"></th>
  <th width="20%">���� �����������</th>
</tr>
<?=$table2_3; ?>
</table>

<h4>2.4 �������� �������� ������� ���������� �����</h4>
<p class="table_name">������� 2.4</p>
<table class="business">
<tr >
  <th width="80%"></th>
  <th width="20%">���� �����������</th>
</tr>
<?=$table2_4; ?>
</table>

<p align="right"><a href="" class="close-block">��������</a></p>
</div>

<!--3	��������������� � ������������� �������-->
<p><a class="link-h3" href="">3.	��������������� � ������������� �������</a></p>
<div>
<?php
if($out3!==null){foreach($out3 as $table3){echo $table3;}}
else{echo("<p>������� �����, ������� ������������� ��������������� � ������������� ������� - 0,00%</p>");}
?>
    <p align="right"><a href="" class="close-block">��������</a></p>
</div>
<!--����� ��������������� � ������������� ������-->

<!--4	������-->
<p><a class="link-h3" href="">4. ������</a></p>
<div>
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
<p align="right"><a href="" class="close-block">��������</a></p>
</div>
<!--����� ������-->

<!--5	������� ����������� (������� / ��������� / �����)-->
<p><a class="link-h3" href="">5. ������� ����������� (������� / ��������� / �����)</a></p>
<div>
<?php
if($out5!==null){foreach($out5 as $table5){echo $table5;}}
else{echo("<p>������� �����, ������� ������������� ������� ����������� - 0,00%</p>");}
?>
    <p align="right"><a href="" class="close-block">��������</a></p>
</div><!--/zp5-->

<!--6	��������������� �������.-->
<p><a class="link-h3" href="">6. ��������������� �������</a></p>
<div>
<p>������� �����������, ������� ���������� � ��������� ������������: <strong><?=number_format($tab6[2],1);?>%</strong></p>

<?php
if($tab6[2]!=0){
?>
<h4>6.1 ������������ ��� ����������</h4>
<p class="table_title">������� 6.2</p>
<table width="100%" border="0" >
<tr >
  <th width="50%"></th>
  <th width="30%"></th>
  <th width="20%">���� �����������*</th>
</tr>
<tr ><td >��������������� ��������� </td><td></td><td ><b><?=$tab6_1[1][1];?></b></td></tr>
<tr ><td></td><td >��������</td><td ><?=$tab6_1[1][2];?></td></tr>
<tr ><td></td><td >����</td><td ><?=$tab6_1[1][3];?></td></tr>
<tr ><td></td><td >�������� ����</td><td ><?=$tab6_1[1][4];?></td></tr>
<tr ><td >����������� ���������</td><td></td><td ><b><?=$tab6_1[2][1];?></b></td></tr>
<tr ><td></td><td >������-�����</td><td ><?=$tab6_1[2][3];?></td></tr>
<tr ><td></td><td >������ �����</td><td ><?=$tab6_1[2][2];?></td></tr>
<tr ><td></td><td >������-�����</td><td ><?=$tab6_1[2][4];?></td></tr>
</table>

<p>* ���� ���������� ������������, ��������������� ��������, ������������� �������� (���������, �����, ����� ������������ ��������, ������ ��������)</p>

<h4>6.2 ���������� ����������������</h4>
<p class="table_title">������� 6.2</p>
<table border="0" >
<tr >
  <th width="60%"></th>
  <th width="20%">���� �����������*</th>
  <th width="20%">������� �������� ������, ���.</th>
</tr>
<tr ><td >������ / ������� ���������</td><td ><?=$tab6_2[1][1];?></td><td ><?php echo($tab6_2[1][2]);?></td></tr>
<tr ><td >������</td><td ><?=$tab6_2[2][1];?></td><td ><?php echo($tab6_2[2][2]);?></td></tr>
<tr ><td >������</td><td ><?=$tab6_2[3][1];?></td><td ><?php echo($tab6_2[3][2]);?></td></tr>
</table>
<br>

<h4>6.3 �������� ������� � ������������</h4>
<p class="table_title">������� 6.3</p>
<table border="0" >
<tr >
  <th width="60%"></th>
  <th width="20%">���� �����������*</th>
  <th width="20%">������� �������� ������, ���./����</th>
</tr>
<tr ><td >�������� �������, ������ / ������� ���������</td><td ><?=$tab6_3[1][1];?></td><td ><?php echo($tab6_3[1][2]);?></td></tr>
<tr ><td >�������� �������, ������</td><td ><?=$tab6_3[2][1];?></td><td ><?php echo($tab6_3[2][2]);?></td></tr>
<tr ><td >�������� �������, ������</td><td ><?=$tab6_3[3][1];?></td><td ><?php echo($tab6_3[3][2]);?></td></tr>
</table>

<h4>6.4 ������������ ������� � ������������</h4>
<p class="table_title">������� 6.4</p>
<table border="0" >
<tr >
  <th width="60%"></th>
  <th width="20%">���� �����������*</th>
  <th width="20%">������� �������� ������, ���.</th>
</tr>
<tr ><td >������������� ����� � ������/������� ���������</td><td ><?=$tab6_4[1][1];?></td><td ><?php echo($tab6_4[1][2]);?></td></tr>
<tr ><td >������������� ����� � ������</td><td ><?=$tab6_4[2][1];?></td><td ><?php echo($tab6_4[2][2]);?></td></tr>
<tr ><td >������������� ����� � ������</td><td ><?=$tab6_4[3][1];?></td><td ><?php echo($tab6_4[3][2]);?></td></tr>
</table>
<br>

<h4>6.5 ����� ����������������</h4>
<p class="table_title">������� 6.5</p>
<table border="0" >
<tr >
  <th width="60%"></th>
  <th width="20%">���� �����������*</th>
  <th width="20%">������� �������� ������, ���.</th>
</tr>
<tr ><td >��������� �����</td><td ><?=$tab6_5[1][1];?></td><td ><?php echo($tab6_5[1][2]);?></td></tr>
<tr ><td >������������� �����</td><td ><?=$tab6_5[2][1];?></td><td ><?php echo($tab6_5[2][2]);?></td></tr>
</table>

<?php
}
?>
<p align="right"><a href="" class="close-block">��������</a></p>
</div><!--/zp6-->

<!--7	��������� �������� � ���������� ���������.-->
<p><a class="link-h3" href="">7. ��������� �������� � ���������� ���������</a></p>
<div>
<h4>�������</h4>
<p>������� �����������, ������� ��������������� �������: <strong><?php echo($tab7[2]);?>%</strong></p>
<p>������� ��������� �������� �������� �������� ���������� �� ��������� ���: <strong><?php echo($tab7[3]);?> ���.</strong></p>

<?php
    if($tab7[2]!=0){
?>

<h4>7.1 ������� ������� ������������</h4>
<p class="table_title">������� 7.1</p>
<table border="0">
<tr>
  <th width="50%"></th>
  <th width="30%"></th>
  <th width="20%">���� �����������*</th>
</tr>
<tr><td >������� ��������������� ��� ������������ ��������</td><td></td><td ><b><?=$tab7_1[1][1];?></b></td></tr>
<tr><td></td><td >���� ������ ���������� � ��������</td><td ><?=$tab7_1[1][2];?></td></tr>
<tr><td></td><td >����� ����������</td><td ><?=$tab7_1[1][3];?></td></tr>
<tr><td></td><td >������ ������������</td><td ><?=$tab7_1[1][4];?></td></tr>
<tr><td></td><td >������ ������</td><td ><?=$tab7_1[1][5];?></td></tr>
<tr><td >������� ��������������� ��� �������</td><td></td><td ><b><?=$tab7_1[2][1];?></b></td></tr>
</table>

<h4>7.2 ���� ��������</h4>
<p class="table_title">������� 7.2</p>
<table border="0">
<tr>
  <th width="80%"></th>
  <th width="20%">���� �����������*</th>
</tr>
<tr><td >������ �� ������� ������������</td><td ><?=$tab7_2[1];?></td></tr>
<tr><td >������ �� ������� ����������</td><td ><?=$tab7_2[2];?></td></tr>
<tr><td >������ �� ������� �����-, �����-, �������, ������������ �������</td><td ><?=$tab7_2[3];?></td></tr>
<tr><td >������ �� ������ ��������</td><td ><?=$tab7_2[4];?></td></tr>
<tr><td >������ �������</td><td ><?=$tab7_2[5];?></td></tr>
</table>

<h4>7.3 ������� �� �������</h4>
<p class="table_title">������� 7.3</p>
<table border="0" >
<tr >
  <th width="80%"></th>
  <th width="20%">���� �����������*</th>
</tr>
<tr ><td >������������� ������</td><td ><?=$tab7_3[1];?></td></tr>
<tr ><td >������� �� �������</td><td ><?=$tab7_3[2];?></td></tr>
</table><br>

<?php
}
?>
<p align="right"><a href="" class="close-block">��������</a></p>
</div><!--/zp7-->

<!--8	�����������, ��������, �����.-->
<p><a class="link-h3" href="">8. �����������, ��������, �����</a></p>
<div>
<h4>8.1 ����������������� �����������</h4>
<p class="table_title">������� 8.1</p>
<table border="0">
<tr>
  <th width="60%"></th>
  <th width="20%">���� �����������</th>
   <th width="20%">������� �������� ������, ���.</th>
</tr>
<tr><td>����������������� ����������� �����</td><td ><?=$tab8_2[0][0];?></td><td ><?php echo($tab8_2[0][1]);?></td></tr>
<tr><td>����������������� ����������� �����������</td><td ><?=$tab8_2[1][0];?></td><td ><?php echo($tab8_2[1][1]);?></td></tr>
<tr><td>����������������� ���������� �����������</td><td ><?=$tab8_2[2][0];?></td><td ><?php echo($tab8_2[2][1]);?></td></tr>
</table>

<h4>8.2 ����������� ������������</h4>
<p class="table_title">������� 8.2</p>
<table border="0" >
<tr >
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
<tr class="X1_'.$col.'"><td >'.$title.'</td><td >'.$tab8_perc.'</td><td >'.$tab8_rub.'</td></tr>
');
$col=1-$col;
}
?>

</table>

<h4>8.3 �������������� ��������� �� ������������</h4>
<p class="table_title">������� 8.3</p>
<table border="0" >
<tr >
  <th width="80%"></th>
  <th width="20%">���� �����������*</th>
</tr>
<tr ><td >�������������� ������������� ���������� �������</td><td ><?php echo($tab8_3[0]);?></td></tr>
<tr ><td >������ �� ������������ (�� �����)</td><td ><?php echo($tab8_3[1]);?></td></tr>
<tr ><td >������ �� ����� (����� �����)</td><td ><?php echo($tab8_3[2]);?></td></tr>
</table>

<h4>8.4 ������� �������</h4>
<p class="table_title">������� 8.3</p>
<table border="0" >
<tr ><td >������� �����������, ������� ������������ ������� �������: <strong><?php echo($tab8_4[0]);?>%</strong></td></tr>
<tr ><td >������� �������� ������ �������� �� ������� �������: <strong><?php echo($tab8_4[1]);?> ���.</strong></td></tr>
</table>
<p align="right"><a href="" class="close-block">��������</a></p>
</div> <!--/zp8-->

<!--9	�������� � ��������.-->
<p><a class="link-h3" href="">9. �������� � ��������</a></p>
<div>
<p>������� �����������, ������� ������������ ��������: <strong><?php echo($tab9_1[0]);?>%</strong></p>

<?php
if($comp_people[208]!=0){
?>

<h4>9.1 �������������� �������� ���������� � ��������</h4>
<p class="table_title">������� 9.1</p>
<table border="0" >
<tr >
  <th width="80%"></th>
  <th width="20%">���� �����������*</th>
</tr>
<tr ><td >���������� �������������� ������ �� �������� ����������</td><td ><?php echo($tab9_2[0]);?></td></tr>
<tr ><td >������ �� �������� ���������� �� �������������, �� ������ ����������</td><td ><?php echo($tab9_2[1]);?></td></tr>
</table>

<h4>9.2 ������ �� �������� ����������</h4>
<p class="table_title">������� 9.2</p>
<table border="0" >
<tr >
  <th width="80%"></th>
  <th width="20%">������� ��������, ���.</th>
</tr>
<tr ><td >������� �� �������� �� ��� ���������</td><td ><?php echo($tab9_3[0]);?></td></tr>
<tr ><td >������ ������� �� �������� ������ ����������</td><td ><?php echo($tab9_3[1]);?></td></tr>
</table>

<h4>9.3 �������� �������� ����������� � ��������</h4>
<p class="table_title">������� 9.3</p>
<table border="0" >
<tr >
  <th width="80%"></th>
  <th width="20%">���� �����������*</th>
</tr>
<tr ><td >���������� �������� � ������ ������������� �������� �������� (��������, ������������ ������ ��������)</td><td ><?php echo($tab9_4[0]);?></td></tr>
<tr ><td >��������� �������������� ������� ���������� �� ��������</td><td ><?php echo($tab9_4[1]);?></td></tr>
</table>

<h4>9.4 �������������� ��������� ����� �������� ����������</h4>
<p class="table_title">������� 9.3</p>
<table border="0" >
<tr >
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
<tr class="X1_'.$col.'"><td >'.$title.'</td><td >'.$tab9_perc.'</td><td >'.$tab9_rub.'</td></tr>
');
$col=1-$col;
}
?>

</table>
<?php } ?>
<p align="right"><a href="" class="close-block">��������</a></p>
</div><!--/zp9-->

<!--10	������.-->
<p><a class="link-h3" href="">10. ������</a></p>
<div>
<h4>10.1 ����������������� ������������� ������� (����������� ����)</h4>
<p class="table_title">������� 10.1</p>
<table border="0" >
<tr >
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
<tr class="X1_'.$col.'"><td >'.$title.'</td><td >'.$tab10_1_perc.'</td></tr>
');
$col=1-$col;
}
?>

</table>

<h4>10.2 ����� �������������� ������������� �������</h4>
<p class="table_title">������� 10.2</p>
<table border="0" >
<tr >
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
<tr class="X1_'.$col.'"><td >'.$title.'</td><td >'.$tab10_2_perc.'</td></tr>
');
$col=1-$col;
}
?>

</table>
    
<h4>10.3 ������ ������� ������� ���������</h4>
<p class="table_title">������� 10.3</p>
<table border="0" >
<tr >
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
<tr class="X1_'.$col.'"><td >'.$title.'</td><td >'.$tab10_3_perc.'</td></tr>
');
$col=1-$col;
}
?>

</table>
<p align="right"><a href="" class="close-block">��������</a></p>
</div><!--/zp10-->

<!--11	���������.-->
<p><a class="link-h3" href="">11. ���������</a></p>
<div>
<h4>11.1 ������������������� ���������</h4>
<p class="table_title">������� 11.1</p>
<table border="0" >
<tr >
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
<tr class="X1_'.$col.'"><td >'.$title.'</td><td >'.$tab11_1_perc.'</td><td >'.$tab11_1_rub.'</td></tr>
');
$col=1-$col;
}
?>

</table>

<h4>11.2 ������������� ���������</h4>

<p>����� ������ ������������� ����������: <strong><?=number_format($tab11_2[0][0],0,',',' ');?> ������</strong> �� 1 ����������</p>
<p class="table_title">������� 11.2</p>
<table border="0" >
<tr >
  <th width="60%"></th>
  <th width="20%">���� �����������*</th>
  <th width="20%">������� �������� ������, ���./���.</th>
</tr>
<tr ><td >���� �������� ��������</td><td ><?php echo($tab11_2[1][0]);?></td><td ><?php echo($tab11_2[1][1]);?></td></tr>
<tr ><td >������ ������������� ���������</td><td ><?php echo($tab11_2[2][0]);?></td><td ><?php echo($tab11_2[2][1]);?></td></tr>
</table>
<br>

<h4>11.3 ������� � ������������ ��� ����������</h4>
<p class="table_title">������� 11.3</p>
<table border="0" >
<tr >
  <th width="60%"></th>
  <th width="20%">���� �����������*</th>
  <th width="20%">������� �������� ������, ���./���.</th>
</tr>

<?php
$q_tab11_3=mysqli_query($link,"select id,title from base_compensations where type_id=37");

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
<tr><th>'.$title.'</th><td>'.$tab11_3_perc.'</td><td>'.$tab11_3_rub.'</td></tr>
');
}
?>

</table>
<p align="right"><a href="" class="close-block">��������</a></p>
</div><!--/zp11-->

<!--�������� ���������-->
<p><a class="link-h3" href="">����������� ���������� <?php echo($job_name_partitive);?></a></p>
<div>
<table border="0" cellspacing="0" cellpadding="6">

<?php
if($job_other_name<>""){echo('
<tr><th width="10%">������ �������� ���������:</th>
<td>'.$job_other_name.'</td></tr>
 ');}

if($job_conform<>""){echo('
  <tr>
    <th>�����������:</th>
    <td>'.$job_conform.'</td>
  </tr>
');}

if($job_subordinate<>""){echo('
  <tr>
    <th>����������:</th>
    <td>'.$job_subordinate.'</td>
  </tr>
');}

if($job_purpose<>""){echo('
  <tr>
    <th>����:</th>
    <td>'.$job_purpose.'</td>
  </tr>
');}

if($job_mission<>""){echo('
  <tr>
    <th>������:</th>
    <td>'.$job_mission.'</td>
  </tr>
');}

if($job_func<>""){echo('
  <tr>
    <th>�������:</th>
    <td>'.$job_func.'</td>
  </tr>
');}

if($job_experience<>""){echo('
  <tr>
    <th>���������� � ����� � ������������:</td>
    <td>'.$job_experience.'</td>
  </tr>
');
}
?>

</table>
    <p align="right"><a href="" class="close-block">��������</a></p>
</div><!--/zp12-->
<p><input type="button" value="&laquo; ����� �����" class="submit" onclick="self.location.href='?step=1'"></p>