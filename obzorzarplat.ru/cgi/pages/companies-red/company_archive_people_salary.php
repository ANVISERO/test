<h3><a class="h3-click">ЗП - архив</a></h3>
<div class="body">
<table id="archivePeopleSalary">
    <tr>
        <th>ID</th>
        <th width="40%">Должность</th>
        <th>Компенсация труда</th>
        <th>Дата</th>
    </tr>
<?php
$id=intval($_POST['company_id']);
$people_q=mysqli_query($link,"select id,job_id,(official_salary+add_payment+bonus+compensation+premium) as salary,date from archive_people WHERE company_id='$id' order by job_id,date");
while($people=  mysqli_fetch_object($people_q)){
    $job_name=mysqli_result(mysqli_query($link,"select name from base_jobs where id='$people->job_id'"),0,0);
    ?>
     <tr id="<?=$people->id;?>">
        <td><?php echo $people->id; ?></td>
        <td><a href="" id="<?php echo $people->id; ?>" class="rowEditArchive"><?php echo $job_name; ?></a></td>
        <td><?php echo $people->salary; ?></td>
        <td><?php echo $people->date; ?></td>
    </tr>
    <?php
}
?>
</table>
    <p align="right"><a href="#" class="div_body_close">Свернуть</a></p>
    </div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.rowEditArchive').live('click',function(){
            $.ajax({
                type:'post',
                data:{id:this.id},
                datatype:'html',
                url:'/_admin/pages/companies-archive-people-show/',
                success:function(data){
                    $('#editedRowDiv').html(data),
                    $('#editedRowDiv').dialog('open')
                }
            })
            return false;
        })
    })
    </script>
