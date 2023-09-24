<?php
/* setting headers */
header("Connection: Keep-Alive");
header("Keep-Alive: timeout=100, max=500");

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
define("SUBMARKET_TABLE","submarket",false);
define("WFUSERS_TABLE","appraisers",false);
define("WFUSERS_A_TABLE","la",false);
define("APPRAISALS_TABLE","appraisalinfo",false);
define("CLIENTS_TABLE","clients",false);
define("GROUND_LEASE_TABLE","groundlease",false);
define("LAND","resland",false);
define("TEMPLATES_TABLE","templates",false);
define("WFDICTIONARY_TABLE","WFDictionary",false);
define("WFDICTIONARY_M_TABLE","let",false);
define("LEASES_TRANSACTIONS_TABLE","leasetrans",false);
define("PROPERTYTYPE_DETAILS_TABLE","proptypedetails",false);

	//if(isset($_POST['method']) && ($_POST['method'] == 'mapmarker' || $_POST['method'] == 'mapmarkerReport')){
		$execQuery = false;
		if(isset($_POST['ptid'])){
			if($_POST['ptid']!=''){
				$execQuery  = true;
			}
		}
		if(isset($_POST['gmid'])){
			if($_POST['gmid']!=''){
				$execQuery  = true;
			}
		}
		if(isset($_POST['id'])){
			if($_POST['id']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['cid'])){
			if($_POST['cid']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['pid'])){
			if($_POST['pid']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['grossLandAreaFrom'])){
			if($_POST['grossLandAreaFrom']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['grossLandAreaTo'])){
			if($_POST['grossLandAreaTo']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['netLandAreaSFFrom'])){
			if($_POST['netLandAreaSFFrom']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['netLandAreaSFTo'])){
			if($_POST['netLandAreaSFTo']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['overallGbaFrom'])){
			if($_POST['overallGbaFrom']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['overallGbaTo'])){
			if($_POST['overallGbaTo']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['overallNraFrom'])){
			if($_POST['overallNraFrom']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['overallNraTo'])){
			if($_POST['overallNraTo']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['yearBuiltFrom'])){
			if($_POST['yearBuiltFrom']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['DueDateFrom'])){
			if($_POST['DueDateFrom']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['DueDateTo'])){
			if($_POST['DueDateTo']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['yearBuiltTo'])){
			if($_POST['yearBuiltTo']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['salesPriceFrom'])){
			if($_POST['salesPriceFrom']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['salesPriceTo'])){
			if($_POST['salesPriceTo']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['saledateFrom'])){
			if($_POST['saledateFrom']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['saledateTo'])){
			if($_POST['saledateTo']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['adjPriceSfGbaFrom'])){
			if($_POST['adjPriceSfGbaFrom']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['adjPriceSfGbaTo'])){
			if($_POST['adjPriceSfGbaTo']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['capRateFrom'])){
			if($_POST['capRateFrom']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['capRateTo'])){
			if($_POST['capRateTo']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['occupancy_type'])){
			if($_POST['occupancy_type']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['grossLandAreaAcresFrom'])){
			if($_POST['grossLandAreaAcresFrom']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['grossLandAreaAcresTo'])){
			if($_POST['grossLandAreaAcresTo']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['netLandAreaAcresFrom'])){
			if($_POST['netLandAreaAcresFrom']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['netLandAreaAcresTo'])){
			if($_POST['netLandAreaAcresTo']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['adjPriceSFNetFrom'])){
			if($_POST['adjPriceSFNetFrom']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['adjPriceSFNetTo'])){
			if($_POST['adjPriceSFNetTo']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['groundLeaseFrom'])){
			if($_POST['groundLeaseFrom']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['groundLeaseTo'])){
			if($_POST['groundLeaseTo']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['groundLeasePricePadFrom'])){
			if($_POST['groundLeasePricePadFrom']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['groundLeasePricePadTo'])){
			if($_POST['groundLeasePricePadTo']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['tenant_sf'])){
			if($_POST['tenant_sf']!=0){
				$execQuery  = true;
			}
		}
		
		if(isset($_POST['leaseTransactionFrom'])){
			if($_POST['leaseTransactionFrom']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['leaseTransactionTo'])){
			if($_POST['leaseTransactionTo']!=0){
				$execQuery  = true;
			}
		}		
		if(isset($_POST['effRentSFYearFrom'])){
			if($_POST['effRentSFYearFrom']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['effRentSFYearTo'])){
			if($_POST['effRentSFYearTo']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['effRentShellFrom'])){
			if($_POST['effRentShellFrom']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['effRentShellTo'])){
			if($_POST['effRentShellTo']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['tenantAreaSFFrom'])){
			if($_POST['tenantAreaSFFrom']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['tenantAreaSFTo'])){
			if($_POST['tenantAreaSFTo']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['lease_options'])){
			if($_POST['lease_options']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['new_renewal'])){
			if($_POST['new_renewal']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['space_position'])){
			if($_POST['space_position']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['pendingSalePriceFrom'])){
			if($_POST['pendingSalePriceFrom']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['pendingSalePriceTo'])){
			if($_POST['pendingSalePriceTo']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['groundLease'])){
			if($_POST['groundLease']!=0){
				$execQuery  = true;
			}
		}
		if(isset($_POST['FK_ReportTypeID'])){
			if($_POST['FK_ReportTypeID']!=0){
				$execQuery  = true;
			}
		}
		//echo $execQuery;
		
		if($execQuery ){
			$limit_sql ="";
			$search_sql = array();
			$search_sql_debug = array();
			$search_sql_2 = array();
			$search_sql_2_debug = array();
			$search_sql_stmt = "";
			$tables_sql = array();
			$tables_sql_stmt = "";
			$addtable_sql = array();
			$addtable_sql_stm = "";
			$sql_groupby = "";
			$orderBy_stmt = "";
			$sql_fields = array();
			$sql_fields_stmt = "";
			
			
			/*the required fields that we want to retreive fro mthe sql query*/
			$sql_fields[] = REPORT_TABLE.".id";
			$sql_fields[] = REPORT_TABLE.".reportname";
			$sql_fields[] = "DATE_FORMAT(".REPORT_TABLE.".DueDate,'%c/%e/%Y') AS DueDate";
			
			$sql_fields[] = PROPERTY_TABLE.".lat";
			$sql_fields[] = PROPERTY_TABLE.".lng";
			$sql_fields[] = PROPERTY_TABLE.".property_name";
			$sql_fields[] = "CONCAT(".PROPERTY_TABLE.".streetnumber,' ',".PROPERTY_TABLE.".streetname) AS address";
			$sql_fields[] = "CONCAT(".PROPERTY_TABLE.".city,', ',".PROPERTY_TABLE.".state) AS citystate";
			$sql_fields[] = PROPERTY_TABLE.".city";
			$sql_fields[] = PROPERTY_TABLE.".state";
			$sql_fields[] = PROPERTY_TABLE.".county";
			$sql_fields[] = PROPERTY_TABLE.".zip_code";
//			$sql_fields[] = PROPERTY_TABLE.".submarket";
			$sql_fields[] = "if(".PROPERTY_TABLE.".photo1 = '','no-photo.jpg',CONCAT(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".photo1)) AS photo1";
			$sql_fields[] = "if(".PROPERTY_TABLE.".thumbnail = '','no-photo-tn.jpg',CONCAT(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".thumbnail)) AS thumbnail";
			$sql_fields[] = PROPERTY_TABLE.".zoning_code";
			$sql_fields[] = PROPERTY_TABLE.".propertysubtype AS ptsid";// as ptsid
			$sql_fields[] = PROPERTY_TABLE.".submarkid AS sbmid";
			$sql_fields[] = PROPERTY_TABLE.".propertytype AS ptid";// AS propertytypeid
			$sql_fields[] = PROPERTY_TABLE.".genmarket AS gmid";
			
			$sql_fields[] = "FORMAT(".PROPERTY_TABLE.".gross_land_sf,0) as gross_land_sf";
			$sql_fields[] = "FORMAT(".PROPERTY_TABLE.".net_usable_sf,0) AS net_usable_sf";
			$sql_fields[] = "FORMAT(".PROPERTY_TABLE.".net_usable_acre,3) AS net_usable_acre";
			$sql_fields[] = PROPERTYTYPE_TABLE.".propertytype";
			$sql_fields[] = PROPERTYSUBTYPE_TABLE.".subtype";
			$sql_fields[] = SUBMARKET_TABLE.".submarket";
			$sql_fields[] = "DATE_FORMAT(".REPORT_TABLE.".DateCreated,'%m/%d/%Y') AS DateCreated";
			switch (intval($_POST['FK_ReportTypeID'])){
				case 1:
					$sql_fields[] = APPRAISALS_TABLE.".client_name";
                    $sql_fields[] = PROPERTYTYPE_TABLE.".propertytype AS property_type";
                    $sql_fields[] = "CONCAT(".WFUSERS_A_TABLE.".firstname,' ' ,".WFUSERS_A_TABLE.".lastname) AS OwnerID";
				break;
				case 2:
					$sql_fields[] = TEMPLATES_TABLE.".templatepath";
				
					$sql_fields[] = "FORMAT(".BUILDING_TABLE.".overall_gba,0) AS overall_gba";
					
					$sql_fields[] = "DATE_FORMAT(".SALES_TRANSACTIONS_TABLE.".record_date,'%c/%e/%Y') AS record_date";
					$sql_fields[] = "CONCAT('$', FORMAT(".SALES_TRANSACTIONS_TABLE.".sale_price,0)) AS sale_price";
					$sql_fields[] = "CONCAT('$', FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_sf_gba,2)) AS adj_price_sf_gba";
					$sql_fields[] = "IF (".SALES_TRANSACTIONS_TABLE.".cap_rate='0.00','---',CONCAT(FORMAT(".SALES_TRANSACTIONS_TABLE.".cap_rate, 2),' %')) AS cap_rate";
					$sql_fields[] = "CONCAT('$',FORMAT(".SALES_TRANSACTIONS_TABLE.".eff_sale_price_stab, 0)) as eff_sale_price_stab";
					$sql_fields[] = "CONCAT('$', FORMAT(".SALES_TRANSACTIONS_TABLE.".alloc_imp_value_sf_nra, 2)) as alloc_imp_value_sf_nra";
					$sql_fields[] = "CONCAT('$', FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_sf_nra, 2)) as adj_price_sf_nra";					
					$sql_fields[] = "CONCAT('$', FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_unit, 0)) as adj_price_unit";
					
					$sql_fields[] = "if(".PROPERTY_TABLE.".photo1 = '','no-photo.jpg',CONCAT(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".photo1)) AS photo1";
					$sql_fields[] = "if(".PROPERTY_TABLE.".thumbnail = '','no-photo-tn.jpg',CONCAT(".REPORT_TABLE.".id,'/',".PROPERTY_TABLE.".thumbnail)) AS thumbnail";

					$sql_fields[] = PROPERTYTYPE_TABLE.".propertytype AS property_type";

					$sql_fields[] = "CONCAT(FORMAT(".BUILDING_TABLE.".site_cover_primary, 1),' %') as site_cover_primary";
					$sql_fields[] = BUILDING_TABLE.".parking_ratio";
					$sql_fields[] = BUILDING_TABLE.".const_descr";
					$sql_fields[] = BUILDING_TABLE.".no_stories";
					$sql_fields[] = BUILDING_TABLE.".year_built";
					$sql_fields[] = BUILDING_TABLE.".last_renovation";			
					
					

					$sql_fields[] = "CONCAT(FORMAT(".PROPERTYTYPE_DETAILS_TABLE.".ind_pct_office, 1),' %') as ind_pct_office";
					
					$sql_fields[] = "if(".SALES_TRANSACTIONS_TABLE.".sale_status = 3,'',".WFDICTIONARY_TABLE.".definition) AS sale_status";
                    $sql_fields[] = "if(".BUILDING_TABLE.".occupancy_type = 3,'',".WFDICTIONARY_M_TABLE.".definition) AS occupancy_type";
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
                    $sql_fields[] = "if(".LEASES_TRANSACTIONS_TABLE.".exp_term_adj = 3,'',".WFDICTIONARY_M_TABLE.".definition) AS exp_term_adj";
					
					$sql_fields[] = PROPERTYTYPE_TABLE.".propertytype AS property_type";

					$sql_fields[] = "CONCAT('$', FORMAT(".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_mo_shell,3)) as eff_rent_sf_mo_shell";
					$sql_fields[] = "CONCAT('$', FORMAT(".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_mo_office,3)) as eff_rent_sf_mo_office";
					$sql_fields[] = "CONCAT('$', FORMAT(".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_mo_blend,3)) as eff_rent_sf_mo_blend";
				break;
				case 4:
					$sql_fields[] = TEMPLATES_TABLE.".templatepath";
				
					$sql_fields[] = "CONCAT('$', FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_sf_net,2)) AS adj_price_sf_net";
					$sql_fields[] = "CONCAT('$',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_acre_net,0)) AS adj_price_acre_net";
					$sql_fields[] = "CONCAT('$', FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_sf_far,2)) AS adj_price_sf_far";
					$sql_fields[] = "CONCAT('$', FORMAT(".SALES_TRANSACTIONS_TABLE.".sale_price,0)) AS sale_price";
					$sql_fields[] = "CONCAT('$',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_sf_net,2,2)) AS adj_price_sf_net";
					$sql_fields[] = "CONCAT('$',FORMAT(".SALES_TRANSACTIONS_TABLE.".adj_price_sf_far,2)) AS adj_price_sf_far";
                    $sql_fields[] = "CONCAT('$',FORMAT(".LAND.".sale_price_lot_wo,0)) AS sale_price_lot_wo";
					$sql_fields[] = "DATE_FORMAT(".SALES_TRANSACTIONS_TABLE.".record_date,'%c/%e/%Y') AS record_date";
					
					
					$sql_fields[] = PROPERTY_TABLE.".net_usable_acre";
					$sql_fields[] = "FORMAT(".PROPERTY_TABLE.".gross_land_sf,0) AS gross_land_sf";
					
					$sql_fields[] = "if(".SALES_TRANSACTIONS_TABLE.".sale_status = 3,'',".WFDICTIONARY_TABLE.".definition) AS sale_status";
					

					$sql_fields[] = "CONCAT('$',FORMAT(".LAND.".bulk_price_lot,2)) AS bulk_price_lot";
					$sql_fields[] = LAND.".unit_density_net_acre";
					$sql_fields[] = LAND.".finish_lot_size_sf";
			
					$sql_fields[] = PROPERTYTYPE_TABLE.".propertytype AS property_type";
				break;
				default:
				
				break;
			}
			
			//$sql_fields[] = GENERAL_MARKET_TABLE.".genmarketdbname";
			
			$sql_fields[] = "CONCAT(".WFUSERS_TABLE.".firstname,' ' ,".WFUSERS_TABLE.".lastname) AS AssignedTo";

			/*building table joins*/
			$tables_sql[] = REPORT_TABLE;
			$tables_sql[] = ' LEFT JOIN '.PROPERTY_TABLE.' ON '.REPORT_TABLE.'.id='.PROPERTY_TABLE.'.FK_ReportID';
			$tables_sql[] = ' LEFT JOIN '.PROPERTYTYPE_TABLE.' ON '.PROPERTY_TABLE.'.propertytype='.PROPERTYTYPE_TABLE.'.id';
			$tables_sql[] = ' LEFT JOIN '.PROPERTYSUBTYPE_TABLE.' ON '.PROPERTY_TABLE.'.propertysubtype='.PROPERTYSUBTYPE_TABLE.'.id';
			
			
			$tables_sql[] = ' LEFT JOIN '.SUBMARKET_TABLE.' ON '.PROPERTY_TABLE.'.submarkid='.SUBMARKET_TABLE.'.id';
			switch (intval($_POST['FK_ReportTypeID'])){
				case 1:
					$tables_sql[] = ' LEFT JOIN '.APPRAISALS_TABLE.' ON '.REPORT_TABLE.'.id='.APPRAISALS_TABLE.'.FK_ReportID';
                    $tables_sql[] = ' LEFT OUTER JOIN '.WFUSERS_TABLE.' '.WFUSERS_A_TABLE.' ON '.REPORT_TABLE.'.OwnerID='.WFUSERS_A_TABLE.'.id';
					
				break;
				case 2:
					$tables_sql[] = ' LEFT JOIN '.BUILDING_TABLE.' ON '.REPORT_TABLE.'.id='.BUILDING_TABLE.'.FK_ReportID';
					$tables_sql[] = ' LEFT JOIN '.SALES_TRANSACTIONS_TABLE.' ON '.REPORT_TABLE.'.id='.SALES_TRANSACTIONS_TABLE.'.FK_ReportID';
					$tables_sql[] = ' INNER JOIN '.TEMPLATES_TABLE.' ON '.REPORT_TABLE.'.template='.TEMPLATES_TABLE.'.id';
					$tables_sql[] = ' LEFT JOIN '.PROPERTYTYPE_DETAILS_TABLE.' ON '.PROPERTYTYPE_DETAILS_TABLE.'.FK_ReportID='.REPORT_TABLE.'.id';
					$tables_sql[] = ' LEFT JOIN '.WFDICTIONARY_TABLE.' ON '.SALES_TRANSACTIONS_TABLE.'.sale_status='.WFDICTIONARY_TABLE.'.id';
                    $tables_sql[] = ' LEFT OUTER JOIN '.WFDICTIONARY_TABLE.' '.WFDICTIONARY_M_TABLE.' ON '.BUILDING_TABLE.'.occupancy_type='.WFDICTIONARY_M_TABLE.'.id';
				break;
				case 3:
					$tables_sql[] = ' LEFT JOIN '.BUILDING_TABLE.' ON '.REPORT_TABLE.'.id='.BUILDING_TABLE.'.FK_ReportID';
					$tables_sql[] = ' LEFT JOIN '.LEASES_TRANSACTIONS_TABLE.' ON '.REPORT_TABLE.'.id='.LEASES_TRANSACTIONS_TABLE.'.FK_ReportID';
					$tables_sql[] = ' INNER JOIN '.TEMPLATES_TABLE.' ON '.REPORT_TABLE.'.template='.TEMPLATES_TABLE.'.id';
					$tables_sql[] = ' INNER JOIN '.WFDICTIONARY_TABLE.' ON '.LEASES_TRANSACTIONS_TABLE.'.lease_expense_term='.WFDICTIONARY_TABLE.'.id';
                    $tables_sql[] = ' LEFT OUTER JOIN '.WFDICTIONARY_TABLE.' '.WFDICTIONARY_M_TABLE.' ON '.LEASES_TRANSACTIONS_TABLE.'.exp_term_adj='.WFDICTIONARY_M_TABLE.'.id';
				break;
				case 4:
					$tables_sql[] = ' LEFT JOIN '.SALES_TRANSACTIONS_TABLE.' ON '.REPORT_TABLE.'.id='.SALES_TRANSACTIONS_TABLE.'.FK_ReportID';
					$tables_sql[] = ' LEFT JOIN '.GROUND_LEASE_TABLE.' ON '.REPORT_TABLE.'.id='.GROUND_LEASE_TABLE.'.FK_ReportID';
					$tables_sql[] = ' INNER JOIN '.TEMPLATES_TABLE.' ON '.REPORT_TABLE.'.template='.TEMPLATES_TABLE.'.id';
					$tables_sql[] = ' LEFT JOIN '.LAND.' ON '.REPORT_TABLE.'.id='.LAND.'.FK_ReportID';
					$tables_sql[] = ' INNER JOIN '.WFDICTIONARY_TABLE.' ON '.SALES_TRANSACTIONS_TABLE.'.sale_status='.WFDICTIONARY_TABLE.'.id';

				break;
				default:
				
				break;
			}

			$tables_sql[] = ' LEFT JOIN '.WFUSERS_TABLE.' ON '.REPORT_TABLE.'.AssignedTo='.WFUSERS_TABLE.'.id';

			
			if(isset($_POST['cid'])){
				$tables_sql[] = ' LEFT JOIN '.APPRAISALS_TABLE.' ON '.REPORT_TABLE.'.id='.APPRAISALS_TABLE.'.FK_ReportID';
				$tables_sql[] = ' LEFT JOIN '.CLIENTS_TABLE.' ON '.APPRAISALS_TABLE.'.client_db='.CLIENTS_TABLE.'.id';
			}
			
			/*here we define the condtions, this part will go to where, rembemr because prepare statements doesn't show the variables we use an other debug array with the vlasue for easily sql output in case of debug*/
			$search_sql[] = " ".REPORT_TABLE.".isDeleted=0";
			
			if(!empty($_POST['FK_ReportTypeID'])){
				$search_sql[] = " ".REPORT_TABLE.".FK_ReportTypeID=:FK_ReportTypeID ";
				$search_sql_debug[] = " ".REPORT_TABLE.".FK_ReportTypeID=".$_POST['FK_ReportTypeID']." ";
			}
			
			if(!empty($_POST['ptid'])){
				//$properties = explode(",",$_POST['property']);
				$properties = $_POST['ptid'];
				$subSql = array();
				$subSqlDebug = array();
				for($i=0;$i<count($properties);$i++){
					$subSql[] = PROPERTY_TABLE.".propertytype=:property".$i; 
					$subSqlDebug[] = PROPERTY_TABLE.".propertytype=".intval($properties[$i]); 
				}
				$search_sql[] = " (".implode(" OR ",$subSql).") ";
				$search_sql_debug[] = " (".implode(" OR ",$subSqlDebug).") ";
			}
			
			if(!empty($_POST['ptsid'])){
				$propertytypes = $_POST['ptsid'];
				$subSql = array();
				$subSqlDebug = array();
				for($i=0;$i<count($propertytypes);$i++){
					$subSql[] = PROPERTY_TABLE.".propertysubtype=:ptsid".$i; 
					$subSqlDebug[] = PROPERTY_TABLE.".propertysubtype=".intval($propertytypes[$i]); 
				}
				$search_sql[] = " (".implode(" OR ",$subSql).") ";
				$search_sql_debug[] = " (".implode(" OR ",$subSqlDebug).") ";
			}
			
			if(!empty($_POST['gmid'])){
				//$markets = explode(",",$_POST['market']);
				$markets = $_POST['gmid'];
				$subSql = array();
				$subSqlDebug = array();
				for($i=0;$i<count($markets);$i++){
					$subSql[] = PROPERTY_TABLE.".genmarket=:market".$i; 
					$subSqlDebug[] = PROPERTY_TABLE.".genmarket=".intval($markets[$i]); 
				}
				$search_sql[] = " (".implode(" OR ",$subSql).") ";
				$search_sql_debug[] = " (".implode(" OR ",$subSqlDebug).") ";
			}
			
			if(!empty($_POST['sbmid'])){
				//$markets = explode(",",$_POST['market']);
				$submarkets = $_POST['sbmid'];
				$subSql = array();
				$subSqlDebug = array();
				for($i=0;$i<count($submarkets);$i++){
					$subSql[] = PROPERTY_TABLE.".submarkid=:sbmid".$i; 
					$subSqlDebug[] = PROPERTY_TABLE.".submarkid=".intval($submarkets[$i]); 
				}
				$search_sql[] = " (".implode(" OR ",$subSql).") ";
				$search_sql_debug[] = " (".implode(" OR ",$subSqlDebug).") ";
			}
			
			if(!empty($_POST['lease_options'])){
				$lease_options = $_POST['lease_options'];
				$subSql = array();
				$subSqlDebug = array();
				for($i=0;$i<count($lease_options);$i++){
					$subSql[] = LEASES_TRANSACTIONS_TABLE.".lease_options=:lease_options".$i; 
					$subSqlDebug[] = LEASES_TRANSACTIONS_TABLE.".lease_options=".intval($lease_options[$i]); 
				}
				$search_sql[] = " (".implode(" OR ",$subSql).") ";
				$search_sql_debug[] = " (".implode(" OR ",$subSqlDebug).") ";
			}
			
			if(!empty($_POST['new_renewal'])){
				$new_renewal = $_POST['new_renewal'];
				$subSql = array();
				$subSqlDebug = array();
				for($i=0;$i<count($new_renewal);$i++){
					$subSql[] = LEASES_TRANSACTIONS_TABLE.".new_renewal=:new_renewal".$i; 
					$subSqlDebug[] = LEASES_TRANSACTIONS_TABLE.".new_renewal=".intval($new_renewal[$i]); 
				}
				$search_sql[] = " (".implode(" OR ",$subSql).") ";
				$search_sql_debug[] = " (".implode(" OR ",$subSqlDebug).") ";
			}
			
			if(!empty($_POST['space_position'])){
				$search_sql[] = " ".LEASES_TRANSACTIONS_TABLE.".space_position =:space_position ";
				$search_sql_debug[] = " ".LEASES_TRANSACTIONS_TABLE.".space_position =".$_POST['space_position']." ";
			}

			if(!empty($_POST['grossLandAreaFrom'])){
				$search_sql[] = " ".PROPERTY_TABLE.".gross_land_sf >=:grossLandAreaFrom ";
				$search_sql_debug[] = " ".PROPERTY_TABLE.".gross_land_sf >=".$_POST['grossLandAreaFrom']." ";
			}
			
			if(!empty($_POST['grossLandAreaTo'])){
				$search_sql[] = " ".PROPERTY_TABLE.".gross_land_sf <=:grossLandAreaTo ";
				$search_sql_debug[] = " ".PROPERTY_TABLE.".gross_land_sf <=".$_POST['grossLandAreaTo']." ";
			}
			if(!empty($_POST['netLandAreaSFFrom'])){
				$search_sql[] = " ".PROPERTY_TABLE.".gross_land_sf >=:netLandAreaSFFrom ";
				$search_sql_debug[] = " ".PROPERTY_TABLE.".net_usable_sf >=".$_POST['netLandAreaSFFrom']." ";
			}
			
			if(!empty($_POST['netLandAreaSFTo'])){
				$search_sql[] = " ".PROPERTY_TABLE.".gross_land_sf <=:netLandAreaSFTo ";
				$search_sql_debug[] = " ".PROPERTY_TABLE.".net_usable_sf <=".$_POST['netLandAreaSFTo']." ";
			}
			if(!empty($_POST['grossLandAreaAcresFrom'])){
				$search_sql[] = " ".PROPERTY_TABLE.".gross_land_acre >=:grossLandAreaAcresFrom ";
				$search_sql_debug[] = " ".PROPERTY_TABLE.".gross_land_acre >=".$_POST['grossLandAreaAcresFrom']." ";
			}
			
			if(!empty($_POST['grossLandAreaAcresTo'])){
				$search_sql[] = " ".PROPERTY_TABLE.".gross_land_acre <=:grossLandAreaAcresTo ";
				$search_sql_debug[] = " ".PROPERTY_TABLE.".gross_land_acre <=".$_POST['grossLandAreaAcresTo']." ";
			}
			if(!empty($_POST['netLandAreaAcresFrom'])){
				$search_sql[] = " ".PROPERTY_TABLE.".net_usable_acre >=:netLandAreaAcresFrom ";
				$search_sql_debug[] = " ".PROPERTY_TABLE.".net_usable_acre >=".$_POST['netLandAreaAcresFrom']." ";
			}
			
			if(!empty($_POST['netLandAreaAcresTo'])){
				$search_sql[] = " ".PROPERTY_TABLE.".net_usable_acre <=:netLandAreaAcresTo ";
				$search_sql_debug[] = " ".PROPERTY_TABLE.".net_usable_acre <=".$_POST['netLandAreaAcresTo']." ";
			}
			if(!empty($_POST['groundLeaseFrom'])){
				$search_sql[] = " ".GROUND_LEASE_TABLE.".gl_leased_land_sf >=:groundLeaseFrom ";
				$search_sql_debug[] = " ".GROUND_LEASE_TABLE.".gl_leased_land_sf >=".$_POST['groundLeaseFrom']." ";
			}
			
			if(!empty($_POST['groundLeaseTo'])){
				$search_sql[] = " ".GROUND_LEASE_TABLE.".gl_leased_land_sf <=:groundLeaseTo ";
				$search_sql_debug[] = " ".GROUND_LEASE_TABLE.".gl_leased_land_sf <=".$_POST['groundLeaseTo']." ";
			}
			
			if(!empty($_POST['pendingSalePriceFrom'])){
				$search_sql[] = " ".SALES_TRANSACTIONS_TABLE.".list_price >=:pendingSalePriceFrom ";
				$search_sql_debug[] = " ".SALES_TRANSACTIONS_TABLE.".list_price >=".$_POST['pendingSalePriceFrom']." ";
			}
			
			if(!empty($_POST['pendingSalePriceTo'])){
				$search_sql[] = " ".SALES_TRANSACTIONS_TABLE.".list_price <=:pendingSalePriceTo ";
				$search_sql_debug[] = " ".SALES_TRANSACTIONS_TABLE.".list_price <=".$_POST['pendingSalePriceTo']." ";
			}
			if(!empty($_POST['DueDateFrom'])){
				$search_sql[] = " ".REPORT_TABLE.".DueDate >=:DueDateFrom ";
				$search_sql_debug[] = " ".REPORT_TABLE.".DueDate >=".$_POST['DueDateFrom']." ";
			}
			
			if(!empty($_POST['DueDateTo'])){
				$search_sql[] = " ".REPORT_TABLE.".DueDate <=:DueDateTo ";
				$search_sql_debug[] = " ".REPORT_TABLE.".DueDate <=".$_POST['DueDateTo']." ";
			}
			if(!empty($_POST['groundLease'])){
				$search_sql[] = " ".PROPERTY_TABLE.".ground_lease =:groundLease ";
				$search_sql_debug[] = " ".PROPERTY_TABLE.".ground_lease =".$_POST['groundLease']." ";
			}
			
			if(!empty($_POST['leaseTransactionFrom'])){
				$search_sql[] = " ".LEASES_TRANSACTIONS_TABLE.".lease_start_date >=:leaseTransactionFrom ";
				$search_sql_debug[] = " ".LEASES_TRANSACTIONS_TABLE.".lease_start_date >=".$_POST['leaseTransactionFrom']." ";
			}
			
			if(!empty($_POST['leaseTransactionTo'])){
				$search_sql[] = " ".LEASES_TRANSACTIONS_TABLE.".lease_end_date <=:leaseTransactionTo ";
				$search_sql_debug[] = " ".LEASES_TRANSACTIONS_TABLE.".lease_end_date <=".$_POST['leaseTransactionTo']." ";
			}
			
			if(!empty($_POST['effRentSFYearFrom'])){
				$search_sql[] = " ".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_yr >=:effRentSFYearFrom ";
				$search_sql_debug[] = " ".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_yr >=".$_POST['effRentSFYearFrom']." ";
			}
			
			if(!empty($_POST['effRentSFYearTo'])){
				$search_sql[] = " ".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_yr <=:effRentSFYearTo ";
				$search_sql_debug[] = " ".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_yr <=".$_POST['effRentSFYearTo']." ";
			}
			if(!empty($_POST['effRentShellFrom'])){
				$search_sql[] = " ".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_mo_shell >=:effRentShellFrom ";
				$search_sql_debug[] = " ".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_mo_shell >=".$_POST['effRentShellFrom']." ";
			}
			
			if(!empty($_POST['effRentShellTo'])){
				$search_sql[] = " ".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_mo_shell <=:effRentShellTo ";
				$search_sql_debug[] = " ".LEASES_TRANSACTIONS_TABLE.".eff_rent_sf_mo_shell <=".$_POST['effRentShellTo']." ";
			}
			if(!empty($_POST['overallNraFrom'])){
				$search_sql[] = " ".BUILDING_TABLE.".overall_nra >=:overallNraFrom ";
				$search_sql_debug[] = " ".BUILDING_TABLE.".overall_nra >=".$_POST['overallNraFrom']." ";
			}
			
			if(!empty($_POST['overallNraTo'])){
				$search_sql[] = " ".BUILDING_TABLE.".overall_nra <=:overallNraTo ";
				$search_sql_debug[] = " ".BUILDING_TABLE.".overall_nra <=".$_POST['overallNraTo']." ";
			}
			
			if(!empty($_POST['yearBuiltFrom'])){
				$search_sql[] = " ".BUILDING_TABLE.".year_built_search >=:yearBuiltFrom ";
				$search_sql_debug[] = " ".BUILDING_TABLE.".year_built_search >=".$_POST['yearBuiltFrom']." ";
			}
			
			if(!empty($_POST['yearBuiltTo'])){
				$search_sql[] = " ".BUILDING_TABLE.".year_built_search <=:yearBuiltTo ";
				$search_sql_debug[] = " ".BUILDING_TABLE.".year_built_search <=".$_POST['yearBuiltTo']." ";
			}
			
			if(!empty($_POST['saledateFrom'])){
				$search_sql[] = " ".SALES_TRANSACTIONS_TABLE.".record_date >=:saledateFrom ";
				$search_sql_debug[] = " ".SALES_TRANSACTIONS_TABLE.".record_date >=".$_POST['saledateFrom']." ";
			}
			
			if(!empty($_POST['saledateTo'])){
				$search_sql[] = " ".SALES_TRANSACTIONS_TABLE.".record_date <=:saledateTo ";
				$search_sql_debug[] = " ".SALES_TRANSACTIONS_TABLE.".record_date <=".$_POST['saledateTo']." ";
			}
			
			if(!empty($_POST['salesPriceFrom'])){
				$search_sql[] = " ".SALES_TRANSACTIONS_TABLE.".sale_price >=:salesPriceFrom ";
				$search_sql_debug[] = " ".SALES_TRANSACTIONS_TABLE.".sale_price >=".$_POST['salesPriceFrom']." ";
			}
			
			if(!empty($_POST['salesPriceTo'])){
				$search_sql[] = " ".SALES_TRANSACTIONS_TABLE.".sale_price <=:salesPriceTo ";
				$search_sql_debug[] = " ".SALES_TRANSACTIONS_TABLE.".sale_price <=".$_POST['salesPriceTo']." ";
			}
			
			if(!empty($_POST['groundLeasePricePadFrom'])){
				$search_sql[] = " ".GROUND_LEASE_TABLE.".adj_price_sf_pad >=:groundLeasePricePadFrom ";
				$search_sql_debug[] = " ".GROUND_LEASE_TABLE.".adj_price_sf_pad >=".$_POST['groundLeasePricePadFrom']." ";
			}
			
			if(!empty($_POST['groundLeasePricePadTo'])){
				$search_sql[] = " ".GROUND_LEASE_TABLE.".adj_price_sf_pad <=:groundLeasePricePadTo ";
				$search_sql_debug[] = " ".GROUND_LEASE_TABLE.".adj_price_sf_pad <=".$_POST['groundLeasePricePadTo']." ";
			}
			
			
			if(!empty($_POST['adjPriceSFNetFrom'])){
				$search_sql[] = " ".SALES_TRANSACTIONS_TABLE.".adj_price_acre_gross >=:adjPriceSFNetFrom ";
				$search_sql_debug[] = " ".SALES_TRANSACTIONS_TABLE.".adj_price_acre_gross >=".$_POST['adjPriceSFNetFrom']." ";
			}
			
			if(!empty($_POST['adjPriceSFNetTo'])){
				$search_sql[] = " ".SALES_TRANSACTIONS_TABLE.".adj_price_acre_gross <=:adjPriceSFNetTo ";
				$search_sql_debug[] = " ".SALES_TRANSACTIONS_TABLE.".adj_price_acre_gross <=".$_POST['adjPriceSFNetTo']." ";
			}
			
			
			if(!empty($_POST['adjPriceSfGbaFrom'])){
				$search_sql[] = " ".SALES_TRANSACTIONS_TABLE.".adj_price_sf_gba >=:adjPriceSfGbaFrom ";
				$search_sql_debug[] = " ".SALES_TRANSACTIONS_TABLE.".adj_price_sf_gba >=".$_POST['adjPriceSfGbaFrom']." ";
			}
			
			if(!empty($_POST['adjPriceSfGbaTo'])){
				$search_sql[] = " ".SALES_TRANSACTIONS_TABLE.".adj_price_sf_gba <=:adjPriceSfGbaTo ";
				$search_sql_debug[] = " ".SALES_TRANSACTIONS_TABLE.".adj_price_sf_gba <=".$_POST['adjPriceSfGbaTo']." ";
			}

			if(!empty($_POST['capRateFrom'])){
				$search_sql[] = " ".SALES_TRANSACTIONS_TABLE.".cap_rate >=:capRateFrom ";
				$search_sql_debug[] = " ".SALES_TRANSACTIONS_TABLE.".cap_rate >=".$_POST['capRateFrom']." ";
			}
			
			if(!empty($_POST['capRateTo'])){
				$search_sql[] = " ".SALES_TRANSACTIONS_TABLE.".cap_rate <=:capRateTo ";
				$search_sql_debug[] = " ".SALES_TRANSACTIONS_TABLE.".cap_rate <=".$_POST['capRateTo']." ";
			}
			
			if(!empty($_POST['occupancy_type'])){
				$search_sql[] = " ".BUILDING_TABLE.".occupancy_type=:occupancy_type ";
				$search_sql_debug[] = " ".BUILDING_TABLE.".occupancy_type =".$_POST['occupancy_type']." ";
			}
			
			if(!empty($_POST['overallGbaFrom'])){
				$search_sql[] = " ".BUILDING_TABLE.".overall_gba >=:overallGbaFrom ";
				$search_sql_debug[] = " ".BUILDING_TABLE.".overall_gba >=".$_POST['overallGbaFrom']." ";
			}
			
			if(!empty($_POST['tenantAreaSFFrom'])){
				$search_sql[] = " ".LEASES_TRANSACTIONS_TABLE.".tenant_area_sf >=:tenantAreaSFFrom ";
				$search_sql_debug[] = " ".LEASES_TRANSACTIONS_TABLE.".tenant_area_sf >=".$_POST['tenantAreaSFFrom']." ";
			}
			
			if(!empty($_POST['tenantAreaSFTo'])){
				$search_sql[] = " ".LEASES_TRANSACTIONS_TABLE.".tenant_area_sf <=:tenantAreaSFTo ";
				$search_sql_debug[] = " ".LEASES_TRANSACTIONS_TABLE.".tenant_area_sf <=".$_POST['tenantAreaSFTo']." ";
			}
			
			if(!empty($_POST['overallGbaTo'])){
				$search_sql[] = " ".BUILDING_TABLE.".overall_gba <=:overallGbaTo ";
				$search_sql_debug[] = " ".BUILDING_TABLE.".overall_gba <=".$_POST['overallGbaTo']." ";
			}

			if(!empty($_POST['northEastLat']) && !empty($_POST['northEastLng']) && !empty($_POST['southWestLat']) && !empty($_POST['southWestLng'])){
				$search_sql[] = " (".PROPERTY_TABLE.".lat >=:southWestLat AND ".PROPERTY_TABLE.".lat <=:northEastLat AND ".PROPERTY_TABLE.".lng >=:southWestLng AND ".PROPERTY_TABLE.".lng <=:northEastLng) ";
				$search_sql_debug[] = " (".PROPERTY_TABLE.".lat >=".$_POST['southWestLat']." AND ".PROPERTY_TABLE.".lat <=".$_POST['northEastLat']." AND ".PROPERTY_TABLE.".lng >=".$_POST['southWestLng']." AND ".PROPERTY_TABLE.".lng <=".$_POST['northEastLng'].") ";
			}
			
			if(!empty($_POST['id'])){
				$search_sql[] = " (".REPORT_TABLE.".id=:id AND ".REPORT_TABLE.".isDeleted = 0)";
				$search_sql_debug[] = " (".REPORT_TABLE.".id=".intval($_POST['id'])." AND ".REPORT_TABLE.".isDeleted = 0 )";
			}

			if(!empty($_POST['cid'])){
				$search_sql[] = " (".CLIENTS_TABLE.".id =:cid AND ".REPORT_TABLE.".isDeleted = 0)";
				$search_sql_debug[] = " (".CLIENTS_TABLE.".id =".$_POST['cid']." AND ".REPORT_TABLE.".isDeleted = 0)";
			}
			
			if(!empty($_POST['pid'])){
				$search_sql[] = " (".REPORT_TABLE.".id=:pid AND ".REPORT_TABLE.".isDeleted = 0)";
				$search_sql_debug[] = " (".REPORT_TABLE.".pid=".intval($_POST['pid'])." AND ".REPORT_TABLE.".isDeleted = 0 )";
			}

			/*build the query, pieceby piece*/
			if(count($sql_fields)>0){
				$sql_fields_stmt.=" ".implode(",",$sql_fields)." ";
			}
			
			$tables_sql_stmt.=" FROM ".implode(" ",$tables_sql);
			
			if(count($search_sql)>0){
				//here we have an excpetion if a reportid is present we have an OR*/
				//if($_POST['method'] == 'mapmarker'){
				//if(!empty($_POST['id'])){
					//$search_sql_stmt.=" WHERE ".implode(" AND ",$search_sql_2);
				//}else
				//	if(!empty($_POST['cid'])){
				//	$search_sql_stmt.=" WHERE ".implode(" AND ",$search_sql_2);
				//}else{
					$search_sql_stmt.=" WHERE ".implode(" AND ",$search_sql) OR implode(" AND ",$search_sql_2);
				//}
			}

			$limit_sql = "";
			$sql_groupby = "";
			$orderBy_stmt = "ORDER BY ".REPORT_TABLE.".id DESC";

		
			$sql = 'SELECT '.$sql_fields_stmt.' '.$tables_sql_stmt.' '.$search_sql_stmt.' '.$sql_groupby.' '.$orderBy_stmt.' '.$limit_sql.' ' ;
			//$sql = 'SELECT COUNT('.REPORT_TABLE.".id".') '.$tables_sql_stmt.' '.$search_sql_stmt.' '.$sql_groupby.' '.$orderBy_stmt.' '.$limit_sql.' ' ;
			
			$stmt = $db->prepare($sql);
			//$stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			  
			/*assing variable for bind method statement*/
			if(!empty($_POST['ptid'])){
				//$properties = explode(",",$_POST['property']);
				$properties = $_POST['ptid'];
				for($i=0;$i<count($properties);$i++){
					$stmt->bindValue(':property'.$i,intval($properties[$i]), PDO::PARAM_INT);
				}
			}
			
			if(!empty($_POST['ptsid'])){
				$propertytypes = $_POST['ptsid'];
				for($i=0;$i<count($propertytypes);$i++){
					$stmt->bindValue(':ptsid'.$i,intval($propertytypes[$i]), PDO::PARAM_INT);
				}
			}
			
			if(!empty($_POST['gmid'])){
				//$markets = explode(",",$_POST['genmarket']);
				$markets = $_POST['gmid'];
				for($i=0;$i<count($markets);$i++){
					$stmt->bindValue(':market'.$i,intval($markets[$i]), PDO::PARAM_INT);
				}
			}
			
			if(!empty($_POST['sbmid'])){
				//$markets = explode(",",$_POST['market']);
				$submarkets = $_POST['sbmid'];
				for($i=0;$i<count($submarkets);$i++){
					$stmt->bindValue(':sbmid'.$i,intval($submarkets[$i]), PDO::PARAM_INT);
				}
			}
			
			if(!empty($_POST['lease_options'])){
				$lease_options = $_POST['lease_options'];
				for($i=0;$i<count($lease_options);$i++){
					$stmt->bindValue(':lease_options'.$i,intval($lease_options[$i]), PDO::PARAM_INT);
				}
			}
			
			if(!empty($_POST['new_renewal'])){
				$new_renewal = $_POST['new_renewal'];
				for($i=0;$i<count($new_renewal);$i++){
					$stmt->bindValue(':new_renewal'.$i,intval($new_renewal[$i]), PDO::PARAM_INT);
				}
			}
			
			if(!empty($_POST['space_position'])){
				$stmt->bindValue(':space_position',intval($_POST['space_position']), PDO::PARAM_INT);
			}
			
			if(!empty($_POST['grossLandAreaFrom'])){
				$stmt->bindValue(':grossLandAreaFrom',$_POST['grossLandAreaFrom'], PDO::PARAM_STR);
			}
			
			if(!empty($_POST['grossLandAreaTo'])){
				$stmt->bindValue(':grossLandAreaTo',$_POST['grossLandAreaTo'], PDO::PARAM_STR);
			}
			if(!empty($_POST['netLandAreaSFFrom'])){
				$stmt->bindValue(':netLandAreaSFFrom',$_POST['netLandAreaSFFrom'], PDO::PARAM_STR);
			}
			
			if(!empty($_POST['netLandAreaSFTo'])){
				$stmt->bindValue(':netLandAreaSFTo',$_POST['netLandAreaSFTo'], PDO::PARAM_STR);
			}
			if(!empty($_POST['grossLandAreaAcresFrom'])){
				$stmt->bindValue(':grossLandAreaAcresFrom',$_POST['grossLandAreaAcresFrom'], PDO::PARAM_STR);
			}
			
			if(!empty($_POST['grossLandAreaAcresTo'])){
				$stmt->bindValue(':grossLandAreaAcresTo',$_POST['grossLandAreaAcresTo'], PDO::PARAM_STR);
			}
			if(!empty($_POST['netLandAreaAcresFrom'])){
				$stmt->bindValue(':netLandAreaAcresFrom',$_POST['netLandAreaAcresFrom'], PDO::PARAM_STR);
			}
			
			if(!empty($_POST['netLandAreaAcresTo'])){
				$stmt->bindValue(':netLandAreaAcresTo',$_POST['netLandAreaAcresTo'], PDO::PARAM_STR);
			}
			if(!empty($_POST['groundLeaseFrom'])){
				$stmt->bindValue(':groundLeaseFrom',$_POST['groundLeaseFrom'], PDO::PARAM_STR);
			}
			
			if(!empty($_POST['groundLeaseTo'])){
				$stmt->bindValue(':groundLeaseTo',$_POST['groundLeaseTo'], PDO::PARAM_STR);
			}

			if(!empty($_POST['leaseTransactionFrom'])){
				$stmt->bindValue(':leaseTransactionFrom',$_POST['leaseTransactionFrom'], PDO::PARAM_STR);
			}
			
			if(!empty($_POST['leaseTransactionTo'])){
				$stmt->bindValue(':leaseTransactionTo',$_POST['leaseTransactionTo'], PDO::PARAM_STR);
			}
			
			if(!empty($_POST['groundLease'])){
				$stmt->bindValue(':groundLease',$_POST['groundLease'], PDO::PARAM_INT);
			}
			
			if(!empty($_POST['pendingSalePriceFrom'])){
				$stmt->bindValue(':pendingSalePriceFrom',$_POST['pendingSalePriceFrom'], PDO::PARAM_STR);
			}
			
			if(!empty($_POST['pendingSalePriceTo'])){
				$stmt->bindValue(':pendingSalePriceTo',$_POST['pendingSalePriceTo'], PDO::PARAM_STR);
			}
			if(!empty($_POST['DueDateTo'])){
				$stmt->bindValue(':DueDateTo',$_POST['DueDateTo'], PDO::PARAM_STR);
			}
			if(!empty($_POST['DueDateFrom'])){
				$stmt->bindValue(':DueDateFrom',$_POST['DueDateFrom'], PDO::PARAM_STR);
			}
			if(!empty($_POST['overallGbaFrom'])){
				$stmt->bindValue(':overallGbaFrom',$_POST['overallGbaFrom'], PDO::PARAM_STR);
			}
			
			if(!empty($_POST['overallGbaTo'])){
				$stmt->bindValue(':overallGbaTo',$_POST['overallGbaTo'], PDO::PARAM_STR);
			}
			
			if(!empty($_POST['overallNraFrom'])){
				$stmt->bindValue(':overallNraFrom',$_POST['overallNraFrom'], PDO::PARAM_STR);
			}
			
			if(!empty($_POST['overallNraTo'])){
				$stmt->bindValue(':overallNraTo',$_POST['overallNraTo'], PDO::PARAM_STR);
			}
			
			if(!empty($_POST['yearBuiltFrom'])){
				$stmt->bindValue(':yearBuiltFrom',$_POST['yearBuiltFrom'], PDO::PARAM_INT);
			}
			
			if(!empty($_POST['yearBuiltTo'])){
				$stmt->bindValue(':yearBuiltTo',$_POST['yearBuiltTo'], PDO::PARAM_INT);
			}
			
			if(!empty($_POST['saledateFrom'])){
				$stmt->bindValue(':saledateFrom',$_POST['saledateFrom'], PDO::PARAM_INT);
			}
			
			if(!empty($_POST['saledateTo'])){
				$stmt->bindValue(':saledateTo',$_POST['saledateTo'], PDO::PARAM_INT);
			}
			
			if(!empty($_POST['salesPriceFrom'])){
				$stmt->bindValue(':salesPriceFrom',$_POST['salesPriceFrom'], PDO::PARAM_INT);
			}
			
			if(!empty($_POST['salesPriceTo'])){
				$stmt->bindValue(':salesPriceTo',$_POST['salesPriceTo'], PDO::PARAM_INT);
			}
			
			if(!empty($_POST['groundLeasePricePadFrom'])){
				$stmt->bindValue(':groundLeasePricePadFrom',$_POST['groundLeasePricePadFrom'], PDO::PARAM_INT);
			}
			
			if(!empty($_POST['groundLeasePricePadTo'])){
				$stmt->bindValue(':groundLeasePricePadTo',$_POST['groundLeasePricePadTo'], PDO::PARAM_INT);
			}

			if(!empty($_POST['adjPriceSFNetFrom'])){
				$stmt->bindValue(':adjPriceSFNetFrom',$_POST['adjPriceSFNetFrom'], PDO::PARAM_INT);
			}
			
			if(!empty($_POST['adjPriceSFNetTo'])){
				$stmt->bindValue(':adjPriceSFNetTo',$_POST['adjPriceSFNetTo'], PDO::PARAM_INT);
			}
			
			if(!empty($_POST['occupancy_type'])){
				$stmt->bindValue(':occupancy_type',$_POST['occupancy_type'], PDO::PARAM_INT);
			}
			
			if(!empty($_POST['adjPriceSfGbaFrom'])){
				$stmt->bindValue(':adjPriceSfGbaFrom',$_POST['adjPriceSfGbaFrom'], PDO::PARAM_INT);
			}
			
			if(!empty($_POST['adjPriceSfGbaTo'])){
				$stmt->bindValue(':adjPriceSfGbaTo',$_POST['adjPriceSfGbaTo'], PDO::PARAM_INT);
			}
			
			if(!empty($_POST['capRateFrom'])){
				$stmt->bindValue(':capRateFrom',$_POST['capRateFrom'], PDO::PARAM_STR);
			}
			
			if(!empty($_POST['capRateTo'])){
				$stmt->bindValue(':capRateTo',$_POST['capRateTo'], PDO::PARAM_STR);
			}
			
			if(!empty($_POST['tenantAreaSFFrom'])){
				$stmt->bindValue(':tenantAreaSFFrom',$_POST['tenantAreaSFFrom'], PDO::PARAM_STR);
			}
			
			if(!empty($_POST['tenantAreaSFTo'])){
				$stmt->bindValue(':tenantAreaSFTo',$_POST['tenantAreaSFTo'], PDO::PARAM_STR);
			}
			
			if(!empty($_POST['FK_ReportTypeID'])){
				$stmt->bindValue(':FK_ReportTypeID',$_POST['FK_ReportTypeID'], PDO::PARAM_INT);
			}
			
			if(!empty($_POST['effRentSFYearFrom'])){
				$stmt->bindValue(':effRentSFYearFrom',$_POST['effRentSFYearFrom'], PDO::PARAM_INT);
			}
			
			if(!empty($_POST['effRentSFYearTo'])){
				$stmt->bindValue(':effRentSFYearTo',$_POST['effRentSFYearTo'], PDO::PARAM_INT);
			}
			if(!empty($_POST['effRentShellFrom'])){
				$stmt->bindValue(':effRentShellFrom',$_POST['effRentShellFrom'], PDO::PARAM_INT);
			}
			
			if(!empty($_POST['effRentShellTo'])){
				$stmt->bindValue(':effRentShellTo',$_POST['effRentShellTo'], PDO::PARAM_INT);
			}
			
			if(!empty($_POST['northEastLat']) && !empty($_POST['northEastLng']) && !empty($_POST['southWestLat']) && !empty($_POST['southWestLng'])){
				$stmt->bindValue(':southWestLat',$_POST['southWestLat'], PDO::PARAM_STR);
				$stmt->bindValue(':northEastLat',$_POST['northEastLat'], PDO::PARAM_STR);
				$stmt->bindValue(':southWestLng',$_POST['southWestLng'], PDO::PARAM_STR);
				$stmt->bindValue(':northEastLng',$_POST['northEastLng'], PDO::PARAM_STR);
			}
			
			if(!empty($_POST['id'])){
				$stmt->bindValue(':id',intval($_POST['id']), PDO::PARAM_INT);
			}
			
			if(!empty($_POST['cid'])){
				$stmt->bindValue(':cid',intval($_POST['cid']), PDO::PARAM_INT);
			}
			
			if(!empty($_POST['pid'])){
				$stmt->bindValue(':pid',intval($_POST['pid']), PDO::PARAM_INT);
			}

			/*FOR DEBUG START*/
			$search_sql_stmt_debug = "";
			if(count($search_sql)>0){
				//if(!empty($_POST['id'])){
				//	$search_sql_stmt_debug.=" WHERE ".implode(" AND ",$search_sql_2_debug);
				//}else
				//	if(!empty($_POST['cid'])){
				//	$search_sql_stmt_debug.=" WHERE ".implode(" AND ",$search_sql_2_debug);
				//}else{
					$search_sql_stmt_debug.=" WHERE ".implode(" AND ",$search_sql_debug) OR implode(" AND ",$search_sql_2_debug);
				//}
			}

			$sqlDebug = 'SELECT '.$sql_fields_stmt.' '.$tables_sql_stmt.' '.$search_sql_stmt_debug.' '.$sql_groupby.' '.$orderBy_stmt.' '.$limit_sql.' ' ;

			//echo $sqlDebug;
			/*FOR DEBUG END*/
			
			/*$data = array();
			$jStr = "";
			try {
				$stmt->execute();
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
				  $data[] = json_encode($row);
				  //$jStr.=json_encode($row).",";
				  //print_r($row);
				}
				$stmt = null;
			  }
			  catch (PDOException $e) {
				print $e->getMessage();
			  }
			*/

			$stmt->execute();
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

			//echo "HERE";
			

			/*
			$property = $_POST['property'];
			$market = $_POST['market'];
			
			$landFrom = $_POST['grossLandAreaFrom'];
			$landTo = $_POST['grossLandAreaTo'];

			$saleFrom = $_POST['saledateFrom'];
			$saleTo = $_POST['saledateTo'];

			$northEastLat = $_POST['northEastLat'];
            $northEastLng = $_POST['northEastLng'];
            $southWestLat = $_POST['southWestLat'];
            $southWestLng = $_POST['southWestLng'];

			$reportID = intval($_POST['reportid']);


			
			$condition = array("a.isDeleted = 0","a.FK_ReportTypeID = 1");
			if(!empty($property)){
				array_push($condition,'b.propertytype IN('.$property.')');
			}

			if(!empty($market)){
				array_push($condition,'b.genmarket IN('.$market.')');
			}

			if(!empty($landFrom) ){
				array_push($condition,'b.gross_land_sf>='.$landFrom );
			}
			if(!empty($landTo) ){
				array_push($condition,'b.gross_land_sf<='.$landTo );
			}

			if(!empty($saleFrom) ){
				array_push($condition,'g.record_date>='.$saleFrom);
			}
			if(!empty($saleTo) ){
				array_push($condition,'g.record_date<='.$saleTo );
			}

            if(!empty($northEastLat) && !empty($northEastLng) && !empty($southWestLat) && !empty($southWestLng)){
            	array_push($condition,' (b.lat >= '.$southWestLat.' AND b.lat <= '.$northEastLat.' AND b.lng >= '.$southWestLng.' AND b.lng <= '.$northEastLng.')');
            }

			$condition = implode(" AND ",$condition);

			if(!empty($reportID) ){
				if($_POST['property']!='' || $_POST['market']!=''){
					$condition = "(".$condition.") OR (a.id=".$reportID." AND a.isDeleted = 0 AND a.FK_ReportTypeID = 1)";
				}else{
					$condition = "a.id=".$reportID." AND a.isDeleted = 0 AND a.FK_ReportTypeID = 1";
				}
				
			}
			
			$query = "SELECT a.id, a.reportname, DATE_FORMAT(a.DueDate,'%M %e %Y') as DueDate, CONCAT(m.firstname,' ' ,m.lastname) as AssignedTo, b.lat, b.lng, b.property_name, b.address, b.city, b.state, b.county, b.submarket, if(b.photo1 = '','no-photo.jpg',CONCAT(a.id,'/',b.photo1)) as photo1, if(b.thumbnail = '','no-photo-tn.jpg',CONCAT(a.id,'/',b.thumbnail)) as thumbnail, FORMAT(b.gross_land_sf,0) as gross_land_sf, g.record_date, g.sale_price, b.zoning_code, b.zoning_desc, b.propertysubtype as ptsid, c.proptypedbname, c.id as propertytypeid,b.submarkid, d.genmarketdbname, b.state
						FROM report a
						LEFT JOIN property b on b.FK_ReportID = a.id
						LEFT JOIN saletrans g on g.FK_ReportID = a.id
						LEFT JOIN building f on f.FK_ReportID = a.id
						LEFT JOIN propertytype c on c.id = b.propertytype
						LEFT JOIN genmarket d on d.id = b.genmarket
						LEFT JOIN WFUsers m on a.AssignedTo = m.id
						WHERE ".$condition." order by a.id DESC";

			$result = mysqli_query($conn, $query);
			if (!$result) {
				die('Invalid query: ' . mysqli_error($conn));
			}

			$data = array();
			
			while ($row = @mysqli_fetch_assoc($result)){
				$data[] = $row;
			}

			//die();
			// echo count($data);die;
			*/
			$jStr = json_encode(array('status' => 'ok', 'data' => $data));
			echo $jStr;
			//$jStr = substr($jStr,0,strlen($jStr)-1);
			//echo strlen($jStr);
			//echo '{"status":"ok","data":['.$jStr.']}';
			//die();
		}else{
			echo json_encode(array('status' => 'notPropertySelect' ));die();	
		}
	//}

	/*if(isset($_POST['method']) && $_POST['method'] == 'polygonfilter')
	{
		if($_POST['poly'] != '')
		{
			$poly = $_POST['poly'];
			print_r($poly);die;

			$condition = false;

			if(!empty($property))
			{
				$condition .= ' b.propertytype IN('. $property .') AND';
			}

			

			if($condition == false)
			{
				$condition = 1;
			}
			else
			{
				$condition = trim($condition, 'AND')	;
			}

			$query = "SELECT a.id, a.reportname, DATE_FORMAT(a.DueDate,'%M %e %Y') as DueDate, CONCAT(m.firstname,' ' ,m.lastname) as AssignedTo, b.lat, b.lng, b.property_name, b.address, b.city, b.state, b.county, b.submarket, if(b.photo1 = '','no-photo.jpg',CONCAT(a.id,'/',b.photo1)) as photo1, if(b.thumbnail = '','no-photo-tn.jpg',CONCAT(a.id,'/',b.thumbnail)) as thumbnail, FORMAT(b.gross_land_sf,0) as gross_land_sf, g.record_date, g.sale_price, b.zoning_code, b.zoning_desc, c.proptypedbname, d.genmarketdbname, b.state
						FROM report a
						LEFT JOIN property b on b.FK_ReportID = a.id
						LEFT JOIN saletrans g on g.FK_ReportID = a.id
						LEFT JOIN building f on f.FK_ReportID = a.id
						LEFT JOIN propertytype c on c.id = b.propertytype
						LEFT JOIN genmarket d on d.id = b.genmarket
						LEFT JOIN WFUsers m on a.AssignedTo = m.id
						WHERE a.isDeleted = 0 AND ". $condition ." AND a.FK_ReportTypeID = 1 order by a.id DESC";

			$result = mysqli_query($conn, $query);
			if (!$result) {
				die('Invalid query: ' . mysql_error());
			}

			$data = array();
			while ($row = @mysqli_fetch_assoc($result))
			{
				$data[] = $row;
			}
			// echo count($data);die;
			echo json_encode(array('status' => 'ok', 'data' => $data));die();
		}
		else
		{
			echo json_encode(array('status' => 'notPropertySelect' ));die();	
		}
	}
	*/
	/*
	if(isset($_POST['method']) && $_POST['method'] == 'mapmarkerReport'){
		if($_POST['reportid']!=''){
			
			$reportid = intval($_POST['reportid']);
			
			$condition = array("a.isDeleted = 0","a.FK_ReportTypeID = 1");
			if(!empty($reportid)){
				array_push($condition,"a.id ='".$reportid."'");
			}

			$condition = implode(" AND ",$condition);

			$query = "SELECT a.id, a.reportname, DATE_FORMAT(a.DueDate,'%M %e %Y') as DueDate, CONCAT(m.firstname,' ' ,m.lastname) as AssignedTo, b.lat, b.lng, b.property_name, b.address, b.city, b.state, b.county, b.submarket, if(b.photo1 = '','no-photo.jpg',CONCAT(a.id,'/',b.photo1)) as photo1, if(b.thumbnail = '','no-photo-tn.jpg',CONCAT(a.id,'/',b.thumbnail)) as thumbnail, FORMAT(b.gross_land_sf,0) as gross_land_sf, g.record_date, g.sale_price, b.zoning_code, b.zoning_desc, b.propertysubtype as ptsid, c.proptypedbname, c.id as propertytypeid,b.submarkid, d.genmarketdbname, b.state
						FROM report a
						LEFT JOIN property b on b.FK_ReportID = a.id
						LEFT JOIN saletrans g on g.FK_ReportID = a.id
						LEFT JOIN building f on f.FK_ReportID = a.id
						LEFT JOIN propertytype c on c.id = b.propertytype
						LEFT JOIN genmarket d on d.id = b.genmarket
						LEFT JOIN WFUsers m on a.AssignedTo = m.id
						WHERE ".$condition." order by a.id DESC";

			$result = mysqli_query($conn, $query);
			if (!$result) {
				die('Invalid query: ' . mysqli_error($conn));
			}

			$data = array();
			
			while ($row = @mysqli_fetch_assoc($result)){
				$data[] = $row;
			}
			echo json_encode(array('status' => 'ok', 'data' => $data));die();
		}
		else
		{
			echo json_encode(array('status' => 'notPropertySelect' ));die();	
		}
	}*/
?>