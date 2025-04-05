<?php
ini_set("soap.wsdl_cache_enabled", "0");
error_reporting(E_ALL);
ini_set('display_errors', '1');

// define the SOAP client using the url for the service
$client=new SoapClient("http://obzorzarplat.ru/business/web_service/lite.wsdl", array('trace'=>1,'login'=>'user146','password'=>'32eJbrEw','encoding'=>'windows-1251'));

$functions = $client->__getFunctions();
print_r($functions);
$types = $client->__getTypes();
print_r($types);

$job='1359';
$city='1';

$params=array('job'=>$job, 'city'=>$city);

echo("<p>".$client->getJobName($job)."</p>");
echo("<p>".$client->getCityName($city)."</p>");

$output=$client->getSalary($params);
echo ("<p> Минимальная ЗП = ".$output["salaryMin"]." руб.</p>");
echo ("<p> Средняя ЗП = ".$output["salaryAvr"]." руб.</p>");
echo ("<p> Максимальная ЗП = ".$output["salaryMax"]." руб.</p>");

 // print the SOAP request
echo '<h2>Request</h2><pre>' . htmlspecialchars($client->__getLastRequest(), ENT_QUOTES) . '</pre>';
// print the SOAP request Headers
echo '<h2>Request Headers</h2><pre>' . htmlspecialchars($client->__getLastRequestHeaders(), ENT_QUOTES) . '</pre>';
// print the SOAP response
echo '<h2>Response</h2><pre>' . htmlspecialchars($client->__getLastResponse(), ENT_QUOTES) . '</pre>';
// print the SOAP response Headers
echo '<h2>Response Headers</h2><pre>' . htmlspecialchars($client->__getLastResponseHeaders(), ENT_QUOTES) . '</pre>';
?>