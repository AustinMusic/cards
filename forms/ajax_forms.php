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
define("WFDICTIONARY_M_TABLE","let",false);
define("LEASES_TRANSACTIONS_TABLE","leasetrans",false);
define("SUBMARKET_TABLE","submarket",false);
define("PROPERTYTYPE_DETAILS_TABLE","proptypedetails",false);
define("REPORT_TYPE","ReportType",false);
define("YARDABSORB_TABLE","yardabsorb",false);
define("MULTIFAMILY_TABLE","multifamily",false);
define("SELFSTORAGE_TABLE","selfstorage",false);
define("IMP_UNIT_TABLE","impunit",false);

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
	if(in_array("1",$reportTypeID) && in_array("2",$reportTypeID) && in_array("3",$reportTypeID) && in_array("4",$reportTypeID)){
		$sql_fields[] = REPORT_TABLE.".FK_ReportTypeID";
		$sql_fields[] = PROPERTY_TABLE.".propertysubtype";
		$sql_fields[] = PROPERTY_TABLE.".city";
		$sql_fields[] = "FORMAT(".PROPERTY_TABLE.".gross_land_sf,0) as gross_land_sf";
		$sql_fields[] = "FORMAT(".BUILDING_TABLE.".overall_gba,0) as overall_gba ";
		$sql_fields[] = REPORT_TYPE.".reporttype";
		$sql_fields[] = PROPERTYTYPE_TABLE.".propertytype";
		$sql_fields[] = PROPERTYSUBTYPE_TABLE.".subtype";
		//$sql_fields[] = GENERAL_MARKET_TABLE.".subtype";
		$sql_fields[] = PROPERTY_TABLE.".propertytype AS ptid";
		$sql_fields[] = "DATE_FORMAT(".REPORT_TABLE.".DateCreated,'%c/%e/%Y %l:%i %p') as DateCreated";
	}

	$sql_fields[] = PROPERTY_TABLE.".property_name";
	$sql_fields[] = "CONCAT(".PROPERTY_TABLE.".streetnumber,' ',".PROPERTY_TABLE.".streetname) AS address";
	$sql_fields[] = PROPERTY_TABLE.".state";
	$sql_fields[] = PROPERTY_TABLE.".lat";
	$sql_fields[] = PROPERTY_TABLE.".lng";
	
		
	if(count($reportTypeID)==1){
		$sql_fields[] = PROPERTY_TABLE.".propertytype";
		$sql_fields[] = "FORMAT(".PROPERTY_TABLE.".net_usable_sf,0) AS net_usable_sf";
		$sql_fields[] = PROPERTY_TABLE.".zoning_code";
		$sql_fields[] = "IF(".SALES_TRANSACTIONS_TABLE.".record_date is null,'---',IF(".SALES_TRANSACTIONS_TABLE.".record_date = '0000-00-00','---',DATE_FORMAT(".SALES_TRANSACTIONS_TABLE.".record_date,'%c/%e/%Y'))) as record_date";
		$sql_fields[] = "DATE_FORMAT(".SALES_TRANSACTIONS_TABLE.".record_date,'%c/%e/%Y') AS record_date";
		$sql_fields[] = "CONCAT('$', FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_unit, 0)) as adj_price_unit";
	}

	$sql_fields[] = SUBMARKET_TABLE.".submarket AS submarket";

	$sql_fields[] = "IF(".PROPERTY_TABLE.".photo1 = '','no-photo.jpg',CONCAT(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".photo1)) AS photo1";
	$sql_fields[] = "IF(".PROPERTY_TABLE.".thumbnail = '','no-photo-tn.jpg',CONCAT(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".thumbnail)) AS thumbnail";
	
	$sql_fields[] = BUILDING_TABLE.".const_descr";
	switch($reportTypeID[0]){
		case "1":
		
		break;
		case "2":
			$sql_fields[] = PROPERTY_TABLE.".city";
			
			$sql_fields[] = PROPERTYTYPE_TABLE.".propertytype AS property_type";
			$sql_fields[] = PROPERTYSUBTYPE_TABLE.".subtype";

			$sql_fields[] = "FORMAT(".BUILDING_TABLE.".overall_gba,0) as overall_gba";
			$sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".site_cover_primary,1),' %') as site_cover_primary";
			$sql_fields[] = BUILDING_TABLE.".parking_ratio";
			$sql_fields[] = BUILDING_TABLE.".no_stories";
			$sql_fields[] = BUILDING_TABLE.".year_built";
			$sql_fields[] = BUILDING_TABLE.".last_renovation";			
			
			$sql_fields[] = "CONCAT('$',FORMAT(".SALES_TRANSACTIONS_TABLE.".eff_sale_price_stab, 0)) as eff_sale_price_stab";
			$sql_fields[] = "CONCAT('$', FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_sf_gba, 2)) as adj_price_sf_gba";
			$sql_fields[] = "CONCAT(FORMAT(".SALES_TRANSACTIONS_TABLE.".cap_rate,2),' %') as cap_rate ";
			$sql_fields[] = "CONCAT('$', FORMAT(".SALES_TRANSACTIONS_TABLE.".alloc_imp_value_sf_nra, 2)) as alloc_imp_value_sf_nra";
			$sql_fields[] = "CONCAT('$', FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_sf_nra, 2)) as adj_price_sf_nra";

			$sql_fields[] = "CONCAT(FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".ind_pct_office,1),' %') as ind_pct_office";
			
			$sql_fields[] = "IF(".SALES_TRANSACTIONS_TABLE.".sale_status = 3,'',".WFDICTIONARY_TABLE.".definition) AS sale_status";
            $sql_fields[] = "if(".BUILDING_TABLE.".occupancy_type = 3,'',".WFDICTIONARY_M_TABLE.".definition) AS occupancy_type";
		break;
		case "3":
			$sql_fields[] = PROPERTY_TABLE.".property_name";
			$sql_fields[] = PROPERTY_TABLE.".city";
			$sql_fields[] = "IF(".PROPERTY_TABLE.".photo1 = '','no-photo.jpg',CONCAT(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".photo1)) AS photo1";
			$sql_fields[] = "IF(".PROPERTY_TABLE.".thumbnail = '','no-photo-tn.jpg',CONCAT(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".thumbnail)) AS thumbnail";
			$sql_fields[] = PROPERTYTYPE_TABLE.".propertytype AS property_type";
			$sql_fields[] = PROPERTYSUBTYPE_TABLE.".subtype";
			$sql_fields[] = "FORMAT(".LEASES_TRANSACTIONS_TABLE.".tenant_area_sf,0) as tenant_area_sf ";
			$sql_fields[] = "DATE_FORMAT(".LEASES_TRANSACTIONS_TABLE.".lease_start_date,'%c/%e/%Y') AS lease_start_date";	
			$sql_fields[] = LEASES_TRANSACTIONS_TABLE.".lessee_name";
			$sql_fields[] = "CONCAT('$', FORMAT(".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_mo_shell,3)) as eff_rent_sf_mo_shell";
			$sql_fields[] = "CONCAT('$', FORMAT(".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_mo_office,3)) as eff_rent_sf_mo_office";
			$sql_fields[] = "CONCAT('$', FORMAT(".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_mo_blend,3)) as eff_rent_sf_mo_blend";
			$sql_fields[] = "CONCAT('$', FORMAT(".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_yr,2)) as eff_rent_sf_yr";
			
			$sql_fields[] = "CONCAT(".LEASES_TRANSACTIONS_TABLE.".total_lease_term_mos,' ',".WFDICTIONARY_TABLE."_TERM.definition) as term";
			$sql_fields[] = "DATE_FORMAT(".LEASES_TRANSACTIONS_TABLE.".lease_start_date,'%m/%y') as lease_start";
	
			$sql_fields[] = "FORMAT(".BUILDING_TABLE.".overall_gba,0) as overall_gba";
			$sql_fields[] = BUILDING_TABLE.".const_descr";
			$sql_fields[] = BUILDING_TABLE.".year_built";
			$sql_fields[] = BUILDING_TABLE.".last_renovation";
			$sql_fields[] = "FORMAT(".YARDABSORB_TABLE.".yard_land_area_sf,0) as yard_sf";
			$sql_fields[] = "CONCAT('$',format(".YARDABSORB_TABLE.".eff_yard_rent_sf_mo,3)) as yard_rent";
			$sql_fields[] = "CONCAT('$',format(".YARDABSORB_TABLE.".other_rent_sf_mo,0)) as other_rent_sf_mo";
			$sql_fields[] = YARDABSORB_TABLE.".desc_yard_space";
			$sql_fields[] = YARDABSORB_TABLE.".or_tenant";
			$sql_fields[] = "DATE_FORMAT(".YARDABSORB_TABLE.".or_survey,'%m/%y') as or_survey";
			$sql_fields[] = "CONCAT(".YARDABSORB_TABLE.".orterms,' Mos.') as orterms";

			$sql_fields[] = "IF(".LEASES_TRANSACTIONS_TABLE.".lease_expense_term = 3,'',".WFDICTIONARY_TABLE.".definition) AS lease_expense_term";
			$sql_fields[] = "IF(".LEASES_TRANSACTIONS_TABLE.".exp_term_adj = 3,'',".WFDICTIONARY_TABLE."_TERMADJ.definition) AS exp_term_adj";
			$sql_fields[] = "IF(".YARDABSORB_TABLE.".ortypes = 3,'',".WFDICTIONARY_TABLE."_ORTYPE.definition) AS ortypes";
		break;
		case "4":
			$sql_fields[] = PROPERTY_TABLE.".city";
			$sql_fields[] = PROPERTY_TABLE.".net_usable_acre";
		
			$sql_fields[] = PROPERTYTYPE_TABLE.".propertytype AS property_type";
			$sql_fields[] = PROPERTYSUBTYPE_TABLE.".subtype";
		
			$sql_fields[] = "DATE_FORMAT(".REPORT_TABLE.".DueDate,'%M %e %Y') AS DueDate";	
			
			
			$sql_fields[] = "CONCAT('$',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_sf_net,2,2)) AS adj_price_sf_net";
			$sql_fields[] = "CONCAT('$',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_acre_net,2,2)) AS adj_price_acre_net";
			$sql_fields[] = "IF(".SALES_TRANSACTIONS_TABLE.".sale_status = 3,'',".WFDICTIONARY_TABLE.".definition) AS sale_status";
			$sql_fields[] = "CONCAT('$',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_sf_far,0)) AS adj_price_sf_far";
            $sql_fields[] = "CONCAT('$',FORMAT(".LAND.".sale_price_lot_wo,0)) AS sale_price_lot_wo";
			$sql_fields[] = "CONCAT('$',FORMAT(".LAND.".bulk_price_lot,2)) AS bulk_price_lot";
			
			$sql_fields[] = LAND.".unit_density_net_acre";
			$sql_fields[] = LAND.".finish_lot_size_sf";
		break;
	}

	/*building table joins*/
	$tables_sql[] = REPORT_TABLE;
	$tables_sql[] = ' LEFT JOIN '.PROPERTY_TABLE.' ON '.REPORT_TABLE.'.id='.PROPERTY_TABLE.'.FK_ReportID';
	if(in_array(1,$reportTypeID) && in_array(2,$reportTypeID) && in_array(3,$reportTypeID) && in_array(4,$reportTypeID)){
		$tables_sql[] = ' LEFT JOIN '.REPORT_TYPE.' ON '.REPORT_TABLE.'.FK_ReportTypeID='.REPORT_TYPE.'.id';
		$tables_sql[] = ' LEFT JOIN '.PROPERTYTYPE_TABLE.' ON '.PROPERTY_TABLE.'.propertytype='.PROPERTYTYPE_TABLE.'.id';
		$tables_sql[] = ' LEFT JOIN '.PROPERTYSUBTYPE_TABLE.' ON '.PROPERTY_TABLE.'.propertysubtype='.PROPERTYSUBTYPE_TABLE.'.id';
		$tables_sql[] = ' LEFT JOIN '.GENERAL_MARKET_TABLE.' ON '.PROPERTY_TABLE.'.submarkid='.GENERAL_MARKET_TABLE.'.id';

	}
	
	if(count($reportTypeID)==1){
		$tables_sql[] = ' LEFT JOIN '.SALES_TRANSACTIONS_TABLE.' ON '.REPORT_TABLE.'.id='.SALES_TRANSACTIONS_TABLE.'.FK_ReportID';
		if(in_array(GROUND_LEASE_TABLE,$tables)){
			$tables_sql[] = ' LEFT JOIN '.GROUND_LEASE_TABLE.' ON '.REPORT_TABLE.'.id='.GROUND_LEASE_TABLE.'.FK_ReportID';
		}
		if(in_array(LAND,$tables)){
			$tables_sql[] = ' LEFT JOIN '.LAND.' ON '.REPORT_TABLE.'.id='.LAND.'.FK_ReportID';
		}
	}

	$tables_sql[] = ' LEFT JOIN '.SUBMARKET_TABLE.' ON '.SUBMARKET_TABLE.'.id='.PROPERTY_TABLE.'.submarkid';
	$tables_sql[] = ' LEFT JOIN '.BUILDING_TABLE.' ON '.BUILDING_TABLE.'.FK_ReportID='.REPORT_TABLE.'.id';
/*	if(count($reportTypeID)==1){
		$tables_sql[] = ' LEFT JOIN '.WFDICTIONARY_TABLE.' ON '.SALES_TRANSACTIONS_TABLE.'.sale_status='.WFDICTIONARY_TABLE.'.id';
	}*/

	switch($reportTypeID[0]){
		case "1":
		
		break;
		case "2":
			$tables_sql[] = ' LEFT JOIN '.PROPERTYTYPE_TABLE.' ON '.PROPERTY_TABLE.'.propertytype='.PROPERTYTYPE_TABLE.'.id';
			$tables_sql[] = ' LEFT JOIN '.PROPERTYSUBTYPE_TABLE.' ON '.PROPERTY_TABLE.'.propertysubtype='.PROPERTYSUBTYPE_TABLE.'.id';
			$tables_sql[] = ' LEFT JOIN '.PROPERTYTYPE_DETAILS_TABLE.' ON '.PROPERTYTYPE_DETAILS_TABLE.'.FK_ReportID='.REPORT_TABLE.'.id';
			$tables_sql[] = ' LEFT JOIN '.WFDICTIONARY_TABLE.' ON '.SALES_TRANSACTIONS_TABLE.'.sale_status='.WFDICTIONARY_TABLE.'.id';
			$tables_sql[] = ' LEFT JOIN '.IMP_UNIT_TABLE.' ON '.IMP_UNIT_TABLE.'.FK_ReportID='.REPORT_TABLE.'.id';
            $tables_sql[] = ' LEFT OUTER JOIN '.WFDICTIONARY_TABLE.' '.WFDICTIONARY_M_TABLE.' ON '.BUILDING_TABLE.'.occupancy_type='.WFDICTIONARY_M_TABLE.'.id';
		break;
		case "3":
			$tables_sql[] = ' LEFT JOIN '.LEASES_TRANSACTIONS_TABLE.' ON '.LEASES_TRANSACTIONS_TABLE.'.FK_ReportID='.REPORT_TABLE.'.id';
			$tables_sql[] = ' LEFT JOIN '.PROPERTYTYPE_TABLE.' ON '.PROPERTY_TABLE.'.propertytype='.PROPERTYTYPE_TABLE.'.id';
			$tables_sql[] = ' LEFT JOIN '.PROPERTYSUBTYPE_TABLE.' ON '.PROPERTY_TABLE.'.propertysubtype='.PROPERTYSUBTYPE_TABLE.'.id';
			$tables_sql[] = ' LEFT JOIN '.WFDICTIONARY_TABLE.' ON '.LEASES_TRANSACTIONS_TABLE.'.lease_expense_term='.WFDICTIONARY_TABLE.'.id';
			$tables_sql[] = ' LEFT JOIN '.WFDICTIONARY_TABLE.' AS '.WFDICTIONARY_TABLE.'_TERMADJ ON '.LEASES_TRANSACTIONS_TABLE.'.exp_term_adj='.WFDICTIONARY_TABLE.'_TERMADJ.id';
			$tables_sql[] = ' LEFT JOIN '.YARDABSORB_TABLE.' ON '.YARDABSORB_TABLE.'.FK_ReportID='.REPORT_TABLE.'.id';
			$tables_sql[] = ' LEFT JOIN '.WFDICTIONARY_TABLE.' AS '.WFDICTIONARY_TABLE.'_ORTYPE ON '.YARDABSORB_TABLE.'.ortypes ='.WFDICTIONARY_TABLE.'_ORTYPE.id';
			$tables_sql[] = ' LEFT JOIN '.WFDICTIONARY_TABLE.' AS '.WFDICTIONARY_TABLE.'_TERM ON '.LEASES_TRANSACTIONS_TABLE.'.mos_vs_mos='.WFDICTIONARY_TABLE.'_TERM.id';
		break;
		case "4":
			$tables_sql[] = ' LEFT JOIN '.PROPERTYTYPE_TABLE.' ON '.PROPERTY_TABLE.'.propertytype='.PROPERTYTYPE_TABLE.'.id';
			$tables_sql[] = ' LEFT JOIN '.PROPERTYSUBTYPE_TABLE.' ON '.PROPERTY_TABLE.'.propertysubtype='.PROPERTYSUBTYPE_TABLE.'.id';
			$tables_sql[] = ' LEFT JOIN '.LAND.' ON '.REPORT_TABLE.'.id='.LAND.'.FK_ReportID';
			$tables_sql[] = ' LEFT JOIN '.WFDICTIONARY_TABLE.' ON '.SALES_TRANSACTIONS_TABLE.'.sale_status='.WFDICTIONARY_TABLE.'.id';
		break;
	}
		
	if(in_array(APPRAISALS_TABLE,$tables)){
		$tables_sql[] = ' LEFT JOIN '.APPRAISALS_TABLE.' ON '.REPORT_TABLE.'.id='.APPRAISALS_TABLE.'.FK_ReportID';
	}
	
	
/*
	"SELECT a.id, 
	b.property_name, 
	b.address, 
	sm.submarket, 
	b.zoning_code, 
	CONCAT(FORMAT(d.overall_gba,0),' SF') as overall_gba, 
	DATE_FORMAT(c.record_date,'%c/%e/%Y') as record_date,
	CONCAT('$',FORMAT(c.eff_sale_price_stab, 0)) as eff_sale_price_stab, 
	CONCAT('$', FORMAT(c.adj_price_sf_gba, 2)) as adj_price_sf_gba, 
	CONCAT(FORMAT(c.cap_rate,2),' %') as cap_rate 
	FROM report a 
	LEFT JOIN property b on b.FK_ReportID = a.id 
	JOIN building d on d.FK_ReportID = a.id 
	LEFT JOIN saletrans c on c.FK_ReportID = a.id 
	JOIN submarket sm on sm.id = b.submarkid 
	WHERE a.FK_ReportTypeID = 2 and a.IsDeleted = 0" ) ) {
					
		
		"SELECT a.id, 
		b.property_name, 
		b.address, 
		sm.submarket, 
		DATE_FORMAT(c.record_date,'%c/%e/%Y') as record_date, 
		s.definition as sale_status, b.zoning_code, 
		FORMAT(b.net_usable_sf, 0) as net_usable_sf, 
		CONCAT('$', FORMAT(c.adj_price_sf_net, 2)) as adj_price_sf_net, 
		b.net_usable_acre, 
		CONCAT('$', FORMAT(c.adj_price_acre_net,0)) as adj_price_acre_net 
		
		FROM report a 
		LEFT JOIN property b on b.FK_ReportID = a.id 
		LEFT JOIN saletrans c on c.FK_ReportID = a.id 
		JOIN WFDictionary s on s.id = c.sale_status 
		JOIN submarket sm on sm.id = b.submarkid 
		WHERE a.FK_ReportTypeID = 4 and a.IsDeleted = 0" ) 		
	*/
	
	
	
	
	
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
							//echo $qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']."_".$s." ".$qInput[$ckeys[$k]]['criteria'][$skeys[$s]][$qInput[$ckeys[$k]]['criteria'][$skeys[$s]]['fieldName']][0]."<br/>";
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
	/*DEBUG PURPOSE ONLY*/
	/*$sql = "SELECT report.id,report.reportname,property.property_name,property.address,property.propertytype,
			FORMAT(property.net_usable_sf,0) AS net_usable_sf,property.zoning_code,DATE_FORMAT(saletrans.record_date,'%c/%e/%Y') AS record_date,
			submarket.submarket AS submarket,if(property.photo1 = '','no-photo.jpg',CONCAT(report.id,'/',property.photo1)) AS photo1,
			if(property.thumbnail = '','no-photo-tn.jpg',CONCAT(report.id,'/',property.thumbnail)) AS thumbnail,DATE_FORMAT(report.DueDate,'%M %e %Y') AS DueDate,
			property.net_usable_acre,CONCAT(saletrans.adj_price_sf_net,2) AS adj_price_sf_net,CONCAT('$', FORMAT(saletrans.adj_price_acre_net,0)) AS adj_price_acre_net,
			WFDictionary.definition AS sale_status 
			FROM report 
			LEFT JOIN property ON report.id=property.FK_ReportID 
			LEFT JOIN saletrans ON report.id=saletrans.FK_ReportID 
			LEFT JOIN submarket ON submarket.id=property.submarkid 
			LEFT JOIN building ON building.FK_ReportID=report.id 
			LEFT JOIN WFDictionary ON saletrans.sale_status=WFDictionary.id 
			WHERE 
			(report.FK_ReportTypeID=4 AND report.isDeleted=0) 
			AND (property.propertytype=3 
			AND (property.net_usable_sf>=4999 AND property.net_usable_sf<=130681) 
			AND (saletrans.adj_price_sf_net>='6.01' AND saletrans.adj_price_sf_net<='25.01') 
			AND (saletrans.record_date>='2009-01-01' AND saletrans.record_date<='2020-01-08') 
			AND (property.county LIKE '%Washington%' OR property.county LIKE '%Clackamas%' OR property.county LIKE '%Mutlnomah%' OR property.county LIKE '%Clark%')) 
			ORDER BY report.id DESC ";*/
	//$stmt = $db->prepare($sql);	
	//$stmt->execute();	
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	//$data = array_splice($data,0,2000); //REMOVE WHEN SERVER LIMITATION HAS BEEN GONE AWAY
	$jStr = json_encode(array('status' => 'ok', 'data' => $data));
	echo $jStr;
}elseif(isset($_POST['clone_toreports'])){
	if(!isset($_POST['type'])){
		$jStr = json_encode(array('status' => 'error', 'data' => ""));
		echo $jStr;
		die();
	}
	
	$dbType = "";
	if($_POST['type']=="land_sales"){
		$dbType = "land_db";
	}elseif($_POST['type']=="improved_sales"){
		$dbType = "improved_db";
	}elseif($_POST['type']=="caprate"){
		$dbType = "caprate_db";
	}elseif($_POST['type']=="leases"){
		$dbType = "lease_db";
	}elseif($_POST['type']=="miscrent"){
		$dbType = "miscrent_db";
	}
	if($dbType!=""){
		try{
            $db->beginTransaction();
			for($i=0;$i<count($_POST['reportIDs']);$i++){
				$sql = "SELECT * FROM ".APPRAISALS_TABLE." WHERE FK_ReportID=:ReportID";
				$stmt = $db->prepare($sql);
				
				$stmt->bindValue("ReportID",$_POST['reportIDs'][$i], PDO::PARAM_INT);
				
				$stmt->execute();
				
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				if(count($rows)>0){
					$landDbs = $rows[0][$dbType];
					if($landDbs!=""){
						if(stripos($landDbs,",")!==false){
							$landDbs = explode(",",$landDbs);
						}else{
							$landDbs = [$landDbs];
						}
					}else{
						$landDbs = [];
					}
					$new_landDbs = $_POST['sourceIDs'];
					$new_landDbs = explode(",",$new_landDbs);

					$landDbs = array_merge($landDbs,$new_landDbs);
					$landDbs = array_unique($landDbs);
					
					$stmt = $db->prepare("UPDATE ".APPRAISALS_TABLE." SET ".$dbType."=:sourceIDs_".$i." WHERE FK_ReportID=:ReportID_".$i);
					$stmt->bindValue(":sourceIDs_".$i,implode(",",$landDbs),PDO::PARAM_STR);
					$stmt->bindValue(":ReportID_".$i,$_POST['reportIDs'][$i],PDO::PARAM_INT);
					$stmt->execute();
				}
			}
		
			$db->commit();
		}catch (PDOException $e) {
            $db->rollBack(); //cancel db changes if something goes wrong
            $jStr = json_encode(array('status' => 'error', 'data' => $e->getMessage()));
			echo $jStr;
            die();
        }
	}

	$jStr = json_encode(array('status' => 'ok', 'data' => [$_POST['reportIDs']]));
	echo $jStr;
	
}elseif(isset($_POST['move_comps'])){
	if(!isset($_POST['type'])){
		$jStr = json_encode(array('status' => 'error', 'data' => ""));
		echo $jStr;
		die();
	}

	$dbType = "";
	if($_POST['type']=="land_sales"){
		$dbType = "land_db";
	}elseif($_POST['type']=="improved_sales"){
		$dbType = "improved_db";
	}elseif($_POST['type']=="caprate"){
		$dbType = "caprate_db";
	}elseif($_POST['type']=="leases"){
		$dbType = "lease_db";
	}elseif($_POST['type']=="miscrent"){
		$dbType = "miscrent_db";
	}
	
	$reportTypeID = 0;
	$dbTarget = "";
	if($_POST['target']=="land_sales"){
		$dbTarget = "land_db";
	}elseif($_POST['target']=="improved_sales"){
		$dbTarget = "improved_db";
	}elseif($_POST['target']=="caprate"){
		$dbTarget = "caprate_db";
		$reportTypeID = 2;
	}elseif($_POST['target']=="leases"){
		$dbTarget = "lease_db";
	}elseif($_POST['target']=="miscrent"){
		$dbTarget = "miscrent_db";
		$reportTypeID = 3;
	}
	if($dbType!=""){
		try{
            $db->beginTransaction();
			$sql = "SELECT * FROM ".APPRAISALS_TABLE." WHERE FK_ReportID=:ReportID";
			$stmt = $db->prepare($sql);
			
			$stmt->bindValue("ReportID",$_POST['reportID'], PDO::PARAM_INT);
			
			$stmt->execute();
			
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if(count($rows)>0){
				/*$source_dbs = $rows[0][$dbType];
				if($source_dbs!=""){
					if(stripos($source_dbs,",")!==false){
						$source_dbs = explode(",",$source_dbs);
					}else{
						$source_dbs = [$source_dbs];
					}
				}else{
					$source_dbs = [];
				}
				$new_dbs = $_POST['sourceIDs'];
				$new_dbs = explode(",",$new_dbs);
				for($i=0;$i<count($source_dbs);$i++){
					if(in_array($source_dbs[$i],$new_dbs)){
						array_splice($source_dbs,$i,1);
						$i--;
					}
				}*/

				$target_dbs = $rows[0][$dbTarget];
				if($target_dbs!=""){
					if(stripos($target_dbs,",")!==false){
						$target_dbs = explode(",",$target_dbs);
					}else{
						$target_dbs = [$target_dbs];
					}
				}else{
					$target_dbs = [];
				}
				$new_dbs = $_POST['sourceIDs'];
				$new_dbs = explode(",",$new_dbs);

				$target_dbs = array_merge($target_dbs,$new_dbs);
				$target_dbs = array_unique($target_dbs);
				$stmt = $db->prepare("UPDATE ".APPRAISALS_TABLE." SET ".$dbTarget."=:targetIDs WHERE FK_ReportID=:ReportID");
				//".$dbType."=:sourceIDs,
				$stmt->bindValue(":targetIDs",implode(",",$target_dbs),PDO::PARAM_STR);
				//$stmt->bindValue(":sourceIDs",implode(",",$source_dbs),PDO::PARAM_STR);
				$stmt->bindValue(":ReportID",$_POST['reportID'],PDO::PARAM_INT);
				$stmt->execute();
			}
			$db->commit();
		}catch (PDOException $e) {
            $db->rollBack(); //cancel db changes if something goes wrong
            $jStr = json_encode(array('status' => 'error', 'data' => $e->getMessage()));
			echo $jStr;
            die();
        }
		
		if($reportTypeID!=0){
			$ids = $_POST['sourceIDs'];
			$ids = explode(",",$ids);
			for($d=0;$d<count($ids);$d++){
				$ids[$d] = '"'.$ids[$d].'"';
			}
					
			$vars['sq'] = '{"0":{"criteria":{"0":{"table":"report","fieldName":"FK_ReportTypeID","data-type":"int","operator":"IN","FK_ReportTypeID":["'.$reportTypeID.'"],"condition":"and"},"1":{"table":"report","fieldName":"id","data-type":"int","operator":"IN","id":['.implode(",",$ids).'],"condition":"0"}},"condition":"0"}}';
			
			$ch = curl_init('https://www.aavaluation.com/cards/forms/ajax_forms.php');
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
			curl_setopt($ch, CURLOPT_HEADER,FALSE);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE );
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE );
			curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($vars) );
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
			$data = curl_exec($ch);
			curl_close($ch);
			echo $data;
			die();
		}
		
	}

	$jStr = json_encode(array('status' => 'ok', 'data' => [$_POST['reportIDs']]));
	echo $jStr;
	
}
die();


?>