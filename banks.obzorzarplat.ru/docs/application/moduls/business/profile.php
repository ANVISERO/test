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
<h2>Данные пользователя</h2>

    <table class="standart">
    <tr>
        <th class="th_left" width="30%">Имя</th>
        <td width="70%"><?php if(isset($name)){echo $name;}?></td>
    </tr>
    <tr>
	<th class="th_left">Компания</th>
	<td><?php if(isset($company)){echo htmlspecialchars($company,ENT_QUOTES);} ?></td>
    </tr>
   </table>

<h2>Договор</h2>
<table class="standart">
    <tr>
        <th class="th_left" width="30%">Отчеты</th>
        <td width="70%">
<?php
$user_id=mysqli_result(mysqli_query($link,"SELECT user_id from for_users_corporat_login where session_id = '".$_SESSION['user_number']. "' "),0,0);
$levelaccess=mysqli_result(mysqli_query($link,"SELECT levelaccess from for_users_corporat where id = '".$user_id. "' "),0,0);

if(in_array($levelaccess, array(7))){
    ?>
           <a href="/archive/">Архив</a>
                 <?php
}else{
    ?>
           <ol>
           <?php
    $reports_q=mysqli_query($link,"select title,url from for_report_type where id in(select report_id from for_tarif_reports where tarif_id=(
                                    SELECT tarif_id from for_users_corporat WHERE id='$user_id')) or id in(SELECT report_type_id from for_users_corporat_report_type where user_id='$user_id')");

    while ($reports = mysqli_fetch_object($reports_q)) {
	if($user_id == 1479 && $reports->url == "scoring") continue;
        echo "<li><a href='/work/".$reports->url."' class='black'>".$reports->title."</a></li>";
    }
    ?>
           </ol>
               <?php
}
?>
        </td>
    </tr>
    <tr>
        <th class="th_left">Даты предоставления услуг</th>
        <td><b><?php echo(date('d.m.Y', strtotime($date_start)));?> - <?php echo(date('d.m.Y', strtotime($date_finish)));?></b></td>
    </tr>
</table>