<?php
if($survey_id!=0){
    $surveys_q = mysqli_query($link,"SELECT id, name, description,price,companies FROM for_surveys WHERE id='".$survey_id."' AND active = 1") or die(mysql_error()); 
    while ($survyes = mysqli_fetch_object($surveys_q)) {
        echo '<h2>'.$survyes->name.'</h2>';
        ?>
<h3><a class="h3-click">Описание исследования</a></h3>
<div class="body">
    <?php   echo $survyes->description; ?>
    <p align="right"><a href="#" class="div_body_close">Свернуть</a></p>
</div>

<h3><a class="h3-click">Обследованные должности</a></h3>
<div class="body">
    <ol>
    <?php
        $jobs_q=mysqli_query($link,"SELECT id,name FROM base_jobs WHERE id IN(
            SELECT job_id FROM for_survey_jobs WHERE survey_id='".$survyes->id."') order by name");
        while ($jobs = mysqli_fetch_object($jobs_q)) {
            echo '<li>'.$jobs->name.'</li>';
        }
    ?>
    </ol>
    <p align="right"><a href="#" class="div_body_close">Свернуть</a></p>
</div>

<h3><a class="h3-click">Регионы исследования</a></h3>
<div class="body">
    <ol>
    <?php
        $jobs_q=mysqli_query($link,"SELECT id,name FROM base_regions WHERE id IN(
            SELECT city_id FROM for_survey_cities WHERE survey_id='".$survyes->id."') order by name");
        while ($jobs = mysqli_fetch_object($jobs_q)) {
            echo '<li>'.$jobs->name.'</li>';
        }
    ?>
    </ol>
    <p align="right"><a href="#" class="div_body_close">Свернуть</a></p>
</div>

<h3><a class="h3-click">Характеристика компаний, участвовавших в исследовании</a></h3>
<div class="body">
    <?php echo $survyes->companies; ?>
    <p align="right"><a href="#" class="div_body_close">Свернуть</a></p>
</div>

<h3><a class="h3-click">Стоимость</a></h3>
<div class="body">
    <?php
    if($survyes->price>0){
    ?>
    <p>Стоимость исследования составляет <b><?php echo number_format($survyes->price,0,',',' '); ?> рублей.</b></p>
    <?php
    }else{
    ?>
    <p>Стоимость исследования на данный момент не определена.</p>
    <?php } ?>
    <p align="right"><a href="#" class="div_body_close">Свернуть</a></p>
</div>

<p align="right"><input type="button" class="submit" onclick="self.location.href='/contacts/';" value="Купить"></p>
<script type="text/javascript">
    $(document).ready(function(){
        $("#mainBody div.body:not(:first)").hide();
        $("#mainBody a.h3-click").click(function(){
            $(this).parent().next("div.body").slideToggle(400);
        })
        $("#mainBody a.div_body_close").click(function(){
            $(this).parent("p").parent("div.body").slideToggle(400);
            return false;
        })
    })
</script>
<?php
    }
}elseif($survey_type_id !=0 && $survey_id == 0){
    ?>
<p>Обзоры заработных плат, выполняемые компанией ООО «АНТ-Менеджмент», позволяют десяткам компаний следить
    за тенденциями на рынке труда и выстраивать свою компенсационную политику в соответствии с самыми
    актуальными сведениями.</p>
<p>Общеиндустриальный Обзор заработных плат проводится регулярно, начиная с 1996 года.</p>
<h2>Проведенные исследования:</h2>
<?php
    $survey_name=mysqli_result(mysqli_query($link,"SELECT name from for_survey_types WHERE id='$survey_type_id'"),0,0);

    //surveys list
    $surveys_q=mysqli_query($link,"SELECT id, name, date_finish FROM for_surveys WHERE active = '1' order by date_finish desc") or die(mysql_error());
    ?>
    <ol>
        <?php
        while ($surveys = mysqli_fetch_object($surveys_q)) {
            echo("<li><a href='?survey_type_id=$survey_type_id&id=$surveys->id' class='black_to_red'>$surveys->name</a></li>");
        }
        ?>
    </ol>
    <?php
}else{
    $surveys_types_q=mysqli_query($link,"select id, name FROM for_survey_types order by name");
    while ($surveys_types = mysqli_fetch_object($surveys_types_q)) {
        ?>
        <h2><?php echo $surveys_types->name; ?></h2>
        <?php
        //surveys list
        $surveys_q=mysqli_query($link,"SELECT id, name, date_finish FROM for_surveys order by date_finish desc");
    ?>
    <ol>
        <?php
        while ($surveys = mysqli_fetch_object($surveys_q)) {
            echo("<li><a href='?survey_type_id=$surveys_types->id&id=$surveys->id' class='black_to_red'>$surveys->name</a></li>");
        }
        ?>
    </ol>
        <?php
    }
}
?>