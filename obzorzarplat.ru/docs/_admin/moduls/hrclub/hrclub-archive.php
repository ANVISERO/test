<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);

$date_now=date("Y-m-d");

$year=intval($_GET["year"]);
if($year=='0' ){
    ?>
 <ul class="big_links">
            <li><a href="/hrclub/meetings/?year=2010/">2010 год</a></li>
            <li><a href="/hrclub/meetings/?year=2009/">2009 год</a></li>
            <li><a href="/hrclub/meetings/?year=2008/">2008 год</a></li>
            <li><a href="/hrclub/meetings/?year=2007/">2007 год</a></li>
         </ul>
<?php
}else{

$meetings=mysqli_query($link,"select * from hrclub_meetings where date like '%$year%' AND date<'$date_now' order by date DESC");
while($row=mysqli_fetch_array($meetings)){
    $meeting_id=$row["id"];
    $title=$row["title"];
    $date=$row["date"];
    $anons=$row["anons"];
    $photoalbum_id=$row["photoalbum_id"];

list($year,$monthId,$day)=implode('[-,/,.]',$date);
$month=array('01'=>'€нвар€', '02'=>'феврал€', '03'=>'марта', '04'=>'апрел€', '05'=>'ма€', '06'=>'июн€', '07'=>'июл€', '08'=>'августа', '09'=>'сент€бр€', '10'=>'окт€бр€', '11'=>'но€бр€', '12'=>'декабр€');
$month_title=$month[$monthId];s
?>

<p><b><?php echo($day.' '.$month_title.' '.$year.'г.');?></b></p>

<a href="/hrclub/meetings/view/?id=<?php echo $meeting_id; ?>" class="title_h2"><?php echo($title);?></a>
<br>
<?php
if(isset($photoalbum_id) && $photoalbum_id!='0'){
$photoalbum_cover_preview=mysqli_result(mysqli_query($link,"SELECT link_preview from for_photo where album_id='$photoalbum_id' order by id limit 1"),0,0);
?>
<table border="0">
    <tr>
        <td><a href="/hrclub/meetings/view/?id=<?php echo $meeting_id; ?>">
                <img src="<?php echo $photoalbum_cover_preview; ?>" alt="<?php echo $title; ?>"></a></td>
        <td valign="top"><?php echo $anons;?></td>
    </tr>
</table>
<?php 
}else{echo $anons;}
?>

<p align="right"><a href="/hrclub/meetings/view/?id=<?php echo $meeting_id; ?>" class="lk3">подробнее &raquo;</a></p>
<hr>
<?php }
}
?>