<?php

/*************�-��� ��� ������� �������� ��������********/
function average($array) {
 $aver=array_sum($array)/count($array);
 return $aver;
}

/**************������ �����������********************/
function percentile($data,$percentile){
		if( 0 < $percentile && $percentile < 1 ) {
			$p = $percentile;
		}else if( 1 < $percentile && $percentile <= 100 ) {
			$p = $percentile * .01;
		}else {
			return "";
		}
		$count = count($data);
		$allindex = ($count-1)*$p;
		$intvalindex = intval($allindex);
		$floatval = $allindex - $intvalindex;
		sort($data);
		if(!is_float($floatval)){
			$result = $data[$intvalindex];
		}else {
			if($count > $intvalindex+1)
				$result = $floatval*($data[$intvalindex+1] - $data[$intvalindex]) + $data[$intvalindex];
			else
				$result = $data[$intvalindex];
		}
		return $result;
	}

/*********���������� �������� � ������������� ������***********/
function graf_proc($proc)
{
$graf_h=350;
return('<img src="/_img/r2_dot.gif" height="'.(($graf_h*$proc/100)+1).'" width="20"><font style="font-weight:normal"></font>');
}

function graf($proc,$chel)
{
$graf_w=150;
return('<img src="/_img/r2_dot.gif" height="10" width="'.(($graf_w*$proc/100)+1).'" align="absmiddle"><font style="font-weight:normal"> '.$chel.' %</font>');
}

/********************������ ������������ ��������***************/
function interval($array){
sort($array);
$n=count($array);
$i=0;
for($i=0;$i<$n;$i++){
  if($array[$i]<=2000){$interval["<2"]++;}
  elseif(($array[$i]>2000) && ($array[$i]<=4000)){$interval["�� 2 �� 4"]++;}
  elseif(($array[$i]>4000) && ($array[$i]<=5000)){$interval["�� 4 �� 5"]++;}
  elseif(($array[$i]>5000) && ($array[$i]<=6000)){$interval["�� 5 �� 6"]++;}
  elseif(($array[$i]>6000) && ($array[$i]<=7000)){$interval["�� 6 �� 7"]++;}
  elseif(($array[$i]>7000) && ($array[$i]<=8000)){$interval["�� 7 �� 8"]++;}
  elseif(($array[$i]>8000) && ($array[$i]<=9000)){$interval["�� 8 �� 9"]++;}
  elseif(($array[$i]>9000) && ($array[$i]<=10000)){$interval["�� 9 �� 10"]++;}
  elseif(($array[$i]>10000) && ($array[$i]<=12000)){$interval["�� 10 �� 12"]++;}
  elseif(($array[$i]>12000) && ($array[$i]<=14000)){$interval["�� 12 �� 14"]++;}
  elseif(($array[$i]>14000) && ($array[$i]<=16000)){$interval["�� 14 �� 16"]++;}
  elseif(($array[$i]>16000) && ($array[$i]<=18000)){$interval["�� 16 �� 18"]++;}
  elseif(($array[$i]>18000) && ($array[$i]<=20000)){$interval["�� 18 �� 20"]++;}
  elseif(($array[$i]>20000) && ($array[$i]<=22000)){$interval["�� 20 �� 22"]++;}
  elseif(($array[$i]>22000) && ($array[$i]<=24000)){$interval["�� 22 �� 24"]++;}
  elseif(($array[$i]>24000) && ($array[$i]<=26000)){$interval["�� 24 �� 26"]++;}
  elseif(($array[$i]>26000) && ($array[$i]<=28000)){$interval["�� 26 �� 28"]++;}
  elseif(($array[$i]>28000) && ($array[$i]<=30000)){$interval["�� 28 �� 30"]++;}
  elseif(($array[$i]>30000) && ($array[$i]<=33000)){$interval["�� 30 �� 33"]++;}
  elseif(($array[$i]>33000) && ($array[$i]<=36000)){$interval["�� 33 �� 36"]++;}
  elseif(($array[$i]>36000) && ($array[$i]<=40000)){$interval["�� 36 �� 40"]++;}
  elseif(($array[$i]>40000) && ($array[$i]<=44000)){$interval["�� 40 �� 44"]++;}
  elseif(($array[$i]>44000) && ($array[$i]<=50000)){$interval["�� 44 �� 50"]++;}
  elseif(($array[$i]>50000) && ($array[$i]<=55000)){$interval["�� 50 �� 55"]++;}
  elseif(($array[$i]>55000) && ($array[$i]<=60000)){$interval["�� 55 �� 60"]++;}
  elseif(($array[$i]>60000) && ($array[$i]<=65000)){$interval["�� 60 �� 65"]++;}
  elseif(($array[$i]>65000) && ($array[$i]<=70000)){$interval["�� 65 �� 70"]++;}
  elseif(($array[$i]>70000) && ($array[$i]<=75000)){$interval["�� 70 �� 75"]++;}
  elseif(($array[$i]>75000) && ($array[$i]<=80000)){$interval["�� 75 �� 80"]++;}
  elseif(($array[$i]>80000) && ($array[$i]<=85000)){$interval["�� 80 �� 85"]++;}
  elseif(($array[$i]>85000) && ($array[$i]<=90000)){$interval["�� 85 �� 90"]++;}
  elseif(($array[$i]>90000) && ($array[$i]<=100000)){$interval["�� 90 �� 100"]++;}
  elseif(($array[$i]>100000) && ($array[$i]<=125000)){$interval["�� 100 �� 125"]++;}
  elseif(($array[$i]>125000) && ($array[$i]<=150000)){$interval["�� 125 �� 150"]++;}
  elseif(($array[$i]>150000) && ($array[$i]<=175000)){$interval["�� 150 �� 175"]++;}
  elseif(($array[$i]>175000) && ($array[$i]<=200000)){$interval["�� 175 �� 200"]++;}
  elseif(($array[$i]>200000) && ($array[$i]<=230000)){$interval["�� 200 �� 230"]++;}
  elseif(($array[$i]>230000) && ($array[$i]<=260000)){$interval["�� 230 �� 260"]++;}
  elseif(($array[$i]>260000) && ($array[$i]<=290000)){$interval["�� 260 �� 290"]++;}
  elseif(($array[$i]>290000) && ($array[$i]<=350000)){$interval["�� 290 �� 350"]++;}
  elseif(($array[$i]>350000) && ($array[$i]<=400000)){$interval["�� 350 �� 400"]++;}
  elseif(($array[$i]>400000) && ($array[$i]<=450000)){$interval["�� 400 �� 450"]++;}
  elseif(($array[$i]>450000) && ($array[$i]<=500000)){$interval["�� 450 �� 500"]++;}
  elseif(($array[$i]>500000) && ($array[$i]<=550000)){$interval["�� 500 �� 550"]++;}
  elseif(($array[$i]>550000) && ($array[$i]<=600000)){$interval["�� 550 �� 600"]++;}
  elseif(($array[$i]>600000) && ($array[$i]<=650000)){$interval["�� 600 �� 650"]++;}
  elseif(($array[$i]>650000) && ($array[$i]<=700000)){$interval["�� 650 �� 700"]++;}
  elseif(($array[$i]>700000) && ($array[$i]<=750000)){$interval["�� 700 �� 750"]++;}
  elseif(($array[$i]>750000) && ($array[$i]<=800000)){$interval["�� 750 �� 800"]++;}
  elseif(($array[$i]>800000) && ($array[$i]<=850000)){$interval["�� 800 �� 850"]++;}
  elseif(($array[$i]>850000) && ($array[$i]<=900000)){$interval["�� 850 �� 900"]++;}
  elseif(($array[$i]>900000) && ($array[$i]<=950000)){$interval["�� 900 �� 950"]++;}
  elseif(($array[$i]>950000) && ($array[$i]<=1000000)){$interval["�� 950 �� 1 000"]++;}
  elseif(($array[$i]>1000000) && ($array[$i]<=1050000)){$interval["�� 1 000 �� 1 050"]++;}
  elseif(($array[$i]>1050000) && ($array[$i]<=1100000)){$interval["�� 1 050 �� 1 100"]++;}
  elseif(($array[$i]>1100000) && ($array[$i]<=1150000)){$interval["�� 1 100 �� 1 150"]++;}
  elseif(($array[$i]>1150000) && ($array[$i]<=1200000)){$interval["�� 1 150 �� 1 200"]++;}
  elseif(($array[$i]>1200000) && ($array[$i]<=1250000)){$interval["�� 1 200 �� 1 300"]++;}
  elseif(($array[$i]>1300000) && ($array[$i]<=1350000)){$interval["�� 1 300 �� 1 350"]++;}
  elseif(($array[$i]>1350000) && ($array[$i]<=1400000)){$interval["�� 1 350 �� 1 400"]++;}
  elseif(($array[$i]>1400000) && ($array[$i]<=1450000)){$interval["�� 1 400 �� 1 450"]++;}
  elseif(($array[$i]>1450000) && ($array[$i]<=1500000)){$interval["�� 1 450 �� 1 500"]++;}
  elseif(($array[$i]>1500000) && ($array[$i]<=1550000)){$interval["�� 1 500 �� 1 550"]++;}
  elseif(($array[$i]>1550000) && ($array[$i]<=1600000)){$interval["�� 1 550 �� 1 600"]++;}
  elseif(($array[$i]>1600000) && ($array[$i]<=1650000)){$interval["�� 1 600 �� 1 650"]++;}
  elseif(($array[$i]>1650000) && ($array[$i]<=1700000)){$interval["�� 1 650 �� 1 700"]++;}
  elseif(($array[$i]>1700000) && ($array[$i]<=1750000)){$interval["�� 1 700 �� 1 750"]++;}
  elseif(($array[$i]>1750000) && ($array[$i]<=1800000)){$interval["�� 1 750 �� 1 800"]++;}
  elseif(($array[$i]>1800000) && ($array[$i]<=1850000)){$interval["�� 1 800 �� 1 850"]++;}
  elseif(($array[$i]>1850000) && ($array[$i]<=1900000)){$interval["�� 1 850 �� 1 900"]++;}
  elseif(($array[$i]>1900000) && ($array[$i]<=1950000)){$interval["�� 1 900 �� 1 950"]++;}
  elseif(($array[$i]>1950000) && ($array[$i]<=2000000)){$interval["�� 1 950 �� 2 000"]++;}
  elseif($array[$i]>2000000){$interval["> 2000"]++;}
}

foreach($interval as $k=>$int){
 if(isset($int)){
  $int_print[$k]=$int/$n*100;}
  else{$int_print[$k]=0;}
}

return $int_print;
}
/*****************������� 1.3 � ������************/
function table1_3($array) {
  for($i=0;$i<count($array);$i++){
    if($array[$i]>0){
      $array1[]=$array[$i];
    }
  }
  $table[0]=number_format(min($array1), 0, ',', ' ');
  $table[1]=number_format(average($array), 0, ',', ' ');
  $table[2]=number_format(max($array), 0, ',', ' ');
  return $table;
}

/***************������� 2.1 � ������************/
function table2_1($array) {
  for($i=0; $i<count($array);$i++){
    if($array[$i]==1){$interval[1]++;}
    elseif($array[$i]==2){$interval[2]++;}
    elseif($array[$i]==3){$interval[3]++;}
    elseif($array[$i]==4){$interval[4]++;}
  }
  $n=array_sum($interval);
  foreach($interval as $id=>$int){
    $name=mysqli_result(mysqli_query($link,"select name from base_payment where id='$id'"),0,0);
    if(isset($int)){
      $int_print[$name]=$int/$n*100;
    }
  }
  return $int_print;
}

function table2_2($array) {
  for($i=0; $i<count($array);$i++){
    if($array[$i]==1){$interval[1]++;}
    elseif($array[$i]==2){$interval[2]++;}
    elseif($array[$i]==3){$interval[3]++;}
    elseif($array[$i]==4){$interval[4]++;}
    elseif($array[$i]==5){$interval[5]++;}
    elseif($array[$i]==6){$interval[6]++;}
  }
  $n=array_sum($interval);
  foreach($interval as $id=>$int){
    $name=mysqli_result(mysqli_query($link,"select name from base_period where id='$id'"),0,0);
    if(isset($int)){
      $int_print[$name]=$int/$n*100;
    }
  }
  return $int_print;
}

function count_people($array) {
  $interval=array_unique($array);
  foreach($array as $cid){
    foreach($interval as $int){
    if($cid==$int){$test[$int]++;}
    }
  }
  return $test;
}

function table3_1($array) {
  $res[0]=0;
  $res[1]=0;
  //��������������� ������������ ������� � ��������
  $q_res0=mysqli_query($link,"SELECT * FROM base_compensations where type_id=1;");
  while($row=mysqli_fetch_array($q_res0)){
    $id=$row["id"];
    if(isset($array[$id])){$res[0]++;}
  }

   //����������������� ������������ ������� � ��������
  $q_res1=mysqli_query($link,"SELECT * FROM base_compensations where type_id=2;");
  while($row=mysqli_fetch_array($q_res1)){
    $id=$row["id"];
    if(isset($array[$id])){$res[1]++;}
  }

  return $res;
}

 /***************************************************************************************************************/

function table_type1($string,$comp_people,$people_sum,$sum,$compensation_id,$politics_people){

$q="SELECT * FROM base_compensation_types where id in(".$string.")";
$query=mysqli_query($link,$q);

while($row=mysqli_fetch_array($query)){
$type_id=$row["id"];
$title=$row["type"];

$query_1=mysqli_query($link,"SELECT * FROM base_compensations where type_id='$type_id'");

while($row=mysqli_fetch_array($query_1)){
  $id_1=$row["id"];
  $title_1=$row["title"];

  if(isset($comp_people[$id_1])){
  $out[$title][$title_1]=
"<table width='100%' border='0' class='X1'>
<tr class='X1_0'>
  <th width='40%'></th>
  <th width='30%'></th>
  <th width='10%'>���� �����������*</th>
  <th width='20%'>������� �������� ������, ���./���.</th>
</tr>";

  $tab[$title][$title_1]=$comp_people[$id_1]/$people_sum*100;

  $color=1;
  //�������, ������������ ������� �����, ���������� ������ �����������
  $out[$title][$title_1].="<tr class='X1_".$color."'><td class='X1_left'>".$title_1."</td><td></td><td class='X1_right'>".number_format($tab[$title][$title_1],2)."%</td><td class='X1_right'>".average($res_1[$title][$title_1])."</td></tr>";

  //���������� ������� �� �������� ����������� � ������������ � ������ ������������
  $comp_keys=array_keys($compensation_id,$id_1);
  foreach($comp_keys as $i => $key){
    if($sum[$key]!=0){
    $res[$id_1][$i]=$sum[$key];
    $res_1[$title][$title_1][$i]=$res[$id_1][$i];
    }
  }

  //��������� ����� ����� �������
  $color=1-$color;

  //compensaition_politics
  $q_pol_id=mysqli_query($link,"SELECT * FROM base_compensation_politics where compensation_id='$id_1'");
  while($row1=mysqli_fetch_array($q_pol_id)){
    $politics_id=$row1["id"];
    $title_politics=$row1["title"];
    if(isset($politics_people[$politics_id])){
      $tab_politics[$title_1][$title_politics]=$politics_people[$politics_id]/$people_sum*100;
      $out[$title][$title_1].="<tr class='X1_".$color."'><td class='X1_left'></td><td class='X1_left'>".$title_politics."</td><td class='X1_right'>".number_format($tab_politics[$title_1][$title_politics],2)."%</td><td class='X1_right'></td></tr>";
      $color=1-$color;
    }
  }

$out[$title][$title_1].="</table>";
}
}
}
return $out;
}

/*******************************************************************************************************************/

function table_type2($part,$string,$comp_people,$people_sum,$sum,$compensation_id,$politics_people) {
$number=1;

foreach($string as $m){
$query=mysqli_query($link,"SELECT * FROM base_compensations where type_id='$m'");
$out1[$m]=
'<table width="100%" border="0" class="X1">
<tr class="X1_0">
  <th width="50%"></th>
  <th width="20%"></th>
  <th width="10%">���� �����������*</th>
  <th width="20%">������� �������� ������, ���./���.</th>
</tr>';
  $color=1;

while($row=mysqli_fetch_array($query)){
  $id=$row["id"];
  $title=$row["title"];

  if(isset($comp_people[$id])){
  $tab[$m][$title]=$comp_people[$id]/$people_sum*100;

  //�������, ������������ ������� �����, ���������� ������ �����������
  $out1[$m].="<tr class='X1_".$color."'><td class='X1_left'>".$title."</td><td></td><td class='X1_right'>".number_format($tab[$m][$title],2)."%</td>";

  //���������� ������� �� �������� ����������� � ������������ � ������ ������������
  $comp_keys=array_keys($compensation_id,$id);
  foreach($comp_keys as $i => $key){
    if($sum[$key]!=0){
    $res[$id][$i]=$sum[$key];
    $res1[$m][$title][$i]=$res[$id][$i];
    }
  }

  if($res1[$m][$title]!=0){
    $out1[$m].="<td class='X1_right'>".number_format(average($res1[$m][$title]),0,',',' ')."</td></tr>";
  } else {
    $out1[$m].="<td class='X1_right'> - </td></tr>";
  }

  $color=1-$color;

  //compensaition_politics
  $q_pol_id=mysqli_query($link,"SELECT * FROM base_compensation_politics where compensation_id='$id'");
  while($row1=mysqli_fetch_array($q_pol_id)){
    $politics_id=$row1["id"];
    $title_politics=$row1["title"];
    if(isset($politics_people[$politics_id])){
      $tab_politics[$title][$title_politics]=$politics_people[$politics_id]/$people_sum*100;
      $out1[$m].="<tr class='X1_".$color."'><td></td><td class='X1_left'>".$title_politics."</td><td class='X1_right'>".number_format($tab_politics[$title][$title_politics],2)."%</td><td></td></tr>";
      $color=1-$color;
    }
  }


  }
}
$out1[$m].="</table>";
//$out2[$m].="</table>";

//��������� ������ �� 2-� (��� 1 �������, ���� ������ ����. ������) ������ � ����������� ��� ����� �� �����
if($tab[$m]!=0){
$zag[$m]=mysqli_result(mysqli_query($link,"select type from base_compensation_types where id='$m'"),0,0);

$out[$m]="<h4>".$part.".".$number." ".$zag[$m]."</h4>".$out1[$m];

$out[$m].=
"<br>
<table border='0' width='100%'>
<tr>
    <td width='960' valign='top' style='background-image:url(/_img/g_dot_2.gif); background-position:bottom; background-repeat:repeat-x;'></td>
</tr>
</table>";

$out[$m].="<p>* ���� ���������� ������������, ��������������� ��������, ������������� �������� (���������, �����, ����� ������������ ��������, ������ ��������)</p>";

$number++;
}

}

return $out;

}

?>