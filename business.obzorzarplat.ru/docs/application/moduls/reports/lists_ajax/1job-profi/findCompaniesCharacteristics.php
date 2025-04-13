<?php
header("Content-Type: text/html; charset=windows-1251");

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

//print_r($_POST);
$city_id=$_POST['city_id'];
$job_id=$_POST['job_id'];

$q_companies=mysqli_query($link,'SELECT company_id FROM base_company_jobs
                WHERE city_id = "'.$city_id.'"
                AND job_id = "'.$job_id.'"',$link);

while($row=mysqli_fetch_array($q_companies)){
    $companies[]=$row["company_id"];
}
$companies_string=implode(',',$companies);

?>
<div id="second-form">
<table width="100%" class="report_form">
<!--Сфера деятельности компании -->
<tr>
    <th width="30%">Сфера деятельности компании</th>
    <td width="60%">
  <select name='sphere' class="text_1" id="sphere">
   <option value="0">не имеет значения</option>
<?php
$sphere_q=mysqli_query($link,"SELECT id,name FROM base_sphere WHERE id in(
    SELECT sphere_id FROM base_company_sphere WHERE company_id in(".$companies_string."))");

while($sphere = mysqli_fetch_object($sphere_q)){
    echo('<option value="'.$sphere->id.'">'.$sphere->name.'</option>');
}
?>
</select>
    </td>
</tr>

<!--Количество сотрудников в компании -->
<tr>
<th>Количество сотрудников в компании</th>
<td>
<div id='staffdiv'>
      <select name='staff' class="text_1" id="staff">
        <option value="0">не имеет значегия</option>
      </select>
</div>
</td>
</tr>

<!--Среднемесячный оборот компании (млн. руб.) -->
<tr>
<th>Средний годовой оборот компании (млн. руб.)</th>
<td>
<div id='turnoverdiv'>
      <select name='turnover' class="text_1" id="turnover">
        <option value="0">не имеет значения</option>
      </select>
</div>
</td>
</tr>

</table>
</div>