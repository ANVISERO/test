<?php
$user_id=intval($_GET["id"]);
$user=mysqli_query($link,"select * from for_users_corporat where id='$user_id'");

while($row=mysqli_fetch_array($user)){
$contract=$row["contract"];
$company=stripslashes($row["company"]);
$name=stripslashes($row["name"]);
$email=$row["email"];
$login=$row["login"];
$levelaccess=$row["levelaccess"];
$date_start=$row["date_start"];
$date_finish=$row["date_finish"];
$tarif_id=$row["tarif_id"];
$months_of_use=$row["months_of_use"];
$req_captcha = $row["req_captcha"];
$req_cp = $row["req_cp"];
}

$psw_new=genpass(8,8);
?>
<script type="text/javascript" src="/_js/lists4users-b2b.js"></script>

<script type="text/javascript">
$(document).ready(function(){
   $.datepicker.setDefaults($.extend({changeYear:true}, $.datepicker.regional[''], {dateFormat: "yy-mm-dd"}));
  $("#datepicker_start, #datepicker_finish").datepicker();

$("ul#user_lists li:has(ul)").children().slideUp(100);

$("ul#user_lists li").click(function(event){
if (this == event.target) {
$("ul:first", $(this)).slideToggle(400);
}

});

});
</script>
<a href="?page=users-b2b"><img src="_adminfiles/button_back.gif" alt="&laquo; Назад" width="105" height="20" border="0"></a>
<form name="red" action="?page=users-b2b-upd" method="post" enctype="multipart/form-data">
<?php // onSubmit="return testform();" ?>
<input type="hidden" name="user_id" id="user_id" value="<?php echo($user_id);?>">
<h2>Информация для входа (логин/пароль)</h2>
<table>
<tr>
    <th>Логин</th>
    <td><?php echo($login);?></td>
</tr>
<tr>
    <th>Пароль</th>
    <td><input type="checkbox" value="1" name="psw_new_check"> Установить новый пароль: <input type="text" name="psw_new" value="<?php echo($psw_new);?>" /></td>
</tr>
<tr>
	<th>Нужна проверка?</th>
        <td><input type="checkbox" value="1" name="set_req_captcha" <?echo ($req_captcha) ? "checked" : ""?>> Капча<br>
        <input type="checkbox" value="1" name="set_req_cp" <?echo ($req_cp) ? "checked" : ""?>> Защита от копи-паста<br>
        </td>
</tr>
</table>   

<h2>Контакты пользователя</h2>
<table>
<tr>
    <td><label for="user_company">Компания:</label></td>
    <td><input name="user_company" id="user_company" type="text" value='<?php echo(htmlspecialchars($company,ENT_QUOTES)); ?>'></td>
</tr>
<tr>
    <td><label for="user_name">Имя пользователя:</label></td>
    <td><input name="user_name" id="user_name" type="text" value='<?php echo(htmlspecialchars($name,ENT_QUOTES)); ?>'></td>
</tr>
<tr>
    <td><label for="user_email">Email:</label></td>
    <td><input name="user_email" id="user_email" type="text" value='<?php echo(htmlspecialchars($email,ENT_QUOTES)); ?>'></td>
</tr>
</table>

<h2>Договор</h2>
<p>Номер договора: <input type="text" name="contract" value="<?php echo($contract);?>"/></p>
<table width="100%">
<tr>
    <th>Дата начала действия договора</th>
    <th>Дата окончания действия договора</th>
</tr>
<tr>
    <td><input name="datepicker_start" id="datepicker_start" type="text" value="<?php echo($date_start);?>" /></td>
    <td><input name="datepicker_finish" id="datepicker_finish" type="text" value="<?php echo($date_finish);?>" /></td>
</tr>
</table>
<p>Количество месяцев использования <input type="text" name="months_of_use" value="<?php echo intval($months_of_use); ?>"></p>

<h2>Тариф</h2>
<table width="100%">
<tr>
    <th>Тарифы</th>
    <th>Отчеты</th>
</tr>
<tr>
    <td>
<ul id="tariffs">
<?php
        $tarif_q=mysqli_query($link,"select * from for_tarif order by title");
        $chk="";

        while($row=mysqli_fetch_array($tarif_q))
        {
            if($row["id"]==$tarif_id){$chk="checked";}
            echo("<li><input type='radio' name='tarif' id='tariff_".$row["id"]."' value='".$row["id"]."' ".$chk." onclick='getReports(this.value,".$user_id.");'><label for='tariff_".$row["id"]."'>".$row["title"]."</label></li>");
            $chk="";
        }
        ?>
</ul>
    </td>
    <td>
        <div id='reportsdiv'>

<p>Отчеты, входящие в тариф:</p>
<ul>
<?php

$reports_q=mysqli_query($link,"select * from for_report_type where id in(select report_id from for_tarif_reports where tarif_id='".$tarif_id."')");
while($row=mysqli_fetch_array($reports_q)){
    echo("<li>".$row["title"]."</li>");
}
?>
</ul>
<p>Дополнительные отчеты:</p>

<?php
$reports_q=mysqli_query($link,"select * from for_report_type where id not in(select report_id from for_tarif_reports where tarif_id='".$tarif_id."')");
while($row=mysqli_fetch_array($reports_q))
{
    $chk="";
    $users_report_types=mysqli_num_rows(mysqli_query($link,"select id from for_users_corporat_report_type where user_id='$user_id' AND report_type_id='".$row["id"]."'"));
    if($users_report_types!==0){$chk="checked";}
    echo("<input type='checkbox' id='report_type_".$row["id"]."' value='".$row["id"]."' name=report_type[] ".$chk."><label for='report_type_".$row["id"]."'>".$row["title"]."</label><br>");
}
?>

</div>
<div id="loading_job" style="display:none">
     <img src="/_img/loader.gif" width="16" height="16" align="absmiddle">&nbsp;Загрузка...
</div>
    </td>
</tr>
</table>

<h2>Права доступа</h2>
<ul id="user_lists">
<li>Уровень доступа
    <ul>
    <?php
        $levelaccess_q=mysqli_query($link,"select id, title from for_levelaccess order by title");
        while($row=mysqli_fetch_array($levelaccess_q)){
            $chk="";
            if($row["id"]==$levelaccess){$chk="checked";}
            echo('<li><input type="radio" name="levelaccess" id="lvl_'.$row["id"].'" value="'.$row["id"].'" '.$chk.'><label for="lvl_'.$row["id"].'">'.$row["title"].'</label></li>');
        }
    ?>
    </ul>
</li>
<li>Доступные города
<ul>
<?php
$cities_q=mysqli_query($link,"select id,name from base_regions order by name");
    while($row=mysqli_fetch_array($cities_q)){
        $chk="";
        $users_cities=mysqli_num_rows(mysqli_query($link,"select id from for_users_corporat_cities where user_id='".$user_id."' AND city_id='".$row["id"]."'"));
        if($users_cities!==0){$chk="checked";}
        echo('<li><input type="checkbox" name="city['.$row["id"].']" id="city_'.$row["id"].'" value="'.$row["id"].'" '.$chk.'><label for="city_'.$row["id"].'">'.$row["name"].'</label></li>');
    }
?>
</ul>
</li>
<li>Доступные факторы для формирования сводного отчета
<ul>
<?php
$factors_q=mysqli_query($link,"select id,name from base_factors order by name");
    while($row=mysqli_fetch_array($factors_q)){
        $chk="";
        $users_factors=mysqli_num_rows(mysqli_query($link,"select id from for_users_corporat_factors where user_id='".$user_id."' AND factor_id='".$row["id"]."'"));
        if($users_factors!==0){$chk="checked";}
        echo('<li><input type="checkbox" name="factor['.$row["id"].']" value="'.$row["id"].'" id="factor_'.$row["id"].'" '.$chk.'><label for="factor_'.$row["id"].'">'.$row["name"].'</label></li>');
    }
?>
</ul>
</li>
<li>Доступные должности
<ul>
<li>Должности компании № <input type="text" value="" name="company_id"></li>
<?php
$jtype_q=mysqli_query($link,"select id,name from base_jtype order by name");

while ($jtype = mysqli_fetch_object($jtype_q)) {
    echo "<li><b>".$jtype->name."</b>
	<input type=\"checkbox\" name=\"jtype['".$jtype->id."']\" value=\"".$jtype->id."\" id=\"jtype_".$jtype->id."\"></li>";
    $jobs_q=mysqli_query($link,"select bj.id,bj.name from base_jobs as bj inner join base_job_types as bjt on bjt.job_id=bj.id WHERE bjt.jtype_id='$jtype->id' order by bj.name");
    while($row=mysqli_fetch_array($jobs_q)){
        $chk="";
        $users_jobs=mysqli_num_rows(mysqli_query($link,"select id from for_users_corporat_jobs where user_id='".$user_id."' AND job_id='".$row["id"]."'"));
//	    if ($job_ib == "2051") echo "select id from for_users_corporat_jobs where user_id='".$user_id."' AND job_id='".$row["id"]."'";
        if($users_jobs!==0) {$chk="checked";}
        echo('<li><input class="jtype_'.$jtype->id.'" type="checkbox" name="job['.$row["id"].']" value="'.$row["id"].'" id="job_'.$row["id"].'" '.$chk.'><label for="job_'.$row["id"].'">'.$row["name"].'</label></li>');
    }?>
<script type="text/javascript">
	$(document).ready( function() {
    	$("#jtype_<?=$jtype->id?>").click( function() { // при клике по главному чекбоксу
           if($('#jtype_<?=$jtype->id?>').attr('checked')){ // проверяем его значение
             $('.jtype_<?=$jtype->id?>:enabled').attr('checked', true); // если чекбокс отмечен, отмечаем все чекбоксы
            } else {
                $('.jtype_<?=$jtype->id?>:enabled').attr('checked', false); // если чекбокс не отмечен, снимаем отметку со всех чекбоксов
            }
       });
    });
</script>
<?}
?>
</ul>
</li>
</ul>

<h2>Сформированные отчеты</h2>
<table border="0" id="demoTable" class="tablesCorp">
<thead>
    <tr>
        <th>Дата</th>
        <th>Тип отчета</th>
        <th>Должность</th>
        <th>Регион/город</th>
        <th>Excel</th>
    </tr>
</thead>
<tbody>
<?php
$archive_q=mysqli_query($link,"select id,url,user_id,report_type_id,job_id,city_id,date from for_users_corporat_reports where user_id='$user_id' order by date desc, id desc LIMIT 30");

while($row=mysqli_fetch_array($archive_q))
{
  $report_type_title=mysqli_result(mysqli_query($link,"select title from for_report_type where id=".$row["report_type_id"]),0,0);
  //название должности
  if($row["job_id"]==0){
      $job_title="-";
  }else{
    $job_title=mysqli_result(mysqli_query($link,"select name from base_jobs where id=".$row["job_id"]),0,0);
  }

  // название региона/города
  if($row["city_id"]==0){
      $city_title="-";
  }else{
    $city_title=mysqli_result(mysqli_query($link,"select name from base_regions where id=".$row["city_id"]),0,0);
  }

  if(file_exists('http://business.obzorzarplat.ru/_report/user'.$row["user_id"].'/report_'.$row["id"].'.xls')){
    $href_xls='<a href="http://business.obzorzarplat.ru/_report/user'.$row["user_id"].'/report_'.$row["id"].'.xls" class="lk1" target="_blank"><img src="/_img/business/report-excel.png" alt=""></a>';
  } else {
    $href_xls="";
  }

?>
<tr id="<?php echo $row["id"];?>" class="{reportId:'<?php echo $row["id"];?>', date:'<?php echo $row["date"];?>', report_type_title:'<?php echo $report_type_title;?>', job_title:'<?php echo $job_title;?>'}">
<td class="date"><a href="http://business.obzorzarplat.ru/archive/html.php?d=<?php echo $row["url"];?>" class="lk1" target="_blank"><?php echo date("d.m.Y",strtotime($row["date"]));?></a></td>
<td class="report_type_title"><a href="http://business.obzorzarplat.ru/archive/html.php?d=<?php echo $row["url"];?>" class="lk1" target="_blank"><?php echo $report_type_title;?></a></td>
<td class="job_title" align="center"><a href="http://business.obzorzarplat.ru/archive/html.php?d=<?php echo $row["url"];?>" class="lk1" target="_blank"><?php echo $job_title;?></a></td>
<td><a href="http://business.obzorzarplat.ru/archive/html.php?d=<?php echo $row["url"];?>" class="lk1" target="_blank"><?php echo $city_title; ?></a></td>
<td class="job_title" align="center"><?php echo $href_xls; ?></td>
</tr>
<?php
}

?>

</tbody>
</table>


<div align="center"><input type="submit" value="Сохранить &raquo;" class="submit"></div>

</form>
