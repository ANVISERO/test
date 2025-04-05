<?php
/*
$company_id=intval($_POST["id"]);
$company_exist=mysqli_num_rows(mysqli_query($link,"select id from base_companies where id='$company_id'"));

$result=mysqli_query($link,"select id, title, prefix from base_company_q_jobgroups order by id");

if($company_exist){
	mysqli_query($link,"DELETE FROM base_company_questionary WHERE company_id ='".$company_id."'");
	while($row = mysqli_fetch_array($result)){
		$monthly_premium_id = $_POST['premiumMonthly'.$row['prefix']];
		
		$premiumtypes = $_POST['premiumType'.$row['prefix']];
		
			if (!empty($premiumtypes)) {
				$maxlist_id = 0;
				$maxlist_id = mysqli_result(mysqli_query($link,"select max(list_id) from base_company_questionary_premiums"),0,0);
				$maxlist_id = $maxlist_id + 1;
				$q = "insert into base_company_questionary_premiums (list_id, premiumtype_id) VALUES ";
		
					foreach ($premiumtypes as $premium_id) {
						$q .= "('".$maxlist_id."', '".$premium_id."'),";					
					}
				$q = substr($q, 0, strlen($q)-1);
				$premiumtypes_listid = $maxlist_id;
				mysqli_query($link,$q);
			} else $premiumtypes_listid = 0;
			
		
		$premiumreasons_id  = $_POST['premiumYear'.$row['prefix']];
		$compfood_id   = $_POST['compensationBaseMeal'.$row['prefix']];
		$comptrans_id  = $_POST['compensationBaseTransport'.$row['prefix']];
		$compmobile_id = $_POST['compensationBasePhone'.$row['prefix']];
		$insertQuery = "INSERT into base_company_questionary(company_id, jobgroup_id, monthly_premium_id, premiumtypes_listid, premiumreasons_id, compfood_id, 
		 comptrans_id, compmobile_id) VALUES ($company_id, '".$row['id']."', '$monthly_premium_id', '$premiumtypes_listid', '$premiumreasons_id', '$compfood_id', '$comptrans_id', '$compmobile_id')";
		 //echo $insertQuery;
		//file_put_contents('/var/www/obzorzarplat.ru/logs/php/errlog.txt', $insertQuery , FILE_APPEND);
		mysqli_query($link,$insertQuery);
	}
}



//сбор данных
//about company
$company_id=intval($_POST["id"]);
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