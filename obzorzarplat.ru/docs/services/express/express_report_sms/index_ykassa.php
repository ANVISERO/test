<?php
$notification = json_decode(file_get_contents('php://input'));
$payment = $notification->object;

$folder = $_SERVER['DOCUMENT_ROOT'] . '/';
require $folder . 'services/lib/autoload.php';
use YandexCheckout\Client;

if ($payment->status == 'waiting_for_capture') {
    $client = new Client();
    //$client->setAuth('500648', 'test_JLi1B60CV3JWRLWg3t9WrtKko3DeriuwuZHgQd6jQdM'); // Тестовый режим
    $client->setAuth('160299', 'live_oSEB38zeAorbxP3s3xD-UwH8zIH7GQPKdRQZoSy3dgw'); // Боевой режим

    $response = $client->capturePayment(
        array(
            'amount' => array(
                'value' => $payment->amount->value,
                'currency' => $payment->amount->currency,
            ),
        ),
        $payment->id,
        uniqid('', true)
    );

    if ($response->getStatus() == 'succeeded') {
        if (!empty($payment->metadata->order_id)) {

            $order_id = $payment->metadata->order_id;
            $host = 'zarplata.mysql';
            $db = 'zarplata_db';
            $user = 'zarplata_mysql';
            $pass = '70oiwgo9';

            $link = mysql_pconnect($host, $user, $pass);
            mysqli_select_db($link,$db);
            if (!mysqli_query($link,"UPDATE `for_count_job` SET `payed` = '1' WHERE `id` = '$order_id'")) {
                $error = "Ошибка обновления данных";
            }

            $flog = fopen('myfile.txt', 'w');
            $to_log = print_r(mysql_fetch_assoc(mysqli_query($link,"select * from `for_count_job` where `id` = '$order_id'")), true);
            fputs($flog, $to_log);
        }
    }

    //$test = $client->getPaymentInfo($payment->id);
}
?>