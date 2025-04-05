<script type="text/javascript" src="/_js/lists_4stat.js"></script>

<form action="?page=statistics-jobs&step=2" name="step1" method="post">
<h3>Города / регионы</h3>
<ul>
    <li><input type="checkbox" name="city[]" id="city_1" value="1">Санкт-Петербург</li>
    <li>-------------------------</li>
<?php
$cities_q=mysqli_query($link,"select id,name from base_regions order by name");
while($cities=mysqli_fetch_object($cities_q)){
    echo('<li><input type="checkbox" name="city[]" id="city_'.$cities->id.'" value="'.$cities->id.'">
                <label for="city_'.$cities->id.'">'.$cities->name.'</label></li>');
  }
?>
</ul>

<h3>Сферы деятельности</h3>
<ul>
<?php
$sphere_q=mysqli_query($link,"select id,name from base_sphere order by name");
while($spheres=mysqli_fetch_object($sphere_q)){
    echo('<li><input type="checkbox" name="sphere[]" id="sphere_'.$spheres->id.'" value="'.$spheres->id.'">
                <label for="sphere_'.$spheres->id.'">'.$spheres->name.'</label></li>');
  }
?>
</ul>

<h3>Должности</h3>
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
$q_jtype=mysqli_query($link,"SELECT id,name from base_jtype order by name");

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
