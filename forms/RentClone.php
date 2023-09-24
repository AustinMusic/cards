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
$overall_gba = str_replace(array(',',' ','%','$'),'',$overall_gba);
$overall_nra = str_replace(array(',',' ','%','$'),'', $overall_nra);
$vacancy_sf_nra = str_replace(array(',',' ','%','$'),'', $vacancy_sf_nra);
$oe_vacany_pct = str_replace(array(',',' ','%','$'),'', $oe_vacany_pct);
$gross_land_sf = str_replace(array(',',' ','%','$'),'', $gross_land_sf);
$gross_land_acre = str_replace(array(',',' ','%','$'),'', $gross_land_acre);
$land_build_ratio_primary = str_replace(array(' to 1',','),'', $land_build_ratio_primary);
$parking_stalls = str_replace(array(',',' ','%','$'),'', $parking_stalls);
$parking_ratio_gba = str_replace(array(',',' ','%','$'),'', $parking_ratio_gba);
$final_file = "";
$final_file_thumb = "";
$reportname = "";
$DateCreated = date('Y-m-d H:i:s');
$DateModified = date('Y-m-d H:i:s');
$cloneorigin = "Leases";

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
	if ( $stmt2 = $conn->prepare( "INSERT INTO property (FK_ReportID, photo1, thumbnail, property_name, address, streetnumber, streetname, city, county, state, zip_code, lat, lng, propertytype, propertysubtype, msa, genmarket, submarkid, gla_inputtype, gla_inputsize, gross_land_sf, gross_land_acre, exposure, site_access, zoning_code, traffic_count, traffic_date, inter_street) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$gla_inputtype = "0";
		$stmt2->bind_param( "issssssssssddissisididiissss", $lastid, $final_file, $final_file_thumb, $property_name, $address, $streetnumber, $streetname, $city, $county, $state, $zip_code, $lat, $lng, $propertytype, $propertysubtype, $msa, $genmarket, $submarkid, $gla_inputtype, $gross_land_sf, $gross_land_sf, $gross_land_acre, $exposure, $site_access, $zoning_code, $traffic_count, $traffic_date, $inter_street);
		$stmt2->execute();
		$stmt2->close();
	} else {
		echo mysqli_error( $conn );
	};
	if ( $stmt3 = $conn->prepare( "INSERT INTO building (FK_ReportID, no_building, no_stories, floor_1_gba, overall_gba, floor_1_nra, overall_nra, land_build_ratio_primary, year_built, year_built_search, last_renovation, occupancy_type, building_quality, building_class, int_condition, ext_condition, const_descr, other_const_features) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
	$stmt3->bind_param( "iisiiiidsisiiiiiss", $lastid, $no_building, $no_stories, $overall_gba, $overall_gba, $overall_nra, $overall_nra, $land_build_ratio_primary, $year_built, $year_built_search, $last_renovation, $occupancy_type, $building_quality, $building_class, $int_condition, $ext_condition, $const_descr, $other_const_features);
	$stmt3->execute();
	$stmt3->close();
	} else {
	echo mysqli_error( $conn );
	}
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
	if ( $stmt2 = $conn->prepare( "INSERT INTO property (FK_ReportID, photo1, thumbnail, property_name, address, streetnumber, streetname, city, county, state, zip_code, lat, lng, propertytype, propertysubtype, msa, genmarket, submarkid, gla_inputtype, gla_inputsize, gross_land_sf, gross_land_acre, site_access, exposure, zoning_code, traffic_count, inter_street, traffic_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$gla_inputtype = "0";
		$stmt2->bind_param( "issssssssssddissisididiissss", $lastid, $final_file, $final_file_thumb, $property_name, $address, $streetnumber, $streetname, $city, $county, $state, $zip_code, $lat, $lng, $propertytype, $propertysubtype, $msa, $genmarket, $submarkid, $gla_inputtype, $gross_land_sf, $gross_land_sf, $gross_land_acre, $site_access, $exposure, $zoning_code, $traffic_count, $inter_street, $traffic_date);
		$stmt2->execute();
		$stmt2->close();
	} else {
		echo mysqli_error( $conn );
	};
	if ( $stmt3 = $conn->prepare( "INSERT INTO building (FK_ReportID, no_building, no_stories, floor_1_gba, overall_gba, gba_source, floor_1_nra, overall_nra, land_build_ratio_primary, year_built_search, last_renovation, year_built, occupancy_type, building_quality, int_condition, ext_condition, building_class, const_descr, other_const_features, parking_stalls, parking_ratio, parking_ratio_gba, oe_vacany_pct, vacancy_sf_nra) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
	$stmt3->bind_param( "iisiisiidissiiiiissisddd", $lastid, $no_building, $no_stories, $overall_gba, $overall_gba, $gba_source, $overall_nra, $overall_nra, $land_build_ratio_primary, $year_built_search, $last_renovation, $year_built, $occupancy_type, $building_quality, $int_condition, $ext_condition, $building_class, $const_descr, $other_const_features, $parking_stalls, $parking_ratio, $parking_ratio_gba, $oe_vacany_pct, $vacancy_sf_nra);
	$stmt3->execute();
	$stmt3->close();
	} else {
	echo mysqli_error( $conn );
	}
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
	if ( $stmt = $conn->prepare( "INSERT INTO report (FK_ReportTypeID, status, priority, AssignedTo, DueDate, OwnerID, reportname, DateCreated, CreatedBy, DateModified, ModifiedBy, cloneorigin, cloneid) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,?)" ) ) {
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
	if ( $stmt2 = $conn->prepare( "INSERT INTO property (FK_ReportID, photo1, thumbnail, property_name, address, streetnumber, streetname, city, county, state, zip_code, lat, lng, propertytype, propertysubtype, park_type, genmarket, msa, submarkid, traffic_count, traffic_date, inter_street, gross_land_sf, gross_land_acre, exposure, site_access, zoning_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$stmt2->bind_param( "issssssssssddisiisisssidiis", $lastid, $final_file, $final_file_thumb, $property_name, $address, $streetnumber, $streetname, $city, $county, $state, $zip_code, $lat, $lng, $propertytype, $propertysubtype, $park_type, $genmarket, $msa, $submarkid, $traffic_count, $traffic_date, $inter_street, $gross_land_sf, $gross_land_acre, $exposure, $site_access, $zoning_code);
		$stmt2->execute();
		$stmt2->close();
	} else {
		echo mysqli_error( $conn );
	};
	if ( $stmt3 = $conn->prepare( "INSERT INTO building (FK_ReportID, overall_gba, overall_nra, vacancy_sf_nra, oe_vacany_pct, inline_space_sf, inline_vacancy_pct, land_build_ratio_primary, parking_stalls, parking_ratio_gba, parking_ratio, year_built, year_built_search, last_renovation, occupancy_type, no_building, no_stories, const_descr, other_const_features, building_quality, int_condition, ext_condition, building_class) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
	$stmt3->bind_param( "iiiididdidssisiisssiiii",$lastid, $overall_gba, $overall_nra, $vacancy_sf_nra, $oe_vacany_pct, $inline_space_sf, $inline_vacancy_pct, $land_build_ratio_primary, $parking_stalls, $parking_ratio_gba, $parking_ratio, $year_built, $year_built_search, $last_renovation, $occupancy_type, $no_building, $no_stories, $const_descr, $other_const_features, $building_quality, $int_condition, $ext_condition, $building_class);
	$stmt3->execute();
	$stmt3->close();
	} else {
	echo mysqli_error( $conn );
	}
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
	$proposed_building = "1";
	$gla_inputtype = "0";
	if ( $stmt2 = $conn->prepare( "INSERT INTO property (FK_ReportID, property_name, address, streetnumber, streetname, city, county, state, zip_code, lat, lng, propertytype, propertysubtype, msa, genmarket, submarkid, photo1, thumbnail, gla_inputtype, gla_inputsize, gross_land_acre, gross_land_sf, site_access, exposure, zoning_code, traffic_count, traffic_date, inter_street, proposed_building) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$proposed_building = '0';
		$stmt2->bind_param( "issssssssddississsiddiiissssi",$lastid, $property_name, $address, $streetnumber, $streetname, $city, $county, $state, $zip_code, $lat, $lng, $propertytype, $propertysubtype, $msa, $genmarket, $submarkid, $final_file, $final_file_thumb, $gla_inputtype, $gross_land_sf, $gross_land_acre, $gross_land_sf, $site_access, $exposure, $zoning_code, $traffic_count, $traffic_date, $inter_street, $proposed_building);
		$stmt2->execute();
		$stmt2->close();
	} else {
		echo mysqli_error( $conn );
	};
	if ( $stmt3 = $conn->prepare( "INSERT INTO building (FK_ReportID) VALUES (?)" ) ) {
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