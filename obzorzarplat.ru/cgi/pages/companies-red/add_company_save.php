<?php
//сбор данных
//about company
$company_id=intval($_POST["id"]);
$name=iconv('utf-8', 'windows-1251', $_POST["name"]);
$age=$_POST["age"];
$personal=$_POST["personal"];
$coeff=$_POST["coeff"];
if(empty($_POST["turnover"])) {
	$turnover = 0;
}else{
	$turnover=$_POST["turnover"];
}
$turnover_id=$_POST["turnover_id"];
$capital_id=$_POST["capital"];
$evolution_id=$_POST["evolution"];
$region_id=$_POST["regions"];
if(empty($_POST["assortment"])) {
	$assortment_id = 0;
}else{
	$assortment_id=$_POST["assortment"];
}
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
`region_id`,`turnover_id`,`assortment_id`,`date`,`company_info_id`,`salaryIncreasing`,`freq_id`,`currency_id`,`currencyFrequency_id`,`payment_id`,
`period_id`,`holidays_id`)
Values('$company_id','".$name."','".$age."','".$personal."','".$coeff."','".$turnover."', '".$capital_id."', '".$evolution_id."',
'".$region_id."','".$turnover_id."','".$assortment_id."','".$date."','0','".$salaryIncreasing."','".$freq_id."','".$currency_id."','".$currencyFrequency_id."',
'".$payment_id."','".$period_id."','".$holidays_id."')") or die (mysqli_error($link));
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

?>