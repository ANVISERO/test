<?php
header("Content-Type: text/html; charset=windows-1251");

$jtype_id=intval($_GET['jtype_id']);

//��������� id ������������
$session_id=mysqli_real_escape_string($link,$_COOKIE["user_number"]);
$user_id=mysqli_result(mysqli_query($link,"SELECT user_id FROM for_users_corporat_login WHERE session_id='".$session_id."'"),0,0);

//���������, ���� �� ����������� �� ����������
$blocked=mysqli_num_rows(mysqli_query($link,"select id from for_users_corporat_jobs where user_id='".$user_id."'"));

if($blocked!==0){
    $q_job_block="AND id IN (SELECT job_id FROM for_users_corporat_jobs where user_id='".$user_id."')";
}
else{
    $q_job_block="";
}

$q_jobs=mysqli_query($link,"SELECT id,name from base_jobs WHERE id in (select job_id from base_job_types
where jtype_id='$jtype_id') AND id in (select distinct job_id FROM base_company_jobs) ".$q_job_block." order by name") or die(mysql_error());

//print_r($q_jobs);
//if ($user_id==1) {
//echo "SELECT id,name from base_jobs WHERE id in (select job_id from base_job_types
//where jtype_id='$jtype_id') AND id in (select distinct job_id FROM base_company_jobs) ".$q_job_block." order by name";
//}

// echo "SELECT id,name from base_jobs WHERE id in (select job_id from base_job_types
//where jtype_id='$jtype_id') AND id in (select distinct job_id FROM base_company_jobs) ".$q_job_block." order by name";

?>

<select name='job' class="text_1" id="job">

  <option value="">--- ������� ---</option>
  <?php
    while($row=mysqli_fetch_array($q_jobs)){
	  echo('<option value="'.$row["id"].'">'.$row["name"].'</option>');
    }
  ?>
  
</select>

<script type="text/javascript">
    $('#job').change(function(){
        $("#citydiv").empty().html("<img src=/_img/loader.gif> ��������...");
                    $.ajax({
                            url: "/work/scoring/findCities/",
                            data: {job_id:this.value},
                            dataType: "html",
                            success:function(data){
                                $("#citydiv").html(data)},
                            error: function(){alert("error")}
                            });
/*
                      $("#job_description_div").empty().html("<img src=/_img/loader.gif> ��������...");
                      $.ajax({
                          url: "/work/scoring/findJobDescription/",
                            data: {job_id:this.value},
                            dataType: "html",
                            success:function(data){
                                $("#job_description_div").html(data)},
                            error: function(){alert("error job description")}
                      })
                      */
    });
</script>