<?php
$news_q=mysqli_query($link,"select id,date,zag from for_news WHERE category_id='2' order by date desc limit 1");
while ($news = mysqli_fetch_object($news_q)) {
    echo $news->date." <a href='/news/view/?id=".$news->id."'>".$news->zag."</a>";
}
?>