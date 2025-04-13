<script type="text/javascript" src="/_js/jquery/1job-profi.js"></script>
<?php
if(checkReport('1',$link)){
  if(!isset($_GET["step"])){$step=1;}
  if(isset($_GET["step"])){$step=$_GET["step"];}
  include($folder.'application/moduls/reports/1job-profi/1job-profi-'.$step.'.php');
}else{
      echo('<p>Отчет недоступен.</p> <p>По вопросам продления действия договора обращайтесь к руководителю проекта - Сергею Николенко:
            <br> телефон: +7 (812) 740 18 11
            <br> email: <a href="mailto:nikolenko.sergey@obzorzarplat.ru" class="lk1">nikolenko.sergey@obzorzarplat.ru</a></p>');
}
?>