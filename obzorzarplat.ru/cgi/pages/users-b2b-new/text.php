<?php
$user_id=mysqli_result(mysqli_query($link,"select max(id) from for_users_corporat"),0,0) + 1;
$psw=genpass(8,8);
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
<form name="new" action="?page=users-b2b-add" method="post" enctype="multipart/form-data" onSubmit="return testform();">

<h2>Информация для входа (логин/пароль)</h2>
<table>
<tr>
    <th>Логин</th>
    <td>user<?php echo $user_id ?></td>
</tr>
<tr>
    <th>Пароль</th>
    <td><input type="text" value="<?php echo($psw);?>" name="psw" /></td>
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
    <td><input name="datepicker_start" id="datepicker_start" type="text" value="<?php //echo($date_start);?>" /></td>
    <td><input name="datepicker_finish" id="datepicker_finish" type="text" value="<?php //echo($date_finish);?>" /></td>
</tr>
</table>
<p>Количество месяцев использования <input type="text" name="months_of_use" value=""></p>

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

        while($row=mysqli_fetch_array($tarif_q))
        {
            echo("<li><input type='radio' name='tarif' id='tariff_".$row["id"]."' value='".$row["id"]."' ".$chk." onclick='getReports(this.value,".$user_id.");'><label for='tariff_".$row["id"]."'>".$row["title"]."</label></li>");
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
    $jobs_q=mysqli_query($link,"select * from base_jobs order by name");
    while($row=mysqli_fetch_array($jobs_q)){
        $chk="";
        $users_jobs=mysqli_num_rows(mysqli_query($link,"select id from for_users_corporat_jobs where user_id='".$user_id."' AND job_id='".$row["id"]."'"));
        if($users_jobs!==0){$chk="checked";}
        echo('<li><input type="checkbox" name="job['.$row["id"].']" value="'.$row["id"].'" id="job_'.$row["id"].'" '.$chk.'><label for="job_'.$row["id"].'">'.$row["name"].'</label></li>');
    }
?>
</ul>
</li>
</ul>

<input type="hidden" name="id" value="<?php echo($user_id);?>">
<div align="center"><input type="submit" value="Сохранить &raquo;" class="submit"></div>
</form>