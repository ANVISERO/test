<?php
 //проверяем, есть ли ограничение по должностям
$user_id=mysqli_result(mysqli_query($link,"SELECT user_id from for_users_corporat_login where session_id = '".$_SESSION['user_number']. "'"),0,0);
// нужна ли капча

//if ($user_id == 1479) break;

$req_captcha=mysqli_result(mysqli_query($link,"SELECT req_captcha from for_users_corporat where id = '".$user_id. "'"),0,0);

//ограничение списка доступных должностей для пользователя
$blocked=mysqli_num_rows(mysqli_query($link,"select job_id from for_users_corporat_jobs where user_id='".$user_id."'"));

if($blocked!=0){
    $block_job_query=mysqli_query($link,"SELECT job_id FROM for_users_corporat_jobs where user_id='".$user_id."'");
    while($jobs=  mysqli_fetch_object($block_job_query)){
        $block_job_id[]=$jobs->job_id;
    }
    $block_job_string=implode(',',array_unique($block_job_id));

    mysqli_free_result($block_job_query);

    $block_job_subquery=" AND id IN(".$block_job_string.")";
    $block_jtype_subquery="WHERE id in(SELECT jtype_id FROM base_job_types WHERE job_id IN(".$block_job_string."))";
}else{
    $block_job_subquery="";
    $block_jtype_subquery="";
}
?>
<? if ($req_captcha){?>
<script type="text/javascript" src="/_js/jquery/1job-lite-c.js"></script>	
<?} else { ?>
<script type="text/javascript" src="/_js/jquery/1job-lite.js"></script>	
<?}?>

<p><span class="title_mini">1. Выбор должности &raquo;</span><span class="title_mini_others"> 2. Отчет &raquo;</span></p>

<form method='post' action="?step=2" name="step1">
<table width="100%" class="report_form">
  <!--Должностная группа-->
  <tr>
    <th width="30%">Выберите должностную группу</th>
    <td width="60%">
      <select name="jtype" class="text_1" id="jtype_select">
        <option value="">--- Выбрать ---</option>
  <?php
$result=mysqli_query($link,"select id,name from base_jtype ".$block_jtype_subquery." order by name");
//if ($user_id == 1) echo "select id,name from base_jtype ".$block_jtype_subquery." order by name";

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
<tr>
    <th>Размер среднемесячного дохода с учетом удержаний, указанный клиентом в анкете, либо подтвержденный справкой в свободной форме</th>
    <td><input type="text" class="text_1" name="borrower_salary" value=""></td>
</tr>
<? if ($req_captcha) {?>
<tr>
    <th>Пожалуйста, введите текст с картинки</th>
    <td>
	<img src="http://banks.obzorzarplat.ru/cool-captcha/captcha.php" style="border: 2px solid silver;" vspace="5" id="captcha"><br>
	<a href="#" onclick="document.getElementById('captcha').src='http://www.obzorzarplat.ru/cool-captcha/captcha.php?'+Math.random(); document.getElementById('captcha_form').focus();"
    id="change-image" style="text-decoration: underline;">Невозможно прочитать?</a><br>
	<input type="text" class="text_1" name="captcha_form"  id="captcha_form" autocomplete="off" value="" style="margin-top: 3px;"></td> 
</tr>
<? } ?>
<tr>
    <th></th>
    <td><input type="button" value="дальше &raquo;" class="submit" onClick="return testform();"></td>
</tr>

</table>
</form>