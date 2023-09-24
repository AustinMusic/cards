<?php
/* setting headers */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_time_limit(120);
ini_set('memory_limit','512M');
ini_set('max_execution_time',60);
require("../../../includes/connectPDO.php");

//echo json_encode($_POST);
if(isset($_POST['reportID'])){
	define("REPORT_TABLE","report",false);
	$reportID = intval($_POST['reportID']);
	
	$sql = "UPDATE ".REPORT_TABLE." SET ".REPORT_TABLE.".IsDeleted=1 WHERE ".REPORT_TABLE.".id=:id";
	
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':id',$reportID,PDO::PARAM_INT);

	try{
		$db->beginTransaction();
		$stmt->execute();
		$db->commit();
	}catch (PDOException $e) {
		echo json_encode(array('status' => 'error', 'data' => $e));
		$db->rollBack(); //cancel db changes if something goes wrong
		die();
	}

	echo json_encode(array('status' => 'ok', 'data' =>$reportID));
}

die();


?>