<?php

$report_number=0;

if(checkReport('7', $link)){
    $step = (isset($_GET["step"])) ? $_GET["step"] : 1;

  require($folder.'application/moduls/reports/monthly_db/monthly_db.php');


}else{
    echo('<p>����� ����������.</p> <p>�� �������� ��������� �������� �������� ����������� � ������������ ������� - ������� ��������:
            <br> �������: +7 (812) 740 18 11
            <br> email: <a href="mailto:tz@obzorzarplat.ru">tz@obzorzarplat.ru</a></p>');
}
?>