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


$query="select SQL_CALC_FOUND_ROWS bp.id, bp.job_id, bp.official_salary, 
 bp.bonus, bp.compensation, bp.premium,
 DATE_FORMAT(bp.date, '%d-%m-%Y') as add_date, bj.name, bc.name as company_name 
 FROM base_people bp
 LEFT JOIN base_jobs bj on (bp.job_id = bj.id) 
 LEFT JOIN base_companies bc on (bp.company_id = bc.id) 
 order by bp.id desc $sLimit";
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
    $name_link='<a href="?page=people-red&id='.$row['id'].'">'.iconv('cp1251','utf-8',$row['name']).'</a>';
	$company_name = iconv('cp1251','utf-8',$row['company_name']);
    $output['aaData'][]=array($row['id'], $name_link, $company_name, $row['official_salary'], $row['bonus'], $row['compensation'], $row['premium'], $row['add_date']);
}
echo json_encode($output);
?>