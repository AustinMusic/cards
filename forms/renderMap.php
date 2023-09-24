<?php
date_default_timezone_set('America/Los_Angeles');
error_reporting(E_ALL);
ini_set('display_errors', TRUE); 

require("../../../includes/connectPDO.php");
include("../../../includes/check.php");
require("../config/databaseTables.php");

require("classes/appraisals.php");
require("classes/appraisalsDBController.php");

$appraisals = new appraisals();

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
	}
}
/*
$clirecords = array();
if($appraisals->getClient_db()!=""){
    $sql = "SELECT id, compname, firstname, lastname, cellphone, email, website from clients WHERE id IN (".implode(',',(array)$appraisals->getClient_db()).") order by FIELD(id,".$appraisals->getClient_db().");";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $clirecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$apprecords = array();
if($appraisals->getAppraiser_db()!=""){
    $sql = "SELECT a.id, compname, b.definition as apptitle, a.firstname, a.lastname, a.designation, a.emailaddress, a.phoneone from appraisers a JOIN WFDictionary b on b.id = a.apptitle WHERE a.id IN (".implode(',',(array)$appraisals->getAppraiser_db()).") order by FIELD(a.id,".$appraisals->getAppraiser_db().");";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $apprecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

$miscrecords = array();
if($appraisals->getMiscrent_db()!=""){
    $sql = "SELECT a.id, if(b.thumbnail = '','no-photo-tn.jpg',CONCAT(a.id,'/',b.thumbnail)) AS thumbnail, if(b.photo1 = '','no-photo.jpg',CONCAT(a.id,'/',b.photo1)) AS photo1, b.property_name, concat(b.streetnumber,' ',b.streetname) as address, b.city, b.state, c.lessee_name, date_format(c.lease_start_date,'%m/%y') as lease_start, concat(c.total_lease_term_mos,' ',d.definition) as term, format(e.yard_land_area_sf,0) as yard_sf, e.desc_yard_space, concat('$',format(e.eff_yard_rent_sf_mo,3)) as yard_rent, e.or_tenant, f.definition as ortypes, concat('$ ',format(e.other_rent_sf_mo,0)) as other_rent_sf_mo from report a left outer join property b on b.FK_ReportID = a.id left outer join leasetrans c on c.FK_ReportID = a.id left outer join WFDictionary d on d.id = c.mos_vs_mos left outer join yardabsorb e on e.FK_ReportID = a.id left outer join WFDictionary f on f.id = e.ortypes WHERE a.id in (".implode(',',(array)$appraisals->getMiscrent_db()).") order by FIELD(a.id,".$appraisals->getMiscrent_db().");";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $miscrecords = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
*/

$coords = array();
if($appraisals->getImproved_db()!=""){
    $sql = "SELECT  b.lat,b.lng
			FROM report a 
			LEFT JOIN property b on b.FK_ReportID = a.id WHERE a.id IN (".implode(',',(array)$appraisals->getImproved_db()).") order by FIELD(a.id,".$appraisals->getImproved_db().");";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $coords = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

require("templates/templateRenderMap.php");

