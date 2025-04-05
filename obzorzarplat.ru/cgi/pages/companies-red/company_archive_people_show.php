<?php
$people_id=intval($_POST['id']);

$people_q=mysqli_query($link,"select job_id,company_id,official_salary,add_payment,bonus,compensation,premium,premium_quarterly,premium_annual,date from archive_people WHERE id='$people_id'");
while($people=  mysqli_fetch_object($people_q)){
    $job_name=mysqli_result(mysqli_query($link,"select name from base_jobs where id='$people->job_id'"),0,0);
    ?>
<form id="peopleEdit" action="">
    <table>
        <tr>
            <td>ID</td>
            <td><?php echo $people_id; ?></td>
        </tr>
        <tr>
            <td>Должность</td>
            <td><?php echo $job_name; ?></td>
        </tr>
        <tr>
            <td>Оклад</td>
            <td><input type="text" id="official_salary" name="official_salary" value="<?php echo $people->official_salary; ?>" ></td>
        </tr>
        <tr>
            <td>Ежемесячная премия</td>
            <td><input type="text" id="premium" name="premium" value="<?php echo $people->premium; ?>" ></td>
        </tr>
        <tr>
            <td>Квартальная премия</td>
            <td><input type="text" id="premium_quarterly" name="premium_quarterly" value="<?php echo $people->premium_quarterly; ?>" ></td>
        </tr>
        <tr>
            <td>Годовая премия</td>
            <td><input type="text" id="premium_annual" name="premium_annual" value="<?php echo $people->premium_annual; ?>" ></td>
        </tr>
        <tr>
            <td>Надбавки</td>
            <td><input type="text" id="add_payment" name="add_payment" value="<?php echo $people->add_payment; ?>" ></td>
        </tr>
        <tr>
            <td>Компенсации</td>
            <td><input type="text" id="compensation" name="compensation" value="<?php echo $people->compensation; ?>" ></td>
        </tr>
        <tr>
            <td>Бонусы</td>
            <td><input type="text" id="bonus" name="bonus" value="<?php echo $people->bonus; ?>" ></td>
        </tr>
        <tr>
            <td>Дата обновления</td>
            <td><input type="text" id="date" name="date" value="<?php echo $people->date; ?>" ></td>
        </tr>
    </table>
    <p><input type="radio" name="toDo" value="save" checked>Сохранить изменения |
        <input type="radio" name="toDo" value="delete">Удалить</p>
    <p align="right"><input type="submit" value="Сохранить изменения" class="submit"></p>
</form>

<script type="text/javascript">
    $(document).ready(function(){
        $('#peopleEdit').submit(function(){
            $.ajax({
                type:'post',
                url:'/_admin/pages/companies-archive-people-save/',
                data:({id:'<?php echo $people_id;?>',
                    job_id:'<?=$people->job_id;?>',
                    company_id:'<?=$people->company_id;?>',
                    official_salary:$('#official_salary').val(),
                    premium:$('#premium').val(),
                    premium_quarterly:$('#premium_quarterly').val(),
                    premium_annual:$('#premium_annual').val(),
                    add_payment:$('#add_payment').val(),
                    compensation:$('#compensation').val(),
                    bonus:$('#bonus').val(),
                    date:$('#date').val(),
                    toDo:$('input[name="toDo"]:checked').val()
                }),
                success:function(){alert('Information saved'),
                $('#editedRowDiv').dialog('close')},
                error:function(){alert('Error occured')}

            })
            return false;
        })
    })
</script>
    <?php
}
?>