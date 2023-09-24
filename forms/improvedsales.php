<?php
date_default_timezone_set('America/Los_Angeles');
error_reporting(E_ALL);
ini_set('display_errors', TRUE); 

require("../../../includes/connectPDO.php");
include("../../../includes/check.php");
require("../config/databaseTables.php");

require("classes/improvedsales.php");
require("classes/assessedvalue.php");
require("classes/mfvalue.php");
require("classes/dataSourceController.php");
require("classes/improvedSalesDBController.php");
require("classes/rbe_mediaUtilities.php");

$improvedsales = new improvedsales();


if(isset($_POST['submit'])){
    $keys = array_keys($_POST);
    for($k=0;$k<count($keys);$k++){
        $method = "set".$keys[$k];
        if(method_exists($improvedsales,$method)){
            $improvedsales->$method($_POST[$keys[$k]]);
        }  
    }
    
    if(empty($user_id)){
        $user_id = 1;
    }else{
        $user_id = $user_id;
    }
    
	$yearbuilt = preg_replace('~\D~','', $_POST['year_built']);
    $improvedsales->setGla_inputsize(str_replace(',','', $_POST['gla_inputsize']));
    $improvedsales->setGross_land_sf(str_replace(',','', $_POST['gross_land_sf']));
    $improvedsales->setGross_land_acre(str_replace(',','', $_POST['gross_land_acre']));;
    $improvedsales->setPrimary_sf(str_replace(',','', $_POST['primary_sf']));
    $improvedsales->setPrimary_acre(str_replace(',','', $_POST['primary_acre']));
    $improvedsales->setUnusable_sf(str_replace(',','', $_POST['unusable_sf']));
    $improvedsales->setUnusable_acre(str_replace(',','', $_POST['unusable_acre']));
    $improvedsales->setSurplus_sf(str_replace(',','', $_POST['surplus_sf']));
    $improvedsales->setSurplus_acre(str_replace(',','', $_POST['surplus_acre']));
    $improvedsales->setExcess_sf(str_replace(',','', $_POST['excess_sf']));
    $improvedsales->setExcess_acre(str_replace(',','', $_POST['excess_acre']));
    $improvedsales->setNet_usable_sf(str_replace(',','', $_POST['net_usable_sf']));
    $improvedsales->setNet_usable_acre(str_replace(',','', $_POST['net_usable_acre']));
    $improvedsales->setFloor_1_gba(str_replace(',','', $_POST['floor_1_gba']));
    $improvedsales->setFloor_2_gba(str_replace(',','', $_POST['floor_2_gba']));
	$improvedsales->setYear_built_search(substr($yearbuilt, 0, 4));
    $improvedsales->setTotal_basement_gba(str_replace(',','', $_POST['total_basement_gba']));
    $improvedsales->setBasement_pct_gba(str_replace(array(',',' %'),'', $_POST['basement_pct_gba']));
    $improvedsales->setOverall_gba(str_replace(',','', $_POST['overall_gba']));
    $improvedsales->setFloor_1_nra(str_replace(',','', $_POST['floor_1_nra']));
    $improvedsales->setFloor_2_nra(str_replace(',','', $_POST['floor_2_nra']));
    $improvedsales->setTotal_basement_nra(str_replace(',','', $_POST['total_basement_nra']));
    $improvedsales->setBasement_pct_nra(str_replace(array(',',' %'),'', $_POST['basement_pct_nra']));
    $improvedsales->setOverall_nra(str_replace(',','', $_POST['overall_nra']));
    $improvedsales->setStorage_basement_sf(str_replace(',','', $_POST['storage_basement_sf']));
    $improvedsales->setAncillary_area_sf(str_replace(',','', $_POST['ancillary_area_sf']));
    $improvedsales->setLand_build_ratio_overall(str_replace(',','', $_POST['land_build_ratio_overall']));
    $improvedsales->setLand_build_ratio_primary(str_replace(',','', $_POST['land_build_ratio_primary']));
    $improvedsales->setLand_build_usable(str_replace(',','', $_POST['land_build_usable']));
    $improvedsales->setEff_ratio_pct_nra(str_replace(',','', $_POST['eff_ratio_pct_nra']));
    $improvedsales->setSite_cover_overall(str_replace(',','', $_POST['site_cover_overall']));
    $improvedsales->setSite_cover_primary(str_replace(',','', $_POST['site_cover_primary']));
    $improvedsales->setFloor_area_ratio(str_replace(',','', $_POST['floor_area_ratio']));
    $improvedsales->setParking_stalls(str_replace(',','', $_POST['parking_stalls']));
    $improvedsales->setParking_ratio_nra(str_replace(',','', $_POST['parking_ratio_nra']));
    $improvedsales->setParking_ratio_gba(str_replace(',','', $_POST['parking_ratio_gba']));
    $improvedsales->setOe_pgr(str_replace(array('$ ',','),'', $_POST['oe_pgr']));
    $improvedsales->setOe_cam_income(str_replace(array('$ ',','),'', $_POST['oe_cam_income']));
    $improvedsales->setOe_misc_income(str_replace(array('$ ',','),'', $_POST['oe_misc_income']));
    $improvedsales->setOe_pgi(str_replace(array('$',' ',',',' %'),'', $_POST['oe_pgi']));
    $improvedsales->setOe_vacany_pct(str_replace(array('$ ',','),'', $_POST['oe_vacany_pct']));
    $improvedsales->setOe_vacancy_credit_loss(str_replace(array('$ ',','),'', $_POST['oe_vacancy_credit_loss']));
    $improvedsales->setOe_other_income(str_replace(array('$ ',','),'', $_POST['oe_other_income']));
    $improvedsales->setOe_egi(str_replace(array('$ ',','),'', $_POST['oe_egi']));
    $improvedsales->setOe_expences(str_replace(array('$ ',','),'', $_POST['oe_expences']));
    $improvedsales->setOe_total_other_income(str_replace(array('$ ',','),'', $_POST['oe_total_other_income']));
    $improvedsales->setOe_total_noi(str_replace(array('$ ',','),'', $_POST['oe_total_noi']));
    $improvedsales->setOe_pgr_sf_nra(str_replace(array('$ ',','),'', $_POST['oe_pgr_sf_nra']));
    $improvedsales->setOe_cam_sf_nra(str_replace(array('$ ',','),'', $_POST['oe_cam_sf_nra']));
    $improvedsales->setPgi_sf_nra(str_replace(array('$ ',','),'', $_POST['pgi_sf_nra']));
    $improvedsales->setVacancy_sf_nra(str_replace(array('$ ',','),'', $_POST['vacancy_sf_nra']));
    $improvedsales->setEgi_sf_nra(str_replace(array('$ ',','),'', $_POST['egi_sf_nra']));
    $improvedsales->setExpence_sf_nra(str_replace(array('$ ',','),'', $_POST['expence_sf_nra']));
    $improvedsales->setOe_noi_sf_nra(str_replace(array('$ ',','),'', $_POST['oe_noi_sf_nra']));
    $improvedsales->setOe_expence_ratio(str_replace(array(',',' %'),'', $_POST['oe_expence_ratio']));
    $improvedsales->setSale_price(str_replace(array('$ ',','),'', $_POST['sale_price']));
    $improvedsales->setList_price_avail(isset($conn, $_POST['list_price_avail']));
    $improvedsales->setList_price(str_replace(array('$ ',','),'', $_POST['list_price']));
    $improvedsales->setList_price_change(str_replace(array(',',' %'),'', $_POST['list_price_change']));
    $improvedsales->setFin_term_adj(str_replace(array('$ ',','),'', $_POST['fin_term_adj']));
    $improvedsales->setCash_equiv_price(str_replace(array('$ ',','),'', $_POST['cash_equiv_price']));
    $improvedsales->setCond_sale_adj(str_replace(array('$ ',','),'', $_POST['cond_sale_adj']));
    $improvedsales->setExcess_surpluss_sf(str_replace(',','', $_POST['excess_surpluss_sf']));
    $improvedsales->setExcess_surplus_value(str_replace(array('$ ',','),'', $_POST['excess_surplus_value']));
    $improvedsales->setDefer_maint_cost(str_replace(array('$ ',','),'', $_POST['defer_maint_cost']));
    $improvedsales->setAdd_ti_cost(str_replace(array('$ ',','),'', $_POST['add_ti_cost']));
    $improvedsales->setBroker_cost(str_replace(array('$ ',','),'', $_POST['broker_cost']));
    $improvedsales->setStabil_cost(str_replace(array('$ ',','),'', $_POST['stabil_cost']));
    $improvedsales->setEff_sale_price_actual(str_replace(array('$ ',','),'', $_POST['eff_sale_price_actual']));
    $improvedsales->setEff_sale_price_stab(str_replace(array('$ ',','),'', $_POST['eff_sale_price_stab']));
    $improvedsales->setValue_ffe(str_replace(array('$ ',','),'', $_POST['value_ffe']));
    $improvedsales->setTotal_value_ffe(str_replace(array('$ ',','),'', $_POST['total_value_ffe']));
    $improvedsales->setUnderlying_land_value_primary(str_replace(array('$ ',','),'', $_POST['underlying_land_value_primary']));
    $improvedsales->setAlloc_land_value(str_replace(array('$ ',','),'', $_POST['alloc_land_value']));
    $improvedsales->setAlloc_imp_value(str_replace(array('$ ',','),'', $_POST['alloc_imp_value']));
    $improvedsales->setReplace_cost(str_replace(array('$ ',','),'', $_POST['replace_cost']));
    $improvedsales->setEst_rcn(str_replace(array('$ ',','),'', $_POST['est_rcn']));
    $improvedsales->setLess_alloc_imp_price(str_replace(array('$ ',','),'', $_POST['less_alloc_imp_price']));
    $improvedsales->setDepreciation_all_sources(str_replace(array('$ ',','),'', $_POST['depreciation_all_sources']));
    $improvedsales->setImplied_total_pct_deprec(str_replace(array(',',' %'),'', $_POST['implied_total_pct_deprec']));
    $improvedsales->setPhysical_depreciation(str_replace(array(',',' %'),'', $_POST['physical_depreciation']));
    $improvedsales->setInplied_func_obsol(str_replace(array(',',' %'),'', $_POST['inplied_func_obsol']));
    $improvedsales->setShop_total_gba(str_replace(',','', $_POST['shop_total_gba']));
    $improvedsales->setShop_inline_sf(str_replace(',','', $_POST['shop_inline_sf']));
    $improvedsales->setShop_anchor_sf(str_replace(',','', $_POST['shop_anchor_sf']));
    $improvedsales->setShop_total_nra(str_replace(',','', $_POST['shop_total_nra']));
    $improvedsales->setShop_inline_pct(str_replace(array(',',' %'),'', $_POST['shop_inline_pct']));
    $improvedsales->setShop_anchor_pct(str_replace(array(',',' %'),'', $_POST['shop_anchor_pct']));
    $improvedsales->setStore_avg_month_gallon(str_replace(',','', $_POST['store_avg_month_gallon']));
    $improvedsales->setStore_month_store_sales(str_replace(array('$ ',','),'', $_POST['store_month_store_sales']));
    $improvedsales->setStore_month_car_wash_sales(str_replace(array('$ ',','),'', $_POST['store_month_car_wash_sales']));
    $improvedsales->setStore_month_mini_sales(str_replace(array('$ ',','),'', $_POST['store_month_mini_sales']));
    
    $improvedsales->setStore_total_month_sales(str_replace(array('$ ',','),'', $_POST['store_total_month_sales']));
    $improvedsales->setVeh_showroom_pct(str_replace(array(',',' %'),'', $_POST['veh_showroom_pct']));
    $improvedsales->setVeh_showroom_sf(str_replace(',','', $_POST['veh_showroom_sf']));
    $improvedsales->setVeh_service_sf(str_replace(',','', $_POST['veh_service_sf']));
    $improvedsales->setInd_int_office_1(str_replace(',','', $_POST['ind_int_office_1']));
    $improvedsales->setInd_int_office_2(str_replace(',','', $_POST['ind_int_office_2']));
    $improvedsales->setInd_total_office(str_replace(',','', $_POST['ind_total_office']));
    $improvedsales->setInd_storage_mezz_sf(str_replace(',','', $_POST['ind_storage_mezz_sf']));
    $improvedsales->setInd_ext_office_1(str_replace(',','', $_POST['ind_ext_office_1']));
    $improvedsales->setInd_ext_office_2(str_replace(',','', $_POST['ind_ext_office_2']));
    $improvedsales->setInd_pct_office(str_replace(array(',',' %'),'', $_POST['ind_pct_office']));
    $improvedsales->setTotal_bedroom(str_replace(',','', $_POST['total_bedroom']));
    $improvedsales->setBedroom_ratio(str_replace(array(',',' %'),'', $_POST['bedroom_ratio']));
    $improvedsales->setParking_ratio_unit(str_replace(array(',',' %'),'', $_POST['parking_ratio_unit']));
    $improvedsales->setAvg_month_rent_unit(str_replace(array('$ ',','),'', $_POST['avg_month_rent_unit']));
    $improvedsales->setAvg_month_rent_sf(str_replace(array('$ ',','),'', $_POST['avg_month_rent_sf']));
    $improvedsales->setTotal_rooms(str_replace(',','', $_POST['total_rooms']));
    $improvedsales->setDensity(str_replace(',','', $_POST['density']));
    $improvedsales->setTotal_storage_units(str_replace(',','', $_POST['total_storage_units']));
    $improvedsales->setAvg_unit_size(str_replace(',','', $_POST['avg_unit_size']));
    $improvedsales->setTotal_no_units(str_replace(',','', $_POST['total_no_units']));
    $improvedsales->setPgi_unit(str_replace(array('$ ',','),'', $_POST['pgi_unit']));
    $improvedsales->setExpense_unit(str_replace(array('$ ',','),'', $_POST['expense_unit']));
    $improvedsales->setVacancy_unit(str_replace(array('$ ',','),'', $_POST['vacancy_unit']));
    $improvedsales->setNoi_unit(str_replace(array('$ ',','),'', $_POST['noi_unit']));
    $improvedsales->setEgi_unit(str_replace(array('$ ',','),'', $_POST['egi_unit']));
    $improvedsales->setNo_single_wide(str_replace(',','', $_POST['no_single_wide']));
    $improvedsales->setNo_double_wide(str_replace(',','', $_POST['no_double_wide']));
    $improvedsales->setNo_triple_wide(str_replace(',','', $_POST['no_triple_wide']));
    $improvedsales->setNo_rv_space(str_replace(',','', $_POST['no_rv_space']));
    $improvedsales->setNo_other_building(str_replace(',','', $_POST['no_other_building']));
    $improvedsales->setSpace_acre(str_replace(',','', $_POST['space_acre']));
    $improvedsales->setExpense_space(str_replace(array('$ ',','),'', $_POST['expense_space']));
    $improvedsales->setPgi_space(str_replace(array('$ ',','),'', $_POST['pgi_space']));
    $improvedsales->setVacancy_space(str_replace(array('$ ',','),'', $_POST['vacancy_space']));
    $improvedsales->setEgi_space(str_replace(array('$ ',','),'', $_POST['egi_space']));
    $improvedsales->setNoi_space(str_replace(array('$ ',','),'', $_POST['noi_space']));
    $improvedsales->setPrice_space(str_replace(array('$ ',','),'', $_POST['price_space']));
    $improvedsales->setAdj_price_sf_gba(str_replace(array('$ ',','),'', $_POST['adj_price_sf_gba']));
    $improvedsales->setAdj_price_sf_nra(str_replace(array('$ ',','),'', $_POST['adj_price_sf_nra']));
    $improvedsales->setAlloc_imp_value_sf_gba(str_replace(array('$ ',','),'', $_POST['alloc_imp_value_sf_gba']));
    $improvedsales->setAlloc_imp_value_sf_nra(str_replace(array('$ ',','),'', $_POST['alloc_imp_value_sf_nra']));
    $improvedsales->setAdj_price_unit(str_replace(array('$ ',','),'', $_POST['adj_price_unit']));
    $improvedsales->setAdj_price_tunnel(str_replace(array('$ ',','),'', $_POST['adj_price_tunnel']));
    $improvedsales->setFuel_sales_mult(str_replace(array('$ ',','),'', $_POST['fuel_sales_mult']));
    $improvedsales->setStore_sales_mult(str_replace(array('$ ',','),'', $_POST['store_sales_mult']));
    $improvedsales->setCap_rate(str_replace(array(',',' %'),'', $_POST['cap_rate']));
    $improvedsales->setPgim(str_replace(',','', $_POST['pgim']));
    $improvedsales->setEgim(str_replace(',','', $_POST['egim']));
    $improvedsales->setRmvland(str_replace(array('$',','),"",$improvedsales->getRmvland()));
    $improvedsales->setRmvimp(str_replace(array('$',','),"",$improvedsales->getRmvimp()));
    $improvedsales->setRmvtotal(str_replace(array('$',','),"",$improvedsales->getRmvtotal()));
    $improvedsales->setTaxes(str_replace(array('$',','),"",$improvedsales->getTaxes()));	
    $improvedsales->setSfbedroom(str_replace(',','', $_POST['sfbedroom']));
    $improvedsales->setSffullbath(str_replace(',','', $_POST['sffullbath']));
    $improvedsales->setSfhalfbath(str_replace(',','', $_POST['sfhalfbath']));
    
    
    $mfvalues = array();
	if(isset($_POST['mfsize'])){
		for($i=0;$i<count($_POST['mfsize']);$i++){
			$mfvalue = new mfvalue();
			$mfvalue->setid($_POST['mfvalueid'][$i]);
			$mfvalue->setMfsize($_POST['mfsize'][$i]);
			$mfvalue->setMfnounits(str_replace(array('$','%',',',' '),'', $_POST['mfnounits'][$i]));
			$mfvalue->setMftotalsf(str_replace(array(',',' '),'', $_POST['mftotalsf'][$i]));
			$mfvalue->setMfrent(str_replace(array('$','%',',',' '),'', $_POST['mfrent'][$i]));
			$mfvalue->setMfrentsf(str_replace(array('$','%',',',' '),'', $_POST['mfrentsf'][$i]));
			$mfvalue->setMfnobr(str_replace(array('$','%',',',' '),'', $_POST['mfnobr'][$i]));
			$mfvalues[] = $mfvalue;
		}
	}
	$improvedsales->setMfvalues($mfvalues);

    $improvedsales->setDocData(array());
    if($_POST['docData']!=""){
        $improvedsales->setDocData(json_decode($_POST['docData']));
    }
    
    $assessedvalues = array();
	if(isset($_POST['mappage'])){
		for($i=0;$i<count($_POST['mappage']);$i++){
			$assessedvalue = new assessedvalue();
			$assessedvalue->setid($_POST['assessedvalueid'][$i]);
			$assessedvalue->setMappage($_POST['mappage'][$i]);
			$assessedvalue->setTaxlot($_POST['taxlot'][$i]);
			$assessedvalue->setParcelno($_POST['parcelno'][$i]);
			$assessedvalue->setAssessedglasf(str_replace(array(',',' '),'', $_POST['assessedglasf'][$i]));
			$assessedvalue->setMarketland(str_replace(array('$','%',',',' '),'', $_POST['marketland'][$i]));
			$assessedvalue->setMarketimp(str_replace(array('$','%',',',' '),'', $_POST['marketimp'][$i]));
			$assessedvalue->setMarkettotal(str_replace(array('$','%',',',' '),'', $_POST['markettotal'][$i]));
			$assessedvalue->setAnnualtaxes(str_replace(array('$','%',',',' '),'', $_POST['annualtaxes'][$i]));
			$assessedvalues[] = $assessedvalue;
		}
	}
	$improvedsales->setAssessedvalues($assessedvalues);

    if ( $improvedsales->getPropertytype()=="") {
        // if they are empty, show an error message and display the form
        $error = 'ERROR: Please fill in all required fields!';
    }else{

        //if everything is fine, update the record in the database

        $improvedsales->setDateModified(date('Y-m-d H:i:s'));
       
        $improvedSalesDBController = new improvedSalesDBController();
        $improvedSalesDBController->db = $db;
        $improvedsales = $improvedSalesDBController->imrovedsaleOperation($improvedsales,$user_id);
        //die();

        // redirect the user once the form is updated
        header("location: improvedsales.php?id=". $improvedsales->getId());
        die();
    }
 
}

// if the 'id' variable is set in the URL, we know that we need to edit a record
if ( isset( $_GET[ 'id' ] ) ) {
	// get 'id' from URL
	$id = intval($_GET[ 'id' ]);
	
	$improvedSalesDBController = new improvedSalesDBController();
	$improvedSalesDBController->db = $db;
	$rows = $improvedSalesDBController->getRecord($id);
	if(count($rows)>0){
	    $keys = array_keys($rows[0]);
	    for($i=0;$i<count($keys);$i++){
	        $method = "set".$keys[$i];
	        if(method_exists($improvedsales,$method)){
	            $improvedsales->$method($rows[0][$keys[$i]]);
	        }else{
	            echo "method ".$method." not exists<br/>";
	        }
	    
	    }
        
		$assessedvalues = array();
		$rows = $improvedSalesDBController->getAssessedValues($id);
		for($r=0;$r<count($rows);$r++){
			$keys = array_keys($rows[$r]);
			$assessedvalue = new assessedvalue();
			for($i=0;$i<count($keys);$i++){
				$method = "set".$keys[$i];
				if(method_exists($assessedvalue,$method)){
					$assessedvalue->$method($rows[$r][$keys[$i]]);
				}else{
					echo "method ".$method." not exists<br/>";
				}
			
			}
			$assessedvalues[] = $assessedvalue;
		}
		$improvedsales->setAssessedvalues($assessedvalues);
		
		$mfvalues = array();
		$rows = $improvedSalesDBController->getMfValues($id);
		for($r=0;$r<count($rows);$r++){
			$keys = array_keys($rows[$r]);
			$mfvalue = new mfvalue();
			for($i=0;$i<count($keys);$i++){
				$method = "set".$keys[$i];
				if(method_exists($mfvalue,$method)){
					$mfvalue->$method($rows[$r][$keys[$i]]);
				}else{
					echo "method ".$method." not exists<br/>";
				}
			}
			$mfvalues[] = $mfvalue;
		}
		$improvedsales->setMfvalues($mfvalues);

	    $rows = $improvedSalesDBController->getLinks($id);
	    if(count($rows)>0){
	         $improvedsales->setDocData($rows);
	    }
	}
	
	
}
//DATASOURCES
//following are the results of queries served as datasources for drop downs
//data format is an associative array

$dataSourceController = new dataSourceControler();
$dataSourceController->db = $db;

$statusData = $dataSourceController->getStatusDataSource();
$priorityData = $dataSourceController->getPriorityDataSource();
$usersData = $dataSourceController->getUsersDataSource();
$templateData = $dataSourceController->getTemplateDataSource('improved', 1);
$propertyData = $dataSourceController->getPropertyTypeDataSource(2,1,array(1));
$subPropertyData = $dataSourceController->getSubtypeDataSource(4,"!=");
$marketData = $dataSourceController->getGenMarketDataSource();
$subMarketData = $dataSourceController->getSubmarketDataSource();
$shapeData = $dataSourceController->getWFDictionaryDataSource("shape",3);
$topographyData = $dataSourceController->getWFDictionaryDataSource("topography",3);
$siteAccessData = $dataSourceController->getWFDictionaryDataSource("siteaccess",3);
$orientationData = $dataSourceController->getWFDictionaryDataSource("orientation",3);
$exposureData = $dataSourceController->getWFDictionaryDataSource("exposure",3);
$yesnoData = $dataSourceController->getWFDictionaryDataSource("yesno",3);
$yesnoDataDesc = $dataSourceController->getWFDictionaryDataSource("yesno",3,"DESC");
$parkingTypeData = $dataSourceController->getWFDictionaryDataSource("parkingtype",3);
$occupancyTypeData = $dataSourceController->getWFDictionaryDataSource("occupancytype",3);
$conditionData = $dataSourceController->getWFDictionaryDataSource("condition",3);
$cclassData = $dataSourceController->getWFDictionaryDataSource("cclass",3);
$bclassData = $dataSourceController->getWFDictionaryDataSource("bclass",3);
$buyerstatusData = $dataSourceController->getWFDictionaryDataSource("buyerstatus",3);
$proprightsData = $dataSourceController->getWFDictionaryDataSource("proprights",3);
$convdocData = $dataSourceController->getWFDictionaryDataSource("convdoc",3);
$salestatusData = $dataSourceController->getWFDictionaryDataSource("salestatus",3);
$inspecttypeData = $dataSourceController->getWFDictionaryDataSource("inspecttype",3);
$lvlserviceData = $dataSourceController->getWFDictionaryDataSource("lvlservice",3);
$conditionData = $dataSourceController->getWFDictionaryDataSource("condition",3);
$codescrip = $dataSourceController->getEditDDDataSource("codescrip",1);
$msalist = $dataSourceController->getEditDDDataSource("msalist",1);
$utilslist = $dataSourceController->getEditDDDataSource("utilslist",1);
$eadesc = $dataSourceController->getEditDDDataSource("eadesc",1);
$bsizesource = $dataSourceController->getEditDDDataSource("bsizesource",1);
$YBlastReno = $dataSourceController->getEditDDDataSource("YBlastReno");
$parratlist = $dataSourceController->getEditDDDataSource("parratlist",1);
$offhvactype = $dataSourceController->getEditDDDataSource("offhvactype",1);
$cheightlist = $dataSourceController->getEditDDDataSource("cheightlist",1);
$tdRamp = $dataSourceController->getEditDDDataSource("tdRamp",1);
$tdDock = $dataSourceController->getEditDDDataSource("tdDock",1);
$hvaclist = $dataSourceController->getEditDDDataSource("hvaclist",1);
$confealist = $dataSourceController->getEditDDDataSource("confealist",1);
$actprof = $dataSourceController->getEditDDDataSource("actprof",1);
$actprofsource = $dataSourceController->getEditDDDataSource("actprofsource",1);
$resexp = $dataSourceController->getEditDDDataSource("resexp",1);
$apprnames = $dataSourceController->getEditDDDataSource("apprnames",1);
$int_conv = $dataSourceController->getEditDDDataSource("int_conv",1);
$findesc = $dataSourceController->getEditDDDataSource("findesc",1);
$tonmarket = $dataSourceController->getEditDDDataSource("tonmarket",1);
$APComment = $dataSourceController->getEditDDDataSource("APComment",1);
$sourcedata = $dataSourceController->getEditDDDataSource("sourcedata",1);
$conf1sour = $dataSourceController->getEditDDDataSource("conf1sour",1);
$relat1 = $dataSourceController->getEditDDDataSource("relat1",1);
$conf2sour = $dataSourceController->getEditDDDataSource("conf2sour",1);
$MFUnitType = $dataSourceController->getEditDDDataSource("MFUnitType",1);
$subMarketArea = $dataSourceController->getSubmarketAreaDataSource();
$appraisers = $dataSourceController->getAppraiserDataSource();

$mfrecords = array();
if($improvedsales->getId()!=""){
    $sql = "SELECT id, FORMAT(mfnounits,0) as mfnounits, mfsize, FORMAT(mftotalsf,0) as mftotalsf, CONCAT('$',FORMAT(mfrent,0)) as mfrent, CONCAT('$',FORMAT(mfrentsf,2)) as mfrentsf, mfnobr from mfmatrix WHERE FK_ReportID = ".$improvedsales->getId()." order by id;";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $mfrecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$assessedrecords = array();
if($improvedsales->getId()!=""){
    $sql = "SELECT * from assessedvalues WHERE FK_ReportID = ".$improvedsales->getId()." order by id;";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $assessedrecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$proppics = array();
if($improvedsales->getID()!=""){
    $sql = "SELECT propphotos.id,CONCAT(FK_ReportID,'/', photopath) as image, caption,propphotos.order AS picOrder FROM propphotos
        WHERE FK_ReportID = '".$improvedsales->getId()."'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $proppics = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

require("templates/templateImprovedSales.php");

