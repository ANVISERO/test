<?php
$comment_q=mysqli_query($link,"select id,user_id,comment,date FROM for_comments ORDER BY date desc limit 1");
while ($comment = mysqli_fetch_object($comment_q)) {
    $helper=new TextHelper($comment->comment);
    $user_q=mysqli_query($link,"SELECT name,fam,job,company,pic FROM for_users where id='".$comment->user_id."'");
    while ($user = mysqli_fetch_object($user_q)) {
        if($user->pic!=''){
            echo "<img class='image-left' src='".$user->pic."' />";
        }
        echo "<a href='/comments/?id=".$comment->id."'>".$helper->clean_text(30)."</a>";
        echo "<p align='right'><a href='/comments/?id=".$comment->id."'>подробнее</a></p>";
        echo "<p><i>".ucfirst($user->name)." ".ucfirst($user->fam)."</i>";
        if($user->job!=''){
            echo "<br>".  ucfirst($user->job);
        }

        if($user->company!=''){
            echo ", ".$user->company;
        }

        echo "</p>";
    }
}

?>
