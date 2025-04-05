<?php
   $user_id=$user=mysqli_result(mysqli_query($link,"SELECT id from for_users_corporat where id = ".$_SESSION['user_id']. " AND password = '".$_SESSION['psw']."' "),0,0);
?>
<script type="text/javascript" src="/_js/lists_4summary_report.js"></script>

<p><span class="title_mini">1. Выбор факторов &raquo;</span><span class="title_mini_others"> 2. Выбор должностей &raquo;</span><span class="title_mini_others"> 3. Отчет &raquo;</span></p>


<form method='post' action="?step=2" name="step1" onSubmit="return testform();">

    <p>
<?php
     $blocked_factor=mysqli_query($link,"select * from for_users_corporat_factors where user_id='".$user_id."'");

//блокировка для пользователей Лайта
if(mysqli_num_rows($blocked_factor)!==0){
    while($row=mysqli_fetch_array($blocked_factor)){
switch($row["factor_id"]){
      case "1":
          ?>
        <input type="radio" name="factor" value="n" id="n" checked onclick="loadBlock(this.value,<?php echo($user_id); ?>)"><label for="n" >Выбор региона</label><br>
        <?php
        break;
      case "2":
          ?>
        <input type="radio" name="factor" value="sp" id="sp" onclick="loadBlock(this.value,<?php echo($user_id); ?>)"><label for="sp">Сфера деятельности компании</label><br>
        <?php
        break;
      case "3":
          ?>
        <input type="radio" name="factor" value="t" id="t" onclick="loadBlock(this.value,<?php echo($user_id); ?>)"><label for="t">Оборот компании, млн. рублей в год</label><br>
          <?php
        break;
     case "4":
         ?>
        <input type="radio" name="factor" value="s" id="s" onclick="loadBlock(this.value,<?php echo($user_id); ?>)"><label for="s">Штат компании</label><br>
        <?php
        break;
}
    }
}
else{
    ?>
<input type="radio" name="factor" value="n" id="n" checked onclick="loadBlock(this.value,<?php echo($user_id); ?>)"><label for="n" >Выбор региона</label><br>
<input type="radio" name="factor" value="sp" id="sp" onclick="loadBlock(this.value,<?php echo($user_id); ?>)"><label for="sp">Сфера деятельности компании</label><br>
<input type="radio" name="factor" value="t" id="t" onclick="loadBlock(this.value,<?php echo($user_id); ?>)"><label for="t">Оборот компании, млн. рублей в год</label><br>
<input type="radio" name="factor" value="s" id="s" onclick="loadBlock(this.value,<?php echo($user_id); ?>)"><label for="s">Штат компании</label><br>

        <?php
}
?>
</p>
<br>

<div id="block" align="center">
    <table border="0" cellspacing="0" cellpadding="6">

<!--Город -->
<tr>
    <td align="right" width="30%">Город</td>
<td align="left">

<ul>

<?php
//проверяем, есть ли ограничение по должностям
$user=mysqli_query($link,"SELECT * from for_users_corporat where id = '".$_SESSION['user_id']. "' AND password = '".$_SESSION['psw']."' ");

if(mysqli_num_rows($user)=='1'){
$blocked_q=mysqli_query($link,"select city_id from for_users_corporat_cities where user_id='".$user_id."'");

//блокировка
if(mysqli_num_rows($blocked_q)!==0){
    while($row=mysqli_fetch_array($blocked_q)){
        $city_id[]=$row["city_id"];
    }
    $city_id_list=implode(',',$city_id);
    $q_block="AND id in(".$city_id_list.")";
}
else{
    $q_block="";
}

$q_city=mysqli_query($link,"SELECT * FROM base_regions where 1 ".$q_block." order by name");

$ch="";
while($out_city = mysqli_fetch_array($q_city)){
    if(($city_id<>'') and ($city_id==$out_city["id"])){$ch="checked";}
    echo('<li><input type="checkbox" name="city['.$out_city["id"].']" value="'.$out_city["id"].'" id="'.$out_city["id"].'" '.$ch.'><label for="'.$out_city["id"].'">'.$out_city["name"].'</label></li>');
    $ch="";
}

}
?>
</ul></td>
</tr>
</table>
<input type="hidden" name="factor_prefix" value="n">

    </div><!--/block-->

    <div id="loading_block" style="display:none; font-size:14px; color:gray;" align="center">
     <img src="/_img/loader.gif" width="20" height="20" align="absmiddle">&nbsp;Загрузка...
</div><!--/loading_block-->

<p align="right"><input type="submit" value="дальше &raquo;" class="but1"></p>

<p><input type="checkbox" name="lists" id="lists">Выводить по алфавиту без разбиения по группам</p>
</form>