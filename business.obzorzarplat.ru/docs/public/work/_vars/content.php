<?php
$date_now=date('Y-m-d');

$user=mysqli_query($link,"SELECT id,tarif_id,date_finish from for_users_corporat where id = (
                    SELECT user_id from for_users_corporat_login WHERE session_id='".$_SESSION['user_number']."')");

while($row=mysqli_fetch_array($user)){
    $tarif_id=$row["tarif_id"];
    $date_finish=$row["date_finish"];
    $user_id=$row["id"];
}

//отчеты предусмотренные тарифом
if($date_finish>=$date_now){
$reports_q=mysqli_query($link,"select * from for_report_type where id in(select report_id from for_tarif_reports where tarif_id='".$tarif_id."')");
while($row=mysqli_fetch_array($reports_q))
{
    include($folder.'application/moduls/reports/'.$row["url"].'/'.$row["url"].'-0.html');
}

//отчеты не предусмотренные тарифом
$report_type_q=mysqli_query($link,"SELECT * from for_users_corporat_report_type where user_id='$user_id'");

while($row=mysqli_fetch_array($report_type_q))
{
    $report_type_url=mysqli_result(mysqli_query($link,"select url from for_report_type where id=".$row["report_type_id"],$link),0,0);

    //вывод ссылок на формы для формирования доступных отчетов
    include($folder.'application/moduls/reports/'.$report_type_url.'/'.$report_type_url.'-0.html');
}
}else{
    echo('<p>Срок действия договора истек.</p> <p>По вопросам продления действия договора обращайтесь к руководителю проекта - Татьяне Задернюк:
            <br> телефон: +7 (812) 740 18 11
            <br> email: <a href="mailto:tz@obzorzarplat.ru" class="lk1">tz@obzorzarplat.ru</a></p>');
}
?>
<div style="clear:both;"></div>