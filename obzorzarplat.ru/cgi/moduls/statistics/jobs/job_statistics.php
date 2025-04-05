<link type="text/css" href="/_css/calendar/smoothness/jquery-ui-1.7.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="/_js/jquery-ui-1.7.2.custom/js/jquery-ui-1.7.2.custom.min.js"></script>
<!--<script src="/_js/jquery-ui-1.7.2.custom/development-bundle/ui/i18n/ui.datepicker-ru.js" type="text/javascript"></script>-->
<script type="text/javascript">
$(function(){
  $("#datepicker_start").datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: "yy-mm-dd"
  });
    $("#datepicker_finish").datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: "yy-mm-dd"
  });
});
</script>
<p><b>Статистика по датам:</b></p>
<form id="date" action="/_admin/?page=job_statistics" method="post">
    <table border="0" width="100%">
        <tr>
            <td width="20%"><label for="datepicker_start">Дата начала:</label></td>
            <td width="20%"><div class="ui-datepicker"><input name="datepicker_start" id="datepicker_start" type="text" value="<?php echo($_POST["datepicker_start"]);?>" /></div></td>
            <td width="20%"><label for="datepicker_finish">Дата окончания:</label></td>
            <td width="20%"><div class="ui-datepicker"><input name="datepicker_finish" id="datepicker_finish" type="text" value="<?php echo($_POST["datepicker_finish"]);?>" /></div></td>
            <td width="20%"><input type="submit" value="Показать&raquo;"></td>
        </tr>
</table>
</form>
<hr>

<table cellpadding="0" cellspacing="0" border="0" id="jobs" class="display">
    <thead>
    <tr>
        <th>Должность</th>
        <th>Количество бесплатных просмотров</th>
        <th>Количество оплаченных просмотров</th>
        <th>Количество неоплаченных запросов</th>
    </tr>
    </thead>
    <tbody>
<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
if(isset($_POST["datepicker_start"]) AND isset($_POST["datepicker_finish"])){
    $date_start=$_POST["datepicker_start"];
    $date_finish=$_POST["datepicker_finish"];
    $date_q=" AND (date between '$date_start' AND '$date_finish')";
}else{$date_q="AND date='".date('Y-m-d')."'";}

$jobs_q=mysqli_query($link,"select * from base_jobs order by name");
while($row=mysqli_fetch_array($jobs_q)){
    $job_id=$row["id"];
    //считаем показатели по каждой должности
    //отчеты, которые посмотрели бесплатно
    $view_reports=mysqli_result(mysqli_query($link,"select count(id) from for_count_job where job_id='$job_id' and view='1' and payed='0'".$date_q),0,0);
    $payed_reports=mysqli_result(mysqli_query($link,"select count(id) from for_count_job where job_id='$job_id' and view='1' and payed='1'".$date_q),0,0);
    $unpayed_reports=mysqli_result(mysqli_query($link,"select count(id) from for_count_job where job_id='$job_id' and view='0' and payed='0'".$date_q),0,0);
    $unpayed_reports=$unpayed_reports-$payed_reports;
    echo('
    <tr>
        <td>'.$row["name"].'</td>
        <td class="center">'.$view_reports.'</td>
        <td class="center">'.$payed_reports.'</td>
        <td class="center">'.$unpayed_reports.'</td>
    </tr>
');
}

?>
    </tbody>
    <!--
    <tfoot>
    <tr>
        <th class="sorting">Должность</th>
        <th>Количество бесплатных просмотров</th>
        <th>Количество оплаченных просмотров</th>
        <th>Количество неоплаченных запросов</th>
    </tr>
    </tfoot>
    -->
</table>

<script type="text/javascript">
$(document).ready(function(){
  $("#jobs").dataTable({
      "oLanguage":{
          "sUrl":"../_css/datatables/language/ru_RU.txt"
      },
		"aaSorting": [[1,'desc']]
  });
});
</script>