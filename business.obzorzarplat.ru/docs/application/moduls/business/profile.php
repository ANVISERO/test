<?php
$user_q=mysqli_query($link,"SELECT id,name,company,email,date_start,date_finish,tarif_id from for_users_corporat where id = (
    SELECT user_id FROM for_users_corporat_login WHERE session_id='".$_SESSION["user_number"]."') ");
while($row=mysqli_fetch_array($user_q)){
    $user_id=$row["id"];
    $name=stripslashes($row["name"]);
    $company=stripslashes($row["company"]);
    $email=stripslashes($row["email"]);
    $date_start=$row["date_start"];
    $date_finish=$row["date_finish"];
    $tarif_id=$row["tarif_id"];
}

?>
<h2>Ваши данные для контактов</h2>
    <table border="0">
    <tr>
		<td align="right"><label for="name">Имя</label></td>
		<td align="left"><?php if(isset($name)){echo $name;}?></td>
    </tr>
    <tr>
		<td align="right"><label for="company">Компания</label></td>
		<td align="left"><?php if(isset($company)){echo htmlspecialchars($company,ENT_QUOTES);} ?></td>
    </tr>
    <tr>
		<td align="right"><label for="email">Email</label></td>
		<td align="left"><?php if(isset($email)){echo $email;}?></td>
    </tr>
   </table>

<h2>Ваш договор</h2>
<?php
    $tarif_title=mysqli_result(mysqli_query($link,"SELECT title from for_tarif WHERE id='$tarif_id'"),0,0);
?>

<table class="standart">
    <tr>
        <td>Ваш тариф</td>
        <td><b><?php echo($tarif_title);?></b></td>
    </tr>
    <tr>
        <td>Общеотраслевой обзор. Отчеты</td>
        <td>
             <ol>
<?php
$user_id=mysqli_result(mysqli_query($link,"SELECT user_id from for_users_corporat_login where session_id = '".$_SESSION['user_number']. "' "),0,0);

$reports_q=mysqli_query($link,"SELECT title,url FROM for_report_type WHERE id IN(
    SELECT report_id from for_tarif_reports where tarif_id=(
        SELECT tarif_id from for_users_corporat WHERE id='$user_id'))
    OR id IN(SELECT report_type_id from for_users_corporat_report_type where user_id='$user_id')
        order by title");
while ($reports = mysqli_fetch_object($reports_q)) {
    echo "<li><a href='/work/".$reports->url."' class='black'>".$reports->title."&raquo;</a></li>";
}
?>
    </ol>
        </td>
    </tr>
    <tr>
        <td>Обзоры</td>
        <td>
           <?php
//Другие типы обзоров

$users_surveys_q = mysqli_query($link, "select survey_id FROM for_users_corporat_surveys WHERE user_id='".$user_id."'") or die(mysqli_error($link));

if (mysqli_num_rows($users_surveys_q)) {

while ($users_surveys = mysqli_fetch_object($users_surveys_q)) {
    $users_surveys_ids[]=$users_surveys->survey_id;
}

$users_surveys_ids_string=implode(',',$users_surveys_ids);

$surveys_types_q = mysqli_query($link, "SELECT name,id FROM for_survey_types WHERE id in(SELECT survey_type_id from for_surveys WHERE id in(".$users_surveys_ids_string.")) order by name");

while ($surveys_types = mysqli_fetch_object($surveys_types_q)) {
    echo "<p><b>".$surveys_types->name."</b></p>";
    echo "<ol>";
    $surveys_q=mysqli_query($link,"SELECT id,name FROM for_surveys WHERE id in(".$users_surveys_ids_string.") AND survey_type_id='".$surveys_types->id."'");
    while ($surveys = mysqli_fetch_object($surveys_q)) {
        echo "<li><a class='black'>".$surveys->name."</a></li>";
    }
    echo "</ol>";
}

}
?>
        </td>
    </tr>
    <tr>
        <td>Даты предоставления услуг</td>
        <td><b><?php echo(date('d.m.Y', strtotime($date_start)));?> - <?php echo(date('d.m.Y', strtotime($date_finish)));?></b></td>
    </tr>
</table>