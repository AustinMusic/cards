<?php
/* setting headers */
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );
set_time_limit( 120 );
ini_set( 'memory_limit', '512M' );
ini_set( 'max_execution_time', 60 );
require("../../../includes/check.php");
require( "../../../includes/connect.php" );

$data = json_decode( $_POST[ 'data' ], true );


$id = intval( $_GET[ 'id' ] );

$keys = array_keys( $data );
for ( $i = 0; $i < count( $keys ); $i++ ) {
	$ {
		$keys[ $i ]
	} = mysqli_real_escape_string( $conn, htmlentities( $data[ $keys[ $i ] ], ENT_QUOTES ) );
}

$yearbuilt_search = preg_replace('~\D~','', $year_built);
$year_built_search = substr($yearbuilt_search, 0, 4);
$gla_inputsize = str_replace(array('$','%',',',' '),'',$gla_inputsize);
$gross_land_sf = str_replace(array('$','%',',',' '),'',$gross_land_sf);
$gross_land_acre = str_replace(array('$','%',',',' '),'',$gross_land_acre);
$primary_sf = str_replace(array('$','%',',',' '),'',$primary_sf);
$primary_acre = str_replace(array('$','%',',',' '),'',$primary_acre);
$unusable_sf = str_replace(array('$','%',',',' '),'',$unusable_sf);
$unusable_acre = str_replace(array('$','%',',',' '),'',$unusable_acre);
$surplus_sf = str_replace(array('$','%',',',' '),'',$surplus_sf);
$surplus_acre = str_replace(array('$','%',',',' '),'',$surplus_acre);
$excess_sf = str_replace(array('$','%',',',' '),'',$excess_sf);
$excess_acre = str_replace(array('$','%',',',' '),'',$excess_acre);
$net_usable_sf = str_replace(array('$','%',',',' '),'',$net_usable_sf);
$net_usable_acre = str_replace(array('$','%',',',' '),'',$net_usable_acre);
$floor_1_gba = str_replace(array('$','%',',',' '),'',$floor_1_gba);
$floor_2_gba = str_replace(array('$','%',',',' '),'',$floor_2_gba);
$total_basement_gba = str_replace(array('$','%',',',' '),'',$total_basement_gba);
$basement_pct_gba = str_replace(array('$','%',',',' '),'',$basement_pct_gba);
$overall_gba = str_replace(array('$','%',',',' '),'',$overall_gba);
$gba_source = str_replace(array('$','%',',',' '),'',$gba_source);
$floor_1_nra = str_replace(array('$','%',',',' '),'',$floor_1_nra);
$floor_2_nra = str_replace(array('$','%',',',' '),'',$floor_2_nra);
$total_basement_nra = str_replace(array('$','%',',',' '),'',$total_basement_nra);
$basement_pct_nra = str_replace(array('$','%',',',' '),'',$basement_pct_nra);
$overall_nra = str_replace(array('$','%',',',' '),'',$overall_nra);
$storage_basement_sf = str_replace(array('$','%',',',' '),'',$storage_basement_sf);
$ancillary_area_sf = str_replace(array('$','%',',',' '),'',$ancillary_area_sf);
$land_build_ratio_overall = str_replace(array(' to 1',' '),'',$land_build_ratio_overall);
$land_build_ratio_primary = str_replace(array(' to 1',' '),'',$land_build_ratio_primary);
$land_build_usable = str_replace(array('$','%',',',' '),'',$land_build_usable);
$eff_ratio_pct_nra = str_replace(array('$','%',',',' '),'',$eff_ratio_pct_nra);
$site_cover_overall = str_replace(array('$','%',',',' '),'',$site_cover_overall);
$site_cover_primary = str_replace(array('$','%',',',' '),'',$site_cover_primary);
$floor_area_ratio = str_replace(array('$','%',',',' '),'',$floor_area_ratio);
$parking_stalls = str_replace(array('$','%',',',' '),'',$parking_stalls);
$parking_ratio_nra = str_replace(array('$','%',',',' '),'',$parking_ratio_nra);
$parking_ratio_gba = str_replace(array('$','%',',',' '),'',$parking_ratio_gba);
$final_file = "";
$final_file_thumb = "";
$reportname = "";
$DateCreated = date('Y-m-d H:i:s');
$DateModified = date('Y-m-d H:i:s');
$cloneorigin = "Improved Sales";

switch ( intval( $_GET[ 'reportType' ] ) ) {
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
	if ( $stmt2 = $conn->prepare( "INSERT INTO property (FK_ReportID, photo1, thumbnail, property_name, address, streetnumber, streetname, city, county, state, zip_code, lat, lng, legal_desc, propertytype, propertysubtype, msa, genmarket, submarkid, gla_inputtype, gla_inputsize, gross_land_sf, gross_land_acre, unusable_sf, unusable_acre, unusable_desc, net_usable_sf, net_usable_acre, net_usable_desc, surplus_sf, surplus_acre, surplus_desc, excess_sf, excess_acre, excess_desc, primary_sf, primary_acre, shape, utilities, exposure, flood_plain, topography, site_access, orientation, easement, easement_desc, zoning_code, zoning_desc, zoning_juris, traffic_count, traffic_date, inter_street) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$stmt2->bind_param( "issssssssssddsissisidididsidsidsidsidisiiiiiisssssss", $lastid, $final_file, $final_file_thumb, $property_name, $address, $streetnumber, $streetname, $city, $county, $state, $zip_code, $lat, $lng, $legal_desc, $propertytype, $propertysubtype, $msa, $genmarket, $submarkid, $gla_inputtype, $gla_inputsize, $gross_land_sf, $gross_land_acre, $unusable_sf, $unusable_acre, $unusable_desc, $net_usable_sf, $net_usable_acre, $net_usable_desc, $surplus_sf, $surplus_acre, $surplus_desc, $excess_sf, $excess_acre, $excess_desc, $primary_sf, $primary_acre, $shape, $utilities, $exposure, $flood_plain, $topography, $site_access, $orientation, $easement, $easement_desc, $zoning_code, $zoning_desc, $zoning_juris, $traffic_count, $traffic_date, $inter_street);
		$stmt2->execute();
		$stmt2->close();
	} else {
		echo mysqli_error( $conn );
	};
	if ( $stmt3 = $conn->prepare( "INSERT INTO building (FK_ReportID, no_building, no_stories, floor_1_gba, floor_2_gba, total_basement_gba, overall_gba, basement_pct_gba, gba_source, floor_1_nra, floor_2_nra, total_basement_nra, overall_nra, basement_pct_nra, nra_source, eff_ratio_pct_nra, land_build_ratio_primary, site_cover_primary, land_build_ratio_overall, site_cover_overall, basement_type, storage_basement_sf, ancillary_area_sf, ancillary_area_desc, building_comments, year_built, year_built_search, last_renovation, occupancy_type, building_quality, building_class, int_condition, ext_condition, const_class, const_descr, other_const_features) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$stmt3->bind_param( "iisiiiidsiiiidsdddddsiisssisiiiiiiss", $lastid, $no_building, $no_stories, $floor_1_gba, $floor_2_gba, $total_basement_gba, $overall_gba, $basement_pct_gba, $gba_source, $floor_1_nra, $floor_2_nra, $total_basement_nra, $overall_nra, $basement_pct_nra, $nra_source, $eff_ratio_pct_nra, $land_build_ratio_primary, $site_cover_primary, $land_build_ratio_overall, $site_cover_overall, $basement_type, $storage_basement_sf, $ancillary_area_sf, $ancillary_area_desc, $building_comments, $year_built, $year_built_search, $last_renovation, $occupancy_type, $building_quality, $building_class, $int_condition, $ext_condition, $const_class, $const_descr, $other_const_features );
		$stmt3->execute();
		$stmt3->close();
	} else {
		echo mysqli_error( $conn );
	};
    if ( $stmtpt = $conn->prepare( "INSERT INTO proptypedetails (FK_ReportID) VALUES  (?)" ) ) {
		$stmtpt->bind_param( "i", $lastid);
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
	break;
	case 2;
	if ( $stmt = $conn->prepare( "INSERT INTO report (FK_ReportTypeID, status, priority, AssignedTo, DueDate, OwnerID, reportname, DateCreated, CreatedBy, DateModified, ModifiedBy, cloneorigin, cloneid) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		//$mediaUtilities = new rbe_mediaUtilities();
		$FK_ReportTypeID = '2';
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
	if ( $stmt2 = $conn->prepare( "INSERT INTO property (FK_ReportID, photo1, thumbnail, property_name, address, streetnumber, streetname, city, county, state, zip_code, lat, lng, propertytype, propertysubtype, msa, genmarket, submarkid, legal_desc, gla_inputtype, gla_inputsize, gross_land_sf, gross_land_acre, primary_sf, primary_acre, unusable_sf, unusable_acre, unusable_desc, surplus_sf, surplus_acre, surplus_desc, excess_sf, excess_acre, excess_desc, net_usable_sf, net_usable_acre, net_usable_desc, shape, topography, site_access, orientation, exposure, utilities, flood_plain, easement, easement_desc, other_land_comments, zoning_code, zoning_juris, zoning_desc, traffic_count, inter_street, traffic_date, floor_area_ratio) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$stmt2->bind_param( "issssssssssddississididididsidsidsidsiiiiisiissssssssi", $lastid, $final_file, $final_file_thumb, $property_name, $address, $streetnumber, $streetname, $city, $county, $state, $zip_code, $lat, $lng, $propertytype, $propertysubtype, $msa, $genmarket, $submarkid, $legal_desc, $gla_inputtype, $gla_inputsize, $gross_land_sf, $gross_land_acre, $primary_sf, $primary_acre, $unusable_sf, $unusable_acre, $unusable_desc, $surplus_sf, $surplus_acre, $surplus_desc, $excess_sf, $excess_acre, $excess_desc, $net_usable_sf, $net_usable_acre, $net_usable_desc, $shape, $topography, $site_access, $orientation, $exposure, $utilities, $flood_plain, $easement, $easement_desc, $other_land_comments, $zoning_code, $zoning_juris, $zoning_desc, $traffic_count, $inter_street, $traffic_date, $floor_area_ratio );
		$stmt2->execute();
		$stmt2->close();
	} else {
		echo mysqli_error( $conn );
	};
	if ( $stmt3 = $conn->prepare( "INSERT INTO building (FK_ReportID, no_building, no_stories, floor_1_gba, floor_2_gba, total_basement_gba, basement_pct_gba, overall_gba, gba_source, floor_1_nra, floor_2_nra, total_basement_nra, basement_pct_nra, overall_nra, nra_source, basement_type, storage_basement_sf, ancillary_area_sf, ancillary_area_desc, land_build_ratio_overall, land_build_ratio_primary, land_build_usable, eff_ratio_pct_nra, site_cover_overall, site_cover_primary, building_comments, year_built_search, last_renovation, year_built, occupancy_type, building_quality, int_condition, ext_condition, const_class, building_class, const_descr, other_const_features, parking_stalls, parking_type, parking_ratio_nra, parking_ratio, parking_ratio_gba) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$stmt3->bind_param( "iisiiidisiiidissiisddddddsissiiiiiissiidsd", $lastid, $no_building, $no_stories, $floor_1_gba, $floor_2_gba, $total_basement_gba, $basement_pct_gba, $overall_gba, $gba_source, $floor_1_nra, $floor_2_nra, $total_basement_nra, $basement_pct_nra, $overall_nra, $nra_source, $basement_type, $storage_basement_sf, $ancillary_area_sf, $ancillary_area_desc, $land_build_ratio_overall, $land_build_ratio_primary, $land_build_usable, $eff_ratio_pct_nra, $site_cover_overall, $site_cover_primary, $building_comments, $year_built_search, $last_renovation, $year_built, $occupancy_type, $building_quality, $int_condition, $ext_condition, $const_class, $building_class, $const_descr, $other_const_features, $parking_stalls, $parking_type, $parking_ratio_nra, $parking_ratio, $parking_ratio_gba);
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
	if ( $stmt5 = $conn->prepare( "INSERT INTO impunit (FK_ReportID) VALUES  (?)" ) ) {
		$stmt5->bind_param( "i", $lastid);
		$stmt5->execute();
		$stmt5->close();
	} else {
		echo mysqli_error( $conn );
	};
	if ( $stmt6 = $conn->prepare( "INSERT INTO saletrans (FK_ReportID) VALUES (?)" ) ) {
		$stmt6->bind_param( "i", $lastid );
		$stmt6->execute();
		$stmt6->close();
	} else {
		echo mysqli_error( $conn );
	};
	echo $lastid;
	die();
	break;
	case 3;
	if ( $stmt = $conn->prepare( "INSERT INTO report (FK_ReportTypeID, status, priority, AssignedTo, DueDate, OwnerID, reportname, DateCreated, CreatedBy, DateModified, ModifiedBy, cloneorigin, cloneid) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		//$mediaUtilities = new rbe_mediaUtilities();
		$FK_ReportTypeID = '3';
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
	if ( $stmt2 = $conn->prepare( "INSERT INTO property (FK_ReportID, photo1, thumbnail, property_name, address, streetnumber, streetname, city, county, state, zip_code, lat, lng, propertytype, propertysubtype, genmarket, msa, submarkid, traffic_count, traffic_date, inter_street, gross_land_sf, gross_land_acre, exposure, site_access, zoning_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$stmt2->bind_param( "issssssssssddisisisssidiis", $lastid, $final_file, $final_file_thumb, $property_name, $address, $streetnumber, $streetname, $city, $county, $state, $zip_code, $lat, $lng, $propertytype, $propertysubtype, $genmarket, $msa, $submarkid, $traffic_count, $traffic_date, $inter_street, $gross_land_sf, $gross_land_acre, $exposure, $site_access, $zoning_code );
		$stmt2->execute();
		$stmt2->close();
	} else {
		echo mysqli_error( $conn );
	};
	if ( $stmt3 = $conn->prepare( "INSERT INTO building (FK_ReportID, overall_gba, overall_nra, vacancy_sf_nra, oe_vacany_pct, land_build_ratio_primary, parking_stalls, parking_ratio_nra, parking_ratio, year_built, year_built_search, last_renovation, occupancy_type, no_building, no_stories, const_descr, other_const_features, building_quality, int_condition, ext_condition, building_class) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$stmt3->bind_param( "iiiiddidssisiisssiiii", $lastid, $overall_gba, $overall_nra, $vacancy_sf_nra, $oe_vacany_pct, $land_build_ratio_primary, $parking_stalls, $parking_ratio_nra, $parking_ratio, $year_built, $year_built_search, $last_renovation, $occupancy_type, $no_building, $no_stories, $const_descr, $other_const_features, $building_quality, $int_condition, $ext_condition, $building_class );
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
		$stmt5->bind_param( "ii", $lastid, $proj_site );
		$stmt5->execute();
		$stmt5->close();
	} else {
		echo mysqli_error( $conn );
	};

	if ( $stmt6 = $conn->prepare( "INSERT INTO multifamily (FK_ReportID) VALUES  (?)" ) ) {
		$stmt6->bind_param( "i", $lastid );
		$stmt6->execute();
		$stmt6->close();
	} else {
		echo mysqli_error( $conn );
	};

	if ( $stmt7 = $conn->prepare( "INSERT INTO selfstorage (FK_ReportID) VALUES  (?)" ) ) {
		$stmt7->bind_param( "i", $lastid );
		$stmt7->execute();
		$stmt7->close();
	} else {
		echo mysqli_error( $conn );
	};

	if ( $stmt8 = $conn->prepare( "INSERT INTO yardabsorb (FK_ReportID) VALUES  (?)" ) ) {
		$stmt8->bind_param( "i", $lastid );
		$stmt8->execute();
		$stmt8->close();
	} else {
		echo mysqli_error( $conn );
	};
	echo $lastid;
	die();
	break;
	case 4;
	if ( $stmt = $conn->prepare( "INSERT INTO report (FK_ReportTypeID, status, priority, AssignedTo, DueDate, OwnerID, reportname, DateCreated, CreatedBy, DateModified, ModifiedBy, cloneorigin, cloneid) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		//$mediaUtilities = new rbe_mediaUtilities();
		$FK_ReportTypeID = '4';
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
	if ( $stmt2 = $conn->prepare( "INSERT INTO property (FK_ReportID, property_name, address, streetnumber, streetname, city, county, state, zip_code, lat, lng, propertytype, propertysubtype, msa, genmarket, submarkid, legal_desc, photo1, thumbnail, gla_inputtype, gla_inputsize, gross_land_acre, gross_land_sf, unusable_sf, unusable_acre, unusable_desc, net_usable_sf, net_usable_acre, net_usable_desc, shape, topography, utilities, flood_plain, orientation, site_access, exposure, easement, easement_desc, other_land_comments, zoning_juris, zoning_code, zoning_desc, floor_area_ratio, traffic_count, traffic_date, inter_street, proposed_building) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$proposed_building = '0';
		$stmt2->bind_param( "issssssssddississssiddiidsidsiisiiiiisssssisssi", $lastid, $property_name, $address, $streetnumber, $streetname, $city, $county, $state, $zip_code, $lat, $lng, $propertytype, $propertysubtype, $msa, $genmarket, $submarkid, $legal_desc, $final_file, $final_file_thumb, $gla_inputtype, $gla_inputsize, $gross_land_acre, $gross_land_sf, $unusable_sf, $unusable_acre, $unusable_desc, $net_usable_sf, $net_usable_acre, $net_usable_desc, $shape, $topography, $utilities, $flood_plain, $orientation, $site_access, $exposure, $easement, $easement_desc, $other_land_comments, $zoning_juris, $zoning_code, $zoning_desc, $floor_area_ratio, $traffic_count, $traffic_date, $inter_street, $proposed_building );
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

	if ( $stmt6 = $conn->prepare( "INSERT INTO saletrans (FK_ReportID) VALUES  (?)" ) ) {
		$stmt6->bind_param( "i", $lastid );
		$stmt6->execute();
		$stmt6->close();
	} else {
		echo mysqli_error( $conn );
	};
	echo $lastid;
	die();
	break;
};
?>