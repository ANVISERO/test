<link href="/_css/adminka.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/_js/jquery-ui-1.7.2.custom/js/jquery-ui-1.7.2.custom.min.js"></script>
<script src="/_js/jquery-ui-1.7.2.custom/development-bundle/ui/i18n/ui.datepicker-ru.js" type="text/javascript"></script>
<?php
$jobs_list=$_POST['job'];
$jobs_string=implode(',', $jobs_list);
?>

<table>
    <tr>
        <th></th>
    <?php
    // Вывод шапки таблицы
    foreach ($jobs_list as $job_id) {
        $job_name=mysqli_result(mysqli_query($link,"SELECT name FROM base_jobs WHERE id='$job_id'"), 0,0);
    ?>
        <th><?php echo $job_name; ?></th>
        <?php } ?>
     </tr>
<?php
$cities_q=mysqli_query($link,"SELECT distinct city_id FROM base_company_jobs WHERE job_id IN($jobs_string)");

while ($cities = mysqli_fetch_object($cities_q)) {
    $city_name=mysqli_result(mysqli_query($link,"SELECT name FROM base_regions WHERE id='$cities->city_id'"), 0,0);
    ?>
     <tr>
        <th><?php echo $city_name; ?></th>
        <?php

// Расчет кол-ва человек по городам
    foreach ($jobs_list as $job_id) {
        $jobs_count=mysqli_result(mysqli_query($link,"select count(id) from base_people where job_id='$job_id'
                and region_id='$cities->city_id'"),0,0);
        ?>
        <td><?php if($jobs_count==0){echo '-';}
                    else{echo $jobs_count;}
                    ?></td>
     <?php } ?>
        </tr>
<?php } ?>
</table>

    <?php
foreach($jobs_list as $job_id){
//Описание должности
$jobs=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$job_id'"),0,1);
$jobs_other_name=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$job_id'"),0,3);
$jobs_conform=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$job_id'"),0,4);
$jobs_subordinate=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$job_id'"),0,5);
$jobs_purpose=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$job_id'"),0,6);
$jobs_mission=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$job_id'"),0,7);
$jobs_func=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$job_id'"),0,8);
$jobs_experience=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$job_id'"),0,9);
?>

<h1><?php echo $jobs; ?></h1>
<p align="right">Таблица 1. Заработная плата</p>
<table border="1">
<tr>
  <th>Компания</th>
  <th width="5%">Кол-во чел.</th>
  <th colspan="3">Должностной оклад</th>
  <th colspan="3">Заработная плата</th>
  <th>Дата обновления</th>
</tr>
<tr>
  <th></th>
  <th></th>
  <th>Мин.</th>
  <th>среднее</th>
  <th>Макс.</th>
  <th>Мин.</th>
  <th>среднее</th>
  <th>Макс.</th>
  <th></th>
</tr>

<?php
//Вычисляем параметры

$q_companies=mysqli_query($link,"select * from base_company_jobs where job_id='$job_id'  order by date desc");

while($row1=mysqli_fetch_array($q_companies)){
  
  $company_id=$row1["company_id"];
  $date=$row1["date"];
  $city_id=$row1["city_id"];

  $city_name=mysqli_result(mysqli_query($link,"select name from base_regions where id='$city_id'"),0,0);
  
  $sum_salary=0;
  $col_people=0;
  $sum_salary=0;
  $sum_salary_bonus=0;
  $salary_min=0;
  $salary_max=0;
  $sred_salary=0;
  $salary_bonus_min=0;
  $sred_salary_bonus=0;
  $salary_bonus_max=0;

  $salary=mysqli_query($link,"select * from base_people where job_id='$job_id' and company_id='$company_id' and date='$date'");
  $col_people=mysqli_num_rows($salary);

while($row3=mysqli_fetch_array($salary)){
    $sum_salary+=$row3['official_salary'];
    $sum_salary_bonus+=$row3['official_salary']+$row3['bonus']+$row3['add_payment']+$row3['premium'];

    $official_salary[]=$row3['official_salary'];
//$bonus[$company_id][$city_id][$date][]=$row3['bonus'];
//$add_payment[$company_id][$city_id][$date][]=$row3['add_payment'];
//$premium[$company_id][$city_id][$date][]=$row3['premium'];
    $salary_bonus[]=$row3['official_salary']+$row3['bonus']+$row3['add_payment']+$row3['premium'];
}

$sred_salary=round($sum_salary/$col_people);
$sred_salary_bonus=round($sum_salary_bonus/$col_people);

$salary_min=min($official_salary);
$salary_max=max($official_salary);

//Расчет $salary_bonus
/*
$n=0;
$n=count($official_salary[$company_id][$city_id][$date]);
for ($i=0; $i<($n); $i++){
 $salary_bonus[$company_id][$city_id][$date][$i]=$official_salary[$city_id][$date][$i]+$bonus[$city_id][$date][$i]+$add_payment[$city_id][$date][$i]+$premium[$city_id][$date][$i];
}
*/
$salary_bonus_min=min($salary_bonus);
$salary_bonus_max=max($salary_bonus);

echo('
<tr>
  <td>'.$company_id.' <br>('.$city_name.')</td>
  <td>'.$col_people.'</td>
  <td>'.$salary_min.'</td>
  <td>'.$sred_salary.'</td>
  <td>'.$salary_max.'</td>
  <td>'.$salary_bonus_min.'</td>
  <td>'.$sred_salary_bonus.'</td>
  <td>'.$salary_bonus_max.'</td>
  <td>'.$date.'</td>
</tr>
');
  foreach ($official_salary as $i => $value) {
    unset($official_salary[$i]);
}
foreach ($salary_bonus as $i => $value) {
    unset($salary_bonus[$i]);
}
}
?>
</table>

<p align="right">Таблица 2. О компаниях</p>
<table id="<?php echo($job_id); ?>" border="1">
    <thead>
<tr>
  <th>Компания</th>
  <th width="5%">Кол-во чел.</th>
  <th>Город</th>
  <th>Сферы д-ти</th>
  <th>Штат</th>
  <th>Оборот</th>
  <th>Дата обновления</th>
</tr>
</thead>
<tbody>
<?php
$q_companies=mysqli_query($link,"select * from base_company_jobs where job_id='$job_id'  order by date desc");
while($row1=mysqli_fetch_array($q_companies)){
  $company_id=$row1["company_id"];
  $date=$row1["date"];
  $city_id=$row1["city_id"];

$city_name=mysqli_result(mysqli_query($link,"select name from base_regions where id='$city_id'"),0,0);
$people=mysqli_result(mysqli_query($link,"select count(*) from base_people where job_id='$job_id' and company_id='$company_id' and date='$date'"),0,0);

echo('<tr><td>'.$company_id.'</td><td>'.$people.'</td><td>'.$city_name.'</td>');

//сферы деятельности
$sphere=mysqli_query($link,"select * from base_sphere where id in(select sphere_id from base_company_sphere where company_id='$company_id')");
echo('<td>');
while($row2=mysqli_fetch_array($sphere)){
    echo($row2["name"].'<br>');
}
echo('</td>');

//штат
$personal=mysqli_result(mysqli_query($link,"select title from base_personal where id=(select personal_id
from base_companies where id='$company_id')"),0,0);
echo('<td>'.$personal.'</td>');

//оборот
$turnover=mysqli_result(mysqli_query($link,"select title from base_turnover where id=(select turnover_id
from base_companies where id='$company_id')"),0,0);
echo('<td>'.$turnover.'</td>');

//дата обновления
echo('<td>'.$date.'</td>');
echo('</tr>');
}
?>
</tbody>
</table>
<script type="text/javascript">
$(document).ready(function(){
  $("#<?php echo($job_id); ?>").dataTable({
      "oLanguage":{
          "sUrl":"../_css/datatables/language/ru_RU.txt"
      },
		"aaSorting": [[7,'desc']]
  });
});
</script>
<hr>
<div style="clear:both">&nbsp;</div>

<?php } ?>
<p align="left"><input type="button" value="&laquo; назад" onClick="self.location.href='?page=statistics-jobs&step=1'"></p>