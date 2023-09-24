<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require("../../../includes/connect.php");

function getGeneralMarket()
{
	$query = "SELECT id as gmid, genmarket FROM genmarket ORDER BY genmarket ASC";
	$result = mysqli_query($GLOBALS['con'], $query);
	if (!$result) {
	  die('Invalid query: ' . mysql_error());
	}
	$data = array();
	while ($row = @mysqli_fetch_assoc($result))
	{
		$data[] = $row;
	}
	return $data;
}

function getGeneralSubMarket(){
	//sice you get all market types here the best is to get all the data in once, then with js we can populate the next 
	//drop downs,this approach is faster than ajax and best for cases where table data are not much.
	$pstqry = "select id as sbmid, submarket, gmid  from submarket order by id ASC";
	 $result = mysqli_query($GLOBALS['con'], $pstqry);
	$subMarketArea = mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	return $subMarketArea;
}


function getPropertyType($filter=false)
{

	if(isset($_POST['filter']['method']) && isset($_POST['filter']['operator']) && isset($_POST['filter']['value'])){
		$filter = $_POST['filter'];
	}
	$filterSql = "";
	if($filter!==false){
		if($filter['method']!="" && $filter['operator']!="" && $filter['value']!=""){
			$filterSql = "WHERE ".$filter['method'].$filter['operator'].$filter['value'];
		}
	}

	$query = "SELECT id as ptid, propertytype, proptypedbname FROM propertytype ".$filterSql." ORDER BY propertytype ASC";
	$result = mysqli_query($GLOBALS['con'], $query);
	$propertyType = mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	return $propertyType;
}


function getPropertySubType(){
	//sice you get all property types here the best is to get all the data in once, then with js we can populate the next 
	//drop downs,this approach is faster tha najax and best for cases where table data are not much.
	$filterSql = "";
	if(isset($_POST['filter']['method']) && isset($_POST['filter']['operator']) && isset($_POST['filter']['value'])){
		if($_POST['filter']['method']!="" && $_POST['filter']['operator']!="" && $_POST['filter']['value']!=""){
			$filterSql = "WHERE ".$_POST['filter']['method'].$_POST['filter']['operator'].$_POST['filter']['value'];
		}
	}
	$pstqry = "SELECT id as ptsid, subtype,ptid,rid FROM subtype ".$filterSql." order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $pstqry);
	$subPropertyType = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $subPropertyType;
}

function getGrossLandBounds(){

	$pstqry = "select FORMAT(MAX(property.gross_land_sf),0) as gross_land_sf_max, FORMAT(MIN(property.gross_land_sf),0) as gross_land_sf_min, FORMAT(MAX(property.net_usable_sf),0) as net_usable_sf_max, FORMAT(MIN(property.net_usable_sf),0) as net_usable_sf_min, FORMAT(MAX(property.gross_land_acre),3) as gross_land_acre_max,FORMAT(MIN(property.gross_land_acre),3) as gross_land_acre_min,FORMAT(MAX(property.net_usable_acre),3) as net_usable_acre_max,FORMAT(MIN(property.net_usable_acre),3) as net_usable_acre_min,FORMAT(MAX(property.ground_lease),0) as ground_lease_max,FORMAT(MIN(property.ground_lease),0) as ground_lease_min FROM property ";
	$result = mysqli_query($GLOBALS['con'], $pstqry);
	$grossLandBounds = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $grossLandBounds;
}

function getGrossBuildingAreaBounds(){
	$pstqry = "select FORMAT(MAX(building.overall_gba),0) AS overall_gba_max,FORMAT(MIN(building.overall_gba),0) AS overall_gba_min,FORMAT(MAX(building.overall_nra),0) AS overall_nra_max,FORMAT(MIN(building.overall_nra),0) AS overall_nra_min,MIN(LEFT(building.year_built_search,4)) AS year_built_search_min,MAX(LEFT(building.year_built_search,4)) AS year_built_search_max FROM building ";
	$result = mysqli_query($GLOBALS['con'], $pstqry);
	$grossBuildingBounds = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $grossBuildingBounds;
}

function getTransactionBounds(){
	$pstqry = "select FORMAT(MAX(saletrans.sale_price),0) AS sale_price_max,FORMAT(MIN(saletrans.sale_price),0) AS sale_price_min,MAX(LEFT(saletrans.record_date,4)) AS record_date_max,MIN(LEFT(saletrans.record_date,4)) AS record_date_min,FORMAT(MAX(saletrans.adj_price_sf_gba),0) AS adj_price_sf_gba_max,FORMAT(MIN(saletrans.adj_price_sf_gba),0) AS adj_price_sf_gba_min,FORMAT(MAX(saletrans.cap_rate),0) AS cap_rate_max,FORMAT(MIN(saletrans.cap_rate),0) AS cap_rate_min,FORMAT(MAX(saletrans.adj_price_sf_net),0) AS adj_price_sf_net_max,FORMAT(MIN(saletrans.adj_price_sf_net),0) AS adj_price_sf_net_min,FORMAT(MAX(saletrans.list_price),0) AS list_price_max,FORMAT(MIN(saletrans.list_price),0) AS list_price_min  FROM saletrans ";
	$result = mysqli_query($GLOBALS['con'], $pstqry);
	$transactionBounds = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $transactionBounds;
}

function getDueDateBounds(){
	$rddqry = "select MAX(report.DueDate) AS DueDate_max,MIN(report.DueDate) AS DueDate_min FROM report where DueDate > '0000-00-00';";
	$result = mysqli_query($GLOBALS['con'], $rddqry);
	$DueDateBounds = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $DueDateBounds;
}

function getOccupancyTypes(){
	$sqry = "select id, definition from WFDictionary where category = 'occupancytype' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $sqry);
	$occupancyTypes = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $occupancyTypes;
}

function getGroundLeaseBounds(){
	$pstqry = "select FORMAT(MAX(groundlease.adj_price_sf_pad),0) AS adj_price_sf_pad_max,FORMAT(MIN(groundlease.adj_price_sf_pad),0) AS adj_price_sf_pad_min FROM groundlease ";
	$result = mysqli_query($GLOBALS['con'], $pstqry);
	$groundLeaseBounds = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $groundLeaseBounds;
}

function getLeaseTransactionBounds(){
	$pstqry = "select MAX(DATE_FORMAT(leasetrans.lease_start_date,'%c/%e/%Y')) AS lease_start_date_max,MIN(DATE_FORMAT(leasetrans.lease_start_date,'%c/%e/%Y')) AS lease_start_date_min,MAX(DATE_FORMAT(leasetrans.lease_end_date,'%c/%e/%Y')) AS lease_end_date_max,MIN(DATE_FORMAT(leasetrans.lease_end_date,'%c/%e/%Y')) AS lease_end_date_min,MAX(leasetrans.eff_rent_sf_yr) AS eff_rent_sf_yr_max,MIN(leasetrans.eff_rent_sf_yr) AS eff_rent_sf_yr_min,MAX(leasetrans.eff_rent_sf_mo_shell) AS eff_rent_sf_mo_shell_max,MIN(leasetrans.eff_rent_sf_mo_shell) AS eff_rent_sf_mo_shell_min,MAX(leasetrans.tenant_area_sf) AS tenant_sf_max,MIN(leasetrans.tenant_area_sf) AS tenant_sf_min FROM leasetrans ";
	$result = mysqli_query($GLOBALS['con'], $pstqry);
	$leaseTransBounds = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $leaseTransBounds;
}

function getLeaseOptions(){
	$pstqry = "select id, definition from WFDictionary where category = 'yesno' or id = 3 order by id DESC";
	$result = mysqli_query($GLOBALS['con'], $pstqry);
	$leaseOptions = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $leaseOptions;
}

function getLeaseNewRenewal(){
	$pstqry = "select id, definition from WFDictionary where category = 'newrenew' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $pstqry);
	$leaseNewRenewal = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $leaseNewRenewal;
}

function getLeaseSpacePosition(){
	$pstqry = "select id, definition from WFDictionary where category = 'spaceposition' or id = 3 order by id ASC";
	$result = mysqli_query($GLOBALS['con'], $pstqry);
	$leaseSpacePosition = mysqli_fetch_all($result,MYSQLI_ASSOC);

	return $leaseSpacePosition;
}


?>