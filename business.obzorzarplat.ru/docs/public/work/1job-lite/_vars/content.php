<?php
$report_number=0;

if(checkReport('2',$link)){
    if(get_level_access($_SESSION['user_number'],$link)=='5'){
    $report_number=mysqli_result(mysqli_query($link,"select reports from for_users_corporat where id=(SELECT user_id from for_users_corporat_login
        WHERE session_id='".$_SESSION["user_number"]."')"),0,0);
    if($report_number<3){
        if(!isset($_GET["step"])){$step=1;}
        if(isset($_GET["step"])){$step=$_GET["step"];}
        include($folder.'application/moduls/reports/1job-lite/1job-lite-'.$step.'.php');
    }else{
        echo('<p>К сожалению, в демо-версии доступно только ограниченное число отчетов для ознакомления с системой.</p>
        <p>По вопросам сотрудничества обращайтесь к руководителю проекта - Татьяне Задернюк:
        <br> телефон: +7 (812) 740 18 11
        <br> email: <a href="mailto:tz@obzorzarplat.ru" class="lk1">tz@obzorzarplat.ru</a></p>');
    }
    }else{
   if(!isset($_GET["step"])){$step=1;}
  if(isset($_GET["step"])){$step=$_GET["step"];}
  include($folder.'application/moduls/reports/1job-lite/1job-lite-'.$step.'.php');
}
}else{ 
    echo('<p>Отчет недоступен.</p> <p>По вопросам продления действия договора обращайтесь к руководителю проекта - Татьяне Задернюк:
            <br> телефон: +7 (812) 740 18 11
            <br> email: <a href="mailto:tz@obzorzarplat.ru" class="lk1">tz@obzorzarplat.ru</a></p>');
}
?>