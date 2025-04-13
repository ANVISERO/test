<script type="text/javascript" src="/_js/jquery/summary.js"></script>
<?php
if(checkReport('5',$link)){
  if(!isset($_GET["step"])){$step=1;}
  if(isset($_GET["step"])){$step=$_GET["step"];}
  include($folder.'application/moduls/reports/summary-special/summary-special-'.$step.'.php');
}else{ ?>
    <p>Отчет недоступен.</p> <p>По вопросам продления действия договора обращайтесь к руководителю проекта - Сергею Николенко:
            <br> телефон: +7 (812) 740 18 11
            <br> email: <a href="mailto:nikolenko.sergey@obzorzarplat.ru">nikolenko.sergey@obzorzarplat.ru</a></p>
<?php } ?>