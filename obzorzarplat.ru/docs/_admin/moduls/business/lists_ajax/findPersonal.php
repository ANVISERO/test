<a href="" class="close black_to_red">������ ���������� ���������� ������� � ����� �������� � ���� ������</a>
<div>
<p><a href="/preds/files/obzorzarplatPersonalList.pdf" target="_blank">������� c����� ���������� ���������� ������� � ����� �������� ������� pdf</a></p>
<ul>
<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);

$personal_query=  mysqli_query($link,"SELECT title FROM base_personal order by id");
while($personal=mysqli_fetch_object($personal_query)){ ?>
    <li><?php echo $personal->title; ?></li>
<?php } ?>
</ul>
    </div>