<a href="" class="close black_to_red">������ ������������� ���� ������������ � ���� ������</a>
<div>
<p><a href="/preds/files/obzorzarplatSpheresList.pdf" target="_blank">������� ������ ������������� ���� ������������ � ������� pdf</a></p>
<ul>
<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);

$spheres_query=  mysqli_query($link,"SELECT id,name FROM base_sphere order by name");
while($sphere=mysqli_fetch_object($spheres_query)){ ?>
    <li><?php echo $sphere->name; ?></li>
<?php } ?>
</ul>
    </div>