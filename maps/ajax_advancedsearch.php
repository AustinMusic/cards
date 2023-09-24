<?php
/* setting headers */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_time_limit(120);
ini_set('memory_limit','512M');
ini_set('max_execution_time',60);
require("../../../includes/connectPDO.php");

define("REPORT_TABLE","report",false);
define("PROPERTY_TABLE","property",false);
define("SALES_TRANSACTIONS_TABLE","saletrans",false);
define("BUILDING_TABLE","building",false);
define("PROPERTYTYPE_TABLE","propertytype",false);
define("PROPERTYSUBTYPE_TABLE","subtype",false);
define("GENERAL_MARKET_TABLE","genmarket",false);
define("WFUSERS_TABLE","appraisers",false);
define("APPRAISALS_TABLE","appraisalinfo",false);
define("CLIENTS_TABLE","clients",false);
define("GROUND_LEASE_TABLE","groundlease",false);
define("LAND","resland",false);
define("TEMPLATES_TABLE","templates",false);
define("WFDICTIONARY_TABLE","WFDictionary",false);
define("LEASES_TRANSACTIONS_TABLE","leasetrans",false);
define("SUBMARKET_TABLE","submarket",false);
define("PROPERTYTYPE_DETAILS_TABLE","proptypedetails",false);
define("REPORT_TYPE","ReportType",false);

$limit_sql ="";
$search_sql = array();
$search_sql_debug = array();

$search_sql_stmt = "";
$tables_sql = array();
$tables_sql_stmt = "";
$addtable_sql = array();
$addtable_sql_stm = "";
$sql_groupby = "";
$orderBy_stmt = "";
$sql_fields = array();
$sql_fields_stmt = "";

if(isset($_POST['sq'])){
	$qInput = json_decode($_POST['sq'],true);
	
	//print_r($qInput);
	$tables = array();
	$fields = array();
	$conditions = array();
	$ckeys = array_keys($qInput);
	$search_sql_stmt = "";
	$reportTypeID = array();
	for($k=0;$k<count($ckeys);$k++){
		$condition = "";
		$skeys = array_keys($qInput[$ckeys[$k]]['criteria']);
		$_search_sql = array();
		//$extraRange = count($skeys);
		
		for($s=0;$s<count($skeys);$s++){
			if(!in_array($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['table'],$tables)){
				$tables[] = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['table'];
			}
			$fields[] = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['table'].".".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName'];
			if($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']=="FK_ReportTypeID"){
				$reportTypeID = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']];
			}

			// if($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['data-type']=="dropdownvarchar"){
				// echo "HERE";
				// die();
			// }else{
				$operator = "=";
				if($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['operator']!="0" && $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['operator']!=""){
					$operator = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['operator'];
				}
				if(is_array($qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']])){
					
					if($operator=="between"){
						$condition = "(".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['table'].".".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName'].">=:".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_1";
						$condition.=" AND ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['table'].".".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."<=:".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_2)";
					}elseif(strtolower($operator)=="in"){
						$condition = array();
						for($o=0;$o<count($qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]);$o++){
							$condition[] = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['table'].".".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."=:".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$o;
						}
						$condition = "(".implode(" OR ",$condition).")";
					}elseif(strtolower($operator)=="not in"){
						$condition = array();
						for($o=0;$o<count($qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]);$o++){
							$condition[] = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['table'].".".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."!=:".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$o;
						}
						$condition = "(".implode(" AND ",$condition).")";
					}elseif(strtolower($operator)=="vin"){
						$condition = array();
						for($o=0;$o<count($qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]);$o++){
							$condition[] = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['table'].".".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']." LIKE :".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$o;
						}
						$condition = "(".implode(" OR ",$condition).")";
					}else{
						$condition = array();
						for($o=0;$o<count($qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]);$o++){
							$condition[] = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['table'].".".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']." NOT LIKE :".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$o;
						}
						$condition = "(".implode(" AND ",$condition).")";
					}
					//$extraRange++;
				}else{
					$condition = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['table'].".".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName'].$operator.":".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s;
				}
			// }
			
			
			//$condition_debug = $qInput[$ckeys[$k]][$skeys[$s]]['table'].".".$qInput[$ckeys[$k]][$skeys[$s]]['fieldName']."=".$qInput[$ckeys[$k]][$skeys[$s]][$qInput[$ckeys[$k]][$skeys[$s]]['fieldName']];
			//$search_sql_stmt.= $condition;
			if($s<(count($skeys)-1)){
				$condition.=" ".strtoupper($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['condition'])." ";
			}
			$_search_sql[] = $condition;
		}
		
		$search_sql[$k] = "(".implode(" ",$_search_sql).")";
		if($k<(count($ckeys)-1)){
			$search_sql[$k].=" ".strtoupper($qInput[$ckeys[$k]]['condition']);
		}
		//echo $sQuery."<br/>";
	}

	/*the required fields that we want to retreive fro mthe sql query*/
	$sql_fields[] = REPORT_TABLE.".id";
	$sql_fields[] = REPORT_TABLE.".reportname";
	$sql_fields[] = "DATE_FORMAT(".REPORT_TABLE.".DueDate,'%M %e %Y') AS DueDate";
	$sql_fields[] = "DATE_FORMAT(".REPORT_TABLE.".DateCreated,'%M %e %Y') AS DateCreated";
	
	$sql_fields[] = PROPERTY_TABLE.".lat";
	$sql_fields[] = PROPERTY_TABLE.".lng";
	$sql_fields[] = PROPERTY_TABLE.".property_name";
	$sql_fields[] = "CONCAT(".PROPERTY_TABLE.".streetnumber,' ',".PROPERTY_TABLE.".streetname) AS address";
	$sql_fields[] = PROPERTY_TABLE.".city";
	$sql_fields[] = PROPERTY_TABLE.".zip_code";
	$sql_fields[] = PROPERTY_TABLE.".state";
	$sql_fields[] = PROPERTY_TABLE.".county";
	//$sql_fields[] = PROPERTY_TABLE.".submarket";
	$sql_fields[] = "if(".PROPERTY_TABLE.".photo1 = '','no-photo.jpg',CONCAT(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".photo1)) AS photo1";
	$sql_fields[] = "if(".PROPERTY_TABLE.".thumbnail = '','no-photo-tn.jpg',CONCAT(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".thumbnail)) AS thumbnail";
	$sql_fields[] = PROPERTY_TABLE.".zoning_code";
	$sql_fields[] = PROPERTY_TABLE.".propertysubtype AS ptsid";// as ptsid
	$sql_fields[] = PROPERTY_TABLE.".submarkid AS sbmid";
	$sql_fields[] = PROPERTY_TABLE.".propertytype AS ptid";// AS propertytypeid
	$sql_fields[] = PROPERTY_TABLE.".genmarket AS gmid";
			

	$sql_fields[] = "FORMAT(".PROPERTY_TABLE.".gross_land_sf,0) as gross_land_sf";
	$sql_fields[] = "DATE_FORMAT(".REPORT_TABLE.".DateCreated,'%m/%d/%Y') AS DateCreated";
	$sql_fields[] = PROPERTYTYPE_TABLE.".propertytype";
	$sql_fields[] = PROPERTYSUBTYPE_TABLE.".subtype";
	
	$sql_fields[] = SUBMARKET_TABLE.".submarket AS submarket";
	switch(intval($reportTypeID[0])){
		case 1:							
			$sql_fields[] = APPRAISALS_TABLE.".client_name";
			
		break;
		case 2:
			$sql_fields[] = TEMPLATES_TABLE.".templatepath";
				
			$sql_fields[] = "FORMAT(".BUILDING_TABLE.".overall_gba,0) AS overall_gba";
			
			$sql_fields[] = "DATE_FORMAT(".SALES_TRANSACTIONS_TABLE.".record_date,'%c/%e/%Y') AS record_date";
			$sql_fields[] = "CONCAT('$', FORMAT(".SALES_TRANSACTIONS_TABLE.".sale_price,0)) AS sale_price";
			$sql_fields[] = "CONCAT(".SALES_TRANSACTIONS_TABLE.".adj_price_sf_gba,2) AS adj_price_sf_gba";
			$sql_fields[] = "CONCAT('$',FORMAT(".SALES_TRANSACTIONS_TABLE.".eff_sale_price_stab, 0)) as eff_sale_price_stab";
			$sql_fields[] = "IF (".SALES_TRANSACTIONS_TABLE.".cap_rate='0.00','---',CONCAT(FORMAT(".SALES_TRANSACTIONS_TABLE.".cap_rate, 2),' %')) AS cap_rate";
			$sql_fields[] = "CONCAT('$', FORMAT(".SALES_TRANSACTIONS_TABLE.".alloc_imp_value_sf_nra, 2)) as alloc_imp_value_sf_nra";
			$sql_fields[] = "CONCAT('$', FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_sf_nra, 2)) as adj_price_sf_nra";
			$sql_fields[] = "CONCAT('$', FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_unit, 0)) as adj_price_unit";
	
			$sql_fields[] = PROPERTYTYPE_TABLE.".propertytype AS property_type";
			$sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".site_cover_primary, 1),' %') as site_cover_primary";
			$sql_fields[] = BUILDING_TABLE.".parking_ratio";
			$sql_fields[] = BUILDING_TABLE.".const_descr";
			$sql_fields[] = BUILDING_TABLE.".no_stories";
			$sql_fields[] = BUILDING_TABLE.".year_built";
			$sql_fields[] = BUILDING_TABLE.".last_renovation";			

			$sql_fields[] = "CONCAT(FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".ind_pct_office, 1),' %') as ind_pct_office";
			
			$sql_fields[] = "if(".SALES_TRANSACTIONS_TABLE.".sale_status = 3,'',".WFDICTIONARY_TABLE.".definition) AS sale_status";
			
		break;
		case 3:
			$sql_fields[] = TEMPLATES_TABLE.".templatepath";
				
			$sql_fields[] = "FORMAT(".BUILDING_TABLE.".overall_gba,0) AS overall_gba";
			$sql_fields[] = BUILDING_TABLE.".no_building";
			$sql_fields[] = BUILDING_TABLE.".const_descr";
			$sql_fields[] = BUILDING_TABLE.".year_built_search";
			$sql_fields[] = BUILDING_TABLE.".year_built";
			$sql_fields[] = BUILDING_TABLE.".last_renovation";	
			
			$sql_fields[] = "FORMAT(".LEASES_TRANSACTIONS_TABLE.".tenant_area_sf,0) AS tenant_area_sf";
			$sql_fields[] = LEASES_TRANSACTIONS_TABLE.".lessee_name";
			$sql_fields[] = "DATE_FORMAT(".LEASES_TRANSACTIONS_TABLE.".lease_start_date,'%c/%e/%Y') AS lease_start_date";
			$sql_fields[] = LEASES_TRANSACTIONS_TABLE.".lease_esc_terms_desc";
			$sql_fields[] = "CONCAT('$',FORMAT(".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_yr,2)) AS eff_rent_sf_yr";
			$sql_fields[] = "CONCAT('$',FORMAT(".LEASES_TRANSACTIONS_TABLE.".init_rent_sf_yr,2)) AS init_rent_sf_yr";
			
			$sql_fields[] = "if(".LEASES_TRANSACTIONS_TABLE.".lease_expense_term = 3,'',".WFDICTIONARY_TABLE.".definition) AS lease_expense_term";

			$sql_fields[] = "CONCAT('$', FORMAT(".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_mo_shell,3)) as eff_rent_sf_mo_shell";
			$sql_fields[] = "CONCAT('$', FORMAT(".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_mo_office,3)) as eff_rent_sf_mo_office";
			$sql_fields[] = "CONCAT('$', FORMAT(".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_mo_blend,3)) as eff_rent_sf_mo_blend";
		break;
		case 4:
			$sql_fields[] = TEMPLATES_TABLE.".templatepath";
				
			$sql_fields[] = "CONCAT('$',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_sf_net,2)) AS adj_price_sf_net";
			$sql_fields[] = "CONCAT('$',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_sf_far,0)) AS adj_price_sf_far";
			$sql_fields[] = "CONCAT('$',FORMAT(".SALES_TRANSACTIONS_TABLE.".sale_price,0)) AS sale_price";
			$sql_fields[] = "CONCAT('$',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_acre_net,0)) AS adj_price_acre_net";
			$sql_fields[] = "DATE_FORMAT(".SALES_TRANSACTIONS_TABLE.".record_date,'%c/%e/%Y') AS record_date";
			
			
			$sql_fields[] = PROPERTY_TABLE.".net_usable_acre";
			$sql_fields[] = "FORMAT(".PROPERTY_TABLE.".net_usable_sf,0) AS net_usable_sf";
			$sql_fields[] = "FORMAT(".PROPERTY_TABLE.".gross_land_sf,0) AS gross_land_sf";
			
			$sql_fields[] = "if(".SALES_TRANSACTIONS_TABLE.".sale_status = 3,'',".WFDICTIONARY_TABLE.".definition) AS sale_status";

			$sql_fields[] = PROPERTYTYPE_TABLE.".propertytype AS property_type";

			$sql_fields[] = "CONCAT('$',FORMAT(".LAND.".bulk_price_lot,2)) AS bulk_price_lot";
			$sql_fields[] = LAND.".unit_density_net_acre";
			$sql_fields[] = LAND.".finish_lot_size_sf";
		break;
	}

	$sql_fields[] = "CONCAT(".WFUSERS_TABLE.".firstname,' ' ,".WFUSERS_TABLE.".lastname) AS AssignedTo";
	
	/*building table joins*/
	$tables_sql[] = REPORT_TABLE;
	$tables_sql[] = ' LEFT JOIN '.PROPERTY_TABLE.' ON '.REPORT_TABLE.'.id='.PROPERTY_TABLE.'.FK_ReportID';

	$tables_sql[] = ' LEFT JOIN '.PROPERTYTYPE_TABLE.' ON '.PROPERTY_TABLE.'.propertytype='.PROPERTYTYPE_TABLE.'.id';
	$tables_sql[] = ' LEFT JOIN '.PROPERTYSUBTYPE_TABLE.' ON '.PROPERTY_TABLE.'.propertysubtype='.PROPERTYSUBTYPE_TABLE.'.id';
	$tables_sql[] = ' LEFT JOIN '.SUBMARKET_TABLE.' ON '.SUBMARKET_TABLE.'.id='.PROPERTY_TABLE.'.submarkid';
	switch(intval($reportTypeID[0])){
		case 1:
			$tables_sql[] = ' LEFT JOIN '.APPRAISALS_TABLE.' ON '.REPORT_TABLE.'.id='.APPRAISALS_TABLE.'.FK_ReportID';
			$tables_sql[] = ' LEFT JOIN '.BUILDING_TABLE.' ON '.REPORT_TABLE.'.id='.BUILDING_TABLE.'.FK_ReportID';
			$tables_sql[] = ' LEFT JOIN '.PROPERTYTYPE_DETAILS_TABLE.' ON '.PROPERTYTYPE_DETAILS_TABLE.'.FK_ReportID='.REPORT_TABLE.'.id';
		break;
		case 2:
			$tables_sql[] = ' LEFT JOIN '.BUILDING_TABLE.' ON '.REPORT_TABLE.'.id='.BUILDING_TABLE.'.FK_ReportID';
			$tables_sql[] = ' LEFT JOIN '.SALES_TRANSACTIONS_TABLE.' ON '.REPORT_TABLE.'.id='.SALES_TRANSACTIONS_TABLE.'.FK_ReportID';
			$tables_sql[] = ' LEFT JOIN '.TEMPLATES_TABLE.' ON '.REPORT_TABLE.'.template='.TEMPLATES_TABLE.'.id';
			$tables_sql[] = ' LEFT JOIN '.PROPERTYTYPE_DETAILS_TABLE.' ON '.PROPERTYTYPE_DETAILS_TABLE.'.FK_ReportID='.REPORT_TABLE.'.id';
			$tables_sql[] = ' LEFT JOIN '.WFDICTIONARY_TABLE.' ON '.SALES_TRANSACTIONS_TABLE.'.sale_status='.WFDICTIONARY_TABLE.'.id';
		break;
		case 3:
			$tables_sql[] = ' LEFT JOIN '.BUILDING_TABLE.' ON '.REPORT_TABLE.'.id='.BUILDING_TABLE.'.FK_ReportID';
			$tables_sql[] = ' LEFT JOIN '.LEASES_TRANSACTIONS_TABLE.' ON '.REPORT_TABLE.'.id='.LEASES_TRANSACTIONS_TABLE.'.FK_ReportID';
			$tables_sql[] = ' LEFT JOIN '.TEMPLATES_TABLE.' ON '.REPORT_TABLE.'.template='.TEMPLATES_TABLE.'.id';
			$tables_sql[] = ' INNER JOIN '.WFDICTIONARY_TABLE.' ON '.LEASES_TRANSACTIONS_TABLE.'.lease_expense_term='.WFDICTIONARY_TABLE.'.id';
		break;
		case 4:
			$tables_sql[] = ' LEFT JOIN '.SALES_TRANSACTIONS_TABLE.' ON '.REPORT_TABLE.'.id='.SALES_TRANSACTIONS_TABLE.'.FK_ReportID';
			$tables_sql[] = ' LEFT JOIN '.GROUND_LEASE_TABLE.' ON '.REPORT_TABLE.'.id='.GROUND_LEASE_TABLE.'.FK_ReportID';
			$tables_sql[] = ' LEFT JOIN '.TEMPLATES_TABLE.' ON '.REPORT_TABLE.'.template='.TEMPLATES_TABLE.'.id';
			$tables_sql[] = ' LEFT JOIN '.LAND.' ON '.REPORT_TABLE.'.id='.LAND.'.FK_ReportID';
			$tables_sql[] = ' LEFT JOIN '.WFDICTIONARY_TABLE.' ON '.SALES_TRANSACTIONS_TABLE.'.sale_status='.WFDICTIONARY_TABLE.'.id';
		break;
		default:
		
		break;
	}

	$tables_sql[] = ' LEFT JOIN '.WFUSERS_TABLE.' ON '.REPORT_TABLE.'.AssignedTo='.WFUSERS_TABLE.'.id';


	
	if(count($sql_fields)>0){
		$sql_fields_stmt.=" ".implode(",",$sql_fields)." ";
	}

	$tables_sql_stmt.=" FROM ".implode(" ",$tables_sql);

	if(count($search_sql)>0){
		$search_sql_stmt.=" WHERE ".implode(" ",$search_sql)." ";
	}

	$limit_sql = ""; // LIMIT 1000 REMOVE WHEN THE SERVER LIMITATION REMOVED
	$sql_groupby = "";
	$orderBy_stmt = "ORDER BY ".REPORT_TABLE.".id DESC";

				
	$sql = 'SELECT '.$sql_fields_stmt.' '.$tables_sql_stmt.' '.$search_sql_stmt.' '.$sql_groupby.' '.$orderBy_stmt.' '.$limit_sql.' ' ;

	//echo $sql;
	//die();
	$stmt = $db->prepare($sql);

	$ckeys = array_keys($qInput);
	for($k=0;$k<count($ckeys);$k++){
		$sQuery = "";
		$skeys = array_keys($qInput[$ckeys[$k]]['criteria']);
		//$extraRange = count($skeys);
		for($s=0;$s<count($skeys);$s++){
			//echo $qInput[$ckeys[$k]][$skeys[$s]]['data-type']."<br/>";
			
			switch($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['data-type']){
				case "int":
					if(is_array($qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']])){
						$operator = "=";
						if(isset($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['operator'])){
							$operator = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['operator'];
						}
						if($operator=="between"){
							$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_1",$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][0], PDO::PARAM_STR);
							//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_1".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][0]."<br/>";
							$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_2",$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][1], PDO::PARAM_STR);
							//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_2 ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][1]."<br/>";
							//$extraRange++;
						}else{
							for($o=0;$o<count($qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]);$o++){
								$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$o,$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][$o], PDO::PARAM_STR);
								//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$o." ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][$o]."<br/>";
							}
						}
						//$extraRange++;
					}else{
						$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s,$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']], PDO::PARAM_STR);
						//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s." ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]."<br/>";
					}
				break;
				case "varchar":
					if(is_array($qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']])){
						$operator = "=";
						if(isset($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['operator'])){
							$operator = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['operator'];
						}
						if(strtolower($operator)=="vin" || strtolower($operator)=="vnot in"){
							for($o=0;$o<count($qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]);$o++){
								$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$o,"%".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][$o]."%", PDO::PARAM_STR);
								//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$o." ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][$o]."<br/>";
							}
						}
						//$extraRange++;
					}else{
						$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s,$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']], PDO::PARAM_STR);
						//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s." ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]."<br/>";
					}
				break;
				case "date":
					if(is_array($qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']])){
						$operator = "=";
						if(isset($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['operator'])){
							$operator = $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['operator'];
						}
						if($operator=="between"){
							$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_1",$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][0], PDO::PARAM_STR);
							//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_1 ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][0]."<br/>";
							$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_2",$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][1], PDO::PARAM_STR);
							//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_2 ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][1]."<br/>";
							//$extraRange++;
						}else{
							for($o=0;$o<count($qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]);$o++){
								$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$o,$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][$o], PDO::PARAM_STR);
								//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$o." ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][$o]."<br/>";
							}
						}
						//$extraRange++;
					}else{
						$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s,$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']], PDO::PARAM_STR);
						//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s." ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]."<br/>";
					}
				break;
				case "dropdown":
					$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s,$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']], PDO::PARAM_INT);
					//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s." ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]."<br/>";
				break;
				case "dropdownvarchar":
					$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s,$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']], PDO::PARAM_INT);
					//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s." ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]."<br/>";
				break;
				default:
					$stmt->bindValue($qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s,$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']], PDO::PARAM_STR);
					//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s." ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']]."<br/>";
				break;
				
			}
		}
		
	}

	$stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	//$data = array_splice($data,0,2000); //REMOVE WHEN SERVER LIMITATION HAS BEEN GONE AWAY
	$jStr = json_encode(array('status' => 'ok', 'data' => $data));
	echo $jStr;
}
die();


?>