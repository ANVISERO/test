<?php
header('Content-Type: application/json');

$people_id=intval($_POST['id']);
$job_id=intval($_POST['job_id']);
$company_id=intval($_POST['company_id']);
$official_salary=mysqli_real_escape_string($link,$_POST['official_salary']);
$premium=mysqli_real_escape_string($link,$_POST['premium']);
$premium_annual=mysqli_real_escape_string($link,$_POST["premium_annual"]);
$premium_quarterly=mysqli_real_escape_string($link,$_POST["premium_quarterly"]);
$compensation=mysqli_real_escape_string($link,$_POST['compensation']);
$bonus=mysqli_real_escape_string($link,$_POST["bonus"]);
$add_payment=mysqli_real_escape_string($link,$_POST["add_payment"]);
$region_id=intval($_POST["region_id"]);
$date=$_POST["date"];
$toDo=$_POST["toDo"];

switch ($toDo) {
    //Сохраняем изменения
    case 'save':
        mysqli_query($link,"UPDATE base_people SET official_salary='$official_salary',premium='$premium',
                premium_quarterly='$premium_quarterly',premium_annual='$premium_annual',
                compensation='$compensation',bonus='$bonus',add_payment='$add_payment',date='$date'
                WHERE id='$people_id';");
        echo json_encode(array());

     //Изменение/добавление, если нужно, записи в таблице base_company_jobs
        $base_insert_numrow=mysqli_num_rows(mysqli_query($link,"SELECT id FROM base_company_jobs WHERE job_id='$job_id' AND company_id='$company_id' AND date='$date'"));
        if($base_insert_numrow==0){
           mysqli_query($link,"INSERT INTO base_company_jobs(company_id,job_id,city_id,date) VALUES('$company_id','$job_id','$region_id','$date')");
        }

        $base_delete_numrow=mysqli_num_rows(mysqli_query($link,"SELECT id FROM base_people WHERE job_id='$job_id' AND company_id='$company_id' AND date!='$date'"));
        if($base_delete_numrow==0){
            mysqli_query($link,"DELETE FROM base_company_jobs WHERE job_id='$job_id' AND company_id='$company_id' AND date!='$date'");
        }

        break;
    //Клонируем человека с такой должностью
    case 'clone':
        mysqli_query($link,"INSERT INTO base_people(job_id,company_id,region_id,official_salary,premium,premium_quarterly,premium_annual,compensation,bonus,add_payment,date)
            values('$job_id','$company_id','$region_id','$official_salary','$premium','$premium_quarterly','$premium_annual','$compensation','$bonus','$add_payment','$date')");
        $new_people_id= mysql_insert_id();
        echo json_encode(array("new_people_id"=>"$new_people_id"));
        break;

    //Перенос данных в архив
    case 'archive':
        mysqli_query($link,"INSERT INTO archive_people(id,job_id,company_id,region_id,official_salary,premium,premium_quarterly,premium_annual,compensation,bonus,add_payment,date)
            values('$people_id','$job_id','$company_id','$region_id','$official_salary','$premium','$premium_quarterly','$premium_annual','$compensation','$bonus','$add_payment','$date')");
        mysqli_query($link,"DELETE FROM base_people WHERE id='$people_id'");

    //Добавление, если нужно, записи в таблице archive_company_jobs
        $archive_numrow=mysqli_num_rows(mysqli_query($link,"SELECT id FROM srchive_company_jobs WHERE job_id='$job_id' AND company_id='$company_id' AND date='$date'"));
        if($archive_numrow>0){
            mysqli_query($link,"INSERT INTO archive_company_jobs(company_id,job_id,city_id,date) VALUES('$company_id','$job_id','$region_id','$date')");
        }

    //Удаление, если нужно, записи в таблице base_company_jobs
        $people_numrow=mysqli_num_rows(mysqli_query($link,"SELECT id FROM base_people WHERE job_id='$job_id' AND company_id='$company_id' AND date='$date'"));
        if($people_numrow==0){
            mysqli_query($link,"DELETE FROM base_company_jobs WHERE job_id='$job_id' AND company_id='$company_id' AND date='$date'");
        }
        echo json_encode(array());

        break;

    //Удаление
    case 'delete':
        mysqli_query($link,"DELETE FROM base_people WHERE id='$people_id'");

    //Удаление, если нужно, записи в таблице base_company_jobs
        $people_numrow=mysqli_num_rows(mysqli_query($link,"SELECT id FROM base_people WHERE job_id='$job_id' AND company_id='$company_id' AND date='$date'"));
        if($people_numrow==0){
            mysqli_query($link,"DELETE FROM base_company_jobs WHERE job_id='$job_id' AND company_id='$company_id' AND date='$date'");
        }
        echo json_encode(array());
        
        break;

    default:
        break;
}
?>
