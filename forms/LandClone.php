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

$inc_far = isset($conn,$inc_far);
$gla_inputsize = str_replace( ',', '', $gla_inputsize);
$gross_land_acre = str_replace( ',', '',$gross_land_acre);
$gross_land_sf = str_replace( ',', '',$gross_land_sf);
$unusable_sf = str_replace( ',', '',$unusable_sf);
$unusable_acre = str_replace( ',', '',$unusable_acre);
$net_usable_sf = str_replace( ',', '',$net_usable_sf);
$net_usable_acre = str_replace( ',', '',$net_usable_acre);
$floor_area_ratio = str_replace( ',', '',$floor_area_ratio);
$max_floor_area = str_replace( ',', '',$max_floor_area);
$floor_1_gba = str_replace( ',', '',$floor_1_gba);
$site_cover_primary = str_replace( array( ' %', ',' ), '',$site_cover_primary);
$floor_2_gba = str_replace( ',', '',$floor_2_gba);
$land_build_ratio_primary = str_replace( array( ',', ' to 1' ), '',$land_build_ratio_primary);
$total_basement_gba = str_replace( ',', '',$total_basement_gba);
$overall_gba = str_replace( ',', '',$overall_gba);
$final_file = "";
$final_file_thumb = "";
$reportname = "";
$DateCreated = date('Y-m-d H:i:s');
$DateModified = date('Y-m-d H:i:s');
$cloneorigin = "Land Sales";

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
	if ( $stmt2 = $conn->prepare( "INSERT INTO property (FK_ReportID, photo1, thumbnail, property_name, address, streetnumber, streetname, city, county, state, zip_code, lat, lng, legal_desc, propertytype, propertysubtype, msa, genmarket, submarkid, gla_inputtype, gla_inputsize, gross_land_sf, gross_land_acre, unusable_sf, unusable_acre, unusable_desc, net_usable_sf, net_usable_acre, net_usable_desc, shape, utilities, exposure, flood_plain, topography, site_access, orientation, easement, easement_desc, zoning_code, zoning_desc, zoning_juris) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$stmt2->bind_param( "issssssssssddsissisidididsidsisiiiiiissss", $lastid, $final_file, $final_file_thumb, $property_name, $address, $streetnumber, $streetname, $city, $county, $state, $zip_code, $lat, $lng, $legal_desc, $propertytype, $propertysubtype, $msa, $genmarket, $submarkid, $gla_inputtype, $gla_inputsize, $gross_land_sf, $gross_land_acre, $unusable_sf, $unusable_acre, $unusable_desc, $net_usable_sf, $net_usable_acre, $net_usable_desc, $shape, $utilities, $exposure, $flood_plain, $topography, $site_access, $orientation, $easement, $easement_desc, $zoning_code, $zoning_desc, $zoning_juris);
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
	}
    if ( $stmtpt = $conn->prepare( "INSERT INTO proptypedetails (FK_ReportID) VALUES  (?)" ) ) {
		$stmtpt->bind_param( "i", $lastid);
		$stmtpt->execute();
		$stmtpt->close();
	} else {
		echo mysqli_error( $conn );
	}
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
	if ( $stmt2 = $conn->prepare( "INSERT INTO property (FK_ReportID, photo1, thumbnail, property_name, address, streetnumber, streetname, city, county, state, zip_code, lat, lng, propertytype, propertysubtype, msa, genmarket, submarkid, legal_desc, gla_inputtype, gla_inputsize, gross_land_sf, gross_land_acre, unusable_sf, unusable_acre, unusable_desc, net_usable_sf, net_usable_acre, net_usable_desc, shape, topography, site_access, orientation, exposure, utilities, flood_plain, easement, easement_desc, other_land_comments, zoning_code, zoning_juris, zoning_desc, floor_area_ratio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$stmt2->bind_param( "issssssssssddississidididsidsiiiiisiisssssi", $lastid, $final_file, $final_file_thumb, $property_name, $address, $streetnumber, $streetname, $city, $county, $state, $zip_code, $lat, $lng, $propertytype, $propertysubtype, $msa, $genmarket, $submarkid, $legal_desc, $gla_inputtype, $gla_inputsize, $gross_land_sf, $gross_land_acre, $unusable_sf, $unusable_acre, $unusable_desc, $net_usable_sf, $net_usable_acre, $net_usable_desc, $shape, $topography, $site_access, $orientation, $exposure, $utilities, $flood_plain, $easement, $easement_desc, $other_land_comments, $zoning_code, $zoning_juris, $zoning_desc, $floor_area_ratio);
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
		$stmt2->bind_param( "issssssssssddisisisssidiis", $lastid, $final_file, $final_file_thumb, $property_name, $address, $streetnumber, $streetname, $city, $county, $state, $zip_code, $lat, $lng, $propertytype, $propertysubtype, $genmarket, $msa, $submarkid, $traffic_count, $traffic_date, $inter_street, $gross_land_sf, $gross_land_acre, $exposure, $site_access, $zoning_code);
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
	if ( $stmt2 = $conn->prepare( "INSERT INTO property (FK_ReportID, property_name, address, streetnumber, streetname, city, county, state, zip_code, lat, lng, propertytype, propertysubtype, msa, genmarket, submarkid, legal_desc, photo1, thumbnail, gla_inputtype, gla_inputsize, gross_land_acre, gross_land_sf, unusable_sf, unusable_acre, unusable_desc, net_usable_sf, net_usable_acre, net_usable_desc, shape, topography, utilities, flood_plain, orientation, site_access, exposure, easement, easement_desc, other_land_comments, zoning_juris, zoning_code, zoning_desc, floor_area_ratio, proposed_building) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" ) ) {
		$proposed_building = '0';
		$stmt2->bind_param( "issssssssddississssiddiidsidsiisiiiiisssssii", $lastid, $property_name, $address, $streetnumber, $streetname, $city, $county, $state, $zip_code, $lat, $lng, $propertytype, $propertysubtype, $msa, $genmarket, $submarkid, $legal_desc, $final_file, $final_file_thumb, $gla_inputtype, $gla_inputsize, $gross_land_acre, $gross_land_sf, $unusable_sf, $unusable_acre, $unusable_desc, $net_usable_sf, $net_usable_acre, $net_usable_desc, $shape, $topography, $utilities, $flood_plain, $orientation, $site_access, $exposure, $easement, $easement_desc, $other_land_comments, $zoning_juris, $zoning_code, $zoning_desc, $floor_area_ratio, $proposed_building );
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