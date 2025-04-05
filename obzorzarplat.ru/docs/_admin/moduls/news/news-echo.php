<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);
$kov="'";
$col_topage=10;
if(!isset($_GET['page'])){$page=1;}
if(isset($_GET['page'])){$page=$_GET['page'];}
$col_elem=mysqli_num_rows(mysqli_query($link,"select * from for_news where status='1' and lang='0'"));
$col_page=ceil($col_elem/$col_topage);
$start_lim=($page-1)*$col_topage;
?>
<p align="right">стр.:
<?php
for($ii=1;$ii<=$col_page; $ii++){
    if($page==$ii){$cla=1;}
    if($page<>$ii){$cla=2;}
    echo('&nbsp;<input type="button" value="'.$ii.'" class=but_'.$cla.' onClick="self.location.href='.$kov.'?page='.$ii.$kov.'">');
}?>
</p><hr>

<?php
if($news_id==0){
    $news_q=mysqli_query($link,"SELECT id,zag,date FROM for_news WHERE status='1' order by date desc limit $start_lim,$col_topage");
    while ($news = mysqli_fetch_object($news_q)) {
        echo '<h2>'.date('d.m.Y',  strtotime($news->date)).' '.$news->zag.'</h2>';
        if(file_exists($folder.'_admin/elements/news/'.$news->id.'_an.txt')){
            echo implode("", file($folder.'_admin/elements/news/'.$news->id.'_an.txt'));
        }
        echo '<p align="right"><a href="/news/view/?id='.$news->id.'">подробнее</a></p>';

    }
}else{
    if(file_exists($folder.'_admin/elements/news/'.$news_id.'_op.txt')){
            echo implode("", file($folder.'_admin/elements/news/'.$news_id.'_op.txt'));
    }
    echo '<p align="right"><a href="/news/">Все новости</a></p>';
}
?>
<hr>
<p align="right">стр.:
<?php
for($ii=1;$ii<=$col_page; $ii++){
    if($page==$ii){$cla=1;}
    if($page<>$ii){$cla=2;}
    echo('&nbsp;<input type="button" value="'.$ii.'" class=but_'.$cla.' onClick="self.location.href='.$kov.'?page='.$ii.$kov.'">');
}?>
</p>