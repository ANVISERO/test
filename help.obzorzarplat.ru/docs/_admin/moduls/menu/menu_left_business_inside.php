<link rel="stylesheet" href="http://obzorzarplat.ru/_css/menu/menu_left_business.css" type="text/css">
<div class="menu_left_business">
<ul>
<li><a href="http://obzorzarplat.ru/business/profile/" class="lk1">Профайл</a> &#187;</li>
<li><a href="http://obzorzarplat.ru/business/archive/" class="lk1">Архив</a> &#187;</li>
<li><a href="http://obzorzarplat.ru/business/work/" class="lk1">Форма отчета:</a></li>
<br>
    <ol>
<?php
$user_id=mysql_result(mysql_query("SELECT id from for_users_corporat where id = ".$_SESSION['user_id']. " AND password = '".$_SESSION['psw']."' ", $link),0,0);

//отчеты, предусмотренные тарифом
$report_type_tarif_q=mysql_query("SELECT * from for_tarif_reports where tarif_id=(
                                    SELECT tarif_id from for_users_corporat WHERE id='$user_id')",$link);
while($row=mysql_fetch_array($report_type_tarif_q))
{
    //название отчета
    $report_type_title=mysql_result(mysql_query("select title from for_report_type where id=".$row["report_id"],$link),0,0);
    $report_type_url=mysql_result(mysql_query("select url from for_report_type where id=".$row["report_id"],$link),0,0);

    //вывод ссылок на формы для формирования доступных отчетов
    echo("<li><a href='http://obzorzarplat.ru/business/work/".$report_type_url."' class='lk1'>".$report_type_title."&raquo;</a></li>");
}

//дополнительные отчеты не предусмотренные тарифом
$report_type_q=mysql_query("SELECT * from for_users_corporat_report_type where user_id='$user_id'",$link);

while($row=mysql_fetch_array($report_type_q))
{
    //название отчета
    $report_type_title=mysql_result(mysql_query("select title from for_report_type where id=".$row["report_type_id"],$link),0,0);
    $report_type_url=mysql_result(mysql_query("select url from for_report_type where id=".$row["report_type_id"],$link),0,0);

    //вывод ссылок на формы для формирования доступных отчетов
    echo("<li><a href='http://obzorzarplat.ru/business/work/".$report_type_url."' class='lk1'>".$report_type_title."&raquo;</a></li>");
}

?>
    </ol>
<br>
<li><a href="http://obzorzarplat.ru/business/contract/" class="lk1">Ваш договор</a> &raquo;</li>
<hr>
<li><a href="/preds/tariffs/" class="lk1">Тарифы</a> &#187;</li>
<li><a href="/hrclub" class="lk1">Новинки</a> &raquo;</li>
<li><a href="/preds/promotion/" class="lk1">Скидки и специальные предложения &raquo;</a></li>
<li><a href="/hrclub" class="lk1">Кадровый клуб "Кочубей"</a></li>
</ul>
</div>