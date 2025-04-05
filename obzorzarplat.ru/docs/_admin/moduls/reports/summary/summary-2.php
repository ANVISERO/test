<style>
 .rshift { position:relative; left:35px; }
</style>


<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(isset($_POST["lists"])){$lists=$_POST["lists"];}else{$lists="off";}


$city_id=intval($_POST['city']);
$factor=$_POST['factor'];
$factor_prefix=$_POST['factor_prefix'];
$factor_id=$_POST['factor_id'];

$user_id=mysqli_result(mysqli_query($link,"SELECT id from for_users_corporat where id = ".$_SESSION['user_id']. " AND password = '".$_SESSION['psw']."' "),0,0);
$blocked=mysqli_num_rows(mysqli_query($link,"select * from for_users_corporat_jobs where user_id='".$user_id."'"));

switch($factor){
case "sp":
  if(!isset($_POST['factor_id'])){$factor_id=intval($_POST['sphere']);}

  $factor_name="Сфера деятельности компании:";
  $factor_value_name=mysqli_result(mysqli_query($link,"SELECT name FROM base_sphere where id='$factor_id'"),0,0);
  break;

case "s":
  if(!isset($_POST['factor_id'])){$factor_id=intval($_POST['staff']);}

  $factor_name="Штат компании:";
  $factor_value_name=mysqli_result(mysqli_query($link,"select title from base_personal where id='$factor_id'"),0,0);
  break;

case "t":
  if(!isset($_POST['factor_id'])){$factor_id=intval($_POST['turnover']);}

  $factor_name="Оборот компании (млн. руб. в год):";
  $factor_value_name=mysqli_result(mysqli_query($link,"SELECT title FROM base_turnover where id='$factor_id'"),0,0);

  break;

case "n":
    $factor_name="Фактор не имеет значения";
    $factor_value_name="";
    break;
}

if(isset($_POST['factor_id'])){$factor_id=$_POST['factor_id'];}

if($city_id==0){
  $city_q="";
  $city_name="Все города";
} else {
  $city_q="AND city_id='$city_id'";
  $city_name=mysqli_result(mysqli_query($link,"select name from base_regions where id='$city_id'"),0,0);
}


if($city_id==0){
  $city_q="";
} else {
  $city_q="AND city_id='$city_id'";
}

if($lists=="on"){
switch($factor){
case "sp":
  if(!isset($_POST['factor_id'])){$factor_id=intval($_POST['sphere']);}
  if($city_id==0){
    $q_factor="WHERE id IN (SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM base_company_jobs bcj
                      inner JOIN `base_company_sphere` bcs ON bcj.company_id = bcs.company_id
                      WHERE  bcs.sphere_id ='$factor_id'))";
    $q_factor_job="AND id IN (SELECT job_id FROM base_company_jobs bcj
                      inner JOIN `base_company_sphere` bcs ON bcj.company_id = bcs.company_id
                      WHERE  bcs.sphere_id ='$factor_id')";
  }else{
    $q_factor="WHERE id IN (SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM base_company_jobs bcj
                      inner JOIN `base_company_sphere` bcs ON bcj.company_id = bcs.company_id
                      WHERE  bcs.sphere_id ='$factor_id'
                      AND bcj.city_id='$city_id'))";
    $q_factor_job="AND id IN (SELECT job_id FROM base_company_jobs bcj
                      inner JOIN `base_company_sphere` bcs ON bcj.company_id = bcs.company_id
                      WHERE  bcs.sphere_id ='$factor_id'
                      AND bcj.city_id='$city_id')";
  }
  break;

case "s":
  if(!isset($_POST['factor_id'])){$factor_id=intval($_POST['staff']);}
  if($city_id==0){
    $q_factor="WHERE id IN (SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.personal_id ='$factor_id'))";
    $q_factor_job="AND id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.personal_id ='$factor_id')";
  }else{
    $q_factor="WHERE id IN (SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.personal_id ='$factor_id'
                      AND bc.region_id='$city_id'))";
    $q_factor_job="AND id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.personal_id ='$factor_id'
                      AND bc.region_id='$city_id')";
  }
  break;

case "t":
  if(!isset($_POST['factor_id'])){$factor_id=intval($_POST['turnover']);}
  if($city_id==0){
    $q_factor="WHERE id IN (SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.turnover_id ='$factor_id'))";
    $q_factor_job="AND id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.turnover_id ='$factor_id')";
  }else{
    $q_factor="WHERE id IN (SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.turnover_id ='$factor_id'
                      AND bc.region_id='$city_id'))";
    $q_factor_job="AND id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE  bc.turnover_id ='$factor_id'
                      AND bc.region_id='$city_id')";
  }
  break;

case "n":
  if($city_id==0){
    $q_factor="";
    $q_factor_job="";
  }else{
    $q_factor="WHERE id IN (SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE bc.region_id='$city_id'))";
    $q_factor_job="AND id IN (SELECT job_id FROM base_company_jobs bcj
                      LEFT JOIN `base_companies` bc ON bcj.company_id = bc.id
                      WHERE bc.region_id='$city_id')";
  }
  break;
}
}
//блокировка для пользователей Лайта
if($blocked!==0){
    $q_jtype_block="WHERE id IN(SELECT jtype_id FROM base_job_types
                      WHERE job_id IN (SELECT job_id FROM for_users_corporat_jobs where user_id='$user_id'))";
    $q_job_block="AND id IN(SELECT job_id FROM for_users_corporat_jobs where user_id='$user_id')";
}
else{
    $q_jtype_block="";
    $q_job_block="";
}


//$q_jtype=mysqli_query($link,"SELECT * from base_jtype ".$q_factor." order by name");
if($lists!=="on"){
    $q_jtype=mysqli_query($link,"SELECT * from base_jtype ".$q_jtype_block." order by name");
}
?>
<script type="text/javascript" src="/_js/lists_4summary_report.js"></script>

<p><span class="title_mini_others">1. <a href="#" onclick="return document.back.submit();">Выбор факторов &raquo;</a></span><span class="title_mini"> 2. Выбор должностей &raquo;</span><span class="title_mini_others"> 3. Отчет &raquo;</span></p>
<br>
<p>Город: <em><?php echo($city_name);?></em></p>
<p><?php echo($factor_name.' <em>'.$factor_value_name).'</em>';?></p>

<form method='post' action="?step=3" name="step2" onSubmit="return testform();">
<input type="hidden" name="factor" value="<?php echo($factor);?>">
<input type="hidden" name="factor_id" value="<?php echo($factor_id);?>">
<input type="hidden" name="factor_prefix" value="<?php echo($factor_prefix);?>">
<input type="hidden" name="city" value="<?php echo($city_id);?>">
<table width="100%" border="0" cellspacing="0" cellpadding="6"  style="border:0;">

<tr>
<td>
<?php
if($lists!=="on"){
?>
<div id="our_tree">
<ol>
<?php
while($out_jtype = mysqli_fetch_array($q_jtype))
{
$jtype_id=$out_jtype["id"];
echo('
<li>
<div id="'.$jtype_id.'">
<p><a onClick=\'getJobs("'.$jtype_id.'","'.$city_id.'","'.$factor.'","'.$factor_id.'","'.$user_id.'")\' class="lk3">'.$out_jtype["name"].'</a></p>
</div>
    <div id="'.$jtype_id.'loading" style="display:none; font-size:14px; color:gray;">
     <img src="/_img/loader.gif" width="20" height="20" align="absmiddle">&nbsp;Загрузка...
</div><!--/loading_block-->
</li>
');
}

?>
</ol>
</div>
    <?php } ?>

<?php
if($lists=="on"){
?>
    <script type="text/javascript">
        $(document).ready(
function(){
    $('#checkAllAuto').click(
   function()
   {
      $("INPUT[type='checkbox']").attr('checked', $('#checkAllAuto').is(':checked'));
   }
)
})
    </script>
    <p><input type="checkbox" name="checkAllAuto" id="checkAllAuto"/>Выбрать все</p>
<div class="rshift">
<?php
$q_jobs=mysqli_query($link,"select * from base_jobs where id in(select job_id from base_job_types) ".$q_job_block." ".$q_factor_job." order by name");

while($out_jobs = mysqli_fetch_array($q_jobs)){
$job_id=$out_jobs["id"];

echo('<input type="checkbox" name="job['.$job_id.']" id="'.$job_id.'" value="'.$job_id.'"><label for="'.$job_id.'">'.$out_jobs["name"].'</label><br>');
}
}

?>
    </div>
</td>
</tr>

</table>
</form>
<table width="100%" border="0">
  <tr>
    <td align="left" valign="top">
	<form name="back" action="?step=1" method="post">
	<input type="hidden" name="factor" value="<?php echo($factor);?>">
	<input type="hidden" name="city" value="<?php echo($city_id);?>">
        <input type="submit" value="&laquo; назад" class="but1">
	</form>
</td>
    <td align="right" valign="top"><input type="button" value="дальше &raquo;" class="but1" onClick="return document.step2.submit();"></td>
  </tr>
</table>