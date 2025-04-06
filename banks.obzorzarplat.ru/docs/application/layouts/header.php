<div id="logo"><a href="http://obzorzarplat.ru"><img alt="Обзор зарплат" src="http://obzorzarplat.ru/_img/logo_ru.jpg" border="0" /></a></div>

<!--topmenu-->

<div id="menu">
    <ul class="level1">
        <?php
        $user_id=mysqli_result(mysqli_query($link,"SELECT user_id from for_users_corporat_login where session_id = '".$_SESSION['user_number']. "' "),0,0);
        $levelaccess=mysqli_result(mysqli_query($link,"SELECT levelaccess from for_users_corporat where id = '".$user_id. "' "),0,0);

            if(in_array($levelaccess,array(1,7))){
        ?>
        <li class="level1-li"><a href="/archive/">Архив<!--[if gte IE 7]><!--></a><!--<![endif]--></li>
        <?php }else{ ?>
        <li class="level1-li"><a href="/work/">Отчеты<!--[if gte IE 7]><!--></a><!--<![endif]-->
<!--[if lte IE 6]><table><tr><td><![endif]-->
                <ul class="level2">
<?php
//отчеты
$reports_q=mysqli_query($link,"select title,url from for_report_type where id in(select report_id from for_tarif_reports where tarif_id=(
                                    SELECT tarif_id from for_users_corporat WHERE id='$user_id')) or id in(SELECT report_type_id from for_users_corporat_report_type where user_id='$user_id')");

while($report=mysqli_fetch_object($reports_q))
{
    //вывод ссылок на формы для формирования доступных отчетов
    echo("<li><a href='/work/".$report->url."' class='lk2'>".$report->title."</a></li>");
}
?>

                </ul>
            
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
        </li>
        <?php } ?>
        <li class="level1-li"><a href="/">Профайл<!--[if gte IE 7]><!--></a><!--<![endif]--></li>
        <li class="level1-li"><a href="/support/">Служба поддержки<!--[if gte IE 7]><!--></a><!--<![endif]--></li>
        <li class="level1-li"><a href="/logout/">Выход</a></li>
    </ul>
</div>
<!--/topmenu-->
<div style="clear:both;"></div>