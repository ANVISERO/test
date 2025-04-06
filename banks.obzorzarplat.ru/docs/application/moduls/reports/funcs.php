<?php

/******************Удаление элементов из массива*********************************/
function delete_from_array($array,$value)
{
  $key = array_keys($array,$value);
  foreach($key as $k){unset($array[$k]);}
  return $array;
}

/*************ф-ция для расчета среднего значения********/
function average($array) {
    $array=delete_from_array($array,'0');
    if(empty($array)){ return 0;}
    else{return array_sum($array)/count($array);}
}

/**************Расчет процентилей********************/
function percentile($data,$percentile){
	if($data==0){$result=0;}
        else{
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
          }
	return $result;
	}

/********************минимальная дата обновления данных*****************************/
function dateUpdateMax($date){
$dateMax=strtotime($date);
$year_now=date('Y');

$monthId_now=date('m')-2;
if($monthId_now<=0){
    $monthId_now=12+$monthId_now;
    $year_now=date('Y')-1;
}

$expiration_date=$year_now."-".$monthId_now."-01";
$exp_date=strtotime($expiration_date);

if($dateMax<$exp_date){$dateMax=$exp_date;}

//квартал, когда обновлялись данные
if(date('m',$dateMax)==1 || date('m',$dateMax)==2 || date('m',$dateMax)==3){$quarter=3;}
elseif(date('m',$dateMax)==4 || date('m',$dateMax)==5 || date('m',$dateMax)==6){$quarter=2;}
elseif(date('m',$dateMax)==7 || date('m',$dateMax)==8 || date('m',$dateMax)==9){$quarter=3;}
else{$quarter=3;}

$quarter=4;
$year = 2019;

//$dateUpdate=$quarter.' квартал '.$year_now;
$dateUpdate=$quarter.' квартал '.$year;
return $dateUpdate;
}

/********************Добавление данных в массив***************/
function add_items($array){
    $average=average($array);
    $i=count($array);
    $array[$i]=1.0725*$average;
    $array[$i+1]=0.8715*$average;
    $array[$i+2]=1.215*$average;
    $array[$i+3]=0.789*$average;
    $array[$i+4]=0.231*$average;
    $array[$i+5]=1.452*$average;
    sort($array);
    return $array;
}

/********************расчет интервальных значений***************/
function interval($array){
sort($array);
$n=count($array);
$i=0;
for($i=0;$i<$n;$i++){
  if($array[$i]<=2000){$interval["<2"]++;}
  elseif(($array[$i]>2000) && ($array[$i]<=4000)){$interval["От 2 до 4"]++;}
  elseif(($array[$i]>4000) && ($array[$i]<=5000)){$interval["От 4 до 5"]++;}
  elseif(($array[$i]>5000) && ($array[$i]<=6000)){$interval["От 5 до 6"]++;}
  elseif(($array[$i]>6000) && ($array[$i]<=7000)){$interval["От 6 до 7"]++;}
  elseif(($array[$i]>7000) && ($array[$i]<=8000)){$interval["От 7 до 8"]++;}
  elseif(($array[$i]>8000) && ($array[$i]<=9000)){$interval["От 8 до 9"]++;}
  elseif(($array[$i]>9000) && ($array[$i]<=10000)){$interval["От 9 до 10"]++;}
  elseif(($array[$i]>10000) && ($array[$i]<=12000)){$interval["От 10 до 12"]++;}
  elseif(($array[$i]>12000) && ($array[$i]<=14000)){$interval["От 12 до 14"]++;}
  elseif(($array[$i]>14000) && ($array[$i]<=16000)){$interval["От 14 до 16"]++;}
  elseif(($array[$i]>16000) && ($array[$i]<=18000)){$interval["От 16 до 18"]++;}
  elseif(($array[$i]>18000) && ($array[$i]<=20000)){$interval["От 18 до 20"]++;}
  elseif(($array[$i]>20000) && ($array[$i]<=22000)){$interval["От 20 до 22"]++;}
  elseif(($array[$i]>22000) && ($array[$i]<=24000)){$interval["От 22 до 24"]++;}
  elseif(($array[$i]>24000) && ($array[$i]<=26000)){$interval["От 24 до 26"]++;}
  elseif(($array[$i]>26000) && ($array[$i]<=28000)){$interval["От 26 до 28"]++;}
  elseif(($array[$i]>28000) && ($array[$i]<=30000)){$interval["От 28 до 30"]++;}
  elseif(($array[$i]>30000) && ($array[$i]<=33000)){$interval["От 30 до 33"]++;}
  elseif(($array[$i]>33000) && ($array[$i]<=36000)){$interval["От 33 до 36"]++;}
  elseif(($array[$i]>36000) && ($array[$i]<=40000)){$interval["От 36 до 40"]++;}
  elseif(($array[$i]>40000) && ($array[$i]<=44000)){$interval["От 40 до 44"]++;}
  elseif(($array[$i]>44000) && ($array[$i]<=50000)){$interval["От 44 до 50"]++;}
  elseif(($array[$i]>50000) && ($array[$i]<=55000)){$interval["От 50 до 55"]++;}
  elseif(($array[$i]>55000) && ($array[$i]<=60000)){$interval["От 55 до 60"]++;}
  elseif(($array[$i]>60000) && ($array[$i]<=65000)){$interval["От 60 до 65"]++;}
  elseif(($array[$i]>65000) && ($array[$i]<=70000)){$interval["От 65 до 70"]++;}
  elseif(($array[$i]>70000) && ($array[$i]<=75000)){$interval["От 70 до 75"]++;}
  elseif(($array[$i]>75000) && ($array[$i]<=80000)){$interval["От 75 до 80"]++;}
  elseif(($array[$i]>80000) && ($array[$i]<=85000)){$interval["От 80 до 85"]++;}
  elseif(($array[$i]>85000) && ($array[$i]<=90000)){$interval["От 85 до 90"]++;}
  elseif(($array[$i]>90000) && ($array[$i]<=100000)){$interval["От 90 до 100"]++;}
  elseif(($array[$i]>100000) && ($array[$i]<=125000)){$interval["От 100 до 125"]++;}
  elseif(($array[$i]>125000) && ($array[$i]<=150000)){$interval["От 125 до 150"]++;}
  elseif(($array[$i]>150000) && ($array[$i]<=175000)){$interval["От 150 до 175"]++;}
  elseif(($array[$i]>175000) && ($array[$i]<=200000)){$interval["От 175 до 200"]++;}
  elseif(($array[$i]>200000) && ($array[$i]<=230000)){$interval["От 200 до 230"]++;}
  elseif(($array[$i]>230000) && ($array[$i]<=260000)){$interval["От 230 до 260"]++;}
  elseif(($array[$i]>260000) && ($array[$i]<=290000)){$interval["От 260 до 290"]++;}
  elseif(($array[$i]>290000) && ($array[$i]<=350000)){$interval["От 290 до 350"]++;}
  elseif(($array[$i]>350000) && ($array[$i]<=400000)){$interval["От 350 до 400"]++;}
  elseif(($array[$i]>400000) && ($array[$i]<=450000)){$interval["От 400 до 450"]++;}
  elseif(($array[$i]>450000) && ($array[$i]<=500000)){$interval["От 450 до 500"]++;}
  elseif(($array[$i]>500000) && ($array[$i]<=550000)){$interval["От 500 до 550"]++;}
  elseif(($array[$i]>550000) && ($array[$i]<=600000)){$interval["От 550 до 600"]++;}
  elseif(($array[$i]>600000) && ($array[$i]<=650000)){$interval["От 600 до 650"]++;}
  elseif(($array[$i]>650000) && ($array[$i]<=700000)){$interval["От 650 до 700"]++;}
  elseif(($array[$i]>700000) && ($array[$i]<=750000)){$interval["От 700 до 750"]++;}
  elseif(($array[$i]>750000) && ($array[$i]<=800000)){$interval["От 750 до 800"]++;}
  elseif(($array[$i]>800000) && ($array[$i]<=850000)){$interval["От 800 до 850"]++;}
  elseif(($array[$i]>850000) && ($array[$i]<=900000)){$interval["От 850 до 900"]++;}
  elseif(($array[$i]>900000) && ($array[$i]<=950000)){$interval["От 900 до 950"]++;}
  elseif(($array[$i]>950000) && ($array[$i]<=1000000)){$interval["От 950 до 1 000"]++;}
  elseif(($array[$i]>1000000) && ($array[$i]<=1050000)){$interval["От 1 000 до 1 050"]++;}
  elseif(($array[$i]>1050000) && ($array[$i]<=1100000)){$interval["От 1 050 до 1 100"]++;}
  elseif(($array[$i]>1100000) && ($array[$i]<=1150000)){$interval["От 1 100 до 1 150"]++;}
  elseif(($array[$i]>1150000) && ($array[$i]<=1200000)){$interval["От 1 150 до 1 200"]++;}
  elseif(($array[$i]>1200000) && ($array[$i]<=1250000)){$interval["От 1 200 до 1 300"]++;}
  elseif(($array[$i]>1300000) && ($array[$i]<=1350000)){$interval["От 1 300 до 1 350"]++;}
  elseif(($array[$i]>1350000) && ($array[$i]<=1400000)){$interval["От 1 350 до 1 400"]++;}
  elseif(($array[$i]>1400000) && ($array[$i]<=1450000)){$interval["От 1 400 до 1 450"]++;}
  elseif(($array[$i]>1450000) && ($array[$i]<=1500000)){$interval["От 1 450 до 1 500"]++;}
  elseif(($array[$i]>1500000) && ($array[$i]<=1550000)){$interval["От 1 500 до 1 550"]++;}
  elseif(($array[$i]>1550000) && ($array[$i]<=1600000)){$interval["От 1 550 до 1 600"]++;}
  elseif(($array[$i]>1600000) && ($array[$i]<=1650000)){$interval["От 1 600 до 1 650"]++;}
  elseif(($array[$i]>1650000) && ($array[$i]<=1700000)){$interval["От 1 650 до 1 700"]++;}
  elseif(($array[$i]>1700000) && ($array[$i]<=1750000)){$interval["От 1 700 до 1 750"]++;}
  elseif(($array[$i]>1750000) && ($array[$i]<=1800000)){$interval["От 1 750 до 1 800"]++;}
  elseif(($array[$i]>1800000) && ($array[$i]<=1850000)){$interval["От 1 800 до 1 850"]++;}
  elseif(($array[$i]>1850000) && ($array[$i]<=1900000)){$interval["От 1 850 до 1 900"]++;}
  elseif(($array[$i]>1900000) && ($array[$i]<=1950000)){$interval["От 1 900 до 1 950"]++;}
  elseif(($array[$i]>1950000) && ($array[$i]<=2000000)){$interval["От 1 950 до 2 000"]++;}
  elseif($array[$i]>2000000){$interval["> 2000"]++;}
}

foreach($interval as $k=>$int){
 if(isset($int)){
  $int_print[$k]=$int/$n*100;}
  else{$int_print[$k]=0;}
}

return $int_print;
}
/*****************таблица 1.3 в отчете************/
function salary_indexes($array) {
  $array=delete_from_array($array,'0');
  if(empty ($array)){
    $table=array('-','-','-','-','-','-');
  }else{
    $table[0]=number_format(percentile($array, 10), 0, ',', ' ');
    $table[1]=number_format(percentile($array, 25), 0, ',', ' ');
    $table[2]=number_format(average($array), 0, ',', ' ');
    $table[3]=number_format(percentile($array, 50), 0, ',', ' ');
    $table[4]=number_format(percentile($array, 75), 0, ',', ' ');
    $table[5]=number_format(percentile($array, 90), 0, ',', ' ');
  }
  return $table;
}

function salary_indexes_ndfl($array) {
  $array=delete_from_array($array,'0');
  if(empty ($array)){
    $table=array('-','-','-','-','-','-');
  }else{
    $table[0]=number_format(percentile($array, 10), 0, ',', ' ');
    $table[1]=number_format(percentile($array, 25), 0, ',', ' ');
    $table[2]=number_format(average($array), 0, ',', ' ');
    $table[3]=number_format(percentile($array, 50), 0, ',', ' ');
    $table[4]=number_format(percentile($array, 75), 0, ',', ' ');
    $table[5]=number_format(percentile($array, 90), 0, ',', ' ');
  }
  return $table;
}

function count_people($array) {
    if($array!==null){
  $interval=array_unique($array);
  foreach($array as $cid){
    foreach($interval as $int){
    if($cid==$int){$test[$int]++;}
    }
  }
    }
    else{$test=null;}
  return $test;
}

function table3_1($array) {
  $res[0]=0;
  $res[1]=0;
  //Предусмотренные государством доплаты и надбавки
  $q_res0=mysqli_query($link,"SELECT * FROM base_compensations where type_id=1;");
  while($row=mysqli_fetch_array($q_res0)){
    $id=$row["id"];
    if(isset($array[$id])){$res[0]++;}
  }

   //Непредусмотренные государством доплаты и надбавки
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
"<table border='0' class='X1'>
<tr class='X1_0'>
  <th width='40%'></th>
  <th width='30%'></th>
  <th width='10%'>Доля сотрудников*</th>
  <th width='20%'>Среднее значение затрат, руб./мес.</th>
</tr>";

  $tab[$title][$title_1]=$comp_people[$id_1]/$people_sum*100;

  $color=1;
  //таблица, показывающая процент людей, получающих данную компенсацию
  $out[$title][$title_1].="<tr class='X1_".$color."'><td class='X1_left'>".$title_1."</td><td></td><td class='X1_right'>".number_format($tab[$title][$title_1],2)."%</td><td class='X1_right'>".average($res_1[$title][$title_1])."</td></tr>";

  //построение массива из значений компенсаций в соответствии с каждой компенсацией
  $comp_keys=array_keys($compensation_id,$id_1);
  foreach($comp_keys as $i => $key){
    if($sum[$key]!=0){
    $res[$id_1][$i]=$sum[$key];
    $res_1[$title][$title_1][$i]=$res[$id_1][$i];
    }
  }

  //изменение цвета строк таблицы
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
'<table border="0" class="X1">
<tr class="X1_0">
  <th width="50%"></th>
  <th width="20%"></th>
  <th width="10%">Доля сотрудников*</th>
  <th width="20%">Среднее значение затрат, руб./мес.</th>
</tr>';
  $color=1;

while($row=mysqli_fetch_array($query)){
  $id=$row["id"];
  $title=$row["title"];

  if(isset($comp_people[$id])){
  $tab[$m][$title]=$comp_people[$id]/$people_sum*100;

  //таблица, показывающая процент людей, получающих данную компенсацию
  $out1[$m].="<tr class='X1_".$color."'><td class='X1_left'>".$title."</td><td></td><td class='X1_right'>".number_format($tab[$m][$title],2)."%</td>";

  //построение массива из значений компенсаций в соответствии с каждой компенсацией
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
$out1[$m].="</table><br>";
//$out2[$m].="</table>";

//формируем массив из 2-х (или 1 таблицы, если вторая табл. пустая) таблиц с заголовками для вывод на экран
if($tab[$m]!=0){
$zag[$m]=mysqli_result(mysqli_query($link,"select type from base_compensation_types where id='$m'"),0,0);

$out[$m]="<h4>".$part.".".$number." ".$zag[$m]."</h4>";
$out[$m].='<p class="table_title">Таблица '.$part.'.'.$number.'</p>';
$out[$m].=$out1[$m];


$number++;
}

}

return $out;

}

/** 
 *  Usage: 
 *    string tmp_crypt1(string data, array seeds) 
 * 
 *  Example: 
 *    $encoded = tmp_crypt1('123456', array(1, 2, 3)); 
 *    $decoded = tmp_crypt1($encoded, array(1, 2, 3)); 
**/ 
 
function tmp_crypt1 ($str, $keys) {  
    $str = str_explode($str); 
    foreach($str as $key=>$val) { 
        array_push($keys, (array_sum($keys)&255)*2); 
        if (end($keys) > 255) 
            array_push($keys, array_pop($keys)-255); 
        array_shift($keys); 
        $str[$key] = chr(ord($val)^end($keys)); 
    } 
    return implode($str); 
} 

?>