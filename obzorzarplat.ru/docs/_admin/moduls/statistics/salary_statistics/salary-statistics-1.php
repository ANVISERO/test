<script type="text/javascript" src="/_js/lists_4stat.js"></script>
<script type="text/javascript" src="http://www.iknowkungfoo.com/elements/js/jquery/jquery-1.2.6.min.js"></script>

<form action="?page=statistics-jobs&step=2" name="step1" method="post">
<ol>
<?php
//user_id
$user_id=mysqli_result(mysqli_query($link,"SELECT id from for_users_corporat where id = ".$_SESSION['admin_user_id']. " AND password = '".$_SESSION['admin_psw']."' AND levelaccess='1' "),0,0);

//cities
/*
while($cities=mysqli_fetch_array(mysqli_query($link,"select id from base_regions"))){
    $city_id=$cities["id"];
}
*/
$city_id_string='';

// all job_types
$q_jtype=mysqli_query($link,"SELECT * from base_jtype order by name");

while($out_jtype = mysqli_fetch_array($q_jtype)){
    $jtype_id=$out_jtype["id"];
    echo('
<li>
<div id="'.$jtype_id.'">
<p><a onClick=\'getJobs("'.$jtype_id.'","'.$city_id_string.'","n","'.$user_id.'","'.$jtype_id.'")\' class="lk3">'.$out_jtype["name"].'</a></p>
</div>
    <div id="'.$jtype_id.'loading" style="display:none; font-size:14px; color:gray;">
     <img src="/_img/loader.gif" width="20" height="20" align="absmiddle">&nbsp;Загрузка...
</div><!--/loading_block-->
</li>
');
}

?>
</ol>
    <input type="submit" value="Дальше &raquo;" class="submit">
</form>
