<?php
$id=intval($_POST['company_id']);
?>
<script type="text/javascript">
    $(document).ready(function(){

          $("#dateStart").datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: "yy-mm-dd"
  });
    $("#dateFinish").datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: "yy-mm-dd"
  });

        //������� ������ � �����
        $('#dataToArchive').submit(function(){
            $.ajax({
                type:'post',
                url:'/_admin/pages/companies-people-to-archive/',
                data:({dateStart:$('#dateStart').val(),dateFinish:$('#dateFinish').val(),company_id:'<?=$id?>'}),
                success:function(){alert('������ ���������� � �����')},
                error:function(){alert('��������� ������ =(')}
            })
            return false;
        })


        $('.rowEdit').live('click',function(){
            $.ajax({
                type:'post',
                data:{id:this.id},
                datatype:'html',
                url:'/_admin/pages/companies-people-show/',
                success:function(data){
                    $('#editedRowDiv').html(data),
                    $('#editedRowDiv').dialog('open')
                }
            })
            return false;
        })
    })
    </script>

<h3><a class="h3-click">�� - ����������</a></h3>
<div class="body">
    <form id="dataToArchive" action="">
        <p>����������� ������ � ����� � <input type="text" name="dateStart" id="dateStart" value=""> �� <input type="text" name="dateFinish" id="dateFinish" value=""></p>
        <p align="right"><input type="submit" value="����������� � �����" class="submit"></p>
    </form>

<table id="peopleSalary">
    <tr>
        <th>ID</th>
        <th width="40%">���������</th>
        <th>����������� �����</th>
        <th>����</th>
    </tr>
<?php
$people_q=mysqli_query($link,"select id,job_id,(official_salary+add_payment+bonus+compensation+premium) as salary,date from base_people WHERE company_id='$id' order by job_id");
while($people=  mysqli_fetch_object($people_q)){
    $job_name=mysqli_result(mysqli_query($link,"select name from base_jobs where id='$people->job_id'"),0,0);
    ?>
     <tr id="<?php echo $people->id; ?>">
        <td><?php echo $people->id; ?></td>
        <td><a href="" id="<?php echo $people->id; ?>" class="rowEdit"><?php echo $job_name; ?></a></td>
        <td><?php echo $people->salary; ?></td>
        <td><?php echo $people->date; ?></td>
    </tr>
    <?php
}
?>
</table>
    <p align="right"><a href="#" class="div_body_close">��������</a></p>
    </div>


