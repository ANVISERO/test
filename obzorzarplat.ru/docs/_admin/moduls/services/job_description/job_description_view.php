<?php
/***************************************************************************************************/
//Описание должности
if($lang==0){
$jobs=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,24);
$jobs_name=mysqli_result(mysqli_query($link,"select name from base_jobs where id='$jobs_id'"),0,0);
$jobs_other_name=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,3);
$jobs_conform=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,4);
$jobs_subordinate=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,5);
$jobs_purpose=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,6);
$jobs_mission=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,7);
$jobs_func=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,8);
$jobs_experience=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,9);

//echo('<center><h1 class="title">Должностная инструкция '.$jobs.'</h1></center>');
?>
<script type="text/javascript" src="/_js/jquery/services.js"></script>
<link rel="stylesheet" href="/_css/services/services.css" type="text/css">

<div id="jobs-description">
<ul id="links">
    <li><a href="#" class="tabs-1 active">По данным портала obzorzarplat.ru</a></li>
    <li><a href="#" class="tabs-2">ЕКТС</a></li>
</ul>
<div class="clearfloat"></div>
    <div class="tabs-1">
        <h2><?php echo($jobs_name);?></h2>
        <?php
        if($jobs_func==""){
  echo('<p>Описание должности уточняется. Приносим свои извинения за доставленные неудобства.</p>');
}else{
        ?>
<table width="100%" border="0" cellspacing="0" cellpadding="6" title="Должностная инструкция">
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Другие названия должности:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;<?php echo($jobs_other_name);?></td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Подчиняется:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;<?php echo($jobs_conform);?></td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Подчинённые:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;<?php echo($jobs_subordinate);?></td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Цель:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;<?php echo($jobs_purpose);?></td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Задачи:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;<?php echo($jobs_mission);?></td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Функции:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;<?php echo($jobs_func);?></td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top"><em><strong>Требования к опыту и квалификации:</strong></em></td>
    <td valign="top">&nbsp;<?php echo($jobs_experience);?></td>
  </tr>
</table>
        <?php } ?>
        </div>
    <div class="tabs-2">
        <h2><?php echo($jobs_name);?></h2>
        <?php
        $filefolder=$folder.'_admin/elements/job_description/';
        $job_description_ekts=implode("", file($filefolder.$jobs_id.'_ekts.txt'));
        if(isset($job_description_ekts)){echo($job_description_ekts);}
        ?>
    </div>
</div>
<?php

}

if($lang==1){
$jobs=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,13);
$jobs_other_name=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,14);
$jobs_conform=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,15);
$jobs_subordinate=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,16);
$jobs_purpose=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,17);
$jobs_mission=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,18);
$jobs_func=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,19);
$jobs_experience=mysqli_result(mysqli_query($link,"select * from base_jobs where id='$jobs_id'"),0,20);

if($jobs_func==""){
  echo('<p>Описание должности на английском языке разрабатывается. Приносим свои извинения.</p>');
}else{
?>
<script type="text/javascript" src="/_js/lib/jquery.listmenu-en.pack-1.1.js"></script>
<script type="text/javascript">
    $(function(){
$('#job_list_eng').listmenu();

$("#tabs").tabs();
    })
</script>
<ul id="job_list_eng" class="demo" style="visibility:hidden; display:none;">
    <?php
    $result=mysqli_query($link,"select * from base_jobs order by name_eng");
  while($row=mysqli_fetch_array($result))
    {
      echo('
      <li><a class="terms" href="/servis/job_description/view/?id='.$row['id'].'&lang=1">'.$row['name_eng'].'&raquo;</a></li>
      ');
    }
    ?>
</ul>
<br>
<p>Должностная инструкция на русском языке представлена
    <a href="/servis/job_description/view/?id=<?php echo($jobs_id);?>&lang=0" class="link_4">здесь &raquo;</a></p>
<div id="tabs">
            <ul style="height:33px;">
                <li><a href="#tabs-1">По данным портала obzorzarplat.ru</a></li>
                <li><a href="#tabs-2">Сторонние источники</a></li>
            </ul>
    <div id="tabs-1">
        <h2>Job Description of <?php echo($jobs);?></h2>
<table width="100%" border="0" cellspacing="0" cellpadding="6" title="Job Description">
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Other Job Title:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;<?php echo($jobs_other_name);?></td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Reports to:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;<?php echo($jobs_conform);?></td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Supervises:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;<?php echo($jobs_subordinate);?></td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Key  Objectives:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;<?php echo($jobs_purpose);?></td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Objects:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;<?php echo($jobs_mission);?></td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top" style="border-bottom:1px dashed #B1CBE4"><em><strong>Function:</strong></em></td>
    <td valign="top" style="border-bottom:1px dashed #B1CBE4">&nbsp;<?php echo($jobs_func);?></td>
  </tr>
  <tr>
    <td width="200" align="right" valign="top"><em><strong>Qualifications:</strong></em></td>
    <td valign="top">&nbsp;<?php echo($jobs_experience);?></td>
  </tr>
</table>
    </div>
    <div id="tabs-2">
    </div>
    </div>
<?php
}

}
?>
<p><em>Заработную плату по этой должности Вы можете посмотреть <a href="/services/express/">здесь &raquo;</a></em></p>

<p align="rifgt"><input type="button" onClick="self.location.href='/services/job_description/'" class="submit" value="&laquo; назад"></p>