<script type="text/javascript" src="/_js/lib/jquery.metadata.min.js"></script>
<script type="text/javascript" src="/_js/lib/jquery.tableFormSynch.documented.js"></script>
<script type="text/javascript" src="/_js/lib/jquery.form.js"></script>
<script type="text/javascript" src="/_js/jquery/archive.js"></script>

<link rel="stylesheet" href="/_css/archive.css" type="text/css">
<div class="archive">
<form id="rowEditForm" action="save.php" method="post">
<table border="0" id="demoTable" class="tablesCorp">
<thead>
    <tr>
        <th>Дата</th>
        <th>Тип отчета</th>
        <th>Должность</th>
        <th>Регион/город</th>
        <th>Excel</th>
        <th></th>
    </tr>
</thead>
<tbody>
<?php
$user_id=mysqli_result(mysqli_query($link,"SELECT user_id from for_users_corporat_login where session_id = '".$_SESSION['user_number']. "' "),0,0);

$archive_q=mysqli_query($link,"select id,url,user_id,report_type_id,job_id,city_id,date from for_users_corporat_reports where user_id='$user_id' order by date desc, id desc");

while($row=mysqli_fetch_array($archive_q))
{
  $report_type_title=mysqli_result(mysqli_query($link,"select title from for_report_type where id=".$row["report_type_id"],$link),0,0);
  //название должности
  if($row["job_id"]==0){
      $job_title="-";
  }else{
    $job_title=mysqli_result(mysqli_query($link,"select name from base_jobs where id=".$row["job_id"],$link),0,0);
  }

  // название региона/города
  if($row["city_id"]==0){
      $city_title="-";
  }else{
    $city_title=mysqli_result(mysqli_query($link,"select name from base_regions where id=".$row["city_id"],$link),0,0);
  }

  if(file_exists($_SERVER['DOCUMENT_ROOT'].'/_report/user'.$row["user_id"].'/report_'.$row["id"].'.xls')){
    $href_xls='<a href="/_report/user'.$row["user_id"].'/report_'.$row["id"].'.xls" class="lk1" target="_blank"><img src="/_img/business/report-excel.png" alt=""></a>';
  } else {
    $href_xls="";
  }

?>
<tr id="<?php echo $row["id"];?>" class="{reportId:'<?php echo $row["id"];?>', date:'<?php echo $row["date"];?>', report_type_title:'<?php echo $report_type_title;?>', job_title:'<?php echo $job_title;?>'}">
<td class="date"><a href="/archive/html.php?d=<?php echo $row["url"];?>" class="lk1" target="_blank"><?php echo date("d.m.Y",strtotime($row["date"]));?></a></td>
<td class="report_type_title"><a href="/archive/html.php?d=<?php echo $row["url"];?>" class="lk1" target="_blank"><?php echo $report_type_title;?></a></td>
<td class="job_title" align="center"><a href="/archive/html.php?d=<?php echo $row["url"];?>" class="lk1" target="_blank"><?php echo $job_title;?></a></td>
<td><a href="/archive/html.php?d=<?php echo $row["url"];?>" class="lk1" target="_blank"><?php echo $city_title; ?></a></td>
<td class="job_title" align="center"><?php echo $href_xls; ?></td>
<td> <a href="#" class="delete">удалить</a></td>
</tr>
<?php
}

?>

</tbody>
</table>
</form>
</div>
<div style="clear:both;"></div>