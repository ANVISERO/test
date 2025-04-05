<?php
if($news_id==0){
    $news_q=mysqli_query($link,"SELECT id,zag,date FROM for_news WHERE status='1' AND category_id='4' order by date desc limit 5");
    while ($news = mysqli_fetch_object($news_q)) {
	 
	 if ($news->id == "1642") echo '<h2>'.$news->zag.'</h2>';
	  else echo '<h2>'.date('d.m.Y',  strtotime($news->date)).' '.$news->zag.'</h2>';
	  
        if(file_exists($folder.'_admin/elements/news/'.$news->id.'_an.txt')){
            echo implode("", file($folder.'_admin/elements/news/'.$news->id.'_an.txt'));
        }
        echo '<p align="right"><a href="/isl/salary/?id='.$news->id.'">подробнее</a></p>';

    }
}else{
    if(file_exists($folder.'_admin/elements/news/'.$news_id.'_op.txt')){
            echo implode("", file($folder.'_admin/elements/news/'.$news_id.'_op.txt'));
    }
    echo '<p align="right"><a href="/isl/salary/">Все обзоры заработных плат</a></p>';
} ?>