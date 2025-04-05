<script type="text/javascript" src="/_js/jquery/1job-lite.js"></script>
<p><span class="title_mini">1. Выбор должности &raquo;</span><span class="title_mini_others"> 2. Отчет &raquo;</span></p>

<form method='post' action="?step=2" name="step1">
<table width="100%" class="report_form">
  <!--Должностная группа-->
  <tr>
    <th width="30%">Должностная группа</th>
    <td width="60%">
      <select name="jtype" class="text_1" id="jtype_select">
        <option value="">--- Выбрать ---</option>
  <?php
$result=mysqli_query($link,"select id,name from base_jtype order by name");
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

<p align="right"><input type="button" value="дальше &raquo;" class="submit" onClick="return testform();"></p>
</form>

<!--Описание должности-->
<div id="job_description_div"><p>Описание должности</p></div>