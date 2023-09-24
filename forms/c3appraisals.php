<?php
date_default_timezone_set('America/Los_Angeles');
error_reporting(E_ALL);
ini_set('display_errors', TRUE); 

require("../../../includes/connectPDO.php");
include("../../../includes/check.php");
require("../config/databaseTables.php");

require("classes/appraisals.php");
require("classes/assessedvalue.php");
require("classes/dataSourceController.php");
require("classes/appraisalsDBController.php");
require("classes/rbe_mediaUtilities.php");

$appraisals = new appraisals();


if(isset($_POST['submit'])){
    $keys = array_keys($_POST);
    for($k=0;$k<count($keys);$k++){
        $method = "set".$keys[$k];
        if(method_exists($appraisals,$method)){
            $appraisals->$method($_POST[$keys[$k]]);
        }  
    }
    
    if(empty($user_id)){
        $user_id = 1;
    }else{
        $user_id = $user_id;
    }
    $yearbuilt = preg_replace('~\D~','', $_POST['year_built']);
    $appraisals->setBid_fee(str_replace(array('$','%',',',' '),'', $_POST['bid_fee']));
    $appraisals->setFloor_1_gba(str_replace(array('$','%',',',' '),'', $_POST['floor_1_gba']));
    $appraisals->setFloor_2_gba(str_replace(array('$','%',',',' '),'', $_POST['floor_2_gba']));
    $appraisals->setTotal_basement_gba(str_replace(array('$','%',',',' '),'', $_POST['total_basement_gba']));
    $appraisals->setOverall_gba(str_replace(array('$','%',',',' '),'', $_POST['overall_gba']));
    $appraisals->setBasement_pct_gba(str_replace(array('$','%',',',' '),'', $_POST['basement_pct_gba']));
    $appraisals->setFloor_1_nra(str_replace(array('$','%',',',' '),'', $_POST['floor_1_nra']));
    $appraisals->setFloor_2_nra(str_replace(array('$','%',',',' '),'', $_POST['floor_2_nra']));
    $appraisals->setTotal_basement_nra(str_replace(array('$','%',',',' '),'', $_POST['total_basement_nra']));
    $appraisals->setOverall_nra(str_replace(array('$','%',',',' '),'', $_POST['overall_nra']));
    $appraisals->setBasement_pct_nra(str_replace(array('$','%',',',' '),'', $_POST['basement_pct_nra']));
    $appraisals->setStorage_basement_sf(str_replace(array('$','%',',',' '),'', $_POST['storage_basement_sf']));
    $appraisals->setAncillary_area_sf(str_replace(array('$','%',',',' '),'', $_POST['ancillary_area_sf']));
    $appraisals->setEff_ratio_pct_nra(str_replace(array('$','%',',',' '),'', $_POST['eff_ratio_pct_nra']));
    $appraisals->setLand_build_ratio_primary(str_replace(array('$','%',' to 1',' '),'', $_POST['land_build_ratio_primary']));
    $appraisals->setSite_cover_primary(str_replace(array('$','%',',',' '),'', $_POST['site_cover_primary']));
    $appraisals->setLand_build_ratio_overall(str_replace(array('$','%',' to 1',' '),'', $_POST['land_build_ratio_overall']));
    $appraisals->setSite_cover_overall(str_replace(array('$','%',',',' '),'', $_POST['site_cover_overall']));
    $appraisals->setParking_stalls(str_replace(',','', $_POST['parking_stalls']));
    $appraisals->setParking_ratio_nra(str_replace(',','', $_POST['parking_ratio_nra']));
    $appraisals->setParking_ratio_gba(str_replace(',','', $_POST['parking_ratio_gba']));
    $appraisals->setParking_ratio_unit(str_replace(',','', $_POST['parking_ratio_unit']));
    $appraisals->setNo_tenants(str_replace(array('$','%',',',' '),'', $_POST['no_tenants']));
    $appraisals->setNo_units(str_replace(array('$','%',',',' '),'', $_POST['no_units']));
    $appraisals->setGla_inputsize(str_replace(array('$','%',',',' '),'', $_POST['gla_inputsize']));
    $appraisals->setGross_land_sf(str_replace(array('$','%',',',' '),'', $_POST['gross_land_sf']));
    $appraisals->setGross_land_acre(str_replace(array('$','%',',',' '),'', $_POST['gross_land_acre']));
    $appraisals->setUnusable_sf(str_replace(array('$','%',',',' '),'', $_POST['unusable_sf']));
    $appraisals->setUnusable_acre(str_replace(array('$','%',',',' '),'', $_POST['unusable_acre']));
    $appraisals->setNet_usable_sf(str_replace(array('$','%',',',' '),'', $_POST['net_usable_sf']));
    $appraisals->setNet_usable_acre(str_replace(array('$','%',',',' '),'', $_POST['net_usable_acre']));
    $appraisals->setSurplus_sf(str_replace(array('$','%',',',' '),'', $_POST['surplus_sf']));
    $appraisals->setSurplus_acre(str_replace(array('$','%',',',' '),'', $_POST['surplus_acre']));
    $appraisals->setExcess_sf(str_replace(array('$','%',',',' '),'', $_POST['excess_sf']));
    $appraisals->setExcess_acre(str_replace(array('$','%',',',' '),'', $_POST['excess_acre']));
    //$appraisals->setYear_built_search(preg_replace('~\D~','', $_POST['year_built']));
    $appraisals->setYear_built_search(substr($yearbuilt, 0, 4));
    $appraisals->setPrimary_acre(str_replace(array('$','%',',',' '),'', $_POST['primary_acre']));
    $appraisals->setPrimary_sf(str_replace(array('$','%',',',' '),'', $_POST['primary_sf']));
    $appraisals->setList_price(str_replace(array('$','%',',',' '),'', $_POST['list_price']));
    $appraisals->setShop_total_gba(str_replace(',','', $_POST['shop_total_gba']));
    $appraisals->setShop_inline_sf(str_replace(',','', $_POST['shop_inline_sf']));
    $appraisals->setShop_anchor_sf(str_replace(',','', $_POST['shop_anchor_sf']));
    $appraisals->setShop_total_nra(str_replace(',','', $_POST['shop_total_nra']));
    $appraisals->setShop_inline_pct(str_replace(array(',',' %'),'', $_POST['shop_inline_pct']));
    $appraisals->setShop_anchor_pct(str_replace(array(',',' %'),'', $_POST['shop_anchor_pct']));
    $appraisals->setStore_avg_month_gallon(str_replace(',','', $_POST['store_avg_month_gallon']));
    $appraisals->setStore_month_store_sales(str_replace(array('$ ',','),'', $_POST['store_month_store_sales']));
    $appraisals->setStore_month_car_wash_sales(str_replace(array('$ ',','),'', $_POST['store_month_car_wash_sales']));
    $appraisals->setStore_month_mini_sales(str_replace(array('$ ',','),'', $_POST['store_month_mini_sales']));    
    $appraisals->setStore_total_month_sales(str_replace(array('$ ',','),'', $_POST['store_total_month_sales']));
    $appraisals->setVeh_showroom_pct(str_replace(array(',',' %'),'', $_POST['veh_showroom_pct']));
    $appraisals->setVeh_showroom_sf(str_replace(',','', $_POST['veh_showroom_sf']));
    $appraisals->setVeh_service_sf(str_replace(',','', $_POST['veh_service_sf']));
    $appraisals->setInd_int_office_1(str_replace(',','', $_POST['ind_int_office_1']));
    $appraisals->setInd_int_office_2(str_replace(',','', $_POST['ind_int_office_2']));
    $appraisals->setInd_total_office(str_replace(',','', $_POST['ind_total_office']));
    $appraisals->setInd_storage_mezz_sf(str_replace(',','', $_POST['ind_storage_mezz_sf']));
    $appraisals->setInd_ext_office_1(str_replace(',','', $_POST['ind_ext_office_1']));
    $appraisals->setInd_ext_office_2(str_replace(',','', $_POST['ind_ext_office_2']));
    $appraisals->setInd_pct_office(str_replace(array(',',' %'),'', $_POST['ind_pct_office']));
    $appraisals->setMf_no_single(str_replace(array(',','','%','$'),'',$_POST['mf_no_single']));
	$appraisals->setMf_sw_low_rent(str_replace(array(',','','%','$'),'',$_POST['mf_sw_low_rent']));
	$appraisals->setMf_sw_high_rent(str_replace(array(',','','%','$'),'',$_POST['mf_sw_high_rent']));
	$appraisals->setMf_sw_avg_rent(str_replace(array(',','','%','$'),'',$_POST['mf_sw_avg_rent']));
	$appraisals->setMf_no_double(str_replace(array(',','','%','$'),'',$_POST['mf_no_double']));
	$appraisals->setMf_dw_low_rent(str_replace(array(',','','%','$'),'',$_POST['mf_dw_low_rent']));
	$appraisals->setMf_dw_high_rent(str_replace(array(',','','%','$'),'',$_POST['mf_dw_high_rent']));
	$appraisals->setMf_dw_avg_rent(str_replace(array(',','','%','$'),'',$_POST['mf_dw_avg_rent']));
	$appraisals->setMf_no_triple(str_replace(array(',','','%','$'),'',$_POST['mf_no_triple']));
	$appraisals->setMf_tw_low_rent(str_replace(array(',','','%','$'),'',$_POST['mf_tw_low_rent']));
	$appraisals->setMf_tw_high_rent(str_replace(array(',','','%','$'),'',$_POST['mf_tw_high_rent']));
	$appraisals->setMf_tw_avg_rent(str_replace(array(',','','%','$'),'',$_POST['mf_tw_avg_rent']));
	$appraisals->setMf_no_rv_spaces(str_replace(array(',','','%','$'),'',$_POST['mf_no_rv_spaces']));
	$appraisals->setMf_rv_low_rent(str_replace(array(',','','%','$'),'',$_POST['mf_rv_low_rent']));
	$appraisals->setMf_rv_high_rent(str_replace(array(',','','%','$'),'',$_POST['mf_rv_high_rent']));
	$appraisals->setMf_rv_avg_rent(str_replace(array(',','','%','$'),'',$_POST['mf_rv_avg_rent']));
	$appraisals->setMf_high_rent(str_replace(array(',','','%','$'),'',$_POST['mf_high_rent']));
	$appraisals->setMf_total_spaces(str_replace(array(',','','%','$'),'',$_POST['mf_total_spaces']));
	$appraisals->setMf_total_avg_rent(str_replace(array(',','','%','$'),'',$_POST['mf_total_avg_rent']));
    $appraisals->setRowsfacq(str_replace(',','', $_POST['rowsfacq']));
    
    $appraisals->setFloor_area_ratio(str_replace(",","",$appraisals->getFloor_area_ratio()));
    $appraisals->setMax_floor_area(str_replace(",","",$appraisals->getMax_floor_area()));

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
			$assessedvalue->setMeasure50(str_replace(array('$','%',',',' '),'', $_POST['measure50'][$i]));
			$assessedvalue->setAnnualtaxes(str_replace(array('$','%',',',' '),'', $_POST['annualtaxes'][$i]));
			$assessedvalues[] = $assessedvalue;
		}
	}
	$appraisals->setAssessedvalues($assessedvalues);

    if ( $appraisals->getPropertytype()=="") {
        // if they are empty, show an error message and display the form
        $error = 'ERROR: Please fill in all required fields!';
    }else{

        //if everything is fine, update the record in the database

        $appraisals->setDateModified(date('Y-m-d H:i:s'));
       
        $appraisalsDBController = new appraisalsDBController();
        $appraisalsDBController->db = $db;
        $appraisals = $appraisalsDBController->appraisalsOperation($appraisals,$user_id);
        //die();

        // redirect the user once the form is updated
        header("location: appraisals.php?id=". $appraisals->getId());
        die();
    }
 
}

// if the 'id' variable is set in the URL, we know that we need to edit a record
if ( isset( $_GET[ 'id' ] ) ) {
	// get 'id' from URL
	$id = intval($_GET[ 'id' ]);
	
	$appraisalsDBController = new appraisalsDBController();
	$appraisalsDBController->db = $db;
	$rows = $appraisalsDBController->getRecord($id);
	if(count($rows)>0){
	    $keys = array_keys($rows[0]);
	    for($i=0;$i<count($keys);$i++){
	        $method = "set".$keys[$i];
	        if(method_exists($appraisals,$method)){
	            $appraisals->$method($rows[0][$keys[$i]]);
	        }else{
	            echo "method ".$method." not exists<br/>";
	        }
	    
	    }
		
		$assessedvalues = array();
		$rows = $appraisalsDBController->getAssessedValues($id);
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
		$appraisals->setAssessedvalues($assessedvalues);
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
$formerusersData = $dataSourceController->getFormerUsersDataSource();
$propertyData = $dataSourceController->getPropertyTypeDataSource(1,1,array(1));
$subPropertyData = $dataSourceController->getSubtypeDataSource(4,"!=");
$marketData = $dataSourceController->getGenMarketDataSource();
$subMarketData = $dataSourceController->getSubmarketDataSource();
$appraisetypeData = $dataSourceController->getWFDictionaryDataSource("appraisetype",3);
$appraisepurpData = $dataSourceController->getWFDictionaryDataSource("appraisepurp",3);
$ownertypeData = $dataSourceController->getWFDictionaryDataSource("ownertype",3);
$shapeData = $dataSourceController->getWFDictionaryDataSource("shape",3);
$topographyData = $dataSourceController->getWFDictionaryDataSource("topography",3);
$siteAccessData = $dataSourceController->getWFDictionaryDataSource("siteaccess",3);
$orientationData = $dataSourceController->getWFDictionaryDataSource("orientation",3);
$exposureData = $dataSourceController->getWFDictionaryDataSource("exposure",3);
$estateappraisedData = $dataSourceController->getWFDictionaryDataSource("estateappraised",3);
$proscompestappData = $dataSourceController->getWFDictionaryDataSource("estateappraised",3);
$prosstabestappData = $dataSourceController->getWFDictionaryDataSource("estateappraised",3);
$yesnoData = $dataSourceController->getWFDictionaryDataSource("yesno",3);
$yesnoDataDesc = $dataSourceController->getWFDictionaryDataSource("yesno",3,"DESC");
$occupancyTypeData = $dataSourceController->getWFDictionaryDataSource("occupancytype",3);
$conditionData = $dataSourceController->getWFDictionaryDataSource("condition",3);
$cclassData = $dataSourceController->getWFDictionaryDataSource("cclass",3);
$bclassData = $dataSourceController->getWFDictionaryDataSource("bclass",3);
$parkingTypeData = $dataSourceController->getWFDictionaryDataSource("parkingtype",3);
$salestatusData = $dataSourceController->getWFDictionaryDataSource("salestatus",3);
$conditionData = $dataSourceController->getWFDictionaryDataSource("condition",3);
$imptemplateData = $dataSourceController->getTemplateDataSource('improved', 1);
$impextemplateData = $dataSourceController->getTemplateDataSource('improved', 2);
$daitemplateData = $dataSourceController->getTemplateDataSource('daimp', 3);
$landtemplateData = $dataSourceController->getTemplateDataSource('landsale', 1);
$landextemplateData = $dataSourceController->getTemplateDataSource('landsale', 2);
$dalandtemplateData = $dataSourceController->getTemplateDataSource('daland', 3);
$leasetemplateData = $dataSourceController->getTemplateDataSource('lease', 1);
$leasexceltemplateData = $dataSourceController->getTemplateDataSource('lease', 2);
$dartemplateData = $dataSourceController->getTemplateDataSource('dalease', 3);
$adddartemplateData = $dataSourceController->getTemplateDataSource('dalease', 3);
$orrenttemplateData = $dataSourceController->getTemplateDataSource('orlease', 4);
$subMarketArea = $dataSourceController->getSubmarketAreaDataSource();
$lvlserviceData = $dataSourceController->getWFDictionaryDataSource("lvlservice",3);
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
$repapp = $dataSourceController->getAppDataSource();

$clirecords = array();
if($appraisals->getClient_db()!=""){
    $sql = "SELECT id, compname, firstname, lastname, cellphone, email, website from clients WHERE id IN (".implode(',',(array)$appraisals->getClient_db()).") order by FIELD(id,".$appraisals->getClient_db().");";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $clirecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$impsales = array();
if($appraisals->getImproved_db()!=""){
    $sql = "SELECT a.id, if(b.thumbnail = '','no-photo-tn.jpg',CONCAT(a.id,'/',b.thumbnail)) AS thumbnail , if(b.photo1 = '','no-photo.jpg', CONCAT(a.id,'/',b.photo1)) AS photo1, b.property_name, b.lat,b.lng, CONCAT(b.streetnumber,' ',b.streetname) as address, b.city, sm.submarket, pt.propertytype, st.subtype, d.no_stories, d.parking_ratio, b.zoning_code, d.year_built_search as year_built, d.last_renovation, FORMAT(d.overall_gba,0) as overall_gba, d.const_descr, DATE_FORMAT(c.record_date,'%c/%e/%Y') as record_date, if(c.sale_status = 3,'',ss.definition) as sale_status, CONCAT('$',FORMAT(c.adj_price_sf_nra, 2)) as adj_price_sf_nra, CONCAT('$', FORMAT(c.adj_price_unit, 0)) as adj_price_unit, CONCAT(pd.ind_pct_office,' %') AS ind_pct_office, CONCAT(d.site_cover_primary,' %') AS site_cover_primary, CONCAT(FORMAT(c.cap_rate,2),' %') as cap_rate 
    FROM report a LEFT JOIN property b on b.FK_ReportID = a.id LEFT OUTER JOIN building d on d.FK_ReportID = a.id LEFT OUTER JOIN saletrans c on c.FK_ReportID = a.id LEFT OUTER JOIN submarket sm on sm.id = b.submarkid LEFT OUTER join propertytype pt on pt.id = b.propertytype LEFT OUTER join WFDictionary ss on ss.id = c.sale_status LEFT OUTER join proptypedetails pd on pd.FK_ReportID = a.id LEFT OUTER join subtype st on st.id = b.propertysubtype WHERE a.id IN (".implode(',',(array)$appraisals->getImproved_db()).") order by FIELD(a.id,".$appraisals->getImproved_db().");";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $impsales = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$caprecords = array();
if($appraisals->getCaprate_db()!=""){
    $sql = "SELECT a.id, if(b.thumbnail = '','no-photo-tn.jpg',CONCAT(a.id,'/',b.thumbnail)) AS thumbnail, if(b.photo1 = '','no-photo.jpg',CONCAT(a.id,'/',b.photo1)) AS photo1, b.property_name, b.lat,b.lng, CONCAT(b.streetnumber,' ',b.streetname) as address, b.city, sm.submarket, pt.propertytype, st.subtype, d.no_stories, d.parking_ratio, b.zoning_code, d.year_built_search as year_built, d.last_renovation, FORMAT(d.overall_gba,0) as overall_gba, d.const_descr, DATE_FORMAT(c.record_date,'%c/%e/%Y') as record_date, if(c.sale_status = 3,'',ss.definition) as sale_status, CONCAT('$',FORMAT(c.adj_price_sf_nra, 2)) as adj_price_sf_nra, CONCAT('$', FORMAT(c.adj_price_unit, 0)) as adj_price_unit, CONCAT(pd.ind_pct_office,' %') AS ind_pct_office, CONCAT(d.site_cover_primary,' %') AS site_cover_primary, CONCAT(FORMAT(c.cap_rate,2),' %') as cap_rate FROM report a LEFT JOIN property b on b.FK_ReportID = a.id LEFT OUTER JOIN building d on d.FK_ReportID = a.id LEFT OUTER JOIN saletrans c on c.FK_ReportID = a.id LEFT OUTER JOIN submarket sm on sm.id = b.submarkid LEFT OUTER join propertytype pt on pt.id = b.propertytype LEFT OUTER join WFDictionary ss on ss.id = c.sale_status LEFT OUTER join proptypedetails pd on pd.FK_ReportID = a.id LEFT OUTER join subtype st on st.id = b.propertysubtype WHERE a.id IN (".implode(',',(array)$appraisals->getCaprate_db()).") order by FIELD(a.id,".$appraisals->getCaprate_db().")";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $caprecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$landrecords = array();
if($appraisals->getLand_db()!=""){
    $sql = "SELECT a.id, if(b.thumbnail = '','no-photo-tn.jpg',CONCAT(a.id,'/',b.thumbnail)) AS thumbnail, if(b.photo1 = '','no-photo.jpg',CONCAT(a.id,'/',b.photo1)) AS photo1, b.lat, b.lng, b.property_name, CONCAT(b.streetnumber,' ',b.streetname) as address, b.city, sm.submarket, pt.propertytype, st.subtype, b.zoning_code, DATE_FORMAT(c.record_date,'%c/%e/%Y') as record_date, if(c.sale_status = 3,'',s.definition) as sale_status, FORMAT(b.net_usable_sf, 0) as net_usable_sf, b.net_usable_acre, CONCAT('$', FORMAT(c.adj_price_sf_net, 2)) as adj_price_sf_net, CONCAT('$',FORMAT(c.adj_price_sf_far,2)) AS adj_price_sf_far, format(r.unit_density_net_acre,2) as unit_density_net_acre, CONCAT('$',format(r.bulk_price_lot,0)) as bulk_price_lot, format(r.finish_lot_size_sf,0) as finish_lot_size_sf, CONCAT('$', FORMAT(c.adj_price_acre_net,0)) as adj_price_acre_net FROM report a LEFT JOIN property b on b.FK_ReportID = a.id LEFT JOIN saletrans c on c.FK_ReportID = a.id JOIN WFDictionary s on s.id = c.sale_status JOIN submarket sm on sm.id = b.submarkid join propertytype pt on pt.id = b.propertytype left outer join subtype st on st.id = b.propertysubtype left outer join resland r on r.FK_ReportID = a.id
    WHERE a.id IN (".implode(',',(array)$appraisals->getLand_db()).") order by FIELD(a.id,".$appraisals->getLand_db().");";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $landrecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$rentrecords = array();
if($appraisals->getLease_db()!=""){
    $sql = "SELECT a.id, if(b.thumbnail = '','no-photo-tn.jpg',CONCAT(a.id,'/',b.thumbnail)) AS thumbnail, if(b.photo1 = '','no-photo.jpg',CONCAT(a.id,'/',b.photo1)) AS photo1, b.property_name,b.lat,b.lng, CONCAT(b.streetnumber,' ',b.streetname) as address, b.city, sm.submarket, pt.propertytype, st.subtype, format(d.overall_gba,0) as overall_gba, d.const_descr, date_format(c.lease_start_date,'%c/%e/%Y') as lease_start_date, c.lessee_name, FORMAT(c.tenant_area_sf,0) as tenant_area_sf, d.year_built, d.last_renovation, l.definition as lease_expense_term, m.definition as exp_term_adj, CONCAT('$',FORMAT(c.eff_rent_sf_mo_shell,3)) as eff_rent_sf_mo_shell, CONCAT('$',FORMAT(c.eff_rent_sf_mo_office,3)) as eff_rent_sf_mo_office, CONCAT('$',FORMAT(c.eff_rent_sf_mo_blend,3)) as eff_rent_sf_mo_blend, CONCAT('$',FORMAT(c.eff_rent_sf_yr,2)) as eff_rent_sf_yr FROM report a LEFT JOIN property b on b.FK_ReportID = a.id JOIN building d on d.FK_ReportID = a.id LEFT JOIN leasetrans c on c.FK_ReportID = a.id LEFT OUTER JOIN WFDictionary m on m.id = c.exp_term_adj JOIN WFDictionary l on l.id = c.lease_expense_term JOIN submarket sm on sm.id = b.submarkid join propertytype pt on pt.id = b.propertytype left outer join subtype st on st.id = b.propertysubtype WHERE a.id IN (".implode(',',(array)$appraisals->getLease_db()).") order by FIELD(a.id,".$appraisals->getLease_db().");";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $rentrecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$addrentrecords = array();
if($appraisals->getXtrarents()!=""){
    $sql = "SELECT a.id, if(b.thumbnail = '','no-photo-tn.jpg',CONCAT(a.id,'/',b.thumbnail)) AS thumbnail, if(b.photo1 = '','no-photo.jpg',CONCAT(a.id,'/',b.photo1)) AS photo1, b.property_name,b.lat,b.lng, CONCAT(b.streetnumber,' ',b.streetname) as address, b.city, sm.submarket, pt.propertytype, st.subtype, format(d.overall_gba,0) as overall_gba, d.const_descr, date_format(c.lease_start_date,'%c/%e/%Y') as lease_start_date, c.lessee_name, FORMAT(c.tenant_area_sf,0) as tenant_area_sf, d.year_built, d.last_renovation, l.definition as lease_expense_term, m.definition as exp_term_adj, CONCAT('$',FORMAT(c.eff_rent_sf_mo_shell,3)) as eff_rent_sf_mo_shell, CONCAT('$',FORMAT(c.eff_rent_sf_mo_office,3)) as eff_rent_sf_mo_office, CONCAT('$',FORMAT(c.eff_rent_sf_mo_blend,3)) as eff_rent_sf_mo_blend, CONCAT('$',FORMAT(c.eff_rent_sf_yr,2)) as eff_rent_sf_yr FROM report a LEFT JOIN property b on b.FK_ReportID = a.id JOIN building d on d.FK_ReportID = a.id LEFT JOIN leasetrans c on c.FK_ReportID = a.id LEFT OUTER JOIN WFDictionary m on m.id = c.exp_term_adj JOIN WFDictionary l on l.id = c.lease_expense_term JOIN submarket sm on sm.id = b.submarkid join propertytype pt on pt.id = b.propertytype left outer join subtype st on st.id = b.propertysubtype WHERE a.id IN (".implode(',',(array)$appraisals->getXtrarents()).") order by FIELD(a.id,".$appraisals->getXtrarents().");";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $addrentrecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$miscrecords = array();
if($appraisals->getMiscrent_db()!=""){
    $sql = "SELECT a.id, if(b.thumbnail = '','no-photo-tn.jpg',CONCAT(a.id,'/',b.thumbnail)) AS thumbnail, if(b.photo1 = '','no-photo.jpg',CONCAT(a.id,'/',b.photo1)) AS photo1, b.property_name, concat(b.streetnumber,' ',b.streetname) as address, b.city, b.state, c.lessee_name, date_format(c.lease_start_date,'%m/%y') as lease_start, concat(c.total_lease_term_mos,' ',d.definition) as term, format(e.yard_land_area_sf,0) as yard_sf, e.desc_yard_space, concat('$',format(e.eff_yard_rent_sf_mo,3)) as yard_rent, e.or_tenant, f.definition as ortypes, concat('$ ',format(e.other_rent_sf_mo,0)) as other_rent_sf_mo from report a left outer join property b on b.FK_ReportID = a.id left outer join leasetrans c on c.FK_ReportID = a.id left outer join WFDictionary d on d.id = c.mos_vs_mos left outer join yardabsorb e on e.FK_ReportID = a.id left outer join WFDictionary f on f.id = e.ortypes WHERE a.id in (".implode(',',(array)$appraisals->getMiscrent_db()).") order by FIELD(a.id,".$appraisals->getMiscrent_db().");";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $miscrecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$assessedrecords = array();
if($appraisals->getId()!=""){
    $sql = "SELECT * from assessedvalues WHERE FK_ReportID = ".$appraisals->getId()." order by id;";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $assessedrecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
$proppics = array();
if($appraisals->getID()!=""){
    $sql = "SELECT propphotos.id,CONCAT(FK_ReportID,'/', photopath) as image, caption,propphotos.order AS picOrder FROM propphotos
        WHERE FK_ReportID = '".$appraisals->getId()."'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $proppics = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

require("templates/AppraisalForm.php");

