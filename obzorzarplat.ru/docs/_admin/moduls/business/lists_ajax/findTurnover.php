<a href="" class="close black_to_red">������ ���������� �������� �������� � ���� ������</a>
<div>
<p><a href="/preds/files/obzorzarplatTurnoverList.pdf" target="_blank">������� ������ ������������� ���� ������������ � ������� pdf</a></p>
<ul>
<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);

$turnover_query=  mysqli_query($link,"SELECT title FROM base_turnover order by id");
while($turnover=mysqli_fetch_object($turnover_query)){ ?>
    <li><?php echo $turnover->title; ?></li>
<?php } ?>
</ul>
    </div>