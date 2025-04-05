<?php
header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' ); 
header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' ); 
header( 'Cache-Control: no-store, no-cache, must-revalidate' ); 
header( 'Cache-Control: post-check=0, pre-check=0', false ); 
header( 'Pragma: no-cache' ); 
header('Content-Type: application/json;  charset=utf-8');

$folder=$_SERVER['DOCUMENT_ROOT'].'/';
include($folder.'../cgi/sql/mysql.php');
//include($folder.'../cgi/pages/companies-red/company_people_show.php');

/* 
* Paging
*/
$sLimit = "";
if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
	{
		$sLimit = "LIMIT ".intval( $_GET['iDisplayStart'] ).", ".
		intval( $_GET['iDisplayLength'] );
	}


$query="select SQL_CALC_FOUND_ROWS csr.id, csr.user_id, DATE_FORMAT(csr.date, '%d-%m-%Y %H:%m:%s') as report_date, csr.salary, csr.score, csr.percentile_90, bj.name as job_name, 
    br.name as city_name, fuc.company
 FROM zarplata_banks.for_users_corporat_scoring_reports csr
 LEFT JOIN for_users_corporat fuc on (csr.user_id = fuc.id)
 LEFT JOIN base_jobs bj on (csr.job_id = bj.id) 
 LEFT JOIN base_regions br on (csr.city_id = br.id) 
 order by csr.id desc $sLimit";
$result=mysqli_query($link,$query) or die(mysql_error());
$iTotal=mysqli_num_rows($result);

	$sQuery = "SELECT FOUND_ROWS()";
	$rResultFilterTotal = mysqli_query($link, $sQuery ) or die(mysql_error());
	$aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);
	$iFilteredTotal = $aResultFilterTotal[0];

$output=array(
	'sEcho' => intval($_GET['sEcho']),
	'iTotalRecords' => $iTotal,
	'iTotalDisplayRecords' => $iFilteredTotal,
    'aaData'=>array()
);

while($row = mysqli_fetch_array($result)){
    // $name_link='<a href="?page=people-red&id='.$row['id'].'">'.iconv('cp1251','utf-8',$row['name']).'</a>';
    $company_name = iconv('cp1251','utf-8',$row['company']);
    $job_name = iconv('cp1251','utf-8',$row['job_name']);
    $city_name = iconv('cp1251','utf-8',$row['city_name']);
    $score_result = ($row['score']) ? iconv('cp1251','utf-8', "Да") : iconv('cp1251','utf-8', "Нет");
    $output['aaData'][]=array($row['user_id'], $company_name, $job_name, $city_name, $row['salary'], $row['percentile_90'], $score_result, $row['report_date']);
}
echo json_encode($output);  
?>