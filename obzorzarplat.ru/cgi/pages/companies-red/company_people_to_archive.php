<?php
//перенос данных в архив
$dateStart=$_POST['dateStart'];
$dateFinish=$_POST['dateFinish'];
$company_id=intval($_POST['company_id']);

//Перенос данных
mysqli_query($link,"INSERT INTO archive_people(id,company_id,job_id,seniority,official_salary,add_payment,bonus,fine,compensation,premium,region_id,payment_id,period_id,date,premium_annual,premium_quarterly)
    SELECT id,company_id,job_id,seniority,official_salary,add_payment,bonus,fine,compensation,premium,region_id,payment_id,period_id,date,premium_annual,premium_quarterly FROM base_people
    WHERE company_id='$company_id' AND date between '$dateStart' AND '$dateFinish'");

mysqli_query($link,"DELETE from base_people WHERE company_id='$company_id' AND date between '$dateStart' AND '$dateFinish'");

//Добавление, если нужно, записей в таблице archive_company_jobs
mysqli_query($link,"Insert into `archive_company_jobs`(`company_id`, `job_id`, `city_id`,`date`)
select company_id, job_id, region_id, date from archive_people where company_id='$company_id'
        AND date between '$dateStart' AND '$dateFinish'");

mysqli_query($link,"alter ignore table `archive_company_jobs`
add unique index(`company_id`, `job_id`, `city_id`, `date`)");

mysqli_query($link,"ALTER TABLE `archive_company_jobs` DROP INDEX `company_id`");

//Удаление, если нужно, записи в таблице base_company_jobs
$people_numrow=mysqli_num_rows(mysqli_query($link,"SELECT id FROM base_people WHERE job_id='$job_id' AND company_id='$company_id' AND date between '$dateStart' AND '$dateFinish'"));
if($people_numrow==0){
    mysqli_query($link,"DELETE FROM base_company_jobs WHERE job_id='$job_id' AND company_id='$company_id' AND date='$date'");
}
?>