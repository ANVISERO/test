<style type="text/css" title="currentStyle"> 
			@import "http://www.obzorzarplat.ru/_css/demo_table.css";
</style>
<script type="text/javascript" src="http://www.obzorzarplat.ru/_js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://www.obzorzarplat.ru/_js/jquery/pagination-company.js"></script>

<a href="?page=base"><img src="_adminfiles/button_back.gif" alt="Возврат" width="105" height="20" border="0"></a>&nbsp;&nbsp;<a href="?page=companies-red"><img src="_adminfiles/button_addelement.gif" alt="Добавить элемент" width="150" height="20" border="0"></a>


<table id="companies" width="100%">
    <thead>
<tr height="20">
<td width="20" valign="top">ID</td>
<th>Наименование</th>
<th>Регион</th>
<th>Дата обновления данных</th>
</tr>
    </thead> 
    <tbody>

<?php

$per_page=20;
$query="select bc.id, bc.name, bc.region_id, br.name as region_name, DATE_FORMAT(bc.date, '%d-%m-%Y') as add_date
FROM base_companies bc LEFT JOIN base_regions br on (bc.region_id = br.id) order by bc.id desc limit $per_page";
$result=mysqli_query($link,$query) or die(mysql_error());
while($row=mysqli_fetch_array($result)){
    $region_id=$row['region_id'];
?>
<tr>
<td><?=$row['id'];?></td>
<td><a href="?page=companies-red&id=<?=$row["id"];?>"><?=$row['name'];?></a></td>
<td><?=$row['region_name'];?></td>
<td><?=$row['add_date'];?></td>
</tr>
<?php } ?>
    </tbody>
</table>

