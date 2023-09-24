<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("../../../includes/connect.php");

if(isset($_GET['id'])){
	if ($stmt = $conn->prepare("SELECT report.id, report.reportname FROM report WHERE report.reportname LIKE ? AND report.FK_ReportTypeID = ? order by report.id DESC LIMIT 100")){
		$param = $_GET['id']."%";
		$param2 = $_GET['FK_ReportTypeID']."%";
		$stmt->bind_param("sd",$param,$param2);
		$stmt->execute();
		$result = $stmt->get_result();
		$autoCompleteData = array();
		while ( $row = $result->fetch_object() ) {
			$autoCompleteData[] = array("id"=>$row->id,"label"=>$row->reportname,"value"=>$row->reportname);
		}
		$stmt->close();
		
		echo json_encode($autoCompleteData,JSON_UNESCAPED_UNICODE);
	}else {
		echo mysqli_error($conn);
	}
}

if(isset($_GET['pid'])){
	if ($stmt = $conn->prepare("SELECT property.FK_ReportID AS id, property.property_name, property.zip_code FROM property WHERE property.property_name LIKE ? order by property.FK_ReportID DESC LIMIT 100")){
		$param = $_GET['pid']."%";
		$stmt->bind_param("s",$param);
		$stmt->execute();
		$result = $stmt->get_result();
		$autoCompleteData = array();
		while ( $row = $result->fetch_object() ) {
			$autoCompleteData[] = array("id"=>$row->id,"label"=>$row->property_name." ".$row->zip_code,"value"=>$row->property_name." ".$row->zip_code);
		}
		$stmt->close();
		
		echo json_encode($autoCompleteData,JSON_UNESCAPED_UNICODE);
	}else {
		echo mysqli_error($conn);
	}
}

if(isset($_GET['cid'])){
	if ($stmt = $conn->prepare("SELECT clients.id, clients.compname, clients.businessno FROM clients WHERE clients.compname LIKE ? order by clients.id DESC LIMIT 100")){
		$param = $_GET['cid']."%";
		$stmt->bind_param("s",$param);
		$stmt->execute();
		$result = $stmt->get_result();
		$autoCompleteData = array();
		while ( $row = $result->fetch_object() ) {
			$autoCompleteData[] = array("id"=>$row->id,"label"=>$row->compname." ".$row->businessno,"value"=>$row->compname." ".$row->businessno);
		}
		$stmt->close();
		
		echo json_encode($autoCompleteData,JSON_UNESCAPED_UNICODE);
	}else {
		echo mysqli_error($conn);
	}
}

?>