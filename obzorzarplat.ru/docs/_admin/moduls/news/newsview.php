<?php
if($news_id!=0){
    $description=$folder.'_admin/elements/news/'.$news_id.'_op.txt';

    if(file_exists($description)){
        include($description);
    }
?>
<p align="right"><a href='/news/'>Все новости</a></p>
<?php } ?>
