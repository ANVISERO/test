<?php
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
$date=$_POST["date"];
$toDo=$_POST["toDo"];

switch ($toDo) {
    //Сохраняем изменения
    case 'save':
        mysqli_query($link,"UPDATE archive_people SET official_salary='$official_salary',premium='$premium',
                premium_quarterly='$premium_quarterly',premium_annual='$premium_annual',
                compensation='$compensation',bonus='$bonus',add_payment='$add_payment',date='$date'
                WHERE id='$people_id';");

        break;
    
    //Удаление
    case 'delete':
        mysqli_query($link,"DELETE FROM archive_people WHERE id='$people_id'");
        break;

    default:
        break;
}
?>
