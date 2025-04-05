<?php
header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' ); 
header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' ); 
header( 'Cache-Control: no-store, no-cache, must-revalidate' ); 
header( 'Cache-Control: post-check=0, pre-check=0', false ); 
header( 'Pragma: no-cache' ); 
header('Content-Type: application/json;  charset=utf-8');
$folder=$_SERVER['DOCUMENT_ROOT'].'/';
include($folder.'../cgi/sql/mysql.php');
include($folder.'../cgi/pages/companies-red/company_people_show.php');

if(isset($_GET['p'])){
    $page=intval($_GET['p']);
}else{
    $page=1;
}

//companies per page
$limit=20;
//first company in page
$start_company=($page-1)*$limit;

$query="select id,name,region_id from base_companies order by id desc limit $start_company,$limit";
$result=mysqli_query($link,$query);


/*OUTPUT*/

$iTotal=mysqli_num_rows($result);
$iFilteredTotal=10;

$output=array(
    'aaData'=>array()
);

while($row=mysqli_fetch_array($result)){
    $region_id=$row['region_id'];
    $region=mysqli_result(mysqli_query($link,"select name from base_regions where id='$region_id'"),0,0);
    $dateUpdate=mysqli_result(mysqli_query($link,"select max(date) from base_company_jobs where company_id='".$row['id']."'"),0,0);

    $name_link='<a href="?page=companies-red&id='.$row['id'].'">'.iconv('cp1251','utf-8',$row['name']).'</a>';
    $output['aaData'][]=array($row['id'],$name_link,iconv('cp1251','utf-8',$region),$dateUpdate);
}

echo json_encode($output);
?>