<?php

$people_id = intval($_POST["id"]);
$company_id = intval($_POST["companies"]);
$job_id = intval($_POST["jobs"]);
$region_id = intval($_POST["region"]);
$seniority = $_POST["seniority"];
$official_salary = $_POST["official_salary"];
$premium = $_POST["premium"];
$bonus = $_POST["bonus"];
$fine = $_POST["fine"];
$compensation = $_POST["compensation"];
$add_payment = $_POST["add_payment"];
$period_id = $_POST['period'];
$payment_id = $_POST['payment'];
$section_id = $_POST['section'];

if ($people_id) {

	$query = "update base_people SET company_id = '$company_id', job_id = '$job_id', 
	region_id = '$region_id', seniority = '$seniority', official_salary = '$official_salary', premium = '$premium',
	bonus = '$bonus', compensation = '$compensation', add_payment = '$add_payment', fine = '$fine', period_id = '$period_id', 
	payment_id = '$payment_id', section_id = '$section_id' 
	
	WHERE id = '$people_id' LIMIT 1";
	mysqli_query($link,$query) or die(mysql_error());
	
	if(isset($_POST["premium_id"])){
		$premium_id = $_POST["premium_id"];
		mysqli_query($link,"delete from base_people_premiums where people_id='$people_id'");
		
		foreach($premium_id as $p_id){
			$premium = explode("_", $p_id);
			mysqli_query($link,"INSERT INTO base_people_premiums(people_id, premium_title_id, premium_id, job_id, company_id) VALUES('$people_id', '$premium[0]', '$premium[1]', '$job_id', '$company_id') ") or die(mysql_error());
			
		}
	}
	
	
	if(isset($_POST["compensation_id"])){
	$compensation_id = $_POST["compensation_id"];
		mysqli_query($link,"delete from base_people_compensations where people_id='$people_id'");
		
			foreach($compensation_id as $c_id){
				$pol_field = "compensations_".$c_id."_politics_id";
					if (isset($_POST[$pol_field])) {
						$politics_id = $_POST[$pol_field];
							foreach($politics_id as $p_id){
								$query = "insert into base_people_compensations (compensation_id, people_id, job_id, company_id, sum, politics_id, date) VALUES " ;
								$query .= "('$c_id', '$people_id', '$job_id', '$company_id'";
								
								$sum_pol_field = "compensations_".$c_id."_politics_".$p_id."_sum";
								if (isset($_POST[$sum_pol_field])) if ($_POST[$sum_pol_field]) $query .= ", '".$_POST[$sum_pol_field]."'";
									else $query .= ", '0'";
								
								$query .= ", '$p_id', NOW());";	
								//echo $query;
								mysqli_query($link,$query) or die(mysql_error());
								
							}
					} else {
					
						$query = "insert into base_people_compensations (compensation_id, people_id, job_id, company_id, sum, politics_id, date) VALUES " ;
						$query .= "('$c_id', '$people_id', '$job_id', '$company_id'";
				
						$sum_field = "compensations_".$c_id."_sum";
						if (isset($_POST[$sum_field])) if ($_POST[$sum_field]) $query .= ", '".$_POST[$sum_field]."'";
							else $query .= ", '0'";
						$query .= ", '0', NOW());";	
						//echo $query;
						mysqli_query($link,$query) or die(mysql_error());
				}						
				
				

//    			mysqli_query($link,"insert into base_company_sphere (company_id,sphere_id) values ('$company_id','$sphere_id')");
			}
	}
}
/*
//сбор данных
//about company
$name=iconv('utf-8', 'windows-1251', $_POST["name"]);
$age=$_POST["age"];
$personal=$_POST["personal"];
$coeff=$_POST["coeff"];
$turnover=$_POST["turnover"];
$turnover_id=$_POST["turnover_id"];
$capital_id=$_POST["capital"];
$evolution_id=$_POST["evolution"];
$region_id=$_POST["regions"];
$assortment_id=$_POST["assortment"];
if(isset($_POST["spheres"])){$spheres=$_POST["spheres"];}
$date=$_POST["date"];
$salaryIncreasing=$_POST["salaryIncreasing"];

//salary payment
$freq_id=intval($_POST["salaryFrequency"]);
$currency_id=intval($_POST["currencyPolitics"]);
$currencyFrequency_id=intval($_POST["currencyFrequency"]);
$payment_id=intval($_POST["salaryPayment"]);
$period_id=intval($_POST["salaryPeriod"]);
$holidays_id=intval($_POST["holidaysBase"]);

//$job=$_POST['job'];
//$people_change=$_POST['people_change'];

print_r($_POST);

//обновление информации по компании
$company_exist=mysqli_num_rows(mysqli_query($link,"select id from base_companies where id='$company_id'"));

if($company_exist==0){
    //INSERT row, if no exists
    mysqli_query($link,"insert into base_companies (`id`,`name`, `age_id`,`personal_id`,`coeff_id`,`turnover`,`capital_id`,`evolution_id`,
`region_id`,`turnover_id`,`assortment_id`,`date`,`salaryIncreasing`,`freq_id`,`currency_id`,`currencyFrequency_id`,`payment_id`,
`period_id`,`holidays_id`)
Values('$company_id','".$name."','".$age."','".$personal."','".$coeff."','".$turnover."', '".$capital_id."', '".$evolution_id."',
'".$region_id."','".$turnover_id."','".$assortment_id."','".$date."','".$salaryIncreasing."','".$freq_id."','".$currency_id."','".$currencyFrequency_id."',
'".$payment_id."','".$period_id."','".$holidays_id."')");
}else{
    //UPDATE row, if exists
    mysqli_query($link,"update base_companies SET `name` = '".$name."', `age_id` = '".$age."', `personal_id` = '".$personal."',
`coeff_id` = '".$coeff."', `turnover` = '".$turnover."', `capital_id` = '".$capital_id."', `evolution_id` = '".$evolution_id."',
`region_id` = '".$region_id."',`turnover_id`='".$turnover_id."',`assortment_id`='".$assortment_id."', `date`='".$date."',
`salaryIncreasing`='".$salaryIncreasing."',`freq_id`='".$freq_id."', `currency_id`='".$currency_id."', `currencyFrequency_id`='".$currencyFrequency_id."',
`payment_id`=".$payment_id.", `period_id`=".$period_id.", `holidays_id`=".$holidays_id."
where `id`='$company_id'");
}


//запись в базу (обновление информации по сферам компании)
if(isset($_POST["spheres"])){
mysqli_query($link,"delete from base_sphere where company_id='$company_id'");
foreach($spheres as $sphere_id){
    mysqli_query($link,"insert into base_company_sphere (company_id,sphere_id) values ('$company_id','$sphere_id')");
}
}
//обновление информации, связанной с людьми из компании base_people
mysqli_query($link,"update `base_people`
set region_id='$region_id'
WHERE company_id='$company_id';");

//обновление информации, связанной с должностями компании base_company_jobs
mysqli_query($link,"update `base_company_jobs`
set city_id='$region_id'
WHERE company_id='$company_id';");
*/
?>