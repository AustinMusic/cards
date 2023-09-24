<?php
date_default_timezone_set('America/Los_Angeles');
error_reporting(E_ALL);
ini_set('display_errors', TRUE); 

require("../../../includes/connectPDO.php");
include("../../../includes/check.php");
require("../config/databaseTables.php");

require("classes/landsales.php");
require("classes/assessedvalue.php");
require("classes/dataSourceController.php");
require("classes/landSalesDBController.php");
require("classes/rbe_mediaUtilities.php");

$landsales = new landsales();



if(isset($_POST['submit'])){
    $keys = array_keys($_POST);
    for($k=0;$k<count($keys);$k++){
        $method = "set".$keys[$k];
        if(method_exists($landsales,$method)){
            $landsales->$method($_POST[$keys[$k]]);
        }  
    }
    
    if(empty($user_id)){
        $user_id = 1;
    }else{
        $user_id = $user_id;
    }
    
    $landsales->setLat(str_replace(",","",$landsales->getLat()));
    $landsales->setLng(str_replace(",","",$landsales->getLng()));
    $landsales->setNohomesite(str_replace(",","",$landsales->getNohomesite()));
    $landsales->setGla_inputsize(str_replace(",","",$landsales->getGla_inputsize()));
    $landsales->setGross_land_acre(str_replace(",","",$landsales->getGross_land_acre()));
    $landsales->setGross_land_sf(str_replace(",","",$landsales->getGross_land_sf()));
    $landsales->setUnusable_sf(str_replace(",","",$landsales->getUnusable_sf()));
    $landsales->setUnusable_acre(str_replace(",","",$landsales->getUnusable_acre()));
    $landsales->setNet_usable_sf(str_replace(",","",$landsales->getNet_usable_sf()));
    $landsales->setNet_usable_acre(str_replace(",","",$landsales->getNet_usable_acre()));
    $landsales->setFloor_area_ratio(str_replace(",","",$landsales->getFloor_area_ratio()));
    $landsales->setMax_floor_area(str_replace(",","",$landsales->getMax_floor_area()));
    $landsales->setSale_price(str_replace(array('$',','),"",$landsales->getSale_price()));
    $landsales->setLess_alloc_imp_price(str_replace(array('$',','),"",$landsales->getLess_alloc_imp_price()));
    $landsales->setAlloc_land_value(str_replace(array('$',','),"",$landsales->getAlloc_land_value()));
    $landsales->setFee_equiv_price(str_replace(array('$',','),"",$landsales->getFee_equiv_price()));
    $landsales->setFee_simple_equiv_price(str_replace(array('$',','),"",$landsales->getFee_simple_equiv_price()));
    $landsales->setCash_equiv_price(str_replace(array('$',','),"",$landsales->getCash_equiv_price()));
    $landsales->setList_price(str_replace(array('$',','),"",$landsales->getList_price()));
    $landsales->setList_price_change(str_replace(array('$',','),"",$landsales->getList_price_change()));
    $landsales->setGl_total_project(str_replace(",","",$landsales->getGl_total_project()));
    $landsales->setGl_leased_land_sf(str_replace(",","",$landsales->getGl_leased_land_sf()));
    $landsales->setGl_building_footprint(str_replace(",","",$landsales->getGl_building_footprint()));
    $landsales->setGl_rent_begin(str_replace(array('$',','),"",$landsales->getGl_rent_begin()));
    $landsales->setGl_rent_per_sf_land(str_replace(array('$',','),"",$landsales->getGl_rent_per_sf_land()));
    $landsales->setGl_rent_per_sf_footprint(str_replace(array('$',','),"",$landsales->getGl_rent_per_sf_footprint()));
    $landsales->setGl_fee_simple_equiv(str_replace(array('$',','),"",$landsales->getGl_fee_simple_equiv()));
    $landsales->setGl_fee_equiv_per_sf(str_replace(array('$',','),"",$landsales->getGl_fee_equiv_per_sf()));
    $landsales->setGl_rate_return(str_replace(array('$',','),"",$landsales->getGl_rate_return()));
    $landsales->setFloor_1_gba(str_replace(",","",$landsales->getFloor_1_gba()));
    $landsales->setSite_cover_primary(str_replace(array('%',','),"",$landsales->getSite_cover_primary()));
    $landsales->setFloor_2_gba(str_replace(",","",$landsales->getFloor_2_gba()));
    $landsales->setLand_build_ratio_primary(str_replace(array(',','to1'),"",$landsales->getSite_cover_primary()));
    $landsales->setTotal_basement_gba(str_replace(",","",$landsales->getTotal_basement_gba()));
    $landsales->setOverall_gba(str_replace(",","",$landsales->getOverall_gba()));
    $landsales->setFin_term_adj(str_replace(array('$',',',' '),"",$landsales->getFin_term_adj()));
    $landsales->setCond_sale_adj(str_replace(array('$',',',' '),"",$landsales->getCond_sale_adj()));
    $landsales->setDemo_cost(str_replace(array('$',',',' '),"",$landsales->getDemo_cost()));
    $landsales->setOnsite_extra_cost(str_replace(array('$',',',' '),"",$landsales->getOnsite_extra_cost()));
    $landsales->setOffsite_develop(str_replace(array('$',',',' '),"",$landsales->getOffsite_develop()));
    $landsales->setBroker_cost(str_replace(array('$',',',' '),"",$landsales->getBroker_cost()));
    $landsales->setEff_sale_price_stab(str_replace(array('$',','),"",$landsales->getEff_sale_price_stab()));
    $landsales->setValue_ffe(str_replace(array('$',','),"",$landsales->getValue_ffe()));
    $landsales->setUnadj_sale_price(str_replace(array('$',','),"",$landsales->getUnadj_sale_price()));
    $landsales->setValue_entitle(str_replace(array('$',','),"",$landsales->getValue_entitle()));
    $landsales->setValue_entitlement_lot(str_replace(array('$',','),"",$landsales->getValue_entitlement_lot()));
    $landsales->setAdj_price_finish_with(str_replace(array('$',','),"",$landsales->getAdj_price_finish_with()));
    $landsales->setSale_price_lot_with(str_replace(array('$',','),"",$landsales->getSale_price_lot_with()));
    $landsales->setSale_price_net_acre_with(str_replace(array('$',','),"",$landsales->getSale_price_net_acre_with()));
    $landsales->setPrice_net_sf_with(str_replace(array('$',','),"",$landsales->getPrice_net_sf_with()));
    $landsales->setAdj_price_finished_wo(str_replace(array('$',','),"",$landsales->getAdj_price_finished_wo()));
    $landsales->setSale_price_lot_wo(str_replace(array('$',','),"",$landsales->getSale_price_lot_wo()));
    $landsales->setSale_price_net_acre_wo(str_replace(array('$',','),"",$landsales->getSale_price_net_acre_wo()));
    $landsales->setPrice_net_sf_wo(str_replace(array('$',','),"",$landsales->getPrice_net_sf_wo()));
    $landsales->setFinish_lot_size_sf(str_replace(",","",$landsales->getFinish_lot_size_sf()));
    $landsales->setAdj_bulk_sale_price(str_replace(array('$',','),"",$landsales->getAdj_bulk_sale_price()));
    $landsales->setBulk_price_lot(str_replace(array('$',','),"",$landsales->getBulk_price_lot()));
    $landsales->setBulk_price_sf_avg(str_replace(array('$',','),"",$landsales->getBulk_price_sf_avg()));
    $landsales->setAdj_price_acre_gross(str_replace(array('$',','),"",$landsales->getAdj_price_acre_gross()));
    $landsales->setAdj_price_acre_net(str_replace(array('$',','),"",$landsales->getAdj_price_acre_net()));
    $landsales->setAdj_price_sf_pad(str_replace(array('$',','),"",$landsales->getAdj_price_sf_pad()));
    $landsales->setAdj_price_sf_gross(str_replace(array('$',','),"",$landsales->getAdj_price_sf_gross()));
    $landsales->setAdj_price_sf_net(str_replace(array('$',','),"",$landsales->getAdj_price_sf_net()));
    $landsales->setAdj_price_sf_far(str_replace(array('$',','),"",$landsales->getAdj_price_sf_far()));
    $landsales->setAdjhomesite(str_replace(array('$',','),"",$landsales->getAdjhomesite()));
    $landsales->setRmvland(str_replace(array('$',','),"",$landsales->getRmvland()));
    $landsales->setRmvimp(str_replace(array('$',','),"",$landsales->getRmvimp()));
    $landsales->setRmvtotal(str_replace(array('$',','),"",$landsales->getRmvtotal()));
    $landsales->setTaxes(str_replace(array('$',','),"",$landsales->getTaxes()));

    $landsales->setDocData(array());
    if($_POST['docData']!=""){
        $landsales->setDocData(json_decode($_POST['docData']));
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
	$landsales->setAssessedvalues($assessedvalues);

    if ( $landsales->getPropertytype()=="") {
        // if they are empty, show an error message and display the form
        $error = 'ERROR: Please fill in all required fields!';
    }else{

        // if everything is fine, update the record in the database
        //mysqli_autocommit($conn, FALSE);
        //$query_success = TRUE;

        $landsales->setDateModified(date('Y-m-d H:i:s'));
        
        $landSalesDBController = new landsalesDBController();
        $landSalesDBController->db = $db;
        $landsales = $landSalesDBController->landsaleOperation($landsales,$user_id);
        //die();

        // redirect the user once the form is updated
        header("location: landsales.php?id=". $landsales->getId());
        die();
    }
    print_r($landsales);
    die();
}


// if the 'id' variable is set in the URL, we know that we need to edit a record
if ( isset( $_GET[ 'id' ] ) ) {
	// get 'id' from URL
	$id = intval($_GET[ 'id' ]);
	
	$landSalesDBController = new landSalesDBController();
	$landSalesDBController->db = $db;
	$rows = $landSalesDBController->getRecord($id);

	if(count($rows)>0){
	    $keys = array_keys($rows[0]);
	    for($i=0;$i<count($keys);$i++){
	        $method = "set".$keys[$i];
	        if(method_exists($landsales,$method)){
	            $landsales->$method($rows[0][$keys[$i]]);
	        }else{
	            echo "method ".$method." not exists<br/>";
	        }
	    
	    }
        
		$assessedvalues = array();
		$rows = $landSalesDBController->getAssessedValues($id);
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
		$landsales->setAssessedvalues($assessedvalues);

	    $rows = $landSalesDBController->getLinks($id);
	    if(count($rows)>0){
	         $landsales->setDocData($rows);
	    }
	}

}

/*DATASOURCES*/
/*following are the results of queries served as datasources for drop downs*/
/*data format is an associative array*/

$dataSourceController = new dataSourceControler();
$dataSourceController->db = $db;

$statusData = $dataSourceController->getStatusDataSource();
$priorityData = $dataSourceController->getPriorityDataSource();
$usersData = $dataSourceController->getUsersDataSource();
$templateData = $dataSourceController->getTemplateDataSource('landsale', 1);
$propertyData = $dataSourceController->getPropertyTypeDataSource(4,1,array(1));
$subPropertyData = $dataSourceController->getSubtypeDataSource(4,"=");
$marketData = $dataSourceController->getGenMarketDataSource();
$subMarketData = $dataSourceController->getSubmarketDataSource();
$shapeData = $dataSourceController->getWFDictionaryDataSource("shape",3);
$topographyData = $dataSourceController->getWFDictionaryDataSource("topography",3);
$yesnoData = $dataSourceController->getWFDictionaryDataSource("yesno",3);
$yesnoDataDesc = $dataSourceController->getWFDictionaryDataSource("yesno",3,"DESC");
$orientationData = $dataSourceController->getWFDictionaryDataSource("orientation",3);
$siteAccessData = $dataSourceController->getWFDictionaryDataSource("siteaccess",3);
$exposureData = $dataSourceController->getWFDictionaryDataSource("exposure",3);
$proprightsData = $dataSourceController->getWFDictionaryDataSource("proprights",3);
$convdocData = $dataSourceController->getWFDictionaryDataSource("convdoc",3);
$salestatusData = $dataSourceController->getWFDictionaryDataSource("salestatus",3);
$inspecttypeData = $dataSourceController->getWFDictionaryDataSource("inspecttype",3);
$glstatusData = $dataSourceController->getWFDictionaryDataSource("glstatus",3);
$ressaleData = $dataSourceController->getWFDictionaryDataSource("ressale",3);
$msalist = $dataSourceController->getEditDDDataSource("msalist",1);
$utilslist = $dataSourceController->getEditDDDataSource("utilslist",1);
$eadesc = $dataSourceController->getEditDDDataSource("eadesc",1);
$bsizesource = $dataSourceController->getEditDDDataSource("bsizesource",1);
$apprnames = $dataSourceController->getEditDDDataSource("apprnames",1);
$int_conv = $dataSourceController->getEditDDDataSource("int_conv",1);
$findesc = $dataSourceController->getEditDDDataSource("findesc",1);
$tonmarket = $dataSourceController->getEditDDDataSource("tonmarket",1);
$APComment = $dataSourceController->getEditDDDataSource("APComment",1);
$sourcedata = $dataSourceController->getEditDDDataSource("sourcedata",1);
$conf1sour = $dataSourceController->getEditDDDataSource("conf1sour",1);
$relat1 = $dataSourceController->getEditDDDataSource("relat1",1);
$conf2sour = $dataSourceController->getEditDDDataSource("conf2sour",1);
$EZCode = $dataSourceController->getEditDDDataSource("EZCode",1);
$EZJuris = $dataSourceController->getEditDDDataSource("EZJuris",1);
$EZDesc = $dataSourceController->getEditDDDataSource("EZDesc",1);
$TimReZone = $dataSourceController->getEditDDDataSource("TimReZone",1);
$subMarketArea = $dataSourceController->getSubmarketAreaDataSource();
$appraisers = $dataSourceController->getAppraiserDataSource();


$assessedrecords = array();
if($landsales->getId()!=""){
    $sql = "SELECT * from assessedvalues WHERE FK_ReportID = ".$landsales->getId()." order by id;";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $assessedrecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$proppics = array();
if($landsales->getID()!=""){
    $sql = "SELECT propphotos.id,CONCAT(FK_ReportID,'/', photopath) as image, caption,propphotos.order AS picOrder FROM propphotos
        WHERE FK_ReportID = '".$landsales->getId()."'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $proppics = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

require("templates/templateLandSales.php");

