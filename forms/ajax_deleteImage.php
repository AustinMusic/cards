<?php
/* setting headers */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_time_limit(120);
ini_set('memory_limit','512M');
ini_set('max_execution_time',60);
require("../../../includes/connectPDO.php");

define("PROPERTY_TABLE","property",false);
define("PROPERTY_PICS","propphotos",false);
//echo json_encode($_POST);
if(isset($_POST['reportID']) && isset($_POST['imageName'])){

	if($_POST['dataType']=="property-photo"){
		$sql = "UPDATE ".PROPERTY_TABLE." SET ".PROPERTY_TABLE.".photo1 = '', ".PROPERTY_TABLE.".thumbnail = '' WHERE ".PROPERTY_TABLE.".FK_ReportID=:id";
	}elseif($_POST['dataType']=="plat-photo"){
		$sql = "UPDATE ".PROPERTY_TABLE." SET ".PROPERTY_TABLE.".platmap = '' WHERE ".PROPERTY_TABLE.".FK_ReportID=:id";
	}elseif($_POST['dataType']=="street-photo"){
		$sql = "UPDATE ".PROPERTY_TABLE." SET ".PROPERTY_TABLE.".streetview = '' WHERE ".PROPERTY_TABLE.".FK_ReportID=:id";
	}elseif($_POST['dataType']=="propphotos"){
		$sql = "DELETE FROM ".PROPERTY_PICS." WHERE ".PROPERTY_PICS.".FK_ReportID=:id AND ".PROPERTY_PICS.".id=:id2";
	}
	
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':id',$_POST['reportID'],PDO::PARAM_INT);
	if(isset($_POST['id'])){
		if($_POST['id']!=""){
			$stmt->bindValue(':id2',$_POST['id'],PDO::PARAM_INT);
		}
	}
	$response = array();
	try{
		$db->beginTransaction();
		$stmt->execute();
		$db->commit();
	}catch (PDOException $e) {
		print_r($e);
		$response[] = array('status' => 'error', 'data' => $e);
		echo json_encode($response);
		$db->rollBack(); //cancel db changes if something goes wrong
		die();
	}
	
	if(is_file($_SERVER['DOCUMENT_ROOT']."/cards/comp_images/".$_POST['reportID']."/".$_POST['imageName'])){
		unlink($_SERVER['DOCUMENT_ROOT']."/cards/comp_images/".$_POST['reportID']."/".$_POST['imageName']);

		$response[] = array('status' => 'ok','code' => '001', 'data' =>'image '.$_SERVER['DOCUMENT_ROOT']."/comp_images/".$_POST['reportID']."/".$_POST['imageName'].' deleted succesfuly!');
	}else{
		$response[] = array('status' => 'error','code' => '002', 'data' =>'image '.$_SERVER['DOCUMENT_ROOT']."/cards/comp_images/".$_POST['reportID']."/".$_POST['imageName'].' not exists!');
	}
	echo json_encode($response);
}

die();


?>