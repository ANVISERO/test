<?php
 //проверяем, есть ли ограничение по должностям
$user_id=mysqli_result(mysqli_query($link,"SELECT user_id from for_users_corporat_login where session_id = '".$_SESSION['user_number']. "'"),0,0);
//ограничение списка доступных должностей для пользователя
$blocked=mysqli_num_rows(mysqli_query($link,"select job_id from for_users_corporat_jobs where user_id='".$user_id."'"));

if($blocked!=0){
    $block_job_query=mysqli_query($link,"SELECT job_id FROM for_users_corporat_jobs where user_id='".$user_id."'");
    while($jobs=  mysqli_fetch_object($block_job_query)){
        $block_job_id[]=$jobs->job_id;
    }
    $block_job_string=implode(',',array_unique($block_job_id));

    mysql_free_result($block_job_query);

    $block_job_subquery=" AND id IN(".$block_job_string.")";
    $block_jtype_subquery="WHERE id in(SELECT jtype_id FROM base_job_types WHERE job_id IN(".$block_job_string."))";
}else{
    $block_job_subquery="";
    $block_jtype_subquery="";
}
?>
<p><span class="title_mini">1. Выбор должности &raquo;</span><span class="title_mini_others"> 2. Отчет &raquo;</span></p>

<h2>1. Выбор должности</h2>
<form method='post' action="?step=2" name="step1">
    <div id="first-form">
<table width="100%" class="report_form">
  <!--Должностная группа-->
  <tr>
    <th width="30%">Выберите должностную группу</th>
    <td width="60%">
      <select name="jtype" class="text_1" id="jtype_select">
        <option value="">--- Выбрать ---</option>
  <?php
$result=mysqli_query($link,"select id,name from base_jtype ".$block_jtype_subquery." order by name");
while($row=mysqli_fetch_array($result)){
    echo('<option value="'.$row["id"].'">'.$row["name"].'</option>');
}
?>
</select>
</td>
  </tr>


<!--Должность-->
  <tr>
    <th>Выберите должность</th>
    <td>
    <div id='jobdiv'>
      <select name='job' class="text_1">
        <option value="">--- Выбрать ---</option>
      </select>
</div>
    </td>
</tr>

<!--Город-->
  <tr>
    <th>Выберите город</th>
    <td>
    <div id='citydiv'>
      <select name='city' class="text_1">
        <option value="">--- Выбрать ---</option>
      </select>
</div>
    </td>
</tr>

</table>

<!--Описание должности-->
<div id="job_description_div">
    <p>Описание должности</p>
</div>

<p align="right"><input type="button" id="select_companies_characteristics" value="Выбрать факторы &raquo;" class="submit"></p>
</div>
<h2>2. Характеристика компаний</h2>
<div id="companies-characteristics">
    <p>Для выбора факторов фильтрации компаний необходимо сначала выбрать должность для анализа и нажать на кнопку <b>Выбрать факторы &raquo;</b></p>
</div>


<!--   Формировние отчета  -->
<h2>3. Формирование отчета</h2>
<div id="summary_result">
    <p>Для получения отчета необходимо выбрать фактор для анализа и доступные должности из списка и нажать на кнопку <b>Получение отчета &raquo;</b></p>
    <p align="right"><input type="submit" value="Получение отчета &raquo;" class="submit"></p>
</div>

</form>