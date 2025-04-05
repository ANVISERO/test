<a href="" class="close black_to_red">Список должностей в базе данных</a>
<div>
<p><a href="/preds/files/obzorzarplatJobsList.pdf" target="_blank">Скачать список должностей в формате pdf</a></p>
<p><b>Список должностных групп:</b></p>
<ol id="jtypes">
<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);

$jtypes_query=  mysqli_query($link,"SELECT id,name FROM base_jtype order by name");
while($jtype=mysqli_fetch_object($jtypes_query)){ ?>
    <li>
        <div id="<?php echo $jtype->id; ?>">
            <p><a href="#" class="black open"><?php echo $jtype->name; ?></a></p>
            <div></div>
        </div>
    </li>
<?php } ?>
</ol>
</div>