<div class="scoring_archive">
    <table class="standart">
<thead>
    <tr>
        <th>Дата</th>
        <th>Пользователь</th>
        <th>Должность заемщика</th>
        <th>Регион/город</th>
        <th>Подтвержденная заработная плата</th>
    </tr>
</thead>
<tbody>
<?php
$user_id=intval(mysqli_result(mysqli_query($link,"SELECT user_id from for_users_corporat_login where session_id = '".$_SESSION['user_number']. "' "),0,0));
$archive_q=mysqli_query($link,"select id,url,user_id,job_id,city_id,date,salary,score,percentile_90 from `zarplata_banks`.for_users_corporat_scoring_reports where user_id in(select user_id from `zarplata_banks`.for_users_corporat_scoring_supervisers WHERE superviser_id='$user_id') order by date desc, id desc");

while($archive=mysqli_fetch_object($archive_q))
{
  //название должности
    $job_title=mysqli_result(mysqli_query($link,"select name from base_jobs where id=".$archive->job_id),0,0);

  // название региона/города
    $city_title=mysqli_result(mysqli_query($link,"select name from base_regions where id=".$archive->city_id),0,0);

  //имя пользователя, сформировавшего отчет
    $user_name=mysqli_result(mysqli_query($link,"SELECT name from for_users_corporat WHERE id='".$archive->user_id."'"),0,0);


  //ЗП
    if($archive->score==true){
        $tr_class='confirm';
        $salary=$archive->salary;
    }else{
        $tr_class='decline';
        $salary=$archive->percentile_90;
    }
  
?>
<tr class="<?=$tr_class;?>" id="<?php echo $archive->id;?>">
<td><a href="/archive/view/?id=<?php echo $archive->url;?>" target="_blank"><?php echo date("d.m.Y H:i",strtotime($archive->date));?></a></td>
<td><a href="/archive/view/?id=<?php echo $archive->url;?>" target="_blank"><?php echo $user_name;?></a></td>
<td><a href="/archive/view/?id=<?php echo $archive->url;?>" target="_blank"><?php echo $job_title;?></a></td>
<td><a href="/archive/view/?id=<?php echo $archive->url;?>" target="_blank"><?php echo $city_title; ?></a></td>
<td><a href="/archive/view/?id=<?php echo $archive->url;?>" target="_blank"><?php echo number_format($salary,0,',',' '); ?></a></td>
</tr>
<?php
}
?>

</tbody>
</table>
</div>
<div style="clear:both;"></div>