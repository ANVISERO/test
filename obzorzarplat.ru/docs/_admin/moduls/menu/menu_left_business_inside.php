<link rel="stylesheet" href="/_css/menu/menu_left_business.css" type="text/css">
<div class="menu_left_business">
<ul id="nav_business">
<li><a href="/business/work/" class="lk1">Форма отчета:</a></li>
<br>
    <ol>
<?php
$user_id=mysqli_result(mysqli_query($link,"SELECT id from for_users_corporat where id = ".$_SESSION['user_id']. " AND password = '".$_SESSION['psw']."' "),0,0);

//отчеты, предусмотренные тарифом
$report_type_tarif_q=mysqli_query($link,"SELECT * from for_tarif_reports where tarif_id=(
                                    SELECT tarif_id from for_users_corporat WHERE id='$user_id')");
while($row=mysqli_fetch_array($report_type_tarif_q))
{
    //название отчета
    $report_type_title=mysqli_result(mysqli_query($link,"select title from for_report_type where id=".$row["report_id"]),0,0);
    $report_type_url=mysqli_result(mysqli_query($link,"select url from for_report_type where id=".$row["report_id"]),0,0);

    //вывод ссылок на формы для формирования доступных отчетов
    echo("<li><a href='/business/work/".$report_type_url."' class='lk2'>".$report_type_title."&raquo;</a></li>");
}

//дополнительные отчеты не предусмотренные тарифом
$report_type_q=mysqli_query($link,"SELECT * from for_users_corporat_report_type where user_id='$user_id'");

while($row=mysqli_fetch_array($report_type_q))
{
    //название отчета
    $report_type_title=mysqli_result(mysqli_query($link,"select title from for_report_type where id=".$row["report_type_id"]),0,0);
    $report_type_url=mysqli_result(mysqli_query($link,"select url from for_report_type where id=".$row["report_type_id"]),0,0);

    //вывод ссылок на формы для формирования доступных отчетов
    echo("<li><a href='/business/work/".$report_type_url."' class='lk2'>".$report_type_title."&raquo;</a></li>");
}

?>
    </ol>
<br>
<li><a href="/business/archive/" class="lk1">Архив &#187;</a></li>
<li><a href="/business/profile/" class="lk1">Профайл &#187;</a></li>
<li><a href="/business/support/" class="lk1">Служба поддержки &raquo;</a></li>
</ul>
</div>