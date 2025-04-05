<a href="" class="close black_to_red">Список должностей в базе данных</a>
<div>
<p><a href="/preds/files/obzorzarplatCitiesList.pdf" target="_blank">Скачать список городов в формате pdf</a></p>
<ul>
<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);

$cities_query=  mysqli_query($link,"SELECT id,name FROM base_regions order by name");
while($city=mysqli_fetch_object($cities_query)){ ?>
    <li><?php echo $city->name; ?></li>
<?php } ?>
</ul>
    </div>