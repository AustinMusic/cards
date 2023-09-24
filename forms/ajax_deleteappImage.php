<?php
/* setting headers */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_time_limit(120);
ini_set('memory_limit','512M');
ini_set('max_execution_time',60);
require("../../../includes/connectPDO.php");

define("APP_TABLE","appraisers",false);
//echo json_encode($_POST);
if(isset($_POST['reportID']) && isset($_POST['imageName'])){

	if($_POST['dataType']=="apprdigsig"){
		$sql = "UPDATE ".APP_TABLE." SET ".APP_TABLE.".digsignature = '' WHERE ".APP_TABLE.".id=:id";
	}elseif($_POST['dataType']=="applicone"){
		$sql = "UPDATE ".APP_TABLE." SET ".APP_TABLE.".licenseimageone = '' WHERE ".APP_TABLE.".id=:id";
	}elseif($_POST['dataType']=="applictwo"){
		$sql = "UPDATE ".APP_TABLE." SET ".APP_TABLE.".licenseimagetwo = '' WHERE ".APP_TABLE.".id=:id";
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
	
	if(is_file($_SERVER['DOCUMENT_ROOT']."/cards/app_images/".$_POST['reportID']."/".$_POST['imageName'])){
		unlink($_SERVER['DOCUMENT_ROOT']."/cards/app_images/".$_POST['reportID']."/".$_POST['imageName']);

		$response[] = array('status' => 'ok','code' => '001', 'data' =>'image '.$_SERVER['DOCUMENT_ROOT']."/app_images/".$_POST['reportID']."/".$_POST['imageName'].' deleted succesfuly!');
	}else{
		$response[] = array('status' => 'error','code' => '002', 'data' =>'image '.$_SERVER['DOCUMENT_ROOT']."/cards/app_images/".$_POST['reportID']."/".$_POST['imageName'].' not exists!');
	}
	echo json_encode($response);
}

die();


?>