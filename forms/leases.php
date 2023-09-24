<?php
date_default_timezone_set('America/Los_Angeles');
error_reporting(E_ALL);
ini_set('display_errors', TRUE); 

require("../../../includes/connectPDO.php");
include("../../../includes/check.php");
require("../config/databaseTables.php");

require("classes/leases.php");
require("classes/mfvalue.php");
require("classes/ssvalues.php");
require("classes/dataSourceController.php");
require("classes/leasesDBController.php");
require("classes/rbe_mediaUtilities.php");

$leases = new leases();

if(isset($_POST['submit'])){
    $keys = array_keys($_POST);
    for($k=0;$k<count($keys);$k++){
        $method = "set".$keys[$k];
        if(method_exists($leases,$method)){
            $leases->$method($_POST[$keys[$k]]);
        }  
    }
    
    if(empty($user_id)){
        $user_id = 1;
    }else{
        $user_id = $user_id;
    }
	$yearbuilt = preg_replace('~\D~','', $_POST['year_built']);
	$leases->setOther_rent_sf_mo(str_replace(array(',','','%','$'),'',$_POST['other_rent_sf_mo']));
	$leases->setOverall_gba(str_replace(array(',','','%','$'),'',$_POST['overall_gba']));
	$leases->setOverall_nra(str_replace(array(',','','%','$'),'',$_POST['overall_nra']));
	$leases->setVacancy_sf_nra(str_replace(array(',','','%','$'),'',$_POST['vacancy_sf_nra']));
	$leases->setOe_vacany_pct(str_replace(array(',','','%','$'),'',$_POST['oe_vacany_pct']));
	$leases->setInline_space_sf(str_replace(array(',','','%','$'),'',$_POST['inline_space_sf']));
	$leases->setInline_vacancy_pct(str_replace(array(',','','%','$'),'',$_POST['inline_vacancy_pct']));
	$leases->setGross_land_sf(str_replace(array(',','','%','$'),'',$_POST['gross_land_sf']));
	$leases->setGross_land_acre(str_replace(array(',','','%','$'),'',$_POST['gross_land_acre']));
	$leases->setLand_build_ratio_primary(str_replace(array('to 1',','),'',$_POST['land_build_ratio_primary']));
	$leases->setParking_stalls(str_replace(array(',','','%','$'),'',$_POST['parking_stalls']));
	$leases->setParking_ratio_gba(str_replace(array(',','','%','$'),'',$_POST['parking_ratio_gba']));
	$leases->setYear_built_search(substr($yearbuilt, 0, 4));
	$leases->setTenant_area_sf(str_replace(array(',','','%','$'),'',$_POST['tenant_area_sf']));
	$leases->setOffice_bo_sf(str_replace(array(',','','%','$'),'',$_POST['office_bo_sf']));
	$leases->setFlex_off_sf(str_replace(array(',','','%','$'),'',$_POST['flex_off_sf']));
	$leases->setVeh_showroom_sf(str_replace(array(',','','%','$'),'',$_POST['veh_showroom_sf']));
	$leases->setVeh_showroom_pct(str_replace(array(',','','%','$'),'',$_POST['veh_showroom_pct']));
	$leases->setVeh_service_sf(str_replace(array(',','','%','$'),'',$_POST['veh_service_sf']));
	$leases->setOffice_bo_pct(str_replace(array(',','','%','$'),'',$_POST['office_bo_pct']));
	$leases->setLoad_factor(str_replace(array(',','','%','$'),'',$_POST['load_factor']));
	$leases->setFlex_off_pct_nra(str_replace(array(',','','%','$'),'',$_POST['flex_off_pct_nra']));
	$leases->setExp_term_adj(str_replace(array(',','','%','$'),'',$_POST['exp_term_adj']));
	$leases->setInit_rent_sf_mo_shell(str_replace(array(',','','%','$'),'',$_POST['init_rent_sf_mo_shell']));
	$leases->setInit_rent_sf_mo_office(str_replace(array(',','','%','$'),'',$_POST['init_rent_sf_mo_office']));
	$leases->setInit_rent_sf_mo_blend(str_replace(array(',','','%','$'),'',$_POST['init_rent_sf_mo_blend']));
	$leases->setEff_rent_sf_mo_shell(str_replace(array(',','','%','$'),'',$_POST['eff_rent_sf_mo_shell']));
	$leases->setEff_rent_sf_mo_office(str_replace(array(',','','%','$'),'',$_POST['eff_rent_sf_mo_office']));
	$leases->setEff_rent_sf_mo_blend(str_replace(array(',','','%','$'),'',$_POST['eff_rent_sf_mo_blend']));
	$leases->setInit_rent_sf_yr(str_replace(array(',','','%','$'),'',$_POST['init_rent_sf_yr']));
	$leases->setInit_month_rent(str_replace(array(',','','%','$'),'',$_POST['init_month_rent']));
	$leases->setInit_annual_rent(str_replace(array(',','','%','$'),'',$_POST['init_annual_rent']));
	$leases->setEff_rent_sf_yr(str_replace(array(',','','%','$'),'',$_POST['eff_rent_sf_yr']));
	$leases->setEff_month_rent(str_replace(array(',','','%','$'),'',$_POST['eff_month_rent']));
	$leases->setEff_annual_rent(str_replace(array(',','','%','$'),'',$_POST['eff_annual_rent']));
	$leases->setEff_annual_rent_tunnel(str_replace(array(',','','%','$'),'',$_POST['eff_annual_rent_tunnel']));
	$leases->setLandlord_paid_exp_sf_yr(str_replace(array(',','','%','$'),'',$_POST['landlord_paid_exp_sf_yr']));
	$leases->setYard_land_area_sf(str_replace(array(',','','%','$'),'',$_POST['yard_land_area_sf']));
	$leases->setYard_exp_terms_adj(str_replace(array(',','','%','$'),'',$_POST['yard_exp_terms_adj']));
	$leases->setInit_yard_rent_sf_mo(str_replace(array(',','','%','$'),'',$_POST['init_yard_rent_sf_mo']));
	$leases->setEff_yard_rent_sf_mo(str_replace(array(',','','%','$'),'',$_POST['eff_yard_rent_sf_mo']));
	$leases->setPre_lease_sf(str_replace(array(',','','%','$'),'',$_POST['pre_lease_sf']));
	$leases->setPre_lease_pct_nra(str_replace(array(',','','%','$'),'',$_POST['pre_lease_pct_nra']));
	$leases->setPre_lease_pct_inline(str_replace(array(',','','%','$'),'',$_POST['pre_lease_pct_inline']));
	$leases->setTotal_absorb_sf(str_replace(array(',','','%','$'),'',$_POST['total_absorb_sf']));
	$leases->setTotal_lease_pct_nra(str_replace(array(',','','%','$'),'',$_POST['total_lease_pct_nra']));
	$leases->setTotal_lease_pct_inline(str_replace(array(',','','%','$'),'',$_POST['total_lease_pct_inline']));
	$leases->setNo_mos_absorb(str_replace(array(',','','%','$'),'',$_POST['no_mos_absorb']));
	$leases->setSf_absorb_mo(str_replace(array(',','','%','$'),'',$_POST['sf_absorb_mo']));
	$leases->setEst_land_value_sf(str_replace(array(',','','%','$'),'',$_POST['est_land_value_sf']));
	$leases->setEst_land_value(str_replace(array(',','','%','$'),'',$_POST['est_land_value']));
	$leases->setRate_return_land(str_replace(array(',','','%','$'),'',$_POST['rate_return_land']));
	$leases->setInd_ann_land_rent(str_replace(array(',','','%','$'),'',$_POST['ind_ann_land_rent']));
	$leases->setInd_ann_bldg_rent(str_replace(array(',','','%','$'),'',$_POST['ind_ann_bldg_rent']));
	$leases->setInd_ann_bldg_rent_sf(str_replace(array(',','','%','$'),'',$_POST['ind_ann_bldg_rent_sf']));
	$leases->setMf_application_fee(str_replace(array(',','','%','$'),'',$_POST['mf_application_fee']));
	$leases->setMf_movein_fee(str_replace(array(',','','%','$'),'',$_POST['mf_movein_fee']));
	$leases->setMf_non_refund(str_replace(array(',','','%','$'),'',$_POST['mf_non_refund']));
	$leases->setMf_no_unit(str_replace(array(',','','%','$'),'',$_POST['mf_no_unit']));
	$leases->setMf_vacant_unit(str_replace(array(',','','%','$'),'',$_POST['mf_vacant_unit']));
	$leases->setMf_pct_vacancy(str_replace(array(',','','%','$'),'',$_POST['mf_pct_vacancy']));
	$leases->setMf_no_single(str_replace(array(',','','%','$'),'',$_POST['mf_no_single']));
	$leases->setMf_sw_low_rent(str_replace(array(',','','%','$'),'',$_POST['mf_sw_low_rent']));
	$leases->setMf_sw_high_rent(str_replace(array(',','','%','$'),'',$_POST['mf_sw_high_rent']));
	$leases->setMf_sw_avg_rent(str_replace(array(',','','%','$'),'',$_POST['mf_sw_avg_rent']));
	$leases->setMf_no_double(str_replace(array(',','','%','$'),'',$_POST['mf_no_double']));
	$leases->setMf_dw_low_rent(str_replace(array(',','','%','$'),'',$_POST['mf_dw_low_rent']));
	$leases->setMf_dw_high_rent(str_replace(array(',','','%','$'),'',$_POST['mf_dw_high_rent']));
	$leases->setMf_dw_avg_rent(str_replace(array(',','','%','$'),'',$_POST['mf_dw_avg_rent']));
	$leases->setMf_no_triple(str_replace(array(',','','%','$'),'',$_POST['mf_no_triple']));
	$leases->setMf_tw_low_rent(str_replace(array(',','','%','$'),'',$_POST['mf_tw_low_rent']));
	$leases->setMf_tw_high_rent(str_replace(array(',','','%','$'),'',$_POST['mf_tw_high_rent']));
	$leases->setMf_tw_avg_rent(str_replace(array(',','','%','$'),'',$_POST['mf_tw_avg_rent']));
	$leases->setMf_no_rv_spaces(str_replace(array(',','','%','$'),'',$_POST['mf_no_rv_spaces']));
	$leases->setMf_rv_low_rent(str_replace(array(',','','%','$'),'',$_POST['mf_rv_low_rent']));
	$leases->setMf_rv_high_rent(str_replace(array(',','','%','$'),'',$_POST['mf_rv_high_rent']));
	$leases->setMf_rv_avg_rent(str_replace(array(',','','%','$'),'',$_POST['mf_rv_avg_rent']));
	$leases->setMf_high_rent(str_replace(array(',','','%','$'),'',$_POST['mf_high_rent']));
	$leases->setMf_total_spaces(str_replace(array(',','','%','$'),'',$_POST['mf_total_spaces']));
	$leases->setMf_total_avg_rent(str_replace(array(',','','%','$'),'',$_POST['mf_total_avg_rent']));
	$leases->setMf_prelease_unit(str_replace(array(',','','%','$'),'',$_POST['mf_prelease_unit']));
	$leases->setMf_prelease_pct_unit(str_replace(array(',','','%','$'),'',$_POST['mf_prelease_pct_unit']));
	$leases->setMf_total_unit_absorb(str_replace(array(',','','%','$'),'',$_POST['mf_total_unit_absorb']));
	$leases->setMf_mos_absorbtion(str_replace(array(',','','%','$'),'',$_POST['mf_mos_absorbtion']));
	$leases->setMf_total_lease_pct_unit(str_replace(array(',','','%','$'),'',$_POST['mf_total_lease_pct_unit']));
	$leases->setMf_unit_absorb_mo(str_replace(array(',','','%','$'),'',$_POST['mf_unit_absorb_mo']));
	$leases->setMs_total_units(str_replace(array(',','','%','$'),'',$_POST['ms_total_units']));
	$leases->setMs_no_vacant_unit(str_replace(array(',','','%','$'),'',$_POST['ms_no_vacant_unit']));
	$leases->setMs_pct_vacant_unit(str_replace(array(',','','%','$'),'',$_POST['ms_pct_vacant_unit']));
    
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
	$leases->setMfvalues($mfvalues);
    
    $ssvalues = array();
	if(isset($_POST['ssunitsf'])){
		for($i=0;$i<count($_POST['ssunitsf']);$i++){
			$ssvalue = new ssvalue();
			$ssvalue->setid($_POST['ssvalueid'][$i]);
			$ssvalue->setSssize($_POST['sssize'][$i]);
			$ssvalue->setSsunittype($_POST['ssunittype'][$i]);
			$ssvalue->setSsunitsf(str_replace(array(',',' '),'', $_POST['ssunitsf'][$i]));
			$ssvalue->setSsrentmo(str_replace(array('$',',',' '),'', $_POST['ssrentmo'][$i]));
			$ssvalue->setSsrentsf(str_replace(array('$','%',',',' '),'', $_POST['ssrentsf'][$i]));
			$ssvalues[] = $ssvalue;
		}
	}
	$leases->setSsvalues($ssvalues);

    $leases->setDocData(array());
    if($_POST['docData']!=""){
        $leases->setDocData(json_decode($_POST['docData']));
    }
    
    if ( $leases->getPropertytype()=="") {
        // if they are empty, show an error message and display the form
        $error = 'ERROR: Please fill in all required fields!';
    }else{

        //if everything is fine, update the record in the database

        $leases->setDateModified(date('Y-m-d H:i:s'));
       
        $leasesDBController = new leasesDBController();
        $leasesDBController->db = $db;
        $leases = $leasesDBController->leaseOperation($leases,$user_id);
        //die();

        // redirect the user once the form is updated
        header("location: leases.php?id=". $leases->getId());
        die();
    }
 
}

// if the 'id' variable is set in the URL, we know that we need to edit a record
if ( isset( $_GET[ 'id' ] ) ) {
	// get 'id' from URL
	$id = intval($_GET[ 'id' ]);
	
	$leasesDBController = new leasesDBController();
	$leasesDBController->db = $db;
	$rows = $leasesDBController->getRecord($id);
	if(count($rows)>0){
	    $keys = array_keys($rows[0]);
	    for($i=0;$i<count($keys);$i++){
	        $method = "set".$keys[$i];
	        if(method_exists($leases,$method)){
	            $leases->$method($rows[0][$keys[$i]]);
	        }else{
	            echo "method ".$method." not exists<br/>";
	        }
	    
	    }
        
        $mfvalues = array();
		$rows = $leasesDBController->getMfValues($id);
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
		$leases->setMfvalues($mfvalues);
        
        $ssvalues = array();
		$rows = $leasesDBController->getSsValues($id);
		for($r=0;$r<count($rows);$r++){
			$keys = array_keys($rows[$r]);
			$ssvalue = new ssvalue();
			for($i=0;$i<count($keys);$i++){
				$method = "set".$keys[$i];
				if(method_exists($ssvalue,$method)){
					$ssvalue->$method($rows[$r][$keys[$i]]);
				}else{
					echo "method ".$method." not exists<br/>";
				}
			}
			$ssvalues[] = $ssvalue;
		}
		$leases->setSsvalues($ssvalues);

	    $rows = $leasesDBController->getLinks($id);
	    if(count($rows)>0){
	         $leases->setDocData($rows);
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
$templateData = $dataSourceController->getTemplateDataSource('lease', 1);
$propertyData = $dataSourceController->getPropertyTypeDataSource(3,1,array(1));
$subPropertyData = $dataSourceController->getSubtypeDataSource(4,"!=");
$parktypeData = $dataSourceController->getWFDictionaryDataSource("parktype");
$marketData = $dataSourceController->getGenMarketDataSource();
$subMarketData = $dataSourceController->getSubmarketDataSource();
$newrenewData = $dataSourceController->getWFDictionaryDataSource("newrenew",3);
$lesseetypeData = $dataSourceController->getWFDictionaryDataSource("lesseetype",3);
$yesnoData = $dataSourceController->getWFDictionaryDataSource("yesno",3);
$yesnoDataDesc = $dataSourceController->getWFDictionaryDataSource("yesno",3,"DESC");
$momosData = $dataSourceController->getWFDictionaryDataSource("momos");
$inspecttypeData = $dataSourceController->getWFDictionaryDataSource("inspecttype",3);
$occupancyTypeData = $dataSourceController->getWFDictionaryDataSource("occupancytype",3);
$conditionData = $dataSourceController->getWFDictionaryDataSource("condition",3);
$exposureData = $dataSourceController->getWFDictionaryDataSource("exposure",3);
$siteAccessData = $dataSourceController->getWFDictionaryDataSource("siteaccess",3);
$spacegenerData = $dataSourceController->getWFDictionaryDataSource("spacegener",3);
$spacepositionData = $dataSourceController->getWFDictionaryDataSource("spaceposition",3);
$bclassData = $dataSourceController->getWFDictionaryDataSource("bclass",3);
$lvlserviceData = $dataSourceController->getWFDictionaryDataSource("lvlservice",3);
$leaseexptermData = $dataSourceController->getWFDictionaryDataSource("leaseexpterm",3);
$leaseexpadjData = $dataSourceController->getWFDictionaryDataSource("leaseexpadj",3);
$yardspaceData = $dataSourceController->getWFDictionaryDataSource("yardspace",3);
$parkingtypeData = $dataSourceController->getWFDictionaryDataSource("parkingtype",3);
$mgrresdetailData = $dataSourceController->getWFDictionaryDataSource("mgrresdetail",3);
$ortypesData = $dataSourceController->getWFDictionaryDataSource("ortypes",3);
$or_lease_exp_termData = $dataSourceController->getWFDictionaryDataSource("or_lease_exp_term",3);
$or_exp_terms_adjData = $dataSourceController->getWFDictionaryDataSource("or_exp_terms_adj",3);
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
$apprnames = $dataSourceController->getEditDDDataSource("apprnames",1);
$sourcedata = $dataSourceController->getEditDDDataSource("sourcedata",1);
$conf1sour = $dataSourceController->getEditDDDataSource("conf1sour",1);
$relat1 = $dataSourceController->getEditDDDataSource("relat1",1);
$conf2sour = $dataSourceController->getEditDDDataSource("conf2sour",1);
$MFUnitType = $dataSourceController->getEditDDDataSource("MFUnitType",1);
$descLopt = $dataSourceController->getEditDDDataSource("descLopt",1);
$flono = $dataSourceController->getEditDDDataSource("flono",1);
$loadfac = $dataSourceController->getEditDDDataSource("loadfac",1);
$SLEEscalation = $dataSourceController->getEditDDDataSource("SLEEscalation",1);
$SLConcDesc = $dataSourceController->getEditDDDataSource("SLConcDesc",1);
$descyardspace = $dataSourceController->getEditDDDataSource("descyardspace",1);
$EffectRentComment = $dataSourceController->getEditDDDataSource("EffectRentComment",1);
$MSSize = $dataSourceController->getEditDDDataSource("MSSize",1);
$MsUnitType = $dataSourceController->getEditDDDataSource("MsUnitType",1);
$conorby = $dataSourceController->getEditDDDataSource("conorby",1);
$subMarketArea = $dataSourceController->getSubmarketAreaDataSource();
$appraisers = $dataSourceController->getAppraiserDataSource();

$mfrecords = array();
if($leases->getId()!=""){
    $sql = "SELECT id, FORMAT(mfnounits,0) as mfnounits, mfsize, FORMAT(mftotalsf,0) as mftotalsf, CONCAT('$',FORMAT(mfrent,0)) as mfrent, CONCAT('$',FORMAT(mfrentsf,2)) as mfrentsf, mfnobr from mfmatrix WHERE FK_ReportID = ".$leases->getId()." order by id;";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $mfrecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$ssrecords = array();
if($leases->getId()!=""){
    $sql = "SELECT id, sssize, ssunittype, FORMAT(ssunitsf,0) as ssunitsf, CONCAT('$',FORMAT(ssrentmo,2)) as ssrentmo, CONCAT('$',FORMAT(ssrentsf,2)) as ssrentsf FROM ssmatrix WHERE FK_ReportID = ".$leases->getId()." order by id;";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $ssrecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$proppics = array();
if($leases->getID()!=""){
    $sql = "SELECT propphotos.id,CONCAT(FK_ReportID,'/', photopath) as image, caption,propphotos.order AS picOrder FROM propphotos
        WHERE FK_ReportID = '".$leases->getId()."'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $proppics = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

require("templates/templateLeases.php");

