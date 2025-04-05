<?php
$surveys_q=mysqli_query($link,"SELECT id, name, survey_type_id FROM for_surveys WHERE active = 1 order by id desc limit 3"); 
while ($survyes = mysqli_fetch_object($surveys_q)) {
    echo "<dd> - <a href='/isl/surveys/?survey_type_id=".$survyes->survey_type_id."&id=".$survyes->id."'>".$survyes->name."</dd>";
}
?>
