<?php
header("Content-Type: text/html; charset=windows-1251");

//��������� ������ �� �����
$job_id = intval($_POST['job']);
$city_id = intval($_POST['city']);

/*******�������� ���������� ���������� ������ ���� ��������*/
$user_ip = $_SERVER["REMOTE_ADDR"];
$ban_date = date("Y-m-d");

$count = mysqli_num_rows(mysqli_query($link,"select * from for_count where ip = '$user_ip'"));
//$count = 0;

//��������, ������� �� ������ ��� ������� (��������� � �����)
if ($job_id != "0" && $city_id != "0"){

    if ($count == 0) {
        //������ ����� => ������ � �� � ��������� ���������
        mysqli_query($link,"insert into for_count (ip,count,date) values('$user_ip','1','$ban_date')");
        $free = "1";

        //����� ����������� �������
        include($folder.'../cgi/moduls/services/zp/salary-result-include.php');

    } else {

        //-------�� ������ ����� (��� ���� ������ � ��)-------//
        //���������� ���������� - ���, ���� ���������� ���� ��������
        mysqli_query($link,"insert into for_count_job (job_id,city_id,date,payed,view) values('$job_id','$city_id','$ban_date','0','0')");
        $jobs = mysqli_result(mysqli_query($link,"select * from base_jobs where id = '$job_id'"),0,24);

        //$merchant_id = 5848; // ������������� �������� � Pay2Pay
        //$secret_key = "obzorZPzarplata"; // ��������� ����
        //$shop_id = 500648; // �������� ������������� �������� � Yandex.�����
        $shop_id = 160299; // ������ ������������� �������� � Yandex.�����
        //$secret_key = "test_JLi1B60CV3JWRLWg3t9WrtKko3DeriuwuZHgQd6jQdM"; // �������� ��������� ���� Yandex.�����
        $secret_key = "live_oSEB38zeAorbxP3s3xD-UwH8zIH7GQPKdRQZoSy3dgw"; // ������ ��������� ���� Yandex.�����
        $amount = mysqli_result(mysqli_query($link,"select express_cost from job_cost where job_id = '$job_id'"),0,0); // ����� ������
        $order_id = mysqli_result(mysqli_query($link,"select MAX(id) AS mid from for_count_job where job_id='$job_id' and city_id = '$city_id' and date='$ban_date'"),0,0); // ����� ������
        $currency = "RUB"; // ������ ������
        $desc = "������ �������� ������ ���������� ���� � �����������"; // �������� ������
        $test_mode = 0; // �������� �����

        // ��������� xml
        $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
		<request>
			<version>1.2</version>
			<merchant_id>$shop_id</merchant_id>
			<language>ru</language>
			<order_id>$order_id</order_id>
			<amount>$amount</amount>
			<currency>$currency</currency>
			<description>$desc</description>
			<test_mode>$test_mode</test_mode>
 		</request>";

        // ��������� �������
        $sign = md5($secret_key.$xml.$secret_key);
        // �������� ������ � BASE64
        $xml_encode = base64_encode($xml);
        $sign_encode = base64_encode($sign);
        ?>

        <p>��� ��������� <b>�������� ������</b> ���������� �������� ����� � ������� <b><?php echo($amount);?></b> ���.
            ����� ������� �� ������ &laquo;����������&raquo; � ����� ������� ��������� ��������-���� ������� ������.����� (money.yandex.ru), ��� ���������� ���������� ������.
            <b>��������!</b> �� ���������� �������� ����� obzorzarplat.ru �� ��������� ������.
            �� ���������� ������� ��������� �� �������� ������ ����� www.obzorzarplat.ru � �������� �� ��� ��������� ���������� ��������-������.<br>
            <a style="color:red" href="/preds/1job-lite/" target="_blank" title="������� ��������-������">���������� ������� ������</a> (��������� � ����� �������).</p>

        <form id="form_yandex_payment" action="<?='http://obzorzarplat.ru/services/zp/yandex-payment.php'?>" target="_blank" method="post">
            <input type="hidden" name="amount" value="<?=$amount?>"/>
            <input type="hidden" name="currency" value="<?=$currency?>"/>
            <input type="hidden" name="order_id" value="<?=$order_id?>"/>
            <input type="hidden" name="desc" value="<?=$desc?>"/>
            <input type="submit" value="����������"/>
        </form>

        <script>
            $('#form_yandex_payment').submit(function(){
                var ord_id = $(this).find('input[name="order_id"]').val();
                setTimeout(function(){
                    window.location.href = 'http://obzorzarplat.ru/preds/1job-lite/?order_id=' + ord_id;
                }, 300);
            })
        </script>

        <div id="zpResult1"></div>
        <script type="text/javascript">

            // ������� ������
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

            // �������� ����� � ajaxSubmit
            $("#step2").ajaxForm(options_social);

            $('#zpResult1').dialog({
                autoOpen: false,
                modal:true,
                width: 700,
                buttons: {
                    "�������": function() {
                        $(this).dialog("close");
                        $("#zpResult").dialog("close");
                    }
                }
            });
        </script>
    <?php }

} else {
    echo "<p>�� �� ������� ��������� �/��� �����. ����������, ��������� �������.</p>";
} ?>