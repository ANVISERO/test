<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
?>

<script type="text/javascript" src="/_js/indiv_report/lists_indiv_report.js"></script>
<ul class="report_navigation">
    <li>
        <span class="title_mini">1. Параметры отчета &raquo;</span>
        <em>Параметры для формирования отчета</em>
    </li>
    <li>
        <span class="title_mini_others"> 2. Оплата отчета &raquo;</span>
        <em>Проверка введенных данных и оплата отчета</em>
    </li>
    <li>
        <span class="title_mini_others"> 3. Получение отчета &raquo;</span>
        <em>Получение прямой ссылки на отчет</em>
    </li>
</ul>
<br>
<p class="help">Пожалуйста, заполните последовательно все поля, помеченные *</p>
<form name="step1" method="post" action="?step=2" onSubmit="return testform();">

<?php
if(isset($_POST['job'])){$job_id=intval($_POST['job']);}
if(isset($_POST['city'])){$city_id=intval($_POST['city']);}

     if(isset($_POST['sphere'])){echo('<input type="hidden" name="sphere" value="'.intval($_POST['sphere']).'">');}
     if(isset($_POST['staff'])){echo('<input type="hidden" name="staff" value="'.intval($_POST['staff']).'">');}
     if(isset($_POST['fio'])){echo('<input type="hidden" name="fio" value="'.$_POST['fio'].'">');}
     if(isset($_POST['obrazovanie'])){echo('<input type="hidden" name="obrazovanie" value="'.intval($_POST['obrazovanie']).'">');}
     if(isset($_POST['podchin'])){echo('<input type="hidden" name="podchin" value="'.intval($_POST['podchin']).'">');}
     if(isset($_POST['stazh'])){echo('<input type="hidden" name="stazh" value="'.intval($_POST['stazh']).'">');}
     if(isset($_POST['usermail'])){echo('<input type="hidden" name="usermail" value="'.$_POST['usermail'].'">');}
?>

<table border="0">
    <tr>
        <th colspan="2">Должность</th>
    </tr>
<!--Должностная группа-->
  <tr>
    <td width="40%" align="right">Выберите должностную группу *</td>
    <td width="60%">
      <select name="jtype" class="text_1" onChange="return getBlocksJobCityJobDescript(this.value,1);">
        <option value="">--- Выбрать ---</option>
<?php
$result=mysqli_query($link,"select * from base_jtype order by name");
$ch="";
while($row=mysqli_fetch_array($result))
{
if((isset($_POST['jtype'])) and ($_POST['jtype']==$row["id"])){$ch="selected";}
echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["name"].'</option>');
$ch="";
}
?>
</select>
</td>
</tr>



<!--Должность-->
  <tr>
    <td align="right">Выберите должность *</td>
    <td>
    <div id='jobdiv'>
      <select name='job' class="text_1" onChange="return getBlocksCityJobDescript(this.value,1);">
        <option value="">--- Выбрать ---</option>
        <?php
       if(isset($_POST['jtype']) AND isset($_POST['job'])){
      $jtype_id=$_POST['jtype'];
      $result=mysqli_query($link,"select * from base_jobs where id in(select job_id from base_job_types where jtype_id='$jtype_id') order by name");
      $ch="";
      while($row=mysqli_fetch_array($result))
      {
      if($_POST['job']==$row["id"]){$ch="selected";}
      echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["name"].'</option>');
      $ch="";
      }
      }
        ?>
      </select>
        <br><br>

</div>
<div id="loading_job" style="display:none">
     <img src="/_img/loader.gif" width="16" height="16" align="absmiddle">&nbsp;Загрузка...
</div>
    </td>
</tr>
<tr>
    <td></td>
    <td>
<div id="job_descript">
    <?php
    if(isset($_POST["job"]))
    {
        echo('<a href="/servis/job_description/view/?id='.$_POST["job"].'&lang=0" class="lk1" target="jobDescript" onClick="window.open(this.href, this.target, config=\'height=850,width=510,toolbar=0, scrollbars=1\')">Описание должности</a>');
    }
    else
    {
        echo('<span class="not_link">Описание должности</span>');
    }
    ?>
</div>
<div id="loading_job_descript" style="display:none">
      <span class="not_link">Описание должности</span>
</div>
    </td>
</tr>

<tr>
   <th colspan="2">Характеристика компаний для исследования</th>
</tr>

<!--Город-->
  <tr>
    <td align="right">Выберите город *</td>
    <td>
    <div id='citydiv'>
      <select name='city' class="text_1" onChange='return getSphereStaff("<?php echo($job_id);?>",this.value);'>
        <option value="">--- Выбрать ---</option>
        <?php
       if(isset($_POST['city']) and isset($_POST['job'])){
        $job_id=$_POST['job'];
        $result=mysqli_query($link,"select * from base_regions where id in(select city_id from base_company_jobs where job_id='$job_id')");
        if($city_id==0){
          echo('<option value="0" selected>Все города</option>');
        }else{
          echo('<option value="0">Все города</option>');
        }

      $ch="";
      while($row=mysqli_fetch_array($result))
      {
      if((isset($_POST['city'])) and ($_POST['city']==$row["id"])){$ch="selected";}
      echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["name"].'</option>');
      $ch="";
      }
      }
        ?>
      </select>
        <?php
        if(isset($_POST['job']) AND $_POST['job']!='0'){
            $job_id=$_POST['job'];
            $job_cost_indiv=mysqli_result(mysqli_query($link,"select indiv_cost from job_cost where job_id='$job_id'"),0,0);
?>
        <br><br>
<div class="ui-state-error" style="width:380px; padding:10px;">
    <p align="center">Стоимость отчета по выбранной Вами должности можно посмотреть здесь:
        <br><a href="http://www.a1agregator.ru/main/abonent/4846/<?php echo($job_cost_indiv);?>" target="_blank" class="lk2">стоимость отчета &raquo;</a></p></div><br>
<?php } ?>
</div>

<div id="loading_city" style="display:none">
     <img src="/_img/loader.gif" width="16" height="16" align="absmiddle">&nbsp;Загрузка...
</div>
    </td>
    <td></td>
  </tr>
  <!--Сфера деятельности компании -->
<tr>
<td width="35%" align="right">Сфера деятельности компаний</td>
<td>
<div id="spherediv">
  <select name='sphere' class="text_1" onchange='getStaff("<?php echo($job_id);?>","<?php echo($city_id);?>",this.value);'>
   <option value="">--- Выбрать ---</option>
<?php
if(isset($_POST["job"]) && isset($_POST["city"]))
{
$ch="";

if(isset($_POST['sphere']) and $_POST['sphere']==0){echo('<option value="0" selected>не имеет значения</option>');}
else{echo('<option value="0">не имеет значения</option>');}

if(isset($_POST["job"]) AND isset($_POST["city"]))
{
    $job_id=$_POST['job'];
    $city_id=$_POST['city'];
    if($city_id==0)
{
    $q_sphere=mysqli_query($link,"SELECT * from base_sphere where id in(
select sphere_id from base_company_sphere
where company_id in(select company_id from base_company_jobs
where job_id='$job_id')) order by name");
}
else{
$q_sphere=mysqli_query($link,"SELECT * from base_sphere
where id in(select sphere_id from base_company_sphere
where company_id in(select company_id from base_company_jobs
where city_id='$city_id' AND job_id='$job_id')) order by name");
}
}

while($out_sphere = mysqli_fetch_array($q_sphere))
{
if((isset($_POST['sphere'])) and ($_POST['sphere']==$out_sphere['id'])){$ch="selected";}
echo('<option value="'.$out_sphere['id'].'" '.$ch.'>'.$out_sphere['name'].'</option>');
$ch="";
}
}
?>
</select>
</div>
<div id="loading_sphere" style="display:none">
     <img src="/_img/loader.gif" width="16" height="16" align="absmiddle">&nbsp;Загрузка...
</div>
</td>
</tr>

<!--Количество сотрудников в компании -->
<tr>
<td width="35%" align="right">Количество сотрудников в компании</td>
<td>
<div id='staffdiv'>
      <select name='staff' class="text_1">
       <option value="">--- Выбрать ---</option>
        <?php
       if(isset($_POST['sphere'])){
        $sphere_id=$_POST['sphere'];
       }else{
        $sphere_id=0;
       }

       if(isset($_POST["job"]) && isset($_POST["city"]) && isset($_POST["sphere"]))
       {
        if($sphere_id==0){
          $q_staff=mysqli_query($link,"SELECT * from base_personal
          where id in(select personal_id from base_companies
          where id in(select company_id from base_company_jobs where city_id='$city_id' and job_id='$job_id')) order by id");
          if($city_id==0){
            $q_staff=mysqli_query($link,"SELECT * from base_personal
            where id in(select personal_id from base_companies
            where id in(select company_id from base_company_jobs where job_id='$job_id')) order by id");
          }
        } else {
          $q_staff=mysqli_query($link,"SELECT * from base_personal
          where id in(select personal_id from base_companies
          where id in(select company_id from base_company_sphere where sphere_id='$sphere_id')
          AND id in(select company_id from base_company_jobs where city_id='$city_id' and job_id='$job_id')) order by id");
          if($city_id==0){
            $q_staff=mysqli_query($link,"SELECT * from base_personal
            where id in(select personal_id from base_companies
            where id in(select company_id from base_company_sphere where sphere_id='$sphere_id')
            AND id in(select company_id from base_company_jobs where job_id='$job_id')) order by id");
          }
        }

        $ch="";
        if(isset($_POST["staff"]) and $_POST["staff"]==0){echo('<option value="0" selected>не имеет значения</option>');}
        else{echo('<option value="0">не имеет значения</option>');}
        while($row=mysqli_fetch_array($q_staff)){
          if(isset($_POST["staff"]) and $_POST["staff"]==$row["id"]){$ch="selected";}
          echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["title"].'</option>');
        }
        $ch="";
       }
        ?>
      </select>
    </div>
<div id="loading_staff" style="display:none">
     <img src="/_img/loader.gif" width="16" height="16" align="absmiddle">&nbsp;Загрузка...
</div>
</td>
</tr>
<tr>
  <th colspan="2">Ваши персональные характеристики (только для оформления отчета)</th>
</tr>

<!--name-->
<tr>
<td align="right">Имя</td>
<td>
<?php
$fio="";
if(isset($_POST['fio'])) {$fio=$_POST['fio'];}
?>
<input type="text" name="fio" value="<?php echo($fio);?>" class="text_1"></td>
</tr>

<!--education-->
<tr>
<td align="right">Ваше образование </td>
<td><select id='obrazovanie' name='obrazovanie' class="text_1">
<option value="">--- Выбрать ---</option>
<?php
$ch="";
$result=mysqli_query($link,"select * from base_education order by id");
while($row=mysqli_fetch_array($result))
{
if((isset($_POST['obrazovanie'])) and ($_POST['obrazovanie']==$row['id'])){$ch="selected";}
echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["title"].'</option>');
$ch="";
}
?>
</select></td>
</tr>
<tr>
<td align="right">Количество ваших подчиненных </td>
<td><select id='podchin' name='podchin' class="text_1">
<option value="">--- Выбрать ---</option>
<?php
$ch="";
$result=mysqli_query($link,"select * from base_sub order by id");
while($row=mysqli_fetch_array($result))
{
if((isset($_POST['podchin'])) and ($_POST['podchin']==$row['id'])){$ch="selected";}
echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["title"].'</option>');
$ch="";
}
?>
</select></td>
</tr>
 <tr>
<td align="right">Трудовой стаж </td>
<td><select id='stazh' name='stazh' class="text_1">
<option value="">--- Выбрать ---</option>
<?php
$ch="";
$result=mysqli_query($link,"select * from base_experience order by id");
while($row=mysqli_fetch_array($result))
{
if((isset($_POST['stazh'])) and ($_POST['stazh']==$row['id'])){$ch="selected";}
echo('<option value="'.$row["id"].'" '.$ch.'>'.$row["title"].'</option>');
$ch="";
}
?>
</select></td>
</tr>
  <tr>
      <td></td>
      <td align="right"><input type="button" value="дальше &raquo;" class="but1" onClick="return testform();"></td>
      <td></td>
  </tr>
</table>
</form>

<?php
$month=(date('m')-2);
if($month == "1" ){$month_ru="Январь";}
elseif($month == "2" ){$month_ru="Февраль";}
elseif($month == "3" ){$month_ru="Март";}
elseif($month == "4" ){$month_ru="Апрель";}
elseif($month == "5" ){$month_ru="Май";}
elseif($month == "6" ){$month_ru="Июнь";}
elseif($month == "7" ){$month_ru="Июль";}
elseif($month == "8" ){$month_ru="Август";}
elseif($month == "9" ){$month_ru="Сентябрь";}
elseif($month == "10"){$month_ru="Октябрь";}
elseif($month == "11"){$month_ru="Ноябрь";}
elseif($month == "12"){$month_ru="Декабрь";}
?>

<p>Последнее обновление базы данных: <b><?php echo($month_ru.' '.date('Y').'г.');?></b></p>

<script language="javascript">
function testform(){
text="";
if(document.step1.job.value==""){text=text+'должность;\n';}
if(document.step1.city.value==""){text=text+'город;\n';}
if(text!=""){window.alert('Вы не выбрали:\n'+text);return false;}
else{
document.step1.submit();
}
}
</script>

<?php
/*}else{
?>
<p><b>Ждем Вас в следующем месяце!</b></p>

<p>Благодарим Вас за проявленный интерес к персональным отчетам по заработной плате.
Мы ценим Ваш интерес к нашей работе и надеемся, что наша работа действительно полезна для Вас и для Вашего бизнеса.</p>

<p>Возможно, Вам нужно воспользоваться корпоративным доступом к обширным базам данных нашего портала.
Мы прилагаем все усилия, чтобы наши корпоративные пользователи получали мгновенный доступ к необходимой информации для принятия решений.</p>
<p>Посмотрите возможности для <a href="/preds/" class="link_4">корпоративных пользователей</a></p>
<p>Если Ваша компания хочет получить корпоративный доступ к базам данных по заработным платам и компенсациям,
Вы можете связаться с нами по e-mail <a href='mailto:tz@obzorzarplat.ru' class="link_4">tz@obzorzarplat.ru</a> либо по телефону (812) 740 18 11</p>
<?php
  }
 *
 */
?>