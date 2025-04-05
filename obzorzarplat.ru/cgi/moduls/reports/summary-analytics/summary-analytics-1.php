<?php
   $user_id=mysqli_result(mysqli_query($link,"SELECT user_id from for_users_corporat_login where session_id = '".$_SESSION['user_number']. "'"),0,0);
?>
<script type="text/javascript" src="/_js/jquery/summary.js"></script>
<h2>1. Выбор факторов</h2>
<p>Пожалуйста, выберите один из предложенных ниже факторов:</p>
<form method='post' action="?step=2" name="step1" id="step1">

    <ul>
<?php
     $blocked_factor=mysqli_query($link,"select * from for_users_corporat_factors where user_id='".$user_id."' order by factor_id");

//блокировка по доступным факторам для анализа
if(mysqli_num_rows($blocked_factor)!==0){
    while($row=mysqli_fetch_object($blocked_factor)){
        $factor=  mysqli_fetch_object(mysqli_query($link,"SELECT id,name,value FROM base_factors WHERE id='".$row->factor_id."'"));
        if($factor->id!='1'){
            $factor_name="Регион и ".$factor->name;
        }else{
            $factor_name=$factor->name;
        }
            echo "<li><input type='radio' name='factor' value='".$factor->value."' id='".$factor->value."'>
                <label for='".$factor->value."'>".$factor_name."</label></li>";
    }
}else{
    $factors_q=  mysqli_query($link,"SELECT id,name,value FROM base_factors order by id");
    while ($factors = mysqli_fetch_object($factors_q)) {
        if($factors->id!='1'){
            $factor_name="Регион и ".$factors->name;
        }else{
            $factor_name=$factors->name;
        }
        echo "<li><input type='radio' name='factor' value='".$factors->value."' id='".$factors->value."'>
                <label for='".$factors->value."'>".$factor_name."</label></li>";
    }
}
?>
</ul>

<div id="block"></div>

<p><input type="checkbox" name="lists" id="lists"><label for="lists">Вывести все должности без разбиения по группам</label></p>

<p align="right"><input type="button" id="select_jobs" value="Выбрать должности &raquo;" class="submit"></p>


<!--   Выбор должностей  -->

<h2>2. Выбор должностей</h2>
<div id="jobs_div"><p>Для получения списка должностей необходимо выбрать фактор для анализа и нажать на кнопку <b>Выбрать должности &raquo;</b></p></div>

<!--   Формировние отчета  -->
<h2>3. Формирование отчета</h2>
<div id="summary_result">
    <p>Для получения отчета необходимо выбрать фактор для анализа и доступные должности из списка и нажать на кнопку <b>Получение отчета &raquo;</b></p>
    <p align="right"><input type="submit" value="Получение отчета &raquo;" class="submit"></p>
</div>

</form>