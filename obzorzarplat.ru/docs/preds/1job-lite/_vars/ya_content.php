<link type="text/css" href="/_js/jquery-ui-1.7.2.custom/development-bundle/themes/custom-theme-1/ui.all.css" rel="stylesheet" />
	<script type="text/javascript" src="/_js/jquery-ui-1.7.2.custom/development-bundle/ui/ui.core.js"></script>
	<script type="text/javascript" src="/_js/jquery-ui-1.7.2.custom/development-bundle/ui/ui.tabs.js"></script>

	<script type="text/javascript">
	$(function() {
		$("#tabs").tabs({
                    fxFade: true, fxSpeed: 'fast'
                });
                //glossary
                $("#glossary a[title]").tooltip({position:'top center'});
	});
	</script>
<link rel="stylesheet" href="/_css/1job_lite/1job_lite.css" type="text/css">

<div class="lite">

    <?php
    $order_id = $_GET['order_id'];
    $host = 'zarplata.mysql';
    $db = 'zarplata_db';
    $user = 'zarplata_mysql';
    $pass = '70oiwgo9';

    $link = mysql_pconnect($host, $user, $pass);
    mysqli_select_db($link,$db);
    $arr = mysql_fetch_assoc(mysqli_query($link,"select * from `for_count_job` where `id` = '$order_id'"));
    if ($arr['payed'] == 1) {
        $job_id = $arr['job_id']; // Id должности
        $region_id = $arr['city_id']; // Id города
        include($folder.'/express-ok/funcs.php');
        include($folder.'/express-ok/1job-lite-2.php');
        //include($folder.'/express-ok/1job-lite-html.php');
        //include($folder.'/express-ok/1job-lite-2-echo.php');
        include($folder.'/express-ok/1job-lite-2-echo-ya.php');
    } else {
        echo '<p>Если Вы оплатили заказ, для получения отчета обновите страницу.</p>';
    }
    ?>

</div>
