<script type="text/javascript" src="/_js/lib/jquery.metadata.min.js"></script>
<script type="text/javascript" src="/_js/lib/jquery.tableFormSynch.documented.js"></script>
<script type="text/javascript" src="/_js/lib/jquery.form.js"></script>
<script type="text/javascript" src="/_js/jquery/archive.js"></script>

<link rel="stylesheet" href="/_css/business/archive.css" type="text/css">
<div class="archive">
<form id="rowEditForm" action="save.php" method="post">
<table border="0" id="demoTable" class="tablesCorp">
<thead>
    <tr>
        <th>Дата</th>
        <th>Тип отчета</th>
        <th>Должность (если есть)</th>
        <th>Excel (если есть)</th>
        <th></th>
    </tr>
</thead>
<tbody>
<?php

  $link = mysqli_connect($host,$user,$pass);
  mysqli_select_db($link,$db);


$user_id=mysqli_result(mysqli_query($link,"SELECT id from for_users_corporat where id = ".$_SESSION['user_id']. " AND password = '".$_SESSION['psw']."' "),0,0);

$archive_q=mysqli_query($link,"select * from for_users_corporat_reports where user_id='$user_id' order by date desc, id desc");

while($row=mysqli_fetch_array($archive_q))
{
  $report_type_title=mysqli_result(mysqli_query($link,"select title from for_report_type where id=".$row["report_type_id"]),0,0);
  if($row["job_id"]==0)
  {
      $job_title="------------";
  }
  else
  {
    $job_title=mysqli_result(mysqli_query($link,"select name from base_jobs where id=".$row["job_id"]),0,0);
  }

if(file_exists('/business/_report/user'.$row["user_id"].'/report_'.$row["id"].'.xls')){
    $href_xls='<a href="/business/_report/use"/business/_report/user'.$row["user_id"].'/report_'.$row["id"].'.xls" class="lk1" target="_blank">report.xls</a>';
} else {
    $href_xls="";
}

  echo('
<tr id="'.$row["id"].'" class="{reportId:\''.$row["id"].'\', date:\''.$row["date"].'\', report_type_title:\''.$report_type_title.'\', job_title:\''.$job_title.'\'}">
<td class="date"><a href="/business/archive/html.php?d='.$row["url"].'" class="lk1" target="_blank">'.date("d.m.Y",strtotime($row["date"])).'</a></td>
<td class="report_type_title"><a href="/business/archive/html.php?d='.$row["url"].'" class="lk1" target="_blank">'.$report_type_title.'</a></td>
<td class="job_title" align="center"><a href="/business/archive/html.php?d='.$row["url"].'" class="lk1" target="_blank">'.$job_title.'</a></td>
<td class="job_title" align="center">'.$href_xls.'</td>
<td> <a href="#" class="delete">удалить</a></td>
</tr>
');
}

?>

</tbody>
</table>
</form>
</div>
<div style="clear:both;"></div>