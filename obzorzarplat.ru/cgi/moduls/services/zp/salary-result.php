<?php
header("Content-Type: text/html; charset=windows-1251");

//получение данных из формы
$job_id=intval($_POST['job']);
$city_id=intval($_POST['city']);

/*******проверка количества просмотров юзером этой страницы*/
$user_ip=$_SERVER["REMOTE_ADDR"]; 
$ban_date=date("Y-m-d");

$count=mysqli_num_rows(mysqli_query($link,"select * from for_count where ip='$user_ip'"));

//проверка, выбраны ли данные для расчета (должность и город)
if($job_id!="0" && $city_id!="0"){

    if($count==0 || (isset($_POST['lmi_sys_payment_date']) && isset($_POST['lmi_sys_payment_id']) && isset($_POST['order_id'])) || $user_ip == '185.76.145.36') {
  //первый заход => запись в БД о просмотре должности
    	if($user_ip != '185.76.145.36' && !isset($_POST['lmi_sys_payment_date']) && !isset($_POST['lmi_sys_payment_id']) && !isset($_POST['order_id'])) {
	        mysqli_query($link,"insert into for_count (ip,count,date) values('$user_ip','1','$ban_date')");
	        $free="1";
    	}

        //вывод результатов запроса
        include($folder.'../cgi/moduls/services/zp/salary-result-include.php');
    
}else{
    
   /*******не первый заход (уже есть запись в БД)************/
  //статистика должностей - все, кому предложено было оплатить
    mysqli_query($link,"insert into for_count_job (job_id,city_id,date,payed,view) values('$job_id','$city_id','$ban_date','0','0')");
    $jobs=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$job_id'"),0,24);




	//$merchant_id = 5848; // Идентификатор магазина в Pay2Pay
	//$secret_key = "obzorZPzarplata"; // Секретный ключ
	$amount = mysqli_result(mysqli_query($link,"select express_cost from job_cost where job_id='$job_id'"),0,0); // Сумма заказа
	$order_id = mysqli_result(mysqli_query($link,"select MAX(id) AS mid from for_count_job where job_id='$job_id' and city_id='$city_id' and date='$ban_date'"),0,0); // Номер заказа
	//$currency = "RUB"; // Валюта заказа
	$desc = "Оплата экспресс отчета заработных плат и компенсаций"; // Описание заказа
	$test_mode = 0; // Тестовый режим

	//$merchant_ya_id = 500648; // Идентификатор магазина в Yandex.Касса
	//$secret_ya_key = "test_JLi1B60CV3JWRLWg3t9WrtKko3DeriuwuZHgQd6jQdM"; // Секретный ключ Yandex.Касса

// Формируем xml
/*$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
			<request>
			<version>1.2</version>
			<merchant_id>$merchant_id</merchant_id>
			<language>ru</language>
			<order_id>$order_id</order_id>
			<amount>$amount</amount>
			<currency>$currency</currency>
			<description>$desc</description>
			<test_mode>$test_mode</test_mode>
 		</request>";*/

// Вычисляем подпись
//$sign = md5($secret_key.$xml.$secret_key);
// Кодируем данные в BASE64
//$xml_encode = base64_encode($xml);
//$sign_encode = base64_encode($sign);
?>


<p>Для получения <b>экспресс отчета</b> необходимо оплатить сумму в размере <b><?php echo($amount);?></b> руб.
	После нажатия на кнопку &laquo;Продолжить&raquo; вы перейдёте на интернет-сайт сервиса Paymaster (paymaster.ru), где и продолжите оплату.
	По завершению платежа Вы будете перенаправленны на страницу с информацией экспресс-отчета.<br><a style="color:red" href="/preds/1job-lite/" target="_blank" title="Образец экспресс-отчета">Посмотреть образец отчета</a> (откроется в новой вкладке).</p>

<script>console.log("amount: " + <?=$amount?> + "; order_id: " + <?=$order_id?>);</script>

		<form action="https://paymaster.ru/Payment/Init/" method="get">
			<input type="hidden" name="LMI_MERCHANT_ID" value="8be53f57-aad9-4e4a-b302-aaa8ff256572">
			<input type="hidden" name="LMI_PAYMENT_AMOUNT" value="<?=$amount?>">
			<input type="hidden" name="LMI_CURRENCY" value="RUB">
			<input type="hidden" name="LMI_PAYMENT_DESC_BASE64" value="<?=base64_encode(iconv('windows-1251', 'UTF-8', $desc))?>">
			<input type="hidden" name="ORDER_ID" value="<?=$order_id?>">
			<input type="hidden" name="JOB_ID" value="<?=$job_id?>">
			<input type="hidden" name="CITY_ID" value="<?=$city_id?>">
			<input type="hidden" name="JTYPE_ID" value="<?=$_POST['jtype']?>">
			<input type="submit" value="Продолжить"/>
		</form>

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