<ul>
<li><a href="/work/" class="lk1">Общеотраслевой обзор</a></li>
<br>
    <ol>
<?php
$user_id=mysqli_result(mysqli_query($link,"SELECT user_id from for_users_corporat_login where session_id = '".$_SESSION['user_number']. "' "),0,0);

$reports_q=mysqli_query($link,"SELECT title,url FROM for_report_type WHERE id IN(
    SELECT report_id from for_tarif_reports where tarif_id=(
        SELECT tarif_id from for_users_corporat WHERE id='$user_id'))
    OR id IN(SELECT report_type_id from for_users_corporat_report_type where user_id='$user_id')
        order by title");
while ($reports = mysqli_fetch_object($reports_q)) {
    echo "<li><a href='/work/".$reports->url."'>".$reports->title."&raquo;</a></li>";
}
?>
    </ol>
<br>

<?php
//Другие типы обзоров








$users_surveys_q = mysqli_query ($link, "select survey_id FROM for_users_corporat_surveys WHERE user_id='".$user_id."'") or die(mysqli_error($link));

if( mysqli_num_rows($users_surveys_q)!=0){

while ($users_surveys = mysqli_fetch_object($users_surveys_q)) {
    $users_surveys_ids[]=$users_surveys->survey_id;
}

$users_surveys_ids_string=implode(',',$users_surveys_ids);

$surveys_types_q=mysqli_query($link,"SELECT name,id FROM for_survey_types WHERE id in(SELECT survey_type_id from for_surveys WHERE id in(".$users_surveys_ids_string.")) order by name");

while ($surveys_types = mysqli_fetch_object($surveys_types_q)) {
    echo "<li><b>".$surveys_types->name."</b></li>";
    echo "<ol>";

    $surveys_q=mysqli_query($link,"SELECT id,name FROM for_surveys WHERE id in(".$users_surveys_ids_string.") AND survey_type_id='".$surveys_types->id."'");

    while ($surveys = mysqli_fetch_object($surveys_q)) {
        echo "<li><a>".$surveys->name."</a></li>";
    }
    echo "</ol>";
}
}


?>

<li><a href="/archive/">Архив</a></li>
<li><a href="/">Профайл</a></li>
<li><a href="/support/">Служба поддержки</a></li>
</ul>