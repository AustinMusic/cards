<?php
/* setting headers */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_time_limit(120);
ini_set('memory_limit','512M');
ini_set('max_execution_time',60);
require("../../../includes/check.php");
require("../../../includes/connect.php");

$data = json_decode($_POST['data'],true);


$id = intval($_GET['id']);

$keys = array_keys($data);
for($i=0;$i<count($keys);$i++){
	${$keys[$i]} =  mysqli_real_escape_string($conn,htmlentities( $data[$keys[$i]],ENT_QUOTES ));
}

$inc_basement = isset($conn,$inc_basement);
$yearbuilt_search = preg_replace('~\D~','', $year_built);
$year_built_search = substr($yearbuilt_search, 0, 4);
$floor_1_gba = str_replace(array('$','%',',',' '),'',$floor_1_gba);
$floor_2_gba = str_replace(array('$','%',',',' '),'',$floor_2_gba);
$total_basement_gba = str_replace(array('$','%',',',' '),'',$total_basement_gba);
$overall_gba = str_replace(array('$','%',',',' '),'',$overall_gba);
$basement_pct_gba = str_replace(array('$','%',',',' '), '', $basement_pct_gba);
$floor_1_nra = str_replace(array('$','%',',',' '),'',$floor_1_nra );
$floor_2_nra = str_replace(array('$','%',',',' '),'',$floor_2_nra);
$total_basement_nra = str_replace(array('$','%',',',' '),'',$total_basement_nra);
$overall_nra = str_replace(array('$','%',',',' '),'',$overall_nra);
$basement_pct_nra = str_replace(array('$','%',',',' '),'',$basement_pct_nra);
$storage_basement_sf = str_replace(array('$','%',',',' '),'',$storage_basement_sf);
$ancillary_area_sf = str_replace(array('$','%',',',' '),'',$ancillary_area_sf);
$eff_ratio_pct_nra = str_replace(array('$','%',',',' '), '', $eff_ratio_pct_nra);
$land_build_ratio_primary = str_replace(array(' to 1',' '),'',$land_build_ratio_primary);
$site_cover_primary = str_replace(array('$','%',',',' '), '', $site_cover_primary);
$land_build_ratio_overall = str_replace(array(' to 1',' '),'',$land_build_ratio_overall);
$site_cover_overall = str_replace(array('$','%',',',' '), '', $site_cover_overall );
$gla_inputsize = str_replace( ',', '', $gla_inputsize);
$gross_land_sf= str_replace(array('$','%',',',' '),'',$gross_land_sf);
$unusable_sf = str_replace(array('$','%',',',' '),'',$unusable_sf);
$net_usable_sf = str_replace(array('$','%',',',' '),'',$net_usable_sf);
$surplus_sf = str_replace(array('$','%',',',' '),'',$surplus_sf);
$excess_sf = str_replace(array('$','%',',',' '),'',$excess_sf);
$primary_sf = str_replace(array('$','%',',',' '),'',$primary_sf);
$shop_total_gba = str_replace(',','',$shop_total_gba);
$shop_inline_sf = str_replace(',','',$shop_inline_sf);
$shop_anchor_sf = str_replace(',','',$shop_anchor_sf);
$shop_total_nra = str_replace(',','',$shop_total_nra);
$shop_inline_pct = str_replace(array(',',' %'),'',$shop_inline_pct);
$shop_anchor_pct = str_replace(array(',',' %'),'',$shop_anchor_pct);
$store_avg_month_gallon = str_replace(',','',$store_avg_month_gallon);
$store_month_store_sales = str_replace(array('$ ',','),'',$store_month_store_sales);
$store_month_car_wash_sales = str_replace(array('$ ',','),'',$store_month_car_wash_sales);
$store_month_mini_sales = str_replace(array('$ ',','),'',$store_month_mini_sales);    
$store_total_month_sales = str_replace(array('$ ',','),'',$store_total_month_sales);
$veh_showroom_pct = str_replace(array(',',' %'),'',$veh_showroom_pct);
$veh_showroom_sf = str_replace(',','',$veh_showroom_sf);
$veh_service_sf = str_replace(',','',$veh_service_sf);
$ind_int_office_1 = str_replace(',','',$ind_int_office_1);
$ind_int_office_2 = str_replace(',','',$ind_int_office_2);
$ind_total_office = str_replace(',','',$ind_total_office);
$ind_storage_mezz_sf = str_replace(',','',$ind_storage_mezz_sf);
$ind_ext_office_1 = str_replace(',','',$ind_ext_office_1);
$ind_ext_office_2 = str_replace(',','',$ind_ext_office_2);
$ind_pct_office = str_replace(array(',',' %'),'',$ind_pct_office);
$parking_stalls = str_replace(array('$','%',',',' '),'',$parking_stalls);
$parking_ratio_nra = str_replace(array('$','%',',',' '),'',$parking_ratio_nra);
$parking_ratio_gba = str_replace(array('$','%',',',' '),'',$parking_ratio_gba);
$final_file = "";
$final_file_thumb = "";
$reportname = "";
$DateCreated = date('Y-m-d H:i:s');
$DateModified = date('Y-m-d H:i:s');
$cloneorigin ="Appraisal Report";

switch ( intval($_GET['reportType'])) {
	case 1;
	
	if ( $stmt = $conn->prepare( "INSERT INTO report (FK_ReportTypeID, status, priority, AssignedTo, DueDate, OwnerID, reportname, DateCreated, CreatedBy, DateModified, ModifiedBy, cloneorigin, cloneid) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		//$mediaUtilities = new rbe_mediaUtilities();
		$FK_ReportTypeID = '1';
		$stmt->bind_param("iiiisissisiss", $FK_ReportTypeID, $status, $priority, $AssignedTo, $DueDate, $user_id, $reportname, $DateCreated, $user_id, $DateModified, $user_id, $cloneorigin, $id);
		$stmt->execute();

		$lastid = $conn->insert_id;
		$directory = "../comp_images/" . $lastid;
		if ( !is_dir( $directory ) )
			mkdir( $directory, 0755, true );
		$stmt->close();
	} else {
		echo mysqli_error( $conn );
	};
	
	if ( $stmt1 = $conn->prepare( "INSERT INTO appraisalinfo (FK_ReportID) VALUES  (?)" ) ) {
		$stmt1->bind_param( "i", $lastid );
		$stmt1->execute();
		$stmt1->close();
	} else {
		echo mysqli_error( $conn );
	};
	
	if ( $stmt2 = $conn->prepare( "INSERT INTO property (FK_ReportID, photo1, thumbnail, property_name, address, streetnumber, streetname, city, county, state, zip_code, lat, lng, legal_desc, propertytype, propertysubtype, owner_type, owner_name, msa, genmarket, submarkid, taxlot, parcel_no, gla_inputtype, gla_inputsize, gross_land_sf, gross_land_acre, unusable_sf, unusable_acre, unusable_desc, net_usable_sf, net_usable_acre, net_usable_desc, surplus_sf, surplus_acre, surplus_desc, excess_sf, excess_acre, excess_desc, primary_sf, primary_acre, shape, utilities, exposure, flood_plain, topography, site_access, orientation, easement, easement_desc, zoning_code, zoning_desc, zoning_overlay, zoning_overlay_desc, zoning_juris, zoning_details, traffic_count, traffic_date, inter_street) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$stmt2->bind_param( "issssssssssddsisississsidididsidsidsidsidisiiiiiissssssssss", $lastid, $final_file, $final_file_thumb, $property_name, $address, $streetnumber, $streetname, $city, $county, $state, $zip_code, $lat, $lng, $legal_desc, $propertytype, $propertysubtype, $owner_type, $owner_name, $msa, $genmarket, $submarkid, $taxlot, $parcel_no, $gla_inputtype, $gla_inputsize, $gross_land_sf, $gross_land_acre, $unusable_sf, $unusable_acre, $unusable_desc, $net_usable_sf, $net_usable_acre, $net_usable_desc, $surplus_sf, $surplus_acre, $surplus_desc, $excess_sf, $excess_acre, $excess_desc, $primary_sf, $primary_acre, $shape, $utilities, $exposure, $flood_plain, $topography, $site_access, $orientation, $easement, $easement_desc, $zoning_code, $zoning_desc, $zoning_overlay, $zoning_overlay_desc, $zoning_juris, $zoning_details, $traffic_count, $traffic_date, $inter_street);
		$stmt2->execute();
		$stmt2->close();
	} else {
		echo mysqli_error( $conn );
	};
	
	if ( $stmt3 = $conn->prepare( "INSERT INTO building (FK_ReportID, no_building, no_stories, floor_1_gba, floor_2_gba, total_basement_gba, overall_gba, basement_pct_gba, gba_source, floor_1_nra, floor_2_nra, total_basement_nra, overall_nra, basement_pct_nra, nra_source, eff_ratio_pct_nra, land_build_ratio_primary, site_cover_primary, land_build_ratio_overall, site_cover_overall, basement_type, storage_basement_sf, ancillary_area_sf, ancillary_area_desc, building_comments, year_built, year_built_search, last_renovation, no_units, no_tenants, occupancy_type, building_quality, building_class, int_condition, ext_condition, const_class, const_descr, other_const_features, parking_stalls, parking_type, parking_ratio_nra, parking_ratio, parking_ratio_gba) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$stmt3->bind_param( "iisiiiidsiiiidsdddddsiisssisiiiiiiiissiidsd", $lastid, $no_building, $no_stories, $floor_1_gba, $floor_2_gba, $total_basement_gba, $overall_gba, $basement_pct_gba, $gba_source, $floor_1_nra, $floor_2_nra, $total_basement_nra, $overall_nra, $basement_pct_nra, $nra_source, $eff_ratio_pct_nra, $land_build_ratio_primary, $site_cover_primary, $land_build_ratio_overall, $site_cover_overall, $basement_type, $storage_basement_sf, $ancillary_area_sf, $ancillary_area_desc, $building_comments, $year_built, $year_built_search, $last_renovation, $no_units, $no_tenants, $occupancy_type, $building_quality, $building_class, $int_condition, $ext_condition, $const_class, $const_descr, $other_const_features, $parking_stalls, $parking_type, $parking_ratio_nra, $parking_ratio, $parking_ratio_gba);
		$stmt3->execute();
		$stmt3->close();
	} else {
		echo mysqli_error( $conn );
	};
        
    if ( $stmtpt = $conn->prepare("INSERT INTO proptypedetails (FK_ReportID, off_fire_sprinkler, off_type_hvac, off_elevator_service, shop_total_gba, shop_inline_sf, shop_anchor_tenant, shop_achor_space_inc, shop_anchor_sf, shop_total_nra, shop_inline_pct, shop_other_tenant, shop_anchor_pct, store_canopy, store_no_fuel, store_chain_affil, store_avg_month_gallon, store_month_store_sales, store_month_car_wash_sales, store_month_mini_sales, store_canopy_desc, store_fuel_desc, store_co_chain_affil, store_total_month_sales, veh_level, veh_tunnel, veh_showroom_pct, veh_showroom_sf, veh_service_sf, rest_no_seats, rest_drive_thru, rest_alcohol, rest_playground, ind_int_office_1, ind_int_office_2, ind_total_office, ind_clear_height, ind_storage_mezz_sf, ind_truck_grade, ind_truck_dock, ind_hvac, ind_ext_office_1, ind_ext_office_2, ind_pct_office, ind_storage_mess, ind_mezz_desc, ind_rail, ind_no_rail, ind_fire, ss_code_access, ss_alarm, ss_heat, ss_security, ss_boat, ss_on_site, ss_residence, ss_residence_desc) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
        $stmtpt->bind_param("iisiiisiiidsdiisiiiisssiiidiisiiiiiisisssiisisisiiiiiiiis", $lastid, $off_fire_sprinkler, $off_type_hvac, $off_elevator_service, $shop_total_gba, $shop_inline_sf, $shop_anchor_tenant, $shop_achor_space_inc, $shop_anchor_sf, $shop_total_nra, $shop_inline_pct, $shop_other_tenant, $shop_anchor_pct, $store_canopy, $store_no_fuel, $store_chain_affil, $store_avg_month_gallon, $store_month_store_sales, $store_month_car_wash_sales, $store_month_mini_sales, $store_canopy_desc, $store_fuel_desc, $store_co_chain_affil, $store_total_month_sales, $veh_level, $veh_tunnel, $veh_showroom_pct, $veh_showroom_sf, $veh_service_sf, $rest_no_seats, $rest_drive_thru, $rest_alcohol, $rest_playground, $ind_int_office_1, $ind_int_office_2, $ind_total_office, $ind_clear_height, $ind_storage_mezz_sf, $ind_truck_grade, $ind_truck_dock, $ind_hvac, $ind_ext_office_1, $ind_ext_office_2, $ind_pct_office, $ind_storage_mess, $ind_mezz_desc, $ind_rail, $ind_no_rail, $ind_fire, $ss_code_access, $ss_alarm, $ss_heat, $ss_security, $ss_boat, $ss_on_site, $ss_residence, $ss_residence_desc);
        $stmtpt->execute();
        $stmtpt->close();
    } else {
		echo mysqli_error( $conn );
	};
	
	if ( $stmt4 = $conn->prepare( "INSERT INTO saletrans (FK_ReportID) VALUES (?)" ) ) {
		$stmt4->bind_param( "i", $lastid );
		$stmt4->execute();
		$stmt4->close();
	} else {
		echo mysqli_error( $conn );
	};
	echo $lastid;
	die();
	//exit( header( "Location: appraisals.php?id=" . $lastid ) );
	break;
	case 2;
	if ( $stmt1 = $conn->prepare( "INSERT INTO report (FK_ReportTypeID, status, priority, AssignedTo, DueDate, OwnerID, reportname, DateCreated, CreatedBy, DateModified, ModifiedBy, cloneorigin, cloneid) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$FK_ReportTypeID = '2';
		$stmt1->bind_param("iiiisissisiss", $FK_ReportTypeID, $status, $priority, $AssignedTo, $DueDate, $user_id, $reportname, $DateCreated, $user_id, $DateModified, $user_id, $cloneorigin, $id);
		$stmt1->execute();

		$lastid = $conn->insert_id;
		$directory = "../comp_images/" . $lastid;
		if ( !is_dir( $directory ) )
			mkdir( $directory, 0755, true );
		$stmt1->close();
	};
	
	if ( $stmt2 = $conn->prepare( "INSERT INTO property (FK_ReportID, photo1, thumbnail, property_name, address, streetnumber, streetname, city, county, state, zip_code, lat, lng, propertytype, propertysubtype, msa, genmarket, submarkid, legal_desc, gla_inputtype, gla_inputsize, gross_land_sf, gross_land_acre, primary_sf, primary_acre, unusable_sf, unusable_acre, unusable_desc, surplus_sf, surplus_acre, surplus_desc, excess_sf, excess_acre, excess_desc, net_usable_sf, net_usable_acre, net_usable_desc, shape, topography, site_access, orientation, exposure, utilities, flood_plain, easement, easement_desc, other_land_comments, zoning_code, zoning_juris, zoning_desc, traffic_count, inter_street, traffic_date, floor_area_ratio) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$stmt2->bind_param( "issssssssssddississididididsidsidsidsiiiiisiissssssssi", $lastid, $final_file, $final_file_thumb, $property_name, $address, $streetnumber, $streetname, $city, $county, $state, $zip_code, $lat, $lng, $propertytype, $propertysubtype, $msa, $genmarket, $submarkid, $legal_desc, $gla_inputtype, $gla_inputsize, $gross_land_sf, $gross_land_acre, $primary_sf, $primary_acre, $unusable_sf, $unusable_acre, $unusable_desc, $surplus_sf, $surplus_acre, $surplus_desc, $excess_sf, $excess_acre, $excess_desc, $net_usable_sf, $net_usable_acre, $net_usable_desc, $shape, $topography, $site_access, $orientation, $exposure, $utilities, $flood_plain, $easement, $easement_desc, $other_land_comments, $zoning_code, $zoning_juris, $zoning_desc, $traffic_count, $inter_street, $traffic_date, $floor_area_ratio );
		$stmt2->execute();
		$stmt2->close();
	} else {
		echo mysqli_error( $conn );
	};
	
	if ( $stmt3 = $conn->prepare( "INSERT INTO building (FK_ReportID, no_building, no_stories, floor_1_gba, floor_2_gba, total_basement_gba, basement_pct_gba, overall_gba, gba_source, floor_1_nra, floor_2_nra, total_basement_nra, basement_pct_nra, overall_nra, nra_source, basement_type, storage_basement_sf, ancillary_area_sf, ancillary_area_desc, land_build_ratio_overall, land_build_ratio_primary, eff_ratio_pct_nra, site_cover_overall, site_cover_primary, year_built_search, last_renovation, year_built, occupancy_type, building_quality, int_condition, ext_condition, const_class, building_class, const_descr, other_const_features, parking_stalls, parking_type, parking_ratio_nra, parking_ratio, parking_ratio_gba) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$stmt3->bind_param( "iisiiidisiiidissiisdddddissiiiiiissiidsd", $lastid, $no_building, $no_stories, $floor_1_gba, $floor_2_gba, $total_basement_gba, $basement_pct_gba, $overall_gba, $gba_source, $floor_1_nra, $floor_2_nra, $total_basement_nra, $basement_pct_nra, $overall_nra, $nra_source, $basement_type, $storage_basement_sf, $ancillary_area_sf, $ancillary_area_desc, $land_build_ratio_overall, $land_build_ratio_primary, $eff_ratio_pct_nra, $site_cover_overall, $site_cover_primary, $year_built_search, $last_renovation, $year_built, $occupancy_type, $building_quality, $int_condition, $ext_condition, $const_class, $building_class, $const_descr, $other_const_features, $parking_stalls, $parking_type, $parking_ratio_nra, $parking_ratio, $parking_ratio_gba);
		$stmt3->execute();
		$stmt3->close();
	} else {
		echo mysqli_error( $conn );
	};
	
	if ( $stmt4 = $conn->prepare( "INSERT INTO proptypedetails (FK_ReportID, off_fire_sprinkler, off_type_hvac, off_elevator_service, shop_total_gba, shop_inline_sf, shop_anchor_tenant, shop_achor_space_inc, shop_anchor_sf, shop_total_nra, shop_inline_pct, shop_other_tenant, shop_anchor_pct, store_canopy, store_no_fuel, store_chain_affil, store_avg_month_gallon, store_month_store_sales, store_month_car_wash_sales, store_month_mini_sales, store_canopy_desc, store_fuel_desc, store_co_chain_affil, store_total_month_sales, veh_level, veh_tunnel, veh_showroom_pct, veh_showroom_sf, veh_service_sf, rest_no_seats, rest_drive_thru, rest_alcohol, rest_playground, ind_int_office_1, ind_int_office_2, ind_total_office, ind_clear_height, ind_storage_mezz_sf, ind_truck_grade, ind_truck_dock, ind_hvac, ind_ext_office_1, ind_ext_office_2, ind_pct_office, ind_storage_mess, ind_mezz_desc, ind_rail, ind_no_rail, ind_fire, ss_code_access, ss_alarm, ss_heat, ss_security, ss_boat, ss_on_site, ss_residence, ss_residence_desc) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$stmt4->bind_param("iisiiisiiidsdiisiiiisssiiidiisiiiiiisisssiisisisiiiiiiiis", $lastid, $off_fire_sprinkler, $off_type_hvac, $off_elevator_service, $shop_total_gba, $shop_inline_sf, $shop_anchor_tenant, $shop_achor_space_inc, $shop_anchor_sf, $shop_total_nra, $shop_inline_pct, $shop_other_tenant, $shop_anchor_pct, $store_canopy, $store_no_fuel, $store_chain_affil, $store_avg_month_gallon, $store_month_store_sales, $store_month_car_wash_sales, $store_month_mini_sales, $store_canopy_desc, $store_fuel_desc, $store_co_chain_affil, $store_total_month_sales, $veh_level, $veh_tunnel, $veh_showroom_pct, $veh_showroom_sf, $veh_service_sf, $rest_no_seats, $rest_drive_thru, $rest_alcohol, $rest_playground, $ind_int_office_1, $ind_int_office_2, $ind_total_office, $ind_clear_height, $ind_storage_mezz_sf, $ind_truck_grade, $ind_truck_dock, $ind_hvac, $ind_ext_office_1, $ind_ext_office_2, $ind_pct_office, $ind_storage_mess, $ind_mezz_desc, $ind_rail, $ind_no_rail, $ind_fire, $ss_code_access, $ss_alarm, $ss_heat, $ss_security, $ss_boat, $ss_on_site, $ss_residence, $ss_residence_desc);
		$stmt4->execute();
		$stmt4->close();
	} else {
		echo mysqli_error( $conn );
	};
	
	if ( $stmt5 = $conn->prepare( "INSERT INTO impunit (FK_ReportID) VALUES  (?)" ) ) {
		$stmt5->bind_param( "i", $lastid );
		$stmt5->execute();
		$stmt5->close();
	} else {
		echo mysqli_error( $conn );
	};
	
	if ( $stmt6 = $conn->prepare( "INSERT INTO saletrans (FK_ReportID, sale_comments) VALUES  (?, ?)" ) ) {
		$stmt6->bind_param( "is", $lastid, $sale_comments );
		$stmt6->execute();
		$stmt6->close();
	} else {
		echo mysqli_error( $conn );
	};
	
	// redirec the user
	echo $lastid;
	die();
	break;
	case 3;
	if ( $stmt1 = $conn->prepare( "INSERT INTO report (FK_ReportTypeID, status, priority, AssignedTo, DueDate, OwnerID, reportname, DateCreated, CreatedBy, DateModified, ModifiedBy, cloneorigin, cloneid) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$FK_ReportTypeID = '3';
		$stmt1->bind_param("iiiisissisiss", $FK_ReportTypeID, $status, $priority, $AssignedTo, $DueDate, $user_id, $reportname, $DateCreated, $user_id, $DateModified, $user_id, $cloneorigin, $id);
		$stmt1->execute();
		$lastid = $conn->insert_id;
		$directory = "../comp_images/" . $lastid;
		if ( !is_dir( $directory ) )
		mkdir( $directory, 0755, true );
		$stmt1->close();
	};	
	if ( $stmt2 = $conn->prepare( "INSERT INTO property (FK_ReportID, photo1, thumbnail, property_name, address, streetnumber, streetname, city, county, state, zip_code, lat, lng, propertytype, propertysubtype, genmarket, msa, submarkid, traffic_count, traffic_date, inter_street, gross_land_sf, gross_land_acre, exposure, site_access, zoning_code) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$stmt2->bind_param( "issssssssssddisisisssidiis", $lastid, $final_file, $final_file_thumb, $property_name, $address, $streetnumber, $streetname, $city, $county, $state, $zip_code, $lat, $lng, $propertytype, $propertysubtype, $genmarket, $msa, $submarkid, $traffic_count, $traffic_date, $inter_street, $gross_land_sf, $gross_land_acre, $exposure, $site_access, $zoning_code );
		$stmt2->execute();
		$stmt2->close();
	} else {
		echo mysqli_error( $conn );
	};	
	if ( $stmt3 = $conn->prepare( "INSERT INTO building (FK_ReportID, overall_gba, overall_nra, land_build_ratio_primary, year_built, year_built_search, last_renovation, occupancy_type, no_building, no_stories, const_descr, other_const_features, building_quality, int_condition, ext_condition, building_class, parking_stalls, parking_ratio_nra, parking_ratio) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$stmt3->bind_param( "iiidsisiiissiiiiids", $lastid, $overall_gba, $overall_nra, $land_build_ratio_primary, $year_built, $year_built_search, $last_renovation, $occupancy_type, $no_building, $no_stories, $const_descr, $other_const_features, $building_quality, $int_condition, $ext_condition, $building_class, $parking_stalls, $parking_ratio_nra, $parking_ratio);
		$stmt3->execute();
		$stmt3->close();
	} else {
		echo mysqli_error( $conn );
	};	
	if ( $stmt4 = $conn->prepare( "INSERT INTO proptypedetails (FK_ReportID) VALUES  (?)" ) ) {
		$stmt4->bind_param( "i", $lastid);
		$stmt4->execute();
		$stmt4->close();
	} else {
		echo mysqli_error( $conn );
	};
	if ( $stmt5 = $conn->prepare( "INSERT INTO leasetrans (FK_ReportID, proj_site) VALUES  (?, ?)" ) ) {		
		$proj_site = '1';
		$stmt5->bind_param( "ii", $lastid, $proj_site);
		$stmt5->execute();
		$stmt5->close();
	} else {
		echo mysqli_error( $conn );
	};
	
	if ( $stmt6 = $conn->prepare( "INSERT INTO multifamily (FK_ReportID) VALUES  (?)" ) ) {
		$stmt6->bind_param( "i", $lastid);
		$stmt6->execute();
		$stmt6->close();
	} else {
		echo mysqli_error( $conn );
	};
	
	if ( $stmt7 = $conn->prepare( "INSERT INTO selfstorage (FK_ReportID) VALUES  (?)" ) ) {
		$stmt7->bind_param( "i", $lastid);
		$stmt7->execute();
		$stmt7->close();
	} else {
		echo mysqli_error( $conn );
	};
	
	if ( $stmt8 = $conn->prepare( "INSERT INTO yardabsorb (FK_ReportID) VALUES  (?)" ) ) {
		$stmt8->bind_param( "i", $lastid);
		$stmt8->execute();
		$stmt8->close();
	} else {
		echo mysqli_error( $conn );
	};
	echo $lastid;
	die();
	break;
	case 4;
	if ( $stmt1 = $conn->prepare( "INSERT INTO report (FK_ReportTypeID, status, priority, AssignedTo, DueDate, OwnerID, reportname, DateCreated, CreatedBy, DateModified, ModifiedBy, cloneorigin, cloneid) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$FK_ReportTypeID = '4';
		$stmt1->bind_param("iiiisissisiss", $FK_ReportTypeID, $status, $priority, $AssignedTo, $DueDate, $user_id, $reportname, $DateCreated, $user_id, $DateModified, $user_id, $cloneorigin, $id);
		$stmt1->execute();

		$lastid = $conn->insert_id;
		$directory = "../comp_images/" . $lastid;
		if ( !is_dir( $directory ) )
			mkdir( $directory, 0755, true );
		if ( $stmt2 = $conn->prepare( "INSERT INTO property (FK_ReportID, property_name, address, streetnumber, streetname, city, county, state, zip_code, lat, lng, propertytype, propertysubtype, msa, genmarket, submarkid, legal_desc, photo1, thumbnail, gla_inputtype, gla_inputsize, gross_land_acre, gross_land_sf, unusable_sf, unusable_acre, unusable_desc, net_usable_sf, net_usable_acre, net_usable_desc, shape, topography, utilities, flood_plain, orientation, site_access, exposure, easement, easement_desc, zoning_juris, zoning_code, zoning_desc, traffic_count, traffic_date, inter_street) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
			$stmt2->bind_param( "issssssssddiisiisssiddiidsidsiissiiiisssssss", $lastid, $property_name, $address, $streetnumber, $streetname, $city, $county, $state, $zip_code, $lat, $lng, $propertytype, $propertysubtype, $msa, $genmarket, $submarkid, $legal_desc, $final_file, $final_file_thumb, $gla_inputtype, $gla_inputsize, $gross_land_acre, $gross_land_sf, $unusable_sf, $unusable_acre, $unusable_desc, $net_usable_sf, $net_usable_acre, $net_usable_desc, $shape, $topography, $utilities, $flood_plain, $orientation, $site_access, $exposure, $easement, $easement_desc, $zoning_juris, $zoning_code, $zoning_desc, $traffic_count, $traffic_date, $inter_street);
			$stmt2->execute();
			$stmt2->close();
		} else {
			echo mysqli_error( $conn );
		};
		
		if ( $stmt3 = $conn->prepare( "INSERT INTO building (FK_ReportID) VALUES  (?)" ) ) {
			$stmt3->bind_param( "i", $lastid);
			$stmt3->execute();
			$stmt3->close();
		} else {
			echo mysqli_error( $conn );
		};
		
		if ( $stmt4 = $conn->prepare( "INSERT INTO groundlease (FK_ReportID) VALUES  (?)" ) ) {
			$stmt4->bind_param( "i", $lastid );
			$stmt4->execute();
			$stmt4->close();
		} else {
			echo mysqli_error( $conn );
		};
		
		if ( $stmt5 = $conn->prepare( "INSERT INTO resland (FK_ReportID) VALUES  (?)" ) ) {
			$stmt5->bind_param( "i", $lastid );
			$stmt5->execute();
			$stmt5->close();
		} else {
			echo mysqli_error( $stmt5 );
		};
		
		if ( $stmt6 = $conn->prepare( "INSERT INTO saletrans (FK_ReportID, sale_comments) VALUES  (?, ?)" ) ) {
			$stmt6->bind_param( "is", $lastid, $sale_comments );
			$stmt6->execute();
			$stmt6->close();
		} else {
			echo mysqli_error( $conn );
		};
		echo $lastid;
		die();
		break;
	}
}
	?>