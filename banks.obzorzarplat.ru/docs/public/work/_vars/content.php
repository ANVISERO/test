<?php
$date_now=date('Y-m-d');

$user=mysqli_query($link,"SELECT id,tarif_id,date_finish from for_users_corporat where id = (
                    SELECT user_id from for_users_corporat_login WHERE session_id='".$_SESSION["user_number"]."')");

//echo 1;

while($row=mysqli_fetch_array($user)){
    $tarif_id=$row["tarif_id"];
    $date_finish=$row["date_finish"];
    $user_id=$row["id"];
}

//Общеотраслевой обзор. Отчеты
if($date_finish>=$date_now){
$reports_q=mysqli_query($link,"select title,url from for_report_type where id in(select report_id from for_tarif_reports where tarif_id='".$tarif_id."')
    OR id in(SELECT report_type_id from for_users_corporat_report_type where user_id='$user_id') order by title");

if(mysqli_num_rows($reports_q)!='0'){
    ?>
    <ul class='reports'>
    <?php
}

while($reports=mysqli_fetch_object($reports_q)){
//echo $user_id;
//if ($user_id == 1479 && $reports->url == "scoring") continue;

 ?>
    <li><a href='/work/<?php echo $reports->url; ?>/' class='report_name'><?php echo $reports->title;?></a>
    </li>
<?php } ?>

    </ul> <!--/reports-->

<?php
}else{
    ?>
    <p>Срок действия договора истек.</p>
        <p>По вопросам продления действия договора обращайтесь к руководителю проекта - Ольге Гвоздевой:
            <br> телефон: +7 (812) 740 18 11
            <br> email: <a href="mailto:gvozdeva.olga@obzorzarplat.ru">gvozdeva.olga@obzorzarplat.ru</a></p>
<?php } ?>
<div style="clear:both;"></div>