<input type="button" class="but" value="�������" onclick="self.location.href='?page=base'">
<input type="button" class="but" value="�������� �������" onclick="self.location.href='?page=jobs-new'">
<input type="button" class="but" value="������� ����������" onclick="del.submit();">

<?php
$buk = array(
2 => '�',3 => '�',4 => '�',
			5 => '�',
			6 => '�',
			7 => '�',
			8 => '�',
			9 => '�',
			10 => '�',
			11 => '�',
			12 => '�',
			13 => '�',
			14 => '�',
			15 => '�',
			16 => '�',
			17 => '�',
			18 => '�',
			19 => '�',
			20 => '�',
			21 => '�',
			22 => '�',
			23 => '�',
			24 => '�',
			25 => '�',
			26 => '�',
			27 => '�',
			28 => '�',
			29 => '�',
			30 => '�',
			31 => '�'
			)
?>

<script type="text/javascript">
$(document).ready(function(){
    $('#job_letters a').click(function(){
        $.ajax({
            url:'/_admin/pages/jobs-show.php',
            type:'post',
            datatype:'html',
            data:{buk:$(this).attr('id')},
            success:function(data){
                    //alert(data);
                    $('#jobs_list').html(data);
                },
            error:function(){
                    alert('error');
                    return false;
                }
        });
        return false;
    })

    $('#jtype').change(function(){
     $.ajax({
            url:'/_admin/pages/jobs-show.php',
            type:'post',
            datatype:'html',
            data:{jtype_id:$(this).val()},
            success:function(data){
                    //alert(data);
                    $('#jobs_list').html(data);
                },
            error:function(){
                    alert('error');
                    return false;
                }
        });
        return false;
    })
})
</script>

<p align="center" id="job_letters"><b>������ �� ��������: </b>
    <?php
for($jj=2; $jj<=count($buk); $jj++){
    echo('[<a href="#" id="'.$jj.'">'.$buk[$jj].'</a>]');
}
?>
</p>
<p align="center"><b>������ �� ����������� �������: </b>
    <select name="jtype" id="jtype">
    <?php
$jtype_q=mysqli_query($link,'select id,name from base_jtype order by name');
while($jtype=mysqli_fetch_object($jtype_q)){
    echo('<option value="'.$jtype->id.'">'.$jtype->name.'</option>');
}
?>
        </select>
</p>

<div id="jobs_list"></div>