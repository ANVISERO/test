<input type="button" class="but" value="Возврат" onclick="self.location.href='?page=base'">
<input type="button" class="but" value="Добавить элемент" onclick="self.location.href='?page=jobs-new'">
<input type="button" class="but" value="Удалить отмеченные" onclick="del.submit();">

<?php
$buk = array(
2 => 'А',3 => 'Б',4 => 'В',
			5 => 'Г',
			6 => 'Д',
			7 => 'Е',
			8 => 'Ё',
			9 => 'Ж',
			10 => 'З',
			11 => 'И',
			12 => 'Й',
			13 => 'К',
			14 => 'Л',
			15 => 'М',
			16 => 'Н',
			17 => 'О',
			18 => 'П',
			19 => 'Р',
			20 => 'С',
			21 => 'Т',
			22 => 'У',
			23 => 'Ф',
			24 => 'Х',
			25 => 'Ц',
			26 => 'Ч',
			27 => 'Ш',
			28 => 'Щ',
			29 => 'Э',
			30 => 'Ю',
			31 => 'Я'
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

<p align="center" id="job_letters"><b>Искать по алфавиту: </b>
    <?php
for($jj=2; $jj<=count($buk); $jj++){
    echo('[<a href="#" id="'.$jj.'">'.$buk[$jj].'</a>]');
}
?>
</p>
<p align="center"><b>Искать по должностным группам: </b>
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