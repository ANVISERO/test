<?php
/**************Расчет процентилей********************************/
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
/*****************************************************************/

//сбор данных
$id=implode("", file('settings/count_id'));
countplus();
$date=$_POST["date"]; //дата публикации
$job_id=intval($_POST["job"]); //должность
$anons=stripslashes($_POST["anons"]); //анонс
$info=stripslashes($_POST["info"]); //специальная информация о должности
$job_description=stripslashes($_POST["job_description"]); //описание должности
$analitics=stripslashes($_POST["analitics"]); //описание должности

if(isset($_POST["status"])){$status=1;}
if(!isset($_POST["status"])){$status=0;}
$lang=$_POST['lang'];

//средняя ЗП
$salary_avg="
<table border='1' class='for_salary'>
<tr>
  <th rowspan='2'>Город</th>
  <th colspan='3'>I квартал 2009г.</th>
</tr>
<tr>
  <th>25 процентиль, руб.</th>
  <th>Среднее значение, руб.</th>
  <th>75 процентиль, руб.</th>
</tr>";

//подключение к базе
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if($lang==0){
$job_name=mysqli_result(mysqli_query($link,"select name from base_jobs where id='$job_id'"),0,0);
}

if($lang==1){
$job_name=mysqli_result(mysqli_query($link,"select name_eng from base_jobs where id='$job_id'"),0,0);
}

//функция расчета средней ЗП
/*Распределение по городам********************************/

$q_city=mysqli_query($link,"select * from base_regions where id in(select city_id from base_company_jobs where job_id='$job_id' and (quarter like '2009 2%' or quarter like '2009 3%'))");


while($row1=mysqli_fetch_array($q_city)){
  $q_salary="select * from base_people where job_id='$job_id' and region_id='".$row1["id"]."' and (date like '2009-04%' or date like '2009-05%' or date like '2009-06%' or date like '2009-07%' or date like '2009-08%' or date like '2009-09%')";
  $city=$row1["id"];

  $salary[$city]=mysqli_query($link,$q_salary);

  $col_people[$city]=mysqli_num_rows($salary[$city]);

while($row=mysqli_fetch_array($salary[$city]))
{
$sum_salary[$city]+=$row['official_salary'];
$sum_salary_bonus[$city]+=$row['official_salary']+$row['bonus']+$row['add_payment']+$row['premium'];

$official_salary[$city][]=$row['official_salary'];
$bonus[$city][]=$row['bonus'];
$add_payment[$city][]=$row['add_payment'];
$premium[$city][]=$row['premium'];
}

//$sred_salary=round($sum_salary/$col_people);
$sred_salary_bonus[$city]=round($sum_salary_bonus[$city]/$col_people[$city]);

$n=count($official_salary[$city]);
for ($i=0; $i<($n); $i++){
 $salary_bonus[$city][$i]=$official_salary[$city][$i]+$bonus[$city][$i]+$add_payment[$city][$i]+$premium[$city][$i];
}

sort($salary_bonus[$city]);

$proc_25_salary_bonus[$city]=percentile($salary_bonus[$city],25);
$proc_75_salary_bonus[$city]=percentile($salary_bonus[$city],75);

$salary_avg.="<tr><td>".$row1["name"]."</td><td>".number_format($proc_25_salary_bonus[$city],0,',',' ')."</td><td>".number_format($sred_salary_bonus[$city],0,',',' ')."</td><td>".number_format($proc_75_salary_bonus[$city],0,',',' ')."</td></tr>";

}

$salary_avg.="</table>";

/**************Средняя заработная плата по России*/
 $q_salary_all="select * from base_people where job_id='$job_id' and (date like '2009-04%' or date like '2009-05%' or date like '2009-06%' or date like '2009-07%' or date like '2009-08%' or date like '2009-09%')";

  $salary_all=mysqli_query($link,$q_salary_all);

  $col_people_all=mysqli_num_rows($salary_all);

while($row=mysqli_fetch_array($salary_all))
{
$sum_salary_all+=$row['official_salary'];
$sum_salary_bonus_all+=$row['official_salary']+$row['bonus']+$row['add_payment']+$row['premium'];

$official_salary_all[]=$row['official_salary'];
$bonus_all[]=$row['bonus'];
$add_payment_all[]=$row['add_payment'];
$premium_all[]=$row['premium'];
}

//$sred_salary=round($sum_salary/$col_people);
$sred_salary_bonus_all=round($sum_salary_bonus_all/$col_people_all);

$n=count($official_salary_all);
for ($i=0; $i<($n); $i++){
 $salary_bonus_all[$i]=$official_salary_all[$i]+$bonus_all[$i]+$add_payment_all[$i]+$premium_all[$i];
}

sort($salary_bonus_all);

$proc_25_salary_bonus_all=percentile($salary_bonus_all,25);
$proc_75_salary_bonus_all=percentile($salary_bonus_all,75);

$salary_all=number_format($proc_25_salary_bonus_all,0,',',' ')." - ".number_format($proc_75_salary_bonus_all,0,',',' ');



//запись в базу
$query="insert into for_salary value ('$id','$date','$job_name','$salary_all','$status','$lang')";
$result=mysqli_query($link,$query);

$filefolder='elements/salary/';

//Создание файлов

$fullpath=$filefolder.$id.'_anons.txt';
$file = fopen ("$fullpath","w+");
fputs ( $file, $anons);
fclose ($file);

$fullpath=$filefolder.$id.'_info.txt';
$file = fopen ("$fullpath","w+");
fputs ( $file, $info);
fclose ($file);

$fullpath=$filefolder.$id.'_job_description.txt';
$file = fopen ("$fullpath","w+");
fputs ( $file, $job_description);
fclose ($file);

$fullpath=$filefolder.$id.'_analitics.txt';
$file = fopen ("$fullpath","w+");
fputs ( $file, $analitics);
fclose ($file);

$fullpath=$filefolder.$id.'_salary.txt';
$file = fopen ("$fullpath","w+");
fputs ( $file, $salary_avg);
fclose ($file);

//Загрузка картинки
if(file_exists($_FILES['small-photo'] ['tmp_name']))
{

$photo= $id.'.jpg';
$uploaddir=$filefolder;
move_uploaded_file($_FILES['small-photo'] ['tmp_name'], $uploaddir . $photo);
$file=$filefolder.$id.'.jpg';
$path_real=$file;
$src_img=ImageCreateFromJpeg("$path_real");
$src_width=ImagesX($src_img);
$src_height=ImagesY($src_img);
$dest_width="300";
$dest_height="300";
$quality="300";
$dest_img=ImageCreateTrueColor($dest_width, $dest_height);
ImageCopyResampled($dest_img, $src_img, 0, 0, 0, 0, $dest_width, $dest_height, $src_width, $src_height);
ImageJpeg($dest_img, $file, $quality);
ImageDestroy($dest_img);
}
?>
<script>
self.location.href='?page=salary';
</script>