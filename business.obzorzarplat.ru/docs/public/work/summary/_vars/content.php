<script type="text/javascript" src="/_js/jquery/summary.js"></script>
<?php
if(checkReport('3',$link)){
  if(!isset($_GET["step"])){$step=1;}
  if(isset($_GET["step"])){$step=$_GET["step"];}
  include($folder.'application/moduls/reports/summary/summary-'.$step.'.php');
}else{ ?>
    <p>����� ����������.</p> <p>�� �������� ��������� �������� �������� ����������� � ������������ ������� - ������� ��������:
            <br> �������: +7 (812) 740 18 11
            <br> email: <a href="mailto:tz@obzorzarplat.ru">tz@obzorzarplat.ru</a></p>
<?php } ?>