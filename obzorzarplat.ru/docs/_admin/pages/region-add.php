<?php
header('Content-type:text/html, charset=windows-1251;');
$folder=$_SERVER['DOCUMENT_ROOT'].'/';
include($folder.'../cgi/sql/mysql.php');

$regionName=$_POST['regionName'];
$regionNameEng=$_POST['regionNameEng'];
$regionNamePartitive=$_POST['regionNamePartitive'];

/* database in cp1251 */
$regionNamecp1251=iconv('utf-8', 'Windows-1251',$regionName);
$regionNamePartitivecp1251=iconv('utf-8', 'Windows-1251',$regionNamePartitive);

/* check if region exists */
$region_exist=mysqli_num_rows(mysqli_query($link,"select id from base_regions where name='$regionNamecp1251'"));

/* insert new region, if it doesn't exist */
if($region_exist==0 && $regionName!=""){
    $newRegion=mysqli_query($link,"insert into base_regions (name,name_eng,name_partitive) values('$regionNamecp1251','$regionNameEng','$regionNamePartitivecp1251')");
    $newRegionId=mysql_insert_id();
?>
<option value="<?=$newRegionId;?>"><?=$regionName;?></option>
<? } ?>