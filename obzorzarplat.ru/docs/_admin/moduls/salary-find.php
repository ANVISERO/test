<style type="text/css">
<!---
h1 {font-size:13px; font-weight:bold;}
-->
</style>

<?
//include($folder.'/_admin/moduls/salary-ban.php');

$jtype=$_POST['jtype'];


echo('<input type="button" value="&laquo; Назад" class="but" onClick="self.location.href=\'/servis/zp/\';">');

//Расчет процентилей
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
//

$jtype_name=mysqli_result(mysqli_query($link,"select name from base_jtype where id='$jtype'"),0,0);
$kov="'";

if(!isset($_POST['job']))
{echo('
<center>
<font style="color:#cc0000"><b>Должность не выбрана!</b></font>
</center>
');}

if(isset($_POST['job']))
{
$jobs_id=$_POST['job'];
$region_id=$_POST['city'];

//Описание должности
$jobs=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,24);
$jobs_other_name=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,3);
$jobs_conform=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,4);
$jobs_subordinate=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,5);
$jobs_purpose=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,6);
$jobs_mission=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,7);
$jobs_func=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,8);
$jobs_experience=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,9);

//Вычисляем параметры
if($region_id=='0' || $region_id==""){
$filter="select * from base_people where job_id='$jobs_id' and official_salary>0 order by official_salary";
$region="";
}
else
{
$region=mysqli_result(mysqli_query($link,"select name_partitive from base_regions where id='$region_id'"),0,0);
$region="в ".$region;
$filter="select * from base_people where job_id='$jobs_id' and region_id='$region_id' and official_salary>0 order by official_salary";
}

$result=mysqli_query($link,"$filter");
$col_people=mysqli_num_rows($result);

$sum_salary=0;
$sum_salary_bonus=0;

while($row=mysqli_fetch_array($result))
{
$sum_salary+=$row['official_salary'];
$sum_salary_bonus+=$row['official_salary']+$row['bonus']+$row['add_payment']+$row['premium'];

$official_salary[]=$row['official_salary'];
$bonus[]=$row['bonus'];
$add_payment[]=$row['add_payment'];
$premium[]=$row['premium'];
}

$sred_salary=round($sum_salary/$col_people);
$sred_salary_bonus=round($sum_salary_bonus/$col_people);

$proc_25_salary=percentile($official_salary,25);
$proc_75_salary=percentile($official_salary,75);

//Расчет $salary_bonus
$n=count($official_salary);
for ($i=0; $i<($n); $i++){
 $salary_bonus[$i]=$official_salary[$i]+$bonus[$i]+$add_payment[$i]+$premium[$i];
}

sort($salary_bonus);

$proc_25_salary_bonus=percentile($salary_bonus,25);
$proc_75_salary_bonus=percentile($salary_bonus,75);
//Конец вычисления параметров

//Вывод
?>

<script type="text/javascript" src="/_js/virtualpaginate.js">

/***********************************************
* Virtual Pagination script- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<link href="/_css/salary.css" rel="stylesheet" type="text/css" />

<?
echo('
<center><h1>Заработная плата '.$jobs.' '.$region.'</h1></center>
');

include($folder.'_admin/moduls/salary-echo.php');
}
?>
