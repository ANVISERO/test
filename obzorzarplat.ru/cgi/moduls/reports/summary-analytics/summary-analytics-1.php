<?php
   $user_id=mysqli_result(mysqli_query($link,"SELECT user_id from for_users_corporat_login where session_id = '".$_SESSION['user_number']. "'"),0,0);
?>
<script type="text/javascript" src="/_js/jquery/summary.js"></script>
<h2>1. ����� ��������</h2>
<p>����������, �������� ���� �� ������������ ���� ��������:</p>
<form method='post' action="?step=2" name="step1" id="step1">

    <ul>
<?php
     $blocked_factor=mysqli_query($link,"select * from for_users_corporat_factors where user_id='".$user_id."' order by factor_id");

//���������� �� ��������� �������� ��� �������
if(mysqli_num_rows($blocked_factor)!==0){
    while($row=mysqli_fetch_object($blocked_factor)){
        $factor=  mysqli_fetch_object(mysqli_query($link,"SELECT id,name,value FROM base_factors WHERE id='".$row->factor_id."'"));
        if($factor->id!='1'){
            $factor_name="������ � ".$factor->name;
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
            $factor_name="������ � ".$factors->name;
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

<p><input type="checkbox" name="lists" id="lists"><label for="lists">������� ��� ��������� ��� ��������� �� �������</label></p>

<p align="right"><input type="button" id="select_jobs" value="������� ��������� &raquo;" class="submit"></p>


<!--   ����� ����������  -->

<h2>2. ����� ����������</h2>
<div id="jobs_div"><p>��� ��������� ������ ���������� ���������� ������� ������ ��� ������� � ������ �� ������ <b>������� ��������� &raquo;</b></p></div>

<!--   ����������� ������  -->
<h2>3. ������������ ������</h2>
<div id="summary_result">
    <p>��� ��������� ������ ���������� ������� ������ ��� ������� � ��������� ��������� �� ������ � ������ �� ������ <b>��������� ������ &raquo;</b></p>
    <p align="right"><input type="submit" value="��������� ������ &raquo;" class="submit"></p>
</div>

</form>