<?php
$link = mysqli_connect($host,$user,$pass);
mysqli_select_db($link, $db);

$date_today=date("d-m-Y (H:i)");

//Создание страницы

//всего человек
$people_summ=0; //общее кол-во людей
$people_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_people"),0,0);
$comp_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_companies"),0,0);
$jobs_summ=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_jobs"),0,0);

$result=mysqli_query($link,"select id,name from base_sphere WHERE id in(select sphere_id from base_company_sphere) order by name");
while($row=mysqli_fetch_array($result)){
    $sphere_id=$row['id'];
    $tab4[$sphere_id]=mysqli_result(mysqli_query($link,"SELECT COUNT(*) FROM base_company_sphere where sphere_id='$sphere_id'"),0,0);
    $tab4[$sphere_id]=round((($tab4[$sphere_id]/$comp_summ)*100),2);
    $sphere_name[$sphere_id]=$row['name'].', '.$tab4[$sphere_id].'%';
}

$chd4=implode(',',$tab4);
$chl4=implode('%|', $tab4);
$chdl4=implode('|', array_reverse($sphere_name));

?>

<form action='https://chart.googleapis.com/chart' method='POST'>
  <input type="hidden" name="cht" value="bhs"  />
  <input type='hidden' name='chs' value='600x500' />
  <input type="hidden" name="chxt" value="x,y" />
  <input type="hidden" name="chxl" value="1:|<?php echo iconv('windows-1251','utf-8',$chdl4);?>" />
  <input type="hidden" name="chof" value="gif" />
  <input type="hidden" name="chbf" value="3,3" />
  <input type='hidden' name='chd' value='t:<?php echo $chd4;?>'/>
  <input type="submit"  />
</form>
