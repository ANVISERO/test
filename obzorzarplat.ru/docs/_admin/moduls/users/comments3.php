<style type="text/css">
    .userpic{padding:2px; margin:2px; float:left;}
    .user_comment{border-bottom:1px solid silver; margin-bottom:4px;}
    .user_comment p{padding:2px 0 2px 2px;}
    .user_name{font-style:italic; font-size:14px;}
    .date{font-size:13px;}
</style>

<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);
mysqli_query($link,"set names CP1251");

$comments_q=mysqli_query($link,"select * from for_comments where user_id in(select id from for_users where levelaccess=3) order by date DESC");
while($row=mysqli_fetch_array($comments_q))
{
    $user_q=mysqli_query($link,"select * from for_users where id=".$row["user_id"]);
    while($row1=mysqli_fetch_array($user_q))
    {
        $user_name=$row1["name"];
        $user_fam=$row1["fam"];
        $user_pic=$row1["pic"];
        $user_job=$row1["job"];
        $user_company=stripslashes($row1["company"]);
    }
    if($user_pic!='')
    {
        echo('
        <div class="userpic"><img src="'.$folder.$user_pic.'" border="0" alt="'.$user_name.' '.$user_fam.'" align="top"></div>
        ');
    }
    echo('
        <div class="user_comment">
        <p class="user_name"><b>'.$user_name.' '.$user_fam);
    if($user_job!='')
    {
        echo(', <br>'.$user_job);
    }
    echo(', '.$user_company.'
        </b></p>
        <p class="date">'.date("d.m.Y",strtotime($row["date"])).'</p>
        <p>'.$row["comment"].'</p>
        </div>
    ');
}

?>
