<?php
$report_number=0;

if(checkReport('7', $link)){

  if(!isset($_GET["step"])){$step=1;}
  if(isset($_GET["step"])){$step=$_GET["step"];}

  include($folder.'application/moduls/reports/scoring/scoring-'.$step.'.php');

}else{
    echo('<p>Отчет недоступен.</p> <p>По вопросам продления действия договора обращайтесь к руководителю проекта - Татьяне Задернюк:
            <br> телефон: +7 (812) 740 18 11
            <br> email: <a href="mailto:tz@obzorzarplat.ru">tz@obzorzarplat.ru</a></p>');
}
?>