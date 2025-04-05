<?php
header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' ); 
header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' ); 
header( 'Cache-Control: no-store, no-cache, must-revalidate' ); 
header( 'Cache-Control: post-check=0, pre-check=0', false ); 
header( 'Pragma: no-cache' ); 
header( 'Content-Type: application/json;  charset=utf-8' );

$folder=$_SERVER['DOCUMENT_ROOT'].'/';
include($folder.'../cgi/sql/mysql.php');
//include($folder.'../cgi/pages/companies-red/company_people_show.php');

	$aColumns = array( 'bc.id', 'bc.name', 'bc.region_id', 'bc.date' );
	
	/* Indexed column (used for fast and accurate table cardinality) */
	$sIndexColumn = "bc.id";
		
	$sTable = "base_companies bc";
	
	/* 
	 * Paging
	 */
	$sLimit = "";
	if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
	{
		$sLimit = "LIMIT ".intval( $_GET['iDisplayStart'] ).", ".
			intval( $_GET['iDisplayLength'] );
	}
	
	
	/*
	 * Ordering
	 */
	$sOrder = "";
	
	if ( isset( $_GET['iSortCol_0'] ) )
	{
		$sOrder = "ORDER BY  ";
		for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
		{
			if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
			{
				$sOrder .= " ".$aColumns[ intval( $_GET['iSortCol_'.$i] ) ]." ".
					($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
			}
		}
		
		$sOrder = substr_replace( $sOrder, "", -2 );
		if ( $sOrder == "ORDER BY" )
		{
			$sOrder = "";
		}
	}
	
	
	
	$sWhere = "";
	if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
	{
		$_GET['sSearch'] = iconv('utf-8', 'cp1251', $_GET['sSearch']);
		
		$sWhere = "WHERE (";
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ($aColumns[$i] != "bc.date") $sWhere .= " ".$aColumns[$i]."  LIKE '%".mysqli_real_escape_string($link, $_GET['sSearch'] )."%' COLLATE cp1251_general_ci OR ";
		}
		$sWhere = substr_replace( $sWhere, "", -3 );
		$sWhere .= ')';
	}
	
	/* Individual column filtering */
	for ( $i=0 ; $i<count($aColumns) ; $i++ )
	{
		if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
		{
			$_GET['sSearch'] = iconv('utf-8', 'cp1251', $_GET['sSearch']);
			if ( $sWhere == "" )
			{
				$sWhere = "WHERE ";
			}
			else
			{
				$sWhere .= " AND ";
			}
			if ($aColumns[$i] != "bc.date") $sWhere .= " ".$aColumns[$i]."  LIKE '%".mysqli_real_escape_string($link,$_GET['sSearch_'.$i])."%' COLLATE cp1251_general_ci ";
		}
	}
	
	
	/*
	 * SQL queries
	 * Get data to display
	 */
	$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS bc.id, bc.name, bc.region_id, br.name as region_name, DATE_FORMAT(bc.date, '%d-%m-%Y') as add_date 
		FROM base_companies bc LEFT JOIN base_regions br on (bc.region_id = br.id) 
		$sWhere
		$sOrder
		$sLimit
		
		";
		//echo $sQuery;
	$rResult = mysqli_query($link, $sQuery ) or die(mysql_error());
	
	/* Data set length after filtering */
	$sQuery = "SELECT FOUND_ROWS()";
	$rResultFilterTotal = mysqli_query($link, $sQuery ) or die(mysql_error());
	$aResultFilterTotal = mysqli_fetch_array($rResultFilterTotal);
	$iFilteredTotal = $aResultFilterTotal[0];
	
	/* Total data set length */
	$sQuery = "SELECT COUNT(".$sIndexColumn.") FROM   $sTable";
	$rResultTotal = mysqli_query($link, $sQuery ) or die(mysql_error());
	$aResultTotal = mysqli_fetch_array($rResultTotal);
	$iTotal = $aResultTotal[0];
	
	
	/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
	
	while ( $row = mysqli_fetch_array( $rResult ) )
	{
	    $name_link='<a href="?page=companies-red&id='.$row['id'].'">'.iconv('cp1251','utf-8',$row['name']).'</a>';
		$region_name = iconv('cp1251','utf-8',$row['region_name']);
    	$output['aaData'][]=array($row['id'], $name_link, $region_name, $row['add_date']);
	}
	
	echo json_encode( $output );
?>