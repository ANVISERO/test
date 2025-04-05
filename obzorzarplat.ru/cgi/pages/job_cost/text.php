<input type="button" class="but" value="Возврат" onclick="self.location.href='?page=base'">
<script type="text/javascript" src="/_js/lib/jquery.metadata.min.js"></script>
<script type="text/javascript" src="/_js/lib/jquery.tableFormSynch.documented.js"></script>
<script type="text/javascript" src="/_js/lib/jquery.form.js"></script>
<script type="text/javascript" src="/_js/lib/job_cost.js"></script>

<style type="text/css">
.JS #test {display:none}
tr, td {text-align:left}
#loading {margin:0 4px;display:none}
#editableRow {display:none}
#addBtn {display:none}

.tablesCorp{
	font-size: 12px;
}

.tablesCorp tr.odd td{
	background-color: #F2F2F2;
}

.tablesCorp tr.hover td{
	background-color: #FDFDFD;
}

.tablesCorp th{
	border: 1px solid #FFF;
        border-bottom:1px solid #000;
	padding: .5em;
}
.tablesCorp td.left{text-align:left;}
.tablesCorp td{
	text-align:center;
	border-bottom: 1px solid #eee;
	background: #F5F5F5;
	padding: .5em;
}
</style>

<div class="job_cost">
<form id="rowEditForm" action="/_admin/moduls/tables/edit_job_cost.php" method="post">
<table border="0" id="demoTable" class="tablesCorp">
<thead>
    <tr>
        <th width="40%">Должность</th>
        <th width="30%">Короткий номер для оплаты индивидуального отчета</th>
        <th width="30%">Короткий номер для оплаты экспресс отчета</th>
    </tr>
</thead>
<tbody>
<?php

  $link = mysqli_connect($host,$user,$pass);
  mysqli_select_db($link,$db);

$jobs_q=mysqli_query($link,"select * from base_jobs order by name");

while($row=mysqli_fetch_array($jobs_q))
{
    $job_id=$row["id"];
    $express_cost=mysqli_result(mysqli_query($link,"select express_cost from job_cost where job_id='$job_id'"),0,0);
    $indiv_cost=mysqli_result(mysqli_query($link,"select indiv_cost from job_cost where job_id='$job_id'"),0,0);
  echo('
<tr id="'.$row["id"].'" class="{jobId:\''.$row["id"].'\', job_title:\''.$row["name"].'\', indiv:\''.$indiv_cost.'\', express:\''.$express_cost.'\'}">
<td class="job_title left"><a href="#" class="edit">'.$row["name"].'</a></td>
<td class="indiv">'.$indiv_cost.'</td>
<td class="express">'.$express_cost.'</td>
</tr>
');
}

?>
<tr id="editableRow">
       <td><input type="hidden" name="jobId" value="0"/>
           <input id="updateBtn" type="submit" name="update" value="Обновить"/>
               <input id="cancelBtn" type="button" name="cancel" value="Отмена"/>
               <img id="loading" src="/_img/loader.gif" /></td>
       <td><input type="text" name="indiv" value=""/></td>
       <td><input type="text" name="express" value=""/></td>
</tr>
</tbody>
</table>
</form>
</div>