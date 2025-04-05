<?php
$folder = $_SERVER['DOCUMENT_ROOT'] . '/';
require $folder . 'services/lib/autoload.php';
use YandexCheckout\Client;

if (isset($_REQUEST['amount']) && isset($_REQUEST['currency']) && isset($_REQUEST['order_id']) && isset($_REQUEST['desc'])) {
    $client = new Client();
    //$client->setAuth('500648', 'test_JLi1B60CV3JWRLWg3t9WrtKko3DeriuwuZHgQd6jQdM'); // Тестовый режим
    $client->setAuth('160299', 'live_oSEB38zeAorbxP3s3xD-UwH8zIH7GQPKdRQZoSy3dgw'); // Боевой режим

    $idempotenceKey = uniqid('', true);
    $response = $client->createPayment(
        array(
            'amount' => array(
                'value' => $_REQUEST['amount'],
                'currency' => $_REQUEST['currency'],
            ),
            //'payment_method_data' => array(
            //    'type' => 'bank_card',
            //),
            'confirmation' => array(
                'type' => 'redirect',
                'return_url' => 'http://obzorzarplat.ru/preds/1job-lite/?order_id=' . $_REQUEST["order_id"],
                //'return_url' => 'http://obzorzarplat.ru/?order_id=' . $_REQUEST["order_id"],
            ),
            'metadata' => array(
                'order_id' => $_REQUEST['order_id'],
            ),
            //'capture' => true,
        ),
        $idempotenceKey
    );

    if (isset($response['confirmation']['confirmation_url'])) {
        header("Location: " . $response['confirmation']['confirmation_url']);
        //echo '<script>window.open("http://obzorzarplat.ru/preds/1job-lite/?order_id=' . $_REQUEST["order_id"] . '", "_blank");location.href = "' . $response['confirmation']['confirmation_url'] . '";</script>';
        die();
    }
}
/*$client = new Client();
$client->setAuth('500648', 'test_JLi1B60CV3JWRLWg3t9WrtKko3DeriuwuZHgQd6jQdM');
$test = $client->getPaymentInfo('21cafc49-000f-5086-b000-0dc66eec2f10');
$flog = fopen('myfile.txt', 'w');
$to_log = print_r($test->getStatus(), true);
fputs($flog, $to_log);*/

?>