<?php
ini_set('max_execution_time', 4000);
#echo $folder.'application/libs/pear/PEAR/Spreadsheet/Excel/Writer.php';
require_once ($folder.'application/libs/pear/PEAR/Spreadsheet/Excel/Writer.php');
#echo 1;
//user id
$user_id=mysqli_result(mysqli_query($link,"SELECT id from for_users_corporat WHERE id=(SELECT user_id FROM for_users_corporat_login where session_id='".$_SESSION["user_number"]."') "),0,0);

$url=genpass(20,20);

$date=date("Y-m");
$filedir=$_SERVER['DOCUMENT_ROOT'].'/_report/user'.$user_id.'/';
$filename_xls='monthly_db_'.$date.'.xls';
$url_xls='/_report/user'.$user_id.'/'.$filename_xls;

/*
echo $url_xls;
if(file_exists($filedir.$filename_xls)){ 
    <p><a href="">База_данных_за текущий месяц.xls</a></p>
    <p align="right"><input type="button" value="Назад &raquo;" class="submit" onclick="self.location.href='/work/summary/';"></p>
<?
//} else{
*/

//for excel
$company_name=stripslashes(mysqli_result(mysqli_query($link,"SELECT company from for_users_corporat where id = '$user_id'"),0,0));
$header='Выгрузка БД за текущий месяц для компании '.$company_name;
$footer='Аналитический обзор рынка заработных плат и компенсаций | Исследование подготовлено порталом http://obzorzarplat.ru';

// Creating a workbook
$workbook = new Spreadsheet_Excel_Writer($filedir.$filename_xls);
$workbook->setVersion(8);

$format =& $workbook->addFormat(array('Size' => 11,'Align' => 'center','Bold' => 1,'Border' => 1, 'Top' => 1));
$format->setFontFamily('Times New Roman');

$format1 =& $workbook->addFormat(array('Size' => 11,'Align' => 'center','Border' => 1));
$format1->setFontFamily('Times New Roman');

$format2 =& $workbook->addFormat(array('Size' => 11, 'Border' => 1));
$format2->setFontFamily('Times New Roman');

if ($user_id != "1554") {
// Creating worksheets
$worksheet =& $workbook->addWorksheet('10%');
$worksheet5 =& $workbook->addWorksheet('25%');
$worksheet6 =& $workbook->addWorksheet('50%');
$worksheet2 =& $workbook->addWorksheet('average');
$worksheet3 =& $workbook->addWorksheet('75%');
$worksheet4 =& $workbook->addWorksheet('90%');

//$worksheet->setInputEncoding('utf-8');
//$worksheet2->setInputEncoding('utf-8');
//$worksheet3->setInputEncoding('utf-8');


$worksheet->setInputEncoding('cp1251');
$worksheet2->setInputEncoding('cp1251');
$worksheet3->setInputEncoding('cp1251');
$worksheet4->setInputEncoding('cp1251');
$worksheet5->setInputEncoding('cp1251');
$worksheet6->setInputEncoding('cp1251');

$worksheet->setColumn(0,0,50);
$worksheet->setColumn(1,1,40);
$worksheet->setColumn(2,100,15);

$worksheet2->setColumn(0,0,50);
$worksheet2->setColumn(1,1,40);
$worksheet2->setColumn(2,100,15);

$worksheet3->setColumn(0,0,50);
$worksheet3->setColumn(1,1,40);
$worksheet3->setColumn(2,100,15);

$worksheet4->setColumn(0,0,50);
$worksheet4->setColumn(1,1,40);
$worksheet4->setColumn(2,100,15);

$worksheet5->setColumn(0,0,50);
$worksheet5->setColumn(1,1,40);
$worksheet5->setColumn(2,100,15);

$worksheet6->setColumn(0,0,50);
$worksheet6->setColumn(1,1,40);
$worksheet6->setColumn(2,100,15);


$worksheet->write(0, 0, "Дата отчета",$format);
$worksheet->write(0, 1, date('d.m.Y'),$format);
$worksheet->write(1, 0, "Должностная группа",$format);
$worksheet->setMerge(1, 0, 2, 0);
$worksheet->write(1, 1, "Должность",$format);
$worksheet->setMerge(1, 1, 2, 1);

$worksheet2->write(0, 0, "Дата отчета",$format);
$worksheet2->write(0, 1, date('d.m.Y'),$format);
$worksheet2->write(1, 0, "Должностная группа",$format);
$worksheet2->setMerge(1, 0, 2, 0);
$worksheet2->write(1, 1, "Должность",$format);
$worksheet2->setMerge(1, 1, 2, 1);

$worksheet3->write(0, 0, "Дата отчета",$format);
$worksheet3->write(0, 1, date('d.m.Y'),$format);
$worksheet3->write(1, 0, "Должностная группа",$format);
$worksheet3->setMerge(1, 0, 2, 0);
$worksheet3->write(1, 1, "Должность",$format);
$worksheet3->setMerge(1, 1, 2, 1);

$worksheet4->write(0, 0, "Дата отчета",$format);
$worksheet4->write(0, 1, date('d.m.Y'),$format);
$worksheet4->write(1, 0, "Должностная группа",$format);
$worksheet4->setMerge(1, 0, 2, 0);
$worksheet4->write(1, 1, "Должность",$format);
$worksheet4->setMerge(1, 1, 2, 1);

$worksheet5->write(0, 0, "Дата отчета",$format);
$worksheet5->write(0, 1, date('d.m.Y'),$format);
$worksheet5->write(1, 0, "Должностная группа",$format);
$worksheet5->setMerge(1, 0, 2, 0);
$worksheet5->write(1, 1, "Должность",$format);
$worksheet5->setMerge(1, 1, 2, 1);

$worksheet6->write(0, 0, "Дата отчета",$format);
$worksheet6->write(0, 1, date('d.m.Y'),$format);
$worksheet6->write(1, 0, "Должностная группа",$format);
$worksheet6->setMerge(1, 0, 2, 0);
$worksheet6->write(1, 1, "Должность",$format);
$worksheet6->setMerge(1, 1, 2, 1);
} else {
$worksheet3 =& $workbook->addWorksheet('75%');
$worksheet3->setInputEncoding('cp1251');

$worksheet3->setColumn(0,0,50);
$worksheet3->setColumn(1,1,40);
$worksheet3->setColumn(2,100,15);

$worksheet3->write(0, 0, "Дата отчета",$format);
$worksheet3->write(0, 1, date('d.m.Y'),$format);
$worksheet3->write(1, 0, "Должностная группа",$format);
$worksheet3->setMerge(1, 0, 2, 0);
$worksheet3->write(1, 1, "Должность",$format);
$worksheet3->setMerge(1, 1, 2, 1);
}

//ограничение списка доступных должностей для пользователя
$blocked=mysqli_num_rows(mysqli_query($link,"select job_id from for_users_corporat_jobs where user_id='".$user_id."'"));

if($blocked!=0){
    $block_job_query=mysqli_query($link,"SELECT job_id FROM for_users_corporat_jobs where user_id='".$user_id."'");
    while($jobs=  mysqli_fetch_object($block_job_query)){
        $block_job_id[]=$jobs->job_id;
    }
    $block_job_string=implode(',',array_unique($block_job_id));

    mysqli_free_result($block_job_query);

    $block_job_subquery=" AND id IN(".$block_job_string.")";
    $block_jtype_subquery="WHERE id in(SELECT jtype_id FROM base_job_types WHERE job_id IN(".$block_job_string."))";
}else{
    $block_job_subquery="";
    $block_jtype_subquery="";
}

//должностные группы
$jtype_query=mysqli_query($link,"select id, name from base_jtype ".$block_jtype_subquery." order by name");

if(mysqli_num_rows($jtype_query)>0){
while ($row =  mysqli_fetch_array($jtype_query)){
    $jt_id=$row["id"];
    $jtype_id[]=$row["id"];
    $jtype_name[$jt_id][]=$row["name"];
}

$i = 3;
$k = 1;
$m = 2;

// города
$blocked_city=mysqli_num_rows(mysqli_query($link,"select id from for_users_corporat_cities where user_id='".$user_id."'"));

if($blocked_city!=0){
    $block_city_subquery="WHERE id IN(SELECT city_id FROM for_users_corporat_cities where user_id='$user_id')";
}else{
    $block_city_subquery="";
}

$city_query = mysqli_query($link,"select id, name from base_regions ".$block_city_subquery." order by name");

while ($row = mysqli_fetch_array($city_query)){
    $c_id = $row["id"];
    $city_id[]=$row["id"];
    $city_name[$row["id"]][]=$row["name"];

    $region_coefficient_query=mysqli_query($link,"select coefficient from base_region_coefficients where city_id='$c_id'") or die(mysql_error());
    if(mysqli_num_rows($region_coefficient_query)){
        $region_coefficient[$c_id][] = mysqli_result($region_coefficient_query, 0,0);
    }

if ($user_id != "1554") {
    $worksheet->write(2, $m, $row["name"],$format2);
    $worksheet2->write(2, $m, $row["name"],$format2);
    $worksheet3->write(2, $m, $row["name"],$format2);
    $worksheet4->write(2, $m, $row["name"],$format2);
    $worksheet5->write(2, $m, $row["name"],$format2);
    $worksheet6->write(2, $m, $row["name"],$format2);
} else {
    $worksheet3->write(2, $m, $row["name"],$format2);
}
    $m++;
}

if ($user_id != "1554") {
$worksheet->write(1, 2, "Размер среднемесячного дохода с учетом удержаний в городах в сумме",$format2);
$worksheet->setMerge(1, 2, 1, ($m-1));

$worksheet2->write(1, 2, "Размер среднемесячного дохода с учетом удержаний в городах в сумме",$format2);
$worksheet2->setMerge(1, 2, 1, ($m-1));

$worksheet3->write(1, 2, "Размер среднемесячного дохода с учетом удержаний в городах в сумме",$format2);
$worksheet3->setMerge(1, 2, 1, ($m-1));

$worksheet4->write(1, 2, "Размер среднемесячного дохода с учетом удержаний в городах в сумме",$format2);
$worksheet4->setMerge(1, 2, 1, ($m-1));

$worksheet5->write(1, 2, "Размер среднемесячного дохода с учетом удержаний в городах в сумме",$format2);
$worksheet5->setMerge(1, 2, 1, ($m-1));

$worksheet6->write(1, 2, "Размер среднемесячного дохода с учетом удержаний в городах в сумме",$format2);
$worksheet6->setMerge(1, 2, 1, ($m-1));
} else {

$worksheet3->write(1, 2, "Размер среднемесячного дохода с учетом удержаний в городах в сумме",$format2);
$worksheet3->setMerge(1, 2, 1, ($m-1));

}

//base_jtype 11456 VS, 11457 MVD, 11465 sudi

foreach($jtype_id as $jt_id){
if ($user_id != "1554") {
   $worksheet ->write($i, 0, $jtype_name[$jt_id][0],$format);
   $worksheet2->write($i, 0, $jtype_name[$jt_id][0],$format);
   $worksheet3->write($i, 0, $jtype_name[$jt_id][0],$format);
   $worksheet4->write($i, 0, $jtype_name[$jt_id][0],$format);
   $worksheet5->write($i, 0, $jtype_name[$jt_id][0],$format);
   $worksheet6->write($i, 0, $jtype_name[$jt_id][0],$format);
} else {
   $worksheet3->write($i, 0, $jtype_name[$jt_id][0],$format);
}
// должности
$job_query = mysqli_query($link,"select id, name from base_jobs where id in (select job_id from base_job_types where jtype_id='$jt_id') ".$block_job_subquery." order by name");
$k=1;

if(mysqli_num_rows($job_query)>0){

    while ($row = mysqli_fetch_array($job_query)){
	$j_id=$row["id"];
        $job_id[]=$row["id"];
	$job_name[$j_id][]=$row["name"];
    }

    foreach($job_id as $j_id){

if ($user_id != "1554") {
        $worksheet->write(($k+$i-1), 1, $job_name[$j_id][0],$format2);
        $worksheet2->write(($k+$i-1), 1, $job_name[$j_id][0],$format2);
        $worksheet3->write(($k+$i-1), 1, $job_name[$j_id][0],$format2);
        $worksheet4->write(($k+$i-1), 1, $job_name[$j_id][0],$format2);
        $worksheet5->write(($k+$i-1), 1, $job_name[$j_id][0],$format2);
        $worksheet6->write(($k+$i-1), 1, $job_name[$j_id][0],$format2);
} else {
        $worksheet3->write(($k+$i-1), 1, $job_name[$j_id][0],$format2);
}

    if(count($city_id)>0){

        $m = 2;
        foreach($city_id as $c_id) {


//    if ($jt_id == "11456" || $jt_id == "11457" && $c_id != 1) {
//	if ($jt_id == "11456" || $jt_id == "11457") {
//    	    $filter = "select official_salary, add_payment, bonus, premium, (official_salary+add_payment+bonus+premium) as salary from base_people where job_id='$j_id' and region_id='$c_id'";
//		if(mysqli_num_rows(mysqli_query($link,$filter))==0){
//	          $filter = "select official_salary, add_payment, bonus, premium, (official_salary+add_payment+bonus+premium) as salary from base_people where job_id='$j_id' and region_id='1556'";
//	        }
//	    $region_coefficient_app = 1;
//	} 
//	else if ($jt_id == "11465") {
    
//	}

//    } else {

        $filter = "select official_salary, add_payment, bonus, premium, (official_salary+add_payment+compensation+premium+premium_quarterly/3+premium_annual/12+bonus/12) as salary from base_people where job_id='$j_id' and region_id='$c_id'";
        $region_coefficient_app = 1;
        
//        $region_coefficient_app = (isset($region_coefficient_app) && $region_coefficient_app > 0) ? $region_coefficient_app : 1;
//	if ($c_id == "1432") $region_coefficient_app = "0.82";
        
	if(mysqli_num_rows(mysqli_query($link,$filter))==0){
          $filter = "select official_salary, add_payment, bonus, premium, (official_salary+add_payment+compensation+premium+(premium_quarterly/3)+(premium_annual/12)+(bonus/12)) as salary from base_people where job_id='$j_id' and region_id='1'";
          $region_coefficient_app = (isset($region_coefficient[$c_id][0])) ? $region_coefficient[$c_id][0] : 1;
        }
    //}
//base_jtype 11456 VS, 11457 MVD, 11465 sudi

        $result = mysqli_query($link,$filter) or die(mysql_error());
        
	$col_people = mysqli_num_rows($result);
            $base = Array();
            $bonus = Array();
            $add = Array();
            $premium = Array();
	    $off_salary = Array();

        if($col_people>0){
         
                while($row=mysqli_fetch_array($result)){
                    $base[]=round($row["official_salary"] * $region_coefficient_app);
                    $add[]=round($row["add_payment"] * $region_coefficient_app);
                    $bonus[]=round($row["bonus"] * $region_coefficient_app);
                    $premium[]=round($row["premium"] * $region_coefficient_app);
		    $off_salary[]=round($row["salary"] * $region_coefficient_app);
                }

                    $base    = add_items($base);
                    $add     = add_items($add);
                    $bonus   = add_items($bonus);
                    $premium = add_items($premium);
		    $off_salary = add_items($off_salary);
                
                $salary[$j_id][$c_id] = Array();
                $nsl = count($base);
                for ($isl=0; $isl<($nsl); $isl++){
//                    $salary[$j_id][$c_id][$isl]=$base[$isl]+$bonus[$isl]+$add[$isl]+$premium[$isl];
                    $salary[$j_id][$c_id][$isl]=$off_salary[$isl];
                }
            /*
                while($row = mysqli_fetch_array($result)){
                $salary[$j_id][$c_id][] = round(($row['salary']) * $region_coefficient_app);
                
           }
           */
            //**********
            if(count($salary[$j_id][$c_id])>0){
	            $salary[$j_id][$c_id]=delete_from_array($salary[$j_id][$c_id],'0');
    	             $n = count($salary[$j_id][$c_id]);
        	    if( $n>0 ){
                   // $salary[$j_id][$c_id] = add_items($salary[$j_id][$c_id]);
       
    	            $proc_10_salary[$jt_id][$j_id][$c_id] = percentile($salary[$j_id][$c_id],10);
		    $proc_25_salary[$jt_id][$j_id][$c_id] = percentile($salary[$j_id][$c_id],25);
		    $proc_50_salary[$jt_id][$j_id][$c_id] = percentile($salary[$j_id][$c_id],50);
                    $proc_75_salary[$jt_id][$j_id][$c_id] = percentile($salary[$j_id][$c_id],75);
        	    $proc_90_salary[$jt_id][$j_id][$c_id] = percentile($salary[$j_id][$c_id],90);
            	    $salary_sre[$jt_id][$j_id][$c_id]     = average($salary[$j_id][$c_id]);

    if ($user_id != "1554") {
                    $worksheet->write(($k+$i-1), $m, number_format($proc_10_salary[$jt_id][$j_id][$c_id],0,',',''),$format2);
	            $worksheet2->write(($k+$i-1), $m, number_format($salary_sre[$jt_id][$j_id][$c_id],0,',',''),$format2);
                    $worksheet3->write(($k+$i-1), $m, number_format($proc_75_salary[$jt_id][$j_id][$c_id],0,',',''),$format2);
                    $worksheet4->write(($k+$i-1), $m, number_format($proc_90_salary[$jt_id][$j_id][$c_id],0,',',''),$format2);
                    $worksheet5->write(($k+$i-1), $m, number_format($proc_25_salary[$jt_id][$j_id][$c_id],0,',',''),$format2);
                    $worksheet6->write(($k+$i-1), $m, number_format($proc_50_salary[$jt_id][$j_id][$c_id],0,',',''),$format2);
    } else {
	            $worksheet3->write(($k+$i-1), $m, number_format($proc_75_salary[$jt_id][$j_id][$c_id],0,',',''),$format2);
    }

        	    }
         	 }
			 unset($salary);
 			 unset($salary_sre);
			 unset($proc_10_salary);
			 unset($proc_25_salary);
			 unset($proc_50_salary);
                         unset($proc_75_salary);
 			 unset($proc_90_salary);
        }
        $m++;

        }
    }
    $k++;
    }
  }

if ($user_id != "1554") {
  $worksheet->setMerge($i,0, $i+$k-2,0);
  $worksheet2->setMerge($i,0, $i+$k-2,0);
  $worksheet3->setMerge($i,0, $i+$k-2,0);
  $worksheet4->setMerge($i,0, $i+$k-2,0);
  $worksheet5->setMerge($i,0, $i+$k-2,0);
  $worksheet6->setMerge($i,0, $i+$k-2,0);
} else {
  $worksheet3->setMerge($i,0, $i+$k-2,0);
}

  $i=$i+$k-1;
  unset($job_id);
  unset($job_name);

}

}
// Let's send the file
$workbook->close();

?>
    <p><a href="<?php echo $url_xls;?>">База данных за текущий месяц.xls</a></p>
    <p align="right"><input type="button" value="Назад &raquo;" class="submit" onclick="self.location.href='/work/summary/';"></p>

    <?php
//}
?>