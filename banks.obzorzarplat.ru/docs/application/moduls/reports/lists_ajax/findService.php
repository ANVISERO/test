<?php
header("Content-Type: text/html; charset=windows-1251");

$jtype_id=intval($_GET['jtype_id']);

//вычисляем id пользователя
$session_id=mysqli_real_escape_string($link,$_COOKIE["user_number"]);
$user_id=mysqli_result(mysqli_query($link,"SELECT user_id FROM for_users_corporat_login WHERE session_id='".$session_id."'"),0,0);

//проверяем, есть ли ограничение по должностям
$blocked=mysqli_num_rows(mysqli_query($link,"select id from for_users_corporat_jobs where user_id='".$user_id."'"));

if($blocked!==0){
    $q_job_block="AND id IN(SELECT job_id FROM for_users_corporat_jobs where user_id='$user_id')";
}
else{
    $q_job_block="";
}
/*
$q_jobs=mysqli_query($link,"SELECT id,name from base_jobs WHERE id in(select job_id from base_job_types
where jtype_id='$jtype_id') AND id in(select distinct job_id FROM base_company_jobs) ".$q_job_block." order by name");
*/
$q_jobs=mysqli_query($link,"SELECT id, name from base_entrepreneur_services WHERE id in (select service_id from base_entrepreneur_service_jobs
 where job_id in (select job_id from base_job_types where jtype_id='$jtype_id') AND job_id in (select distinct job_id FROM base_company_jobs)
) ORDER BY name")
?>

<select name='job' class="text_1" id="job">

  <option value="">--- Выбрать ---</option>
  <?php
while($row=mysqli_fetch_array($q_jobs)){
  echo('
  <option value="'.$row["id"].'">'.$row["name"].'</option>
  ');
  }
  ?>
  
</select>

<script type="text/javascript">
    $('#job').change(function(){
        $("#citydiv").empty().html("<img src=/_img/loader.gif> Загрузка...");
                    $.ajax({
                            url: "/work/scoring/findCities/",
                            data: {job_id:this.value},
                            dataType: "html",
                            success:function(data){
                                $("#citydiv").html(data)},
                            error: function(){alert("error")}
                            });
/*
                      $("#job_description_div").empty().html("<img src=/_img/loader.gif> Загрузка...");
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