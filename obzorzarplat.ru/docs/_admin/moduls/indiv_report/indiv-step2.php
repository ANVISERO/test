<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
//Персональные характеристики
$fio=$_POST['fio'];
$obrazovanie=$_POST['obrazovanie'];
if($obrazovanie!='' and $obrazovanie!='0'){$obrazovanie_title=mysqli_result(mysqli_query($link,"select title from base_education where id='$obrazovanie'"),0,0);}
$podchin=$_POST['podchin'];
if($podchin!='' and $podchin!='0'){$podchin_title=mysqli_result(mysqli_query($link,"select title from base_sub where id='$podchin'"),0,0);}

$stazh=$_POST['stazh'];
if($stazh!='' and $stazh!='0'){$stazh_title=mysqli_result(mysqli_query($link,"select title from base_experience where id='$stazh'"),0,0);}
if(isset($_POST["usermail"])){$usermail=$_POST['usermail'];}else{$usermail='';}

//Остальные характеристики
$cityId=intval($_POST['city']);
$jtypeId=intval($_POST['jtype']);
$jobId=intval($_POST['job']);
$sphereId=intval($_POST['sphere']);
$staffId=intval($_POST['staff']);
$responsibility=$_POST['responsibility'];

$job_name=mysqli_result(mysqli_query($link,"select name from base_jobs where id='$jobId'"),0,0);
$jtype_name=mysqli_result(mysqli_query($link,"select name from base_jtype where id='$jtypeId'"),0,0);

//***cost of report
$job_cost_indiv=mysqli_result(mysqli_query($link,"select indiv_cost from job_cost where job_id='$jobId'"),0,0);

/*** CITY ***/
if($cityId==0){$city_name="Все города";}
else{
  $city_name=mysqli_result(mysqli_query($link,"select name from base_regions where id='$cityId'"),0,0);
}

/*** SPHERE ***/
if($sphereId==0){$sphere_name="не имеет значения";}
else{
  $sphere_name=mysqli_result(mysqli_query($link,"select name from base_sphere where id='$sphereId'"),0,0);
}

/*** STAFF ***/
if($staffId==0){$staff_name="не имеет значения";}
else{
$staff_name=mysqli_result(mysqli_query($link,"select title from base_personal where id='$staffId'"),0,0);
}

?>

<div class="report_navigation_pos">
<ul class="report_navigation">
    <li>
        <span class="title_mini_others">1. <a href="#" onClick="return testform_back();">Параметры отчета</a> &raquo;</span>
        <em>Параметры для формирования отчета</em>
    </li>
    <li>
        <span class="title_mini"> 2. Оплата отчета &raquo;</span>
        <em>Проверка введенных данных и оплата отчета</em>
    </li>
    <li>
        <span class="title_mini_others"> 3. Получение отчета &raquo;</span>
        <em>Получение прямой ссылки на отчет</em>
    </li>
</ul>
</div>
<br>
<center><p><em>Если данные верны, подтвердите формирование отчета</em></p></center>
<div class="ui-state-error error_length" style="width:100%; margin:2px; padding:2px;"><p align="center"><b>Внимание!</b><br> Стоимость услуги варьируется в зависимости от выбранной Вами должности и оператора связи.<br>
<b>Стоимость</b> персонального отчета о заработной плате можно посмотреть здесь:
<a href="http://www.a1agregator.ru/main/abonent/4846/<?php echo($job_cost_indiv);?>" class="link_1" target="_blank">http://www.a1agregator.ru/main/abonent/4846/<?php echo($job_cost_indiv);?></a></p>
</div>
    <br>
<form name='step2' method='post' action="">
<input type="hidden" name="city" value="<?php echo($cityId);?>">
<input type="hidden" name="jtype" value="<?php echo($jtypeId);?>">
<input type="hidden" name="job" value="<?php echo($jobId);?>">
<input type="hidden" name="sphere" value="<?php echo($sphereId);?>">
<input type="hidden" name="staff" value="<?php echo($staffId);?>">
<input type="hidden" name="responsibility" value="<?php echo($responsibility);?>">

<input type="hidden" name="fio" value="<?php echo($fio);?>">
<input type="hidden" name="obrazovanie" value="<?php echo($obrazovanie);?>">
<input type="hidden" name="podchin" value="<?php echo($podchin);?>">
<input type="hidden" name="stazh" value="<?php echo($stazh);?>">
<table width="100%">
    <tr>
        <td width="40%" align="right">Email<br> (введите рабочий email для получения ссылки на отчет)</td>
        <td width="60%"><input type="text" class="text_1" name="usermail" value="<?php echo($usermail);?>"></td>
    </tr>
    <tr>
        <td align="right">Код <font color="#cc0000">*</font>:</td>
        <td><input type="text" class="text_1" name="code" value=""></td>
    </tr>
    <tr>
        <td align="right"><input type="checkbox" name="check_person" value="1" checked></td>
        <td>Нажимая кнопку "Оплатить", я подтверждаю свою дееспособность, даю согласие на обработку своих персональных данных</td>
    </tr>
<tr>
  <td align="left"><input type="button" value="&laquo; назад" class="but1" onClick="return testform_back();"></td>
  <td align="right"><input type="button" value="оплатить &raquo;" class="but1" onClick="return testform();"></td>
</tr>
</table>
</form>

<div id="sms">
<p><font color="#cc0000">*</font> Для получения <b>кода</b> необходимо совершить следующие действия:</p>
<ol>
    <li>
        Отправить смс с текстом <b>#obzorzp</b> на короткий номер <b><?php echo($job_cost_indiv);?></b>
        (стоимость услуги Вы можете посмотреть здесь: <a href="http://www.a1agregator.ru/main/abonent/4846/<?php echo($job_cost_indiv);?>" class="link_1" target="_blank">http://www.a1agregator.ru/main/abonent/4846/<?php echo($job_cost_indiv);?></a>)
    </li>
    <li>В ответном сообщении Вы получите проверочный код (например, code: 0123456789)</li>
    <li>Введите полученный код в поле <b>&laquo;Код&raquo;</b></li>
    <li>Нажмите на кнопку оплатить</li>
</ol>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $("#sms").corner("round 30px");
});
</script>

<table width="100%" border="0">
    <tr>
        <th colspan="2">Должность</th>
    </tr>
    <tr>
        <td width="40%" align="right">Должностная группа:</td>
        <td width="60%" class="data"><?php echo($jtype_name);?></td>
    </tr>
    <tr>
        <td align="right">Должность:</td>
        <td class="data"><?php echo($job_name);?></td>
    </tr>
    <tr>
        <th colspan="2">Характеристика компаний для исследования</th>
    </tr>
    <tr>
        <td align="right">Город:</td>
        <td class="data"><?php echo($city_name);?></td>
    </tr>
    <tr>
        <td align="right">Сфера деятельности компании: </td>
        <td class="data"><?php echo($sphere_name);?></td>
    </tr>
    <tr>
        <td align="right">Количество сотрудников в компании: </td>
        <td class="data"><?php echo($staff_name);?></td>
    </tr>
    <tr>
        <th colspan="2">Ваши персональные характеристики (только для оформления отчета)</th>
    </tr>
    <tr>
        <td align="right">Имя: </td>
        <td class="data"><?php echo($fio);?></td>
    </tr>
    <tr>
        <td align="right">Образование: </td>
        <td class="data"><?php echo($obrazovanie_title);?></td>
    </tr>
    <tr>
        <td align="right">Кол-во подчиненных: </td>
        <td class="data"><?php echo($podchin_title);?></td>
    </tr>
    <tr>
        <td align="right">Трудовой стаж: </td>
        <td class="data"><?php echo($stazh_title);?></td>
    </tr>
<tr>
  <td colspan="2">
  <?php
  /*
  switch($responsibility){
    case "greater":
      echo('У Вас расширенный круг обязанностей по сравнению с описанием должности, представленным на сайте.');
      break;
    
    case "equal":
      echo('Полное соответствие описанию должности, представленному на сайте.');
      break;
    
    case "lesser":
      echo('У Вас более узкий круг обязанностей по сравнению с описанием должности, представленным на сайте.');
      break;
  }
   * */
  ?>
  </td>
</tr>
<tr>
     <td align="left" colspan="2"><input type="button" value="&laquo; исправить" class="but1" onClick="return testform_back();"></td>
</tr>
</table>



<script type="text/javascript">
function testform()
{
    if(document.step2.usermail.value==""){window.alert('Вы не указали email.\n');return false;}
    if(document.step2.code.value==""){window.alert('Вы не указали проверочный код');return false;}
    if(document.step2.check_person.checked==false){window.alert('Отчет не может быть сформирован и отправлен Вам без получения Вашего согласия на обработку Ваших персональных данных в соответствие с п.1 статьи 6 Федерального Закона №152-ФЗ "О персональных данных"!');return false;}
    else{
        document.step2.action='?step=3';
        document.step2.submit();
    }
}

function testform_back()
{
document.step2.action='?step=1';
document.step2.submit();
}
</script>