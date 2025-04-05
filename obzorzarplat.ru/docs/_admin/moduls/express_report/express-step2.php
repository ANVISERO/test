<?php
header("Content-Type: text/html; charset=windows-1251");

$folder='../../';

//подключение к БД
$host=implode("", file($folder.'settings/mysql_host'));
$db=implode("", file($folder.'settings/mysql_db'));
$user=implode("", file($folder.'settings/mysql_user'));
$pass=implode("", file($folder.'settings/mysql_pass'));

$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(!){echo "Ошибка подключения!";}

mysqli_query($link,"SET character_set_client='cp1251'");
mysqli_query($link,"SET character_set_connection='cp1251'");
mysqli_query($link,"SET character_set_results='cp1251'");
mysqli_query($link,"SET NAMES 'cp1251'");

//получение данных из формы
$job_id=intval($_POST['job']);
$city_id=intval($_POST['city']);

/*******проверка количества просмотров юзером этой страницы*/
$user_ip=$_SERVER["REMOTE_ADDR"]; 
$ban_date=date("Y-m-d");

$count=mysqli_num_rows(mysqli_query($link,"select * from for_count where ip='$user_ip'"));

//проверка, выбраны ли данные для расчета (должность и город)
if($job_id!="0" && $city_id!="0"){

    if($count==0){
  //первый заход => запись в БД о просмотре должности
        mysqli_query($link,"insert into for_count (ip,count,date) values('$user_ip','1','$ban_date')");
        $free="1";

        //вывод результатов запроса
        include($folder.'../_admin/moduls/express_report/express-step3.php');
    
}else{
    
   /*******не первый заход (уже есть запись в БД)************/
  //статистика должностей - все, кому предложено было оплатить
    mysqli_query($link,"insert into for_count_job (job_id,city_id,date,payed,view) values('$job_id','$city_id','$ban_date','0','0')");
    $jobs=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$job_id'"),0,24);
    $job_cost_express=mysqli_result(mysqli_query($link,"select express_cost from job_cost where job_id='$job_id'"),0,0);
?>
<div class="ui-state-error error_length" style="width:100%; margin:2px; padding:2px;"><p align="center"><b>Внимание!</b><br> Стоимость услуги варьируется в зависимости от выбранной Вами должности и оператора связи.<br>
<b>Стоимость</b> экспресс отчета о заработной плате <b><?php echo($jobs);?></b> можно посмотреть здесь:
<a href="http://www.a1agregator.ru/main/abonent/4846/<?php echo($job_cost_express);?>" class="link_1" target="_blank">http://www.a1agregator.ru/main/abonent/4846/<?php echo($job_cost_express);?></a></p>
</div>
    <br>
<form name='step2' id="step2" method='post' action="">
<input type="hidden" name="city" value="<?php echo($_POST['city']);?>">
<input type="hidden" name="jtype" value="<?php echo($_POST['jtype']);?>">
<input type="hidden" name="job" value="<?php echo($_POST['job']);?>">

<table width="100%">
    <tr>
        <th align="right" width="30%">Код <font color="#f00">*</font>:</th>
        <td><input type="text" class="text_1" name="code" value=""></td>
    </tr>
<tr>
  <td align="left"></td>
  <td align="right"><input type="submit" value="оплатить &raquo;" class="submit"></td>
</tr>
</table>
</form>

<p><font color="#f00">*</font> Для получения <b>кода</b> необходимо совершить следующие действия:</p>
<ol>
    <li>
        Отправить смс с текстом <b>#expresszp</b> на короткий номер <b><?php echo($job_cost_express);?></b> 
        (стоимость услуги Вы можете посмотреть здесь: <a href="http://www.a1agregator.ru/main/abonent/4846/<?php echo($job_cost_express);?>" target="_blank">http://www.a1agregator.ru/main/abonent/4846/<?php echo($job_cost_express);?></a>)
    </li>
    <li>В ответном сообщении Вы получите проверочный код (например, code: 0123456789)</li>
    <li>Введите полученный код в поле <b>&laquo;Код&raquo;</b></li>
    <li>Нажмите на кнопку <b>&laquo;Оплатить&raquo;</b></li>
</ol>

<div id="zpResult1"></div>
<script type="text/javascript">

// готовим объект
var options_social = {
  target: "#zpResult1",
  url: "/_admin/moduls/express_report/express-step3.php",
  success: function() {
    //alert("OK");
       $('#zpResult1').dialog('open');
  },
  error:function(){
      alert('oops!');
  }
};

// передаем опции в  ajaxSubmit
$("#step2").ajaxForm(options_social);

 $('#zpResult1').dialog({
		autoOpen: false,
                modal:true,
		width: 700,
                buttons: {
                        "Закрыть": function() {
				$(this).dialog("close");
                                $("#zpResult").dialog("close");
			}
                }
	});
</script>
<?php }

}else{
        echo "<p>Вы не выбрали должность и/или город. Пожалуйста, повторите попытку.</p>";
    } ?>